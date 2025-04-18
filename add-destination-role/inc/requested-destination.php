<?php
// Add the custom field to the user profile page
function add_requested_destination_to_profile($user) {
 $value = get_user_meta($user->ID, 'requested_destination_15', true); // Fetch the saved value
 ?>
    <h3><?php _e('Custom User Information', 'your-plugin-textdomain'); ?></h3>
    <table class="form-table">
        <tr>
            <th><label for="requested_destination_15"><?php _e('Requested Travel Destination', 'your-plugin-textdomain'); ?></label></th>
            <td>
                <input type="text" name="requested_destination_15" id="requested_destination_15" value="<?php echo esc_attr($value); ?>" class="regular-text">
                <p class="description"><?php _e('Please enter your requested travel destination.', 'your-plugin-textdomain'); ?></p>
            </td>
        </tr>
    </table>
 <?php
}

add_action('show_user_profile', 'add_requested_destination_to_profile');
add_action('edit_user_profile', 'add_requested_destination_to_profile');

// Save the custom field value
function save_requested_destination_to_profile($user_id) {
 if (!current_user_can('edit_user', $user_id)) {
  return false;
 }

 if (isset($_POST['requested_destination_15'])) {
  update_user_meta($user_id, 'requested_destination_15', sanitize_text_field($_POST['requested_destination_15']));
 }
}
add_action('personal_options_update', 'save_requested_destination_to_profile');
add_action('edit_user_profile_update', 'save_requested_destination_to_profile');
