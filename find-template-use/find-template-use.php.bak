<?php

/*
Plugin Name: Find Template Use
Plugin URI: https://example.com/list-pages-using-template
Description: A plugin to list all pages in a WordPress site that are using a specific template.
Version: 1.0
Author: Your Name
Author URI: https://steelbridge.io
License: GPL2
License URI: https://www.gnu.org/licenses/gpl-2.0.html
Text Domain: list-pages-using-template
*/

add_action('admin_menu', 'list_pages_using_template_menu');

function list_pages_using_template_menu() {
  add_menu_page('Pages Using Template', 'Pages Using Template', 'manage_options', 'pages-using-template', 'list_pages_using_template_display');
}

function list_pages_using_template_display() {
  $template_file = 'page-templates/basic-page-template.php'; // Full relative path to the template file.

  // Retrieve pages using the specified template
  $pages = get_pages(array(
    'meta_key' => '_wp_page_template',
    'meta_value' => $template_file
  ));

  // Debugging: Output the retrieved pages array
  echo '<h2>Pages Using Template: ' . esc_html($template_file) . '</h2>';
  echo '<pre>';
  print_r($pages); // Ensure there are pages being fetched
  echo '</pre>';

  // Display the list of pages
  echo '<ul>';
  foreach ($pages as $page) {
    echo '<li><a href="' . get_edit_post_link($page->ID) . '">' . get_the_title($page->ID) . '</a></li>';
  }
  echo '</ul>';
}