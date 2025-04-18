<?php
/* ========== Saves/Sanitizes ========== */

function private_meta_save( $post_id ) {

    // Checks save status
    $is_autosave = wp_is_post_autosave( $post_id );
    $is_revision = wp_is_post_revision( $post_id );
    $is_valid_nonce = ( isset( $_POST[ 'private_nonce' ] ) && wp_verify_nonce( $_POST[ 'private_nonce' ], basename( __FILE__ ) ) ) ? 'true' : 'false';

    // Exits script depending on save status
    if ( $is_autosave || $is_revision || !$is_valid_nonce ) {
        return;
    }
	
	// Checks for input and saves if needed
	if ( isset( $_POST['private-hero-opacity-range'] ) ) {
		update_post_meta( $post_id,
			'private-hero-opacity-range',
			sanitize_text_field( $_POST['private-hero-opacity-range'] ) );
	}
	
	// Checks for input and saves if needed
	if ( isset( $_POST['private-temp-video-poster'] ) ) {
		update_post_meta( $post_id,
			'private-temp-video-poster',
			$_POST['private-temp-video-poster'] );
	}
	
	// Checks for input and saves if needed
	if ( isset( $_POST['private-temp-video'] ) ) {
		update_post_meta( $post_id,
			'private-temp-video',
			$_POST['private-temp-video'] );
	}

	// Checks for input and saves if needed
		if( isset( $_POST[ 'private-logo' ] ) ) {
				update_post_meta( $post_id, 'private-logo', $_POST[ 'private-logo' ] );
		}

	// Checks for input and saves if needed
		if( isset( $_POST[ 'private-image' ] ) ) {
				update_post_meta( $post_id, 'private-image', $_POST[ 'private-image' ] );
		}

	// Checks for input and saves if needed
		if( isset( $_POST[ 'feature-pw1-image' ] ) ) {
				update_post_meta( $post_id, 'feature-pw1-image', $_POST[ 'feature-pw1-image' ] );
		}

	// Checks for input and saves if needed
		if( isset( $_POST[ 'feature-pw1-video' ] ) ) {
				update_post_meta( $post_id, 'feature-pw1-video', $_POST[ 'feature-pw1-video' ] );
		}

  // Checks for input and saves if needed
  	if( isset( $_POST[ 'feature-pw2-image' ] ) ) {
  			update_post_meta( $post_id, 'feature-pw2-image', $_POST[ 'feature-pw2-image' ] );
  	}

  // Checks for input and saves if needed
  	if( isset( $_POST[ 'feature-pw2-video' ] ) ) {
  			update_post_meta( $post_id, 'feature-pw2-video', $_POST[ 'feature-pw2-video' ] );
		}
	
	// Checks for input and saves if needed
  	if( isset( $_POST[ 'feature-pw3-image' ] ) ) {
  			update_post_meta( $post_id, 'feature-pw3-image', $_POST[ 'feature-pw3-image' ] );
  	}

  // Checks for input and saves if needed
  	if( isset( $_POST[ 'feature-pw3-video' ] ) ) {
  			update_post_meta( $post_id, 'feature-pw3-video', $_POST[ 'feature-pw3-video' ] );
		}
	
	// Checks for input and saves if needed
  	if( isset( $_POST[ 'feature-pw4-image' ] ) ) {
  			update_post_meta( $post_id, 'feature-pw4-image', $_POST[ 'feature-pw4-image' ] );
  	}

  // Checks for input and saves if needed
  	if( isset( $_POST[ 'feature-pw4-video' ] ) ) {
  			update_post_meta( $post_id, 'feature-pw4-video', $_POST[ 'feature-pw4-video' ] );
		}
	
	// Checks for input and saves if needed
  	if( isset( $_POST[ 'feature-pw5-image' ] ) ) {
  			update_post_meta( $post_id, 'feature-pw5-image', $_POST[ 'feature-pw5-image' ] );
  	}

  // Checks for input and saves if needed
  	if( isset( $_POST[ 'feature-pw5-video' ] ) ) {
  			update_post_meta( $post_id, 'feature-pw5-video', $_POST[ 'feature-pw5-video' ] );
		}
	
	// Checks for input and saves if needed
  	if( isset( $_POST[ 'private-additional-info-image1' ] ) ) {
  			update_post_meta( $post_id, 'private-additional-info-image1', $_POST[ 'private-additional-info-image1' ] );
  	}
	
	// Checks for input and saves if needed
  	if( isset( $_POST[ 'private-additional-info-image1-link' ] ) ) {
  			update_post_meta( $post_id, 'private-additional-info-image1-link', $_POST[ 'private-additional-info-image1-link' ] );
  	}
	
	// Checks for input and saves if needed
  	if( isset( $_POST[ 'private-additional-info-image2' ] ) ) {
  			update_post_meta( $post_id, 'private-additional-info-image2', $_POST[ 'private-additional-info-image2' ] );
  	}
	
	// Checks for input and saves if needed
  	if( isset( $_POST[ 'private-additional-info-image2-link' ] ) ) {
  			update_post_meta( $post_id, 'private-additional-info-image2-link', $_POST[ 'private-additional-info-image2-link' ] );
  	}
	
	// Checks for input and saves if needed
  	if( isset( $_POST[ 'private-additional-info-image3' ] ) ) {
  			update_post_meta( $post_id, 'private-additional-info-image3', $_POST[ 'private-additional-info-image3' ] );
  	}
	
	// Checks for input and saves if needed
  	if( isset( $_POST[ 'private-additional-info-image3-link' ] ) ) {
  			update_post_meta( $post_id, 'private-additional-info-image3-link', $_POST[ 'private-additional-info-image3-link' ] );
  	}
	
	// Checks for input and saves if needed
  	if( isset( $_POST[ 'private-additional-info-image4' ] ) ) {
  			update_post_meta( $post_id, 'private-additional-info-image4', $_POST[ 'private-additional-info-image4' ] );
  	}
	
	// Checks for input and saves if needed
  	if( isset( $_POST[ 'private-additional-info-image4-link' ] ) ) {
  			update_post_meta( $post_id, 'private-additional-info-image4-link', $_POST[ 'private-additional-info-image4-link' ] );
  	}
	
	// Checks for input and saves if needed
  	if( isset( $_POST[ 'private-additional-info-image5' ] ) ) {
  			update_post_meta( $post_id, 'private-additional-info-image5', $_POST[ 'private-additional-info-image5' ] );
  	}
	
	// Checks for input and saves if needed
  	if( isset( $_POST[ 'private-additional-info-image5-link' ] ) ) {
  			update_post_meta( $post_id, 'private-additional-info-image5-link', $_POST[ 'private-additional-info-image5-link' ] );
  	}
	
	// Checks for input and saves if needed
  	if( isset( $_POST[ 'private-additional-info-image6' ] ) ) {
  			update_post_meta( $post_id, 'private-additional-info-image6', $_POST[ 'private-additional-info-image6' ] );
  	}
	
	// Checks for input and saves if needed
  	if( isset( $_POST[ 'private-additional-info-image6-link' ] ) ) {
  			update_post_meta( $post_id, 'private-additional-info-image6-link', $_POST[ 'private-additional-info-image6-link' ] );
  	}
	
	// Checks for input and saves if needed
  	if( isset( $_POST[ 'private-additional-info-image7' ] ) ) {
  			update_post_meta( $post_id, 'private-additional-info-image7', $_POST[ 'private-additional-info-image7' ] );
  	}
	
	// Checks for input and saves if needed
  	if( isset( $_POST[ 'private-additional-info-image7-link' ] ) ) {
  			update_post_meta( $post_id, 'private-additional-info-image7-link', $_POST[ 'private-additional-info-image7-link' ] );
  	}
	
	// Checks for input and saves if needed
  	if( isset( $_POST[ 'private-additional-info-image8' ] ) ) {
  			update_post_meta( $post_id, 'private-additional-info-image8', $_POST[ 'private-additional-info-image8' ] );
  	}
	
	// Checks for input and saves if needed
  	if( isset( $_POST[ 'private-additional-info-image8-link' ] ) ) {
  			update_post_meta( $post_id, 'private-additional-info-image8-link', $_POST[ 'private-additional-info-image8-link' ] );
  	}
}
add_action( 'save_post', 'private_meta_save' );
