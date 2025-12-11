<div class="getting-to-tab">
 <h3><?php echo 'Getting To Destination' ?></h3>

 <!-- Getting To Title -->
 <p>
  <strong><label for="feature-3-get-to-title" class="sbm-row-title"><?php _e( 'Title', 'tfs-travel-textdomain' )?></label></strong>
  <input style="width: 100%;" type="text" name="feature-3-get-to-title" id="feature-3-get-to-title" value="<?php if ( isset ( $sbm_stored_travel_meta['feature-3-get-to-title'] ) ) echo $sbm_stored_travel_meta['feature-3-get-to-title'][0]; ?>" />
 </p>

 <!-- Getting To Image -->
 <div class="meta-field-container">

  <strong><label for="feature-3-getting-to-image" class="sbm-row-title"><?php _e( 'Getting To Destination Image','the-fly-shop' );?></label></strong><br>
  <input style="width:75%;" type="text" name="feature-3-getting-to-image" id="feature-3-getting-to-image" value="<?php if ( isset ( $sbm_stored_travel_meta['feature-3-getting-to-image'] ) ) echo $sbm_stored_travel_meta['feature-3-getting-to-image'][0];?>" />
  <input type="button" id="feature-3-getting-to-image-button" class="button" value="<?php _e( 'Choose or Upload an Image', 'the-fly-shop' );?>" />

  <!-- Preview container -->
  <div id="feature-3-getting-to-image-preview" style="margin-top: 10px;">
   <?php if ( isset( $sbm_stored_travel_meta['feature-3-getting-to-image'] ) && $sbm_stored_travel_meta['feature-3-getting-to-image'][0] != '' ) : ?>
    <img src="<?php echo esc_url( $sbm_stored_travel_meta['feature-3-getting-to-image'][0] ); ?>"
         style="max-width: 250px; max-height: 250px; border: 1px solid #ddd; padding: 5px;"
         alt="Preview" />
    <br><button type="button" id="feature-3-getting-to-image-remove" class="button" style="margin-top: 5px;">Remove Image</button>
   <?php endif; ?>
  </div>

 </div>

 <!-- Getting To Video -->
 <div class="meta-field-container">
  <strong><label for="feature_3_video_url" class="sbm-row-title"><?php _e( 'Getting To Video URL', 'tfs-travel-textdomain' ); ?></label></strong>
  <input
   type="url"
   name="feature_3_video_url"
   id="feature_3_video_url"
   style="width: 100%;"
   placeholder="https://example.com/path/video.mp4"
   value="<?php
   if ( isset( $sbm_stored_travel_meta['feature_3_video_url'] ) ) {
    echo esc_attr( $sbm_stored_travel_meta['feature_3_video_url'][0] );
   }
   ?>"
  />
  <p class="description"><?php _e( 'Add a direct video URL (e.g., MP4). Playback is user-initiated via controls. Poster uses the Private Waters Costs image if set.', 'tfs-travel-textdomain' ); ?></p>
 </div>

 <?php
 $feature_3_video_current = isset( $sbm_stored_travel_meta['feature_3_video_url'] )
  ? trim( (string) $sbm_stored_travel_meta['feature_3_video_url'][0] )
  : '';
 $travel_getto_poster = isset( $sbm_stored_travel_meta['travel-getto-image'] )
  ? trim( (string) $sbm_stored_travel_meta['travel-getto-image'][0] )
  : '';
 ?>
 <div id="feature-3-video-preview" style="margin-top:10px; <?php echo $feature_3_video_current ? '' : 'display:none;'; ?>">
  <video
   id="feature-3-video"
   controls
   playsinline
   preload="metadata"
   style="max-width:24%;height:auto;"
   <?php if ( $travel_getto_poster ) : ?>
    poster="<?php echo esc_url( $travel_getto_poster ); ?>"
   <?php endif; ?>
  >
   <?php if ( $feature_3_video_current ) : ?>
    <source src="<?php echo esc_url( $feature_3_video_current ); ?>" type="video/mp4" />
   <?php endif; ?>
   <?php _e( 'Your browser does not support the video tag.', 'tfs-travel-textdomain' ); ?>
  </video>
 </div>
 <script>
     document.addEventListener('DOMContentLoaded', function () {
         var input = document.getElementById('feature_3_video_url');
         var previewWrap = document.getElementById('feature-3-video-preview');
         var video = document.getElementById('feature-3-video');
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

 <p><!-- Getting To Content/Text Area -->
  <strong><label for="feature-3-get-to-content" class="sbm-row-title"><?php _e( 'Content', 'tfs-travel-textdomain' )?></label></strong>
  <textarea style="width: 100%;" rows="4" name="feature-3-get-to-content" id="feature-3-get-to-content"><?php if ( isset ( $sbm_stored_travel_meta['feature-3-get-to-content'] ) ) echo $sbm_stored_travel_meta['feature-3-get-to-content'][0]; ?></textarea>
 </p>

 <p><!-- Getting To Read More -->
  <!-- <strong><label for="feature-3-read-more-info" class="sbm-row-title"><?php //_e( 'Read More Info', 'sbm-textdomain' )?></label></strong>
        <input style="width: 100%;" type="text" name="feature-3-read-more-info" id="feature-3-read-more-info" placeholder="Add Read More Info" value="<?php //if ( isset ( $sbm_stored_travel_meta['feature-3-read-more-info'] ) ) echo $sbm_stored_travel_meta['feature-3-read-more-info'][0]; ?>" /> -->

  <strong><label for="feature-3-get-to-readmore" class="sbm-row-title"><?php _e( 'Read more', 'tfs-travel-textdomain' )?></label></strong>
  <textarea style="width: 100%;" rows="4" name="feature-3-get-to-readmore" id="feature-3-get-to-readmore"><?php if ( isset ( $sbm_stored_travel_meta['feature-3-get-to-readmore'] ) ) echo $sbm_stored_travel_meta['feature-3-get-to-readmore'][0]; ?></textarea>
 </p>
</div>
