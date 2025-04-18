<?php
/**
 * Foundation Image Widget
 *
 * @package   FoundationImageWidget
 * @author    Chris Parsons
 * @copyright Copyright (c) 2019 Chris Parsons, LLC
 * @license   GPL-2.0+
 *
 * @wordpress-plugin
 * Plugin Name: Foundation Image Widget
 * Plugin URI:  https://steelbridge.io
 * Description: An image widget intended for use with FoundationPress
 * Version:     1.0.0
 * Author:      Chris Parsons
 * Author URI:  http://steelbridge.io
 * License:     GPL-2.0+
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: foundation-image-widget
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Main plugin instance.
 *
 * @since 4.0.0
 * @type Foundation_Image_Widget $foundation_image_widget
 */
global $foundation_image_widget;

if ( ! defined( 'SIW_DIR' ) ) {
	/**
	 * Plugin directory path.
	 *
	 * @since 4.0.0
	 * @type string SIW_DIR
	 */
	define( 'SIW_DIR', plugin_dir_path( __FILE__ ) );
}

/**
 * Check if the installed version of WordPress supports the new media manager.
 *
 * @since 3.0.0
 */
function is_foundation_image_widget_legacy() {
	/**
	 * Whether the installed version of WordPress supports the new media manager.
	 *
	 * @since 4.0.0
	 *
	 * @param bool $is_legacy
	 */
	return apply_filters( 'is_foundation_image_widget_legacy', version_compare( get_bloginfo( 'version' ), '1.0.0', '<=' ) );
}

/**
 * Include functions and libraries.
 */
require_once( SIW_DIR . 'includes/class-foundation-image-widget.php' );
require_once( SIW_DIR . 'includes/class-foundation-image-widget-legacy.php' );
require_once( SIW_DIR . 'includes/class-foundation-image-widget-plugin.php' );
require_once( SIW_DIR . 'includes/class-foundation-image-widget-template-loader.php' );

/**
 * Deprecated main plugin class.
 *
 * @since      3.0.0
 * @deprecated 4.0.0
 */
class Foundation_Image_Widget_Loader extends Foundation_Image_Widget_Plugin {}

// Initialize and load the plugin.
$foundation_image_widget = new Foundation_Image_Widget_Plugin();
add_action( 'plugins_loaded', array( $foundation_image_widget, 'load' ) );
