<?php
/* ========== SAVE AND SANITIZE ========== */

// Saves the custom meta input

add_action( 'save_post', 'sbm_travel_meta_save' );
function sbm_travel_meta_save( $post_id) {

// Checks save status
$is_autosave = wp_is_post_autosave( $post_id );
$is_revision = wp_is_post_revision( $post_id );
$is_valid_nonce = ( isset( $_POST[ 'tfs_nonce' ] ) && wp_verify_nonce( $_POST[ 'tfs_nonce' ], basename( __FILE__ ) ) ) ? 'true' : 'false';

// Exits script depending on save status
if ( $is_autosave || $is_revision || !$is_valid_nonce ) {
return;
}

	$allowed_html = array(
	  'a'			 => array(
		 'href' => array(
			'href' => array(),  // Changed from true to array()
			'title' => array(),
			'target' => array(),
			'class' => array(),
			'style' => array(),
			'rel' => array()
		 ),
		 'title' => array(),
		 'target' => array(),
		 'class' => array(),
		 'style' => array(),
		 'rel' => array()
		),
		'br'     => array(),
		'strong' => array(),
		'em'     => array(),
		'div'    => array(
		 'class' => array(),
		 'style' => array(),
		 'id' => array()
		),
		'p'      => array(
		 'class' => array(),
		 'style' => array()
		),
		'b'      => array(),
		'span'   => array(
		 'class' => array(),
		 'style' => array()
		),
		'h1'     => array(
		 'class' => array(),
		),
		'h2'     => array(
		 'class' => array(),
		),
		'h3'     => array(
		 'class' => array(),
		),
		'h4'     => array(
		 'class' => array(),
		),
		'h5'     => array(
		 'class' => array(),
		),
	);

// Checks for input and sanitizes/saves if needed
if( isset( $_POST[ 'selected_term' ] ) ) {
update_post_meta( $post_id, 'selected_term', sanitize_text_field( $_POST[ 'selected_term' ] ) );
}

// Checks for input and sanitizes/saves if needed
if( isset( $_POST[ 'travel-description' ] ) ) {
update_post_meta( $post_id, 'travel-description', sanitize_text_field( $_POST[ 'travel-description' ] ) );
}

// Checks for input and sanitizes/saves if needed
if( isset( $_POST[ 'masthead-bold-textarea' ] ) ) {
update_post_meta( $post_id, 'masthead-bold-textarea', sanitize_text_field( $_POST[ 'masthead-bold-textarea' ] ) );
}

// Checks for input and sanitizes/saves if needed
if( isset( $_POST[ 'feature-1-title' ] ) ) {
update_post_meta( $post_id, 'feature-1-title', sanitize_text_field( $_POST[ 'feature-1-title' ] ) );
}

// Checks for input and saves if needed
if( isset( $_POST[ 'feature-1-cost-textarea' ] ) ) {
update_post_meta( $post_id, 'feature-1-cost-textarea', wp_kses($_POST[ 'feature-1-cost-textarea' ], $allowed_html ));
}

// Checks for input and saves if needed
if( isset( $_POST[ 'feature-1-inclusions-textarea' ] ) ) {
update_post_meta( $post_id, 'feature-1-inclusions-textarea', wp_kses($_POST[ 'feature-1-inclusions-textarea' ], $allowed_html ));
}

// Checks for input and saves if needed
if( isset( $_POST[ 'feature-1-noninclusions-textarea' ] ) ) {
update_post_meta( $post_id, 'feature-1-noninclusions-textarea', wp_kses($_POST[ 'feature-1-noninclusions-textarea' ], $allowed_html ));
}

// Checks for input and saves if needed
if( isset( $_POST[ 'feature-1-travelins-textarea' ] ) ) {
 update_post_meta( $post_id, 'feature-1-travelins-textarea', wp_kses($_POST[ 'feature-1-travelins-textarea' ], $allowed_html ));
}

// Checks for input and saves
if( isset( $_POST[ 'img-vid-checkbox' ] ) ) {
update_post_meta( $post_id, 'img-vid-checkbox', 'yes' );
} else {
update_post_meta( $post_id, 'img-vid-checkbox', '' );
}

// Checks for input and displays fishing section
if( isset( $_POST[ 'basic-season-checkbox' ] ) ) {
update_post_meta( $post_id, 'basic-season-checkbox', 'yes' );
} else {
update_post_meta( $post_id, 'basic-season-checkbox', '' );
}

// Checks for input and saves if needed
if( isset( $_POST['feature-2-seasons-title'] ) ) {
update_post_meta( $post_id, 'feature-2-seasons-title', $_POST[ 'feature-2-seasons-title' ] );
}

// Checks for input and saves if needed
if( isset( $_POST['feature-2-seasons-content'] ) ) {
update_post_meta( $post_id, 'feature-2-seasons-content', wp_kses($_POST[ 'feature-2-seasons-content' ], $allowed_html ));
}

// Checks for input and saves if needed
if( isset( $_POST['feature-2-read-more-info'] ) ) {
update_post_meta( $post_id, 'feature-2-read-more-info', wp_kses($_POST[ 'feature-2-read-more-info' ], $allowed_html ));
}

// Checks for input and saves if needed
if( isset( $_POST['feature-2-seasons-readmore'] ) ) {
update_post_meta( $post_id, 'feature-2-seasons-readmore', wp_kses($_POST[ 'feature-2-seasons-readmore' ], $allowed_html ));
}

// Checks for input and displays fishing section
if( isset( $_POST[ 'high-low-checkbox' ] ) ) {
update_post_meta( $post_id, 'high-low-checkbox', 'yes' );
} else {
update_post_meta( $post_id, 'high-low-checkbox', '' );
}

// Checks for input and saves if needed
if( isset( $_POST[ 'feature-2-seasons-hi-lo-content' ] ) ) {
update_post_meta( $post_id, 'feature-2-seasons-hi-lo-content', wp_kses($_POST[ 'feature-2-seasons-hi-lo-content' ], $allowed_html ));
}

// Checks for input and saves if needed
if( isset( $_POST[ 'feature-2-seasons-hiseason' ] ) ) {
update_post_meta( $post_id, 'feature-2-seasons-hiseason', wp_kses($_POST[ 'feature-2-seasons-hiseason' ], $allowed_html ));
}

// Checks for input and saves if needed
if( isset( $_POST[ 'feature-2-seasons-lowseason' ] ) ) {
update_post_meta( $post_id, 'feature-2-seasons-lowseason', wp_kses($_POST[ 'feature-2-seasons-lowseason' ], $allowed_html ));
}

// Checks for input and saves if needed
if( isset( $_POST[ 'feature-3-get-to-title' ] ) ) {
update_post_meta( $post_id, 'feature-3-get-to-title', $_POST[ 'feature-3-get-to-title' ] );
}

// Checks for input and saves if needed
if( isset( $_POST[ 'feature-3-get-to-content' ] ) ) {
update_post_meta( $post_id, 'feature-3-get-to-content', wp_kses($_POST[ 'feature-3-get-to-content' ], $allowed_html ));
}

// Checks for input and saves if needed
if( isset( $_POST[ 'feature-3-read-more-info' ] ) ) {
  update_post_meta( $post_id, 'feature-3-read-more-info', wp_kses($_POST[ 'feature-3-read-more-info' ], $allowed_html ));
}

// Checks for input and saves if needed
if( isset( $_POST[ 'feature-3-get-to-readmore' ] ) ) {
update_post_meta( $post_id, 'feature-3-get-to-readmore', wp_kses($_POST[ 'feature-3-get-to-readmore' ], $allowed_html ));
}

// Checks for input and saves if needed
if( isset( $_POST[ 'feature-4-lodging-title' ] ) ) {
update_post_meta( $post_id, 'feature-4-lodging-title', wp_kses($_POST[ 'feature-4-lodging-title' ], $allowed_html ));
}

// Checks for input and saves if needed
if( isset( $_POST[ 'feature-4-lodging-content' ] ) ) {
update_post_meta( $post_id, 'feature-4-lodging-content', wp_kses($_POST[ 'feature-4-lodging-content' ], $allowed_html ));
}

// Checks for input and saves if needed
if( isset( $_POST[ 'feature-4-read-more-info' ] ) ) {
  update_post_meta( $post_id, 'feature-4-read-more-info', wp_kses($_POST[ 'feature-4-read-more-info' ], $allowed_html ));
}

// Checks for input and saves if needed
if( isset( $_POST[ 'feature-4-lodging-readmore' ] ) ) {
update_post_meta( $post_id, 'feature-4-lodging-readmore', wp_kses($_POST[ 'feature-4-lodging-readmore' ], $allowed_html ));
}

// Checks for input and saves if needed
if( isset( $_POST[ 'feature-5-angling-title' ] ) ) {
update_post_meta( $post_id, 'feature-5-angling-title', wp_kses($_POST[ 'feature-5-angling-title' ], $allowed_html ));
}

// Checks for input and saves if needed
if( isset( $_POST[ 'feature-5-angling-content' ] ) ) {
update_post_meta( $post_id, 'feature-5-angling-content', wp_kses($_POST[ 'feature-5-angling-content' ], $allowed_html ));
}

// Checks for input and saves if needed
if( isset( $_POST[ 'feature-5-read-more-info' ] ) ) {
  update_post_meta( $post_id, 'feature-5-read-more-info', wp_kses($_POST[ 'feature-5-read-more-info' ], $allowed_html ));
}

// Checks for input and saves if needed
if( isset( $_POST[ 'feature-5-angling-readmore' ] ) ) {
update_post_meta( $post_id, 'feature-5-angling-readmore', wp_kses($_POST[ 'feature-5-angling-readmore' ], $allowed_html ));
}

// Checks for input and saves if needed
if( isset( $_POST[ 'cta-strong-intro' ] ) ) {
update_post_meta( $post_id, 'cta-strong-intro', $_POST[ 'cta-strong-intro' ] );
}

// Checks for input and saves if needed
if( isset( $_POST[ 'cta-content' ] ) ) {
update_post_meta( $post_id, 'cta-content', $_POST[ 'cta-content' ] );
}

}
