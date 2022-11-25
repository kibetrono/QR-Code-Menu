<?php

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) exit;
if ( ! class_exists( 'Qr_Menu' ) ) :

	/**
	 * Main Qr_Menu Class.
	 *
	 * @package		QRMENU
	 * @subpackage	Classes/Qr_Menu
	 * @since		1.0.0
	 * @author		David Rono
	 */
	final class Qr_Menu {

		/**
		 * The real instance
		 *
		 * @access	private
		 * @since	1.0.0
		 * @var		object|Qr_Menu
		 */
		private static $instance;

		/**
		 * QRMENU helpers object.
		 *
		 * @access	public
		 * @since	1.0.0
		 * @var		object|Qr_Menu_Helpers
		 */
		public $helpers;

		/**
		 * QRMENU settings object.
		 *
		 * @access	public
		 * @since	1.0.0
		 * @var		object|Qr_Menu_Settings
		 */
		public $settings;

		/**
		 * Throw error on object clone.
		 *
		 * Cloning instances of the class is forbidden.
		 *
		 * @access	public
		 * @since	1.0.0
		 * @return	void
		 */
		public function __clone() {
			_doing_it_wrong( __FUNCTION__, __( 'You are not allowed to clone this class.', 'qr-menu' ), '1.0.0' );
		}

		/**
		 * Disable unserializing of the class.
		 *
		 * @access	public
		 * @since	1.0.0
		 * @return	void
		 */
		public function __wakeup() {
			_doing_it_wrong( __FUNCTION__, __( 'You are not allowed to unserialize this class.', 'qr-menu' ), '1.0.0' );
		}

		/**
		 * Main Qr_Menu Instance.
		 *
		 * Insures that only one instance of Qr_Menu exists in memory at any one
		 * time. Also prevents needing to define globals all over the place.
		 *
		 * @access		public
		 * @since		1.0.0
		 * @static
		 * @return		object|Qr_Menu	The one true Qr_Menu
		 */
		public static function instance() {
			if ( ! isset( self::$instance ) && ! ( self::$instance instanceof Qr_Menu ) ) {
				self::$instance					= new Qr_Menu;
				self::$instance->base_hooks();
				self::$instance->includes();
				self::$instance->helpers		= new Qr_Menu_Helpers();
				self::$instance->settings		= new Qr_Menu_Settings();

				//Fire the plugin logic
				new Qr_Menu_Run();

				/**
				 * Fire a custom action to allow dependencies
				 * after the successful plugin setup
				 */
				do_action( 'QRMENU/plugin_loaded' );
			}

			return self::$instance;
		}

		/**
		 * Include required files.
		 *
		 * @access  private
		 * @since   1.0.0
		 * @return  void
		 */
		private function includes() {
			require_once QRMENU_PLUGIN_DIR . 'core/includes/classes/class-qr-menu-helpers.php';
			require_once QRMENU_PLUGIN_DIR . 'core/includes/classes/class-qr-menu-settings.php';

			require_once QRMENU_PLUGIN_DIR . 'core/includes/classes/class-qr-menu-run.php';
		}

		/**
		 * Add base hooks for the core functionality
		 *
		 * @access  private
		 * @since   1.0.0
		 * @return  void
		 */
		private function base_hooks() {
			add_action( 'plugins_loaded', array( self::$instance, 'load_textdomain' ) );
		}

		/**
		 * Loads the plugin language files.
		 *
		 * @access  public
		 * @since   1.0.0
		 * @return  void
		 */
		public function load_textdomain() {
			load_plugin_textdomain( 'qr-menu', FALSE, dirname( plugin_basename( QRMENU_PLUGIN_FILE ) ) . '/languages/' );
		}

	}

endif; // End if class_exists check.