    <?php

    /*
    * Outfitters Meta
    */

    //ob_implicit_flush(true);
    include( plugin_dir_path( __FILE__ ) . '../inc/sanitize_outfitters_blog.php');

    function outfitters_blog_custom_meta() { global $post;

    if(!empty($post)) {
    $pageTemplate = get_post_meta ($post -> ID, '_wp_page_template', true);
    $types = array('flyfishing-news');
    foreach ($types as $type) {
      if($pageTemplate == 'page-templates/blog-template-outfitters.php') {
        add_meta_box ( 'outfitters_meta', __('Outfitters Blog Template Options', 'the-fly-shop' ), 'outfittersblog_meta_callback', $type, 'normal', 'high');
      }
    }
    }
    }
    add_action( 'add_meta_boxes', 'outfitters_blog_custom_meta' );

    /**
    * Adds Custom Field Image Meta Box
    */
    //ob_start();
    function outfittersblog_meta_callback( $post ) {
    wp_nonce_field( basename( __FILE__ ), 'outfittersblog_nonce' );
    $outfittersblog_stored_meta = get_post_meta( $post->ID );?>

    <p>
        <!-- Hero Video URL -->
        <strong><label for="hero-video-url" class="holiday-row-title"><?php _e( 'Add Video URL', 'the-fly-shop' );?></label></strong>
        <input style="width: 100%;" type="url" name="hero-video-url" id="hero-video-url" value="<?php if ( isset ( $outfittersblog_stored_meta['hero-video-url'] ) ) echo $outfittersblog_stored_meta['hero-video-url'][0]; ?>" />
    </p>
    <div>
    <?php
    // Retrieve the custom field value
    $custom_range_value = get_post_meta($post->ID, 'opacity-range', true);

    // Set a default value if the custom field is empty
    if (empty($custom_range_value)) {
        $custom_range_value = 0.1; // Set your desired default value here
    }

    // Output the HTML for the custom range input
    ?>
    <label for="custom_range_value"><b>Custom Range Value</b></label>
    <div style="background-color: #f5f5f5; padding: 1em;">
    <div>
        <span>The "Custom Range Value" below selects the opacity of the image or video overlay. Setting this value helps contrast logo, title, telephone against the background media.</span>
    </div>
    <label for="custom_range_value">Custom Range Value:</label>
    <input type="range" name="opacity-range" id="opacity-range" min="0.1" max="1" step="0.01" value="<?php echo esc_attr($custom_range_value); ?>">
    <span id="range_value_display"><?php echo esc_attr($custom_range_value); ?></span>
    </div>

    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const rangeInput = document.getElementById('opacity-range');
            const rangeValueDisplay = document.getElementById('range_value_display');

            rangeInput.addEventListener('input', function() {
                rangeValueDisplay.textContent = rangeInput.value;
            });
        });
    </script>


    <p>
    <label for="outfitters-select-sidebar" class="prfx-row-title"><h3><?php _e( 'Sidebar Select', 'The_Fly_Shop' )?></h3></label>
    <select name="outfitters-select-sidebar" id="outfitters-select-sidebar">
      <option value="" <?php if ( isset ( $outfittersblog_stored_meta['outfitters-select-sidebar'] ) ) selected( $outfittersblog_stored_meta['outfitters-select-sidebar'][0], '' ); ?>><?php _e( 'Default', 'The_Fly_Shop' )?></option>';
      <option value="esblodge" <?php if ( isset ( $outfittersblog_stored_meta['outfitters-select-sidebar'] ) ) selected( $outfittersblog_stored_meta['outfitters-select-sidebar'][0], 'esblodge' ); ?>><?php _e( 'ESB Lodge', 'The_Fly_Shop' )?></option>';
      <option value="lavacreeklodge" <?php if ( isset ( $outfittersblog_stored_meta['outfitters-select-sidebar'] ) ) selected( $outfittersblog_stored_meta['outfitters-select-sidebar'][0], 'lavacreeklodge' ); ?>><?php _e( 'Lava Creek Lodge', 'The_Fly_Shop' )?></option>';
      <option value="lower48" <?php if ( isset ( $outfittersblog_stored_meta['outfitters-select-sidebar'] ) ) selected( $outfittersblog_stored_meta['outfitters-select-sidebar'][0], 'lower48' ); ?>><?php _e( 'Lower 48', 'The_Fly_Shop' )?></option>';
      <option value="news" <?php if ( isset ( $outfittersblog_stored_meta['outfitters-select-sidebar'] ) ) selected( $outfittersblog_stored_meta['outfitters-select-sidebar'][0], 'news' ); ?>><?php _e( 'News', 'The_Fly_Shop' )?></option>';
      <option value="outfitter" <?php if ( isset ( $outfittersblog_stored_meta['outfitters-select-sidebar'] ) ) selected( $outfittersblog_stored_meta['outfitters-select-sidebar'][0], 'outfitter' ); ?>><?php _e( 'Outfitters', 'The_Fly_Shop' )?></option>';
      <option value="retail" <?php if ( isset ( $outfittersblog_stored_meta['outfitters-select-sidebar'] ) ) selected( $outfittersblog_stored_meta['outfitters-select-sidebar'][0], 'retail' ); ?>><?php _e( 'Retail', 'The_Fly_Shop' )?></option>';
      <option value="survey" <?php if ( isset ( $outfittersblog_stored_meta['outfitters-select-sidebar'] ) ) selected( $outfittersblog_stored_meta['outfitters-select-sidebar'][0], 'survey' ); ?>><?php _e( 'Survey', 'The_Fly_Shop' )?></option>';
      <option value="travel" <?php if ( isset ( $outfittersblog_stored_meta['outfitters-select-sidebar'] ) ) selected( $outfittersblog_stored_meta['outfitters-select-sidebar'][0], 'travel' ); ?>><?php _e( 'Travel', 'The_Fly_Shop' )?></option>';
    </select>
    </p>

    <div class="meta-field-container">

    <strong><label for="outfitters-blog-logo" class="sbm-row-title"><?php _e( 'Outfitters Blog Logo', 'the-fly-shop' );
            ?></label></strong><br>
    <input style="width:60%;" type="text" name="outfitters-blog-logo" id="outfitters-blog-logo" value="<?php if ( isset (
            $outfittersblog_stored_meta['outfitters-blog-logo'] ) ) echo $outfittersblog_stored_meta['outfitters-blog-logo'][0];?>" />
    <input type="button" id="outfitters-blog-logo-button" class="button" value="<?php _e( 'Choose or Upload an Image', 'the-fly-shop' );?>" />

    <!-- Preview container -->
    <div id="outfitters-blog-logo-preview" style="margin-top: 10px;">
        <?php if ( isset( $outfittersblog_stored_meta['outfitters-blog-logo'] ) && $outfittersblog_stored_meta['outfitters-blog-logo'][0] != '' ) : ?>
            <img src="<?php echo esc_url( $outfittersblog_stored_meta['outfitters-blog-logo'][0] ); ?>"
                 style="max-width: 250px; max-height: 250px; border: 1px solid #ddd; padding: 5px;"
                 alt="Preview" />
            <br><button type="button" id="outfitters-blog-logo-remove" class="button" style="margin-top: 5px;">Remove Image</button>
        <?php endif; ?>
    </div>

    </div>

    <?php  }
