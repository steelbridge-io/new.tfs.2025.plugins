<?php
    /**
     * Adds a meta box to the post editing screen
     */
    ob_implicit_flush(true);
    include(plugin_dir_path(__FILE__) . '../inc/sanitize_multi_dest.php');

    add_action('add_meta_boxes',
            'multi_dest_field');
    function multi_dest_field()
    {
        global $post;

        if (!empty($post)) {
            $pageTemplate = get_post_meta($post->ID,
                    '_wp_page_template',
                    true);
            $types = array('post', 'page', 'travel_cpt', 'schools_cpt', 'adventures', 'guide_service', 'fishcamp_cpt', 'travel-blog');
            foreach ($types
                     as
                     $type)
            {
                if ($pageTemplate == 'page-templates/multi-destination-template.php') {
                    add_meta_box('multi_dest_meta',
                            __('Content &amp; Images',
                                    'the-fly-shop'),
                            'multi_dest_callback',
                            $type,
                            'normal',
                            'high');
                }
            }
        }
    }

    // Outputs the content of the meta box
    function multi_dest_callback($post)
    {
        wp_nonce_field(basename(__FILE__),
                'multi_dest_nonce');
        $multi_dest_stored_meta = get_post_meta($post->ID); ?>

        <!-- ==== START META CONTENT ==== -->

        <div style="margin-top: 1.618em;">
            <h1>Multi Destination Template Content</h1>
        </div>
        <div class="sections-meta-cont">
            <strong><label for="sections-video" class="sections-row-title"><?php _e('Hero Video URL',
                            'the-fly-shop'); ?></label></strong>
            <input style="width:100%;" type="url" name="sections-video" id="sections-video"
                   value="<?php if (isset ($multi_dest_stored_meta['sections-video'])) {
                       echo $multi_dest_stored_meta['sections-video'][0];
                   } ?>"/>
            <p class="meta-description">Add video url here. Video url is associated with media stored in a bucket at AWS
                or Google Cloud. Do not enter YouTube or Vimeo urls. Ensure featured image is empty as well as Sections
                Template Hero Image.</p>
        </div>
        <div class="sections-meta-cont">
            <strong><label for="sections-video-poster" class="sections-row-title"><?php _e('Hero Video Poster',
                            'the-fly-shop'); ?></label></strong><br>
            <input style="width:75%;" type="text" name="sections-video-poster" id="sections-video-poster"
                   value="<?php if (isset ($multi_dest_stored_meta['sections-video-poster'])) {
                       echo $multi_dest_stored_meta['sections-video-poster'][0];
                   } ?>"/>
            <input type="button" id="sections-video-poster-button" class="button"
                   value="<?php _e('Choose or Upload an Image',
                           'the-fly-shop'); ?>"/>
            <p class="meta-description">Add an image here that is used on mobile devices. Mobile devices do not
                auto-play video. The "Poster" image is returned on mobile devices when a video is presented on tablets
                and desktop.</p>
        </div>

        <!-- ****
        Tabbed section for optional carousel
        **** -->
        <!-- ./panel with-nav-tabs panel-default -->

        <hr style="margin-top: 1.618em; border-top: 3px double #8c8b8b;">

        <div class="panel with-nav-tabs panel-default">
            <div class="panel-heading">
                <!-- Nav tabs -->
                <ul class="nav nav-tabs" role="tablist">
                    <li role="presentation" class="active"><a href="#sectionsimage1" aria-controls="sectionsimage1"
                                                              role="tab" data-toggle="tab">Section
                            &#35;1</a></li>
                    <li role="presentation"><a href="#sectionsimage2" aria-controls="sectionsimage2" role="tab"
                                               data-toggle="tab">Section &#35;2</a></li>
                    <li role="presentation"><a href="#sectionsimage3" aria-controls="sectionsimage3" role="tab"
                                               data-toggle="tab">Section &#35;3</a></li>
                    <li role="presentation"><a href="#sectionsimage4" aria-controls="sectionsimage4" role="tab"
                                               data-toggle="tab">Section &#35;4</a></li>
                    <li role="presentation"><a href="#sectionsimage5" aria-controls="sectionsimage5" role="tab"
                                               data-toggle="tab">Section &#35;5</a></li>
                    <li role="presentation"><a href="#sectionsimage6" aria-controls="sectionsimage6" role="tab"
                                               data-toggle="tab">Section &#35;6</a></li>
                    <li role="presentation"><a href="#sectionsimage7" aria-controls="sectionsimage7" role="tab"
                                               data-toggle="tab">Section &#35;7</a></li>
                    <li role="presentation"><a href="#sectionsimage8" aria-controls="sectionsimage8" role="tab"
                                               data-toggle="tab">Section &#35;8</a></li>
                    <li role="presentation"><a href="#sectionsimage9" aria-controls="sectionsimage9" role="tab"
                                               data-toggle="tab">Section &#35;9</a></li>
                    <li role="presentation"><a href="#sectionsimage10" aria-controls="sectionsimage10" role="tab"
                                               data-toggle="tab">Section &#35;10</a>
                    </li>
                </ul>

                <div class="panel-body boof">
                    <div class="tab-content">

                        <!-- ==== SECTION #1 ==== -->
                        <div role="tabpanel" class="tab-pane fade in active" id="sectionsimage1">
                            <p><strong style="color: red;">This section overrides the carousel. If you are not seeing content added to the carousel, make sure this section is emmpty.</strong></p>

                            <p> <!-- ==== SECTION #1 TITLE ==== -->

                                <strong><label for="sections-1-title"
                                               class="sections-1-title"><?php _e('Section &#35;1 Title',
                                                'the-fly-shop'); ?></label></strong><br>
                                <input style="width:50%;" type="text" name="sections-1-title" id="sections-1-title"
                                       value="<?php if (isset ($multi_dest_stored_meta['sections-1-title'])) {
                                           echo $multi_dest_stored_meta['sections-1-title'][0];
                                       } ?>"/>

                            </p>

                            <p> <!-- ==== SECTION #1 TEXT AREA ==== -->

                                <strong><label for="sections-1-textarea"
                                               class="sections-1-textarea"><?php _e('Section &#35;1 Text Area',
                                                'the-fly-shop') ?></label></strong>

                                <textarea style="width: 100%;" rows="4" name="sections-1-textarea"
                                          id="sections-1-textarea"><?php if (isset ($multi_dest_stored_meta['sections-1-textarea'])) {
                                        echo $multi_dest_stored_meta['sections-1-textarea'][0];
                                    } ?></textarea>

                            </p>

                            <p> <!-- ==== SECTION #1 READ MORE ==== -->

                                <strong><label for="sections-1-readmore"
                                               class="sections-1-readmore"><?php _e('<strong>Section &#35;1 Read More</strong>',
                                                'the-fly-shop') ?></label></strong>

                                <textarea style="width: 100%;" rows="4" name="sections-1-readmore"
                                          id="sections-1-readmore"><?php if (isset ($multi_dest_stored_meta['sections-1-readmore'])) {
                                        echo $multi_dest_stored_meta['sections-1-readmore'][0];
                                    } ?></textarea>

                            </p>

                            <p> <!-- ==== SECTION #1 IMAGE ==== -->

                                <label for="sections-1-image"
                                       class="sections-1-image"><?php _e('<strong>Section &#35;1 Image</strong>',
                                            'the-fly-shop'); ?></label><br>
                                <input type="text" style="width: 75%;" name="sections-1-image" id="sections-1-image"
                                       value="<?php if (isset ($multi_dest_stored_meta['sections-1-image'])) {
                                           echo $multi_dest_stored_meta['sections-1-image'][0];
                                       } ?>"/><br><br>
                                <input type="button" id="sections-1-image-button" class="button"
                                       value="<?php _e('Choose or Upload an Image',
                                               'the-fly-shop'); ?>"/>

                            </p>

                            <p> <!-- ==== SECTION #1 VIDEO ==== -->

                                <label for="sections-1-video"
                                       class="sections-1-video"><?php _e('<strong>Paste implicit video URL here. You can also paste the embed Google Map URL here:</strong>',
                                            'the-fly-shop') ?></label>
                                <input type="url" style="width:50%;" name="sections-1-video" id="sections-1-video"
                                       value="<?php if (isset ($multi_dest_stored_meta['sections-1-video'])) {
                                           echo $multi_dest_stored_meta['sections-1-video'][0];
                                       } ?>"/>

                            </p>

                            <hr style="margin-top: 1.618em; border-top: 3px double #8c8b8b;">
                            <h2 class="section-title-h2">Multi-Destination Carousel &amp; Content</h2>

                            <div class="sections-meta-cont"> <!-- ====  SECTION #1 CAROUSEL IMAGE #1 ==== -->

                                <label for="sec1-dest-img-1"
                                       class="sec1-dest-img-1"><?php _e('<strong>Section &#35;1 - Carousel Image &#35;1</strong>',
                                            'the-fly-shop'); ?></label><br>
                                <input type="text" style="width: 75%;" name="sec1-dest-img-1"
                                       id="sec1-dest-img-1"
                                       value="<?php if (isset ($multi_dest_stored_meta['sec1-dest-img-1'])) {
                                           echo $multi_dest_stored_meta['sec1-dest-img-1'][0];
                                       } ?>"/>
                                <input type="button" id="sec1-dest-img-1-button" class="button"
                                       value="<?php _e('Choose or Upload an Image',
                                               'the-fly-shop'); ?>"/>

                                <div class="mt-1">
                                    <strong><label for="sec1-dest-img-title-1"
                                                   class="sec1-dest-img-title-1"><?php _e('Section &#35;1 - Multi-Destination Image Title &#35;1',
                                                    'the-fly-shop'); ?></label></strong><br>
                                    <input style="width:50%;" type="text" name="sec1-dest-img-title-1"
                                           id="sec1-dest-img-title-1"
                                           value="<?php if (isset ($multi_dest_stored_meta['sec1-dest-img-title-1'])) {
                                               echo $multi_dest_stored_meta['sec1-dest-img-title-1'][0];
                                           } ?>"/>

                                </div>
                                <div class="mt-1">
                                    <strong><label for="sec1-dest-img-desc-1"
                                                   class="sec1-dest-img-desc-1"><?php _e('Section &#35;1 - Multi-Destination Image Description &#35;1',
                                                    'the-fly-shop'); ?></label></strong><br>
                                    <input style="width:50%;" type="text" name="sec1-dest-img-desc-1"
                                           id="sec1-dest-img-desc-1"
                                           value="<?php if (isset ($multi_dest_stored_meta['sec1-dest-img-desc-1'])) {
                                               echo $multi_dest_stored_meta['sec1-dest-img-desc-1'][0];
                                           } ?>"/>
                                </div>

                            </div>
                            <p> <!-- ==== SECTION #1 MULTI-DESTINATION TITLE #1 ==== -->


                                <strong><label for="sec1-dest-title-1"
                                               class="sec1-dest-title-1"><?php _e('Section &#35;1 - Multi-Destination Title &#35;1',
                                                'the-fly-shop'); ?></label></strong><br>
                                <input style="width:50%;" type="text" name="sec1-dest-title-1"
                                       id="sec1-dest-title-1"
                                       value="<?php if (isset ($multi_dest_stored_meta['sec1-dest-title-1'])) {
                                           echo $multi_dest_stored_meta['sec1-dest-title-1'][0];
                                       } ?>"/>

                            </p>
                            <p> <!-- ==== SECTION #1 MULTI-SECTION TEXT AREA #1 ==== -->

                                <strong><label for="sec1-dest-textarea-1"
                                               class="sec1-dest-textarea-1"><?php _e('Sections &#35;1 - Multi-Destination Text Area &#35;1',
                                                'the-fly-shop') ?></label></strong>

                                <textarea style="width: 100%;" rows="4" name="sec1-dest-textarea-1"
                                          id="sec1-dest-textarea-1"><?php if (isset ($multi_dest_stored_meta['sec1-dest-textarea-1'])) {
                                        echo $multi_dest_stored_meta['sec1-dest-textarea-1'][0];
                                    } ?></textarea>

                            </p>

                            <p> <!-- ==== SECTION #1 READ MORE #1 ==== -->

                                <strong><label for="sec1-dest-readmore-1"
                                               class="sec1-dest-readmore-1"><?php _e('<strong>Section &#35;1 - Multi-Destination Read More &#35;1</strong>',
                                                'the-fly-shop') ?></label></strong>

                                <textarea style="width: 100%;" rows="4" name="sec1-dest-readmore-1"
                                          id="sec1-dest-readmore-1"><?php if (isset ($multi_dest_stored_meta['sec1-dest-readmore-1'])) {
                                        echo $multi_dest_stored_meta['sec1-dest-readmore-1'][0];
                                    } ?></textarea>

                            </p>
                            <div class="sections-meta-cont"> <!-- ==== SECTION #1 CAROUSEL IMAGE #2 ==== -->

                                <label for="sec1-dest-img-2"
                                       class="sections-2-image"><?php _e('<strong>Section &#35;1 - Multi-Destination Carousel Image &#35;2</strong>',
                                            'the-fly-shop'); ?></label><br>
                                <input type="text" style="width: 75%;" name="sec1-dest-img-2"
                                       id="sec1-dest-img-2"
                                       value="<?php if (isset ($multi_dest_stored_meta['sec1-dest-img-2'])) {
                                           echo $multi_dest_stored_meta['sec1-dest-img-2'][0];
                                       } ?>"/><br><br>
                                <input type="button" id="sec1-dest-img-2-button" class="button"
                                       value="<?php _e('Choose or Upload an Image',
                                               'the-fly-shop'); ?>"/>

                               <div class="mt-1">
                                <strong><label for="sec1-dest-img-title-2"
                                               class="sec1-dest-img-title-2"><?php _e('Section &#35;1 - Multi-Destination Image Title &#35;2',
                                   'the-fly-shop'); ?></label></strong><br>
                                <input style="width:50%;" type="text" name="sec1-dest-img-title-2"
                                       id="sec1-dest-img-title-2"
                                       value="<?php if (isset ($multi_dest_stored_meta['sec1-dest-img-title-2'])) {
                                        echo $multi_dest_stored_meta['sec1-dest-img-title-2'][0];
                                       } ?>"/>

                               </div>
                              <div class="mt-1">
                               <strong><label for="sec1-dest-img-desc-2"
                                              class="sec1-dest-img-desc-2"><?php _e('Section &#35;1 - Multi-Destination Image Description &#35;2',
                                  'the-fly-shop'); ?></label></strong><br>
                               <input style="width:50%;" type="text" name="sec1-dest-img-desc-2"
                                      id="sec1-dest-img-desc-2"
                                      value="<?php if (isset ($multi_dest_stored_meta['sec1-dest-img-desc-2'])) {
                                       echo $multi_dest_stored_meta['sec1-dest-img-desc-2'][0];
                                      } ?>"/>
                              </div>

                            </div>

                            <p> <!-- ==== SECTION #1 MULTI-DESTINATION TITLE #2 ==== -->

                                <strong><label for="sec1-dest-title-2"
                                               class="sec1-dest-title-2"><?php _e('Section &#35;1 - Multi-Destination Title &#35;2',
                                                'the-fly-shop'); ?></label></strong><br>
                                <input style="width:50%;" type="text" name="sec1-dest-title-2"
                                       id="sec1-dest-title-2"
                                       value="<?php if (isset ($multi_dest_stored_meta['sec1-dest-title-2'])) {
                                           echo $multi_dest_stored_meta['sec1-dest-title-2'][0];
                                       } ?>"/>

                            </p>
                            <p> <!-- ==== SECTION #1 MULTI-SECTION TEXT AREA #2 ==== -->

                                <strong><label for="sec1-dest-textarea-2"
                                               class="sec1-dest-textarea-2"><?php _e('Section &#35;1 - Multi-Destination Text Area &#35;2',
                                                'the-fly-shop') ?></label></strong>

                                <textarea style="width: 100%;" rows="4" name="sec1-dest-textarea-2"
                                          id="sec1-dest-textarea-2"><?php if (isset ($multi_dest_stored_meta['sec1-dest-textarea-2'])) {
                                        echo $multi_dest_stored_meta['sec1-dest-textarea-2'][0];
                                    } ?></textarea>

                            </p>
                            <p> <!-- ==== SECTION #1 READ MORE #2 ==== -->

                                <strong><label for="sec1-dest-readmore-2"
                                               class="sec1-dest-readmore-2"><?php _e('<strong>Section &#35;1 - Mult-Destination Read More &#35;2</strong>',
                                                'the-fly-shop') ?></label></strong>

                                <textarea style="width: 100%;" rows="4" name="sec1-dest-readmore-2"
                                          id="sec1-dest-readmore-2"><?php if (isset ($multi_dest_stored_meta['sec1-dest-readmore-2'])) {
                                        echo $multi_dest_stored_meta['sec1-dest-readmore-2'][0];
                                    } ?></textarea>

                            </p>

                            <div class="sections-meta-cont"> <!-- ==== SECTION #1 CAROUSEL IMAGE #3 ==== -->

                                <label for="sec1-dest-img-3"
                                       class="sections-3-image"><?php _e('<strong>Section &#35;1 - Multi-Destination Carousel Image &#35;3</strong>',
                                            'the-fly-shop'); ?></label><br>
                                <input type="text" style="width: 75%;" name="sec1-dest-img-3"
                                       id="sec1-dest-img-3"
                                       value="<?php if (isset ($multi_dest_stored_meta['sec1-dest-img-3'])) {
                                           echo $multi_dest_stored_meta['sec1-dest-img-3'][0];
                                       } ?>"/><br><br>
                                <input type="button" id="sec1-dest-img-3-button" class="button"
                                       value="<?php _e('Choose or Upload an Image',
                                               'the-fly-shop'); ?>"/>

                               <div class="mt-1">
                                <strong><label for="sec1-dest-img-title-3"
                                               class="sec1-dest-img-title-3"><?php _e('Section &#35;1 - Multi-Destination Image Title &#35;3',
                                   'the-fly-shop'); ?></label></strong><br>
                                <input style="width:50%;" type="text" name="sec1-dest-img-title-3"
                                       id="sec1-dest-img-title-3"
                                       value="<?php if (isset ($multi_dest_stored_meta['sec1-dest-img-title-3'])) {
                                        echo $multi_dest_stored_meta['sec1-dest-img-title-3'][0];
                                       } ?>"/>

                               </div>
                               <div class="mt-1">
                                <strong><label for="sec1-dest-img-desc-3"
                                               class="sec1-dest-img-desc-3"><?php _e('Section &#35;1 - Multi-Destination Image Description &#35;3',
                                   'the-fly-shop'); ?></label></strong><br>
                                <input style="width:50%;" type="text" name="sec1-dest-img-desc-3"
                                       id="sec1-dest-img-desc-3"
                                       value="<?php if (isset ($multi_dest_stored_meta['sec1-dest-img-desc-3'])) {
                                        echo $multi_dest_stored_meta['sec1-dest-img-desc-3'][0];
                                       } ?>"/>
                               </div>
                            </div>

                            <p> <!-- ==== SECTION #1 MULTI-DESTINATION TITLE #3 ==== -->

                                <strong><label for="sec1-dest-title-3"
                                               class="sec1-dest-title-3"><?php _e('Section &#35;1 - Multi-Destination Title &#35;3',
                                                'the-fly-shop'); ?></label></strong><br>
                                <input style="width:50%;" type="text" name="sec1-dest-title-3"
                                       id="sec1-dest-title-3"
                                       value="<?php if (isset ($multi_dest_stored_meta['sec1-dest-title-3'])) {
                                           echo $multi_dest_stored_meta['sec1-dest-title-3'][0];
                                       } ?>"/>

                            </p>
                            <p> <!-- ==== SECTION #1 MULTI-SECTION TEXT AREA #3 ==== -->

                                <strong><label for="sec1-dest-textarea-3"
                                               class="sec1-dest-textarea-3"><?php _e('Section &#35;3 Multi-Destination - Text Area &#35;3',
                                                'the-fly-shop') ?></label></strong>

                                <textarea style="width: 100%;" rows="4" name="sec1-dest-textarea-3"
                                          id="sec1-dest-textarea-3"><?php if (isset ($multi_dest_stored_meta['sec1-dest-textarea-3'])) {
                                        echo $multi_dest_stored_meta['sec1-dest-textarea-3'][0];
                                    } ?></textarea>

                            </p>
                            <p> <!-- ==== SECTION #1 READ MORE #3 ==== -->

                                <strong><label for="sec1-dest-readmore-3"
                                               class="sec1-dest-readmore-3"><?php _e('<strong>Section &#35;1 - Mult-Destination Read More &#35;3</strong>',
                                                'the-fly-shop') ?></label></strong>

                                <textarea style="width: 100%;" rows="4" name="sec1-dest-readmore-3"
                                          id="sec1-dest-readmore-3"><?php if (isset ($multi_dest_stored_meta['sec1-dest-readmore-3'])) {
                                        echo $multi_dest_stored_meta['sec1-dest-readmore-3'][0];
                                    } ?></textarea>

                            </p>

                        </div> <!-- /#sectionsimage1 -->

                        <!-- ==== SECTION #2 ==== -->
                        <div role="tabpanel" class="tab-pane fade in" id="sectionsimage2">

                            <p> <!-- ==== SECTION #2 TITLE ==== -->

                                <strong><label for="sections-2-title"
                                               class="sections-2-title"><?php _e('Section &#35;2 Title',
                                                'the-fly-shop'); ?></label></strong><br>
                                <input style="width:50%;" type="text" name="sections-2-title" id="sections-2-title"
                                       value="<?php if (isset ($multi_dest_stored_meta['sections-2-title'])) {
                                           echo $multi_dest_stored_meta['sections-2-title'][0];
                                       } ?>"/>

                            </p>

                            <p> <!-- ==== SECTION #2 TEXT AREA ==== -->

                                <strong><label for="sections-2-textarea"
                                               class="sections-2-textarea"><?php _e('Section &#35;2 Text Area',
                                                'the-fly-shop') ?></label></strong>

                                <textarea style="width: 100%;" rows="4" name="sections-2-textarea"
                                          id="sections-2-textarea"><?php if (isset ($multi_dest_stored_meta['sections-2-textarea'])) {
                                        echo $multi_dest_stored_meta['sections-2-textarea'][0];
                                    } ?></textarea>

                            </p>

                            <p> <!-- ==== SECTION #2 READ MORE ==== -->

                                <strong><label for="sections-2-readmore"
                                               class="sections-2-readmore"><?php _e('<strong>Section &#35;2 Read More</strong>',
                                                'the-fly-shop') ?></label></strong>

                                <textarea style="width: 100%;" rows="4" name="sections-2-readmore"
                                          id="sections-2-readmore"><?php if (isset ($multi_dest_stored_meta['sections-2-readmore'])) {
                                        echo $multi_dest_stored_meta['sections-2-readmore'][0];
                                    } ?></textarea>

                            </p>

                            <p> <!-- ==== SECTION #2 VIDEO/IMAGE OPTION ==== -->

                                <span class="sections-2-video-image"><?php _e('<strong>Image or Video?</strong>',
                                            'the-fly-shop') ?></span>
                            <div class="sections-2-video-image">
                                <label for="sections-2-video-image">
                                    <input type="checkbox" name="sections-2-video-image-checkbox"
                                           id="sections-2-video-image-checkbox"
                                           value="yes" <?php if (isset ($multi_dest_stored_meta['sections-2-video-image-checkbox'])) {
                                        checked($multi_dest_stored_meta['sections-2-video-image-checkbox'][0],
                                                'yes');
                                    } ?> />
                                    <?php _e('Check box if you are importing video. Leave unchecked for image.',
                                            'the-fly-shop') ?>
                                </label>
                            </div>

                            </p>

                            <p> <!-- ==== SECTION #2 IMAGE ==== -->

                                <label for="sections-2-image"
                                       class="sections-2-image"><?php _e('<strong>Section &#35;2 Image</strong>',
                                            'the-fly-shop'); ?></label><br>
                                <input type="text" style="width: 75%;" name="sections-2-image" id="sections-2-image"
                                       value="<?php if (isset ($multi_dest_stored_meta['sections-2-image'])) {
                                           echo $multi_dest_stored_meta['sections-2-image'][0];
                                       } ?>"/><br><br>
                                <input type="button" id="sections-2-image-button" class="button"
                                       value="<?php _e('Choose or Upload an Image',
                                               'the-fly-shop'); ?>"/>

                            </p>

                            <p> <!-- ==== SECTION #2 VIDEO ==== -->

                                <label for="sections-2-video"
                                       class="sections-2-video"><?php _e('<strong>Paste implicit video URL here. You can also paste the embed Google Map URL here:</strong>',
                                            'the-fly-shop') ?></label>
                                <input type="url" style="width:50%;" name="sections-2-video" id="sections-2-video"
                                       value="<?php if (isset ($multi_dest_stored_meta['sections-2-video'])) {
                                           echo $multi_dest_stored_meta['sections-2-video'][0];
                                       } ?>"/>

                            </p>

                            <hr style="margin-top: 1.618em; border-top: 3px double #8c8b8b;">
                            <h2>Multi-Destination Carousel &amp; Content</h2>
                            <div class="sections-meta-cont"> <!-- ====  SECTION #2 CAROUSEL IMAGE #1 ==== -->

                                <label for="sec2-dest-img-1"
                                       class="sec2-dest-img-1"><?php _e('<strong>Section &#35;2 - Carousel Image &#35;1</strong>',
                                            'the-fly-shop'); ?></label><br>
                                <input type="text" style="width: 75%;" name="sec2-dest-img-1"
                                       id="sec2-dest-img-1"
                                       value="<?php if (isset ($multi_dest_stored_meta['sec2-dest-img-1'])) {
                                           echo $multi_dest_stored_meta['sec2-dest-img-1'][0];
                                       } ?>"/><br><br>
                                <input type="button" id="sec2-dest-img-1-button" class="button"
                                       value="<?php _e('Choose or Upload an Image',
                                               'the-fly-shop'); ?>"/>

                               <div class="mt-1">
                                <strong><label for="sec2-dest-img-title-1"
                                               class="sec2-dest-img-title-1"><?php _e('Section &#35;2 - Multi-Destination Image Title &#35;1',
                                   'the-fly-shop'); ?></label></strong><br>
                                <input style="width:50%;" type="text" name="sec2-dest-img-title-1"
                                       id="sec2-dest-img-title-1"
                                       value="<?php if (isset ($multi_dest_stored_meta['sec2-dest-img-title-1'])) {
                                        echo $multi_dest_stored_meta['sec2-dest-img-title-1'][0];
                                       } ?>"/>

                               </div>
                               <div class="mt-1">
                                <strong><label for="sec2-dest-img-desc-1"
                                               class="sec2-dest-img-desc-1"><?php _e('Section &#35;2 - Multi-Destination Image Description &#35;1',
                                   'the-fly-shop'); ?></label></strong><br>
                                <input style="width:50%;" type="text" name="sec2-dest-img-desc-1"
                                       id="sec2-dest-img-desc-1"
                                       value="<?php if (isset ($multi_dest_stored_meta['sec2-dest-img-desc-1'])) {
                                        echo $multi_dest_stored_meta['sec2-dest-img-desc-1'][0];
                                       } ?>"/>
                               </div>
                            </div>
                            <p> <!-- ==== SECTION #2 MULTI-DESTINATION TITLE #1 ==== -->

                                <strong><label for="sec2-dest-title-1"
                                               class="sec2-dest-title-1"><?php _e('Section &#35;2 - Multi-Destination Title &#35;1',
                                                'the-fly-shop'); ?></label></strong><br>
                                <input style="width:50%;" type="text" name="sec2-dest-title-1"
                                       id="sec2-dest-title-1"
                                       value="<?php if (isset ($multi_dest_stored_meta['sec2-dest-title-1'])) {
                                           echo $multi_dest_stored_meta['sec2-dest-title-1'][0];
                                       } ?>"/>

                            </p>
                            <p> <!-- ==== SECTION #2 MULTI-SECTION TEXT AREA #1 ==== -->

                                <strong><label for="sec2-dest-textarea-1"
                                               class="sec2-dest-textarea-1"><?php _e('Section &#35;2 - Multi-Destination Text Area &#35;1',
                                                'the-fly-shop') ?></label></strong>

                                <textarea style="width: 100%;" rows="4" name="sec2-dest-textarea-1"
                                          id="sec2-dest-textarea-1"><?php if (isset ($multi_dest_stored_meta['sec2-dest-textarea-1'])) {
                                        echo $multi_dest_stored_meta['sec2-dest-textarea-1'][0];
                                    } ?></textarea>

                            </p>
                            <p> <!-- ==== SECTION #2 READ MORE #1 ==== -->

                                <strong><label for="sec2-dest-readmore-1"
                                               class="sec2-dest-readmore-1"><?php _e('<strong>Section &#35;2 - Multi-Destination Read More &#35;1</strong>',
                                                'the-fly-shop') ?></label></strong>

                                <textarea style="width: 100%;" rows="4" name="sec2-dest-readmore-1"
                                          id="sec2-dest-readmore-1"><?php if (isset ($multi_dest_stored_meta['sec2-dest-readmore-1'])) {
                                        echo $multi_dest_stored_meta['sec2-dest-readmore-1'][0];
                                    } ?></textarea>

                            </p>
                            <p> <!-- ==== SECTION #2 CAROUSEL IMAGE #2 ==== -->

                                <label for="sec2-dest-img-2"
                                       class="sections-2-image"><?php _e('<strong>Section &#35;2 - Multi-Destination Carousel Image &#35;2</strong>',
                                            'the-fly-shop'); ?></label><br>
                                <input type="text" style="width: 75%;" name="sec2-dest-img-2"
                                       id="sec2-dest-img-2"
                                       value="<?php if (isset ($multi_dest_stored_meta['sec2-dest-img-2'])) {
                                           echo $multi_dest_stored_meta['sec2-dest-img-2'][0];
                                       } ?>"/><br><br>
                                <input type="button" id="sec2-dest-img-2-button" class="button"
                                       value="<?php _e('Choose or Upload an Image',
                                               'the-fly-shop'); ?>"/>

                            </p>

                            <p> <!-- ==== SECTION #2 MULTI-DESTINATION TITLE #2 ==== -->

                                <strong><label for="sec2-dest-title-2"
                                               class="sec2-dest-title-2"><?php _e('Section &#35;2 - Multi-Destination Title &#35;2',
                                                'the-fly-shop'); ?></label></strong><br>
                                <input style="width:50%;" type="text" name="sec2-dest-title-2"
                                       id="sec2-dest-title-2"
                                       value="<?php if (isset ($multi_dest_stored_meta['sec2-dest-title-2'])) {
                                           echo $multi_dest_stored_meta['sec2-dest-title-2'][0];
                                       } ?>"/>

                            </p>
                            <p> <!-- ==== SECTION #2 MULTI-SECTION TEXT AREA #2 ==== -->

                                <strong><label for="sec2-dest-textarea-2"
                                               class="sec2-dest-textarea-2"><?php _e('Section &#35;2 - Multi-Destination Text Area &#35;2',
                                                'the-fly-shop') ?></label></strong>

                                <textarea style="width: 100%;" rows="4" name="sec2-dest-textarea-2"
                                          id="sec2-dest-textarea-2"><?php if (isset ($multi_dest_stored_meta['sec2-dest-textarea-2'])) {
                                        echo $multi_dest_stored_meta['sec2-dest-textarea-2'][0];
                                    } ?></textarea>

                            </p>
                            <p> <!-- ==== SECTION #2 READ MORE #2 ==== -->

                                <strong><label for="sec2-dest-readmore-2"
                                               class="sec2-dest-readmore-2"><?php _e('<strong>Section &#35;2 - Mult-Destination Read More &#35;2</strong>',
                                                'the-fly-shop') ?></label></strong>

                                <textarea style="width: 100%;" rows="4" name="sec2-dest-readmore-2"
                                          id="sec2-dest-readmore-2"><?php if (isset ($multi_dest_stored_meta['sec2-dest-readmore-2'])) {
                                        echo $multi_dest_stored_meta['sec2-dest-readmore-2'][0];
                                    } ?></textarea>

                            </p>


                            <p> <!-- ==== SECTION #2 CAROUSEL IMAGE #3 ==== -->

                                <label for="sec2-dest-img-3"
                                       class="sections-3-image"><?php _e('<strong>Section &#35;2 - Multi-Destination Carousel Image &#35;3</strong>',
                                            'the-fly-shop'); ?></label><br>
                                <input type="text" style="width: 75%;" name="sec2-dest-img-3"
                                       id="sec2-dest-img-3"
                                       value="<?php if (isset ($multi_dest_stored_meta['sec2-dest-img-3'])) {
                                           echo $multi_dest_stored_meta['sec2-dest-img-3'][0];
                                       } ?>"/><br><br>
                                <input type="button" id="sec2-dest-img-3-button" class="button"
                                       value="<?php _e('Choose or Upload an Image',
                                               'the-fly-shop'); ?>"/>

                            </p>

                            <p> <!-- ==== SECTION #2 MULTI-DESTINATION TITLE ==== -->

                                <strong><label for="sec2-dest-title-3"
                                               class="sec2-dest-title-3"><?php _e('Section &#35;2 - Multi-Destination Title &#35;3',
                                                'the-fly-shop'); ?></label></strong><br>
                                <input style="width:50%;" type="text" name="sec2-dest-title-3"
                                       id="sec2-dest-title-3"
                                       value="<?php if (isset ($multi_dest_stored_meta['sec2-dest-title-3'])) {
                                           echo $multi_dest_stored_meta['sec2-dest-title-3'][0];
                                       } ?>"/>

                            </p>
                            <p> <!-- ==== SECTION #2 MULTI-SECTION TEXT AREA #3 ==== -->

                                <strong><label for="sec2-dest-textarea-3"
                                               class="sec2-dest-textarea-3"><?php _e('Section &#35;2 Multi-Destination - Text Area &#35;3',
                                                'the-fly-shop') ?></label></strong>

                                <textarea style="width: 100%;" rows="4" name="sec2-dest-textarea-3"
                                          id="sec2-dest-textarea-3"><?php if (isset ($multi_dest_stored_meta['sec2-dest-textarea-3'])) {
                                        echo $multi_dest_stored_meta['sec2-dest-textarea-3'][0];
                                    } ?></textarea>

                            </p>
                            <p> <!-- ==== SECTION #2 READ MORE #3 ==== -->

                                <strong><label for="sec2-dest-readmore-3"
                                               class="sec2-dest-readmore-3"><?php _e('<strong>Section &#35;2 - Mult-Destination Read More &#35;3</strong>',
                                                'the-fly-shop') ?></label></strong>

                                <textarea style="width: 100%;" rows="4" name="sec2-dest-readmore-3"
                                          id="sec2-dest-readmore-3"><?php if (isset ($multi_dest_stored_meta['sec2-dest-readmore-3'])) {
                                        echo $multi_dest_stored_meta['sec2-dest-readmore-3'][0];
                                    } ?></textarea>

                            </p>

                    </div> <!-- /#sectionsimages2 -->

                    <!-- ==== SECTION #3 ==== -->
                    <div role="tabpanel" class="tab-pane fade in" id="sectionsimage3">

                        <p> <!-- ==== SECTION #3 TITLE ==== -->

                            <strong><label for="sections-3-title"
                                           class="sections-3-title"><?php _e('Section &#35;3 Title',
                                            'the-fly-shop'); ?></label></strong><br>
                            <input style="width:50%;" type="text" name="sections-3-title" id="sections-3-title"
                                   value="<?php if (isset ($multi_dest_stored_meta['sections-3-title'])) {
                                       echo $multi_dest_stored_meta['sections-3-title'][0];
                                   } ?>"/>

                        </p>

                        <p> <!-- ==== SECTION #3 TEXT AREA ==== -->

                            <strong><label for="sections-3-textarea"
                                           class="sections-3-textarea"><?php _e('Section &#35;3 Text Area',
                                            'the-fly-shop') ?></label></strong>

                            <textarea style="width: 100%;" rows="4" name="sections-3-textarea"
                                      id="sections-3-textarea"><?php if (isset ($multi_dest_stored_meta['sections-3-textarea'])) {
                                    echo $multi_dest_stored_meta['sections-3-textarea'][0];
                                } ?></textarea>

                        </p>

                        <p> <!-- ==== SECTION #3 READ MORE ==== -->

                            <strong><label for="sections-3-readmore"
                                           class="sections-3-readmore"><?php _e('<strong>Section &#35;3 Read More</strong>',
                                            'the-fly-shop') ?></label></strong>

                            <textarea style="width: 100%;" rows="4" name="sections-3-readmore"
                                      id="sections-3-readmore"><?php if (isset ($multi_dest_stored_meta['sections-3-readmore'])) {
                                    echo $multi_dest_stored_meta['sections-3-readmore'][0];
                                } ?></textarea>

                        </p>

                        <p> <!-- ==== SECTION #3 VIDEO/IMAGE OPTION ==== -->

                            <span class="sections-3-video-image"><?php _e('<strong>Image or Video?</strong>',
                                        'the-fly-shop') ?></span>
                        <div class="sections-3-video-image">
                            <label for="sections-3-video-image">
                                <input type="checkbox" name="sections-3-video-image-checkbox"
                                       id="sections-3-video-image-checkbox"
                                       value="yes" <?php if (isset ($multi_dest_stored_meta['sections-3-video-image-checkbox'])) {
                                    checked($multi_dest_stored_meta['sections-3-video-image-checkbox'][0],
                                            'yes');
                                } ?> />
                                <?php _e('Check box if you are importing video. Leave unchecked for image.',
                                        'the-fly-shop') ?>
                            </label>
                        </div>

                        </p>

                        <p> <!-- ==== SECTION #3 IMAGE ==== -->

                            <label for="sections-3-image"
                                   class="sections-3-image"><?php _e('<strong>Section &#35;3 Image</strong>',
                                        'the-fly-shop'); ?></label><br>
                            <input type="text" style="width: 75%;" name="sections-3-image" id="sections-3-image"
                                   value="<?php if (isset ($multi_dest_stored_meta['sections-3-image'])) {
                                       echo $multi_dest_stored_meta['sections-3-image'][0];
                                   } ?>"/><br><br>
                            <input type="button" id="sections-3-image-button" class="button"
                                   value="<?php _e('Choose or Upload an Image',
                                           'the-fly-shop'); ?>"/>

                        </p>

                        <p> <!-- ==== SECTION #3 VIDEO ==== -->

                            <label for="sections-3-video"
                                   class="sections-3-video"><?php _e('<strong>Paste implicit video URL here. You can also paste the embed Google Map URL here:</strong>',
                                        'the-fly-shop') ?></label>
                            <input type="url" style="width:50%;" name="sections-3-video" id="sections-3-video"
                                   value="<?php if (isset ($multi_dest_stored_meta['sections-3-video'])) {
                                       echo $multi_dest_stored_meta['sections-3-video'][0];
                                   } ?>"/>

                        </p>

                        <hr style="margin-top: 1.618em; border-top: 3px double #8c8b8b;">
                        <h2>Multi-Destination Carousel &amp; Content</h2>
                        <p> <!-- ====  SECTION #3 CAROUSEL IMAGE #1 ==== -->

                            <label for="sec3-dest-img-1"
                                   class="sec3-dest-img-1"><?php _e('<strong>Section &#35;3 - Carousel Image &#35;1</strong>',
                                        'the-fly-shop'); ?></label><br>
                            <input type="text" style="width: 75%;" name="sec3-dest-img-1"
                                   id="sec3-dest-img-1"
                                   value="<?php if (isset ($multi_dest_stored_meta['sec3-dest-img-1'])) {
                                       echo $multi_dest_stored_meta['sec3-dest-img-1'][0];
                                   } ?>"/><br><br>
                            <input type="button" id="sec3-dest-img-1-button" class="button"
                                   value="<?php _e('Choose or Upload an Image',
                                           'the-fly-shop'); ?>"/>

                        </p>
                        <p> <!-- ==== SECTION #3 MULTI-DESTINATION TITLE #1 ==== -->

                            <strong><label for="sec3-dest-title-1"
                                           class="sec3-dest-title-1"><?php _e('Section &#35;3 - Multi-Destination Title &#35;1',
                                            'the-fly-shop'); ?></label></strong><br>
                            <input style="width:50%;" type="text" name="sec3-dest-title-1"
                                   id="sec3-dest-title-1"
                                   value="<?php if (isset ($multi_dest_stored_meta['sec3-dest-title-1'])) {
                                       echo $multi_dest_stored_meta['sec3-dest-title-1'][0];
                                   } ?>"/>

                        </p>
                        <p> <!-- ==== SECTION #3 MULTI-SECTION TEXT AREA #1 ==== -->

                            <strong><label for="sec3-dest-textarea-1"
                                           class="sec3-dest-textarea-1"><?php _e('Section &#35;3 - Multi-Destination Text Area &#35;1',
                                            'the-fly-shop') ?></label></strong>

                            <textarea style="width: 100%;" rows="4" name="sec3-dest-textarea-1"
                                      id="sec3-dest-textarea-1"><?php if (isset ($multi_dest_stored_meta['sec3-dest-textarea-1'])) {
                                    echo $multi_dest_stored_meta['sec3-dest-textarea-1'][0];
                                } ?></textarea>

                        </p>
                        <p> <!-- ==== SECTION #3 READ MORE #1 ==== -->

                            <strong><label for="sec3-dest-readmore-1"
                                           class="sec3-dest-readmore-1"><?php _e('<strong>Section &#35;3 - Multi-Destination Read More &#35;1</strong>',
                                            'the-fly-shop') ?></label></strong>

                            <textarea style="width: 100%;" rows="4" name="sec3-dest-readmore-1"
                                      id="sec3-dest-readmore-1"><?php if (isset ($multi_dest_stored_meta['sec3-dest-readmore-1'])) {
                                    echo $multi_dest_stored_meta['sec3-dest-readmore-1'][0];
                                } ?></textarea>

                        </p>
                        <p> <!-- ==== SECTION #3 CAROUSEL IMAGE #2 ==== -->

                            <label for="sec3-dest-img-2"
                                   class="sections-3-image"><?php _e('<strong>Section &#35;3 - Multi-Destination Carousel Image &#35;2</strong>',
                                        'the-fly-shop'); ?></label><br>
                            <input type="text" style="width: 75%;" name="sec3-dest-img-2"
                                   id="sec3-dest-img-2"
                                   value="<?php if (isset ($multi_dest_stored_meta['sec3-dest-img-2'])) {
                                       echo $multi_dest_stored_meta['sec3-dest-img-2'][0];
                                   } ?>"/><br><br>
                            <input type="button" id="sec3-dest-img-2-button" class="button"
                                   value="<?php _e('Choose or Upload an Image',
                                           'the-fly-shop'); ?>"/>

                        </p>

                        <p> <!-- ==== SECTION #3 MULTI-DESTINATION TITLE #2 ==== -->

                            <strong><label for="sec3-dest-title-2"
                                           class="sec3-dest-title-2"><?php _e('Section &#35;3 - Multi-Destination Title &#35;2',
                                            'the-fly-shop'); ?></label></strong><br>
                            <input style="width:50%;" type="text" name="sec3-dest-title-2"
                                   id="sec3-dest-title-2"
                                   value="<?php if (isset ($multi_dest_stored_meta['sec3-dest-title-2'])) {
                                       echo $multi_dest_stored_meta['sec3-dest-title-2'][0];
                                   } ?>"/>

                        </p>
                        <p> <!-- ==== SECTION #3 MULTI-SECTION TEXT AREA #2 ==== -->

                            <strong><label for="sec3-dest-textarea-2"
                                           class="sec3-dest-textarea-2"><?php _e('Section &#35;3 - Multi-Destination Text Area &#35;2',
                                            'the-fly-shop') ?></label></strong>

                            <textarea style="width: 100%;" rows="4" name="sec3-dest-textarea-2"
                                      id="sec3-dest-textarea-2"><?php if (isset ($multi_dest_stored_meta['sec3-dest-textarea-2'])) {
                                    echo $multi_dest_stored_meta['sec3-dest-textarea-2'][0];
                                } ?></textarea>

                        </p>
                        <p> <!-- ==== SECTION #3 READ MORE #2 ==== -->

                            <strong><label for="sec3-dest-readmore-2"
                                           class="sec3-dest-readmore-2"><?php _e('<strong>Section &#35;3 - Mult-Destination Read More &#35;2</strong>',
                                            'the-fly-shop') ?></label></strong>

                            <textarea style="width: 100%;" rows="4" name="sec3-dest-readmore-2"
                                      id="sec3-dest-readmore-2"><?php if (isset ($multi_dest_stored_meta['sec3-dest-readmore-2'])) {
                                    echo $multi_dest_stored_meta['sec3-dest-readmore-2'][0];
                                } ?></textarea>

                        </p>


                        <p> <!-- ==== SECTION #3 CAROUSEL IMAGE #3 ==== -->

                            <label for="sec3-dest-img-3"
                                   class="sections-3-image"><?php _e('<strong>Section &#35;3 - Multi-Destination Carousel Image &#35;3</strong>',
                                        'the-fly-shop'); ?></label><br>
                            <input type="text" style="width: 75%;" name="sec3-dest-img-3"
                                   id="sec3-dest-img-3"
                                   value="<?php if (isset ($multi_dest_stored_meta['sec3-dest-img-3'])) {
                                       echo $multi_dest_stored_meta['sec3-dest-img-3'][0];
                                   } ?>"/><br><br>
                            <input type="button" id="sec3-dest-img-3-button" class="button"
                                   value="<?php _e('Choose or Upload an Image',
                                           'the-fly-shop'); ?>"/>

                        </p>

                        <p> <!-- ==== SECTION #3 MULTI-DESTINATION TITLE ==== -->

                            <strong><label for="sec3-dest-title-3"
                                           class="sec3-dest-title-3"><?php _e('Section &#35;3 - Multi-Destination Title &#35;3',
                                            'the-fly-shop'); ?></label></strong><br>
                            <input style="width:50%;" type="text" name="sec3-dest-title-3"
                                   id="sec3-dest-title-3"
                                   value="<?php if (isset ($multi_dest_stored_meta['sec3-dest-title-3'])) {
                                       echo $multi_dest_stored_meta['sec3-dest-title-3'][0];
                                   } ?>"/>

                        </p>
                        <p> <!-- ==== SECTION #3 MULTI-SECTION TEXT AREA #3 ==== -->

                            <strong><label for="sec3-dest-textarea-3"
                                           class="sec3-dest-textarea-3"><?php _e('Section &#35;3 Multi-Destination - Text Area &#35;3',
                                            'the-fly-shop') ?></label></strong>

                            <textarea style="width: 100%;" rows="4" name="sec3-dest-textarea-3"
                                      id="sec3-dest-textarea-3"><?php if (isset ($multi_dest_stored_meta['sec3-dest-textarea-3'])) {
                                    echo $multi_dest_stored_meta['sec3-dest-textarea-3'][0];
                                } ?></textarea>

                        </p>
                        <p> <!-- ==== SECTION #3 READ MORE #3 ==== -->

                            <strong><label for="sec3-dest-readmore-3"
                                           class="sec3-dest-readmore-3"><?php _e('<strong>Section &#35;3 - Mult-Destination Read More &#35;3</strong>',
                                            'the-fly-shop') ?></label></strong>

                            <textarea style="width: 100%;" rows="4" name="sec3-dest-readmore-3"
                                      id="sec3-dest-readmore-3"><?php if (isset ($multi_dest_stored_meta['sec3-dest-readmore-3'])) {
                                    echo $multi_dest_stored_meta['sec3-dest-readmore-3'][0];
                                } ?></textarea>

                        </p>

                    </div> <!-- /#sectionsimages3 -->

                    <!-- ==== SECTION #4 ==== -->

                    <div role="tabpanel" class="tab-pane fade in" id="sectionsimage4">

                        <p> <!-- ==== SECTION #4 TITLE ==== -->

                            <strong><label for="sections-4-title"
                                           class="sections-4-title"><?php _e('Section &#35;4 Title',
                                            'the-fly-shop'); ?></label></strong><br>
                            <input style="width:50%;" type="text" name="sections-4-title" id="sections-4-title"
                                   value="<?php if (isset ($multi_dest_stored_meta['sections-4-title'])) {
                                       echo $multi_dest_stored_meta['sections-4-title'][0];
                                   } ?>"/>

                        </p>

                        <p> <!-- ==== SECTION #4 TEXT AREA ==== -->

                            <strong><label for="sections-4-textarea"
                                           class="sections-4-textarea"><?php _e('Section &#35;4 Text Area',
                                            'the-fly-shop') ?></label></strong>

                            <textarea style="width: 100%;" rows="4" name="sections-4-textarea"
                                      id="sections-4-textarea"><?php if (isset ($multi_dest_stored_meta['sections-4-textarea'])) {
                                    echo $multi_dest_stored_meta['sections-4-textarea'][0];
                                } ?></textarea>

                        </p>

                        <p> <!-- ==== SECTION #4 READ MORE ==== -->

                            <strong><label for="sections-4-readmore"
                                           class="sections-4-readmore"><?php _e('<strong>Section &#35;4 Read More</strong>',
                                            'the-fly-shop') ?></label></strong>

                            <textarea style="width: 100%;" rows="4" name="sections-4-readmore"
                                      id="sections-4-readmore"><?php if (isset ($multi_dest_stored_meta['sections-4-readmore'])) {
                                    echo $multi_dest_stored_meta['sections-4-readmore'][0];
                                } ?></textarea>

                        </p>

                        <p> <!-- ==== SECTION #4 VIDEO/IMAGE OPTION ==== -->

                            <span class="sections-4-video-image"><?php _e('<strong>Image or Video?</strong>',
                                        'the-fly-shop') ?></span>
                        <div class="sections-4-video-image">
                            <label for="sections-4-video-image">
                                <input type="checkbox" name="sections-4-video-image-checkbox"
                                       id="sections-4-video-image-checkbox"
                                       value="yes" <?php if (isset ($multi_dest_stored_meta['sections-4-video-image-checkbox'])) {
                                    checked($multi_dest_stored_meta['sections-4-video-image-checkbox'][0],
                                            'yes');
                                } ?> />
                                <?php _e('Check box if you are importing video. Leave unchecked for image.',
                                        'the-fly-shop') ?>
                            </label>
                        </div>

                        </p>

                        <p> <!-- ==== SECTION #4 IMAGE ==== -->

                            <label for="sections-4-image"
                                   class="sections-4-image"><?php _e('<strong>Section &#35;4 Image</strong>',
                                        'the-fly-shop'); ?></label><br>
                            <input type="text" style="width: 75%;" name="sections-4-image" id="sections-4-image"
                                   value="<?php if (isset ($multi_dest_stored_meta['sections-4-image'])) {
                                       echo $multi_dest_stored_meta['sections-4-image'][0];
                                   } ?>"/><br><br>
                            <input type="button" id="sections-4-image-button" class="button"
                                   value="<?php _e('Choose or Upload an Image',
                                           'the-fly-shop'); ?>"/>

                        </p>

                        <p> <!-- ==== SECTION #4 VIDEO ==== -->

                            <label for="sections-4-video"
                                   class="sections-4-video"><?php _e('<strong>Paste implicit video URL here. You can also paste the embed Google Map URL here:</strong>',
                                        'the-fly-shop') ?></label>
                            <input type="url" style="width:50%;" name="sections-4-video" id="sections-4-video"
                                   value="<?php if (isset ($multi_dest_stored_meta['sections-4-video'])) {
                                       echo $multi_dest_stored_meta['sections-4-video'][0];
                                   } ?>"/>

                        </p>

                        <hr style="margin-top: 1.618em; border-top: 3px double #8c8b8b;">
                        <h2>Multi-Destination Carousel &amp; Content</h2>
                        <p> <!-- ====  SECTION #4 CAROUSEL IMAGE #1 ==== -->

                            <label for="sec4-dest-img-1"
                                   class="sec4-dest-img-1"><?php _e('<strong>Section &#35;4 - Carousel Image &#35;1</strong>',
                                        'the-fly-shop'); ?></label><br>
                            <input type="text" style="width: 75%;" name="sec4-dest-img-1"
                                   id="sec4-dest-img-1"
                                   value="<?php if (isset ($multi_dest_stored_meta['sec4-dest-img-1'])) {
                                       echo $multi_dest_stored_meta['sec4-dest-img-1'][0];
                                   } ?>"/><br><br>
                            <input type="button" id="sec4-dest-img-1-button" class="button"
                                   value="<?php _e('Choose or Upload an Image',
                                           'the-fly-shop'); ?>"/>

                        </p>
                        <p> <!-- ==== SECTION #4 MULTI-DESTINATION TITLE #1 ==== -->

                            <strong><label for="sec4-dest-title-1"
                                           class="sec4-dest-title-1"><?php _e('Section &#35;4 - Multi-Destination Title &#35;1',
                                            'the-fly-shop'); ?></label></strong><br>
                            <input style="width:50%;" type="text" name="sec4-dest-title-1"
                                   id="sec4-dest-title-1"
                                   value="<?php if (isset ($multi_dest_stored_meta['sec4-dest-title-1'])) {
                                       echo $multi_dest_stored_meta['sec4-dest-title-1'][0];
                                   } ?>"/>

                        </p>
                        <p> <!-- ==== SECTION #4 MULTI-SECTION TEXT AREA #1 ==== -->

                            <strong><label for="sec4-dest-textarea-1"
                                           class="sec4-dest-textarea-1"><?php _e('Section &#35;4 - Multi-Destination Text Area &#35;1',
                                            'the-fly-shop') ?></label></strong>

                            <textarea style="width: 100%;" rows="4" name="sec4-dest-textarea-1"
                                      id="sec4-dest-textarea-1"><?php if (isset ($multi_dest_stored_meta['sec4-dest-textarea-1'])) {
                                    echo $multi_dest_stored_meta['sec4-dest-textarea-1'][0];
                                } ?></textarea>

                        </p>
                        <p> <!-- ==== SECTION #4 READ MORE #1 ==== -->

                            <strong><label for="sec4-dest-readmore-1"
                                           class="sec4-dest-readmore-1"><?php _e('<strong>Section &#35;4 - Multi-Destination Read More &#35;1</strong>',
                                            'the-fly-shop') ?></label></strong>

                            <textarea style="width: 100%;" rows="4" name="sec4-dest-readmore-1"
                                      id="sec4-dest-readmore-1"><?php if (isset ($multi_dest_stored_meta['sec4-dest-readmore-1'])) {
                                    echo $multi_dest_stored_meta['sec4-dest-readmore-1'][0];
                                } ?></textarea>

                        </p>
                        <p> <!-- ==== SECTION #4 CAROUSEL IMAGE #2 ==== -->

                            <label for="sec4-dest-img-2"
                                   class="sections-4-image"><?php _e('<strong>Section &#35;4 - Multi-Destination Carousel Image &#35;2</strong>',
                                        'the-fly-shop'); ?></label><br>
                            <input type="text" style="width: 75%;" name="sec4-dest-img-2"
                                   id="sec4-dest-img-2"
                                   value="<?php if (isset ($multi_dest_stored_meta['sec4-dest-img-2'])) {
                                       echo $multi_dest_stored_meta['sec4-dest-img-2'][0];
                                   } ?>"/><br><br>
                            <input type="button" id="sec4-dest-img-2-button" class="button"
                                   value="<?php _e('Choose or Upload an Image',
                                           'the-fly-shop'); ?>"/>

                        </p>

                        <p> <!-- ==== SECTION #4 MULTI-DESTINATION TITLE #2 ==== -->

                            <strong><label for="sec4-dest-title-2"
                                           class="sec4-dest-title-2"><?php _e('Section &#35;4 - Multi-Destination Title &#35;2',
                                            'the-fly-shop'); ?></label></strong><br>
                            <input style="width:50%;" type="text" name="sec4-dest-title-2"
                                   id="sec4-dest-title-2"
                                   value="<?php if (isset ($multi_dest_stored_meta['sec4-dest-title-2'])) {
                                       echo $multi_dest_stored_meta['sec4-dest-title-2'][0];
                                   } ?>"/>

                        </p>
                        <p> <!-- ==== SECTION #4 MULTI-SECTION TEXT AREA #2 ==== -->

                            <strong><label for="sec4-dest-textarea-2"
                                           class="sec4-dest-textarea-2"><?php _e('Section &#35;4 - Multi-Destination Text Area &#35;2',
                                            'the-fly-shop') ?></label></strong>

                            <textarea style="width: 100%;" rows="4" name="sec4-dest-textarea-2"
                                      id="sec4-dest-textarea-2"><?php if (isset ($multi_dest_stored_meta['sec4-dest-textarea-2'])) {
                                    echo $multi_dest_stored_meta['sec4-dest-textarea-2'][0];
                                } ?></textarea>

                        </p>
                        <p> <!-- ==== SECTION #4 READ MORE #2 ==== -->

                            <strong><label for="sec4-dest-readmore-2"
                                           class="sec4-dest-readmore-2"><?php _e('<strong>Section &#35;4 - Mult-Destination Read More &#35;2</strong>',
                                            'the-fly-shop') ?></label></strong>

                            <textarea style="width: 100%;" rows="4" name="sec4-dest-readmore-2"
                                      id="sec4-dest-readmore-2"><?php if (isset ($multi_dest_stored_meta['sec4-dest-readmore-2'])) {
                                    echo $multi_dest_stored_meta['sec4-dest-readmore-2'][0];
                                } ?></textarea>

                        </p>

                        <p> <!-- ==== SECTION #4 CAROUSEL IMAGE #3 ==== -->

                            <label for="sec4-dest-img-3"
                                   class="sections-4-image"><?php _e('<strong>Section &#35;4 - Multi-Destination Carousel Image &#35;3</strong>',
                                        'the-fly-shop'); ?></label><br>
                            <input type="text" style="width: 75%;" name="sec4-dest-img-3"
                                   id="sec4-dest-img-3"
                                   value="<?php if (isset ($multi_dest_stored_meta['sec4-dest-img-3'])) {
                                       echo $multi_dest_stored_meta['sec4-dest-img-3'][0];
                                   } ?>"/><br><br>
                            <input type="button" id="sec4-dest-img-3-button" class="button"
                                   value="<?php _e('Choose or Upload an Image',
                                           'the-fly-shop'); ?>"/>

                        </p>

                        <p> <!-- ==== SECTION #4 MULTI-DESTINATION TITLE #3 ==== -->

                            <strong><label for="sec4-dest-title-3"
                                           class="sec4-dest-title-3"><?php _e('Section &#35;4 - Multi-Destination Title &#35;3',
                                            'the-fly-shop'); ?></label></strong><br>
                            <input style="width:50%;" type="text" name="sec4-dest-title-3"
                                   id="sec4-dest-title-3"
                                   value="<?php if (isset ($multi_dest_stored_meta['sec4-dest-title-3'])) {
                                       echo $multi_dest_stored_meta['sec4-dest-title-3'][0];
                                   } ?>"/>

                        </p>
                        <p> <!-- ==== SECTION #4 MULTI-SECTION TEXT AREA #3 ==== -->

                            <strong><label for="sec4-dest-textarea-3"
                                           class="sec4-dest-textarea-3"><?php _e('Section &#35;4 Multi-Destination - Text Area &#35;3',
                                            'the-fly-shop') ?></label></strong>

                            <textarea style="width: 100%;" rows="4" name="sec4-dest-textarea-3"
                                      id="sec4-dest-textarea-3"><?php if (isset ($multi_dest_stored_meta['sec4-dest-textarea-3'])) {
                                    echo $multi_dest_stored_meta['sec4-dest-textarea-3'][0];
                                } ?></textarea>

                        </p>
                        <p> <!-- ==== SECTION #4 READ MORE #3 ==== -->

                            <strong><label for="sec4-dest-readmore-3"
                                           class="sec4-dest-readmore-3"><?php _e('<strong>Section &#35;4 - Mult-Destination Read More &#35;3</strong>',
                                            'the-fly-shop') ?></label></strong>

                            <textarea style="width: 100%;" rows="4" name="sec4-dest-readmore-3"
                                      id="sec4-dest-readmore-3"><?php if (isset ($multi_dest_stored_meta['sec4-dest-readmore-3'])) {
                                    echo $multi_dest_stored_meta['sec4-dest-readmore-3'][0];
                                } ?></textarea>

                        </p>

                    </div> <!-- /#sectionsimages4 -->

                    <!-- ==== SECTION #5 ==== -->
                    <div role="tabpanel" class="tab-pane fade in" id="sectionsimage5">

                        <p> <!-- ==== SECTION #5 TITLE ==== -->

                            <strong><label for="sections-5-title"
                                           class="sections-5-title"><?php _e('Section &#35;5 Title',
                                            'the-fly-shop'); ?></label></strong><br>
                            <input style="width:50%;" type="text" name="sections-5-title" id="sections-5-title"
                                   value="<?php if (isset ($multi_dest_stored_meta['sections-5-title'])) {
                                       echo $multi_dest_stored_meta['sections-5-title'][0];
                                   } ?>"/>

                        </p>

                        <p> <!-- ==== SECTION #5 TEXT AREA ==== -->

                            <strong><label for="sections-5-textarea"
                                           class="sections-5-textarea"><?php _e('Section &#35;5 Text Area',
                                            'the-fly-shop') ?></label></strong>

                            <textarea style="width: 100%;" rows="4" name="sections-5-textarea"
                                      id="sections-5-textarea"><?php if (isset ($multi_dest_stored_meta['sections-5-textarea'])) {
                                    echo $multi_dest_stored_meta['sections-5-textarea'][0];
                                } ?></textarea>

                        </p>

                        <p> <!-- ==== SECTION #5 READ MORE ==== -->

                            <strong><label for="sections-5-readmore"
                                           class="sections-5-readmore"><?php _e('<strong>Section &#35;5 Read More</strong>',
                                            'the-fly-shop') ?></label></strong>

                            <textarea style="width: 100%;" rows="4" name="sections-5-readmore"
                                      id="sections-5-readmore"><?php if (isset ($multi_dest_stored_meta['sections-5-readmore'])) {
                                    echo $multi_dest_stored_meta['sections-5-readmore'][0];
                                } ?></textarea>

                        </p>

                        <p> <!-- ==== SECTION #5 VIDEO/IMAGE OPTION ==== -->

                            <span class="sections-5-video-image"><?php _e('<strong>Image or Video?</strong>',
                                        'the-fly-shop') ?></span>
                        <div class="sections-5-video-image">
                            <label for="sections-5-video-image">
                                <input type="checkbox" name="sections-5-video-image-checkbox"
                                       id="sections-5-video-image-checkbox"
                                       value="yes" <?php if (isset ($multi_dest_stored_meta['sections-5-video-image-checkbox'])) {
                                    checked($multi_dest_stored_meta['sections-5-video-image-checkbox'][0],
                                            'yes');
                                } ?> />
                                <?php _e('Check box if you are importing video. Leave unchecked for image.',
                                        'the-fly-shop') ?>
                            </label>
                        </div>

                        </p>

                        <p> <!-- ==== SECTION #5 IMAGE ==== -->

                            <label for="sections-5-image"
                                   class="sections-5-image"><?php _e('<strong>Section &#35;5 Image</strong>',
                                        'the-fly-shop'); ?></label><br>
                            <input type="text" style="width: 75%;" name="sections-5-image" id="sections-5-image"
                                   value="<?php if (isset ($multi_dest_stored_meta['sections-5-image'])) {
                                       echo $multi_dest_stored_meta['sections-5-image'][0];
                                   } ?>"/><br><br>
                            <input type="button" id="sections-5-image-button" class="button"
                                   value="<?php _e('Choose or Upload an Image',
                                           'the-fly-shop'); ?>"/>

                        </p>

                        <p> <!-- ==== SECTION #5 VIDEO ==== -->

                            <label for="sections-5-video"
                                   class="sections-5-video"><?php _e('<strong>Paste implicit video URL here. You can also paste the embed Google Map URL here:</strong>',
                                        'the-fly-shop') ?></label>
                            <input type="url" style="width:50%;" name="sections-5-video" id="sections-5-video"
                                   value="<?php if (isset ($multi_dest_stored_meta['sections-5-video'])) {
                                       echo $multi_dest_stored_meta['sections-5-video'][0];
                                   } ?>"/>

                        </p>

                        <hr style="margin-top: 1.618em; border-top: 3px double #8c8b8b;">
                        <h2>Multi-Destination Carousel &amp; Content</h2>
                        <p> <!-- ====  SECTION #5 CAROUSEL IMAGE #1 ==== -->

                            <label for="sec5-dest-img-1"
                                   class="sec5-dest-img-1"><?php _e('<strong>Section &#35;5 - Carousel Image &#35;1</strong>',
                                        'the-fly-shop'); ?></label><br>
                            <input type="text" style="width: 75%;" name="sec5-dest-img-1"
                                   id="sec5-dest-img-1"
                                   value="<?php if (isset ($multi_dest_stored_meta['sec5-dest-img-1'])) {
                                       echo $multi_dest_stored_meta['sec5-dest-img-1'][0];
                                   } ?>"/><br><br>
                            <input type="button" id="sec5-dest-img-1-button" class="button"
                                   value="<?php _e('Choose or Upload an Image',
                                           'the-fly-shop'); ?>"/>

                        </p>
                        <p> <!-- ==== SECTION #5 MULTI-DESTINATION TITLE #1 ==== -->

                            <strong><label for="sec5-dest-title-1"
                                           class="sec5-dest-title-1"><?php _e('Section &#35;5 - Multi-Destination Title &#35;1',
                                            'the-fly-shop'); ?></label></strong><br>
                            <input style="width:50%;" type="text" name="sec5-dest-title-1"
                                   id="sec5-dest-title-1"
                                   value="<?php if (isset ($multi_dest_stored_meta['sec5-dest-title-1'])) {
                                       echo $multi_dest_stored_meta['sec5-dest-title-1'][0];
                                   } ?>"/>

                        </p>
                        <p> <!-- ==== SECTION #5 MULTI-SECTION TEXT AREA #1 ==== -->

                            <strong><label for="sec5-dest-textarea-1"
                                           class="sec5-dest-textarea-1"><?php _e('Section &#35;5 - Multi-Destination Text Area &#35;1',
                                            'the-fly-shop') ?></label></strong>

                            <textarea style="width: 100%;" rows="4" name="sec5-dest-textarea-1"
                                      id="sec5-dest-textarea-1"><?php if (isset ($multi_dest_stored_meta['sec5-dest-textarea-1'])) {
                                    echo $multi_dest_stored_meta['sec5-dest-textarea-1'][0];
                                } ?></textarea>

                        </p>
                        <p> <!-- ==== SECTION #5 READ MORE #1 ==== -->

                            <strong><label for="sec5-dest-readmore-1"
                                           class="sec5-dest-readmore-1"><?php _e('<strong>Section &#35;5 - Multi-Destination Read More &#35;1</strong>',
                                            'the-fly-shop') ?></label></strong>

                            <textarea style="width: 100%;" rows="4" name="sec5-dest-readmore-1"
                                      id="sec5-dest-readmore-1"><?php if (isset ($multi_dest_stored_meta['sec5-dest-readmore-1'])) {
                                    echo $multi_dest_stored_meta['sec5-dest-readmore-1'][0];
                                } ?></textarea>

                        </p>
                        <p> <!-- ==== SECTION #5 CAROUSEL IMAGE #2 ==== -->

                            <label for="sec5-dest-img-2"
                                   class="sections-5-image"><?php _e('<strong>Section &#35;5 - Multi-Destination Carousel Image &#35;2</strong>',
                                        'the-fly-shop'); ?></label><br>
                            <input type="text" style="width: 75%;" name="sec5-dest-img-2"
                                   id="sec5-dest-img-2"
                                   value="<?php if (isset ($multi_dest_stored_meta['sec5-dest-img-2'])) {
                                       echo $multi_dest_stored_meta['sec5-dest-img-2'][0];
                                   } ?>"/><br><br>
                            <input type="button" id="sec5-dest-img-2-button" class="button"
                                   value="<?php _e('Choose or Upload an Image',
                                           'the-fly-shop'); ?>"/>

                        </p>

                        <p> <!-- ==== SECTION #5 MULTI-DESTINATION TITLE #2 ==== -->

                            <strong><label for="sec5-dest-title-2"
                                           class="sec5-dest-title-2"><?php _e('Section &#35;5 - Multi-Destination Title &#35;2',
                                            'the-fly-shop'); ?></label></strong><br>
                            <input style="width:50%;" type="text" name="sec5-dest-title-2"
                                   id="sec5-dest-title-2"
                                   value="<?php if (isset ($multi_dest_stored_meta['sec5-dest-title-2'])) {
                                       echo $multi_dest_stored_meta['sec5-dest-title-2'][0];
                                   } ?>"/>

                        </p>
                        <p> <!-- ==== SECTION #5 MULTI-SECTION TEXT AREA #2 ==== -->

                            <strong><label for="sec5-dest-textarea-2"
                                           class="sec5-dest-textarea-2"><?php _e('Section &#35;5 - Multi-Destination Text Area &#35;2',
                                            'the-fly-shop') ?></label></strong>

                            <textarea style="width: 100%;" rows="5" name="sec5-dest-textarea-2"
                                      id="sec5-dest-textarea-2"><?php if (isset ($multi_dest_stored_meta['sec5-dest-textarea-2'])) {
                                    echo $multi_dest_stored_meta['sec5-dest-textarea-2'][0];
                                } ?></textarea>

                        </p>
                        <p> <!-- ==== SECTION #5 READ MORE #2 ==== -->

                            <strong><label for="sec5-dest-readmore-2"
                                           class="sec5-dest-readmore-2"><?php _e('<strong>Section &#35;5 - Mult-Destination Read More &#35;2</strong>',
                                            'the-fly-shop') ?></label></strong>

                            <textarea style="width: 100%;" rows="4" name="sec5-dest-readmore-2"
                                      id="sec5-dest-readmore-2"><?php if (isset ($multi_dest_stored_meta['sec5-dest-readmore-2'])) {
                                    echo $multi_dest_stored_meta['sec5-dest-readmore-2'][0];
                                } ?></textarea>

                        </p>

                        <p> <!-- ==== SECTION #5 CAROUSEL IMAGE #3 ==== -->

                            <label for="sec5-dest-img-3"
                                   class="sections-5-image"><?php _e('<strong>Section &#35;5 - Multi-Destination Carousel Image &#35;3</strong>',
                                        'the-fly-shop'); ?></label><br>
                            <input type="text" style="width: 75%;" name="sec5-dest-img-3"
                                   id="sec5-dest-img-3"
                                   value="<?php if (isset ($multi_dest_stored_meta['sec5-dest-img-3'])) {
                                       echo $multi_dest_stored_meta['sec5-dest-img-3'][0];
                                   } ?>"/><br><br>
                            <input type="button" id="sec5-dest-img-3-button" class="button"
                                   value="<?php _e('Choose or Upload an Image',
                                           'the-fly-shop'); ?>"/>

                        </p>

                        <p> <!-- ==== SECTION #5 MULTI-DESTINATION TITLE #3 ==== -->

                            <strong><label for="sec5-dest-title-3"
                                           class="sec5-dest-title-3"><?php _e('Section &#35;5 - Multi-Destination Title &#35;3',
                                            'the-fly-shop'); ?></label></strong><br>
                            <input style="width:50%;" type="text" name="sec5-dest-title-3"
                                   id="sec5-dest-title-3"
                                   value="<?php if (isset ($multi_dest_stored_meta['sec5-dest-title-3'])) {
                                       echo $multi_dest_stored_meta['sec5-dest-title-3'][0];
                                   } ?>"/>

                        </p>
                        <p> <!-- ==== SECTION #5 MULTI-SECTION TEXT AREA #3 ==== -->

                            <strong><label for="sec5-dest-textarea-3"
                                           class="sec5-dest-textarea-3"><?php _e('Section &#35;5 Multi-Destination - Text Area &#35;3',
                                            'the-fly-shop') ?></label></strong>

                            <textarea style="width: 100%;" rows="4" name="sec5-dest-textarea-3"
                                      id="sec5-dest-textarea-3"><?php if (isset ($multi_dest_stored_meta['sec5-dest-textarea-3'])) {
                                    echo $multi_dest_stored_meta['sec5-dest-textarea-3'][0];
                                } ?></textarea>

                        </p>
                        <p> <!-- ==== SECTION #5 READ MORE #3 ==== -->

                            <strong><label for="sec5-dest-readmore-3"
                                           class="sec5-dest-readmore-3"><?php _e('<strong>Section &#35;5 - Mult-Destination Read More &#35;3</strong>',
                                            'the-fly-shop') ?></label></strong>

                            <textarea style="width: 100%;" rows="4" name="sec5-dest-readmore-3"
                                      id="sec5-dest-readmore-3"><?php if (isset ($multi_dest_stored_meta['sec5-dest-readmore-3'])) {
                                    echo $multi_dest_stored_meta['sec5-dest-readmore-3'][0];
                                } ?></textarea>

                        </p>

                    </div> <!-- /#sectionsimages5 -->

                        <!-- ==== SECTION #6 ==== -->
                        <div role="tabpanel" class="tab-pane fade in" id="sectionsimage6">

                            <p> <!-- ==== SECTION #6 TITLE ==== -->

                                <strong><label for="sections-6-title"
                                               class="sections-6-title"><?php _e('Section &#35;6 Title',
                                                'the-fly-shop'); ?></label></strong><br>
                                <input style="width:50%;" type="text" name="sections-6-title" id="sections-6-title"
                                       value="<?php if (isset ($multi_dest_stored_meta['sections-6-title'])) {
                                           echo $multi_dest_stored_meta['sections-6-title'][0];
                                       } ?>"/>

                            </p>

                            <p> <!-- ==== SECTION #6 TEXT AREA ==== -->

                                <strong><label for="sections-6-textarea"
                                               class="sections-6-textarea"><?php _e('Section &#35;6 Text Area',
                                                'the-fly-shop') ?></label></strong>

                                <textarea style="width: 100%;" rows="4" name="sections-6-textarea"
                                          id="sections-6-textarea"><?php if (isset ($multi_dest_stored_meta['sections-6-textarea'])) {
                                        echo $multi_dest_stored_meta['sections-6-textarea'][0];
                                    } ?></textarea>

                            </p>

                            <p> <!-- ==== SECTION #6 READ MORE ==== -->

                                <strong><label for="sections-6-readmore"
                                               class="sections-6-readmore"><?php _e('<strong>Section &#35;6 Read More</strong>',
                                                'the-fly-shop') ?></label></strong>

                                <textarea style="width: 100%;" rows="4" name="sections-6-readmore"
                                          id="sections-6-readmore"><?php if (isset ($multi_dest_stored_meta['sections-6-readmore'])) {
                                        echo $multi_dest_stored_meta['sections-6-readmore'][0];
                                    } ?></textarea>

                            </p>

                            <p> <!-- ==== SECTION #6 VIDEO/IMAGE OPTION ==== -->

                                <span class="sections-6-video-image"><?php _e('<strong>Image or Video?</strong>',
                                            'the-fly-shop') ?></span>
                            <div class="sections-6-video-image">
                                <label for="sections-6-video-image">
                                    <input type="checkbox" name="sections-6-video-image-checkbox"
                                           id="sections-6-video-image-checkbox"
                                           value="yes" <?php if (isset ($multi_dest_stored_meta['sections-6-video-image-checkbox'])) {
                                        checked($multi_dest_stored_meta['sections-6-video-image-checkbox'][0],
                                                'yes');
                                    } ?> />
                                    <?php _e('Check box if you are importing video. Leave unchecked for image.',
                                            'the-fly-shop') ?>
                                </label>
                            </div>

                            </p>

                            <p> <!-- ==== SECTION #6 IMAGE ==== -->

                                <label for="sections-6-image"
                                       class="sections-6-image"><?php _e('<strong>Section &#35;6 Image</strong>',
                                            'the-fly-shop'); ?></label><br>
                                <input type="text" style="width: 75%;" name="sections-6-image" id="sections-6-image"
                                       value="<?php if (isset ($multi_dest_stored_meta['sections-6-image'])) {
                                           echo $multi_dest_stored_meta['sections-6-image'][0];
                                       } ?>"/><br><br>
                                <input type="button" id="sections-6-image-button" class="button"
                                       value="<?php _e('Choose or Upload an Image',
                                               'the-fly-shop'); ?>"/>

                            </p>

                            <p> <!-- ==== SECTION #6 VIDEO ==== -->

                                <label for="sections-6-video"
                                       class="sections-6-video"><?php _e('<strong>Paste implicit video URL here. You can also paste the embed Google Map URL here:</strong>',
                                            'the-fly-shop') ?></label>
                                <input type="url" style="width:50%;" name="sections-6-video" id="sections-6-video"
                                       value="<?php if (isset ($multi_dest_stored_meta['sections-6-video'])) {
                                           echo $multi_dest_stored_meta['sections-6-video'][0];
                                       } ?>"/>

                            </p>

                            <hr style="margin-top: 1.618em; border-top: 3px double #8c8b8b;">
                            <h2>Multi-Destination Carousel &amp; Content</h2>
                            <p> <!-- ====  SECTION #6 CAROUSEL IMAGE #1 ==== -->

                                <label for="sec6-dest-img-1"
                                       class="sec6-dest-img-1"><?php _e('<strong>Section &#35;6 - Carousel Image &#35;1</strong>',
                                            'the-fly-shop'); ?></label><br>
                                <input type="text" style="width: 75%;" name="sec6-dest-img-1"
                                       id="sec6-dest-img-1"
                                       value="<?php if (isset ($multi_dest_stored_meta['sec6-dest-img-1'])) {
                                           echo $multi_dest_stored_meta['sec6-dest-img-1'][0];
                                       } ?>"/><br><br>
                                <input type="button" id="sec6-dest-img-1-button" class="button"
                                       value="<?php _e('Choose or Upload an Image',
                                               'the-fly-shop'); ?>"/>

                            </p>
                            <p> <!-- ==== SECTION #6 MULTI-DESTINATION TITLE #1 ==== -->

                                <strong><label for="sec6-dest-title-1"
                                               class="sec6-dest-title-1"><?php _e('Section &#35;6 - Multi-Destination Title &#35;1',
                                                'the-fly-shop'); ?></label></strong><br>
                                <input style="width:50%;" type="text" name="sec6-dest-title-1"
                                       id="sec6-dest-title-1"
                                       value="<?php if (isset ($multi_dest_stored_meta['sec6-dest-title-1'])) {
                                           echo $multi_dest_stored_meta['sec6-dest-title-1'][0];
                                       } ?>"/>

                            </p>
                            <p> <!-- ==== SECTION #6 MULTI-SECTION TEXT AREA #1 ==== -->

                                <strong><label for="sec6-dest-textarea-1"
                                               class="sec6-dest-textarea-1"><?php _e('Section &#35;6 - Multi-Destination Text Area &#35;1',
                                                'the-fly-shop') ?></label></strong>

                                <textarea style="width: 100%;" rows="4" name="sec6-dest-textarea-1"
                                          id="sec6-dest-textarea-1"><?php if (isset ($multi_dest_stored_meta['sec6-dest-textarea-1'])) {
                                        echo $multi_dest_stored_meta['sec6-dest-textarea-1'][0];
                                    } ?></textarea>

                            </p>
                            <p> <!-- ==== SECTION #6 READ MORE #1 ==== -->

                                <strong><label for="sec6-dest-readmore-1"
                                               class="sec6-dest-readmore-1"><?php _e('<strong>Section &#35;6 - Multi-Destination Read More &#35;1</strong>',
                                                'the-fly-shop') ?></label></strong>

                                <textarea style="width: 100%;" rows="4" name="sec6-dest-readmore-1"
                                          id="sec6-dest-readmore-1"><?php if (isset ($multi_dest_stored_meta['sec6-dest-readmore-1'])) {
                                        echo $multi_dest_stored_meta['sec6-dest-readmore-1'][0];
                                    } ?></textarea>

                            </p>
                            <p> <!-- ==== SECTION #6 CAROUSEL IMAGE #2 ==== -->

                                <label for="sec6-dest-img-2"
                                       class="sections-6-image"><?php _e('<strong>Section &#35;6 - Multi-Destination Carousel Image &#35;2</strong>',
                                            'the-fly-shop'); ?></label><br>
                                <input type="text" style="width: 75%;" name="sec6-dest-img-2"
                                       id="sec6-dest-img-2"
                                       value="<?php if (isset ($multi_dest_stored_meta['sec6-dest-img-2'])) {
                                           echo $multi_dest_stored_meta['sec6-dest-img-2'][0];
                                       } ?>"/><br><br>
                                <input type="button" id="sec6-dest-img-2-button" class="button"
                                       value="<?php _e('Choose or Upload an Image',
                                               'the-fly-shop'); ?>"/>

                            </p>

                            <p> <!-- ==== SECTION #6 MULTI-DESTINATION TITLE #2 ==== -->

                                <strong><label for="sec6-dest-title-2"
                                               class="sec6-dest-title-2"><?php _e('Section &#35;6 - Multi-Destination Title &#35;2',
                                                'the-fly-shop'); ?></label></strong><br>
                                <input style="width:50%;" type="text" name="sec6-dest-title-2"
                                       id="sec6-dest-title-2"
                                       value="<?php if (isset ($multi_dest_stored_meta['sec6-dest-title-2'])) {
                                           echo $multi_dest_stored_meta['sec6-dest-title-2'][0];
                                       } ?>"/>

                            </p>
                            <p> <!-- ==== SECTION #6 MULTI-SECTION TEXT AREA #2 ==== -->

                                <strong><label for="sec6-dest-textarea-2"
                                               class="sec6-dest-textarea-2"><?php _e('Section &#35;6 - Multi-Destination Text Area &#35;2',
                                                'the-fly-shop') ?></label></strong>

                                <textarea style="width: 100%;" rows="5" name="sec6-dest-textarea-2"
                                          id="sec6-dest-textarea-2"><?php if (isset ($multi_dest_stored_meta['sec6-dest-textarea-2'])) {
                                        echo $multi_dest_stored_meta['sec6-dest-textarea-2'][0];
                                    } ?></textarea>

                            </p>
                            <p> <!-- ==== SECTION #6 READ MORE #2 ==== -->

                                <strong><label for="sec6-dest-readmore-2"
                                               class="sec6-dest-readmore-2"><?php _e('<strong>Section &#35;6 - Mult-Destination Read More &#35;2</strong>',
                                                'the-fly-shop') ?></label></strong>

                                <textarea style="width: 100%;" rows="4" name="sec6-dest-readmore-2"
                                          id="sec6-dest-readmore-2"><?php if (isset ($multi_dest_stored_meta['sec6-dest-readmore-2'])) {
                                        echo $multi_dest_stored_meta['sec6-dest-readmore-2'][0];
                                    } ?></textarea>

                            </p>

                            <p> <!-- ==== SECTION #6 CAROUSEL IMAGE #3 ==== -->

                                <label for="sec6-dest-img-3"
                                       class="sections-6-image"><?php _e('<strong>Section &#35;6 - Multi-Destination Carousel Image &#35;3</strong>',
                                            'the-fly-shop'); ?></label><br>
                                <input type="text" style="width: 75%;" name="sec6-dest-img-3"
                                       id="sec6-dest-img-3"
                                       value="<?php if (isset ($multi_dest_stored_meta['sec6-dest-img-3'])) {
                                           echo $multi_dest_stored_meta['sec6-dest-img-3'][0];
                                       } ?>"/><br><br>
                                <input type="button" id="sec6-dest-img-3-button" class="button"
                                       value="<?php _e('Choose or Upload an Image',
                                               'the-fly-shop'); ?>"/>

                            </p>

                            <p> <!-- ==== SECTION #6 MULTI-DESTINATION TITLE #3 ==== -->

                                <strong><label for="sec6-dest-title-3"
                                               class="sec6-dest-title-3"><?php _e('Section &#35;6 - Multi-Destination Title &#35;3',
                                                'the-fly-shop'); ?></label></strong><br>
                                <input style="width:50%;" type="text" name="sec6-dest-title-3"
                                       id="sec6-dest-title-3"
                                       value="<?php if (isset ($multi_dest_stored_meta['sec6-dest-title-3'])) {
                                           echo $multi_dest_stored_meta['sec6-dest-title-3'][0];
                                       } ?>"/>

                            </p>
                            <p> <!-- ==== SECTION #6 MULTI-SECTION TEXT AREA #3 ==== -->

                                <strong><label for="sec6-dest-textarea-3"
                                               class="sec6-dest-textarea-3"><?php _e('Section &#35;6 Multi-Destination - Text Area &#35;3',
                                                'the-fly-shop') ?></label></strong>

                                <textarea style="width: 100%;" rows="4" name="sec6-dest-textarea-3"
                                          id="sec6-dest-textarea-3"><?php if (isset ($multi_dest_stored_meta['sec6-dest-textarea-3'])) {
                                        echo $multi_dest_stored_meta['sec6-dest-textarea-3'][0];
                                    } ?></textarea>

                            </p>
                            <p> <!-- ==== SECTION #6 READ MORE #3 ==== -->

                                <strong><label for="sec6-dest-readmore-3"
                                               class="sec6-dest-readmore-3"><?php _e('<strong>Section &#35;6 - Mult-Destination Read More &#35;3</strong>',
                                                'the-fly-shop') ?></label></strong>

                                <textarea style="width: 100%;" rows="4" name="sec6-dest-readmore-3"
                                          id="sec6-dest-readmore-3"><?php if (isset ($multi_dest_stored_meta['sec6-dest-readmore-3'])) {
                                        echo $multi_dest_stored_meta['sec6-dest-readmore-3'][0];
                                    } ?></textarea>

                            </p>

                        </div> <!-- /#sectionsimages6 -->

                        <!-- ==== SECTION #7 ==== -->
                        <div role="tabpanel" class="tab-pane fade in" id="sectionsimage7">

                            <p> <!-- ==== SECTION #7 TITLE ==== -->

                                <strong><label for="sections-7-title"
                                               class="sections-7-title"><?php _e('Section &#35;7 Title',
                                                'the-fly-shop'); ?></label></strong><br>
                                <input style="width:50%;" type="text" name="sections-7-title" id="sections-7-title"
                                       value="<?php if (isset ($multi_dest_stored_meta['sections-7-title'])) {
                                           echo $multi_dest_stored_meta['sections-7-title'][0];
                                       } ?>"/>

                            </p>

                            <p> <!-- ==== SECTION #7 TEXT AREA ==== -->

                                <strong><label for="sections-7-textarea"
                                               class="sections-7-textarea"><?php _e('Section &#35;7 Text Area',
                                                'the-fly-shop') ?></label></strong>

                                <textarea style="width: 100%;" rows="4" name="sections-7-textarea"
                                          id="sections-7-textarea"><?php if (isset ($multi_dest_stored_meta['sections-7-textarea'])) {
                                        echo $multi_dest_stored_meta['sections-7-textarea'][0];
                                    } ?></textarea>

                            </p>

                            <p> <!-- ==== SECTION #7 READ MORE ==== -->

                                <strong><label for="sections-7-readmore"
                                               class="sections-7-readmore"><?php _e('<strong>Section &#35;7 Read More</strong>',
                                                'the-fly-shop') ?></label></strong>

                                <textarea style="width: 100%;" rows="4" name="sections-7-readmore"
                                          id="sections-7-readmore"><?php if (isset ($multi_dest_stored_meta['sections-7-readmore'])) {
                                        echo $multi_dest_stored_meta['sections-7-readmore'][0];
                                    } ?></textarea>

                            </p>

                            <p> <!-- ==== SECTION #7 VIDEO/IMAGE OPTION ==== -->

                                <span class="sections-7-video-image"><?php _e('<strong>Image or Video?</strong>',
                                            'the-fly-shop') ?></span>
                            <div class="sections-7-video-image">
                                <label for="sections-7-video-image">
                                    <input type="checkbox" name="sections-7-video-image-checkbox"
                                           id="sections-7-video-image-checkbox"
                                           value="yes" <?php if (isset ($multi_dest_stored_meta['sections-7-video-image-checkbox'])) {
                                        checked($multi_dest_stored_meta['sections-7-video-image-checkbox'][0],
                                                'yes');
                                    } ?> />
                                    <?php _e('Check box if you are importing video. Leave unchecked for image.',
                                            'the-fly-shop') ?>
                                </label>
                            </div>

                            </p>

                            <p> <!-- ==== SECTION #7 IMAGE ==== -->

                                <label for="sections-7-image"
                                       class="sections-7-image"><?php _e('<strong>Section &#35;7 Image</strong>',
                                            'the-fly-shop'); ?></label><br>
                                <input type="text" style="width: 75%;" name="sections-7-image" id="sections-7-image"
                                       value="<?php if (isset ($multi_dest_stored_meta['sections-7-image'])) {
                                           echo $multi_dest_stored_meta['sections-7-image'][0];
                                       } ?>"/><br><br>
                                <input type="button" id="sections-7-image-button" class="button"
                                       value="<?php _e('Choose or Upload an Image',
                                               'the-fly-shop'); ?>"/>

                            </p>

                            <p> <!-- ==== SECTION #7 VIDEO ==== -->

                                <label for="sections-7-video"
                                       class="sections-7-video"><?php _e('<strong>Paste implicit video URL here. You can also paste the embed Google Map URL here:</strong>',
                                            'the-fly-shop') ?></label>
                                <input type="url" style="width:50%;" name="sections-7-video" id="sections-7-video"
                                       value="<?php if (isset ($multi_dest_stored_meta['sections-7-video'])) {
                                           echo $multi_dest_stored_meta['sections-7-video'][0];
                                       } ?>"/>

                            </p>

                            <hr style="margin-top: 1.618em; border-top: 3px double #8c8b8b;">
                            <h2>Multi-Destination Carousel &amp; Content</h2>
                            <p> <!-- ====  SECTION #7 CAROUSEL IMAGE #1 ==== -->

                                <label for="sec7-dest-img-1"
                                       class="sec7-dest-img-1"><?php _e('<strong>Section &#35;7 - Carousel Image &#35;1</strong>',
                                            'the-fly-shop'); ?></label><br>
                                <input type="text" style="width: 75%;" name="sec7-dest-img-1"
                                       id="sec7-dest-img-1"
                                       value="<?php if (isset ($multi_dest_stored_meta['sec7-dest-img-1'])) {
                                           echo $multi_dest_stored_meta['sec7-dest-img-1'][0];
                                       } ?>"/><br><br>
                                <input type="button" id="sec7-dest-img-1-button" class="button"
                                       value="<?php _e('Choose or Upload an Image',
                                               'the-fly-shop'); ?>"/>

                            </p>
                            <p> <!-- ==== SECTION #7 MULTI-DESTINATION TITLE #1 ==== -->

                                <strong><label for="sec7-dest-title-1"
                                               class="sec7-dest-title-1"><?php _e('Section &#35;7 - Multi-Destination Title &#35;1',
                                                'the-fly-shop'); ?></label></strong><br>
                                <input style="width:50%;" type="text" name="sec7-dest-title-1"
                                       id="sec7-dest-title-1"
                                       value="<?php if (isset ($multi_dest_stored_meta['sec7-dest-title-1'])) {
                                           echo $multi_dest_stored_meta['sec7-dest-title-1'][0];
                                       } ?>"/>

                            </p>
                            <p> <!-- ==== SECTION #7 MULTI-SECTION TEXT AREA #1 ==== -->

                                <strong><label for="sec7-dest-textarea-1"
                                               class="sec7-dest-textarea-1"><?php _e('Section &#35;7 - Multi-Destination Text Area &#35;1',
                                                'the-fly-shop') ?></label></strong>

                                <textarea style="width: 100%;" rows="4" name="sec7-dest-textarea-1"
                                          id="sec7-dest-textarea-1"><?php if (isset ($multi_dest_stored_meta['sec7-dest-textarea-1'])) {
                                        echo $multi_dest_stored_meta['sec7-dest-textarea-1'][0];
                                    } ?></textarea>

                            </p>
                            <p> <!-- ==== SECTION #7 READ MORE #1 ==== -->

                                <strong><label for="sec7-dest-readmore-1"
                                               class="sec7-dest-readmore-1"><?php _e('<strong>Section &#35;7 - Multi-Destination Read More &#35;1</strong>',
                                                'the-fly-shop') ?></label></strong>

                                <textarea style="width: 100%;" rows="4" name="sec7-dest-readmore-1"
                                          id="sec7-dest-readmore-1"><?php if (isset ($multi_dest_stored_meta['sec7-dest-readmore-1'])) {
                                        echo $multi_dest_stored_meta['sec7-dest-readmore-1'][0];
                                    } ?></textarea>

                            </p>
                            <p> <!-- ==== SECTION #7 CAROUSEL IMAGE #2 ==== -->

                                <label for="sec7-dest-img-2"
                                       class="sections-7-image"><?php _e('<strong>Section &#35;7 - Multi-Destination Carousel Image &#35;2</strong>',
                                            'the-fly-shop'); ?></label><br>
                                <input type="text" style="width: 75%;" name="sec7-dest-img-2"
                                       id="sec7-dest-img-2"
                                       value="<?php if (isset ($multi_dest_stored_meta['sec7-dest-img-2'])) {
                                           echo $multi_dest_stored_meta['sec7-dest-img-2'][0];
                                       } ?>"/><br><br>
                                <input type="button" id="sec7-dest-img-2-button" class="button"
                                       value="<?php _e('Choose or Upload an Image',
                                               'the-fly-shop'); ?>"/>

                            </p>

                            <p> <!-- ==== SECTION #7 MULTI-DESTINATION TITLE #2 ==== -->

                                <strong><label for="sec7-dest-title-2"
                                               class="sec7-dest-title-2"><?php _e('Section &#35;7 - Multi-Destination Title &#35;2',
                                                'the-fly-shop'); ?></label></strong><br>
                                <input style="width:50%;" type="text" name="sec7-dest-title-2"
                                       id="sec7-dest-title-2"
                                       value="<?php if (isset ($multi_dest_stored_meta['sec7-dest-title-2'])) {
                                           echo $multi_dest_stored_meta['sec7-dest-title-2'][0];
                                       } ?>"/>

                            </p>
                            <p> <!-- ==== SECTION #7 MULTI-SECTION TEXT AREA #2 ==== -->

                                <strong><label for="sec7-dest-textarea-2"
                                               class="sec7-dest-textarea-2"><?php _e('Section &#35;7 - Multi-Destination Text Area &#35;2',
                                                'the-fly-shop') ?></label></strong>

                                <textarea style="width: 100%;" rows="5" name="sec7-dest-textarea-2"
                                          id="sec7-dest-textarea-2"><?php if (isset ($multi_dest_stored_meta['sec7-dest-textarea-2'])) {
                                        echo $multi_dest_stored_meta['sec7-dest-textarea-2'][0];
                                    } ?></textarea>

                            </p>
                            <p> <!-- ==== SECTION #7 READ MORE #2 ==== -->

                                <strong><label for="sec7-dest-readmore-2"
                                               class="sec7-dest-readmore-2"><?php _e('<strong>Section &#35;7 - Mult-Destination Read More &#35;2</strong>',
                                                'the-fly-shop') ?></label></strong>

                                <textarea style="width: 100%;" rows="4" name="sec7-dest-readmore-2"
                                          id="sec7-dest-readmore-2"><?php if (isset ($multi_dest_stored_meta['sec7-dest-readmore-2'])) {
                                        echo $multi_dest_stored_meta['sec7-dest-readmore-2'][0];
                                    } ?></textarea>

                            </p>

                            <p> <!-- ==== SECTION #7 CAROUSEL IMAGE #3 ==== -->

                                <label for="sec7-dest-img-3"
                                       class="sections-7-image"><?php _e('<strong>Section &#35;7 - Multi-Destination Carousel Image &#35;3</strong>',
                                            'the-fly-shop'); ?></label><br>
                                <input type="text" style="width: 75%;" name="sec7-dest-img-3"
                                       id="sec7-dest-img-3"
                                       value="<?php if (isset ($multi_dest_stored_meta['sec7-dest-img-3'])) {
                                           echo $multi_dest_stored_meta['sec7-dest-img-3'][0];
                                       } ?>"/><br><br>
                                <input type="button" id="sec7-dest-img-3-button" class="button"
                                       value="<?php _e('Choose or Upload an Image',
                                               'the-fly-shop'); ?>"/>

                            </p>

                            <p> <!-- ==== SECTION #7 MULTI-DESTINATION TITLE #3 ==== -->

                                <strong><label for="sec7-dest-title-3"
                                               class="sec7-dest-title-3"><?php _e('Section &#35;7 - Multi-Destination Title &#35;3',
                                                'the-fly-shop'); ?></label></strong><br>
                                <input style="width:50%;" type="text" name="sec7-dest-title-3"
                                       id="sec7-dest-title-3"
                                       value="<?php if (isset ($multi_dest_stored_meta['sec7-dest-title-3'])) {
                                           echo $multi_dest_stored_meta['sec7-dest-title-3'][0];
                                       } ?>"/>

                            </p>
                            <p> <!-- ==== SECTION #7 MULTI-SECTION TEXT AREA #3 ==== -->

                                <strong><label for="sec7-dest-textarea-3"
                                               class="sec7-dest-textarea-3"><?php _e('Section &#35;7 Multi-Destination - Text Area &#35;3',
                                                'the-fly-shop') ?></label></strong>

                                <textarea style="width: 100%;" rows="4" name="sec7-dest-textarea-3"
                                          id="sec7-dest-textarea-3"><?php if (isset ($multi_dest_stored_meta['sec7-dest-textarea-3'])) {
                                        echo $multi_dest_stored_meta['sec7-dest-textarea-3'][0];
                                    } ?></textarea>

                            </p>
                            <p> <!-- ==== SECTION #7 READ MORE #3 ==== -->

                                <strong><label for="sec7-dest-readmore-3"
                                               class="sec7-dest-readmore-3"><?php _e('<strong>Section &#35;7 - Mult-Destination Read More &#35;3</strong>',
                                                'the-fly-shop') ?></label></strong>

                                <textarea style="width: 100%;" rows="4" name="sec7-dest-readmore-3"
                                          id="sec7-dest-readmore-3"><?php if (isset ($multi_dest_stored_meta['sec7-dest-readmore-3'])) {
                                        echo $multi_dest_stored_meta['sec7-dest-readmore-3'][0];
                                    } ?></textarea>

                            </p>

                        </div> <!-- /#sectionsimages7 -->

                        <!-- ==== SECTION #8 ==== -->
                        <div role="tabpanel" class="tab-pane fade in" id="sectionsimage8">

                            <p> <!-- ==== SECTION #8 TITLE ==== -->

                                <strong><label for="sections-8-title"
                                               class="sections-8-title"><?php _e('Section &#35;8 Title',
                                                'the-fly-shop'); ?></label></strong><br>
                                <input style="width:50%;" type="text" name="sections-8-title" id="sections-8-title"
                                       value="<?php if (isset ($multi_dest_stored_meta['sections-8-title'])) {
                                           echo $multi_dest_stored_meta['sections-8-title'][0];
                                       } ?>"/>

                            </p>

                            <p> <!-- ==== SECTION #8 TEXT AREA ==== -->

                                <strong><label for="sections-8-textarea"
                                               class="sections-8-textarea"><?php _e('Section &#35;8 Text Area',
                                                'the-fly-shop') ?></label></strong>

                                <textarea style="width: 100%;" rows="4" name="sections-8-textarea"
                                          id="sections-8-textarea"><?php if (isset ($multi_dest_stored_meta['sections-8-textarea'])) {
                                        echo $multi_dest_stored_meta['sections-8-textarea'][0];
                                    } ?></textarea>

                            </p>

                            <p> <!-- ==== SECTION #8 READ MORE ==== -->

                                <strong><label for="sections-8-readmore"
                                               class="sections-8-readmore"><?php _e('<strong>Section &#35;8 Read More</strong>',
                                                'the-fly-shop') ?></label></strong>

                                <textarea style="width: 100%;" rows="4" name="sections-8-readmore"
                                          id="sections-8-readmore"><?php if (isset ($multi_dest_stored_meta['sections-8-readmore'])) {
                                        echo $multi_dest_stored_meta['sections-8-readmore'][0];
                                    } ?></textarea>

                            </p>

                            <p> <!-- ==== SECTION #8 VIDEO/IMAGE OPTION ==== -->

                                <span class="sections-8-video-image"><?php _e('<strong>Image or Video?</strong>',
                                            'the-fly-shop') ?></span>
                            <div class="sections-8-video-image">
                                <label for="sections-8-video-image">
                                    <input type="checkbox" name="sections-8-video-image-checkbox"
                                           id="sections-8-video-image-checkbox"
                                           value="yes" <?php if (isset ($multi_dest_stored_meta['sections-8-video-image-checkbox'])) {
                                        checked($multi_dest_stored_meta['sections-8-video-image-checkbox'][0],
                                                'yes');
                                    } ?> />
                                    <?php _e('Check box if you are importing video. Leave unchecked for image.',
                                            'the-fly-shop') ?>
                                </label>
                            </div>

                            </p>

                            <p> <!-- ==== SECTION #8 IMAGE ==== -->

                                <label for="sections-8-image"
                                       class="sections-8-image"><?php _e('<strong>Section &#35;8 Image</strong>',
                                            'the-fly-shop'); ?></label><br>
                                <input type="text" style="width: 75%;" name="sections-8-image" id="sections-8-image"
                                       value="<?php if (isset ($multi_dest_stored_meta['sections-8-image'])) {
                                           echo $multi_dest_stored_meta['sections-8-image'][0];
                                       } ?>"/><br><br>
                                <input type="button" id="sections-8-image-button" class="button"
                                       value="<?php _e('Choose or Upload an Image',
                                               'the-fly-shop'); ?>"/>

                            </p>

                            <p> <!-- ==== SECTION #8 VIDEO ==== -->

                                <label for="sections-8-video"
                                       class="sections-8-video"><?php _e('<strong>Paste implicit video URL here. You can also paste the embed Google Map URL here:</strong>',
                                            'the-fly-shop') ?></label>
                                <input type="url" style="width:50%;" name="sections-8-video" id="sections-8-video"
                                       value="<?php if (isset ($multi_dest_stored_meta['sections-5-video'])) {
                                           echo $multi_dest_stored_meta['sections-8-video'][0];
                                       } ?>"/>

                            </p>

                            <hr style="margin-top: 1.618em; border-top: 3px double #8c8b8b;">
                            <h2>Multi-Destination Carousel &amp; Content</h2>
                            <p> <!-- ====  SECTION #8 CAROUSEL IMAGE #1 ==== -->

                                <label for="sec8-dest-img-1"
                                       class="sec8-dest-img-1"><?php _e('<strong>Section &#35;8 - Carousel Image &#35;1</strong>',
                                            'the-fly-shop'); ?></label><br>
                                <input type="text" style="width: 75%;" name="sec8-dest-img-1"
                                       id="sec8-dest-img-1"
                                       value="<?php if (isset ($multi_dest_stored_meta['sec8-dest-img-1'])) {
                                           echo $multi_dest_stored_meta['sec8-dest-img-1'][0];
                                       } ?>"/><br><br>
                                <input type="button" id="sec8-dest-img-1-button" class="button"
                                       value="<?php _e('Choose or Upload an Image',
                                               'the-fly-shop'); ?>"/>

                            </p>
                            <p> <!-- ==== SECTION #8 MULTI-DESTINATION TITLE #1 ==== -->

                                <strong><label for="sec8-dest-title-1"
                                               class="sec8-dest-title-1"><?php _e('Section &#35;8 - Multi-Destination Title &#35;1',
                                                'the-fly-shop'); ?></label></strong><br>
                                <input style="width:50%;" type="text" name="sec8-dest-title-1"
                                       id="sec8-dest-title-1"
                                       value="<?php if (isset ($multi_dest_stored_meta['sec8-dest-title-1'])) {
                                           echo $multi_dest_stored_meta['sec8-dest-title-1'][0];
                                       } ?>"/>

                            </p>
                            <p> <!-- ==== SECTION #8 MULTI-SECTION TEXT AREA #1 ==== -->

                                <strong><label for="sec8-dest-textarea-1"
                                               class="sec8-dest-textarea-1"><?php _e('Section &#35;8 - Multi-Destination Text Area &#35;1',
                                                'the-fly-shop') ?></label></strong>

                                <textarea style="width: 100%;" rows="4" name="sec8-dest-textarea-1"
                                          id="sec8-dest-textarea-1"><?php if (isset ($multi_dest_stored_meta['sec8-dest-textarea-1'])) {
                                        echo $multi_dest_stored_meta['sec8-dest-textarea-1'][0];
                                    } ?></textarea>

                            </p>
                            <p> <!-- ==== SECTION #8 READ MORE #1 ==== -->

                                <strong><label for="sec8-dest-readmore-1"
                                               class="sec8-dest-readmore-1"><?php _e('<strong>Section &#35;8 - Multi-Destination Read More &#35;1</strong>',
                                                'the-fly-shop') ?></label></strong>

                                <textarea style="width: 100%;" rows="4" name="sec8-dest-readmore-1"
                                          id="sec8-dest-readmore-1"><?php if (isset ($multi_dest_stored_meta['sec8-dest-readmore-1'])) {
                                        echo $multi_dest_stored_meta['sec8-dest-readmore-1'][0];
                                    } ?></textarea>

                            </p>
                            <p> <!-- ==== SECTION #8 CAROUSEL IMAGE #2 ==== -->

                                <label for="sec8-dest-img-2"
                                       class="sections-8-image"><?php _e('<strong>Section &#35;8 - Multi-Destination Carousel Image &#35;2</strong>',
                                            'the-fly-shop'); ?></label><br>
                                <input type="text" style="width: 75%;" name="sec8-dest-img-2"
                                       id="sec8-dest-img-2"
                                       value="<?php if (isset ($multi_dest_stored_meta['sec8-dest-img-2'])) {
                                           echo $multi_dest_stored_meta['sec8-dest-img-2'][0];
                                       } ?>"/><br><br>
                                <input type="button" id="sec8-dest-img-2-button" class="button"
                                       value="<?php _e('Choose or Upload an Image',
                                               'the-fly-shop'); ?>"/>

                            </p>

                            <p> <!-- ==== SECTION #8 MULTI-DESTINATION TITLE #2 ==== -->

                                <strong><label for="sec8-dest-title-2"
                                               class="sec8-dest-title-2"><?php _e('Section &#35;8 - Multi-Destination Title &#35;2',
                                                'the-fly-shop'); ?></label></strong><br>
                                <input style="width:50%;" type="text" name="sec8-dest-title-2"
                                       id="sec8-dest-title-2"
                                       value="<?php if (isset ($multi_dest_stored_meta['sec8-dest-title-2'])) {
                                           echo $multi_dest_stored_meta['sec8-dest-title-2'][0];
                                       } ?>"/>

                            </p>
                            <p> <!-- ==== SECTION #8 MULTI-SECTION TEXT AREA #2 ==== -->

                                <strong><label for="sec8-dest-textarea-2"
                                               class="sec8-dest-textarea-2"><?php _e('Section &#35;8 - Multi-Destination Text Area &#35;2',
                                                'the-fly-shop') ?></label></strong>

                                <textarea style="width: 100%;" rows="5" name="sec8-dest-textarea-2"
                                          id="sec8-dest-textarea-2"><?php if (isset ($multi_dest_stored_meta['sec8-dest-textarea-2'])) {
                                        echo $multi_dest_stored_meta['sec8-dest-textarea-2'][0];
                                    } ?></textarea>

                            </p>
                            <p> <!-- ==== SECTION #8 READ MORE #2 ==== -->

                                <strong><label for="sec8-dest-readmore-2"
                                               class="sec8-dest-readmore-2"><?php _e('<strong>Section &#35;8 - Mult-Destination Read More &#35;2</strong>',
                                                'the-fly-shop') ?></label></strong>

                                <textarea style="width: 100%;" rows="4" name="sec8-dest-readmore-2"
                                          id="sec8-dest-readmore-2"><?php if (isset ($multi_dest_stored_meta['sec8-dest-readmore-2'])) {
                                        echo $multi_dest_stored_meta['sec8-dest-readmore-2'][0];
                                    } ?></textarea>

                            </p>

                            <p> <!-- ==== SECTION #8 CAROUSEL IMAGE #3 ==== -->

                                <label for="sec8-dest-img-3"
                                       class="sections-8-image"><?php _e('<strong>Section &#35;8 - Multi-Destination Carousel Image &#35;3</strong>',
                                            'the-fly-shop'); ?></label><br>
                                <input type="text" style="width: 75%;" name="sec8-dest-img-3"
                                       id="sec8-dest-img-3"
                                       value="<?php if (isset ($multi_dest_stored_meta['sec8-dest-img-3'])) {
                                           echo $multi_dest_stored_meta['sec8-dest-img-3'][0];
                                       } ?>"/><br><br>
                                <input type="button" id="sec8-dest-img-3-button" class="button"
                                       value="<?php _e('Choose or Upload an Image',
                                               'the-fly-shop'); ?>"/>

                            </p>

                            <p> <!-- ==== SECTION #8 MULTI-DESTINATION TITLE #3 ==== -->

                                <strong><label for="sec8-dest-title-3"
                                               class="sec8-dest-title-3"><?php _e('Section &#35;8 - Multi-Destination Title &#35;3',
                                                'the-fly-shop'); ?></label></strong><br>
                                <input style="width:50%;" type="text" name="sec8-dest-title-3"
                                       id="sec8-dest-title-3"
                                       value="<?php if (isset ($multi_dest_stored_meta['sec8-dest-title-3'])) {
                                           echo $multi_dest_stored_meta['sec8-dest-title-3'][0];
                                       } ?>"/>

                            </p>
                            <p> <!-- ==== SECTION #8 MULTI-SECTION TEXT AREA #3 ==== -->

                                <strong><label for="sec8-dest-textarea-3"
                                               class="sec8-dest-textarea-3"><?php _e('Section &#35;8 Multi-Destination - Text Area &#35;3',
                                                'the-fly-shop') ?></label></strong>

                                <textarea style="width: 100%;" rows="4" name="sec8-dest-textarea-3"
                                          id="sec8-dest-textarea-3"><?php if (isset ($multi_dest_stored_meta['sec8-dest-textarea-3'])) {
                                        echo $multi_dest_stored_meta['sec8-dest-textarea-3'][0];
                                    } ?></textarea>

                            </p>
                            <p> <!-- ==== SECTION #8 READ MORE #3 ==== -->

                                <strong><label for="sec8-dest-readmore-3"
                                               class="sec8-dest-readmore-3"><?php _e('<strong>Section &#35;8 - Mult-Destination Read More &#35;3</strong>',
                                                'the-fly-shop') ?></label></strong>

                                <textarea style="width: 100%;" rows="4" name="sec8-dest-readmore-3"
                                          id="sec8-dest-readmore-3"><?php if (isset ($multi_dest_stored_meta['sec8-dest-readmore-3'])) {
                                        echo $multi_dest_stored_meta['sec8-dest-readmore-3'][0];
                                    } ?></textarea>

                            </p>

                        </div> <!-- /#sectionsimages8 -->

                        <!-- ==== SECTION #9 ==== -->
                        <div role="tabpanel" class="tab-pane fade in" id="sectionsimage9">

                            <p> <!-- ==== SECTION #9 TITLE ==== -->

                                <strong><label for="sections-9-title"
                                               class="sections-9-title"><?php _e('Section &#35;9 Title',
                                                'the-fly-shop'); ?></label></strong><br>
                                <input style="width:50%;" type="text" name="sections-9-title" id="sections-9-title"
                                       value="<?php if (isset ($multi_dest_stored_meta['sections-9-title'])) {
                                           echo $multi_dest_stored_meta['sections-9-title'][0];
                                       } ?>"/>

                            </p>

                            <p> <!-- ==== SECTION #9 TEXT AREA ==== -->

                                <strong><label for="sections-9-textarea"
                                               class="sections-9-textarea"><?php _e('Section &#35;9 Text Area',
                                                'the-fly-shop') ?></label></strong>

                                <textarea style="width: 100%;" rows="4" name="sections-9-textarea"
                                          id="sections-9-textarea"><?php if (isset ($multi_dest_stored_meta['sections-9-textarea'])) {
                                        echo $multi_dest_stored_meta['sections-9-textarea'][0];
                                    } ?></textarea>

                            </p>

                            <p> <!-- ==== SECTION #9 READ MORE ==== -->

                                <strong><label for="sections-9-readmore"
                                               class="sections-9-readmore"><?php _e('<strong>Section &#35;9 Read More</strong>',
                                                'the-fly-shop') ?></label></strong>

                                <textarea style="width: 100%;" rows="4" name="sections-9-readmore"
                                          id="sections-9-readmore"><?php if (isset ($multi_dest_stored_meta['sections-9-readmore'])) {
                                        echo $multi_dest_stored_meta['sections-9-readmore'][0];
                                    } ?></textarea>

                            </p>

                            <p> <!-- ==== SECTION #9 VIDEO/IMAGE OPTION ==== -->

                                <span class="sections-9-video-image"><?php _e('<strong>Image or Video?</strong>',
                                            'the-fly-shop') ?></span>
                            <div class="sections-9-video-image">
                                <label for="sections-9-video-image">
                                    <input type="checkbox" name="sections-9-video-image-checkbox"
                                           id="sections-9-video-image-checkbox"
                                           value="yes" <?php if (isset ($multi_dest_stored_meta['sections-9-video-image-checkbox'])) {
                                        checked($multi_dest_stored_meta['sections-9-video-image-checkbox'][0],
                                                'yes');
                                    } ?> />
                                    <?php _e('Check box if you are importing video. Leave unchecked for image.',
                                            'the-fly-shop') ?>
                                </label>
                            </div>

                            </p>

                            <p> <!-- ==== SECTION #9 IMAGE ==== -->

                                <label for="sections-9-image"
                                       class="sections-9-image"><?php _e('<strong>Section &#35;9 Image</strong>',
                                            'the-fly-shop'); ?></label><br>
                                <input type="text" style="width: 75%;" name="sections-9-image" id="sections-9-image"
                                       value="<?php if (isset ($multi_dest_stored_meta['sections-9-image'])) {
                                           echo $multi_dest_stored_meta['sections-9-image'][0];
                                       } ?>"/><br><br>
                                <input type="button" id="sections-9-image-button" class="button"
                                       value="<?php _e('Choose or Upload an Image',
                                               'the-fly-shop'); ?>"/>

                            </p>

                            <p> <!-- ==== SECTION #9 VIDEO ==== -->

                                <label for="sections-9-video"
                                       class="sections-9-video"><?php _e('<strong>Paste implicit video URL here. You can also paste the embed Google Map URL here:</strong>',
                                            'the-fly-shop') ?></label>
                                <input type="url" style="width:50%;" name="sections-9-video" id="sections-9-video"
                                       value="<?php if (isset ($multi_dest_stored_meta['sections-9-video'])) {
                                           echo $multi_dest_stored_meta['sections-9-video'][0];
                                       } ?>"/>

                            </p>

                            <hr style="margin-top: 1.618em; border-top: 3px double #8c8b8b;">
                            <h2>Multi-Destination Carousel &amp; Content</h2>
                            <p> <!-- ====  SECTION #9 CAROUSEL IMAGE #1 ==== -->

                                <label for="sec9-dest-img-1"
                                       class="sec9-dest-img-1"><?php _e('<strong>Section &#35;9 - Carousel Image &#35;1</strong>',
                                            'the-fly-shop'); ?></label><br>
                                <input type="text" style="width: 75%;" name="sec9-dest-img-1"
                                       id="sec9-dest-img-1"
                                       value="<?php if (isset ($multi_dest_stored_meta['sec9-dest-img-1'])) {
                                           echo $multi_dest_stored_meta['sec9-dest-img-1'][0];
                                       } ?>"/><br><br>
                                <input type="button" id="sec9-dest-img-1-button" class="button"
                                       value="<?php _e('Choose or Upload an Image',
                                               'the-fly-shop'); ?>"/>

                            </p>
                            <p> <!-- ==== SECTION #9 MULTI-DESTINATION TITLE #1 ==== -->

                                <strong><label for="sec9-dest-title-1"
                                               class="sec9-dest-title-1"><?php _e('Section &#35;9 - Multi-Destination Title &#35;1',
                                                'the-fly-shop'); ?></label></strong><br>
                                <input style="width:50%;" type="text" name="sec9-dest-title-1"
                                       id="sec9-dest-title-1"
                                       value="<?php if (isset ($multi_dest_stored_meta['sec9-dest-title-1'])) {
                                           echo $multi_dest_stored_meta['sec9-dest-title-1'][0];
                                       } ?>"/>

                            </p>
                            <p> <!-- ==== SECTION #9 MULTI-SECTION TEXT AREA #1 ==== -->

                                <strong><label for="sec9-dest-textarea-1"
                                               class="sec9-dest-textarea-1"><?php _e('Section &#35;9 - Multi-Destination Text Area &#35;1',
                                                'the-fly-shop') ?></label></strong>

                                <textarea style="width: 100%;" rows="4" name="sec9-dest-textarea-1"
                                          id="sec9-dest-textarea-1"><?php if (isset ($multi_dest_stored_meta['sec9-dest-textarea-1'])) {
                                        echo $multi_dest_stored_meta['sec9-dest-textarea-1'][0];
                                    } ?></textarea>

                            </p>
                            <p> <!-- ==== SECTION #9 READ MORE #1 ==== -->

                                <strong><label for="sec9-dest-readmore-1"
                                               class="sec9-dest-readmore-1"><?php _e('<strong>Section &#35;9 - Multi-Destination Read More &#35;1</strong>',
                                                'the-fly-shop') ?></label></strong>

                                <textarea style="width: 100%;" rows="4" name="sec9-dest-readmore-1"
                                          id="sec9-dest-readmore-1"><?php if (isset ($multi_dest_stored_meta['sec9-dest-readmore-1'])) {
                                        echo $multi_dest_stored_meta['sec9-dest-readmore-1'][0];
                                    } ?></textarea>

                            </p>
                            <p> <!-- ==== SECTION #9 CAROUSEL IMAGE #2 ==== -->

                                <label for="sec9-dest-img-2"
                                       class="sections-9-image"><?php _e('<strong>Section &#35;9 - Multi-Destination Carousel Image &#35;2</strong>',
                                            'the-fly-shop'); ?></label><br>
                                <input type="text" style="width: 75%;" name="sec9-dest-img-2"
                                       id="sec9-dest-img-2"
                                       value="<?php if (isset ($multi_dest_stored_meta['sec9-dest-img-2'])) {
                                           echo $multi_dest_stored_meta['sec9-dest-img-2'][0];
                                       } ?>"/><br><br>
                                <input type="button" id="sec9-dest-img-2-button" class="button"
                                       value="<?php _e('Choose or Upload an Image',
                                               'the-fly-shop'); ?>"/>

                            </p>

                            <p> <!-- ==== SECTION #9 MULTI-DESTINATION TITLE #2 ==== -->

                                <strong><label for="sec9-dest-title-2"
                                               class="sec9-dest-title-2"><?php _e('Section &#35;9 - Multi-Destination Title &#35;2',
                                                'the-fly-shop'); ?></label></strong><br>
                                <input style="width:50%;" type="text" name="sec9-dest-title-2"
                                       id="sec9-dest-title-2"
                                       value="<?php if (isset ($multi_dest_stored_meta['sec9-dest-title-2'])) {
                                           echo $multi_dest_stored_meta['sec9-dest-title-2'][0];
                                       } ?>"/>

                            </p>
                            <p> <!-- ==== SECTION #9 MULTI-SECTION TEXT AREA #2 ==== -->

                                <strong><label for="sec9-dest-textarea-2"
                                               class="sec9-dest-textarea-2"><?php _e('Section &#35;9 - Multi-Destination Text Area &#35;2',
                                                'the-fly-shop') ?></label></strong>

                                <textarea style="width: 100%;" rows="5" name="sec9-dest-textarea-2"
                                          id="sec9-dest-textarea-2"><?php if (isset ($multi_dest_stored_meta['sec9-dest-textarea-2'])) {
                                        echo $multi_dest_stored_meta['sec9-dest-textarea-2'][0];
                                    } ?></textarea>

                            </p>
                            <p> <!-- ==== SECTION #9 READ MORE #2 ==== -->

                                <strong><label for="sec9-dest-readmore-2"
                                               class="sec9-dest-readmore-2"><?php _e('<strong>Section &#35;9 - Mult-Destination Read More &#35;2</strong>',
                                                'the-fly-shop') ?></label></strong>

                                <textarea style="width: 100%;" rows="4" name="sec9-dest-readmore-2"
                                          id="sec9-dest-readmore-2"><?php if (isset ($multi_dest_stored_meta['sec9-dest-readmore-2'])) {
                                        echo $multi_dest_stored_meta['sec9-dest-readmore-2'][0];
                                    } ?></textarea>

                            </p>

                            <p> <!-- ==== SECTION #9 CAROUSEL IMAGE #3 ==== -->

                                <label for="sec9-dest-img-3"
                                       class="sections-9-image"><?php _e('<strong>Section &#35;9 - Multi-Destination Carousel Image &#35;3</strong>',
                                            'the-fly-shop'); ?></label><br>
                                <input type="text" style="width: 75%;" name="sec9-dest-img-3"
                                       id="sec9-dest-img-3"
                                       value="<?php if (isset ($multi_dest_stored_meta['sec9-dest-img-3'])) {
                                           echo $multi_dest_stored_meta['sec9-dest-img-3'][0];
                                       } ?>"/><br><br>
                                <input type="button" id="sec9-dest-img-3-button" class="button"
                                       value="<?php _e('Choose or Upload an Image',
                                               'the-fly-shop'); ?>"/>

                            </p>

                            <p> <!-- ==== SECTION #9 MULTI-DESTINATION TITLE #3 ==== -->

                                <strong><label for="sec9-dest-title-3"
                                               class="sec9-dest-title-3"><?php _e('Section &#35;9 - Multi-Destination Title &#35;3',
                                                'the-fly-shop'); ?></label></strong><br>
                                <input style="width:50%;" type="text" name="sec9-dest-title-3"
                                       id="sec9-dest-title-3"
                                       value="<?php if (isset ($multi_dest_stored_meta['sec9-dest-title-3'])) {
                                           echo $multi_dest_stored_meta['sec9-dest-title-3'][0];
                                       } ?>"/>

                            </p>
                            <p> <!-- ==== SECTION #9 MULTI-SECTION TEXT AREA #3 ==== -->

                                <strong><label for="sec9-dest-textarea-3"
                                               class="sec9-dest-textarea-3"><?php _e('Section &#35;9 Multi-Destination - Text Area &#35;3',
                                                'the-fly-shop') ?></label></strong>

                                <textarea style="width: 100%;" rows="4" name="sec9-dest-textarea-3"
                                          id="sec9-dest-textarea-3"><?php if (isset ($multi_dest_stored_meta['sec9-dest-textarea-3'])) {
                                        echo $multi_dest_stored_meta['sec9-dest-textarea-3'][0];
                                    } ?></textarea>

                            </p>
                            <p> <!-- ==== SECTION #9 READ MORE #3 ==== -->

                                <strong><label for="sec9-dest-readmore-3"
                                               class="sec9-dest-readmore-3"><?php _e('<strong>Section &#35;9 - Mult-Destination Read More &#35;3</strong>',
                                                'the-fly-shop') ?></label></strong>

                                <textarea style="width: 100%;" rows="4" name="sec9-dest-readmore-3"
                                          id="sec9-dest-readmore-3"><?php if (isset ($multi_dest_stored_meta['sec9-dest-readmore-3'])) {
                                        echo $multi_dest_stored_meta['sec9-dest-readmore-3'][0];
                                    } ?></textarea>

                            </p>

                        </div> <!-- /#sectionsimages9 -->

                        <!-- ==== SECTION #10 ==== -->
                        <div role="tabpanel" class="tab-pane fade in" id="sectionsimage10">

                            <p> <!-- ==== SECTION #10 TITLE ==== -->

                                <strong><label for="sections-10-title"
                                               class="sections-10-title"><?php _e('Section &#35;10 Title',
                                                'the-fly-shop'); ?></label></strong><br>
                                <input style="width:50%;" type="text" name="sections-10-title" id="sections-10-title"
                                       value="<?php if (isset ($multi_dest_stored_meta['sections-10-title'])) {
                                           echo $multi_dest_stored_meta['sections-10-title'][0];
                                       } ?>"/>

                            </p>

                            <p> <!-- ==== SECTION #10 TEXT AREA ==== -->

                                <strong><label for="sections-10-textarea"
                                               class="sections-10-textarea"><?php _e('Section &#35;10 Text Area',
                                                'the-fly-shop') ?></label></strong>

                                <textarea style="width: 100%;" rows="4" name="sections-10-textarea"
                                          id="sections-10-textarea"><?php if (isset ($multi_dest_stored_meta['sections-10-textarea'])) {
                                        echo $multi_dest_stored_meta['sections-10-textarea'][0];
                                    } ?></textarea>

                            </p>

                            <p> <!-- ==== SECTION #10 READ MORE ==== -->

                                <strong><label for="sections-10-readmore"
                                               class="sections-10-readmore"><?php _e('<strong>Section &#35;10 Read More</strong>',
                                                'the-fly-shop') ?></label></strong>

                                <textarea style="width: 100%;" rows="4" name="sections-10-readmore"
                                          id="sections-10-readmore"><?php if (isset ($multi_dest_stored_meta['sections-10-readmore'])) {
                                        echo $multi_dest_stored_meta['sections-10-readmore'][0];
                                    } ?></textarea>

                            </p>

                            <p> <!-- ==== SECTION #10 VIDEO/IMAGE OPTION ==== -->

                                <span class="sections-10-video-image"><?php _e('<strong>Image or Video?</strong>',
                                            'the-fly-shop') ?></span>
                            <div class="sections-10-video-image">
                                <label for="sections-10-video-image">
                                    <input type="checkbox" name="sections-10-video-image-checkbox"
                                           id="sections-10-video-image-checkbox"
                                           value="yes" <?php if (isset ($multi_dest_stored_meta['sections-10-video-image-checkbox'])) {
                                        checked($multi_dest_stored_meta['sections-10-video-image-checkbox'][0],
                                                'yes');
                                    } ?> />
                                    <?php _e('Check box if you are importing video. Leave unchecked for image.',
                                            'the-fly-shop') ?>
                                </label>
                            </div>

                            </p>

                            <p> <!-- ==== SECTION #10 IMAGE ==== -->

                                <label for="sections-10-image"
                                       class="sections-10-image"><?php _e('<strong>Section &#35;10 Image</strong>',
                                            'the-fly-shop'); ?></label><br>
                                <input type="text" style="width: 75%;" name="sections-10-image" id="sections-10-image"
                                       value="<?php if (isset ($multi_dest_stored_meta['sections-10-image'])) {
                                           echo $multi_dest_stored_meta['sections-10-image'][0];
                                       } ?>"/><br><br>
                                <input type="button" id="sections-10-image-button" class="button"
                                       value="<?php _e('Choose or Upload an Image',
                                               'the-fly-shop'); ?>"/>

                            </p>

                            <p> <!-- ==== SECTION #10 VIDEO ==== -->

                                <label for="sections-10-video"
                                       class="sections-10-video"><?php _e('<strong>Paste implicit video URL here. You can also paste the embed Google Map URL here:</strong>',
                                            'the-fly-shop') ?></label>
                                <input type="url" style="width:50%;" name="sections-10-video" id="sections-10-video"
                                       value="<?php if (isset ($multi_dest_stored_meta['sections-10-video'])) {
                                           echo $multi_dest_stored_meta['sections-10-video'][0];
                                       } ?>"/>

                            </p>






                            <hr style="margin-top: 1.618em; border-top: 3px double #8c8b8b;">
                            <h2>Multi-Destination Carousel &amp; Content</h2>
                            <p> <!-- ====  SECTION #10 CAROUSEL IMAGE #1 ==== -->

                                <label for="sec10-dest-img-1"
                                       class="sec10-dest-img-1"><?php _e('<strong>Section &#35;10 - Carousel Image &#35;1</strong>',
                                            'the-fly-shop'); ?></label><br>
                                <input type="text" style="width: 75%;" name="sec10-dest-img-1"
                                       id="sec10-dest-img-1"
                                       value="<?php if (isset ($multi_dest_stored_meta['sec10-dest-img-1'])) {
                                           echo $multi_dest_stored_meta['sec10-dest-img-1'][0];
                                       } ?>"/><br><br>
                                <input type="button" id="sec10-dest-img-1-button" class="button"
                                       value="<?php _e('Choose or Upload an Image',
                                               'the-fly-shop'); ?>"/>

                            </p>
                            <p> <!-- ==== SECTION #10 MULTI-DESTINATION TITLE #1 ==== -->

                                <strong><label for="sec10-dest-title-1"
                                               class="sec10-dest-title-1"><?php _e('Section &#35;10 - Multi-Destination Title &#35;1',
                                                'the-fly-shop'); ?></label></strong><br>
                                <input style="width:50%;" type="text" name="sec10-dest-title-1"
                                       id="sec10-dest-title-1"
                                       value="<?php if (isset ($multi_dest_stored_meta['sec10-dest-title-1'])) {
                                           echo $multi_dest_stored_meta['sec10-dest-title-1'][0];
                                       } ?>"/>

                            </p>
                            <p> <!-- ==== SECTION #10 MULTI-SECTION TEXT AREA #1 ==== -->

                                <strong><label for="sec10-dest-textarea-1"
                                               class="sec10-dest-textarea-1"><?php _e('Section &#35;10 - Multi-Destination Text Area &#35;1',
                                                'the-fly-shop') ?></label></strong>

                                <textarea style="width: 100%;" rows="4" name="sec10-dest-textarea-1"
                                          id="sec10-dest-textarea-1"><?php if (isset ($multi_dest_stored_meta['sec10-dest-textarea-1'])) {
                                        echo $multi_dest_stored_meta['sec10-dest-textarea-1'][0];
                                    } ?></textarea>

                            </p>
                            <p> <!-- ==== SECTION #10 READ MORE #1 ==== -->

                                <strong><label for="sec10-dest-readmore-1"
                                               class="sec10-dest-readmore-1"><?php _e('<strong>Section &#35;10 - Multi-Destination Read More &#35;1</strong>',
                                                'the-fly-shop') ?></label></strong>

                                <textarea style="width: 100%;" rows="4" name="sec10-dest-readmore-1"
                                          id="sec10-dest-readmore-1"><?php if (isset ($multi_dest_stored_meta['sec10-dest-readmore-1'])) {
                                        echo $multi_dest_stored_meta['sec10-dest-readmore-1'][0];
                                    } ?></textarea>

                            </p>
                            <p> <!-- ==== SECTION #10 CAROUSEL IMAGE #2 ==== -->

                                <label for="sec10-dest-img-2"
                                       class="sections-10-image"><?php _e('<strong>Section &#35;10 - Multi-Destination Carousel Image &#35;2</strong>',
                                            'the-fly-shop'); ?></label><br>
                                <input type="text" style="width: 75%;" name="sec10-dest-img-2"
                                       id="sec10-dest-img-2"
                                       value="<?php if (isset ($multi_dest_stored_meta['sec10-dest-img-2'])) {
                                           echo $multi_dest_stored_meta['sec10-dest-img-2'][0];
                                       } ?>"/><br><br>
                                <input type="button" id="sec10-dest-img-2-button" class="button"
                                       value="<?php _e('Choose or Upload an Image',
                                               'the-fly-shop'); ?>"/>

                            </p>

                            <p> <!-- ==== SECTION #10 MULTI-DESTINATION TITLE #2 ==== -->

                                <strong><label for="sec10-dest-title-2"
                                               class="sec10-dest-title-2"><?php _e('Section &#35;10 - Multi-Destination Title &#35;2',
                                                'the-fly-shop'); ?></label></strong><br>
                                <input style="width:50%;" type="text" name="sec10-dest-title-2"
                                       id="sec10-dest-title-2"
                                       value="<?php if (isset ($multi_dest_stored_meta['sec10-dest-title-2'])) {
                                           echo $multi_dest_stored_meta['sec10-dest-title-2'][0];
                                       } ?>"/>

                            </p>
                            <p> <!-- ==== SECTION #10 MULTI-SECTION TEXT AREA #2 ==== -->

                                <strong><label for="sec10-dest-textarea-2"
                                               class="sec10-dest-textarea-2"><?php _e('Section &#35;10 - Multi-Destination Text Area &#35;2',
                                                'the-fly-shop') ?></label></strong>

                                <textarea style="width: 100%;" rows="5" name="sec10-dest-textarea-2"
                                          id="sec10-dest-textarea-2"><?php if (isset ($multi_dest_stored_meta['sec10-dest-textarea-2'])) {
                                        echo $multi_dest_stored_meta['sec10-dest-textarea-2'][0];
                                    } ?></textarea>

                            </p>
                            <p> <!-- ==== SECTION #10 READ MORE #2 ==== -->

                                <strong><label for="sec10-dest-readmore-2"
                                               class="sec10-dest-readmore-2"><?php _e('<strong>Section &#35;10 - Mult-Destination Read More &#35;2</strong>',
                                                'the-fly-shop') ?></label></strong>

                                <textarea style="width: 100%;" rows="4" name="sec10-dest-readmore-2"
                                          id="sec10-dest-readmore-2"><?php if (isset ($multi_dest_stored_meta['sec10-dest-readmore-2'])) {
                                        echo $multi_dest_stored_meta['sec10-dest-readmore-2'][0];
                                    } ?></textarea>

                            </p>

                            <p> <!-- ==== SECTION #10 CAROUSEL IMAGE #3 ==== -->

                                <label for="sec10-dest-img-3"
                                       class="sections-10-image"><?php _e('<strong>Section &#35;10 - Multi-Destination Carousel Image &#35;3</strong>',
                                            'the-fly-shop'); ?></label><br>
                                <input type="text" style="width: 75%;" name="sec10-dest-img-3"
                                       id="sec10-dest-img-3"
                                       value="<?php if (isset ($multi_dest_stored_meta['sec10-dest-img-3'])) {
                                           echo $multi_dest_stored_meta['sec10-dest-img-3'][0];
                                       } ?>"/><br><br>
                                <input type="button" id="sec10-dest-img-3-button" class="button"
                                       value="<?php _e('Choose or Upload an Image',
                                               'the-fly-shop'); ?>"/>

                            </p>

                            <p> <!-- ==== SECTION #10 MULTI-DESTINATION TITLE #3 ==== -->

                                <strong><label for="sec10-dest-title-3"
                                               class="sec10-dest-title-3"><?php _e('Section &#35;10 - Multi-Destination Title &#35;3',
                                                'the-fly-shop'); ?></label></strong><br>
                                <input style="width:50%;" type="text" name="sec10-dest-title-3"
                                       id="sec10-dest-title-3"
                                       value="<?php if (isset ($multi_dest_stored_meta['sec10-dest-title-3'])) {
                                           echo $multi_dest_stored_meta['sec10-dest-title-3'][0];
                                       } ?>"/>

                            </p>
                            <p> <!-- ==== SECTION #10 MULTI-SECTION TEXT AREA #3 ==== -->

                                <strong><label for="sec10-dest-textarea-3"
                                               class="sec10-dest-textarea-3"><?php _e('Section &#35;10 Multi-Destination - Text Area &#35;3',
                                                'the-fly-shop') ?></label></strong>

                                <textarea style="width: 100%;" rows="4" name="sec10-dest-textarea-3"
                                          id="sec10-dest-textarea-3"><?php if (isset ($multi_dest_stored_meta['sec10-dest-textarea-3'])) {
                                        echo $multi_dest_stored_meta['sec10-dest-textarea-3'][0];
                                    } ?></textarea>

                            </p>
                            <p> <!-- ==== SECTION #10 READ MORE #3 ==== -->

                                <strong><label for="sec10-dest-readmore-3"
                                               class="sec10-dest-readmore-3"><?php _e('<strong>Section &#35;10 - Mult-Destination Read More &#35;3</strong>',
                                                'the-fly-shop') ?></label></strong>

                                <textarea style="width: 100%;" rows="4" name="sec10-dest-readmore-3"
                                          id="sec10-dest-readmore-3"><?php if (isset ($multi_dest_stored_meta['sec10-dest-readmore-3'])) {
                                        echo $multi_dest_stored_meta['sec10-dest-readmore-3'][0];
                                    } ?></textarea>

                            </p>

                        </div> <!-- /#sectionsimages10 -->

                    </div> <!-- /.tab-content -->
                </div> <!-- /.pnael-body boof -->
            </div> <!-- /.pnael-heading -->
        </div> <!-- /.panel-default -->


        <div class="panel with-nav-tabs panel-default">
            <div class="panel-heading">
                <h3 class="ml-1">Gallery Section</h3>
                <!-- Nav tabs -->
                <ul class="nav nav-tabs" role="tablist">
                    <li role="presentation" class="active"><a href="#galleryphoto1" aria-controls="galleryphoto1"
                                                              role="tab" data-toggle="tab">Gallery
                            Photo &#35;1</a></li>
                    <li role="presentation"><a href="#galleryphoto2" aria-controls="galleryphoto2" role="tab"
                                               data-toggle="tab">Gallery Photo &#35;2</a>
                    </li>
                    <li role="presentation"><a href="#galleryphoto3" aria-controls="galleryphoto3" role="tab"
                                               data-toggle="tab">Gallery Photo &#35;3</a>
                    </li>
                    <li role="presentation"><a href="#galleryphoto4" aria-controls="galleryphoto4" role="tab"
                                               data-toggle="tab">Gallery Photo &#35;4</a>
                    </li>
                    <li role="presentation"><a href="#galleryphoto5" aria-controls="galleryphoto5" role="tab"
                                               data-toggle="tab">Gallery Photo &#35;5</a>
                    </li>
                    <li role="presentation"><a href="#galleryphoto6" aria-controls="galleryphoto6" role="tab"
                                               data-toggle="tab">Gallery Photo &#35;6</a>
                    </li>
                    <li role="presentation"><a href="#galleryphoto7" aria-controls="galleryphoto7" role="tab"
                                               data-toggle="tab">Gallery Photo &#35;7</a>
                    </li>
                    <li role="presentation"><a href="#galleryphoto8" aria-controls="galleryphoto8" role="tab"
                                               data-toggle="tab">Gallery Photo &#35;8</a>
                    </li>
                </ul>

                <div class="panel-body boof">
                    <div class="tab-content">

                        <!-- ==== SECTION #1 ==== -->
                        <div role="tabpanel" class="tab-pane fade in active" id="galleryphoto1">

                            <p> <!-- ==== SECTION #1 IMAGE ==== -->

                                <label for="galleryphoto-1-image"
                                       class="galleryphoto-1-image"><?php _e('<strong>Gallery Photo &#35;1</strong>',
                                            'the-fly-shop'); ?></label><br>
                                <input type="text" style="width: 75%;" name="galleryphoto-1-image"
                                       id="galleryphoto-1-image"
                                       value="<?php if (isset ($multi_dest_stored_meta['galleryphoto-1-image'])) {
                                           echo $multi_dest_stored_meta['galleryphoto-1-image'][0];
                                       } ?>"/><br><br>
                                <input type="button" id="galleryphoto-1-image-button" class="button"
                                       value="<?php _e('Choose or Upload an Image',
                                               'the-fly-shop'); ?>"/>

                            </p>

                        </div> <!-- /#galleryphoto1 -->

                        <!-- ==== SECTION #2 ==== -->
                        <div role="tabpanel" class="tab-pane fade in" id="galleryphoto2">

                            <p> <!-- ==== SECTION #2 IMAGE ==== -->

                                <label for="galleryphoto-2-image"
                                       class="galleryphoto-2-image"><?php _e('<strong>Gallery Photo &#35;2</strong>',
                                            'the-fly-shop'); ?></label><br>
                                <input type="text" style="width: 75%;" name="galleryphoto-2-image"
                                       id="galleryphoto-2-image"
                                       value="<?php if (isset ($multi_dest_stored_meta['galleryphoto-2-image'])) {
                                           echo $multi_dest_stored_meta['galleryphoto-2-image'][0];
                                       } ?>"/><br><br>
                                <input type="button" id="galleryphoto-2-image-button" class="button"
                                       value="<?php _e('Choose or Upload an Image',
                                               'the-fly-shop'); ?>"/>

                            </p>

                        </div> <!-- /#galleryphoto2 -->

                        <!-- ==== SECTION #3 ==== -->
                        <div role="tabpanel" class="tab-pane fade in" id="galleryphoto3">

                            <p> <!-- ==== SECTION #3 IMAGE ==== -->

                                <label for="galleryphoto-3-image"
                                       class="galleryphoto-3-image"><?php _e('<strong>Gallery Photo &#35;3</strong>',
                                            'the-fly-shop'); ?></label><br>
                                <input type="text" style="width: 75%;" name="galleryphoto-3-image"
                                       id="galleryphoto-3-image"
                                       value="<?php if (isset ($multi_dest_stored_meta['galleryphoto-3-image'])) {
                                           echo $multi_dest_stored_meta['galleryphoto-3-image'][0];
                                       } ?>"/><br><br>
                                <input type="button" id="galleryphoto-3-image-button" class="button"
                                       value="<?php _e('Choose or Upload an Image',
                                               'the-fly-shop'); ?>"/>

                            </p>

                        </div> <!-- /#galleryphoto3 -->

                        <!-- ==== SECTION #4 ==== -->
                        <div role="tabpanel" class="tab-pane fade in" id="galleryphoto4">

                            <p> <!-- ==== SECTION #4 IMAGE ==== -->

                                <label for="galleryphoto-4-image"
                                       class="galleryphoto-4-image"><?php _e('<strong>Gallery Photo &#35;4</strong>',
                                            'the-fly-shop'); ?></label><br>
                                <input type="text" style="width: 75%;" name="galleryphoto-4-image"
                                       id="galleryphoto-4-image"
                                       value="<?php if (isset ($multi_dest_stored_meta['galleryphoto-4-image'])) {
                                           echo $multi_dest_stored_meta['galleryphoto-4-image'][0];
                                       } ?>"/><br><br>
                                <input type="button" id="galleryphoto-4-image-button" class="button"
                                       value="<?php _e('Choose or Upload an Image',
                                               'the-fly-shop'); ?>"/>

                            </p>

                        </div> <!-- /#galleryphoto4 -->

                        <!-- ==== SECTION #5 ==== -->
                        <div role="tabpanel" class="tab-pane fade in" id="galleryphoto5">

                            <p> <!-- ==== SECTION #5 IMAGE ==== -->

                                <label for="galleryphoto-5-image"
                                       class="galleryphoto-5-image"><?php _e('<strong>Gallery Photo &#35;5</strong>',
                                            'the-fly-shop'); ?></label><br>
                                <input type="text" style="width: 75%;" name="galleryphoto-5-image"
                                       id="galleryphoto-5-image"
                                       value="<?php if (isset ($multi_dest_stored_meta['galleryphoto-5-image'])) {
                                           echo $multi_dest_stored_meta['galleryphoto-5-image'][0];
                                       } ?>"/><br><br>
                                <input type="button" id="galleryphoto-5-image-button" class="button"
                                       value="<?php _e('Choose or Upload an Image',
                                               'the-fly-shop'); ?>"/>

                            </p>

                        </div> <!-- /#galleryphoto5 -->

                        <!-- ==== SECTION #6 ==== -->
                        <div role="tabpanel" class="tab-pane fade in" id="galleryphoto6">

                            <p> <!-- ==== SECTION #6 IMAGE ==== -->

                                <label for="galleryphoto-6-image"
                                       class="galleryphoto-6-image"><?php _e('<strong>Gallery Photo &#35;6</strong>',
                                            'the-fly-shop'); ?></label><br>
                                <input type="text" style="width: 75%;" name="galleryphoto-6-image"
                                       id="galleryphoto-6-image"
                                       value="<?php if (isset ($multi_dest_stored_meta['galleryphoto-6-image'])) {
                                           echo $multi_dest_stored_meta['galleryphoto-6-image'][0];
                                       } ?>"/><br><br>
                                <input type="button" id="galleryphoto-6-image-button" class="button"
                                       value="<?php _e('Choose or Upload an Image',
                                               'the-fly-shop'); ?>"/>

                            </p>

                        </div> <!-- /#galleryphoto6 -->

                        <!-- ==== SECTION #7 ==== -->
                        <div role="tabpanel" class="tab-pane fade in" id="galleryphoto7">

                            <p> <!-- ==== SECTION #7 IMAGE ==== -->

                                <label for="galleryphoto-7-image"
                                       class="galleryphoto-7-image"><?php _e('<strong>Gallery Photo &#35;7</strong>',
                                            'the-fly-shop'); ?></label><br>
                                <input type="text" style="width: 75%;" name="galleryphoto-7-image"
                                       id="galleryphoto-7-image"
                                       value="<?php if (isset ($multi_dest_stored_meta['galleryphoto-7-image'])) {
                                           echo $multi_dest_stored_meta['galleryphoto-7-image'][0];
                                       } ?>"/><br><br>
                                <input type="button" id="galleryphoto-7-image-button" class="button"
                                       value="<?php _e('Choose or Upload an Image',
                                               'the-fly-shop'); ?>"/>

                            </p>

                        </div> <!-- /#galleryphoto7 -->

                        <!-- ==== SECTION #8 ==== -->
                        <div role="tabpanel" class="tab-pane fade in" id="galleryphoto8">

                            <p> <!-- ==== SECTION #8 IMAGE ==== -->

                                <label for="galleryphoto-8-image"
                                       class="galleryphoto-8-image"><?php _e('<strong>Gallery Photo &#35;8</strong>',
                                            'the-fly-shop'); ?></label><br>
                                <input type="text" style="width: 75%;" name="galleryphoto-8-image"
                                       id="galleryphoto-8-image"
                                       value="<?php if (isset ($multi_dest_stored_meta['galleryphoto-8-image'])) {
                                           echo $multi_dest_stored_meta['galleryphoto-8-image'][0];
                                       } ?>"/><br><br>
                                <input type="button" id="galleryphoto-8-image-button" class="button"
                                       value="<?php _e('Choose or Upload an Image',
                                               'the-fly-shop'); ?>"/>

                            </p>

                        </div> <!-- /#galleryphoto8 -->

                    </div> <!-- /.tab-content -->
                </div> <!-- /.pnael-body boof -->
            </div> <!-- /.pnael-heading -->
        </div> <!-- /.panel-default -->

        <?php
    }
