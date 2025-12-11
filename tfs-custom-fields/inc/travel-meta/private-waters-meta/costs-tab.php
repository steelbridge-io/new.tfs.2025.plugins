<div class="costs-tab">
 <h3><?php echo 'Private Waters Costs' ?></h3>
 <!-- Private Waters Costs Image -->
 <div class="meta-field-container">

  <strong><label for="travel-costs-image" class="sbm-row-title"><?php _e( 'Private Waters Costs Image', 'the-fly-shop' );?></label></strong><br>
  <input style="width:75%;" type="text" name="travel-costs-image" id="travel-costs-image" value="<?php if ( isset ( $sbm_stored_travel_meta['travel-costs-image'] ) ) echo $sbm_stored_travel_meta['travel-costs-image'][0];?>" />
  <input type="button" id="travel-costs-image-button" class="button" value="<?php _e( 'Choose or Upload an Image', 'the-fly-shop' );?>" />

  <!-- Preview container -->
  <div id="travel-costs-image-preview" style="margin-top: 10px;">
   <?php if ( isset( $sbm_stored_travel_meta['travel-costs-image'] ) && $sbm_stored_travel_meta['travel-costs-image'][0] != '' ) : ?>
    <img src="<?php echo esc_url( $sbm_stored_travel_meta['travel-costs-image'][0] ); ?>"
         style="max-width: 250px; max-height: 250px; border: 1px solid #ddd; padding: 5px;"
         alt="Preview" />
    <br><button type="button" id="travel-costs-image-remove" class="button" style="margin-top: 5px;">Remove Image</button>
   <?php endif; ?>
  </div>
 </div>

 <!-- Private Waters Costs & Inclusions Video -->
 <div class="meta-field-container">
  <strong><label for="feature_1_video_url" class="sbm-row-title"><?php _e( 'Private Waters Costs & Inclusions Video URL', 'tfs-travel-textdomain' ); ?></label></strong>
  <input
   type="url"
   name="feature_1_video_url"
   id="feature_1_video_url"
   style="width: 100%;"
   placeholder="https://example.com/path/video.mp4"
   value="<?php
   if ( isset( $sbm_stored_travel_meta['feature_1_video_url'] ) ) {
    echo esc_attr( $sbm_stored_travel_meta['feature_1_video_url'][0] );
   }
   ?>"
  />
  <p class="description"><?php _e( 'Add a direct video URL (e.g., MP4). Playback is user-initiated via controls. Poster uses the Private Waters Costs image if set.', 'tfs-travel-textdomain' ); ?></p>
 </div>

 <?php
 $feature_1_video_current = isset( $sbm_stored_travel_meta['feature_1_video_url'] )
  ? trim( (string) $sbm_stored_travel_meta['feature_1_video_url'][0] )
  : '';
 $travel_costs_poster = isset( $sbm_stored_travel_meta['travel-costs-image'] )
  ? trim( (string) $sbm_stored_travel_meta['travel-costs-image'][0] )
  : '';
 ?>
 <div id="feature-1-video-preview" style="margin-top:10px; <?php echo $feature_1_video_current ? '' : 'display:none;'; ?>">
  <video
   id="feature-1-video"
   controls
   playsinline
   preload="metadata"
   style="max-width:24%;height:auto;"
   <?php if ( $travel_costs_poster ) : ?>
    poster="<?php echo esc_url( $travel_costs_poster ); ?>"
   <?php endif; ?>
  >
   <?php if ( $feature_1_video_current ) : ?>
    <source src="<?php echo esc_url( $feature_1_video_current ); ?>" type="video/mp4" />
   <?php endif; ?>
   <?php _e( 'Your browser does not support the video tag.', 'tfs-travel-textdomain' ); ?>
  </video>
 </div>
 <script>
     document.addEventListener('DOMContentLoaded', function () {
         var input = document.getElementById('feature_1_video_url');
         var previewWrap = document.getElementById('feature-1-video-preview');
         var video = document.getElementById('feature-1-video');
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

 <p><!-- Costs Title -->
  <strong><label for="feature-1-title" class="sbm-row-title"><?php _e( 'Title', 'tfs-travel-textdomain' )?></label></strong>

  <input style="width: 100%;" type="text" name="feature-1-title" id="feature-1-title" value="<?php if ( isset ( $sbm_stored_travel_meta['feature-1-title'] ) ) echo $sbm_stored_travel_meta['feature-1-title'][0]; ?>" />
 </p>

 <h3><?php echo 'Pricing & Rates Table (Inclusions Tab)' ?></h3>
 <p class="description">Configure a dynamic table to display lodging costs, occupancy rates, seasonal pricing, etc. This table will appear in the Inclusions tab on the frontend.</p>

 <?php
 // Get stored table data
 $table_config = isset($sbm_stored_travel_meta['pricing-table-config']) ? json_decode($sbm_stored_travel_meta['pricing-table-config'][0], true) : array();
 $table_data = isset($sbm_stored_travel_meta['pricing-table-data']) ? json_decode($sbm_stored_travel_meta['pricing-table-data'][0], true) : array();

 // Set defaults
 $columns = isset($table_config['columns']) ? $table_config['columns'] : 3;
 $rows = isset($table_config['rows']) ? $table_config['rows'] : 3;
 $table_title = isset($table_config['title']) ? $table_config['title'] : '';
 ?>

 <div class="pricing-table-builder" style="border: 1px solid #ddd; padding: 15px; margin: 10px 0; background: #f9f9f9;">

  <!-- Table Configuration -->
  <div class="table-config" style="margin-bottom: 20px;">
   <div style="display: flex; gap: 20px; align-items: center; flex-wrap: wrap;">
    <div>
     <label for="pricing-table-title"><strong>Table Title:</strong></label><br>
     <input type="text" id="pricing-table-title" name="pricing-table-title" value="<?php echo esc_attr($table_title); ?>" style="width: 250px;" placeholder="e.g., Lodging Rates & Seasons" />
    </div>
    <div>
     <label for="pricing-table-columns"><strong>Columns:</strong></label><br>
     <select id="pricing-table-columns" name="pricing-table-columns">
      <?php for($i = 2; $i <= 8; $i++): ?>
       <option value="<?php echo $i; ?>" <?php selected($columns, $i); ?>><?php echo $i; ?></option>
      <?php endfor; ?>
     </select>
    </div>
    <div>
     <label for="pricing-table-rows"><strong>Rows (including header):</strong></label><br>
     <select id="pricing-table-rows" name="pricing-table-rows">
      <?php for($i = 2; $i <= 12; $i++): ?>
       <option value="<?php echo $i; ?>" <?php selected($rows, $i); ?>><?php echo $i; ?></option>
      <?php endfor; ?>
     </select>
    </div>
    <div>
     <button type="button" id="rebuild-pricing-table" class="button">Update Table</button>
    </div>
   </div>
  </div>

  <!-- Dynamic Table -->
  <div id="pricing-table-container">
   <table id="pricing-table-editor" style="width: 100%; border-collapse: collapse; margin-top: 10px;">
    <tbody id="pricing-table-body">
    <?php for($r = 0; $r < $rows; $r++): ?>
     <tr>
      <?php for($c = 0; $c < $columns; $c++): ?>
       <td style="border: 1px solid #ddd; padding: 5px;">
        <?php if($r == 0): ?>
         <input type="text"
                name="pricing_table_cell[<?php echo $r; ?>][<?php echo $c; ?>]"
                value="<?php echo isset($table_data[$r][$c]) ? esc_attr($table_data[$r][$c]) : ''; ?>"
                placeholder="Header <?php echo $c + 1; ?>"
                style="width: 100%; font-weight: bold; background: #f0f0f0;" />
        <?php else: ?>
         <input type="text"
                name="pricing_table_cell[<?php echo $r; ?>][<?php echo $c; ?>]"
                value="<?php echo isset($table_data[$r][$c]) ? esc_attr($table_data[$r][$c]) : ''; ?>"
                placeholder="Row <?php echo $r; ?>, Col <?php echo $c + 1; ?>"
                style="width: 100%;" />
        <?php endif; ?>
       </td>
      <?php endfor; ?>
     </tr>
    <?php endfor; ?>
    </tbody>
   </table>
  </div>

  <!-- Table Preview -->
  <div style="margin-top: 20px;">
   <strong>Frontend Preview:</strong>
   <div id="pricing-table-preview" style="border: 1px solid #ccc; padding: 10px; background: white; margin-top: 5px;">
    <!-- Preview will be generated by JavaScript -->
   </div>
  </div>
 </div>

 <!-- Hidden fields to store JSON data -->
 <input type="hidden" id="pricing-table-config-data" name="pricing-table-config" value="<?php echo esc_attr(json_encode($table_config)); ?>" />
 <input type="hidden" id="pricing-table-data-field" name="pricing-table-data" value="<?php echo esc_attr(json_encode($table_data)); ?>" />

 <script>
     jQuery(document).ready(function($) {

         function rebuildTable() {
             var columns = parseInt($('#pricing-table-columns').val());
             var rows = parseInt($('#pricing-table-rows').val());
             var title = $('#pricing-table-title').val();

             // Get current data
             var currentData = {};
             $('#pricing-table-editor input').each(function() {
                 var name = $(this).attr('name');
                 var match = name.match(/pricing_table_cell\[(\d+)\]\[(\d+)\]/);
                 if (match) {
                     var row = parseInt(match[1]);
                     var col = parseInt(match[2]);
                     if (!currentData[row]) currentData[row] = {};
                     currentData[row][col] = $(this).val();
                 }
             });

             // Rebuild table HTML
             var html = '';
             for (var r = 0; r < rows; r++) {
                 html += '<tr>';
                 for (var c = 0; c < columns; c++) {
                     var value = (currentData[r] && currentData[r][c]) ? currentData[r][c] : '';
                     var placeholder = r === 0 ? 'Header ' + (c + 1) : 'Row ' + r + ', Col ' + (c + 1);
                     var style = r === 0 ? 'width: 100%; font-weight: bold; background: #f0f0f0;' : 'width: 100%;';

                     html += '<td style="border: 1px solid #ddd; padding: 5px;">';
                     html += '<input type="text" name="pricing_table_cell[' + r + '][' + c + ']" value="' + value + '" placeholder="' + placeholder + '" style="' + style + '" />';
                     html += '</td>';
                 }
                 html += '</tr>';
             }

             $('#pricing-table-body').html(html);

             // Update config
             var config = {
                 columns: columns,
                 rows: rows,
                 title: title
             };
             $('#pricing-table-config-data').val(JSON.stringify(config));

             // Update preview
             updatePreview();

             // Bind events to new inputs
             bindTableEvents();
         }

         function updatePreview() {
             var title = $('#pricing-table-title').val();
             var html = '';

             if (title) {
                 html += '<h4 style="margin: 0 0 10px 0;">' + title + '</h4>';
             }

             html += '<table style="width: 100%; border-collapse: collapse; border: 1px solid #ddd;">';

             $('#pricing-table-editor tr').each(function(rowIndex) {
                 html += '<tr>';
                 $(this).find('input').each(function() {
                     var value = $(this).val() || $(this).attr('placeholder');
                     var isHeader = rowIndex === 0;
                     var cellStyle = 'border: 1px solid #ddd; padding: 8px; text-align: left;';
                     if (isHeader) {
                         cellStyle += ' background: #f5f5f5; font-weight: bold;';
                     }
                     html += '<' + (isHeader ? 'th' : 'td') + ' style="' + cellStyle + '">' + value + '</' + (isHeader ? 'th' : 'td') + '>';
                 });
                 html += '</tr>';
             });

             html += '</table>';
             $('#pricing-table-preview').html(html);
         }

         function updateTableData() {
             var data = {};
             $('#pricing-table-editor input').each(function() {
                 var name = $(this).attr('name');
                 var match = name.match(/pricing_table_cell\[(\d+)\]\[(\d+)\]/);
                 if (match) {
                     var row = parseInt(match[1]);
                     var col = parseInt(match[2]);
                     if (!data[row]) data[row] = {};
                     data[row][col] = $(this).val();
                 }
             });
             $('#pricing-table-data-field').val(JSON.stringify(data));
         }

         function bindTableEvents() {
             $('#pricing-table-editor input').off('input').on('input', function() {
                 updatePreview();
                 updateTableData();
             });
         }

         // Initial setup
         updatePreview();
         bindTableEvents();

         // Event handlers
         $('#rebuild-pricing-table').on('click', rebuildTable);
         $('#pricing-table-title').on('input', function() {
             updatePreview();
             var config = JSON.parse($('#pricing-table-config-data').val() || '{}');
             config.title = $(this).val();
             $('#pricing-table-config-data').val(JSON.stringify(config));
         });
     });
 </script>

 <p><!-- Costs Text Area/Cost-->
  <strong><label for="feature-1-cost-textarea" class="sbm-row-title"><?php _e( 'Cost', 'tfs-travel-textdomain' )?></label></strong>

  <textarea style="width: 100%;" rows="4" name="feature-1-cost-textarea" id="feature-1-cost-textarea"><?php if ( isset ( $sbm_stored_travel_meta['feature-1-cost-textarea'] ) ) echo $sbm_stored_travel_meta['feature-1-cost-textarea'][0]; ?></textarea>
 </p>

 <p><!-- Cost Inclusions Text Area -->
  <strong><label for="feature-1-inclusions-textarea" class="sbm-row-title"><?php _e( 'Inclusions', 'tfs-travel-textdomain' )?></label></strong>

  <textarea style="width: 100%;" rows="4" name="feature-1-inclusions-textarea" id="feature-1-inclusions-textarea"><?php if ( isset ( $sbm_stored_travel_meta['feature-1-inclusions-textarea'] ) ) echo $sbm_stored_travel_meta['feature-1-inclusions-textarea'][0]; ?></textarea>
 </p>

 <p><!-- Cost Non-inclusions Text Area -->
  <strong><label for="feature-1-noninclusions-textarea" class="sbm-row-title"><?php _e( 'Non-inclusions', 'tfs-travel-textdomain' )?></label></strong>

  <textarea style="width: 100%;" rows="4" name="feature-1-noninclusions-textarea" id="feature-1-noninclusions-textarea"><?php if ( isset ( $sbm_stored_travel_meta['feature-1-noninclusions-textarea'] ) ) echo $sbm_stored_travel_meta['feature-1-noninclusions-textarea'][0]; ?></textarea>
 </p>

 <!-- <p> Private Waters Insurance Text Area
        <strong><label for="feature-1-travelins-textarea" class="sbm-row-title"><?php // _e( 'Private Waters Insurance', 'tfs-travel-textdomain' )?></label></strong>
        <textarea style="width: 100%;" rows="4" name="feature-1-travelins-textarea" id="feature-1-travelins-textarea"><?php // if ( isset ( $sbm_stored_travel_meta['feature-1-travelins-textarea'] ) ) echo $sbm_stored_travel_meta['feature-1-travelins-textarea'][0]; ?></textarea>
    </p> -->

 <div class="meta-field-container">
  <strong><label for="feature-1-readmore" class="sbm-row-title"><?php _e( 'Private Waters Inclusions Read More', 'tfs-travel-textdomain')?></label></strong>
  <textarea style="width: 100%;" rows="4" name="feature-1-readmore" id="feature-1-readmore"><?php if ( isset ( $sbm_stored_travel_meta['feature-1-readmore'] ) ) echo $sbm_stored_travel_meta['feature-1-readmore'][0]; ?></textarea>
 </div>
</div>
