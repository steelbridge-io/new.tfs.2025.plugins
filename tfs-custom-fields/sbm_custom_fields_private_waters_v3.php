    <?php
    /**
    * Description: Private Waters Custom Meta Fields
    *
    * @package		tfsTravel
    * @since		1.2.3
    * @author		Chris Parsons
    * @link		http://steelbridge.io
    * @license		GNU General Public License
    */

    include( plugin_dir_path( __FILE__ ) . 'inc/sanitize_fields_private_waters_v3.php');

    // Adds a meta box to the post editing screen on the template named travel-template
    function tfs_custom_private_waters_v3_meta() {
    global $post;
    if(!empty($post)){
        $pageTemplate = get_post_meta($post->ID, '_wp_page_template', true);
        if($pageTemplate == 'page-templates/private-waters-template-v3.php') {
            $types = array('adventures');
            foreach($types as $type) {
                add_meta_box( 'sbm_private_waters_meta', __( 'Private Waters Content Fields', 'tfs-travel-textdomain' ), 'tfs_private_waters_meta_callback',
                    $type, 'normal', 'high' );
            }
        }
    }
    }
    add_action( 'add_meta_boxes', 'tfs_custom_private_waters_v3_meta' );

    // Outputs the content of the meta box
    function tfs_private_waters_meta_callback( $post ) {
    wp_nonce_field( basename( __FILE__ ), 'private_waters_v3_nonce' );
    $sbm_stored_travel_meta = get_post_meta( $post->ID );
    // Retrieve the selected term ID, if it exists
    $selected_term = get_post_meta($post->ID, 'selected_term', true);

    // Get the terms from your custom taxonomy
    $terms = get_terms(array(
    'taxonomy'    => 'report-category', // Replace with your custom taxonomy name
    'hide_empty'  => false,
      ));

    $someTemplate = get_post_meta($post->ID, '_wp_page_template', true);
    if( $someTemplate !== 'page-templates/schools-template-v3.php' ) {
        if ($terms) {
            echo '<div class="fish-report-terms">';
            echo '<h3>Show Fishing Reports</h3>';
            echo '<p>Select a fishing report category below. The category selected will return two posts in the section below the sign-up input on the front end.</p>';
            echo '<label for="selected_term"><strong>Select a fishing report category:</strong>&nbsp;</label>';
            echo '<select name="selected_term" id="selected_term">';
            echo '<option value="">Select a term</option>';
            foreach ($terms as $term) {
                echo '<option value="' . esc_attr($term->term_id) . '" ' . selected($selected_term, $term->term_id, false) . '>' . esc_html($term->name) . '</option>';
            }
            echo '</select>';
            echo '</div>';
        }
    }
    ?>

    <!-- ====== Private Waters Details ====== -->

    <!-- TRAVEL DESCRIPTION -->
    <h3><?php echo 'Private Waters Description' ?></h3>

    <!-- TFS Logo -->
    <div class="meta-field-container">

    <strong><label for="travel-logo" class="sbm-row-title"><?php _e( 'Destination Private Waters Logo', 'the-fly-shop' );?></label></strong><br>
    <input style="width:60%;" type="text" name="dest-travel-logo" id="dest-travel-logo" value="<?php if ( isset (
          $sbm_stored_travel_meta['dest-travel-logo'] ) ) echo $sbm_stored_travel_meta['dest-travel-logo'][0];?>" />
    <input type="button" id="dest-travel-logo-button" class="button" value="<?php _e( 'Choose or Upload an Image', 'the-fly-shop' );?>" />

     <!-- Preview container -->
    <div id="dest-travel-logo-preview" style="margin-top: 10px;">
        <?php if ( isset( $sbm_stored_travel_meta['dest-travel-logo'] ) && $sbm_stored_travel_meta['dest-travel-logo'][0] != '' ) : ?>
            <img src="<?php echo esc_url( $sbm_stored_travel_meta['dest-travel-logo'][0] ); ?>"
                 style="max-width: 150px; max-height: 150px; border: 1px solid #ddd; padding: 5px;"
                 alt="Preview" />
            <br><button type="button" id="dest-travel-logo-remove" class="button" style="margin-top: 5px;">Remove Image</button>
        <?php endif; ?>
    </div>

    </div>

    <!-- Private Waters Hero Video URL -->
    <div class="meta-field-container">
     <strong><label for="travel-hero-video" class="sbm-row-title"><?php _e( 'Hero Video URL', 'tfs-travel-textdomain' ); ?></label></strong>
     <input
      type="url"
      name="travel-hero-video"
      id="travel-hero-video"
      style="width: 100%;"
      placeholder="https://storage.googleapis.com/path/to/video.mp4"
      value="<?php
      if ( isset( $sbm_stored_travel_meta['travel-hero-video'] ) ) {
       echo esc_attr( $sbm_stored_travel_meta['travel-hero-video'][0] );
      }
      ?>"
     />
     <p class="description"><?php _e( 'Add a direct video URL from Google Cloud or other cloud storage. Video will override featured image. Uses featured image as poster.', 'tfs-travel-textdomain' ); ?></p>

     <!-- Video Preview -->
     <?php
     $hero_video_current = isset( $sbm_stored_travel_meta['travel-hero-video'] )
      ? trim( (string) $sbm_stored_travel_meta['travel-hero-video'][0] )
      : '';
     $hero_poster = has_post_thumbnail()
      ? get_the_post_thumbnail_url(get_the_ID(), 'large')
      : '';
     ?>
     <div id="travel-hero-video-preview" style="margin-top:10px; <?php echo $hero_video_current ? '' : 'display:none;'; ?>">
      <video
       id="travel-hero-video-element"
       controls
       playsinline
       preload="metadata"
       style="max-width:24%;height:auto;"
       <?php if ( $hero_poster ) : ?>
        poster="<?php echo esc_url( $hero_poster ); ?>"
       <?php endif; ?>
      >
       <?php if ( $hero_video_current ) : ?>
        <source src="<?php echo esc_url( $hero_video_current ); ?>" type="video/mp4" />
       <?php endif; ?>
       <?php _e( 'Your browser does not support the video tag.', 'tfs-travel-textdomain' ); ?>
      </video>
     </div>
     <script>
         document.addEventListener('DOMContentLoaded', function () {
             var input = document.getElementById('travel-hero-video');
             var previewWrap = document.getElementById('travel-hero-video-preview');
             var video = document.getElementById('travel-hero-video-element');
             if (!input || !previewWrap || !video) return;

             input.addEventListener('input', function () {
                 var url = (this.value || '').trim();
                 if (url) {
                     var source = video.querySelector('source');
                     if (!source) {
                         source = document.createElement('source');
                         source.type = 'video/mp4';
                         video.appendChild(source);
                     }
                     source.src = url;
                     video.load();
                     previewWrap.style.display = 'block';
                 } else {
                     previewWrap.style.display = 'none';
                 }
             });
         });
     </script>
    </div>
    <!-- Seasons Tab -->
    <hr style="margin-top: 1.618em; border-top: 3px double #8c8b8b;">
    <?php include (plugin_dir_path( __FILE__ ) . 'inc/travel-meta/private-waters-meta/seasons-tab.php'); ?>

    <!-- Getting to Tab -->
    <hr style="margin-top: 1.618em; border-top: 3px double #8c8b8b;">
    <?php include (plugin_dir_path( __FILE__ ) . 'inc/travel-meta/private-waters-meta/getting-there-tab.php'); ?>

    <!-- Lodging Tab -->
    <hr style="margin-top: 1.618em; border-top: 3px double #8c8b8b;">
    <?php include (plugin_dir_path( __FILE__ ) . 'inc/travel-meta/private-waters-meta/lodging-tab.php'); ?>

    <!-- Angling Tab -->
    <hr style="margin-top: 1.618em; border-top: 3px double #8c8b8b;">
    <?php include (plugin_dir_path( __FILE__ ) . 'inc/travel-meta/private-waters-meta/angling-tab.php'); ?>

    <!-- Species Tab -->
    <hr style="margin-top: 1.618em; border-top: 3px double #8c8b8b;">
    <?php include (plugin_dir_path( __FILE__ ) . 'inc/travel-meta/private-waters-meta/species-tab.php'); ?>

    <!-- Travel Costs Tab -->
    <hr style="margin-top: 1.618em; border-top: 3px double #8c8b8b;">
    <?php include (plugin_dir_path( __FILE__ ) . 'inc/travel-meta/private-waters-meta/costs-tab.php'); ?>

    <!-- ====== WHY WE SUPPORT THIS DESTINATION ====== -->
    <hr style="margin-top: 1.618em; border-top: 3px double #8c8b8b;">
    <div class="set-the-hook-container">
    <h3><?php echo 'Why We Support This Destination' ?></h3>
    <div>
    <div class="travel-row-content">
        <label for="whywe-title-2" class="sbm-row-title"><?php _e( '<strong>Title</strong>', 'the-fly-shop' )?></label>
        <input style="width: 100%;" type="text" name="whywe-title-2" id="whywe-title-2" value="<?php if ( isset (
                $sbm_stored_travel_meta['whywe-title-2'] ) ) echo $sbm_stored_travel_meta['whywe-title-2'][0];
        ?>" />
        <label for="whywe-textarea-2"
               class="whywe-textarea-2"><?php _e( '<strong>Text Area</strong>',
                    'the-fly-shop' ) ?></label>

        <textarea style="width:100%;" rows="10"
                  name="whywe-textarea-2"
                  id="whywe-textarea-2"><?php if ( isset ( $sbm_stored_travel_meta['whywe-textarea-2'] ) ) {
                echo $sbm_stored_travel_meta['whywe-textarea-2'][0];
            } ?></textarea>
    </div>

    </div>
    </div>

    <!-- ====== CALL TO ACTION ROW ====== -->
    <hr style="margin-top: 1.618em; border-top: 3px double #8c8b8b;">
    <h3><?php echo 'Get Started Section' ?></h3>

    <p><!-- Get Started Section -->
        <strong><label for="cta-strong-intro" class="sbm-row-title"><?php _e('Get Started CTA','tfs-travel-textdomain')?></label></strong>
        <input style="width: 100%;" type="text" placeholder="Place CTA content here." name="cta-strong-intro" id="cta-strong-intro" value="<?php if (isset($sbm_stored_travel_meta['cta-strong-intro'])) echo $sbm_stored_travel_meta['cta-strong-intro'][0]; ?>" />
    </p>

    <p><!-- Get Started Section Content -->
        <strong><label for="cta-content" class="sbm-row-title"><?php _e( 'Get Started Content', 'tfs-travel-textdomain' )?></label></strong>
        <textarea style="width: 100%;" rows="4" name="cta-content" id="cta-content"><?php if ( isset ( $sbm_stored_travel_meta['cta-content'] ) ) echo $sbm_stored_travel_meta['cta-content'][0]; ?></textarea>
    </p>

    <!-- /end of custom fields -->

    <!-- ====== ADDITIONAL PHOTOS SECTION ====== -->
    <hr style="margin-top: 1.618em; border-top: 3px double #8c8b8b;">
    <h3><?php echo 'Additional Images' ?></h3>

    <p> <!-- Additional Image #1 -->

        <label for="additional-travel-image1"
               class="travel-row-title"><?php _e( '<strong>Additional Image &#35;1</strong>',
                'the-fly-shop' ); ?></label>

        <input type="text" name="additional-travel-image1"
               id="additional-travel-image1"
               value="<?php if ( isset ( $sbm_stored_travel_meta['additional-travel-image1'] ) ) {
                   echo $sbm_stored_travel_meta['additional-travel-image1'][0];
               } ?>"/>
        <input type="button" id="additional-travel-image1-button" class="button"
               value="<?php _e( 'Choose or Upload an Image',
                   'the-fly-shop' ); ?>"/>

    </p>

    <p> <!-- Additional Image #2 -->

        <label for="additional-travel-image2"
               class="travel-row-title"><?php _e( '<strong>Additional Image &#35;2</strong>',
                'the-fly-shop' ); ?></label>

        <input type="text" name="additional-travel-image2"
               id="additional-travel-image2"
               value="<?php if ( isset ( $sbm_stored_travel_meta['additional-travel-image2'] ) ) {
                   echo $sbm_stored_travel_meta['additional-travel-image2'][0];
               } ?>"/>
        <input type="button" id="additional-travel-image2-button" class="button"
               value="<?php _e( 'Choose or Upload an Image',
                   'the-fly-shop' ); ?>"/>

    </p>

    <p> <!-- Additional Image #3 -->

        <label for="additional-travel-image3"
               class="travel-row-title"><?php _e( '<strong>Additional Image &#35;3</strong>',
                'the-fly-shop' ); ?></label>

        <input type="text" name="additional-travel-image3"
               id="additional-travel-image3"
               value="<?php if ( isset ( $sbm_stored_travel_meta['additional-travel-image3'] ) ) {
                   echo $sbm_stored_travel_meta['additional-travel-image3'][0];
               } ?>"/>
        <input type="button" id="additional-travel-image3-button" class="button"
               value="<?php _e( 'Choose or Upload an Image',
                   'the-fly-shop' ); ?>"/>

    </p>

    <p> <!-- Additional Image #4 -->

        <label for="additional-travel-image4"
               class="travel-row-title"><?php _e( '<strong>Additional Image &#35;4</strong>',
                'the-fly-shop' ); ?></label>

        <input type="text" name="additional-travel-image4"
               id="additional-travel-image4"
               value="<?php if ( isset ( $sbm_stored_travel_meta['additional-travel-image4'] ) ) {
                   echo $sbm_stored_travel_meta['additional-travel-image4'][0];
               } ?>"/>
        <input type="button" id="additional-travel-image4-button" class="button"
               value="<?php _e( 'Choose or Upload an Image',
                   'the-fly-shop' ); ?>"/>

    </p>

    <p> <!-- Additional Image #5 -->

        <label for="additional-travel-image5"
               class="travel-row-title"><?php _e( '<strong>Additional Image &#35;5</strong>',
                'the-fly-shop' ); ?></label>

        <input type="text" name="additional-travel-image5"
               id="additional-travel-image5"
               value="<?php if ( isset ( $sbm_stored_travel_meta['additional-travel-image5'] ) ) {
                   echo $sbm_stored_travel_meta['additional-travel-image5'][0];
               } ?>"/>
        <input type="button" id="additional-travel-image5-button" class="button"
               value="<?php _e( 'Choose or Upload an Image',
                   'the-fly-shop' ); ?>"/>

    </p>

    <p> <!-- Additional Image #6 -->

        <label for="additional-travel-image6"
               class="travel-row-title"><?php _e( '<strong>Additional Image &#35;6</strong>',
                'the-fly-shop' ); ?></label>

        <input type="text" name="additional-travel-image6"
               id="additional-travel-image6"
               value="<?php if ( isset ( $sbm_stored_travel_meta['additional-travel-image6'] ) ) {
                   echo $sbm_stored_travel_meta['additional-travel-image6'][0];
               } ?>"/>
        <input type="button" id="additional-travel-image6-button" class="button"
               value="<?php _e( 'Choose or Upload an Image',
                   'the-fly-shop' ); ?>"/>

    </p>

    <p> <!-- Additional Image #7 -->

        <label for="additional-travel-image7"
               class="travel-row-title"><?php _e( '<strong>Additional Image &#35;7</strong>',
                'the-fly-shop' ); ?></label>

        <input type="text" name="additional-travel-image7"
               id="additional-travel-image7"
               value="<?php if ( isset ( $sbm_stored_travel_meta['additional-travel-image7'] ) ) {
                   echo $sbm_stored_travel_meta['additional-travel-image7'][0];
               } ?>"/>
        <input type="button" id="additional-travel-image7-button" class="button"
               value="<?php _e( 'Choose or Upload an Image',
                   'the-fly-shop' ); ?>"/>

    </p>

    <p> <!-- Additional Image #8 -->

        <label for="additional-travel-image8"
               class="travel-row-title"><?php _e( '<strong>Additional Image &#35;8</strong>',
                'the-fly-shop' ); ?></label>

        <input type="text" name="additional-travel-image8"
               id="additional-travel-image8"
               value="<?php if ( isset ( $sbm_stored_travel_meta['additional-travel-image8'] ) ) {
                   echo $sbm_stored_travel_meta['additional-travel-image8'][0];
               } ?>"/>
        <input type="button" id="additional-travel-image8-button" class="button"
               value="<?php _e( 'Choose or Upload an Image',
                   'the-fly-shop' ); ?>"/>

    </p>

    <?php } ?>
