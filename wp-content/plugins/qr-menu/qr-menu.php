<?php
/**
 * QR Menu
 *
 * @package       QRMENU
 * @author        David Rono
 * @version       1.0.0
 *
 * @wordpress-plugin
 * Plugin Name:   QR Menu
 * Plugin URI:     https://example.com/plugins/the-basics/
 * Description:   Automates Restaurant menus
 * Version:       1.0.0
 * Author:        David Rono
 * Author URI:    https://author.example.com/
 * Text Domain:   qr-menu
 * Domain Path:   /languages
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) exit;
// Plugin name
define( 'QRMENU_NAME',			'QR Menu' );

// Plugin version
define( 'QRMENU_VERSION',		'1.0.0' );

// Plugin Root File
define( 'QRMENU_PLUGIN_FILE',	__FILE__ );

// Plugin base
define( 'QRMENU_PLUGIN_BASE',	plugin_basename( QRMENU_PLUGIN_FILE ) );

// Plugin Folder Path
define( 'QRMENU_PLUGIN_DIR',	plugin_dir_path( QRMENU_PLUGIN_FILE ) );

// Plugin Folder URL
define( 'QRMENU_PLUGIN_URL',	plugin_dir_url( QRMENU_PLUGIN_FILE ) );

/**
 * Load the main class for the core functionality
 */
require_once QRMENU_PLUGIN_DIR . 'core/class-qr-menu.php';

/**
 * The main function to load the only instance
 * of our master class.
 *
 * @author  David Rono
 * @since   1.0.0
 * @return  object|Qr_Menu
 */
function QRMENU() {
	return Qr_Menu::instance();
}

QRMENU();
