<?php
/**
 * Description: Guide Service Custom Meta Fields
 *
 * @package		guideService
 * @since			1.2.3
 * @author			Chris Parsons
 * @link				http://steelbridge.io
 * @license		GNU General Public License
 */


// Prevents direct access to files
if (!defined('ABSPATH')) {
  exit('Cheatin&#8217; uh?');
}

function load_custom_guide_admin_style($hook) {
  // Load only on ?page=mypluginname
  if($hook != 'post.php') {
    return;
  }
  wp_enqueue_style( 'custom_wp_admin_css', plugins_url('css/bootstrap.css', __FILE__) );
  wp_enqueue_style( 'custom_admin_style_css', plugins_url('css/style.css', __FILE__) );
  wp_enqueue_script( 'custom_wp_admin_js', plugins_url('js/bootstrap.min.js', __FILE__));
}
add_action( 'admin_enqueue_scripts', 'load_custom_guide_admin_style' );

// Checks to see if any data to save. Sanitizes and saves as needed.
include_once( plugin_dir_path( __FILE__ ) . '/inc/sanitize_fields_guide_service.php');

// Adds a meta box to the post editing screen on the template named travel-template
function tfs_guideservice_meta() {
  global $post;
  if(!empty($post)){
    $pageTemplate = get_post_meta($post->ID, '_wp_page_template', true);
    if($pageTemplate == 'page-templates/guide-service-template.php' || $pageTemplate == 'page-templates/regional-waters-template-v2.php') {
      $types = array('guide_service');
      foreach($types as $type) {
        add_meta_box( 'sbm_meta', __( 'Guide Service', 'tfs-guideservice-textdomain' ), 'tfs_guideservice_meta_callback', $type, 'normal', 'high' );
      }
    }
  }
}
add_action( 'add_meta_boxes', 'tfs_guideservice_meta' );


