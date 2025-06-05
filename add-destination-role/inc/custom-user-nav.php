<?php

// Add these functions to your existing plugin

// Filter the navigation menu to add multi-destination user links
function add_multi_destination_nav_items($items, $args) {
 // Only add for logged-in multi-destination users
 if (!is_user_logged_in()) {
  return $items;
 }

 $current_user = wp_get_current_user();
 if (!in_array('multi-destination', (array) $current_user->roles)) {
  return $items;
 }

 // You can target specific menu locations - adjust 'primary' to match your theme's menu location
 if ($args->theme_location !== 'multi-destination-menu') {
  return $items;
 }

 $user_id = $current_user->ID;
 $destination_items = '';

 // Build the destination menu items
 for ($i = 1; $i <= 5; $i++) {
  $url = get_user_meta($user_id, 'multi_dest_url_' . $i, true);
  $label = get_user_meta($user_id, 'multi_dest_label_' . $i, true);

  if (!empty($url)) {
   $button_text = !empty($label) ? $label : 'Destination ' . $i;
   $destination_items .= '<li class="menu-item menu-item-type-custom multi-dest-nav-item">
                <a href="' . esc_url($url) . '" class="nav-link multi-dest-link" target="_blank">' . esc_html($button_text) . '</a>
            </li>';
  }
 }

 // Add the destination items to the menu
 if (!empty($destination_items)) {
  $items .= $destination_items;
 }

 return $items;
}
add_filter('wp_nav_menu_items', 'add_multi_destination_nav_items', 10, 2);
