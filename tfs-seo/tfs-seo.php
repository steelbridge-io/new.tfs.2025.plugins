<?php
/*
Plugin Name: The Fly Shop SEO
Plugin URI: http://steelbridgemedia.com
Description: An SEO plugin for page description and title.
Version: 1.2.7
Author: Chris Parsons
Author URI: http://steelbridgemedia.com

Copyright 2016 Chris Parsons (chris@steelbridgemedia.com)
*/
/*
 * If this file is called directly, abort.
*/
if ( ! defined( 'WPINC' ) ) {
	die;
}

include_once('tfs-google-analytics.php');
/**
 * Adds SEO meta box to the post editing screen
 */
function seotfs_custom_meta() {
		$seotypes = array('post', 'page', 'adventures', 'fishcamp_cpt', 'guide_service', 'schools_cpt', 'travel_cpt', 'espresso_venues', 'espresso_events', 'espresso_people', 'travel-blog', 'flyfishing-news', 'lower48', 'lower48blog', 'fish_report' );
    add_meta_box( 'seotfs_meta', __( 'TFS SEO', 'seotfs-textdomain' ), 'seotfs_meta_callback', $seotypes, 'normal', 'high');
}
add_action( 'add_meta_boxes', 'seotfs_custom_meta' );

/**
 * Outputs the content of the SEO meta box
 */
function seotfs_meta_callback( $post ) {
    wp_nonce_field( basename( __FILE__ ), 'seotfs_nonce' );
    $seotfs_stored_meta = get_post_meta( $post->ID );
    ?>

    <p>
        <label for="title-text" class="seotfs-row-title"><?php _e( 'Title Tag &#40; max 56 characters &#41;', 'seotfs-textdomain' )?></label><br>
        <input type="text" name="title-text" id="title-text" maxlength="56" size="50" style="width:100%;" value="<?php if ( isset ( $seotfs_stored_meta['title-text'] ) ) echo $seotfs_stored_meta['title-text'][0]; ?>" />
    </p>

    <p>
        <label for="seotfs-description" class="seotfs-row-title"><?php _e( 'SEO Description &#40; max 156 characters &#41;', 'seotfs-textdomain' )?></label><br>
        <textarea name="seotfs-description" id="seotfs-description" maxlength="156" size="50" style="width: 100%;"><?php if ( isset ( $seotfs_stored_meta['seotfs-description'] ) ) echo $seotfs_stored_meta['seotfs-description'][0]; ?></textarea>
    </p>
    
    <p>
        <label for="seotfs-meta-tags" class="seotfs-row-title"><?php _e( 'SEO Meta Tags', 'seotfs-textdomain' )?></label><br>
        <textarea name="seotfs-meta-tags" id="seotfs-meta-tags" size="50" style="width: 100%;"><?php if ( isset ( $seotfs_stored_meta['seotfs-meta-tags'] ) ) echo $seotfs_stored_meta['seotfs-meta-tags'][0]; ?></textarea>
    </p>
    
    <p>
        <label for="seo-no-index" class="seotfs-row-title"><input type="checkbox" name="seo-no-index" id="seo-no-index" value="yes" <?php if ( isset ( $seotfs_stored_meta['seo-no-index'] ) ) checked( $seotfs_stored_meta['seo-no-index'][0], 'yes' ); ?> />
        <?php _e( '<strong>Check box only if this page should not be found in search.</strong>', 'seotfs-textdomain' )?>
        </label>
    </p>

    <?php
}

/**
 * Saves the custom meta input
 */
function seotfs_meta_save( $post_id ) {

    // Checks save status
    $is_autosave = wp_is_post_autosave( $post_id );
    $is_revision = wp_is_post_revision( $post_id );
    $is_valid_nonce = ( isset( $_POST[ 'seotfs_nonce' ] ) && wp_verify_nonce( $_POST[ 'seotfs_nonce' ], basename( __FILE__ ) ) ) ? 'true' : 'false';

    // Exits script depending on save status
    if ( $is_autosave || $is_revision || !$is_valid_nonce ) {
        return;
    }

    // Checks for input and sanitizes/saves if needed
    if( isset( $_POST[ 'title-text' ] ) ) {
      update_post_meta( $post_id, 'title-text', sanitize_text_field( $_POST[ 'title-text' ] ) );
    }

    // Checks for input and saves if needed
    if( isset( $_POST[ 'seotfs-description' ] ) ) {
      update_post_meta( $post_id, 'seotfs-description', sanitize_text_field( $_POST[ 'seotfs-description' ] ) );
		}
	
		// Checks for input and saves if needed
    if( isset( $_POST[ 'seotfs-meta-tags' ] ) ) {
      update_post_meta( $post_id, 'seotfs-meta-tags', sanitize_text_field($_POST[ 'seotfs-meta-tags' ] ) );
		}
    
    // Checks for input and saves
		if( isset( $_POST[ 'seo-no-index' ] ) ) {
				update_post_meta( $post_id, 'seo-no-index', 'yes' );
		} else {
				update_post_meta( $post_id, 'seo-no-index', '' );
		}
}
add_action( 'save_post', 'seotfs_meta_save' );

/**
 * Adds the meta box stylesheet when appropriate
 */
function seotfs_admin_styles(){
    global $typenow;
    if( $typenow == 'post' ) {
        wp_enqueue_style( 'seotfs_meta_box_styles', plugin_dir_url( __FILE__ ) . 'seo-box.css' );
    }
}
add_action( 'admin_print_styles', 'seotfs_admin_styles' );
