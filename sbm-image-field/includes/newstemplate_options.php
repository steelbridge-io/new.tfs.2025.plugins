<?php

/*
 * News Template Meta
 */

//ob_implicit_flush(true);
include( plugin_dir_path( __FILE__ ) . '../inc/sanitize_news_template_blog.php');

function newstemplate_custom_meta() { global $post;

  if(!empty($post)) {
    $pageTemplate = get_post_meta ($post -> ID, '_wp_page_template', true);
	  $types = array( 'post', 'page', 'lower48', 'lower48blog', 'travel-blog' );
    foreach ($types as $type) {
      if($pageTemplate == 'page-templates/news-blog-template.php') {
        add_meta_box ( 'news_blog_template_meta', __('News Template Options', 'the-fly-shop' ), 'newstemplate_meta_calback', $type, 'normal', 'high');
      }
    }
  }
}
add_action( 'add_meta_boxes', 'newstemplate_custom_meta' );

/**
 * Adds Custom Field Image Meta Box
 */
//ob_start();
function newstemplate_meta_calback( $post ) {
wp_nonce_field( basename( __FILE__ ), 'newsTemplate_nonce' );
$news_template_stored_meta = get_post_meta( $post->ID );?>

  <div class="meta-field">
   <div class="panel editor">
   <div class="panel-body">
    <div class="row">

     <div class="col-lg-4">
      <p>
        <label for="news-template-select-sidebar" class="prfx-row-title"><h3><?php _e( 'Sidebar Select', 'The_Fly_Shop' )?></h3></label>
        <select name="news-template-select-sidebar" id="news-template-select-sidebar">
          <option value="" <?php if ( isset ( $news_template_stored_meta['news-template-select-sidebar'] ) ) selected( $news_template_stored_meta['news-template-select-sidebar'][0], '' ); ?>><?php _e( 'Default', 'The_Fly_Shop' )?></option>;
          <option value="esblodge" <?php if ( isset ( $news_template_stored_meta['news-template-select-sidebar'] ) ) selected( $news_template_stored_meta['news-template-select-sidebar'][0], 'esblodge' ); ?>><?php _e( 'ESB Lodge', 'The_Fly_Shop' )?></option>;
          <option value="lavacreeklodge" <?php if ( isset ( $news_template_stored_meta['news-template-select-sidebar'] ) ) selected( $news_template_stored_meta['news-template-select-sidebar'][0], 'lavacreeklodge' ); ?>><?php _e( 'Lava Creek Lodge', 'The_Fly_Shop' )?></option>;
          <option value="lower48" <?php if ( isset ( $news_template_stored_meta['news-template-select-sidebar'] ) ) selected( $news_template_stored_meta['news-template-select-sidebar'][0], 'lower48' ); ?>><?php _e( 'Lower 48', 'The_Fly_Shop' )?></option>;
          <option value="news" <?php if ( isset ( $news_template_stored_meta['news-template-select-sidebar'] ) ) selected( $news_template_stored_meta['news-template-select-sidebar'][0], 'news' ); ?>><?php _e( 'News', 'The_Fly_Shop' )?></option>;
          <option value="outfitter" <?php if ( isset ( $news_template_stored_meta['news-template-select-sidebar'] ) ) selected( $news_template_stored_meta['news-template-select-sidebar'][0], 'outfitter' ); ?>><?php _e( 'Outfitters', 'The_Fly_Shop' )?></option>;
          <option value="retail" <?php if ( isset ( $news_template_stored_meta['news-template-select-sidebar'] ) ) selected( $news_template_stored_meta['news-template-select-sidebar'][0], 'retail' ); ?>><?php _e( 'Retail', 'The_Fly_Shop' )?></option>;
          <option value="survey" <?php if ( isset ( $news_template_stored_meta['news-template-select-sidebar'] ) ) selected( $news_template_stored_meta['news-template-select-sidebar'][0], 'survey' ); ?>><?php _e( 'Survey', 'The_Fly_Shop' )?></option>;
          <option value="travel" <?php if ( isset ( $news_template_stored_meta['news-template-select-sidebar'] ) ) selected( $news_template_stored_meta['news-template-select-sidebar'][0], 'travel' ); ?>><?php _e( 'Travel', 'The_Fly_Shop' )?></option>;
          <option value="blogarchive" <?php if ( isset ( $news_template_stored_meta['news-template-select-sidebar'] ) ) selected( $news_template_stored_meta['news-template-select-sidebar'][0], 'blogarchive' ); ?>><?php _e( 'Blog Archive', 'The_Fly_Shop' )?></option>;
        </select>
      </p>
     </div>

     <div class="col-lg-4">
      <p><!-- === Featured Post === -->
        <label for="news-template-select-post" class="prfx-row-title"><h3><?php _e( 'Select Featured Post', 'The_Fly_Shop' )?></h3></label>
        <select name="news-template-select-post" id="news-template-select-post">
          <option value="" <?php if ( isset ( $news_template_stored_meta['news-template-select-post'] ) ) selected( $news_template_stored_meta['news-template-select-post'][0], 'post' ); ?>><?php _e( 'Default Post', 'The_Fly_Shop' )?></option>;
          <option value="lower48blog" <?php if ( isset ( $news_template_stored_meta['news-template-select-post'] ) ) selected( $news_template_stored_meta['news-template-select-post'][0], 'lower48blog' ); ?>><?php _e( 'Lower 48 Blog', 'The_Fly_Shop' )?></option>;
          <option value="flyfishing-news" <?php if ( isset ( $news_template_stored_meta['news-template-select-post'] ) ) selected( $news_template_stored_meta['news-template-select-post'][0], 'flyfishing-news' ); ?>><?php _e( 'Outfitters Blog', 'The_Fly_Shop' )?></option>;
          <option value="travel-blog" <?php if ( isset ( $news_template_stored_meta['news-template-select-post'] ) ) selected( $news_template_stored_meta['news-template-select-post'][0], 'travel-blog' ); ?>><?php _e( 'Travel Blog', 'The_Fly_Shop' )?></option>;
        </select>
      </p>
     </div>

     <div class="col-lg-4">
      <p> <!-- ==== Blog Logo ==== -->
        <label for="news-template-logo" class="travel-row-title"><?php _e( '<h3>TFS Logo</h3>', 'The_Fly_Shop' );?></label>
        <input type="text" name="news-template-logo" id="news-template-logo" value="<?php if ( isset ( $news_template_stored_meta['news-template-logo'] ) ) echo $news_template_stored_meta['news-template-logo'][0];?>" /><br>
        <input style="margin-top: 1em;" type="button" id="news-template-logo-button" class="button" value="<?php _e( 'Choose or Upload an Image', 'travel-textdomain' );?>" />
      </p>
     </div>

     </div>
    </div>
   </div>

   <div class="panel editor">
    <div class="panel-body">
     <p> <!-- === Description === -->
       <strong><label for="news-template-description" class="news-template-description"><?php _e( 'Hero Image Description', 'The_Fly_Shop' )?></label></strong>
       <textarea style="width: 100%;" rows="4" name="news-template-description" id="news-template-description"><?php if ( isset ( $news_template_stored_meta['news-template-description'] ) ) echo $news_template_stored_meta['news-template-description'][0]; ?></textarea>
     </p>
    </div>
   </div>
  </div>

  <div class="meta-field">
   <div class="panel editor">
    <div class="panel-body">

    <p> <!-- ==== Read More Category Link #1 ==== -->
     <strong><label for="news-template-read-more-cat-one" class="news-template-read-more-cat-one"><?php _e('<h3>Read More From This Category Link #1</h3>', 'The_Fly_Shop')?></label></strong>
     <input style="width: 100%;" type="url" name="news-template-read-more-cat-one" id="news-template-read-more-cat-one" value="<?php if (isset($news_template_stored_meta['news-template-read-more-cat-one'])) echo $news_template_stored_meta['news-template-read-more-cat-one'][0]; ?>" />
    </p>

    <p> <!-- ==== Read More Background Image #1 ==== -->
     <label for="read-more-image-one" class="read-more-image-one"><?php _e( '<h3>Read More Image #1</h3>', 'The_Fly_Shop' );?></label>
     <input type="text" name="read-more-image-one" id="read-more-image-one" value="<?php if ( isset ( $news_template_stored_meta['read-more-image-one'] ) ) echo $news_template_stored_meta['read-more-image-one'][0];?>" />
     <input type="button" id="read-more-image-one-button" class="button" value="<?php _e( 'Choose or Upload an Image', 'The_Fly_Shop' );?>" />
    </p>

    </div>
   </div>

  <div class="panel editor">
   <div class="panel-body">

    <p> <!-- ==== Read More Category Link #2 ==== -->
     <strong><label for="news-template-read-more-cat-two" class="news-template-read-more-cat-two"><?php _e('<h3>Read More From This Category Link #2</h3>', 'The_Fly_Shop')?></label></strong>
     <input style="width: 100%;" type="url" name="news-template-read-more-cat-two" id="news-template-read-more-cat-two" value="<?php if (isset($news_template_stored_meta['news-template-read-more-cat-two'])) echo $news_template_stored_meta['news-template-read-more-cat-two'][0]; ?>" />
    </p>

    <p> <!-- ==== Read More Background Image #2 ==== -->
     <label for="read-more-image-two" class="read-more-image-two"><?php _e( '<h3>Read More Image #2</h3>', 'The_Fly_Shop' );?></label>
     <input type="text" name="read-more-image-two" id="read-more-image-two" value="<?php if ( isset ( $news_template_stored_meta['read-more-image-two'] ) ) echo $news_template_stored_meta['read-more-image-two'][0];?>" />
     <input type="button" id="read-more-image-two-button" class="button" value="<?php _e( 'Choose or Upload an Image', 'The_Fly_Shop' );?>" />
    </p>
   </div>
  </div>

  <div class="panel editor">
   <div class="panel-body">

    <p> <!-- ==== Read More Category Link #3 ==== -->
     <strong><label for="news-template-read-more-cat-three" class="news-template-read-more-cat-three"><?php _e('<h3>Read More From This Category Link #3</h3>', 'The_Fly_Shop')?></label></strong>
     <input style="width: 100%;" type="url" name="news-template-read-more-cat-three" id="news-template-read-more-cat-three" value="<?php if (isset($news_template_stored_meta['news-template-read-more-cat-three'])) echo $news_template_stored_meta['news-template-read-more-cat-three'][0]; ?>" />
    </p>

    <p> <!-- ==== Read More Background Image #3 ==== -->
     <label for="read-more-image-three" class="read-more-image-three"><?php _e( '<h3>Read More Image #3</h3>', 'The_Fly_Shop' );?></label>
     <input type="text" name="read-more-image-three" id="read-more-image-three" value="<?php if ( isset ( $news_template_stored_meta['read-more-image-three'] ) ) echo $news_template_stored_meta['read-more-image-three'][0];?>" />
     <input type="button" id="read-more-image-three-button" class="button" value="<?php _e( 'Choose or Upload an Image', 'The_Fly_Shop' );?>" />
    </p>

   </div>
  </div>

  <div class="panel editor">
   <div class="panel-body">

    <p> <!-- ==== Read More Category Link #4 ==== -->
     <strong><label for="news-template-read-more-cat-four" class="news-template-read-more-cat-four"><?php _e('<h3>Read More From This Category Link #4</h3>', 'The_Fly_Shop')?></label></strong>
     <input style="width: 100%;" type="url" name="news-template-read-more-cat-four" id="news-template-read-more-cat-four" value="<?php if (isset($news_template_stored_meta['news-template-read-more-cat-four'])) echo $news_template_stored_meta['news-template-read-more-cat-four'][0]; ?>" />
    </p>

    <p> <!-- ==== Read More Background Image #4 ==== -->
     <label for="read-more-image-four" class="read-more-image-four"><?php _e( '<h3>Read More Image #4</h3>', 'The_Fly_Shop' );?></label>
     <input type="text" name="read-more-image-four" id="read-more-image-four" value="<?php if ( isset ( $news_template_stored_meta['read-more-image-four'] ) ) echo $news_template_stored_meta['read-more-image-four'][0];?>" />
     <input type="button" id="read-more-image-four-button" class="button" value="<?php _e( 'Choose or Upload an Image', 'The_Fly_Shop' );?>" />
    </p>

   </div>
  </div>

  <div class="panel editor">
      <div class="panel-body">

          <p> <!-- ==== Read More Category Link #5 ==== -->
              <strong><label for="news-template-read-more-cat-five" class="news-template-read-more-cat-five"><?php _e('<h3>Read More From This Category Link #5</h3>', 'The_Fly_Shop')?></label></strong>
              <input style="width: 100%;" type="url" name="news-template-read-more-cat-five" id="news-template-read-more-cat-five" value="<?php if (isset($news_template_stored_meta['news-template-read-more-cat-five'])) echo $news_template_stored_meta['news-template-read-more-cat-five'][0]; ?>" />
          </p>

          <p> <!-- ==== Read More Background Image #5 ==== -->
              <label for="read-more-image-five" class="read-more-image-five"><?php _e( '<h3>Read More Image #5</h3>', 'The_Fly_Shop' );?></label>
              <input type="text" name="read-more-image-five" id="read-more-image-five" value="<?php if ( isset ( $news_template_stored_meta['read-more-image-five'] ) ) echo $news_template_stored_meta['read-more-image-five'][0];?>" />
              <input type="button" id="read-more-image-five-button" class="button" value="<?php _e( 'Choose or Upload an Image', 'The_Fly_Shop' );?>" />
          </p>

      </div>
  </div>

  </div>

<?php  }
