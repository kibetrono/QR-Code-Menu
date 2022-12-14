<?php
namespace SiteGround_Central\Pages;

use SiteGround_Central\Control\Plugins as Plugins_Control;

/**
 * SG Central Plugins main class
 */
class Plugins extends Custom_Page {
	/**
	 * Parent slug.
	 *
	 * @since 1.0.0
	 *
	 * @var string
	 */
	public $parent_slug = 'plugins.php';

	/**
	 * Capability.
	 *
	 * @since 1.0.0
	 *
	 * @var string
	 */
	public $capability = 'install_plugins';

	/**
	 * Menu slug.
	 *
	 * @since 1.0.0
	 *
	 * @var string
	 */
	public $menu_slug = 'sg-plugin-install.php';

	/**
	 * For checking the paths for overriding urls.
	 *
	 * @since 1.0.0
	 *
	 * @var string
	 */
	public $submenu_slug = 'plugin-install.php';

	/**
	 * Option which returns whether to hide or show custom page
	 *
	 * @since 1.0.0
	 *
	 * @var string
	 */
	public $option_name = 'siteground_wizard_hide_custom_plugins';

	/**
	 * The page name for loading the correct scripts.
	 *
	 * @since  1.0.0
	 *
	 * @var string
	 */
	public $page_id = 'plugins_page_sg-plugin-install';

	/**
	 * The network page name for loading the correct scripts.
	 *
	 * @since  1.0.0
	 *
	 * @var string
	 */
	public $page_id_network = 'plugins_page_sg-plugin-install-network';

	/**
	 * The singleton instance.
	 *
	 * @since 1.0.0
	 *
	 * @var The singleton instance.
	 */
	private static $instance;

	/**
	 * The Constructor.
	 *
	 * @since 1.0.0
	 */
	public function __construct() {
		// Bail if the page should not be replaced.
		if ( false === $this->maybe_show_page() ) {
			return;
		}

		// Construct the parent.
		parent::__construct();

		// Remove the original page.
		add_action( 'admin_menu', array( $this, 'remove_original_page' ), 999 );
		// Change the class of the plugins information modal.
		add_action( 'admin_body_class', array( $this, 'change_plugin_info_modal' ) );
		$plugins_control = new Plugins_Control();
		// Add the load more script.
		add_action( 'wp_ajax_ajax_plugins', array( $plugins_control, 'ajax_plugins' ) );

	}

	/**
	 * Check if we are on the correct page for loading the scripts.
	 *
	 * @since  1.0.0
	 *
	 * @return boolean If we are on the required page.
	 */
	public function maybe_page() {
		// Get the current screen.
		$current_screen = \get_current_screen();

		// Check if we meet the page requirements.
		if (
			( $this->page_id === $current_screen->id || $this->page_id_network === $current_screen->id ) ||
			( isset( $_GET['sg-central-preview'] ) && 1 == $_GET['sg-central-preview'] )
		) {
			return true;
		}

		return false;
	}

	/**
	 * Add additional class to plugins info modal.
	 *
	 * @since  1.0.0
	 *
	 * @param  array $classes Array of body classes.
	 *
	 * @return array          Array of modified classes.
	 */
	public function change_plugin_info_modal( $classes ) {
		if (
			isset( $_GET['tab'] ) &&
			'plugin-information' === $_GET['tab']
		) {
			$classes .= ' sg-plugin-information';
		}

		return $classes;
	}

	/**
	 * Prepare the necessary scripts.
	 *
	 * @since  1.0.0
	 */
	public function enqueue_scripts() {
		// Check if we are on the correct page.
		if ( false === $this->maybe_page() ) {
			return;
		}

		wp_enqueue_script( 'thickbox' );
		wp_enqueue_script( 'sg-central', \SiteGround_Central\URL . '/assets/js/sg-central.js', array( 'jquery' ), \Siteground_Central\VERSION );
		wp_enqueue_script( 'sg-plugins', \SiteGround_Central\URL . '/assets/js/sg-plugins.js', array( 'jquery', 'thickbox' ), \SiteGround_Central\VERSION );

		wp_localize_script(
			'sg-plugins',
			'i18_strings',
			array(
				'activating' => __( 'Activating...', 'siteground-wizard' ),
				'activate'   => __( 'Activate', 'siteground-wizard' ),
				'installing' => __( 'Installing...', 'siteground-wizard' ),
				'install'    => __( 'Install', 'siteground-wizard' ),
				'updating'   => __( 'Updating...', 'siteground-wizard' ),
				'active'     => __( 'Active', 'siteground-wizard' ),
			)
		);

		wp_localize_script(
			'sg-central',
			'i18_strings_central',
			array(
				'installing' => __( 'Installing...', 'siteground-wizard' ),
			)
		);

		// Enqueue the styles for the modal.
		wp_enqueue_style( 'thickbox' );
		wp_enqueue_style(
			'siteground-central-style',
			\SiteGround_Central\URL . '/assets/css/style.css',
			array(),
			\SiteGround_Central\VERSION,
			'all'
		);

		if (
			isset( $_GET['sg-central-preview'] ) &&
			1 == $_GET['sg-central-preview']
		) {

			// Enqueue the styles for the modal.
			wp_enqueue_style(
				'siteground-wizard-modal',
				\SiteGround_Central\URL . '/assets/css/modal.css',
				array(),
				\SiteGround_Central\VERSION,
				'all'
			);
		}

		// Dequeue conflicting styles.
		foreach ( $this->dequeued_styles as $style ) {
			wp_dequeue_style( $style );
		}
	}

	/**
	 * Remove the original "Add New" plugin page.
	 *
	 * @since  1.0.0
	 *
	 * @return void
	 */
	public function remove_original_page() {
		remove_submenu_page( $this->parent_slug, $this->submenu_slug );
	}

	/**
	 * Change the order of plugins.php submenu page.
	 * Since our custom page has been added late, we need to reorder
	 * the submenu page, so that we can match the initial order.
	 *
	 * Example:
	 *          "Installed Plugins"
	 *          "Add New"
	 *          "Editor"
	 *
	 * @since  1.0.0
	 *
	 * @param  bool $menu_order Flag if the menu order is enabled.
	 *
	 * @return bool $menu_order Flag if the menu order is enabled.
	 */
	public function reorder_submenu_pages( $menu_order ) {
		// Check user capabilities.
		if ( ! current_user_can( 'update_plugins' ) ) {
			return $menu_order;
		}

		// Load the global submenu.
		global $submenu;

		// Create empty array where we will set the new order.
		$new_plugins_order = array();

		if ( ! isset( $submenu['plugins.php'][15] ) ) {
			return $menu_order;
		}

		// Reorder submenu pages.
		$new_plugins_order[] = $submenu['plugins.php'][5];
		$new_plugins_order[] = $submenu['plugins.php'][16];
		$new_plugins_order[] = $submenu['plugins.php'][15];

		// Finally overwrite the default order, with custom one.
		$submenu['plugins.php'] = $new_plugins_order;

		return $menu_order;
	}
}
