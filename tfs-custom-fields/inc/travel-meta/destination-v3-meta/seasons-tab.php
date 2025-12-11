<div class="seasons-container">
<h3><?php echo 'Travel Seasons' ?></h3>
<p><!-- Feature #2 Seasons -->
 <strong><label for="feature-2-seasons-title" class="sbm-row-title"><?php _e( 'Title', 'tfs-travel-textdomain' )?></label></strong>
 <input style="width: 100%;" type="text" name="feature-2-seasons-title" id="feature-2-seasons-title" value="<?php if ( isset ( $sbm_stored_travel_meta['feature-2-seasons-title'] ) ) echo $sbm_stored_travel_meta['feature-2-seasons-title'][0]; ?>" />
</p>
<!-- Feature #2 Image -->
<div class="meta-field-container">

 <strong><label for="travel-seasons-image" class="sbm-row-title"><?php _e( 'Travel Seasons Image', 'the-fly-shop' );?></label></strong><br>
 <input style="width:75%;" type="text" name="travel-seasons-image" id="travel-seasons-image" value="<?php if ( isset ( $sbm_stored_travel_meta['travel-seasons-image'] ) ) echo $sbm_stored_travel_meta['travel-seasons-image'][0];?>" />
 <input type="button" id="travel-seasons-image-button" class="button" value="<?php _e( 'Choose or Upload an Image', 'the-fly-shop' );?>" />

 <!-- Preview container -->
 <div id="travel-seasons-image-preview" style="margin-top: 10px;">
  <?php if ( isset( $sbm_stored_travel_meta['travel-seasons-image'] ) && $sbm_stored_travel_meta['travel-seasons-image'][0] != '' ) : ?>
   <img src="<?php echo esc_url( $sbm_stored_travel_meta['travel-seasons-image'][0] ); ?>"
        style="max-width: 250px; max-height: 250px; border: 1px solid #ddd; padding: 5px;"
        alt="Preview" />
   <br><button type="button" id="travel-seasons-image-remove" class="button" style="margin-top: 5px;">Remove Image</button>
  <?php endif; ?>
 </div>
</div>
<!-- Seasons Video URL -->
<div class="meta-field-container">
 <strong><label for="feature_2_video_url" class="sbm-row-title"><?php _e( 'Seasons Video URL', 'tfs-travel-textdomain' ); ?></label></strong>
 <input
  type="url"
  name="feature_2_video_url"
  id="feature_2_video_url"
  style="width: 100%;"
  placeholder="https://example.com/path/video.mp4"
  value="<?php
  if ( isset( $sbm_stored_travel_meta['feature_2_video_url'] ) ) {
   echo esc_attr( $sbm_stored_travel_meta['feature_2_video_url'][0] );
  }
  ?>"
 />
 <p class="description"><?php _e( 'Add a direct video URL (e.g., MP4). Playback is user-initiated via controls. Poster uses the Travel Costs image if set.', 'tfs-travel-textdomain' ); ?></p>
</div>

<?php
$feature_2_video_current = isset( $sbm_stored_travel_meta['feature_2_video_url'] )
 ? trim( (string) $sbm_stored_travel_meta['feature_1_video_url'][0] )
 : '';
$travel_seasons_poster = isset( $sbm_stored_travel_meta['travel-seasons-image'] )
 ? trim( (string) $sbm_stored_travel_meta['travel-seasons-image'][0] )
 : '';
?>
<div id="feature-2-video-preview" style="margin-top:10px; <?php echo $feature_2_video_current ? '' : 'display:none;'; ?>">
 <video
  id="feature-2-video"
  controls
  playsinline
  preload="metadata"
  style="max-width:24%;height:auto;"
  <?php if ( $travel_costs_poster ) : ?>
   poster="<?php echo esc_url( $travel_seasons_poster ); ?>"
  <?php endif; ?>
 >
  <?php if ( $feature_2_video_current ) : ?>
   <source src="<?php echo esc_url( $feature_2_video_current ); ?>" type="video/mp4" />
  <?php endif; ?>
  <?php _e( 'Your browser does not support the video tag.', 'tfs-travel-textdomain' ); ?>
 </video>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        var input = document.getElementById('feature_2_video_url');
        var previewWrap = document.getElementById('feature-2-video-preview');
        var video = document.getElementById('feature-2-video');
        if (!input || !previewWrap || !video) return;

        input.addEventListener('input', function () {
            var url = (this.value || '').trim();
            if (url) {
                var source = video.querySelector('source');
                if (!source) {
                    source = document.createElement('source');
                    source.type = 'video/mp4';
                    video.appendChild(source);
                }
                source.src = url;
                video.load();
                previewWrap.style.display = 'block';
            } else {
                previewWrap.style.display = 'none';
            }
        });
    });
</script>

