<?php

function verticle_slider_settings_page() {
if (!current_user_can('manage_options')) {
	return;
}
?>
	<div class="wrap">
		<h2>Footer Vertical Carousel</h2>
		<form method="post" action="options.php" id="editor-publication-form-grid">
			<!-- Row #1 -->
			<div class="form-row">
				<h2>Slider  &#35;1</h2>
				<label class="form-label" for="title1">Title</label>
				<input name="title1" type="text" id="title1" class="regular-text form-input" value="<?php echo esc_attr( get_option('title1') ); ?>">
				
				<label class="form-label" for="subtitle1">Sub Title</label>
				<input name="subtitle1" type="text" id="subtitle1" class="regular-text form-input" value="<?php echo esc_attr( get_option('subtitle1') ); ?>">
				
				<label class="form-label" for="link1">Link</label>
				<input name="link1" type="text" id="link1" class="regular-text form-input" value="<?php echo esc_attr( get_option('link1') ); ?>">
				
				<label class="form-label" for="description1">Description</label>
				<textarea name="description1" id="description1" rows="10" class="regular-text form-input"><?php echo esc_textarea( get_option('description1') ); ?></textarea>
				
				<label class="form-label" for="image_url">Image</label>
				<input id="image_url1" name="image1" type="text" class="regular-text form-input" value="<?php echo esc_url( get_option('image1') ); ?>">
				<input id="upload_image_button1" type="button" class="button form-input" value="Upload Image" />
			
			</div>
			<!-- Row #2 -->
			<div class="form-row">
				<h2>Slider  &#35;2</h2>
				<label class="form-label" for="title2">Title</label>
				<input name="title2" type="text" id="title2" class="regular-text form-input" value="<?php echo esc_attr( get_option('title2') ); ?>">
				
				<label class="form-label" for="subtitle2">Sub Title</label>
				<input name="subtitle2" type="text" id="subtitle2" class="regular-text form-input" value="<?php echo esc_attr( get_option('subtitle2') ); ?>">
				
				<label class="form-label" for="link2">Link</label>
				<input name="link2" type="text" id="link2" class="regular-text form-input" value="<?php echo esc_attr( get_option('link2') ); ?>">
				
				<label class="form-label" for="description2">Description</label>
				<textarea name="description2" id="description2" rows="10" class="regular-text form-input"><?php echo esc_textarea( get_option('description2') ); ?></textarea>
				
				<label class="form-label" for="image_url">Image</label>
				<input id="image_url2" name="image2" type="text" class="regular-text form-input" value="<?php echo esc_url( get_option('image2') ); ?>">
				<input id="upload_image_button2" type="button" class="button form-input" value="Upload Image" />
			
			</div>
			<!-- Row #3 -->
			<div class="form-row">
				
				<h2>Slider  &#35;3</h2>
				
				<label class="form-label" for="title3">Title</label>
				<input name="title3" type="text" id="title3" class="regular-text form-input" value="<?php echo esc_attr( get_option('title3') ); ?>">
				
				<label class="form-label" for="subtitle3">Sub Title</label>
				<input name="subtitle3" type="text" id="subtitle3" class="regular-text form-input" value="<?php echo esc_attr( get_option('subtitle3') ); ?>">
				
				<label class="form-label" for="link3">Link</label>
				<input name="link3" type="text" id="link3" class="regular-text form-input" value="<?php echo esc_attr( get_option('link3') ); ?>">
				
				<label class="form-label" for="description3">Description</label>
				<textarea name="description3" id="description3" rows="10" class="regular-text form-input"><?php echo esc_textarea( get_option('description3') ); ?></textarea>
				
				<label class="form-label" for="image_url">Image</label>
				<input id="image_url3" name="image3" type="text" class="regular-text form-input" value="<?php echo esc_url( get_option('image3') ); ?>">
				<input id="upload_image_button3" type="button" class="button form-input" value="Upload Image" />
			
			</div>
			<!-- Row #4 -->
			<div class="form-row">
				
				<h2>Slider  &#35;4</h2>
				
				<label class="form-label" for="title4">Title</label>
				<input name="title4" type="text" id="title4" class="regular-text form-input" value="<?php echo esc_attr( get_option('title4') ); ?>">
				
				<label class="form-label" for="subtitle4">Sub Title</label>
				<input name="subtitle4" type="text" id="subtitle4" class="regular-text form-input" value="<?php echo esc_attr( get_option('subtitle4') ); ?>">
				
				<label class="form-label" for="link4">Link</label>
				<input name="link4" type="text" id="link4" class="regular-text form-input" value="<?php echo esc_attr( get_option('link4') ); ?>">
				
				<label class="form-label" for="description4">Description</label>
				<textarea name="description4" id="description4" rows="10" class="regular-text form-input"><?php echo esc_textarea( get_option('description4') ); ?></textarea>
				
				<label class="form-label" for="image_url">Image</label>
				<input id="image_url4" name="image4" type="text" class="regular-text form-input" value="<?php echo esc_url( get_option('image4') ); ?>">
				<input id="upload_image_button4" type="button" class="button form-input" value="Upload Image" />
			
			</div>
			<!-- Row #5 -->
			<div class="form-row">
				
				<h2>Slider  &#35;5</h2>
				
				<label class="form-label" for="title5">Title</label>
				<input name="title5" type="text" id="title5" class="regular-text form-input" value="<?php echo esc_attr( get_option('title5') ); ?>">
				
				<label class="form-label" for="subtitle5">Sub Title</label>
				<input name="subtitle5" type="text" id="subtitle5" class="regular-text form-input" value="<?php echo esc_attr( get_option('subtitle5') ); ?>">
				
				<label class="form-label" for="link5">Link</label>
				<input name="link5" type="text" id="link5" class="regular-text form-input" value="<?php echo esc_attr( get_option('link5') ); ?>">
				
				<label class="form-label" for="description5">Description</label>
				<textarea name="description5" id="description5" rows="10" class="regular-text form-input"><?php echo esc_textarea( get_option('description5') ); ?></textarea>
				
				<label class="form-label" for="image_url">Image</label>
				<input id="image_url5" name="image5" type="text" class="regular-text form-input" value="<?php echo esc_url( get_option('image5') ); ?>">
				<input id="upload_image_button5" type="button" class="button form-input" value="Upload Image" />
			
			</div>
			<!-- Row #6 -->
			<div class="form-row">
				
				<h2>Slider  &#35;6</h2>
				
				<label class="form-label" for="title6">Title</label>
				<input name="title6" type="text" id="title6" class="regular-text form-input" value="<?php echo esc_attr( get_option('title6') ); ?>">
				
				<label class="form-label" for="subtitle6">Sub Title</label>
				<input name="subtitle6" type="text" id="subtitle6" class="regular-text form-input" value="<?php echo esc_attr( get_option('subtitle6') ); ?>">
				
				<label class="form-label" for="link6">Link</label>
				<input name="link6" type="text" id="link6" class="regular-text form-input" value="<?php echo esc_attr( get_option('link6') ); ?>">
				
				<label class="form-label" for="description6">Description</label>
				<textarea name="description6" id="description6" rows="10" class="regular-text form-input"><?php echo esc_textarea( get_option('description6') ); ?></textarea>
				
				<label class="form-label" for="image_url">Image</label>
				<input id="image_url6" name="image6" type="text" class="regular-text form-input" value="<?php echo esc_url( get_option('image6') ); ?>">
				<input id="upload_image_button6" type="button" class="button form-input" value="Upload Image" />
			
			</div>
			<!-- Row #7 -->
			<div class="form-row">
				
				<h2>Slider  &#35;7</h2>
				
				<label class="form-label" for="title7">Title</label>
				<input name="title7" type="text" id="title7" class="regular-text form-input" value="<?php echo esc_attr( get_option('title7') ); ?>">
				
				<label class="form-label" for="subtitle7">Sub Title</label>
				<input name="subtitle7" type="text" id="subtitle7" class="regular-text form-input" value="<?php echo esc_attr( get_option('subtitle7') ); ?>">
				
				<label class="form-label" for="link7">Link</label>
				<input name="link7" type="text" id="link7" class="regular-text form-input" value="<?php echo esc_attr( get_option('link7') ); ?>">
				
				<label class="form-label" for="description7">Description</label>
				<textarea name="description7" id="description7" rows="10" class="regular-text form-input"><?php echo esc_textarea( get_option('description7') ); ?></textarea>
				
				<label class="form-label" for="image_url">Image</label>
				<input id="image_url7" name="image7" type="text" class="regular-text form-input" value="<?php echo esc_url( get_option('image7') ); ?>">
				<input id="upload_image_button7" type="button" class="button form-input" value="Upload Image" />
			
			</div>
			<!-- Row #8 -->
			<div class="form-row">
				
				<h2>Slider  &#35;8</h2>
				
				<label class="form-label" for="title8">Title</label>
				<input name="title8" type="text" id="title8" class="regular-text form-input" value="<?php echo esc_attr( get_option('title8') ); ?>">
				
				<label class="form-label" for="subtitle8">Sub Title</label>
				<input name="subtitle8" type="text" id="subtitle8" class="regular-text form-input" value="<?php echo esc_attr( get_option('subtitle8') ); ?>">
				
				<label class="form-label" for="link8">Link</label>
				<input name="link8" type="text" id="link8" class="regular-text form-input" value="<?php echo esc_attr( get_option('link8') ); ?>">
				
				<label class="form-label" for="description8">Description</label>
				<textarea name="description8" id="description8" rows="10" class="regular-text form-input"><?php echo esc_textarea( get_option('description8') ); ?></textarea>
				
				<label class="form-label" for="image_url">Image</label>
				<input id="image_url8" name="image8" type="text" class="regular-text form-input" value="<?php echo esc_url( get_option('image8') ); ?>">
				<input id="upload_image_button8" type="button" class="button form-input" value="Upload Image" />
			
			</div>
			
			<?php
			settings_fields( 'meta_field_content_settings' );
			do_settings_sections( 'meta_field_content_settings' );
			submit_button();
			?>
		
		</form>
	</div>

<?php } ?>