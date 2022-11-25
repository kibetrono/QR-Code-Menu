<?php

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) exit;

/**
 * Class Qr_Menu_Run
 *
 * Thats where we bring the plugin to life
 *
 * @package		QRMENU
 * @subpackage	Classes/Qr_Menu_Run
 * @author		David Rono
 * @since		1.0.0
 */
class Qr_Menu_Run{

	/**
	 * Our Qr_Menu_Run constructor 
	 * to run the plugin logic.
	 *
	 * @since 1.0.0
	 */
	function __construct(){
		$this->add_hooks();
	}

	/**
	 * ######################
	 * ###
	 * #### WORDPRESS HOOKS
	 * ###
	 * ######################
	 */

	/**
	 * Registers all WordPress and plugin related hooks
	 *
	 * @access	private
	 * @since	1.0.0
	 * @return	void
	 */
	private function add_hooks(){
	
		add_shortcode( 'my_shortcode_tag', array( $this, 'add_shortcode_callback' ) );
		add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_backend_scripts_and_styles' ), 20 );
		add_action( 'init', array( $this, 'add_custom_post_type' ), 20 );
		add_action( 'acf/init', array( $this, 'add_custom_acf_options_page' ), 20 );
		add_action('init', array($this, 'food_type_taxonomy'), 20);

		register_activation_hook( QRMENU_PLUGIN_FILE, array( $this, 'activation_hook_callback' ) );

		add_shortcode('restaurant_menu_shortcode', array($this,'the_restaurant_menu_shortcode'));
		add_shortcode('qrcode_shortcode', array($this, 'qrcode_shortcode'));
	
	}

	/**
	 * ######################
	 * ###
	 * #### WORDPRESS HOOK CALLBACKS
	 * ###
	 * ######################
	 */

	/**
	 * Add the shortcode callback for [my_shortcode_tag]
	 *
	 * @access	public
	 * @since	1.0.0
	 *
	 * @param	array	$attr		Additional attributes you have added within the shortcode tag.
	 * @param	string	$content	The content you added between an opening and closing shortcode tag.
	 *
	 * @return	string	The customized content by the shortcode.
	 */
	public function add_shortcode_callback( $attr = array(), $content = '' ) {

		$content .= ' this content is added by the add_shortcode_callback() function';

		return $content;
	}

	/**
	 * Enqueue the backend related scripts and styles for this plugin.
	 * All of the added scripts andstyles will be available on every page within the backend.
	 *
	 * @access	public
	 * @since	1.0.0
	 *
	 * @return	void
	 */
	public function enqueue_backend_scripts_and_styles() {
		wp_enqueue_style( 'qrmenu-backend-styles', QRMENU_PLUGIN_URL . 'core/includes/assets/css/backend-styles.css', array(), QRMENU_VERSION, 'all' );
	}

