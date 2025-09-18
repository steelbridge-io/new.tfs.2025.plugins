<?php
/**
* Description: Schools Custom Meta Fields
*
* @package		schools
* @since			1.2.6
* @author			Chris Parsons
* @link				http://steelbridge.io
* @license		GNU General Public License
*/

// Prevents direct access to files
if (!defined('ABSPATH')) {
	exit('Cheatin&#8217; uh?');
	}

function load_custom_schools_admin_style($hook) {
        // Load only on ?page=mypluginname
        if($hook != 'post.php') {
                return;
        }
        wp_enqueue_style( 'custom_wp_admin_css', plugins_url('css/bootstrap.css', __FILE__) );
				wp_enqueue_style( 'custom_admin_style_css', plugins_url('css/style.css', __FILE__) );
				wp_enqueue_script( 'custom_wp_admin_js', plugins_url('js/bootstrap.min.js', __FILE__));
}
add_action( 'admin_enqueue_scripts', 'load_custom_schools_admin_style' );

// Checks to see if any data to save. Sanitizes and saves as needed.
include_once( plugin_dir_path( __FILE__ ) . '/inc/sanitize_fields_schools.php');

// Adds a meta box to the post editing screen on the template named travel-template
function tfs_schools_meta() {
	  global $post;
	  if(!empty($post)){
		  $pageTemplate = get_post_meta($post->ID, '_wp_page_template', true);
		  if($pageTemplate == 'page-templates/schools-template.php' || $pageTemplate == 'page-templates/schools-v2-template.php') {
				$types = array('schools_cpt');
				foreach($types as $type) {
				add_meta_box( 'sbm_meta', __( 'Schools', 'tfs-schools-textdomain' ), 'tfs_schools_meta_callback', $type, 'normal', 'high' );
			}
		}
  }
}
add_action( 'add_meta_boxes', 'tfs_schools_meta' );

