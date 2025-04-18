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
/*
echo '<div class="gda-meta-box">';

// Table header title
$gda_meta_value = get_post_meta($post->ID, '_gda_meta_key_table_header_title', true);
echo '<div class="gda-meta-row">';
echo '<label for="gda_meta_field_table_header_title">' . __('Table header title:', 'guest-data-app') . '</label>';
echo '<input type="text" id="gda_meta_field_table_header_title" name="gda_meta_field_table_header_title" value="' . esc_attr($gda_meta_value) . '" />';
echo '</div>';

// First name ID
$gda_name_value = get_post_meta($post->ID, '_gda_meta_key_first_name_id', true);
echo '<div class="gda-meta-row">';
echo '<label for="gda_meta_field_first_name_id">' . __('First name ID:', 'guest-data-app') . '</label>';
echo '<input type="number" id="gda_meta_field_first_name_id" name="gda_meta_field_first_name_id" step="0.01" value="' . esc_attr($gda_name_value) . '" />';
echo '<p class="description">' . __('Default ID field 1.3', 'guest-data-app') . '</p>';
echo '</div>';

// Last name ID
$gda_name_value = get_post_meta($post->ID, '_gda_meta_key_last_name_id', true);
echo '<div class="gda-meta-row">';
echo '<label for="gda_meta_field_last_name_id">' . __('Last name ID:', 'guest-data-app') . '</label>';
echo '<input type="number" id="gda_meta_field_last_name_id" name="gda_meta_field_last_name_id" step="0.01" value="' . esc_attr($gda_name_value) . '" />';
echo '<p class="description">' . __('Default field ID 1.6', 'guest-data-app') . '</p>';
echo '</div>';

echo '</div>'; // end .gda-meta-box

echo '<div class="gda-meta-box">';

// Table header title: Reservation
$gda_meta_value = get_post_meta($post->ID, '_gda_meta_key_header_title_res', true);
echo '<div class="gda-meta-row">';
echo '<label for="gda_meta_field_header_title_res">' . __('Reservation table header title:', 'guest-data-app') . '</label>';
echo '<input type="text" id="gda_meta_field_header_title_res" name="gda_meta_field_header_title_res" value="' . esc_attr($gda_meta_value) . '" />';
echo '</div>';

// Reservation #
$gda_res_value = get_post_meta($post->ID, '_gda_meta_key_reservation_id', true);
echo '<div class="gda-meta-row">';
echo '<label for="gda_meta_field_reservation_id">' . __('Reservation ID:', 'guest-data-app') . '</label>';
echo '<input type="number" id="gda_meta_field_reservation_id" name="gda_meta_field_reservation_id" value="' . esc_attr
  ($gda_res_value) . '" />';
echo '<p class="description">' . __('Default field ID 44', 'guest-data-app') . '</p>';
echo '</div>';

echo '</div>'; // end .gda-meta-box

echo '<div class="gda-meta-box">';

// Table header title: Date of arrival
$gda_meta_value_date_of_arrival = get_post_meta($post->ID, '_gda_meta_key_header_date_of_arrival', true);
echo '<div class="gda-meta-row">';
echo '<label for="gda_meta_field_header_date_of_arrival">' . __('Date of arrival table header title:', 'guest-data-app') . '</label>';
echo '<input type="text" id="gda_meta_field_header_date_of_arrival" name="gda_meta_field_header_date_of_arrival" value="' . esc_attr($gda_meta_value_date_of_arrival) . '" />';
echo '</div>';

// Arrival date
$gda_arrival_value = get_post_meta($post->ID, '_gda_meta_key_date_of_arrival_id', true);
echo '<div class="gda-meta-row">';
echo '<label for="gda_meta_field_date_of_arrival_id">' . __('Date of arrival ID:', 'guest-data-app') . '</label>';
echo '<input type="number" id="gda_meta_field_date_of_arrival_id" name="gda_meta_field_date_of_arrival_id" value="' . esc_attr
  ($gda_arrival_value) . '" />';
echo '<p class="description">' . __('Default field ID 46', 'guest-data-app') . '</p>';
echo '</div>';

echo '</div>'; // end .gda-meat-box

echo '<div class="gda-meta-box">';

// Table header title: Date of departure
$gda_meta_value = get_post_meta($post->ID, '_gda_meta_key_header_date_of_departure', true);
echo '<div class="gda-meta-row">';
echo '<label for="gda_meta_field_header_date_of_departure">' . __('Date of departure table header title:',
    'guest-data-app') . '</label>';
echo '<input type="text" id="gda_meta_field_header_date_of_departure" name="gda_meta_field_header_date_of_departure" value="' . esc_attr($gda_meta_value) . '" />';
echo '</div>';

// Depature date
$gda_meta_value = get_post_meta($post->ID, '_gda_meta_key_date_of_departure_id', true);
echo '<div class="gda-meta-row">';
echo '<label for="gda_meta_field_date_of_departure_id">' . __('Date of departure ID:', 'guest-data-app') . '</label>';
echo '<input type="number" id="gda_meta_field_date_of_departure_id" name="gda_meta_field_date_of_departure_id" value="' . esc_attr
  ($gda_meta_value) . '" />';
echo '<p class="description">' . __('Default field ID 47', 'guest-data-app') . '</p>';
echo '</div>';

echo '</div>'; // end .gta-meta-box

echo '<div class="gda-meta-box">';

// Table header title: Cell phone
$gda_meta_value = get_post_meta($post->ID, '_gda_meta_key_header_cell_phone', true);
echo '<div class="gda-meta-row">';
echo '<label for="gda_meta_field_header_cell_phone">' . __('Cell phone table header title:',
    'guest-data-app') . '</label>';
echo '<input type="text" id="gda_meta_field_header_cell_phone" name="gda_meta_field_header_cell_phone" value="' . esc_attr($gda_meta_value) . '" />';
echo '</div>';

// Cell phone
$gda_meta_value = get_post_meta($post->ID, '_gda_meta_key_cell_phone_id', true);
echo '<div class="gda-meta-row">';
echo '<label for="gda_meta_field_cell_phone_id">' . __('Cell phone ID:', 'guest-data-app') . '</label>';
echo '<input type="number" id="gda_meta_field_cell_phone_id" name="gda_meta_field_cell_phone_id" value="' . esc_attr
  ($gda_meta_value) . '" />';
echo '<p class="description">' . __('Default field ID 101', 'guest-data-app') . '</p>';
echo '</div>';

echo '</div>'; // end .gta-meta-box

echo '<div class="gda-meta-box">';

// Table header title: Date of birth
$gda_meta_value = get_post_meta($post->ID, '_gda_meta_key_header_date_of_birth', true);
echo '<div class="gda-meta-row">';
echo '<label for="gda_meta_field_header_date_of_birth">' . __('Date of birth table header title:',
    'guest-data-app') . '</label>';
echo '<input type="text" id="gda_meta_field_header_date_of_birth" name="gda_meta_field_header_date_of_birth" value="' . esc_attr($gda_meta_value) . '" />';
echo '</div>';

// Date of birth
$gda_meta_value = get_post_meta($post->ID, '_gda_meta_key_date_of_birth_id', true);
echo '<div class="gda-meta-row">';
echo '<label for="gda_meta_field_date_of_birth_id">' . __('Date of birth ID:', 'guest-data-app') . '</label>';
echo '<input type="number" id="gda_meta_field_date_of_birth_id" name="gda_meta_field_date_of_birth_id" value="' . esc_attr
  ($gda_meta_value) . '" />';
echo '<p class="description">' . __('Default field ID 24', 'guest-data-app') . '</p>';
echo '</div>';

echo '</div>'; // end .gta-meta-box

echo '<div class="gda-meta-box">';

// Table header title: Body weight
$gda_meta_value = get_post_meta($post->ID, '_gda_meta_key_header_body_weight', true);
echo '<div class="gda-meta-row">';
echo '<label for="gda_meta_field_header_body_weight">' . __('Body weight table header title:',
    'guest-data-app') . '</label>';
echo '<input type="text" id="gda_meta_field_header_body_weight" name="gda_meta_field_header_body_weight" value="' . esc_attr($gda_meta_value) . '" />';
echo '</div>';

// Body weight
$gda_meta_value = get_post_meta($post->ID, '_gda_meta_key_body_weight_id', true);
echo '<div class="gda-meta-row">';
echo '<label for="gda_meta_field_body_weight_id">' . __('Body weight ID:', 'guest-data-app') . '</label>';
echo '<input type="number" id="gda_meta_field_body_weight_id" name="gda_meta_field_body_weight_id" value="' . esc_attr($gda_meta_value) . '" />';
echo '<p class="description">' . __('Default field ID 284', 'guest-data-app') . '</p>';
echo '</div>';

echo '</div>'; // end .gta-meta-box

echo '<div class="gda-meta-box">';

// Table header title:Emergency contact person
$gda_meta_value = get_post_meta($post->ID, '_gda_meta_key_header_emergency_contact', true);
echo '<div class="gda-meta-row">';
echo '<label for="gda_meta_field_header_emergency_contact">' . __('Emergency contact table header title:',
    'guest-data-app') . '</label>';
echo '<input type="text" id="gda_meta_field_header_emergency_contact" name="gda_meta_field_header_emergency_contact" value="' . esc_attr($gda_meta_value) . '" />';
echo '</div>';

// Emergency contact person first name
$gda_meta_value = get_post_meta($post->ID, '_gda_meta_key_ec_first_name_id', true);
echo '<div class="gda-meta-row">';
echo '<label for="gda_meta_field_ec_first_name_id">' . __('First name ID:', 'guest-data-app') . '</label>';
echo '<input type="number" id="gda_meta_field_ec_first_name_id" name="gda_meta_field_ec_first_name_id" step="0.01" value="' . esc_attr($gda_meta_value) . '" />';
echo '<p class="description">' . __('Default field ID 28.3', 'guest-data-app') . '</p>';
echo '</div>';

// Emergency contact person last name
$gda_meta_value = get_post_meta($post->ID, '_gda_meta_key_ec_last_name_id', true);
echo '<div class="gda-meta-row">';
echo '<label for="gda_meta_field_ec_last_name_id">' . __('Last name ID:', 'guest-data-app') . '</label>';
echo '<input type="number" id="gda_meta_field_ec_last_name_id" name="gda_meta_field_ec_last_name_id" step="0.01" value="' . esc_attr($gda_meta_value) . '" />';
echo '<p class="description">' . __('Default field ID 28.6', 'guest-data-app') . '</p>';
echo '</div>';

echo '</div>'; // end .gta-meta-box

echo '<div class="gda-meta-box">';

// Table header title: Relationship to travelor
$gda_meta_value = get_post_meta($post->ID, '_gda_meta_key_header_relationship_to_traveler', true);
echo '<div class="gda-meta-row">';
echo '<label for="gda_meta_field_header_relationship_to_traveler">' . __('Relationship to traveler table header title:',
    'guest-data-app') . '</label>';
echo '<input type="text" id="gda_meta_field_header_relationship_to_traveler" name="gda_meta_field_header_relationship_to_traveler" value="' . esc_attr($gda_meta_value) . '" />';
echo '</div>';

// Reklationship to traveler
$gda_meta_value = get_post_meta($post->ID, '_gda_meta_key_relationship_to_traveler_id', true);
echo '<div class="gda-meta-row">';
echo '<label for="gda_meta_field_relationship_to_traveler_id">' . __('Relationship to traveler ID:', 'guest-data-app') . '</label>';
echo '<input type="number" id="gda_meta_field_relationship_to_traveler_id" name="gda_meta_field_relationship_to_traveler_id" value="' . esc_attr($gda_meta_value) . '" />';
echo '<p class="description">' . __('Default field ID 29', 'guest-data-app') . '</p>';
echo '</div>';

echo '</div>'; // end .gta-meta-box

echo '<div class="gda-meta-box">';

// Table header title: Emergency contact tel
$gda_meta_value = get_post_meta($post->ID, '_gda_meta_key_header_ec_tel_number', true);
echo '<div class="gda-meta-row">';
echo '<label for="gda_meta_field_header_ec_tel_number">' . __('Emergency contact telephone number table header title:',
    'guest-data-app') . '</label>';
echo '<input type="text" id="gda_meta_field_header_ec_tel_number" name="gda_meta_field_header_ec_tel_number" value="' . esc_attr($gda_meta_value) . '" />';
echo '</div>';

// Emergency contact tel
$gda_meta_value = get_post_meta($post->ID, '_gda_meta_key_ec_tel_number_id', true);
echo '<div class="gda-meta-row">';
echo '<label for="gda_meta_field_ec_tel_number_id">' . __('Emergency contact telephone number ID:', 'guest-data-app') . '</label>';
echo '<input type="number" id="gda_meta_field_ec_tel_number_id" name="gda_meta_field_ec_tel_number_id" value="' . esc_attr($gda_meta_value) . '" />';
echo '<p class="description">' . __('Default field ID 30', 'guest-data-app') . '</p>';
echo '</div>';

echo '</div>'; // end .gta-meta-box

echo '<div class="gda-meta-box">';

// Table header title: Did you purchase cancellation insurance?
$gda_meta_value = get_post_meta($post->ID, '_gda_meta_key_header_purchase_cancellation_ins', true);
echo '<div class="gda-meta-row">';
echo '<label for="gda_meta_field_header_purchase_cancellation_ins">' . __('Did you purchase trip cancellation insurance table header title:',
    'guest-data-app') . '</label>';
echo '<input type="text" id="gda_meta_field_header_purchase_cancellation_ins" name="gda_meta_field_header_purchase_cancellation_ins" value="' . esc_attr($gda_meta_value) . '" />';
echo '</div>';

// Did you purchase cancellation insurance?
$gda_meta_value = get_post_meta($post->ID, '_gda_meta_key_purchase_cancellation_ins_id', true);
echo '<div class="gda-meta-row">';
echo '<label for="gda_meta_field_purchase_cancellation_ins_id">' . __('Did you purchase cancellation insurance ID:', 'guest-data-app') . '</label>';
echo '<input type="number" id="gda_meta_field_purchase_cancellation_ins_id" name="gda_meta_field_purchase_cancellation_ins_id" value="' . esc_attr($gda_meta_value) . '" />';
echo '<p class="description">' . __('Default field ID 210', 'guest-data-app') . '</p>';
echo '</div>';

echo '</div>'; // end .gta-meta-box

echo '<div class="gda-meta-box">';

// Table header title: Travel insurance company name
$gda_meta_value = get_post_meta($post->ID, '_gda_meta_key_header_ins_co_name', true);
echo '<div class="gda-meta-row">';
echo '<label for="gda_meta_field_header_ins_co_name">' . __('Travel insurance company name table header title:',
    'guest-data-app') . '</label>';
echo '<input type="text" id="gda_meta_field_header_ins_co_name" name="gda_meta_field_header_ins_co_name" value="' . esc_attr($gda_meta_value) . '" />';
echo '</div>';

// Travel insurance company name
$gda_meta_value = get_post_meta($post->ID, '_gda_meta_key_ins_co_name_id', true);
echo '<div class="gda-meta-row">';
echo '<label for="gda_meta_field_ins_co_name_id">' . __('Travel insurance company name ID:', 'guest-data-app') . '</label>';
echo '<input type="number" id="gda_meta_field_ins_co_name_id" name="gda_meta_field_ins_co_name_id" value="' . esc_attr($gda_meta_value) . '" />';
echo '<p class="description">' . __('Default field ID 207', 'guest-data-app') . '</p>';
echo '</div>';

echo '</div>'; // end .gta-meta-box

echo '<div class="gda-meta-box">';

// Table header title: Travel insurance policy number
$gda_meta_value = get_post_meta($post->ID, '_gda_meta_key_header_ins_co_policy_number', true);
echo '<div class="gda-meta-row">';
echo '<label for="gda_meta_field_header_ins_co_policy_number">' . __('Travel insurance policy number table header title:',
    'guest-data-app') . '</label>';
echo '<input type="text" id="gda_meta_field_header_ins_co_policy_number" name="gda_meta_field_header_ins_co_policy_number" value="' . esc_attr($gda_meta_value) . '" />';
echo '</div>';

// Travel insurance policy number
$gda_meta_value = get_post_meta($post->ID, '_gda_meta_key_ins_co_policy_number_id', true);
echo '<div class="gda-meta-row">';
echo '<label for="gda_meta_field_ins_co_policy_number_id">' . __('Travel insurance policy number ID:', 'guest-data-app') . '</label>';
echo '<input type="number" id="gda_meta_field_ins_co_policy_number_id" name="gda_meta_field_ins_co_policy_number_id" value="' . esc_attr($gda_meta_value) . '" />';
echo '<p class="description">' . __('Default field ID 209', 'guest-data-app') . '</p>';
echo '</div>';

echo '</div>'; // end .gta-meta-box

echo '<div class="gda-meta-box">';

// Table header title: What float are you doing
$gda_meta_value = get_post_meta($post->ID, '_gda_meta_key_header_what_float_doing', true);
echo '<div class="gda-meta-row">';
echo '<label for="gda_meta_field_header_what_float_doing">' . __('What float are you doing? table header title:',
    'guest-data-app') . '</label>';
echo '<input type="text" id="gda_meta_field_header_what_float_doing" name="gda_meta_field_header_what_float_doing" value="' . esc_attr($gda_meta_value) . '" />';
echo '</div>';

// What float are you doing?
$gda_meta_value = get_post_meta($post->ID, '_gda_meta_key_what_float_doing_id', true);
echo '<div class="gda-meta-row">';
echo '<label for="gda_meta_field_what_float_doing_id">' . __('What float are you doing ID:', 'guest-data-app') . '</label>';
echo '<input type="number" id="gda_meta_field_what_float_doing_id" name="gda_meta_field_what_float_doing_id" value="' . esc_attr($gda_meta_value) . '" />';
echo '<p class="description">' . __('Default field ID 288', 'guest-data-app') . '</p>';
echo '</div>';

echo '</div>'; // end .gta-meta-box

echo '<div class="gda-meta-box-container">';

echo '<div class="gda-meta-box-wrapper">';
// Table header title: Arrival airport city/town
$gda_meta_value = get_post_meta($post->ID, '_gda_meta_key_header_arrival_airport', true);
echo '<div class="gda-meta-row">';
echo '<label for="gda_meta_field_header_arrival_airport">' . __('Arrival airport city/town table header title:',
    'guest-data-app') . '</label>';
echo '<input type="text" id="gda_meta_field_header_arrival_airport" name="gda_meta_field_header_arrival_airport" value="' . esc_attr($gda_meta_value) . '" />';
echo '</div>';

// What float are you doing?
$gda_meta_value = get_post_meta($post->ID, '_gda_meta_key_arrival_airport_id', true);
echo '<div class="gda-meta-row">';
echo '<label for="gda_meta_field_arrival_airport_id">' . __('Arrival airport city/town ID:', 'guest-data-app') . '</label>';
echo '<input type="number" id="gda_meta_field_arrival_airport_id" name="gda_meta_field_arrival_airport_id" value="' . esc_attr($gda_meta_value) . '" />';
echo '<p class="description">' . __('Default field ID 289', 'guest-data-app') . '</p>';
echo '</div>';

echo '</div>'; // end .gda-meta-box-wrapper
echo '</div>'; // end .gta-meta-box-container

echo '<div class="gda-meta-box-container">';

echo '<div class="gda-meta-box-wrapper">';
// Table header title: Arrival airline
$gda_meta_value = get_post_meta($post->ID, '_gda_meta_key_header_arrival_airline', true);
echo '<div class="gda-meta-row">';
echo '<label for="gda_meta_field_header_arrival_airline">' . __('Arrival airline table header title:',
    'guest-data-app') . '</label>';
echo '<input type="text" id="gda_meta_field_header_arrival_airline" name="gda_meta_field_header_arrival_airline" value="' . esc_attr($gda_meta_value) . '" />';
echo '</div>';

// Arrival airline
$gda_meta_value = get_post_meta($post->ID, '_gda_meta_key_arrival_airline_id', true);
echo '<div class="gda-meta-row">';
echo '<label for="gda_meta_field_arrival_airline_id">' . __('Arrival airline ID:', 'guest-data-app') . '</label>';
echo '<input type="number" id="gda_meta_field_arrival_airline_id" name="gda_meta_field_arrival_airline_id" value="' . esc_attr($gda_meta_value) . '" />';
echo '<p class="description">' . __('Default field ID 48', 'guest-data-app') . '</p>';
echo '</div>';

echo '</div>'; // end .gda-meta-box-wrapper
echo '</div>'; // end .gta-meta-box-container

echo '<div class="gda-meta-box-container">';

echo '<div class="gda-meta-box-wrapper">';
// Table header title: Other arrival airline
$gda_meta_value = get_post_meta($post->ID, '_gda_meta_key_header_other_arrival_airline', true);
echo '<div class="gda-meta-row">';
echo '<label for="gda_meta_field_header_other_arrival_airline">' . __('Other arrival airline table header title:',
    'guest-data-app') . '</label>';
echo '<input type="text" id="gda_meta_field_header_other_arrival_airline" name="gda_meta_field_header_other_arrival_airline" value="' . esc_attr($gda_meta_value) . '" />';
echo '</div>';

// Arrival airline
$gda_meta_value = get_post_meta($post->ID, '_gda_meta_key_other_arrival_airline_id', true);
echo '<div class="gda-meta-row">';
echo '<label for="gda_meta_field_other_arrival_airline_id">' . __('Other arrival airline ID:', 'guest-data-app') . '</label>';
echo '<input type="number" id="gda_meta_field_other_arrival_airline_id" name="gda_meta_field_other_arrival_airline_id" value="' . esc_attr($gda_meta_value) . '" />';
echo '<p class="description">' . __('Default field ID 50', 'guest-data-app') . '</p>';
echo '</div>';

echo '</div>'; // end .gda-meta-box-wrapper
echo '</div>'; // end .gta-meta-box-container

echo '<div class="gda-meta-box-container">';

echo '<div class="gda-meta-box-wrapper">';
// Table header title: Flight arrival date
$gda_meta_value = get_post_meta($post->ID, '_gda_meta_key_header_flight_arrival_date', true);
echo '<div class="gda-meta-row">';
echo '<label for="gda_meta_field_header_flight_arrival_date">' . __('Flight arrival date table header title:',
    'guest-data-app') . '</label>';
echo '<input type="text" id="gda_meta_field_header_flight_arrival_date" name="gda_meta_field_header_flight_arrival_date" value="' . esc_attr($gda_meta_value) . '" />';
echo '</div>';

// Arrival airline
$gda_meta_value = get_post_meta($post->ID, '_gda_meta_key_flight_arrival_date_id', true);
echo '<div class="gda-meta-row">';
echo '<label for="gda_meta_field_flight_arrival_date_id">' . __('Flight arrival date ID:', 'guest-data-app') . '</label>';
echo '<input type="number" id="gda_meta_field_flight_arrival_date_id" name="gda_meta_field_flight_arrival_date_id" value="' . esc_attr($gda_meta_value) . '" />';
echo '<p class="description">' . __('Default field ID 66', 'guest-data-app') . '</p>';
echo '</div>';

echo '</div>'; // end .gda-meta-box-wrapper
echo '</div>'; // end .gta-meta-box-container

echo '<div class="gda-meta-box-container">';

echo '<div class="gda-meta-box-wrapper">';
// Table header title: Flight arrival number
$gda_meta_value = get_post_meta($post->ID, '_gda_meta_key_header_flight_arrival_number', true);
echo '<div class="gda-meta-row">';
echo '<label for="gda_meta_field_header_flight_arrival_number">' . __('Flight arrival number table header title:',
    'guest-data-app') . '</label>';
echo '<input type="text" id="gda_meta_field_header_flight_arrival_number" name="gda_meta_field_header_flight_arrival_number" value="' . esc_attr($gda_meta_value) . '" />';
echo '</div>';

// Flight arrival number
$gda_meta_value = get_post_meta($post->ID, '_gda_meta_key_flight_arrival_number_id', true);
echo '<div class="gda-meta-row">';
echo '<label for="gda_meta_field_flight_arrival_number_id">' . __('Flight arrival number ID:', 'guest-data-app') . '</label>';
echo '<input type="number" id="gda_meta_field_flight_arrival_number_id" name="gda_meta_field_flight_arrival_number_id" value="' . esc_attr($gda_meta_value) . '" />';
echo '<p class="description">' . __('Default field ID 172', 'guest-data-app') . '</p>';
echo '</div>';

echo '</div>'; // end .gda-meta-box-wrapper
echo '</div>'; // end .gta-meta-box-containe


echo '<div class="gda-meta-box-container">';

echo '<div class="gda-meta-box-wrapper">';
// Table header title: Flight arrival time
$gda_meta_value = get_post_meta($post->ID, '_gda_meta_key_header_flight_arrival_time', true);
echo '<div class="gda-meta-row">';
echo '<label for="gda_meta_field_header_flight_arrival_time">' . __('Flight arrival time table header title:',
    'guest-data-app') . '</label>';
echo '<input type="text" id="gda_meta_field_header_flight_arrival_time" name="gda_meta_field_header_flight_arrival_time" value="' . esc_attr($gda_meta_value) . '" />';
echo '</div>';

// Flight arrival number
$gda_meta_value = get_post_meta($post->ID, '_gda_meta_key_flight_arrival_time_id', true);
echo '<div class="gda-meta-row">';
echo '<label for="gda_meta_field_flight_arrival_time_id">' . __('Flight arrival time ID:', 'guest-data-app') . '</label>';
echo '<input type="number" id="gda_meta_field_flight_arrival_time_id" name="gda_meta_field_flight_arrival_time_id" value="' . esc_attr($gda_meta_value) . '" />';
echo '<p class="description">' . __('Default field ID 60', 'guest-data-app') . '</p>';
echo '</div>';

echo '</div>'; // end .gda-meta-box-wrapper
echo '</div>'; // end .gta-meta-box-containe

echo '<div class="gda-meta-box-container">';

echo '<div class="gda-meta-box-wrapper">';
// Table header title: Flight departure date
$gda_meta_value = get_post_meta($post->ID, '_gda_meta_key_header_flight_departure_date', true);
echo '<div class="gda-meta-row">';
echo '<label for="gda_meta_field_header_flight_departure_date">' . __('Flight departure date table header title:',
    'guest-data-app') . '</label>';
echo '<input type="text" id="gda_meta_field_header_flight_departure_date" name="gda_meta_field_header_flight_departure_date" value="' . esc_attr($gda_meta_value) . '" />';
echo '</div>';

// Flight departure date
$gda_meta_value = get_post_meta($post->ID, '_gda_meta_key_flight_departure_date_id', true);
echo '<div class="gda-meta-row">';
echo '<label for="gda_meta_field_flight_departure_date_id">' . __('Flight departure date ID:', 'guest-data-app') . '</label>';
echo '<input type="number" id="gda_meta_field_flight_departure_date_id" name="gda_meta_field_flight_departure_date_id" value="' . esc_attr($gda_meta_value) . '" />';
echo '<p class="description">' . __('Default field ID 67', 'guest-data-app') . '</p>';
echo '</div>';

echo '</div>'; // end .gda-meta-box-wrapper
echo '</div>'; // end .gta-meta-box-containe

echo '<div class="gda-meta-box-container">';

echo '<div class="gda-meta-box-wrapper">';
// Table header title: Flight departure number
$gda_meta_value = get_post_meta($post->ID, '_gda_meta_key_header_flight_departure_number', true);
echo '<div class="gda-meta-row">';
echo '<label for="gda_meta_field_header_flight_departure_number">' . __('Flight departure number table header title:',
    'guest-data-app') . '</label>';
echo '<input type="text" id="gda_meta_field_header_flight_departure_number" name="gda_meta_field_header_flight_departure_number" value="' . esc_attr($gda_meta_value) . '" />';
echo '</div>';

// Flight departure number
$gda_meta_value = get_post_meta($post->ID, '_gda_meta_key_flight_departure_number_id', true);
echo '<div class="gda-meta-row">';
echo '<label for="gda_meta_field_flight_departure_number_id">' . __('Flight departure number ID:', 'guest-data-app') .
  '</label>';
echo '<input type="number" id="gda_meta_field_flight_departure_number_id" name="gda_meta_field_flight_departure_number_id" value="' . esc_attr($gda_meta_value) . '" />';
echo '<p class="description">' . __('Default field ID 58', 'guest-data-app') . '</p>';
echo '</div>';

echo '</div>'; // end .gda-meta-box-wrapper
echo '</div>'; // end .gta-meta-box-containe

echo '<div class="gda-meta-box-container">';

echo '<div class="gda-meta-box-wrapper">';
// Table header title: Flight departure number
$gda_meta_value = get_post_meta($post->ID, '_gda_meta_key_header_flight_departure_time', true);
echo '<div class="gda-meta-row">';
echo '<label for="gda_meta_field_header_flight_departure_time">' . __('Flight departure time table header title:',
    'guest-data-app') . '</label>';
echo '<input type="text" id="gda_meta_field_header_flight_departure_time" name="gda_meta_field_header_flight_departure_time" value="' . esc_attr($gda_meta_value) . '" />';
echo '</div>';

// Flight departure number
$gda_meta_value = get_post_meta($post->ID, '_gda_meta_key_flight_departure_time_id', true);
echo '<div class="gda-meta-row">';
echo '<label for="gda_meta_field_flight_departure_time_id">' . __('Flight departure time ID:', 'guest-data-app') .
  '</label>';
echo '<input type="number" id="gda_meta_field_flight_departure_time_id" name="gda_meta_field_flight_departure_time_id" value="' . esc_attr($gda_meta_value) . '" />';
echo '<p class="description">' . __('Default field ID 61', 'guest-data-app') . '</p>';
echo '</div>';

echo '</div>'; // end .gda-meta-box-wrapper
echo '</div>'; // end .gta-meta-box-containe
*/





