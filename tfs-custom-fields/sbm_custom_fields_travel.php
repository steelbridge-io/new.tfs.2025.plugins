    <?php
    /**
    * Description: Travel Custom Meta Fields
    *
    * @package		tfsTravel
    * @since		1.2.3
    * @author		Chris Parsons
    * @link		http://steelbridge.io
    * @license		GNU General Public License
    */

    include( plugin_dir_path( __FILE__ ) . 'inc/sanitize_fields_travel.php');

    // Adds a meta box to the post editing screen on the template named travel-template
    function tfs_custom_travel_meta() {
    global $post;
    if(!empty($post)){
        $pageTemplate = get_post_meta($post->ID, '_wp_page_template', true);
        if($pageTemplate == 'page-templates/destination-template.php' || $pageTemplate == 'page-templates/regional-waters-template.php' || $pageTemplate == 'page-templates/destination-v2-template.php' || $pageTemplate == 'page-templates/destination-v3-template.php') {
            $types = array('post', 'page', 'travel_cpt', 'lower48', 'travel-blog', 'esb_lodge', 'guide_service');
            foreach($types as $type) {
                add_meta_box( 'sbm_meta', __( 'Travel Content Fields', 'tfs-travel-textdomain' ), 'tfs_travel_meta_callback',
                    $type, 'normal', 'high' );
            }
        }
    }
    }
    add_action( 'add_meta_boxes', 'tfs_custom_travel_meta' );

    // Outputs the content of the meta box
    function tfs_travel_meta_callback( $post ) {
    wp_nonce_field( basename( __FILE__ ), 'tfs_nonce' );
    $sbm_stored_travel_meta = get_post_meta( $post->ID );
    // Retrieve the selected term ID, if it exists
    $selected_term = get_post_meta($post->ID, 'selected_term', true);

    // Get the terms from your custom taxonomy
    $terms = get_terms(array(
    'taxonomy'    => 'report-category', // Replace with your custom taxonomy name
    'hide_empty'  => false,
      ));

    if ( $terms ) {
      echo '<div class="fish-report-terms">';
      echo '<h3>Show Fishing Reports</h3>';
      echo '<p>Select a fishing report category below. The category selected will return two posts in the section below the sign-up input on the front end.</p>';
      echo '<label for="selected_term"><strong>Select a fishing report category:</strong>&nbsp;</label>';
      echo '<select name="selected_term" id="selected_term">';
      echo '<option value="">Select a term</option>';
      foreach ( $terms as $term ) {
        echo '<option value="' . esc_attr( $term->term_id ) . '" ' . selected( $selected_term, $term->term_id, false ) . '>' . esc_html( $term->name ) . '</option>';
      }
      echo '</select>';
      echo '</div>';
    }
    ?>

    <!-- ====== Travel Details ====== -->

    <!-- TRAVEL DESCRIPTION -->
    <h3><?php echo 'Travel Description' ?></h3>

    <!-- TFS Logo -->
    <div class="meta-field-container">

    <strong><label for="travel-logo" class="sbm-row-title"><?php _e( 'Destination Travel Logo', 'the-fly-shop' );?></label></strong><br>
    <input style="width:60%;" type="text" name="dest-travel-logo" id="dest-travel-logo" value="<?php if ( isset (
          $sbm_stored_travel_meta['dest-travel-logo'] ) ) echo $sbm_stored_travel_meta['dest-travel-logo'][0];?>" />
    <input type="button" id="dest-travel-logo-button" class="button" value="<?php _e( 'Choose or Upload an Image', 'the-fly-shop' );?>" />

     <!-- Preview container -->
    <div id="dest-travel-logo-preview" style="margin-top: 10px;">
        <?php if ( isset( $sbm_stored_travel_meta['dest-travel-logo'] ) && $sbm_stored_travel_meta['dest-travel-logo'][0] != '' ) : ?>
            <img src="<?php echo esc_url( $sbm_stored_travel_meta['dest-travel-logo'][0] ); ?>"
                 style="max-width: 250px; max-height: 250px; border: 1px solid #ddd; padding: 5px;"
                 alt="Preview" />
            <br><button type="button" id="dest-travel-logo-remove" class="button" style="margin-top: 5px;">Remove Image</button>
        <?php endif; ?>
    </div>

    </div>

    <!-- Travel Description / Appears below site title -->
    <div class="meta-field-container">
        <strong><label for="travel-description" class="sbm-row-title"><?php _e( 'Travel Description', 'sbm-textdomain' )?></label></strong>
        <input style="width: 100%;" type="text" name="travel-description" id="travel-description" placeholder="Appears below title" value="<?php if ( isset ( $sbm_stored_travel_meta['travel-description'] ) ) echo $sbm_stored_travel_meta['travel-description'][0]; ?>" />
    </div>

    <!-- MASTHEAD SECTION -->
    <hr style="margin-top: 1.618em; border-top: 3px double #8c8b8b;">
    <h3><?php echo 'Travel Masthead' ?></h3>

    <div class="meta-field-container"><!-- Masthead Bold Paragraph -->
        <strong><label for="masthead-bold-textarea" class="sbm-row-title"><?php _e( 'Masthead Bold Section', 'tfs-travel-textdomain' )?></label></strong>
        <textarea style="width: 100%;" rows="4" name="masthead-bold-textarea" id="masthead-bold-textarea"><?php if ( isset ( $sbm_stored_travel_meta['masthead-bold-textarea'] ) ) echo $sbm_stored_travel_meta['masthead-bold-textarea'][0]; ?></textarea>
    </div>

    <!-- TRAVEL DETAILS-->
    <hr style="margin-top: 1.618em; border-top: 3px double #8c8b8b;">
    <h3><?php echo 'Travel Costs' ?></h3>

    <!-- Travel Costs Image -->
    <div class="meta-field-container">

        <strong><label for="travel-costs-image" class="sbm-row-title"><?php _e( 'Travel Costs Image', 'the-fly-shop' );?></label></strong><br>
        <input style="width:75%;" type="text" name="travel-costs-image" id="travel-costs-image" value="<?php if ( isset ( $sbm_stored_travel_meta['travel-costs-image'] ) ) echo $sbm_stored_travel_meta['travel-costs-image'][0];?>" />
        <input type="button" id="travel-costs-image-button" class="button" value="<?php _e( 'Choose or Upload an Image', 'the-fly-shop' );?>" />

        <!-- Preview container -->
        <div id="travel-costs-image-preview" style="margin-top: 10px;">
            <?php if ( isset( $sbm_stored_travel_meta['travel-costs-image'] ) && $sbm_stored_travel_meta['travel-costs-image'][0] != '' ) : ?>
                <img src="<?php echo esc_url( $sbm_stored_travel_meta['travel-costs-image'][0] ); ?>"
                     style="max-width: 250px; max-height: 250px; border: 1px solid #ddd; padding: 5px;"
                     alt="Preview" />
                <br><button type="button" id="travel-costs-image-remove" class="button" style="margin-top: 5px;">Remove Image</button>
            <?php endif; ?>
        </div>
    </div>

    <p><!-- Costs Title -->
        <strong><label for="feature-1-title" class="sbm-row-title"><?php _e( 'Title', 'tfs-travel-textdomain' )?></label></strong>

        <input style="width: 100%;" type="text" name="feature-1-title" id="feature-1-title" value="<?php if ( isset ( $sbm_stored_travel_meta['feature-1-title'] ) ) echo $sbm_stored_travel_meta['feature-1-title'][0]; ?>" />
    </p>

    <p><!-- Costs Text Area/Cost-->
        <strong><label for="feature-1-cost-textarea" class="sbm-row-title"><?php _e( 'Cost', 'tfs-travel-textdomain' )?></label></strong>

        <textarea style="width: 100%;" rows="4" name="feature-1-cost-textarea" id="feature-1-cost-textarea"><?php if ( isset ( $sbm_stored_travel_meta['feature-1-cost-textarea'] ) ) echo $sbm_stored_travel_meta['feature-1-cost-textarea'][0]; ?></textarea>
    </p>

    <p><!-- Cost Inclusions Text Area -->
        <strong><label for="feature-1-inclusions-textarea" class="sbm-row-title"><?php _e( 'Inclusions', 'tfs-travel-textdomain' )?></label></strong>

        <textarea style="width: 100%;" rows="4" name="feature-1-inclusions-textarea" id="feature-1-inclusions-textarea"><?php if ( isset ( $sbm_stored_travel_meta['feature-1-inclusions-textarea'] ) ) echo $sbm_stored_travel_meta['feature-1-inclusions-textarea'][0]; ?></textarea>
    </p>

    <p><!-- Cost Non-inclusions Text Area -->
        <strong><label for="feature-1-noninclusions-textarea" class="sbm-row-title"><?php _e( 'Non-inclusions', 'tfs-travel-textdomain' )?></label></strong>

        <textarea style="width: 100%;" rows="4" name="feature-1-noninclusions-textarea" id="feature-1-noninclusions-textarea"><?php if ( isset ( $sbm_stored_travel_meta['feature-1-noninclusions-textarea'] ) ) echo $sbm_stored_travel_meta['feature-1-noninclusions-textarea'][0]; ?></textarea>
    </p>

    <p><!-- Travel Insurance Text Area -->
        <strong><label for="feature-1-travelins-textarea" class="sbm-row-title"><?php _e( 'Travel Insurance', 'tfs-travel-textdomain' )?></label></strong>

        <textarea style="width: 100%;" rows="4" name="feature-1-travelins-textarea" id="feature-1-travelins-textarea"><?php if ( isset ( $sbm_stored_travel_meta['feature-1-travelins-textarea'] ) ) echo $sbm_stored_travel_meta['feature-1-travelins-textarea'][0]; ?></textarea>
    </p>

    <!-- ====== FEATURE #2 SEASONS ====== -->
    <hr style="margin-top: 1.618em; border-top: 3px double #8c8b8b;">
    <h3><?php echo 'Travel Seasons' ?></h3>

    <p><!-- Feature #2 Seasons -->
        <strong><label for="feature-2-seasons-title" class="sbm-row-title"><?php _e( 'Title', 'tfs-travel-textdomain' )?></label></strong>
        <input style="width: 100%;" type="text" name="feature-2-seasons-title" id="feature-2-seasons-title" value="<?php if ( isset ( $sbm_stored_travel_meta['feature-2-seasons-title'] ) ) echo $sbm_stored_travel_meta['feature-2-seasons-title'][0]; ?>" />
    </p>
    <!-- Feature #2 Image -->
    <div class="meta-field-container">

        <strong><label for="travel-seasons-image" class="sbm-row-title"><?php _e( 'Travel Costs Image', 'the-fly-shop' );?></label></strong><br>
        <input style="width:75%;" type="text" name="travel-seasons-image" id="travel-seasons-image" value="<?php if ( isset ( $sbm_stored_travel_meta['travel-seasons-image'] ) ) echo $sbm_stored_travel_meta['travel-seasons-image'][0];?>" />
        <input type="button" id="travel-seasons-image-button" class="button" value="<?php _e( 'Choose or Upload an Image', 'the-fly-shop' );?>" />

        <!-- Preview container -->
        <div id="travel-seasons-image-preview" style="margin-top: 10px;">
            <?php if ( isset( $sbm_stored_travel_meta['travel-seasons-image'] ) && $sbm_stored_travel_meta['travel-seasons-image'][0] != '' ) : ?>
                <img src="<?php echo esc_url( $sbm_stored_travel_meta['travel-seasons-image'][0] ); ?>"
                     style="max-width: 250px; max-height: 250px; border: 1px solid #ddd; padding: 5px;"
                     alt="Preview" />
                <br><button type="button" id="travel-seasons-image-remove" class="button" style="margin-top: 5px;">Remove Image</button>
            <?php endif; ?>
        </div>
    </div>


    <!-- TABED SEASONS SECTION
    -------------------------------------------------------------->
    <div class="panel with-nav-tabs panel-default">
        <div class="panel-heading">
            <!-- Nav tabs -->
            <ul class="nav nav-tabs" role="tablist">
                <li role="presentation" class="active"><a href="#basicseason" aria-controls="basicseason" role="tab" data-toggle="tab">Basic Season</a></li>
                <li role="presentation"><a href="#hilowseason" aria-controls="hilowseason" role="tab" data-toggle="tab">High / Low Season</a></li>
            </ul>

            <!-- Tab panes -->
            <div class="panel-body boof">
                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane fade in active" id="basicseason">

                        <p><!-- Seasons content/text area -->
                            <strong><label for="feature-2-seasons-content" class="sbm-row-title"><?php _e( 'Seasons Content', 'tfs-travel-textdomain' )?></label></strong>

                            <textarea style="width: 100%;" rows="4" name="feature-2-seasons-content" id="feature-2-seasons-content"><?php if (isset( $sbm_stored_travel_meta['feature-2-seasons-content'] ) ) echo $sbm_stored_travel_meta['feature-2-seasons-content'][0]; ?></textarea>
                        </p>

                        <p><!-- Seasons Read More -->
                          <strong><label for="feature-2-read-more-info" class="sbm-row-title"><?php _e( 'Read More Info', 'sbm-textdomain' )?></label></strong>
                          <input style="width: 100%;" type="text" name="feature-2-read-more-info" id="feature-2-read-more-info" placeholder="Add Read More Info" value="<?php if ( isset ( $sbm_stored_travel_meta['feature-2-read-more-info'] ) ) echo $sbm_stored_travel_meta['feature-2-read-more-info'][0]; ?>" />

                          <strong><label for="feature-2-seasons-readmore" class="sbm-row-title"><?php _e( 'Read more', 'tfs-travel-textdomain' )?></label></strong>
                          <textarea style="width: 100%;" rows="4" name="feature-2-seasons-readmore" id="feature-2-seasons-readmore"><?php if ( isset ( $sbm_stored_travel_meta['feature-2-seasons-readmore'] ) ) echo $sbm_stored_travel_meta['feature-2-seasons-readmore'][0]; ?></textarea>
                        </p>
                    </div> <!-- /tabpanel -->

                    <div role="tabpanel" class="tab-pane fade" id="hilowseason">

                        <!-- ==== Add Hi/Lo Section ==== -->
                        <p>

                            <span class="travel-row-title"><?php _e( '<strong>Display Hi/Lo Fishing Seasons</strong>', 'tfs-travel-textdomain' )?></span>
                        <div class="travel-row-content">
                            <label for="high-low-checkbox">
                                <input type="checkbox" name="high-low-checkbox" id="high-low-checkbox" value="yes" <?php if ( isset ( $sbm_stored_travel_meta['high-low-checkbox'] ) ) checked( $sbm_stored_travel_meta['high-low-checkbox'][0], 'yes' ); ?> />
                                <?php _e( 'Check box to activate Hi/Lo seasons.', 'tfs-travel-textdomain' )?>
                            </label>
                        </div>

                        </p>

                        <p><!-- Seasons hi/lo content/text area -->
                            <strong><label for="feature-2-seasons-hi-lo-content" class="sbm-row-title"><?php _e( 'Seasons Hi/Lo Content', 'tfs-travel-textdomain' )?></label></strong>
                            <textarea style="width: 100%;" rows="4" name="feature-2-seasons-hi-lo-content" id="feature-2-seasons-hi-lo-content"><?php if ( isset ( $sbm_stored_travel_meta['feature-2-seasons-hi-lo-content'] ) ) echo $sbm_stored_travel_meta['feature-2-seasons-hi-lo-content'][0]; ?></textarea>
                        </p>


                        <p><!-- Seasons High Season -->
                            <strong><label for="feature-2-seasons-hiseason" class="sbm-row-title"><?php _e( 'High Season', 'tfs-travel-textdomain' )?></label></strong>
                            <textarea style="width: 100%;" rows="4" name="feature-2-seasons-hiseason" id="feature-2-seasons-hiseason"><?php if ( isset ( $sbm_stored_travel_meta['feature-2-seasons-hiseason'] ) ) echo $sbm_stored_travel_meta['feature-2-seasons-hiseason'][0]; ?></textarea>
                        </p>

                        <p><!-- Seasons Low Season -->
                            <strong><label for="feature-2-seasons-lowseason" class="sbm-row-title"><?php _e( 'Low Season', 'tfs-travel-textdomain' )?></label></strong>
                            <textarea style="width: 100%;" rows="4" name="feature-2-seasons-lowseason" id="feature-2-seasons-lowseason"><?php if ( isset ( $sbm_stored_travel_meta['feature-2-seasons-lowseason'] ) ) echo $sbm_stored_travel_meta['feature-2-seasons-lowseason'][0]; ?></textarea>
                        </p>
                    </div>
                </div> <!-- /tab-content -->
            </div>
        </div>
    </div>

    <!-- ====== GETTING TO ====== -->
    <hr style="margin-top: 1.618em; border-top: 3px double #8c8b8b;">
    <h3><?php echo 'Getting To Destination' ?></h3>

    <!-- Getting To Title -->
    <p>
        <strong><label for="feature-3-get-to-title" class="sbm-row-title"><?php _e( 'Title', 'tfs-travel-textdomain' )?></label></strong>
        <input style="width: 100%;" type="text" name="feature-3-get-to-title" id="feature-3-get-to-title" value="<?php if ( isset ( $sbm_stored_travel_meta['feature-3-get-to-title'] ) ) echo $sbm_stored_travel_meta['feature-3-get-to-title'][0]; ?>" />
    </p>

    <!-- Getting To Image -->
    <div class="meta-field-container">

        <strong><label for="feature-3-getting-to-image" class="sbm-row-title"><?php _e( 'Getting To Destination Image','the-fly-shop' );?></label></strong><br>
        <input style="width:75%;" type="text" name="feature-3-getting-to-image" id="feature-3-getting-to-image" value="<?php if ( isset ( $sbm_stored_travel_meta['feature-3-getting-to-image'] ) ) echo $sbm_stored_travel_meta['feature-3-getting-to-image'][0];?>" />
        <input type="button" id="feature-3-getting-to-image-button" class="button" value="<?php _e( 'Choose or Upload an Image', 'the-fly-shop' );?>" />

        <!-- Preview container -->
        <div id="feature-3-getting-to-image-preview" style="margin-top: 10px;">
            <?php if ( isset( $sbm_stored_travel_meta['feature-3-getting-to-image'] ) && $sbm_stored_travel_meta['feature-3-getting-to-image'][0] != '' ) : ?>
                <img src="<?php echo esc_url( $sbm_stored_travel_meta['feature-3-getting-to-image'][0] ); ?>"
                     style="max-width: 250px; max-height: 250px; border: 1px solid #ddd; padding: 5px;"
                     alt="Preview" />
                <br><button type="button" id="feature-3-getting-to-image-remove" class="button" style="margin-top: 5px;">Remove Image</button>
            <?php endif; ?>
        </div>

    </div>

    <p><!-- Getting To Content/Text Area -->
        <strong><label for="feature-3-get-to-content" class="sbm-row-title"><?php _e( 'Content', 'tfs-travel-textdomain' )?></label></strong>
        <textarea style="width: 100%;" rows="4" name="feature-3-get-to-content" id="feature-3-get-to-content"><?php if ( isset ( $sbm_stored_travel_meta['feature-3-get-to-content'] ) ) echo $sbm_stored_travel_meta['feature-3-get-to-content'][0]; ?></textarea>
    </p>

    <p><!-- Getting To Read More -->
        <strong><label for="feature-3-read-more-info" class="sbm-row-title"><?php _e( 'Read More Info', 'sbm-textdomain' )?></label></strong>
        <input style="width: 100%;" type="text" name="feature-3-read-more-info" id="feature-3-read-more-info" placeholder="Add Read More Info" value="<?php if ( isset ( $sbm_stored_travel_meta['feature-3-read-more-info'] ) ) echo $sbm_stored_travel_meta['feature-3-read-more-info'][0]; ?>" />

        <strong><label for="feature-3-get-to-readmore" class="sbm-row-title"><?php _e( 'Read more', 'tfs-travel-textdomain' )?></label></strong>
        <textarea style="width: 100%;" rows="4" name="feature-3-get-to-readmore" id="feature-3-get-to-readmore"><?php if ( isset ( $sbm_stored_travel_meta['feature-3-get-to-readmore'] ) ) echo $sbm_stored_travel_meta['feature-3-get-to-readmore'][0]; ?></textarea>
    </p>

    <!-- ====== LODGING ====== -->
    <hr style="margin-top: 1.618em; border-top: 3px double #8c8b8b;">
    <h3><?php echo 'Lodging' ?></h3>

    <p><!-- Lodging Title -->
        <strong><label for="feature-4-lodging-title" class="sbm-row-title"><?php _e( 'Title', 'tfs-travel-textdomain' )?></label></strong>
        <input style="width: 100%;" type="text" name="feature-4-lodging-title" id="feature-4-lodging-title" value="<?php if ( isset ( $sbm_stored_travel_meta['feature-4-lodging-title'] ) ) echo $sbm_stored_travel_meta['feature-4-lodging-title'][0]; ?>" />
    </p>

    <!-- Lodging Image -->
    <div class="meta-field-container">

        <strong><label for="feature-4-lodging-img" class="sbm-row-title"><?php _e( 'Destination Loding Image','the-fly-shop' );?></label></strong><br>
        <input style="width:75%;" type="text" name="feature-4-lodging-img" id="feature-4-lodging-img" value="<?php if ( isset ( $sbm_stored_travel_meta['feature-4-lodging-img'] ) ) echo $sbm_stored_travel_meta['feature-4-lodging-img'][0];?>" />
        <input type="button" id="feature-4-lodging-img-button" class="button" value="<?php _e( 'Choose or Upload an Image', 'the-fly-shop' );?>" />

        <!-- Preview container -->
        <div id="feature-4-lodging-img-preview" style="margin-top: 10px;">
            <?php if ( isset( $sbm_stored_travel_meta['feature-4-lodging-img'] ) && $sbm_stored_travel_meta['feature-4-lodging-img'][0] != '' ) : ?>
                <img src="<?php echo esc_url( $sbm_stored_travel_meta['feature-4-lodging-img'][0] ); ?>"
                     style="max-width: 250px; max-height: 250px; border: 1px solid #ddd; padding: 5px;"
                     alt="Preview" />
                <br><button type="button" id="feature-4-lodging-img-remove" class="button" style="margin-top: 5px;">Remove Image</button>
            <?php endif; ?>
        </div>

    </div>

    <!-- Lodging Content -->
    <p>
        <strong><label for="feature-4-lodging-content" class="sbm-row-title"><?php _e( 'Content', 'tfs-travel-textdomain' )?></label></strong>
        <textarea style="width: 100%;" rows="4" name="feature-4-lodging-content" id="feature-4-lodging-content"><?php if ( isset ( $sbm_stored_travel_meta['feature-4-lodging-content'] ) ) echo $sbm_stored_travel_meta['feature-4-lodging-content'][0]; ?></textarea>
    </p>

    <p><!-- Lodging Read More -->
        <strong><label for="feature-4-read-more-info" class="sbm-row-title"><?php _e( 'Read More Info', 'sbm-textdomain' )?></label></strong>
        <input style="width: 100%;" type="text" name="feature-4-read-more-info" id="feature-4-read-more-info" placeholder="Add Read More Info" value="<?php if ( isset ( $sbm_stored_travel_meta['feature-4-read-more-info'] ) ) echo $sbm_stored_travel_meta['feature-4-read-more-info'][0]; ?>" />
        <strong><label for="feature-4-lodging-readmore" class="sbm-row-title"><?php _e( 'Read more', 'tfs-travel-textdomain' )?></label></strong>
        <textarea style="width: 100%;" rows="4" name="feature-4-lodging-readmore" id="feature-4-lodging-readmore"><?php if ( isset ( $sbm_stored_travel_meta['feature-4-lodging-readmore'] ) ) echo $sbm_stored_travel_meta['feature-4-lodging-readmore'][0]; ?></textarea>
    </p>

    <!-- ====== ANGLING ====== -->
    <hr style="margin-top: 1.618em; border-top: 3px double #8c8b8b;">
    <h3><?php echo 'Destination Angling' ?></h3>

    <p><!-- Angling Title -->
        <strong><label for="feature-5-angling-title" class="sbm-row-title"><?php _e( 'Title', 'tfs-travel-textdomain' )?></label></strong>
        <input style="width: 100%;" type="text" name="feature-5-angling-title" id="feature-5-angling-title" value="<?php if ( isset ( $sbm_stored_travel_meta['feature-5-angling-title'] ) ) echo $sbm_stored_travel_meta['feature-5-angling-title'][0]; ?>" />
    </p>

    <!-- Angling Image -->
    <div class="meta-field-container">

        <strong><label for="feature-5-angling-img" class="sbm-row-title"><?php _e( 'Destination Angling Image','the-fly-shop' );?></label></strong><br>
        <input style="width:75%;" type="text" name="feature-5-angling-img" id="feature-5-angling-img" value="<?php if ( isset ( $sbm_stored_travel_meta['feature-5-angling-img'] ) ) echo $sbm_stored_travel_meta['feature-5-angling-img'][0];?>" />
        <input type="button" id="feature-5-angling-img-button" class="button" value="<?php _e( 'Choose or Upload an Image', 'the-fly-shop' );?>" />

        <!-- Preview container -->
        <div id="feature-5-angling-img-preview" style="margin-top: 10px;">
            <?php if ( isset( $sbm_stored_travel_meta['feature-5-angling-img'] ) && $sbm_stored_travel_meta['feature-5-angling-img'][0] != '' ) : ?>
                <img src="<?php echo esc_url( $sbm_stored_travel_meta['feature-5-angling-img'][0] ); ?>"
                     style="max-width: 250px; max-height: 250px; border: 1px solid #ddd; padding: 5px;"
                     alt="Preview" />
                <br><button type="button" id="feature-5-angling-img-remove" class="button" style="margin-top: 5px;">Remove Image</button>
            <?php endif; ?>
        </div>

    </div>

    <p><!-- Angling Content -->
        <strong><label for="feature-5-angling-content" class="sbm-row-title"><?php _e( 'Content', 'tfs-travel-textdomain' )?></label></strong>
        <textarea style="width: 100%;" rows="4" name="feature-5-angling-content" id="feature-5-angling-content"><?php if ( isset ( $sbm_stored_travel_meta['feature-5-angling-content'] ) ) echo $sbm_stored_travel_meta['feature-5-angling-content'][0]; ?></textarea>
    </p>

    <p><!-- Destination Angling Read More -->
        <strong><label for="feature-5-read-more-info" class="sbm-row-title"><?php _e( 'Read More Info', 'sbm-textdomain' )?></label></strong>
        <input style="width: 100%;" type="text" name="feature-5-read-more-info" id="feature-5-read-more-info" placeholder="Add Read More Info" value="<?php if ( isset ( $sbm_stored_travel_meta['feature-5-read-more-info'] ) ) echo $sbm_stored_travel_meta['feature-5-read-more-info'][0]; ?>" />

        <strong><label for="feature-5-angling-readmore" class="sbm-row-title"><?php _e( 'Read more', 'tfs-travel-textdomain' )?></label></strong>
        <textarea style="width: 100%;" rows="4" name="feature-5-angling-readmore" id="feature-5-angling-readmore"><?php if ( isset ( $sbm_stored_travel_meta['feature-5-angling-readmore'] ) ) echo $sbm_stored_travel_meta['feature-5-angling-readmore'][0]; ?></textarea>
    </p>

    <!-- ====== CALL TO ACTION ROW ====== -->
    <hr style="margin-top: 1.618em; border-top: 3px double #8c8b8b;">
    <h3><?php echo 'CTA Section' ?></h3>

    <p><!-- Call To Action Strong Into -->
        <strong><label for="cta-strong-intro" class="sbm-row-title"><?php _e('CTA Intro','tfs-travel-textdomain')?></label></strong>
        <input style="width: 100%;" type="text" placeholder="Place CTA content here." name="cta-strong-intro" id="cta-strong-intro" value="<?php if (isset($sbm_stored_travel_meta['cta-strong-intro'])) echo $sbm_stored_travel_meta['cta-strong-intro'][0]; ?>" />
    </p>

    <p><!-- Call To Action Content -->
        <strong><label for="cta-content" class="sbm-row-title"><?php _e( 'CTA Content', 'tfs-travel-textdomain' )?></label></strong>
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
