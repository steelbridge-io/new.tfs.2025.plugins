<div class="itinerary-tab">
 <h3><?php echo 'School Itinerary' ?></h3>

 <p><!-- Angling Title -->
  <strong><label for="feature-5-itinerary-title" class="sbm-row-title"><?php _e( 'Title', 'tfs-schoolv3-textdomain' )?></label></strong>
  <input style="width: 100%;" type="text" name="feature-5-itinerary-title" id="feature-5-itinerary-title" value="<?php if ( isset ( $sbm_stored_schoolv3_meta['feature-5-itinerary-title'] ) ) echo $sbm_stored_schoolv3_meta['feature-5-itinerary-title'][0]; ?>" />
 </p>

 <!-- Angling Image -->
 <div class="meta-field-container">

  <strong><label for="feature-5-itinerary-img" class="sbm-row-title"><?php _e( 'Itinerary Image','the-fly-shop' );?></label></strong><br>
  <input style="width:75%;" type="text" name="feature-5-itinerary-img" id="feature-5-itinerary-img" value="<?php if ( isset ( $sbm_stored_schoolv3_meta['feature-5-itinerary-img'] ) ) echo $sbm_stored_schoolv3_meta['feature-5-itinerary-img'][0];?>" />
  <input type="button" id="feature-5-itinerary-img-button" class="button" value="<?php _e( 'Choose or Upload an Image', 'the-fly-shop' );?>" />

  <!-- Preview container -->
  <div id="feature-5-itinerary-img-preview" style="margin-top: 10px;">
   <?php if ( isset( $sbm_stored_schoolv3_meta['feature-5-itinerary-img'] ) && $sbm_stored_schoolv3_meta['feature-5-itinerary-img'][0] != '' ) : ?>
    <img src="<?php echo esc_url( $sbm_stored_schoolv3_meta['feature-5-itinerary-img'][0] ); ?>"
         style="max-width: 250px; max-height: 250px; border: 1px solid #ddd; padding: 5px;"
         alt="Preview" />
    <br><button type="button" id="feature-5-itinerary-img-remove" class="button" style="margin-top: 5px;">Remove Image</button>
   <?php endif; ?>
  </div>

 </div>

 <!-- Anging Video -->
 <div class="meta-field-container">
  <strong><label for="feature_5_video_url" class="sbm-row-title"><?php _e( 'Angling Video URL', 'tfs-schoolv3-textdomain' ); ?></label></strong>
  <input
   type="url"
   name="feature_5_video_url"
   id="feature_5_video_url"
   style="width: 100%;"
   placeholder="https://example.com/path/video.mp4"
   value="<?php
   if ( isset( $sbm_stored_schoolv3_meta['feature_5_video_url'] ) ) {
    echo esc_attr( $sbm_stored_schoolv3_meta['feature_5_video_url'][0] );
   }
   ?>"
  />
  <p class="description"><?php _e( 'Add a direct video URL (e.g., MP4). Playback is user-initiated via controls. Poster uses the School Costs image if set.', 'tfs-schoolv3-textdomain' ); ?></p>
 </div>

 <?php
 $feature_5_video_current = isset( $sbm_stored_schoolv3_meta['feature_5_video_url'] )
  ? trim( (string) $sbm_stored_schoolv3_meta['feature_5_video_url'][0] )
  : '';
 $schoolv3_itinerary_poster = isset( $sbm_stored_schoolv3_meta['schoolv3-itinerary-image'] )
  ? trim( (string) $sbm_stored_schoolv3_meta['schoolv3-itinerary-image'][0] )
  : '';
 ?>
 <div id="feature-5-video-preview" style="margin-top:10px; <?php echo $feature_5_video_current ? '' : 'display:none;'; ?>">
  <video
   id="feature-5-video"
   controls
   playsinline
   preload="metadata"
   style="max-width:24%;height:auto;"
   <?php if ( $schoolv3_itinerary_poster ) : ?>
    poster="<?php echo esc_url( $schoolv3_itinerary_poster ); ?>"
   <?php endif; ?>
  >
   <?php if ( $feature_5_video_current ) : ?>
    <source src="<?php echo esc_url( $feature_5_video_current ); ?>" type="video/mp4" />
   <?php endif; ?>
   <?php _e( 'Your browser does not support the video tag.', 'tfs-schoolv3-textdomain' ); ?>
  </video>
 </div>
 <script>
     document.addEventListener('DOMContentLoaded', function () {
         var input = document.getElementById('feature_5_video_url');
         var previewWrap = document.getElementById('feature-5-video-preview');
         var video = document.getElementById('feature-5-video');
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

 <p><!-- Angling Content -->
  <strong><label for="feature-5-itinerary-content" class="sbm-row-title"><?php _e( 'Content', 'tfs-schoolv3-textdomain' )?></label></strong>
  <textarea style="width: 100%;" rows="4" name="feature-5-itinerary-content" id="feature-5-itinerary-content"><?php if ( isset ( $sbm_stored_schoolv3_meta['feature-5-itinerary-content'] ) ) echo $sbm_stored_schoolv3_meta['feature-5-itinerary-content'][0]; ?></textarea>
 </p>

 <p><!-- Destination Angling Read More -->
  <!-- <strong><label for="feature-5-read-more-info" class="sbm-row-title"><?php //_e( 'Read More Info', 'sbm-textdomain' )?></label></strong>
        <input style="width: 100%;" type="text" name="feature-5-read-more-info" id="feature-5-read-more-info" placeholder="Add Read More Info" value="<?php //if ( isset ( $sbm_stored_schoolv3_meta['feature-5-read-more-info'] ) ) echo $sbm_stored_schoolv3_meta['feature-5-read-more-info'][0]; ?>" /> -->

  <strong><label for="feature-5-itinerary-readmore" class="sbm-row-title"><?php _e( 'Read more', 'tfs-schoolv3-textdomain' )?></label></strong>
  <textarea style="width: 100%;" rows="4" name="feature-5-itinerary-readmore" id="feature-5-itinerary-readmore"><?php if ( isset ( $sbm_stored_schoolv3_meta['feature-5-itinerary-readmore'] ) ) echo $sbm_stored_schoolv3_meta['feature-5-itinerary-readmore'][0]; ?></textarea>
 </p>
</div>
