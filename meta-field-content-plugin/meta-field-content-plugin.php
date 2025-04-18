<?php
/*
Plugin Name: Meta Field Content Plugin
Plugin URI: https://steelbridge.io
Description: A plugin for The Fly Shop that contains all the custom meta
field code.
Version: 1.0
Requires at least: 6.5.2
Author: Chris Parsons
Author URI: https://steelbridge.io
License: GPLv2
Text Domain: meta-field-content-plugin
*/

require_once plugin_dir_path( __FILE__ ).'horizontal-carousel.php';
require_once plugin_dir_path( __FILE__ ).'verticle-carousel.php';
include_once 'includes/load-scripts-styles.php';
include_once 'includes/shortcode.php';

/**
 * Retrieve custom fields for a specific post.
 *
 * @param  int  $post_id  The ID of the post to retrieve custom fields for.
 *
 * @return array An associative array containing the custom field values.
 */
function get_custom_fields($post_id) {
	$meta_elements = [
            'title1', 'subtitle1', 'link1', 'description1', 'image1',
            'title2', 'subtitle2', 'link2', 'description2', 'image2',
            'title3', 'subtitle3', 'link3', 'description3', 'image3',
            'title4', 'subtitle4', 'link4', 'description4', 'image4',
            'title5', 'subtitle5', 'link5', 'description5', 'image5',
            'title6', 'subtitle6', 'link6', 'description6', 'image6',
            'title7', 'subtitle7', 'link7', 'description7', 'image7',
            'title8', 'subtitle8', 'link8', 'description8', 'image8',
    ];
	$post_meta_data = [];

	foreach ($meta_elements as $meta) {
		$post_meta_data[$meta] = get_post_meta($post_id, $meta, true);
	}
	return $post_meta_data;
}

add_action('admin_menu', 'meta_field_content_menu');
/**
 * Registers the Meta Field Content menu and its submenus.
 *
 * @return void
 */
function meta_field_content_menu() {
	add_menu_page('Carousel Content Settings', 'Carousel Content', 'manage_options', 'meta-field-content-setting', 'meta_content_settings_page');
	
	add_submenu_page(
		'meta-field-content-setting',
		'Horizontal Carousel Settings',
		'Horizontal Carousel',
		'manage_options',
		'horizontal-slider-settings',
		'horizontal_slider_settings_page'
	);
	
	add_submenu_page(
		'meta-field-content-setting',
		'Vertical Carousel Settings',
		'Vertical Carousel',
		'manage_options',
		'verticle-slider-settings',
		'verticle_slider_settings_page'
	);
}

/**
 * Plugin settings home page
 *
 */
function meta_content_settings_page() {
	echo '<div class="carousel-wrap">' .
	     '<div class="carousel-cont">' .
		 '<div class="carousel-control">';
	// Output the page title
	echo '<h2>Carousel Content Settings</h2>';
	
	// Output the links to your subpages
	echo '<p>This page provides links to the carousel options. Includes the footer carousel and the horizontal carousel found on the home page. Click the corresponding links below to access the editor for each carousel where you can add and delete content.</p>';
	echo '<p><a href="' . esc_url(admin_url('admin.php?page=horizontal-slider-settings')) . '">Horizontal Carousel Settings</a></p>';
	echo '<p><a href="' . esc_url(admin_url('admin.php?page=verticle-slider-settings')) . '">Vertical Carousel Settings</a></p>';
	
	echo '</div>' .
		 '</div>' .
		 '</div>';
	
	// More content for the page can go here
	}
	
add_action( 'admin_enqueue_scripts', 'load_wp_media_files' );
function load_wp_media_files() {
	wp_enqueue_media();
}

/**
 * Footer Verticle Carousel
 */
