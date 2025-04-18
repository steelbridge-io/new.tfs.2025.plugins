<?php
/**
	* Adds a meta-box to the post-editing screen
	*/
//ob_implicit_flush(true);
function register_landing_page_meta_box() {
	global $post;
	if ( ! empty( $post ) ) {
		$pageTemplate = get_post_meta( $post->ID, '_wp_page_template', TRUE );
		$types        = array( 'page', 'post' );

		if ( $pageTemplate == 'page-templates/landing-page.php' ) {
			foreach ( $types as $type ) {
				add_meta_box( 'landing_page_meta',
					__( 'Landing Page Template Options', 'landing-page-textdomain' ),
					'landing_page_meta_callback',
					$type,
					'normal',
					'high' );
			}
		}
	}
}

add_action( 'add_meta_boxes', 'register_landing_page_meta_box' );
/**
	* Outputs the content of the meta-box
	*/
//ob_start();
function landing_page_meta_callback( $post ) {
	wp_nonce_field( basename( __FILE__ ), 'landing_page_nonce' );
	$landing_page_stored_meta = get_post_meta( $post->ID ); ?>

    <div id="meta-wrapper">

        <div class="meta-cont"> <!-- ==== TFS LOGO ==== -->

            <?php
            $landing_page_logo = '';
            if ( isset( $landing_page_stored_meta['landing-page-logo'] ) ) {
            $landing_page_logo = $landing_page_stored_meta['landing-page-logo'][0];
            }

            $landing_page_logo = get_post_meta( $post->ID, 'landing-page-logo', true );
            ?>
            <div class="input-cont">
                <div class="landing-inputs">
                    <label for="landing-page-logo" class="landing-page-row-title"><?php _e( 'TFS Logo', 'landing-page-textdomain' ); ?></label>
                    <input type="text" style="width:55%;" name="landing-page-logo" id="landing-page-logo" value="<?php echo esc_attr($landing_page_logo); ?>"/>
                    <input type="button" id="landing-page-logo-button" class="button" value="<?php _e( 'Choose or Upload an Image', 'landing-page-textdomain' ); ?>"/>
                    <img class="image-preview" id="landing-page-logo-preview" src="<?php echo( $landing_page_logo ? $landing_page_logo : plugins_url( '../img/placeholder.jpg', __FILE__ ) ); ?>" alt="Image Preview">
                </div>
            </div>

        </div>

        <div class="meta-cont">
            <!-- Overlay Opacity Range Selector -->
                <?php
                // Retrieve the custom field value
                $landing_temp_basic_value = get_post_meta($post->ID, 'landing-temp-opacity-range', true);

                // Set a default value if the custom field is empty
                if (empty($landing_temp_basic_value)) {
                    $landing_temp_basic_value = 0.1; // Set your desired default value here
                }
                // Output the HTML for the custom range input
                ?>
            <label for="blog_temp_basic_value"><b>Custom Range Value</b></label>
            <div style="background-color: #f5f5f5; padding: 1em;">
                <div>
                    <span>The "Custom Range Value" below selects the opacity of the image or video overlay. Setting this value helps contrast logo, title, telephone against the background media.</span>
                </div>
                <label for="blog_temp_basic_value"><b>Custom Range Value:</b></label>
                <input type="range" name="landing-temp-opacity-range" id="landing-temp-opacity-range" min="0.1" max="1" step="0.01" value="<?php echo esc_attr($landing_temp_basic_value); ?>">
                <span id="landing_range_value_display"><?php echo esc_attr($landing_temp_basic_value); ?></span>
            </div>

        </div>

        <!-- Script renders range selector value to the right of range selector -->
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const rangeInput = document.getElementById('landing-temp-opacity-range');
                const rangeValueDisplay = document.getElementById('landing_range_value_display');

                rangeInput.addEventListener('input', function() {
                    rangeValueDisplay.textContent = rangeInput.value;
                });
            });
        </script>

        <div class="meta-cont"> <!-- ==== LANDING PAGE HERO IMAGE ==== -->

            <?php
            $landing_page_image = '';
            if ( isset( $landing_page_stored_meta['landing-page-image'] ) ) {
            $landing_page_image = $landing_page_stored_meta['landing-page-image'][0];
            }
            $landing_page_image = get_post_meta( $post->ID, 'landing-page-image', true );
            ?>

            <div class="input-cont">
            <div class="landing-inputs">
            <label for="landing-page-image" class="landing-page-row-title"><?php _e( 'Hero Image', 'landing-page-textdomain' ); ?></label>
            <input type="text" style="width:55%;" name="landing-page-image" id="landing-page-image" value="<?php echo esc_attr($landing_page_image); ?>"/>
            <input type="button" id="landing-page-image-button" class="button" value="<?php _e( 'Choose or Upload an Image', 'landing-page-textdomain' ); ?>"/>
            <img class="image-preview" id="landing-page-image-preview" src="<?php echo( $landing_page_image ? $landing_page_image : plugins_url( '../img/placeholder.jpg', __FILE__ ) ); ?>" alt="Image Preview">
            </div>
            </div>

        </div>

        <div class="meta-cont">

            <?php
            $landing_page_desc = '';
            if ( isset( $landing_page_stored_meta['landing-page-desc'] ) ) {
            $landing_page_desc = $landing_page_stored_meta['landing-page-desc'][0];
            }
            $landing_page_desc = get_post_meta( $post->ID, 'landing-page-desc', true );
            ?>

            <div class="input-cont">
            <div class="landing-inputs">
            <label for="landing-page-desc" class="blog-row-desc"><?php _e( 'Header Description', 'tfs-blog-textdomain' ) ?></label>
            <input style="width: 80%;" type="text" name="landing-page-desc" id="landing-page-desc" value="<?php echo esc_attr($landing_page_desc); ?>"/>
            </div>

            </div>
        </div>

        <div class="meta-cont">

            <?php
            $landing_page_cta = '';
            if ( isset( $landing_page_stored_meta['landing-page-cta'] ) ) {
                $landing_page_cta = $landing_page_stored_meta['landing-page-cta'][0];
            }
            $landing_page_cta = get_post_meta( $post->ID, 'landing-page-cta', true );
            ?>

            <div class="input-cont">
                <div class="landing-inputs">
                    <label for="landing-page-cta" class="blog-row-cta"><?php _e( 'Call To Action', 'tfs-blog-textdomain' ) ?></label>
                    <textarea style="width: 80%;" type="text" name="landing-page-cta" id="landing-page-cta"><?php echo esc_attr($landing_page_cta); ?></textarea>
                </div>

            </div>
        </div>


    </div>

    <div class="accordion accordion-flush" id="accordionFlushExample">
        <div class="accordion-item">
            <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                    Item #1
                    <?php  $grid_item_1_img = get_post_meta( $post->ID, 'grid-item-1-img', true ); ?>
                    <img class="image-preview-grid" id="grid-item-1-img-preview" src="<?php echo( $grid_item_1_img ? $grid_item_1_img : plugins_url( '../img/placeholder.jpg', __FILE__ ) ); ?>" alt="Image Preview">
                </button>
            </h2>
            <div id="flush-collapseOne" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                <div class="accordion-body">

                    <?php
                    $grid_item_1_img = '';
                    if ( isset( $landing_page_stored_meta['grid-item-1-img'] ) ) {
                    $grid_item_1_img = $landing_page_stored_meta['grid-item-1-img'][0];
                    }
                    $grid_item_1_img = get_post_meta( $post->ID, 'grid-item-1-img', true );

                    $grid_item_1_cta = '';
                    if ( isset( $landing_page_stored_meta['grid-item-1-cta'] ) ) {
	                    $grid_item_1_cta = $landing_page_stored_meta['grid-item-1-cta'][0];
                    }
                    $grid_item_1_cta = get_post_meta( $post->ID, 'grid-item-1-cta', true );
                    ?>
                    <div class="accordion-cmf">
                    <label for="grid-item-1-img" class="grid-label grid-item-1-img-row"><?php _e( 'Item Image', 'tfs-blog-textdomain' ) ?></label>
                    <input type="text" style="width:50%;" name="grid-item-1-img" id="grid-item-1-img" value="<?php echo esc_attr($grid_item_1_img); ?>"/>
                    <input type="button" id="grid-item-1-img-button" class="button" value="<?php _e( 'Choose or Upload an Image', 'landing-page-textdomain' ); ?>"/>
                    </div>
                    <div class="accordion-cmf">
                    <label for="grid-item-1-cta" class="grid-label grid-item-1-cta-row"><?php _e( 'Call to action', 'tfs-blog-textdomain' ) ?></label>
                    <input style="width: 80%;" type="text" name="grid-item-1-cta" id="grid-item-1-cta" value="<?php echo esc_attr($grid_item_1_cta); ?>"/>
                    </div>
                </div>
            </div>
        </div>
        <div class="accordion-item">
            <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                    Item #2
                    <?php  $grid_item_2_img = get_post_meta( $post->ID, 'grid-item-2-img', true ); ?>
                    <img class="image-preview-grid" id="grid-item-2-img-preview" src="<?php echo( $grid_item_2_img ? $grid_item_2_img : plugins_url( '../img/placeholder.jpg', __FILE__ ) ); ?>" alt="Image Preview">
                </button>
            </h2>
            <div id="flush-collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                <div class="accordion-body">

                    <?php
                    $grid_item_2_img = '';
                    if ( isset( $landing_page_stored_meta['grid-item-2-img'] ) ) {
                    $grid_item_2_img = $landing_page_stored_meta['grid-item-2-img'][0];
                    }
                    $grid_item_2_img = get_post_meta( $post->ID, 'grid-item-2-img', true );

                    $grid_item_2_cta = '';
                    if ( isset( $landing_page_stored_meta['grid-item-2-cta'] ) ) {
	                    $grid_item_2_cta = $landing_page_stored_meta['grid-item-2-cta'][0];
                    }
                    $grid_item_2_cta = get_post_meta( $post->ID, 'grid-item-2-cta', true );
                    ?>

                    <div class="accordion-cmf">
                    <label for="grid-item-2-img" class="grid-label grid-item-2-img-row"><?php _e( 'Item Image', 'tfs-blog-textdomain' ) ?></label>
                    <input type="text" style="width:50%;" name="grid-item-2-img" id="grid-item-2-img" value="<?php echo esc_attr($grid_item_2_img); ?>"/>
                    <input type="button" id="grid-item-2-img-button" class="button" value="<?php _e( 'Choose or Upload an Image', 'landing-page-textdomain' ); ?>"/>
                    </div>
                    <div class="accordion-cmf">
                    <label for="grid-item-2-cta" class="grid-label grid-item-2-cta-row"><?php _e( 'Call to action', 'tfs-blog-textdomain' ) ?></label>
                    <input style="width: 80%;" type="text" name="grid-item-2-cta" id="grid-item-2-cta" value="<?php echo esc_attr($grid_item_2_cta); ?>"/>
                    </div>

                </div>
            </div>
        </div>
        <div class="accordion-item">
            <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                    Item #3
                    <?php  $grid_item_3_img = get_post_meta( $post->ID, 'grid-item-3-img', true ); ?>
                    <img class="image-preview-grid" id="grid-item-3-img-preview" src="<?php echo( $grid_item_3_img ? $grid_item_3_img : plugins_url( '../img/placeholder.jpg', __FILE__ ) ); ?>" alt="Image Preview">
                </button>
            </h2>
            <div id="flush-collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                <div class="accordion-body">

                    <?php
                    $grid_item_3_img = '';
                    if ( isset( $landing_page_stored_meta['grid-item-3-img'] ) ) {
                    $grid_item_3_img = $landing_page_stored_meta['grid-item-3-img'][0];
                    }
                    $grid_item_3_img = get_post_meta( $post->ID, 'grid-item-3-img', true );

                    $grid_item_3_cta = '';
                    if ( isset( $landing_page_stored_meta['grid-item-3-cta'] ) ) {
	                    $grid_item_3_cta = $landing_page_stored_meta['grid-item-3-cta'][0];
                    }
                    $grid_item_3_cta = get_post_meta( $post->ID, 'grid-item-3-cta', true );
                    ?>
                    <div class="accordion-cmf">
                    <label for="grid-item-3-img" class="grid-label grid-item-3-img-row"><?php _e( 'Item Image', 'tfs-blog-textdomain' ) ?></label>
                    <input type="text" style="width:50%;" name="grid-item-3-img" id="grid-item-3-img" value="<?php echo esc_attr($grid_item_3_img); ?>"/>
                    <input type="button" id="grid-item-3-img-button" class="button" value="<?php _e( 'Choose or Upload an Image', 'landing-page-textdomain' ); ?>"/>
                    </div>
                    <div class="accordion-cmf">
                        <label for="grid-item-3-cta" class="grid-label grid-item-3-cta-row"><?php _e( 'Call to action', 'tfs-blog-textdomain' ) ?></label>
                        <input style="width: 80%;" type="text" name="grid-item-3-cta" id="grid-item-3-cta" value="<?php echo esc_attr($grid_item_3_cta); ?>"/>
                    </div>
                </div>
            </div>
        </div>
        <div class="accordion-item">
            <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseFour" aria-expanded="false" aria-controls="flush-collapseFour">
                    Item #4
                    <?php  $grid_item_4_img = get_post_meta( $post->ID, 'grid-item-4-img', true ); ?>
                    <img class="image-preview-grid" id="grid-item-4-img-preview" src="<?php echo( $grid_item_4_img ? $grid_item_4_img : plugins_url( '../img/placeholder.jpg', __FILE__ ) ); ?>" alt="Image Preview">
                </button>
            </h2>
            <div id="flush-collapseFour" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                <div class="accordion-body">

                    <?php
                    $grid_item_4_img = '';
                    if ( isset( $landing_page_stored_meta['grid-item-4-img'] ) ) {
                    $grid_item_4_img = $landing_page_stored_meta['grid-item-4-img'][0];
                    }
                    $grid_item_4_img = get_post_meta( $post->ID, 'grid-item-4-img', true );

                    $grid_item_4_cta = '';
                    if ( isset( $landing_page_stored_meta['grid-item-4-cta'] ) ) {
	                    $grid_item_4_cta = $landing_page_stored_meta['grid-item-4-cta'][0];
                    }
                    $grid_item_4_cta = get_post_meta( $post->ID, 'grid-item-4-cta', true );
                    ?>
                    <div class="accordion-cmf">
                    <label for="grid-item-4-img" class="grid-label grid-item-4-img-row"><?php _e( 'Item Image', 'tfs-blog-textdomain' ) ?></label>
                    <input type="text" style="width:50%;" name="grid-item-4-img" id="grid-item-4-img" value="<?php echo esc_attr($grid_item_4_img); ?>"/>
                    <input type="button" id="grid-item-4-img-button" class="button" value="<?php _e( 'Choose or Upload an Image', 'landing-page-textdomain' ); ?>"/>
                    </div>
                    <div class="accordion-cmf">
                        <label for="grid-item-4-cta" class="grid-label grid-item-4-cta-row"><?php _e( 'Call to action', 'tfs-blog-textdomain' ) ?></label>
                        <input style="width: 80%;" type="text" name="grid-item-4-cta" id="grid-item-4-cta" value="<?php echo esc_attr($grid_item_4_cta); ?>"/>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php }