	/**
	 * Add all of the available custom post types
	 *
	 * @access	public
	 * @since	1.0.0
	 *
	 * @return	void
	 */
	public function add_custom_post_type()
	{

		$labels = array(
			'name'                  => _x('Food Item', 'Post type general name', 'qr-menu'),
			'singular_name'         => _x('Food Item', 'Post type singular name', 'qr-menu'),
			'menu_name'             => _x('Food Item', 'Admin Menu text', 'qr-menu'),
			'name_admin_bar'        => _x('Food Item', 'Add New on Toolbar', 'qr-menu'),
			'add_new'               => __('Add New', 'qr-menu'),
			'add_new_item'          => __('Add New Food Item', 'qr-menu'),
			'new_item'              => __('New Food Item', 'qr-menu'),
			'edit_item'             => __('Edit Food Item', 'qr-menu'),
			'view_item'             => __('View Food Item', 'qr-menu'),
			'all_items'             => __('All ', 'qr-menu'),
			'search_items'          => __('Search ', 'qr-menu'),
			'parent_item_colon'     => __('Parent :', 'qr-menu'),
			'not_found'             => __('No  found.', 'qr-menu'),
			'not_found_in_trash'    => __('No  found in Trash.', 'qr-menu'),
			'featured_image'        => _x('Food Item Cover Image', 'Overrides the "Featured Image" phrase for this post type.', 'qr-menu'),
			'set_featured_image'    => _x('Set cover image', 'Overrides the "Set featured image" phrase for this post type.', 'qr-menu'),
			'remove_featured_image' => _x('Remove cover image', 'Overrides the "Remove featured image" phrase for this post type.', 'qr-menu'),
			'use_featured_image'    => _x('Use as cover image', 'Overrides the "Use as featured image" phrase for this post type.', 'qr-menu'),
			'archives'              => _x('Food Item archives', 'The post type archive label used in nav menus. Default "Post Archives".', 'qr-menu'),
			'insert_into_item'      => _x('Insert into Food Item', 'Overrides the "Insert into post"/"Insert into page" phrase (used when inserting media into a post).', 'qr-menu'),
			'uploaded_to_this_item' => _x('Uploaded to this Food Item', 'Overrides the "Uploaded to this post"/"Uploaded to this page" phrase (used when viewing media attached to a post).', 'qr-menu'),
			'filter_items_list'     => _x('Filter  list', 'Screen reader text for the filter links heading on the post type listing screen. Default "Filter posts list"/"Filter pages list".', 'qr-menu'),
			'items_list_navigation' => _x(' list navigation', 'Screen reader text for the pagination heading on the post type listing screen. Default "Posts list navigation"/"Pages list navigation".', 'qr-menu'),
			'items_list'            => _x(' list', 'Screen reader text for the items list heading on the post type listing screen. Default "Posts list"/"Pages list".', 'qr-menu'),
		);

		$supports = array(
			'title',			// post title
			'editor',			// post content
			'author',			// post author
			'thumbnail',		// featured image
			'excerpt',			// post excerpt
			'custom-fields',	// custom fields
			'comments',			// post comments
			'revisions',		// post revisions
			'post-formats',		// post formats
		);

		$args = array(
			'labels'				=> $labels,
			'supports' 				=> $supports,
			'public'				=> true,
			'publicly_queryable'	=> true,
			'show_ui'				=> true,
			'show_in_menu'			=> true,
			'query_var'				=> true,
			'rewrite'				=> array('slug' => 'food-item'),
			'capability_type'		=> 'post',
			'has_archive'			=> true,
			'hierarchical'			=> false,
			'menu_position'			=> null,
		);

		register_post_type('fooditem', $args);
	}

	/**
	 * Add foodtype taxonomy to the fooditem CPT
	 *
	 * @access	public
	 * @since	1.0.0
	 *
	 * @return	void
	 */
	public function food_type_taxonomy()
	{

		$labels = array(
			'name' => _x('Food Types', 'taxonomy general name'),
			'singular_name' => _x('Food Type', 'taxonomy singular name'),
			'search_items' =>  __('Search Food Types'),
			'all_items' => __('All Food Types'),
			'parent_item' => __('Parent Food Type'),
			'parent_item_colon' => __('Parent Food Type:'),
			'edit_item' => __('Edit Food Type'),
			'update_item' => __('Update Food Type'),
			'add_new_item' => __('Add New Food Type'),
			'new_item_name' => __('New Food Type Name'),
			'menu_name' => __('Food Types'),
		);

		$args = array(
			'labels' => $labels,
			'public' => true,
			'hierarchical' => true,
			'show_ui' => true,
			'show_in_rest' => true,
			'show_admin_column' => true,
			'query_var' => true,
			'rewrite' => array('slug' => 'food-type'),

		);

		register_taxonomy('foodtype', array('fooditem'), $args);
	}

	public function the_restaurant_menu_shortcode(){
		include_once('./wp-content/themes/basel-child/restaurant-food-menu.php');
	}

	public function qrcode_shortcode(){
		include_once('./wp-content/themes/basel-child/qrcode.php');
	}


	/**
	 * Add the Advanced Custom fields
	 * options pages
	 *
	 * @access	public
	 * @since	1.0.0
	 * @link	https://www.advancedcustomfields.com/resources/acf_add_options_page/
	 *
	 * @return	void
	 */
	public function add_custom_acf_options_page() {

		// Check function exists.
		if( function_exists('acf_add_options_page') ) {

			// Register options page.
			$option_page = acf_add_options_page( array(
				'page_title'    => __('ACF Page Title'),
				'menu_title'    => __('ACF Menu Title'),
				'menu_slug'     => 'acf-page-title',
				'capability'    => 'edit_posts',
				'redirect'      => false
			) );

		}

	}

	/**
	 * ####################
	 * ### Activation/Deactivation hooks
	 * ####################
	 */
	 
	/*
	 * This function is called on activation of the plugin
	 *
	 * @access	public
	 * @since	1.0.0
	 *
	 * @return	void
	 */
	public function activation_hook_callback(){

		//Your code
		
	}

}