add_action( 'admin_init', 'meta_field_content_register_settings' );
function meta_field_content_register_settings() {
	register_setting( 'meta_field_content_settings', 'title1', 'sanitize_text_field' );
	register_setting( 'meta_field_content_settings', 'subtitle1', 'sanitize_text_field' );
	register_setting( 'meta_field_content_settings', 'link1', 'esc_url_raw' );
	register_setting( 'meta_field_content_settings', 'description1', 'sanitize_textarea_field' );
	register_setting( 'meta_field_content_settings', 'image1', 'esc_url_raw' );
	
	register_setting( 'meta_field_content_settings', 'title2', 'sanitize_text_field' );
	register_setting( 'meta_field_content_settings', 'subtitle2', 'sanitize_text_field' );
	register_setting( 'meta_field_content_settings', 'link2', 'esc_url_raw' );
	register_setting( 'meta_field_content_settings', 'description2', 'sanitize_textarea_field' );
	register_setting( 'meta_field_content_settings', 'image2', 'esc_url_raw' );
	
	register_setting( 'meta_field_content_settings', 'title3', 'sanitize_text_field' );
	register_setting( 'meta_field_content_settings', 'subtitle3', 'sanitize_text_field' );
	register_setting( 'meta_field_content_settings', 'link3', 'esc_url_raw' );
	register_setting( 'meta_field_content_settings', 'description3', 'sanitize_textarea_field' );
	register_setting( 'meta_field_content_settings', 'image3', 'esc_url_raw' );
	
	register_setting( 'meta_field_content_settings', 'title4', 'sanitize_text_field' );
	register_setting( 'meta_field_content_settings', 'subtitle4', 'sanitize_text_field' );
	register_setting( 'meta_field_content_settings', 'link4', 'esc_url_raw' );
	register_setting( 'meta_field_content_settings', 'description4', 'sanitize_textarea_field' );
	register_setting( 'meta_field_content_settings', 'image4', 'esc_url_raw' );
	
	register_setting( 'meta_field_content_settings', 'title5', 'sanitize_text_field' );
	register_setting( 'meta_field_content_settings', 'subtitle5', 'sanitize_text_field' );
	register_setting( 'meta_field_content_settings', 'link5', 'esc_url_raw' );
	register_setting( 'meta_field_content_settings', 'description5', 'sanitize_textarea_field' );
	register_setting( 'meta_field_content_settings', 'image5', 'esc_url_raw' );
	
	register_setting( 'meta_field_content_settings', 'title6', 'sanitize_text_field' );
	register_setting( 'meta_field_content_settings', 'subtitle6', 'sanitize_text_field' );
	register_setting( 'meta_field_content_settings', 'link6', 'esc_url_raw' );
	register_setting( 'meta_field_content_settings', 'description6', 'sanitize_textarea_field' );
	register_setting( 'meta_field_content_settings', 'image6', 'esc_url_raw' );
	
	register_setting( 'meta_field_content_settings', 'title7', 'sanitize_text_field' );
	register_setting( 'meta_field_content_settings', 'subtitle7', 'sanitize_text_field' );
	register_setting( 'meta_field_content_settings', 'link7', 'esc_url_raw' );
	register_setting( 'meta_field_content_settings', 'description7', 'sanitize_textarea_field' );
	register_setting( 'meta_field_content_settings', 'image7', 'esc_url_raw' );
	
	register_setting( 'meta_field_content_settings', 'title8', 'sanitize_text_field' );
	register_setting( 'meta_field_content_settings', 'subtitle8', 'sanitize_text_field' );
	register_setting( 'meta_field_content_settings', 'link8', 'esc_url_raw' );
	register_setting( 'meta_field_content_settings', 'description8', 'sanitize_textarea_field' );
	register_setting( 'meta_field_content_settings', 'image8', 'esc_url_raw' );
}

/**
 * Horizontal Carousel
 */

