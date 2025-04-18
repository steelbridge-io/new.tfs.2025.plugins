<?php
/**
 * Description: Private Waters Custom Meta Fields
 *
 * @package		privateWaters
 * @since			1.2.3
 * @author			Chris Parsons
 * @link				http://steelbridge.io
 * @license		GNU General Public License
 */


// Prevents direct access to files
if (!defined('ABSPATH')) {
  exit('Cheatin&#8217; uh?');
}

// Checks to see if any data to save. Sanitizes and saves as needed.
include_once( plugin_dir_path( __FILE__ ) . '/inc/sanitize_fields_private_waters.php');

// Adds a meta box to the post editing screen on the template named travel-template
function tfs_private_meta() {
  global $post;
  if(!empty($post)){
    $pageTemplate = get_post_meta($post->ID, '_wp_page_template', true);
    if($pageTemplate == 'page-templates/private-template.php') {
      $types = array('post', 'page', 'adventures');
      foreach($types as $type) {
        add_meta_box( 'sbm_meta', __( 'Private Waters', 'tfs-private-textdomain' ), 'tfs_private_meta_callback', $type, 'normal', 'high' );
      }
    }
  }
}
add_action( 'add_meta_boxes', 'tfs_private_meta' );


function tfs_private_meta_callback($post) {
  wp_nonce_field( basename( __FILE__ ), 'tfs_nonce' );
  $tfs_stored_private_meta = get_post_meta( $post->ID );
  ?>
  
  <!-- ====== Private Details ====== -->
  
  <div style="margin-top: 1.618em;">
    <h1>Private Water Details</h1>
  </div>
    
  <!-- PRIVATE WATERS DESCRIPTION -->
  <h3><?php echo 'Private Waters Description' ?></h3>
  
  <p><!-- Private Description / Appears below site title -->
    
    <strong><label for="private-description" class="sbm-row-title"><?php _e( 'Private Waters Description', 'tfs-private-textdomain' )?></label></strong>
    <input style="width: 100%;" type="text" name="private-description" id="private-description" placeholder="Appears below title" value="<?php if ( isset ( $tfs_stored_private_meta['private-description'] ) ) echo $tfs_stored_private_meta['private-description'][0]; ?>" />
    
  </p>
  
  <!-- RESERVATIONS-RATES PRIVATE WATER DETAILS-->
  <hr style="margin-top: 1.618em; border-top: 3px double #8c8b8b;">
  <h3><?php echo 'Reservations &amp; Rates' ?></h3>
  
  <p><!-- Reservations-Rates Title -->
    
    <strong><label for="feature-pw1-title" class="sbm-row-title"><?php _e( 'Title', 'tfs-private-textdomain' )?></label></strong>
    <input style="width: 100%;" type="text" name="feature-pw1-title" id="feature-pw1-title" value="<?php if ( isset ( $tfs_stored_private_meta['feature-pw1-title'] ) ) echo $tfs_stored_private_meta['feature-pw1-title'][0]; ?>" />
    
  </p>
  
  <p><!-- Reservations-Rates Text Area/Cost-->
    
    <strong><label for="feature-pw1-cost-textarea" class="sbm-row-title"><?php _e( 'Costs', 'tfs-private-textdomain' )?></label></strong>
    <textarea style="width: 100%;" rows="4" name="feature-pw1-cost-textarea" id="feature-pw1-cost-textarea"><?php if ( isset ( $tfs_stored_private_meta['feature-pw1-cost-textarea'] ) ) echo $tfs_stored_private_meta['feature-pw1-cost-textarea'][0]; ?></textarea>
    
  </p>
  
  <p><!-- Reservations-Rates Inclusions Text Area -->
    
    <strong><label for="feature-pw1-inclusions-textarea" class="sbm-row-title"><?php _e( 'Inclusions', 'tfs-private-textdomain' )?></label></strong>
    <textarea style="width: 100%;" rows="4" name="feature-pw1-inclusions-textarea" id="feature-pw1-inclusions-textarea"><?php if ( isset ( $tfs_stored_private_meta['feature-pw1-inclusions-textarea'] ) ) echo $tfs_stored_private_meta['feature-pw1-inclusions-textarea'][0]; ?></textarea>
    
  </p>
  
  <p><!-- Reservations-Rates Non-inclusions Text Area -->
    
    <strong><label for="feature-pw1-noninclusions-textarea" class="sbm-row-title"><?php _e( 'Non-inclusions', 'tfs-private-textdomain' )?></label></strong>
    <textarea style="width: 100%;" rows="4" name="feature-pw1-noninclusions-textarea" id="feature-pw1-noninclusions-textarea"><?php if ( isset ( $tfs_stored_private_meta['feature-pw1-noninclusions-textarea'] ) ) echo $tfs_stored_private_meta['feature-pw1-noninclusions-textarea'][0]; ?></textarea>
    
  </p>
  
  <p><!-- Reservations-Rates Travel Insurance Text Area -->
    
    <strong><label for="feature-pw1-travelins-textarea" class="sbm-row-title"><?php _e( 'Travel Insurance', 'tfs-private-textdomain' )?></label></strong>
    <textarea style="width: 100%;" rows="4" name="feature-pw1-travelins-textarea" id="feature-pw1-travelins-textarea"><?php if ( isset ( $tfs_stored_private_meta['feature-pw1-travelins-textarea'] ) ) echo $tfs_stored_private_meta['feature-pw1-travelins-textarea'][0]; ?></textarea>
    
  </p>
  
  <p><!-- Reservations-Rates Non-Angling Companions Text Area -->
    
    <strong><label for="feature-pw1-nonangler-textarea" class="sbm-row-title"><?php _e( 'Non-Angling Companions', 'tfs-private-textdomain' )?></label></strong>
    <textarea style="width: 100%;" rows="4" name="feature-pw1-nonangler-textarea" id="feature-pw1-nonangler-textarea"><?php if ( isset ( $tfs_stored_private_meta['feature-pw1-nonangler-textarea'] ) ) echo $tfs_stored_private_meta['feature-pw1-nonangler-textarea'][0]; ?></textarea>
    
  </p>
  
  <!-- PRIVATE WATER SEASONS -->
  <hr style="margin-top: 1.618em; border-top: 3px double #8c8b8b;">
  <h3><?php echo 'Private Waters Seasons' ?></h3>
  
  <p><!-- Private Waters Seasons Title -->
    
    <strong><label for="feature-pw2-title" class="sbm-row-title"><?php _e( 'Title', 'tfs-private-textdomain' )?></label></strong>
    <input style="width: 100%;" type="text" name="feature-pw2-title" id="feature-pw2-title" value="<?php if ( isset ( $tfs_stored_private_meta['feature-pw2-title'] ) ) echo $tfs_stored_private_meta['feature-pw2-title'][0]; ?>" />
    
  </p>
  
  <p><!-- Private Waters Seasons Text Area/Cost-->
    
    <strong><label for="feature-pw2-seasons-textarea" class="sbm-row-title"><?php _e( 'Seasons content intro', 'tfs-private-textdomain' )?></label></strong>
    <textarea style="width: 100%;" rows="4" name="feature-pw2-seasons-textarea" id="feature-pw2-seasons-textarea"><?php if ( isset ( $tfs_stored_private_meta['feature-pw2-seasons-textarea'] ) ) echo $tfs_stored_private_meta['feature-pw2-seasons-textarea'][0]; ?></textarea>
    
  </p>
  
  <p><!-- Private Waters Seasons Autumn Text Area -->
    
    <strong><label for="feature-pw2-autumn-textarea" class="sbm-row-title"><?php _e( 'Autumn', 'tfs-private-textdomain' )?></label></strong>
    <textarea style="width: 100%;" rows="4" name="feature-pw2-autumn-textarea" id="feature-pw2-autumn-textarea"><?php if ( isset ( $tfs_stored_private_meta['feature-pw2-autumn-textarea'] ) ) echo $tfs_stored_private_meta['feature-pw2-autumn-textarea'][0]; ?></textarea>
    
  </p>
  
  <p><!-- Private Waters Seasons Winter Text Area -->
    <strong><label for="feature-pw2-winter-textarea" class="sbm-row-title"><?php _e( 'Winter', 'tfs-private-textdomain' )?></label></strong>
    
    <textarea style="width: 100%;" rows="4" name="feature-pw2-winter-textarea" id="feature-pw2-winter-textarea"><?php if ( isset ( $tfs_stored_private_meta['feature-pw2-winter-textarea'] ) ) echo $tfs_stored_private_meta['feature-pw2-winter-textarea'][0]; ?></textarea>
  </p>
  
  <p><!-- Private Waters Seasons Spring Text Area -->
    
    <strong><label for="feature-pw2-spring-textarea" class="sbm-row-title"><?php _e( 'Spring', 'tfs-private-textdomain' )?></label></strong>
    <textarea style="width: 100%;" rows="4" name="feature-pw2-spring-textarea" id="feature-pw2-spring-textarea"><?php if ( isset ( $tfs_stored_private_meta['feature-pw2-spring-textarea'] ) ) echo $tfs_stored_private_meta['feature-pw2-spring-textarea'][0]; ?></textarea>
    
  </p>
  
  <p><!-- Private Waters Seasons Summer Text Area -->
    
    <strong><label for="feature-pw2-summer-textarea" class="sbm-row-title"><?php _e( 'Summer', 'tfs-private-textdomain' )?></label></strong>
    <textarea style="width: 100%;" rows="4" name="feature-pw2-summer-textarea" id="feature-pw2-summer-textarea"><?php if ( isset ( $tfs_stored_private_meta['feature-pw2-summer-textarea'] ) ) echo $tfs_stored_private_meta['feature-pw2-summer-textarea'][0]; ?></textarea>
    
  </p>
  
  <!-- ====== FEATURE #3 FISHING ====== -->
  <hr style="margin-top: 1.618em; border-top: 3px double #8c8b8b;">
  <h3><?php echo 'Private Waters Fishing' ?></h3>
  
  <p><!-- Feature #3 Fishing -->
    
    <strong><label for="feature-pw3-fishing-title" class="sbm-row-title"><?php _e( 'Title', 'tfs-private-textdomain' )?></label></strong>
    <input style="width: 100%;" type="text" name="feature-pw3-fishing-title" id="feature-pw3-fishing-title" value="<?php if ( isset ( $tfs_stored_private_meta['feature-pw3-fishing-title'] ) ) echo $tfs_stored_private_meta['feature-pw3-fishing-title'][0]; ?>" />
    
  </p>
  
  
  <!-- TABED FISHING SECTION
-------------------------------------------------------------->
  <div class="panel with-nav-tabs panel-default">
    <div class="panel-heading">
      <!-- Nav tabs -->
      <ul class="nav nav-tabs" role="tablist">
        <li role="presentation" class="active"><a href="#fishingcontent" aria-controls="fishingcontent" role="tab" data-toggle="tab">Fishing Content</a></li>
        <li role="presentation"><a href="#fishingbeatone" aria-controls="fishingbeatone" role="tab" data-toggle="tab">Beat &#35;1</a></li>
        <li role="presentation"><a href="#fishingbeattwo" aria-controls="fishingbeattwo" role="tab" data-toggle="tab">Beat &#35;2</a></li>
        <li role="presentation"><a href="#fishingbeatthree" aria-controls="fishingbeatthree" role="tab" data-toggle="tab">Beat &#35;3</a></li>
        <li role="presentation"><a href="#fishingbeatfour" aria-controls="fishingbeatfour" role="tab" data-toggle="tab">Beat &#35;4</a></li>
        <li role="presentation"><a href="#fishingbeatfive" aria-controls="fishingbeatfive" role="tab" data-toggle="tab">Beat &#35;5</a></li>
        <li role="presentation"><a href="#fishingbeatsix" aria-controls="fishingbeatsix" role="tab" data-toggle="tab">Beat &#35;6</a></li>
      </ul>
      
      <!-- Tab panes -->
      <div class="panel-body boof">
        <div class="tab-content">
          <div role="tabpanel" class="tab-pane fade in active" id="fishingcontent">
            
            <p><!-- Fishing Section Content -->
              
              <strong><label for="feature-pw3-fishing-textarea" class="sbm-row-title"><?php _e( 'Fishing Intro Content', 'tfs-private-textdomain' )?></label></strong>
              <textarea style="width: 100%;" rows="4" name="feature-pw3-fishing-textarea" id="feature-pw3-fishing-textarea"><?php if ( isset ( $tfs_stored_private_meta['feature-pw3-fishing-textarea'] ) ) echo $tfs_stored_private_meta['feature-pw3-fishing-textarea'][0]; ?></textarea>
              
            </p>
          
          </div> <!-- /tabpanel -->
          
          <div role="tabpanel" class="tab-pane fade" id="fishingbeatone">
            
            <p>
              
              <strong><label for="fishing-beat1-label" class="sbm-row-title"><?php _e( 'Fishing Beat &#35;1 Title', 'tfs-private-textdomain') ?></label></strong>
              <input style="width:100%;" type="text" name="fishing-beat1-label" id="fishing-beat1-label" value="<?php if ( isset ( $tfs_stored_private_meta['fishing-beat1-label'] ) ) echo $tfs_stored_private_meta['fishing-beat1-label'][0]; ?>" />
              
            </p>
            
            <p><!-- Fishing Beat 1 -->
              
              <strong><label for="feature-pw3-fishing-beat1" class="sbm-row-title"><?php _e( 'Fishing Beat &#35;1', 'tfs-private-textdomain' )?></label></strong>
              <textarea style="width: 100%;" rows="4" name="feature-pw3-fishing-beat1" id="feature-pw3-fishing-beat1"><?php if ( isset ( $tfs_stored_private_meta['feature-pw3-fishing-beat1'] ) ) echo $tfs_stored_private_meta['feature-pw3-fishing-beat1'][0]; ?></textarea>
              
            </p>
          </div>
          
          <div role="tabpanel" class="tab-pane fade" id="fishingbeattwo">
            <p>
              
              <strong><label for="fishing-beat2-label" class="sbm-row-title"><?php _e( 'Fishing Beat &#35;2 Title', 'tfs-private-textdomain') ?></label></strong>
              <input style="width:100%;" type="text" name="fishing-beat2-label" id="fishing-beat2-label" value="<?php if ( isset ( $tfs_stored_private_meta['fishing-beat2-label'] ) ) echo $tfs_stored_private_meta['fishing-beat2-label'][0]; ?>" />
              
            </p>
            
            <p><!-- Fishing Beat 2 -->
              
              <strong><label for="feature-pw3-fishing-beat2" class="sbm-row-title"><?php _e( 'Fishing Beat &#35;2', 'tfs-private-textdomain' )?></label></strong>
              <textarea style="width: 100%;" rows="4" name="feature-pw3-fishing-beat2" id="feature-pw3-fishing-beat2"><?php if ( isset ( $tfs_stored_private_meta['feature-pw3-fishing-beat2'] ) ) echo $tfs_stored_private_meta['feature-pw3-fishing-beat2'][0]; ?></textarea>
              
            </p>
          
          </div>
          
          <div role="tabpanel" class="tab-pane fade" id="fishingbeatthree">
            
            <p>
              
              <strong><label for="fishing-beat3-label" class="sbm-row-title"><?php _e( 'Fishing Beat &#35;3 Title', 'tfs-private-textdomain') ?></label></strong>
              <input style="width:100%;" type="text" name="fishing-beat3-label" id="fishing-beat3-label" value="<?php if ( isset ( $tfs_stored_private_meta['fishing-beat3-label'] ) ) echo $tfs_stored_private_meta['fishing-beat3-label'][0]; ?>" />
              
            </p>
            
            <p><!-- Fishing Beat 3 -->
              
              <strong><label for="feature-pw3-fishing-beat3" class="sbm-row-title"><?php _e( 'Fishing Beat &#35;3', 'tfs-private-textdomain' )?></label></strong>
              <textarea style="width: 100%;" rows="4" name="feature-pw3-fishing-beat3" id="feature-pw3-fishing-beat3"><?php if ( isset ( $tfs_stored_private_meta['feature-pw3-fishing-beat3'] ) ) echo $tfs_stored_private_meta['feature-pw3-fishing-beat3'][0]; ?></textarea>
              
            </p>
          
          </div>
          <div role="tabpanel" class="tab-pane fade" id="fishingbeatfour">
            
            <!-- ==== Add fishing beat #4 ==== -->
            <p>
              
              <strong><label for="fishing-beat4-label" class="sbm-row-title"><?php _e( 'Fishing Beat &#35;4 Title', 'tfs-private-textdomain') ?></label></strong>
              <input style="width:100%;" type="text" name="fishing-beat4-label" id="fishing-beat4-label" value="<?php if ( isset ( $tfs_stored_private_meta['fishing-beat4-label'] ) ) echo $tfs_stored_private_meta['fishing-beat4-label'][0]; ?>" />
              
            </p>
            
            <p><!-- Fishing Beat 4 -->
              
              <strong><label for="feature-pw3-fishing-beat4" class="sbm-row-title"><?php _e( 'Fishing Beat &#35;4', 'tfs-private-textdomain' )?></label></strong>
              <textarea style="width: 100%;" rows="4" name="feature-pw3-fishing-beat4" id="feature-pw3-fishing-beat4"><?php if ( isset ( $tfs_stored_private_meta['feature-pw3-fishing-beat4'] ) ) echo $tfs_stored_private_meta['feature-pw3-fishing-beat4'][0]; ?></textarea>
              
            </p>
          </div>
          
          <div role="tabpanel" class="tab-pane fade" id="fishingbeatfive">
            <p>
              
              <strong><label for="fishing-beat5-label" class="sbm-row-title"><?php _e( 'Fishing Beat &#35;5 Title', 'tfs-private-textdomain') ?></label></strong>
              <input style="width:100%;" type="text" name="fishing-beat5-label" id="fishing-beat5-label" value="<?php if ( isset ( $tfs_stored_private_meta['fishing-beat5-label'] ) ) echo $tfs_stored_private_meta['fishing-beat5-label'][0]; ?>" />
              
            </p>
            
            <p><!-- Fishing Beat 5 -->
              
              <strong><label for="feature-pw3-fishing-beat5" class="sbm-row-title"><?php _e( 'Fishing Beat &#35;5', 'tfs-private-textdomain' )?></label></strong>
              <textarea style="width: 100%;" rows="4" name="feature-pw3-fishing-beat5" id="feature-pw3-fishing-beat5"><?php if ( isset ( $tfs_stored_private_meta['feature-pw3-fishing-beat5'] ) ) echo $tfs_stored_private_meta['feature-pw3-fishing-beat5'][0]; ?></textarea>
              
            </p>
          </div>
          <div role="tabpanel" class="tab-pane fade" id="fishingbeatsix">
            <p>
              
              <strong><label for="fishing-beat6-label" class="sbm-row-title"><?php _e( 'Fishing Beat &#35;6 Title', 'tfs-private-textdomain') ?></label></strong>
              <input style="width:100%;" type="text" name="fishing-beat6-label" id="fishing-beat6-label" value="<?php if ( isset ( $tfs_stored_private_meta['fishing-beat6-label'] ) ) echo $tfs_stored_private_meta['fishing-beat6-label'][0]; ?>" />
              
            </p>
            
            <p><!-- Fishing Beat 6 -->
              
              <strong><label for="feature-pw3-fishing-beat6" class="sbm-row-title"><?php _e( 'Fishing Beat &#35;6', 'tfs-private-textdomain' )?></label></strong>
              <textarea style="width: 100%;" rows="4" name="feature-pw3-fishing-beat6" id="feature-pw3-fishing-beat6"><?php if ( isset ( $tfs_stored_private_meta['feature-pw3-fishing-beat6'] ) ) echo $tfs_stored_private_meta['feature-pw3-fishing-beat6'][0]; ?></textarea>
              
            </p>
          </div>
        </div> <!-- /tab-content -->
      </div>
    </div>
  </div>
  
  <!-- PRIVATE WATERS LODGING -->
  <hr style="margin-top: 1.618em; border-top: 3px double #8c8b8b;">
  <h3><?php echo 'Private Waters Lodging' ?></h3>
  
  <p><!-- Private Waters Title -->
    
    <strong><label for="feature-pw4-title" class="sbm-row-title"><?php _e( 'Title', 'tfs-private-textdomain' )?></label></strong>
    <input style="width: 100%;" type="text" name="feature-pw4-title" id="feature-pw4-title" value="<?php if ( isset ( $tfs_stored_private_meta['feature-pw4-title'] ) ) echo $tfs_stored_private_meta['feature-pw4-title'][0]; ?>" />
  
  </p>
  
  <p><!-- Lodging Text Area/Cost-->
    
    <strong><label for="feature-pw4-gettingto-textarea" class="sbm-row-title"><?php _e( 'Content', 'tfs-private-textdomain' )?></label></strong>
    <textarea style="width: 100%;" rows="4" name="feature-pw4-gettingto-textarea" id="feature-pw4-gettingto-textarea"><?php if ( isset ( $tfs_stored_private_meta['feature-pw4-gettingto-textarea'] ) ) echo $tfs_stored_private_meta['feature-pw4-gettingto-textarea'][0]; ?></textarea>
  
  </p>
  
  <p><!-- Lodging Read More Text Area/Cost-->
    
    <strong><label for="feature-4-pwlodging-readmore-info" class="feature-4-pwlodging-readmore-info"><?php _e( 'Read More Info', 'tfs-private-textdomain' )?></label></strong>
    <input style="width: 100%;" type="text" name="feature-4-pwlodging-readmore-info" id="feature-4-pwlodging-readmore-info" value="<?php if ( isset ( $tfs_stored_private_meta['feature-4-pwlodging-readmore-info'] ) ) echo $tfs_stored_private_meta['feature-4-pwlodging-readmore-info'][0]; ?>" />
    
    <strong><label for="feature-pw4-readmore-textarea" class="sbm-row-title"><?php _e( 'Read More', 'tfs-private-textdomain' )?></label></strong>
    <textarea style="width: 100%;" rows="4" name="feature-pw4-readmore-textarea" id="feature-pw4-readmore-textarea"><?php if ( isset ( $tfs_stored_private_meta['feature-pw4-readmore-textarea'] ) ) echo $tfs_stored_private_meta['feature-pw4-readmore-textarea'][0]; ?></textarea>
  
  </p>
  
  <!-- PRIVATE WATERS GETTING THERE -->
  <hr style="margin-top: 1.618em; border-top: 3px double #8c8b8b;">
  <h3><?php echo 'Private Waters Getting There' ?></h3>
  <p><!-- Feature #3 Title -->
    
    <strong><label for="feature-pw3-title" class="sbm-row-title"><?php _e( 'Title', 'tfs-private-textdomain' )?></label></strong>
    <input style="width: 100%;" type="text" name="feature-pw3-title" id="feature-pw3-title" value="<?php if ( isset ( $tfs_stored_private_meta['feature-pw3-title'] ) ) echo $tfs_stored_private_meta['feature-pw3-title'][0]; ?>" />
    
  </p>
  
  <p><!-- Feature #4 Getting There Text Area/Cost-->
    
    <strong><label for="feature-pw3-gettingto-textarea" class="sbm-row-title"><?php _e( 'Content', 'tfs-private-textdomain' )?></label></strong>
    <textarea style="width: 100%;" rows="4" name="feature-pw3-gettingto-textarea" id="feature-pw3-gettingto-textarea"><?php if ( isset ( $tfs_stored_private_meta['feature-pw3-gettingto-textarea'] ) ) echo $tfs_stored_private_meta['feature-pw3-gettingto-textarea'][0]; ?></textarea>
    
  </p>
  
  <p><!-- Feature #4 Getting There Read More Text Area/Cost-->
    
    <strong><label for="feature-pw5-get-to-readmore-info" class="feature-pw5-get-to-readmore-info"><?php _e( 'Read More Info', 'tfs-private-textdomain' )?></label></strong>
    <input style="width: 100%;" type="text" name="feature-pw5-get-to-readmore-info" id="feature-pw5-get-to-readmore-info" value="<?php if ( isset ( $tfs_stored_private_meta['feature-pw5-get-to-readmore-info'] ) ) echo $tfs_stored_private_meta['feature-pw5-get-to-readmore-info'][0]; ?>" />
    
    <strong><label for="feature-pw3-readmore-textarea" class="sbm-row-title"><?php _e( 'Read More', 'tfs-private-textdomain' )?></label></strong>
    <textarea style="width: 100%;" rows="4" name="feature-pw3-readmore-textarea" id="feature-pw3-readmore-textarea"><?php if ( isset ( $tfs_stored_private_meta['feature-pw3-readmore-textarea'] ) ) echo $tfs_stored_private_meta['feature-pw3-readmore-textarea'][0]; ?></textarea>
  
  </p>
  
  <!-- ====== CALL TO ACTION ROW ====== -->
  <hr style="margin-top: 1.618em; border-top: 3px double #8c8b8b;">
  <h3><?php echo 'Call To Action - CTA' ?></h3>
  
  <p><!-- Call To Action Strong Into -->
    
    <strong><label for="cta-strong-intro" class="sbm-row-title"><?php _e('Call To Action intro','tfs-private-textdomain')?></label></strong>
    <input style="width: 100%;" type="text" placeholder="Place CTA content here." name="cta-private-strong-intro" id="cta-private-strong-intro" value="<?php if (isset($tfs_stored_private_meta['cta-private-strong-intro'])) echo $tfs_stored_private_meta['cta-private-strong-intro'][0]; ?>" />
    
  </p>
  
  <p><!-- Call To Action Content -->
    
    <strong><label for="cta-private-content" class="sbm-row-title"><?php _e( 'Call To Action content', 'tfs-private-textdomain' )?></label></strong>
    <textarea style="width: 100%;" rows="4" name="cta-private-content" id="cta-content"><?php if ( isset ( $tfs_stored_private_meta['cta-private-content'] ) ) echo $tfs_stored_private_meta['cta-private-content'][0]; ?></textarea>
    
  </p>
  
<?php }
