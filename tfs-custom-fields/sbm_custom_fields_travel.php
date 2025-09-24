    <?php
    /**
    * Description: Travel Custom Meta Fields
    *
    * @package		tfsTravel
    * @since		1.2.3
    * @author		Chris Parsons
    * @link		http://steelbridge.io
    * @license		GNU General Public License
    */

    include( plugin_dir_path( __FILE__ ) . 'inc/sanitize_fields_travel.php');

    // Adds a meta box to the post editing screen on the template named travel-template
    function tfs_custom_travel_meta() {
    global $post;
    if(!empty($post)){
        $pageTemplate = get_post_meta($post->ID, '_wp_page_template', true);
        if($pageTemplate == 'page-templates/destination-template.php' || $pageTemplate == 'page-templates/regional-waters-template.php' || $pageTemplate == 'page-templates/destination-v3-template.php') {
            $types = array('post', 'page', 'travel_cpt', 'lower48', 'travel-blog', 'esb_lodge', 'guide_service');
            foreach($types as $type) {
                add_meta_box( 'sbm_meta', __( 'Travel Content Fields', 'tfs-travel-textdomain' ), 'tfs_travel_meta_callback',
                    $type, 'normal', 'high' );
            }
        }
    }
    }
    add_action( 'add_meta_boxes', 'tfs_custom_travel_meta' );

    // Outputs the content of the meta box
    function tfs_travel_meta_callback( $post ) {
    wp_nonce_field( basename( __FILE__ ), 'tfs_nonce' );
    $sbm_stored_travel_meta = get_post_meta( $post->ID );
    // Retrieve the selected term ID, if it exists
    $selected_term = get_post_meta($post->ID, 'selected_term', true);

    // Get the terms from your custom taxonomy
    $terms = get_terms(array(
    'taxonomy'    => 'report-category', // Replace with your custom taxonomy name
    'hide_empty'  => false,
      ));

    if ( $terms ) {
      echo '<div class="fish-report-terms">';
      echo '<h3>Show Fishing Reports</h3>';
      echo '<p>Select a fishing report category below. The category selected will return two posts in the section below the sign-up input on the front end.</p>';
      echo '<label for="selected_term"><strong>Select a fishing report category:</strong>&nbsp;</label>';
      echo '<select name="selected_term" id="selected_term">';
      echo '<option value="">Select a term</option>';
      foreach ( $terms as $term ) {
        echo '<option value="' . esc_attr( $term->term_id ) . '" ' . selected( $selected_term, $term->term_id, false ) . '>' . esc_html( $term->name ) . '</option>';
      }
      echo '</select>';
      echo '</div>';
    }
    ?>

    <!-- ====== Travel Details ====== -->

    <!-- TRAVEL DESCRIPTION -->
    <h3><?php echo 'Travel Description' ?></h3>

    <!-- TFS Logo -->
    <div class="meta-field-container">

    <strong><label for="travel-logo" class="sbm-row-title"><?php _e( 'Destination Travel Logo', 'the-fly-shop' );?></label></strong><br>
    <input style="width:60%;" type="text" name="dest-travel-logo" id="dest-travel-logo" value="<?php if ( isset (
          $sbm_stored_travel_meta['dest-travel-logo'] ) ) echo $sbm_stored_travel_meta['dest-travel-logo'][0];?>" />
    <input type="button" id="dest-travel-logo-button" class="button" value="<?php _e( 'Choose or Upload an Image', 'the-fly-shop' );?>" />

     <!-- Preview container -->
    <div id="dest-travel-logo-preview" style="margin-top: 10px;">
        <?php if ( isset( $sbm_stored_travel_meta['dest-travel-logo'] ) && $sbm_stored_travel_meta['dest-travel-logo'][0] != '' ) : ?>
            <img src="<?php echo esc_url( $sbm_stored_travel_meta['dest-travel-logo'][0] ); ?>"
                 style="max-width: 250px; max-height: 250px; border: 1px solid #ddd; padding: 5px;"
                 alt="Preview" />
            <br><button type="button" id="dest-travel-logo-remove" class="button" style="margin-top: 5px;">Remove Image</button>
        <?php endif; ?>
    </div>

    </div>

    <!-- Travel Hero Video URL -->
    <div class="meta-field-container">
     <strong><label for="travel-hero-video" class="sbm-row-title"><?php _e( 'Hero Video URL', 'tfs-travel-textdomain' ); ?></label></strong>
     <input
      type="url"
      name="travel-hero-video"
      id="travel-hero-video"
      style="width: 100%;"
      placeholder="https://storage.googleapis.com/path/to/video.mp4"
      value="<?php
      if ( isset( $sbm_stored_travel_meta['travel-hero-video'] ) ) {
       echo esc_attr( $sbm_stored_travel_meta['travel-hero-video'][0] );
      }
      ?>"
     />
     <p class="description"><?php _e( 'Add a direct video URL from Google Cloud or other cloud storage. Video will override featured image. Uses featured image as poster.', 'tfs-travel-textdomain' ); ?></p>

     <!-- Video Preview -->
     <?php
     $hero_video_current = isset( $sbm_stored_travel_meta['travel-hero-video'] )
      ? trim( (string) $sbm_stored_travel_meta['travel-hero-video'][0] )
      : '';
     $hero_poster = has_post_thumbnail()
      ? get_the_post_thumbnail_url(get_the_ID(), 'large')
      : '';
     ?>
     <div id="travel-hero-video-preview" style="margin-top:10px; <?php echo $hero_video_current ? '' : 'display:none;'; ?>">
      <video
       id="travel-hero-video-element"
       controls
       playsinline
       preload="metadata"
       style="max-width:100%;height:auto;"
       <?php if ( $hero_poster ) : ?>
        poster="<?php echo esc_url( $hero_poster ); ?>"
       <?php endif; ?>
      >
       <?php if ( $hero_video_current ) : ?>
        <source src="<?php echo esc_url( $hero_video_current ); ?>" type="video/mp4" />
       <?php endif; ?>
       <?php _e( 'Your browser does not support the video tag.', 'tfs-travel-textdomain' ); ?>
      </video>
     </div>
     <script>
         document.addEventListener('DOMContentLoaded', function () {
             var input = document.getElementById('travel-hero-video');
             var previewWrap = document.getElementById('travel-hero-video-preview');
             var video = document.getElementById('travel-hero-video-element');
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
    </div>

    <!-- Travel Description / Appears below site title -->
    <div class="meta-field-container">
        <strong><label for="travel-description" class="sbm-row-title"><?php _e( 'Travel Description', 'sbm-textdomain' )?></label></strong>
        <input style="width: 100%;" type="text" name="travel-description" id="travel-description" placeholder="Appears below title" value="<?php if ( isset ( $sbm_stored_travel_meta['travel-description'] ) ) echo $sbm_stored_travel_meta['travel-description'][0]; ?>" />
    </div>

    <!-- TRAVEL DETAILS-->
    <hr style="margin-top: 1.618em; border-top: 3px double #8c8b8b;">
    <h3><?php echo 'Travel Costs' ?></h3>

    <!-- Travel Costs Image -->
    <div class="meta-field-container">

        <strong><label for="travel-costs-image" class="sbm-row-title"><?php _e( 'Travel Costs Image', 'the-fly-shop' );?></label></strong><br>
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

    <!-- Travel Costs & Inclusions Video -->
    <div class="meta-field-container">
        <strong><label for="feature_1_video_url" class="sbm-row-title"><?php _e( 'Travel Costs & Inclusions Video URL', 'tfs-travel-textdomain' ); ?></label></strong>
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
        <p class="description"><?php _e( 'Add a direct video URL (e.g., MP4). Playback is user-initiated via controls. Poster uses the Travel Costs image if set.', 'tfs-travel-textdomain' ); ?></p>
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
                    style="max-width:100%;height:auto;"
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

    <p><!-- Travel Insurance Text Area -->
        <strong><label for="feature-1-travelins-textarea" class="sbm-row-title"><?php _e( 'Travel Insurance', 'tfs-travel-textdomain' )?></label></strong>
        <textarea style="width: 100%;" rows="4" name="feature-1-travelins-textarea" id="feature-1-travelins-textarea"><?php if ( isset ( $sbm_stored_travel_meta['feature-1-travelins-textarea'] ) ) echo $sbm_stored_travel_meta['feature-1-travelins-textarea'][0]; ?></textarea>
    </p>

    <div class="meta-field-container">
        <strong><label for="feature-1-readmore" class="sbm-row-title"><?php _e( 'Travel Inclusions Read More', 'tfs-travel-textdomain')?></label></strong>
        <textarea style="width: 100%;" rows="4" name="feature-1-readmore" id="feature-1-readmore"><?php if ( isset ( $sbm_stored_travel_meta['feature-1-readmore'] ) ) echo $sbm_stored_travel_meta['feature-1-readmore'][0]; ?></textarea>
    </div>

    <!-- ====== FEATURE #2 SEASONS ====== -->
    <hr style="margin-top: 1.618em; border-top: 3px double #8c8b8b;">
    <h3><?php echo 'Travel Seasons' ?></h3>

    <p><!-- Feature #2 Seasons -->
        <strong><label for="feature-2-seasons-title" class="sbm-row-title"><?php _e( 'Title', 'tfs-travel-textdomain' )?></label></strong>
        <input style="width: 100%;" type="text" name="feature-2-seasons-title" id="feature-2-seasons-title" value="<?php if ( isset ( $sbm_stored_travel_meta['feature-2-seasons-title'] ) ) echo $sbm_stored_travel_meta['feature-2-seasons-title'][0]; ?>" />
    </p>
    <!-- Feature #2 Image -->
    <div class="meta-field-container">

        <strong><label for="travel-seasons-image" class="sbm-row-title"><?php _e( 'Travel Costs Image', 'the-fly-shop' );?></label></strong><br>
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
                    style="max-width:100%;height:auto;"
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
                            <strong><label for="feature-2-read-more-info" class="sbm-row-title"><?php _e( 'Read More Info', 'sbm-textdomain' )?></label></strong>
                            <input style="width: 100%;" type="text" name="feature-2-read-more-info" id="feature-2-read-more-info" placeholder="Add Read More Info" value="<?php if ( isset ( $sbm_stored_travel_meta['feature-2-read-more-info'] ) ) echo $sbm_stored_travel_meta['feature-2-read-more-info'][0]; ?>" />

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
                                </div>
                            </div>
                        </div>

                        <script>
                            document.addEventListener('DOMContentLoaded', function() {
                                function updateMultiSeasonPreview() {
                                    // Reset all months
                                    document.querySelectorAll('.month-preview-multi .month-periods div').forEach(function(el) {
                                        el.style.backgroundColor = '#f8f8f8';
                                    });

                                    // Update legend
                                    document.querySelector('.season1-legend').style.backgroundColor = document.getElementById('season1-color').value;
                                    document.querySelector('.season1-text').textContent = document.getElementById('season1-name').value || 'Primary Season';
                                    document.querySelector('.season2-legend').style.backgroundColor = document.getElementById('season2-color').value;
                                    document.querySelector('.season2-text').textContent = document.getElementById('season2-name').value || 'Secondary Season';
                                    document.querySelector('.season3-legend').style.backgroundColor = document.getElementById('season3-color').value;
                                    document.querySelector('.season3-text').textContent = document.getElementById('season3-name').value || 'Third Season';

                                    // Apply season colors
                                    for (let season = 1; season <= 3; season++) {
                                        const startMonth = parseInt(document.getElementById(`season${season}-start-month`).value);
                                        const endMonth = parseInt(document.getElementById(`season${season}-end-month`).value);
                                        const startPart = document.getElementById(`season${season}-start-part`).value;
                                        const endPart = document.getElementById(`season${season}-end-part`).value;
                                        const color = document.getElementById(`season${season}-color`).value;

                                        if (startMonth > 0 && endMonth > 0) {
                                            for (let month = 1; month <= 12; month++) {
                                                let inSeason = false;

                                                if (startMonth <= endMonth) {
                                                    inSeason = month >= startMonth && month <= endMonth;
                                                } else {
                                                    inSeason = month >= startMonth || month <= endMonth;
                                                }

                                                if (inSeason) {
                                                    const monthEl = document.querySelector(`[data-month="${month}"]`);
                                                    const periods = ['early', 'mid', 'late'];

                                                    periods.forEach(period => {
                                                        let shouldColor = false;

                                                        if (month === startMonth && month === endMonth) {
                                                            // Same month start and end
                                                            const startIdx = periods.indexOf(startPart);
                                                            const endIdx = periods.indexOf(endPart);
                                                            const periodIdx = periods.indexOf(period);
                                                            shouldColor = periodIdx >= startIdx && periodIdx <= endIdx;
                                                        } else if (month === startMonth) {
                                                            // Start month
                                                            if (startPart === 'full') shouldColor = true;
                                                            else {
                                                                const startIdx = periods.indexOf(startPart);
                                                                const periodIdx = periods.indexOf(period);
                                                                shouldColor = periodIdx >= startIdx;
                                                            }
                                                        } else if (month === endMonth) {
                                                            // End month
                                                            if (endPart === 'full') shouldColor = true;
                                                            else {
                                                                const endIdx = periods.indexOf(endPart);
                                                                const periodIdx = periods.indexOf(period);
                                                                shouldColor = periodIdx <= endIdx;
                                                            }
                                                        } else {
                                                            // Full months in between
                                                            shouldColor = true;
                                                        }

                                                        if (shouldColor) {
                                                            monthEl.querySelector(`.period-${period}`).style.backgroundColor = color;
                                                        }
                                                    });
                                                }
                                            }
                                        }
                                    }
                                }

                                // Add event listeners for all season controls
                                for (let season = 1; season <= 3; season++) {
                                    ['start-month', 'end-month', 'start-part', 'end-part', 'color', 'name'].forEach(field => {
                                        const element = document.getElementById(`season${season}-${field}`);
                                        if (element) {
                                            element.addEventListener('change', updateMultiSeasonPreview);
                                        }
                                    });
                                }

                                // Initial preview
                                updateMultiSeasonPreview();
                            });
                        </script>
                    </div>
                </div> <!-- /tab-content -->
            </div>
        </div>
    </div>

    <!-- ====== GETTING TO ====== -->
    <hr style="margin-top: 1.618em; border-top: 3px double #8c8b8b;">
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
        <p class="description"><?php _e( 'Add a direct video URL (e.g., MP4). Playback is user-initiated via controls. Poster uses the Travel Costs image if set.', 'tfs-travel-textdomain' ); ?></p>
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
                    style="max-width:100%;height:auto;"
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
        <strong><label for="feature-3-read-more-info" class="sbm-row-title"><?php _e( 'Read More Info', 'sbm-textdomain' )?></label></strong>
        <input style="width: 100%;" type="text" name="feature-3-read-more-info" id="feature-3-read-more-info" placeholder="Add Read More Info" value="<?php if ( isset ( $sbm_stored_travel_meta['feature-3-read-more-info'] ) ) echo $sbm_stored_travel_meta['feature-3-read-more-info'][0]; ?>" />

        <strong><label for="feature-3-get-to-readmore" class="sbm-row-title"><?php _e( 'Read more', 'tfs-travel-textdomain' )?></label></strong>
        <textarea style="width: 100%;" rows="4" name="feature-3-get-to-readmore" id="feature-3-get-to-readmore"><?php if ( isset ( $sbm_stored_travel_meta['feature-3-get-to-readmore'] ) ) echo $sbm_stored_travel_meta['feature-3-get-to-readmore'][0]; ?></textarea>
    </p>

    <!-- ====== LODGING ====== -->
    <hr style="margin-top: 1.618em; border-top: 3px double #8c8b8b;">
    <h3><?php echo 'Lodging' ?></h3>

    <p><!-- Lodging Title -->
        <strong><label for="feature-4-lodging-title" class="sbm-row-title"><?php _e( 'Title', 'tfs-travel-textdomain' )?></label></strong>
        <input style="width: 100%;" type="text" name="feature-4-lodging-title" id="feature-4-lodging-title" value="<?php if ( isset ( $sbm_stored_travel_meta['feature-4-lodging-title'] ) ) echo $sbm_stored_travel_meta['feature-4-lodging-title'][0]; ?>" />
    </p>

    <!-- Lodging Image -->
    <div class="meta-field-container">

        <strong><label for="feature-4-lodging-img" class="sbm-row-title"><?php _e( 'Destination Loding Image','the-fly-shop' );?></label></strong><br>
        <input style="width:75%;" type="text" name="feature-4-lodging-img" id="feature-4-lodging-img" value="<?php if ( isset ( $sbm_stored_travel_meta['feature-4-lodging-img'] ) ) echo $sbm_stored_travel_meta['feature-4-lodging-img'][0];?>" />
        <input type="button" id="feature-4-lodging-img-button" class="button" value="<?php _e( 'Choose or Upload an Image', 'the-fly-shop' );?>" />

        <!-- Preview container -->
        <div id="feature-4-lodging-img-preview" style="margin-top: 10px;">
            <?php if ( isset( $sbm_stored_travel_meta['feature-4-lodging-img'] ) && $sbm_stored_travel_meta['feature-4-lodging-img'][0] != '' ) : ?>
                <img src="<?php echo esc_url( $sbm_stored_travel_meta['feature-4-lodging-img'][0] ); ?>"
                     style="max-width: 250px; max-height: 250px; border: 1px solid #ddd; padding: 5px;"
                     alt="Preview" />
                <br><button type="button" id="feature-4-lodging-img-remove" class="button" style="margin-top: 5px;">Remove Image</button>
            <?php endif; ?>
        </div>

    </div>

    <!-- Lodging Video -->
    <div class="meta-field-container">
        <strong><label for="feature_4_video_url" class="sbm-row-title"><?php _e( 'Lodging Video URL', 'tfs-travel-textdomain' ); ?></label></strong>
        <input
                type="url"
                name="feature_4_video_url"
                id="feature_4_video_url"
                style="width: 100%;"
                placeholder="https://example.com/path/video.mp4"
                value="<?php
                if ( isset( $sbm_stored_travel_meta['feature_4_video_url'] ) ) {
                    echo esc_attr( $sbm_stored_travel_meta['feature_4_video_url'][0] );
                }
                ?>"
        />
        <p class="description"><?php _e( 'Add a direct video URL (e.g., MP4). Playback is user-initiated via controls. Poster uses the Travel Costs image if set.', 'tfs-travel-textdomain' ); ?></p>
    </div>

        <?php
        $feature_4_video_current = isset( $sbm_stored_travel_meta['feature_4_video_url'] )
                ? trim( (string) $sbm_stored_travel_meta['feature_4_video_url'][0] )
                : '';
        $travel_lodging_poster = isset( $sbm_stored_travel_meta['travel-lodging-image'] )
                ? trim( (string) $sbm_stored_travel_meta['travel-lodging-image'][0] )
                : '';
        ?>

    <div id="feature-4-video-preview" style="margin-top:10px; <?php echo $feature_4_video_current ? '' : 'display:none;'; ?>">
        <video
                id="feature-4-video"
                controls
                playsinline
                preload="metadata"
                style="max-width:100%;height:auto;"
                <?php if ( $travel_lodging_poster ) : ?>
                    poster="<?php echo esc_url( $travel_lodging_poster ); ?>"
                <?php endif; ?>
        >
            <?php if ( $feature_4_video_current ) : ?>
                <source src="<?php echo esc_url( $feature_4_video_current ); ?>" type="video/mp4" />
            <?php endif; ?>
            <?php _e( 'Your browser does not support the video tag.', 'tfs-travel-textdomain' ); ?>
        </video>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var input = document.getElementById('feature_4_video_url');
            var previewWrap = document.getElementById('feature-4-video-preview');
            var video = document.getElementById('feature-4-video');
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

    <!-- Lodging Content -->
    <p>
        <strong><label for="feature-4-lodging-content" class="sbm-row-title"><?php _e( 'Content', 'tfs-travel-textdomain' )?></label></strong>
        <textarea style="width: 100%;" rows="4" name="feature-4-lodging-content" id="feature-4-lodging-content"><?php if ( isset ( $sbm_stored_travel_meta['feature-4-lodging-content'] ) ) echo $sbm_stored_travel_meta['feature-4-lodging-content'][0]; ?></textarea>
    </p>

    <p><!-- Lodging Read More -->
        <strong><label for="feature-4-read-more-info" class="sbm-row-title"><?php _e( 'Read More Info', 'sbm-textdomain' )?></label></strong>
        <input style="width: 100%;" type="text" name="feature-4-read-more-info" id="feature-4-read-more-info" placeholder="Add Read More Info" value="<?php if ( isset ( $sbm_stored_travel_meta['feature-4-read-more-info'] ) ) echo $sbm_stored_travel_meta['feature-4-read-more-info'][0]; ?>" />
        <strong><label for="feature-4-lodging-readmore" class="sbm-row-title"><?php _e( 'Read more', 'tfs-travel-textdomain' )?></label></strong>
        <textarea style="width: 100%;" rows="4" name="feature-4-lodging-readmore" id="feature-4-lodging-readmore"><?php if ( isset ( $sbm_stored_travel_meta['feature-4-lodging-readmore'] ) ) echo $sbm_stored_travel_meta['feature-4-lodging-readmore'][0]; ?></textarea>
    </p>

    <!-- ====== ANGLING ====== -->
    <hr style="margin-top: 1.618em; border-top: 3px double #8c8b8b;">
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
        <p class="description"><?php _e( 'Add a direct video URL (e.g., MP4). Playback is user-initiated via controls. Poster uses the Travel Costs image if set.', 'tfs-travel-textdomain' ); ?></p>
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
                style="max-width:100%;height:auto;"
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
        <strong><label for="feature-5-read-more-info" class="sbm-row-title"><?php _e( 'Read More Info', 'sbm-textdomain' )?></label></strong>
        <input style="width: 100%;" type="text" name="feature-5-read-more-info" id="feature-5-read-more-info" placeholder="Add Read More Info" value="<?php if ( isset ( $sbm_stored_travel_meta['feature-5-read-more-info'] ) ) echo $sbm_stored_travel_meta['feature-5-read-more-info'][0]; ?>" />

        <strong><label for="feature-5-angling-readmore" class="sbm-row-title"><?php _e( 'Read more', 'tfs-travel-textdomain' )?></label></strong>
        <textarea style="width: 100%;" rows="4" name="feature-5-angling-readmore" id="feature-5-angling-readmore"><?php if ( isset ( $sbm_stored_travel_meta['feature-5-angling-readmore'] ) ) echo $sbm_stored_travel_meta['feature-5-angling-readmore'][0]; ?></textarea>
    </p>

    <!-- ====== CALL TO ACTION ROW ====== -->
    <hr style="margin-top: 1.618em; border-top: 3px double #8c8b8b;">
    <h3><?php echo 'Set The Hook Section' ?></h3>

    <p><!-- Set The Hook Into -->
        <strong><label for="cta-strong-intro" class="sbm-row-title"><?php _e('Set The Hook Intro','tfs-travel-textdomain')?></label></strong>
        <input style="width: 100%;" type="text" placeholder="Place CTA content here." name="cta-strong-intro" id="cta-strong-intro" value="<?php if (isset($sbm_stored_travel_meta['cta-strong-intro'])) echo $sbm_stored_travel_meta['cta-strong-intro'][0]; ?>" />
    </p>

    <p><!-- Set The Hook Content -->
        <strong><label for="cta-content" class="sbm-row-title"><?php _e( 'Set The Hook Content', 'tfs-travel-textdomain' )?></label></strong>
        <textarea style="width: 100%;" rows="4" name="cta-content" id="cta-content"><?php if ( isset ( $sbm_stored_travel_meta['cta-content'] ) ) echo $sbm_stored_travel_meta['cta-content'][0]; ?></textarea>
    </p>

    <!-- /end of custom fields -->

    <!-- ====== ADDITIONAL PHOTOS SECTION ====== -->
    <hr style="margin-top: 1.618em; border-top: 3px double #8c8b8b;">
    <h3><?php echo 'Additional Images' ?></h3>

    <p> <!-- Additional Image #1 -->

        <label for="additional-travel-image1"
               class="travel-row-title"><?php _e( '<strong>Additional Image &#35;1</strong>',
                'the-fly-shop' ); ?></label>

        <input type="text" name="additional-travel-image1"
               id="additional-travel-image1"
               value="<?php if ( isset ( $sbm_stored_travel_meta['additional-travel-image1'] ) ) {
                   echo $sbm_stored_travel_meta['additional-travel-image1'][0];
               } ?>"/>
        <input type="button" id="additional-travel-image1-button" class="button"
               value="<?php _e( 'Choose or Upload an Image',
                   'the-fly-shop' ); ?>"/>

    </p>

    <p> <!-- Additional Image #2 -->

        <label for="additional-travel-image2"
               class="travel-row-title"><?php _e( '<strong>Additional Image &#35;2</strong>',
                'the-fly-shop' ); ?></label>

        <input type="text" name="additional-travel-image2"
               id="additional-travel-image2"
               value="<?php if ( isset ( $sbm_stored_travel_meta['additional-travel-image2'] ) ) {
                   echo $sbm_stored_travel_meta['additional-travel-image2'][0];
               } ?>"/>
        <input type="button" id="additional-travel-image2-button" class="button"
               value="<?php _e( 'Choose or Upload an Image',
                   'the-fly-shop' ); ?>"/>

    </p>

    <p> <!-- Additional Image #3 -->

        <label for="additional-travel-image3"
               class="travel-row-title"><?php _e( '<strong>Additional Image &#35;3</strong>',
                'the-fly-shop' ); ?></label>

        <input type="text" name="additional-travel-image3"
               id="additional-travel-image3"
               value="<?php if ( isset ( $sbm_stored_travel_meta['additional-travel-image3'] ) ) {
                   echo $sbm_stored_travel_meta['additional-travel-image3'][0];
               } ?>"/>
        <input type="button" id="additional-travel-image3-button" class="button"
               value="<?php _e( 'Choose or Upload an Image',
                   'the-fly-shop' ); ?>"/>

    </p>

    <p> <!-- Additional Image #4 -->

        <label for="additional-travel-image4"
               class="travel-row-title"><?php _e( '<strong>Additional Image &#35;4</strong>',
                'the-fly-shop' ); ?></label>

        <input type="text" name="additional-travel-image4"
               id="additional-travel-image4"
               value="<?php if ( isset ( $sbm_stored_travel_meta['additional-travel-image4'] ) ) {
                   echo $sbm_stored_travel_meta['additional-travel-image4'][0];
               } ?>"/>
        <input type="button" id="additional-travel-image4-button" class="button"
               value="<?php _e( 'Choose or Upload an Image',
                   'the-fly-shop' ); ?>"/>

    </p>

    <p> <!-- Additional Image #5 -->

        <label for="additional-travel-image5"
               class="travel-row-title"><?php _e( '<strong>Additional Image &#35;5</strong>',
                'the-fly-shop' ); ?></label>

        <input type="text" name="additional-travel-image5"
               id="additional-travel-image5"
               value="<?php if ( isset ( $sbm_stored_travel_meta['additional-travel-image5'] ) ) {
                   echo $sbm_stored_travel_meta['additional-travel-image5'][0];
               } ?>"/>
        <input type="button" id="additional-travel-image5-button" class="button"
               value="<?php _e( 'Choose or Upload an Image',
                   'the-fly-shop' ); ?>"/>

    </p>

    <p> <!-- Additional Image #6 -->

        <label for="additional-travel-image6"
               class="travel-row-title"><?php _e( '<strong>Additional Image &#35;6</strong>',
                'the-fly-shop' ); ?></label>

        <input type="text" name="additional-travel-image6"
               id="additional-travel-image6"
               value="<?php if ( isset ( $sbm_stored_travel_meta['additional-travel-image6'] ) ) {
                   echo $sbm_stored_travel_meta['additional-travel-image6'][0];
               } ?>"/>
        <input type="button" id="additional-travel-image6-button" class="button"
               value="<?php _e( 'Choose or Upload an Image',
                   'the-fly-shop' ); ?>"/>

    </p>

    <p> <!-- Additional Image #7 -->

        <label for="additional-travel-image7"
               class="travel-row-title"><?php _e( '<strong>Additional Image &#35;7</strong>',
                'the-fly-shop' ); ?></label>

        <input type="text" name="additional-travel-image7"
               id="additional-travel-image7"
               value="<?php if ( isset ( $sbm_stored_travel_meta['additional-travel-image7'] ) ) {
                   echo $sbm_stored_travel_meta['additional-travel-image7'][0];
               } ?>"/>
        <input type="button" id="additional-travel-image7-button" class="button"
               value="<?php _e( 'Choose or Upload an Image',
                   'the-fly-shop' ); ?>"/>

    </p>

    <p> <!-- Additional Image #8 -->

        <label for="additional-travel-image8"
               class="travel-row-title"><?php _e( '<strong>Additional Image &#35;8</strong>',
                'the-fly-shop' ); ?></label>

        <input type="text" name="additional-travel-image8"
               id="additional-travel-image8"
               value="<?php if ( isset ( $sbm_stored_travel_meta['additional-travel-image8'] ) ) {
                   echo $sbm_stored_travel_meta['additional-travel-image8'][0];
               } ?>"/>
        <input type="button" id="additional-travel-image8-button" class="button"
               value="<?php _e( 'Choose or Upload an Image',
                   'the-fly-shop' ); ?>"/>

    </p>

    <?php } ?>
