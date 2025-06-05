<?php
/*
Plugin Name: Add Destination Role and Redirect
Description: Adds custom user roles called "Destination" and "Travel Manager" and redirects users with these roles to specific customizable posts upon login. Adds custom dashboard widgets with the link and title of the assigned private pages.
Version: 1.9
Author: Your Name
*/

// Prevent direct access
if (!defined('ABSPATH')) {
 exit;
}

//require_once plugin_dir_path(__FILE__) . 'inc/requested-destination.php';
require_once plugin_dir_path(__FILE__) . 'inc/custom-user-nav.php';

// Function to add the 'destination' role
function add_destination_role() {
 add_role(
  'destination',
  'Destination',
  array(
   'read'                     => true,
   'edit_posts'               => false,
   'delete_posts'             => false,
   'read_private_posts'       => true,
  )
 );
}
add_action('init', 'add_destination_role');

// Function to add the 'multi-destination' role
function add_multi_destination_role() {
 add_role(
  'multi-destination',
  'Multi-Destination',
  array(
   'read'                     => true,
   'edit_posts'               => false,
   'delete_posts'             => false,
   'read_private_posts'       => true,
  )
 );
}
add_action('init', 'add_multi_destination_role');

// Function to add the 'travel_manager' role
function add_travel_manager_role() {
 add_role(
  'travel_manager',
  'Travel Manager',
  array(
   'read'                               => true,
   'edit_posts'                         => true,
   'delete_posts'                       => true,
   'publish_posts'                      => true,
   'edit_published_posts'               => true,
   'edit_others_posts'                  => true,
   'delete_published_posts'             => true,
   'delete_others_posts'                => true,
   'read_private_posts'                 => true,
   'edit_pages'                         => true,
   'edit_others_pages'                  => true,
   'edit_published_pages'               => true,
   'publish_pages'                      => true,
   'delete_pages'                       => true,
   'delete_others_pages'                => true,
   'delete_published_pages'             => true,
   'read_private_pages'                 => true,
   'gravityforms_edit_forms'            => true,
   'gravityforms_delete_forms'          => true,
   'gravityforms_create_form'           => true,
   'gravityforms_view_entries'          => true,
   'gravityforms_edit_entries'          => true,
   'gravityforms_delete_entries'        => true,
   'gravityforms_view_settings'         => true,
   'gravityforms_edit_settings'         => true,
   'gravityforms_export_entries'        => true,
   'gravityforms_view_entry_notes'      => true,
   'gravityforms_edit_entry_notes'      => true
  )
 );
}
add_action('init', 'add_travel_manager_role');

// Function to add the 'tfs_staff' role
function add_tfs_staff_role() {
 add_role(
  'tfs_staff',
  'TFS Staff',
  array(
   'read'                               => true,
   'edit_posts'                         => false,
   'delete_posts'                       => false,
   'publish_posts'                      => false,
   'edit_published_posts'               => false,
   'edit_others_posts'                  => false,
   'delete_published_posts'             => false,
   'delete_others_posts'                => false,
   'read_private_posts'                 => true,
   'edit_pages'                         => false,
   'edit_others_pages'                  => false,
   'edit_published_pages'               => false,
   'publish_pages'                      => false,
   'delete_pages'                       => false,
   'delete_others_pages'                => false,
   'delete_published_pages'             => false,
   'read_private_pages'                 => true,
   'gravityforms_edit_forms'            => false,
   'gravityforms_delete_forms'          => false,
   'gravityforms_create_form'           => false,
   'gravityforms_view_entries'          => false,
   'gravityforms_edit_entries'          => false,
   'gravityforms_delete_entries'        => false,
   'gravityforms_view_settings'         => false,
   'gravityforms_edit_settings'         => false,
   'gravityforms_export_entries'        => false,
   'gravityforms_view_entry_notes'      => false,
   'gravityforms_edit_entry_notes'      => false
  )
 );
}
add_action('init', 'add_tfs_staff_role');

