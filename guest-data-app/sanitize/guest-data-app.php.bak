<?php

/**
 * Plugin Name: Guest Data App
 * Plugin URI: https://example.com/guest-data-app
 * Description: A plugin to manage travel guest data. It includes functionality to add, edit, and manage guest
 * records and associated templates.
 * Version: 1.0.0
 * Author: Chris Parsons
 * Author URI: https://example.com
 * License: GPLv2 or later
 * Text Domain: guest-data-app
 * Domain Path: /languages
 */

if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly
}

// Register meta box
add_action('add_meta_boxes', 'gda_register_meta_box');
function gda_register_meta_box() {
	add_meta_box('gda_meta_box', __('Guest Data App', 'guest-data-app'), 'gda_meta_box_callback', 'travel-form');
}

// Enqueue admin styles specifically for this plugin
add_action('admin_enqueue_scripts', 'gda_enqueue_admin_styles');
function gda_enqueue_admin_styles($hook_suffix) {
	global $post;
	if ($hook_suffix == 'post.php' || $hook_suffix == 'post-new.php') {
		if ($post->post_type == 'travel-form') {
			$template_file = get_post_meta($post->ID, '_wp_page_template', true);
			if ($template_file === 'questionnaire-templates/guest-data-template.php') {
				wp_enqueue_style('gda_admin_styles', plugin_dir_url(__FILE__) . 'assets/css/admin-style.css');
			}
		}
	}
}

// Meta box callback function
function gda_meta_box_callback($post) {
	$template_file = get_post_meta($post->ID, '_wp_page_template', true);
	if ($template_file === 'questionnaire-templates/guest-data-template.php') {
		wp_nonce_field('gda_save_meta_box_data', 'gda_meta_box_nonce');

    require_once __DIR__ . '/questionnaire/questionnaire.php';

	} else {
		echo '<p>' . __('This meta box is only available for the "guest-data-template.php" template', 'guest-data-app') . '</p>';
	}
}
// Save meta box data
add_action('save_post', 'gda_save_meta_box_data');

function gda_save_meta_box_data($post_id)
{
  if (!isset($_POST['gda_meta_box_nonce'])) {
    return;
  }

  if (!wp_verify_nonce($_POST['gda_meta_box_nonce'], 'gda_save_meta_box_data')) {
    return;
  }

  if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
    return;
  }

  if (!current_user_can('edit_post', $post_id)) {
    return;
  }

  global $post_id;

  require_once __DIR__ . '/sanitize/sanitize-meta.php';

}