<?php
/*
Plugin Name: SBM Image Field
Plugin URI: http://steelbridgemedia.com
Description: Provides custom image uploads for stream report content. Stream Report Image Field.
Author: SteelBridge Media
Version: 2.0.6
Author URI: http://steelbridgemedia.com
*/

include( plugin_dir_path( __FILE__ ) . 'includes/streamreport_image_field.php');
include( plugin_dir_path( __FILE__ ) . 'includes/travel_image_field.php');
include( plugin_dir_path( __FILE__ ) . 'includes/private_image_field.php');
include( plugin_dir_path( __FILE__ ) . 'includes/guide_service_image_field.php');
include( plugin_dir_path( __FILE__ ) . 'includes/schools_image_field.php');
include( plugin_dir_path( __FILE__ ) . 'includes/fish_camp_image_field.php');
include( plugin_dir_path( __FILE__ ) . 'includes/staff_image_field.php');
include( plugin_dir_path( __FILE__ ) . 'includes/front_page_image_field.php');
include( plugin_dir_path( __FILE__ ) . 'includes/signature_image_field.php');
include( plugin_dir_path( __FILE__ ) . 'includes/signature_events_field.php');
include( plugin_dir_path( __FILE__ ) . 'includes/sections_image_field.php');
include( plugin_dir_path( __FILE__ ) . 'includes/holiday_image_field.php');
include( plugin_dir_path( __FILE__ ) . 'includes/outfitters_image_field.php');
include( plugin_dir_path( __FILE__ ) . 'includes/signature_travel_meta.php');
include( plugin_dir_path( __FILE__ ) . 'includes/newstemplate_options.php');
include( plugin_dir_path( __FILE__ ) . 'includes/hero-template-meta.php');
include( plugin_dir_path( __FILE__ ) . 'includes/pdf_travel_uploader.php');

//include( plugin_dir_path( __FILE__ ) . 'css/stream-report-css.php');
include( plugin_dir_path( __FILE__ ) . 'css/sbm-image-field-css.php');

/*
 * Loads the image management javascript using wp enqueue media
 */

function tfs_image_enqueue() {
	global $typenow;
		if( $typenow == 'page' or 'post' or 'travel_cpt' or 'guide_service' or 'fishcamp_cpt' or 'adventures' or 'schools_cpt' or 'flyfishing-news' or 'travel-blog' or 'esb_lodge' ) {
		wp_enqueue_media();

		wp_enqueue_style( 'custom_admin_style_css', plugins_url('css/style.css', __FILE__) );

		wp_enqueue_script( 'custom-js', plugin_dir_url( __FILE__ ) . 'js/custom.js', array('wp-color-picker'), '',
            false );

		// Registers and enqueues the required javascript for image management within wp dashboard.
		wp_register_script( 'meta-box-image', plugin_dir_url( __FILE__ ) . 'meta-box-image.js', array( 'jquery' ) );
		wp_localize_script( 'meta-box-image', 'meta_image',
		array(
		'title' => __( 'Choose or Upload an Image', 'streamreport-textdomain' ),
		'button' => __( 'Use this image', 'streamreport-textdomain' ),
		)
		);
		wp_enqueue_script( 'meta-box-image' );

		wp_register_script( 'holiday-template-meta-box-image', plugin_dir_url( __FILE__ ) . 'js/holiday-template-images.js', array( 'jquery' ) );
		wp_localize_script( 'holiday-template-meta-box-image', 'meta_image',
            array(
                'title' => __( 'Chose or Upload an Image', 'streamreport-textdomain'),
                'button' => __( 'Use this image', 'streamreport-textdomain'),
            )
        );
		wp_enqueue_script('holiday-template-meta-box-image');
	}

}
add_action( 'admin_enqueue_scripts', 'tfs_image_enqueue' );

/**
* Adds the meta box stylesheet when appropriate
*/
function travel_admin_styles(){
	global $typenow;
		if( $typenow == 'page' or 'post' or 'travel_cpt' or 'guide_service' or 'fishcamp_cpt' or 'adventures' or 'schools_cpt' or 'flyfishing-news' ) {
		wp_enqueue_style( 'travel_meta_box_styles', plugin_dir_url( __FILE__ ) . '/inc/meta-box-styles.css' );
		wp_enqueue_style( 'custom_bootstrap_admin_css', plugins_url('css/_sbm-cust-image-bootstrap.css', __FILE__) );
		wp_enqueue_script( 'custom_wp_admin_js', plugins_url('js/bootstrap.min.js', __FILE__));
	}
}
add_action( 'admin_print_styles', 'travel_admin_styles' );
