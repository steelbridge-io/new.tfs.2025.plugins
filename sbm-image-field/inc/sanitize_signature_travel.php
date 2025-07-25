<?php
// Sanitize Signature Destinations

add_action( 'save_post', 'signature_travel_meta_save' );
function signature_travel_meta_save( $post_id )
{
  
  // Checks save status
  $is_autosave = wp_is_post_autosave($post_id);
  $is_revision = wp_is_post_revision($post_id);
  $is_valid_nonce = (isset($_POST['signature_travel_meta_nonce']) && wp_verify_nonce($_POST['signature_travel_meta_nonce'], basename(__FILE__))) ? 'true' : 'false';
  
  // Exits script depending on save status
  if ($is_autosave || $is_revision || !$is_valid_nonce) {
    return;
  }
  
  // Checks for input and saves if needed
  if (isset($_POST['signature-travel-logo'])) {
    update_post_meta($post_id, 'signature-travel-logo', $_POST['signature-travel-logo']);
  }
  
  if (isset($_POST['signature-travel-description'])) {
    update_post_meta($post_id, 'signature-travel-description', $_POST['signature-travel-description']);
  }
	
	if (isset($_POST['prime-travel-header-image'])) {
		update_post_meta($post_id, 'prime-travel-header-image', $_POST['prime-travel-header-image']);
	}
	
	if (isset($_POST['prime-travel-logo'])) {
		update_post_meta($post_id, 'prime-travel-logo', $_POST['prime-travel-logo']);
	}
	
	if (isset($_POST['prime-travel-description'])) {
		update_post_meta($post_id, 'prime-travel-description', $_POST['prime-travel-description']);
	}
	
  // Checks for input and saves for images 4, 5, 6
  if (isset($_POST['signature-travel-csel-checkbox'])) {
    update_post_meta($post_id, 'signature-travel-csel-checkbox', 'yes');
  } else {
    update_post_meta($post_id, 'signature-travel-csel-checkbox', '');
  }
  
  /*if (isset($_POST['signature-travel-csel-1-link'])) {
    update_post_meta($post_id, 'signature-travel-csel-1-link', $_POST['signature-travel-csel-1-link']);
  }*/
  
  if (isset($_POST['signature-travel-csel-1-img'])) {
    update_post_meta($post_id, 'signature-travel-csel-1-img', $_POST['signature-travel-csel-1-img']);
  }
  
  if (isset($_POST['signature-travel-csel-2-link'])) {
    update_post_meta($post_id, 'signature-travel-csel-2-link', $_POST['signature-travel-csel-2-link']);
  }
  
  if (isset($_POST['signature-travel-csel-2-img'])) {
    update_post_meta($post_id, 'signature-travel-csel-2-img', $_POST['signature-travel-csel-2-img']);
  }
  
  if (isset($_POST['signature-travel-csel-3-link'])) {
    update_post_meta($post_id, 'signature-travel-csel-3-link', $_POST['signature-travel-csel-3-link']);
  }
  
  if (isset($_POST['signature-travel-csel-3-img'])) {
    update_post_meta($post_id, 'signature-travel-csel-3-img', $_POST['signature-travel-csel-3-img']);
  }
  
  if (isset($_POST['signature-travel-csel-4-link'])) {
    update_post_meta($post_id, 'signature-travel-csel-4-link', $_POST['signature-travel-csel-4-link']);
  }
  
  if (isset($_POST['signature-travel-csel-4-img'])) {
    update_post_meta($post_id, 'signature-travel-csel-4-img', $_POST['signature-travel-csel-4-img']);
  }
  
  if (isset($_POST['signature-travel-csel-5-link'])) {
    update_post_meta($post_id, 'signature-travel-csel-5-link', $_POST['signature-travel-csel-5-link']);
  }
  
  if (isset($_POST['signature-travel-csel-5-img'])) {
    update_post_meta($post_id, 'signature-travel-csel-5-img', $_POST['signature-travel-csel-5-img']);
  }
  
  if (isset($_POST['signature-travel-csel-6-link'])) {
    update_post_meta($post_id, 'signature-travel-csel-6-link', $_POST['signature-travel-csel-6-link']);
  }
  
  if (isset($_POST['signature-travel-csel-6-img'])) {
    update_post_meta($post_id, 'signature-travel-csel-6-img', $_POST['signature-travel-csel-6-img']);
  }
  
  if (isset($_POST['signature-travel-section-1-title-link'])) {
    update_post_meta($post_id, 'signature-travel-section-1-title-link', $_POST['signature-travel-section-1-title-link']);
  }
  
  if (isset($_POST['signature-travel-section-1-title'])) {
    update_post_meta($post_id, 'signature-travel-section-1-title', $_POST['signature-travel-section-1-title']);
  }
  
  if (isset($_POST['signature-travel-1-image'])) {
    update_post_meta($post_id, 'signature-travel-1-image', $_POST['signature-travel-1-image']);
  }
  
  if (isset($_POST['signature-travel-1-sub_title'])) {
    update_post_meta($post_id, 'signature-travel-1-sub_title', $_POST['signature-travel-1-sub_title']);
  }
  
  if (isset($_POST['signature-travel-1-caption'])) {
    update_post_meta($post_id, 'signature-travel-1-caption', $_POST['signature-travel-1-caption']);
  }
  
  if (isset($_POST['signature-travel-section-2-title-link'])) {
    update_post_meta($post_id, 'signature-travel-section-2-title-link', $_POST['signature-travel-section-2-title-link']);
  }
  
  if (isset($_POST['signature-travel-section-2-title'])) {
    update_post_meta($post_id, 'signature-travel-section-2-title', $_POST['signature-travel-section-2-title']);
  }
  
  if (isset($_POST['signature-travel-2-image'])) {
    update_post_meta($post_id, 'signature-travel-2-image', $_POST['signature-travel-2-image']);
  }
  
  if (isset($_POST['signature-travel-2-sub-title'])) {
    update_post_meta($post_id, 'signature-travel-2-sub-title', $_POST['signature-travel-2-sub-title']);
  }
  
  if (isset($_POST['signature-travel-2-caption'])) {
    update_post_meta($post_id, 'signature-travel-2-caption', $_POST['signature-travel-2-caption']);
  }
  
  if (isset($_POST['signature-travel-section-3-title-link'])) {
    update_post_meta($post_id, 'signature-travel-section-3-title-link', $_POST['signature-travel-section-3-title-link']);
  }
  
  if (isset($_POST['signature-travel-section-3-title'])) {
    update_post_meta($post_id, 'signature-travel-section-3-title', $_POST['signature-travel-section-3-title']);
  }
  
  if (isset($_POST['signature-travel-3-image'])) {
    update_post_meta($post_id, 'signature-travel-3-image', $_POST['signature-travel-3-image']);
  }
  
  if (isset($_POST['signature-travel-3-sub-title'])) {
    update_post_meta($post_id, 'signature-travel-3-sub-title', $_POST['signature-travel-3-sub-title']);
  }
  
  if (isset($_POST['signature-travel-3-caption'])) {
    update_post_meta($post_id, 'signature-travel-3-caption', $_POST['signature-travel-3-caption']);
  }
  
  if (isset($_POST['signature-travel-section-4-title-link'])) {
    update_post_meta($post_id, 'signature-travel-section-4-title-link', $_POST['signature-travel-section-4-title-link']);
  }
  
  if (isset($_POST['signature-travel-section-4-title'])) {
    update_post_meta($post_id, 'signature-travel-section-4-title', $_POST['signature-travel-section-4-title']);
  }
  
  if (isset($_POST['signature-travel-4-image'])) {
    update_post_meta($post_id, 'signature-travel-4-image', $_POST['signature-travel-4-image']);
  }
  
  if (isset($_POST['signature-travel-4-sub-title'])) {
    update_post_meta($post_id, 'signature-travel-4-sub-title', $_POST['signature-travel-4-sub-title']);
  }
  
  if (isset($_POST['signature-travel-4-caption'])) {
    update_post_meta($post_id, 'signature-travel-4-caption', $_POST['signature-travel-4-caption']);
  }
  
  if (isset($_POST['signature-travel-section-5-title-link'])) {
    update_post_meta($post_id, 'signature-travel-section-5-title-link', $_POST['signature-travel-section-5-title-link']);
  }
  
  if (isset($_POST['signature-travel-5-image'])) {
    update_post_meta($post_id, 'signature-travel-5-image', $_POST['signature-travel-5-image']);
  }
  
  if (isset($_POST['signature-travel-section-5-title'])) {
    update_post_meta($post_id, 'signature-travel-section-5-title', $_POST['signature-travel-section-5-title']);
  }
  
  if (isset($_POST['signature-travel-5-sub-title'])) {
    update_post_meta($post_id, 'signature-travel-5-sub-title', $_POST['signature-travel-5-sub-title']);
  }
  
  if (isset($_POST['signature-travel-5-caption'])) {
    update_post_meta($post_id, 'signature-travel-5-caption', $_POST['signature-travel-5-caption']);
  }
  
  if (isset($_POST['signature-travel-section-6-title-link'])) {
    update_post_meta($post_id, 'signature-travel-section-6-title-link', $_POST['signature-travel-section-6-title-link']);
  }
  
  if (isset($_POST['signature-travel-6-image'])) {
    update_post_meta($post_id, 'signature-travel-6-image', $_POST['signature-travel-6-image']);
  }
  
  if (isset($_POST['signature-travel-section-6-title'])) {
    update_post_meta($post_id, 'signature-travel-section-6-title', $_POST['signature-travel-section-6-title']);
  }
  
  if (isset($_POST['signature-travel-6-sub-title'])) {
    update_post_meta($post_id, 'signature-travel-6-sub-title', $_POST['signature-travel-6-sub-title']);
  }
  
  if (isset($_POST['signature-travel-6-caption'])) {
    update_post_meta($post_id, 'signature-travel-6-caption', $_POST['signature-travel-6-caption']);
  }
  
  if (isset($_POST['signature-travel-section-7-title-link'])) {
    update_post_meta($post_id, 'signature-travel-section-7-title-link', $_POST['signature-travel-section-7-title-link']);
  }
  
  if (isset($_POST['signature-travel-7-image'])) {
    update_post_meta($post_id, 'signature-travel-7-image', $_POST['signature-travel-7-image']);
  }
  
  if (isset($_POST['signature-travel-section-7-title'])) {
    update_post_meta($post_id, 'signature-travel-section-7-title', $_POST['signature-travel-section-7-title']);
  }
  
  if (isset($_POST['signature-travel-7-sub-title'])) {
    update_post_meta($post_id, 'signature-travel-7-sub-title', $_POST['signature-travel-7-sub-title']);
  }
  
  if (isset($_POST['signature-travel-7-caption'])) {
    update_post_meta($post_id, 'signature-travel-7-caption', $_POST['signature-travel-7-caption']);
  }
  
  if (isset($_POST['signature-travel-section-8-title-link'])) {
    update_post_meta($post_id, 'signature-travel-section-8-title-link', $_POST['signature-travel-section-8-title-link']);
  }
  
  if (isset($_POST['signature-travel-8-image'])) {
    update_post_meta($post_id, 'signature-travel-8-image', $_POST['signature-travel-8-image']);
  }
  
  if (isset($_POST['signature-travel-section-8-title'])) {
    update_post_meta($post_id, 'signature-travel-section-8-title', $_POST['signature-travel-section-8-title']);
  }
  
  if (isset($_POST['signature-travel-8-sub-title'])) {
    update_post_meta($post_id, 'signature-travel-8-sub-title', $_POST['signature-travel-8-sub-title']);
  }
  
  if (isset($_POST['signature-travel-8-caption'])) {
    update_post_meta($post_id, 'signature-travel-8-caption', $_POST['signature-travel-8-caption']);
  }
  
  if (isset($_POST['signature-travel-section-9-title-link'])) {
    update_post_meta($post_id, 'signature-travel-section-9-title-link', $_POST['signature-travel-section-9-title-link']);
  }
  
  if (isset($_POST['signature-travel-9-image'])) {
    update_post_meta($post_id, 'signature-travel-9-image', $_POST['signature-travel-9-image']);
  }
  
  if (isset($_POST['signature-travel-section-9-title'])) {
    update_post_meta($post_id, 'signature-travel-section-9-title', $_POST['signature-travel-section-9-title']);
  }
  
  if (isset($_POST['signature-travel-9-sub-title'])) {
    update_post_meta($post_id, 'signature-travel-9-sub-title', $_POST['signature-travel-9-sub-title']);
  }
  
  if (isset($_POST['signature-travel-9-caption'])) {
    update_post_meta($post_id, 'signature-travel-9-caption', $_POST['signature-travel-9-caption']);
  }
  
  if (isset($_POST['signature-travel-section-10-title-link'])) {
    update_post_meta($post_id, 'signature-travel-section-10-title-link', $_POST['signature-travel-section-10-title-link']);
  }
  
  if (isset($_POST['signature-travel-10-image'])) {
    update_post_meta($post_id, 'signature-travel-10-image', $_POST['signature-travel-10-image']);
  }
  
  if (isset($_POST['signature-travel-section-10-title'])) {
    update_post_meta($post_id, 'signature-travel-section-10-title', $_POST['signature-travel-section-10-title']);
  }
  
  if (isset($_POST['signature-travel-10-sub-title'])) {
    update_post_meta($post_id, 'signature-travel-10-sub-title', $_POST['signature-travel-10-sub-title']);
  }
  
  if (isset($_POST['signature-travel-10-caption'])) {
    update_post_meta($post_id, 'signature-travel-10-caption', $_POST['signature-travel-10-caption']);
  }
  
  if (isset($_POST['signature-travel-section-11-title-link'])) {
    update_post_meta($post_id, 'signature-travel-section-11-title-link', $_POST['signature-travel-section-11-title-link']);
  }
  
  if (isset($_POST['signature-travel-11-image'])) {
    update_post_meta($post_id, 'signature-travel-11-image', $_POST['signature-travel-11-image']);
  }
  
  if (isset($_POST['signature-travel-section-11-title'])) {
    update_post_meta($post_id, 'signature-travel-section-11-title', $_POST['signature-travel-section-11-title']);
  }
  
  if (isset($_POST['signature-travel-11-sub-title'])) {
    update_post_meta($post_id, 'signature-travel-11-sub-title', $_POST['signature-travel-11-sub-title']);
  }
  
  if (isset($_POST['signature-travel-11-caption'])) {
    update_post_meta($post_id, 'signature-travel-11-caption', $_POST['signature-travel-11-caption']);
  }
  
  if (isset($_POST['signature-travel-section-12-title-link'])) {
    update_post_meta($post_id, 'signature-travel-section-12-title-link', $_POST['signature-travel-section-12-title-link']);
  }
  
  if (isset($_POST['signature-travel-12-image'])) {
    update_post_meta($post_id, 'signature-travel-12-image', $_POST['signature-travel-12-image']);
  }
  
  if (isset($_POST['signature-travel-section-12-title'])) {
    update_post_meta($post_id, 'signature-travel-section-12-title', $_POST['signature-travel-section-12-title']);
  }
  
  if (isset($_POST['signature-travel-12-sub-title'])) {
    update_post_meta($post_id, 'signature-travel-12-sub-title', $_POST['signature-travel-12-sub-title']);
  }
  
  if (isset($_POST['signature-travel-12-caption'])) {
    update_post_meta($post_id, 'signature-travel-12-caption', $_POST['signature-travel-12-caption']);
  }
  
  if (isset($_POST['signature-travel-section-13-title-link'])) {
    update_post_meta($post_id, 'signature-travel-section-13-title-link', $_POST['signature-travel-section-13-title-link']);
  }
  
  if (isset($_POST['signature-travel-13-image'])) {
    update_post_meta($post_id, 'signature-travel-13-image', $_POST['signature-travel-13-image']);
  }
  
  if (isset($_POST['signature-travel-section-13-title'])) {
    update_post_meta($post_id, 'signature-travel-section-13-title', $_POST['signature-travel-section-13-title']);
  }
  
  if (isset($_POST['signature-travel-13-sub-title'])) {
    update_post_meta($post_id, 'signature-travel-13-sub-title', $_POST['signature-travel-13-sub-title']);
  }
  
  if (isset($_POST['signature-travel-13-caption'])) {
    update_post_meta($post_id, 'signature-travel-13-caption', $_POST['signature-travel-13-caption']);
  }
  
  if (isset($_POST['signature-travel-section-14-title-link'])) {
    update_post_meta($post_id, 'signature-travel-section-14-title-link', $_POST['signature-travel-section-14-title-link']);
  }
  
  if (isset($_POST['signature-travel-14-image'])) {
    update_post_meta($post_id, 'signature-travel-14-image', $_POST['signature-travel-14-image']);
  }
  
  if (isset($_POST['signature-travel-section-14-title'])) {
    update_post_meta($post_id, 'signature-travel-section-14-title', $_POST['signature-travel-section-14-title']);
  }
  
  if (isset($_POST['signature-travel-14-sub-title'])) {
    update_post_meta($post_id, 'signature-travel-14-sub-title', $_POST['signature-travel-14-sub-title']);
  }
  
  if (isset($_POST['signature-travel-14-caption'])) {
    update_post_meta($post_id, 'signature-travel-14-caption', $_POST['signature-travel-14-caption']);
  }
  
  
  if (isset($_POST['signature-travel-section-15-title-link'])) {
    update_post_meta($post_id, 'signature-travel-section-15-title-link', $_POST['signature-travel-section-15-title-link']);
  }
  
  if (isset($_POST['signature-travel-15-image'])) {
    update_post_meta($post_id, 'signature-travel-15-image', $_POST['signature-travel-15-image']);
  }
  
  if (isset($_POST['signature-travel-section-15-title'])) {
    update_post_meta($post_id, 'signature-travel-section-15-title', $_POST['signature-travel-section-15-title']);
  }
  
  if (isset($_POST['signature-travel-15-sub-title'])) {
    update_post_meta($post_id, 'signature-travel-15-sub-title', $_POST['signature-travel-15-sub-title']);
  }
  
  if (isset($_POST['signature-travel-15-caption'])) {
    update_post_meta($post_id, 'signature-travel-15-caption', $_POST['signature-travel-15-caption']);
  }
  
  
  if (isset($_POST['signature-travel-section-16-title-link'])) {
    update_post_meta($post_id, 'signature-travel-section-16-title-link', $_POST['signature-travel-section-16-title-link']);
  }
  
  if (isset($_POST['signature-travel-16-image'])) {
    update_post_meta($post_id, 'signature-travel-16-image', $_POST['signature-travel-16-image']);
  }
  
  if (isset($_POST['signature-travel-section-16-title'])) {
    update_post_meta($post_id, 'signature-travel-section-16-title', $_POST['signature-travel-section-16-title']);
  }
  
  if (isset($_POST['signature-travel-16-sub-title'])) {
    update_post_meta($post_id, 'signature-travel-16-sub-title', $_POST['signature-travel-16-sub-title']);
  }
  
  if (isset($_POST['signature-travel-16-caption'])) {
    update_post_meta($post_id, 'signature-travel-16-caption', $_POST['signature-travel-16-caption']);
  }
  
  if (isset($_POST['signature-travel-section-17-title-link'])) {
    update_post_meta($post_id, 'signature-travel-section-17-title-link', $_POST['signature-travel-section-17-title-link']);
  }
  
  if (isset($_POST['signature-travel-17-image'])) {
    update_post_meta($post_id, 'signature-travel-17-image', $_POST['signature-travel-17-image']);
  }
  
  if (isset($_POST['signature-travel-section-17-title'])) {
    update_post_meta($post_id, 'signature-travel-section-17-title', $_POST['signature-travel-section-17-title']);
  }
  
  if (isset($_POST['signature-travel-17-sub-title'])) {
    update_post_meta($post_id, 'signature-travel-17-sub-title', $_POST['signature-travel-17-sub-title']);
  }
  
  if (isset($_POST['signature-travel-17-caption'])) {
    update_post_meta($post_id, 'signature-travel-17-caption', $_POST['signature-travel-17-caption']);
  }
  
  if (isset($_POST['signature-travel-section-18-title-link'])) {
    update_post_meta($post_id, 'signature-travel-section-18-title-link', $_POST['signature-travel-section-18-title-link']);
  }
  
  if (isset($_POST['signature-travel-18-image'])) {
    update_post_meta($post_id, 'signature-travel-18-image', $_POST['signature-travel-18-image']);
  }
  
  if (isset($_POST['signature-travel-section-18-title'])) {
    update_post_meta($post_id, 'signature-travel-section-18-title', $_POST['signature-travel-section-18-title']);
  }
  
  if (isset($_POST['signature-travel-18-sub-title'])) {
    update_post_meta($post_id, 'signature-travel-18-sub-title', $_POST['signature-travel-18-sub-title']);
  }
  
  if (isset($_POST['signature-travel-18-caption'])) {
    update_post_meta($post_id, 'signature-travel-18-caption', $_POST['signature-travel-18-caption']);
  }
  
  if (isset($_POST['signature-travel-section-19-title-link'])) {
    update_post_meta($post_id, 'signature-travel-section-19-title-link', $_POST['signature-travel-section-19-title-link']);
  }
  
  if (isset($_POST['signature-travel-19-image'])) {
    update_post_meta($post_id, 'signature-travel-19-image', $_POST['signature-travel-19-image']);
  }
  
  if (isset($_POST['signature-travel-section-19-title'])) {
    update_post_meta($post_id, 'signature-travel-section-19-title', $_POST['signature-travel-section-19-title']);
  }
  
  if (isset($_POST['signature-travel-19-sub-title'])) {
    update_post_meta($post_id, 'signature-travel-19-sub-title', $_POST['signature-travel-19-sub-title']);
  }
  
  if (isset($_POST['signature-travel-19-caption'])) {
    update_post_meta($post_id, 'signature-travel-19-caption', $_POST['signature-travel-19-caption']);
  }
  
  if (isset($_POST['signature-travel-section-20-title-link'])) {
    update_post_meta($post_id, 'signature-travel-section-20-title-link', $_POST['signature-travel-section-20-title-link']);
  }
  
  if (isset($_POST['signature-travel-20-image'])) {
    update_post_meta($post_id, 'signature-travel-20-image', $_POST['signature-travel-20-image']);
  }
  
  if (isset($_POST['signature-travel-section-20-title'])) {
    update_post_meta($post_id, 'signature-travel-section-20-title', $_POST['signature-travel-section-20-title']);
  }
  
  if (isset($_POST['signature-travel-20-sub-title'])) {
    update_post_meta($post_id, 'signature-travel-20-sub-title', $_POST['signature-travel-20-sub-title']);
  }
  
  if (isset($_POST['signature-travel-20-caption'])) {
    update_post_meta($post_id, 'signature-travel-20-caption', $_POST['signature-travel-20-caption']);
  }
  
  if (isset($_POST['signature-travel-section-21-title-link'])) {
    update_post_meta($post_id, 'signature-travel-section-21-title-link', $_POST['signature-travel-section-21-title-link']);
  }
  
  if (isset($_POST['signature-travel-21-image'])) {
    update_post_meta($post_id, 'signature-travel-21-image', $_POST['signature-travel-21-image']);
  }
  
  if (isset($_POST['signature-travel-section-21-title'])) {
    update_post_meta($post_id, 'signature-travel-section-21-title', $_POST['signature-travel-section-21-title']);
  }
  
  if (isset($_POST['signature-travel-21-sub-title'])) {
    update_post_meta($post_id, 'signature-travel-21-sub-title', $_POST['signature-travel-21-sub-title']);
  }
  
  if (isset($_POST['signature-travel-21-caption'])) {
    update_post_meta($post_id, 'signature-travel-21-caption', $_POST['signature-travel-21-caption']);
  }
  
  if (isset($_POST['signature-travel-section-22-title-link'])) {
    update_post_meta($post_id, 'signature-travel-section-22-title-link', $_POST['signature-travel-section-22-title-link']);
  }
  
  if (isset($_POST['signature-travel-22-image'])) {
    update_post_meta($post_id, 'signature-travel-22-image', $_POST['signature-travel-22-image']);
  }
  
  if (isset($_POST['signature-travel-section-22-title'])) {
    update_post_meta($post_id, 'signature-travel-section-22-title', $_POST['signature-travel-section-22-title']);
  }
  
  if (isset($_POST['signature-travel-22-sub-title'])) {
    update_post_meta($post_id, 'signature-travel-22-sub-title', $_POST['signature-travel-22-sub-title']);
  }
  
  if (isset($_POST['signature-travel-22-caption'])) {
    update_post_meta($post_id, 'signature-travel-22-caption', $_POST['signature-travel-22-caption']);
  }
  
  if (isset($_POST['signature-travel-section-23-title-link'])) {
    update_post_meta($post_id, 'signature-travel-section-23-title-link', $_POST['signature-travel-section-23-title-link']);
  }
  
  if (isset($_POST['signature-travel-23-image'])) {
    update_post_meta($post_id, 'signature-travel-23-image', $_POST['signature-travel-23-image']);
  }
  
  if (isset($_POST['signature-travel-section-23-title'])) {
    update_post_meta($post_id, 'signature-travel-section-23-title', $_POST['signature-travel-section-23-title']);
  }
  
  if (isset($_POST['signature-travel-23-sub-title'])) {
    update_post_meta($post_id, 'signature-travel-23-sub-title', $_POST['signature-travel-23-sub-title']);
  }
  
  if (isset($_POST['signature-travel-23-caption'])) {
    update_post_meta($post_id, 'signature-travel-23-caption', $_POST['signature-travel-23-caption']);
  }
  
  if (isset($_POST['signature-travel-section-24-title-link'])) {
    update_post_meta($post_id, 'signature-travel-section-24-title-link', $_POST['signature-travel-section-24-title-link']);
  }
  
  if (isset($_POST['signature-travel-24-image'])) {
    update_post_meta($post_id, 'signature-travel-24-image', $_POST['signature-travel-24-image']);
  }
  
  if (isset($_POST['signature-travel-section-24-title'])) {
    update_post_meta($post_id, 'signature-travel-section-24-title', $_POST['signature-travel-section-24-title']);
  }
  
  if (isset($_POST['signature-travel-24-sub-title'])) {
    update_post_meta($post_id, 'signature-travel-24-sub-title', $_POST['signature-travel-24-sub-title']);
  }
  
  if (isset($_POST['signature-travel-24-caption'])) {
    update_post_meta($post_id, 'signature-travel-24-caption', $_POST['signature-travel-24-caption']);
  }
  
  if (isset($_POST['signature-travel-section-25-title-link'])) {
    update_post_meta($post_id, 'signature-travel-section-25-title-link', $_POST['signature-travel-section-25-title-link']);
  }
  
  if (isset($_POST['signature-travel-25-image'])) {
    update_post_meta($post_id, 'signature-travel-25-image', $_POST['signature-travel-25-image']);
  }
  
  if (isset($_POST['signature-travel-section-25-title'])) {
    update_post_meta($post_id, 'signature-travel-section-25-title', $_POST['signature-travel-section-25-title']);
  }
  
  if (isset($_POST['signature-travel-25-sub-title'])) {
    update_post_meta($post_id, 'signature-travel-25-sub-title', $_POST['signature-travel-25-sub-title']);
  }
  
  if (isset($_POST['signature-travel-25-caption'])) {
    update_post_meta($post_id, 'signature-travel-25-caption', $_POST['signature-travel-25-caption']);
  }
  
  if (isset($_POST['signature-travel-section-26-title-link'])) {
    update_post_meta($post_id, 'signature-travel-section-26-title-link', $_POST['signature-travel-section-26-title-link']);
  }
  
  if (isset($_POST['signature-travel-26-image'])) {
    update_post_meta($post_id, 'signature-travel-26-image', $_POST['signature-travel-26-image']);
  }
  
  if (isset($_POST['signature-travel-section-26-title'])) {
    update_post_meta($post_id, 'signature-travel-section-26-title', $_POST['signature-travel-section-26-title']);
  }
  
  if (isset($_POST['signature-travel-26-sub-title'])) {
    update_post_meta($post_id, 'signature-travel-26-sub-title', $_POST['signature-travel-26-sub-title']);
  }
  
  if (isset($_POST['signature-travel-26-caption'])) {
    update_post_meta($post_id, 'signature-travel-26-caption', $_POST['signature-travel-26-caption']);
  }
  
  if (isset($_POST['signature-travel-section-27-title-link'])) {
    update_post_meta($post_id, 'signature-travel-section-27-title-link', $_POST['signature-travel-section-27-title-link']);
  }
  
  if (isset($_POST['signature-travel-27-image'])) {
    update_post_meta($post_id, 'signature-travel-27-image', $_POST['signature-travel-27-image']);
  }
  
  if (isset($_POST['signature-travel-section-27-title'])) {
    update_post_meta($post_id, 'signature-travel-section-27-title', $_POST['signature-travel-section-27-title']);
  }
  
  if (isset($_POST['signature-travel-27-sub-title'])) {
    update_post_meta($post_id, 'signature-travel-27-sub-title', $_POST['signature-travel-27-sub-title']);
  }
  
  if (isset($_POST['signature-travel-27-caption'])) {
    update_post_meta($post_id, 'signature-travel-27-caption', $_POST['signature-travel-27-caption']);
  }
  
  if (isset($_POST['signature-travel-section-28-title-link'])) {
    update_post_meta($post_id, 'signature-travel-section-28-title-link', $_POST['signature-travel-section-28-title-link']);
  }
  
  if (isset($_POST['signature-travel-28-image'])) {
    update_post_meta($post_id, 'signature-travel-28-image', $_POST['signature-travel-28-image']);
  }
  
  if (isset($_POST['signature-travel-section-28-title'])) {
    update_post_meta($post_id, 'signature-travel-section-28-title', $_POST['signature-travel-section-28-title']);
  }
  
  if (isset($_POST['signature-travel-28-sub-title'])) {
    update_post_meta($post_id, 'signature-travel-28-sub-title', $_POST['signature-travel-28-sub-title']);
  }
  
  if (isset($_POST['signature-travel-28-caption'])) {
    update_post_meta($post_id, 'signature-travel-28-caption', $_POST['signature-travel-28-caption']);
  }
  
  if (isset($_POST['signature-travel-section-29-title-link'])) {
    update_post_meta($post_id, 'signature-travel-section-29-title-link', $_POST['signature-travel-section-29-title-link']);
  }
  
  if (isset($_POST['signature-travel-29-image'])) {
    update_post_meta($post_id, 'signature-travel-29-image', $_POST['signature-travel-29-image']);
  }
  
  if (isset($_POST['signature-travel-section-29-title'])) {
    update_post_meta($post_id, 'signature-travel-section-29-title', $_POST['signature-travel-section-29-title']);
  }
  
  if (isset($_POST['signature-travel-29-sub-title'])) {
    update_post_meta($post_id, 'signature-travel-29-sub-title', $_POST['signature-travel-29-sub-title']);
  }
  
  if (isset($_POST['signature-travel-29-caption'])) {
    update_post_meta($post_id, 'signature-travel-29-caption', $_POST['signature-travel-29-caption']);
  }
  
  if (isset($_POST['signature-travel-section-30-title-link'])) {
    update_post_meta($post_id, 'signature-travel-section-30-title-link', $_POST['signature-travel-section-30-title-link']);
  }
  
  if (isset($_POST['signature-travel-30-image'])) {
    update_post_meta($post_id, 'signature-travel-30-image', $_POST['signature-travel-30-image']);
  }
  
  if (isset($_POST['signature-travel-section-30-title'])) {
    update_post_meta($post_id, 'signature-travel-section-30-title', $_POST['signature-travel-section-30-title']);
  }
  
  if (isset($_POST['signature-travel-30-sub-title'])) {
    update_post_meta($post_id, 'signature-travel-30-sub-title', $_POST['signature-travel-30-sub-title']);
  }
  
  if (isset($_POST['signature-travel-30-caption'])) {
    update_post_meta($post_id, 'signature-travel-30-caption', $_POST['signature-travel-30-caption']);
  }
  
  if (isset($_POST['signature-travel-section-31-title-link'])) {
    update_post_meta($post_id, 'signature-travel-section-31-title-link', $_POST['signature-travel-section-31-title-link']);
  }
  
  if (isset($_POST['signature-travel-31-image'])) {
    update_post_meta($post_id, 'signature-travel-31-image', $_POST['signature-travel-31-image']);
  }
  
  if (isset($_POST['signature-travel-section-31-title'])) {
    update_post_meta($post_id, 'signature-travel-section-31-title', $_POST['signature-travel-section-31-title']);
  }
  
  if (isset($_POST['signature-travel-31-sub-title'])) {
    update_post_meta($post_id, 'signature-travel-31-sub-title', $_POST['signature-travel-31-sub-title']);
  }
  
  if (isset($_POST['signature-travel-31-caption'])) {
    update_post_meta($post_id, 'signature-travel-31-caption', $_POST['signature-travel-31-caption']);
  }
  
  if (isset($_POST['signature-travel-section-32-title-link'])) {
    update_post_meta($post_id, 'signature-travel-section-32-title-link', $_POST['signature-travel-section-32-title-link']);
  }
  
  if (isset($_POST['signature-travel-32-image'])) {
    update_post_meta($post_id, 'signature-travel-32-image', $_POST['signature-travel-32-image']);
  }
  
  if (isset($_POST['signature-travel-section-32-title'])) {
    update_post_meta($post_id, 'signature-travel-section-32-title', $_POST['signature-travel-section-32-title']);
  }
  
  if (isset($_POST['signature-travel-32-sub-title'])) {
    update_post_meta($post_id, 'signature-travel-32-sub-title', $_POST['signature-travel-32-sub-title']);
  }
  
  if (isset($_POST['signature-travel-32-caption'])) {
    update_post_meta($post_id, 'signature-travel-32-caption', $_POST['signature-travel-32-caption']);
  }
  
  if (isset($_POST['signature-travel-section-33-title-link'])) {
    update_post_meta($post_id, 'signature-travel-section-33-title-link', $_POST['signature-travel-section-33-title-link']);
  }
  
  if (isset($_POST['signature-travel-33-image'])) {
    update_post_meta($post_id, 'signature-travel-33-image', $_POST['signature-travel-33-image']);
  }
  
  if (isset($_POST['signature-travel-section-33-title'])) {
    update_post_meta($post_id, 'signature-travel-section-33-title', $_POST['signature-travel-section-33-title']);
  }
  
  if (isset($_POST['signature-travel-33-sub-title'])) {
    update_post_meta($post_id, 'signature-travel-33-sub-title', $_POST['signature-travel-33-sub-title']);
  }
  
  if (isset($_POST['signature-travel-33-caption'])) {
    update_post_meta($post_id, 'signature-travel-33-caption', $_POST['signature-travel-33-caption']);
  }
  
  if (isset($_POST['signature-travel-section-34-title-link'])) {
    update_post_meta($post_id, 'signature-travel-section-34-title-link', $_POST['signature-travel-section-34-title-link']);
  }
  
  if (isset($_POST['signature-travel-34-image'])) {
    update_post_meta($post_id, 'signature-travel-34-image', $_POST['signature-travel-34-image']);
  }
  
  if (isset($_POST['signature-travel-section-34-title'])) {
    update_post_meta($post_id, 'signature-travel-section-34-title', $_POST['signature-travel-section-34-title']);
  }
  
  if (isset($_POST['signature-travel-34-sub-title'])) {
    update_post_meta($post_id, 'signature-travel-34-sub-title', $_POST['signature-travel-34-sub-title']);
  }
  
  if (isset($_POST['signature-travel-34-caption'])) {
    update_post_meta($post_id, 'signature-travel-34-caption', $_POST['signature-travel-34-caption']);
  }
  
  if (isset($_POST['signature-travel-section-35-title-link'])) {
    update_post_meta($post_id, 'signature-travel-section-35-title-link', $_POST['signature-travel-section-35-title-link']);
  }
  
  if (isset($_POST['signature-travel-35-image'])) {
    update_post_meta($post_id, 'signature-travel-35-image', $_POST['signature-travel-35-image']);
  }
  
  if (isset($_POST['signature-travel-section-35-title'])) {
    update_post_meta($post_id, 'signature-travel-section-35-title', $_POST['signature-travel-section-35-title']);
  }
  
  if (isset($_POST['signature-travel-35-sub-title'])) {
    update_post_meta($post_id, 'signature-travel-35-sub-title', $_POST['signature-travel-35-sub-title']);
  }
  
  if (isset($_POST['signature-travel-35-caption'])) {
    update_post_meta($post_id, 'signature-travel-35-caption', $_POST['signature-travel-35-caption']);
  }
  
  if (isset($_POST['signature-travel-section-36-title-link'])) {
    update_post_meta($post_id, 'signature-travel-section-36-title-link', $_POST['signature-travel-section-36-title-link']);
  }
  
  if (isset($_POST['signature-travel-36-image'])) {
    update_post_meta($post_id, 'signature-travel-36-image', $_POST['signature-travel-36-image']);
  }
  
  if (isset($_POST['signature-travel-section-36-title'])) {
    update_post_meta($post_id, 'signature-travel-section-36-title', $_POST['signature-travel-section-36-title']);
  }
  
  if (isset($_POST['signature-travel-36-sub-title'])) {
    update_post_meta($post_id, 'signature-travel-36-sub-title', $_POST['signature-travel-36-sub-title']);
  }
  
  if (isset($_POST['signature-travel-36-caption'])) {
    update_post_meta($post_id, 'signature-travel-36-caption', $_POST['signature-travel-36-caption']);
  }
  
  if (isset($_POST['signature-travel-section-37-title-link'])) {
    update_post_meta($post_id, 'signature-travel-section-37-title-link', $_POST['signature-travel-section-37-title-link']);
  }
  
  if (isset($_POST['signature-travel-37-image'])) {
    update_post_meta($post_id, 'signature-travel-37-image', $_POST['signature-travel-37-image']);
  }
  
  if (isset($_POST['signature-travel-section-37-title'])) {
    update_post_meta($post_id, 'signature-travel-section-37-title', $_POST['signature-travel-section-37-title']);
  }
  
  if (isset($_POST['signature-travel-37-sub-title'])) {
    update_post_meta($post_id, 'signature-travel-37-sub-title', $_POST['signature-travel-37-sub-title']);
  }
  
  if (isset($_POST['signature-travel-37-caption'])) {
    update_post_meta($post_id, 'signature-travel-37-caption', $_POST['signature-travel-37-caption']);
  }
  
  if (isset($_POST['signature-travel-section-38-title-link'])) {
    update_post_meta($post_id, 'signature-travel-section-38-title-link', $_POST['signature-travel-section-38-title-link']);
  }
  
  if (isset($_POST['signature-travel-38-image'])) {
    update_post_meta($post_id, 'signature-travel-38-image', $_POST['signature-travel-38-image']);
  }
  
  if (isset($_POST['signature-travel-section-38-title'])) {
    update_post_meta($post_id, 'signature-travel-section-38-title', $_POST['signature-travel-section-38-title']);
  }
  
  if (isset($_POST['signature-travel-38-sub-title'])) {
    update_post_meta($post_id, 'signature-travel-38-sub-title', $_POST['signature-travel-38-sub-title']);
  }
  
  if (isset($_POST['signature-travel-38-caption'])) {
    update_post_meta($post_id, 'signature-travel-38-caption', $_POST['signature-travel-38-caption']);
  }
  
  if (isset($_POST['signature-travel-section-39-title-link'])) {
    update_post_meta($post_id, 'signature-travel-section-39-title-link', $_POST['signature-travel-section-39-title-link']);
  }
  
  if (isset($_POST['signature-travel-39-image'])) {
    update_post_meta($post_id, 'signature-travel-39-image', $_POST['signature-travel-39-image']);
  }
  
  if (isset($_POST['signature-travel-section-39-title'])) {
    update_post_meta($post_id, 'signature-travel-section-39-title', $_POST['signature-travel-section-39-title']);
  }
  
  if (isset($_POST['signature-travel-39-sub-title'])) {
    update_post_meta($post_id, 'signature-travel-39-sub-title', $_POST['signature-travel-39-sub-title']);
  }
  
  if (isset($_POST['signature-travel-39-caption'])) {
    update_post_meta($post_id, 'signature-travel-39-caption', $_POST['signature-travel-39-caption']);
  }
  
  if (isset($_POST['signature-travel-section-40-title-link'])) {
    update_post_meta($post_id, 'signature-travel-section-40-title-link', $_POST['signature-travel-section-40-title-link']);
  }
  
  if (isset($_POST['signature-travel-40-image'])) {
    update_post_meta($post_id, 'signature-travel-40-image', $_POST['signature-travel-40-image']);
  }
  
  if (isset($_POST['signature-travel-section-40-title'])) {
    update_post_meta($post_id, 'signature-travel-section-40-title', $_POST['signature-travel-section-40-title']);
  }
  
  if (isset($_POST['signature-travel-40-sub-title'])) {
    update_post_meta($post_id, 'signature-travel-40-sub-title', $_POST['signature-travel-40-sub-title']);
  }
  
  if (isset($_POST['signature-travel-40-caption'])) {
    update_post_meta($post_id, 'signature-travel-40-caption', $_POST['signature-travel-40-caption']);
  }
  
  if (isset($_POST['signature-travel-section-41-title-link'])) {
    update_post_meta($post_id, 'signature-travel-section-41-title-link', $_POST['signature-travel-section-41-title-link']);
  }
  
  if (isset($_POST['signature-travel-41-image'])) {
    update_post_meta($post_id, 'signature-travel-41-image', $_POST['signature-travel-41-image']);
  }
  
  if (isset($_POST['signature-travel-section-41-title'])) {
    update_post_meta($post_id, 'signature-travel-section-41-title', $_POST['signature-travel-section-41-title']);
  }
  
  if (isset($_POST['signature-travel-41-sub-title'])) {
    update_post_meta($post_id, 'signature-travel-41-sub-title', $_POST['signature-travel-41-sub-title']);
  }
  
  if (isset($_POST['signature-travel-41-caption'])) {
    update_post_meta($post_id, 'signature-travel-41-caption', $_POST['signature-travel-41-caption']);
  }
  
  if (isset($_POST['signature-travel-section-42-title-link'])) {
    update_post_meta($post_id, 'signature-travel-section-42-title-link', $_POST['signature-travel-section-42-title-link']);
  }
  
  if (isset($_POST['signature-travel-42-image'])) {
    update_post_meta($post_id, 'signature-travel-42-image', $_POST['signature-travel-42-image']);
  }
  
  if (isset($_POST['signature-travel-section-42-title'])) {
    update_post_meta($post_id, 'signature-travel-section-42-title', $_POST['signature-travel-section-42-title']);
  }
  
  if (isset($_POST['signature-travel-42-sub-title'])) {
    update_post_meta($post_id, 'signature-travel-42-sub-title', $_POST['signature-travel-42-sub-title']);
  }
  
  if (isset($_POST['signature-travel-42-caption'])) {
    update_post_meta($post_id, 'signature-travel-42-caption', $_POST['signature-travel-42-caption']);
  }
}
