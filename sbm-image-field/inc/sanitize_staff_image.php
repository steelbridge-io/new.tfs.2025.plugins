<?php
/* ========== Saves/Sanitizes ========== */

function staff_meta_save( $post_id ) {

    // Checks save status
    $is_autosave = wp_is_post_autosave( $post_id );
    $is_revision = wp_is_post_revision( $post_id );
    $is_valid_nonce = ( isset( $_POST[ 'staff_nonce' ] ) && wp_verify_nonce( $_POST[ 'staff_nonce' ], basename( __FILE__ ) ) ) ? 'true' : 'false';

    // Exits script depending on save status
    if ( $is_autosave || $is_revision || !$is_valid_nonce ) {
        return;
    }

	// Checks for input and saves if needed
		if( isset( $_POST[ 'staff-logo' ] ) ) {
				update_post_meta( $post_id, 'staff-logo', $_POST[ 'staff-logo' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'staff-description' ] ) ) {
				update_post_meta( $post_id, 'staff-description', $_POST[ 'staff-description' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'staff-image-1-title' ] ) ) {
				update_post_meta( $post_id, 'staff-image-1-title', $_POST[ 'staff-image-1-title' ] );
		}

	// Checks for input and saves if needed
		if( isset( $_POST[ 'staff-image-1' ] ) ) {
				update_post_meta( $post_id, 'staff-image-1', $_POST[ 'staff-image-1' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'staff-image-1-sub-title' ] ) ) {
				update_post_meta( $post_id, 'staff-image-1-sub-title', $_POST[ 'staff-image-1-sub-title' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'staff-image-1-caption' ] ) ) {
				update_post_meta( $post_id, 'staff-image-1-caption', $_POST[ 'staff-image-1-caption' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'staff-image-2-title' ] ) ) {
				update_post_meta( $post_id, 'staff-image-2-title', $_POST[ 'staff-image-2-title' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'staff-image-2' ] ) ) {
				update_post_meta( $post_id, 'staff-image-2', $_POST[ 'staff-image-2' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'staff-image-2-sub-title' ] ) ) {
				update_post_meta( $post_id, 'staff-image-2-sub-title', $_POST[ 'staff-image-2-sub-title' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'staff-image-2-caption' ] ) ) {
				update_post_meta( $post_id, 'staff-image-2-caption', $_POST[ 'staff-image-2-caption' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'staff-image-3-title' ] ) ) {
				update_post_meta( $post_id, 'staff-image-3-title', $_POST[ 'staff-image-3-title' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'staff-image-3' ] ) ) {
				update_post_meta( $post_id, 'staff-image-3', $_POST[ 'staff-image-3' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'staff-image-3-sub-title' ] ) ) {
				update_post_meta( $post_id, 'staff-image-3-sub-title', $_POST[ 'staff-image-3-sub-title' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'staff-image-3-caption' ] ) ) {
				update_post_meta( $post_id, 'staff-image-3-caption', $_POST[ 'staff-image-3-caption' ] );
		}
	
	// Checks for input and displays staff images 4, 5, 6
		if( isset( $_POST[ 'staff-456-checkbox' ] ) ) {
				update_post_meta( $post_id, 'staff-456-checkbox', 'yes' );
		} else {
				update_post_meta( $post_id, 'staff-456-checkbox', '' );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'staff-image-4-title' ] ) ) {
				update_post_meta( $post_id, 'staff-image-4-title', $_POST[ 'staff-image-4-title' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'staff-image-4' ] ) ) {
				update_post_meta( $post_id, 'staff-image-4', $_POST[ 'staff-image-4' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'staff-image-4-sub-title' ] ) ) {
				update_post_meta( $post_id, 'staff-image-4-sub-title', $_POST[ 'staff-image-4-sub-title' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'staff-image-4-caption' ] ) ) {
				update_post_meta( $post_id, 'staff-image-4-caption', $_POST[ 'staff-image-4-caption' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'staff-image-5-title' ] ) ) {
				update_post_meta( $post_id, 'staff-image-5-title', $_POST[ 'staff-image-5-title' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'staff-image-5' ] ) ) {
				update_post_meta( $post_id, 'staff-image-5', $_POST[ 'staff-image-5' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'staff-image-5-sub-title' ] ) ) {
				update_post_meta( $post_id, 'staff-image-5-sub-title', $_POST[ 'staff-image-5-sub-title' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'staff-image-5-caption' ] ) ) {
				update_post_meta( $post_id, 'staff-image-5-caption', $_POST[ 'staff-image-5-caption' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'staff-image-6-title' ] ) ) {
				update_post_meta( $post_id, 'staff-image-6-title', $_POST[ 'staff-image-6-title' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'staff-image-6' ] ) ) {
				update_post_meta( $post_id, 'staff-image-6', $_POST[ 'staff-image-6' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'staff-image-6-sub-title' ] ) ) {
				update_post_meta( $post_id, 'staff-image-6-sub-title', $_POST[ 'staff-image-6-sub-title' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'staff-image-6-caption' ] ) ) {
				update_post_meta( $post_id, 'staff-image-6-caption', $_POST[ 'staff-image-6-caption' ] );
		}
	
	// Checks for input and displays staff images 4, 5, 6
		if( isset( $_POST[ 'staff-789-checkbox' ] ) ) {
				update_post_meta( $post_id, 'staff-789-checkbox', 'yes' );
		} else {
				update_post_meta( $post_id, 'staff-789-checkbox', '' );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'staff-image-7-title' ] ) ) {
				update_post_meta( $post_id, 'staff-image-7-title', $_POST[ 'staff-image-7-title' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'staff-image-7' ] ) ) {
				update_post_meta( $post_id, 'staff-image-7', $_POST[ 'staff-image-7' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'staff-image-7-sub-title' ] ) ) {
				update_post_meta( $post_id, 'staff-image-7-sub-title', $_POST[ 'staff-image-7-sub-title' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'staff-image-7-caption' ] ) ) {
				update_post_meta( $post_id, 'staff-image-7-caption', $_POST[ 'staff-image-7-caption' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'staff-image-8-title' ] ) ) {
				update_post_meta( $post_id, 'staff-image-8-title', $_POST[ 'staff-image-8-title' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'staff-image-8' ] ) ) {
				update_post_meta( $post_id, 'staff-image-8', $_POST[ 'staff-image-8' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'staff-image-8-sub-title' ] ) ) {
				update_post_meta( $post_id, 'staff-image-8-sub-title', $_POST[ 'staff-image-8-sub-title' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'staff-image-8-caption' ] ) ) {
				update_post_meta( $post_id, 'staff-image-8-caption', $_POST[ 'staff-image-8-caption' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'staff-image-9-title' ] ) ) {
				update_post_meta( $post_id, 'staff-image-9-title', $_POST[ 'staff-image-9-title' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'staff-image-9' ] ) ) {
				update_post_meta( $post_id, 'staff-image-9', $_POST[ 'staff-image-9' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'staff-image-9-sub-title' ] ) ) {
				update_post_meta( $post_id, 'staff-image-9-sub-title', $_POST[ 'staff-image-9-sub-title' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'staff-image-9-caption' ] ) ) {
				update_post_meta( $post_id, 'staff-image-9-caption', $_POST[ 'staff-image-9-caption' ] );
		}
	
	// Checks for input and displays staff images 10, 11, 12
		if( isset( $_POST[ 'staff-101112-checkbox' ] ) ) {
				update_post_meta( $post_id, 'staff-101112-checkbox', 'yes' );
		} else {
				update_post_meta( $post_id, 'staff-101112-checkbox', '' );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'staff-image-10-title' ] ) ) {
				update_post_meta( $post_id, 'staff-image-10-title', $_POST[ 'staff-image-10-title' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'staff-image-10' ] ) ) {
				update_post_meta( $post_id, 'staff-image-10', $_POST[ 'staff-image-10' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'staff-image-10-sub-title' ] ) ) {
				update_post_meta( $post_id, 'staff-image-10-sub-title', $_POST[ 'staff-image-10-sub-title' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'staff-image-10-caption' ] ) ) {
				update_post_meta( $post_id, 'staff-image-10-caption', $_POST[ 'staff-image-10-caption' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'staff-image-11-title' ] ) ) {
				update_post_meta( $post_id, 'staff-image-11-title', $_POST[ 'staff-image-11-title' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'staff-image-11' ] ) ) {
				update_post_meta( $post_id, 'staff-image-11', $_POST[ 'staff-image-11' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'staff-image-11-sub-title' ] ) ) {
				update_post_meta( $post_id, 'staff-image-11-sub-title', $_POST[ 'staff-image-11-sub-title' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'staff-image-11-caption' ] ) ) {
				update_post_meta( $post_id, 'staff-image-11-caption', $_POST[ 'staff-image-11-caption' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'staff-image-12-title' ] ) ) {
				update_post_meta( $post_id, 'staff-image-12-title', $_POST[ 'staff-image-12-title' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'staff-image-12' ] ) ) {
				update_post_meta( $post_id, 'staff-image-12', $_POST[ 'staff-image-12' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'staff-image-12-sub-title' ] ) ) {
				update_post_meta( $post_id, 'staff-image-12-sub-title', $_POST[ 'staff-image-12-sub-title' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'staff-image-12-caption' ] ) ) {
				update_post_meta( $post_id, 'staff-image-12-caption', $_POST[ 'staff-image-12-caption' ] );
		}
	
	// Checks for input and displays staff images 13, 14, 15
		if( isset( $_POST[ 'staff-131415-checkbox' ] ) ) {
				update_post_meta( $post_id, 'staff-131415-checkbox', 'yes' );
		} else {
				update_post_meta( $post_id, 'staff-131415-checkbox', '' );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'staff-image-13-title' ] ) ) {
				update_post_meta( $post_id, 'staff-image-13-title', $_POST[ 'staff-image-13-title' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'staff-image-13' ] ) ) {
				update_post_meta( $post_id, 'staff-image-13', $_POST[ 'staff-image-13' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'staff-image-13-sub-title' ] ) ) {
				update_post_meta( $post_id, 'staff-image-13-sub-title', $_POST[ 'staff-image-13-sub-title' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'staff-image-13-caption' ] ) ) {
				update_post_meta( $post_id, 'staff-image-13-caption', $_POST[ 'staff-image-13-caption' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'staff-image-14-title' ] ) ) {
				update_post_meta( $post_id, 'staff-image-14-title', $_POST[ 'staff-image-14-title' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'staff-image-14' ] ) ) {
				update_post_meta( $post_id, 'staff-image-14', $_POST[ 'staff-image-14' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'staff-image-14-sub-title' ] ) ) {
				update_post_meta( $post_id, 'staff-image-14-sub-title', $_POST[ 'staff-image-14-sub-title' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'staff-image-14-caption' ] ) ) {
				update_post_meta( $post_id, 'staff-image-14-caption', $_POST[ 'staff-image-14-caption' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'staff-image-15-title' ] ) ) {
				update_post_meta( $post_id, 'staff-image-15-title', $_POST[ 'staff-image-15-title' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'staff-image-15' ] ) ) {
				update_post_meta( $post_id, 'staff-image-15', $_POST[ 'staff-image-15' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'staff-image-15-sub-title' ] ) ) {
				update_post_meta( $post_id, 'staff-image-15-sub-title', $_POST[ 'staff-image-15-sub-title' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'staff-image-15-caption' ] ) ) {
				update_post_meta( $post_id, 'staff-image-15-caption', $_POST[ 'staff-image-15-caption' ] );
		}
	
	// Checks for input and displays staff images 16, 17, 18
		if( isset( $_POST[ 'staff-161718-checkbox' ] ) ) {
				update_post_meta( $post_id, 'staff-161718-checkbox', 'yes' );
		} else {
				update_post_meta( $post_id, 'staff-161718-checkbox', '' );
		}
	
		// Checks for input and saves if needed
		if( isset( $_POST[ 'staff-image-16-title' ] ) ) {
				update_post_meta( $post_id, 'staff-image-16-title', $_POST[ 'staff-image-16-title' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'staff-image-16' ] ) ) {
				update_post_meta( $post_id, 'staff-image-16', $_POST[ 'staff-image-16' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'staff-image-16-sub-title' ] ) ) {
				update_post_meta( $post_id, 'staff-image-16-sub-title', $_POST[ 'staff-image-16-sub-title' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'staff-image-16-caption' ] ) ) {
				update_post_meta( $post_id, 'staff-image-16-caption', $_POST[ 'staff-image-16-caption' ] );
		}
	
			// Checks for input and saves if needed
		if( isset( $_POST[ 'staff-image-17-title' ] ) ) {
				update_post_meta( $post_id, 'staff-image-17-title', $_POST[ 'staff-image-17-title' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'staff-image-17' ] ) ) {
				update_post_meta( $post_id, 'staff-image-17', $_POST[ 'staff-image-17' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'staff-image-17-sub-title' ] ) ) {
				update_post_meta( $post_id, 'staff-image-17-sub-title', $_POST[ 'staff-image-17-sub-title' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'staff-image-17-caption' ] ) ) {
				update_post_meta( $post_id, 'staff-image-17-caption', $_POST[ 'staff-image-17-caption' ] );
		}	
	
			// Checks for input and saves if needed
		if( isset( $_POST[ 'staff-image-18-title' ] ) ) {
				update_post_meta( $post_id, 'staff-image-18-title', $_POST[ 'staff-image-18-title' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'staff-image-18' ] ) ) {
				update_post_meta( $post_id, 'staff-image-18', $_POST[ 'staff-image-18' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'staff-image-18-sub-title' ] ) ) {
				update_post_meta( $post_id, 'staff-image-18-sub-title', $_POST[ 'staff-image-18-sub-title' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'staff-image-18-caption' ] ) ) {
				update_post_meta( $post_id, 'staff-image-18-caption', $_POST[ 'staff-image-18-caption' ] );
		}
	
	// Checks for input and displays staff images 19, 20, 21
		if( isset( $_POST[ 'staff-192021-checkbox' ] ) ) {
				update_post_meta( $post_id, 'staff-192021-checkbox', 'yes' );
		} else {
				update_post_meta( $post_id, 'staff-192021-checkbox', '' );
		}
	
				// Checks for input and saves if needed
		if( isset( $_POST[ 'staff-image-19-title' ] ) ) {
				update_post_meta( $post_id, 'staff-image-19-title', $_POST[ 'staff-image-19-title' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'staff-image-19' ] ) ) {
				update_post_meta( $post_id, 'staff-image-19', $_POST[ 'staff-image-19' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'staff-image-19-sub-title' ] ) ) {
				update_post_meta( $post_id, 'staff-image-19-sub-title', $_POST[ 'staff-image-19-sub-title' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'staff-image-19-caption' ] ) ) {
				update_post_meta( $post_id, 'staff-image-19-caption', $_POST[ 'staff-image-19-caption' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'staff-image-20-title' ] ) ) {
				update_post_meta( $post_id, 'staff-image-20-title', $_POST[ 'staff-image-20-title' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'staff-image-20' ] ) ) {
				update_post_meta( $post_id, 'staff-image-20', $_POST[ 'staff-image-20' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'staff-image-20-sub-title' ] ) ) {
				update_post_meta( $post_id, 'staff-image-20-sub-title', $_POST[ 'staff-image-20-sub-title' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'staff-image-20-caption' ] ) ) {
				update_post_meta( $post_id, 'staff-image-20-caption', $_POST[ 'staff-image-20-caption' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'staff-image-21-title' ] ) ) {
				update_post_meta( $post_id, 'staff-image-21-title', $_POST[ 'staff-image-21-title' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'staff-image-21' ] ) ) {
				update_post_meta( $post_id, 'staff-image-21', $_POST[ 'staff-image-21' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'staff-image-21-sub-title' ] ) ) {
				update_post_meta( $post_id, 'staff-image-21-sub-title', $_POST[ 'staff-image-21-sub-title' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'staff-image-21-caption' ] ) ) {
				update_post_meta( $post_id, 'staff-image-21-caption', $_POST[ 'staff-image-21-caption' ] );
		}
	
	// Checks for input and displays staff images 22, 23, 24
		if( isset( $_POST[ 'staff-222324-checkbox' ] ) ) {
				update_post_meta( $post_id, 'staff-222324-checkbox', 'yes' );
		} else {
				update_post_meta( $post_id, 'staff-222324-checkbox', '' );
		}

	// Checks for input and saves if needed
		if( isset( $_POST[ 'staff-image-22-title' ] ) ) {
				update_post_meta( $post_id, 'staff-image-22-title', $_POST[ 'staff-image-22-title' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'staff-image-22' ] ) ) {
				update_post_meta( $post_id, 'staff-image-22', $_POST[ 'staff-image-22' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'staff-image-22-sub-title' ] ) ) {
				update_post_meta( $post_id, 'staff-image-22-sub-title', $_POST[ 'staff-image-22-sub-title' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'staff-image-22-caption' ] ) ) {
				update_post_meta( $post_id, 'staff-image-22-caption', $_POST[ 'staff-image-22-caption' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'staff-image-23-title' ] ) ) {
				update_post_meta( $post_id, 'staff-image-23-title', $_POST[ 'staff-image-23-title' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'staff-image-23' ] ) ) {
				update_post_meta( $post_id, 'staff-image-23', $_POST[ 'staff-image-23' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'staff-image-23-sub-title' ] ) ) {
				update_post_meta( $post_id, 'staff-image-23-sub-title', $_POST[ 'staff-image-23-sub-title' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'staff-image-23-caption' ] ) ) {
				update_post_meta( $post_id, 'staff-image-23-caption', $_POST[ 'staff-image-23-caption' ] );
		}

	// Checks for input and saves if needed
		if( isset( $_POST[ 'staff-image-24-title' ] ) ) {
				update_post_meta( $post_id, 'staff-image-24-title', $_POST[ 'staff-image-24-title' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'staff-image-24' ] ) ) {
				update_post_meta( $post_id, 'staff-image-24', $_POST[ 'staff-image-24' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'staff-image-24-sub-title' ] ) ) {
				update_post_meta( $post_id, 'staff-image-24-sub-title', $_POST[ 'staff-image-24-sub-title' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'staff-image-24-caption' ] ) ) {
				update_post_meta( $post_id, 'staff-image-24-caption', $_POST[ 'staff-image-24-caption' ] );
		}
	
	// Checks for input and displays staff images 25, 26, 27
		if( isset( $_POST[ 'staff-252627-checkbox' ] ) ) {
				update_post_meta( $post_id, 'staff-252627-checkbox', 'yes' );
		} else {
				update_post_meta( $post_id, 'staff-252627-checkbox', '' );
		}

	// Checks for input and saves if needed
		if( isset( $_POST[ 'staff-image-25-title' ] ) ) {
				update_post_meta( $post_id, 'staff-image-25-title', $_POST[ 'staff-image-25-title' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'staff-image-25' ] ) ) {
				update_post_meta( $post_id, 'staff-image-25', $_POST[ 'staff-image-25' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'staff-image-25-sub-title' ] ) ) {
				update_post_meta( $post_id, 'staff-image-25-sub-title', $_POST[ 'staff-image-25-sub-title' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'staff-image-25-caption' ] ) ) {
				update_post_meta( $post_id, 'staff-image-25-caption', $_POST[ 'staff-image-25-caption' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'staff-image-26-title' ] ) ) {
				update_post_meta( $post_id, 'staff-image-26-title', $_POST[ 'staff-image-26-title' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'staff-image-26' ] ) ) {
				update_post_meta( $post_id, 'staff-image-26', $_POST[ 'staff-image-26' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'staff-image-26-sub-title' ] ) ) {
				update_post_meta( $post_id, 'staff-image-26-sub-title', $_POST[ 'staff-image-26-sub-title' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'staff-image-26-caption' ] ) ) {
				update_post_meta( $post_id, 'staff-image-26-caption', $_POST[ 'staff-image-26-caption' ] );
		}

	// Checks for input and saves if needed
		if( isset( $_POST[ 'staff-image-27-title' ] ) ) {
				update_post_meta( $post_id, 'staff-image-27-title', $_POST[ 'staff-image-27-title' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'staff-image-27' ] ) ) {
				update_post_meta( $post_id, 'staff-image-27', $_POST[ 'staff-image-27' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'staff-image-27-sub-title' ] ) ) {
				update_post_meta( $post_id, 'staff-image-27-sub-title', $_POST[ 'staff-image-27-sub-title' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'staff-image-27-caption' ] ) ) {
				update_post_meta( $post_id, 'staff-image-27-caption', $_POST[ 'staff-image-27-caption' ] );
		}
	
	// Checks for input and displays staff images 28, 29, 30
		if( isset( $_POST[ 'staff-282930-checkbox' ] ) ) {
				update_post_meta( $post_id, 'staff-282930-checkbox', 'yes' );
		} else {
				update_post_meta( $post_id, 'staff-282930-checkbox', '' );
		}

	// Checks for input and saves if needed
		if( isset( $_POST[ 'staff-image-28-title' ] ) ) {
				update_post_meta( $post_id, 'staff-image-28-title', $_POST[ 'staff-image-28-title' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'staff-image-28' ] ) ) {
				update_post_meta( $post_id, 'staff-image-28', $_POST[ 'staff-image-28' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'staff-image-28-sub-title' ] ) ) {
				update_post_meta( $post_id, 'staff-image-28-sub-title', $_POST[ 'staff-image-28-sub-title' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'staff-image-28-caption' ] ) ) {
				update_post_meta( $post_id, 'staff-image-28-caption', $_POST[ 'staff-image-28-caption' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'staff-image-29-title' ] ) ) {
				update_post_meta( $post_id, 'staff-image-29-title', $_POST[ 'staff-image-29-title' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'staff-image-29' ] ) ) {
				update_post_meta( $post_id, 'staff-image-29', $_POST[ 'staff-image-29' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'staff-image-29-sub-title' ] ) ) {
				update_post_meta( $post_id, 'staff-image-29-sub-title', $_POST[ 'staff-image-29-sub-title' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'staff-image-29-caption' ] ) ) {
				update_post_meta( $post_id, 'staff-image-29-caption', $_POST[ 'staff-image-29-caption' ] );
		}

	// Checks for input and saves if needed
		if( isset( $_POST[ 'staff-image-30-title' ] ) ) {
				update_post_meta( $post_id, 'staff-image-30-title', $_POST[ 'staff-image-30-title' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'staff-image-30' ] ) ) {
				update_post_meta( $post_id, 'staff-image-30', $_POST[ 'staff-image-30' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'staff-image-30-sub-title' ] ) ) {
				update_post_meta( $post_id, 'staff-image-30-sub-title', $_POST[ 'staff-image-30-sub-title' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'staff-image-30-caption' ] ) ) {
				update_post_meta( $post_id, 'staff-image-30-caption', $_POST[ 'staff-image-30-caption' ] );
		}
		
	// Checks for input and displays double centered images
		if( isset( $_POST[ 'staff-centered-l-r-checkbox' ] ) ) {
				update_post_meta( $post_id, 'staff-centered-l-r-checkbox', 'yes' );
		} else {
				update_post_meta( $post_id, 'staff-centered-l-r-checkbox', '' );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'staff-centered-left-title' ] ) ) {
				update_post_meta( $post_id, 'staff-centered-left-title', $_POST[ 'staff-centered-left-title' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'staff-image-centered-left' ] ) ) {
				update_post_meta( $post_id, 'staff-image-centered-left', $_POST[ 'staff-image-centered-left' ] );
		}	

