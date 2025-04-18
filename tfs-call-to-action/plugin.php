<?php
/**
 * Plugin Name: tfs-call-to-action block
 * Plugin URI: https://steelbridge.io
 * Description: tfs-call-to-action — is a Gutenberg plugin created via create-guten-block.
 * Author: Chris Parsons
 * Author URI: https://steelbridge.io
 * Version: 1.0.1
 * License: GPL2+
 * License URI: https://www.gnu.org/licenses/gpl-2.0.txt
 *
 * @package CGB
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Block Initializer.
 */
require_once plugin_dir_path( __FILE__ ) . 'src/init.php';
