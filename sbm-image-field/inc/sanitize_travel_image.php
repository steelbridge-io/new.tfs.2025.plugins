<?php
/* ========== Saves/Sanitizes ========== */

function travel_meta_save( $post_id ) {
	
	// Checks save status
	$is_autosave = wp_is_post_autosave( $post_id );
	$is_revision = wp_is_post_revision( $post_id );
	$is_valid_nonce = ( isset( $_POST['travel_nonce'] )
	                    && wp_verify_nonce( $_POST['travel_nonce'],
			basename( __FILE__ ) ) ) ? 'true' : 'false';
	
	// Exits script depending on save status
	if ( $is_autosave || $is_revision || ! $is_valid_nonce ) {
		return;
	}
	
	// Checks for input and saves if needed
	if ( isset( $_POST['travel-hero-opacity-range'] ) ) {
		update_post_meta( $post_id,
			'travel-hero-opacity-range',
			sanitize_text_field( $_POST['travel-hero-opacity-range'] ) );
	}
	
	// Checks for input and saves if needed
	if ( isset( $_POST['travel-temp-video-poster'] ) ) {
		update_post_meta( $post_id,
			'travel-temp-video-poster',
			$_POST['travel-temp-video-poster'] );
	}
	
	// Checks for input and saves if needed
	if ( isset( $_POST['travel-temp-video'] ) ) {
		update_post_meta( $post_id,
			'travel-temp-video',
			$_POST['travel-temp-video'] );
	}
	
	// Checks for input and saves if needed 
	if ( isset( $_POST['travel-logo'] ) ) {
		update_post_meta( $post_id,
			'travel-logo',
			$_POST['travel-logo'] );
	}
	
	// Checks for input and saves if needed 
	if ( isset( $_POST['travel-image'] ) ) {
		update_post_meta( $post_id,
			'travel-image',
			$_POST['travel-image'] );
	}
	
	// Checks for input and saves if needed 
	if ( isset( $_POST['feature-1-image'] ) ) {
		update_post_meta( $post_id,
			'feature-1-image',
			$_POST['feature-1-image'] );
	}
	
	// Checks for input and saves if needed 
	if ( isset( $_POST['feature-2-image'] ) ) {
		update_post_meta( $post_id,
			'feature-2-image',
			$_POST['feature-2-image'] );
	}
	
	// Checks for input and saves if needed 
	if ( isset( $_POST['feature-3-gettingto-image'] ) ) {
		update_post_meta( $post_id,
			'feature-3-gettingto-image',
			$_POST['feature-3-gettingto-image'] );
	}
	
	// Checks for input and saves if needed 
	if ( isset( $_POST['feature-4-lodging-image'] ) ) {
		update_post_meta( $post_id,
			'feature-4-lodging-image',
			$_POST['feature-4-lodging-image'] );
	}
	
	// Checks for input and saves if needed 
	if ( isset( $_POST['feature-5-angling-image'] ) ) {
		update_post_meta( $post_id,
			'feature-5-angling-image',
			$_POST['feature-5-angling-image'] );
	}
	
	// Checks for input and saves
	if ( isset( $_POST['setthehook-option-checkbox'] ) ) {
		update_post_meta( $post_id, 'setthehook-option-checkbox', 'yes' );
	} else {
		update_post_meta( $post_id, 'setthehook-option-checkbox', '' );
	}
	
	// Checks for input and saves if needed
	if ( isset( $_POST['sth-textarea-1'] ) ) {
		update_post_meta( $post_id,
			'sth-textarea-1',
			$_POST['sth-textarea-1'] );
	}
	
	// Checks for input and saves if needed 
	if ( isset( $_POST['additional-info-image1'] ) ) {
		update_post_meta( $post_id,
			'additional-info-image1',
			$_POST['additional-info-image1'] );
	}
	
	// Checks for input and saves if needed 
	if ( isset( $_POST['additional-info-image1-link'] ) ) {
		update_post_meta( $post_id,
			'additional-info-image1-link',
			$_POST['additional-info-image1-link'] );
	}
	
	// Checks for input and saves if needed 
	if ( isset( $_POST['additional-info-image2'] ) ) {
		update_post_meta( $post_id,
			'additional-info-image2',
			$_POST['additional-info-image2'] );
	}
	
	// Checks for input and saves if needed 
	if ( isset( $_POST['additional-info-image2-link'] ) ) {
		update_post_meta( $post_id,
			'additional-info-image2-link',
			$_POST['additional-info-image2-link'] );
	}
	
	// Checks for input and saves if needed 
	if ( isset( $_POST['additional-info-image3'] ) ) {
		update_post_meta( $post_id,
			'additional-info-image3',
			$_POST['additional-info-image3'] );
	}
	
	// Checks for input and saves if needed 
	if ( isset( $_POST['additional-info-image3-link'] ) ) {
		update_post_meta( $post_id,
			'additional-info-image3-link',
			$_POST['additional-info-image3-link'] );
	}
	
	// Checks for input and saves if needed 
	if ( isset( $_POST['additional-info-image4'] ) ) {
		update_post_meta( $post_id,
			'additional-info-image4',
			$_POST['additional-info-image4'] );
	}
	
	// Checks for input and saves if needed 
	if ( isset( $_POST['additional-info-image4-link'] ) ) {
		update_post_meta( $post_id,
			'additional-info-image4-link',
			$_POST['additional-info-image4-link'] );
	}
	
	// Checks for input and saves if needed 
	if ( isset( $_POST['additional-info-image5'] ) ) {
		update_post_meta( $post_id,
			'additional-info-image5',
			$_POST['additional-info-image5'] );
	}
	
	// Checks for input and saves if needed 
	if ( isset( $_POST['additional-info-image5-link'] ) ) {
		update_post_meta( $post_id,
			'additional-info-image5-link',
			$_POST['additional-info-image5-link'] );
	}
	
	// Checks for input and saves if needed 
	if ( isset( $_POST['additional-info-image6'] ) ) {
		update_post_meta( $post_id,
			'additional-info-image6',
			$_POST['additional-info-image6'] );
	}
	
	// Checks for input and saves if needed 
	if ( isset( $_POST['additional-info-image6-link'] ) ) {
		update_post_meta( $post_id,
			'additional-info-image6-link',
			$_POST['additional-info-image6-link'] );
	}
	
	// Checks for input and saves if needed 
	if ( isset( $_POST['additional-info-image7'] ) ) {
		update_post_meta( $post_id,
			'additional-info-image7',
			$_POST['additional-info-image7'] );
	}
	
	// Checks for input and saves if needed 
	if ( isset( $_POST['additional-info-image7-link'] ) ) {
		update_post_meta( $post_id,
			'additional-info-image7-link',
			$_POST['additional-info-image7-link'] );
	}
	
	// Checks for input and saves if needed 
	if ( isset( $_POST['additional-info-image8'] ) ) {
		update_post_meta( $post_id,
			'additional-info-image8',
			$_POST['additional-info-image8'] );
	}
	
	// Checks for input and saves if needed 
	if ( isset( $_POST['additional-info-image8-link'] ) ) {
		update_post_meta( $post_id,
			'additional-info-image8-link',
			$_POST['additional-info-image8-link'] );
	}
	
	// Checks for input and sanitizes/saves if needed
	if ( isset( $_POST['feature-1-video'] ) ) {
		update_post_meta( $post_id,
			'feature-1-video',
			esc_url( $_POST['feature-1-video'] ) );
	}
	
	// Checks for input and saves
	if ( isset( $_POST['feature-1-checkbox'] ) ) {
		update_post_meta( $post_id, 'feature-1-checkbox', 'yes' );
	} else {
		update_post_meta( $post_id, 'feature-1-checkbox', '' );
	}
	
	// Checks for input and sanitizes/saves if needed
	if ( isset( $_POST['feature-2-video'] ) ) {
		update_post_meta( $post_id,
			'feature-2-video',
			esc_url( $_POST['feature-2-video'] ) );
	}
	
	// Checks for input and saves
	if ( isset( $_POST['feature-2-checkbox'] ) ) {
		update_post_meta( $post_id, 'feature-2-checkbox', 'yes' );
	} else {
		update_post_meta( $post_id, 'feature-2-checkbox', '' );
	}
	
	// Checks for input and sanitizes/saves if needed
	if ( isset( $_POST['feature-3-video'] ) ) {
		update_post_meta( $post_id,
			'feature-3-video',
			esc_url( $_POST['feature-3-video'] ) );
	}
	
	// Checks for input and saves
	if ( isset( $_POST['feature-3-checkbox'] ) ) {
		update_post_meta( $post_id, 'feature-3-checkbox', 'yes' );
	} else {
		update_post_meta( $post_id, 'feature-3-checkbox', '' );
	}
	
	// Checks for input and sanitizes/saves if needed
	if ( isset( $_POST['feature-4-video'] ) ) {
		update_post_meta( $post_id,
			'feature-4-video',
			esc_url( $_POST['feature-4-video'] ) );
	}
	
	// Checks for input and saves
	if ( isset( $_POST['feature-4-checkbox'] ) ) {
		update_post_meta( $post_id, 'feature-4-checkbox', 'yes' );
	} else {
		update_post_meta( $post_id, 'feature-4-checkbox', '' );
	}
	
	// Checks for input and sanitizes/saves if needed
	if ( isset( $_POST['feature-5-video'] ) ) {
		update_post_meta( $post_id,
			'feature-5-video',
			esc_url( $_POST['feature-5-video'] ) );
	}
	
	// Checks for input and saves
	if ( isset( $_POST['feature-5-checkbox'] ) ) {
		update_post_meta( $post_id, 'feature-5-checkbox', 'yes' );
	} else {
		update_post_meta( $post_id, 'feature-5-checkbox', '' );
	}
}

add_action( 'save_post', 'travel_meta_save' );