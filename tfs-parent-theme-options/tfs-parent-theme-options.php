<?php
/**
 * Plugin Name: TFS Parent Theme Options
 * Version: 1.0.0
 * Plugin URI: https://steelbridge.io
 * Description: Provides custom options for the TFS Parent Theme used for the sub-sites and associated child themes.
 * Author: Chris Parsons
 * Author URI: http://steelbridge.io
 */

include_once 'inc/landing-page-options.php';
include_once plugin_dir_path(__FILE__) . 'config.php';
include( plugin_dir_path( __FILE__ ) . 'css/parent-theme-css.php');

function tfs_parent_options_enqueue() {
	global $typenow;
	if( $typenow == 'page' or 'post' ) {
		wp_enqueue_media();

		wp_enqueue_style( 'custom_admin_style_css', plugins_url('css/style.css', __FILE__) );

		wp_enqueue_script( 'custom-js', plugin_dir_url( __FILE__ ) . 'js/custom.js', array('wp-color-picker'), '',
			false );

		global $post;
		if ( ! empty( $post ) ) {
		$pageTemplate = get_post_meta( $post->ID, '_wp_page_template', TRUE );
				if ( $pageTemplate == 'page-templates/landing-page.php' ) {
				wp_enqueue_style( 'bootstrap_css', '//cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css', __FILE__ );
				wp_enqueue_script( 'bootstrap-js', '//cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js', array( 'jquery' ), '5.3.3', TRUE );
			}
		}

		// Registers and enqueues the required javascript for image management within wp dashboard.
		wp_register_script( 'wp-meta-box-image', plugin_dir_url( __FILE__ ) . 'js/wp-image-api.js', array( 'jquery' ) );
		wp_localize_script( 'wp-meta-box-image', 'meta_image',
			array(
				'title' => __( 'Choose or Upload an Image', 'landing-page-textdomain' ),
				'button' => __( 'Use this image', 'landing-page-textdomain' ),
			)
		);
		wp_enqueue_script( 'wp-meta-box-image' );

	}

}
add_action( 'admin_enqueue_scripts', 'tfs_parent_options_enqueue' );

