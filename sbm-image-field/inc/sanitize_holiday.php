<?php
// Sanitize Signature Destinations

function holiday_meta_save( $post_id ) {

    // Checks save status
    $is_autosave = wp_is_post_autosave( $post_id );
    $is_revision = wp_is_post_revision( $post_id );
    $is_valid_nonce = ( isset( $_POST[ 'holiday_nonce' ] ) && wp_verify_nonce( $_POST[ 'holiday_nonce' ], basename( __FILE__ ) ) ) ? 'true' : 'false';

    // Exits script depending on save status
    if ( $is_autosave || $is_revision || !$is_valid_nonce ) {
        return;
    }

    // Checks for input and saves if needed
    if( isset( $_POST[ 'meta-carousel-bg-color' ] ) ) {
        update_post_meta( $post_id, 'meta-carousel-bg-color', $_POST[ 'meta-carousel-bg-color' ] );
    }

  // Checks for input and saves if needed
    if( isset( $_POST[ 'meta-grid-bg-color' ] ) ) {
      update_post_meta( $post_id, 'meta-grid-bg-color', $_POST[ 'meta-grid-bg-color' ] );
    }

  // Checks for input and saves if needed
    if( isset( $_POST[ 'meta-content-bg-color' ] ) ) {
      update_post_meta( $post_id, 'meta-content-bg-color', $_POST[ 'meta-content-bg-color' ] );
    }

  // Checks for input and saves if needed
    if( isset( $_POST[ 'meta-content-text-color' ] ) ) {
	    update_post_meta( $post_id, 'meta-content-text-color', $_POST[ 'meta-content-text-color' ] );
    }

   // Checks for input and saves if needed
    if( isset( $_POST[ 'meta-color-text' ] ) ) {
      update_post_meta( $post_id, 'meta-color-text', $_POST[ 'meta-color-text' ] );
    }
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'sig-logo' ] ) ) {
				update_post_meta( $post_id, 'sig-logo', $_POST[ 'sig-logo' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'holiday-description' ] ) ) {
				update_post_meta( $post_id, 'holiday-description', $_POST[ 'holiday-description' ] );
		}
	
	// Checks for input and saves for carousel 
		if( isset( $_POST[ 'holiday-holidaydsel-checkbox' ] ) ) {
				update_post_meta( $post_id, 'holiday-holidaydsel-checkbox', 'yes' );
		} else {
				update_post_meta( $post_id, 'holiday-holidaydsel-checkbox', '' );
		}

	// Checks for input and saves if needed
		if( isset( $_POST[ 'holidaydsel-1-link' ] ) ) {
				update_post_meta( $post_id, 'holidaydsel-1-link', $_POST[ 'holidaydsel-1-link' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'holidaydsel-1-img' ] ) ) {
				update_post_meta( $post_id, 'holidaydsel-1-img', $_POST[ 'holidaydsel-1-img' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'holidaydsel-1-h4' ] ) ) {
				update_post_meta( $post_id, 'holidaydsel-1-h4', $_POST[ 'holidaydsel-1-h4' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'holidaydsel-1-h5' ] ) ) {
				update_post_meta( $post_id, 'holidaydsel-1-h5', $_POST[ 'holidaydsel-1-h5' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'holidaydsel-2-link' ] ) ) {
				update_post_meta( $post_id, 'holidaydsel-2-link', $_POST[ 'holidaydsel-2-link' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'holidaydsel-2-img' ] ) ) {
				update_post_meta( $post_id, 'holidaydsel-2-img', $_POST[ 'holidaydsel-2-img' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'holidaydsel-2-h4' ] ) ) {
				update_post_meta( $post_id, 'holidaydsel-2-h4', $_POST[ 'holidaydsel-2-h4' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'holidaydsel-2-h5' ] ) ) {
				update_post_meta( $post_id, 'holidaydsel-2-h5', $_POST[ 'holidaydsel-2-h5' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'holidaydsel-3-link' ] ) ) {
				update_post_meta( $post_id, 'holidaydsel-3-link', $_POST[ 'holidaydsel-3-link' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'holidaydsel-3-img' ] ) ) {
				update_post_meta( $post_id, 'holidaydsel-3-img', $_POST[ 'holidaydsel-3-img' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'holidaydsel-3-h4' ] ) ) {
				update_post_meta( $post_id, 'holidaydsel-3-h4', $_POST[ 'holidaydsel-3-h4' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'holidaydsel-3-h5' ] ) ) {
				update_post_meta( $post_id, 'holidaydsel-3-h5', $_POST[ 'holidaydsel-3-h5' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'holidaydsel-4-link' ] ) ) {
				update_post_meta( $post_id, 'holidaydsel-4-link', $_POST[ 'holidaydsel-4-link' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'holidaydsel-4-img' ] ) ) {
				update_post_meta( $post_id, 'holidaydsel-4-img', $_POST[ 'holidaydsel-4-img' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'holidaydsel-4-h4' ] ) ) {
				update_post_meta( $post_id, 'holidaydsel-4-h4', $_POST[ 'holidaydsel-4-h4' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'holidaydsel-4-h5' ] ) ) {
				update_post_meta( $post_id, 'holidaydsel-4-h5', $_POST[ 'holidaydsel-4-h5' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'holidaydsel-5-link' ] ) ) {
				update_post_meta( $post_id, 'holidaydsel-5-link', $_POST[ 'holidaydsel-5-link' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'holidaydsel-5-img' ] ) ) {
				update_post_meta( $post_id, 'holidaydsel-5-img', $_POST[ 'holidaydsel-5-img' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'holidaydsel-5-h4' ] ) ) {
				update_post_meta( $post_id, 'holidaydsel-5-h4', $_POST[ 'holidaydsel-5-h4' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'holidaydsel-5-h5' ] ) ) {
				update_post_meta( $post_id, 'holidaydsel-5-h5', $_POST[ 'holidaydsel-5-h5' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'holidaydsel-6-link' ] ) ) {
				update_post_meta( $post_id, 'holidaydsel-6-link', $_POST[ 'holidaydsel-6-link' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'holidaydsel-6-img' ] ) ) {
				update_post_meta( $post_id, 'holidaydsel-6-img', $_POST[ 'holidaydsel-6-img' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'holidaydsel-6-h4' ] ) ) {
				update_post_meta( $post_id, 'holidaydsel-6-h4', $_POST[ 'holidaydsel-6-h4' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'holidaydsel-6-h5' ] ) ) {
				update_post_meta( $post_id, 'holidaydsel-6-h5', $_POST[ 'holidaydsel-6-h5' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'holiday-image-1-title' ] ) ) {
				update_post_meta( $post_id, 'holiday-image-1-title', $_POST[ 'holiday-image-1-title' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'holiday-image-1-title-link' ]) ) {
				update_post_meta( $post_id, 'holiday-image-1-title-link', $_POST[ 'holiday-image-1-title-link' ] );
		}

	// Checks for input and saves if needed
		if( isset( $_POST[ 'holiday-image-1' ] ) ) {
				update_post_meta( $post_id, 'holiday-image-1', $_POST[ 'holiday-image-1' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'holiday-image-1-sub-title' ] ) ) {
				update_post_meta( $post_id, 'holiday-image-1-sub-title', $_POST[ 'holiday-image-1-sub-title' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'holiday-image-1-caption' ] ) ) {
				update_post_meta( $post_id, 'holiday-image-1-caption', $_POST[ 'holiday-image-1-caption' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'holiday-image-2-title' ] ) ) {
				update_post_meta( $post_id, 'holiday-image-2-title', $_POST[ 'holiday-image-2-title' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'holiday-image-2-title-link' ]) ) {
				update_post_meta( $post_id, 'holiday-image-2-title-link', $_POST[ 'holiday-image-2-title-link' ] );
		}

	// Checks for input and saves if needed
		if( isset( $_POST[ 'holiday-image-2' ] ) ) {
				update_post_meta( $post_id, 'holiday-image-2', $_POST[ 'holiday-image-2' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'holiday-image-2-sub-title' ] ) ) {
				update_post_meta( $post_id, 'holiday-image-2-sub-title', $_POST[ 'holiday-image-2-sub-title' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'holiday-image-2-caption' ] ) ) {
				update_post_meta( $post_id, 'holiday-image-2-caption', $_POST[ 'holiday-image-2-caption' ] );
		}

	// Checks for input and saves if needed
		if( isset( $_POST[ 'holiday-image-3-title' ] ) ) {
				update_post_meta( $post_id, 'holiday-image-3-title', $_POST[ 'holiday-image-3-title' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'holiday-image-3-title-link' ]) ) {
				update_post_meta( $post_id, 'holiday-image-3-title-link', $_POST[ 'holiday-image-3-title-link' ] );
		}

	// Checks for input and saves if needed
		if( isset( $_POST[ 'holiday-image-3' ] ) ) {
				update_post_meta( $post_id, 'holiday-image-3', $_POST[ 'holiday-image-3' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'holiday-image-3-sub-title' ] ) ) {
				update_post_meta( $post_id, 'holiday-image-3-sub-title', $_POST[ 'holiday-image-3-sub-title' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'holiday-image-3-caption' ] ) ) {
				update_post_meta( $post_id, 'holiday-image-3-caption', $_POST[ 'holiday-image-3-caption' ] );
		}
	
	// Checks for input and saves for images 4, 5, 6
		if( isset( $_POST[ 'holiday-456-checkbox' ] ) ) {
				update_post_meta( $post_id, 'holiday-456-checkbox', 'yes' );
		} else {
				update_post_meta( $post_id, 'holiday-456-checkbox', '' );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'holiday-image-4-title' ] ) ) {
				update_post_meta( $post_id, 'holiday-image-4-title', $_POST[ 'holiday-image-4-title' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'holiday-image-4-title-link' ]) ) {
				update_post_meta( $post_id, 'holiday-image-4-title-link', $_POST[ 'holiday-image-4-title-link' ] );
		}

	// Checks for input and saves if needed
		if( isset( $_POST[ 'holiday-image-4' ] ) ) {
				update_post_meta( $post_id, 'holiday-image-4', $_POST[ 'holiday-image-4' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'holiday-image-4-sub-title' ] ) ) {
				update_post_meta( $post_id, 'holiday-image-4-sub-title', $_POST[ 'holiday-image-4-sub-title' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'holiday-image-4-caption' ] ) ) {
				update_post_meta( $post_id, 'holiday-image-4-caption', $_POST[ 'holiday-image-4-caption' ] );
		}

	// Checks for input and saves if needed
		if( isset( $_POST[ 'holiday-image-5-title' ] ) ) {
				update_post_meta( $post_id, 'holiday-image-5-title', $_POST[ 'holiday-image-5-title' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'holiday-image-5-title-link' ]) ) {
				update_post_meta( $post_id, 'holiday-image-5-title-link', $_POST[ 'holiday-image-5-title-link' ] );
		}

	// Checks for input and saves if needed
		if( isset( $_POST[ 'holiday-image-5' ] ) ) {
				update_post_meta( $post_id, 'holiday-image-5', $_POST[ 'holiday-image-5' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'holiday-image-5-sub-title' ] ) ) {
				update_post_meta( $post_id, 'holiday-image-5-sub-title', $_POST[ 'holiday-image-5-sub-title' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'holiday-image-5-caption' ] ) ) {
				update_post_meta( $post_id, 'holiday-image-5-caption', $_POST[ 'holiday-image-5-caption' ] );
		}

	// Checks for input and saves if needed
		if( isset( $_POST[ 'holiday-image-6-title' ] ) ) {
				update_post_meta( $post_id, 'holiday-image-6-title', $_POST[ 'holiday-image-6-title' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'holiday-image-6-title-link' ]) ) {
				update_post_meta( $post_id, 'holiday-image-6-title-link', $_POST[ 'holiday-image-6-title-link' ] );
		}

	// Checks for input and saves if needed
		if( isset( $_POST[ 'holiday-image-6' ] ) ) {
				update_post_meta( $post_id, 'holiday-image-6', $_POST[ 'holiday-image-6' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'holiday-image-6-sub-title' ] ) ) {
				update_post_meta( $post_id, 'holiday-image-6-sub-title', $_POST[ 'holiday-image-6-sub-title' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'holiday-image-6-caption' ] ) ) {
				update_post_meta( $post_id, 'holiday-image-6-caption', $_POST[ 'holiday-image-6-caption' ] );
		}
	
	// Checks for input and saves for images 7, 8, 9
		if( isset( $_POST[ 'holiday-789-checkbox' ] ) ) {
				update_post_meta( $post_id, 'holiday-789-checkbox', 'yes' );
		} else {
				update_post_meta( $post_id, 'holiday-789-checkbox', '' );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'holiday-image-7-title' ] ) ) {
				update_post_meta( $post_id, 'holiday-image-7-title', $_POST[ 'holiday-image-7-title' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'holiday-image-7-title-link' ]) ) {
				update_post_meta( $post_id, 'holiday-image-7-title-link', $_POST[ 'holiday-image-7-title-link' ] );
		}

	// Checks for input and saves if needed
		if( isset( $_POST[ 'holiday-image-7' ] ) ) {
				update_post_meta( $post_id, 'holiday-image-7', $_POST[ 'holiday-image-7' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'holiday-image-7-sub-title' ] ) ) {
				update_post_meta( $post_id, 'holiday-image-7-sub-title', $_POST[ 'holiday-image-7-sub-title' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'holiday-image-7-caption' ] ) ) {
				update_post_meta( $post_id, 'holiday-image-7-caption', $_POST[ 'holiday-image-7-caption' ] );
		}

	// Checks for input and saves if needed
		if( isset( $_POST[ 'holiday-image-8-title' ] ) ) {
				update_post_meta( $post_id, 'holiday-image-8-title', $_POST[ 'holiday-image-8-title' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'holiday-image-8-title-link' ]) ) {
				update_post_meta( $post_id, 'holiday-image-8-title-link', $_POST[ 'holiday-image-8-title-link' ] );
		}

	// Checks for input and saves if needed
		if( isset( $_POST[ 'holiday-image-8' ] ) ) {
				update_post_meta( $post_id, 'holiday-image-8', $_POST[ 'holiday-image-8' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'holiday-image-8-sub-title' ] ) ) {
				update_post_meta( $post_id, 'holiday-image-8-sub-title', $_POST[ 'holiday-image-8-sub-title' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'holiday-image-8-caption' ] ) ) {
				update_post_meta( $post_id, 'holiday-image-8-caption', $_POST[ 'holiday-image-8-caption' ] );
		}

	// Checks for input and saves if needed
		if( isset( $_POST[ 'holiday-image-9-title' ] ) ) {
				update_post_meta( $post_id, 'holiday-image-9-title', $_POST[ 'holiday-image-9-title' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'holiday-image-9-title-link' ]) ) {
				update_post_meta( $post_id, 'holiday-image-9-title-link', $_POST[ 'holiday-image-9-title-link' ] );
		}

	// Checks for input and saves if needed
		if( isset( $_POST[ 'holiday-image-9' ] ) ) {
				update_post_meta( $post_id, 'holiday-image-9', $_POST[ 'holiday-image-9' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'holiday-image-9-sub-title' ] ) ) {
				update_post_meta( $post_id, 'holiday-image-9-sub-title', $_POST[ 'holiday-image-9-sub-title' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'holiday-image-9-caption' ] ) ) {
				update_post_meta( $post_id, 'holiday-image-9-caption', $_POST[ 'holiday-image-9-caption' ] );
		}
	
	// Checks for input and saves for images 10, 11, 12
		if( isset( $_POST[ 'holiday-101112-checkbox' ] ) ) {
				update_post_meta( $post_id, 'holiday-101112-checkbox', 'yes' );
		} else {
				update_post_meta( $post_id, 'holiday-101112-checkbox', '' );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'holiday-image-10-title' ] ) ) {
				update_post_meta( $post_id, 'holiday-image-10-title', $_POST[ 'holiday-image-10-title' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'holiday-image-10-title-link' ]) ) {
				update_post_meta( $post_id, 'holiday-image-10-title-link', $_POST[ 'holiday-image-10-title-link' ] );
		}

	// Checks for input and saves if needed
		if( isset( $_POST[ 'holiday-image-10' ] ) ) {
				update_post_meta( $post_id, 'holiday-image-10', $_POST[ 'holiday-image-10' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'holiday-image-10-sub-title' ] ) ) {
				update_post_meta( $post_id, 'holiday-image-10-sub-title', $_POST[ 'holiday-image-10-sub-title' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'holiday-image-10-caption' ] ) ) {
				update_post_meta( $post_id, 'holiday-image-10-caption', $_POST[ 'holiday-image-10-caption' ] );
		}

	// Checks for input and saves if needed
		if( isset( $_POST[ 'holiday-image-11-title' ] ) ) {
				update_post_meta( $post_id, 'holiday-image-11-title', $_POST[ 'holiday-image-11-title' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'holiday-image-11-title-link' ]) ) {
				update_post_meta( $post_id, 'holiday-image-11-title-link', $_POST[ 'holiday-image-11-title-link' ] );
		}

	// Checks for input and saves if needed
		if( isset( $_POST[ 'holiday-image-11' ] ) ) {
				update_post_meta( $post_id, 'holiday-image-11', $_POST[ 'holiday-image-11' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'holiday-image-11-sub-title' ] ) ) {
				update_post_meta( $post_id, 'holiday-image-11-sub-title', $_POST[ 'holiday-image-11-sub-title' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'holiday-image-11-caption' ] ) ) {
				update_post_meta( $post_id, 'holiday-image-11-caption', $_POST[ 'holiday-image-11-caption' ] );
		}

	// Checks for input and saves if needed
		if( isset( $_POST[ 'holiday-image-12-title' ] ) ) {
				update_post_meta( $post_id, 'holiday-image-12-title', $_POST[ 'holiday-image-12-title' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'holiday-image-12-title-link' ]) ) {
				update_post_meta( $post_id, 'holiday-image-12-title-link', $_POST[ 'holiday-image-12-title-link' ] );
		}

	// Checks for input and saves if needed
		if( isset( $_POST[ 'holiday-image-12' ] ) ) {
				update_post_meta( $post_id, 'holiday-image-12', $_POST[ 'holiday-image-12' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'holiday-image-12-sub-title' ] ) ) {
				update_post_meta( $post_id, 'holiday-image-12-sub-title', $_POST[ 'holiday-image-12-sub-title' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'holiday-image-12-caption' ] ) ) {
				update_post_meta( $post_id, 'holiday-image-12-caption', $_POST[ 'holiday-image-12-caption' ] );
		}
	
	// Checks for input and saves for centered final image
		if( isset( $_POST[ 'holiday-131415-checkbox' ] ) ) {
				update_post_meta( $post_id, 'holiday-131415-checkbox', 'yes' );
		} else {
				update_post_meta( $post_id, 'holiday-131415-checkbox', '' );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'holiday-image-13-title' ] ) ) {
				update_post_meta( $post_id, 'holiday-image-13-title', $_POST[ 'holiday-image-13-title' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'holiday-image-13-title-link' ]) ) {
				update_post_meta( $post_id, 'holiday-image-13-title-link', $_POST[ 'holiday-image-13-title-link' ] );
		}

	// Checks for input and saves if needed
		if( isset( $_POST[ 'holiday-image-13' ] ) ) {
				update_post_meta( $post_id, 'holiday-image-13', $_POST[ 'holiday-image-13' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'holiday-image-13-sub-title' ] ) ) {
				update_post_meta( $post_id, 'holiday-image-13-sub-title', $_POST[ 'holiday-image-13-sub-title' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'holiday-image-13-caption' ] ) ) {
				update_post_meta( $post_id, 'holiday-image-13-caption', $_POST[ 'holiday-image-13-caption' ] );
		}

	// Checks for input and saves if needed
		if( isset( $_POST[ 'holiday-image-14-title' ] ) ) {
				update_post_meta( $post_id, 'holiday-image-14-title', $_POST[ 'holiday-image-14-title' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'holiday-image-14-title-link' ]) ) {
				update_post_meta( $post_id, 'holiday-image-14-title-link', $_POST[ 'holiday-image-14-title-link' ] );
		}

	// Checks for input and saves if needed
		if( isset( $_POST[ 'holiday-image-14' ] ) ) {
				update_post_meta( $post_id, 'holiday-image-14', $_POST[ 'holiday-image-14' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'holiday-image-14-sub-title' ] ) ) {
				update_post_meta( $post_id, 'holiday-image-14-sub-title', $_POST[ 'holiday-image-14-sub-title' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'holiday-image-14-caption' ] ) ) {
				update_post_meta( $post_id, 'holiday-image-14-caption', $_POST[ 'holiday-image-14-caption' ] );
		}

	// Checks for input and saves if needed
		if( isset( $_POST[ 'holiday-image-15-title' ] ) ) {
				update_post_meta( $post_id, 'holiday-image-15-title', $_POST[ 'holiday-image-15-title' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'holiday-image-15-title-link' ]) ) {
				update_post_meta( $post_id, 'holiday-image-15-title-link', $_POST[ 'holiday-image-15-title-link' ] );
		}

	// Checks for input and saves if needed
		if( isset( $_POST[ 'holiday-image-15' ] ) ) {
				update_post_meta( $post_id, 'holiday-image-15', $_POST[ 'holiday-image-15' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'holiday-image-15-sub-title' ] ) ) {
				update_post_meta( $post_id, 'holiday-image-15-sub-title', $_POST[ 'holiday-image-15-sub-title' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'holiday-image-15-caption' ] ) ) {
				update_post_meta( $post_id, 'holiday-image-15-caption', $_POST[ 'holiday-image-15-caption' ] );
		}
	
	// Checks for input and saves for centered final image
		if( isset( $_POST[ 'holiday-161718-checkbox' ] ) ) {
				update_post_meta( $post_id, 'holiday-161718-checkbox', 'yes' );
		} else {
				update_post_meta( $post_id, 'holiday-161718-checkbox', '' );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'holiday-image-16-title' ] ) ) {
				update_post_meta( $post_id, 'holiday-image-16-title', $_POST[ 'holiday-image-16-title' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'holiday-image-16-title-link' ]) ) {
				update_post_meta( $post_id, 'holiday-image-16-title-link', $_POST[ 'holiday-image-16-title-link' ] );
		}

	// Checks for input and saves if needed
		if( isset( $_POST[ 'holiday-image-16' ] ) ) {
				update_post_meta( $post_id, 'holiday-image-16', $_POST[ 'holiday-image-16' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'holiday-image-16-sub-title' ] ) ) {
				update_post_meta( $post_id, 'holiday-image-16-sub-title', $_POST[ 'holiday-image-16-sub-title' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'holiday-image-16-caption' ] ) ) {
				update_post_meta( $post_id, 'holiday-image-16-caption', $_POST[ 'holiday-image-16-caption' ] );
		}

	// Checks for input and saves if needed
		if( isset( $_POST[ 'holiday-image-17-title' ] ) ) {
				update_post_meta( $post_id, 'holiday-image-17-title', $_POST[ 'holiday-image-17-title' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'holiday-image-17-title-link' ]) ) {
				update_post_meta( $post_id, 'holiday-image-17-title-link', $_POST[ 'holiday-image-17-title-link' ] );
		}

	// Checks for input and saves if needed
		if( isset( $_POST[ 'holiday-image-17' ] ) ) {
				update_post_meta( $post_id, 'holiday-image-17', $_POST[ 'holiday-image-17' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'holiday-image-17-sub-title' ] ) ) {
				update_post_meta( $post_id, 'holiday-image-17-sub-title', $_POST[ 'holiday-image-17-sub-title' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'holiday-image-17-caption' ] ) ) {
				update_post_meta( $post_id, 'holiday-image-17-caption', $_POST[ 'holiday-image-17-caption' ] );
		}

	// Checks for input and saves if needed
		if( isset( $_POST[ 'holiday-image-18-title' ] ) ) {
				update_post_meta( $post_id, 'holiday-image-18-title', $_POST[ 'holiday-image-18-title' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'holiday-image-18-title-link' ]) ) {
				update_post_meta( $post_id, 'holiday-image-18-title-link', $_POST[ 'holiday-image-18-title-link' ] );
		}

	// Checks for input and saves if needed
		if( isset( $_POST[ 'holiday-image-18' ] ) ) {
				update_post_meta( $post_id, 'holiday-image-18', $_POST[ 'holiday-image-18' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'holiday-image-18-sub-title' ] ) ) {
				update_post_meta( $post_id, 'holiday-image-18-sub-title', $_POST[ 'holiday-image-18-sub-title' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'holiday-image-18-caption' ] ) ) {
				update_post_meta( $post_id, 'holiday-image-18-caption', $_POST[ 'holiday-image-18-caption' ] );
		}
	
	// Checks for input and saves for centered final image
		if( isset( $_POST[ 'holiday-192021-checkbox' ] ) ) {
				update_post_meta( $post_id, 'holiday-192021-checkbox', 'yes' );
		} else {
				update_post_meta( $post_id, 'holiday-192021-checkbox', '' );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'holiday-image-19-title' ] ) ) {
				update_post_meta( $post_id, 'holiday-image-19-title', $_POST[ 'holiday-image-19-title' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'holiday-image-19-title-link' ]) ) {
				update_post_meta( $post_id, 'holiday-image-19-title-link', $_POST[ 'holiday-image-19-title-link' ] );
		}

	// Checks for input and saves if needed
		if( isset( $_POST[ 'holiday-image-19' ] ) ) {
				update_post_meta( $post_id, 'holiday-image-19', $_POST[ 'holiday-image-19' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'holiday-image-19-sub-title' ] ) ) {
				update_post_meta( $post_id, 'holiday-image-19-sub-title', $_POST[ 'holiday-image-19-sub-title' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'holiday-image-19-caption' ] ) ) {
				update_post_meta( $post_id, 'holiday-image-19-caption', $_POST[ 'holiday-image-19-caption' ] );
		}

	// Checks for input and saves if needed
		if( isset( $_POST[ 'holiday-image-20-title' ] ) ) {
				update_post_meta( $post_id, 'holiday-image-20-title', $_POST[ 'holiday-image-20-title' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'holiday-image-20-title-link' ]) ) {
				update_post_meta( $post_id, 'holiday-image-20-title-link', $_POST[ 'holiday-image-20-title-link' ] );
		}

	// Checks for input and saves if needed
		if( isset( $_POST[ 'holiday-image-20' ] ) ) {
				update_post_meta( $post_id, 'holiday-image-20', $_POST[ 'holiday-image-20' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'holiday-image-20-sub-title' ] ) ) {
				update_post_meta( $post_id, 'holiday-image-20-sub-title', $_POST[ 'holiday-image-20-sub-title' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'holiday-image-20-caption' ] ) ) {
				update_post_meta( $post_id, 'holiday-image-20-caption', $_POST[ 'holiday-image-20-caption' ] );
		}

	// Checks for input and saves if needed
		if( isset( $_POST[ 'holiday-image-21-title' ] ) ) {
				update_post_meta( $post_id, 'holiday-image-21-title', $_POST[ 'holiday-image-21-title' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'holiday-image-21-title-link' ]) ) {
				update_post_meta( $post_id, 'holiday-image-21-title-link', $_POST[ 'holiday-image-21-title-link' ] );
		}

	// Checks for input and saves if needed
		if( isset( $_POST[ 'holiday-image-21' ] ) ) {
				update_post_meta( $post_id, 'holiday-image-21', $_POST[ 'holiday-image-21' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'holiday-image-21-sub-title' ] ) ) {
				update_post_meta( $post_id, 'holiday-image-21-sub-title', $_POST[ 'holiday-image-21-sub-title' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'holiday-image-21-caption' ] ) ) {
				update_post_meta( $post_id, 'holiday-image-21-caption', $_POST[ 'holiday-image-21-caption' ] );
		}
	
	// Checks for input and saves for centered final image
		if( isset( $_POST[ 'holiday-222324-checkbox' ] ) ) {
				update_post_meta( $post_id, 'holiday-222324-checkbox', 'yes' );
		} else {
				update_post_meta( $post_id, 'holiday-222324-checkbox', '' );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'holiday-image-22-title' ] ) ) {
				update_post_meta( $post_id, 'holiday-image-22-title', $_POST[ 'holiday-image-22-title' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'holiday-image-22-title-link' ]) ) {
				update_post_meta( $post_id, 'holiday-image-22-title-link', $_POST[ 'holiday-image-22-title-link' ] );
		}

	// Checks for input and saves if needed
		if( isset( $_POST[ 'holiday-image-22' ] ) ) {
				update_post_meta( $post_id, 'holiday-image-22', $_POST[ 'holiday-image-22' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'holiday-image-22-sub-title' ] ) ) {
				update_post_meta( $post_id, 'holiday-image-22-sub-title', $_POST[ 'holiday-image-22-sub-title' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'holiday-image-22-caption' ] ) ) {
				update_post_meta( $post_id, 'holiday-image-22-caption', $_POST[ 'holiday-image-22-caption' ] );
		}

	// Checks for input and saves if needed
		if( isset( $_POST[ 'holiday-image-23-title' ] ) ) {
				update_post_meta( $post_id, 'holiday-image-23-title', $_POST[ 'holiday-image-23-title' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'holiday-image-23-title-link' ]) ) {
				update_post_meta( $post_id, 'holiday-image-23-title-link', $_POST[ 'holiday-image-23-title-link' ] );
		}

	// Checks for input and saves if needed
		if( isset( $_POST[ 'holiday-image-23' ] ) ) {
				update_post_meta( $post_id, 'holiday-image-23', $_POST[ 'holiday-image-23' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'holiday-image-23-sub-title' ] ) ) {
				update_post_meta( $post_id, 'holiday-image-23-sub-title', $_POST[ 'holiday-image-23-sub-title' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'holiday-image-23-caption' ] ) ) {
				update_post_meta( $post_id, 'holiday-image-23-caption', $_POST[ 'holiday-image-23-caption' ] );
		}

	// Checks for input and saves if needed
		if( isset( $_POST[ 'holiday-image-24-title' ] ) ) {
				update_post_meta( $post_id, 'holiday-image-24-title', $_POST[ 'holiday-image-24-title' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'holiday-image-24-title-link' ]) ) {
				update_post_meta( $post_id, 'holiday-image-24-title-link', $_POST[ 'holiday-image-24-title-link' ] );
		}

	// Checks for input and saves if needed
		if( isset( $_POST[ 'holiday-image-24' ] ) ) {
				update_post_meta( $post_id, 'holiday-image-24', $_POST[ 'holiday-image-24' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'holiday-image-24-sub-title' ] ) ) {
				update_post_meta( $post_id, 'holiday-image-24-sub-title', $_POST[ 'holiday-image-24-sub-title' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'holiday-image-24-caption' ] ) ) {
				update_post_meta( $post_id, 'holiday-image-24-caption', $_POST[ 'holiday-image-24-caption' ] );
		}
	
		// Checks for input and saves for centered final image
		if( isset( $_POST[ 'holiday-252627-checkbox' ] ) ) {
				update_post_meta( $post_id, 'holiday-252627-checkbox', 'yes' );
		} else {
				update_post_meta( $post_id, 'holiday-252627-checkbox', '' );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'holiday-image-25-title' ] ) ) {
				update_post_meta( $post_id, 'holiday-image-25-title', $_POST[ 'holiday-image-25-title' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'holiday-image-25-title-link' ]) ) {
				update_post_meta( $post_id, 'holiday-image-25-title-link', $_POST[ 'holiday-image-25-title-link' ] );
		}

	// Checks for input and saves if needed
		if( isset( $_POST[ 'holiday-image-25' ] ) ) {
				update_post_meta( $post_id, 'holiday-image-25', $_POST[ 'holiday-image-25' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'holiday-image-25-sub-title' ] ) ) {
				update_post_meta( $post_id, 'holiday-image-25-sub-title', $_POST[ 'holiday-image-25-sub-title' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'holiday-image-25-caption' ] ) ) {
				update_post_meta( $post_id, 'holiday-image-25-caption', $_POST[ 'holiday-image-25-caption' ] );
		}

	// Checks for input and saves if needed
		if( isset( $_POST[ 'holiday-image-26-title' ] ) ) {
				update_post_meta( $post_id, 'holiday-image-26-title', $_POST[ 'holiday-image-26-title' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'holiday-image-26-title-link' ]) ) {
				update_post_meta( $post_id, 'holiday-image-26-title-link', $_POST[ 'holiday-image-26-title-link' ] );
		}

	// Checks for input and saves if needed
		if( isset( $_POST[ 'holiday-image-26' ] ) ) {
				update_post_meta( $post_id, 'holiday-image-26', $_POST[ 'holiday-image-26' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'holiday-image-26-sub-title' ] ) ) {
				update_post_meta( $post_id, 'holiday-image-26-sub-title', $_POST[ 'holiday-image-26-sub-title' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'holiday-image-26-caption' ] ) ) {
				update_post_meta( $post_id, 'holiday-image-26-caption', $_POST[ 'holiday-image-26-caption' ] );
		}

	// Checks for input and saves if needed
		if( isset( $_POST[ 'holiday-image-27-title' ] ) ) {
				update_post_meta( $post_id, 'holiday-image-27-title', $_POST[ 'holiday-image-27-title' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'holiday-image-27-title-link' ]) ) {
				update_post_meta( $post_id, 'holiday-image-27-title-link', $_POST[ 'holiday-image-27-title-link' ] );
		}

	// Checks for input and saves if needed
		if( isset( $_POST[ 'holiday-image-27' ] ) ) {
				update_post_meta( $post_id, 'holiday-image-27', $_POST[ 'holiday-image-27' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'holiday-image-27-sub-title' ] ) ) {
				update_post_meta( $post_id, 'holiday-image-27-sub-title', $_POST[ 'holiday-image-27-sub-title' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'holiday-image-27-caption' ] ) ) {
				update_post_meta( $post_id, 'holiday-image-27-caption', $_POST[ 'holiday-image-27-caption' ] );
		}

	
	
	
	// Checks for input and saves for centered final image
		if( isset( $_POST[ 'holiday-282930-checkbox' ] ) ) {
				update_post_meta( $post_id, 'holiday-282930-checkbox', 'yes' );
		} else {
				update_post_meta( $post_id, 'holiday-282930-checkbox', '' );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'holiday-image-28-title' ] ) ) {
				update_post_meta( $post_id, 'holiday-image-28-title', $_POST[ 'holiday-image-28-title' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'holiday-image-28-title-link' ]) ) {
				update_post_meta( $post_id, 'holiday-image-28-title-link', $_POST[ 'holiday-image-28-title-link' ] );
		}

	// Checks for input and saves if needed
		if( isset( $_POST[ 'holiday-image-28' ] ) ) {
				update_post_meta( $post_id, 'holiday-image-28', $_POST[ 'holiday-image-28' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'holiday-image-28-sub-title' ] ) ) {
				update_post_meta( $post_id, 'holiday-image-28-sub-title', $_POST[ 'holiday-image-28-sub-title' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'holiday-image-28-caption' ] ) ) {
				update_post_meta( $post_id, 'holiday-image-28-caption', $_POST[ 'holiday-image-28-caption' ] );
		}

	// Checks for input and saves if needed
		if( isset( $_POST[ 'holiday-image-29-title' ] ) ) {
				update_post_meta( $post_id, 'holiday-image-29-title', $_POST[ 'holiday-image-29-title' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'holiday-image-29-title-link' ]) ) {
				update_post_meta( $post_id, 'holiday-image-29-title-link', $_POST[ 'holiday-image-29-title-link' ] );
		}

	// Checks for input and saves if needed
		if( isset( $_POST[ 'holiday-image-29' ] ) ) {
				update_post_meta( $post_id, 'holiday-image-29', $_POST[ 'holiday-image-29' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'holiday-image-29-sub-title' ] ) ) {
				update_post_meta( $post_id, 'holiday-image-29-sub-title', $_POST[ 'holiday-image-29-sub-title' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'holiday-image-29-caption' ] ) ) {
				update_post_meta( $post_id, 'holiday-image-29-caption', $_POST[ 'holiday-image-29-caption' ] );
		}

	// Checks for input and saves if needed
		if( isset( $_POST[ 'holiday-image-30-title' ] ) ) {
				update_post_meta( $post_id, 'holiday-image-30-title', $_POST[ 'holiday-image-30-title' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'holiday-image-30-title-link' ]) ) {
				update_post_meta( $post_id, 'holiday-image-30-title-link', $_POST[ 'holiday-image-30-title-link' ] );
		}

	// Checks for input and saves if needed
		if( isset( $_POST[ 'holiday-image-30' ] ) ) {
				update_post_meta( $post_id, 'holiday-image-30', $_POST[ 'holiday-image-30' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'holiday-image-30-sub-title' ] ) ) {
				update_post_meta( $post_id, 'holiday-image-30-sub-title', $_POST[ 'holiday-image-30-sub-title' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'holiday-image-30-caption' ] ) ) {
				update_post_meta( $post_id, 'holiday-image-30-caption', $_POST[ 'holiday-image-30-caption' ] );
		}

	// Checks for input and saves for centered final image
		if( isset( $_POST[ 'holiday-313233-checkbox' ] ) ) {
				update_post_meta( $post_id, 'holiday-313233-checkbox', 'yes' );
		} else {
				update_post_meta( $post_id, 'holiday-313233-checkbox', '' );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'holiday-image-31-title' ] ) ) {
				update_post_meta( $post_id, 'holiday-image-31-title', $_POST[ 'holiday-image-31-title' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'holiday-image-31-title-link' ]) ) {
				update_post_meta( $post_id, 'holiday-image-31-title-link', $_POST[ 'holiday-image-31-title-link' ] );
		}

	// Checks for input and saves if needed
		if( isset( $_POST[ 'holiday-image-31' ] ) ) {
				update_post_meta( $post_id, 'holiday-image-31', $_POST[ 'holiday-image-31' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'holiday-image-31-sub-title' ] ) ) {
				update_post_meta( $post_id, 'holiday-image-31-sub-title', $_POST[ 'holiday-image-31-sub-title' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'holiday-image-31-caption' ] ) ) {
				update_post_meta( $post_id, 'holiday-image-31-caption', $_POST[ 'holiday-image-31-caption' ] );
		}

	// Checks for input and saves if needed
		if( isset( $_POST[ 'holiday-image-32-title' ] ) ) {
				update_post_meta( $post_id, 'holiday-image-32-title', $_POST[ 'holiday-image-32-title' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'holiday-image-32-title-link' ]) ) {
				update_post_meta( $post_id, 'holiday-image-32-title-link', $_POST[ 'holiday-image-32-title-link' ] );
		}

	// Checks for input and saves if needed
		if( isset( $_POST[ 'holiday-image-32' ] ) ) {
				update_post_meta( $post_id, 'holiday-image-32', $_POST[ 'holiday-image-32' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'holiday-image-32-sub-title' ] ) ) {
				update_post_meta( $post_id, 'holiday-image-32-sub-title', $_POST[ 'holiday-image-32-sub-title' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'holiday-image-32-caption' ] ) ) {
				update_post_meta( $post_id, 'holiday-image-32-caption', $_POST[ 'holiday-image-32-caption' ] );
		}

	// Checks for input and saves if needed
		if( isset( $_POST[ 'holiday-image-33-title' ] ) ) {
				update_post_meta( $post_id, 'holiday-image-33-title', $_POST[ 'holiday-image-33-title' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'holiday-image-33-title-link' ]) ) {
				update_post_meta( $post_id, 'holiday-image-33-title-link', $_POST[ 'holiday-image-33-title-link' ] );
		}

	// Checks for input and saves if needed
		if( isset( $_POST[ 'holiday-image-33' ] ) ) {
				update_post_meta( $post_id, 'holiday-image-33', $_POST[ 'holiday-image-33' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'holiday-image-33-sub-title' ] ) ) {
				update_post_meta( $post_id, 'holiday-image-33-sub-title', $_POST[ 'holiday-image-33-sub-title' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'holiday-image-33-caption' ] ) ) {
				update_post_meta( $post_id, 'holiday-image-33-caption', $_POST[ 'holiday-image-33-caption' ] );
		}

	// Checks for input and saves for centered final image
		if( isset( $_POST[ 'holiday-343536-checkbox' ] ) ) {
				update_post_meta( $post_id, 'holiday-343536-checkbox', 'yes' );
		} else {
				update_post_meta( $post_id, 'holiday-343536-checkbox', '' );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'holiday-image-34-title' ] ) ) {
				update_post_meta( $post_id, 'holiday-image-34-title', $_POST[ 'holiday-image-34-title' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'holiday-image-34-title-link' ]) ) {
				update_post_meta( $post_id, 'holiday-image-34-title-link', $_POST[ 'holiday-image-34-title-link' ] );
		}

	// Checks for input and saves if needed
		if( isset( $_POST[ 'holiday-image-34' ] ) ) {
				update_post_meta( $post_id, 'holiday-image-34', $_POST[ 'holiday-image-34' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'holiday-image-34-sub-title' ] ) ) {
				update_post_meta( $post_id, 'holiday-image-34-sub-title', $_POST[ 'holiday-image-34-sub-title' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'holiday-image-34-caption' ] ) ) {
				update_post_meta( $post_id, 'holiday-image-34-caption', $_POST[ 'holiday-image-34-caption' ] );
		}

	// Checks for input and saves if needed
		if( isset( $_POST[ 'holiday-image-35-title' ] ) ) {
				update_post_meta( $post_id, 'holiday-image-35-title', $_POST[ 'holiday-image-35-title' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'holiday-image-35-title-link' ]) ) {
				update_post_meta( $post_id, 'holiday-image-35-title-link', $_POST[ 'holiday-image-35-title-link' ] );
		}

	// Checks for input and saves if needed
		if( isset( $_POST[ 'holiday-image-35' ] ) ) {
				update_post_meta( $post_id, 'holiday-image-35', $_POST[ 'holiday-image-35' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'holiday-image-35-sub-title' ] ) ) {
				update_post_meta( $post_id, 'holiday-image-35-sub-title', $_POST[ 'holiday-image-35-sub-title' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'holiday-image-35-caption' ] ) ) {
				update_post_meta( $post_id, 'holiday-image-35-caption', $_POST[ 'holiday-image-35-caption' ] );
		}

	// Checks for input and saves if needed
		if( isset( $_POST[ 'holiday-image-36-title' ] ) ) {
				update_post_meta( $post_id, 'holiday-image-36-title', $_POST[ 'holiday-image-36-title' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'holiday-image-36-title-link' ]) ) {
				update_post_meta( $post_id, 'holiday-image-36-title-link', $_POST[ 'holiday-image-36-title-link' ] );
		}

	// Checks for input and saves if needed
		if( isset( $_POST[ 'holiday-image-36' ] ) ) {
				update_post_meta( $post_id, 'holiday-image-36', $_POST[ 'holiday-image-36' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'holiday-image-36-sub-title' ] ) ) {
				update_post_meta( $post_id, 'holiday-image-36-sub-title', $_POST[ 'holiday-image-36-sub-title' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'holiday-image-36-caption' ] ) ) {
				update_post_meta( $post_id, 'holiday-image-36-caption', $_POST[ 'holiday-image-36-caption' ] );
		}
  
  // Checks for input and saves for centered final image
		if( isset( $_POST[ 'holiday-373839-checkbox' ] ) ) {
				update_post_meta( $post_id, 'holiday-373839-checkbox', 'yes' );
		} else {
				update_post_meta( $post_id, 'holiday-373839-checkbox', '' );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'holiday-image-37-title' ] ) ) {
				update_post_meta( $post_id, 'holiday-image-37-title', $_POST[ 'holiday-image-37-title' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'holiday-image-37-title-link' ]) ) {
				update_post_meta( $post_id, 'holiday-image-37-title-link', $_POST[ 'holiday-image-37-title-link' ] );
		}

	// Checks for input and saves if needed
		if( isset( $_POST[ 'holiday-image-37' ] ) ) {
				update_post_meta( $post_id, 'holiday-image-37', $_POST[ 'holiday-image-37' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'holiday-image-37-sub-title' ] ) ) {
				update_post_meta( $post_id, 'holiday-image-37-sub-title', $_POST[ 'holiday-image-37-sub-title' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'holiday-image-37-caption' ] ) ) {
				update_post_meta( $post_id, 'holiday-image-37-caption', $_POST[ 'holiday-image-37-caption' ] );
		}

	// Checks for input and saves if needed
		if( isset( $_POST[ 'holiday-image-38-title' ] ) ) {
				update_post_meta( $post_id, 'holiday-image-38-title', $_POST[ 'holiday-image-38-title' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'holiday-image-38-title-link' ]) ) {
				update_post_meta( $post_id, 'holiday-image-38-title-link', $_POST[ 'holiday-image-38-title-link' ] );
		}

	// Checks for input and saves if needed
		if( isset( $_POST[ 'holiday-image-38' ] ) ) {
				update_post_meta( $post_id, 'holiday-image-38', $_POST[ 'holiday-image-38' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'holiday-image-38-sub-title' ] ) ) {
				update_post_meta( $post_id, 'holiday-image-38-sub-title', $_POST[ 'holiday-image-38-sub-title' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'holiday-image-38-caption' ] ) ) {
				update_post_meta( $post_id, 'holiday-image-38-caption', $_POST[ 'holiday-image-38-caption' ] );
		}

	// Checks for input and saves if needed
		if( isset( $_POST[ 'holiday-image-39-title' ] ) ) {
				update_post_meta( $post_id, 'holiday-image-39-title', $_POST[ 'holiday-image-39-title' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'holiday-image-39-title-link' ]) ) {
				update_post_meta( $post_id, 'holiday-image-39-title-link', $_POST[ 'holiday-image-39-title-link' ] );
		}

	// Checks for input and saves if needed
		if( isset( $_POST[ 'holiday-image-39' ] ) ) {
				update_post_meta( $post_id, 'holiday-image-39', $_POST[ 'holiday-image-39' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'holiday-image-39-sub-title' ] ) ) {
				update_post_meta( $post_id, 'holiday-image-39-sub-title', $_POST[ 'holiday-image-39-sub-title' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'holiday-image-39-caption' ] ) ) {
				update_post_meta( $post_id, 'holiday-image-39-caption', $_POST[ 'holiday-image-39-caption' ] );
		}

  // Checks for input and saves for centered final image
		if( isset( $_POST[ 'holiday-404142-checkbox' ] ) ) {
				update_post_meta( $post_id, 'holiday-404142-checkbox', 'yes' );
		} else {
				update_post_meta( $post_id, 'holiday-404142-checkbox', '' );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'holiday-image-40-title' ] ) ) {
				update_post_meta( $post_id, 'holiday-image-40-title', $_POST[ 'holiday-image-40-title' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'holiday-image-40-title-link' ]) ) {
				update_post_meta( $post_id, 'holiday-image-40-title-link', $_POST[ 'holiday-image-40-title-link' ] );
		}

	// Checks for input and saves if needed
		if( isset( $_POST[ 'holiday-image-40' ] ) ) {
				update_post_meta( $post_id, 'holiday-image-40', $_POST[ 'holiday-image-40' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'holiday-image-40-sub-title' ] ) ) {
				update_post_meta( $post_id, 'holiday-image-40-sub-title', $_POST[ 'holiday-image-40-sub-title' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'holiday-image-40-caption' ] ) ) {
				update_post_meta( $post_id, 'holiday-image-40-caption', $_POST[ 'holiday-image-40-caption' ] );
		}

	// Checks for input and saves if needed
		if( isset( $_POST[ 'holiday-image-41-title' ] ) ) {
				update_post_meta( $post_id, 'holiday-image-41-title', $_POST[ 'holiday-image-41-title' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'holiday-image-41-title-link' ]) ) {
				update_post_meta( $post_id, 'holiday-image-41-title-link', $_POST[ 'holiday-image-41-title-link' ] );
		}

	// Checks for input and saves if needed
		if( isset( $_POST[ 'holiday-image-41' ] ) ) {
				update_post_meta( $post_id, 'holiday-image-41', $_POST[ 'holiday-image-41' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'holiday-image-41-sub-title' ] ) ) {
				update_post_meta( $post_id, 'holiday-image-41-sub-title', $_POST[ 'holiday-image-41-sub-title' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'holiday-image-41-caption' ] ) ) {
				update_post_meta( $post_id, 'holiday-image-41-caption', $_POST[ 'holiday-image-41-caption' ] );
		}

	// Checks for input and saves if needed
		if( isset( $_POST[ 'holiday-image-42-title' ] ) ) {
				update_post_meta( $post_id, 'holiday-image-42-title', $_POST[ 'holiday-image-42-title' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'holiday-image-42-title-link' ]) ) {
				update_post_meta( $post_id, 'holiday-image-42-title-link', $_POST[ 'holiday-image-42-title-link' ] );
		}

	// Checks for input and saves if needed
		if( isset( $_POST[ 'holiday-image-42' ] ) ) {
				update_post_meta( $post_id, 'holiday-image-42', $_POST[ 'holiday-image-42' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'holiday-image-42-sub-title' ] ) ) {
				update_post_meta( $post_id, 'holiday-image-42-sub-title', $_POST[ 'holiday-image-42-sub-title' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'holiday-image-42-caption' ] ) ) {
				update_post_meta( $post_id, 'holiday-image-42-caption', $_POST[ 'holiday-image-42-caption' ] );
		}
  
	// Checks for input and saves for centered final image
		if( isset( $_POST[ 'holiday-1-checkbox' ] ) ) {
				update_post_meta( $post_id, 'holiday-1-checkbox', 'yes' );
		} else {
				update_post_meta( $post_id, 'holiday-1-checkbox', '' );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'holiday-centered-image-title' ] ) ) {
				update_post_meta( $post_id, 'holiday-centered-image-title', $_POST[ 'holiday-centered-image-title' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'holiday-centered-image-title-link' ]) ) {
				update_post_meta( $post_id, 'holiday-centered-image-title-link', $_POST[ 'holiday-centered-image-title-link' ] );
		}

	// Checks for input and saves if needed
		if( isset( $_POST[ 'holiday-centered-image' ] ) ) {
				update_post_meta( $post_id, 'holiday-centered-image', $_POST[ 'holiday-centered-image' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'holiday-centered-image-sub-title' ] ) ) {
				update_post_meta( $post_id, 'holiday-centered-image-sub-title', $_POST[ 'holiday-centered-image-sub-title' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'holiday-centered-image-caption' ] ) ) {
				update_post_meta( $post_id, 'holiday-centered-image-caption', $_POST[ 'holiday-centered-image-caption' ] );
		}
	
	// Checks for input and saves for centered final image
		if( isset( $_POST[ 'holiday-2-checkbox' ] ) ) {
				update_post_meta( $post_id, 'holiday-2-checkbox', 'yes' );
		} else {
				update_post_meta( $post_id, 'holiday-2-checkbox', '' );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'holiday-centered-l-title' ] ) ) {
				update_post_meta( $post_id, 'holiday-centered-l-title', $_POST[ 'holiday-centered-l-title' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'holiday-centered-l-title-link' ]) ) {
				update_post_meta( $post_id, 'holiday-centered-l-title-link', $_POST[ 'holiday-centered-l-title-link' ] );
		}

	// Checks for input and saves if needed
		if( isset( $_POST[ 'holiday-centered-l' ] ) ) {
				update_post_meta( $post_id, 'holiday-centered-l', $_POST[ 'holiday-centered-l' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'holiday-centered-l-sub-title' ] ) ) {
				update_post_meta( $post_id, 'holiday-centered-l-sub-title', $_POST[ 'holiday-centered-l-sub-title' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'holiday-centered-l-caption' ] ) ) {
				update_post_meta( $post_id, 'holiday-centered-l-caption', $_POST[ 'holiday-centered-l-caption' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'holiday-centered-r-title' ] ) ) {
				update_post_meta( $post_id, 'holiday-centered-r-title', $_POST[ 'holiday-centered-r-title' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'holiday-centered-r-title-link' ]) ) {
				update_post_meta( $post_id, 'holiday-centered-r-title-link', $_POST[ 'holiday-centered-r-title-link' ] );
		}

	// Checks for input and saves if needed
		if( isset( $_POST[ 'holiday-centered-r' ] ) ) {
				update_post_meta( $post_id, 'holiday-centered-r', $_POST[ 'holiday-centered-r' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'holiday-centered-r-sub-title' ] ) ) {
				update_post_meta( $post_id, 'holiday-centered-r-sub-title', $_POST[ 'holiday-centered-r-sub-title' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'holiday-centered-r-caption' ] ) ) {
				update_post_meta( $post_id, 'holiday-centered-r-caption', $_POST[ 'holiday-centered-r-caption' ] );
		}	
}
add_action( 'save_post', 'holiday_meta_save' );