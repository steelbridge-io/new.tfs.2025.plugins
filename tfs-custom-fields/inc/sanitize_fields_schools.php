<?php
/*
* Sanitize Schools meta fields
*/
function sbm_schools_meta_save( $post_id ) {

    // Checks save status
    $is_autosave = wp_is_post_autosave( $post_id );
    $is_revision = wp_is_post_revision( $post_id );
    $is_valid_nonce = ( isset( $_POST[ 'tfs_nonce' ] ) && wp_verify_nonce( $_POST[ 'tfs_nonce' ], basename( __FILE__ ) ) ) ? 'true' : 'false';


		  // Exits script depending on save status
    if ( $is_autosave || $is_revision || !$is_valid_nonce ) {
        return;
    }

		/*=== SCHOOLS DESCRIPTION ===*/

	// Checks for input and sanitizes/saves if needed
    if( isset( $_POST[ 'schools-description' ] ) ) {
        update_post_meta( $post_id, 'schools-description', ( $_POST[ 'schools-description' ] ) );
    }

		/*=== SCHOOLS FEATURE #1 ===*/

	// Checks for input and sanitizes/saves if needed
		if( isset( $_POST[ 'feature-sch1-title' ] ) ) {
        update_post_meta( $post_id, 'feature-sch1-title',( $_POST[ 'feature-sch1-title' ] ) );
    }

	// Checks for input and sanitizes/saves if needed
		if( isset( $_POST[ 'feature-sch1-cost-textarea' ] ) ) {
        update_post_meta( $post_id, 'feature-sch1-cost-textarea',( $_POST[ 'feature-sch1-cost-textarea' ] ) );
    }

	// Checks for input and sanitizes/saves if needed
		if( isset( $_POST[ 'feature-sch1-inclusions-textarea' ] ) ) {
        update_post_meta( $post_id, 'feature-sch1-inclusions-textarea', ( $_POST[ 'feature-sch1-inclusions-textarea' ] ) );
    }

	// Checks for input and sanitizes/saves if needed
		if( isset( $_POST[ 'feature-sch1-noninclusions-textarea' ] ) ) {
        update_post_meta( $post_id, 'feature-sch1-noninclusions-textarea', ( $_POST[ 'feature-sch1-noninclusions-textarea' ] ) );
    }

	// Checks for input and sanitizes/saves if needed
		if( isset( $_POST[ 'feature-sch1-travelins-textarea' ] ) ) {
        update_post_meta( $post_id, 'feature-sch1-travelins-textarea', ( $_POST[ 'feature-sch1-travelins-textarea' ] ) );
    }

	// Checks for input and sanitizes/saves if needed
		if( isset( $_POST[ 'feature-sch1-nonangler-textarea' ] ) ) {
        update_post_meta( $post_id, 'feature-sch1-nonangler-textarea', ( $_POST[ 'feature-sch1-nonangler-textarea' ] ) );
    }

		/*=== SCHOOLS FEATURE #2 ===*/

	// Checks for input and sanitizes/saves if needed
		if( isset( $_POST[ 'feature-sch2-title' ] ) ) {
        update_post_meta( $post_id, 'feature-sch2-title', ( $_POST[ 'feature-sch2-title' ] ) );
    }

	// Checks for input and sanitizes/saves if needed
		if( isset( $_POST[ 'feature-sch2-dates-textarea' ] ) ) {
        update_post_meta( $post_id, 'feature-sch2-dates-textarea', ( $_POST[ 'feature-sch2-dates-textarea' ] ) );
    }
	
	// Checks for input and displays sping section
		if( isset( $_POST[ 'sch-dates-readmore-checkbox' ] ) ) {
				update_post_meta( $post_id, 'sch-dates-readmore-checkbox', 'yes' );
		} else {
				update_post_meta( $post_id, 'sch-dates-readmore-checkbox', '' );
		}
	
	// Checks for input and sanitizes/saves if needed
		if( isset( $_POST[ 'sch-dates-readmore-textarea' ] ) ) {
        update_post_meta( $post_id, 'sch-dates-readmore-textarea', ( $_POST[ 'sch-dates-readmore-textarea' ] ) );
    }

	// Checks for input and sanitizes/saves if needed
		if( isset( $_POST[ 'feature-sch2-autumn-textarea' ] ) ) {
        update_post_meta( $post_id, 'feature-sch2-autumn-textarea', ( $_POST[ 'feature-sch2-autumn-textarea' ] ) );
    }

	// Checks for input and sanitizes/saves if needed
		if( isset( $_POST[ 'feature-sch2-winter-textarea' ] ) ) {
        update_post_meta( $post_id, 'feature-sch2-winter-textarea', ( $_POST[ 'feature-sch2-winter-textarea' ] ) );
    }

	// Checks for input and sanitizes/saves if needed
		if( isset( $_POST[ 'feature-sch2-spring-textarea' ] ) ) {
        update_post_meta( $post_id, 'feature-sch2-spring-textarea', ( $_POST[ 'feature-sch2-spring-textarea' ] ) );
    }

	// Checks for input and sanitizes/saves if needed
		if( isset( $_POST[ 'feature-sch2-summer-textarea' ] ) ) {
        update_post_meta( $post_id, 'feature-sch2-summer-textarea', ( $_POST[ 'feature-sch2-summer-textarea' ] ) );
    }

	// Checks for input and sanitizes/saves if needed
		if( isset( $_POST[ 'feature-sch3-title' ] ) ) {
        update_post_meta( $post_id, 'feature-sch3-title', ( $_POST[ 'feature-sch3-title' ] ) );
    }

	// Checks for input and sanitizes/saves if needed
		if( isset( $_POST[ 'feature-sch3-gettingto-textarea' ] ) ) {
        update_post_meta( $post_id, 'feature-sch3-gettingto-textarea', ( $_POST[ 'feature-sch3-gettingto-textarea' ] ) );
    }
	
	// Checks for input and displays sping section
		if( isset( $_POST[ 'sch-gettingthere-readmore-checkbox' ] ) ) {
				update_post_meta( $post_id, 'sch-gettingthere-readmore-checkbox', 'yes' );
		} else {
				update_post_meta( $post_id, 'sch-gettingthere-readmore-checkbox', '' );
		}

	// Checks for input and sanitizes/saves if needed
		if( isset( $_POST[ 'feature-sch3-readmore-textarea' ] ) ) {
        update_post_meta( $post_id, 'feature-sch3-readmore-textarea', ( $_POST[ 'feature-sch3-readmore-textarea' ] ) );
    }

	// Checks for input and sanitizes/saves if needed
		if( isset( $_POST[ 'feature-sch3-fishing-title' ] ) ) {
        update_post_meta( $post_id, 'feature-sch3-fishing-title', ( $_POST[ 'feature-sch3-fishing-title' ] ) );
    }

	// Checks for input and sanitizes/saves if needed
		if( isset( $_POST[ 'feature-sch3-fishing-textarea' ] ) ) {
        update_post_meta( $post_id, 'feature-sch3-fishing-textarea', ( $_POST[ 'feature-sch3-fishing-textarea' ] ) );
    }

		// Checks for input and sanitizes/saves if needed
		if( isset( $_POST[ 'feature-sch3-readmore-textarea-intinerary' ] ) ) {
        update_post_meta( $post_id, 'feature-sch3-readmore-textarea-intinerary', ( $_POST[ 'feature-sch3-readmore-textarea-intinerary' ] ) );
    }

		// Checks for input and sanitizes/saves if needed
		if( isset( $_POST[ 'sch-beat1-label' ] ) ) {
        update_post_meta( $post_id, 'sch-beat1-label', ( $_POST[ 'sch-beat1-label' ] ) );
    }

	// Checks for input and sanitizes/saves if needed
		if( isset( $_POST[ 'feature-sch3-fishing-beat1' ] ) ) {
        update_post_meta( $post_id, 'feature-sch3-fishing-beat1', ( $_POST[ 'feature-sch3-fishing-beat1' ] ) );
    }

	// Checks for input and sanitizes/saves if needed
		if( isset( $_POST[ 'sch-beat2-label' ] ) ) {
        update_post_meta( $post_id, 'sch-beat2-label', ( $_POST[ 'sch-beat2-label' ] ) );
    }

	// Checks for input and sanitizes/saves if needed
		if( isset( $_POST[ 'feature-sch3-fishing-beat2' ] ) ) {
        update_post_meta( $post_id, 'feature-sch3-fishing-beat2', ( $_POST[ 'feature-sch3-fishing-beat2' ] ) );
    }

	// Checks for input and sanitizes/saves if needed
		if( isset( $_POST[ 'sch-beat3-label' ] ) ) {
        update_post_meta( $post_id, 'sch-beat3-label', ( $_POST[ 'sch-beat3-label' ] ) );
    }

	// Checks for input and sanitizes/saves if needed
		if( isset( $_POST[ 'feature-sch3-fishing-beat3' ] ) ) {
        update_post_meta( $post_id, 'feature-sch3-fishing-beat3', ( $_POST[ 'feature-sch3-fishing-beat3' ] ) );
    }

	// Checks for input and sanitizes/saves if needed
		if( isset( $_POST[ 'sch-beat4-label' ] ) ) {
        update_post_meta( $post_id, 'sch-beat4-label', ( $_POST[ 'sch-beat4-label' ] ) );
    }

	// Checks for input and sanitizes/saves if needed
		if( isset( $_POST[ 'feature-sch3-fishing-beat4' ] ) ) {
        update_post_meta( $post_id, 'feature-sch3-fishing-beat4', ( $_POST[ 'feature-sch3-fishing-beat4' ] ) );
    }

	// Checks for input and sanitizes/saves if needed
		if( isset( $_POST[ 'sch-beat5-label' ] ) ) {
        update_post_meta( $post_id, 'sch-beat5-label', ( $_POST[ 'sch-beat5-label' ] ) );
    }

	// Checks for input and sanitizes/saves if needed
		if( isset( $_POST[ 'feature-sch3-fishing-beat5' ] ) ) {
        update_post_meta( $post_id, 'feature-sch3-fishing-beat5', ( $_POST[ 'feature-sch3-fishing-beat5' ] ) );
    }

	// Checks for input and sanitizes/saves if needed
		if( isset( $_POST[ 'sch-beat6-label' ] ) ) {
        update_post_meta( $post_id, 'sch-beat6-label', ( $_POST[ 'sch-beat6-label' ] ) );
    }

	// Checks for input and sanitizes/saves if needed
		if( isset( $_POST[ 'feature-sch3-fishing-beat6' ] ) ) {
        update_post_meta( $post_id, 'feature-sch3-fishing-beat6', ( $_POST[ 'feature-sch3-fishing-beat6' ] ) );
    }

	// Checks for input and sanitizes/saves if needed
		if( isset( $_POST[ 'feature-sch4-title' ] ) ) {
        update_post_meta( $post_id, 'feature-sch4-title', ( $_POST[ 'feature-sch4-title' ] ) );
    }

	// Checks for input and sanitizes/saves if needed
		if( isset( $_POST[ 'feature-sch4-gettingto-textarea' ] ) ) {
        update_post_meta( $post_id, 'feature-sch4-gettingto-textarea', ( $_POST[ 'feature-sch4-gettingto-textarea' ] ) );
    }
	
	// Checks for input and displays sping section
		if( isset( $_POST[ 'sch-lodging-readmore-checkbox' ] ) ) {
				update_post_meta( $post_id, 'sch-lodging-readmore-checkbox', 'yes' );
		} else {
				update_post_meta( $post_id, 'sch-lodging-readmore-checkbox', '' );
		}
	
	// Checks for input and sanitizes/saves if needed
		if( isset( $_POST[ 'feature-sch4-readmore-textarea' ] ) ) {
        update_post_meta( $post_id, 'feature-sch4-readmore-textarea', ( $_POST[ 'feature-sch4-readmore-textarea' ] ) );
    }

	// Checks for input and sanitizes/saves if needed
		if( isset( $_POST[ 'sch_dates_readmore_textarea' ] ) ) {
        update_post_meta( $post_id, 'sch_dates_readmore_textarea', ( $_POST[ 'sch_dates_readmore_textarea' ] ) );
    }
	// Checks for input and sanitizes/saves if needed
		if( isset( $_POST[ 'feature-sch5-title' ] ) ) {
        update_post_meta( $post_id, 'feature-sch5-title', ( $_POST[ 'feature-sch5-title' ] ) );
    }

	// Checks for input and sanitizes/saves if needed
		if( isset( $_POST[ 'feature-sch5-fishing-textarea' ] ) ) {
        update_post_meta( $post_id, 'feature-sch5-fishing-textarea', ( $_POST[ 'feature-sch5-fishing-textarea' ] ) );
    }

	// Checks for input and sanitizes/saves if needed
		if( isset( $_POST[ 'cta-schools-strong-intro' ] ) ) {
        update_post_meta( $post_id, 'cta-schools-strong-intro', ( $_POST[ 'cta-schools-strong-intro' ] ) );
    }

	// Checks for input and saves if needed
		if( isset( $_POST[ 'cta-schools-content' ] ) ) {
			update_post_meta( $post_id, 'cta-schools-content', $_POST[ 'cta-schools-content' ] );
		}
	
	// Checks for input and displays sping section
		if( isset( $_POST[ 'sch-itinerary-readmore-checkbox' ] ) ) {
				update_post_meta( $post_id, 'sch-itinerary-readmore-checkbox', 'yes' );
		} else {
				update_post_meta( $post_id, 'sch-itinerary-readmore-checkbox', '' );
		}

	// Checks for input and sanitizes/saves if needed
		if( isset( $_POST[ 'feature-sch3-readmore-textarea-intinerary' ] ) ) {
        update_post_meta( $post_id, 'feature-sch3-readmore-textarea-intinerary', ( $_POST[ 'feature-sch3-readmore-textarea-intinerary' ] ) );
    }

}
add_action('save_post', 'sbm_schools_meta_save' );
