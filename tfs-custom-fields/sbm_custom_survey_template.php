<?php
 /**
	* Description: Survey Template Customizations
	*
	* @package		tfsSurvey
	* @since		1.3.3
	* @author		Chris Parsons
	* @link		http://steelbridge.io
	* @license		GNU General Public License
	*/

 include_once( plugin_dir_path( __FILE__ ) . 'inc/sanitize_fields_survey.php');

 // Adds a table to the travel template in place of the expanding rates & reservations
 function tfs_custom_survey_meta() {
	global $post;
	if(!empty($post)){
	 $pageTemplate = get_post_meta($post->ID, '_wp_page_template', true);
	 if($pageTemplate == 'page-templates/survey-template.php') {
		$types = array('post', 'page', 'travel_cpt', 'travel_blog', 'esb_lodge');
		foreach($types as $type) {
		 add_meta_box( 'sbm_survey_meta', __( 'Survey Settings', 'survey-textdomain' ),
			 'tfs_survey_callback', $type, 'normal', 'high' );
		}
	 }
	}
 }
 add_action( 'add_meta_boxes', 'tfs_custom_survey_meta' );

 // Outputs the meta fields for the Survey Template
 function tfs_survey_callback( $post ) {
 wp_nonce_field( basename( __FILE__ ), 'survey_nonce' );
 $sbm_survey_meta = get_post_meta( $post->ID );
   ?>
   <!-- === Custom Survey Styles And Settings === -->
   <div id="survey-template" class="survey-meta-select text-center">
     <h2 class="admin-font">Survey Template Settings</h2>
     <div class="row mt-2618">
       <div class="col-lg-2">
         <div class="panel panel-default">
           <div class="panel-body text-center colorselector">
             <!-- Color Picker  -->
             <label for="survey-heading-color" class="prfx-row-title"><?php _e( 'Heading Color', 'survey-textdomain' ) ?></label>
             <input name="survey-heading-color" type="text" value="<?php if ( isset ( $sbm_survey_meta['survey-heading-color'] ) ) echo $sbm_survey_meta['survey-heading-color'][0]; ?>" class="cust-meta-survey-heading-color" />
           </div>
         </div>
       </div>
       <div class="col-lg-2">
         <div class="panel panel-default">
           <div class="panel-body text-center colorselector">
             <!-- Color Picker  -->
             <label for="survey-background-color" class="prfx-row-title"><?php _e( 'Template BG Color', 'survey-textdomain' ) ?></label>
             <input name="survey-background-color" type="text" value="<?php if ( isset ( $sbm_survey_meta['survey-background-color'] ) ) echo $sbm_survey_meta['survey-background-color'][0]; ?>" class="cust-meta-survey-bg-color" />
           </div>
         </div>
       </div>
       <div class="col-lg-2">
         <div class="panel panel-default">
           <div class="panel-body text-center colorselector">
             <!-- Color Picker  -->
             <label for="survey-cont-border-color" class="prfx-row-title"><?php _e( 'Border Color', 'survey-textdomain' ) ?></label>
             <input name="survey-cont-border-color" type="text" value="<?php if ( isset ( $sbm_survey_meta['survey-cont-border-color'] ) ) echo $sbm_survey_meta['survey-cont-border-color'][0]; ?>" class="survey-cont-border-color" />
           </div>
         </div>
       </div>
       <div class="col-lg-2">
         <div class="panel panel-default">
           <div class="panel-body text-center colorselector">
             <!-- Color Picker  -->
             <label for="survey-cont-bg-color" class="prfx-row-title"><?php _e( 'BG Color', 'survey-textdomain' ) ?></label>
             <input name="survey-cont-bg-color" type="text" value="<?php if ( isset ( $sbm_survey_meta['survey-cont-bg-color'] ) ) echo $sbm_survey_meta['survey-cont-bg-color'][0]; ?>" class="survey-cont-bg-color" />
           </div>
         </div>
       </div>
       <div class="col-lg-2">
         <div class="panel panel-default">
           <div class="panel-body text-center colorselector">
             <!-- Color Picker  -->
             <label for="survey-author-bg-color" class="prfx-row-title"><?php _e( 'Author BG Color', 'survey-textdomain' ) ?></label>
             <input name="survey-author-bg-color" type="text" value="<?php if ( isset ( $sbm_survey_meta['survey-author-bg-color'] ) ) echo $sbm_survey_meta['survey-author-bg-color'][0]; ?>" class="survey-author-bg-color" />
           </div>
         </div>
       </div>
       <div class="col-lg-2">
         <div class="panel panel-default">
           <div class="panel-body text-center colorselector">
             <!-- Color Picker  -->
             <label for="survey-author-heading-color" class="prfx-row-title"><?php _e( 'Author Heading Color', 'survey-textdomain' ) ?></label>
             <input name="survey-author-heading-color" type="text" value="<?php if ( isset ( $sbm_survey_meta['survey-author-heading-color'] ) ) echo $sbm_survey_meta['survey-author-heading-color'][0]; ?>" class="survey-author-heading-color" />
           </div>
         </div>
       </div>
       <div class="col-lg-2">
         <div class="panel panel-default">
           <div class="panel-body text-center colorselector">
             <!-- Color Picker  -->
             <label for="survey-author-desc-color" class="prfx-row-title"><?php _e( 'Description Color', 'survey-textdomain' ) ?></label>
             <input name="survey-author-desc-color" type="text" value="<?php if ( isset ( $sbm_survey_meta['survey-author-desc-color'] ) ) echo $sbm_survey_meta['survey-author-desc-color'][0]; ?>" class="survey-author-desc-color" />
           </div>
         </div>
       </div>
     </div>
   </div>

<?php } ?>