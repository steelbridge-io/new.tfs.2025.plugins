<?php
/* ========== Saves/Sanitizes ========== */

function guideservice_meta_save( $post_id ) {

    // Checks save status
    $is_autosave = wp_is_post_autosave( $post_id );
    $is_revision = wp_is_post_revision( $post_id );
    $is_valid_nonce = ( isset( $_POST[ 'guideservice_nonce' ] ) && wp_verify_nonce( $_POST[ 'guideservice_nonce' ], basename( __FILE__ ) ) ) ? 'true' : 'false';

    // Exits script depending on save status
    if ( $is_autosave || $is_revision || !$is_valid_nonce ) {
        return;
    }
	
	// Checks for input and saves if needed
	if ( isset( $_POST['guidesvc-hero-opacity-range'] ) ) {
		update_post_meta( $post_id,
			'guidesvc-hero-opacity-range',
			sanitize_text_field( $_POST['guidesvc-hero-opacity-range'] ) );
	}
	
	// Checks for input and saves if needed
	if ( isset( $_POST['guidesvc-temp-video-poster'] ) ) {
		update_post_meta( $post_id,
			'guidesvc-temp-video-poster',
			$_POST['guidesvc-temp-video-poster'] );
	}
	
	// Checks for input and saves if needed
	if ( isset( $_POST['guidesvc-temp-video'] ) ) {
		update_post_meta( $post_id,
			'guidesvc-temp-video',
			$_POST['guidesvc-temp-video'] );
	}

	// Checks for input and saves if needed
		if( isset( $_POST[ 'guideservice-logo' ] ) ) {
				update_post_meta( $post_id, 'guideservice-logo', $_POST[ 'guideservice-logo' ] );
		}

		// Checks for input and saves if needed
		if( isset( $_POST[ 'guideservice-image' ] ) ) {
				update_post_meta( $post_id, 'guideservice-image', $_POST[ 'guideservice-image' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'guideservice-gs1-image' ] ) ) {
				update_post_meta( $post_id, 'guideservice-gs1-image', $_POST[ 'guideservice-gs1-image' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'guideservice-gs1-video' ] ) ) {
				update_post_meta( $post_id, 'guideservice-gs1-video', $_POST[ 'guideservice-gs1-video' ] );
		}
	
	// Checks for input and saves
  	if( isset( $_POST[ 'feature-gs1-checkbox' ] ) ) {
  			update_post_meta( $post_id, 'feature-gs1-checkbox', 'yes' );
		} else {
  			update_post_meta( $post_id, 'feature-gs1-checkbox', '' );
  	}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'feature-gs2-image' ] ) ) {
				update_post_meta( $post_id, 'feature-gs2-image', $_POST[ 'feature-gs2-image' ] );
		}
			
	// Checks for input and saves if needed
		if( isset( $_POST[ 'feature-gs2-video' ] ) ) {
				update_post_meta( $post_id, 'feature-gs2-video', $_POST[ 'feature-gs2-video' ] );
		}
	
	// Checks for input and saves
  	if( isset( $_POST[ 'feature-gs2-checkbox' ] ) ) {
  			update_post_meta( $post_id, 'feature-gs2-checkbox', 'yes' );
		} else {
  			update_post_meta( $post_id, 'feature-gs2-checkbox', '' );
  	}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'feature-gs3-image' ] ) ) {
				update_post_meta( $post_id, 'feature-gs3-image', $_POST[ 'feature-gs3-image' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'feature-gs3-video' ] ) ) {
				update_post_meta( $post_id, 'feature-gs3-video', $_POST[ 'feature-gs3-video' ] );
		}
	
	// Checks for input and saves
  	if( isset( $_POST[ 'feature-gs3-checkbox' ] ) ) {
  			update_post_meta( $post_id, 'feature-gs3-checkbox', 'yes' );
		} else {
  			update_post_meta( $post_id, 'feature-gs3-checkbox', '' );
  	}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'feature-gs4-image' ] ) ) {
				update_post_meta( $post_id, 'feature-gs4-image', $_POST[ 'feature-gs4-image' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'feature-gs4-video' ] ) ) {
				update_post_meta( $post_id, 'feature-gs4-video', $_POST[ 'feature-gs4-video' ] );
		}
	
	// Checks for input and saves
  	if( isset( $_POST[ 'feature-gs4-checkbox' ] ) ) {
  			update_post_meta( $post_id, 'feature-gs4-checkbox', 'yes' );
		} else {
  			update_post_meta( $post_id, 'feature-gs4-checkbox', '' );
  	}

	// Checks for input and saves if needed
		if( isset( $_POST[ 'feature-gs5-image' ] ) ) {
				update_post_meta( $post_id, 'feature-gs5-image', $_POST[ 'feature-gs5-image' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'feature-gs5-video' ] ) ) {
				update_post_meta( $post_id, 'feature-gs5-video', $_POST[ 'feature-gs5-video' ] );
		}
	
	// Checks for input and saves
  	if( isset( $_POST[ 'feature-gs5-checkbox' ] ) ) {
  			update_post_meta( $post_id, 'feature-gs5-checkbox', 'yes' );
		} else {
  			update_post_meta( $post_id, 'feature-gs5-checkbox', '' );
  	}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'guideservice-additional-info-image1' ] ) ) {
				update_post_meta( $post_id, 'guideservice-additional-info-image1', $_POST[ 'guideservice-additional-info-image1' ] );
		}

	// Checks for input and saves if needed
		if( isset( $_POST[ 'guideservice-additional-info-image1-link' ] ) ) {
				update_post_meta( $post_id, 'guideservice-additional-info-image1-link', $_POST[ 'guideservice-additional-info-image1-link' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'guideservice-additional-info-image2' ] ) ) {
				update_post_meta( $post_id, 'guideservice-additional-info-image2', $_POST[ 'guideservice-additional-info-image2' ] );
		}

	// Checks for input and saves if needed
		if( isset( $_POST[ 'guideservice-additional-info-image2-link' ] ) ) {
				update_post_meta( $post_id, 'guideservice-additional-info-image2-link', $_POST[ 'guideservice-additional-info-image2-link' ] );
		}
	
		// Checks for input and saves if needed
		if( isset( $_POST[ 'guideservice-additional-info-image3' ] ) ) {
				update_post_meta( $post_id, 'guideservice-additional-info-image3', $_POST[ 'guideservice-additional-info-image3' ] );
		}

	// Checks for input and saves if needed
		if( isset( $_POST[ 'guideservice-additional-info-image3-link' ] ) ) {
				update_post_meta( $post_id, 'guideservice-additional-info-image3-link', $_POST[ 'guideservice-additional-info-image3-link' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'guideservice-additional-info-image4' ] ) ) {
				update_post_meta( $post_id, 'guideservice-additional-info-image4', $_POST[ 'guideservice-additional-info-image4' ] );
		}

	// Checks for input and saves if needed
		if( isset( $_POST[ 'guideservice-additional-info-image4-link' ] ) ) {
				update_post_meta( $post_id, 'guideservice-additional-info-image4-link', $_POST[ 'guideservice-additional-info-image4-link' ] );
		}

	// Checks for input and saves if needed
		if( isset( $_POST[ 'guideservice-additional-info-image5' ] ) ) {
				update_post_meta( $post_id, 'guideservice-additional-info-image5', $_POST[ 'guideservice-additional-info-image5' ] );
		}

	// Checks for input and saves if needed
		if( isset( $_POST[ 'guideservice-additional-info-image5-link' ] ) ) {
				update_post_meta( $post_id, 'guideservice-additional-info-image5-link', $_POST[ 'guideservice-additional-info-image5-link' ] );
		}

	// Checks for input and saves if needed
		if( isset( $_POST[ 'guideservice-additional-info-image6' ] ) ) {
				update_post_meta( $post_id, 'guideservice-additional-info-image6', $_POST[ 'guideservice-additional-info-image6' ] );
		}

	// Checks for input and saves if needed
		if( isset( $_POST[ 'guideservice-additional-info-image6-link' ] ) ) {
				update_post_meta( $post_id, 'guideservice-additional-info-image6-link', $_POST[ 'guideservice-additional-info-image6-link' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'guideservice-additional-info-image7' ] ) ) {
				update_post_meta( $post_id, 'guideservice-additional-info-image7', $_POST[ 'guideservice-additional-info-image7' ] );
		}

	// Checks for input and saves if needed
		if( isset( $_POST[ 'guideservice-additional-info-image7-link' ] ) ) {
				update_post_meta( $post_id, 'guideservice-additional-info-image7-link', $_POST[ 'guideservice-additional-info-image7-link' ] );
		}

	// Checks for input and saves if needed
		if( isset( $_POST[ 'guideservice-additional-info-image8' ] ) ) {
				update_post_meta( $post_id, 'guideservice-additional-info-image8', $_POST[ 'guideservice-additional-info-image8' ] );
		}

	// Checks for input and saves if needed
		if( isset( $_POST[ 'guideservice-additional-info-image8-link' ] ) ) {
				update_post_meta( $post_id, 'guideservice-additional-info-image8-link', $_POST[ 'guideservice-additional-info-image8-link' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'cta-guideservice-strong-intro' ] ) ) {
				update_post_meta( $post_id, 'cta-guideservice-strong-intro', $_POST[ 'cta-guideservice-strong-intro' ] );
		}	

	// Checks for input and saves if needed
		if( isset( $_POST[ 'cta-guideservice-content' ] ) ) {
				update_post_meta( $post_id, 'cta-guideservice-content', $_POST[ 'cta-guideservice-content' ] );
		}	
	}
add_action( 'save_post', 'guideservice_meta_save' );