<div class="angling-tab">
 <h3><?php echo 'Destination Angling' ?></h3>

 <p><!-- Angling Title -->
  <strong><label for="feature-5-angling-title" class="sbm-row-title"><?php _e( 'Title', 'tfs-travel-textdomain' )?></label></strong>
  <input style="width: 100%;" type="text" name="feature-5-angling-title" id="feature-5-angling-title" value="<?php if ( isset ( $sbm_stored_travel_meta['feature-5-angling-title'] ) ) echo $sbm_stored_travel_meta['feature-5-angling-title'][0]; ?>" />
 </p>

 <!-- Angling Image -->
 <div class="meta-field-container">

  <strong><label for="feature-5-angling-img" class="sbm-row-title"><?php _e( 'Destination Angling Image','the-fly-shop' );?></label></strong><br>
  <input style="width:75%;" type="text" name="feature-5-angling-img" id="feature-5-angling-img" value="<?php if ( isset ( $sbm_stored_travel_meta['feature-5-angling-img'] ) ) echo $sbm_stored_travel_meta['feature-5-angling-img'][0];?>" />
  <input type="button" id="feature-5-angling-img-button" class="button" value="<?php _e( 'Choose or Upload an Image', 'the-fly-shop' );?>" />

  <!-- Preview container -->
  <div id="feature-5-angling-img-preview" style="margin-top: 10px;">
   <?php if ( isset( $sbm_stored_travel_meta['feature-5-angling-img'] ) && $sbm_stored_travel_meta['feature-5-angling-img'][0] != '' ) : ?>
    <img src="<?php echo esc_url( $sbm_stored_travel_meta['feature-5-angling-img'][0] ); ?>"
         style="max-width: 250px; max-height: 250px; border: 1px solid #ddd; padding: 5px;"
         alt="Preview" />
    <br><button type="button" id="feature-5-angling-img-remove" class="button" style="margin-top: 5px;">Remove Image</button>
   <?php endif; ?>
  </div>

 </div>

 <!-- Anging Video -->
 <div class="meta-field-container">
  <strong><label for="feature_5_video_url" class="sbm-row-title"><?php _e( 'Angling Video URL', 'tfs-travel-textdomain' ); ?></label></strong>
  <input
   type="url"
   name="feature_5_video_url"
   id="feature_5_video_url"
   style="width: 100%;"
   placeholder="https://example.com/path/video.mp4"
   value="<?php
   if ( isset( $sbm_stored_travel_meta['feature_5_video_url'] ) ) {
    echo esc_attr( $sbm_stored_travel_meta['feature_5_video_url'][0] );
   }
   ?>"
  />
  <p class="description"><?php _e( 'Add a direct video URL (e.g., MP4). Playback is user-initiated via controls. Poster uses the Private Waters Costs image if set.', 'tfs-travel-textdomain' ); ?></p>
 </div>

 <?php
 $feature_5_video_current = isset( $sbm_stored_travel_meta['feature_5_video_url'] )
  ? trim( (string) $sbm_stored_travel_meta['feature_5_video_url'][0] )
  : '';
 $travel_angling_poster = isset( $sbm_stored_travel_meta['travel-angling-image'] )
  ? trim( (string) $sbm_stored_travel_meta['travel-angling-image'][0] )
  : '';
 ?>
 <div id="feature-5-video-preview" style="margin-top:10px; <?php echo $feature_5_video_current ? '' : 'display:none;'; ?>">
  <video
   id="feature-5-video"
   controls
   playsinline
   preload="metadata"
   style="max-width:24%;height:auto;"
   <?php if ( $travel_angling_poster ) : ?>
    poster="<?php echo esc_url( $travel_angling_poster ); ?>"
   <?php endif; ?>
  >
   <?php if ( $feature_5_video_current ) : ?>
    <source src="<?php echo esc_url( $feature_5_video_current ); ?>" type="video/mp4" />
   <?php endif; ?>
   <?php _e( 'Your browser does not support the video tag.', 'tfs-travel-textdomain' ); ?>
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
  <strong><label for="feature-5-angling-content" class="sbm-row-title"><?php _e( 'Content', 'tfs-travel-textdomain' )?></label></strong>
  <textarea style="width: 100%;" rows="4" name="feature-5-angling-content" id="feature-5-angling-content"><?php if ( isset ( $sbm_stored_travel_meta['feature-5-angling-content'] ) ) echo $sbm_stored_travel_meta['feature-5-angling-content'][0]; ?></textarea>
 </p>

 <p><!-- Destination Angling Read More -->
  <!-- <strong><label for="feature-5-read-more-info" class="sbm-row-title"><?php //_e( 'Read More Info', 'sbm-textdomain' )?></label></strong>
        <input style="width: 100%;" type="text" name="feature-5-read-more-info" id="feature-5-read-more-info" placeholder="Add Read More Info" value="<?php //if ( isset ( $sbm_stored_travel_meta['feature-5-read-more-info'] ) ) echo $sbm_stored_travel_meta['feature-5-read-more-info'][0]; ?>" /> -->

  <strong><label for="feature-5-angling-readmore" class="sbm-row-title"><?php _e( 'Read more', 'tfs-travel-textdomain' )?></label></strong>
  <textarea style="width: 100%;" rows="4" name="feature-5-angling-readmore" id="feature-5-angling-readmore"><?php if ( isset ( $sbm_stored_travel_meta['feature-5-angling-readmore'] ) ) echo $sbm_stored_travel_meta['feature-5-angling-readmore'][0]; ?></textarea>
 </p>
</div>
