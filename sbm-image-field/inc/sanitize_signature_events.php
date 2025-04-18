<?php
// Sanitize Signature Destinations

function signature_events_meta_save( $post_id ) {

    // Checks save status
    $is_autosave = wp_is_post_autosave( $post_id );
    $is_revision = wp_is_post_revision( $post_id );
    $is_valid_nonce = ( isset( $_POST[ 'signature_events_nonce' ] ) && wp_verify_nonce( $_POST[ 'signature_events_nonce' ], basename( __FILE__ ) ) ) ? 'true' : 'false';

    // Exits script depending on save status
    if ( $is_autosave || $is_revision || !$is_valid_nonce ) {
        return;
    }
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'sig-logo-events' ] ) ) {
				update_post_meta( $post_id, 'sig-logo-events', $_POST[ 'sig-logo-events' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'signature-events-description' ] ) ) {
				update_post_meta( $post_id, 'signature-events-description', $_POST[ 'signature-events-description' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'signature-events-image-1-title' ] ) ) {
				update_post_meta( $post_id, 'signature-events-image-1-title', $_POST[ 'signature-events-image-1-title' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'signature-events-image-1-title-link' ]) ) {
				update_post_meta( $post_id, 'signature-events-image-1-title-link', $_POST[ 'signature-events-image-1-title-link' ] );
		}

	// Checks for input and saves if needed
		if( isset( $_POST[ 'signature-events-image-1' ] ) ) {
				update_post_meta( $post_id, 'signature-events-image-1', $_POST[ 'signature-events-image-1' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'signature-events-image-1-sub-title' ] ) ) {
				update_post_meta( $post_id, 'signature-events-image-1-sub-title', $_POST[ 'signature-events-image-1-sub-title' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'signature-events-image-1-caption' ] ) ) {
				update_post_meta( $post_id, 'signature-events-image-1-caption', $_POST[ 'signature-events-image-1-caption' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'signature-events-image-1-modal-content' ] ) ) {
				update_post_meta( $post_id, 'signature-events-image-1-modal-content', $_POST[ 'signature-events-image-1-modal-content' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'signature-events-image-2-title' ] ) ) {
				update_post_meta( $post_id, 'signature-events-image-2-title', $_POST[ 'signature-events-image-2-title' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'signature-events-image-2-title-link' ]) ) {
				update_post_meta( $post_id, 'signature-events-image-2-title-link', $_POST[ 'signature-events-image-2-title-link' ] );
		}

	// Checks for input and saves if needed
		if( isset( $_POST[ 'signature-events-image-2' ] ) ) {
				update_post_meta( $post_id, 'signature-events-image-2', $_POST[ 'signature-events-image-2' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'signature-events-image-2-sub-title' ] ) ) {
				update_post_meta( $post_id, 'signature-events-image-2-sub-title', $_POST[ 'signature-events-image-2-sub-title' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'signature-events-image-2-caption' ] ) ) {
				update_post_meta( $post_id, 'signature-events-image-2-caption', $_POST[ 'signature-events-image-2-caption' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'signature-events-image-2-modal-content' ] ) ) {
				update_post_meta( $post_id, 'signature-events-image-2-modal-content', $_POST[ 'signature-events-image-2-modal-content' ] );
		}

	// Checks for input and saves if needed
		if( isset( $_POST[ 'signature-events-image-3-title' ] ) ) {
				update_post_meta( $post_id, 'signature-events-image-3-title', $_POST[ 'signature-events-image-3-title' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'signature-events-image-3-title-link' ]) ) {
				update_post_meta( $post_id, 'signature-events-image-3-title-link', $_POST[ 'signature-events-image-3-title-link' ] );
		}

	// Checks for input and saves if needed
		if( isset( $_POST[ 'signature-events-image-3' ] ) ) {
				update_post_meta( $post_id, 'signature-events-image-3', $_POST[ 'signature-events-image-3' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'signature-events-image-3-sub-title' ] ) ) {
				update_post_meta( $post_id, 'signature-events-image-3-sub-title', $_POST[ 'signature-events-image-3-sub-title' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'signature-events-image-3-caption' ] ) ) {
				update_post_meta( $post_id, 'signature-events-image-3-caption', $_POST[ 'signature-events-image-3-caption' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'signature-events-image-3-modal-content' ] ) ) {
				update_post_meta( $post_id, 'signature-events-image-3-modal-content', $_POST[ 'signature-events-image-3-modal-content' ] );
		}
	
	// Checks for input and saves for images 4, 5, 6
		if( isset( $_POST[ 'signature-events-456-checkbox' ] ) ) {
				update_post_meta( $post_id, 'signature-events-456-checkbox', 'yes' );
		} else {
				update_post_meta( $post_id, 'signature-events-456-checkbox', '' );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'signature-events-image-4-title' ] ) ) {
				update_post_meta( $post_id, 'signature-events-image-4-title', $_POST[ 'signature-events-image-4-title' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'signature-events-image-4-title-link' ]) ) {
				update_post_meta( $post_id, 'signature-events-image-4-title-link', $_POST[ 'signature-events-image-4-title-link' ] );
		}

	// Checks for input and saves if needed
		if( isset( $_POST[ 'signature-events-image-4' ] ) ) {
				update_post_meta( $post_id, 'signature-events-image-4', $_POST[ 'signature-events-image-4' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'signature-events-image-4-sub-title' ] ) ) {
				update_post_meta( $post_id, 'signature-events-image-4-sub-title', $_POST[ 'signature-events-image-4-sub-title' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'signature-events-image-4-caption' ] ) ) {
				update_post_meta( $post_id, 'signature-events-image-4-caption', $_POST[ 'signature-events-image-4-caption' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'signature-events-image-4-modal-content' ] ) ) {
				update_post_meta( $post_id, 'signature-events-image-4-modal-content', $_POST[ 'signature-events-image-4-modal-content' ] );
		}

	// Checks for input and saves if needed
		if( isset( $_POST[ 'signature-events-image-5-title' ] ) ) {
				update_post_meta( $post_id, 'signature-events-image-5-title', $_POST[ 'signature-events-image-5-title' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'signature-events-image-5-title-link' ]) ) {
				update_post_meta( $post_id, 'signature-events-image-5-title-link', $_POST[ 'signature-events-image-5-title-link' ] );
		}

	// Checks for input and saves if needed
		if( isset( $_POST[ 'signature-events-image-5' ] ) ) {
				update_post_meta( $post_id, 'signature-events-image-5', $_POST[ 'signature-events-image-5' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'signature-events-image-5-sub-title' ] ) ) {
				update_post_meta( $post_id, 'signature-events-image-5-sub-title', $_POST[ 'signature-events-image-5-sub-title' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'signature-events-image-5-caption' ] ) ) {
				update_post_meta( $post_id, 'signature-events-image-5-caption', $_POST[ 'signature-events-image-5-caption' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'signature-events-image-5-modal-content' ] ) ) {
				update_post_meta( $post_id, 'signature-events-image-5-modal-content', $_POST[ 'signature-events-image-5-modal-content' ] );
		}

	// Checks for input and saves if needed
		if( isset( $_POST[ 'signature-events-image-6-title' ] ) ) {
				update_post_meta( $post_id, 'signature-events-image-6-title', $_POST[ 'signature-events-image-6-title' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'signature-events-image-6-title-link' ]) ) {
				update_post_meta( $post_id, 'signature-events-image-6-title-link', $_POST[ 'signature-events-image-6-title-link' ] );
		}

	// Checks for input and saves if needed
		if( isset( $_POST[ 'signature-events-image-6' ] ) ) {
				update_post_meta( $post_id, 'signature-events-image-6', $_POST[ 'signature-events-image-6' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'signature-events-image-6-sub-title' ] ) ) {
				update_post_meta( $post_id, 'signature-events-image-6-sub-title', $_POST[ 'signature-events-image-6-sub-title' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'signature-events-image-6-caption' ] ) ) {
				update_post_meta( $post_id, 'signature-events-image-6-caption', $_POST[ 'signature-events-image-6-caption' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'signature-events-image-6-modal-content' ] ) ) {
				update_post_meta( $post_id, 'signature-events-image-6-modal-content', $_POST[ 'signature-events-image-6-modal-content' ] );
		}
	
	// Checks for input and saves for images 7, 8, 9
		if( isset( $_POST[ 'signature-events-789-checkbox' ] ) ) {
				update_post_meta( $post_id, 'signature-events-789-checkbox', 'yes' );
		} else {
				update_post_meta( $post_id, 'signature-events-789-checkbox', '' );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'signature-events-image-7-title' ] ) ) {
				update_post_meta( $post_id, 'signature-events-image-7-title', $_POST[ 'signature-events-image-7-title' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'signature-events-image-7-title-link' ]) ) {
				update_post_meta( $post_id, 'signature-events-image-7-title-link', $_POST[ 'signature-events-image-7-title-link' ] );
		}

	// Checks for input and saves if needed
		if( isset( $_POST[ 'signature-events-image-7' ] ) ) {
				update_post_meta( $post_id, 'signature-events-image-7', $_POST[ 'signature-events-image-7' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'signature-events-image-7-sub-title' ] ) ) {
				update_post_meta( $post_id, 'signature-events-image-7-sub-title', $_POST[ 'signature-events-image-7-sub-title' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'signature-events-image-7-caption' ] ) ) {
				update_post_meta( $post_id, 'signature-events-image-7-caption', $_POST[ 'signature-events-image-7-caption' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'signature-events-image-7-modal-content' ] ) ) {
				update_post_meta( $post_id, 'signature-events-image-7-modal-content', $_POST[ 'signature-events-image-7-modal-content' ] );
		}

	// Checks for input and saves if needed
		if( isset( $_POST[ 'signature-events-image-8-title' ] ) ) {
				update_post_meta( $post_id, 'signature-events-image-8-title', $_POST[ 'signature-events-image-8-title' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'signature-events-image-8-title-link' ]) ) {
				update_post_meta( $post_id, 'signature-events-image-8-title-link', $_POST[ 'signature-events-image-8-title-link' ] );
		}

	// Checks for input and saves if needed
		if( isset( $_POST[ 'signature-events-image-8' ] ) ) {
				update_post_meta( $post_id, 'signature-events-image-8', $_POST[ 'signature-events-image-8' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'signature-events-image-8-sub-title' ] ) ) {
				update_post_meta( $post_id, 'signature-events-image-8-sub-title', $_POST[ 'signature-events-image-8-sub-title' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'signature-events-image-8-caption' ] ) ) {
				update_post_meta( $post_id, 'signature-events-image-8-caption', $_POST[ 'signature-events-image-8-caption' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'signature-events-image-8-modal-content' ] ) ) {
				update_post_meta( $post_id, 'signature-events-image-8-modal-content', $_POST[ 'signature-events-image-8-modal-content' ] );
		}

	// Checks for input and saves if needed
		if( isset( $_POST[ 'signature-events-image-9-title' ] ) ) {
				update_post_meta( $post_id, 'signature-events-image-9-title', $_POST[ 'signature-events-image-9-title' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'signature-events-image-9-title-link' ]) ) {
				update_post_meta( $post_id, 'signature-events-image-9-title-link', $_POST[ 'signature-events-image-9-title-link' ] );
		}

	// Checks for input and saves if needed
		if( isset( $_POST[ 'signature-events-image-9' ] ) ) {
				update_post_meta( $post_id, 'signature-events-image-9', $_POST[ 'signature-events-image-9' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'signature-events-image-9-sub-title' ] ) ) {
				update_post_meta( $post_id, 'signature-events-image-9-sub-title', $_POST[ 'signature-events-image-9-sub-title' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'signature-events-image-9-caption' ] ) ) {
				update_post_meta( $post_id, 'signature-events-image-9-caption', $_POST[ 'signature-events-image-9-caption' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'signature-events-image-9-modal-content' ] ) ) {
				update_post_meta( $post_id, 'signature-events-image-9-modal-content', $_POST[ 'signature-events-image-9-modal-content' ] );
		}
	
	// Checks for input and saves for images 10, 11, 12
		if( isset( $_POST[ 'signature-events-101112-checkbox' ] ) ) {
				update_post_meta( $post_id, 'signature-events-101112-checkbox', 'yes' );
		} else {
				update_post_meta( $post_id, 'signature-events-101112-checkbox', '' );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'signature-events-image-10-title' ] ) ) {
				update_post_meta( $post_id, 'signature-events-image-10-title', $_POST[ 'signature-events-image-10-title' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'signature-events-image-10-title-link' ]) ) {
				update_post_meta( $post_id, 'signature-events-image-10-title-link', $_POST[ 'signature-events-image-10-title-link' ] );
		}

	// Checks for input and saves if needed
		if( isset( $_POST[ 'signature-events-image-10' ] ) ) {
				update_post_meta( $post_id, 'signature-events-image-10', $_POST[ 'signature-events-image-10' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'signature-events-image-10-sub-title' ] ) ) {
				update_post_meta( $post_id, 'signature-events-image-10-sub-title', $_POST[ 'signature-events-image-10-sub-title' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'signature-events-image-10-caption' ] ) ) {
				update_post_meta( $post_id, 'signature-events-image-10-caption', $_POST[ 'signature-events-image-10-caption' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'signature-events-image-10-modal-content' ] ) ) {
				update_post_meta( $post_id, 'signature-events-image-10-modal-content', $_POST[ 'signature-events-image-10-modal-content' ] );
		}

	// Checks for input and saves if needed
		if( isset( $_POST[ 'signature-events-image-11-title' ] ) ) {
				update_post_meta( $post_id, 'signature-events-image-11-title', $_POST[ 'signature-events-image-11-title' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'signature-events-image-11-title-link' ]) ) {
				update_post_meta( $post_id, 'signature-events-image-11-title-link', $_POST[ 'signature-events-image-11-title-link' ] );
		}

	// Checks for input and saves if needed
		if( isset( $_POST[ 'signature-events-image-11' ] ) ) {
				update_post_meta( $post_id, 'signature-events-image-11', $_POST[ 'signature-events-image-11' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'signature-events-image-11-sub-title' ] ) ) {
				update_post_meta( $post_id, 'signature-events-image-11-sub-title', $_POST[ 'signature-events-image-11-sub-title' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'signature-events-image-11-caption' ] ) ) {
				update_post_meta( $post_id, 'signature-events-image-11-caption', $_POST[ 'signature-events-image-11-caption' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'signature-events-image-11-modal-content' ] ) ) {
				update_post_meta( $post_id, 'signature-events-image-11-modal-content', $_POST[ 'signature-events-image-11-modal-content' ] );
		}

	// Checks for input and saves if needed
		if( isset( $_POST[ 'signature-events-image-12-title' ] ) ) {
				update_post_meta( $post_id, 'signature-events-image-12-title', $_POST[ 'signature-events-image-12-title' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'signature-events-image-12-title-link' ]) ) {
				update_post_meta( $post_id, 'signature-events-image-12-title-link', $_POST[ 'signature-events-image-12-title-link' ] );
		}

	// Checks for input and saves if needed
		if( isset( $_POST[ 'signature-events-image-12' ] ) ) {
				update_post_meta( $post_id, 'signature-events-image-12', $_POST[ 'signature-events-image-12' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'signature-events-image-12-sub-title' ] ) ) {
				update_post_meta( $post_id, 'signature-events-image-12-sub-title', $_POST[ 'signature-events-image-12-sub-title' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'signature-events-image-12-caption' ] ) ) {
				update_post_meta( $post_id, 'signature-events-image-12-caption', $_POST[ 'signature-events-image-12-caption' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'signature-events-image-12-modal-content' ] ) ) {
				update_post_meta( $post_id, 'signature-events-image-12-modal-content', $_POST[ 'signature-events-image-12-modal-content' ] );
		}
	
}
add_action( 'save_post', 'signature_events_meta_save' );