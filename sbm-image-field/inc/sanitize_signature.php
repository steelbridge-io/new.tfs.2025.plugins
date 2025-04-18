<?php
// Sanitize Signature Destinations

function signature_meta_save( $post_id ) {

    // Checks save status
    $is_autosave = wp_is_post_autosave( $post_id );
    $is_revision = wp_is_post_revision( $post_id );
    $is_valid_nonce = ( isset( $_POST[ 'signature_nonce' ] ) && wp_verify_nonce( $_POST[ 'signature_nonce' ], basename( __FILE__ ) ) ) ? 'true' : 'false';

    // Exits script depending on save status
    if ( $is_autosave || $is_revision || !$is_valid_nonce ) {
        return;
    }
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'signature-hero-video-url' ] ) ) {
			update_post_meta( $post_id, 'signature-hero-video-url', esc_url($_POST[ 'signature-hero-video-url' ] ) );
		}
	
	// Checks for input and saves if needed
		if (isset($_POST['signature-temp-opacity-range'])) {
			update_post_meta($post_id, 'signature-temp-opacity-range', sanitize_text_field($_POST['signature-temp-opacity-range']));
		}
		
	// Checks for input and saves if needed
		if( isset( $_POST[ 'sig-logo' ] ) ) {
				update_post_meta( $post_id, 'sig-logo', $_POST[ 'sig-logo' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'signature-description' ] ) ) {
				update_post_meta( $post_id, 'signature-description', $_POST[ 'signature-description' ] );
		}
	
	// Checks for input and saves for carousel
		if( isset( $_POST[ 'signature-csel-checkbox' ] ) ) {
				update_post_meta( $post_id, 'signature-csel-checkbox', 'yes' );
		} else {
				update_post_meta( $post_id, 'signature-csel-checkbox', '' );
		}

	// Checks for input and saves if needed
		if( isset( $_POST[ 'csel-1-link' ] ) ) {
				update_post_meta( $post_id, 'csel-1-link', $_POST[ 'csel-1-link' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'csel-1-img' ] ) ) {
				update_post_meta( $post_id, 'csel-1-img', $_POST[ 'csel-1-img' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'csel-1-h4' ] ) ) {
				update_post_meta( $post_id, 'csel-1-h4', $_POST[ 'csel-1-h4' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'csel-1-h5' ] ) ) {
				update_post_meta( $post_id, 'csel-1-h5', $_POST[ 'csel-1-h5' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'csel-2-link' ] ) ) {
				update_post_meta( $post_id, 'csel-2-link', $_POST[ 'csel-2-link' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'csel-2-img' ] ) ) {
				update_post_meta( $post_id, 'csel-2-img', $_POST[ 'csel-2-img' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'csel-2-h4' ] ) ) {
				update_post_meta( $post_id, 'csel-2-h4', $_POST[ 'csel-2-h4' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'csel-2-h5' ] ) ) {
				update_post_meta( $post_id, 'csel-2-h5', $_POST[ 'csel-2-h5' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'csel-3-link' ] ) ) {
				update_post_meta( $post_id, 'csel-3-link', $_POST[ 'csel-3-link' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'csel-3-img' ] ) ) {
				update_post_meta( $post_id, 'csel-3-img', $_POST[ 'csel-3-img' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'csel-3-h4' ] ) ) {
				update_post_meta( $post_id, 'csel-3-h4', $_POST[ 'csel-3-h4' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'csel-3-h5' ] ) ) {
				update_post_meta( $post_id, 'csel-3-h5', $_POST[ 'csel-3-h5' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'csel-4-link' ] ) ) {
				update_post_meta( $post_id, 'csel-4-link', $_POST[ 'csel-4-link' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'csel-4-img' ] ) ) {
				update_post_meta( $post_id, 'csel-4-img', $_POST[ 'csel-4-img' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'csel-4-h4' ] ) ) {
				update_post_meta( $post_id, 'csel-4-h4', $_POST[ 'csel-4-h4' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'csel-4-h5' ] ) ) {
				update_post_meta( $post_id, 'csel-4-h5', $_POST[ 'csel-4-h5' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'csel-5-link' ] ) ) {
				update_post_meta( $post_id, 'csel-5-link', $_POST[ 'csel-5-link' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'csel-5-img' ] ) ) {
				update_post_meta( $post_id, 'csel-5-img', $_POST[ 'csel-5-img' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'csel-5-h4' ] ) ) {
				update_post_meta( $post_id, 'csel-5-h4', $_POST[ 'csel-5-h4' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'csel-5-h5' ] ) ) {
				update_post_meta( $post_id, 'csel-5-h5', $_POST[ 'csel-5-h5' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'csel-6-link' ] ) ) {
				update_post_meta( $post_id, 'csel-6-link', $_POST[ 'csel-6-link' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'csel-6-img' ] ) ) {
				update_post_meta( $post_id, 'csel-6-img', $_POST[ 'csel-6-img' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'csel-6-h4' ] ) ) {
				update_post_meta( $post_id, 'csel-6-h4', $_POST[ 'csel-6-h4' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'csel-6-h5' ] ) ) {
				update_post_meta( $post_id, 'csel-6-h5', $_POST[ 'csel-6-h5' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'signature-image-1-title' ] ) ) {
				update_post_meta( $post_id, 'signature-image-1-title', $_POST[ 'signature-image-1-title' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'signature-image-1-title-link' ]) ) {
				update_post_meta( $post_id, 'signature-image-1-title-link', $_POST[ 'signature-image-1-title-link' ] );
		}

	// Checks for input and saves if needed
		if( isset( $_POST[ 'signature-image-1' ] ) ) {
				update_post_meta( $post_id, 'signature-image-1', $_POST[ 'signature-image-1' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'signature-image-1-sub-title' ] ) ) {
				update_post_meta( $post_id, 'signature-image-1-sub-title', $_POST[ 'signature-image-1-sub-title' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'signature-image-1-caption' ] ) ) {
				update_post_meta( $post_id, 'signature-image-1-caption', $_POST[ 'signature-image-1-caption' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'signature-image-2-title' ] ) ) {
				update_post_meta( $post_id, 'signature-image-2-title', $_POST[ 'signature-image-2-title' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'signature-image-2-title-link' ]) ) {
				update_post_meta( $post_id, 'signature-image-2-title-link', $_POST[ 'signature-image-2-title-link' ] );
		}

	// Checks for input and saves if needed
		if( isset( $_POST[ 'signature-image-2' ] ) ) {
				update_post_meta( $post_id, 'signature-image-2', $_POST[ 'signature-image-2' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'signature-image-2-sub-title' ] ) ) {
				update_post_meta( $post_id, 'signature-image-2-sub-title', $_POST[ 'signature-image-2-sub-title' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'signature-image-2-caption' ] ) ) {
				update_post_meta( $post_id, 'signature-image-2-caption', $_POST[ 'signature-image-2-caption' ] );
		}

	// Checks for input and saves if needed
		if( isset( $_POST[ 'signature-image-3-title' ] ) ) {
				update_post_meta( $post_id, 'signature-image-3-title', $_POST[ 'signature-image-3-title' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'signature-image-3-title-link' ]) ) {
				update_post_meta( $post_id, 'signature-image-3-title-link', $_POST[ 'signature-image-3-title-link' ] );
		}

	// Checks for input and saves if needed
		if( isset( $_POST[ 'signature-image-3' ] ) ) {
				update_post_meta( $post_id, 'signature-image-3', $_POST[ 'signature-image-3' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'signature-image-3-sub-title' ] ) ) {
				update_post_meta( $post_id, 'signature-image-3-sub-title', $_POST[ 'signature-image-3-sub-title' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'signature-image-3-caption' ] ) ) {
				update_post_meta( $post_id, 'signature-image-3-caption', $_POST[ 'signature-image-3-caption' ] );
		}
	
	// Checks for input and saves for images 4, 5, 6
		if( isset( $_POST[ 'signature-456-checkbox' ] ) ) {
				update_post_meta( $post_id, 'signature-456-checkbox', 'yes' );
		} else {
				update_post_meta( $post_id, 'signature-456-checkbox', '' );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'signature-image-4-title' ] ) ) {
				update_post_meta( $post_id, 'signature-image-4-title', $_POST[ 'signature-image-4-title' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'signature-image-4-title-link' ]) ) {
				update_post_meta( $post_id, 'signature-image-4-title-link', $_POST[ 'signature-image-4-title-link' ] );
		}

	// Checks for input and saves if needed
		if( isset( $_POST[ 'signature-image-4' ] ) ) {
				update_post_meta( $post_id, 'signature-image-4', $_POST[ 'signature-image-4' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'signature-image-4-sub-title' ] ) ) {
				update_post_meta( $post_id, 'signature-image-4-sub-title', $_POST[ 'signature-image-4-sub-title' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'signature-image-4-caption' ] ) ) {
				update_post_meta( $post_id, 'signature-image-4-caption', $_POST[ 'signature-image-4-caption' ] );
		}

	// Checks for input and saves if needed
		if( isset( $_POST[ 'signature-image-5-title' ] ) ) {
				update_post_meta( $post_id, 'signature-image-5-title', $_POST[ 'signature-image-5-title' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'signature-image-5-title-link' ]) ) {
				update_post_meta( $post_id, 'signature-image-5-title-link', $_POST[ 'signature-image-5-title-link' ] );
		}

	// Checks for input and saves if needed
		if( isset( $_POST[ 'signature-image-5' ] ) ) {
				update_post_meta( $post_id, 'signature-image-5', $_POST[ 'signature-image-5' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'signature-image-5-sub-title' ] ) ) {
				update_post_meta( $post_id, 'signature-image-5-sub-title', $_POST[ 'signature-image-5-sub-title' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'signature-image-5-caption' ] ) ) {
				update_post_meta( $post_id, 'signature-image-5-caption', $_POST[ 'signature-image-5-caption' ] );
		}

	// Checks for input and saves if needed
		if( isset( $_POST[ 'signature-image-6-title' ] ) ) {
				update_post_meta( $post_id, 'signature-image-6-title', $_POST[ 'signature-image-6-title' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'signature-image-6-title-link' ]) ) {
				update_post_meta( $post_id, 'signature-image-6-title-link', $_POST[ 'signature-image-6-title-link' ] );
		}

	// Checks for input and saves if needed
		if( isset( $_POST[ 'signature-image-6' ] ) ) {
				update_post_meta( $post_id, 'signature-image-6', $_POST[ 'signature-image-6' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'signature-image-6-sub-title' ] ) ) {
				update_post_meta( $post_id, 'signature-image-6-sub-title', $_POST[ 'signature-image-6-sub-title' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'signature-image-6-caption' ] ) ) {
				update_post_meta( $post_id, 'signature-image-6-caption', $_POST[ 'signature-image-6-caption' ] );
		}
	
	// Checks for input and saves for images 7, 8, 9
		if( isset( $_POST[ 'signature-789-checkbox' ] ) ) {
				update_post_meta( $post_id, 'signature-789-checkbox', 'yes' );
		} else {
				update_post_meta( $post_id, 'signature-789-checkbox', '' );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'signature-image-7-title' ] ) ) {
				update_post_meta( $post_id, 'signature-image-7-title', $_POST[ 'signature-image-7-title' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'signature-image-7-title-link' ]) ) {
				update_post_meta( $post_id, 'signature-image-7-title-link', $_POST[ 'signature-image-7-title-link' ] );
		}

	// Checks for input and saves if needed
		if( isset( $_POST[ 'signature-image-7' ] ) ) {
				update_post_meta( $post_id, 'signature-image-7', $_POST[ 'signature-image-7' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'signature-image-7-sub-title' ] ) ) {
				update_post_meta( $post_id, 'signature-image-7-sub-title', $_POST[ 'signature-image-7-sub-title' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'signature-image-7-caption' ] ) ) {
				update_post_meta( $post_id, 'signature-image-7-caption', $_POST[ 'signature-image-7-caption' ] );
		}

	// Checks for input and saves if needed
		if( isset( $_POST[ 'signature-image-8-title' ] ) ) {
				update_post_meta( $post_id, 'signature-image-8-title', $_POST[ 'signature-image-8-title' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'signature-image-8-title-link' ]) ) {
				update_post_meta( $post_id, 'signature-image-8-title-link', $_POST[ 'signature-image-8-title-link' ] );
		}

	// Checks for input and saves if needed
		if( isset( $_POST[ 'signature-image-8' ] ) ) {
				update_post_meta( $post_id, 'signature-image-8', $_POST[ 'signature-image-8' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'signature-image-8-sub-title' ] ) ) {
				update_post_meta( $post_id, 'signature-image-8-sub-title', $_POST[ 'signature-image-8-sub-title' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'signature-image-8-caption' ] ) ) {
				update_post_meta( $post_id, 'signature-image-8-caption', $_POST[ 'signature-image-8-caption' ] );
		}

	// Checks for input and saves if needed
		if( isset( $_POST[ 'signature-image-9-title' ] ) ) {
				update_post_meta( $post_id, 'signature-image-9-title', $_POST[ 'signature-image-9-title' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'signature-image-9-title-link' ]) ) {
				update_post_meta( $post_id, 'signature-image-9-title-link', $_POST[ 'signature-image-9-title-link' ] );
		}

	// Checks for input and saves if needed
		if( isset( $_POST[ 'signature-image-9' ] ) ) {
				update_post_meta( $post_id, 'signature-image-9', $_POST[ 'signature-image-9' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'signature-image-9-sub-title' ] ) ) {
				update_post_meta( $post_id, 'signature-image-9-sub-title', $_POST[ 'signature-image-9-sub-title' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'signature-image-9-caption' ] ) ) {
				update_post_meta( $post_id, 'signature-image-9-caption', $_POST[ 'signature-image-9-caption' ] );
		}
	
	// Checks for input and saves for images 10, 11, 12
		if( isset( $_POST[ 'signature-101112-checkbox' ] ) ) {
				update_post_meta( $post_id, 'signature-101112-checkbox', 'yes' );
		} else {
				update_post_meta( $post_id, 'signature-101112-checkbox', '' );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'signature-image-10-title' ] ) ) {
				update_post_meta( $post_id, 'signature-image-10-title', $_POST[ 'signature-image-10-title' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'signature-image-10-title-link' ]) ) {
				update_post_meta( $post_id, 'signature-image-10-title-link', $_POST[ 'signature-image-10-title-link' ] );
		}

	// Checks for input and saves if needed
		if( isset( $_POST[ 'signature-image-10' ] ) ) {
				update_post_meta( $post_id, 'signature-image-10', $_POST[ 'signature-image-10' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'signature-image-10-sub-title' ] ) ) {
				update_post_meta( $post_id, 'signature-image-10-sub-title', $_POST[ 'signature-image-10-sub-title' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'signature-image-10-caption' ] ) ) {
				update_post_meta( $post_id, 'signature-image-10-caption', $_POST[ 'signature-image-10-caption' ] );
		}

	// Checks for input and saves if needed
		if( isset( $_POST[ 'signature-image-11-title' ] ) ) {
				update_post_meta( $post_id, 'signature-image-11-title', $_POST[ 'signature-image-11-title' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'signature-image-11-title-link' ]) ) {
				update_post_meta( $post_id, 'signature-image-11-title-link', $_POST[ 'signature-image-11-title-link' ] );
		}

	// Checks for input and saves if needed
		if( isset( $_POST[ 'signature-image-11' ] ) ) {
				update_post_meta( $post_id, 'signature-image-11', $_POST[ 'signature-image-11' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'signature-image-11-sub-title' ] ) ) {
				update_post_meta( $post_id, 'signature-image-11-sub-title', $_POST[ 'signature-image-11-sub-title' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'signature-image-11-caption' ] ) ) {
				update_post_meta( $post_id, 'signature-image-11-caption', $_POST[ 'signature-image-11-caption' ] );
		}

	// Checks for input and saves if needed
		if( isset( $_POST[ 'signature-image-12-title' ] ) ) {
				update_post_meta( $post_id, 'signature-image-12-title', $_POST[ 'signature-image-12-title' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'signature-image-12-title-link' ]) ) {
				update_post_meta( $post_id, 'signature-image-12-title-link', $_POST[ 'signature-image-12-title-link' ] );
		}

	// Checks for input and saves if needed
		if( isset( $_POST[ 'signature-image-12' ] ) ) {
				update_post_meta( $post_id, 'signature-image-12', $_POST[ 'signature-image-12' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'signature-image-12-sub-title' ] ) ) {
				update_post_meta( $post_id, 'signature-image-12-sub-title', $_POST[ 'signature-image-12-sub-title' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'signature-image-12-caption' ] ) ) {
				update_post_meta( $post_id, 'signature-image-12-caption', $_POST[ 'signature-image-12-caption' ] );
		}
	
	// Checks for input and saves for centered final image
		if( isset( $_POST[ 'signature-131415-checkbox' ] ) ) {
				update_post_meta( $post_id, 'signature-131415-checkbox', 'yes' );
		} else {
				update_post_meta( $post_id, 'signature-131415-checkbox', '' );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'signature-image-13-title' ] ) ) {
				update_post_meta( $post_id, 'signature-image-13-title', $_POST[ 'signature-image-13-title' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'signature-image-13-title-link' ]) ) {
				update_post_meta( $post_id, 'signature-image-13-title-link', $_POST[ 'signature-image-13-title-link' ] );
		}

	// Checks for input and saves if needed
		if( isset( $_POST[ 'signature-image-13' ] ) ) {
				update_post_meta( $post_id, 'signature-image-13', $_POST[ 'signature-image-13' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'signature-image-13-sub-title' ] ) ) {
				update_post_meta( $post_id, 'signature-image-13-sub-title', $_POST[ 'signature-image-13-sub-title' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'signature-image-13-caption' ] ) ) {
				update_post_meta( $post_id, 'signature-image-13-caption', $_POST[ 'signature-image-13-caption' ] );
		}

	// Checks for input and saves if needed
		if( isset( $_POST[ 'signature-image-14-title' ] ) ) {
				update_post_meta( $post_id, 'signature-image-14-title', $_POST[ 'signature-image-14-title' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'signature-image-14-title-link' ]) ) {
				update_post_meta( $post_id, 'signature-image-14-title-link', $_POST[ 'signature-image-14-title-link' ] );
		}

	// Checks for input and saves if needed
		if( isset( $_POST[ 'signature-image-14' ] ) ) {
				update_post_meta( $post_id, 'signature-image-14', $_POST[ 'signature-image-14' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'signature-image-14-sub-title' ] ) ) {
				update_post_meta( $post_id, 'signature-image-14-sub-title', $_POST[ 'signature-image-14-sub-title' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'signature-image-14-caption' ] ) ) {
				update_post_meta( $post_id, 'signature-image-14-caption', $_POST[ 'signature-image-14-caption' ] );
		}

	// Checks for input and saves if needed
		if( isset( $_POST[ 'signature-image-15-title' ] ) ) {
				update_post_meta( $post_id, 'signature-image-15-title', $_POST[ 'signature-image-15-title' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'signature-image-15-title-link' ]) ) {
				update_post_meta( $post_id, 'signature-image-15-title-link', $_POST[ 'signature-image-15-title-link' ] );
		}

	// Checks for input and saves if needed
		if( isset( $_POST[ 'signature-image-15' ] ) ) {
				update_post_meta( $post_id, 'signature-image-15', $_POST[ 'signature-image-15' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'signature-image-15-sub-title' ] ) ) {
				update_post_meta( $post_id, 'signature-image-15-sub-title', $_POST[ 'signature-image-15-sub-title' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'signature-image-15-caption' ] ) ) {
				update_post_meta( $post_id, 'signature-image-15-caption', $_POST[ 'signature-image-15-caption' ] );
		}
	
	// Checks for input and saves for centered final image
		if( isset( $_POST[ 'signature-161718-checkbox' ] ) ) {
				update_post_meta( $post_id, 'signature-161718-checkbox', 'yes' );
		} else {
				update_post_meta( $post_id, 'signature-161718-checkbox', '' );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'signature-image-16-title' ] ) ) {
				update_post_meta( $post_id, 'signature-image-16-title', $_POST[ 'signature-image-16-title' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'signature-image-16-title-link' ]) ) {
				update_post_meta( $post_id, 'signature-image-16-title-link', $_POST[ 'signature-image-16-title-link' ] );
		}

	// Checks for input and saves if needed
		if( isset( $_POST[ 'signature-image-16' ] ) ) {
				update_post_meta( $post_id, 'signature-image-16', $_POST[ 'signature-image-16' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'signature-image-16-sub-title' ] ) ) {
				update_post_meta( $post_id, 'signature-image-16-sub-title', $_POST[ 'signature-image-16-sub-title' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'signature-image-16-caption' ] ) ) {
				update_post_meta( $post_id, 'signature-image-16-caption', $_POST[ 'signature-image-16-caption' ] );
		}

	// Checks for input and saves if needed
		if( isset( $_POST[ 'signature-image-17-title' ] ) ) {
				update_post_meta( $post_id, 'signature-image-17-title', $_POST[ 'signature-image-17-title' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'signature-image-17-title-link' ]) ) {
				update_post_meta( $post_id, 'signature-image-17-title-link', $_POST[ 'signature-image-17-title-link' ] );
		}

	// Checks for input and saves if needed
		if( isset( $_POST[ 'signature-image-17' ] ) ) {
				update_post_meta( $post_id, 'signature-image-17', $_POST[ 'signature-image-17' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'signature-image-17-sub-title' ] ) ) {
				update_post_meta( $post_id, 'signature-image-17-sub-title', $_POST[ 'signature-image-17-sub-title' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'signature-image-17-caption' ] ) ) {
				update_post_meta( $post_id, 'signature-image-17-caption', $_POST[ 'signature-image-17-caption' ] );
		}

	// Checks for input and saves if needed
		if( isset( $_POST[ 'signature-image-18-title' ] ) ) {
				update_post_meta( $post_id, 'signature-image-18-title', $_POST[ 'signature-image-18-title' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'signature-image-18-title-link' ]) ) {
				update_post_meta( $post_id, 'signature-image-18-title-link', $_POST[ 'signature-image-18-title-link' ] );
		}

	// Checks for input and saves if needed
		if( isset( $_POST[ 'signature-image-18' ] ) ) {
				update_post_meta( $post_id, 'signature-image-18', $_POST[ 'signature-image-18' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'signature-image-18-sub-title' ] ) ) {
				update_post_meta( $post_id, 'signature-image-18-sub-title', $_POST[ 'signature-image-18-sub-title' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'signature-image-18-caption' ] ) ) {
				update_post_meta( $post_id, 'signature-image-18-caption', $_POST[ 'signature-image-18-caption' ] );
		}
	
	// Checks for input and saves for centered final image
		if( isset( $_POST[ 'signature-192021-checkbox' ] ) ) {
				update_post_meta( $post_id, 'signature-192021-checkbox', 'yes' );
		} else {
				update_post_meta( $post_id, 'signature-192021-checkbox', '' );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'signature-image-19-title' ] ) ) {
				update_post_meta( $post_id, 'signature-image-19-title', $_POST[ 'signature-image-19-title' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'signature-image-19-title-link' ]) ) {
				update_post_meta( $post_id, 'signature-image-19-title-link', $_POST[ 'signature-image-19-title-link' ] );
		}

	// Checks for input and saves if needed
		if( isset( $_POST[ 'signature-image-19' ] ) ) {
				update_post_meta( $post_id, 'signature-image-19', $_POST[ 'signature-image-19' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'signature-image-19-sub-title' ] ) ) {
				update_post_meta( $post_id, 'signature-image-19-sub-title', $_POST[ 'signature-image-19-sub-title' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'signature-image-19-caption' ] ) ) {
				update_post_meta( $post_id, 'signature-image-19-caption', $_POST[ 'signature-image-19-caption' ] );
		}

	// Checks for input and saves if needed
		if( isset( $_POST[ 'signature-image-20-title' ] ) ) {
				update_post_meta( $post_id, 'signature-image-20-title', $_POST[ 'signature-image-20-title' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'signature-image-20-title-link' ]) ) {
				update_post_meta( $post_id, 'signature-image-20-title-link', $_POST[ 'signature-image-20-title-link' ] );
		}

	// Checks for input and saves if needed
		if( isset( $_POST[ 'signature-image-20' ] ) ) {
				update_post_meta( $post_id, 'signature-image-20', $_POST[ 'signature-image-20' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'signature-image-20-sub-title' ] ) ) {
				update_post_meta( $post_id, 'signature-image-20-sub-title', $_POST[ 'signature-image-20-sub-title' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'signature-image-20-caption' ] ) ) {
				update_post_meta( $post_id, 'signature-image-20-caption', $_POST[ 'signature-image-20-caption' ] );
		}

	// Checks for input and saves if needed
		if( isset( $_POST[ 'signature-image-21-title' ] ) ) {
				update_post_meta( $post_id, 'signature-image-21-title', $_POST[ 'signature-image-21-title' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'signature-image-21-title-link' ]) ) {
				update_post_meta( $post_id, 'signature-image-21-title-link', $_POST[ 'signature-image-21-title-link' ] );
		}

	// Checks for input and saves if needed
		if( isset( $_POST[ 'signature-image-21' ] ) ) {
				update_post_meta( $post_id, 'signature-image-21', $_POST[ 'signature-image-21' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'signature-image-21-sub-title' ] ) ) {
				update_post_meta( $post_id, 'signature-image-21-sub-title', $_POST[ 'signature-image-21-sub-title' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'signature-image-21-caption' ] ) ) {
				update_post_meta( $post_id, 'signature-image-21-caption', $_POST[ 'signature-image-21-caption' ] );
		}
	
	// Checks for input and saves for centered final image
		if( isset( $_POST[ 'signature-222324-checkbox' ] ) ) {
				update_post_meta( $post_id, 'signature-222324-checkbox', 'yes' );
		} else {
				update_post_meta( $post_id, 'signature-222324-checkbox', '' );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'signature-image-22-title' ] ) ) {
				update_post_meta( $post_id, 'signature-image-22-title', $_POST[ 'signature-image-22-title' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'signature-image-22-title-link' ]) ) {
				update_post_meta( $post_id, 'signature-image-22-title-link', $_POST[ 'signature-image-22-title-link' ] );
		}

	// Checks for input and saves if needed
		if( isset( $_POST[ 'signature-image-22' ] ) ) {
				update_post_meta( $post_id, 'signature-image-22', $_POST[ 'signature-image-22' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'signature-image-22-sub-title' ] ) ) {
				update_post_meta( $post_id, 'signature-image-22-sub-title', $_POST[ 'signature-image-22-sub-title' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'signature-image-22-caption' ] ) ) {
				update_post_meta( $post_id, 'signature-image-22-caption', $_POST[ 'signature-image-22-caption' ] );
		}

	// Checks for input and saves if needed
		if( isset( $_POST[ 'signature-image-23-title' ] ) ) {
				update_post_meta( $post_id, 'signature-image-23-title', $_POST[ 'signature-image-23-title' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'signature-image-23-title-link' ]) ) {
				update_post_meta( $post_id, 'signature-image-23-title-link', $_POST[ 'signature-image-23-title-link' ] );
		}

	// Checks for input and saves if needed
		if( isset( $_POST[ 'signature-image-23' ] ) ) {
				update_post_meta( $post_id, 'signature-image-23', $_POST[ 'signature-image-23' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'signature-image-23-sub-title' ] ) ) {
				update_post_meta( $post_id, 'signature-image-23-sub-title', $_POST[ 'signature-image-23-sub-title' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'signature-image-23-caption' ] ) ) {
				update_post_meta( $post_id, 'signature-image-23-caption', $_POST[ 'signature-image-23-caption' ] );
		}

	// Checks for input and saves if needed
		if( isset( $_POST[ 'signature-image-24-title' ] ) ) {
				update_post_meta( $post_id, 'signature-image-24-title', $_POST[ 'signature-image-24-title' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'signature-image-24-title-link' ]) ) {
				update_post_meta( $post_id, 'signature-image-24-title-link', $_POST[ 'signature-image-24-title-link' ] );
		}

	// Checks for input and saves if needed
		if( isset( $_POST[ 'signature-image-24' ] ) ) {
				update_post_meta( $post_id, 'signature-image-24', $_POST[ 'signature-image-24' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'signature-image-24-sub-title' ] ) ) {
				update_post_meta( $post_id, 'signature-image-24-sub-title', $_POST[ 'signature-image-24-sub-title' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'signature-image-24-caption' ] ) ) {
				update_post_meta( $post_id, 'signature-image-24-caption', $_POST[ 'signature-image-24-caption' ] );
		}
	
		// Checks for input and saves for centered final image
		if( isset( $_POST[ 'signature-252627-checkbox' ] ) ) {
				update_post_meta( $post_id, 'signature-252627-checkbox', 'yes' );
		} else {
				update_post_meta( $post_id, 'signature-252627-checkbox', '' );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'signature-image-25-title' ] ) ) {
				update_post_meta( $post_id, 'signature-image-25-title', $_POST[ 'signature-image-25-title' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'signature-image-25-title-link' ]) ) {
				update_post_meta( $post_id, 'signature-image-25-title-link', $_POST[ 'signature-image-25-title-link' ] );
		}

	// Checks for input and saves if needed
		if( isset( $_POST[ 'signature-image-25' ] ) ) {
				update_post_meta( $post_id, 'signature-image-25', $_POST[ 'signature-image-25' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'signature-image-25-sub-title' ] ) ) {
				update_post_meta( $post_id, 'signature-image-25-sub-title', $_POST[ 'signature-image-25-sub-title' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'signature-image-25-caption' ] ) ) {
				update_post_meta( $post_id, 'signature-image-25-caption', $_POST[ 'signature-image-25-caption' ] );
		}

	// Checks for input and saves if needed
		if( isset( $_POST[ 'signature-image-26-title' ] ) ) {
				update_post_meta( $post_id, 'signature-image-26-title', $_POST[ 'signature-image-26-title' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'signature-image-26-title-link' ]) ) {
				update_post_meta( $post_id, 'signature-image-26-title-link', $_POST[ 'signature-image-26-title-link' ] );
		}

	// Checks for input and saves if needed
		if( isset( $_POST[ 'signature-image-26' ] ) ) {
				update_post_meta( $post_id, 'signature-image-26', $_POST[ 'signature-image-26' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'signature-image-26-sub-title' ] ) ) {
				update_post_meta( $post_id, 'signature-image-26-sub-title', $_POST[ 'signature-image-26-sub-title' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'signature-image-26-caption' ] ) ) {
				update_post_meta( $post_id, 'signature-image-26-caption', $_POST[ 'signature-image-26-caption' ] );
		}

	// Checks for input and saves if needed
		if( isset( $_POST[ 'signature-image-27-title' ] ) ) {
				update_post_meta( $post_id, 'signature-image-27-title', $_POST[ 'signature-image-27-title' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'signature-image-27-title-link' ]) ) {
				update_post_meta( $post_id, 'signature-image-27-title-link', $_POST[ 'signature-image-27-title-link' ] );
		}

	// Checks for input and saves if needed
		if( isset( $_POST[ 'signature-image-27' ] ) ) {
				update_post_meta( $post_id, 'signature-image-27', $_POST[ 'signature-image-27' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'signature-image-27-sub-title' ] ) ) {
				update_post_meta( $post_id, 'signature-image-27-sub-title', $_POST[ 'signature-image-27-sub-title' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'signature-image-27-caption' ] ) ) {
				update_post_meta( $post_id, 'signature-image-27-caption', $_POST[ 'signature-image-27-caption' ] );
		}

	
	
	
	// Checks for input and saves for centered final image
		if( isset( $_POST[ 'signature-282930-checkbox' ] ) ) {
				update_post_meta( $post_id, 'signature-282930-checkbox', 'yes' );
		} else {
				update_post_meta( $post_id, 'signature-282930-checkbox', '' );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'signature-image-28-title' ] ) ) {
				update_post_meta( $post_id, 'signature-image-28-title', $_POST[ 'signature-image-28-title' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'signature-image-28-title-link' ]) ) {
				update_post_meta( $post_id, 'signature-image-28-title-link', $_POST[ 'signature-image-28-title-link' ] );
		}

	// Checks for input and saves if needed
		if( isset( $_POST[ 'signature-image-28' ] ) ) {
				update_post_meta( $post_id, 'signature-image-28', $_POST[ 'signature-image-28' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'signature-image-28-sub-title' ] ) ) {
				update_post_meta( $post_id, 'signature-image-28-sub-title', $_POST[ 'signature-image-28-sub-title' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'signature-image-28-caption' ] ) ) {
				update_post_meta( $post_id, 'signature-image-28-caption', $_POST[ 'signature-image-28-caption' ] );
		}

	// Checks for input and saves if needed
		if( isset( $_POST[ 'signature-image-29-title' ] ) ) {
				update_post_meta( $post_id, 'signature-image-29-title', $_POST[ 'signature-image-29-title' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'signature-image-29-title-link' ]) ) {
				update_post_meta( $post_id, 'signature-image-29-title-link', $_POST[ 'signature-image-29-title-link' ] );
		}

	// Checks for input and saves if needed
		if( isset( $_POST[ 'signature-image-29' ] ) ) {
				update_post_meta( $post_id, 'signature-image-29', $_POST[ 'signature-image-29' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'signature-image-29-sub-title' ] ) ) {
				update_post_meta( $post_id, 'signature-image-29-sub-title', $_POST[ 'signature-image-29-sub-title' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'signature-image-29-caption' ] ) ) {
				update_post_meta( $post_id, 'signature-image-29-caption', $_POST[ 'signature-image-29-caption' ] );
		}

	// Checks for input and saves if needed
		if( isset( $_POST[ 'signature-image-30-title' ] ) ) {
				update_post_meta( $post_id, 'signature-image-30-title', $_POST[ 'signature-image-30-title' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'signature-image-30-title-link' ]) ) {
				update_post_meta( $post_id, 'signature-image-30-title-link', $_POST[ 'signature-image-30-title-link' ] );
		}

	// Checks for input and saves if needed
		if( isset( $_POST[ 'signature-image-30' ] ) ) {
				update_post_meta( $post_id, 'signature-image-30', $_POST[ 'signature-image-30' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'signature-image-30-sub-title' ] ) ) {
				update_post_meta( $post_id, 'signature-image-30-sub-title', $_POST[ 'signature-image-30-sub-title' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'signature-image-30-caption' ] ) ) {
				update_post_meta( $post_id, 'signature-image-30-caption', $_POST[ 'signature-image-30-caption' ] );
		}

	// Checks for input and saves for centered final image
		if( isset( $_POST[ 'signature-313233-checkbox' ] ) ) {
				update_post_meta( $post_id, 'signature-313233-checkbox', 'yes' );
		} else {
				update_post_meta( $post_id, 'signature-313233-checkbox', '' );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'signature-image-31-title' ] ) ) {
				update_post_meta( $post_id, 'signature-image-31-title', $_POST[ 'signature-image-31-title' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'signature-image-31-title-link' ]) ) {
				update_post_meta( $post_id, 'signature-image-31-title-link', $_POST[ 'signature-image-31-title-link' ] );
		}

	// Checks for input and saves if needed
		if( isset( $_POST[ 'signature-image-31' ] ) ) {
				update_post_meta( $post_id, 'signature-image-31', $_POST[ 'signature-image-31' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'signature-image-31-sub-title' ] ) ) {
				update_post_meta( $post_id, 'signature-image-31-sub-title', $_POST[ 'signature-image-31-sub-title' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'signature-image-31-caption' ] ) ) {
				update_post_meta( $post_id, 'signature-image-31-caption', $_POST[ 'signature-image-31-caption' ] );
		}

	// Checks for input and saves if needed
		if( isset( $_POST[ 'signature-image-32-title' ] ) ) {
				update_post_meta( $post_id, 'signature-image-32-title', $_POST[ 'signature-image-32-title' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'signature-image-32-title-link' ]) ) {
				update_post_meta( $post_id, 'signature-image-32-title-link', $_POST[ 'signature-image-32-title-link' ] );
		}

	// Checks for input and saves if needed
		if( isset( $_POST[ 'signature-image-32' ] ) ) {
				update_post_meta( $post_id, 'signature-image-32', $_POST[ 'signature-image-32' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'signature-image-32-sub-title' ] ) ) {
				update_post_meta( $post_id, 'signature-image-32-sub-title', $_POST[ 'signature-image-32-sub-title' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'signature-image-32-caption' ] ) ) {
				update_post_meta( $post_id, 'signature-image-32-caption', $_POST[ 'signature-image-32-caption' ] );
		}

	// Checks for input and saves if needed
		if( isset( $_POST[ 'signature-image-33-title' ] ) ) {
				update_post_meta( $post_id, 'signature-image-33-title', $_POST[ 'signature-image-33-title' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'signature-image-33-title-link' ]) ) {
				update_post_meta( $post_id, 'signature-image-33-title-link', $_POST[ 'signature-image-33-title-link' ] );
		}

	// Checks for input and saves if needed
		if( isset( $_POST[ 'signature-image-33' ] ) ) {
				update_post_meta( $post_id, 'signature-image-33', $_POST[ 'signature-image-33' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'signature-image-33-sub-title' ] ) ) {
				update_post_meta( $post_id, 'signature-image-33-sub-title', $_POST[ 'signature-image-33-sub-title' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'signature-image-33-caption' ] ) ) {
				update_post_meta( $post_id, 'signature-image-33-caption', $_POST[ 'signature-image-33-caption' ] );
		}

	// Checks for input and saves for centered final image
		if( isset( $_POST[ 'signature-343536-checkbox' ] ) ) {
				update_post_meta( $post_id, 'signature-343536-checkbox', 'yes' );
		} else {
				update_post_meta( $post_id, 'signature-343536-checkbox', '' );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'signature-image-34-title' ] ) ) {
				update_post_meta( $post_id, 'signature-image-34-title', $_POST[ 'signature-image-34-title' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'signature-image-34-title-link' ]) ) {
				update_post_meta( $post_id, 'signature-image-34-title-link', $_POST[ 'signature-image-34-title-link' ] );
		}

	// Checks for input and saves if needed
		if( isset( $_POST[ 'signature-image-34' ] ) ) {
				update_post_meta( $post_id, 'signature-image-34', $_POST[ 'signature-image-34' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'signature-image-34-sub-title' ] ) ) {
				update_post_meta( $post_id, 'signature-image-34-sub-title', $_POST[ 'signature-image-34-sub-title' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'signature-image-34-caption' ] ) ) {
				update_post_meta( $post_id, 'signature-image-34-caption', $_POST[ 'signature-image-34-caption' ] );
		}

	// Checks for input and saves if needed
		if( isset( $_POST[ 'signature-image-35-title' ] ) ) {
				update_post_meta( $post_id, 'signature-image-35-title', $_POST[ 'signature-image-35-title' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'signature-image-35-title-link' ]) ) {
				update_post_meta( $post_id, 'signature-image-35-title-link', $_POST[ 'signature-image-35-title-link' ] );
		}

	// Checks for input and saves if needed
		if( isset( $_POST[ 'signature-image-35' ] ) ) {
				update_post_meta( $post_id, 'signature-image-35', $_POST[ 'signature-image-35' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'signature-image-35-sub-title' ] ) ) {
				update_post_meta( $post_id, 'signature-image-35-sub-title', $_POST[ 'signature-image-35-sub-title' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'signature-image-35-caption' ] ) ) {
				update_post_meta( $post_id, 'signature-image-35-caption', $_POST[ 'signature-image-35-caption' ] );
		}

	// Checks for input and saves if needed
		if( isset( $_POST[ 'signature-image-36-title' ] ) ) {
				update_post_meta( $post_id, 'signature-image-36-title', $_POST[ 'signature-image-36-title' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'signature-image-36-title-link' ]) ) {
				update_post_meta( $post_id, 'signature-image-36-title-link', $_POST[ 'signature-image-36-title-link' ] );
		}

	// Checks for input and saves if needed
		if( isset( $_POST[ 'signature-image-36' ] ) ) {
				update_post_meta( $post_id, 'signature-image-36', $_POST[ 'signature-image-36' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'signature-image-36-sub-title' ] ) ) {
				update_post_meta( $post_id, 'signature-image-36-sub-title', $_POST[ 'signature-image-36-sub-title' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'signature-image-36-caption' ] ) ) {
				update_post_meta( $post_id, 'signature-image-36-caption', $_POST[ 'signature-image-36-caption' ] );
		}
  
  // Checks for input and saves for centered final image
		if( isset( $_POST[ 'signature-373839-checkbox' ] ) ) {
				update_post_meta( $post_id, 'signature-373839-checkbox', 'yes' );
		} else {
				update_post_meta( $post_id, 'signature-373839-checkbox', '' );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'signature-image-37-title' ] ) ) {
				update_post_meta( $post_id, 'signature-image-37-title', $_POST[ 'signature-image-37-title' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'signature-image-37-title-link' ]) ) {
				update_post_meta( $post_id, 'signature-image-37-title-link', $_POST[ 'signature-image-37-title-link' ] );
		}

	// Checks for input and saves if needed
		if( isset( $_POST[ 'signature-image-37' ] ) ) {
				update_post_meta( $post_id, 'signature-image-37', $_POST[ 'signature-image-37' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'signature-image-37-sub-title' ] ) ) {
				update_post_meta( $post_id, 'signature-image-37-sub-title', $_POST[ 'signature-image-37-sub-title' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'signature-image-37-caption' ] ) ) {
				update_post_meta( $post_id, 'signature-image-37-caption', $_POST[ 'signature-image-37-caption' ] );
		}

	// Checks for input and saves if needed
		if( isset( $_POST[ 'signature-image-38-title' ] ) ) {
				update_post_meta( $post_id, 'signature-image-38-title', $_POST[ 'signature-image-38-title' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'signature-image-38-title-link' ]) ) {
				update_post_meta( $post_id, 'signature-image-38-title-link', $_POST[ 'signature-image-38-title-link' ] );
		}

	// Checks for input and saves if needed
		if( isset( $_POST[ 'signature-image-38' ] ) ) {
				update_post_meta( $post_id, 'signature-image-38', $_POST[ 'signature-image-38' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'signature-image-38-sub-title' ] ) ) {
				update_post_meta( $post_id, 'signature-image-38-sub-title', $_POST[ 'signature-image-38-sub-title' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'signature-image-38-caption' ] ) ) {
				update_post_meta( $post_id, 'signature-image-38-caption', $_POST[ 'signature-image-38-caption' ] );
		}

	// Checks for input and saves if needed
		if( isset( $_POST[ 'signature-image-39-title' ] ) ) {
				update_post_meta( $post_id, 'signature-image-39-title', $_POST[ 'signature-image-39-title' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'signature-image-39-title-link' ]) ) {
				update_post_meta( $post_id, 'signature-image-39-title-link', $_POST[ 'signature-image-39-title-link' ] );
		}

	// Checks for input and saves if needed
		if( isset( $_POST[ 'signature-image-39' ] ) ) {
				update_post_meta( $post_id, 'signature-image-39', $_POST[ 'signature-image-39' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'signature-image-39-sub-title' ] ) ) {
				update_post_meta( $post_id, 'signature-image-39-sub-title', $_POST[ 'signature-image-39-sub-title' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'signature-image-39-caption' ] ) ) {
				update_post_meta( $post_id, 'signature-image-39-caption', $_POST[ 'signature-image-39-caption' ] );
		}

  // Checks for input and saves for centered final image
		if( isset( $_POST[ 'signature-404142-checkbox' ] ) ) {
				update_post_meta( $post_id, 'signature-404142-checkbox', 'yes' );
		} else {
				update_post_meta( $post_id, 'signature-404142-checkbox', '' );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'signature-image-40-title' ] ) ) {
				update_post_meta( $post_id, 'signature-image-40-title', $_POST[ 'signature-image-40-title' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'signature-image-40-title-link' ]) ) {
				update_post_meta( $post_id, 'signature-image-40-title-link', $_POST[ 'signature-image-40-title-link' ] );
		}

	// Checks for input and saves if needed
		if( isset( $_POST[ 'signature-image-40' ] ) ) {
				update_post_meta( $post_id, 'signature-image-40', $_POST[ 'signature-image-40' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'signature-image-40-sub-title' ] ) ) {
				update_post_meta( $post_id, 'signature-image-40-sub-title', $_POST[ 'signature-image-40-sub-title' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'signature-image-40-caption' ] ) ) {
				update_post_meta( $post_id, 'signature-image-40-caption', $_POST[ 'signature-image-40-caption' ] );
		}

	// Checks for input and saves if needed
		if( isset( $_POST[ 'signature-image-41-title' ] ) ) {
				update_post_meta( $post_id, 'signature-image-41-title', $_POST[ 'signature-image-41-title' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'signature-image-41-title-link' ]) ) {
				update_post_meta( $post_id, 'signature-image-41-title-link', $_POST[ 'signature-image-41-title-link' ] );
		}

	// Checks for input and saves if needed
		if( isset( $_POST[ 'signature-image-41' ] ) ) {
				update_post_meta( $post_id, 'signature-image-41', $_POST[ 'signature-image-41' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'signature-image-41-sub-title' ] ) ) {
				update_post_meta( $post_id, 'signature-image-41-sub-title', $_POST[ 'signature-image-41-sub-title' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'signature-image-41-caption' ] ) ) {
				update_post_meta( $post_id, 'signature-image-41-caption', $_POST[ 'signature-image-41-caption' ] );
		}

	// Checks for input and saves if needed
		if( isset( $_POST[ 'signature-image-42-title' ] ) ) {
				update_post_meta( $post_id, 'signature-image-42-title', $_POST[ 'signature-image-42-title' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'signature-image-42-title-link' ]) ) {
				update_post_meta( $post_id, 'signature-image-42-title-link', $_POST[ 'signature-image-42-title-link' ] );
		}

	// Checks for input and saves if needed
		if( isset( $_POST[ 'signature-image-42' ] ) ) {
				update_post_meta( $post_id, 'signature-image-42', $_POST[ 'signature-image-42' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'signature-image-42-sub-title' ] ) ) {
				update_post_meta( $post_id, 'signature-image-42-sub-title', $_POST[ 'signature-image-42-sub-title' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'signature-image-42-caption' ] ) ) {
				update_post_meta( $post_id, 'signature-image-42-caption', $_POST[ 'signature-image-42-caption' ] );
		}
	
	// Checks for input and saves if needed
	if( isset( $_POST[ 'signature-image-43-title' ] ) ) {
		update_post_meta( $post_id, 'signature-image-43-title', $_POST[ 'signature-image-43-title' ] );
	}
	
	// Checks for input and saves if needed
	if( isset( $_POST[ 'signature-image-43-title-link' ]) ) {
		update_post_meta( $post_id, 'signature-image-43-title-link', $_POST[ 'signature-image-43-title-link' ] );
	}
	
	// Checks for input and saves if needed
	if( isset( $_POST[ 'signature-image-43' ] ) ) {
		update_post_meta( $post_id, 'signature-image-43', $_POST[ 'signature-image-43' ] );
	}
	
	// Checks for input and saves if needed
	if( isset( $_POST[ 'signature-image-43-sub-title' ] ) ) {
		update_post_meta( $post_id, 'signature-image-43-sub-title', $_POST[ 'signature-image-43-sub-title' ] );
	}
	
	// Checks for input and saves if needed
	if( isset( $_POST[ 'signature-image-43-caption' ] ) ) {
		update_post_meta( $post_id, 'signature-image-43-caption', $_POST[ 'signature-image-43-caption' ] );
	}
	
	// Checks for input and saves if needed
	if( isset( $_POST[ 'signature-image-44-title' ] ) ) {
		update_post_meta( $post_id, 'signature-image-44-title', $_POST[ 'signature-image-44-title' ] );
	}
	
	// Checks for input and saves if needed
	if( isset( $_POST[ 'signature-image-44-title-link' ]) ) {
		update_post_meta( $post_id, 'signature-image-44-title-link', $_POST[ 'signature-image-44-title-link' ] );
	}
	
	// Checks for input and saves if needed
	if( isset( $_POST[ 'signature-image-44' ] ) ) {
		update_post_meta( $post_id, 'signature-image-44', $_POST[ 'signature-image-44' ] );
	}
	
	// Checks for input and saves if needed
	if( isset( $_POST[ 'signature-image-44-sub-title' ] ) ) {
		update_post_meta( $post_id, 'signature-image-44-sub-title', $_POST[ 'signature-image-44-sub-title' ] );
	}
	
	// Checks for input and saves if needed
	if( isset( $_POST[ 'signature-image-44-caption' ] ) ) {
		update_post_meta( $post_id, 'signature-image-44-caption', $_POST[ 'signature-image-44-caption' ] );
	}
	
	// Checks for input and saves if needed
	if ( isset( $_POST['signature-image-45-title'] ) ) {
		update_post_meta( $post_id, 'signature-image-45-title', $_POST['signature-image-45-title'] );
	}
	
	// Checks for input and saves if needed
	if ( isset( $_POST['signature-image-45-title-link'] ) ) {
		update_post_meta( $post_id, 'signature-image-45-title-link', $_POST['signature-image-45-title-link'] );
	}
	
	// Checks for input and saves if needed
	if ( isset( $_POST['signature-image-45'] ) ) {
		update_post_meta( $post_id, 'signature-image-45', $_POST['signature-image-45'] );
	}
	
	// Checks for input and saves if needed
	if ( isset( $_POST['signature-image-45-sub-title'] ) ) {
		update_post_meta( $post_id, 'signature-image-45-sub-title', $_POST['signature-image-45-sub-title'] );
	}
	
	// Checks for input and saves if needed
	if ( isset( $_POST['signature-image-45-caption'] ) ) {
		update_post_meta( $post_id, 'signature-image-45-caption', $_POST['signature-image-45-caption'] );
	}
	
	// Checks for input and saves if needed
	if ( isset( $_POST['signature-image-46-title'] ) ) {
		update_post_meta( $post_id, 'signature-image-46-title', $_POST['signature-image-46-title'] );
	}
	
	// Checks for input and saves if needed
	if ( isset( $_POST['signature-image-46-title-link'] ) ) {
		update_post_meta( $post_id, 'signature-image-46-title-link', $_POST['signature-image-46-title-link'] );
	}
	
	// Checks for input and saves if needed
	if ( isset( $_POST['signature-image-46'] ) ) {
		update_post_meta( $post_id, 'signature-image-46', $_POST['signature-image-46'] );
	}
	
	// Checks for input and saves if needed
	if ( isset( $_POST['signature-image-46-sub-title'] ) ) {
		update_post_meta( $post_id, 'signature-image-46-sub-title', $_POST['signature-image-46-sub-title'] );
	}
	
	// Checks for input and saves if needed
	if ( isset( $_POST['signature-image-46-caption'] ) ) {
		update_post_meta( $post_id, 'signature-image-46-caption', $_POST['signature-image-46-caption'] );
	}
	
	// Checks for input and saves if needed
	if( isset( $_POST[ 'signature-image-47-title' ] ) ) {
		update_post_meta( $post_id, 'signature-image-47-title', $_POST[ 'signature-image-47-title' ] );
	}
	
	// Checks for input and saves if needed
	if( isset( $_POST[ 'signature-image-47-title-link' ]) ) {
		update_post_meta( $post_id, 'signature-image-47-title-link', $_POST[ 'signature-image-47-title-link' ] );
	}
	
	// Checks for input and saves if needed
	if( isset( $_POST[ 'signature-image-47' ] ) ) {
		update_post_meta( $post_id, 'signature-image-47', $_POST[ 'signature-image-47' ] );
	}
	
	// Checks for input and saves if needed
	if( isset( $_POST[ 'signature-image-47-sub-title' ] ) ) {
		update_post_meta( $post_id, 'signature-image-47-sub-title', $_POST[ 'signature-image-47-sub-title' ] );
	}
	
	// Checks for input and saves if needed
	if( isset( $_POST[ 'signature-image-47-caption' ] ) ) {
		update_post_meta( $post_id, 'signature-image-47-caption', $_POST[ 'signature-image-47-caption' ] );
	}
	
	// Checks for input and saves if needed
	if( isset( $_POST[ 'signature-image-48-title' ] ) ) {
		update_post_meta( $post_id, 'signature-image-48-title', $_POST[ 'signature-image-48-title' ] );
	}
	
	// Checks for input and saves if needed
	if( isset( $_POST[ 'signature-image-48-title-link' ]) ) {
		update_post_meta( $post_id, 'signature-image-48-title-link', $_POST[ 'signature-image-48-title-link' ] );
	}
	
	// Checks for input and saves if needed
	if( isset( $_POST[ 'signature-image-48' ] ) ) {
		update_post_meta( $post_id, 'signature-image-48', $_POST[ 'signature-image-48' ] );
	}
	
	// Checks for input and saves if needed
	if( isset( $_POST[ 'signature-image-48-sub-title' ] ) ) {
		update_post_meta( $post_id, 'signature-image-48-sub-title', $_POST[ 'signature-image-48-sub-title' ] );
	}
	
	// Checks for input and saves if needed
	if( isset( $_POST[ 'signature-image-48-caption' ] ) ) {
		update_post_meta( $post_id, 'signature-image-48-caption', $_POST[ 'signature-image-48-caption' ] );
	}
	
	// Checks for input and saves if needed
	if( isset( $_POST[ 'signature-image-49-title' ] ) ) {
		update_post_meta( $post_id, 'signature-image-49-title', $_POST[ 'signature-image-49-title' ] );
	}
	
	// Checks for input and saves if needed
	if( isset( $_POST[ 'signature-image-49-title-link' ]) ) {
		update_post_meta( $post_id, 'signature-image-49-title-link', $_POST[ 'signature-image-49-title-link' ] );
	}
	
	// Checks for input and saves if needed
	if( isset( $_POST[ 'signature-image-49' ] ) ) {
		update_post_meta( $post_id, 'signature-image-49', $_POST[ 'signature-image-49' ] );
	}
	
	// Checks for input and saves if needed
	if( isset( $_POST[ 'signature-image-49-sub-title' ] ) ) {
		update_post_meta( $post_id, 'signature-image-49-sub-title', $_POST[ 'signature-image-49-sub-title' ] );
	}
	
	// Checks for input and saves if needed
	if( isset( $_POST[ 'signature-image-49-caption' ] ) ) {
		update_post_meta( $post_id, 'signature-image-49-caption', $_POST[ 'signature-image-49-caption' ] );
	}
	
	// Checks for input and saves if needed
	if( isset( $_POST[ 'signature-image-50-title' ] ) ) {
		update_post_meta( $post_id, 'signature-image-50-title', $_POST[ 'signature-image-50-title' ] );
	}
	
	// Checks for input and saves if needed
	if( isset( $_POST[ 'signature-image-50-title-link' ]) ) {
		update_post_meta( $post_id, 'signature-image-50-title-link', $_POST[ 'signature-image-50-title-link' ] );
	}
	
	// Checks for input and saves if needed
	if( isset( $_POST[ 'signature-image-50' ] ) ) {
		update_post_meta( $post_id, 'signature-image-50', $_POST[ 'signature-image-50' ] );
	}
	
	// Checks for input and saves if needed
	if( isset( $_POST[ 'signature-image-50-sub-title' ] ) ) {
		update_post_meta( $post_id, 'signature-image-50-sub-title', $_POST[ 'signature-image-50-sub-title' ] );
	}
	
	// Checks for input and saves if needed
	if( isset( $_POST[ 'signature-image-50-caption' ] ) ) {
		update_post_meta( $post_id, 'signature-image-50-caption', $_POST[ 'signature-image-50-caption' ] );
	}
	
	// Checks for input and saves if needed
	if( isset( $_POST[ 'signature-image-51-title' ] ) ) {
		update_post_meta( $post_id, 'signature-image-51-title', $_POST[ 'signature-image-51-title' ] );
	}
	
	// Checks for input and saves if needed
	if( isset( $_POST[ 'signature-image-51-title-link' ]) ) {
		update_post_meta( $post_id, 'signature-image-51-title-link', $_POST[ 'signature-image-51-title-link' ] );
	}
	
	// Checks for input and saves if needed
	if( isset( $_POST[ 'signature-image-51' ] ) ) {
		update_post_meta( $post_id, 'signature-image-51', $_POST[ 'signature-image-51' ] );
	}
	
	// Checks for input and saves if needed
	if( isset( $_POST[ 'signature-image-51-sub-title' ] ) ) {
		update_post_meta( $post_id, 'signature-image-51-sub-title', $_POST[ 'signature-image-51-sub-title' ] );
	}
	
	// Checks for input and saves if needed
	if( isset( $_POST[ 'signature-image-51-caption' ] ) ) {
		update_post_meta( $post_id, 'signature-image-51-caption', $_POST[ 'signature-image-51-caption' ] );
	}
	
	// Checks for input and saves if needed
	if( isset( $_POST[ 'signature-image-52-title' ] ) ) {
		update_post_meta( $post_id, 'signature-image-52-title', $_POST[ 'signature-image-52-title' ] );
	}
	
	// Checks for input and saves if needed
	if( isset( $_POST[ 'signature-image-52-title-link' ]) ) {
		update_post_meta( $post_id, 'signature-image-52-title-link', $_POST[ 'signature-image-52-title-link' ] );
	}
	
	// Checks for input and saves if needed
	if( isset( $_POST[ 'signature-image-52' ] ) ) {
		update_post_meta( $post_id, 'signature-image-52', $_POST[ 'signature-image-52' ] );
	}
	
	// Checks for input and saves if needed
	if( isset( $_POST[ 'signature-image-52-sub-title' ] ) ) {
		update_post_meta( $post_id, 'signature-image-52-sub-title', $_POST[ 'signature-image-52-sub-title' ] );
	}
	
	// Checks for input and saves if needed
	if( isset( $_POST[ 'signature-image-52-caption' ] ) ) {
		update_post_meta( $post_id, 'signature-image-52-caption', $_POST[ 'signature-image-52-caption' ] );
	}
	
	// Checks for input and saves if needed
	if( isset( $_POST[ 'signature-image-53-title' ] ) ) {
		update_post_meta( $post_id, 'signature-image-53-title', $_POST[ 'signature-image-53-title' ] );
	}
	
	// Checks for input and saves if needed
	if( isset( $_POST[ 'signature-image-53-title-link' ]) ) {
		update_post_meta( $post_id, 'signature-image-53-title-link', $_POST[ 'signature-image-53-title-link' ] );
	}
	
	// Checks for input and saves if needed
	if( isset( $_POST[ 'signature-image-53' ] ) ) {
		update_post_meta( $post_id, 'signature-image-53', $_POST[ 'signature-image-53' ] );
	}
	
	// Checks for input and saves if needed
	if( isset( $_POST[ 'signature-image-53-sub-title' ] ) ) {
		update_post_meta( $post_id, 'signature-image-53-sub-title', $_POST[ 'signature-image-53-sub-title' ] );
	}
	
	// Checks for input and saves if needed
	if( isset( $_POST[ 'signature-image-53-caption' ] ) ) {
		update_post_meta( $post_id, 'signature-image-53-caption', $_POST[ 'signature-image-53-caption' ] );
	}
	
	// Checks for input and saves if needed
	if( isset( $_POST[ 'signature-image-54-title' ] ) ) {
		update_post_meta( $post_id, 'signature-image-54-title', $_POST[ 'signature-image-54-title' ] );
	}
	
	// Checks for input and saves if needed
	if( isset( $_POST[ 'signature-image-54-title-link' ]) ) {
		update_post_meta( $post_id, 'signature-image-54-title-link', $_POST[ 'signature-image-54-title-link' ] );
	}
	
	// Checks for input and saves if needed
	if( isset( $_POST[ 'signature-image-54' ] ) ) {
		update_post_meta( $post_id, 'signature-image-54', $_POST[ 'signature-image-54' ] );
	}
	
	// Checks for input and saves if needed
	if( isset( $_POST[ 'signature-image-54-sub-title' ] ) ) {
		update_post_meta( $post_id, 'signature-image-54-sub-title', $_POST[ 'signature-image-54-sub-title' ] );
	}
	
	// Checks for input and saves if needed
	if( isset( $_POST[ 'signature-image-54-caption' ] ) ) {
		update_post_meta( $post_id, 'signature-image-54-caption', $_POST[ 'signature-image-54-caption' ] );
	}
	
	// Checks for input and saves if needed
	if( isset( $_POST[ 'signature-image-55-title' ] ) ) {
		update_post_meta( $post_id, 'signature-image-55-title', $_POST[ 'signature-image-55-title' ] );
	}
	
	// Checks for input and saves if needed
	if( isset( $_POST[ 'signature-image-55-title-link' ]) ) {
		update_post_meta( $post_id, 'signature-image-55-title-link', $_POST[ 'signature-image-55-title-link' ] );
	}
	
	// Checks for input and saves if needed
	if( isset( $_POST[ 'signature-image-55' ] ) ) {
		update_post_meta( $post_id, 'signature-image-55', $_POST[ 'signature-image-55' ] );
	}
	
	// Checks for input and saves if needed
	if( isset( $_POST[ 'signature-image-55-sub-title' ] ) ) {
		update_post_meta( $post_id, 'signature-image-55-sub-title', $_POST[ 'signature-image-55-sub-title' ] );
	}
	
	// Checks for input and saves if needed
	if( isset( $_POST[ 'signature-image-55-caption' ] ) ) {
		update_post_meta( $post_id, 'signature-image-55-caption', $_POST[ 'signature-image-55-caption' ] );
	}
	
	// Checks for input and saves if needed
	if( isset( $_POST[ 'signature-image-56-title' ] ) ) {
		update_post_meta( $post_id, 'signature-image-56-title', $_POST[ 'signature-image-56-title' ] );
	}
	
	// Checks for input and saves if needed
	if( isset( $_POST[ 'signature-image-56-title-link' ]) ) {
		update_post_meta( $post_id, 'signature-image-56-title-link', $_POST[ 'signature-image-56-title-link' ] );
	}
	
	// Checks for input and saves if needed
	if( isset( $_POST[ 'signature-image-56' ] ) ) {
		update_post_meta( $post_id, 'signature-image-56', $_POST[ 'signature-image-56' ] );
	}
	
	// Checks for input and saves if needed
	if( isset( $_POST[ 'signature-image-56-sub-title' ] ) ) {
		update_post_meta( $post_id, 'signature-image-56-sub-title', $_POST[ 'signature-image-56-sub-title' ] );
	}
	
	// Checks for input and saves if needed
	if( isset( $_POST[ 'signature-image-56-caption' ] ) ) {
		update_post_meta( $post_id, 'signature-image-56-caption', $_POST[ 'signature-image-56-caption' ] );
	}
	
	// Checks for input and saves if needed
	if( isset( $_POST[ 'signature-image-57-title' ] ) ) {
		update_post_meta( $post_id, 'signature-image-57-title', $_POST[ 'signature-image-57-title' ] );
	}
	
	// Checks for input and saves if needed
	if( isset( $_POST[ 'signature-image-57-title-link' ]) ) {
		update_post_meta( $post_id, 'signature-image-57-title-link', $_POST[ 'signature-image-57-title-link' ] );
	}
	
	// Checks for input and saves if needed
	if( isset( $_POST[ 'signature-image-57' ] ) ) {
		update_post_meta( $post_id, 'signature-image-57', $_POST[ 'signature-image-57' ] );
	}
	
	// Checks for input and saves if needed
	if( isset( $_POST[ 'signature-image-57-sub-title' ] ) ) {
		update_post_meta( $post_id, 'signature-image-57-sub-title', $_POST[ 'signature-image-57-sub-title' ] );
	}
	
	// Checks for input and saves if needed
	if( isset( $_POST[ 'signature-image-57-caption' ] ) ) {
		update_post_meta( $post_id, 'signature-image-57-caption', $_POST[ 'signature-image-57-caption' ] );
	}
	
	// Checks for input and saves if needed
	if( isset( $_POST[ 'signature-image-58-title' ] ) ) {
		update_post_meta( $post_id, 'signature-image-58-title', $_POST[ 'signature-image-58-title' ] );
	}
	
	// Checks for input and saves if needed
	if( isset( $_POST[ 'signature-image-58-title-link' ]) ) {
		update_post_meta( $post_id, 'signature-image-58-title-link', $_POST[ 'signature-image-58-title-link' ] );
	}
	
	// Checks for input and saves if needed
	if( isset( $_POST[ 'signature-image-58' ] ) ) {
		update_post_meta( $post_id, 'signature-image-58', $_POST[ 'signature-image-58' ] );
	}
	
	// Checks for input and saves if needed
	if( isset( $_POST[ 'signature-image-58-sub-title' ] ) ) {
		update_post_meta( $post_id, 'signature-image-58-sub-title', $_POST[ 'signature-image-58-sub-title' ] );
	}
	
	// Checks for input and saves if needed
	if( isset( $_POST[ 'signature-image-58-caption' ] ) ) {
		update_post_meta( $post_id, 'signature-image-58-caption', $_POST[ 'signature-image-58-caption' ] );
	}
	
	// Checks for input and saves if needed
	if( isset( $_POST[ 'signature-image-59-title' ] ) ) {
		update_post_meta( $post_id, 'signature-image-59-title', $_POST[ 'signature-image-59-title' ] );
	}
	
	// Checks for input and saves if needed
	if( isset( $_POST[ 'signature-image-59-title-link' ]) ) {
		update_post_meta( $post_id, 'signature-image-59-title-link', $_POST[ 'signature-image-59-title-link' ] );
	}
	
	// Checks for input and saves if needed
	if( isset( $_POST[ 'signature-image-59' ] ) ) {
		update_post_meta( $post_id, 'signature-image-59', $_POST[ 'signature-image-59' ] );
	}
	
	// Checks for input and saves if needed
	if( isset( $_POST[ 'signature-image-59-sub-title' ] ) ) {
		update_post_meta( $post_id, 'signature-image-59-sub-title', $_POST[ 'signature-image-59-sub-title' ] );
	}
	
	// Checks for input and saves if needed
	if( isset( $_POST[ 'signature-image-59-caption' ] ) ) {
		update_post_meta( $post_id, 'signature-image-59-caption', $_POST[ 'signature-image-59-caption' ] );
	}
	
	// Checks for input and saves if needed
	if( isset( $_POST[ 'signature-image-60-title' ] ) ) {
		update_post_meta( $post_id, 'signature-image-60-title', $_POST[ 'signature-image-60-title' ] );
	}
	
	// Checks for input and saves if needed
	if( isset( $_POST[ 'signature-image-60-title-link' ]) ) {
		update_post_meta( $post_id, 'signature-image-60-title-link', $_POST[ 'signature-image-60-title-link' ] );
	}
	
	// Checks for input and saves if needed
	if( isset( $_POST[ 'signature-image-60' ] ) ) {
		update_post_meta( $post_id, 'signature-image-60', $_POST[ 'signature-image-60' ] );
	}
	
	// Checks for input and saves if needed
	if( isset( $_POST[ 'signature-image-60-sub-title' ] ) ) {
		update_post_meta( $post_id, 'signature-image-60-sub-title', $_POST[ 'signature-image-60-sub-title' ] );
	}
	
	// Checks for input and saves if needed
	if( isset( $_POST[ 'signature-image-60-caption' ] ) ) {
		update_post_meta( $post_id, 'signature-image-60-caption', $_POST[ 'signature-image-60-caption' ] );
	}
	
	// Checks for input and saves if needed
	if( isset( $_POST[ 'signature-image-61-title' ] ) ) {
		update_post_meta( $post_id, 'signature-image-61-title', $_POST[ 'signature-image-61-title' ] );
	}
	
	// Checks for input and saves if needed
	if( isset( $_POST[ 'signature-image-61-title-link' ]) ) {
		update_post_meta( $post_id, 'signature-image-61-title-link', $_POST[ 'signature-image-61-title-link' ] );
	}
	
	// Checks for input and saves if needed
	if( isset( $_POST[ 'signature-image-61' ] ) ) {
		update_post_meta( $post_id, 'signature-image-61', $_POST[ 'signature-image-61' ] );
	}
	
	// Checks for input and saves if needed
	if( isset( $_POST[ 'signature-image-61-sub-title' ] ) ) {
		update_post_meta( $post_id, 'signature-image-61-sub-title', $_POST[ 'signature-image-61-sub-title' ] );
	}
	
	// Checks for input and saves if needed
	if( isset( $_POST[ 'signature-image-61-caption' ] ) ) {
		update_post_meta( $post_id, 'signature-image-61-caption', $_POST[ 'signature-image-61-caption' ] );
	}
	
	// Checks for input and saves if needed
	if( isset( $_POST[ 'signature-image-62-title' ] ) ) {
		update_post_meta( $post_id, 'signature-image-62-title', $_POST[ 'signature-image-62-title' ] );
	}
	
	// Checks for input and saves if needed
	if( isset( $_POST[ 'signature-image-62-title-link' ]) ) {
		update_post_meta( $post_id, 'signature-image-62-title-link', $_POST[ 'signature-image-62-title-link' ] );
	}
	
	// Checks for input and saves if needed
	if( isset( $_POST[ 'signature-image-62' ] ) ) {
		update_post_meta( $post_id, 'signature-image-62', $_POST[ 'signature-image-62' ] );
	}
	
	// Checks for input and saves if needed
	if( isset( $_POST[ 'signature-image-62-sub-title' ] ) ) {
		update_post_meta( $post_id, 'signature-image-62-sub-title', $_POST[ 'signature-image-62-sub-title' ] );
	}
	
	// Checks for input and saves if needed
	if( isset( $_POST[ 'signature-image-62-caption' ] ) ) {
		update_post_meta( $post_id, 'signature-image-62-caption', $_POST[ 'signature-image-62-caption' ] );
	}
	
	// Checks for input and saves for centered final image
		if( isset( $_POST[ 'signature-1-checkbox' ] ) ) {
				update_post_meta( $post_id, 'signature-1-checkbox', 'yes' );
		} else {
				update_post_meta( $post_id, 'signature-1-checkbox', '' );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'signature-centered-image-title' ] ) ) {
				update_post_meta( $post_id, 'signature-centered-image-title', $_POST[ 'signature-centered-image-title' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'signature-centered-image-title-link' ]) ) {
				update_post_meta( $post_id, 'signature-centered-image-title-link', $_POST[ 'signature-centered-image-title-link' ] );
		}

	// Checks for input and saves if needed
		if( isset( $_POST[ 'signature-centered-image' ] ) ) {
				update_post_meta( $post_id, 'signature-centered-image', $_POST[ 'signature-centered-image' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'signature-centered-image-sub-title' ] ) ) {
				update_post_meta( $post_id, 'signature-centered-image-sub-title', $_POST[ 'signature-centered-image-sub-title' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'signature-centered-image-caption' ] ) ) {
				update_post_meta( $post_id, 'signature-centered-image-caption', $_POST[ 'signature-centered-image-caption' ] );
		}
	
	// Checks for input and saves for centered final image
		if( isset( $_POST[ 'signature-2-checkbox' ] ) ) {
				update_post_meta( $post_id, 'signature-2-checkbox', 'yes' );
		} else {
				update_post_meta( $post_id, 'signature-2-checkbox', '' );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'signature-centered-l-title' ] ) ) {
				update_post_meta( $post_id, 'signature-centered-l-title', $_POST[ 'signature-centered-l-title' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'signature-centered-l-title-link' ]) ) {
				update_post_meta( $post_id, 'signature-centered-l-title-link', $_POST[ 'signature-centered-l-title-link' ] );
		}

	// Checks for input and saves if needed
		if( isset( $_POST[ 'signature-centered-l' ] ) ) {
				update_post_meta( $post_id, 'signature-centered-l', $_POST[ 'signature-centered-l' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'signature-centered-l-sub-title' ] ) ) {
				update_post_meta( $post_id, 'signature-centered-l-sub-title', $_POST[ 'signature-centered-l-sub-title' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'signature-centered-l-caption' ] ) ) {
				update_post_meta( $post_id, 'signature-centered-l-caption', $_POST[ 'signature-centered-l-caption' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'signature-centered-r-title' ] ) ) {
				update_post_meta( $post_id, 'signature-centered-r-title', $_POST[ 'signature-centered-r-title' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'signature-centered-r-title-link' ]) ) {
				update_post_meta( $post_id, 'signature-centered-r-title-link', $_POST[ 'signature-centered-r-title-link' ] );
		}

	// Checks for input and saves if needed
		if( isset( $_POST[ 'signature-centered-r' ] ) ) {
				update_post_meta( $post_id, 'signature-centered-r', $_POST[ 'signature-centered-r' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'signature-centered-r-sub-title' ] ) ) {
				update_post_meta( $post_id, 'signature-centered-r-sub-title', $_POST[ 'signature-centered-r-sub-title' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'signature-centered-r-caption' ] ) ) {
				update_post_meta( $post_id, 'signature-centered-r-caption', $_POST[ 'signature-centered-r-caption' ] );
		}
}
add_action( 'save_post', 'signature_meta_save' );