/* ========== Saves/Sanitizes ========== */

add_action( 'save_post', 'save_landing_page_fields' );
    function save_landing_page_fields( $post_id ): void {
        if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
            return;
        }
        if ( ! isset( $_POST['landing_page_nonce'] )
             || ! wp_verify_nonce( $_POST['landing_page_nonce'], basename( __FILE__ ) ) )
        {
            return;
        }

	    if ( isset( $_POST['landing-page-image'] ) ) {
		    $landing_page_image = $_POST['landing-page-image'];
		    if ( ! empty( $landing_page_image ) )
		    {
			    update_post_meta( $post_id, 'landing-page-image', $landing_page_image );
		    } else {
			    delete_post_meta( $post_id, 'landing-page-image' );
		    }
	    }

	    if ( isset( $_POST['landing-temp-opacity-range'] ) ) {
		    $landing_temp_opacity_range = $_POST['landing-temp-opacity-range'];
		    if ( ! empty(  $landing_temp_opacity_range ) )
		    {
			    update_post_meta( $post_id, 'landing-temp-opacity-range',  $landing_temp_opacity_range );
		    } else {
			    delete_post_meta( $post_id, 'landing-temp-opacity-range' );
		    }
	    }

        if ( isset( $_POST['landing-page-logo'] ) ) {
            $landing_page_logo = $_POST['landing-page-logo'];
            } else {
            $landing_page_logo = '';
        }

        update_post_meta( $post_id, 'landing-page-logo', sanitize_text_field( $landing_page_logo ) );

	    if ( isset( $_POST['landing-page-desc'] ) ) {
		    $landing_page_desc = $_POST['landing-page-desc'];
		    if ( ! empty( $landing_page_desc ) ) {
			    update_post_meta( $post_id, 'landing-page-desc', $landing_page_desc );
		    } else {
			    delete_post_meta( $post_id, 'landing-page-desc' );
		    }
	    }

        if ( isset( $_POST['landing-page-cta'] ) ) {

            $landing_page_cta = $_POST['landing-page-cta'];

            global $allowed_tags;

            $landing_page_cta = wp_kses( $landing_page_cta, $allowed_tags );

            if ( ! empty( $landing_page_cta ) ) {
                update_post_meta( $post_id, 'landing-page-cta', $landing_page_cta );
            } else {
                delete_post_meta( $post_id, 'landing-page-cta' );
            }
        }

        if ( isset( $_POST['grid-item-1-img'] ) ) {
            $grid_item_1_img = $_POST['grid-item-1-img'];
            } else {
            $grid_item_1_img = '';
        }

        update_post_meta( $post_id, 'grid-item-1-img', sanitize_text_field( $grid_item_1_img ) );

	    if ( isset( $_POST['grid-item-1-cta'] ) ) {
		    $grid_item_1_cta = $_POST['grid-item-1-cta'];
		    if ( ! empty( $grid_item_1_cta ) ) {
			    update_post_meta( $post_id, 'grid-item-1-cta', $grid_item_1_cta );
		    } else {
			    delete_post_meta( $post_id, 'grid-item-1-cta' );
		    }
	    }

        if ( isset( $_POST['grid-item-2-img'] ) ) {
            $grid_item_2_img = $_POST['grid-item-2-img'];
            } else {
            $grid_item_2_img = '';
        }

        update_post_meta( $post_id, 'grid-item-2-img', sanitize_text_field( $grid_item_2_img ) );

	    if ( isset( $_POST['grid-item-2-cta'] ) ) {
		    $grid_item_2_cta = $_POST['grid-item-2-cta'];
		    if ( ! empty( $grid_item_2_cta ) ) {
			    update_post_meta( $post_id, 'grid-item-2-cta', $grid_item_2_cta );
		    } else {
			    delete_post_meta( $post_id, 'grid-item-2-cta' );
		    }
	    }

        if ( isset( $_POST['grid-item-3-img'] ) ) {
            $grid_item_3_img = $_POST['grid-item-3-img'];
            } else {
            $grid_item_3_img = '';
        }

        update_post_meta( $post_id, 'grid-item-3-img', sanitize_text_field( $grid_item_3_img ) );

	    if ( isset( $_POST['grid-item-3-cta'] ) ) {
		    $grid_item_3_cta = $_POST['grid-item-3-cta'];
		    if ( ! empty( $grid_item_3_cta ) ) {
			    update_post_meta( $post_id, 'grid-item-3-cta', $grid_item_3_cta );
		    } else {
			    delete_post_meta( $post_id, 'grid-item-3-cta' );
		    }
	    }

        if ( isset( $_POST['grid-item-4-img'] ) ) {
        $grid_item_4_img = $_POST['grid-item-4-img'];
        } else {
        $grid_item_4_img = '';
        }

        update_post_meta( $post_id, 'grid-item-4-img', sanitize_text_field( $grid_item_4_img ) );

	    if ( isset( $_POST['grid-item-4-cta'] ) ) {
		    $grid_item_4_cta = $_POST['grid-item-4-cta'];
		    if ( ! empty( $grid_item_4_cta ) ) {
			    update_post_meta( $post_id, 'grid-item-4-cta', $grid_item_4_cta );
		    } else {
			    delete_post_meta( $post_id, 'grid-item-4-cta' );
		    }
	    }

    }