function tfs_guideservice_meta_callback($post) {
  wp_nonce_field( basename( __FILE__ ), 'guideservice_nonce' );
  $tfs_stored_guideservice_meta = get_post_meta( $post->ID );
  ?>
  
  <!-- ====== Guide Service Details ====== -->
  
  <div style="margin-top: 1.618em;">
    <h1>Guide Service Details</h1>
  </div>
  
  <!-- GUIDE SERVICE DESCRIPTION -->
  <h3><?php echo 'Guide Service Description' ?></h3>
  
  <p><!-- Guide Service Description / Appears below site title -->
    
    <strong><label for="guideservice-description" class="sbm-row-title"><?php _e( 'Guide Service Description', 'tfs-guideservice-textdomain' )?></label></strong>
    <input style="width: 100%;" type="text" name="guideservice-description" id="guideservice-description" placeholder="Appears below title" value="<?php if ( isset ( $tfs_stored_guideservice_meta['guideservice-description'] ) ) echo $tfs_stored_guideservice_meta['guideservice-description'][0]; ?>" />
    
  </p>
  
  <!-- GUIDE SERVICE COST DETAILS-->
  <hr style="margin-top: 1.618em; border-top: 3px double #8c8b8b;">
  <h3><?php echo 'Costs' ?></h3>
  
  <p><!-- Cost Title -->
    
    <strong><label for="feature-gs1-title" class="sbm-row-title"><?php _e( 'Title', 'tfs-guideservice-textdomain' )?></label></strong>
    <input style="width: 100%;" type="text" name="feature-gs1-title" id="feature-gs1-title" value="<?php if ( isset ( $tfs_stored_guideservice_meta['feature-gs1-title'] ) ) echo $tfs_stored_guideservice_meta['feature-gs1-title'][0]; ?>" />
    
  </p>
  
  <p><!-- Cost Content -->
    
    <strong><label for="feature-gs1-cost-textarea" class="sbm-row-title"><?php _e( 'Content', 'tfs-guideservice-textdomain' )?></label></strong>
    <textarea style="width: 100%;" rows="4" name="feature-gs1-cost-textarea" id="feature-gs1-cost-textarea"><?php if ( isset ( $tfs_stored_guideservice_meta['feature-gs1-cost-textarea'] ) ) echo $tfs_stored_guideservice_meta['feature-gs1-cost-textarea'][0]; ?></textarea>
    
  </p>
  
  <p><!-- Inclusions Text Area -->
    
    <strong><label for="feature-gs1-inclusions-textarea" class="sbm-row-title"><?php _e( 'Inclusions', 'tfs-guideservice-textdomain' )?></label></strong>
    <textarea style="width: 100%;" rows="4" name="feature-gs1-inclusions-textarea" id="feature-gs1-inclusions-textarea"><?php if ( isset ( $tfs_stored_guideservice_meta['feature-gs1-inclusions-textarea'] ) ) echo $tfs_stored_guideservice_meta['feature-gs1-inclusions-textarea'][0]; ?></textarea>
    
  </p>
  
  <p><!-- Non-inclusions Text Area -->
    
    <strong><label for="feature-gs1-noninclusions-textarea" class="sbm-row-title"><?php _e( 'Non-inclusions', 'tfs-guideservice-textdomain' )?></label></strong>
    <textarea style="width: 100%;" rows="4" name="feature-gs1-noninclusions-textarea" id="feature-gs1-noninclusions-textarea"><?php if ( isset ( $tfs_stored_guideservice_meta['feature-gs1-noninclusions-textarea'] ) ) echo $tfs_stored_guideservice_meta['feature-gs1-noninclusions-textarea'][0]; ?></textarea>
    
  </p>
  
  <p><!-- Package Deals Text Area -->
    
    <strong><label for="feature-gs1-packagedeal-textarea" class="sbm-row-title"><?php _e( 'Package Deal', 'tfs-guideservice-textdomain' )?></label></strong>
    <textarea style="width: 100%;" rows="4" name="feature-gs1-packagedeal-textarea" id="feature-gs1-packagedeal-textarea"><?php if ( isset ( $tfs_stored_guideservice_meta['feature-gs1-packagedeal-textarea'] ) ) echo $tfs_stored_guideservice_meta['feature-gs1-packagedeal-textarea'][0]; ?></textarea>
    
  </p>
  
  <!--  SEASONS -->
  <hr style="margin-top: 1.618em; border-top: 3px double #8c8b8b;">
  <h3><?php echo 'Seasons' ?></h3>
  
  <p><!-- Feature #2 Seasons Title -->
    
    <strong><label for="feature-gs2-title" class="sbm-row-title"><?php _e( 'Title', 'tfs-guideservice-textdomain' )?></label></strong>
    <input style="width: 100%;" type="text" name="feature-gs2-title" id="feature-gs2-title" value="<?php if ( isset ( $tfs_stored_guideservice_meta['feature-gs2-title'] ) ) echo $tfs_stored_guideservice_meta['feature-gs2-title'][0]; ?>" />
    
  </p>
  
  <p><!-- Seasons content -->
    
    <strong><label for="feature-gs2-seasons-textarea" class="sbm-row-title"><?php _e( 'Seasons content', 'tfs-guideservice-textdomain' )?></label></strong>
    <textarea style="width: 100%;" rows="4" name="feature-gs2-seasons-textarea" id="feature-gs2-seasons-textarea"><?php if ( isset ( $tfs_stored_guideservice_meta['feature-gs2-seasons-textarea'] ) ) echo $tfs_stored_guideservice_meta['feature-gs2-seasons-textarea'][0]; ?></textarea>
    
  </p>
  
  <p> <!-- Seasons Read More -->
  
    <strong><label for="feature-gs2-seasons-readmore-info" class="feature-gs2-seasons-readmore-info"><?php _e( 'Read More Info', 'tfs-guideservice-textdomain' )?></label></strong>
    <input style="width: 100%;" type="text" name="feature-gs2-seasons-readmore-info" id="feature-gs2-seasons-readmore-info" value="<?php if ( isset ( $tfs_stored_guideservice_meta['feature-gs2-seasons-readmore-info'] ) ) echo $tfs_stored_guideservice_meta['feature-gs2-seasons-readmore-info'][0]; ?>" />
    
    <strong><label for="feature-gs2-seasons-readmore" class="sbm-row-title"><?php _e('Read more', 'tfs-guideservice-textdomain')?></label></strong>
    <textarea style="width: 100%;" rows="4" name="feature-gs2-seasons-readmore" id="feature-gs2-seasons-readmore"><?php if ( isset ( $tfs_stored_guideservice_meta['feature-gs2-seasons-readmore'] ) ) echo $tfs_stored_guideservice_meta['feature-gs2-seasons-readmore'][0]; ?></textarea>
    
  </p>
  
  <!-- ==== Autumn Season ==== -->
  
  <p><!-- Feature #2 Seasons Autumn Text Area -->
    
    <strong><label for="feature-gs2-autumn-textarea" class="sbm-row-title"><?php _e( 'Feature &#35;2 Seasons Autumn', 'tfs-guideservice-textdomain' )?></label></strong>
    <textarea style="width: 100%;" rows="4" name="feature-gs2-autumn-textarea" id="feature-gs2-autumn-textarea"><?php if ( isset ( $tfs_stored_guideservice_meta['feature-gs2-autumn-textarea'] ) ) echo $tfs_stored_guideservice_meta['feature-gs2-autumn-textarea'][0]; ?></textarea>
    
  </p>
  
  <!-- ==== Winter Season ==== -->
  
  <p><!-- Feature #2 Seasons Winter Text Area -->
    
    <strong><label for="feature-gs2-winter-textarea" class="sbm-row-title"><?php _e( 'Feature &#35;2 Seasons Winter', 'tfs-guideservice-textdomain' )?></label></strong>
    <textarea style="width: 100%;" rows="4" name="feature-gs2-winter-textarea" id="feature-gs2-winter-textarea"><?php if ( isset ( $tfs_stored_guideservice_meta['feature-gs2-winter-textarea'] ) ) echo $tfs_stored_guideservice_meta['feature-gs2-winter-textarea'][0]; ?></textarea>
    
  </p>
  
  <!-- ==== Spring Season ==== -->
  
  <p><!-- Spring Text Area -->
    
    <strong><label for="feature-gs2-spring-textarea" class="sbm-row-title"><?php _e( 'Spring', 'tfs-guideservice-textdomain' )?></label></strong>
    <textarea style="width: 100%;" rows="4" name="feature-gs2-spring-textarea" id="feature-gs2-spring-textarea"><?php if ( isset ( $tfs_stored_guideservice_meta['feature-gs2-spring-textarea'] ) ) echo $tfs_stored_guideservice_meta['feature-gs2-spring-textarea'][0]; ?></textarea>
    
  </p>
  
  <!-- ==== Summer Season ==== -->
  
  <p><!-- Feature #2 Seasons Summer Text Area -->
    
    <strong><label for="feature-gs2-summer-textarea" class="sbm-row-title"><?php _e( 'Feature &#35;2 Seasons Summer', 'tfs-guideservice-textdomain' )?></label></strong>
    <textarea style="width: 100%;" rows="4" name="feature-gs2-summer-textarea" id="feature-gs2-summer-textarea"><?php if ( isset ( $tfs_stored_guideservice_meta['feature-gs2-summer-textarea'] ) ) echo $tfs_stored_guideservice_meta['feature-gs2-summer-textarea'][0]; ?></textarea>
    
  </p>
  
  <!-- ====== FISHING ====== -->
  <hr style="margin-top: 1.618em; border-top: 3px double #8c8b8b;">
  <h3><?php echo 'Fishing' ?></h3>
  
  <p><!-- Feature #3 Fishing -->
    
    <strong><label for="feature-gs3-fishing-title" class="sbm-row-title"><?php _e( 'Fishing Title', 'tfs-guideservice-textdomain' )?></label></strong>
    <input style="width: 100%;" type="text" name="feature-gs3-fishing-title" id="feature-gs3-fishing-title" value="<?php if ( isset ( $tfs_stored_guideservice_meta['feature-gs3-fishing-title'] ) ) echo $tfs_stored_guideservice_meta['feature-gs3-fishing-title'][0]; ?>" />
    
  </p>
  
  <p><!-- Fishing Section Content -->
    
    <strong><label for="feature-gs3-fishing-textarea" class="sbm-row-title"><?php _e( 'Fishing Intro Content', 'tfs-guideservice-textdomain' )?></label></strong>
    <textarea style="width: 100%;" rows="4" name="feature-gs3-fishing-textarea" id="feature-gs3-fishing-textarea"><?php if ( isset ( $tfs_stored_guideservice_meta['feature-gs3-fishing-textarea'] ) ) echo $tfs_stored_guideservice_meta['feature-gs3-fishing-textarea'][0]; ?></textarea>
    
  </p>
  
  <p><!-- Read More About Fishing -->
  
  <strong><label for="feature-gs3-fishing-readmore-info" class="feature-gs3-fishing-readmore-info"><?php _e( 'Read More Info', 'tfs-guideservice-textdomain' )?></label></strong>
  <input style="width: 100%;" type="text" name="feature-gs3-fishing-readmore-info" id="feature-gs3-fishing-readmore-info" value="<?php if ( isset ( $tfs_stored_guideservice_meta['feature-gs3-fishing-readmore-info'] ) ) echo $tfs_stored_guideservice_meta['feature-gs3-fishing-readmore-info'][0]; ?>" />
  
  <strong><label for="feature-gs3-fishing-readmore" class="sbm-row-title"><?php _e( 'Read More', 'tfs-guideservice-textdomain' )?></label></strong>
  <textarea style="width: 100%;" rows="4" name="feature-gs3-fishing-readmore" id="feature-gs3-fishing-readmore"><?php if ( isset ( $tfs_stored_guideservice_meta['feature-gs3-fishing-readmore'] ) ) echo $tfs_stored_guideservice_meta['feature-gs3-fishing-readmore'][0]; ?></textarea>
  
  </p>
  
  <!-- FEATURE #5 LODGING -->
  <hr style="margin-top: 1.618em; border-top: 3px double #8c8b8b;">
  <h3><?php echo 'Guide Service Lodging' ?></h3>
  <p><!-- Feature #4 Title -->
    <strong><label for="feature-gs4-title" class="sbm-row-title"><?php _e( 'Lodging Title', 'tfs-guideservice-textdomain' )?></label></strong>
    <input style="width: 100%;" type="text" name="feature-gs4-title" id="feature-gs4-title" value="<?php if ( isset ( $tfs_stored_guideservice_meta['feature-gs4-title'] ) ) echo $tfs_stored_guideservice_meta['feature-gs4-title'][0]; ?>" />
  </p>

  <p><!-- Lodging Text Area/Cost -->
    <strong><label for="feature-gs4-gettingto-textarea" class="sbm-row-title"><?php _e( 'Content', 'tfs-guideservice-textdomain' )?></label></strong>
    
    <textarea style="width: 100%;" rows="4" name="feature-gs4-gettingto-textarea" id="feature-gs4-gettingto-textarea"><?php if ( isset ( $tfs_stored_guideservice_meta['feature-gs4-gettingto-textarea'] ) ) echo $tfs_stored_guideservice_meta['feature-gs4-gettingto-textarea'][0]; ?></textarea>
  </p>
  
  <!-- ==== Display read more==== -->
  <p>
  
  <div class="guideservice-row-content">
    <label for="feature-gs4-readmore-checkbox">
      <input type="checkbox" name="feature-gs4-readmore-checkbox" id="feature-gs4-readmore-checkbox" value="yes" <?php if ( isset ( $tfs_stored_guideservice_meta['feature-gs4-readmore-checkbox'] ) ) checked( $tfs_stored_guideservice_meta['feature-gs4-readmore-checkbox'][0], 'yes' ); ?> />
      <?php _e( 'Check box to activate read more.', 'tfs-guideservice-textdomain' )?>
    </label>
    </label>
  </div>
  
  </p>
  
  <p><!-- Lodging Read More Text Area/Cost -->
    <strong><label for="feature-gs4-readmore-textarea" class="sbm-row-title"><?php _e( 'Read More', 'tfs-guideservice-textdomain' )?></label></strong>
    
    <textarea style="width: 100%;" rows="4" name="feature-gs4-readmore-textarea" id="feature-gs4-readmore-textarea"><?php if ( isset ( $tfs_stored_guideservice_meta['feature-gs4-readmore-textarea'] ) ) echo $tfs_stored_guideservice_meta['feature-gs4-readmore-textarea'][0]; ?></textarea>
  </p>
  
  <!-- GETTING THERE -->
  <hr style="margin-top: 1.618em; border-top: 3px double #8c8b8b;">
  <h3><?php echo 'Getting There' ?></h3>
  <p><!-- Feature #3 Title -->
    
    <strong><label for="feature-gs3-title" class="sbm-row-title"><?php _e( 'Title', 'tfs-guideservice-textdomain' )?></label></strong>
    <input style="width: 100%;" type="text" name="feature-gs3-title" id="feature-gs3-title" value="<?php if ( isset ( $tfs_stored_guideservice_meta['feature-gs3-title'] ) ) echo $tfs_stored_guideservice_meta['feature-gs3-title'][0]; ?>" />
    
  </p>
  
  <p><!-- Getting There Text Area/Cost-->
    <strong><label for="feature-gs3-gettingto-textarea" class="sbm-row-title"><?php _e( 'Content', 'tfs-guideservice-textdomain' )?></label></strong>
    <textarea style="width: 100%;" rows="4" name="feature-gs3-gettingto-textarea" id="feature-gs3-gettingto-textarea"><?php if ( isset ( $tfs_stored_guideservice_meta['feature-gs3-gettingto-textarea'] ) ) echo $tfs_stored_guideservice_meta['feature-gs3-gettingto-textarea'][0]; ?></textarea>
  </p>
  
  <p><!-- Getting There Read More Text Area/Cost-->
  
    <strong><label for="feature-gs3-readmore-info" class="feature-gs3-readmore-info"><?php _e( 'Read More Info', 'tfs-guideservice-textdomain' )?></label></strong>
    <input style="width: 100%;" type="text" name="feature-gs3-readmore-info" id="feature-gs3-readmore-info" value="<?php if ( isset ( $tfs_stored_guideservice_meta['feature-gs3-readmore-info'] ) ) echo $tfs_stored_guideservice_meta['feature-gs3-readmore-info'][0]; ?>" />
    
    <strong><label for="feature-gs3-readmore-textarea" class="sbm-row-title"><?php _e( 'Read More', 'tfs-guideservice-textdomain' )?></label></strong>
    <textarea style="width: 100%;" rows="4" name="feature-gs3-readmore-textarea" id="feature-gs3-readmore-textarea"><?php if ( isset ( $tfs_stored_guideservice_meta['feature-gs3-readmore-textarea'] ) ) echo $tfs_stored_guideservice_meta['feature-gs3-readmore-textarea'][0]; ?></textarea>
    
  </p>
  
  <!-- ====== CALL TO ACTION ROW ====== -->
  <hr style="margin-top: 1.618em; border-top: 3px double #8c8b8b;">
  <h3><?php echo 'Call To Action - CTA' ?></h3>
  
  <p><!-- Call To Action Strong Into -->
    <strong><label for="cta-strong-intro" class="sbm-row-title"><?php _e('Call To Action intro','tfs-guideservice-textdomain')?></label></strong>
    <input style="width: 100%;" type="text" placeholder="Place CTA content here." name="cta-guideservice-strong-intro" id="cta-guideservice-strong-intro" value="<?php if (isset($tfs_stored_guideservice_meta['cta-guideservice-strong-intro'])) echo $tfs_stored_guideservice_meta['cta-guideservice-strong-intro'][0]; ?>" />
  </p>
  
  <p><!-- Call To Action Content -->
    
    <strong><label for="cta-guideservice-content" class="sbm-row-title"><?php _e( 'Call To Action content', 'tfs-guideservice-textdomain' )?></label></strong>
    <textarea style="width: 100%;" rows="4" name="cta-guideservice-content" id="cta-content"><?php if ( isset ( $tfs_stored_guideservice_meta['cta-guideservice-content'] ) ) echo $tfs_stored_guideservice_meta['cta-guideservice-content'][0]; ?></textarea>
    
  </p>
  
  <?PHP
}
