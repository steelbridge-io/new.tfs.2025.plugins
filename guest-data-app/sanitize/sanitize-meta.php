<?php


  if (isset($_POST['gda_meta_field'])) {
    $gda_data = sanitize_text_field($_POST['gda_meta_field']);
    update_post_meta($post_id, '_gda_meta_key', $gda_data);
  }

if (isset($_POST['gda_meta_field_waiver_url'])) {
 $gda_waiver_url = esc_url_raw($_POST['gda_meta_field_waiver_url']);
 update_post_meta($post_id, '_gda_meta_key_waiver_url', $gda_waiver_url);
}

 /* if (isset($_POST['gda_meta_field_table_header_title'])) {
    $gda_data = sanitize_text_field($_POST['gda_meta_field_table_header_title']);
    update_post_meta($post_id, '_gda_meta_key_table_header_title', $gda_data);
  }

  if (isset($_POST['gda_meta_field_first_name_id'])) {
    $gda_data = sanitize_text_field($_POST['gda_meta_field_first_name_id']);
    update_post_meta($post_id, '_gda_meta_key_first_name_id', $gda_data);
  }

  if (isset($_POST['gda_meta_field_last_name_id'])) {
    $gda_data = sanitize_text_field($_POST['gda_meta_field_last_name_id']);
    update_post_meta($post_id, '_gda_meta_key_last_name_id', $gda_data);
  }

  if (isset($_POST['gda_meta_field_header_title_res'])) {
    $gda_data = sanitize_text_field($_POST['gda_meta_field_header_title_res']);
    update_post_meta($post_id, '_gda_meta_key_header_title_res', $gda_data);
  }

  if (isset($_POST['gda_meta_field_reservation_id'])) {
    $gda_data = sanitize_text_field($_POST['gda_meta_field_reservation_id']);
    update_post_meta($post_id, '_gda_meta_key_reservation_id', $gda_data);
  }

  if (isset($_POST['gda_meta_field_header_date_of_arrival'])) {
    $gda_data = sanitize_text_field($_POST['gda_meta_field_header_date_of_arrival']);
    update_post_meta($post_id, '_gda_meta_key_header_date_of_arrival', $gda_data);
  }

  if (isset($_POST['gda_meta_field_date_of_arrival_id'])) {
    $gda_arrival_data = sanitize_text_field($_POST['gda_meta_field_date_of_arrival_id']);
    update_post_meta($post_id, '_gda_meta_key_date_of_arrival_id', $gda_arrival_data);
  }

  if (isset($_POST['gda_meta_field_header_date_of_departure'])) {
    $gda_data = sanitize_text_field($_POST['gda_meta_field_header_date_of_departure']);
    update_post_meta($post_id, '_gda_meta_key_header_date_of_departure', $gda_data);
  }

  if (isset($_POST['gda_meta_field_date_of_departure_id'])) {
    $gda_data = sanitize_text_field($_POST['gda_meta_field_date_of_departure_id']);
    update_post_meta($post_id, '_gda_meta_key_date_of_departure_id', $gda_data);
  }

  if (isset($_POST['gda_meta_field_header_cell_phone'])) {
    $gda_data = sanitize_text_field($_POST['gda_meta_field_header_cell_phone']);
    update_post_meta($post_id, '_gda_meta_key_header_cell_phone', $gda_data);
  }

  if (isset($_POST['gda_meta_field_cell_phone_id'])) {
    $gda_data = sanitize_text_field($_POST['gda_meta_field_cell_phone_id']);
    update_post_meta($post_id, '_gda_meta_key_cell_phone_id', $gda_data);
  }

  if (isset($_POST['gda_meta_field_header_date_of_birth'])) {
    $gda_data = sanitize_text_field($_POST['gda_meta_field_header_date_of_birth']);
    update_post_meta($post_id, '_gda_meta_key_header_date_of_birth', $gda_data);
  }

  if (isset($_POST['gda_meta_field_date_of_birth_id'])) {
    $gda_data = sanitize_text_field($_POST['gda_meta_field_date_of_birth_id']);
    update_post_meta($post_id, '_gda_meta_key_date_of_birth_id', $gda_data);
  }

if (isset($_POST['gda_meta_field_header_body_weight'])) {
  $gda_data = sanitize_text_field($_POST['gda_meta_field_header_body_weight']);
  update_post_meta($post_id, '_gda_meta_key_header_body_weight', $gda_data);
}

if (isset($_POST['gda_meta_field_body_weight_id'])) {
  $gda_data = sanitize_text_field($_POST['gda_meta_field_body_weight_id']);
  update_post_meta($post_id, '_gda_meta_key_body_weight_id', $gda_data);
}

if (isset($_POST['gda_meta_field_header_emergency_contact'])) {
  $gda_data = sanitize_text_field($_POST['gda_meta_field_header_emergency_contact']);
  update_post_meta($post_id, '_gda_meta_key_header_emergency_contact', $gda_data);
}

if (isset($_POST['gda_meta_field_ec_first_name_id'])) {
  $gda_data = sanitize_text_field($_POST['gda_meta_field_ec_first_name_id']);
  update_post_meta($post_id, '_gda_meta_key_ec_first_name_id', $gda_data);
}

if (isset($_POST['gda_meta_field_ec_last_name_id'])) {
  $gda_data = sanitize_text_field($_POST['gda_meta_field_ec_last_name_id']);
  update_post_meta($post_id, '_gda_meta_key_ec_last_name_id', $gda_data);
}

if (isset($_POST['gda_meta_field_header_relationship_to_traveler'])) {
  $gda_data = sanitize_text_field($_POST['gda_meta_field_header_relationship_to_traveler']);
  update_post_meta($post_id, '_gda_meta_key_header_relationship_to_traveler', $gda_data);
}

if (isset($_POST['gda_meta_field_relationship_to_traveler_id'])) {
  $gda_data = sanitize_text_field($_POST['gda_meta_field_relationship_to_traveler_id']);
  update_post_meta($post_id, '_gda_meta_key_relationship_to_traveler_id', $gda_data);
}

if (isset($_POST['gda_meta_field_header_ec_tel_number'])) {
  $gda_data = sanitize_text_field($_POST['gda_meta_field_header_ec_tel_number']);
  update_post_meta($post_id, '_gda_meta_key_header_ec_tel_number', $gda_data);
}

if (isset($_POST['gda_meta_field_ec_tel_number_id'])) {
  $gda_data = sanitize_text_field($_POST['gda_meta_field_ec_tel_number_id']);
  update_post_meta($post_id, '_gda_meta_key_ec_tel_number_id', $gda_data);
}

if (isset($_POST['gda_meta_field_header_purchase_cancellation_ins'])) {
  $gda_data = sanitize_text_field($_POST['gda_meta_field_header_purchase_cancellation_ins']);
  update_post_meta($post_id, '_gda_meta_key_header_purchase_cancellation_ins', $gda_data);
}

if (isset($_POST['gda_meta_field_purchase_cancellation_ins_id'])) {
  $gda_data = sanitize_text_field($_POST['gda_meta_field_purchase_cancellation_ins_id']);
  update_post_meta($post_id, '_gda_meta_key_purchase_cancellation_ins_id', $gda_data);
}

if (isset($_POST['gda_meta_field_header_ins_co_name'])) {
  $gda_data = sanitize_text_field($_POST['gda_meta_field_header_ins_co_name']);
  update_post_meta($post_id, '_gda_meta_key_header_ins_co_name', $gda_data);
}

if (isset($_POST['gda_meta_field_ins_co_name_id'])) {
  $gda_data = sanitize_text_field($_POST['gda_meta_field_ins_co_name_id']);
  update_post_meta($post_id, '_gda_meta_key_ins_co_name_id', $gda_data);
}

if (isset($_POST['gda_meta_field_header_ins_co_policy_number'])) {
  $gda_data = sanitize_text_field($_POST['gda_meta_field_header_ins_co_policy_number']);
  update_post_meta($post_id, '_gda_meta_key_header_ins_co_policy_number', $gda_data);
}

if (isset($_POST['gda_meta_field_ins_co_policy_number_id'])) {
  $gda_data = sanitize_text_field($_POST['gda_meta_field_ins_co_policy_number_id']);
  update_post_meta($post_id, '_gda_meta_key_ins_co_policy_number_id', $gda_data);
}

if (isset($_POST['gda_meta_field_header_what_float_doing'])) {
  $gda_data = sanitize_text_field($_POST['gda_meta_field_header_what_float_doing']);
  update_post_meta($post_id, '_gda_meta_key_header_what_float_doing', $gda_data);
}

if (isset($_POST['gda_meta_field_what_float_doing_id'])) {
  $gda_data = sanitize_text_field($_POST['gda_meta_field_what_float_doing_id']);
  update_post_meta($post_id, '_gda_meta_key_what_float_doing_id', $gda_data);
}

if (isset($_POST['gda_meta_field_header_arrival_airport'])) {
  $gda_data = sanitize_text_field($_POST['gda_meta_field_header_arrival_airport']);
  update_post_meta($post_id, '_gda_meta_key_header_arrival_airport', $gda_data);
}

if (isset($_POST['gda_meta_field_arrival_airport_id'])) {
  $gda_data = sanitize_text_field($_POST['gda_meta_field_arrival_airport_id']);
  update_post_meta($post_id, '_gda_meta_key_arrival_airport_id', $gda_data);
}

if (isset($_POST['gda_meta_field_header_arrival_airline'])) {
  $gda_data = sanitize_text_field($_POST['gda_meta_field_header_arrival_airline']);
  update_post_meta($post_id, '_gda_meta_key_header_arrival_airline', $gda_data);
}

if (isset($_POST['gda_meta_field_arrival_airline_id'])) {
  $gda_data = sanitize_text_field($_POST['gda_meta_field_arrival_airline_id']);
  update_post_meta($post_id, '_gda_meta_key_arrival_airline_id', $gda_data);
}

if (isset($_POST['gda_meta_field_header_other_arrival_airline'])) {
  $gda_data = sanitize_text_field($_POST['gda_meta_field_header_other_arrival_airline']);
  update_post_meta($post_id, '_gda_meta_key_header_other_arrival_airline', $gda_data);
}

if (isset($_POST['gda_meta_field_other_arrival_airline_id'])) {
  $gda_data = sanitize_text_field($_POST['gda_meta_field_other_arrival_airline_id']);
  update_post_meta($post_id, '_gda_meta_key_other_arrival_airline_id', $gda_data);
}

if (isset($_POST['gda_meta_field_header_flight_arrival_date'])) {
  $gda_data = sanitize_text_field($_POST['gda_meta_field_header_flight_arrival_date']);
  update_post_meta($post_id, '_gda_meta_key_header_flight_arrival_date', $gda_data);
}

if (isset($_POST['gda_meta_field_flight_arrival_date_id'])) {
  $gda_data = sanitize_text_field($_POST['gda_meta_field_flight_arrival_date_id']);
  update_post_meta($post_id, '_gda_meta_key_flight_arrival_date_id', $gda_data);
}

if (isset($_POST['gda_meta_field_header_flight_arrival_number'])) {
  $gda_data = sanitize_text_field($_POST['gda_meta_field_header_flight_arrival_number']);
  update_post_meta($post_id, '_gda_meta_key_header_flight_arrival_number', $gda_data);
}

if (isset($_POST['gda_meta_field_flight_arrival_number_id'])) {
  $gda_data = sanitize_text_field($_POST['gda_meta_field_flight_arrival_number_id']);
  update_post_meta($post_id, '_gda_meta_key_flight_arrival_number_id', $gda_data);
}

if (isset($_POST['gda_meta_field_header_flight_arrival_time'])) {
  $gda_data = sanitize_text_field($_POST['gda_meta_field_header_flight_arrival_time']);
  update_post_meta($post_id, '_gda_meta_key_header_flight_arrival_time', $gda_data);
}

if (isset($_POST['gda_meta_field_flight_arrival_time_id'])) {
  $gda_data = sanitize_text_field($_POST['gda_meta_field_flight_arrival_time_id']);
  update_post_meta($post_id, '_gda_meta_key_flight_arrival_time_id', $gda_data);
}

if (isset($_POST['gda_meta_field_header_flight_departure_date'])) {
  $gda_data = sanitize_text_field($_POST['gda_meta_field_header_flight_departure_date']);
  update_post_meta($post_id, '_gda_meta_key_header_flight_departure_date', $gda_data);
}

if (isset($_POST['gda_meta_field_flight_departure_date_id'])) {
  $gda_data = sanitize_text_field($_POST['gda_meta_field_flight_departure_date_id']);
  update_post_meta($post_id, '_gda_meta_key_flight_departure_date_id', $gda_data);
}

if (isset($_POST['gda_meta_field_header_flight_departure_number'])) {
  $gda_data = sanitize_text_field($_POST['gda_meta_field_header_flight_departure_number']);
  update_post_meta($post_id, '_gda_meta_key_header_flight_departure_number', $gda_data);
}

if (isset($_POST['gda_meta_field_flight_departure_number_id'])) {
  $gda_data = sanitize_text_field($_POST['gda_meta_field_flight_departure_number_id']);
  update_post_meta($post_id, '_gda_meta_key_flight_departure_number_id', $gda_data);
}

if (isset($_POST['gda_meta_field_header_flight_departure_time'])) {
  $gda_data = sanitize_text_field($_POST['gda_meta_field_header_flight_departure_time']);
  update_post_meta($post_id, '_gda_meta_key_header_flight_departure_time', $gda_data);
}

if (isset($_POST['gda_meta_field_flight_departure_time_id'])) {
  $gda_data = sanitize_text_field($_POST['gda_meta_field_flight_departure_time_id']);
  update_post_meta($post_id, '_gda_meta_key_flight_departure_time_id', $gda_data);
}
 */