add_action( 'admin_init', 'hs_meta_field_content_register_settings' );
function hs_meta_field_content_register_settings() {
	register_setting( 'hs_meta_field_content_settings', 'hs_title1', 'sanitize_text_field' );
	register_setting( 'hs_meta_field_content_settings', 'hs_subtitle1', 'sanitize_text_field' );
	register_setting( 'hs_meta_field_content_settings', 'hs_link1', 'esc_url_raw' );
	register_setting( 'hs_meta_field_content_settings', 'hs_description1', 'sanitize_textarea_field' );
	register_setting( 'hs_meta_field_content_settings', 'hs_image1', 'esc_url_raw' );
	
	register_setting( 'hs_meta_field_content_settings', 'hs_title2', 'sanitize_text_field' );
	register_setting( 'hs_meta_field_content_settings', 'hs_subtitle2', 'sanitize_text_field' );
	register_setting( 'hs_meta_field_content_settings', 'hs_link2', 'esc_url_raw' );
	register_setting( 'hs_meta_field_content_settings', 'hs_description2', 'sanitize_textarea_field' );
	register_setting( 'hs_meta_field_content_settings', 'hs_image2', 'esc_url_raw' );
	
	register_setting( 'hs_meta_field_content_settings', 'hs_title3', 'sanitize_text_field' );
	register_setting( 'hs_meta_field_content_settings', 'hs_subtitle3', 'sanitize_text_field' );
	register_setting( 'hs_meta_field_content_settings', 'hs_link3', 'esc_url_raw' );
	register_setting( 'hs_meta_field_content_settings', 'hs_description3', 'sanitize_textarea_field' );
	register_setting( 'hs_meta_field_content_settings', 'hs_image3', 'esc_url_raw' );
	
	register_setting( 'hs_meta_field_content_settings', 'hs_title4', 'sanitize_text_field' );
	register_setting( 'hs_meta_field_content_settings', 'hs_subtitle4', 'sanitize_text_field' );
	register_setting( 'hs_meta_field_content_settings', 'hs_link4', 'esc_url_raw' );
	register_setting( 'hs_meta_field_content_settings', 'hs_description4', 'sanitize_textarea_field' );
	register_setting( 'hs_meta_field_content_settings', 'hs_image4', 'esc_url_raw' );
	
	register_setting( 'hs_meta_field_content_settings', 'hs_title5', 'sanitize_text_field' );
	register_setting( 'hs_meta_field_content_settings', 'hs_subtitle5', 'sanitize_text_field' );
	register_setting( 'hs_meta_field_content_settings', 'hs_link5', 'esc_url_raw' );
	register_setting( 'hs_meta_field_content_settings', 'hs_description5', 'sanitize_textarea_field' );
	register_setting( 'hs_meta_field_content_settings', 'hs_image5', 'esc_url_raw' );
	
	register_setting( 'hs_meta_field_content_settings', 'hs_title6', 'sanitize_text_field' );
	register_setting( 'hs_meta_field_content_settings', 'hs_subtitle6', 'sanitize_text_field' );
	register_setting( 'hs_meta_field_content_settings', 'hs_link6', 'esc_url_raw' );
	register_setting( 'hs_meta_field_content_settings', 'hs_description6', 'sanitize_textarea_field' );
	register_setting( 'hs_meta_field_content_settings', 'hs_image6', 'esc_url_raw' );
	
	register_setting( 'hs_meta_field_content_settings', 'hs_title7', 'sanitize_text_field' );
	register_setting( 'hs_meta_field_content_settings', 'hs_subtitle7', 'sanitize_text_field' );
	register_setting( 'hs_meta_field_content_settings', 'hs_link7', 'esc_url_raw' );
	register_setting( 'hs_meta_field_content_settings', 'hs_description7', 'sanitize_textarea_field' );
	register_setting( 'hs_meta_field_content_settings', 'hs_image7', 'esc_url_raw' );
	
	register_setting( 'hs_meta_field_content_settings', 'hs_title8', 'sanitize_text_field' );
	register_setting( 'hs_meta_field_content_settings', 'hs_subtitle8', 'sanitize_text_field' );
	register_setting( 'hs_meta_field_content_settings', 'hs_link8', 'esc_url_raw' );
	register_setting( 'hs_meta_field_content_settings', 'hs_description8', 'sanitize_textarea_field' );
	register_setting( 'hs_meta_field_content_settings', 'hs_image8', 'esc_url_raw' );
}

function my_admin_enqueue_scripts() {
	wp_enqueue_media();  // This will enqueue the Media Uploader script
	wp_enqueue_script('my-admin-script', plugins_url('admin-script.js', __FILE__), array('jquery'));
}
add_action( 'admin_enqueue_scripts', 'my_admin_enqueue_scripts' );

/**
 * Renders the meta field content for a post.
 *
 * @return string The HTML content of the meta field content.
 */
function render_meta_field_content() {
	global $post;

	$post_meta_data = get_custom_fields($post->ID);

	// HTML building part
	$html_content = '';
	foreach ($post_meta_data as $key => $data) {
		$html_content .= "<div class='meta-field-content'>";
		$html_content .= "<p>" . $key . " : " . $data . "</p>";
		$html_content .= "</div>";
	}
	return $html_content;
}
add_shortcode('meta_field_content', 'render_meta_field_content');