// Checks for input and saves if needed
		if( isset( $_POST[ 'staff-centered-left-sub-title' ] ) ) {
				update_post_meta( $post_id, 'staff-centered-left-sub-title', $_POST[ 'staff-centered-left-sub-title' ] );
		}	

// Checks for input and saves if needed
		if( isset( $_POST[ 'staff-centered-left-caption' ] ) ) {
				update_post_meta( $post_id, 'staff-centered-left-caption', $_POST[ 'staff-centered-left-caption' ] );
		}	

// Checks for input and saves if needed
		if( isset( $_POST[ 'staff-centered-right-title' ] ) ) {
				update_post_meta( $post_id, 'staff-centered-right-title', $_POST[ 'staff-centered-right-title' ] );
		}
	
	// Checks for input and saves if needed
		if( isset( $_POST[ 'staff-image-centered-right' ] ) ) {
				update_post_meta( $post_id, 'staff-image-centered-right', $_POST[ 'staff-image-centered-right' ] );
		}	

// Checks for input and saves if needed
		if( isset( $_POST[ 'staff-centered-right-sub-title' ] ) ) {
				update_post_meta( $post_id, 'staff-centered-right-sub-title', $_POST[ 'staff-centered-right-sub-title' ] );
		}	

// Checks for input and saves if needed
		if( isset( $_POST[ 'staff-centered-right-caption' ] ) ) {
				update_post_meta( $post_id, 'staff-centered-right-caption', $_POST[ 'staff-centered-right-caption' ] );
		}
	