<!-- TABED SEASONS SECTION
-------------------------------------------------------------->
<div class="panel with-nav-tabs panel-default">
 <div class="panel-heading">
  <!-- Nav tabs -->
  <ul class="nav nav-tabs" role="tablist">
   <li role="presentation" class="active"><a href="#basicseason" aria-controls="basicseason" role="tab" data-toggle="tab">Basic Season</a></li>
   <li role="presentation"><a href="#hilowseason" aria-controls="hilowseason" role="tab" data-toggle="tab">High / Low Season</a></li>
   <li role="presentation"><a href="#monthlyrange" aria-controls="monthlyrange" role="tab" data-toggle="tab">Monthly Range</a></li>
  </ul>

  <!-- Tab panes -->
  <div class="panel-body boof">
   <div class="tab-content">
    <div role="tabpanel" class="tab-pane fade in active" id="basicseason">

     <p><!-- Seasons content/text area -->
      <strong><label for="feature-2-seasons-content" class="sbm-row-title"><?php _e( 'Seasons Content', 'tfs-travel-textdomain' )?></label></strong>

      <textarea style="width: 100%;" rows="4" name="feature-2-seasons-content" id="feature-2-seasons-content"><?php if (isset( $sbm_stored_travel_meta['feature-2-seasons-content'] ) ) echo $sbm_stored_travel_meta['feature-2-seasons-content'][0]; ?></textarea>
     </p>

     <p><!-- Seasons Read More -->
      <!-- <strong><label for="feature-2-read-more-info" class="sbm-row-title"><?php //_e( 'Read More Info', 'sbm-textdomain' )?></label></strong>
                            <input style="width: 100%;" type="text" name="feature-2-read-more-info" id="feature-2-read-more-info" placeholder="Add Read More Info" value="<?php //if ( isset ( $sbm_stored_travel_meta['feature-2-read-more-info'] ) ) echo $sbm_stored_travel_meta['feature-2-read-more-info'][0]; ?>" /> -->

      <strong><label for="feature-2-seasons-readmore" class="sbm-row-title"><?php _e( 'Read more', 'tfs-travel-textdomain' )?></label></strong>
      <textarea style="width: 100%;" rows="4" name="feature-2-seasons-readmore" id="feature-2-seasons-readmore"><?php if ( isset ( $sbm_stored_travel_meta['feature-2-seasons-readmore'] ) ) echo $sbm_stored_travel_meta['feature-2-seasons-readmore'][0]; ?></textarea>
     </p>
    </div> <!-- /tabpanel -->

    <div role="tabpanel" class="tab-pane fade" id="hilowseason">

     <!-- ==== Add Hi/Lo Section ==== -->
     <span class="travel-row-title"><?php _e( '<strong>Display Hi/Lo Fishing Seasons</strong>', 'tfs-travel-textdomain' )?></span>
     <div class="travel-row-content">
      <label for="high-low-checkbox">
       <input type="checkbox" name="high-low-checkbox" id="high-low-checkbox" value="yes" <?php if ( isset ( $sbm_stored_travel_meta['high-low-checkbox'] ) ) checked( $sbm_stored_travel_meta['high-low-checkbox'][0], 'yes' ); ?> />
       <?php _e( 'Check box to activate Hi/Lo seasons.', 'tfs-travel-textdomain' )?>
      </label>
     </div>

     <p><!-- Seasons hi/lo content/text area -->
      <strong><label for="feature-2-seasons-hi-lo-content" class="sbm-row-title"><?php _e( 'Seasons Hi/Lo Content', 'tfs-travel-textdomain' )?></label></strong>
      <textarea style="width: 100%;" rows="4" name="feature-2-seasons-hi-lo-content" id="feature-2-seasons-hi-lo-content"><?php if ( isset ( $sbm_stored_travel_meta['feature-2-seasons-hi-lo-content'] ) ) echo $sbm_stored_travel_meta['feature-2-seasons-hi-lo-content'][0]; ?></textarea>
     </p>

     <p><!-- Seasons High Season -->
      <strong><label for="feature-2-seasons-hiseason" class="sbm-row-title"><?php _e( 'High Season', 'tfs-travel-textdomain' )?></label></strong>
      <textarea style="width: 100%;" rows="4" name="feature-2-seasons-hiseason" id="feature-2-seasons-hiseason"><?php if ( isset ( $sbm_stored_travel_meta['feature-2-seasons-hiseason'] ) ) echo $sbm_stored_travel_meta['feature-2-seasons-hiseason'][0]; ?></textarea>
     </p>

     <p><!-- Seasons Low Season -->
      <strong><label for="feature-2-seasons-lowseason" class="sbm-row-title"><?php _e( 'Low Season', 'tfs-travel-textdomain' )?></label></strong>
      <textarea style="width: 100%;" rows="4" name="feature-2-seasons-lowseason" id="feature-2-seasons-lowseason"><?php if ( isset ( $sbm_stored_travel_meta['feature-2-seasons-lowseason'] ) ) echo $sbm_stored_travel_meta['feature-2-seasons-lowseason'][0]; ?></textarea>
     </p>
    </div>


    <!-- Monthly Range Tab -->
    <div role="tabpanel" class="tab-pane fade" id="monthlyrange">
     <div class="meta-field-container">
      <strong><label for="multi-season-calendar-title" class="sbm-row-title"><?php _e( 'Season Calendar Title', 'tfs-travel-textdomain' )?></label></strong>
      <input style="width: 100%;" type="text" name="multi-season-calendar-title" id="multi-season-calendar-title" value="<?php if ( isset ($sbm_stored_travel_meta['multi-season-calendar-title'] ) ) echo $sbm_stored_travel_meta['multi-season-calendar-title'][0]; ?>" />
     </div>

     <p>
      <span class="travel-row-title"><?php _e( '<strong>Display Monthly Season Range</strong>', 'tfs-travel-textdomain' )?></span>
     <div class="travel-row-content">
      <label for="monthly-range-checkbox">
       <input type="checkbox" name="monthly-range-checkbox" id="monthly-range-checkbox" value="yes" <?php if ( isset ( $sbm_stored_travel_meta['monthly-range-checkbox'] ) ) checked( $sbm_stored_travel_meta['monthly-range-checkbox'][0], 'yes' ); ?> />
       <?php _e( 'Check box to activate Monthly Range display.', 'tfs-travel-textdomain' )?>
      </label>
     </div>
     </p>

     <div class="season-range-controls" style="margin: 20px 0;">
      <h4>Multiple Season Range Settings</h4>
      <p style="margin-bottom: 15px;"><em>Configure up to 3 separate fishing seasons. Use partial months (like "early", "mid", "late") to show transitional periods.</em></p>

      <!-- Season 1 -->
      <div class="season-group" style="border: 1px solid #ddd; padding: 15px; margin-bottom: 20px; background: #f9f9f9;">
       <h5 style="margin-top: 0;">Season 1 - Primary Season</h5>

       <div style="display: flex; gap: 15px; align-items: center; margin-bottom: 15px; flex-wrap: wrap;">
        <div>
         <strong><label for="season1-start-month">Start Month:</label></strong><br>
         <select name="season1-start-month" id="season1-start-month" style="width: 130px;">
          <option value="0">Not Set</option>
          <?php
          $months = array(1 => 'January', 2 => 'February', 3 => 'March', 4 => 'April', 5 => 'May', 6 => 'June', 7 => 'July', 8 => 'August', 9 => 'September', 10 => 'October', 11 => 'November', 12 => 'December');
          $selected_start = isset($sbm_stored_travel_meta['season1-start-month']) ? $sbm_stored_travel_meta['season1-start-month'][0] : '';
          foreach($months as $num => $name) {
           $selected = ($selected_start == $num) ? 'selected' : '';
           echo "<option value='$num' $selected>$name</option>";
          }
          ?>
         </select>
        </div>

        <div>
         <strong><label for="season1-start-part">Start Period:</label></strong><br>
         <select name="season1-start-part" id="season1-start-part" style="width: 100px;">
          <option value="full" <?php selected(get_post_meta($post->ID, 'season1-start-part', true), 'full'); ?>>Full Month</option>
          <option value="early" <?php selected(get_post_meta($post->ID, 'season1-start-part', true), 'early'); ?>>Early</option>
          <option value="mid" <?php selected(get_post_meta($post->ID, 'season1-start-part', true), 'mid'); ?>>Mid</option>
          <option value="late" <?php selected(get_post_meta($post->ID, 'season1-start-part', true), 'late'); ?>>Late</option>
         </select>
        </div>

        <div>
         <strong><label for="season1-end-month">End Month:</label></strong><br>
         <select name="season1-end-month" id="season1-end-month" style="width: 130px;">
          <option value="0">Not Set</option>
          <?php
          $selected_end = isset($sbm_stored_travel_meta['season1-end-month']) ? $sbm_stored_travel_meta['season1-end-month'][0] : '';
          foreach($months as $num => $name) {
           $selected = ($selected_end == $num) ? 'selected' : '';
           echo "<option value='$num' $selected>$name</option>";
          }
          ?>
         </select>
        </div>

        <div>
         <strong><label for="season1-end-part">End Period:</label></strong><br>
         <select name="season1-end-part" id="season1-end-part" style="width: 100px;">
          <option value="full" <?php selected(get_post_meta($post->ID, 'season1-end-part', true), 'full'); ?>>Full Month</option>
          <option value="early" <?php selected(get_post_meta($post->ID, 'season1-end-part', true), 'early'); ?>>Early</option>
          <option value="mid" <?php selected(get_post_meta($post->ID, 'season1-end-part', true), 'mid'); ?>>Mid</option>
          <option value="late" <?php selected(get_post_meta($post->ID, 'season1-end-part', true), 'late'); ?>>Late</option>
         </select>
        </div>

        <div>
         <strong><label for="season1-color">Color:</label></strong><br>
         <input type="color" name="season1-color" id="season1-color" value="<?php echo esc_attr(get_post_meta($post->ID, 'season1-color', true) ?: '#28a745'); ?>" style="width: 60px; height: 30px;">
        </div>
       </div>

       <div>
        <strong><label for="season1-name">Season Name:</label></strong><br>
        <input type="text" name="season1-name" id="season1-name" value="<?php echo esc_attr(get_post_meta($post->ID, 'season1-name', true) ?: 'Primary Season'); ?>" style="width: 200px;" placeholder="e.g., Prime Season">
       </div>
       <hr>
       <h6>Additional Range (Optional)</h6>
       <div style="display: flex; gap: 15px; align-items: center; margin-bottom: 15px; flex-wrap: wrap;">
        <div>
         <strong><label for="season1-start-month-2">Start Month (Range 2):</label></strong><br>
         <select name="season1-start-month-2" id="season1-start-month-2" style="width: 130px;">
          <option value="0">Not Set</option>
          <?php
          $months = array(1 => 'January', 2 => 'February', 3 => 'March', 4 => 'April', 5 => 'May', 6 => 'June', 7 => 'July', 8 => 'August', 9 => 'September', 10 => 'October', 11 => 'November', 12 => 'December');
          $selected_start2 = isset($sbm_stored_travel_meta['season1-start-month-2']) ? $sbm_stored_travel_meta['season1-start-month-2'][0] : '';
          foreach($months as $num => $name) {
           $selected = ($selected_start2 == $num) ? 'selected' : '';
           echo "<option value='$num' $selected>$name</option>";
          }
          ?>
         </select>
        </div>

        <div>
         <strong><label for="season1-start-part-2">Start Period (Range 2):</label></strong><br>
         <select name="season1-start-part-2" id="season1-start-part-2" style="width: 120px;">
          <option value="full" <?php selected(get_post_meta($post->ID, 'season1-start-part-2', true), 'full'); ?>>Full Month</option>
          <option value="early" <?php selected(get_post_meta($post->ID, 'season1-start-part-2', true), 'early'); ?>>Early</option>
          <option value="mid" <?php selected(get_post_meta($post->ID, 'season1-start-part-2', true), 'mid'); ?>>Mid</option>
          <option value="late" <?php selected(get_post_meta($post->ID, 'season1-start-part-2', true), 'late'); ?>>Late</option>
         </select>
        </div>

        <div>
         <strong><label for="season1-end-month-2">End Month (Range 2):</label></strong><br>
         <select name="season1-end-month-2" id="season1-end-month-2" style="width: 130px;">
          <option value="0">Not Set</option>
          <?php
          $selected_end2 = isset($sbm_stored_travel_meta['season1-end-month-2']) ? $sbm_stored_travel_meta['season1-end-month-2'][0] : '';
          foreach($months as $num => $name) {
           $selected = ($selected_end2 == $num) ? 'selected' : '';
           echo "<option value='$num' $selected>$name</option>";
          }
          ?>
         </select>
        </div>

        <div>
         <strong><label for="season1-end-part-2">End Period (Range 2):</label></strong><br>
         <select name="season1-end-part-2" id="season1-end-part-2" style="width: 120px;">
          <option value="full" <?php selected(get_post_meta($post->ID, 'season1-end-part-2', true), 'full'); ?>>Full Month</option>
          <option value="early" <?php selected(get_post_meta($post->ID, 'season1-end-part-2', true), 'early'); ?>>Early</option>
          <option value="mid" <?php selected(get_post_meta($post->ID, 'season1-end-part-2', true), 'mid'); ?>>Mid</option>
          <option value="late" <?php selected(get_post_meta($post->ID, 'season1-end-part-2', true), 'late'); ?>>Late</option>
         </select>
        </div>

        <div>
         <strong><label for="season1-color-2">Color (Range 2):</label></strong><br>
         <input type="color" name="season1-color-2" id="season1-color-2" value="<?php echo esc_attr(get_post_meta($post->ID, 'season1-color-2', true) ?: '#2ecc71'); ?>" style="width: 60px; height: 30px;">
        </div>
       </div>

       <div>
        <strong><label for="season1-name-2">Range 2 Name:</label></strong><br>
        <input type="text" name="season1-name-2" id="season1-name-2" value="<?php echo esc_attr(get_post_meta($post->ID, 'season1-name-2', true)); ?>" style="width: 260px;" placeholder="e.g., Prime Season (Spring)">
       </div>
      </div>

      <!-- Season 2 -->
      <div class="season-group" style="border: 1px solid #ddd; padding: 15px; margin-bottom: 20px; background: #f9f9f9;">
       <h5 style="margin-top: 0;">Season 2 - Secondary Season (Optional)</h5>

       <div style="display: flex; gap: 15px; align-items: center; margin-bottom: 15px; flex-wrap: wrap;">
        <div>
         <strong><label for="season2-start-month">Start Month:</label></strong><br>
         <select name="season2-start-month" id="season2-start-month" style="width: 130px;">
          <option value="0">Not Set</option>
          <?php
          $selected_start = isset($sbm_stored_travel_meta['season2-start-month']) ? $sbm_stored_travel_meta['season2-start-month'][0] : '';
          foreach($months as $num => $name) {
           $selected = ($selected_start == $num) ? 'selected' : '';
           echo "<option value='$num' $selected>$name</option>";
          }
          ?>
         </select>
        </div>

        <div>
         <strong><label for="season2-start-part">Start Period:</label></strong><br>
         <select name="season2-start-part" id="season2-start-part" style="width: 100px;">
          <option value="full" <?php selected(get_post_meta($post->ID, 'season2-start-part', true), 'full'); ?>>Full Month</option>
          <option value="early" <?php selected(get_post_meta($post->ID, 'season2-start-part', true), 'early'); ?>>Early</option>
          <option value="mid" <?php selected(get_post_meta($post->ID, 'season2-start-part', true), 'mid'); ?>>Mid</option>
          <option value="late" <?php selected(get_post_meta($post->ID, 'season2-start-part', true), 'late'); ?>>Late</option>
         </select>
        </div>

        <div>
         <strong><label for="season2-end-month">End Month:</label></strong><br>
         <select name="season2-end-month" id="season2-end-month" style="width: 130px;">
          <option value="0">Not Set</option>
          <?php
          $selected_end = isset($sbm_stored_travel_meta['season2-end-month']) ? $sbm_stored_travel_meta['season2-end-month'][0] : '';
          foreach($months as $num => $name) {
           $selected = ($selected_end == $num) ? 'selected' : '';
           echo "<option value='$num' $selected>$name</option>";
          }
          ?>
         </select>
        </div>

        <div>
         <strong><label for="season2-end-part">End Period:</label></strong><br>
         <select name="season2-end-part" id="season2-end-part" style="width: 100px;">
          <option value="full" <?php selected(get_post_meta($post->ID, 'season2-end-part', true), 'full'); ?>>Full Month</option>
          <option value="early" <?php selected(get_post_meta($post->ID, 'season2-end-part', true), 'early'); ?>>Early</option>
          <option value="mid" <?php selected(get_post_meta($post->ID, 'season2-end-part', true), 'mid'); ?>>Mid</option>
          <option value="late" <?php selected(get_post_meta($post->ID, 'season2-end-part', true), 'late'); ?>>Late</option>
         </select>
        </div>

        <div>
         <strong><label for="season2-color">Color:</label></strong><br>
         <input type="color" name="season2-color" id="season2-color" value="<?php echo esc_attr(get_post_meta($post->ID, 'season2-color', true) ?: '#ffc107'); ?>" style="width: 60px; height: 30px;">
        </div>
       </div>

       <div>
        <strong><label for="season2-name">Season Name:</label></strong><br>
        <input type="text" name="season2-name" id="season2-name" value="<?php echo esc_attr(get_post_meta($post->ID, 'season2-name', true) ?: 'Secondary Season'); ?>" style="width: 200px;" placeholder="e.g., Shoulder Season">
       </div>

       <hr>
       <h6>Additional Range (Optional)</h6>
       <div style="display: flex; gap: 15px; align-items: center; margin-bottom: 15px; flex-wrap: wrap;">
        <div>
         <strong><label for="season2-start-month-2">Start Month (Range 2):</label></strong><br>
         <select name="season2-start-month-2" id="season2-start-month-2" style="width: 130px;">
          <option value="0">Not Set</option>
          <?php
          $selected_start2 = isset($sbm_stored_travel_meta['season2-start-month-2']) ? $sbm_stored_travel_meta['season2-start-month-2'][0] : '';
          foreach($months as $num => $name) {
           $selected = ($selected_start2 == $num) ? 'selected' : '';
           echo "<option value='$num' $selected>$name</option>";
          }
          ?>
         </select>
        </div>

        <div>
         <strong><label for="season2-start-part-2">Start Period (Range 2):</label></strong><br>
         <select name="season2-start-part-2" id="season2-start-part-2" style="width: 120px;">
          <option value="full" <?php selected(get_post_meta($post->ID, 'season2-start-part-2', true), 'full'); ?>>Full Month</option>
          <option value="early" <?php selected(get_post_meta($post->ID, 'season2-start-part-2', true), 'early'); ?>>Early</option>
          <option value="mid" <?php selected(get_post_meta($post->ID, 'season2-start-part-2', true), 'mid'); ?>>Mid</option>
          <option value="late" <?php selected(get_post_meta($post->ID, 'season2-start-part-2', true), 'late'); ?>>Late</option>
         </select>
        </div>

        <div>
         <strong><label for="season2-end-month-2">End Month (Range 2):</label></strong><br>
         <select name="season2-end-month-2" id="season2-end-month-2" style="width: 130px;">
          <option value="0">Not Set</option>
          <?php
          $selected_end2 = isset($sbm_stored_travel_meta['season2-end-month-2']) ? $sbm_stored_travel_meta['season2-end-month-2'][0] : '';
          foreach($months as $num => $name) {
           $selected = ($selected_end2 == $num) ? 'selected' : '';
           echo "<option value='$num' $selected>$name</option>";
          }
          ?>
         </select>
        </div>

        <div>
         <strong><label for="season2-end-part-2">End Period (Range 2):</label></strong><br>
         <select name="season2-end-part-2" id="season2-end-part-2" style="width: 120px;">
          <option value="full" <?php selected(get_post_meta($post->ID, 'season2-end-part-2', true), 'full'); ?>>Full Month</option>
          <option value="early" <?php selected(get_post_meta($post->ID, 'season2-end-part-2', true), 'early'); ?>>Early</option>
          <option value="mid" <?php selected(get_post_meta($post->ID, 'season2-end-part-2', true), 'mid'); ?>>Mid</option>
          <option value="late" <?php selected(get_post_meta($post->ID, 'season2-end-part-2', true), 'late'); ?>>Late</option>
         </select>
        </div>

        <div>
         <strong><label for="season2-color-2">Color (Range 2):</label></strong><br>
         <input type="color" name="season2-color-2" id="season2-color-2" value="<?php echo esc_attr(get_post_meta($post->ID, 'season2-color-2', true) ?: '#f1c40f'); ?>" style="width: 60px; height: 30px;">
        </div>
       </div>

       <div>
        <strong><label for="season2-name-2">Range 2 Name:</label></strong><br>
        <input type="text" name="season2-name-2" id="season2-name-2" value="<?php echo esc_attr(get_post_meta($post->ID, 'season2-name-2', true)); ?>" style="width: 260px;" placeholder="e.g., Shoulder Season (Fall)">
       </div>
      </div>

      <!-- Season 3 -->
      <div class="season-group" style="border: 1px solid #ddd; padding: 15px; margin-bottom: 20px; background: #f9f9f9;">
       <h5 style="margin-top: 0;">Season 3 - Third Season (Optional)</h5>

       <div style="display: flex; gap: 15px; align-items: center; margin-bottom: 15px; flex-wrap: wrap;">
        <div>
         <strong><label for="season3-start-month">Start Month:</label></strong><br>
         <select name="season3-start-month" id="season3-start-month" style="width: 130px;">
          <option value="0">Not Set</option>
          <?php
          $selected_start = isset($sbm_stored_travel_meta['season3-start-month']) ? $sbm_stored_travel_meta['season3-start-month'][0] : '';
          foreach($months as $num => $name) {
           $selected = ($selected_start == $num) ? 'selected' : '';
           echo "<option value='$num' $selected>$name</option>";
          }
          ?>
         </select>
        </div>

        <div>
         <strong><label for="season3-start-part">Start Period:</label></strong><br>
         <select name="season3-start-part" id="season3-start-part" style="width: 100px;">
          <option value="full" <?php selected(get_post_meta($post->ID, 'season3-start-part', true), 'full'); ?>>Full Month</option>
          <option value="early" <?php selected(get_post_meta($post->ID, 'season3-start-part', true), 'early'); ?>>Early</option>
          <option value="mid" <?php selected(get_post_meta($post->ID, 'season3-start-part', true), 'mid'); ?>>Mid</option>
          <option value="late" <?php selected(get_post_meta($post->ID, 'season3-start-part', true), 'late'); ?>>Late</option>
         </select>
        </div>

        <div>
         <strong><label for="season3-end-month">End Month:</label></strong><br>
         <select name="season3-end-month" id="season3-end-month" style="width: 130px;">
          <option value="0">Not Set</option>
          <?php
          $selected_end = isset($sbm_stored_travel_meta['season3-end-month']) ? $sbm_stored_travel_meta['season3-end-month'][0] : '';
          foreach($months as $num => $name) {
           $selected = ($selected_end == $num) ? 'selected' : '';
           echo "<option value='$num' $selected>$name</option>";
          }
          ?>
         </select>
        </div>

        <div>
         <strong><label for="season3-end-part">End Period:</label></strong><br>
         <select name="season3-end-part" id="season3-end-part" style="width: 100px;">
          <option value="full" <?php selected(get_post_meta($post->ID, 'season3-end-part', true), 'full'); ?>>Full Month</option>
          <option value="early" <?php selected(get_post_meta($post->ID, 'season3-end-part', true), 'early'); ?>>Early</option>
          <option value="mid" <?php selected(get_post_meta($post->ID, 'season3-end-part', true), 'mid'); ?>>Mid</option>
          <option value="late" <?php selected(get_post_meta($post->ID, 'season3-end-part', true), 'late'); ?>>Late</option>
         </select>
        </div>

        <div>
         <strong><label for="season3-color">Color:</label></strong><br>
         <input type="color" name="season3-color" id="season3-color" value="<?php echo esc_attr(get_post_meta($post->ID, 'season3-color', true) ?: '#17a2b8'); ?>" style="width: 60px; height: 30px;">
        </div>
       </div>

       <div>
        <strong><label for="season3-name">Season Name:</label></strong><br>
        <input type="text" name="season3-name" id="season3-name" value="<?php echo esc_attr(get_post_meta($post->ID, 'season3-name', true) ?: 'Third Season'); ?>" style="width: 200px;" placeholder="e.g., Winter Season">
       </div>

       <hr>
       <h6>Additional Range (Optional)</h6>
       <div style="display: flex; gap: 15px; align-items: center; margin-bottom: 15px; flex-wrap: wrap;">
        <div>
         <strong><label for="season3-start-month-2">Start Month (Range 2):</label></strong><br>
         <select name="season3-start-month-2" id="season3-start-month-2" style="width: 130px;">
          <option value="0">Not Set</option>
          <?php
          $selected_start2 = isset($sbm_stored_travel_meta['season3-start-month-2']) ? $sbm_stored_travel_meta['season3-start-month-2'][0] : '';
          foreach($months as $num => $name) {
           $selected = ($selected_start2 == $num) ? 'selected' : '';
           echo "<option value='$num' $selected>$name</option>";
          }
          ?>
         </select>
        </div>

        <div>
         <strong><label for="season3-start-part-2">Start Period (Range 2):</label></strong><br>
         <select name="season3-start-part-2" id="season3-start-part-2" style="width: 120px;">
          <option value="full" <?php selected(get_post_meta($post->ID, 'season3-start-part-2', true), 'full'); ?>>Full Month</option>
          <option value="early" <?php selected(get_post_meta($post->ID, 'season3-start-part-2', true), 'early'); ?>>Early</option>
          <option value="mid" <?php selected(get_post_meta($post->ID, 'season3-start-part-2', true), 'mid'); ?>>Mid</option>
          <option value="late" <?php selected(get_post_meta($post->ID, 'season3-start-part-2', true), 'late'); ?>>Late</option>
         </select>
        </div>

        <div>
         <strong><label for="season3-end-month-2">End Month (Range 2):</label></strong><br>
         <select name="season3-end-month-2" id="season3-end-month-2" style="width: 130px;">
          <option value="0">Not Set</option>
          <?php
          $selected_end2 = isset($sbm_stored_travel_meta['season3-end-month-2']) ? $sbm_stored_travel_meta['season3-end-month-2'][0] : '';
          foreach($months as $num => $name) {
           $selected = ($selected_end2 == $num) ? 'selected' : '';
           echo "<option value='$num' $selected>$name</option>";
          }
          ?>
         </select>
        </div>

        <div>
         <strong><label for="season3-end-part-2">End Period (Range 2):</label></strong><br>
         <select name="season3-end-part-2" id="season3-end-part-2" style="width: 120px;">
          <option value="full" <?php selected(get_post_meta($post->ID, 'season3-end-part-2', true), 'full'); ?>>Full Month</option>
          <option value="early" <?php selected(get_post_meta($post->ID, 'season3-end-part-2', true), 'early'); ?>>Early</option>
          <option value="mid" <?php selected(get_post_meta($post->ID, 'season3-end-part-2', true), 'mid'); ?>>Mid</option>
          <option value="late" <?php selected(get_post_meta($post->ID, 'season3-end-part-2', true), 'late'); ?>>Late</option>
         </select>
        </div>

        <div>
         <strong><label for="season3-color-2">Color (Range 2):</label></strong><br>
         <input type="color" name="season3-color-2" id="season3-color-2" value="<?php echo esc_attr(get_post_meta($post->ID, 'season3-color-2', true) ?: '#17a2b8'); ?>" style="width: 60px; height: 30px;">
        </div>
       </div>

       <div>
        <strong><label for="season3-name-2">Range 2 Name:</label></strong><br>
        <input type="text" name="season3-name-2" id="season3-name-2" value="<?php echo esc_attr(get_post_meta($post->ID, 'season3-name-2', true)); ?>" style="width: 260px;" placeholder="e.g., Winter Season (Alt)">
       </div>
      </div>

      <!-- Preview -->
      <div class="season-preview" style="margin-top: 20px;">
       <strong>Preview Calendar:</strong>
       <div class="month-range-preview" style="display: flex; gap: 5px; margin-top: 10px; flex-wrap: wrap;">
        <?php
        $months_short = array(1 => 'Jan', 2 => 'Feb', 3 => 'Mar', 4 => 'Apr', 5 => 'May', 6 => 'Jun', 7 => 'Jul', 8 => 'Aug', 9 => 'Sep', 10 => 'Oct', 11 => 'Nov', 12 => 'Dec');
        foreach($months_short as $num => $name): ?>
         <div class="month-preview-multi" data-month="<?php echo $num; ?>" style="
                                            width: 60px;
                                            height: 50px;
                                            border: 1px solid #ccc;
                                            display: flex;
                                            flex-direction: column;
                                            align-items: center;
                                            justify-content: center;
                                            font-size: 10px;
                                            background: #f8f8f8;
                                            position: relative;
                                        ">
          <div class="month-name"><?php echo $name; ?></div>
          <div class="month-periods" style="display: flex; width: 100%; height: 15px; margin-top: 2px;">
           <div class="period-early" style="flex: 1; height: 100%;"></div>
           <div class="period-mid" style="flex: 1; height: 100%;"></div>
           <div class="period-late" style="flex: 1; height: 100%;"></div>
          </div>
         </div>
        <?php endforeach; ?>
       </div>

       <!-- Legend -->
       <div class="preview-legend" style="margin-top: 15px; display: flex; gap: 20px; flex-wrap: wrap;">
        <div class="legend-item" style="display: flex; align-items: center; gap: 5px;">
         <div class="legend-color season1-legend" style="width: 15px; height: 15px; background: #28a745;"></div>
         <span class="legend-text season1-text">Primary Season</span>
        </div>
        <div class="legend-item" style="display: flex; align-items: center; gap: 5px;">
         <div class="legend-color season2-legend" style="width: 15px; height: 15px; background: #ffc107;"></div>
         <span class="legend-text season2-text">Secondary Season</span>
        </div>
        <div class="legend-item" style="display: flex; align-items: center; gap: 5px;">
         <div class="legend-color season3-legend" style="width: 15px; height: 15px; background: #17a2b8;"></div>
         <span class="legend-text season3-text">Third Season</span>
        </div>
        <!-- Range 2 legend entries (one per season) -->
        <div class="legend-item season1-legend-2-container" style="display: none; align-items: center; gap: 5px;">
         <div class="legend-color season1-legend-2" style="width: 15px; height: 15px; background: #2ecc71;"></div>
         <span class="legend-text season1-text-2">Primary Season (Alt)</span>
        </div>
        <div class="legend-item season2-legend-2-container" style="display: none; align-items: center; gap: 5px;">
         <div class="legend-color season2-legend-2" style="width: 15px; height: 15px; background: #f1c40f;"></div>
         <span class="legend-text season2-text-2">Secondary Season (Alt)</span>
        </div>
        <div class="legend-item season3-legend-2-container" style="display: none; align-items: center; gap: 5px;">
         <div class="legend-color season3-legend-2" style="width: 15px; height: 15px; background: #17a2b8;"></div>
         <span class="legend-text season3-text-2">Third Season (Alt)</span>
        </div>
       </div>
      </div>
     </div>

     <script>
         document.addEventListener('DOMContentLoaded', function() {
             function applyRangeToCell(acc, month, startMonth, endMonth, startPart, endPart, color) {
                 if (!(startMonth > 0 && endMonth > 0)) return;
                 let inSeason;
                 if (startMonth <= endMonth) {
                     inSeason = month >= startMonth && month <= endMonth;
                 } else {
                     inSeason = month >= startMonth || month <= endMonth; // wrap
                 }
                 if (!inSeason) return;
                 const periods = ['early', 'mid', 'late'];
                 periods.forEach(period => {
                     let shouldColor = false;
                     if (month === startMonth && month === endMonth) {
                         const startIdx = periods.indexOf(startPart);
                         const endIdx = periods.indexOf(endPart);
                         const periodIdx = periods.indexOf(period);
                         shouldColor = periodIdx >= startIdx && periodIdx <= endIdx;
                     } else if (month === startMonth) {
                         if (startPart === 'full') shouldColor = true; else {
                             const startIdx = periods.indexOf(startPart);
                             const periodIdx = periods.indexOf(period);
                             shouldColor = periodIdx >= startIdx;
                         }
                     } else if (month === endMonth) {
                         if (endPart === 'full') shouldColor = true; else {
                             const endIdx = periods.indexOf(endPart);
                             const periodIdx = periods.indexOf(period);
                             shouldColor = periodIdx <= endIdx;
                         }
                     } else {
                         shouldColor = true;
                     }
                     if (shouldColor) {
                         acc[period] = acc[period] || [];
                         if (!acc[period].includes(color)) acc[period].push(color);
                     }
                 });
             }

             function updateMultiSeasonPreview() {
                 // Reset all months
                 document.querySelectorAll('.month-preview-multi .month-periods div').forEach(function(el) {
                     el.style.background = '#f8f8f8';
                 });

                 // Update legend primary (note: preview legend still shows one per season)
                 const s1c = document.getElementById('season1-color');
                 const s2c = document.getElementById('season2-color');
                 const s3c = document.getElementById('season3-color');
                 if (s1c) document.querySelector('.season1-legend').style.backgroundColor = s1c.value;
                 if (s2c) document.querySelector('.season2-legend').style.backgroundColor = s2c.value;
                 if (s3c) document.querySelector('.season3-legend').style.backgroundColor = s3c.value;
                 const s1n = document.getElementById('season1-name');
                 const s2n = document.getElementById('season2-name');
                 const s3n = document.getElementById('season3-name');
                 document.querySelector('.season1-text').textContent = (s1n && s1n.value) ? s1n.value : 'Primary Season';
                 document.querySelector('.season2-text').textContent = (s2n && s2n.value) ? s2n.value : 'Secondary Season';
                 document.querySelector('.season3-text').textContent = (s3n && s3n.value) ? s3n.value : 'Third Season';

                 // Update legend for Range 2 entries
                 const s1c2 = document.getElementById('season1-color-2');
                 const s2c2 = document.getElementById('season2-color-2');
                 const s3c2 = document.getElementById('season3-color-2');
                 const s1n2 = document.getElementById('season1-name-2');
                 const s2n2 = document.getElementById('season2-name-2');
                 const s3n2 = document.getElementById('season3-name-2');
                 const s1n2Val = (s1n2?.value || '').trim();
                 const s2n2Val = (s2n2?.value || '').trim();
                 const s3n2Val = (s3n2?.value || '').trim();
                 const elS1L2 = document.querySelector('.season1-legend-2');
                 const elS2L2 = document.querySelector('.season2-legend-2');
                 const elS3L2 = document.querySelector('.season3-legend-2');
                 const elS1T2 = document.querySelector('.season1-text-2');
                 const elS2T2 = document.querySelector('.season2-text-2');
                 const elS3T2 = document.querySelector('.season3-text-2');
                 const elS1C2 = document.querySelector('.season1-legend-2-container');
                 const elS2C2 = document.querySelector('.season2-legend-2-container');
                 const elS3C2 = document.querySelector('.season3-legend-2-container');

                 // Show Range 2 legend items only if a Name (Range 2) is provided (non-empty)
                 if (elS1C2) elS1C2.style.display = s1n2Val !== '' ? 'flex' : 'none';
                 if (elS2C2) elS2C2.style.display = s2n2Val !== '' ? 'flex' : 'none';
                 if (elS3C2) elS3C2.style.display = s3n2Val !== '' ? 'flex' : 'none';
                 if (elS1L2 && s1c2) elS1L2.style.backgroundColor = s1c2.value || (s1c ? s1c.value : '#2ecc71');
                 if (elS2L2 && s2c2) elS2L2.style.backgroundColor = s2c2.value || (s2c ? s2c.value : '#f1c40f');
                 if (elS3L2 && s3c2) elS3L2.style.backgroundColor = s3c2.value || (s3c ? s3c.value : '#17a2b8');
                 if (elS1T2) elS1T2.textContent = s1n2Val;
                 if (elS2T2) elS2T2.textContent = s2n2Val;
                 if (elS3T2) elS3T2.textContent = s3n2Val;

                 for (let month = 1; month <= 12; month++) {
                     const monthEl = document.querySelector(`[data-month="${month}"]`);
                     if (!monthEl) continue;
                     const periodsAcc = { early: [], mid: [], late: [] };

                     for (let season = 1; season <= 3; season++) {
                         const startMonth = parseInt(document.getElementById(`season${season}-start-month`).value || '0');
                         const endMonth = parseInt(document.getElementById(`season${season}-end-month`).value || '0');
                         const startPart = document.getElementById(`season${season}-start-part`).value || 'full';
                         const endPart = document.getElementById(`season${season}-end-part`).value || 'full';
                         const color = document.getElementById(`season${season}-color`).value || '#cccccc';

                         applyRangeToCell(periodsAcc, month, startMonth, endMonth, startPart, endPart, color);

                         // Range 2
                         const startMonth2 = parseInt(document.getElementById(`season${season}-start-month-2`)?.value || '0');
                         const endMonth2 = parseInt(document.getElementById(`season${season}-end-month-2`)?.value || '0');
                         const startPart2 = document.getElementById(`season${season}-start-part-2`)?.value || 'full';
                         const endPart2 = document.getElementById(`season${season}-end-part-2`)?.value || 'full';
                         const color2 = document.getElementById(`season${season}-color-2`)?.value || color;

                         applyRangeToCell(periodsAcc, month, startMonth2, endMonth2, startPart2, endPart2, color2);
                     }

                     ['early', 'mid', 'late'].forEach(period => {
                         const el = monthEl.querySelector(`.period-${period}`);
                         const colors = periodsAcc[period];
                         if (!colors || colors.length === 0) {
                             el.style.background = '#f8f8f8';
                         } else if (colors.length === 1) {
                             el.style.background = colors[0];
                         } else {
                             // blend first two colors
                             el.style.background = `linear-gradient(90deg, ${colors[0]} 0%, ${colors[0]} 50%, ${colors[1]} 50%, ${colors[1]} 100%)`;
                         }
                     });
                 }
             }

             // Add event listeners for all season controls
             const fields = ['start-month','end-month','start-part','end-part','color','name','start-month-2','end-month-2','start-part-2','end-part-2','color-2','name-2'];
             for (let season = 1; season <= 3; season++) {
                 fields.forEach(field => {
                     const element = document.getElementById(`season${season}-${field}`);
                     if (element) element.addEventListener('change', updateMultiSeasonPreview);
                 });
             }

             updateMultiSeasonPreview();
         });
     </script>
    </div>
   </div> <!-- /tab-content -->
  </div>
 </div>
</div>
</div>
