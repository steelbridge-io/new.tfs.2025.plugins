<?php

/* ========== SAVE AND SANITIZE ========== */

// Saves the custom meta input
add_action('save_post', 'sbm_basic_meta_save');
function sbm_basic_meta_save($post_id) {
  
  // Checks save status
  $is_autosave = wp_is_post_autosave($post_id);
  $is_revision = wp_is_post_revision($post_id);
  $is_valid_nonce = (isset($_POST['tfs_nonce']) && wp_verify_nonce($_POST['tfs_nonce'], basename(__FILE__))) ? 'true' : 'false';
  
  // Exits script depending on save status
  if ($is_autosave || $is_revision || !$is_valid_nonce) {
    return;
  }

		// Checks for input and sanitizes/saves if needed
		if( isset( $_POST[ 'publication-cta-img-1' ] ) ) {
			update_post_meta( $post_id, 'publication-cta-img-1', sanitize_text_field( $_POST[ 'publication-cta-img-1' ] ) );
		}

		// Checks for input and sanitizes/saves if needed
		if( isset( $_POST[ 'publication-cta-img-2' ] ) ) {
			update_post_meta( $post_id, 'publication-cta-img-2', sanitize_text_field( $_POST[ 'publication-cta-img-2' ] ) );
		}

		// Checks for input and sanitizes/saves if needed
		if( isset( $_POST[ 'publication-cta-img-3' ] ) ) {
			update_post_meta( $post_id, 'publication-cta-img-3', sanitize_text_field( $_POST[ 'publication-cta-img-3' ] ) );
		}

		// Checks for input and sanitizes/saves if needed
		if( isset( $_POST[ 'publication-cta-img-4' ] ) ) {
			update_post_meta( $post_id, 'publication-cta-img-4', sanitize_text_field( $_POST[ 'publication-cta-img-4' ] ) );
		}
	
  // Checks for input and sanitizes/saves if needed
  if (isset($_POST['hero-video-url'])) {
	  update_post_meta($post_id, 'hero-video-url', $_POST['hero-video-url']);
  }

		if (isset($_POST['basic-opacity-range'])) {
				update_post_meta($post_id, 'basic-opacity-range', sanitize_text_field($_POST['basic-opacity-range']));
		}
  
  // Checks for input and sanitizes/saves if needed
  if (isset($_POST['travel-description'])) {
    update_post_meta($post_id, 'travel-description', sanitize_text_field($_POST['travel-description']));
  }
  
  // Checks for input and sanitizes/saves if needed
  if (isset($_POST['masthead-bold-textarea'])) {
    update_post_meta($post_id, 'masthead-bold-textarea', sanitize_text_field($_POST['masthead-bold-textarea']));
  }
  
  // Checks for input and sanitizes/saves if needed
  if (isset($_POST['feature-1-title'])) {
    update_post_meta($post_id, 'feature-1-title', sanitize_text_field($_POST['feature-1-title']));
  }
  
  // Checks for input and saves if needed
  if (isset($_POST['feature-1-cost-textarea'])) {
    update_post_meta($post_id, 'feature-1-cost-textarea', $_POST['feature-1-cost-textarea']);
  }
  
  // Checks for input and saves if needed
  if (isset($_POST['feature-1-inclusions-textarea'])) {
    update_post_meta($post_id, 'feature-1-inclusions-textarea', $_POST['feature-1-inclusions-textarea']);
  }
  
  // Checks for input and saves if needed
  if (isset($_POST['feature-1-noninclusions-textarea'])) {
    update_post_meta($post_id, 'feature-1-noninclusions-textarea', $_POST['feature-1-noninclusions-textarea']);
  }
  
  // Checks for input and saves if needed
  if (isset($_POST['feature-1-travelins-textarea'])) {
    update_post_meta($post_id, 'feature-1-travelins-textarea', $_POST['feature-1-travelins-textarea']);
  }
  
  // Checks for input and saves
  if (isset($_POST['img-vid-checkbox'])) {
    update_post_meta($post_id, 'img-vid-checkbox', 'yes');
  } else {
    update_post_meta($post_id, 'img-vid-checkbox', '');
  }
  
  // Checks for input and displays fishing section
  if (isset($_POST['basic-season-checkbox'])) {
    update_post_meta($post_id, 'basic-season-checkbox', 'yes');
  } else {
    update_post_meta($post_id, 'basic-season-checkbox', '');
  }
  
  // Checks for input and saves if needed
  if (isset($_POST['feature-2-seasons-title'])) {
    update_post_meta($post_id, 'feature-2-seasons-title', $_POST['feature-2-seasons-title']);
  }
  
  // Checks for input and saves if needed
  if (isset($_POST['feature-2-seasons-content'])) {
    update_post_meta($post_id, 'feature-2-seasons-content', $_POST['feature-2-seasons-content']);
  }
  
  // Checks for input and saves if needed
  if (isset($_POST['feature-2-seasons-readmore-info'])) {
    update_post_meta($post_id, 'feature-2-seasons-readmore-info', $_POST['feature-2-seasons-readmore-info']);
  }
  
  // Checks for input and saves if needed
  if (isset($_POST['feature-2-seasons-readmore'])) {
    update_post_meta($post_id, 'feature-2-seasons-readmore', $_POST['feature-2-seasons-readmore']);
  }
  
  // Checks for input and displays fishing section
  if (isset($_POST['high-low-checkbox'])) {
    update_post_meta($post_id, 'high-low-checkbox', 'yes');
  } else {
    update_post_meta($post_id, 'high-low-checkbox', '');
  }
  
  // Checks for input and saves if needed
  if (isset($_POST['feature-2-seasons-hi-lo-content'])) {
    update_post_meta($post_id, 'feature-2-seasons-hi-lo-content', $_POST['feature-2-seasons-hi-lo-content']);
  }
  
  // Checks for input and saves if needed
  if (isset($_POST['feature-2-seasons-hiseason'])) {
    update_post_meta($post_id, 'feature-2-seasons-hiseason', $_POST['feature-2-seasons-hiseason']);
  }
  
  // Checks for input and saves if needed
  if (isset($_POST['feature-2-seasons-lowseason'])) {
    update_post_meta($post_id, 'feature-2-seasons-lowseason', $_POST['feature-2-seasons-lowseason']);
  }
  
  // Checks for input and saves if needed
  if (isset($_POST['feature-3-get-to-title'])) {
    update_post_meta($post_id, 'feature-3-get-to-title', $_POST['feature-3-get-to-title']);
  }
  
  // Checks for input and saves if needed
  if (isset($_POST['feature-3-get-to-content'])) {
    update_post_meta($post_id, 'feature-3-get-to-content', $_POST['feature-3-get-to-content']);
  }
  
  // Checks for input and saves if needed
  if (isset($_POST['feature-3-get-to-readmore'])) {
    update_post_meta($post_id, 'feature-3-get-to-readmore', $_POST['feature-3-get-to-readmore']);
  }
  
  // Checks for input and saves if needed
  if (isset($_POST['feature-4-lodging-title'])) {
    update_post_meta($post_id, 'feature-4-lodging-title', $_POST['feature-4-lodging-title']);
  }
  
  // Checks for input and saves if needed
  if (isset($_POST['feature-4-lodging-content'])) {
    update_post_meta($post_id, 'feature-4-lodging-content', $_POST['feature-4-lodging-content']);
  }
  
  // Checks for input and saves if needed
  if (isset($_POST['feature-4-lodging-readmore'])) {
    update_post_meta($post_id, 'feature-4-lodging-readmore', $_POST['feature-4-lodging-readmore']);
  }
  
  // Checks for input and saves if needed
  if (isset($_POST['feature-5-angling-title'])) {
    update_post_meta($post_id, 'feature-5-angling-title', $_POST['feature-5-angling-title']);
  }
  
  // Checks for input and saves if needed
  if (isset($_POST['feature-5-angling-content'])) {
    update_post_meta($post_id, 'feature-5-angling-content', $_POST['feature-5-angling-content']);
  }
  
  // Checks for input and saves if needed
  if (isset($_POST['feature-5-angling-readmore'])) {
    update_post_meta($post_id, 'feature-5-angling-readmore', $_POST['feature-5-angling-readmore']);
  }
  
  // Checks for input and saves if needed
  if (isset($_POST['basic-page-description'])) {
    update_post_meta($post_id, 'basic-page-description', $_POST['basic-page-description']);
  }
  
  // Checks for input and saves if needed
  if (isset($_POST['cta-strong-intro'])) {
    update_post_meta($post_id, 'cta-strong-intro', $_POST['cta-strong-intro']);
  }
  
  // Checks for input and saves if needed
  if (isset($_POST['cta-content'])) {
    update_post_meta($post_id, 'cta-content', $_POST['cta-content']);
  }
  
}
