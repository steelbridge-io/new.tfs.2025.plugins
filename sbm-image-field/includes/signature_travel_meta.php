<?php
/**
 * Adds a meta box to the post editing screen
 */
ob_implicit_flush(true);
include( plugin_dir_path( __FILE__ ) . '../inc/sanitize_signature_travel.php');

add_action( 'add_meta_boxes', 'signature_travel_meta' );
function signature_travel_meta() { global $post;
  
  if(!empty($post)) {
    $pageTemplate = get_post_meta ($post -> ID, '_wp_page_template', true);
    $types = array('travel_cpt', 'guide_service');
    foreach ($types as $type) {
      if($pageTemplate == 'page-templates/travel-template.php') {
        add_meta_box ( 'sections_meta', __('Content &amp; Images', 'the-fly-shop' ), 'signature_travel_meta_callback', $type, 'normal', 'high');
      }
    }
  }
}
ob_start();
// Outputs the content of the meta box
function signature_travel_meta_callback( $post ) {
  wp_nonce_field( basename( __FILE__ ), 'signature_travel_meta_nonce' );
  $signature_travel_stored_meta = get_post_meta( $post->ID ); ?>
  
  <!-- ==== START META CONTENT ==== -->
  
  <div style="margin-top: 1.618em;" xmlns="http://www.w3.org/1999/html">
    <h1>Signature Travel Template Content</h1>
  </div>
  
  <!-- TFS Logo -->
  <p>
    
    <strong><label for="signature-travel-logo" class="signature-travel-row-title"><?php _e( 'Signature Travel Template Logo', 'the-fly-shop' );?></label></strong><br>
    <input style="width:75%;" type="text" name="signature-travel-logo" id="signature-travel-logo" value="<?php if ( isset ( $signature_travel_stored_meta['signature-travel-logo'] ) ) echo $signature_travel_stored_meta['signature-travel-logo'][0];?>" />
    <input type="button" id="signature-travel-logo-button" class="button" value="<?php _e( 'Choose or Upload an Image', 'the-fly-shop' );?>" />
  
  </p>
  
  <!-- Signature Travel Description -->
  <p>
    
    <strong><label for="signature-travel-description" class="signature-travel-row-title"><?php _e( 'Signature Travel Description', 'the-fly-shop' );?></label></strong>
    <input style="width:100%;" type="text" name="signature-travel-description" id="signature-travel-description" value="<?php if ( isset ( $signature_travel_stored_meta['signature-travel-description'] ) ) echo $signature_travel_stored_meta['signature-travel-description'][0];?>" />
  
  </p>
	
	<h3>Prime Travel Content</h3>
	
	<!-- <p>
		
		<strong><label for="prime-travel-header-image" class="prime-travel-header-image-row-title"><?php //_e( 'Prime Travel Header Image', 'the-fly-shop' );?></label></strong><br>
		<input style="width:75%;" type="text" name="prime-travel-header-image" id="prime-travel-header-image" value="<?php // if ( isset ( $signature_travel_stored_meta['prime-travel-header-image'] ) ) echo $signature_travel_stored_meta['prime-travel-header-image'][0];?>" />
		<input type="button" id="prime-travel-header-image-button" class="button" value="<?php // _e( 'Choose or Upload an Image', 'the-fly-shop' );?>" />
	
	</p> -->
	
	<p>
		
		<strong><label for="prime-travel-logo" class="prime-travel-row-title"><?php _e( 'Prime Travel Logo', 'the-fly-shop' );?></label></strong><br>
		<input style="width:75%;" type="text" name="prime-travel-logo" id="prime-travel-logo" value="<?php if ( isset ( $signature_travel_stored_meta['prime-travel-logo'] ) ) echo $signature_travel_stored_meta['prime-travel-logo'][0];?>" />
		<input type="button" id="prime-travel-logo-button" class="button" value="<?php _e( 'Choose or Upload an Image', 'the-fly-shop' );?>" />
		
	</p>
	
	<p>
		Submit button html - copy and paste, then update:
		<pre>
			&lt;button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#primeTravelTempmodal"&gt;Sign Up!&lt;/button&gt;
		
		<!-- Button trigger modal -->
		</pre>
		Text can be wrapped in:
		<pre>&lt;p&gt;, &lt;h1&gt;, &lt;h2&gt;, &lt;h3&gt;, &lt;h4&gt;, &lt;h5&gt;</pre>
		
		<strong><label for="prime-travel-description" class="prime-travel-description"><?php _e( 'Prime Travel Description', 'the-fly-shop' );?></label></strong><br>
		<textarea style="width: 100%;" rows="4" name="prime-travel-description" id="prime-travel-description"><?php if ( isset ( $signature_travel_stored_meta['prime-travel-description'] ) ) echo $signature_travel_stored_meta['prime-travel-description'][0]; ?></textarea>
	
	</p>
  
  <!-- ****
  Tabbed section for optional carousel
  **** -->
  <div class="panel with-nav-tabs panel-default">
    <div class="panel-heading">
      <!-- Nav tabs -->
      <ul class="nav nav-tabs" role="tablist">
        <li role="presentation" class="active"><a href="#sectionscselimage1" aria-controls="sectionscselimage1" role="tab" data-toggle="tab">Carousel Image &#35;1</a></li>
        <li role="presentation"><a href="#sectionscselimage2" aria-controls="sectionscselimage2" role="tab" data-toggle="tab">Carousel Image &#35;2</a></li>
        <li role="presentation"><a href="#sectionscselimage3" aria-controls="sectionscselimage3" role="tab" data-toggle="tab">Carousel Image &#35;3</a></li>
        <li role="presentation"><a href="#sectionscselimage4" aria-controls="sectionscselimage4" role="tab" data-toggle="tab">Carousel Image &#35;4</a></li>
        <li role="presentation"><a href="#sectionscselimage5" aria-controls="sectionscselimage5" role="tab" data-toggle="tab">Carousel Image &#35;5</a></li>
        <li role="presentation"><a href="#sectionscselimage6" aria-controls="sectionscselimage6" role="tab" data-toggle="tab">Carousel Image &#35;6</a></li>
      </ul>
      
      <div class="panel-body boof">
        
        <p> <!-- ==== Carousel Images==== -->
          
          <span class="signature-travel-row-title"><?php _e( '<strong>Display Carousel</strong>', 'the-fly-shop' )?></span>
        <div class="signature-travel-row-content">
          <label for="signature-travel-csel-checkbox">
            <input type="checkbox" name="signature-travel-csel-checkbox" id="signature-travel-csel-checkbox" value="yes" <?php if ( isset ( $signature_travel_stored_meta['signature-travel-csel-checkbox'] ) ) checked( $signature_travel_stored_meta['signature-travel-csel-checkbox'][0], 'yes' ); ?> />
            <?php _e( 'Check box to show carousel.', 'the-fly-shop' )?>
          </label>
        </div>
        
        </p>
        
        <div class="tab-content">
          
          <!-- ==== Image #1 ==== -->
          <div role="tabpanel" class="tab-pane fade in active" id="sectionscselimage1">
            
            <label for="signature-travel-image" class="signature-travel-row-title"><?php _e( '<h3>Carousel Image &#35;1</h3>', 'the-fly-shop' );?></label>
            
            <p>
              
              <!-- Carousel image #1 link. -->
              <strong><label for="signature-travel-csel-1-link" class="signature-travel-row-title-link"><?php _e( 'Carousel &#35;1 Link', 'the-fly-shop' );?></label></strong><br>
              <input  style="width: 75%;" type="text" name="signature-travel-csel-1-link" id="signature-travel-csel-1-link" value="<?php if ( isset ( $signature_travel_stored_meta['signature-travel-csel-1-link'] ) ) echo $signature_travel_stored_meta['signature-travel-csel-1-link'][0]; ?>" />
            
            </p>
            
            <p>
              
              <!-- Carousel #1 image -->
              <strong><label for="signature-travel-csel-1-img" class="signature-travel-row-title"><?php _e( 'Signature Image &#35;4', 'the-fly-shop' );?></label></strong><br>
              <input style="width:75%;" type="text" name="signature-travel-csel-1-img" id="signature-travel-csel-1-img" value="<?php if ( isset ( $signature_travel_stored_meta['signature-travel-csel-1-img'] ) ) echo $signature_travel_stored_meta['signature-travel-csel-1-img'][0];?>" /><br><br>
              <input type="button" id="signature-travel-csel-1-img-button" class="button" value="<?php _e( 'Choose or Upload an Image', 'the-fly-shop' );?>" />
            
            </p>
          
          </div>
          
          <!-- ==== Image #2==== -->
          
          <div role="tabpanel" class="tab-pane fade" id="sectionscselimage2">
            
            <label for="signature-travel-image" class="signature-travel-row-title"><?php _e( '<h3>Carousel Image &#35;2</h3>', 'the-fly-shop' );?></label>
            
            <p>
              
              <!-- Carousel image #2 link. -->
              <strong><label for="signature-travel-csel-2-link" class="signature-travel-row-title-link"><?php _e( 'Carousel &#35;2 Link', 'the-fly-shop' );?></label></strong><br>
              <input  style="width: 75%;" type="text" name="signature-travel-csel-2-link" id="signature-travel-csel-2-link" value="<?php if ( isset ( $signature_travel_stored_meta['signature-travel-csel-2-link'] ) ) echo $signature_travel_stored_meta['signature-travel-csel-2-link'][0]; ?>" />
            
            </p>
            
            <p>
              
              <!-- Carousel #2 image -->
              <strong><label for="signature-travel-csel-2-img" class="signature-travel-row-title"><?php _e( 'Carousel Image &#35;2', 'the-fly-shop' );?></label></strong><br>
              <input style="width:75%;" type="text" name="signature-travel-csel-2-img" id="signature-travel-csel-2-img" value="<?php if ( isset ( $signature_travel_stored_meta['signature-travel-csel-2-img'] ) ) echo $signature_travel_stored_meta['signature-travel-csel-2-img'][0];?>" /><br><br>
              <input type="button" id="signature-travel-csel-2-img-button" class="button" value="<?php _e( 'Choose or Upload an Image', 'the-fly-shop' );?>" />
            
            </p>
          
          </div>
          
          <!-- ==== Image #3 ==== -->
          
          <div role="tabpanel" class="tab-pane fade" id="sectionscselimage3">
            
            <label for="signature-travel-image" class="signature-travel-row-title"><?php _e( '<h3>Carousel Image &#35;3</h3>', 'the-fly-shop' );?></label>
            
            <p>
              
              <!-- Carousel image #3 link. -->
              <strong><label for="signature-travel-csel-3-link" class="signature-travel-row-title-link"><?php _e( 'Carousel &#35;3 Link', 'the-fly-shop' );?></label></strong><br>
              <input  style="width: 75%;" type="text" name="signature-travel-csel-3-link" id="signature-travel-csel-3-link" value="<?php if ( isset ( $signature_travel_stored_meta['signature-travel-csel-3-link'] ) ) echo $signature_travel_stored_meta['signature-travel-csel-3-link'][0]; ?>" />
            
            </p>
            
            <p>
              
              <!-- Carousel #3 image -->
              <strong><label for="signature-travel-csel-3-img" class="signature-travel-row-title"><?php _e( 'Carousel Image &#35;3', 'the-fly-shop' );?></label></strong><br>
              <input style="width:75%;" type="text" name="signature-travel-csel-3-img" id="signature-travel-csel-3-img" value="<?php if ( isset ( $signature_travel_stored_meta['signature-travel-csel-3-img'] ) ) echo $signature_travel_stored_meta['signature-travel-csel-3-img'][0];?>" /><br><br>
              <input type="button" id="signature-travel-csel-3-img-button" class="button" value="<?php _e( 'Choose or Upload an Image', 'the-fly-shop' );?>" />
            
            </p>
          
          </div>
          
          <!-- ==== Image #4 ==== -->
          
          <div role="tabpanel" class="tab-pane fade" id="sectionscselimage4">
            
            <label for="signature-travel-image" class="signature-travel-row-title"><?php _e( '<h3>Carousel Image &#35;4</h3>', 'the-fly-shop' );?></label>
            
            <p>
              
              <!-- Carousel image #4 link. -->
              <strong><label for="signature-travel-csel-4-link" class="signature-travel-row-title-link"><?php _e( 'Carousel &#35;4 Link', 'the-fly-shop' );?></label></strong><br>
              <input  style="width: 75%;" type="text" name="signature-travel-csel-4-link" id="signature-travel-csel-4-link" value="<?php if ( isset ( $signature_travel_stored_meta['signature-travel-csel-4-link'] ) ) echo $signature_travel_stored_meta['signature-travel-csel-4-link'][0]; ?>" />
            
            </p>
            
            <p>
              
              <!-- Carousel #4 image -->
              <strong><label for="signature-travel-csel-4-img" class="signature-travel-row-title"><?php _e( 'Carousel Image &#35;4', 'the-fly-shop' );?></label></strong><br>
              <input style="width:75%;" type="text" name="signature-travel-csel-4-img" id="signature-travel-csel-4-img" value="<?php if ( isset ( $signature_travel_stored_meta['signature-travel-csel-4-img'] ) ) echo $signature_travel_stored_meta['signature-travel-csel-4-img'][0];?>" /><br><br>
              <input type="button" id="signature-travel-csel-4-img-button" class="button" value="<?php _e( 'Choose or Upload an Image', 'the-fly-shop' );?>" />
            
            </p>
          
          </div>
          
          <!-- ==== Image #5 ==== -->
          
          <div role="tabpanel" class="tab-pane fade" id="sectionscselimage5">
            
            <label for="signature-travel-image" class="signature-travel-row-title"><?php _e( '<h3>Carousel Image &#35;5</h3>', 'the-fly-shop' );?></label>
            
            <p>
              
              <!-- Carousel image #4 link. -->
              <strong><label for="signature-travel-csel-5-link" class="signature-travel-row-title-link"><?php _e( 'Carousel &#35;5 Link', 'the-fly-shop' );?></label></strong><br>
              <input  style="width: 75%;" type="text" name="signature-travel-csel-5-link" id="signature-travel-csel-5-link" value="<?php if ( isset ( $signature_travel_stored_meta['signature-travel-csel-5-link'] ) ) echo $signature_travel_stored_meta['signature-travel-csel-5-link'][0]; ?>" />
            
            </p>
            
            <p>
              
              <!-- Carousel #4 image -->
              <strong><label for="signature-travel-csel-5-img" class="signature-travel-row-title"><?php _e( 'Carousel Image &#35;5', 'the-fly-shop' );?></label></strong><br>
              <input style="width:75%;" type="text" name="signature-travel-csel-5-img" id="signature-travel-csel-5-img" value="<?php if ( isset ( $signature_travel_stored_meta['signature-travel-csel-5-img'] ) ) echo $signature_travel_stored_meta['signature-travel-csel-5-img'][0];?>" /><br><br>
              <input type="button" id="signature-travel-csel-5-img-button" class="button" value="<?php _e( 'Choose or Upload an Image', 'the-fly-shop' );?>" />
            
            </p>
          
          </div>
          
          <!-- ==== Image #5 ==== -->
          
          <div role="tabpanel" class="tab-pane fade" id="sectionscselimage6">
            
            <label for="signature-travel-image" class="signature-travel-row-title"><?php _e( '<h3>Carousel Image &#35;6</h3>', 'the-fly-shop' );?></label>
            
            <p>
              
              <!-- Carousel image #6 link. -->
              <strong><label for="signature-travel-csel-6-link" class="signature-travel-row-title-link"><?php _e( 'Carousel &#35;6 Link', 'the-fly-shop' );?></label></strong><br>
              <input  style="width: 75%;" type="text" name="signature-travel-csel-6-link" id="signature-travel-csel-6-link" value="<?php if ( isset ( $signature_travel_stored_meta['signature-travel-csel-6-link'] ) ) echo $signature_travel_stored_meta['signature-travel-csel-6-link'][0]; ?>" />
            
            </p>
            
            <p>
              
              <!-- Carousel #6 image -->
              <strong><label for="signature-travel-csel-6-img" class="signature-travel-row-title"><?php _e( 'Carousel Image &#35;6', 'the-fly-shop' );?></label></strong><br>
              <input style="width:75%;" type="text" name="signature-travel-csel-6-img" id="signature-travel-csel-6-img" value="<?php if ( isset ( $signature_travel_stored_meta['signature-travel-csel-6-img'] ) ) echo $signature_travel_stored_meta['signature-travel-csel-6-img'][0];?>" /><br><br>
              <input type="button" id="signature-travel-csel-6-img-button" class="button" value="<?php _e( 'Choose or Upload an Image', 'the-fly-shop' );?>" />
            
            </p>
          
          </div>
        
        </div><!-- ./tab-content -->
      </div><!-- ./panel-body boof -->
    </div><!-- ./panel-heading -->
  </div><!-- ./panel with-nav-tabs panel-default -->
  
  <hr style="margin-top: 1.618em; border-top: 3px double #8c8b8b;">
  
  <div class="panel with-nav-tabs panel-default">
    <div class="panel-heading">
      <!-- Nav tabs -->
      <ul class="nav nav-tabs" role="tablist">
        <li role="presentation" class="active"><a href="#sectionsimage1" aria-controls="sectionsimage1" role="tab" data-toggle="tab">Section &#35;1</a></li>
        <li role="presentation"><a href="#sectionsimage2" aria-controls="sectionsimage2" role="tab" data-toggle="tab">Section &#35;2</a></li>
        <li role="presentation"><a href="#sectionsimage3" aria-controls="sectionsimage3" role="tab" data-toggle="tab">Section &#35;3</a></li>
        <li role="presentation"><a href="#sectionsimage4" aria-controls="sectionsimage4" role="tab" data-toggle="tab">Section &#35;4</a></li>
        <li role="presentation"><a href="#sectionsimage5" aria-controls="sectionsimage5" role="tab" data-toggle="tab">Section &#35;5</a></li>
        <li role="presentation"><a href="#sectionsimage6" aria-controls="sectionsimage6" role="tab" data-toggle="tab">Section &#35;6</a></li>
        <li role="presentation"><a href="#sectionsimage7" aria-controls="sectionsimage7" role="tab" data-toggle="tab">Section &#35;7</a></li>
        <li role="presentation"><a href="#sectionsimage8" aria-controls="sectionsimage8" role="tab" data-toggle="tab">Section &#35;8</a></li>
        <li role="presentation"><a href="#sectionsimage9" aria-controls="sectionsimage9" role="tab" data-toggle="tab">Section &#35;9</a></li>
        <li role="presentation"><a href="#sectionsimage10" aria-controls="sectionsimage10" role="tab" data-toggle="tab">Section &#35;10</a></li>
      </ul>
      
      <div class="panel-body boof">
        <div class="tab-content">
          
          <!-- ==== SECTION #1 ==== -->
          <div role="tabpanel" class="tab-pane fade in active" id="sectionsimage1">
            
            <p> <!-- ==== SECTION #1 TITLE ==== -->
              
              <strong><label for="signature-travel-section-1-title" class="signature-travel-section-1-title"><?php _e( 'Section &#35;1 Title', 'the-fly-shop' );?></label></strong><br>
              <input style="width:50%;" type="text" name="signature-travel-section-1-title" id="signature-travel-section-1-title" value="<?php if ( isset ( $signature_travel_stored_meta['signature-travel-section-1-title'] ) ) echo $signature_travel_stored_meta['signature-travel-section-1-title'][0];?>" />
            
            </p>
  
            <p> <!-- ==== SECTION #1 TITLE LINK ==== -->
    
              <strong><label for="signature-travel-section-1-title-link" class="signature-travel-section-1-title-link"><?php _e( 'Section &#35;1 Title Link', 'the-fly-shop' );?></label></strong><br>
              <input style="width:50%;" type="url" name="signature-travel-section-1-title-link" id="signature-travel-section-1-title-link" value="<?php if ( isset ( $signature_travel_stored_meta['signature-travel-section-1-title-link'] ) ) echo $signature_travel_stored_meta['signature-travel-section-1-title-link'][0];?>" />
  
            </p>
            
            <p> <!-- ==== SECTION #1 IMAGE ==== -->
              
              <label for="signature-travel-1-image" class="signature-travel-1-image"><?php _e( '<strong>Section &#35;1 Image</strong>', 'the-fly-shop' );?></label><br>
              <input type="text" style="width: 75%;" name="signature-travel-1-image" id="signature-travel-1-image" value="<?php if ( isset ( $signature_travel_stored_meta['signature-travel-1-image'] ) ) echo $signature_travel_stored_meta['signature-travel-1-image'][0];?>" /><br><br>
              <input type="button" id="signature-travel-1-image-button" class="button" value="<?php _e( 'Choose or Upload an Image', 'the-fly-shop' );?>" />
            
            </p>
  
            <p> <!-- ==== SECTION #1 SUB TITLE ==== -->
    
              <strong><label for="signature-travel-1-sub_title" class="signature-travel-1-sub_title"><?php _e( 'Section &#35;1 Sub Title', 'the-fly-shop' );?></label></strong><br>
              <input style="width:50%;" type="text" name="signature-travel-1-sub_title" id="signature-travel-1-sub_title" value="<?php if ( isset ( $signature_travel_stored_meta['signature-travel-1-sub_title'] ) ) echo $signature_travel_stored_meta['signature-travel-1-sub_title'][0];?>" />
  
            </p>
  
            <p> <!-- ==== SECTION #1 SUB TITLE CAPTION ==== -->
    
              <strong><label for="signature-travel-1-caption" class="signature-travel-1-caption"><?php _e( 'Section &#35;1 Sub Title Caption', 'the-fly-shop' );?></label></strong><br>
              <textarea style="width: 100%;" rows="4" name="signature-travel-1-caption" id="signature-travel-1-caption"><?php if ( isset ( $signature_travel_stored_meta['signature-travel-1-caption'] ) ) echo $signature_travel_stored_meta['signature-travel-1-caption'][0]; ?></textarea>
  
            </p>
          
          </div> <!-- /#sectionsimage1 -->
          
          
          <!-- ==== SECTION #2 ==== -->
          <div role="tabpanel" class="tab-pane fade in" id="sectionsimage2">
            
            <p> <!-- ==== SECTION #2 TITLE ==== -->
              
              <strong><label for="signature-travel-section-2-title" class="signature-travel-section-2-title"><?php _e( 'Section &#35;2 Title', 'the-fly-shop' );?></label></strong><br>
              <input style="width:50%;" type="text" name="signature-travel-section-2-title" id="signature-travel-section-2-title" value="<?php if ( isset ( $signature_travel_stored_meta['signature-travel-section-2-title'] ) ) echo $signature_travel_stored_meta['signature-travel-section-2-title'][0];?>" />
            
            </p>
  
            <p> <!-- ==== SECTION #2 TITLE LINK ==== -->
    
              <strong><label for="signature-travel-section-2-title-link" class="signature-travel-section-2-title-link"><?php _e( 'Section &#35;2 Title Link', 'the-fly-shop' );?></label></strong><br>
              <input style="width:50%;" type="url" name="signature-travel-section-2-title-link" id="signature-travel-section-2-title-link" value="<?php if ( isset ( $signature_travel_stored_meta['signature-travel-section-2-title-link'] ) ) echo $signature_travel_stored_meta['signature-travel-section-2-title-link'][0];?>" />
  
            </p>
            
            <p> <!-- ==== SECTION #2 IMAGE ==== -->
              
              <label for="signature-travel-2-image" class="signature-travel-2-image"><?php _e( '<strong>Section &#35;2 Image</strong>', 'the-fly-shop' );?></label><br>
              <input type="text" style="width: 75%;" name="signature-travel-2-image" id="signature-travel-2-image" value="<?php if ( isset ( $signature_travel_stored_meta['signature-travel-2-image'] ) ) echo $signature_travel_stored_meta['signature-travel-2-image'][0];?>" /><br><br>
              <input type="button" id="signature-travel-2-image-button" class="button" value="<?php _e( 'Choose or Upload an Image', 'the-fly-shop' );?>" />
            
            </p>
  
            <p> <!-- ==== SECTION #2 SUB TITLE ==== -->
    
              <strong><label for="signature-travel-2-sub-title" class="signature-travel-2-sub-title"><?php _e( 'Section &#35;2 Title', 'the-fly-shop' );?></label></strong><br>
              <input style="width:50%;" type="text" name="signature-travel-2-sub-title" id="signature-travel-2-sub-title" value="<?php if ( isset ( $signature_travel_stored_meta['signature-travel-2-sub-title'] ) ) echo $signature_travel_stored_meta['signature-travel-2-sub-title'][0];?>" />
  
            </p>
  
            <p> <!-- ==== SECTION #2 TEXT AREA ==== -->
    
              <strong><label for="signature-travel-2-caption" class="signature-travel-2-caption"><?php _e( 'Section &#35;2 Caption', 'the-fly-shop' )?></label></strong>
    
              <textarea style="width: 100%;" rows="4" name="signature-travel-2-caption" id="signature-travel-2-caption"><?php if ( isset ( $signature_travel_stored_meta['signature-travel-2-caption'] ) ) echo $signature_travel_stored_meta['signature-travel-2-caption'][0]; ?></textarea>
  
            </p>
          
          </div> <!-- /#sectionsimages2 -->
          
          
          
          <!-- ==== SECTION #3 ==== -->
          <div role="tabpanel" class="tab-pane fade in" id="sectionsimage3">
            
            <p> <!-- ==== SECTION #3 TITLE ==== -->
              
              <strong><label for="signature-travel-section-3-title" class="signature-travel-section-3-title"><?php _e( 'Section &#35;3 Title', 'the-fly-shop' );?></label></strong><br>
              <input style="width:50%;" type="text" name="signature-travel-section-3-title" id="signature-travel-section-3-title" value="<?php if ( isset ( $signature_travel_stored_meta['signature-travel-section-3-title'] ) ) echo $signature_travel_stored_meta['signature-travel-section-3-title'][0];?>" />
            
            </p>
            
            <p> <!-- ==== SECTION #3 TITLE LINK ==== -->
    
              <strong><label for="signature-travel-section-3-title-link" class="signature-travel-section-3-title-link"><?php _e( 'Section &#35;3 Title Link', 'the-fly-shop' );?></label></strong><br>
              <input style="width:50%;" type="url" name="signature-travel-section-3-title-link" id="signature-travel-section-3-title-link" value="<?php if ( isset ( $signature_travel_stored_meta['signature-travel-section-3-title-link'] ) ) echo $signature_travel_stored_meta['signature-travel-section-3-title-link'][0];?>" />
  
            </p>
            
            <p> <!-- ==== SECTION #3 IMAGE ==== -->
              
              <label for="signature-travel-3-image" class="signature-travel-3-image"><?php _e( '<strong>Section &#35;3 Image</strong>', 'the-fly-shop' );?></label><br>
              <input type="text" style="width: 75%;" name="signature-travel-3-image" id="signature-travel-3-image" value="<?php if ( isset ( $signature_travel_stored_meta['signature-travel-3-image'] ) ) echo $signature_travel_stored_meta['signature-travel-3-image'][0];?>" /><br><br>
              <input type="button" id="signature-travel-3-image-button" class="button" value="<?php _e( 'Choose or Upload an Image', 'the-fly-shop' );?>" />
            
            </p>
            
            <p> <!-- ==== SECTION #3 SUB TITLE ==== -->
    
              <strong><label for="signature-travel-3-sub-title" class="signature-travel-3-sub-title"><?php _e( 'Section &#35;3 Sub Title', 'the-fly-shop' );?></label></strong><br>
              <input style="width:50%;" type="text" name="signature-travel-3-sub-title" id="signature-travel-3-sub-title" value="<?php if ( isset ( $signature_travel_stored_meta['signature-travel-3-sub-title'] ) ) echo $signature_travel_stored_meta['signature-travel-3-sub-title'][0];?>" />
  
            </p>
  
            <p> <!-- ==== SECTION #3 CAPTION ==== -->
    
              <strong><label for="signature-travel-3-caption" class="signature-travel-3-caption"><?php _e( 'Section &#35;3 Caption', 'the-fly-shop' )?></label></strong>
    
              <textarea style="width: 100%;" rows="4" name="signature-travel-3-caption" id="signature-travel-3-caption"><?php if ( isset ( $signature_travel_stored_meta['signature-travel-3-caption'] ) ) echo $signature_travel_stored_meta['signature-travel-3-caption'][0]; ?></textarea>
  
            </p>
          
          </div> <!-- /#sectionsimages3 -->
          
          <!-- ==== SECTION #4 ==== -->
          <div role="tabpanel" class="tab-pane fade in" id="sectionsimage4">
            
            <p> <!-- ==== SECTION #4 TITLE ==== -->
              
              <strong><label for="signature-travel-section-4-title" class="signature-travel-section-4-title"><?php _e( 'Section &#35;4 Title', 'the-fly-shop' );?></label></strong><br>
              <input style="width:50%;" type="text" name="signature-travel-section-4-title" id="signature-travel-section-4-title" value="<?php if ( isset ( $signature_travel_stored_meta['signature-travel-section-4-title'] ) ) echo $signature_travel_stored_meta['signature-travel-section-4-title'][0];?>" />
            
            </p>
            
            <p> <!-- ==== SECTION #4 TITLE LINK ==== -->
    
              <strong><label for="signature-travel-section-4-title-link" class="signature-travel-section-4-title-link"><?php _e( 'Section &#35;4 Title Link', 'the-fly-shop' );?></label></strong><br>
              <input style="width:50%;" type="url" name="signature-travel-section-4-title-link" id="signature-travel-section-4-title-link" value="<?php if ( isset ( $signature_travel_stored_meta['signature-travel-section-4-title-link'] ) ) echo $signature_travel_stored_meta['signature-travel-section-4-title-link'][0];?>" />
  
            </p>
            
            <p> <!-- ==== SECTION #4 IMAGE ==== -->
              
              <label for="signature-travel-4-image" class="signature-travel-4-image"><?php _e( '<strong>Section &#35;4 Image</strong>', 'the-fly-shop' );?></label><br>
              <input type="text" style="width: 75%;" name="signature-travel-4-image" id="signature-travel-4-image" value="<?php if ( isset ( $signature_travel_stored_meta['signature-travel-4-image'] ) ) echo $signature_travel_stored_meta['signature-travel-4-image'][0];?>" /><br><br>
              <input type="button" id="signature-travel-4-image-button" class="button" value="<?php _e( 'Choose or Upload an Image', 'the-fly-shop' );?>" />
            
            </p>
  
            <p> <!-- ==== SECTION #4 SUB TITLE ==== -->
    
              <strong><label for="signature-travel-4-sub-title" class="signature-travel-4-sub-title"><?php _e( 'Section &#35;4 Sub Title', 'the-fly-shop' );?></label></strong><br>
              <input style="width:50%;" type="text" name="signature-travel-4-sub-title" id="signature-travel-4-sub-title" value="<?php if ( isset ( $signature_travel_stored_meta['signature-travel-4-sub-title'] ) ) echo $signature_travel_stored_meta['signature-travel-4-sub-title'][0];?>" />
  
            </p>
            
            <p> <!-- ==== SECTION #4 CAPTION ==== -->
    
              <strong><label for="signature-travel-4-caption" class="signature-travel-4-caption"><?php _e( 'Section &#35;4 Caption', 'the-fly-shop' )?></label></strong>
              <textarea style="width: 100%;" rows="4" name="signature-travel-4-caption" id="signature-travel-4-caption"><?php if ( isset ( $signature_travel_stored_meta['signature-travel-4-caption'] ) ) echo $signature_travel_stored_meta['signature-travel-4-caption'][0]; ?></textarea>
  
            </p>
          
          </div> <!-- /#sectionsimages4 -->
          
          <!-- ==== SECTION #5 ==== -->
          <div role="tabpanel" class="tab-pane fade in" id="sectionsimage5">
            
            <p> <!-- ==== SECTION #5 TITLE ==== -->
              
              <strong><label for="signature-travel-section-5-title" class="signature-travel-section-5-title"><?php _e( 'Section &#35;5 Title', 'the-fly-shop' );?></label></strong><br>
              <input style="width:50%;" type="text" name="signature-travel-section-5-title" id="signature-travel-section-5-title" value="<?php if ( isset ( $signature_travel_stored_meta['signature-travel-section-5-title'] ) ) echo $signature_travel_stored_meta['signature-travel-section-5-title'][0];?>" />
            
            </p>
  
            <p> <!-- ==== SECTION #5 TITLE LINK ==== -->
    
              <strong><label for="signature-travel-section-5-title-link" class="signature-travel-section-5-title-link"><?php _e( 'Section &#35;5 Title Link', 'the-fly-shop' );?></label></strong><br>
              <input style="width:50%;" type="url" name="signature-travel-section-5-title-link" id="signature-travel-section-5-title-link" value="<?php if ( isset ( $signature_travel_stored_meta['signature-travel-section-5-title-link'] ) ) echo $signature_travel_stored_meta['signature-travel-section-5-title-link'][0];?>" />
  
            </p>
            
            <p> <!-- ==== SECTION #5 IMAGE ==== -->
              
              <label for="signature-travel-5-image" class="signature-travel-5-image"><?php _e( '<strong>Section &#35;5 Image</strong>', 'the-fly-shop' );?></label><br>
              <input type="text" style="width: 75%;" name="signature-travel-5-image" id="signature-travel-5-image" value="<?php if ( isset ( $signature_travel_stored_meta['signature-travel-5-image'] ) ) echo $signature_travel_stored_meta['signature-travel-5-image'][0];?>" /><br><br>
              <input type="button" id="signature-travel-5-image-button" class="button" value="<?php _e( 'Choose or Upload an Image', 'the-fly-shop' );?>" />
            
            </p>
  
            <p> <!-- ==== SECTION #5 SUB TITLE ==== -->
    
              <strong><label for="signature-travel-5-sub-title" class="signature-travel-5-sub-title"><?php _e( 'Section &#35;5 Sub Title', 'the-fly-shop' );?></label></strong><br>
              <input style="width:50%;" type="text" name="signature-travel-5-sub-title" id="signature-travel-5-sub-title" value="<?php if ( isset ( $signature_travel_stored_meta['signature-travel-5-sub-title'] ) ) echo $signature_travel_stored_meta['signature-travel-5-sub-title'][0];?>" />
  
            </p>
  
            <p> <!-- ==== SECTION #5 CAPTION ==== -->
    
              <strong><label for="signature-travel-5-caption" class="signature-travel-5-caption"><?php _e( 'Section &#35;5 Caption', 'the-fly-shop' )?></label></strong>
              <textarea style="width: 100%;" rows="4" name="signature-travel-5-caption" id="signature-travel-5-caption"><?php if ( isset ( $signature_travel_stored_meta['signature-travel-5-caption'] ) ) echo $signature_travel_stored_meta['signature-travel-5-caption'][0]; ?></textarea>
  
            </p>
          
          </div> <!-- /#sectionsimages5 -->
          
          <!-- ==== SECTION #6 ==== -->
          <div role="tabpanel" class="tab-pane fade in" id="sectionsimage6">
            
            <p> <!-- ==== SECTION #6 TITLE ==== -->
              
              <strong><label for="signature-travel-section-6-title" class="signature-travel-section-6-title"><?php _e( 'Section &#35;6 Title', 'the-fly-shop' );?></label></strong><br>
              <input style="width:50%;" type="text" name="signature-travel-section-6-title" id="signature-travel-section-6-title" value="<?php if ( isset ( $signature_travel_stored_meta['signature-travel-section-6-title'] ) ) echo $signature_travel_stored_meta['signature-travel-section-6-title'][0];?>" />
            
            </p>
  
            <p> <!-- ==== SECTION #6 TITLE LINK ==== -->
    
              <strong><label for="signature-travel-section-6-title-link" class="signature-travel-section-6-title-link"><?php _e( 'Section &#35;6 Title Link', 'the-fly-shop' );?></label></strong><br>
              <input style="width:50%;" type="url" name="signature-travel-section-6-title-link" id="signature-travel-section-6-title-link" value="<?php if ( isset ( $signature_travel_stored_meta['signature-travel-section-6-title-link'] ) ) echo $signature_travel_stored_meta['signature-travel-section-6-title-link'][0];?>" />
  
            </p>
            
            <p> <!-- ==== SECTION #6 IMAGE ==== -->
              
              <label for="signature-travel-6-image" class="signature-travel-6-image"><?php _e( '<strong>Section &#35;6 Image</strong>', 'the-fly-shop' );?></label><br>
              <input type="text" style="width: 75%;" name="signature-travel-6-image" id="signature-travel-6-image" value="<?php if ( isset ( $signature_travel_stored_meta['signature-travel-6-image'] ) ) echo $signature_travel_stored_meta['signature-travel-6-image'][0];?>" /><br><br>
              <input type="button" id="signature-travel-6-image-button" class="button" value="<?php _e( 'Choose or Upload an Image', 'the-fly-shop' );?>" />
            
            </p>
  
            <p> <!-- ==== SECTION #6 SUB TITLE ==== -->
    
              <strong><label for="signature-travel-6-sub-title" class="signature-travel-6-sub-title"><?php _e( 'Section &#35;6 Sub Title', 'the-fly-shop' );?></label></strong><br>
              <input style="width:50%;" type="text" name="signature-travel-6-sub-title" id="signature-travel-6-sub-title" value="<?php if ( isset ( $signature_travel_stored_meta['signature-travel-6-sub-title'] ) ) echo $signature_travel_stored_meta['signature-travel-6-sub-title'][0];?>" />
  
            </p>
  
            <p> <!-- ==== SECTION #6 CAPTION ==== -->
    
              <strong><label for="signature-travel-6-caption" class="signature-travel-6-caption"><?php _e( 'Section &#35;6 Caption', 'the-fly-shop' )?></label></strong>
              <textarea style="width: 100%;" rows="4" name="signature-travel-6-caption" id="signature-travel-6-caption"><?php if ( isset ( $signature_travel_stored_meta['signature-travel-6-caption'] ) ) echo $signature_travel_stored_meta['signature-travel-6-caption'][0]; ?></textarea>
  
            </p>
            
          
          </div> <!-- /#sectionsimages6 -->
          
          <!-- ==== SECTION #7 ==== -->
          <div role="tabpanel" class="tab-pane fade in" id="sectionsimage7">
            
            <p> <!-- ==== SECTION #7 TITLE ==== -->
              
              <strong><label for="signature-travel-section-7-title" class="signature-travel-section-7-title"><?php _e( 'Section &#35;7 Title', 'the-fly-shop' );?></label></strong><br>
              <input style="width:50%;" type="text" name="signature-travel-section-7-title" id="signature-travel-section-7-title" value="<?php if ( isset ( $signature_travel_stored_meta['signature-travel-section-7-title'] ) ) echo $signature_travel_stored_meta['signature-travel-section-7-title'][0];?>" />
            
            </p>
  
            <p> <!-- ==== SECTION #7 TITLE LINK ==== -->
    
              <strong><label for="signature-travel-section-7-title-link" class="signature-travel-section-7-title-link"><?php _e( 'Section &#35;7 Title Link', 'the-fly-shop' );?></label></strong><br>
              <input style="width:50%;" type="url" name="signature-travel-section-7-title-link" id="signature-travel-section-7-title-link" value="<?php if ( isset ( $signature_travel_stored_meta['signature-travel-section-7-title-link'] ) ) echo $signature_travel_stored_meta['signature-travel-section-7-title-link'][0];?>" />
  
            </p>
            
            <p> <!-- ==== SECTION #7 IMAGE ==== -->
              
              <label for="signature-travel-7-image" class="signature-travel-7-image"><?php _e( '<strong>Section &#35;7 Image</strong>', 'the-fly-shop' );?></label><br>
              <input type="text" style="width: 75%;" name="signature-travel-7-image" id="signature-travel-7-image" value="<?php if ( isset ( $signature_travel_stored_meta['signature-travel-7-image'] ) ) echo $signature_travel_stored_meta['signature-travel-7-image'][0];?>" /><br><br>
              <input type="button" id="signature-travel-7-image-button" class="button" value="<?php _e( 'Choose or Upload an Image', 'the-fly-shop' );?>" />
            
            </p>
  
            <p> <!-- ==== SECTION #7 SUB TITLE ==== -->
    
              <strong><label for="signature-travel-7-sub-title" class="signature-travel-7-sub-title"><?php _e( 'Section &#35;7 Sub Title', 'the-fly-shop' );?></label></strong><br>
              <input style="width:50%;" type="text" name="signature-travel-7-sub-title" id="signature-travel-7-sub-title" value="<?php if ( isset ( $signature_travel_stored_meta['signature-travel-7-sub-title'] ) ) echo $signature_travel_stored_meta['signature-travel-7-sub-title'][0];?>" />
  
            </p>
  
            <p> <!-- ==== SECTION #7 CAPTION ==== -->
    
              <strong><label for="signature-travel-7-caption" class="signature-travel-7-caption"><?php _e( 'Section &#35;7 Caption', 'the-fly-shop' )?></label></strong>
              <textarea style="width: 100%;" rows="4" name="signature-travel-7-caption" id="signature-travel-7-caption"><?php if ( isset ( $signature_travel_stored_meta['signature-travel-7-caption'] ) ) echo $signature_travel_stored_meta['signature-travel-7-caption'][0]; ?></textarea>
  
            </p>
          
          </div> <!-- /#sectionsimages7 -->
          
          <!-- ==== SECTION #8 ==== -->
          <div role="tabpanel" class="tab-pane fade in" id="sectionsimage8">
            
            <p> <!-- ==== SECTION #8 TITLE ==== -->
              
              <strong><label for="signature-travel-section-8-title" class="signature-travel-section-8-title"><?php _e( 'Section &#35;8 Title', 'the-fly-shop' );?></label></strong><br>
              <input style="width:50%;" type="text" name="signature-travel-section-8-title" id="signature-travel-section-8-title" value="<?php if ( isset ( $signature_travel_stored_meta['signature-travel-section-8-title'] ) ) echo $signature_travel_stored_meta['signature-travel-section-8-title'][0];?>" />
            
            </p>
  
            <p> <!-- ==== SECTION #8 TITLE LINK ==== -->
    
              <strong><label for="signature-travel-section-8-title-link" class="signature-travel-section-8-title-link"><?php _e( 'Section &#35;8 Title Link', 'the-fly-shop' );?></label></strong><br>
              <input style="width:50%;" type="url" name="signature-travel-section-8-title-link" id="signature-travel-section-8-title-link" value="<?php if ( isset ( $signature_travel_stored_meta['signature-travel-section-8-title-link'] ) ) echo $signature_travel_stored_meta['signature-travel-section-8-title-link'][0];?>" />
  
            </p>
            
            <p> <!-- ==== SECTION #8 IMAGE ==== -->
              
              <label for="signature-travel-8-image" class="signature-travel-8-image"><?php _e( '<strong>Section &#35;8 Image</strong>', 'the-fly-shop' );?></label><br>
              <input type="text" style="width: 75%;" name="signature-travel-8-image" id="signature-travel-8-image" value="<?php if ( isset ( $signature_travel_stored_meta['signature-travel-8-image'] ) ) echo $signature_travel_stored_meta['signature-travel-8-image'][0];?>" /><br><br>
              <input type="button" id="signature-travel-8-image-button" class="button" value="<?php _e( 'Choose or Upload an Image', 'the-fly-shop' );?>" />
            
            </p>
  
            <p> <!-- ==== SECTION #8 SUB TITLE ==== -->
    
              <strong><label for="signature-travel-8-sub-title" class="signature-travel-8-sub-title"><?php _e( 'Section &#35;8 Sub Title', 'the-fly-shop' );?></label></strong><br>
              <input style="width:50%;" type="text" name="signature-travel-8-sub-title" id="signature-travel-8-sub-title" value="<?php if ( isset ( $signature_travel_stored_meta['signature-travel-8-sub-title'] ) ) echo $signature_travel_stored_meta['signature-travel-8-sub-title'][0];?>" />
  
            </p>
  
            <p> <!-- ==== SECTION #8 CAPTION ==== -->
    
              <strong><label for="signature-travel-8-caption" class="signature-travel-8-caption"><?php _e( 'Section &#35;8 Caption', 'the-fly-shop' )?></label></strong>
    
              <textarea style="width: 100%;" rows="4" name="signature-travel-8-caption" id="signature-travel-8-caption"><?php if ( isset ( $signature_travel_stored_meta['signature-travel-8-caption'] ) ) echo $signature_travel_stored_meta['signature-travel-8-caption'][0]; ?></textarea>
  
            </p>
          
          </div> <!-- /#sectionsimages8 -->
          
          <!-- ==== SECTION #9 ==== -->
          <div role="tabpanel" class="tab-pane fade in" id="sectionsimage9">
            
            <p> <!-- ==== SECTION #9 TITLE ==== -->
              
              <strong><label for="signature-travel-section-9-title" class="signature-travel-section-9-title"><?php _e( 'Section &#35;9 Title', 'the-fly-shop' );?></label></strong><br>
              <input style="width:50%;" type="text" name="signature-travel-section-9-title" id="signature-travel-section-9-title" value="<?php if ( isset ( $signature_travel_stored_meta['signature-travel-section-9-title'] ) ) echo $signature_travel_stored_meta['signature-travel-section-9-title'][0];?>" />
            
            </p>
  
            <p> <!-- ==== SECTION #9 TITLE LINK ==== -->
    
              <strong><label for="signature-travel-section-9-title-link" class="signature-travel-section-9-title-link"><?php _e( 'Section &#35;9 Title Link', 'the-fly-shop' );?></label></strong><br>
              <input style="width:50%;" type="text" name="signature-travel-section-9-title-link" id="signature-travel-section-9-title-link" value="<?php if ( isset ( $signature_travel_stored_meta['signature-travel-section-9-title-link'] ) ) echo $signature_travel_stored_meta['signature-travel-section-9-title-link'][0];?>" />
  
            </p>
            
            <p> <!-- ==== SECTION #9 IMAGE ==== -->
              
              <label for="signature-travel-9-image" class="signature-travel-9-image"><?php _e( '<strong>Section &#35;9 Image</strong>', 'the-fly-shop' );?></label><br>
              <input type="text" style="width: 75%;" name="signature-travel-9-image" id="signature-travel-9-image" value="<?php if ( isset ( $signature_travel_stored_meta['signature-travel-9-image'] ) ) echo $signature_travel_stored_meta['signature-travel-9-image'][0];?>" /><br><br>
              <input type="button" id="signature-travel-9-image-button" class="button" value="<?php _e( 'Choose or Upload an Image', 'the-fly-shop' );?>" />
            
            </p>
  
            <p> <!-- ==== SECTION #9 SUB TITLE ==== -->
    
              <strong><label for="signature-travel-9-sub-title" class="signature-travel-9-sub-title"><?php _e( 'Section &#35;9 Title', 'the-fly-shop' );?></label></strong><br>
              <input style="width:50%;" type="text" name="signature-travel-9-sub-title" id="signature-travel-9-sub-title" value="<?php if ( isset ( $signature_travel_stored_meta['signature-travel-9-sub-title'] ) ) echo $signature_travel_stored_meta['signature-travel-9-sub-title'][0];?>" />
  
            </p>
  
            <p> <!-- ==== SECTION #9 CAPTION ==== -->
    
              <strong><label for="signature-travel-9-caption" class="signature-travel-9-caption"><?php _e( 'Section &#35;9 Text Area', 'the-fly-shop' )?></label></strong>
              <textarea style="width: 100%;" rows="4" name="signature-travel-9-caption" id="signature-travel-9-caption"><?php if ( isset ( $signature_travel_stored_meta['signature-travel-9-caption'] ) ) echo $signature_travel_stored_meta['signature-travel-9-caption'][0]; ?></textarea>
  
            </p>
          
          </div> <!-- /#sectionsimages9 -->
          
          <!-- ==== SECTION #10 ==== -->
          <div role="tabpanel" class="tab-pane fade in" id="sectionsimage10">
            
            <p> <!-- ==== SECTION #10 TITLE ==== -->
              
              <strong><label for="signature-travel-section-10-title" class="signature-travel-section-10-title"><?php _e( 'Section &#35;10 Title', 'the-fly-shop' );?></label></strong><br>
              <input style="width:50%;" type="text" name="signature-travel-section-10-title" id="signature-travel-section-10-title" value="<?php if ( isset ( $signature_travel_stored_meta['signature-travel-section-10-title'] ) ) echo $signature_travel_stored_meta['signature-travel-section-10-title'][0];?>" />
            
            </p>
  
            <p> <!-- ==== SECTION #10 TITLE LINK ==== -->
    
              <strong><label for="signature-travel-section-10-title-link" class="signature-travel-section-10-title-link"><?php _e( 'Section &#35;10 Title Link', 'the-fly-shop' );?></label></strong><br>
              <input style="width:50%;" type="url" name="signature-travel-section-10-title-link" id="signature-travel-section-10-title-link" value="<?php if ( isset ( $signature_travel_stored_meta['signature-travel-section-10-title-link'] ) ) echo $signature_travel_stored_meta['signature-travel-section-10-title-link'][0];?>" />
  
            </p>
            
            <p> <!-- ==== SECTION #10 IMAGE ==== -->
              
              <label for="signature-travel-10-image" class="signature-travel-10-image"><?php _e( '<strong>Section &#35;10 Image</strong>', 'the-fly-shop' );?></label><br>
              <input type="text" style="width: 75%;" name="signature-travel-10-image" id="signature-travel-10-image" value="<?php if ( isset ( $signature_travel_stored_meta['signature-travel-10-image'] ) ) echo $signature_travel_stored_meta['signature-travel-10-image'][0];?>" /><br><br>
              <input type="button" id="signature-travel-10-image-button" class="button" value="<?php _e( 'Choose or Upload an Image', 'the-fly-shop' );?>" />
            
            </p>
  
            <p> <!-- ==== SECTION #10 SUB TITLE ==== -->
    
              <strong><label for="signature-travel-10-sub-title" class="signature-travel-10-sub-title"><?php _e( 'Section &#35;10 Sub Title', 'the-fly-shop' );?></label></strong><br>
              <input style="width:50%;" type="text" name="signature-travel-10-sub-title" id="signature-travel-10-sub-title" value="<?php if ( isset ( $signature_travel_stored_meta['signature-travel-10-sub-title'] ) ) echo $signature_travel_stored_meta['signature-travel-10-sub-title'][0];?>" />
  
            </p>
  
            <p> <!-- ==== SECTION #10 CAPTION ==== -->
    
              <strong><label for="signature-travel-10-caption" class="signature-travel-10-caption"><?php _e( 'Section &#35;10 Caption', 'the-fly-shop' )?></label></strong>
              <textarea style="width: 100%;" rows="4" name="signature-travel-10-caption" id="signature-travel-10-caption"><?php if ( isset ( $signature_travel_stored_meta['signature-travel-10-caption'] ) ) echo $signature_travel_stored_meta['signature-travel-10-caption'][0]; ?></textarea>
  
            </p>
          
          </div> <!-- /#sectionsimages10 -->
        
        </div> <!-- /.tab-content -->
      </div> <!-- /.pnael-body boof -->
    </div> <!-- /.pnael-heading -->
  </div> <!-- /.panel-default -->
  
  <div class="panel with-nav-tabs panel-default">
    <div class="panel-heading">
  
      <ul class="nav nav-tabs" role="tablist">
        <li role="presentation" class="active"><a href="#sectionsimage11" aria-controls="sectionsimage11" role="tab" data-toggle="tab">Section &#35;11</a></li>
        <li role="presentation"><a href="#sectionsimage12" aria-controls="sectionsimage12" role="tab" data-toggle="tab">Section &#35;12</a></li>
        <li role="presentation"><a href="#sectionsimage13" aria-controls="sectionsimage13" role="tab" data-toggle="tab">Section &#35;13</a></li>
        <li role="presentation"><a href="#sectionsimage14" aria-controls="sectionsimage14" role="tab" data-toggle="tab">Section &#35;14</a></li>
        <li role="presentation"><a href="#sectionsimage15" aria-controls="sectionsimage15" role="tab" data-toggle="tab">Section &#35;15</a></li>
        <li role="presentation"><a href="#sectionsimage16" aria-controls="sectionsimage16" role="tab" data-toggle="tab">Section &#35;16</a></li>
        <li role="presentation"><a href="#sectionsimage17" aria-controls="sectionsimage17" role="tab" data-toggle="tab">Section &#35;17</a></li>
        <li role="presentation"><a href="#sectionsimage18" aria-controls="sectionsimage18" role="tab" data-toggle="tab">Section &#35;18</a></li>
        <li role="presentation"><a href="#sectionsimage19" aria-controls="sectionsimage19" role="tab" data-toggle="tab">Section &#35;19</a></li>
        <li role="presentation"><a href="#sectionsimage20" aria-controls="sectionsimage20" role="tab" data-toggle="tab">Section &#35;20</a></li>
      </ul>
  
      <div class="panel-body boof">
        <div class="tab-content">
  
          <div role="tabpanel" class="tab-pane fade in active" id="sectionsimage11">
    
            <p> <!-- ==== SECTION #11 TITLE ==== -->
      
              <strong><label for="signature-travel-section-11-title" class="signature-travel-section-11-title"><?php _e( 'Section &#35;11 Title', 'the-fly-shop' );?></label></strong><br>
              <input style="width:50%;" type="text" name="signature-travel-section-11-title" id="signature-travel-section-11-title" value="<?php if ( isset ( $signature_travel_stored_meta['signature-travel-section-11-title'] ) ) echo $signature_travel_stored_meta['signature-travel-section-11-title'][0];?>" />
    
            </p>
    
            <p> <!-- ==== SECTION #11 TITLE LINK ==== -->
      
              <strong><label for="signature-travel-section-11-title-link" class="signature-travel-section-11-title-link"><?php _e( 'Section &#35;11 Title Link', 'the-fly-shop' );?></label></strong><br>
              <input style="width:50%;" type="url" name="signature-travel-section-11-title-link" id="signature-travel-section-11-title-link" value="<?php if ( isset ( $signature_travel_stored_meta['signature-travel-section-11-title-link'] ) ) echo $signature_travel_stored_meta['signature-travel-section-11-title-link'][0];?>" />
    
            </p>
    
            <p> <!-- ==== SECTION #11 IMAGE ==== -->
      
              <label for="signature-travel-11-image" class="signature-travel-11-image"><?php _e( '<strong>Section &#35;11 Image</strong>', 'the-fly-shop' );?></label><br>
              <input type="text" style="width: 75%;" name="signature-travel-11-image" id="signature-travel-11-image" value="<?php if ( isset ( $signature_travel_stored_meta['signature-travel-11-image'] ) ) echo $signature_travel_stored_meta['signature-travel-11-image'][0];?>" /><br><br>
              <input type="button" id="signature-travel-11-image-button" class="button" value="<?php _e( 'Choose or Upload an Image', 'the-fly-shop' );?>" />
    
            </p>
    
            <p> <!-- ==== SECTION #11 SUB TITLE ==== -->
      
              <strong><label for="signature-travel-11-sub-title" class="signature-travel-11-sub-title"><?php _e( 'Section &#35;11 Sub Title', 'the-fly-shop' );?></label></strong><br>
              <input style="width:50%;" type="text" name="signature-travel-11-sub-title" id="signature-travel-11-sub-title" value="<?php if ( isset ( $signature_travel_stored_meta['signature-travel-11-sub-title'] ) ) echo $signature_travel_stored_meta['signature-travel-11-sub-title'][0];?>" />
    
            </p>
    
            <p> <!-- ==== SECTION #11 SUB TITLE CAPTION ==== -->
      
              <strong><label for="signature-travel-11-caption" class="signature-travel-11-caption"><?php _e( 'Section &#35;11 Sub Title Caption', 'the-fly-shop' );?></label></strong><br>
              <textarea style="width: 100%;" rows="4" name="signature-travel-11-caption" id="signature-travel-11-caption"><?php if ( isset ( $signature_travel_stored_meta['signature-travel-11-caption'] ) ) echo $signature_travel_stored_meta['signature-travel-11-caption'][0]; ?></textarea>
    
            </p>
  
          </div>
  
          <div role="tabpanel" class="tab-pane fade in" id="sectionsimage12">
    
            <p> <!-- ==== SECTION #12 TITLE ==== -->
      
              <strong><label for="signature-travel-section-12-title" class="signature-travel-section-12-title"><?php _e( 'Section &#35;12 Title', 'the-fly-shop' );?></label></strong><br>
              <input style="width:50%;" type="text" name="signature-travel-section-12-title" id="signature-travel-section-12-title" value="<?php if ( isset ( $signature_travel_stored_meta['signature-travel-section-12-title'] ) ) echo $signature_travel_stored_meta['signature-travel-section-12-title'][0];?>" />
    
            </p>
    
            <p> <!-- ==== SECTION #12 TITLE LINK ==== -->
      
              <strong><label for="signature-travel-section-12-title-link" class="signature-travel-section-12-title-link"><?php _e( 'Section &#35;12 Title Link', 'the-fly-shop' );?></label></strong><br>
              <input style="width:50%;" type="url" name="signature-travel-section-12-title-link" id="signature-travel-section-12-title-link" value="<?php if ( isset ( $signature_travel_stored_meta['signature-travel-section-12-title-link'] ) ) echo $signature_travel_stored_meta['signature-travel-section-12-title-link'][0];?>" />
    
            </p>
    
            <p> <!-- ==== SECTION #12 IMAGE ==== -->
      
              <label for="signature-travel-12-image" class="signature-travel-12-image"><?php _e( '<strong>Section &#35;12 Image</strong>', 'the-fly-shop' );?></label><br>
              <input type="text" style="width: 75%;" name="signature-travel-12-image" id="signature-travel-12-image" value="<?php if ( isset ( $signature_travel_stored_meta['signature-travel-12-image'] ) ) echo $signature_travel_stored_meta['signature-travel-12-image'][0];?>" /><br><br>
              <input type="button" id="signature-travel-12-image-button" class="button" value="<?php _e( 'Choose or Upload an Image', 'the-fly-shop' );?>" />
    
            </p>
    
            <p> <!-- ==== SECTION #12 SUB TITLE ==== -->
      
              <strong><label for="signature-travel-12-sub-title" class="signature-travel-12-sub-title"><?php _e( 'Section &#35;12 Sub Title', 'the-fly-shop' );?></label></strong><br>
              <input style="width:50%;" type="text" name="signature-travel-12-sub-title" id="signature-travel-12-sub-title" value="<?php if ( isset ( $signature_travel_stored_meta['signature-travel-12-sub-title'] ) ) echo $signature_travel_stored_meta['signature-travel-12-sub-title'][0];?>" />
    
            </p>
    
            <p> <!-- ==== SECTION #12 SUB TITLE CAPTION ==== -->
      
              <strong><label for="signature-travel-12-caption" class="signature-travel-12-caption"><?php _e( 'Section &#35;12 Sub Title Caption', 'the-fly-shop' );?></label></strong><br>
              <textarea style="width: 100%;" rows="4" name="signature-travel-12-caption" id="signature-travel-12-caption"><?php if ( isset ( $signature_travel_stored_meta['signature-travel-12-caption'] ) ) echo $signature_travel_stored_meta['signature-travel-12-caption'][0]; ?></textarea>
    
            </p>
  
          </div>
  
          <div role="tabpanel" class="tab-pane fade in" id="sectionsimage13">
    
            <p> <!-- ==== SECTION #13 TITLE ==== -->
      
              <strong><label for="signature-travel-section-13-title" class="signature-travel-section-13-title"><?php _e( 'Section &#35;13 Title', 'the-fly-shop' );?></label></strong><br>
              <input style="width:50%;" type="text" name="signature-travel-section-13-title" id="signature-travel-section-13-title" value="<?php if ( isset ( $signature_travel_stored_meta['signature-travel-section-13-title'] ) ) echo $signature_travel_stored_meta['signature-travel-section-13-title'][0];?>" />
    
            </p>
    
            <p> <!-- ==== SECTION #13 TITLE LINK ==== -->
      
              <strong><label for="signature-travel-section-13-title-link" class="signature-travel-section-13-title-link"><?php _e( 'Section &#35;13 Title Link', 'the-fly-shop' );?></label></strong><br>
              <input style="width:50%;" type="url" name="signature-travel-section-13-title-link" id="signature-travel-section-13-title-link" value="<?php if ( isset ( $signature_travel_stored_meta['signature-travel-section-13-title-link'] ) ) echo $signature_travel_stored_meta['signature-travel-section-13-title-link'][0];?>" />
    
            </p>
    
            <p> <!-- ==== SECTION #13 IMAGE ==== -->
      
              <label for="signature-travel-13-image" class="signature-travel-13-image"><?php _e( '<strong>Section &#35;13 Image</strong>', 'the-fly-shop' );?></label><br>
              <input type="text" style="width: 75%;" name="signature-travel-13-image" id="signature-travel-13-image" value="<?php if ( isset ( $signature_travel_stored_meta['signature-travel-13-image'] ) ) echo $signature_travel_stored_meta['signature-travel-13-image'][0];?>" /><br><br>
              <input type="button" id="signature-travel-13-image-button" class="button" value="<?php _e( 'Choose or Upload an Image', 'the-fly-shop' );?>" />
    
            </p>
    
            <p> <!-- ==== SECTION #13 SUB TITLE ==== -->
      
              <strong><label for="signature-travel-13-sub-title" class="signature-travel-13-sub-title"><?php _e( 'Section &#35;13 Sub Title', 'the-fly-shop' );?></label></strong><br>
              <input style="width:50%;" type="text" name="signature-travel-13-sub-title" id="signature-travel-13-sub-title" value="<?php if ( isset ( $signature_travel_stored_meta['signature-travel-13-sub-title'] ) ) echo $signature_travel_stored_meta['signature-travel-13-sub-title'][0];?>" />
    
            </p>
    
            <p> <!-- ==== SECTION #13 SUB TITLE CAPTION ==== -->
      
              <strong><label for="signature-travel-13-caption" class="signature-travel-13-caption"><?php _e( 'Section &#35;13 Sub Title Caption', 'the-fly-shop' );?></label></strong><br>
              <textarea style="width: 100%;" rows="4" name="signature-travel-13-caption" id="signature-travel-13-caption"><?php if ( isset ( $signature_travel_stored_meta['signature-travel-13-caption'] ) ) echo $signature_travel_stored_meta['signature-travel-13-caption'][0]; ?></textarea>
    
            </p>
  
          </div>
  
          <div role="tabpanel" class="tab-pane fade in" id="sectionsimage14">
    
            <p> <!-- ==== SECTION #14 TITLE ==== -->
      
              <strong><label for="signature-travel-section-14-title" class="signature-travel-section-14-title"><?php _e( 'Section &#35;14 Title', 'the-fly-shop' );?></label></strong><br>
              <input style="width:50%;" type="text" name="signature-travel-section-14-title" id="signature-travel-section-14-title" value="<?php if ( isset ( $signature_travel_stored_meta['signature-travel-section-14-title'] ) ) echo $signature_travel_stored_meta['signature-travel-section-14-title'][0];?>" />
    
            </p>
    
            <p> <!-- ==== SECTION #14 TITLE LINK ==== -->
      
              <strong><label for="signature-travel-section-14-title-link" class="signature-travel-section-14-title-link"><?php _e( 'Section &#35;14 Title Link', 'the-fly-shop' );?></label></strong><br>
              <input style="width:50%;" type="url" name="signature-travel-section-14-title-link" id="signature-travel-section-14-title-link" value="<?php if ( isset ( $signature_travel_stored_meta['signature-travel-section-14-title-link'] ) ) echo $signature_travel_stored_meta['signature-travel-section-14-title-link'][0];?>" />
    
            </p>
    
            <p> <!-- ==== SECTION #14 IMAGE ==== -->
      
              <label for="signature-travel-14-image" class="signature-travel-14-image"><?php _e( '<strong>Section &#35;14 Image</strong>', 'the-fly-shop' );?></label><br>
              <input type="text" style="width: 75%;" name="signature-travel-14-image" id="signature-travel-14-image" value="<?php if ( isset ( $signature_travel_stored_meta['signature-travel-14-image'] ) ) echo $signature_travel_stored_meta['signature-travel-14-image'][0];?>" /><br><br>
              <input type="button" id="signature-travel-14-image-button" class="button" value="<?php _e( 'Choose or Upload an Image', 'the-fly-shop' );?>" />
    
            </p>
    
            <p> <!-- ==== SECTION #14 SUB TITLE ==== -->
      
              <strong><label for="signature-travel-14-sub-title" class="signature-travel-14-sub-title"><?php _e( 'Section &#35;14 Sub Title', 'the-fly-shop' );?></label></strong><br>
              <input style="width:50%;" type="text" name="signature-travel-14-sub-title" id="signature-travel-14-sub-title" value="<?php if ( isset ( $signature_travel_stored_meta['signature-travel-14-sub-title'] ) ) echo $signature_travel_stored_meta['signature-travel-14-sub-title'][0];?>" />
    
            </p>
    
            <p> <!-- ==== SECTION #14 SUB TITLE CAPTION ==== -->
      
              <strong><label for="signature-travel-14-caption" class="signature-travel-14-caption"><?php _e( 'Section &#35;14 Sub Title Caption', 'the-fly-shop' );?></label></strong><br>
              <textarea style="width: 100%;" rows="4" name="signature-travel-14-caption" id="signature-travel-14-caption"><?php if ( isset ( $signature_travel_stored_meta['signature-travel-14-caption'] ) ) echo $signature_travel_stored_meta['signature-travel-14-caption'][0]; ?></textarea>
    
            </p>
  
          </div>
  
          <div role="tabpanel" class="tab-pane fade in" id="sectionsimage15">
    
            <p> <!-- ==== SECTION #15 TITLE ==== -->
      
              <strong><label for="signature-travel-section-15-title" class="signature-travel-section-15-title"><?php _e( 'Section &#35;15 Title', 'the-fly-shop' );?></label></strong><br>
              <input style="width:50%;" type="text" name="signature-travel-section-15-title" id="signature-travel-section-15-title" value="<?php if ( isset ( $signature_travel_stored_meta['signature-travel-section-15-title'] ) ) echo $signature_travel_stored_meta['signature-travel-section-15-title'][0];?>" />
    
            </p>
    
            <p> <!-- ==== SECTION #15 TITLE LINK ==== -->
      
              <strong><label for="signature-travel-section-15-title-link" class="signature-travel-section-15-title-link"><?php _e( 'Section &#35;15 Title Link', 'the-fly-shop' );?></label></strong><br>
              <input style="width:50%;" type="url" name="signature-travel-section-15-title-link" id="signature-travel-section-15-title-link" value="<?php if ( isset ( $signature_travel_stored_meta['signature-travel-section-15-title-link'] ) ) echo $signature_travel_stored_meta['signature-travel-section-15-title-link'][0];?>" />
    
            </p>
    
            <p> <!-- ==== SECTION #15 IMAGE ==== -->
      
              <label for="signature-travel-15-image" class="signature-travel-15-image"><?php _e( '<strong>Section &#35;15 Image</strong>', 'the-fly-shop' );?></label><br>
              <input type="text" style="width: 75%;" name="signature-travel-15-image" id="signature-travel-15-image" value="<?php if ( isset ( $signature_travel_stored_meta['signature-travel-15-image'] ) ) echo $signature_travel_stored_meta['signature-travel-15-image'][0];?>" /><br><br>
              <input type="button" id="signature-travel-15-image-button" class="button" value="<?php _e( 'Choose or Upload an Image', 'the-fly-shop' );?>" />
    
            </p>
    
            <p> <!-- ==== SECTION #15 SUB TITLE ==== -->
      
              <strong><label for="signature-travel-15-sub-title" class="signature-travel-15-sub-title"><?php _e( 'Section &#35;15 Sub Title', 'the-fly-shop' );?></label></strong><br>
              <input style="width:50%;" type="text" name="signature-travel-15-sub-title" id="signature-travel-15-sub-title" value="<?php if ( isset ( $signature_travel_stored_meta['signature-travel-15-sub-title'] ) ) echo $signature_travel_stored_meta['signature-travel-15-sub-title'][0];?>" />
    
            </p>
    
            <p> <!-- ==== SECTION #15 SUB TITLE CAPTION ==== -->
      
              <strong><label for="signature-travel-15-caption" class="signature-travel-15-caption"><?php _e( 'Section &#35;15 Sub Title Caption', 'the-fly-shop' );?></label></strong><br>
              <textarea style="width: 100%;" rows="4" name="signature-travel-15-caption" id="signature-travel-15-caption"><?php if ( isset ( $signature_travel_stored_meta['signature-travel-15-caption'] ) ) echo $signature_travel_stored_meta['signature-travel-15-caption'][0]; ?></textarea>
    
            </p>
  
          </div>
  
          <div role="tabpanel" class="tab-pane fade in" id="sectionsimage16">
    
            <p> <!-- ==== SECTION #16 TITLE ==== -->
      
              <strong><label for="signature-travel-section-16-title" class="signature-travel-section-16-title"><?php _e( 'Section &#35;16 Title', 'the-fly-shop' );?></label></strong><br>
              <input style="width:50%;" type="text" name="signature-travel-section-16-title" id="signature-travel-section-16-title" value="<?php if ( isset ( $signature_travel_stored_meta['signature-travel-section-16-title'] ) ) echo $signature_travel_stored_meta['signature-travel-section-16-title'][0];?>" />
    
            </p>
    
            <p> <!-- ==== SECTION #16 TITLE LINK ==== -->
      
              <strong><label for="signature-travel-section-16-title-link" class="signature-travel-section-16-title-link"><?php _e( 'Section &#35;16 Title Link', 'the-fly-shop' );?></label></strong><br>
              <input style="width:50%;" type="url" name="signature-travel-section-16-title-link" id="signature-travel-section-16-title-link" value="<?php if ( isset ( $signature_travel_stored_meta['signature-travel-section-16-title-link'] ) ) echo $signature_travel_stored_meta['signature-travel-section-16-title-link'][0];?>" />
    
            </p>
    
            <p> <!-- ==== SECTION #16 IMAGE ==== -->
      
              <label for="signature-travel-16-image" class="signature-travel-16-image"><?php _e( '<strong>Section &#35;16 Image</strong>', 'the-fly-shop' );?></label><br>
              <input type="text" style="width: 75%;" name="signature-travel-16-image" id="signature-travel-16-image" value="<?php if ( isset ( $signature_travel_stored_meta['signature-travel-16-image'] ) ) echo $signature_travel_stored_meta['signature-travel-16-image'][0];?>" /><br><br>
              <input type="button" id="signature-travel-16-image-button" class="button" value="<?php _e( 'Choose or Upload an Image', 'the-fly-shop' );?>" />
    
            </p>
    
            <p> <!-- ==== SECTION #16 SUB TITLE ==== -->
      
              <strong><label for="signature-travel-16-sub-title" class="signature-travel-16-sub-title"><?php _e( 'Section &#35;16 Sub Title', 'the-fly-shop' );?></label></strong><br>
              <input style="width:50%;" type="text" name="signature-travel-16-sub-title" id="signature-travel-16-sub-title" value="<?php if ( isset ( $signature_travel_stored_meta['signature-travel-16-sub-title'] ) ) echo $signature_travel_stored_meta['signature-travel-16-sub-title'][0];?>" />
    
            </p>
    
            <p> <!-- ==== SECTION #16 SUB TITLE CAPTION ==== -->
      
              <strong><label for="signature-travel-16-caption" class="signature-travel-16-caption"><?php _e( 'Section &#35;16 Sub Title Caption', 'the-fly-shop' );?></label></strong><br>
              <textarea style="width: 100%;" rows="4" name="signature-travel-16-caption" id="signature-travel-16-caption"><?php if ( isset ( $signature_travel_stored_meta['signature-travel-16-caption'] ) ) echo $signature_travel_stored_meta['signature-travel-16-caption'][0]; ?></textarea>
    
            </p>
  
          </div>
  
          <div role="tabpanel" class="tab-pane fade in" id="sectionsimage17">
    
            <p> <!-- ==== SECTION #17 TITLE ==== -->
      
              <strong><label for="signature-travel-section-17-title" class="signature-travel-section-17-title"><?php _e( 'Section &#35;17 Title', 'the-fly-shop' );?></label></strong><br>
              <input style="width:50%;" type="text" name="signature-travel-section-17-title" id="signature-travel-section-17-title" value="<?php if ( isset ( $signature_travel_stored_meta['signature-travel-section-17-title'] ) ) echo $signature_travel_stored_meta['signature-travel-section-17-title'][0];?>" />
    
            </p>
    
            <p> <!-- ==== SECTION #17 TITLE LINK ==== -->
      
              <strong><label for="signature-travel-section-17-title-link" class="signature-travel-section-17-title-link"><?php _e( 'Section &#35;17 Title Link', 'the-fly-shop' );?></label></strong><br>
              <input style="width:50%;" type="url" name="signature-travel-section-17-title-link" id="signature-travel-section-17-title-link" value="<?php if ( isset ( $signature_travel_stored_meta['signature-travel-section-17-title-link'] ) ) echo $signature_travel_stored_meta['signature-travel-section-17-title-link'][0];?>" />
    
            </p>
    
            <p> <!-- ==== SECTION #17 IMAGE ==== -->
      
              <label for="signature-travel-17-image" class="signature-travel-17-image"><?php _e( '<strong>Section &#35;17 Image</strong>', 'the-fly-shop' );?></label><br>
              <input type="text" style="width: 75%;" name="signature-travel-17-image" id="signature-travel-17-image" value="<?php if ( isset ( $signature_travel_stored_meta['signature-travel-17-image'] ) ) echo $signature_travel_stored_meta['signature-travel-17-image'][0];?>" /><br><br>
              <input type="button" id="signature-travel-17-image-button" class="button" value="<?php _e( 'Choose or Upload an Image', 'the-fly-shop' );?>" />
    
            </p>
    
            <p> <!-- ==== SECTION #17 SUB TITLE ==== -->
      
              <strong><label for="signature-travel-17-sub-title" class="signature-travel-17-sub-title"><?php _e( 'Section &#35;17 Sub Title', 'the-fly-shop' );?></label></strong><br>
              <input style="width:50%;" type="text" name="signature-travel-17-sub-title" id="signature-travel-17-sub-title" value="<?php if ( isset ( $signature_travel_stored_meta['signature-travel-17-sub-title'] ) ) echo $signature_travel_stored_meta['signature-travel-17-sub-title'][0];?>" />
    
            </p>
    
            <p> <!-- ==== SECTION #17 SUB TITLE CAPTION ==== -->
      
              <strong><label for="signature-travel-17-caption" class="signature-travel-17-caption"><?php _e( 'Section &#35;17 Sub Title Caption', 'the-fly-shop' );?></label></strong><br>
              <textarea style="width: 100%;" rows="4" name="signature-travel-17-caption" id="signature-travel-17-caption"><?php if ( isset ( $signature_travel_stored_meta['signature-travel-17-caption'] ) ) echo $signature_travel_stored_meta['signature-travel-17-caption'][0]; ?></textarea>
    
            </p>
  
          </div>
  
          <div role="tabpanel" class="tab-pane fade in" id="sectionsimage18">
    
            <p> <!-- ==== SECTION #18 TITLE ==== -->
      
              <strong><label for="signature-travel-section-18-title" class="signature-travel-section-18-title"><?php _e( 'Section &#35;18 Title', 'the-fly-shop' );?></label></strong><br>
              <input style="width:50%;" type="text" name="signature-travel-section-18-title" id="signature-travel-section-18-title" value="<?php if ( isset ( $signature_travel_stored_meta['signature-travel-section-18-title'] ) ) echo $signature_travel_stored_meta['signature-travel-section-18-title'][0];?>" />
    
            </p>
    
            <p> <!-- ==== SECTION #18 TITLE LINK ==== -->
      
              <strong><label for="signature-travel-section-18-title-link" class="signature-travel-section-18-title-link"><?php _e( 'Section &#35;18 Title Link', 'the-fly-shop' );?></label></strong><br>
              <input style="width:50%;" type="url" name="signature-travel-section-18-title-link" id="signature-travel-section-18-title-link" value="<?php if ( isset ( $signature_travel_stored_meta['signature-travel-section-18-title-link'] ) ) echo $signature_travel_stored_meta['signature-travel-section-18-title-link'][0];?>" />
    
            </p>
    
            <p> <!-- ==== SECTION #18 IMAGE ==== -->
      
              <label for="signature-travel-18-image" class="signature-travel-18-image"><?php _e( '<strong>Section &#35;18 Image</strong>', 'the-fly-shop' );?></label><br>
              <input type="text" style="width: 75%;" name="signature-travel-18-image" id="signature-travel-18-image" value="<?php if ( isset ( $signature_travel_stored_meta['signature-travel-18-image'] ) ) echo $signature_travel_stored_meta['signature-travel-18-image'][0];?>" /><br><br>
              <input type="button" id="signature-travel-18-image-button" class="button" value="<?php _e( 'Choose or Upload an Image', 'the-fly-shop' );?>" />
    
            </p>
    
            <p> <!-- ==== SECTION #18 SUB TITLE ==== -->
      
              <strong><label for="signature-travel-18-sub-title" class="signature-travel-18-sub-title"><?php _e( 'Section &#35;18 Sub Title', 'the-fly-shop' );?></label></strong><br>
              <input style="width:50%;" type="text" name="signature-travel-18-sub-title" id="signature-travel-18-sub-title" value="<?php if ( isset ( $signature_travel_stored_meta['signature-travel-18-sub-title'] ) ) echo $signature_travel_stored_meta['signature-travel-18-sub-title'][0];?>" />
    
            </p>
    
            <p> <!-- ==== SECTION #18 SUB TITLE CAPTION ==== -->
      
              <strong><label for="signature-travel-18-caption" class="signature-travel-18-caption"><?php _e( 'Section &#35;18 Sub Title Caption', 'the-fly-shop' );?></label></strong><br>
              <textarea style="width: 100%;" rows="4" name="signature-travel-18-caption" id="signature-travel-18-caption"><?php if ( isset ( $signature_travel_stored_meta['signature-travel-18-caption'] ) ) echo $signature_travel_stored_meta['signature-travel-18-caption'][0]; ?></textarea>
    
            </p>
  
          </div>
  
          <div role="tabpanel" class="tab-pane fade in" id="sectionsimage19">
    
            <p> <!-- ==== SECTION #19 TITLE ==== -->
      
              <strong><label for="signature-travel-section-19-title" class="signature-travel-section-19-title"><?php _e( 'Section &#35;19 Title', 'the-fly-shop' );?></label></strong><br>
              <input style="width:50%;" type="text" name="signature-travel-section-19-title" id="signature-travel-section-19-title" value="<?php if ( isset ( $signature_travel_stored_meta['signature-travel-section-19-title'] ) ) echo $signature_travel_stored_meta['signature-travel-section-19-title'][0];?>" />
    
            </p>
    
            <p> <!-- ==== SECTION #19 TITLE LINK ==== -->
      
              <strong><label for="signature-travel-section-19-title-link" class="signature-travel-section-19-title-link"><?php _e( 'Section &#35;19 Title Link', 'the-fly-shop' );?></label></strong><br>
              <input style="width:50%;" type="url" name="signature-travel-section-19-title-link" id="signature-travel-section-19-title-link" value="<?php if ( isset ( $signature_travel_stored_meta['signature-travel-section-19-title-link'] ) ) echo $signature_travel_stored_meta['signature-travel-section-19-title-link'][0];?>" />
    
            </p>
    
            <p> <!-- ==== SECTION #19 IMAGE ==== -->
      
              <label for="signature-travel-19-image" class="signature-travel-19-image"><?php _e( '<strong>Section &#35;19 Image</strong>', 'the-fly-shop' );?></label><br>
              <input type="text" style="width: 75%;" name="signature-travel-19-image" id="signature-travel-19-image" value="<?php if ( isset ( $signature_travel_stored_meta['signature-travel-19-image'] ) ) echo $signature_travel_stored_meta['signature-travel-19-image'][0];?>" /><br><br>
              <input type="button" id="signature-travel-19-image-button" class="button" value="<?php _e( 'Choose or Upload an Image', 'the-fly-shop' );?>" />
    
            </p>
    
            <p> <!-- ==== SECTION #19 SUB TITLE ==== -->
      
              <strong><label for="signature-travel-19-sub-title" class="signature-travel-19-sub-title"><?php _e( 'Section &#35;19 Sub Title', 'the-fly-shop' );?></label></strong><br>
              <input style="width:50%;" type="text" name="signature-travel-19-sub-title" id="signature-travel-19-sub-title" value="<?php if ( isset ( $signature_travel_stored_meta['signature-travel-19-sub-title'] ) ) echo $signature_travel_stored_meta['signature-travel-19-sub-title'][0];?>" />
    
            </p>
    
            <p> <!-- ==== SECTION #19 SUB TITLE CAPTION ==== -->
      
              <strong><label for="signature-travel-19-caption" class="signature-travel-19-caption"><?php _e( 'Section &#35;19 Sub Title Caption', 'the-fly-shop' );?></label></strong><br>
              <textarea style="width: 100%;" rows="4" name="signature-travel-19-caption" id="signature-travel-19-caption"><?php if ( isset ( $signature_travel_stored_meta['signature-travel-19-caption'] ) ) echo $signature_travel_stored_meta['signature-travel-19-caption'][0]; ?></textarea>
    
            </p>
  
          </div>
  
          <div role="tabpanel" class="tab-pane fade in" id="sectionsimage20">
    
            <p> <!-- ==== SECTION #20 TITLE ==== -->
      
              <strong><label for="signature-travel-section-20-title" class="signature-travel-section-20-title"><?php _e( 'Section &#35;20 Title', 'the-fly-shop' );?></label></strong><br>
              <input style="width:50%;" type="text" name="signature-travel-section-20-title" id="signature-travel-section-20-title" value="<?php if ( isset ( $signature_travel_stored_meta['signature-travel-section-20-title'] ) ) echo $signature_travel_stored_meta['signature-travel-section-20-title'][0];?>" />
    
            </p>
    
            <p> <!-- ==== SECTION #20 TITLE LINK ==== -->
      
              <strong><label for="signature-travel-section-20-title-link" class="signature-travel-section-20-title-link"><?php _e( 'Section &#35;20 Title Link', 'the-fly-shop' );?></label></strong><br>
              <input style="width:50%;" type="url" name="signature-travel-section-20-title-link" id="signature-travel-section-20-title-link" value="<?php if ( isset ( $signature_travel_stored_meta['signature-travel-section-20-title-link'] ) ) echo $signature_travel_stored_meta['signature-travel-section-20-title-link'][0];?>" />
    
            </p>
    
            <p> <!-- ==== SECTION #20 IMAGE ==== -->
      
              <label for="signature-travel-20-image" class="signature-travel-20-image"><?php _e( '<strong>Section &#35;20 Image</strong>', 'the-fly-shop' );?></label><br>
              <input type="text" style="width: 75%;" name="signature-travel-20-image" id="signature-travel-20-image" value="<?php if ( isset ( $signature_travel_stored_meta['signature-travel-20-image'] ) ) echo $signature_travel_stored_meta['signature-travel-20-image'][0];?>" /><br><br>
              <input type="button" id="signature-travel-20-image-button" class="button" value="<?php _e( 'Choose or Upload an Image', 'the-fly-shop' );?>" />
    
            </p>
    
            <p> <!-- ==== SECTION #20 SUB TITLE ==== -->
      
              <strong><label for="signature-travel-20-sub-title" class="signature-travel-20-sub-title"><?php _e( 'Section &#35;20 Sub Title', 'the-fly-shop' );?></label></strong><br>
              <input style="width:50%;" type="text" name="signature-travel-20-sub-title" id="signature-travel-20-sub-title" value="<?php if ( isset ( $signature_travel_stored_meta['signature-travel-20-sub-title'] ) ) echo $signature_travel_stored_meta['signature-travel-20-sub-title'][0];?>" />
    
            </p>
    
            <p> <!-- ==== SECTION #20 SUB TITLE CAPTION ==== -->
      
              <strong><label for="signature-travel-20-caption" class="signature-travel-20-caption"><?php _e( 'Section &#35;20 Sub Title Caption', 'the-fly-shop' );?></label></strong><br>
              <textarea style="width: 100%;" rows="4" name="signature-travel-20-caption" id="signature-travel-20-caption"><?php if ( isset ( $signature_travel_stored_meta['signature-travel-20-caption'] ) ) echo $signature_travel_stored_meta['signature-travel-20-caption'][0]; ?></textarea>
    
            </p>
  
          </div>
          
          
          
        </div>
      </div>
    
    </div>
  </div>
  
  <div class="panel with-nav-tabs panel-default">
    <div class="panel-heading">
      
      <ul class="nav nav-tabs" role="tablist">
        <li role="presentation" class="active"><a href="#sectionsimage21" aria-controls="sectionsimage21" role="tab" data-toggle="tab">Section &#35;21</a></li>
        <li role="presentation"><a href="#sectionsimage22" aria-controls="sectionsimage22" role="tab" data-toggle="tab">Section &#35;22</a></li>
        <li role="presentation"><a href="#sectionsimage23" aria-controls="sectionsimage23" role="tab" data-toggle="tab">Section &#35;23</a></li>
        <li role="presentation"><a href="#sectionsimage24" aria-controls="sectionsimage24" role="tab" data-toggle="tab">Section &#35;24</a></li>
        <li role="presentation"><a href="#sectionsimage25" aria-controls="sectionsimage25" role="tab" data-toggle="tab">Section &#35;25</a></li>
        <li role="presentation"><a href="#sectionsimage26" aria-controls="sectionsimage26" role="tab" data-toggle="tab">Section &#35;26</a></li>
        <li role="presentation"><a href="#sectionsimage27" aria-controls="sectionsimage27" role="tab" data-toggle="tab">Section &#35;27</a></li>
        <li role="presentation"><a href="#sectionsimage28" aria-controls="sectionsimage28" role="tab" data-toggle="tab">Section &#35;28</a></li>
        <li role="presentation"><a href="#sectionsimage29" aria-controls="sectionsimage29" role="tab" data-toggle="tab">Section &#35;29</a></li>
        <li role="presentation"><a href="#sectionsimage30" aria-controls="sectionsimage30" role="tab" data-toggle="tab">Section &#35;30</a></li>
      </ul>
      
      <div class="panel-body boof">
        <div class="tab-content">
          
          <div role="tabpanel" class="tab-pane fade in active" id="sectionsimage21">
            
            <p> <!-- ==== SECTION #21 TITLE ==== -->
              
              <strong><label for="signature-travel-section-21-title" class="signature-travel-section-21-title"><?php _e( 'Section &#35;21 Title', 'the-fly-shop' );?></label></strong><br>
              <input style="width:50%;" type="text" name="signature-travel-section-21-title" id="signature-travel-section-21-title" value="<?php if ( isset ( $signature_travel_stored_meta['signature-travel-section-21-title'] ) ) echo $signature_travel_stored_meta['signature-travel-section-21-title'][0];?>" />
            
            </p>
            
            <p> <!-- ==== SECTION #21 TITLE LINK ==== -->
              
              <strong><label for="signature-travel-section-21-title-link" class="signature-travel-section-21-title-link"><?php _e( 'Section &#35;21 Title Link', 'the-fly-shop' );?></label></strong><br>
              <input style="width:50%;" type="url" name="signature-travel-section-21-title-link" id="signature-travel-section-21-title-link" value="<?php if ( isset ( $signature_travel_stored_meta['signature-travel-section-21-title-link'] ) ) echo $signature_travel_stored_meta['signature-travel-section-21-title-link'][0];?>" />
            
            </p>
            
            <p> <!-- ==== SECTION #21 IMAGE ==== -->
              
              <label for="signature-travel-21-image" class="signature-travel-21-image"><?php _e( '<strong>Section &#35;21 Image</strong>', 'the-fly-shop' );?></label><br>
              <input type="text" style="width: 75%;" name="signature-travel-21-image" id="signature-travel-21-image" value="<?php if ( isset ( $signature_travel_stored_meta['signature-travel-21-image'] ) ) echo $signature_travel_stored_meta['signature-travel-21-image'][0];?>" /><br><br>
              <input type="button" id="signature-travel-21-image-button" class="button" value="<?php _e( 'Choose or Upload an Image', 'the-fly-shop' );?>" />
            
            </p>
            
            <p> <!-- ==== SECTION #21 SUB TITLE ==== -->
              
              <strong><label for="signature-travel-21-sub-title" class="signature-travel-21-sub-title"><?php _e( 'Section &#35;21 Sub Title', 'the-fly-shop' );?></label></strong><br>
              <input style="width:50%;" type="text" name="signature-travel-21-sub-title" id="signature-travel-21-sub-title" value="<?php if ( isset ( $signature_travel_stored_meta['signature-travel-21-sub-title'] ) ) echo $signature_travel_stored_meta['signature-travel-21-sub-title'][0];?>" />
            
            </p>
            
            <p> <!-- ==== SECTION #21 SUB TITLE CAPTION ==== -->
              
              <strong><label for="signature-travel-21-caption" class="signature-travel-21-caption"><?php _e( 'Section &#35;21 Sub Title Caption', 'the-fly-shop' );?></label></strong><br>
              <textarea style="width: 100%;" rows="4" name="signature-travel-21-caption" id="signature-travel-21-caption"><?php if ( isset ( $signature_travel_stored_meta['signature-travel-21-caption'] ) ) echo $signature_travel_stored_meta['signature-travel-21-caption'][0]; ?></textarea>
            
            </p>
          
          </div>
          
          <div role="tabpanel" class="tab-pane fade in" id="sectionsimage22">
            
            <p> <!-- ==== SECTION #22 TITLE ==== -->
              
              <strong><label for="signature-travel-section-22-title" class="signature-travel-section-22-title"><?php _e( 'Section &#35;22 Title', 'the-fly-shop' );?></label></strong><br>
              <input style="width:50%;" type="text" name="signature-travel-section-22-title" id="signature-travel-section-22-title" value="<?php if ( isset ( $signature_travel_stored_meta['signature-travel-section-22-title'] ) ) echo $signature_travel_stored_meta['signature-travel-section-22-title'][0];?>" />
            
            </p>
            
            <p> <!-- ==== SECTION #22 TITLE LINK ==== -->
              
              <strong><label for="signature-travel-section-22-title-link" class="signature-travel-section-22-title-link"><?php _e( 'Section &#35;22 Title Link', 'the-fly-shop' );?></label></strong><br>
              <input style="width:50%;" type="url" name="signature-travel-section-22-title-link" id="signature-travel-section-22-title-link" value="<?php if ( isset ( $signature_travel_stored_meta['signature-travel-section-22-title-link'] ) ) echo $signature_travel_stored_meta['signature-travel-section-22-title-link'][0];?>" />
            
            </p>
            
            <p> <!-- ==== SECTION #22 IMAGE ==== -->
              
              <label for="signature-travel-22-image" class="signature-travel-22-image"><?php _e( '<strong>Section &#35;22 Image</strong>', 'the-fly-shop' );?></label><br>
              <input type="text" style="width: 75%;" name="signature-travel-22-image" id="signature-travel-22-image" value="<?php if ( isset ( $signature_travel_stored_meta['signature-travel-22-image'] ) ) echo $signature_travel_stored_meta['signature-travel-22-image'][0];?>" /><br><br>
              <input type="button" id="signature-travel-22-image-button" class="button" value="<?php _e( 'Choose or Upload an Image', 'the-fly-shop' );?>" />
            
            </p>
            
            <p> <!-- ==== SECTION #22 SUB TITLE ==== -->
              
              <strong><label for="signature-travel-22-sub-title" class="signature-travel-22-sub-title"><?php _e( 'Section &#35;22 Sub Title', 'the-fly-shop' );?></label></strong><br>
              <input style="width:50%;" type="text" name="signature-travel-22-sub-title" id="signature-travel-22-sub-title" value="<?php if ( isset ( $signature_travel_stored_meta['signature-travel-22-sub-title'] ) ) echo $signature_travel_stored_meta['signature-travel-22-sub-title'][0];?>" />
            
            </p>
            
            <p> <!-- ==== SECTION #22 SUB TITLE CAPTION ==== -->
              
              <strong><label for="signature-travel-22-caption" class="signature-travel-22-caption"><?php _e( 'Section &#35;22 Sub Title Caption', 'the-fly-shop' );?></label></strong><br>
              <textarea style="width: 100%;" rows="4" name="signature-travel-22-caption" id="signature-travel-22-caption"><?php if ( isset ( $signature_travel_stored_meta['signature-travel-22-caption'] ) ) echo $signature_travel_stored_meta['signature-travel-22-caption'][0]; ?></textarea>
            
            </p>
          
          </div>
          
          
          <div role="tabpanel" class="tab-pane fade in" id="sectionsimage23">
            
            <p> <!-- ==== SECTION #23 TITLE ==== -->
              
              <strong><label for="signature-travel-section-23-title" class="signature-travel-section-23-title"><?php _e( 'Section &#35;23 Title', 'the-fly-shop' );?></label></strong><br>
              <input style="width:50%;" type="text" name="signature-travel-section-23-title" id="signature-travel-section-23-title" value="<?php if ( isset ( $signature_travel_stored_meta['signature-travel-section-23-title'] ) ) echo $signature_travel_stored_meta['signature-travel-section-23-title'][0];?>" />
            
            </p>
            
            <p> <!-- ==== SECTION #23 TITLE LINK ==== -->
              
              <strong><label for="signature-travel-section-23-title-link" class="signature-travel-section-23-title-link"><?php _e( 'Section &#35;23 Title Link', 'the-fly-shop' );?></label></strong><br>
              <input style="width:50%;" type="url" name="signature-travel-section-23-title-link" id="signature-travel-section-23-title-link" value="<?php if ( isset ( $signature_travel_stored_meta['signature-travel-section-23-title-link'] ) ) echo $signature_travel_stored_meta['signature-travel-section-23-title-link'][0];?>" />
            
            </p>
            
            <p> <!-- ==== SECTION #23 IMAGE ==== -->
              
              <label for="signature-travel-23-image" class="signature-travel-23-image"><?php _e( '<strong>Section &#35;23 Image</strong>', 'the-fly-shop' );?></label><br>
              <input type="text" style="width: 75%;" name="signature-travel-23-image" id="signature-travel-23-image" value="<?php if ( isset ( $signature_travel_stored_meta['signature-travel-23-image'] ) ) echo $signature_travel_stored_meta['signature-travel-23-image'][0];?>" /><br><br>
              <input type="button" id="signature-travel-23-image-button" class="button" value="<?php _e( 'Choose or Upload an Image', 'the-fly-shop' );?>" />
            
            </p>
            
            <p> <!-- ==== SECTION #23 SUB TITLE ==== -->
              
              <strong><label for="signature-travel-23-sub-title" class="signature-travel-23-sub-title"><?php _e( 'Section &#35;23 Sub Title', 'the-fly-shop' );?></label></strong><br>
              <input style="width:50%;" type="text" name="signature-travel-23-sub-title" id="signature-travel-23-sub-title" value="<?php if ( isset ( $signature_travel_stored_meta['signature-travel-23-sub-title'] ) ) echo $signature_travel_stored_meta['signature-travel-23-sub-title'][0];?>" />
            
            </p>
            
            <p> <!-- ==== SECTION #23 SUB TITLE CAPTION ==== -->
              
              <strong><label for="signature-travel-23-caption" class="signature-travel-23-caption"><?php _e( 'Section &#35;23 Sub Title Caption', 'the-fly-shop' );?></label></strong><br>
              <textarea style="width: 100%;" rows="4" name="signature-travel-23-caption" id="signature-travel-23-caption"><?php if ( isset ( $signature_travel_stored_meta['signature-travel-23-caption'] ) ) echo $signature_travel_stored_meta['signature-travel-23-caption'][0]; ?></textarea>
            
            </p>
          
          </div>
          
          <div role="tabpanel" class="tab-pane fade in" id="sectionsimage24">
            
            <p> <!-- ==== SECTION #24 TITLE ==== -->
              
              <strong><label for="signature-travel-section-24-title" class="signature-travel-section-24-title"><?php _e( 'Section &#35;24 Title', 'the-fly-shop' );?></label></strong><br>
              <input style="width:50%;" type="text" name="signature-travel-section-24-title" id="signature-travel-section-24-title" value="<?php if ( isset ( $signature_travel_stored_meta['signature-travel-section-24-title'] ) ) echo $signature_travel_stored_meta['signature-travel-section-24-title'][0];?>" />
            
            </p>
            
            <p> <!-- ==== SECTION #24 TITLE LINK ==== -->
              
              <strong><label for="signature-travel-section-24-title-link" class="signature-travel-section-24-title-link"><?php _e( 'Section &#35;24 Title Link', 'the-fly-shop' );?></label></strong><br>
              <input style="width:50%;" type="url" name="signature-travel-section-24-title-link" id="signature-travel-section-24-title-link" value="<?php if ( isset ( $signature_travel_stored_meta['signature-travel-section-24-title-link'] ) ) echo $signature_travel_stored_meta['signature-travel-section-24-title-link'][0];?>" />
            
            </p>
            
            <p> <!-- ==== SECTION #24 IMAGE ==== -->
              
              <label for="signature-travel-24-image" class="signature-travel-24-image"><?php _e( '<strong>Section &#35;24 Image</strong>', 'the-fly-shop' );?></label><br>
              <input type="text" style="width: 75%;" name="signature-travel-24-image" id="signature-travel-24-image" value="<?php if ( isset ( $signature_travel_stored_meta['signature-travel-24-image'] ) ) echo $signature_travel_stored_meta['signature-travel-24-image'][0];?>" /><br><br>
              <input type="button" id="signature-travel-24-image-button" class="button" value="<?php _e( 'Choose or Upload an Image', 'the-fly-shop' );?>" />
            
            </p>
            
            <p> <!-- ==== SECTION #24 SUB TITLE ==== -->
              
              <strong><label for="signature-travel-24-sub-title" class="signature-travel-24-sub-title"><?php _e( 'Section &#35;24 Sub Title', 'the-fly-shop' );?></label></strong><br>
              <input style="width:50%;" type="text" name="signature-travel-24-sub-title" id="signature-travel-24-sub-title" value="<?php if ( isset ( $signature_travel_stored_meta['signature-travel-24-sub-title'] ) ) echo $signature_travel_stored_meta['signature-travel-24-sub-title'][0];?>" />
            
            </p>
            
            <p> <!-- ==== SECTION #24 SUB TITLE CAPTION ==== -->
              
              <strong><label for="signature-travel-24-caption" class="signature-travel-24-caption"><?php _e( 'Section &#35;24 Sub Title Caption', 'the-fly-shop' );?></label></strong><br>
              <textarea style="width: 100%;" rows="4" name="signature-travel-24-caption" id="signature-travel-24-caption"><?php if ( isset ( $signature_travel_stored_meta['signature-travel-24-caption'] ) ) echo $signature_travel_stored_meta['signature-travel-24-caption'][0]; ?></textarea>
            
            </p>
          
          </div>
          
          <div role="tabpanel" class="tab-pane fade in" id="sectionsimage25">
            
            <p> <!-- ==== SECTION #25 TITLE ==== -->
              
              <strong><label for="signature-travel-section-25-title" class="signature-travel-section-25-title"><?php _e( 'Section &#35;25 Title', 'the-fly-shop' );?></label></strong><br>
              <input style="width:50%;" type="text" name="signature-travel-section-25-title" id="signature-travel-section-25-title" value="<?php if ( isset ( $signature_travel_stored_meta['signature-travel-section-25-title'] ) ) echo $signature_travel_stored_meta['signature-travel-section-25-title'][0];?>" />
            
            </p>
            
            <p> <!-- ==== SECTION #25 TITLE LINK ==== -->
              
              <strong><label for="signature-travel-section-25-title-link" class="signature-travel-section-25-title-link"><?php _e( 'Section &#35;25 Title Link', 'the-fly-shop' );?></label></strong><br>
              <input style="width:50%;" type="url" name="signature-travel-section-25-title-link" id="signature-travel-section-25-title-link" value="<?php if ( isset ( $signature_travel_stored_meta['signature-travel-section-25-title-link'] ) ) echo $signature_travel_stored_meta['signature-travel-section-25-title-link'][0];?>" />
            
            </p>
            
            <p> <!-- ==== SECTION #25 IMAGE ==== -->
              
              <label for="signature-travel-25-image" class="signature-travel-25-image"><?php _e( '<strong>Section &#35;25 Image</strong>', 'the-fly-shop' );?></label><br>
              <input type="text" style="width: 75%;" name="signature-travel-25-image" id="signature-travel-25-image" value="<?php if ( isset ( $signature_travel_stored_meta['signature-travel-25-image'] ) ) echo $signature_travel_stored_meta['signature-travel-25-image'][0];?>" /><br><br>
              <input type="button" id="signature-travel-25-image-button" class="button" value="<?php _e( 'Choose or Upload an Image', 'the-fly-shop' );?>" />
            
            </p>
            
            <p> <!-- ==== SECTION #25 SUB TITLE ==== -->
              
              <strong><label for="signature-travel-25-sub-title" class="signature-travel-25-sub-title"><?php _e( 'Section &#35;25 Sub Title', 'the-fly-shop' );?></label></strong><br>
              <input style="width:50%;" type="text" name="signature-travel-25-sub-title" id="signature-travel-25-sub-title" value="<?php if ( isset ( $signature_travel_stored_meta['signature-travel-25-sub-title'] ) ) echo $signature_travel_stored_meta['signature-travel-25-sub-title'][0];?>" />
            
            </p>
            
            <p> <!-- ==== SECTION #25 SUB TITLE CAPTION ==== -->
              
              <strong><label for="signature-travel-25-caption" class="signature-travel-25-caption"><?php _e( 'Section &#35;25 Sub Title Caption', 'the-fly-shop' );?></label></strong><br>
              <textarea style="width: 100%;" rows="4" name="signature-travel-25-caption" id="signature-travel-25-caption"><?php if ( isset ( $signature_travel_stored_meta['signature-travel-25-caption'] ) ) echo $signature_travel_stored_meta['signature-travel-25-caption'][0]; ?></textarea>
            
            </p>
          
          </div>
          
          <div role="tabpanel" class="tab-pane fade in" id="sectionsimage26">
            
            <p> <!-- ==== SECTION #26 TITLE ==== -->
              
              <strong><label for="signature-travel-section-26-title" class="signature-travel-section-26-title"><?php _e( 'Section &#35;26 Title', 'the-fly-shop' );?></label></strong><br>
              <input style="width:50%;" type="text" name="signature-travel-section-26-title" id="signature-travel-section-26-title" value="<?php if ( isset ( $signature_travel_stored_meta['signature-travel-section-26-title'] ) ) echo $signature_travel_stored_meta['signature-travel-section-26-title'][0];?>" />
            
            </p>
            
            <p> <!-- ==== SECTION #26 TITLE LINK ==== -->
              
              <strong><label for="signature-travel-section-26-title-link" class="signature-travel-section-26-title-link"><?php _e( 'Section &#35;26 Title Link', 'the-fly-shop' );?></label></strong><br>
              <input style="width:50%;" type="url" name="signature-travel-section-26-title-link" id="signature-travel-section-26-title-link" value="<?php if ( isset ( $signature_travel_stored_meta['signature-travel-section-26-title-link'] ) ) echo $signature_travel_stored_meta['signature-travel-section-26-title-link'][0];?>" />
            
            </p>
            
            <p> <!-- ==== SECTION #26 IMAGE ==== -->
              
              <label for="signature-travel-26-image" class="signature-travel-26-image"><?php _e( '<strong>Section &#35;26 Image</strong>', 'the-fly-shop' );?></label><br>
              <input type="text" style="width: 75%;" name="signature-travel-26-image" id="signature-travel-26-image" value="<?php if ( isset ( $signature_travel_stored_meta['signature-travel-26-image'] ) ) echo $signature_travel_stored_meta['signature-travel-26-image'][0];?>" /><br><br>
              <input type="button" id="signature-travel-26-image-button" class="button" value="<?php _e( 'Choose or Upload an Image', 'the-fly-shop' );?>" />
            
            </p>
            
            <p> <!-- ==== SECTION #26 SUB TITLE ==== -->
              
              <strong><label for="signature-travel-26-sub-title" class="signature-travel-26-sub-title"><?php _e( 'Section &#35;26 Sub Title', 'the-fly-shop' );?></label></strong><br>
              <input style="width:50%;" type="text" name="signature-travel-26-sub-title" id="signature-travel-26-sub-title" value="<?php if ( isset ( $signature_travel_stored_meta['signature-travel-26-sub-title'] ) ) echo $signature_travel_stored_meta['signature-travel-26-sub-title'][0];?>" />
            
            </p>
            
            <p> <!-- ==== SECTION #26 SUB TITLE CAPTION ==== -->
              
              <strong><label for="signature-travel-26-caption" class="signature-travel-26-caption"><?php _e( 'Section &#35;26 Sub Title Caption', 'the-fly-shop' );?></label></strong><br>
              <textarea style="width: 100%;" rows="4" name="signature-travel-26-caption" id="signature-travel-26-caption"><?php if ( isset ( $signature_travel_stored_meta['signature-travel-26-caption'] ) ) echo $signature_travel_stored_meta['signature-travel-26-caption'][0]; ?></textarea>
            
            </p>
          
          </div>
          
          <div role="tabpanel" class="tab-pane fade in" id="sectionsimage27">
            
            <p> <!-- ==== SECTION #27 TITLE ==== -->
              
              <strong><label for="signature-travel-section-27-title" class="signature-travel-section-27-title"><?php _e( 'Section &#35;27 Title', 'the-fly-shop' );?></label></strong><br>
              <input style="width:50%;" type="text" name="signature-travel-section-27-title" id="signature-travel-section-27-title" value="<?php if ( isset ( $signature_travel_stored_meta['signature-travel-section-27-title'] ) ) echo $signature_travel_stored_meta['signature-travel-section-27-title'][0];?>" />
            
            </p>
            
            <p> <!-- ==== SECTION #27 TITLE LINK ==== -->
              
              <strong><label for="signature-travel-section-27-title-link" class="signature-travel-section-27-title-link"><?php _e( 'Section &#35;27 Title Link', 'the-fly-shop' );?></label></strong><br>
              <input style="width:50%;" type="url" name="signature-travel-section-27-title-link" id="signature-travel-section-27-title-link" value="<?php if ( isset ( $signature_travel_stored_meta['signature-travel-section-27-title-link'] ) ) echo $signature_travel_stored_meta['signature-travel-section-27-title-link'][0];?>" />
            
            </p>
            
            <p> <!-- ==== SECTION #27 IMAGE ==== -->
              
              <label for="signature-travel-27-image" class="signature-travel-27-image"><?php _e( '<strong>Section &#35;27 Image</strong>', 'the-fly-shop' );?></label><br>
              <input type="text" style="width: 75%;" name="signature-travel-27-image" id="signature-travel-27-image" value="<?php if ( isset ( $signature_travel_stored_meta['signature-travel-27-image'] ) ) echo $signature_travel_stored_meta['signature-travel-27-image'][0];?>" /><br><br>
              <input type="button" id="signature-travel-27-image-button" class="button" value="<?php _e( 'Choose or Upload an Image', 'the-fly-shop' );?>" />
            
            </p>
            
            <p> <!-- ==== SECTION #27 SUB TITLE ==== -->
              
              <strong><label for="signature-travel-27-sub-title" class="signature-travel-27-sub-title"><?php _e( 'Section &#35;27 Sub Title', 'the-fly-shop' );?></label></strong><br>
              <input style="width:50%;" type="text" name="signature-travel-27-sub-title" id="signature-travel-27-sub-title" value="<?php if ( isset ( $signature_travel_stored_meta['signature-travel-27-sub-title'] ) ) echo $signature_travel_stored_meta['signature-travel-27-sub-title'][0];?>" />
            
            </p>
            
            <p> <!-- ==== SECTION #27 SUB TITLE CAPTION ==== -->
              
              <strong><label for="signature-travel-27-caption" class="signature-travel-27-caption"><?php _e( 'Section &#35;27 Sub Title Caption', 'the-fly-shop' );?></label></strong><br>
              <textarea style="width: 100%;" rows="4" name="signature-travel-27-caption" id="signature-travel-27-caption"><?php if ( isset ( $signature_travel_stored_meta['signature-travel-27-caption'] ) ) echo $signature_travel_stored_meta['signature-travel-27-caption'][0]; ?></textarea>
            
            </p>
          
          </div>
          
          <div role="tabpanel" class="tab-pane fade in" id="sectionsimage28">
            
            <p> <!-- ==== SECTION #28 TITLE ==== -->
              
              <strong><label for="signature-travel-section-28-title" class="signature-travel-section-28-title"><?php _e( 'Section &#35;28 Title', 'the-fly-shop' );?></label></strong><br>
              <input style="width:50%;" type="text" name="signature-travel-section-28-title" id="signature-travel-section-28-title" value="<?php if ( isset ( $signature_travel_stored_meta['signature-travel-section-28-title'] ) ) echo $signature_travel_stored_meta['signature-travel-section-28-title'][0];?>" />
            
            </p>
            
            <p> <!-- ==== SECTION #28 TITLE LINK ==== -->
              
              <strong><label for="signature-travel-section-28-title-link" class="signature-travel-section-28-title-link"><?php _e( 'Section &#35;28 Title Link', 'the-fly-shop' );?></label></strong><br>
              <input style="width:50%;" type="url" name="signature-travel-section-28-title-link" id="signature-travel-section-28-title-link" value="<?php if ( isset ( $signature_travel_stored_meta['signature-travel-section-28-title-link'] ) ) echo $signature_travel_stored_meta['signature-travel-section-28-title-link'][0];?>" />
            
            </p>
            
            <p> <!-- ==== SECTION #28 IMAGE ==== -->
              
              <label for="signature-travel-28-image" class="signature-travel-28-image"><?php _e( '<strong>Section &#35;28 Image</strong>', 'the-fly-shop' );?></label><br>
              <input type="text" style="width: 75%;" name="signature-travel-28-image" id="signature-travel-28-image" value="<?php if ( isset ( $signature_travel_stored_meta['signature-travel-28-image'] ) ) echo $signature_travel_stored_meta['signature-travel-28-image'][0];?>" /><br><br>
              <input type="button" id="signature-travel-28-image-button" class="button" value="<?php _e( 'Choose or Upload an Image', 'the-fly-shop' );?>" />
            
            </p>
            
            <p> <!-- ==== SECTION #28 SUB TITLE ==== -->
              
              <strong><label for="signature-travel-28-sub-title" class="signature-travel-28-sub-title"><?php _e( 'Section &#35;28 Sub Title', 'the-fly-shop' );?></label></strong><br>
              <input style="width:50%;" type="text" name="signature-travel-28-sub-title" id="signature-travel-28-sub-title" value="<?php if ( isset ( $signature_travel_stored_meta['signature-travel-28-sub-title'] ) ) echo $signature_travel_stored_meta['signature-travel-28-sub-title'][0];?>" />
            
            </p>
            
            <p> <!-- ==== SECTION #28 SUB TITLE CAPTION ==== -->
              
              <strong><label for="signature-travel-28-caption" class="signature-travel-28-caption"><?php _e( 'Section &#35;28 Sub Title Caption', 'the-fly-shop' );?></label></strong><br>
              <textarea style="width: 100%;" rows="4" name="signature-travel-28-caption" id="signature-travel-28-caption"><?php if ( isset ( $signature_travel_stored_meta['signature-travel-28-caption'] ) ) echo $signature_travel_stored_meta['signature-travel-28-caption'][0]; ?></textarea>
            
            </p>
          
          </div>
          
          <div role="tabpanel" class="tab-pane fade in" id="sectionsimage29">
            
            <p> <!-- ==== SECTION #29 TITLE ==== -->
              
              <strong><label for="signature-travel-section-29-title" class="signature-travel-section-29-title"><?php _e( 'Section &#35;29 Title', 'the-fly-shop' );?></label></strong><br>
              <input style="width:50%;" type="text" name="signature-travel-section-29-title" id="signature-travel-section-29-title" value="<?php if ( isset ( $signature_travel_stored_meta['signature-travel-section-29-title'] ) ) echo $signature_travel_stored_meta['signature-travel-section-29-title'][0];?>" />
            
            </p>
            
            <p> <!-- ==== SECTION #29 TITLE LINK ==== -->
              
              <strong><label for="signature-travel-section-29-title-link" class="signature-travel-section-29-title-link"><?php _e( 'Section &#35;29 Title Link', 'the-fly-shop' );?></label></strong><br>
              <input style="width:50%;" type="url" name="signature-travel-section-29-title-link" id="signature-travel-section-29-title-link" value="<?php if ( isset ( $signature_travel_stored_meta['signature-travel-section-29-title-link'] ) ) echo $signature_travel_stored_meta['signature-travel-section-29-title-link'][0];?>" />
            
            </p>
            
            <p> <!-- ==== SECTION #29 IMAGE ==== -->
              
              <label for="signature-travel-29-image" class="signature-travel-29-image"><?php _e( '<strong>Section &#35;29 Image</strong>', 'the-fly-shop' );?></label><br>
              <input type="text" style="width: 75%;" name="signature-travel-29-image" id="signature-travel-29-image" value="<?php if ( isset ( $signature_travel_stored_meta['signature-travel-29-image'] ) ) echo $signature_travel_stored_meta['signature-travel-29-image'][0];?>" /><br><br>
              <input type="button" id="signature-travel-29-image-button" class="button" value="<?php _e( 'Choose or Upload an Image', 'the-fly-shop' );?>" />
            
            </p>
            
            <p> <!-- ==== SECTION #29 SUB TITLE ==== -->
              
              <strong><label for="signature-travel-29-sub-title" class="signature-travel-29-sub-title"><?php _e( 'Section &#35;29 Sub Title', 'the-fly-shop' );?></label></strong><br>
              <input style="width:50%;" type="text" name="signature-travel-29-sub-title" id="signature-travel-29-sub-title" value="<?php if ( isset ( $signature_travel_stored_meta['signature-travel-29-sub-title'] ) ) echo $signature_travel_stored_meta['signature-travel-29-sub-title'][0];?>" />
            
            </p>
            
            <p> <!-- ==== SECTION #29 SUB TITLE CAPTION ==== -->
              
              <strong><label for="signature-travel-29-caption" class="signature-travel-29-caption"><?php _e( 'Section &#35;29 Sub Title Caption', 'the-fly-shop' );?></label></strong><br>
              <textarea style="width: 100%;" rows="4" name="signature-travel-29-caption" id="signature-travel-29-caption"><?php if ( isset ( $signature_travel_stored_meta['signature-travel-29-caption'] ) ) echo $signature_travel_stored_meta['signature-travel-29-caption'][0]; ?></textarea>
            
            </p>
          
          </div>
          
          <div role="tabpanel" class="tab-pane fade in" id="sectionsimage30">
            
            <p> <!-- ==== SECTION #30 TITLE ==== -->
              
              <strong><label for="signature-travel-section-30-title" class="signature-travel-section-30-title"><?php _e( 'Section &#35;30 Title', 'the-fly-shop' );?></label></strong><br>
              <input style="width:50%;" type="text" name="signature-travel-section-30-title" id="signature-travel-section-30-title" value="<?php if ( isset ( $signature_travel_stored_meta['signature-travel-section-30-title'] ) ) echo $signature_travel_stored_meta['signature-travel-section-30-title'][0];?>" />
            
            </p>
            
            <p> <!-- ==== SECTION #30 TITLE LINK ==== -->
              
              <strong><label for="signature-travel-section-30-title-link" class="signature-travel-section-30-title-link"><?php _e( 'Section &#35;30 Title Link', 'the-fly-shop' );?></label></strong><br>
              <input style="width:50%;" type="url" name="signature-travel-section-30-title-link" id="signature-travel-section-30-title-link" value="<?php if ( isset ( $signature_travel_stored_meta['signature-travel-section-30-title-link'] ) ) echo $signature_travel_stored_meta['signature-travel-section-30-title-link'][0];?>" />
            
            </p>
            
            <p> <!-- ==== SECTION #30 IMAGE ==== -->
              
              <label for="signature-travel-30-image" class="signature-travel-30-image"><?php _e( '<strong>Section &#35;30 Image</strong>', 'the-fly-shop' );?></label><br>
              <input type="text" style="width: 75%;" name="signature-travel-30-image" id="signature-travel-30-image" value="<?php if ( isset ( $signature_travel_stored_meta['signature-travel-30-image'] ) ) echo $signature_travel_stored_meta['signature-travel-30-image'][0];?>" /><br><br>
              <input type="button" id="signature-travel-30-image-button" class="button" value="<?php _e( 'Choose or Upload an Image', 'the-fly-shop' );?>" />
            
            </p>
            
            <p> <!-- ==== SECTION #30 SUB TITLE ==== -->
              
              <strong><label for="signature-travel-30-sub-title" class="signature-travel-30-sub-title"><?php _e( 'Section &#35;30 Sub Title', 'the-fly-shop' );?></label></strong><br>
              <input style="width:50%;" type="text" name="signature-travel-30-sub-title" id="signature-travel-30-sub-title" value="<?php if ( isset ( $signature_travel_stored_meta['signature-travel-30-sub-title'] ) ) echo $signature_travel_stored_meta['signature-travel-30-sub-title'][0];?>" />
            
            </p>
            
            <p> <!-- ==== SECTION #30 SUB TITLE CAPTION ==== -->
              
              <strong><label for="signature-travel-30-caption" class="signature-travel-30-caption"><?php _e( 'Section &#35;30 Sub Title Caption', 'the-fly-shop' );?></label></strong><br>
              <textarea style="width: 100%;" rows="4" name="signature-travel-30-caption" id="signature-travel-30-caption"><?php if ( isset ( $signature_travel_stored_meta['signature-travel-30-caption'] ) ) echo $signature_travel_stored_meta['signature-travel-30-caption'][0]; ?></textarea>
            
            </p>
          
          </div>
        </div>
      </div>
    </div>
  </div>
  
  <div class="panel with-nav-tabs panel-default">
    <div class="panel-heading">
      
      <ul class="nav nav-tabs" role="tablist">
        <li role="presentation" class="active"><a href="#sectionsimage31" aria-controls="sectionsimage31" role="tab" data-toggle="tab">Section &#35;31</a></li>
        <li role="presentation"><a href="#sectionsimage32" aria-controls="sectionsimage32" role="tab" data-toggle="tab">Section &#35;32</a></li>
        <li role="presentation"><a href="#sectionsimage33" aria-controls="sectionsimage33" role="tab" data-toggle="tab">Section &#35;33</a></li>
        <li role="presentation"><a href="#sectionsimage34" aria-controls="sectionsimage34" role="tab" data-toggle="tab">Section &#35;34</a></li>
        <li role="presentation"><a href="#sectionsimage35" aria-controls="sectionsimage35" role="tab" data-toggle="tab">Section &#35;35</a></li>
        <li role="presentation"><a href="#sectionsimage36" aria-controls="sectionsimage36" role="tab" data-toggle="tab">Section &#35;36</a></li>
        <li role="presentation"><a href="#sectionsimage37" aria-controls="sectionsimage37" role="tab" data-toggle="tab">Section &#35;37</a></li>
        <li role="presentation"><a href="#sectionsimage38" aria-controls="sectionsimage38" role="tab" data-toggle="tab">Section &#35;38</a></li>
        <li role="presentation"><a href="#sectionsimage39" aria-controls="sectionsimage39" role="tab" data-toggle="tab">Section &#35;39</a></li>
        <li role="presentation"><a href="#sectionsimage40" aria-controls="sectionsimage40" role="tab" data-toggle="tab">Section &#35;40</a></li>
        <li role="presentation"><a href="#sectionsimage41" aria-controls="sectionsimage41" role="tab" data-toggle="tab">Section &#35;41</a></li>
        <li role="presentation"><a href="#sectionsimage42" aria-controls="sectionsimage42" role="tab" data-toggle="tab">Section &#35;42</a></li>
      </ul>
      
      <div class="panel-body boof">
        <div class="tab-content">
          
          <div role="tabpanel" class="tab-pane fade in active" id="sectionsimage31">
            
            <p> <!-- ==== SECTION #31 TITLE ==== -->
              
              <strong><label for="signature-travel-section-31-title" class="signature-travel-section-31-title"><?php _e( 'Section &#35;31 Title', 'the-fly-shop' );?></label></strong><br>
              <input style="width:50%;" type="text" name="signature-travel-section-31-title" id="signature-travel-section-31-title" value="<?php if ( isset ( $signature_travel_stored_meta['signature-travel-section-31-title'] ) ) echo $signature_travel_stored_meta['signature-travel-section-31-title'][0];?>" />
            
            </p>
            
            <p> <!-- ==== SECTION #31 TITLE LINK ==== -->
              
              <strong><label for="signature-travel-section-31-title-link" class="signature-travel-section-31-title-link"><?php _e( 'Section &#35;31 Title Link', 'the-fly-shop' );?></label></strong><br>
              <input style="width:50%;" type="url" name="signature-travel-section-31-title-link" id="signature-travel-section-31-title-link" value="<?php if ( isset ( $signature_travel_stored_meta['signature-travel-section-31-title-link'] ) ) echo $signature_travel_stored_meta['signature-travel-section-31-title-link'][0];?>" />
            
            </p>
            
            <p> <!-- ==== SECTION #31 IMAGE ==== -->
              
              <label for="signature-travel-31-image" class="signature-travel-31-image"><?php _e( '<strong>Section &#35;31 Image</strong>', 'the-fly-shop' );?></label><br>
              <input type="text" style="width: 75%;" name="signature-travel-31-image" id="signature-travel-31-image" value="<?php if ( isset ( $signature_travel_stored_meta['signature-travel-31-image'] ) ) echo $signature_travel_stored_meta['signature-travel-31-image'][0];?>" /><br><br>
              <input type="button" id="signature-travel-31-image-button" class="button" value="<?php _e( 'Choose or Upload an Image', 'the-fly-shop' );?>" />
            
            </p>
            
            <p> <!-- ==== SECTION #31 SUB TITLE ==== -->
              
              <strong><label for="signature-travel-31-sub-title" class="signature-travel-31-sub-title"><?php _e( 'Section &#35;31 Sub Title', 'the-fly-shop' );?></label></strong><br>
              <input style="width:50%;" type="text" name="signature-travel-31-sub-title" id="signature-travel-31-sub-title" value="<?php if ( isset ( $signature_travel_stored_meta['signature-travel-31-sub-title'] ) ) echo $signature_travel_stored_meta['signature-travel-31-sub-title'][0];?>" />
            
            </p>
            
            <p> <!-- ==== SECTION #31 SUB TITLE CAPTION ==== -->
              
              <strong><label for="signature-travel-31-caption" class="signature-travel-31-caption"><?php _e( 'Section &#35;31 Sub Title Caption', 'the-fly-shop' );?></label></strong><br>
              <textarea style="width: 100%;" rows="4" name="signature-travel-31-caption" id="signature-travel-31-caption"><?php if ( isset ( $signature_travel_stored_meta['signature-travel-31-caption'] ) ) echo $signature_travel_stored_meta['signature-travel-31-caption'][0]; ?></textarea>
            
            </p>
          
          </div>
          
          <div role="tabpanel" class="tab-pane fade in" id="sectionsimage32">
            
            <p> <!-- ==== SECTION #32 TITLE ==== -->
              
              <strong><label for="signature-travel-section-32-title" class="signature-travel-section-32-title"><?php _e( 'Section &#35;32 Title', 'the-fly-shop' );?></label></strong><br>
              <input style="width:50%;" type="text" name="signature-travel-section-32-title" id="signature-travel-section-32-title" value="<?php if ( isset ( $signature_travel_stored_meta['signature-travel-section-32-title'] ) ) echo $signature_travel_stored_meta['signature-travel-section-32-title'][0];?>" />
            
            </p>
            
            <p> <!-- ==== SECTION #32 TITLE LINK ==== -->
              
              <strong><label for="signature-travel-section-32-title-link" class="signature-travel-section-32-title-link"><?php _e( 'Section &#35;32 Title Link', 'the-fly-shop' );?></label></strong><br>
              <input style="width:50%;" type="url" name="signature-travel-section-32-title-link" id="signature-travel-section-32-title-link" value="<?php if ( isset ( $signature_travel_stored_meta['signature-travel-section-32-title-link'] ) ) echo $signature_travel_stored_meta['signature-travel-section-32-title-link'][0];?>" />
            
            </p>
            
            <p> <!-- ==== SECTION #32 IMAGE ==== -->
              
              <label for="signature-travel-32-image" class="signature-travel-32-image"><?php _e( '<strong>Section &#35;32 Image</strong>', 'the-fly-shop' );?></label><br>
              <input type="text" style="width: 75%;" name="signature-travel-32-image" id="signature-travel-32-image" value="<?php if ( isset ( $signature_travel_stored_meta['signature-travel-32-image'] ) ) echo $signature_travel_stored_meta['signature-travel-32-image'][0];?>" /><br><br>
              <input type="button" id="signature-travel-32-image-button" class="button" value="<?php _e( 'Choose or Upload an Image', 'the-fly-shop' );?>" />
            
            </p>
            
            <p> <!-- ==== SECTION #32 SUB TITLE ==== -->
              
              <strong><label for="signature-travel-32-sub-title" class="signature-travel-32-sub-title"><?php _e( 'Section &#35;32 Sub Title', 'the-fly-shop' );?></label></strong><br>
              <input style="width:50%;" type="text" name="signature-travel-32-sub-title" id="signature-travel-32-sub-title" value="<?php if ( isset ( $signature_travel_stored_meta['signature-travel-32-sub-title'] ) ) echo $signature_travel_stored_meta['signature-travel-32-sub-title'][0];?>" />
            
            </p>
            
            <p> <!-- ==== SECTION #32 SUB TITLE CAPTION ==== -->
              
              <strong><label for="signature-travel-32-caption" class="signature-travel-32-caption"><?php _e( 'Section &#35;32 Sub Title Caption', 'the-fly-shop' );?></label></strong><br>
              <textarea style="width: 100%;" rows="4" name="signature-travel-32-caption" id="signature-travel-32-caption"><?php if ( isset ( $signature_travel_stored_meta['signature-travel-32-caption'] ) ) echo $signature_travel_stored_meta['signature-travel-32-caption'][0]; ?></textarea>
            
            </p>
          
          </div>
          
          
          <div role="tabpanel" class="tab-pane fade in" id="sectionsimage33">
            
            <p> <!-- ==== SECTION #33 TITLE ==== -->
              
              <strong><label for="signature-travel-section-33-title" class="signature-travel-section-33-title"><?php _e( 'Section &#35;33 Title', 'the-fly-shop' );?></label></strong><br>
              <input style="width:50%;" type="text" name="signature-travel-section-33-title" id="signature-travel-section-33-title" value="<?php if ( isset ( $signature_travel_stored_meta['signature-travel-section-33-title'] ) ) echo $signature_travel_stored_meta['signature-travel-section-33-title'][0];?>" />
            
            </p>
            
            <p> <!-- ==== SECTION #33 TITLE LINK ==== -->
              
              <strong><label for="signature-travel-section-33-title-link" class="signature-travel-section-33-title-link"><?php _e( 'Section &#35;33 Title Link', 'the-fly-shop' );?></label></strong><br>
              <input style="width:50%;" type="url" name="signature-travel-section-33-title-link" id="signature-travel-section-33-title-link" value="<?php if ( isset ( $signature_travel_stored_meta['signature-travel-section-33-title-link'] ) ) echo $signature_travel_stored_meta['signature-travel-section-33-title-link'][0];?>" />
            
            </p>
            
            <p> <!-- ==== SECTION #33 IMAGE ==== -->
              
              <label for="signature-travel-33-image" class="signature-travel-33-image"><?php _e( '<strong>Section &#35;33 Image</strong>', 'the-fly-shop' );?></label><br>
              <input type="text" style="width: 75%;" name="signature-travel-33-image" id="signature-travel-33-image" value="<?php if ( isset ( $signature_travel_stored_meta['signature-travel-33-image'] ) ) echo $signature_travel_stored_meta['signature-travel-33-image'][0];?>" /><br><br>
              <input type="button" id="signature-travel-33-image-button" class="button" value="<?php _e( 'Choose or Upload an Image', 'the-fly-shop' );?>" />
            
            </p>
            
            <p> <!-- ==== SECTION #33 SUB TITLE ==== -->
              
              <strong><label for="signature-travel-33-sub-title" class="signature-travel-33-sub-title"><?php _e( 'Section &#35;33 Sub Title', 'the-fly-shop' );?></label></strong><br>
              <input style="width:50%;" type="text" name="signature-travel-33-sub-title" id="signature-travel-33-sub-title" value="<?php if ( isset ( $signature_travel_stored_meta['signature-travel-33-sub-title'] ) ) echo $signature_travel_stored_meta['signature-travel-33-sub-title'][0];?>" />
            
            </p>
            
            <p> <!-- ==== SECTION #33 SUB TITLE CAPTION ==== -->
              
              <strong><label for="signature-travel-33-caption" class="signature-travel-33-caption"><?php _e( 'Section &#35;33 Sub Title Caption', 'the-fly-shop' );?></label></strong><br>
              <textarea style="width: 100%;" rows="4" name="signature-travel-33-caption" id="signature-travel-33-caption"><?php if ( isset ( $signature_travel_stored_meta['signature-travel-33-caption'] ) ) echo $signature_travel_stored_meta['signature-travel-33-caption'][0]; ?></textarea>
            
            </p>
          
          </div>
          
          <div role="tabpanel" class="tab-pane fade in" id="sectionsimage34">
            
            <p> <!-- ==== SECTION #34 TITLE ==== -->
              
              <strong><label for="signature-travel-section-34-title" class="signature-travel-section-34-title"><?php _e( 'Section &#35;34 Title', 'the-fly-shop' );?></label></strong><br>
              <input style="width:50%;" type="text" name="signature-travel-section-34-title" id="signature-travel-section-34-title" value="<?php if ( isset ( $signature_travel_stored_meta['signature-travel-section-34-title'] ) ) echo $signature_travel_stored_meta['signature-travel-section-34-title'][0];?>" />
            
            </p>
            
            <p> <!-- ==== SECTION #34 TITLE LINK ==== -->
              
              <strong><label for="signature-travel-section-34-title-link" class="signature-travel-section-34-title-link"><?php _e( 'Section &#35;34 Title Link', 'the-fly-shop' );?></label></strong><br>
              <input style="width:50%;" type="url" name="signature-travel-section-34-title-link" id="signature-travel-section-34-title-link" value="<?php if ( isset ( $signature_travel_stored_meta['signature-travel-section-34-title-link'] ) ) echo $signature_travel_stored_meta['signature-travel-section-34-title-link'][0];?>" />
            
            </p>
            
            <p> <!-- ==== SECTION #34 IMAGE ==== -->
              
              <label for="signature-travel-34-image" class="signature-travel-34-image"><?php _e( '<strong>Section &#35;34 Image</strong>', 'the-fly-shop' );?></label><br>
              <input type="text" style="width: 75%;" name="signature-travel-34-image" id="signature-travel-34-image" value="<?php if ( isset ( $signature_travel_stored_meta['signature-travel-34-image'] ) ) echo $signature_travel_stored_meta['signature-travel-34-image'][0];?>" /><br><br>
              <input type="button" id="signature-travel-34-image-button" class="button" value="<?php _e( 'Choose or Upload an Image', 'the-fly-shop' );?>" />
            
            </p>
            
            <p> <!-- ==== SECTION #34 SUB TITLE ==== -->
              
              <strong><label for="signature-travel-34-sub-title" class="signature-travel-34-sub-title"><?php _e( 'Section &#35;34 Sub Title', 'the-fly-shop' );?></label></strong><br>
              <input style="width:50%;" type="text" name="signature-travel-34-sub-title" id="signature-travel-34-sub-title" value="<?php if ( isset ( $signature_travel_stored_meta['signature-travel-34-sub-title'] ) ) echo $signature_travel_stored_meta['signature-travel-34-sub-title'][0];?>" />
            
            </p>
            
            <p> <!-- ==== SECTION #34 SUB TITLE CAPTION ==== -->
              
              <strong><label for="signature-travel-34-caption" class="signature-travel-34-caption"><?php _e( 'Section &#35;34 Sub Title Caption', 'the-fly-shop' );?></label></strong><br>
              <textarea style="width: 100%;" rows="4" name="signature-travel-34-caption" id="signature-travel-34-caption"><?php if ( isset ( $signature_travel_stored_meta['signature-travel-34-caption'] ) ) echo $signature_travel_stored_meta['signature-travel-34-caption'][0]; ?></textarea>
            
            </p>
          
          </div>
          
          <div role="tabpanel" class="tab-pane fade in" id="sectionsimage35">
            
            <p> <!-- ==== SECTION #35 TITLE ==== -->
              
              <strong><label for="signature-travel-section-35-title" class="signature-travel-section-35-title"><?php _e( 'Section &#35;35 Title', 'the-fly-shop' );?></label></strong><br>
              <input style="width:50%;" type="text" name="signature-travel-section-35-title" id="signature-travel-section-35-title" value="<?php if ( isset ( $signature_travel_stored_meta['signature-travel-section-35-title'] ) ) echo $signature_travel_stored_meta['signature-travel-section-35-title'][0];?>" />
            
            </p>
            
            <p> <!-- ==== SECTION #35 TITLE LINK ==== -->
              
              <strong><label for="signature-travel-section-35-title-link" class="signature-travel-section-35-title-link"><?php _e( 'Section &#35;35 Title Link', 'the-fly-shop' );?></label></strong><br>
              <input style="width:50%;" type="url" name="signature-travel-section-35-title-link" id="signature-travel-section-35-title-link" value="<?php if ( isset ( $signature_travel_stored_meta['signature-travel-section-35-title-link'] ) ) echo $signature_travel_stored_meta['signature-travel-section-35-title-link'][0];?>" />
            
            </p>
            
            <p> <!-- ==== SECTION #35 IMAGE ==== -->
              
              <label for="signature-travel-35-image" class="signature-travel-35-image"><?php _e( '<strong>Section &#35;35 Image</strong>', 'the-fly-shop' );?></label><br>
              <input type="text" style="width: 75%;" name="signature-travel-35-image" id="signature-travel-35-image" value="<?php if ( isset ( $signature_travel_stored_meta['signature-travel-35-image'] ) ) echo $signature_travel_stored_meta['signature-travel-35-image'][0];?>" /><br><br>
              <input type="button" id="signature-travel-35-image-button" class="button" value="<?php _e( 'Choose or Upload an Image', 'the-fly-shop' );?>" />
            
            </p>
            
            <p> <!-- ==== SECTION #35 SUB TITLE ==== -->
              
              <strong><label for="signature-travel-35-sub-title" class="signature-travel-35-sub-title"><?php _e( 'Section &#35;35 Sub Title', 'the-fly-shop' );?></label></strong><br>
              <input style="width:50%;" type="text" name="signature-travel-35-sub-title" id="signature-travel-35-sub-title" value="<?php if ( isset ( $signature_travel_stored_meta['signature-travel-35-sub-title'] ) ) echo $signature_travel_stored_meta['signature-travel-35-sub-title'][0];?>" />
            
            </p>
            
            <p> <!-- ==== SECTION #35 SUB TITLE CAPTION ==== -->
              
              <strong><label for="signature-travel-35-caption" class="signature-travel-35-caption"><?php _e( 'Section &#35;35 Sub Title Caption', 'the-fly-shop' );?></label></strong><br>
              <textarea style="width: 100%;" rows="4" name="signature-travel-35-caption" id="signature-travel-35-caption"><?php if ( isset ( $signature_travel_stored_meta['signature-travel-35-caption'] ) ) echo $signature_travel_stored_meta['signature-travel-35-caption'][0]; ?></textarea>
            
            </p>
          
          </div>
          
          <div role="tabpanel" class="tab-pane fade in" id="sectionsimage36">
            
            <p> <!-- ==== SECTION #36 TITLE ==== -->
              
              <strong><label for="signature-travel-section-36-title" class="signature-travel-section-36-title"><?php _e( 'Section &#35;36 Title', 'the-fly-shop' );?></label></strong><br>
              <input style="width:50%;" type="text" name="signature-travel-section-36-title" id="signature-travel-section-36-title" value="<?php if ( isset ( $signature_travel_stored_meta['signature-travel-section-36-title'] ) ) echo $signature_travel_stored_meta['signature-travel-section-36-title'][0];?>" />
            
            </p>
            
            <p> <!-- ==== SECTION #36 TITLE LINK ==== -->
              
              <strong><label for="signature-travel-section-36-title-link" class="signature-travel-section-36-title-link"><?php _e( 'Section &#35;36 Title Link', 'the-fly-shop' );?></label></strong><br>
              <input style="width:50%;" type="url" name="signature-travel-section-36-title-link" id="signature-travel-section-36-title-link" value="<?php if ( isset ( $signature_travel_stored_meta['signature-travel-section-36-title-link'] ) ) echo $signature_travel_stored_meta['signature-travel-section-36-title-link'][0];?>" />
            
            </p>
            
            <p> <!-- ==== SECTION #36 IMAGE ==== -->
              
              <label for="signature-travel-36-image" class="signature-travel-36-image"><?php _e( '<strong>Section &#35;36 Image</strong>', 'the-fly-shop' );?></label><br>
              <input type="text" style="width: 75%;" name="signature-travel-36-image" id="signature-travel-36-image" value="<?php if ( isset ( $signature_travel_stored_meta['signature-travel-36-image'] ) ) echo $signature_travel_stored_meta['signature-travel-36-image'][0];?>" /><br><br>
              <input type="button" id="signature-travel-36-image-button" class="button" value="<?php _e( 'Choose or Upload an Image', 'the-fly-shop' );?>" />
            
            </p>
            
            <p> <!-- ==== SECTION #36 SUB TITLE ==== -->
              
              <strong><label for="signature-travel-36-sub-title" class="signature-travel-36-sub-title"><?php _e( 'Section &#35;36 Sub Title', 'the-fly-shop' );?></label></strong><br>
              <input style="width:50%;" type="text" name="signature-travel-36-sub-title" id="signature-travel-36-sub-title" value="<?php if ( isset ( $signature_travel_stored_meta['signature-travel-36-sub-title'] ) ) echo $signature_travel_stored_meta['signature-travel-36-sub-title'][0];?>" />
            
            </p>
            
            <p> <!-- ==== SECTION #36 SUB TITLE CAPTION ==== -->
              
              <strong><label for="signature-travel-36-caption" class="signature-travel-36-caption"><?php _e( 'Section &#35;36 Sub Title Caption', 'the-fly-shop' );?></label></strong><br>
              <textarea style="width: 100%;" rows="4" name="signature-travel-36-caption" id="signature-travel-36-caption"><?php if ( isset ( $signature_travel_stored_meta['signature-travel-36-caption'] ) ) echo $signature_travel_stored_meta['signature-travel-36-caption'][0]; ?></textarea>
            
            </p>
          
          </div>
          
          <div role="tabpanel" class="tab-pane fade in" id="sectionsimage37">
            
            <p> <!-- ==== SECTION #37 TITLE ==== -->
              
              <strong><label for="signature-travel-section-37-title" class="signature-travel-section-37-title"><?php _e( 'Section &#35;37 Title', 'the-fly-shop' );?></label></strong><br>
              <input style="width:50%;" type="text" name="signature-travel-section-37-title" id="signature-travel-section-37-title" value="<?php if ( isset ( $signature_travel_stored_meta['signature-travel-section-37-title'] ) ) echo $signature_travel_stored_meta['signature-travel-section-37-title'][0];?>" />
            
            </p>
            
            <p> <!-- ==== SECTION #37 TITLE LINK ==== -->
              
              <strong><label for="signature-travel-section-37-title-link" class="signature-travel-section-37-title-link"><?php _e( 'Section &#35;37 Title Link', 'the-fly-shop' );?></label></strong><br>
              <input style="width:50%;" type="url" name="signature-travel-section-37-title-link" id="signature-travel-section-37-title-link" value="<?php if ( isset ( $signature_travel_stored_meta['signature-travel-section-37-title-link'] ) ) echo $signature_travel_stored_meta['signature-travel-section-37-title-link'][0];?>" />
            
            </p>
            
            <p> <!-- ==== SECTION #37 IMAGE ==== -->
              
              <label for="signature-travel-37-image" class="signature-travel-37-image"><?php _e( '<strong>Section &#35;37 Image</strong>', 'the-fly-shop' );?></label><br>
              <input type="text" style="width: 75%;" name="signature-travel-37-image" id="signature-travel-37-image" value="<?php if ( isset ( $signature_travel_stored_meta['signature-travel-37-image'] ) ) echo $signature_travel_stored_meta['signature-travel-37-image'][0];?>" /><br><br>
              <input type="button" id="signature-travel-37-image-button" class="button" value="<?php _e( 'Choose or Upload an Image', 'the-fly-shop' );?>" />
            
            </p>
            
            <p> <!-- ==== SECTION #37 SUB TITLE ==== -->
              
              <strong><label for="signature-travel-37-sub-title" class="signature-travel-37-sub-title"><?php _e( 'Section &#35;37 Sub Title', 'the-fly-shop' );?></label></strong><br>
              <input style="width:50%;" type="text" name="signature-travel-37-sub-title" id="signature-travel-37-sub-title" value="<?php if ( isset ( $signature_travel_stored_meta['signature-travel-37-sub-title'] ) ) echo $signature_travel_stored_meta['signature-travel-37-sub-title'][0];?>" />
            
            </p>
            
            <p> <!-- ==== SECTION #37 SUB TITLE CAPTION ==== -->
              
              <strong><label for="signature-travel-37-caption" class="signature-travel-37-caption"><?php _e( 'Section &#35;37 Sub Title Caption', 'the-fly-shop' );?></label></strong><br>
              <textarea style="width: 100%;" rows="4" name="signature-travel-37-caption" id="signature-travel-37-caption"><?php if ( isset ( $signature_travel_stored_meta['signature-travel-37-caption'] ) ) echo $signature_travel_stored_meta['signature-travel-37-caption'][0]; ?></textarea>
            
            </p>
          
          </div>
          
          <div role="tabpanel" class="tab-pane fade in" id="sectionsimage38">
            
            <p> <!-- ==== SECTION #38 TITLE ==== -->
              
              <strong><label for="signature-travel-section-38-title" class="signature-travel-section-38-title"><?php _e( 'Section &#35;38 Title', 'the-fly-shop' );?></label></strong><br>
              <input style="width:50%;" type="text" name="signature-travel-section-38-title" id="signature-travel-section-38-title" value="<?php if ( isset ( $signature_travel_stored_meta['signature-travel-section-38-title'] ) ) echo $signature_travel_stored_meta['signature-travel-section-38-title'][0];?>" />
            
            </p>
            
            <p> <!-- ==== SECTION #38 TITLE LINK ==== -->
              
              <strong><label for="signature-travel-section-38-title-link" class="signature-travel-section-38-title-link"><?php _e( 'Section &#35;38 Title Link', 'the-fly-shop' );?></label></strong><br>
              <input style="width:50%;" type="url" name="signature-travel-section-38-title-link" id="signature-travel-section-38-title-link" value="<?php if ( isset ( $signature_travel_stored_meta['signature-travel-section-38-title-link'] ) ) echo $signature_travel_stored_meta['signature-travel-section-38-title-link'][0];?>" />
            
            </p>
            
            <p> <!-- ==== SECTION #38 IMAGE ==== -->
              
              <label for="signature-travel-38-image" class="signature-travel-38-image"><?php _e( '<strong>Section &#35;38 Image</strong>', 'the-fly-shop' );?></label><br>
              <input type="text" style="width: 75%;" name="signature-travel-38-image" id="signature-travel-38-image" value="<?php if ( isset ( $signature_travel_stored_meta['signature-travel-38-image'] ) ) echo $signature_travel_stored_meta['signature-travel-38-image'][0];?>" /><br><br>
              <input type="button" id="signature-travel-38-image-button" class="button" value="<?php _e( 'Choose or Upload an Image', 'the-fly-shop' );?>" />
            
            </p>
            
            <p> <!-- ==== SECTION #38 SUB TITLE ==== -->
              
              <strong><label for="signature-travel-38-sub-title" class="signature-travel-38-sub-title"><?php _e( 'Section &#35;38 Sub Title', 'the-fly-shop' );?></label></strong><br>
              <input style="width:50%;" type="text" name="signature-travel-38-sub-title" id="signature-travel-38-sub-title" value="<?php if ( isset ( $signature_travel_stored_meta['signature-travel-38-sub-title'] ) ) echo $signature_travel_stored_meta['signature-travel-38-sub-title'][0];?>" />
            
            </p>
            
            <p> <!-- ==== SECTION #38 SUB TITLE CAPTION ==== -->
              
              <strong><label for="signature-travel-38-caption" class="signature-travel-38-caption"><?php _e( 'Section &#35;38 Sub Title Caption', 'the-fly-shop' );?></label></strong><br>
              <textarea style="width: 100%;" rows="4" name="signature-travel-38-caption" id="signature-travel-38-caption"><?php if ( isset ( $signature_travel_stored_meta['signature-travel-38-caption'] ) ) echo $signature_travel_stored_meta['signature-travel-38-caption'][0]; ?></textarea>
            
            </p>
          
          </div>
          
          <div role="tabpanel" class="tab-pane fade in" id="sectionsimage39">
            
            <p> <!-- ==== SECTION #39 TITLE ==== -->
              
              <strong><label for="signature-travel-section-39-title" class="signature-travel-section-39-title"><?php _e( 'Section &#35;39 Title', 'the-fly-shop' );?></label></strong><br>
              <input style="width:50%;" type="text" name="signature-travel-section-39-title" id="signature-travel-section-39-title" value="<?php if ( isset ( $signature_travel_stored_meta['signature-travel-section-39-title'] ) ) echo $signature_travel_stored_meta['signature-travel-section-39-title'][0];?>" />
            
            </p>
            
            <p> <!-- ==== SECTION #39 TITLE LINK ==== -->
              
              <strong><label for="signature-travel-section-39-title-link" class="signature-travel-section-39-title-link"><?php _e( 'Section &#35;39 Title Link', 'the-fly-shop' );?></label></strong><br>
              <input style="width:50%;" type="url" name="signature-travel-section-39-title-link" id="signature-travel-section-39-title-link" value="<?php if ( isset ( $signature_travel_stored_meta['signature-travel-section-39-title-link'] ) ) echo $signature_travel_stored_meta['signature-travel-section-39-title-link'][0];?>" />
            
            </p>
            
            <p> <!-- ==== SECTION #39 IMAGE ==== -->
              
              <label for="signature-travel-39-image" class="signature-travel-39-image"><?php _e( '<strong>Section &#35;39 Image</strong>', 'the-fly-shop' );?></label><br>
              <input type="text" style="width: 75%;" name="signature-travel-39-image" id="signature-travel-39-image" value="<?php if ( isset ( $signature_travel_stored_meta['signature-travel-39-image'] ) ) echo $signature_travel_stored_meta['signature-travel-39-image'][0];?>" /><br><br>
              <input type="button" id="signature-travel-39-image-button" class="button" value="<?php _e( 'Choose or Upload an Image', 'the-fly-shop' );?>" />
            
            </p>
            
            <p> <!-- ==== SECTION #39 SUB TITLE ==== -->
              
              <strong><label for="signature-travel-39-sub-title" class="signature-travel-39-sub-title"><?php _e( 'Section &#35;39 Sub Title', 'the-fly-shop' );?></label></strong><br>
              <input style="width:50%;" type="text" name="signature-travel-39-sub-title" id="signature-travel-39-sub-title" value="<?php if ( isset ( $signature_travel_stored_meta['signature-travel-39-sub-title'] ) ) echo $signature_travel_stored_meta['signature-travel-39-sub-title'][0];?>" />
            
            </p>
            
            <p> <!-- ==== SECTION #39 SUB TITLE CAPTION ==== -->
              
              <strong><label for="signature-travel-39-caption" class="signature-travel-39-caption"><?php _e( 'Section &#35;39 Sub Title Caption', 'the-fly-shop' );?></label></strong><br>
              <textarea style="width: 100%;" rows="4" name="signature-travel-39-caption" id="signature-travel-39-caption"><?php if ( isset ( $signature_travel_stored_meta['signature-travel-39-caption'] ) ) echo $signature_travel_stored_meta['signature-travel-39-caption'][0]; ?></textarea>
            
            </p>
          
          </div>
          
          <div role="tabpanel" class="tab-pane fade in" id="sectionsimage40">
            
            <p> <!-- ==== SECTION #40 TITLE ==== -->
              
              <strong><label for="signature-travel-section-40-title" class="signature-travel-section-40-title"><?php _e( 'Section &#35;40 Title', 'the-fly-shop' );?></label></strong><br>
              <input style="width:50%;" type="text" name="signature-travel-section-40-title" id="signature-travel-section-40-title" value="<?php if ( isset ( $signature_travel_stored_meta['signature-travel-section-40-title'] ) ) echo $signature_travel_stored_meta['signature-travel-section-40-title'][0];?>" />
            
            </p>
            
            <p> <!-- ==== SECTION #40 TITLE LINK ==== -->
              
              <strong><label for="signature-travel-section-40-title-link" class="signature-travel-section-40-title-link"><?php _e( 'Section &#35;40 Title Link', 'the-fly-shop' );?></label></strong><br>
              <input style="width:50%;" type="url" name="signature-travel-section-40-title-link" id="signature-travel-section-40-title-link" value="<?php if ( isset ( $signature_travel_stored_meta['signature-travel-section-40-title-link'] ) ) echo $signature_travel_stored_meta['signature-travel-section-40-title-link'][0];?>" />
            
            </p>
            
            <p> <!-- ==== SECTION #40 IMAGE ==== -->
              
              <label for="signature-travel-40-image" class="signature-travel-40-image"><?php _e( '<strong>Section &#35;40 Image</strong>', 'the-fly-shop' );?></label><br>
              <input type="text" style="width: 75%;" name="signature-travel-40-image" id="signature-travel-40-image" value="<?php if ( isset ( $signature_travel_stored_meta['signature-travel-40-image'] ) ) echo $signature_travel_stored_meta['signature-travel-40-image'][0];?>" /><br><br>
              <input type="button" id="signature-travel-40-image-button" class="button" value="<?php _e( 'Choose or Upload an Image', 'the-fly-shop' );?>" />
            
            </p>
            
            <p> <!-- ==== SECTION #40 SUB TITLE ==== -->
              
              <strong><label for="signature-travel-40-sub-title" class="signature-travel-40-sub-title"><?php _e( 'Section &#35;40 Sub Title', 'the-fly-shop' );?></label></strong><br>
              <input style="width:50%;" type="text" name="signature-travel-40-sub-title" id="signature-travel-40-sub-title" value="<?php if ( isset ( $signature_travel_stored_meta['signature-travel-40-sub-title'] ) ) echo $signature_travel_stored_meta['signature-travel-40-sub-title'][0];?>" />
            
            </p>
            
            <p> <!-- ==== SECTION #40 SUB TITLE CAPTION ==== -->
              
              <strong><label for="signature-travel-40-caption" class="signature-travel-40-caption"><?php _e( 'Section &#35;40 Sub Title Caption', 'the-fly-shop' );?></label></strong><br>
              <textarea style="width: 100%;" rows="4" name="signature-travel-40-caption" id="signature-travel-40-caption"><?php if ( isset ( $signature_travel_stored_meta['signature-travel-40-caption'] ) ) echo $signature_travel_stored_meta['signature-travel-40-caption'][0]; ?></textarea>
            
            </p>
          
          </div>
  
          <div role="tabpanel" class="tab-pane fade in" id="sectionsimage41">
    
            <p> <!-- ==== SECTION #41 TITLE ==== -->
      
              <strong><label for="signature-travel-section-41-title" class="signature-travel-section-41-title"><?php _e( 'Section &#35;41 Title', 'the-fly-shop' );?></label></strong><br>
              <input style="width:50%;" type="text" name="signature-travel-section-41-title" id="signature-travel-section-41-title" value="<?php if ( isset ( $signature_travel_stored_meta['signature-travel-section-41-title'] ) ) echo $signature_travel_stored_meta['signature-travel-section-41-title'][0];?>" />
    
            </p>
    
            <p> <!-- ==== SECTION #41 TITLE LINK ==== -->
      
              <strong><label for="signature-travel-section-41-title-link" class="signature-travel-section-41-title-link"><?php _e( 'Section &#35;41 Title Link', 'the-fly-shop' );?></label></strong><br>
              <input style="width:50%;" type="url" name="signature-travel-section-41-title-link" id="signature-travel-section-41-title-link" value="<?php if ( isset ( $signature_travel_stored_meta['signature-travel-section-41-title-link'] ) ) echo $signature_travel_stored_meta['signature-travel-section-41-title-link'][0];?>" />
    
            </p>
    
            <p> <!-- ==== SECTION #41 IMAGE ==== -->
      
              <label for="signature-travel-41-image" class="signature-travel-41-image"><?php _e( '<strong>Section &#35;41 Image</strong>', 'the-fly-shop' );?></label><br>
              <input type="text" style="width: 75%;" name="signature-travel-41-image" id="signature-travel-41-image" value="<?php if ( isset ( $signature_travel_stored_meta['signature-travel-41-image'] ) ) echo $signature_travel_stored_meta['signature-travel-41-image'][0];?>" /><br><br>
              <input type="button" id="signature-travel-41-image-button" class="button" value="<?php _e( 'Choose or Upload an Image', 'the-fly-shop' );?>" />
    
            </p>
    
            <p> <!-- ==== SECTION #41 SUB TITLE ==== -->
      
              <strong><label for="signature-travel-41-sub-title" class="signature-travel-41-sub-title"><?php _e( 'Section &#35;41 Sub Title', 'the-fly-shop' );?></label></strong><br>
              <input style="width:50%;" type="text" name="signature-travel-41-sub-title" id="signature-travel-41-sub-title" value="<?php if ( isset ( $signature_travel_stored_meta['signature-travel-41-sub-title'] ) ) echo $signature_travel_stored_meta['signature-travel-41-sub-title'][0];?>" />
    
            </p>
    
            <p> <!-- ==== SECTION #41 SUB TITLE CAPTION ==== -->
      
              <strong><label for="signature-travel-41-caption" class="signature-travel-41-caption"><?php _e( 'Section &#35;41 Sub Title Caption', 'the-fly-shop' );?></label></strong><br>
              <textarea style="width: 100%;" rows="4" name="signature-travel-41-caption" id="signature-travel-41-caption"><?php if ( isset ( $signature_travel_stored_meta['signature-travel-41-caption'] ) ) echo $signature_travel_stored_meta['signature-travel-41-caption'][0]; ?></textarea>
    
            </p>
  
          </div>
  
          <div role="tabpanel" class="tab-pane fade in" id="sectionsimage42">
    
            <p> <!-- ==== SECTION #42 TITLE ==== -->
      
              <strong><label for="signature-travel-section-42-title" class="signature-travel-section-42-title"><?php _e( 'Section &#35;42 Title', 'the-fly-shop' );?></label></strong><br>
              <input style="width:50%;" type="text" name="signature-travel-section-42-title" id="signature-travel-section-42-title" value="<?php if ( isset ( $signature_travel_stored_meta['signature-travel-section-42-title'] ) ) echo $signature_travel_stored_meta['signature-travel-section-42-title'][0];?>" />
    
            </p>
    
            <p> <!-- ==== SECTION #42 TITLE LINK ==== -->
      
              <strong><label for="signature-travel-section-42-title-link" class="signature-travel-section-42-title-link"><?php _e( 'Section &#35;42 Title Link', 'the-fly-shop' );?></label></strong><br>
              <input style="width:50%;" type="url" name="signature-travel-section-42-title-link" id="signature-travel-section-42-title-link" value="<?php if ( isset ( $signature_travel_stored_meta['signature-travel-section-42-title-link'] ) ) echo $signature_travel_stored_meta['signature-travel-section-42-title-link'][0];?>" />
    
            </p>
    
            <p> <!-- ==== SECTION #42 IMAGE ==== -->
      
              <label for="signature-travel-42-image" class="signature-travel-42-image"><?php _e( '<strong>Section &#35;42 Image</strong>', 'the-fly-shop' );?></label><br>
              <input type="text" style="width: 75%;" name="signature-travel-42-image" id="signature-travel-42-image" value="<?php if ( isset ( $signature_travel_stored_meta['signature-travel-42-image'] ) ) echo $signature_travel_stored_meta['signature-travel-42-image'][0];?>" /><br><br>
              <input type="button" id="signature-travel-42-image-button" class="button" value="<?php _e( 'Choose or Upload an Image', 'the-fly-shop' );?>" />
    
            </p>
    
            <p> <!-- ==== SECTION #42 SUB TITLE ==== -->
      
              <strong><label for="signature-travel-42-sub-title" class="signature-travel-42-sub-title"><?php _e( 'Section &#35;42 Sub Title', 'the-fly-shop' );?></label></strong><br>
              <input style="width:50%;" type="text" name="signature-travel-42-sub-title" id="signature-travel-42-sub-title" value="<?php if ( isset ( $signature_travel_stored_meta['signature-travel-42-sub-title'] ) ) echo $signature_travel_stored_meta['signature-travel-42-sub-title'][0];?>" />
    
            </p>
    
            <p> <!-- ==== SECTION #42 SUB TITLE CAPTION ==== -->
      
              <strong><label for="signature-travel-42-caption" class="signature-travel-42-caption"><?php _e( 'Section &#35;42 Sub Title Caption', 'the-fly-shop' );?></label></strong><br>
              <textarea style="width: 100%;" rows="4" name="signature-travel-42-caption" id="signature-travel-42-caption"><?php if ( isset ( $signature_travel_stored_meta['signature-travel-42-caption'] ) ) echo $signature_travel_stored_meta['signature-travel-42-caption'][0]; ?></textarea>
    
            </p>
  
          </div>
        </div>
      </div>
    </div>
  </div>
  
  
  <?php
}
