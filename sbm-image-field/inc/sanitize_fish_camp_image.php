<?php
/* ========== Saves/Sanitizes ========== */

function fish_camp_meta_save( $post_id ) {

    // Checks save status
    $is_autosave = wp_is_post_autosave( $post_id );
    $is_revision = wp_is_post_revision( $post_id );
    $is_valid_nonce = ( isset( $_POST[ 'fish_camp_nonce' ] ) && wp_verify_nonce( $_POST[ 'fish_camp_nonce' ], basename( __FILE__ ) ) ) ? 'true' : 'false';

    // Exits script depending on save status
    if ( $is_autosave || $is_revision || !$is_valid_nonce ) {
        return;
    }

	// Checks for input and saves if needed
		if( isset( $_POST[ 'fish-camp-logo' ] ) ) {
				update_post_meta( $post_id, 'fish-camp-logo', $_POST[ 'fish-camp-logo' ] );
		}

	// Checks for input and saves if needed
		if( isset( $_POST[ 'fish-camp-image' ] ) ) {
				update_post_meta( $post_id, 'fish-camp-image', $_POST[ 'fish-camp-image' ] );
		}

	// Checks for input and saves if needed
		if( isset( $_POST[ 'feature-fc1-image' ] ) ) {
				update_post_meta( $post_id, 'feature-fc1-image', $_POST[ 'feature-fc1-image' ] );
		}

	// Checks for input and saves if needed
		if( isset( $_POST[ 'feature-fc1-video' ] ) ) {
				update_post_meta( $post_id, 'feature-fc1-video', $_POST[ 'feature-fc1-video' ] );
		}

  // Checks for input and saves if needed
  	if( isset( $_POST[ 'feature-fc2-image' ] ) ) {
  			update_post_meta( $post_id, 'feature-fc2-image', $_POST[ 'feature-fc2-image' ] );
  	}

  // Checks for input and saves if needed
  	if( isset( $_POST[ 'feature-fc2-video' ] ) ) {
  			update_post_meta( $post_id, 'feature-fc2-video', $_POST[ 'feature-fc2-video' ] );
		}
	
	// Checks for input and saves if needed
  	if( isset( $_POST[ 'feature-fc3-image' ] ) ) {
  			update_post_meta( $post_id, 'feature-fc3-image', $_POST[ 'feature-fc3-image' ] );
  	}

  // Checks for input and saves if needed
  	if( isset( $_POST[ 'feature-fc3-video' ] ) ) {
  			update_post_meta( $post_id, 'feature-fc3-video', $_POST[ 'feature-fc3-video' ] );
		}
	
	// Checks for input and saves if needed
  	if( isset( $_POST[ 'feature-fc4-image' ] ) ) {
  			update_post_meta( $post_id, 'feature-fc4-image', $_POST[ 'feature-fc4-image' ] );
  	}

  // Checks for input and saves if needed
  	if( isset( $_POST[ 'feature-fc4-video' ] ) ) {
  			update_post_meta( $post_id, 'feature-fc4-video', $_POST[ 'feature-fc4-video' ] );
		}
	
	// Checks for input and saves if needed
  	if( isset( $_POST[ 'feature-fc5-image' ] ) ) {
  			update_post_meta( $post_id, 'feature-fc5-image', $_POST[ 'feature-fc5-image' ] );
  	}

  // Checks for input and saves if needed
  	if( isset( $_POST[ 'feature-fc5-video' ] ) ) {
  			update_post_meta( $post_id, 'feature-fc5-video', $_POST[ 'feature-fc5-video' ] );
		}
	
	// Checks for input and saves if needed
  	if( isset( $_POST[ 'fish-camp-additional-info-image1' ] ) ) {
  			update_post_meta( $post_id, 'fish-camp-additional-info-image1', $_POST[ 'fish-camp-additional-info-image1' ] );
  	}
	
	// Checks for input and saves if needed
  	if( isset( $_POST[ 'fish-camp-additional-info-image1-link' ] ) ) {
  			update_post_meta( $post_id, 'fish-camp-additional-info-image1-link', $_POST[ 'fish-camp-additional-info-image1-link' ] );
  	}
	
	// Checks for input and saves if needed
  	if( isset( $_POST[ 'fish-camp-additional-info-image2' ] ) ) {
  			update_post_meta( $post_id, 'fish-camp-additional-info-image2', $_POST[ 'fish-camp-additional-info-image2' ] );
  	}
	
	// Checks for input and saves if needed
  	if( isset( $_POST[ 'fish-camp-additional-info-image2-link' ] ) ) {
  			update_post_meta( $post_id, 'fish-camp-additional-info-image2-link', $_POST[ 'fish-camp-additional-info-image2-link' ] );
  	}
	
	// Checks for input and saves if needed
  	if( isset( $_POST[ 'fish-camp-additional-info-image3' ] ) ) {
  			update_post_meta( $post_id, 'fish-camp-additional-info-image3', $_POST[ 'fish-camp-additional-info-image3' ] );
  	}
	
	// Checks for input and saves if needed
  	if( isset( $_POST[ 'fish-camp-additional-info-image3-link' ] ) ) {
  			update_post_meta( $post_id, 'fish-camp-additional-info-image3-link', $_POST[ 'fish-camp-additional-info-image3-link' ] );
  	}
	
	// Checks for input and saves if needed
  	if( isset( $_POST[ 'fish-camp-additional-info-image4' ] ) ) {
  			update_post_meta( $post_id, 'fish-camp-additional-info-image4', $_POST[ 'fish-camp-additional-info-image4' ] );
  	}
	
	// Checks for input and saves if needed
  	if( isset( $_POST[ 'fish-camp-additional-info-image4-link' ] ) ) {
  			update_post_meta( $post_id, 'fish-camp-additional-info-image4-link', $_POST[ 'fish-camp-additional-info-image4-link' ] );
  	}
	
	// Checks for input and saves if needed
  	if( isset( $_POST[ 'fish-camp-additional-info-image5' ] ) ) {
  			update_post_meta( $post_id, 'fish-camp-additional-info-image5', $_POST[ 'fish-camp-additional-info-image5' ] );
  	}
	
	// Checks for input and saves if needed
  	if( isset( $_POST[ 'fish-camp-additional-info-image5-link' ] ) ) {
  			update_post_meta( $post_id, 'fish-camp-additional-info-image5-link', $_POST[ 'fish-camp-additional-info-image5-link' ] );
  	}
	
	// Checks for input and saves if needed
  	if( isset( $_POST[ 'fish-camp-additional-info-image6' ] ) ) {
  			update_post_meta( $post_id, 'fish-camp-additional-info-image6', $_POST[ 'fish-camp-additional-info-image6' ] );
  	}
	
	// Checks for input and saves if needed
  	if( isset( $_POST[ 'fish-camp-additional-info-image6-link' ] ) ) {
  			update_post_meta( $post_id, 'fish-camp-additional-info-image6-link', $_POST[ 'fish-camp-additional-info-image6-link' ] );
  	}
	
	// Checks for input and saves if needed
  	if( isset( $_POST[ 'fish-camp-additional-info-image7' ] ) ) {
  			update_post_meta( $post_id, 'fish-camp-additional-info-image7', $_POST[ 'fish-camp-additional-info-image7' ] );
  	}
	
	// Checks for input and saves if needed
  	if( isset( $_POST[ 'fish-camp-additional-info-image7-link' ] ) ) {
  			update_post_meta( $post_id, 'fish-camp-additional-info-image7-link', $_POST[ 'fish-camp-additional-info-image7-link' ] );
  	}
	
	// Checks for input and saves if needed
  	if( isset( $_POST[ 'fish-camp-additional-info-image8' ] ) ) {
  			update_post_meta( $post_id, 'fish-camp-additional-info-image8', $_POST[ 'fish-camp-additional-info-image8' ] );
  	}
	
	// Checks for input and saves if needed
  	if( isset( $_POST[ 'fish-camp-additional-info-image8-link' ] ) ) {
  			update_post_meta( $post_id, 'fish-camp-additional-info-image8-link', $_POST[ 'fish-camp-additional-info-image8-link' ] );
  	}
}
add_action( 'save_post', 'fish_camp_meta_save' );