// Checks for input and displays single centered image
		if( isset( $_POST[ 'staff-centered-checkbox' ] ) ) {
				update_post_meta( $post_id, 'staff-centered-checkbox', 'yes' );
		} else {
				update_post_meta( $post_id, 'staff-centered-checkbox', '' );
		}

// Checks for input and saves if needed
		if( isset( $_POST[ 'staff-centered-title' ] ) ) {
				update_post_meta( $post_id, 'staff-centered-title', $_POST[ 'staff-centered-title' ] );
		}
			
// Checks for input and saves if needed
		if( isset( $_POST[ 'staff-image-centered' ] ) ) {
				update_post_meta( $post_id, 'staff-image-centered', $_POST[ 'staff-image-centered' ] );
		}	
	
// Checks for input and saves if needed
		if( isset( $_POST[ 'staff-centered-sub-title' ] ) ) {
				update_post_meta( $post_id, 'staff-centered-sub-title', $_POST[ 'staff-centered-sub-title' ] );
		}	

// Checks for input and saves if needed
		if( isset( $_POST[ 'staff-centered-caption' ] ) ) {
				update_post_meta( $post_id, 'staff-centered-caption', $_POST[ 'staff-centered-caption' ] );
		}	

}
add_action( 'save_post', 'staff_meta_save' );