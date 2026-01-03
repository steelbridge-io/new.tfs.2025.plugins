<?php
// Form ID
$gda_meta_value = get_post_meta($post->ID, '_gda_meta_key', true);
echo '<div class="form-id">';
echo '<label for="gda_meta_field">' . __('Gravity Form ID:', 'guest-data-app') . '</label>';
echo '<input type="number" id="gda_meta_field" name="gda_meta_field" value="' . esc_attr($gda_meta_value) . '" />';
echo '<p class="description">' . __('Enter the ID of the Gravity Form you want to link to this post.', 'guest-data-app') . '</p>';
echo '</div>';

$gda_waiver_url = get_post_meta($post->ID, '_gda_meta_key_waiver_url', true);
echo '<div class="gda-waiver-url">';
echo '<label for="gda_meta_field_waiver_url">' . __('Waiver URL:', 'guest-data-app') . '</label>';
echo '<input type="url" id="gda_meta_field_waiver_url" name="gda_meta_field_waiver_url" value="' . esc_attr($gda_waiver_url) . '" />';
echo '<p class="description">' . __('Enter the URL of the associated Gravity Forms waiver entries you want to link to this post.', 'guest-data-app') . '</p>';
echo '</div>';