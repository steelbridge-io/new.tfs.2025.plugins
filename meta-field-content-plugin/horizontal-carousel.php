<?php

/**
 * Renders the settings page for the horizontal slider.
 *
 * Checks if the current user has the capability to manage options. If not, the function returns early.
 * If the user has the capability, the function renders the settings page HTML.
 *
 * @return void
 */
function horizontal_slider_settings_page() {
	if (!current_user_can('manage_options')) {
		return;
	}
	?>
	<div class="wrap">
		<h2>Front Page Horizontal Carousel</h2>
		<form method="post" action="options.php" id="editor-publication-form-grid">
            
            <!-- Slider #1 -->
			<div class="form-row">
            
            <h2>Slider &#35;1</h2>
            
			<label class="form-label" for="hs_title1">Title</label>
			<input name="hs_title1" type="text" id="hs_title1" class="regular-text form-input" value="<?php echo esc_attr( get_option('hs_title1') ); ?>">
   
			<label class="form-label" for="hs_subtitle1">Sub Title</label>
			<input name="hs_subtitle1" type="text" id="hs_subtitle1" class="regular-text form-input" value="<?php echo esc_attr( get_option('hs_subtitle1') ); ?>">
			
			<label class="form-label" for="hs_description1">Description</label>
			<textarea name="hs_description1" id="hs_description1" rows="10"
			          class="regular-text form-input"><?php echo esc_textarea
				( get_option('hs_description1') ); ?></textarea>
            
            <label class="form-label" for="hs_link1">Link</label>
            <input name="hs_link1" type="text" id="hs_link1" class="regular-text form-input" value="<?php echo esc_attr( get_option('hs_link1') ); ?>">
            
			<label class="form-label" for="hs_image_url1">Image</label>
			<input id="hs_image_url1" name="hs_image1" type="text" class="regular-text form-input"
			       value="<?php echo esc_url( get_option('hs_image1') ); ?>">
          
			<input id="hs_upload_image_button1" type="button" class="button form-input" value="Upload Image" />
   
			</div>
			
            <!-- Slider #2 -->
			<div class="form-row">
                
                <h2>Slider &#35;2</h2>
                
				<label class="form-label" for="hs_title2">Title</label>
				<input name="hs_title2" type="text" id="hs_title2" class="regular-text form-input" value="<?php echo esc_attr( get_option('hs_title2') ); ?>">
    
				<label class="form-label" for="hs_subtitle2">Sub Title</label>
				<input name="hs_subtitle2" type="text" id="hs_subtitle2" class="regular-text form-input" value="<?php echo esc_attr( get_option('hs_subtitle2') ); ?>">
				
				<label class="form-label" for="hs_description2">Description</label>
				<textarea name="hs_description2" id="hs_description2" rows="10"
				          class="regular-text form-input"><?php echo esc_textarea
					( get_option('hs_description2') ); ?></textarea>
                
                <label class="form-label" for="hs_link2">Link</label>
                <input name="hs_link2" type="text" id="hs_link2" class="regular-text form-input" value="<?php echo esc_attr( get_option('hs_link2') ); ?>">
                
				<label class="form-label" for="hs_image_url2">Image</label>
				<input id="hs_image_url2" name="hs_image2" type="text" class="regular-text form-input"
				       value="<?php echo esc_url( get_option('hs_image2') ); ?>">
				<input id="hs_upload_image_button2" type="button" class="button form-input" value="Upload Image" />
    
			</div>
			
            <!-- Slider #3 -->
			<div class="form-row">
                
                <h2>Slider &#35;3</h2>
                
				<label class="form-label" for="hs_title3">Title</label>
				<input name="hs_title3" type="text" id="hs_title3" class="regular-text form-input" value="<?php echo esc_attr( get_option('hs_title3') ); ?>">
    
				<label class="form-label" for="hs_subtitle3">Sub Title</label>
				<input name="hs_subtitle3" type="text" id="hs_subtitle3" class="regular-text form-input" value="<?php echo esc_attr( get_option('hs_subtitle3') ); ?>">
				
				<label class="form-label" for="hs_description3">Description</label>
				<textarea name="hs_description3" id="hs_description3" rows="10"
				          class="regular-text form-input"><?php echo esc_textarea
					( get_option('hs_description3') ); ?></textarea>

                <label class="form-label" for="hs_link3">Link</label>
                <input name="hs_link3" type="text" id="hs_link3" class="regular-text form-input" value="<?php echo esc_attr( get_option('hs_link3') ); ?>">
				
				<label class="form-label" for="hs_image_url3">Image</label>
				<input id="hs_image_url3" name="hs_image3" type="text" class="regular-text form-input"
				       value="<?php echo esc_url( get_option('hs_image3') ); ?>">
				<input id="hs_upload_image_button3" type="button" class="button form-input" value="Upload Image" />
    
			</div>
			
            <!-- Slider #4 -->
			<div class="form-row">
                
                <h2>Slider &#35;4</h2>
                
				<label class="form-label" for="hs_title4">Title</label>
				<input name="hs_title4" type="text" id="hs_title4" class="regular-text form-input" value="<?php echo esc_attr( get_option('hs_title4') ); ?>">
    
				<label class="form-label" for="hs_subtitle4">Sub Title</label>
				<input name="hs_subtitle4" type="text" id="hs_subtitle4" class="regular-text form-input" value="<?php echo esc_attr( get_option('hs_subtitle4') ); ?>">
				
				<label class="form-label" for="hs_description4">Description</label>
				<textarea name="hs_description4" id="hs_description4" rows="10"
				          class="regular-text form-input"><?php echo esc_textarea
					( get_option('hs_description4') ); ?></textarea>

                <label class="form-label" for="hs_link4">Link</label>
                <input name="hs_link4" type="text" id="hs_link4" class="regular-text form-input" value="<?php echo esc_attr( get_option('hs_link4') ); ?>">
				
				<label class="form-label" for="hs_image_url4">Image</label>
				<input id="hs_image_url4" name="hs_image4" type="text" class="regular-text form-input"
				       value="<?php echo esc_url( get_option('hs_image4') ); ?>">
           
				<input id="hs_upload_image_button4" type="button" class="button form-input" value="Upload Image" />
    
			</div>
			
            <!-- Slider #5 -->
			<div class="form-row">
                
                <h2>Slider &#35;5</h2>
                
				<label class="form-label" for="hs_title5">Title</label>
				<input name="hs_title5" type="text" id="hs_title5" class="regular-text form-input" value="<?php echo esc_attr( get_option('hs_title5') ); ?>">
    
				<label class="form-label" for="hs_subtitle5">Sub Title</label>
				<input name="hs_subtitle5" type="text" id="hs_subtitle5" class="regular-text form-input" value="<?php echo esc_attr( get_option('hs_subtitle5') ); ?>">
				
				<label class="form-label" for="hs_description5">Description</label>
				<textarea name="hs_description5" id="hs_description5" rows="10"
				          class="regular-text form-input"><?php echo esc_textarea
					( get_option('hs_description5') ); ?></textarea>

                <label class="form-label" for="hs_link5">Link</label>
                <input name="hs_link5" type="text" id="hs_link5" class="regular-text form-input" value="<?php echo esc_attr( get_option('hs_link5') ); ?>">
				
				<label class="form-label" for="hs_image_url5">Image</label>
				<input id="hs_image_url5" name="hs_image5" type="text" class="regular-text form-input"
				       value="<?php echo esc_url( get_option('hs_image5') ); ?>">
           
				<input id="hs_upload_image_button5" type="button" class="button form-input" value="Upload Image" />
    
			</div>
			
            <!-- Slider #6 -->
			<div class="form-row">
                
                <h2>Slider &#35;6</h2>
                
				<label class="form-label" for="hs_title6">Title</label>
				<input name="hs_title6" type="text" id="hs_title6" class="regular-text form-input" value="<?php echo esc_attr( get_option('hs_title6') ); ?>">
    
				<label class="form-label" for="hs_subtitle6">Sub Title</label>
				<input name="hs_subtitle6" type="text" id="hs_subtitle6" class="regular-text form-input" value="<?php echo esc_attr( get_option('hs_subtitle6') ); ?>">
				
				<label class="form-label" for="hs_description6">Description</label>
				<textarea name="hs_description6" id="hs_description6" rows="10"
				          class="regular-text form-input"><?php echo esc_textarea
					( get_option('hs_description6') ); ?></textarea>

                <label class="form-label" for="hs_link6">Link</label>
                <input name="hs_link6" type="text" id="hs_link6" class="regular-text form-input" value="<?php echo esc_attr( get_option('hs_link6') ); ?>">
				
				<label class="form-label" for="hs_image_url6">Image</label>
				<input id="hs_image_url6" name="hs_image6" type="text" class="regular-text form-input"
				       value="<?php echo esc_url( get_option('hs_image6') ); ?>">
           
				<input id="hs_upload_image_button6" type="button" class="button form-input" value="Upload Image" />
    
			</div>
			
            <!-- Slider #7 -->
			<div class="form-row">
                
                <h2>Slider &#35;7</h2>
                
				<label class="form-label" for="hs_title7">Title</label>
				<input name="hs_title7" type="text" id="hs_title7" class="regular-text form-input" value="<?php echo esc_attr( get_option('hs_title7') ); ?>">
    
				<label class="form-label" for="hs_subtitle7">Sub Title</label>
				<input name="hs_subtitle7" type="text" id="hs_subtitle7" class="regular-text form-input" value="<?php echo esc_attr( get_option('hs_subtitle7') ); ?>">
				
				<label class="form-label" for="hs_description7">Description</label>
				<textarea name="hs_description7" id="hs_description7" rows="10"
				          class="regular-text form-input"><?php echo esc_textarea
					( get_option('hs_description7') ); ?></textarea>

                <label class="form-label" for="hs_link7">Link</label>
                <input name="hs_link7" type="text" id="hs_link7" class="regular-text form-input" value="<?php echo esc_attr( get_option('hs_link7') ); ?>">
                
				<label class="form-label" for="hs_image_url7">Image</label>
				<input id="hs_image_url7" name="hs_image7" type="text" class="regular-text form-input"
				       value="<?php echo esc_url( get_option('hs_image7') ); ?>">
           
				<input id="hs_upload_image_button7" type="button" class="button form-input" value="Upload Image" />
    
			</div>
			
            <!-- Slider #8 -->
			<div class="form-row">
                
                <h2>Slider &#35;8</h2>
                
				<label class="form-label" for="hs_title8">Title</label>
				<input name="hs_title8" type="text" id="hs_title8" class="regular-text form-input" value="<?php echo esc_attr( get_option('hs_title8') ); ?>">
    
				<label class="form-label" for="hs_subtitle8">Sub Title</label>
				<input name="hs_subtitle8" type="text" id="hs_subtitle8" class="regular-text form-input" value="<?php echo esc_attr( get_option('hs_subtitle8') ); ?>">
				
				<label class="form-label" for="hs_description8">Description</label>
				<textarea name="hs_description8" id="hs_description8" rows="10"
				          class="regular-text form-input"><?php echo esc_textarea
					( get_option('hs_description8') ); ?></textarea>

                <label class="form-label" for="hs_link8">Link</label>
                <input name="hs_link8" type="text" id="hs_link8" class="regular-text form-input" value="<?php echo esc_attr( get_option('hs_link8') ); ?>">
				
				<label class="form-label" for="hs_image_url8">Image</label>
				<input id="hs_image_url8" name="hs_image8" type="text" class="regular-text form-input"
				       value="<?php echo esc_url( get_option('hs_image8') ); ?>">
           
				<input id="hs_upload_image_button8" type="button" class="button form-input" value="Upload Image" />
    
			</div>
			
<?php
			settings_fields( 'hs_meta_field_content_settings' );
			do_settings_sections( 'hs_meta_field_content_settings' );
			submit_button();
			?>
   
		</form>
	</div>
<?php
}
?>