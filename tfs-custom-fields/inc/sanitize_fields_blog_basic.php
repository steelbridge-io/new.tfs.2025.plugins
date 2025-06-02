<?php

/* ========== SAVE AND SANITIZE ========== */

// Saves the custom meta input
add_action('save_post', 'sbm_basic_template_save');
function sbm_basic_template_save($post_id)
{
  
  // Checks save status
  $is_autosave = wp_is_post_autosave($post_id);
  $is_revision = wp_is_post_revision($post_id);
  $is_valid_nonce = (isset($_POST['basicblog_nonce']) && wp_verify_nonce($_POST['basicblog_nonce'], basename(__FILE__))) ? 'true' : 'false';
  
  // Exits script depending on save status
  if ($is_autosave || $is_revision || !$is_valid_nonce) {
    return;
  }
  
	// Checks for input and saves if needed
  if (isset($_POST['hero-video-url'])) {
	  update_post_meta($post_id, 'hero-video-url', $_POST['hero-video-url']);
  }

	if (isset($_POST['blog-basic-opacity-range'])) {
			update_post_meta($post_id, 'blog-basic-opacity-range', sanitize_text_field($_POST['blog-basic-opacity-range']));
	}

	if( isset( $_POST[ 'btb-select-sidebar' ] ) ) {
	 update_post_meta( $post_id, 'btb-select-sidebar', $_POST[ 'btb-select-sidebar' ] );
	}

 if (isset($_POST['basic-blog-template-bg-color'])) {
    update_post_meta($post_id, 'basic-blog-template-bg-color', $_POST['basic-blog-template-bg-color']);
  }
  
  if (isset($_POST['basic-blog-text-color'])) {
    update_post_meta($post_id, 'basic-blog-text-color', $_POST['basic-blog-text-color']);
  }
  
  if (isset($_POST['basic-blog-fullpage-bg-color'])) {
    update_post_meta($post_id, 'basic-blog-fullpage-bg-color', $_POST['basic-blog-fullpage-bg-color']);
  }
  
  if (isset($_POST['basic-blog-fullpage-txt-color'])) {
    update_post_meta($post_id, 'basic-blog-fullpage-txt-color', $_POST['basic-blog-fullpage-txt-color']);
  }
  
  if (isset($_POST['basic-blog-sidebar-bg-color'])) {
    update_post_meta($post_id, 'basic-blog-sidebar-bg-color', $_POST['basic-blog-sidebar-bg-color']);
  }
  
}