// Adding Gravity Forms capabilities to 'travel_manager' role
function add_gravity_forms_caps_to_admin() {
 $role = get_role('travel_manager');
 if ($role) {
  $caps = array(
   'gravityforms_edit_forms',
   'gravityforms_delete_forms',
   'gravityforms_create_form',
   'gravityforms_view_entries',
   'gravityforms_edit_entries',
   'gravityforms_delete_entries',
   'gravityforms_view_settings',
   'gravityforms_edit_settings',
   'gravityforms_export_entries',
   'gravityforms_view_entry_notes',
   'gravityforms_edit_entry_notes'
  );
  foreach ($caps as $cap) {
   $role->add_cap($cap);
  }
 }
}
add_action('admin_init', 'add_gravity_forms_caps_to_admin');

// Function to add roles upon plugin activation
function add_roles_on_activation() {
 add_destination_role();
 add_multi_destination_role();
 add_travel_manager_role();
 add_tfs_staff_role();
}
register_activation_hook(__FILE__, 'add_roles_on_activation');

// Function to remove roles upon plugin deactivation
function remove_roles_on_deactivation() {
 remove_role('destination');
 remove_role('multi-destination');
 remove_role('travel_manager');
 remove_role('tfs_staff');
}
register_deactivation_hook(__FILE__, 'remove_roles_on_deactivation');

// Grant the 'destination' role access to private posts
function grant_destination_role_private_access() {
 $role = get_role('destination');
 if ($role) {
  $role->add_cap('read_private_posts');
 }
}
add_action('init', 'grant_destination_role_private_access');

// Add custom user meta fields to the user profile pages
function add_custom_user_meta_field($user) {
 if (in_array('destination', (array) $user->roles) || /*in_array('multi-destination', (array) $user->roles) ||*/ in_array('travel_manager', (array) $user->roles) || in_array('tfs_staff', (array) $user->roles)) { ?>
     <h3><?php _e('Custom Redirect URL', 'custom-user-meta'); ?></h3>
     <table class="form-table">
         <tr>
             <th><label for="custom_redirect_url"><?php _e('Redirect URL'); ?></label></th>
             <td>
                 <input type="text" name="custom_redirect_url" id="custom_redirect_url" value="<?php echo esc_attr(get_user_meta($user->ID, 'custom_redirect_url', true)); ?>" class="regular-text" /><br />
                 <span class="description"><?php _e('Enter the URL to which you want to redirect this user upon login.'); ?></span>
             </td>
         </tr>
     </table>
 <?php }
}
add_action('show_user_profile', 'add_custom_user_meta_field');
add_action('edit_user_profile', 'add_custom_user_meta_field');

// Save the custom user meta field value
function save_custom_user_meta_field($user_id) {
 if (!current_user_can('edit_user', $user_id)) return false;
 if (isset($_POST['custom_redirect_url'])) {
  update_user_meta($user_id, 'custom_redirect_url', sanitize_text_field($_POST['custom_redirect_url']));
 }
}
add_action('personal_options_update', 'save_custom_user_meta_field');
add_action('edit_user_profile_update', 'save_custom_user_meta_field');








// Add these functions to your existing plugin file