function tfs_schools_meta_callback($post) {
	wp_nonce_field( basename( __FILE__ ), 'tfs_nonce' );
	$tfs_stored_schools_meta = get_post_meta( $post->ID );
	?>

	<!-- ====== Schools Details ====== -->

 		<div style="margin-top: 1.618em;">
			<h1>Schools Template Content</h1>
		</div>

		<!-- SCHOOLS DESCRIPTION -->
		<h3><?php echo 'Schools Description' ?></h3>

		 <p><!-- Schools Description / Appears below site title -->
      <strong><label for="schools-description" class="sbm-row-title"><?php _e( 'Schools Description', 'tfs-schools-textdomain' )?></label></strong>

      <input style="width: 100%;" type="text" name="schools-description" id="schools-description" placeholder="Appears below title" value="<?php if ( isset ( $tfs_stored_schools_meta['schools-description'] ) ) echo $tfs_stored_schools_meta['schools-description'][0]; ?>" />
    </p>

    <!-- SCHOOLS -->
		<hr style="margin-top: 1.618em; border-top: 3px double #8c8b8b;">
		<h3><?php echo 'Costs' ?></h3>

    <p><!-- Schools Title -->
      <strong><label for="feature-sch1-title" class="sbm-row-title"><?php _e( 'Costs Title', 'tfs-schools-textdomain' )?></label></strong>

      <input style="width: 100%;" type="text" name="feature-sch1-title" id="feature-sch1-title" value="<?php if ( isset ( $tfs_stored_schools_meta['feature-sch1-title'] ) ) echo $tfs_stored_schools_meta['feature-sch1-title'][0]; ?>" />
    </p>

    <p><!-- Text Area/Cost -->
			<strong><label for="feature-sch1-cost-textarea" class="sbm-row-title"><?php _e( 'Cost content', 'tfs-schools-textdomain' )?></label></strong>

			<textarea style="width: 100%;" rows="4" name="feature-sch1-cost-textarea" id="feature-sch1-cost-textarea"><?php if ( isset ( $tfs_stored_schools_meta['feature-sch1-cost-textarea'] ) ) echo $tfs_stored_schools_meta['feature-sch1-cost-textarea'][0]; ?></textarea>
    </p>

    <p><!-- Inclusions Text Area -->
			<strong><label for="feature-sch1-inclusions-textarea" class="sbm-row-title"><?php _e( 'Inclusions', 'tfs-schools-textdomain' )?></label></strong>

			<textarea style="width: 100%;" rows="4" name="feature-sch1-inclusions-textarea" id="feature-sch1-inclusions-textarea"><?php if ( isset ( $tfs_stored_schools_meta['feature-sch1-inclusions-textarea'] ) ) echo $tfs_stored_schools_meta['feature-sch1-inclusions-textarea'][0]; ?></textarea>
    </p>

    <p><!-- Non-inclusions Text Area -->
			<strong><label for="feature-sch1-noninclusions-textarea" class="sbm-row-title"><?php _e( 'Non-inclusions', 'tfs-schools-textdomain' )?></label></strong>

			<textarea style="width: 100%;" rows="4" name="feature-sch1-noninclusions-textarea" id="feature-sch1-noninclusions-textarea"><?php if ( isset ( $tfs_stored_schools_meta['feature-sch1-noninclusions-textarea'] ) ) echo $tfs_stored_schools_meta['feature-sch1-noninclusions-textarea'][0]; ?></textarea>
    </p>

    <!-- SCHOOL DATES -->
    <hr style="margin-top: 1.618em; border-top: 3px double #8c8b8b;">
    <h3><?php echo 'School Dates' ?></h3>

     <p><!-- Schools Dates Title -->
      <strong><label for="feature-sch2-title" class="sbm-row-title"><?php _e( 'Title', 'tfs-schools-textdomain' )?></label></strong>

      <input style="width: 100%;" type="text" name="feature-sch2-title" id="feature-sch2-title" value="<?php if ( isset ( $tfs_stored_schools_meta['feature-sch2-title'] ) ) echo $tfs_stored_schools_meta['feature-sch2-title'][0]; ?>" />
    </p>

     <p><!-- Schools Dates Text Area/Cost-->
			<strong><label for="feature-sch2-dates-textarea" class="sbm-row-title"><?php _e( 'Content', 'tfs-schools-textdomain' )?></label></strong>

			<textarea style="width: 100%;" rows="4" name="feature-sch2-dates-textarea" id="feature-sch2-dates-textarea"><?php if ( isset ( $tfs_stored_schools_meta['feature-sch2-dates-textarea'] ) ) echo $tfs_stored_schools_meta['feature-sch2-dates-textarea'][0]; ?></textarea>
    </p>

		<!-- ==== Display read more==== -->
		<p>

		<span class="dates-row-title"><?php _e( '<strong>Display Read More</strong>', 'tfs-schools-textdomain' )?></span>
		<div class="dates-row-content">
		<label for="sch-dates-readmore-checkbox">
		<input type="checkbox" name="sch-dates-readmore-checkbox" id="sch-dates-readmore-checkbox" value="yes" <?php if ( isset ( $tfs_stored_schools_meta['sch-dates-readmore-checkbox'] ) ) checked( $tfs_stored_schools_meta['sch-dates-readmore-checkbox'][0], 'yes' ); ?> />
		<?php _e( 'Check box to activate read more.', 'tfs-schools-textdomain' )?>
		</label>
		</label>
		</div>

		</p>

		<p><!-- Dates Read More -->
			<strong><label for="sch-dates-readmore-textarea" class="sbm-row-title"><?php _e( 'Read more', 'tfs-schools-textdomain' )?></label></strong>

			<textarea style="width: 100%;" rows="4" name="sch-dates-readmore-textarea" id="sch-dates-readmore-textarea"><?php if ( isset ( $tfs_stored_schools_meta['sch-dates-readmore-textarea'] ) ) echo $tfs_stored_schools_meta['sch-dates-readmore-textarea'][0]; ?></textarea>
    </p>

   <!-- SCHOOLS LODGING -->
    <hr style="margin-top: 1.618em; border-top: 3px double #8c8b8b;">
    <h3><?php echo 'School Lodging' ?></h3>
    <p><!-- Schools Title -->
      <strong><label for="feature-sch4-title" class="sbm-row-title"><?php _e( 'Title', 'tfs-schools-textdomain' )?></label></strong>

      <input style="width: 100%;" type="text" name="feature-sch4-title" id="feature-sch4-title" value="<?php if ( isset ( $tfs_stored_schools_meta['feature-sch4-title'] ) ) echo $tfs_stored_schools_meta['feature-sch4-title'][0]; ?>" />
    </p>

    <p><!-- Schools Lodging Text Area/Cost-->
			<strong><label for="feature-sch4-gettingto-textarea" class="sbm-row-title"><?php _e( 'Content', 'tfs-schools-textdomain' )?></label></strong>

			<textarea style="width: 100%;" rows="4" name="feature-sch4-gettingto-textarea" id="feature-sch4-gettingto-textarea"><?php if ( isset ( $tfs_stored_schools_meta['feature-sch4-gettingto-textarea'] ) ) echo $tfs_stored_schools_meta['feature-sch4-gettingto-textarea'][0]; ?></textarea>
    </p>
    
    <!-- ==== Display read more==== -->
		<p>

		<span class="schools-row-title"><?php _e( '<strong>Display Read More</strong>', 'tfs-schools-textdomain' )?></span>
		<div class="schools-row-content">
		<label for="sch-lodging-readmore-checkbox">
		<input type="checkbox" name="sch-lodging-readmore-checkbox" id="sch-lodging-readmore-checkbox" value="yes" <?php if ( isset ( $tfs_stored_schools_meta['sch-lodging-readmore-checkbox'] ) ) checked( $tfs_stored_schools_meta['sch-lodging-readmore-checkbox'][0], 'yes' ); ?> />
		<?php _e( 'Check box to activate read more.', 'tfs-schools-textdomain' )?>
		</label>
		</label>
		</div>

		</p>

    <p><!-- Schools Lodging Read More Text Area/Cost-->
			<strong><label for="feature-sch4-readmore-textarea" class="sbm-row-title"><?php _e( 'Read more', 'tfs-schools-textdomain' )?></label></strong>

			<textarea style="width: 100%;" rows="4" name="feature-sch4-readmore-textarea" id="feature-sch4-readmore-textarea"><?php if ( isset ( $tfs_stored_schools_meta['feature-sch4-readmore-textarea'] ) ) echo $tfs_stored_schools_meta['feature-sch4-readmore-textarea'][0]; ?></textarea>
    </p>

		<!-- SCHOOLS GETTING THERE -->
    <hr style="margin-top: 1.618em; border-top: 3px double #8c8b8b;">
    <h3><?php echo 'Getting There' ?></h3>
     <p><!-- Schools Title -->
      <strong><label for="feature-sch3-title" class="sbm-row-title"><?php _e( 'Title', 'tfs-schools-textdomain' )?></label></strong>

      <input style="width: 100%;" type="text" name="feature-sch3-title" id="feature-sch3-title" value="<?php if ( isset ( $tfs_stored_schools_meta['feature-sch3-title'] ) ) echo $tfs_stored_schools_meta['feature-sch3-title'][0]; ?>" />
    </p>

     <p><!-- Feature #4 Getting There Text Area/Cost-->
			<strong><label for="feature-sch3-gettingto-textarea" class="sbm-row-title"><?php _e( 'Content', 'tfs-schools-textdomain' )?></label></strong>

			<textarea style="width: 100%;" rows="4" name="feature-sch3-gettingto-textarea" id="feature-sch3-gettingto-textarea"><?php if ( isset ( $tfs_stored_schools_meta['feature-sch3-gettingto-textarea'] ) ) echo $tfs_stored_schools_meta['feature-sch3-gettingto-textarea'][0]; ?></textarea>
    </p>
    
    <!-- ==== Display read more==== -->
		<p>

		<span class="schools-row-title"><?php _e( '<strong>Display Read More</strong>', 'tfs-schools-textdomain' )?></span>
		<div class="schools-row-content">
		<label for="sch-gettingthere-readmore-checkbox">
		<input type="checkbox" name="sch-gettingthere-readmore-checkbox" id="sch-gettingthere-readmore-checkbox" value="yes" <?php if ( isset ( $tfs_stored_schools_meta['sch-gettingthere-readmore-checkbox'] ) ) checked( $tfs_stored_schools_meta['sch-gettingthere-readmore-checkbox'][0], 'yes' ); ?> />
		<?php _e( 'Check box to activate read more.', 'tfs-schools-textdomain' )?>
		</label>
		</label>
		</div>

		</p>

    <p><!-- Feature #4 Getting There Read More Text Area/Cost-->
			<strong><label for="feature-sch3-readmore-textarea" class="sbm-row-title"><?php _e( 'Read more', 'tfs-schools-textdomain' )?></label></strong>

			<textarea style="width: 100%;" rows="4" name="feature-sch3-readmore-textarea" id="feature-sch3-readmore-textarea"><?php if ( isset ( $tfs_stored_schools_meta['feature-sch3-readmore-textarea'] ) ) echo $tfs_stored_schools_meta['feature-sch3-readmore-textarea'][0]; ?></textarea>
    </p>

		<!-- ====== SCHOOLS ITINERARY ====== -->
    <hr style="margin-top: 1.618em; border-top: 3px double #8c8b8b;">
    <h3><?php echo 'Schools Itinerary' ?></h3>

    <p><!-- Feature #5 Itinerary -->
      <strong><label for="feature-sch3-fishing-title" class="sbm-row-title"><?php _e( 'Title', 'tfs-schools-textdomain' )?></label></strong>

      <input style="width: 100%;" type="text" name="feature-sch3-fishing-title" id="feature-sch3-fishing-title" value="<?php if ( isset ( $tfs_stored_schools_meta['feature-sch3-fishing-title'] ) ) echo $tfs_stored_schools_meta['feature-sch3-fishing-title'][0]; ?>" />
    </p>

    <p> <!-- Fishing Section Content -->
			<strong><label for="feature-sch3-fishing-textarea" class="sbm-row-title"><?php _e( 'Content', 'tfs-schools-textdomain' )?></label></strong>

			<textarea style="width: 100%;" rows="4" name="feature-sch3-fishing-textarea" id="feature-sch3-fishing-textarea"><?php if ( isset ( $tfs_stored_schools_meta['feature-sch3-fishing-textarea'] ) ) echo $tfs_stored_schools_meta['feature-sch3-fishing-textarea'][0]; ?></textarea>
		</p>
    
    <!-- ==== Display read more==== -->
		<p>

		<span class="schools-row-title"><?php _e( '<strong>Display Read More</strong>', 'tfs-schools-textdomain' )?></span>
		<div class="schools-row-content">
		<label for="sch-itinerary-readmore-checkbox">
		<input type="checkbox" name="sch-itinerary-readmore-checkbox" id="sch-itinerary-readmore-checkbox" value="yes" <?php if ( isset ( $tfs_stored_schools_meta['sch-itinerary-readmore-checkbox'] ) ) checked( $tfs_stored_schools_meta['sch-itinerary-readmore-checkbox'][0], 'yes' ); ?> />
		<?php _e( 'Check box to activate read more.', 'tfs-schools-textdomain' )?>
		</label>
		</label>
		</div>

		</p>

    <p><!-- Feature #5 Itinerary Read More -->
			<strong><label for="feature-sch3-readmore-textarea-intinerary" class="sbm-row-title"><?php _e( 'Read more', 'tfs-schools-textdomain' )?></label></strong>

			<textarea style="width: 100%;" rows="4" name="feature-sch3-readmore-textarea-intinerary" id="feature-sch3-readmore-textarea-intinerary"><?php if ( isset ( $tfs_stored_schools_meta['feature-sch3-readmore-textarea-intinerary'] ) ) echo $tfs_stored_schools_meta['feature-sch3-readmore-textarea-intinerary'][0]; ?></textarea>
    </p>

    <!-- ====== CALL TO ACTION ROW ====== -->
    <hr style="margin-top: 1.618em; border-top: 3px double #8c8b8b;">
    <h3><?php echo 'Call To Action - CTA' ?></h3>

    <p><!-- Call To Action Strong Into -->
      <strong><label for="cta-strong-intro" class="sbm-row-title"><?php _e('CTA intro','tfs-schools-textdomain')?></label></strong>
      <input style="width: 100%;" type="text" name="cta-schools-strong-intro" id="cta-schools-strong-intro" value="<?php if (isset($tfs_stored_schools_meta['cta-schools-strong-intro'])) echo $tfs_stored_schools_meta['cta-schools-strong-intro'][0]; ?>" />
    </p>

    <p><!-- Call To Action Content -->
			<strong><label for="cta-schools-content" class="sbm-row-title"><?php _e( 'CTA content', 'tfs-schools-textdomain' )?></label></strong>

			<textarea style="width: 100%;" rows="4" name="cta-schools-content" id="cta-content"><?php if ( isset ( $tfs_stored_schools_meta['cta-schools-content'] ) ) echo $tfs_stored_schools_meta['cta-schools-content'][0]; ?></textarea>
    </p>

<?PHP
}
