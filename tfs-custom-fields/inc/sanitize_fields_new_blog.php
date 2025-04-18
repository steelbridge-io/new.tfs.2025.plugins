<?php


add_action( 'save_post', 'newblog_temp' );
function newblog_temp( $post_id ) {

// Checks save status
$is_autosave_new = wp_is_post_autosave( $post_id );
$is_revision_new = wp_is_post_revision( $post_id );
$is_valid_nonce_new = ( isset( $_POST[ 'new_blog_nonce' ] ) && wp_verify_nonce( $_POST[ 'new_blog_nonce' ], basename( __FILE__ ) ) ) ? 'true' : 'false';

// Exits script depending on save status
if ( $is_autosave_new || $is_revision_new || !$is_valid_nonce_new ) {
return;
}

	if( isset( $_POST[ 'hero-video-url' ] ) ) {
	update_post_meta( $post_id, 'hero-video-url', $_POST[ 'hero-video-url' ] );
	}
	
	if( isset( $_POST[ 'opacity-range-new-travel' ] ) ) {
		update_post_meta( $post_id, 'opacity-range-new-travel',  $_POST[ 'opacity-range-new-travel' ] );
	}
 
	if( isset( $_POST[ 'blog-template-logo' ] ) ) {
	update_post_meta( $post_id, 'blog-template-logo', sanitize_text_field( $_POST[ 'blog-template-logo' ] ) );
	}
	
	// Checks for input and sanitizes/saves for CTA content
	if( isset( $_POST[ 'blog-cta-title-new' ] ) ) {
	update_post_meta( $post_id, 'blog-cta-title-new', sanitize_text_field( $_POST[ 'blog-cta-title-new' ] ) );
	}
	
	if( isset( $_POST[ 'blog-cta-content-new' ] ) ) {
	update_post_meta( $post_id, 'blog-cta-content-new', wp_kses_post( $_POST[ 'blog-cta-content-new' ] ) );
	}
	
	if( isset( $_POST[ 'blog-description-new' ] ) ) {
	update_post_meta( $post_id, 'blog-description-new', sanitize_text_field( $_POST[ 'blog-description-new' ] ) );
	}
	
	if( isset( $_POST[ 'blog-description-new' ] ) ) {
	update_post_meta( $post_id, 'blog-description-new', sanitize_text_field( $_POST[ 'blog-description-new' ] ) );
	}
	
	if( isset( $_POST[ 'select-sidebar' ] ) ) {
	update_post_meta( $post_id, 'select-sidebar', $_POST[ 'select-sidebar' ] );
	}
}