// Add custom URL meta fields for multi-destination users only
function add_multi_destination_url_meta_fields($user) {
 if (in_array('multi-destination', (array) $user->roles)) { ?>
     <h3><?php _e('Multi-Destination URLs', 'custom-user-meta'); ?></h3>
     <table class="form-table">
         <tr>
             <th><label for="multi_dest_url_1"><?php _e('Destination URL 1'); ?></label></th>
             <td>
                 <input type="text" name="multi_dest_url_1" id="multi_dest_url_1" value="<?php echo esc_attr(get_user_meta($user->ID, 'multi_dest_url_1', true)); ?>" class="regular-text" />
                 <br />
                 <input type="text" name="multi_dest_label_1" id="multi_dest_label_1" value="<?php echo esc_attr(get_user_meta($user->ID, 'multi_dest_label_1', true)); ?>" class="regular-text" placeholder="Button Label (e.g., Alaska Lodge)" />
                 <br /><span class="description"><?php _e('Enter URL and button label for destination 1.'); ?></span>
             </td>
         </tr>
         <tr>
             <th><label for="multi_dest_url_2"><?php _e('Destination URL 2'); ?></label></th>
             <td>
                 <input type="text" name="multi_dest_url_2" id="multi_dest_url_2" value="<?php echo esc_attr(get_user_meta($user->ID, 'multi_dest_url_2', true)); ?>" class="regular-text" />
                 <br />
                 <input type="text" name="multi_dest_label_2" id="multi_dest_label_2" value="<?php echo esc_attr(get_user_meta($user->ID, 'multi_dest_label_2', true)); ?>" class="regular-text" placeholder="Button Label (e.g., Montana Ranch)" />
                 <br /><span class="description"><?php _e('Enter URL and button label for destination 2.'); ?></span>
             </td>
         </tr>
         <tr>
             <th><label for="multi_dest_url_3"><?php _e('Destination URL 3'); ?></label></th>
             <td>
                 <input type="text" name="multi_dest_url_3" id="multi_dest_url_3" value="<?php echo esc_attr(get_user_meta($user->ID, 'multi_dest_url_3', true)); ?>" class="regular-text" />
                 <br />
                 <input type="text" name="multi_dest_label_3" id="multi_dest_label_3" value="<?php echo esc_attr(get_user_meta($user->ID, 'multi_dest_label_3', true)); ?>" class="regular-text" placeholder="Button Label (e.g., Caribbean Resort)" />
                 <br /><span class="description"><?php _e('Enter URL and button label for destination 3.'); ?></span>
             </td>
         </tr>
         <tr>
             <th><label for="multi_dest_url_4"><?php _e('Destination URL 4'); ?></label></th>
             <td>
                 <input type="text" name="multi_dest_url_4" id="multi_dest_url_4" value="<?php echo esc_attr(get_user_meta($user->ID, 'multi_dest_url_4', true)); ?>" class="regular-text" />
                 <br />
                 <input type="text" name="multi_dest_label_4" id="multi_dest_label_4" value="<?php echo esc_attr(get_user_meta($user->ID, 'multi_dest_label_4', true)); ?>" class="regular-text" placeholder="Button Label (e.g., Patagonia Trip)" />
                 <br /><span class="description"><?php _e('Enter URL and button label for destination 4.'); ?></span>
             </td>
         </tr>
         <tr>
             <th><label for="multi_dest_url_5"><?php _e('Destination URL 5'); ?></label></th>
             <td>
                 <input type="text" name="multi_dest_url_5" id="multi_dest_url_5" value="<?php echo esc_attr(get_user_meta($user->ID, 'multi_dest_url_5', true)); ?>" class="regular-text" />
                 <br />
                 <input type="text" name="multi_dest_label_5" id="multi_dest_label_5" value="<?php echo esc_attr(get_user_meta($user->ID, 'multi_dest_label_5', true)); ?>" class="regular-text" placeholder="Button Label (e.g., New Zealand Tour)" />
                 <br /><span class="description"><?php _e('Enter URL and button label for destination 5.'); ?></span>
             </td>
         </tr>
     </table>
 <?php }
}
add_action('show_user_profile', 'add_multi_destination_url_meta_fields');
add_action('edit_user_profile', 'add_multi_destination_url_meta_fields');

// Save the multi-destination URL meta field values
function save_multi_destination_url_meta_fields($user_id) {
 if (!current_user_can('edit_user', $user_id)) return false;

 // Save URLs
 for ($i = 1; $i <= 5; $i++) {
  if (isset($_POST['multi_dest_url_' . $i])) {
   update_user_meta($user_id, 'multi_dest_url_' . $i, sanitize_url($_POST['multi_dest_url_' . $i]));
  }
  if (isset($_POST['multi_dest_label_' . $i])) {
   update_user_meta($user_id, 'multi_dest_label_' . $i, sanitize_text_field($_POST['multi_dest_label_' . $i]));
  }
 }
}
add_action('personal_options_update', 'save_multi_destination_url_meta_fields');
add_action('edit_user_profile_update', 'save_multi_destination_url_meta_fields');










