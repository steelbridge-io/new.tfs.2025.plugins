<div class="species-tab">
 <h3><?php echo 'Fish Species' ?></h3>

 <!-- Species Title -->
 <p>
  <strong><label for="feature-6-species-title" class="sbm-row-title"><?php _e( 'Title', 'tfs-travel-textdomain' )?></label></strong>
  <input style="width: 100%;" type="text" name="feature-6-species-title" id="feature-6-species-title" value="<?php if ( isset ( $sbm_stored_travel_meta['feature-6-species-title'] ) ) echo $sbm_stored_travel_meta['feature-6-species-title'][0]; ?>" />
 </p>

 <!-- Species Image -->
 <div class="meta-field-container">

  <strong><label for="feature-6-species-img" class="sbm-row-title"><?php _e( 'Species Image', 'the-fly-shop' );?></label></strong><br>
  <input style="width:75%;" type="text" name="feature-6-species-img" id="feature-6-species-img" value="<?php if ( isset ( $sbm_stored_travel_meta['feature-6-species-img'] ) ) echo $sbm_stored_travel_meta['feature-6-species-img'][0];?>" />
  <input type="button" id="feature-6-species-img-button" class="button" value="<?php _e( 'Choose or Upload an Image', 'the-fly-shop' );?>" />

  <!-- Preview container -->
  <div id="feature-6-species-img-preview" style="margin-top: 10px;">
   <?php if ( isset( $sbm_stored_travel_meta['feature-6-species-img'] ) && $sbm_stored_travel_meta['feature-6-species-img'][0] != '' ) : ?>
    <img src="<?php echo esc_url( $sbm_stored_travel_meta['feature-6-species-img'][0] ); ?>"
         style="max-width: 250px; max-height: 250px; border: 1px solid #ddd; padding: 5px;"
         alt="Preview" />
    <br><button type="button" id="feature-6-species-img-remove" class="button" style="margin-top: 5px;">Remove Image</button>
   <?php endif; ?>
  </div>
 </div>

 <!-- Species Video URL -->
 <div class="meta-field-container">
  <strong><label for="feature_6_video_url" class="sbm-row-title"><?php _e( 'Species Video URL', 'tfs-travel-textdomain' ); ?></label></strong>
  <input
   type="url"
   name="feature_6_video_url"
   id="feature_6_video_url"
   style="width: 100%;"
   placeholder="https://example.com/path/video.mp4"
   value="<?php
   if ( isset( $sbm_stored_travel_meta['feature_6_video_url'] ) ) {
    echo esc_attr( $sbm_stored_travel_meta['feature_6_video_url'][0] );
   }
   ?>"
  />
  <p class="description"><?php _e( 'Add a direct video URL (e.g., MP4). Playback is user-initiated via controls. Poster uses the Species image if set.', 'tfs-travel-textdomain' ); ?></p>
 </div>

 <?php
 $feature_6_video_current = isset( $sbm_stored_travel_meta['feature_6_video_url'] )
  ? trim( (string) $sbm_stored_travel_meta['feature_6_video_url'][0] )
  : '';
 $species_poster = isset( $sbm_stored_travel_meta['feature-6-species-img'] )
  ? trim( (string) $sbm_stored_travel_meta['feature-6-species-img'][0] )
  : '';
 ?>

 <div id="feature-6-video-preview" style="margin-top:10px; <?php echo $feature_6_video_current ? '' : 'display:none;'; ?>">
  <video
   id="feature-6-video"
   controls
   playsinline
   preload="metadata"
   style="max-width:24%;height:auto;"
   <?php if ( $species_poster ) : ?>
    poster="<?php echo esc_url( $species_poster ); ?>"
   <?php endif; ?>
  >
   <?php if ( $feature_6_video_current ) : ?>
    <source src="<?php echo esc_url( $feature_6_video_current ); ?>" type="video/mp4" />
   <?php endif; ?>
   <?php _e( 'Your browser does not support the video tag.', 'tfs-travel-textdomain' ); ?>
  </video>
 </div>
 <script>
     document.addEventListener('DOMContentLoaded', function () {
         var input = document.getElementById('feature_6_video_url');
         var previewWrap = document.getElementById('feature-6-video-preview');
         var video = document.getElementById('feature-6-video');
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

 <p><!-- Species Content -->
  <strong><label for="feature-6-species-content" class="sbm-row-title"><?php _e( 'Species Content', 'tfs-travel-textdomain' )?></label></strong>
  <textarea style="width: 100%;" rows="4" name="feature-6-species-content" id="feature-6-species-content"><?php if ( isset ( $sbm_stored_travel_meta['feature-6-species-content'] ) ) echo $sbm_stored_travel_meta['feature-6-species-content'][0]; ?></textarea>
 </p>

 <p><!-- Species Read More -->
  <strong><label for="feature-6-species-readmore" class="sbm-row-title"><?php _e( 'Species Read More', 'tfs-travel-textdomain' )?></label></strong>
  <textarea style="width: 100%;" rows="4" name="feature-6-species-readmore" id="feature-6-species-readmore"><?php if ( isset ( $sbm_stored_travel_meta['feature-6-species-readmore'] ) ) echo $sbm_stored_travel_meta['feature-6-species-readmore'][0]; ?></textarea>
 </p>
</div>

