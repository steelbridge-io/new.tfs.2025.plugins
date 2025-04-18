<?php
/*
 * Guide Service Meat
 */
ob_implicit_flush( TRUE );
include( plugin_dir_path( __FILE__ )
         . '../inc/sanitize_guide_service_image.php' );

/**
 * Adds a meta box to the post editing screen
 */

function guideservice_custom_meta() {
	global $post;
	
	if ( ! empty( $post ) ) {
		$pageTemplate = get_post_meta( $post->ID, '_wp_page_template', TRUE );
		$types        = array( 'guide_service' );
		foreach ( $types as $type ) {
			if ( $pageTemplate
			     == 'page-templates/guide-service-template.php'
			) {
				add_meta_box( 'guideservice_meta',
					__( 'Guide Service Images &amp; Video',
						'guideservice-textdomain' ),
					'guideservice_meta_callback',
					$type,
					'normal',
					'high' );
			}
		}
	}
}

add_action( 'add_meta_boxes', 'guideservice_custom_meta' );

/**
 * Adds Custom Field Image Meta Box
 */
ob_start();
function guideservice_meta_callback( $post ) {
	wp_nonce_field( basename( __FILE__ ), 'guideservice_nonce' );
	$guideservice_stored_meta = get_post_meta( $post->ID ); ?>

    <div class="sections-meta-cont">
        <strong><label for="guidesvc-temp-video"
                       class="guidesvc-temp-video"><?php _e( 'Hero Video URL',
					'the-fly-shop' ); ?></label></strong>
        <input style="width:100%;" type="url" name="guidesvc-temp-video"
               id="guidesvc-temp-video"
               value="<?php if ( isset ( $guideservice_stored_meta['guidesvc-temp-video'] ) ) {
			       echo $guideservice_stored_meta['guidesvc-temp-video'][0];
		       } ?>"/>
        <p class="meta-description">Add video url here. Video url is associated
            with media stored in a bucket at AWS or Google Cloud. Do not enter
            YouTube or Vimeo urls. Ensure <b>Guide Service Hero Image</b> is
            empty.</p>
    </div>

    <div>
		<?php
		
		$private_hero_opacity = get_post_meta( $post->ID,
			'guidesvc-hero-opacity-range',
			TRUE );
		
		if ( empty( $private_hero_opacity ) ) {
			$private_hero_opacity = 0.1;
		}
		
		?>
        <!-- Custom Range Value Meta Field -->
        <label for="private_hero_opacity"><b>Custom Range Value</b></label>
        <div style="background-color: #f5f5f5; padding: 1em;">
            <div>
                <span>The "Custom Range Value" below selects the opacity of the image or video overlay. Setting this value helps contrast logo, title, telephone against the background media.</span>
            </div>
            <label for="private_hero_opacity"><b>Custom Range Value:</b></label>
            <input type="range" name="guidesvc-hero-opacity-range"
                   id="guidesvc-hero-opacity-range" min="0.1" max="1"
                   step="0.01"
                   value="<?php echo esc_attr( $private_hero_opacity ); ?>">
            <span id="private_hero_range_value_display"><?php echo esc_attr
				( $private_hero_opacity ); ?></span>
        </div>
    </div>

    <!-- Script renders range selector value to the right of range selector -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const rangeInput = document.getElementById('guidesvc-hero-opacity-range');
            const rangeValueDisplay = document.getElementById('private_hero_range_value_display');

            rangeInput.addEventListener('input', function () {
                rangeValueDisplay.textContent = rangeInput.value;
            });
        });
    </script>

    <div class="sections-meta-cont">
        <strong><label for="guidesvc-temp-video-poster"
                       class="sections-row-title"><?php _e( 'Hero Video Poster',
					'the-fly-shop' ); ?></label></strong><br>
        <input style="width:75%;" type="text" name="guidesvc-temp-video-poster"
               id="guidesvc-temp-video-poster"
               value="<?php if ( isset ( $guideservice_stored_meta['guidesvc-temp-video-poster'] ) ) {
			       echo $guideservice_stored_meta['guidesvc-temp-video-poster'][0];
		       } ?>"/>
        <input type="button" id="guidesvc-temp-video-poster-button"
               class="button"
               value="<?php _e( 'Choose or Upload an Image',
			       'the-fly-shop' ); ?>"/>
        <p class="meta-description">Add an image here that is used on mobile
            devices. Mobile devices do not auto-play video. The "Poster" image
            is returned on mobile devices when a video is presented on tablets
            and desktop.</p>
    </div>

    <p> <!-- ==== TFS LOGO ==== -->

        <label for="guideservice-logo"
               class="guideservice-row-title"><?php _e( '<h3>TFS Logo</h3>',
				'guideservice-textdomain' ); ?></label>
        <input type="text" name="guideservice-logo" id="guideservice-logo"
               value="<?php if ( isset ( $guideservice_stored_meta['guideservice-logo'] ) ) {
			       echo $guideservice_stored_meta['guideservice-logo'][0];
		       } ?>"/>
        <input type="button" id="guideservice-logo-button" class="button"
               value="<?php _e( 'Choose or Upload an Image',
			       'guideservice-textdomain' ); ?>"/>

    </p>

    <div> <!-- ==== GUIDE HERO IMAGE ==== -->

        <label for="guideservice-image"
               class="guideservice-row-title"><?php _e( '<h3>Guide Service Hero Image</h3>',
				'guideservice-textdomain' ); ?></label>
        <input type="text" name="guideservice-image" id="guideservice-image"
               value="<?php if ( isset ( $guideservice_stored_meta['guideservice-image'] ) ) {
			       echo $guideservice_stored_meta['guideservice-image'][0];
		       } ?>"/>
        <input type="button" id="guideservice-image-button" class="button"
               value="<?php _e( 'Choose or Upload an Image',
			       'guideservice-textdomain' ); ?>"/>
    </div>

    <hr style="margin-top: 1.618em; border-top: 3px double #8c8b8b;">

    <p><!-- ==== RESERVATIONS-RATES / GUIDE SERVICE / THE FISHING IMAGE ==== -->

        <label for="guideservice-gs1-image"
               class="guideservice-row-title"><?php _e( '<h3>Reservations &amp; Rates - Guide Service</h3>',
				'guideservice-textdomain' ); ?></label><br>
        <input type="text" name="guideservice-gs1-image"
               id="guideservice-gs1-image"
               value="<?php if ( isset ( $guideservice_stored_meta['guideservice-gs1-image'] ) ) {
			       echo $guideservice_stored_meta['guideservice-gs1-image'][0];
		       } ?>"/>
        <input type="button" id="guideservice-gs1-image-button" class="button"
               value="<?php _e( 'Choose or Upload an Image',
			       'guideservice-textdomain' ); ?>"/>

    </p>

    <p><!-- ==== RESERVATIONS-RATES / GUIDE SERVICE / THE FISHING VIDEO ==== -->

        <label for="guideservice-gs1-video"
               class="guideservice-row-title"><?php _e( '<strong>Enter Public URL:</strong>',
				'guideservice-textdomain' ) ?></label>
        <input type="url" name="guideservice-gs1-video"
               id="guideservice-gs1-video"
               value="<?php if ( isset ( $guideservice_stored_meta['guideservice-gs1-video'] ) ) {
			       echo $guideservice_stored_meta['guideservice-gs1-video'][0];
		       } ?>"/>

    </p>

    <!-- ==== RESERVATIONS-RATES / GUIDE SERVICE VIDEO/IMAGE OPTION ==== -->

    <hr style="margin-top: 1.618em; border-top: 3px double #8c8b8b;">

    <p> <!-- ==== SEASONS / GUIDE SERVICE IMAGE ==== -->

        <label for="feature-gs2-image"
               class="guideservice-row-title"><?php _e( '<h3>Seasons Imagery</h3>',
				'guideservice-textdomain' ); ?></label><br>
        <input type="text" name="feature-gs2-image" id="feature-gs2-image"
               value="<?php if ( isset ( $guideservice_stored_meta['feature-gs2-image'] ) ) {
			       echo $guideservice_stored_meta['feature-gs2-image'][0];
		       } ?>"/>
        <input type="button" id="feature-gs2-image-button" class="button"
               value="<?php _e( 'Choose or Upload an Image',
			       'guideservice-textdomain' ); ?>"/>

    </p>

    <p> <!-- ==== SEASONS / GUIDE SERVICE TEXT/VIDEO ==== -->

        <label for="feature-gs2-video"
               class="guideservice-row-title"><?php _e( '<strong>Enter Public URL:</strong>',
				'guideservice-textdomain' ) ?></label>
        <input type="url" name="feature-gs2-video" id="feature-gs2-video"
               value="<?php if ( isset ( $guideservice_stored_meta['feature-gs2-video'] ) ) {
			       echo $guideservice_stored_meta['feature-gs2-video'][0];
		       } ?>"/>
    </p>

    <!-- ==== SEASONS / GUIDE SERVICE VIDEO/IMAGE OPTION ==== -->

    <hr style="margin-top: 1.618em; border-top: 3px double #8c8b8b;">

    <p> <!-- ==== FISHING / GETTING TO IMAGE ==== -->

        <label for="feature-gs3-image"
               class="guideservice-row-title"><?php _e( '<h3>Fishing Imagery</h3>',
				'guideservice-textdomain' ); ?></label><br>
        <input type="text" name="feature-gs3-image" id="feature-gs3-image"
               value="<?php if ( isset ( $guideservice_stored_meta['feature-gs3-image'] ) ) {
			       echo $guideservice_stored_meta['feature-gs3-image'][0];
		       } ?>"/>
        <input type="button" id="feature-gs3-image-button" class="button"
               value="<?php _e( 'Choose or Upload an Image',
			       'guideservice-textdomain' ); ?>"/>

    </p>

    <p> <!-- ==== FISHING / GETTING TO TEXT/VIDEO ==== -->

        <label for="feature-gs3-video"
               class="guideservice-row-title"><?php _e( '<strong>Paste implicit video URL here. You can also paste the embed Google Map URL here. No shortened versions:</strong>',
				'guideservice-textdomain' ) ?></label>
        <input type="url" name="feature-gs3-video" id="feature-gs3-video"
               value="<?php if ( isset ( $guideservice_stored_meta['feature-gs3-video'] ) ) {
			       echo $guideservice_stored_meta['feature-gs3-video'][0];
		       } ?>"/>

    </p>

    <!-- ==== FISHING / GETTING TO VIDEO/IMAGE OPTION ==== -->

    <hr style="margin-top: 1.618em; border-top: 3px double #8c8b8b;">

    <p> <!-- ==== LODGING / LODGING IMAGE ==== -->

        <label for="feature-gs4-image"
               class="guideservice-row-title"><?php _e( '<h3>Lodging Imagery</h3>',
				'guideservice-textdomain' ); ?></label><br>
        <input type="text" name="feature-gs4-image" id="feature-gs4-image"
               value="<?php if ( isset ( $guideservice_stored_meta['feature-gs4-image'] ) ) {
			       echo $guideservice_stored_meta['feature-gs4-image'][0];
		       } ?>"/>
        <input type="button" id="feature-gs4-image-button" class="button"
               value="<?php _e( 'Choose or Upload an Image',
			       'guideservice-textdomain' ); ?>"/>

    </p>

    <p> <!-- ==== LODGING / LODGING TEXT/VIDEO ==== -->

        <label for="feature-gs4-video"
               class="guideservice-row-title"><?php _e( '<strong>Enter Public URL:</strong>',
				'guideservice-textdomain' ) ?></label>
        <input type="url" name="feature-gs4-video" id="feature-gs4-video"
               value="<?php if ( isset ( $guideservice_stored_meta['feature-gs4-video'] ) ) {
			       echo $guideservice_stored_meta['feature-gs4-video'][0];
		       } ?>"/>

    </p>

    <!-- ==== LODGING / LODGING VIDEO/IMAGE OPTION ==== -->

    <hr style="margin-top: 1.618em; border-top: 3px double #8c8b8b;">
    <p> <!-- ==== GETTING THERE / FISHING IMAGE ==== -->

        <label for="feature-gs5-image"
               class="guideservice-row-title"><?php _e( '<h3>Getting There Imagery</h3>',
				'guideservice-textdomain' ); ?></label><br>
        <input type="text" name="feature-gs5-image" id="feature-gs5-image"
               value="<?php if ( isset ( $guideservice_stored_meta['feature-gs5-image'] ) ) {
			       echo $guideservice_stored_meta['feature-gs5-image'][0];
		       } ?>"/>
        <input type="button" id="feature-gs5-image-button" class="button"
               value="<?php _e( 'Choose or Upload an Image',
			       'guideservice-textdomain' ); ?>"/>

    </p>

    <p> <!-- ==== GETTING THERE / FISHING TEXT/VIDEO ==== -->

        <label for="feature-gs5-video"
               class="guideservice-row-title"><?php _e( '<strong>Enter Public URL:</strong>',
				'guideservice-textdomain' ) ?></label>
        <input type="url" name="feature-gs5-video" id="feature-gs5-video"
               value="<?php if ( isset ( $guideservice_stored_meta['feature-gs5-video'] ) ) {
			       echo $guideservice_stored_meta['feature-gs5-video'][0];
		       } ?>"/>

    </p>

    <!-- ==== GETTING THERE / FISHING VIDEO/IMAGE OPTION ==== -->

    <!-- ====== ADDITIONAL INFORMATION SECTION ====== -->
    <hr style="margin-top: 1.618em; border-top: 3px double #8c8b8b;">
    <h3><?php echo 'Additional Photos' ?></h3>

    <p> <!-- Additional Photo #1 -->

        <label for="guideservice-additional-info-image1"
               class="travel-row-title"><?php _e( '<strong>Additional Photo &#35;1</strong>',
				'guideservice-textdomain' ); ?></label><br>
        <input type="text" name="guideservice-additional-info-image1"
               id="guideservice-additional-info-image1"
               value="<?php if ( isset ( $guideservice_stored_meta['guideservice-additional-info-image1'] ) ) {
			       echo $guideservice_stored_meta['guideservice-additional-info-image1'][0];
		       } ?>"/>
        <input type="button" id="guideservice-additional-info-image1-button"
               class="button" value="<?php _e( 'Choose or Upload an Image',
			'guideservice-textdomain' ); ?>"/>

    </p>

    <p> <!-- Additional Photo #2 -->

        <label for="guideservice-additional-info-image2"
               class="travel-row-title"><?php _e( '<strong>Additional Photo &#35;2</strong>',
				'guideservice-textdomain' ); ?></label><br>
        <input type="text" name="guideservice-additional-info-image2"
               id="guideservice-additional-info-image2"
               value="<?php if ( isset ( $guideservice_stored_meta['guideservice-additional-info-image2'] ) ) {
			       echo $guideservice_stored_meta['guideservice-additional-info-image2'][0];
		       } ?>"/>
        <input type="button" id="guideservice-additional-info-image2-button"
               class="button" value="<?php _e( 'Choose or Upload an Image',
			'guideservice-textdomain' ); ?>"/>

    </p>

    <p> <!-- Additional Photo #3 -->

        <label for="guideservice-additional-info-image3"
               class="travel-row-title"><?php _e( '<strong>Additional Photo &#35;3</strong>',
				'guideservice-textdomain' ); ?></label><br>
        <input type="text" name="guideservice-additional-info-image3"
               id="guideservice-additional-info-image3"
               value="<?php if ( isset ( $guideservice_stored_meta['guideservice-additional-info-image3'] ) ) {
			       echo $guideservice_stored_meta['guideservice-additional-info-image3'][0];
		       } ?>"/>
        <input type="button" id="guideservice-additional-info-image3-button"
               class="button" value="<?php _e( 'Choose or Upload an Image',
			'guideservice-textdomain' ); ?>"/>

    </p>

    <p> <!-- Additional Photo #4 -->

        <label for="guideservice-additional-info-image4"
               class="travel-row-title"><?php _e( '<strong>Additional Photo &#35;4</strong>',
				'guideservice-textdomain' ); ?></label><br>
        <input type="text" name="guideservice-additional-info-image4"
               id="guideservice-additional-info-image4"
               value="<?php if ( isset ( $guideservice_stored_meta['guideservice-additional-info-image4'] ) ) {
			       echo $guideservice_stored_meta['guideservice-additional-info-image4'][0];
		       } ?>"/>
        <input type="button" id="guideservice-additional-info-image4-button"
               class="button" value="<?php _e( 'Choose or Upload an Image',
			'guideservice-textdomain' ); ?>"/>

    </p>

    <p> <!-- Additional Photo #5 -->

        <label for="guideservice-additional-info-image5"
               class="travel-row-title"><?php _e( '<strong>Additional Photo &#35;5</strong>',
				'guideservice-textdomain' ); ?></label><br>
        <input type="text" name="guideservice-additional-info-image5"
               id="guideservice-additional-info-image5"
               value="<?php if ( isset ( $guideservice_stored_meta['guideservice-additional-info-image5'] ) ) {
			       echo $guideservice_stored_meta['guideservice-additional-info-image5'][0];
		       } ?>"/>
        <input type="button" id="guideservice-additional-info-image5-button"
               class="button" value="<?php _e( 'Choose or Upload an Image',
			'guideservice-textdomain' ); ?>"/>

    </p>

    <p> <!-- Additional Photo #6 -->

        <label for="guideservice-additional-info-image6"
               class="travel-row-title"><?php _e( '<strong>Additional Photo &#35;6</strong>',
				'guideservice-textdomain' ); ?></label><br>
        <input type="text" name="guideservice-additional-info-image6"
               id="guideservice-additional-info-image6"
               value="<?php if ( isset ( $guideservice_stored_meta['guideservice-additional-info-image6'] ) ) {
			       echo $guideservice_stored_meta['guideservice-additional-info-image6'][0];
		       } ?>"/>
        <input type="button" id="guideservice-additional-info-image6-button"
               class="button" value="<?php _e( 'Choose or Upload an Image',
			'guideservice-textdomain' ); ?>"/>

    </p>

    <p> <!-- Additional Photo #7 -->

        <label for="guideservice-additional-info-image7"
               class="travel-row-title"><?php _e( '<strong>Additional Photo &#35;7</strong>',
				'guideservice-textdomain' ); ?></label><br>
        <input type="text" name="guideservice-additional-info-image7"
               id="guideservice-additional-info-image7"
               value="<?php if ( isset ( $guideservice_stored_meta['guideservice-additional-info-image7'] ) ) {
			       echo $guideservice_stored_meta['guideservice-additional-info-image7'][0];
		       } ?>"/>
        <input type="button" id="guideservice-additional-info-image7-button"
               class="button" value="<?php _e( 'Choose or Upload an Image',
			'guideservice-textdomain' ); ?>"/>

    </p>

    <p> <!-- Additional Photo #8 -->

        <label for="guideservice-additional-info-image8"
               class="travel-row-title"><?php _e( '<strong>Additional Photo &#35;8</strong>',
				'guideservice-textdomain' ); ?></label><br>
        <input type="text" name="guideservice-additional-info-image8"
               id="guideservice-additional-info-image8"
               value="<?php if ( isset ( $guideservice_stored_meta['guideservice-additional-info-image8'] ) ) {
			       echo $guideservice_stored_meta['guideservice-additional-info-image8'][0];
		       } ?>"/>
        <input type="button" id="guideservice-additional-info-image8-button"
               class="button" value="<?php _e( 'Choose or Upload an Image',
			'guideservice-textdomain' ); ?>"/>

    </p>

    <div class="panel with-nav-tabs panel-default">
        <div class="panel-heading">
            <!-- Nav tabs -->
            <ul class="nav nav-tabs" role="tablist">
                <li role="presentation" class="active"><a href="#sectionsimage1"
                                                          aria-controls="sectionsimage1"
                                                          role="tab"
                                                          data-toggle="tab">Section
                        &#35;1</a></li>
                <li role="presentation"><a href="#sectionsimage2"
                                           aria-controls="sectionsimage2"
                                           role="tab" data-toggle="tab">Section
                        &#35;2</a></li>
                <li role="presentation"><a href="#sectionsimage3"
                                           aria-controls="sectionsimage3"
                                           role="tab" data-toggle="tab">Section
                        &#35;3</a></li>
                <li role="presentation"><a href="#sectionsimage4"
                                           aria-controls="sectionsimage4"
                                           role="tab" data-toggle="tab">Section
                        &#35;4</a></li>
                <li role="presentation"><a href="#sectionsimage5"
                                           aria-controls="sectionsimage5"
                                           role="tab" data-toggle="tab">Section
                        &#35;5</a></li>
                <li role="presentation"><a href="#sectionsimage6"
                                           aria-controls="sectionsimage6"
                                           role="tab" data-toggle="tab">Section
                        &#35;6</a></li>
                <li role="presentation"><a href="#sectionsimage7"
                                           aria-controls="sectionsimage7"
                                           role="tab" data-toggle="tab">Section
                        &#35;7</a></li>
                <li role="presentation"><a href="#sectionsimage8"
                                           aria-controls="sectionsimage8"
                                           role="tab" data-toggle="tab">Section
                        &#35;8</a></li>
                <li role="presentation"><a href="#sectionsimage9"
                                           aria-controls="sectionsimage9"
                                           role="tab" data-toggle="tab">Section
                        &#35;9</a></li>
                <li role="presentation"><a href="#sectionsimage10"
                                           aria-controls="sectionsimage10"
                                           role="tab" data-toggle="tab">Section
                        &#35;10</a></li>
            </ul>

            <div class="panel-body boof">
                <div class="tab-content">

                    <!-- ==== SECTION #1 ==== -->
                    <div role="tabpanel" class="tab-pane fade in active"
                         id="sectionsimage1">

                        <p> <!-- ==== SECTION #1 OPTION ==== -->

                            <span class="sections-1-option"><?php _e( '<strong>Activate this section?</strong>',
									'sections-textdomain' ) ?></span>
                        <div class="sections-1-option">
                            <label for="sections-1-option">
                                <input type="checkbox"
                                       name="sections-1-option-checkbox"
                                       id="sections-1-option-checkbox"
                                       value="yes" <?php if ( isset ( $sections_stored_meta['sections-1-option-checkbox'] ) ) {
									checked( $sections_stored_meta['sections-1-option-checkbox'][0],
										'yes' );
								} ?> />
								<?php _e( 'Check box to activate this section.',
									'sections-textdomain' ) ?>
                            </label>
                        </div>

                        </p>

                        <p> <!-- ==== SECTION #1 TITLE ==== -->

                            <strong><label for="sections-1-title"
                                           class="sections-1-title"><?php _e( 'Section &#35;1 Title',
										'sections-textdomain' ); ?></label></strong><br>
                            <input style="width:50%;" type="text"
                                   name="sections-1-title" id="sections-1-title"
                                   value="<?php if ( isset ( $sections_stored_meta['sections-1-title'] ) ) {
								       echo $sections_stored_meta['sections-1-title'][0];
							       } ?>"/>

                        </p>

                        <p> <!-- ==== SECTION #1 TEXT AREA ==== -->

                            <strong><label for="sections-1-textarea"
                                           class="sections-1-textarea"><?php _e( 'Section &#35;1 Text Area',
										'sections-textdomain' ) ?></label></strong>

                            <textarea style="width: 100%;" rows="4"
                                      name="sections-1-textarea"
                                      id="sections-1-textarea"><?php if ( isset ( $sections_stored_meta['sections-1-textarea'] ) ) {
									echo $sections_stored_meta['sections-1-textarea'][0];
								} ?></textarea>

                        </p>

                        <p> <!-- ==== SECTION #1 READMORE OPTION ==== -->

                            <span class="sections-1-readmore"><?php _e( '<strong>Read more section?</strong>',
									'sections-textdomain' ) ?></span>
                        <div class="sections-1-readmore">
                            <label for="sections-1-readmore">
                                <input type="checkbox"
                                       name="sections-1-readmore-checkbox"
                                       id="sections-1-readmore-checkbox"
                                       value="yes" <?php if ( isset ( $sections_stored_meta['sections-1-readmore-checkbox'] ) ) {
									checked( $sections_stored_meta['sections-1-readmore-checkbox'][0],
										'yes' );
								} ?> />
								<?php _e( 'Check box to activate read more section.',
									'sections-textdomain' ) ?>
                            </label>
                        </div>

                        </p>

                        <p> <!-- ==== SECTION #1 READ MORE ==== -->

                            <strong><label for="sections-1-readmore"
                                           class="sections-1-readmore"><?php _e( '<strong>Section &#35;1 Read More</strong>',
										'sections-textdomain' ) ?></label></strong>

                            <textarea style="width: 100%;" rows="4"
                                      name="sections-1-readmore"
                                      id="sections-1-readmore"><?php if ( isset ( $sections_stored_meta['sections-1-readmore'] ) ) {
									echo $sections_stored_meta['sections-1-readmore'][0];
								} ?></textarea>

                        </p>

                        <p> <!-- ==== SECTION #1 VIDEO/IMAGE OPTION ==== -->

                            <span class="sections-1-video-image"><?php _e( '<strong>Image or Video?</strong>',
									'sections-textdomain' ) ?></span>
                        <div class="sections-1-video-image">
                            <label for="sections-1-video-image">
                                <input type="checkbox"
                                       name="sections-1-video-image-checkbox"
                                       id="sections-1-video-image-checkbox"
                                       value="yes" <?php if ( isset ( $sections_stored_meta['sections-1-video-image-checkbox'] ) ) {
									checked( $sections_stored_meta['sections-1-video-image-checkbox'][0],
										'yes' );
								} ?> />
								<?php _e( 'Check box if you are importing video. Leave unchecked for image.',
									'sections-textdomain' ) ?>
                            </label>
                        </div>

                        </p>

                        <p> <!-- ==== SECTION #1 IMAGE ==== -->

                            <label for="sections-1-image"
                                   class="sections-1-image"><?php _e( '<strong>Section &#35;1 Image</strong>',
									'sections-textdomain' ); ?></label><br>
                            <input type="text" style="width: 75%;"
                                   name="sections-1-image" id="sections-1-image"
                                   value="<?php if ( isset ( $sections_stored_meta['sections-1-image'] ) ) {
								       echo $sections_stored_meta['sections-1-image'][0];
							       } ?>"/><br><br>
                            <input type="button" id="sections-1-image-button"
                                   class="button"
                                   value="<?php _e( 'Choose or Upload an Image',
								       'sections-textdomain' ); ?>"/>

                        </p>

                        <p> <!-- ==== SECTION #1 VIDEO ==== -->

                            <label for="sections-1-video"
                                   class="sections-1-video"><?php _e( '<strong>Paste implicit video URL here. You can also paste the embed Google Map URL here:</strong>',
									'sections-textdomain' ) ?></label>
                            <input type="url" style="width:50%;"
                                   name="sections-1-video" id="sections-1-video"
                                   value="<?php if ( isset ( $sections_stored_meta['sections-1-video'] ) ) {
								       echo $sections_stored_meta['sections-1-video'][0];
							       } ?>"/>

                        </p>

                    </div> <!-- /#sectionsimage1 -->


                    <!-- ==== SECTION #2 ==== -->
                    <div role="tabpanel" class="tab-pane fade in"
                         id="sectionsimage2">

                        <p> <!-- ==== SECTION #2 OPTION ==== -->

                            <span class="sections-2-option"><?php _e( '<strong>Activate this section?</strong>',
									'sections-textdomain' ) ?></span>
                        <div class="sections-2-option">
                            <label for="sections-2-option">
                                <input type="checkbox"
                                       name="sections-2-option-checkbox"
                                       id="sections-2-option-checkbox"
                                       value="yes" <?php if ( isset ( $sections_stored_meta['sections-2-option-checkbox'] ) ) {
									checked( $sections_stored_meta['sections-2-option-checkbox'][0],
										'yes' );
								} ?> />
								<?php _e( 'Check box to activate this section.',
									'sections-textdomain' ) ?>
                            </label>
                        </div>

                        </p>

                        <p> <!-- ==== SECTION #2 TITLE ==== -->

                            <strong><label for="sections-2-title"
                                           class="sections-2-title"><?php _e( 'Section &#35;2 Title',
										'sections-textdomain' ); ?></label></strong><br>
                            <input style="width:50%;" type="text"
                                   name="sections-2-title" id="sections-2-title"
                                   value="<?php if ( isset ( $sections_stored_meta['sections-2-title'] ) ) {
								       echo $sections_stored_meta['sections-2-title'][0];
							       } ?>"/>

                        </p>

                        <p> <!-- ==== SECTION #2 TEXT AREA ==== -->

                            <strong><label for="sections-2-textarea"
                                           class="sections-2-textarea"><?php _e( 'Section &#35;2 Text Area',
										'sections-textdomain' ) ?></label></strong>

                            <textarea style="width: 100%;" rows="4"
                                      name="sections-2-textarea"
                                      id="sections-2-textarea"><?php if ( isset ( $sections_stored_meta['sections-2-textarea'] ) ) {
									echo $sections_stored_meta['sections-2-textarea'][0];
								} ?></textarea>

                        </p>

                        <p> <!-- ==== SECTION #2 READMORE OPTION ==== -->

                            <span class="sections-2-readmore"><?php _e( '<strong>Read more section?</strong>',
									'sections-textdomain' ) ?></span>
                        <div class="sections-2-readmore">
                            <label for="sections-2-readmore">
                                <input type="checkbox"
                                       name="sections-2-readmore-checkbox"
                                       id="sections-2-readmore-checkbox"
                                       value="yes" <?php if ( isset ( $sections_stored_meta['sections-2-readmore-checkbox'] ) ) {
									checked( $sections_stored_meta['sections-2-readmore-checkbox'][0],
										'yes' );
								} ?> />
								<?php _e( 'Check box to activate read more section.',
									'sections-textdomain' ) ?>
                            </label>
                        </div>

                        </p>

                        <p> <!-- ==== SECTION #2 READ MORE ==== -->

                            <strong><label for="sections-2-readmore"
                                           class="sections-2-readmore"><?php _e( '<strong>Section &#35;2 Read More</strong>',
										'sections-textdomain' ) ?></label></strong>

                            <textarea style="width: 100%;" rows="4"
                                      name="sections-2-readmore"
                                      id="sections-2-readmore"><?php if ( isset ( $sections_stored_meta['sections-2-readmore'] ) ) {
									echo $sections_stored_meta['sections-2-readmore'][0];
								} ?></textarea>

                        </p>

                        <p> <!-- ==== SECTION #2 VIDEO/IMAGE OPTION ==== -->

                            <span class="sections-2-video-image"><?php _e( '<strong>Image or Video?</strong>',
									'sections-textdomain' ) ?></span>
                        <div class="sections-2-video-image">
                            <label for="sections-2-video-image">
                                <input type="checkbox"
                                       name="sections-2-video-image-checkbox"
                                       id="sections-2-video-image-checkbox"
                                       value="yes" <?php if ( isset ( $sections_stored_meta['sections-2-video-image-checkbox'] ) ) {
									checked( $sections_stored_meta['sections-2-video-image-checkbox'][0],
										'yes' );
								} ?> />
								<?php _e( 'Check box if you are importing video. Leave unchecked for image.',
									'sections-textdomain' ) ?>
                            </label>
                        </div>

                        </p>

                        <p> <!-- ==== SECTION #2 IMAGE ==== -->

                            <label for="sections-2-image"
                                   class="sections-2-image"><?php _e( '<strong>Section &#35;2 Image</strong>',
									'sections-textdomain' ); ?></label><br>
                            <input type="text" style="width: 75%;"
                                   name="sections-2-image" id="sections-2-image"
                                   value="<?php if ( isset ( $sections_stored_meta['sections-2-image'] ) ) {
								       echo $sections_stored_meta['sections-2-image'][0];
							       } ?>"/><br><br>
                            <input type="button" id="sections-2-image-button"
                                   class="button"
                                   value="<?php _e( 'Choose or Upload an Image',
								       'sections-textdomain' ); ?>"/>

                        </p>

                        <p> <!-- ==== SECTION #2 VIDEO ==== -->

                            <label for="sections-2-video"
                                   class="sections-2-video"><?php _e( '<strong>Paste implicit video URL here. You can also paste the embed Google Map URL here:</strong>',
									'sections-textdomain' ) ?></label>
                            <input type="url" style="width:50%;"
                                   name="sections-2-video" id="sections-2-video"
                                   value="<?php if ( isset ( $sections_stored_meta['sections-2-video'] ) ) {
								       echo $sections_stored_meta['sections-2-video'][0];
							       } ?>"/>

                        </p>

                    </div> <!-- /#sectionsimages2 -->


                    <!-- ==== SECTION #3 ==== -->
                    <div role="tabpanel" class="tab-pane fade in"
                         id="sectionsimage3">

                        <p> <!-- ==== SECTION #3 OPTION ==== -->

                            <span class="sections-3-option"><?php _e( '<strong>Activate this section?</strong>',
									'sections-textdomain' ) ?></span>
                        <div class="sections-3-option">
                            <label for="sections-3-option">
                                <input type="checkbox"
                                       name="sections-3-option-checkbox"
                                       id="sections-3-option-checkbox"
                                       value="yes" <?php if ( isset ( $sections_stored_meta['sections-3-option-checkbox'] ) ) {
									checked( $sections_stored_meta['sections-3-option-checkbox'][0],
										'yes' );
								} ?> />
								<?php _e( 'Check box to activate this section.',
									'sections-textdomain' ) ?>
                            </label>
                        </div>

                        </p>

                        <p> <!-- ==== SECTION #3 TITLE ==== -->

                            <strong><label for="sections-3-title"
                                           class="sections-3-title"><?php _e( 'Section &#35;3 Title',
										'sections-textdomain' ); ?></label></strong><br>
                            <input style="width:50%;" type="text"
                                   name="sections-3-title" id="sections-3-title"
                                   value="<?php if ( isset ( $sections_stored_meta['sections-3-title'] ) ) {
								       echo $sections_stored_meta['sections-3-title'][0];
							       } ?>"/>

                        </p>

                        <p> <!-- ==== SECTION #3 TEXT AREA ==== -->

                            <strong><label for="sections-3-textarea"
                                           class="sections-3-textarea"><?php _e( 'Section &#35;3 Text Area',
										'sections-textdomain' ) ?></label></strong>

                            <textarea style="width: 100%;" rows="4"
                                      name="sections-3-textarea"
                                      id="sections-3-textarea"><?php if ( isset ( $sections_stored_meta['sections-3-textarea'] ) ) {
									echo $sections_stored_meta['sections-3-textarea'][0];
								} ?></textarea>

                        </p>

                        <p> <!-- ==== SECTION #3 READMORE OPTION ==== -->

                            <span class="sections-3-readmore"><?php _e( '<strong>Read more section?</strong>',
									'sections-textdomain' ) ?></span>
                        <div class="sections-3-readmore">
                            <label for="sections-3-readmore">
                                <input type="checkbox"
                                       name="sections-3-readmore-checkbox"
                                       id="sections-3-readmore-checkbox"
                                       value="yes" <?php if ( isset ( $sections_stored_meta['sections-3-readmore-checkbox'] ) ) {
									checked( $sections_stored_meta['sections-3-readmore-checkbox'][0],
										'yes' );
								} ?> />
								<?php _e( 'Check box to activate read more section.',
									'sections-textdomain' ) ?>
                            </label>
                        </div>

                        </p>

                        <p> <!-- ==== SECTION #3 READ MORE ==== -->

                            <strong><label for="sections-3-readmore"
                                           class="sections-3-readmore"><?php _e( '<strong>Section &#35;3 Read More</strong>',
										'sections-textdomain' ) ?></label></strong>

                            <textarea style="width: 100%;" rows="4"
                                      name="sections-3-readmore"
                                      id="sections-3-readmore"><?php if ( isset ( $sections_stored_meta['sections-3-readmore'] ) ) {
									echo $sections_stored_meta['sections-3-readmore'][0];
								} ?></textarea>

                        </p>

                        <p> <!-- ==== SECTION #3 VIDEO/IMAGE OPTION ==== -->

                            <span class="sections-3-video-image"><?php _e( '<strong>Image or Video?</strong>',
									'sections-textdomain' ) ?></span>
                        <div class="sections-3-video-image">
                            <label for="sections-3-video-image">
                                <input type="checkbox"
                                       name="sections-3-video-image-checkbox"
                                       id="sections-3-video-image-checkbox"
                                       value="yes" <?php if ( isset ( $sections_stored_meta['sections-3-video-image-checkbox'] ) ) {
									checked( $sections_stored_meta['sections-3-video-image-checkbox'][0],
										'yes' );
								} ?> />
								<?php _e( 'Check box if you are importing video. Leave unchecked for image.',
									'sections-textdomain' ) ?>
                            </label>
                        </div>

                        </p>

                        <p> <!-- ==== SECTION #3 IMAGE ==== -->

                            <label for="sections-3-image"
                                   class="sections-3-image"><?php _e( '<strong>Section &#35;3 Image</strong>',
									'sections-textdomain' ); ?></label><br>
                            <input type="text" style="width: 75%;"
                                   name="sections-3-image" id="sections-3-image"
                                   value="<?php if ( isset ( $sections_stored_meta['sections-3-image'] ) ) {
								       echo $sections_stored_meta['sections-3-image'][0];
							       } ?>"/><br><br>
                            <input type="button" id="sections-3-image-button"
                                   class="button"
                                   value="<?php _e( 'Choose or Upload an Image',
								       'sections-textdomain' ); ?>"/>

                        </p>

                        <p> <!-- ==== SECTION #3 VIDEO ==== -->

                            <label for="sections-3-video"
                                   class="sections-3-video"><?php _e( '<strong>Paste implicit video URL here. You can also paste the embed Google Map URL here:</strong>',
									'sections-textdomain' ) ?></label>
                            <input type="url" style="width:50%;"
                                   name="sections-3-video" id="sections-3-video"
                                   value="<?php if ( isset ( $sections_stored_meta['sections-3-video'] ) ) {
								       echo $sections_stored_meta['sections-3-video'][0];
							       } ?>"/>

                        </p>

                    </div> <!-- /#sectionsimages3 -->

                    <!-- ==== SECTION #4 ==== -->
                    <div role="tabpanel" class="tab-pane fade in"
                         id="sectionsimage4">

                        <p> <!-- ==== SECTION #4 OPTION ==== -->

                            <span class="sections-4-option"><?php _e( '<strong>Activate this section?</strong>',
									'sections-textdomain' ) ?></span>
                        <div class="sections-4-option">
                            <label for="sections-4-option">
                                <input type="checkbox"
                                       name="sections-4-option-checkbox"
                                       id="sections-4-option-checkbox"
                                       value="yes" <?php if ( isset ( $sections_stored_meta['sections-4-option-checkbox'] ) ) {
									checked( $sections_stored_meta['sections-4-option-checkbox'][0],
										'yes' );
								} ?> />
								<?php _e( 'Check box to activate this section.',
									'sections-textdomain' ) ?>
                            </label>
                        </div>

                        </p>

                        <p> <!-- ==== SECTION #4 TITLE ==== -->

                            <strong><label for="sections-4-title"
                                           class="sections-4-title"><?php _e( 'Section &#35;4 Title',
										'sections-textdomain' ); ?></label></strong><br>
                            <input style="width:50%;" type="text"
                                   name="sections-4-title" id="sections-4-title"
                                   value="<?php if ( isset ( $sections_stored_meta['sections-4-title'] ) ) {
								       echo $sections_stored_meta['sections-4-title'][0];
							       } ?>"/>

                        </p>

                        <p> <!-- ==== SECTION #4 TEXT AREA ==== -->

                            <strong><label for="sections-4-textarea"
                                           class="sections-4-textarea"><?php _e( 'Section &#35;4 Text Area',
										'sections-textdomain' ) ?></label></strong>

                            <textarea style="width: 100%;" rows="4"
                                      name="sections-4-textarea"
                                      id="sections-4-textarea"><?php if ( isset ( $sections_stored_meta['sections-4-textarea'] ) ) {
									echo $sections_stored_meta['sections-4-textarea'][0];
								} ?></textarea>

                        </p>

                        <p> <!-- ==== SECTION #4 READMORE OPTION ==== -->

                            <span class="sections-4-readmore"><?php _e( '<strong>Read more section?</strong>',
									'sections-textdomain' ) ?></span>
                        <div class="sections-4-readmore">
                            <label for="sections-4-readmore">
                                <input type="checkbox"
                                       name="sections-4-readmore-checkbox"
                                       id="sections-4-readmore-checkbox"
                                       value="yes" <?php if ( isset ( $sections_stored_meta['sections-4-readmore-checkbox'] ) ) {
									checked( $sections_stored_meta['sections-4-readmore-checkbox'][0],
										'yes' );
								} ?> />
								<?php _e( 'Check box to activate read more section.',
									'sections-textdomain' ) ?>
                            </label>
                        </div>

                        </p>

                        <p> <!-- ==== SECTION #4 READ MORE ==== -->

                            <strong><label for="sections-4-readmore"
                                           class="sections-4-readmore"><?php _e( '<strong>Section &#35;4 Read More</strong>',
										'sections-textdomain' ) ?></label></strong>

                            <textarea style="width: 100%;" rows="4"
                                      name="sections-4-readmore"
                                      id="sections-4-readmore"><?php if ( isset ( $sections_stored_meta['sections-4-readmore'] ) ) {
									echo $sections_stored_meta['sections-4-readmore'][0];
								} ?></textarea>

                        </p>

                        <p> <!-- ==== SECTION #4 VIDEO/IMAGE OPTION ==== -->

                            <span class="sections-4-video-image"><?php _e( '<strong>Image or Video?</strong>',
									'sections-textdomain' ) ?></span>
                        <div class="sections-4-video-image">
                            <label for="sections-4-video-image">
                                <input type="checkbox"
                                       name="sections-4-video-image-checkbox"
                                       id="sections-4-video-image-checkbox"
                                       value="yes" <?php if ( isset ( $sections_stored_meta['sections-4-video-image-checkbox'] ) ) {
									checked( $sections_stored_meta['sections-4-video-image-checkbox'][0],
										'yes' );
								} ?> />
								<?php _e( 'Check box if you are importing video. Leave unchecked for image.',
									'sections-textdomain' ) ?>
                            </label>
                        </div>

                        </p>

                        <p> <!-- ==== SECTION #4 IMAGE ==== -->

                            <label for="sections-4-image"
                                   class="sections-4-image"><?php _e( '<strong>Section &#35;4 Image</strong>',
									'sections-textdomain' ); ?></label><br>
                            <input type="text" style="width: 75%;"
                                   name="sections-4-image" id="sections-4-image"
                                   value="<?php if ( isset ( $sections_stored_meta['sections-4-image'] ) ) {
								       echo $sections_stored_meta['sections-4-image'][0];
							       } ?>"/><br><br>
                            <input type="button" id="sections-4-image-button"
                                   class="button"
                                   value="<?php _e( 'Choose or Upload an Image',
								       'sections-textdomain' ); ?>"/>

                        </p>

                        <p> <!-- ==== SECTION #4 VIDEO ==== -->

                            <label for="sections-4-video"
                                   class="sections-4-video"><?php _e( '<strong>Paste implicit video URL here. You can also paste the embed Google Map URL here:</strong>',
									'sections-textdomain' ) ?></label>
                            <input type="url" style="width:50%;"
                                   name="sections-4-video" id="sections-4-video"
                                   value="<?php if ( isset ( $sections_stored_meta['sections-4-video'] ) ) {
								       echo $sections_stored_meta['sections-4-video'][0];
							       } ?>"/>

                        </p>

                    </div> <!-- /#sectionsimages4 -->

                    <!-- ==== SECTION #5 ==== -->
                    <div role="tabpanel" class="tab-pane fade in"
                         id="sectionsimage5">

                        <p> <!-- ==== SECTION #5 OPTION ==== -->

                            <span class="sections-5-option"><?php _e( '<strong>Activate this section?</strong>',
									'sections-textdomain' ) ?></span>
                        <div class="sections-5-option">
                            <label for="sections-5-option">
                                <input type="checkbox"
                                       name="sections-5-option-checkbox"
                                       id="sections-5-option-checkbox"
                                       value="yes" <?php if ( isset ( $sections_stored_meta['sections-5-option-checkbox'] ) ) {
									checked( $sections_stored_meta['sections-5-option-checkbox'][0],
										'yes' );
								} ?> />
								<?php _e( 'Check box to activate this section.',
									'sections-textdomain' ) ?>
                            </label>
                        </div>

                        </p>

                        <p> <!-- ==== SECTION #5 TITLE ==== -->

                            <strong><label for="sections-5-title"
                                           class="sections-5-title"><?php _e( 'Section &#35;5 Title',
										'sections-textdomain' ); ?></label></strong><br>
                            <input style="width:50%;" type="text"
                                   name="sections-5-title" id="sections-5-title"
                                   value="<?php if ( isset ( $sections_stored_meta['sections-5-title'] ) ) {
								       echo $sections_stored_meta['sections-5-title'][0];
							       } ?>"/>

                        </p>

                        <p> <!-- ==== SECTION #5 TEXT AREA ==== -->

                            <strong><label for="sections-5-textarea"
                                           class="sections-5-textarea"><?php _e( 'Section &#35;5 Text Area',
										'sections-textdomain' ) ?></label></strong>

                            <textarea style="width: 100%;" rows="4"
                                      name="sections-5-textarea"
                                      id="sections-5-textarea"><?php if ( isset ( $sections_stored_meta['sections-5-textarea'] ) ) {
									echo $sections_stored_meta['sections-5-textarea'][0];
								} ?></textarea>

                        </p>

                        <p> <!-- ==== SECTION #5 READMORE OPTION ==== -->

                            <span class="sections-5-readmore"><?php _e( '<strong>Read more section?</strong>',
									'sections-textdomain' ) ?></span>
                        <div class="sections-5-readmore">
                            <label for="sections-5-readmore">
                                <input type="checkbox"
                                       name="sections-5-readmore-checkbox"
                                       id="sections-5-readmore-checkbox"
                                       value="yes" <?php if ( isset ( $sections_stored_meta['sections-5-readmore-checkbox'] ) ) {
									checked( $sections_stored_meta['sections-5-readmore-checkbox'][0],
										'yes' );
								} ?> />
								<?php _e( 'Check box to activate read more section.',
									'sections-textdomain' ) ?>
                            </label>
                        </div>

                        </p>

                        <p> <!-- ==== SECTION #5 READ MORE ==== -->

                            <strong><label for="sections-5-readmore"
                                           class="sections-5-readmore"><?php _e( '<strong>Section &#35;5 Read More</strong>',
										'sections-textdomain' ) ?></label></strong>

                            <textarea style="width: 100%;" rows="4"
                                      name="sections-5-readmore"
                                      id="sections-5-readmore"><?php if ( isset ( $sections_stored_meta['sections-5-readmore'] ) ) {
									echo $sections_stored_meta['sections-5-readmore'][0];
								} ?></textarea>

                        </p>

                        <p> <!-- ==== SECTION #5 VIDEO/IMAGE OPTION ==== -->

                            <span class="sections-5-video-image"><?php _e( '<strong>Image or Video?</strong>',
									'sections-textdomain' ) ?></span>
                        <div class="sections-5-video-image">
                            <label for="sections-5-video-image">
                                <input type="checkbox"
                                       name="sections-5-video-image-checkbox"
                                       id="sections-5-video-image-checkbox"
                                       value="yes" <?php if ( isset ( $sections_stored_meta['sections-5-video-image-checkbox'] ) ) {
									checked( $sections_stored_meta['sections-5-video-image-checkbox'][0],
										'yes' );
								} ?> />
								<?php _e( 'Check box if you are importing video. Leave unchecked for image.',
									'sections-textdomain' ) ?>
                            </label>
                        </div>

                        </p>

                        <p> <!-- ==== SECTION #5 IMAGE ==== -->

                            <label for="sections-5-image"
                                   class="sections-5-image"><?php _e( '<strong>Section &#35;5 Image</strong>',
									'sections-textdomain' ); ?></label><br>
                            <input type="text" style="width: 75%;"
                                   name="sections-5-image" id="sections-5-image"
                                   value="<?php if ( isset ( $sections_stored_meta['sections-5-image'] ) ) {
								       echo $sections_stored_meta['sections-5-image'][0];
							       } ?>"/><br><br>
                            <input type="button" id="sections-5-image-button"
                                   class="button"
                                   value="<?php _e( 'Choose or Upload an Image',
								       'sections-textdomain' ); ?>"/>

                        </p>

                        <p> <!-- ==== SECTION #5 VIDEO ==== -->

                            <label for="sections-5-video"
                                   class="sections-5-video"><?php _e( '<strong>Paste implicit video URL here. You can also paste the embed Google Map URL here:</strong>',
									'sections-textdomain' ) ?></label>
                            <input type="url" style="width:50%;"
                                   name="sections-5-video" id="sections-5-video"
                                   value="<?php if ( isset ( $sections_stored_meta['sections-5-video'] ) ) {
								       echo $sections_stored_meta['sections-5-video'][0];
							       } ?>"/>

                        </p>

                    </div> <!-- /#sectionsimages5 -->

                    <!-- ==== SECTION #6 ==== -->
                    <div role="tabpanel" class="tab-pane fade in"
                         id="sectionsimage6">

                        <p> <!-- ==== SECTION #6 OPTION ==== -->

                            <span class="sections-6-option"><?php _e( '<strong>Activate this section?</strong>',
									'sections-textdomain' ) ?></span>
                        <div class="sections-6-option">
                            <label for="sections-6-option">
                                <input type="checkbox"
                                       name="sections-6-option-checkbox"
                                       id="sections-6-option-checkbox"
                                       value="yes" <?php if ( isset ( $sections_stored_meta['sections-6-option-checkbox'] ) ) {
									checked( $sections_stored_meta['sections-6-option-checkbox'][0],
										'yes' );
								} ?> />
								<?php _e( 'Check box to activate this section.',
									'sections-textdomain' ) ?>
                            </label>
                        </div>

                        </p>

                        <p> <!-- ==== SECTION #6 TITLE ==== -->

                            <strong><label for="sections-6-title"
                                           class="sections-6-title"><?php _e( 'Section &#35;6 Title',
										'sections-textdomain' ); ?></label></strong><br>
                            <input style="width:50%;" type="text"
                                   name="sections-6-title" id="sections-6-title"
                                   value="<?php if ( isset ( $sections_stored_meta['sections-6-title'] ) ) {
								       echo $sections_stored_meta['sections-6-title'][0];
							       } ?>"/>

                        </p>

                        <p> <!-- ==== SECTION #6 TEXT AREA ==== -->

                            <strong><label for="sections-6-textarea"
                                           class="sections-6-textarea"><?php _e( 'Section &#35;6 Text Area',
										'sections-textdomain' ) ?></label></strong>

                            <textarea style="width: 100%;" rows="4"
                                      name="sections-6-textarea"
                                      id="sections-6-textarea"><?php if ( isset ( $sections_stored_meta['sections-6-textarea'] ) ) {
									echo $sections_stored_meta['sections-6-textarea'][0];
								} ?></textarea>

                        </p>

                        <p> <!-- ==== SECTION #6 READMORE OPTION ==== -->

                            <span class="sections-6-readmore"><?php _e( '<strong>Read more section?</strong>',
									'sections-textdomain' ) ?></span>
                        <div class="sections-6-readmore">
                            <label for="sections-6-readmore">
                                <input type="checkbox"
                                       name="sections-6-readmore-checkbox"
                                       id="sections-6-readmore-checkbox"
                                       value="yes" <?php if ( isset ( $sections_stored_meta['sections-6-readmore-checkbox'] ) ) {
									checked( $sections_stored_meta['sections-6-readmore-checkbox'][0],
										'yes' );
								} ?> />
								<?php _e( 'Check box to activate read more section.',
									'sections-textdomain' ) ?>
                            </label>
                        </div>

                        </p>

                        <p> <!-- ==== SECTION #6 READ MORE ==== -->

                            <strong><label for="sections-6-readmore"
                                           class="sections-6-readmore"><?php _e( '<strong>Section &#35;6 Read More</strong>',
										'sections-textdomain' ) ?></label></strong>

                            <textarea style="width: 100%;" rows="4"
                                      name="sections-6-readmore"
                                      id="sections-6-readmore"><?php if ( isset ( $sections_stored_meta['sections-6-readmore'] ) ) {
									echo $sections_stored_meta['sections-6-readmore'][0];
								} ?></textarea>

                        </p>

                        <p> <!-- ==== SECTION #6 VIDEO/IMAGE OPTION ==== -->

                            <span class="sections-6-video-image"><?php _e( '<strong>Image or Video?</strong>',
									'sections-textdomain' ) ?></span>
                        <div class="sections-6-video-image">
                            <label for="sections-6-video-image">
                                <input type="checkbox"
                                       name="sections-6-video-image-checkbox"
                                       id="sections-6-video-image-checkbox"
                                       value="yes" <?php if ( isset ( $sections_stored_meta['sections-6-video-image-checkbox'] ) ) {
									checked( $sections_stored_meta['sections-6-video-image-checkbox'][0],
										'yes' );
								} ?> />
								<?php _e( 'Check box if you are importing video. Leave unchecked for image.',
									'sections-textdomain' ) ?>
                            </label>
                        </div>

                        </p>

                        <p> <!-- ==== SECTION #6 IMAGE ==== -->

                            <label for="sections-6-image"
                                   class="sections-6-image"><?php _e( '<strong>Section &#35;6 Image</strong>',
									'sections-textdomain' ); ?></label><br>
                            <input type="text" style="width: 75%;"
                                   name="sections-6-image" id="sections-6-image"
                                   value="<?php if ( isset ( $sections_stored_meta['sections-6-image'] ) ) {
								       echo $sections_stored_meta['sections-6-image'][0];
							       } ?>"/><br><br>
                            <input type="button" id="sections-6-image-button"
                                   class="button"
                                   value="<?php _e( 'Choose or Upload an Image',
								       'sections-textdomain' ); ?>"/>

                        </p>

                        <p> <!-- ==== SECTION #6 VIDEO ==== -->

                            <label for="sections-6-video"
                                   class="sections-6-video"><?php _e( '<strong>Paste implicit video URL here. You can also paste the embed Google Map URL here:</strong>',
									'sections-textdomain' ) ?></label>
                            <input type="url" style="width:50%;"
                                   name="sections-6-video" id="sections-6-video"
                                   value="<?php if ( isset ( $sections_stored_meta['sections-6-video'] ) ) {
								       echo $sections_stored_meta['sections-6-video'][0];
							       } ?>"/>

                        </p>

                    </div> <!-- /#sectionsimages6 -->

                    <!-- ==== SECTION #7 ==== -->
                    <div role="tabpanel" class="tab-pane fade in"
                         id="sectionsimage7">

                        <p> <!-- ==== SECTION #7 OPTION ==== -->

                            <span class="sections-7-option"><?php _e( '<strong>Activate this section?</strong>',
									'sections-textdomain' ) ?></span>
                        <div class="sections-7-option">
                            <label for="sections-7-option">
                                <input type="checkbox"
                                       name="sections-7-option-checkbox"
                                       id="sections-7-option-checkbox"
                                       value="yes" <?php if ( isset ( $sections_stored_meta['sections-7-option-checkbox'] ) ) {
									checked( $sections_stored_meta['sections-7-option-checkbox'][0],
										'yes' );
								} ?> />
								<?php _e( 'Check box to activate this section.',
									'sections-textdomain' ) ?>
                            </label>
                        </div>

                        </p>

                        <p> <!-- ==== SECTION #7 TITLE ==== -->

                            <strong><label for="sections-7-title"
                                           class="sections-7-title"><?php _e( 'Section &#35;7 Title',
										'sections-textdomain' ); ?></label></strong><br>
                            <input style="width:50%;" type="text"
                                   name="sections-7-title" id="sections-7-title"
                                   value="<?php if ( isset ( $sections_stored_meta['sections-7-title'] ) ) {
								       echo $sections_stored_meta['sections-7-title'][0];
							       } ?>"/>

                        </p>

                        <p> <!-- ==== SECTION #7 TEXT AREA ==== -->

                            <strong><label for="sections-7-textarea"
                                           class="sections-7-textarea"><?php _e( 'Section &#35;7 Text Area',
										'sections-textdomain' ) ?></label></strong>

                            <textarea style="width: 100%;" rows="4"
                                      name="sections-7-textarea"
                                      id="sections-7-textarea"><?php if ( isset ( $sections_stored_meta['sections-7-textarea'] ) ) {
									echo $sections_stored_meta['sections-7-textarea'][0];
								} ?></textarea>

                        </p>

                        <p> <!-- ==== SECTION #7 READMORE OPTION ==== -->

                            <span class="sections-7-readmore"><?php _e( '<strong>Read more section?</strong>',
									'sections-textdomain' ) ?></span>
                        <div class="sections-7-readmore">
                            <label for="sections-7-readmore">
                                <input type="checkbox"
                                       name="sections-7-readmore-checkbox"
                                       id="sections-7-readmore-checkbox"
                                       value="yes" <?php if ( isset ( $sections_stored_meta['sections-7-readmore-checkbox'] ) ) {
									checked( $sections_stored_meta['sections-7-readmore-checkbox'][0],
										'yes' );
								} ?> />
								<?php _e( 'Check box to activate read more section.',
									'sections-textdomain' ) ?>
                            </label>
                        </div>

                        </p>

                        <p> <!-- ==== SECTION #7 READ MORE ==== -->

                            <strong><label for="sections-7-readmore"
                                           class="sections-7-readmore"><?php _e( '<strong>Section &#35;7 Read More</strong>',
										'sections-textdomain' ) ?></label></strong>

                            <textarea style="width: 100%;" rows="4"
                                      name="sections-7-readmore"
                                      id="sections-7-readmore"><?php if ( isset ( $sections_stored_meta['sections-7-readmore'] ) ) {
									echo $sections_stored_meta['sections-7-readmore'][0];
								} ?></textarea>

                        </p>

                        <p> <!-- ==== SECTION #7 VIDEO/IMAGE OPTION ==== -->

                            <span class="sections-7-video-image"><?php _e( '<strong>Image or Video?</strong>',
									'sections-textdomain' ) ?></span>
                        <div class="sections-7-video-image">
                            <label for="sections-7-video-image">
                                <input type="checkbox"
                                       name="sections-7-video-image-checkbox"
                                       id="sections-7-video-image-checkbox"
                                       value="yes" <?php if ( isset ( $sections_stored_meta['sections-7-video-image-checkbox'] ) ) {
									checked( $sections_stored_meta['sections-7-video-image-checkbox'][0],
										'yes' );
								} ?> />
								<?php _e( 'Check box if you are importing video. Leave unchecked for image.',
									'sections-textdomain' ) ?>
                            </label>
                        </div>

                        </p>

                        <p> <!-- ==== SECTION #7 IMAGE ==== -->

                            <label for="sections-7-image"
                                   class="sections-7-image"><?php _e( '<strong>Section &#35;7 Image</strong>',
									'sections-textdomain' ); ?></label><br>
                            <input type="text" style="width: 75%;"
                                   name="sections-7-image" id="sections-7-image"
                                   value="<?php if ( isset ( $sections_stored_meta['sections-7-image'] ) ) {
								       echo $sections_stored_meta['sections-7-image'][0];
							       } ?>"/><br><br>
                            <input type="button" id="sections-7-image-button"
                                   class="button"
                                   value="<?php _e( 'Choose or Upload an Image',
								       'sections-textdomain' ); ?>"/>

                        </p>

                        <p> <!-- ==== SECTION #7 VIDEO ==== -->

                            <label for="sections-7-video"
                                   class="sections-7-video"><?php _e( '<strong>Paste implicit video URL here. You can also paste the embed Google Map URL here:</strong>',
									'sections-textdomain' ) ?></label>
                            <input type="url" style="width:50%;"
                                   name="sections-7-video" id="sections-7-video"
                                   value="<?php if ( isset ( $sections_stored_meta['sections-7-video'] ) ) {
								       echo $sections_stored_meta['sections-7-video'][0];
							       } ?>"/>

                        </p>

                    </div> <!-- /#sectionsimages7 -->

                    <!-- ==== SECTION #8 ==== -->
                    <div role="tabpanel" class="tab-pane fade in"
                         id="sectionsimage8">

                        <p> <!-- ==== SECTION #8 OPTION ==== -->

                            <span class="sections-8-option"><?php _e( '<strong>Activate this section?</strong>',
									'sections-textdomain' ) ?></span>
                        <div class="sections-8-option">
                            <label for="sections-8-option">
                                <input type="checkbox"
                                       name="sections-8-option-checkbox"
                                       id="sections-8-option-checkbox"
                                       value="yes" <?php if ( isset ( $sections_stored_meta['sections-8-option-checkbox'] ) ) {
									checked( $sections_stored_meta['sections-8-option-checkbox'][0],
										'yes' );
								} ?> />
								<?php _e( 'Check box to activate this section.',
									'sections-textdomain' ) ?>
                            </label>
                        </div>

                        </p>

                        <p> <!-- ==== SECTION #8 TITLE ==== -->

                            <strong><label for="sections-8-title"
                                           class="sections-8-title"><?php _e( 'Section &#35;8 Title',
										'sections-textdomain' ); ?></label></strong><br>
                            <input style="width:50%;" type="text"
                                   name="sections-8-title" id="sections-8-title"
                                   value="<?php if ( isset ( $sections_stored_meta['sections-8-title'] ) ) {
								       echo $sections_stored_meta['sections-8-title'][0];
							       } ?>"/>

                        </p>

                        <p> <!-- ==== SECTION #8 TEXT AREA ==== -->

                            <strong><label for="sections-8-textarea"
                                           class="sections-8-textarea"><?php _e( 'Section &#35;8 Text Area',
										'sections-textdomain' ) ?></label></strong>

                            <textarea style="width: 100%;" rows="4"
                                      name="sections-8-textarea"
                                      id="sections-8-textarea"><?php if ( isset ( $sections_stored_meta['sections-8-textarea'] ) ) {
									echo $sections_stored_meta['sections-8-textarea'][0];
								} ?></textarea>

                        </p>

                        <p> <!-- ==== SECTION #8 READMORE OPTION ==== -->

                            <span class="sections-8-readmore"><?php _e( '<strong>Read more section?</strong>',
									'sections-textdomain' ) ?></span>
                        <div class="sections-8-readmore">
                            <label for="sections-8-readmore">
                                <input type="checkbox"
                                       name="sections-8-readmore-checkbox"
                                       id="sections-8-readmore-checkbox"
                                       value="yes" <?php if ( isset ( $sections_stored_meta['sections-8-readmore-checkbox'] ) ) {
									checked( $sections_stored_meta['sections-8-readmore-checkbox'][0],
										'yes' );
								} ?> />
								<?php _e( 'Check box to activate read more section.',
									'sections-textdomain' ) ?>
                            </label>
                        </div>

                        </p>

                        <p> <!-- ==== SECTION #8 READ MORE ==== -->

                            <strong><label for="sections-8-readmore"
                                           class="sections-8-readmore"><?php _e( '<strong>Section &#35;8 Read More</strong>',
										'sections-textdomain' ) ?></label></strong>

                            <textarea style="width: 100%;" rows="4"
                                      name="sections-8-readmore"
                                      id="sections-8-readmore"><?php if ( isset ( $sections_stored_meta['sections-8-readmore'] ) ) {
									echo $sections_stored_meta['sections-8-readmore'][0];
								} ?></textarea>

                        </p>

                        <p> <!-- ==== SECTION #8 VIDEO/IMAGE OPTION ==== -->

                            <span class="sections-8-video-image"><?php _e( '<strong>Image or Video?</strong>',
									'sections-textdomain' ) ?></span>
                        <div class="sections-8-video-image">
                            <label for="sections-8-video-image">
                                <input type="checkbox"
                                       name="sections-8-video-image-checkbox"
                                       id="sections-8-video-image-checkbox"
                                       value="yes" <?php if ( isset ( $sections_stored_meta['sections-8-video-image-checkbox'] ) ) {
									checked( $sections_stored_meta['sections-8-video-image-checkbox'][0],
										'yes' );
								} ?> />
								<?php _e( 'Check box if you are importing video. Leave unchecked for image.',
									'sections-textdomain' ) ?>
                            </label>
                        </div>

                        </p>

                        <p> <!-- ==== SECTION #8 IMAGE ==== -->

                            <label for="sections-8-image"
                                   class="sections-8-image"><?php _e( '<strong>Section &#35;8 Image</strong>',
									'sections-textdomain' ); ?></label><br>
                            <input type="text" style="width: 75%;"
                                   name="sections-8-image" id="sections-8-image"
                                   value="<?php if ( isset ( $sections_stored_meta['sections-8-image'] ) ) {
								       echo $sections_stored_meta['sections-8-image'][0];
							       } ?>"/><br><br>
                            <input type="button" id="sections-8-image-button"
                                   class="button"
                                   value="<?php _e( 'Choose or Upload an Image',
								       'sections-textdomain' ); ?>"/>

                        </p>

                        <p> <!-- ==== SECTION #8 VIDEO ==== -->

                            <label for="sections-8-video"
                                   class="sections-8-video"><?php _e( '<strong>Paste implicit video URL here. You can also paste the embed Google Map URL here:</strong>',
									'sections-textdomain' ) ?></label>
                            <input type="url" style="width:50%;"
                                   name="sections-8-video" id="sections-8-video"
                                   value="<?php if ( isset ( $sections_stored_meta['sections-5-video'] ) ) {
								       echo $sections_stored_meta['sections-8-video'][0];
							       } ?>"/>

                        </p>

                    </div> <!-- /#sectionsimages8 -->

                    <!-- ==== SECTION #9 ==== -->
                    <div role="tabpanel" class="tab-pane fade in"
                         id="sectionsimage9">

                        <p> <!-- ==== SECTION #9 OPTION ==== -->

                            <span class="sections-9-option"><?php _e( '<strong>Activate this section?</strong>',
									'sections-textdomain' ) ?></span>
                        <div class="sections-9-option">
                            <label for="sections-9-option">
                                <input type="checkbox"
                                       name="sections-9-option-checkbox"
                                       id="sections-9-option-checkbox"
                                       value="yes" <?php if ( isset ( $sections_stored_meta['sections-9-option-checkbox'] ) ) {
									checked( $sections_stored_meta['sections-9-option-checkbox'][0],
										'yes' );
								} ?> />
								<?php _e( 'Check box to activate this section.',
									'sections-textdomain' ) ?>
                            </label>
                        </div>

                        </p>

                        <p> <!-- ==== SECTION #9 TITLE ==== -->

                            <strong><label for="sections-9-title"
                                           class="sections-9-title"><?php _e( 'Section &#35;9 Title',
										'sections-textdomain' ); ?></label></strong><br>
                            <input style="width:50%;" type="text"
                                   name="sections-9-title" id="sections-9-title"
                                   value="<?php if ( isset ( $sections_stored_meta['sections-9-title'] ) ) {
								       echo $sections_stored_meta['sections-9-title'][0];
							       } ?>"/>

                        </p>

                        <p> <!-- ==== SECTION #9 TEXT AREA ==== -->

                            <strong><label for="sections-9-textarea"
                                           class="sections-9-textarea"><?php _e( 'Section &#35;9 Text Area',
										'sections-textdomain' ) ?></label></strong>

                            <textarea style="width: 100%;" rows="4"
                                      name="sections-9-textarea"
                                      id="sections-9-textarea"><?php if ( isset ( $sections_stored_meta['sections-9-textarea'] ) ) {
									echo $sections_stored_meta['sections-9-textarea'][0];
								} ?></textarea>

                        </p>

                        <p> <!-- ==== SECTION #9 READMORE OPTION ==== -->

                            <span class="sections-9-readmore"><?php _e( '<strong>Read more section?</strong>',
									'sections-textdomain' ) ?></span>
                        <div class="sections-9-readmore">
                            <label for="sections-9-readmore">
                                <input type="checkbox"
                                       name="sections-9-readmore-checkbox"
                                       id="sections-9-readmore-checkbox"
                                       value="yes" <?php if ( isset ( $sections_stored_meta['sections-9-readmore-checkbox'] ) ) {
									checked( $sections_stored_meta['sections-9-readmore-checkbox'][0],
										'yes' );
								} ?> />
								<?php _e( 'Check box to activate read more section.',
									'sections-textdomain' ) ?>
                            </label>
                        </div>

                        </p>

                        <p> <!-- ==== SECTION #9 READ MORE ==== -->

                            <strong><label for="sections-9-readmore"
                                           class="sections-9-readmore"><?php _e( '<strong>Section &#35;9 Read More</strong>',
										'sections-textdomain' ) ?></label></strong>

                            <textarea style="width: 100%;" rows="4"
                                      name="sections-9-readmore"
                                      id="sections-9-readmore"><?php if ( isset ( $sections_stored_meta['sections-9-readmore'] ) ) {
									echo $sections_stored_meta['sections-9-readmore'][0];
								} ?></textarea>

                        </p>

                        <p> <!-- ==== SECTION #9 VIDEO/IMAGE OPTION ==== -->

                            <span class="sections-9-video-image"><?php _e( '<strong>Image or Video?</strong>',
									'sections-textdomain' ) ?></span>
                        <div class="sections-9-video-image">
                            <label for="sections-9-video-image">
                                <input type="checkbox"
                                       name="sections-9-video-image-checkbox"
                                       id="sections-9-video-image-checkbox"
                                       value="yes" <?php if ( isset ( $sections_stored_meta['sections-9-video-image-checkbox'] ) ) {
									checked( $sections_stored_meta['sections-9-video-image-checkbox'][0],
										'yes' );
								} ?> />
								<?php _e( 'Check box if you are importing video. Leave unchecked for image.',
									'sections-textdomain' ) ?>
                            </label>
                        </div>

                        </p>

                        <p> <!-- ==== SECTION #9 IMAGE ==== -->

                            <label for="sections-9-image"
                                   class="sections-9-image"><?php _e( '<strong>Section &#35;9 Image</strong>',
									'sections-textdomain' ); ?></label><br>
                            <input type="text" style="width: 75%;"
                                   name="sections-9-image" id="sections-9-image"
                                   value="<?php if ( isset ( $sections_stored_meta['sections-9-image'] ) ) {
								       echo $sections_stored_meta['sections-9-image'][0];
							       } ?>"/><br><br>
                            <input type="button" id="sections-9-image-button"
                                   class="button"
                                   value="<?php _e( 'Choose or Upload an Image',
								       'sections-textdomain' ); ?>"/>

                        </p>

                        <p> <!-- ==== SECTION #9 VIDEO ==== -->

                            <label for="sections-9-video"
                                   class="sections-9-video"><?php _e( '<strong>Paste implicit video URL here. You can also paste the embed Google Map URL here:</strong>',
									'sections-textdomain' ) ?></label>
                            <input type="url" style="width:50%;"
                                   name="sections-9-video" id="sections-9-video"
                                   value="<?php if ( isset ( $sections_stored_meta['sections-9-video'] ) ) {
								       echo $sections_stored_meta['sections-9-video'][0];
							       } ?>"/>

                        </p>

                    </div> <!-- /#sectionsimages9 -->

                    <!-- ==== SECTION #10 ==== -->
                    <div role="tabpanel" class="tab-pane fade in"
                         id="sectionsimage10">

                        <p> <!-- ==== SECTION #10 OPTION ==== -->

                            <span class="sections-10-option"><?php _e( '<strong>Activate this section?</strong>',
									'sections-textdomain' ) ?></span>
                        <div class="sections-10-option">
                            <label for="sections-10-option">
                                <input type="checkbox"
                                       name="sections-10-option-checkbox"
                                       id="sections-10-option-checkbox"
                                       value="yes" <?php if ( isset ( $sections_stored_meta['sections-10-option-checkbox'] ) ) {
									checked( $sections_stored_meta['sections-10-option-checkbox'][0],
										'yes' );
								} ?> />
								<?php _e( 'Check box to activate this section.',
									'sections-textdomain' ) ?>
                            </label>
                        </div>

                        </p>

                        <p> <!-- ==== SECTION #10 TITLE ==== -->

                            <strong><label for="sections-10-title"
                                           class="sections-10-title"><?php _e( 'Section &#35;10 Title',
										'sections-textdomain' ); ?></label></strong><br>
                            <input style="width:50%;" type="text"
                                   name="sections-10-title"
                                   id="sections-10-title"
                                   value="<?php if ( isset ( $sections_stored_meta['sections-10-title'] ) ) {
								       echo $sections_stored_meta['sections-10-title'][0];
							       } ?>"/>

                        </p>

                        <p> <!-- ==== SECTION #10 TEXT AREA ==== -->

                            <strong><label for="sections-10-textarea"
                                           class="sections-10-textarea"><?php _e( 'Section &#35;10 Text Area',
										'sections-textdomain' ) ?></label></strong>

                            <textarea style="width: 100%;" rows="4"
                                      name="sections-10-textarea"
                                      id="sections-10-textarea"><?php if ( isset ( $sections_stored_meta['sections-10-textarea'] ) ) {
									echo $sections_stored_meta['sections-10-textarea'][0];
								} ?></textarea>

                        </p>

                        <p> <!-- ==== SECTION #10 READMORE OPTION ==== -->

                            <span class="sections-10-readmore"><?php _e( '<strong>Read more section?</strong>',
									'sections-textdomain' ) ?></span>
                        <div class="sections-10-readmore">
                            <label for="sections-10-readmore">
                                <input type="checkbox"
                                       name="sections-10-readmore-checkbox"
                                       id="sections-10-readmore-checkbox"
                                       value="yes" <?php if ( isset ( $sections_stored_meta['sections-10-readmore-checkbox'] ) ) {
									checked( $sections_stored_meta['sections-10-readmore-checkbox'][0],
										'yes' );
								} ?> />
								<?php _e( 'Check box to activate read more section.',
									'sections-textdomain' ) ?>
                            </label>
                        </div>

                        </p>

                        <p> <!-- ==== SECTION #10 READ MORE ==== -->

                            <strong><label for="sections-10-readmore"
                                           class="sections-10-readmore"><?php _e( '<strong>Section &#35;10 Read More</strong>',
										'sections-textdomain' ) ?></label></strong>

                            <textarea style="width: 100%;" rows="4"
                                      name="sections-10-readmore"
                                      id="sections-10-readmore"><?php if ( isset ( $sections_stored_meta['sections-10-readmore'] ) ) {
									echo $sections_stored_meta['sections-10-readmore'][0];
								} ?></textarea>

                        </p>

                        <p> <!-- ==== SECTION #10 VIDEO/IMAGE OPTION ==== -->

                            <span class="sections-10-video-image"><?php _e( '<strong>Image or Video?</strong>',
									'sections-textdomain' ) ?></span>
                        <div class="sections-10-video-image">
                            <label for="sections-10-video-image">
                                <input type="checkbox"
                                       name="sections-10-video-image-checkbox"
                                       id="sections-10-video-image-checkbox"
                                       value="yes" <?php if ( isset ( $sections_stored_meta['sections-10-video-image-checkbox'] ) ) {
									checked( $sections_stored_meta['sections-10-video-image-checkbox'][0],
										'yes' );
								} ?> />
								<?php _e( 'Check box if you are importing video. Leave unchecked for image.',
									'sections-textdomain' ) ?>
                            </label>
                        </div>

                        </p>

                        <p> <!-- ==== SECTION #10 IMAGE ==== -->

                            <label for="sections-10-image"
                                   class="sections-10-image"><?php _e( '<strong>Section &#35;10 Image</strong>',
									'sections-textdomain' ); ?></label><br>
                            <input type="text" style="width: 75%;"
                                   name="sections-10-image"
                                   id="sections-10-image"
                                   value="<?php if ( isset ( $sections_stored_meta['sections-10-image'] ) ) {
								       echo $sections_stored_meta['sections-10-image'][0];
							       } ?>"/><br><br>
                            <input type="button" id="sections-10-image-button"
                                   class="button"
                                   value="<?php _e( 'Choose or Upload an Image',
								       'sections-textdomain' ); ?>"/>

                        </p>

                        <p> <!-- ==== SECTION #10 VIDEO ==== -->

                            <label for="sections-10-video"
                                   class="sections-10-video"><?php _e( '<strong>Paste implicit video URL here. You can also paste the embed Google Map URL here:</strong>',
									'sections-textdomain' ) ?></label>
                            <input type="url" style="width:50%;"
                                   name="sections-10-video"
                                   id="sections-10-video"
                                   value="<?php if ( isset ( $sections_stored_meta['sections-10-video'] ) ) {
								       echo $sections_stored_meta['sections-10-video'][0];
							       } ?>"/>

                        </p>

                    </div> <!-- /#sectionsimages10 -->

                </div> <!-- /.tab-content -->
            </div> <!-- /.pnael-body boof -->
        </div> <!-- /.pnael-heading -->
    </div>

<?php }