// Redirect users on login based on their custom user meta field
// Custom redirect after login based on role
function redirect_custom_user_on_login($redirect_to, $request, $user) {
 if (isset($user->roles) && is_array($user->roles)) {
  error_log('User roles: ' . print_r($user->roles, true));

  // Multi-destination users go to home page (index.php)
  if (in_array('multi-destination', $user->roles)) {
   return home_url();
  }

  // Other roles use custom redirect URL
  if (in_array('destination', $user->roles) || in_array('travel_manager', $user->roles) || in_array('tfs_staff', $user->roles)) {
   $custom_redirect_url = get_user_meta($user->ID, 'custom_redirect_url', true);
   error_log('Custom Redirect URL: ' . $custom_redirect_url);
   if ($custom_redirect_url) {
    return $custom_redirect_url;
   }
  }
 }
 return $redirect_to;
}
add_filter('login_redirect', 'redirect_custom_user_on_login', 10, 3);

// Add custom dashboard widget for 'destination' users
function add_destination_dashboard_widget() {
 if (current_user_can('destination')) {
  wp_add_dashboard_widget(
   'destination_dashboard_widget',
   'Your Private Page',
   'display_destination_dashboard_widget_content'
  );
 }
}
add_action('wp_dashboard_setup', 'add_destination_dashboard_widget');

function display_destination_dashboard_widget_content() {
 $user_id = get_current_user_id();
 $custom_redirect_url = get_user_meta($user_id, 'custom_redirect_url', true);
 if ($custom_redirect_url) {
  $page_id = url_to_postid($custom_redirect_url);
  $page_title = get_the_title($page_id);
  echo '<p>You have access to the following private page:</p>';
  echo '<p><strong>Title:</strong> ' . esc_html($page_title) . '</p>';
  echo '<p><strong>Link:</strong> <a href="' . esc_url($custom_redirect_url) . '">' . esc_html($custom_redirect_url) . '</a></p>';
 } else {
  echo '<p>No private page assigned yet.</p>';
 }
}

// Add custom dashboard widget for 'travel_manager' users
function add_travel_manager_dashboard_widget() {
 if (current_user_can('travel_manager')) {
  wp_add_dashboard_widget(
   'travel_manager_dashboard_widget',
   'Your Private Page',
   'display_travel_manager_dashboard_widget_content'
  );
 }
}
add_action('wp_dashboard_setup', 'add_travel_manager_dashboard_widget');

function display_travel_manager_dashboard_widget_content() {
 $user_id = get_current_user_id();
 $custom_redirect_url = get_user_meta($user_id, 'custom_redirect_url', true);
 if ($custom_redirect_url) {
  $page_id = url_to_postid($custom_redirect_url);
  $page_title = get_the_title($page_id);
  echo '<p>You have access to the following private page:</p>';
  echo '<p><strong>Title:</strong> ' . esc_html($page_title) . '</p>';
  echo '<p><strong>Link:</strong> <a href="' . esc_url($custom_redirect_url) . '">' . esc_html($custom_redirect_url) . '</a></p>';
 } else {
  echo '<p>No private page assigned yet.</p>';
 }
}

// Remove default dashboard widgets for 'destination' role
function remove_default_dashboard_widgets() {
 if (current_user_can('destination')) {
  remove_meta_box('dashboard_activity', 'dashboard', 'normal');
  remove_meta_box('dashboard_primary', 'dashboard', 'side');
 }
}
add_action('wp_dashboard_setup', 'remove_default_dashboard_widgets', 20);

// Remove the toolbar option for 'destination' and 'tfs_staff' users
function remove_toolbar_option() {
 if (current_user_can('administrator') || current_user_can('super_admin')) {
  return;
 }
 if (current_user_can('destination') || current_user_can('tfs_staff')) {
  add_filter('show_admin_bar', '__return_false');
 }
}
add_action('after_setup_theme', 'remove_toolbar_option');

// Redirect specific travel forms to login if the user is not logged in
function redirect_travel_form_to_login_wp_hook() {
 if (!is_user_logged_in() &&
  (strpos($_SERVER['REQUEST_URI'], '/travel-form/') === 0 || $_SERVER['REQUEST_URI'] === '/travel-form')) {
  wp_redirect(wp_login_url());
  exit;
 }
}
add_action('template_redirect', 'redirect_travel_form_to_login_wp_hook');