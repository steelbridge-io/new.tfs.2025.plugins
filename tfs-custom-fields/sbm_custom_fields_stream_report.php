<?php
  /**
   * Description: Stream Report Custom Meta Fields
   *
   * @package		streamReport
   * @since			1.2.3
   * @author			Chris Parsons
   * @link				http://steelbridge.io
   * @license		GNU General Public License
   */

// Adds a meta box to the post editing screen on the template named stream-report-template.php
  function sbm_custom_meta_travel() {

    global $post;

    if(!empty($post)){
      $pageTemplate = get_post_meta($post->ID, '_wp_page_template', true);
      if($pageTemplate == 'page-templates/stream-report-template.php') {

        add_meta_box( 'sbm_meta', __( 'Regional Reports', 'sbm-textdomain' ), 'sbm_meta_callback', 'page', 'normal', 'high' );

      }
    }
  }
  add_action( 'add_meta_boxes', 'sbm_custom_meta_travel' );

// Checks to see if any data to save. Sanitizes and saves as needed.
  include_once( plugin_dir_path( __FILE__ ) . '/inc/sanitize_fields_stream_report.php');

// Outputs the content of the meta box

  function sbm_meta_callback( $post ) {
    wp_nonce_field( basename( __FILE__ ), 'sbm_nonce' );
    $sbm_stored_meta = get_post_meta( $post->ID );
    ?>
    <div style="margin-top: 1.618em;">
      <h1><?php echo 'Stream Report' ?></h1>
    </div>

    <!-- ====== FEATURED REPORT AREA ====== -->
    <div style="margin-top: 1.618em;">
      <h3><?php echo 'Featured Reports' ?></h3>
    </div>

    <!-- Meta One Select -->
    <p>
      <label for="meta-one-select" class="sbm-row-title"><strong><?php _e('Featured Report #1','sbm-textdomain')?></strong></label>
      <select name="meta-one-select" id="meta-one-select">

        <option value="AntelopeCreek" <?php if ( isset ( $sbm_stored_meta['meta-one-select'] ) ) selected( $sbm_stored_meta['meta-one-select'][0], 'AntelopeCreek' ); ?>><?php _e( 'Antelope Creek Lodge',
            'sbm-textdomain' )?></option>';

        <option value="BaileyCreek" <?php if ( isset ( $sbm_stored_meta['meta-one-select'] ) ) selected( $sbm_stored_meta['meta-one-select'][0], 'BaileyCreek' ); ?>><?php _e( 'Bailey Creek',
            'sbm-textdomain' )?></option>';

        <option value="BattleCreek" <?php if ( isset ( $sbm_stored_meta['meta-one-select'] ) ) selected( $sbm_stored_meta['meta-one-select'][0], 'BattleCreek' ); ?>><?php _e( 'Battle Creek',
            'sbm-textdomain' )?></option>';

        <option value="BaumLake" <?php if ( isset ( $sbm_stored_meta['meta-one-select'] ) ) selected( $sbm_stored_meta['meta-one-select'][0], 'BaumLake' ); ?>><?php _e( 'Baum Lake', 'sbm-textdomain' )?></option>';

        <option value="Bollibokka" <?php if ( isset ( $sbm_stored_meta['meta-one-select'] ) ) selected( $sbm_stored_meta['meta-one-select'][0], 'Bollibokka' ); ?>><?php _e( 'Bollibokka',
            'sbm-textdomain' )?></option>';

        <option value="CircleSeven" <?php if ( isset ( $sbm_stored_meta['meta-one-select'] ) ) selected( $sbm_stored_meta['meta-one-select'][0], 'CircleSeven' ); ?>><?php _e( 'Circle 7 Guest Ranch',
            'sbm-textdomain' )?></option>';

        <option value="ClearCreek" <?php if ( isset ( $sbm_stored_meta['meta-one-select'] ) ) selected( $sbm_stored_meta['meta-one-select'][0], 'ClearCreek' ); ?>><?php _e( 'Clear Creek Ranch',
            'sbm-textdomain' )?></option>';

        <option value="FallRiver" <?php if ( isset ( $sbm_stored_meta['meta-one-select'] ) ) selected($sbm_stored_meta['meta-one-select'][0], 'FallRiver' ); ?>><?php _e( 'Fall River', 'sbm-textdomain' )?></option>';

        <option value="GoldRiver" <?php if ( isset ( $sbm_stored_meta['meta-one-select'] ) )
          selected($sbm_stored_meta['meta-one-select'][0], 'GoldRiver' ); ?>><?php _e( 'Gold River Lodge',
            'sbm-textdomain' )?></option>';

        <option value="HatCreek" <?php if ( isset ( $sbm_stored_meta['meta-one-select'] ) ) selected($sbm_stored_meta['meta-one-select'][0], 'HatCreek' ); ?>><?php _e( 'Hat Creek', 'sbm-textdomain' )?></option>';

        <option value="HatCreekRanch" <?php if ( isset ( $sbm_stored_meta['meta-one-select'] ) )
          selected( $sbm_stored_meta['meta-one-select'][0], 'HatCreekRanch' ); ?>><?php _e( 'Hat Creek Ranch', 'sbm-textdomain' )?></option>';

        <option value="IronCanyon" <?php if ( isset ( $sbm_stored_meta['meta-one-select'] ) ) selected($sbm_stored_meta['meta-one-select'][0], 'IronCanyon' ); ?>><?php _e( 'Iron Canyon Res.',
            'sbm-textdomain' )?></option>';

        <option value="KeswickRes" <?php if ( isset ( $sbm_stored_meta['meta-one-select'] ) )
          selected($sbm_stored_meta['meta-one-select'][0], 'KeswickRes' ); ?>><?php _e( 'Keswick Res.',
            'sbm-textdomain' )?></option>';

        <option value="KlamathRiver" <?php if ( isset ( $sbm_stored_meta['meta-one-select'] ) ) selected( $sbm_stored_meta['meta-one-select'][0], 'KlamathRiver' ); ?>><?php _e( 'Klamath River', 'sbm-textdomain' )?></option>';

        <option value="LakeShasta" <?php if ( isset ( $sbm_stored_meta['meta-one-select'] ) )
          selected( $sbm_stored_meta['meta-one-select'][0], 'LakeShasta' ); ?>><?php _e( 'Lake Shasta', 'sbm-textdomain' )?></option>';

        <option value="LewistonLake" <?php if ( isset ( $sbm_stored_meta['meta-one-select'] ) ) selected( $sbm_stored_meta['meta-one-select'][0], 'LewistonLake' ); ?>><?php _e( 'Lewiston Lake', 'sbm-textdomain' )?></option>';

        <option value="LowerSac" <?php if ( isset ( $sbm_stored_meta['meta-one-select'] ) ) selected( $sbm_stored_meta['meta-one-select'][0], 'LowerSac' ); ?>>
          <?php _e( 'Lower Sacramento', 'sbm-textdomain' )?></option>';

        <option value="LukLake" <?php if ( isset ( $sbm_stored_meta['meta-one-select'] ) ) selected( $sbm_stored_meta['meta-one-select'][0], 'LukLake' ); ?>><?php _e( 'Luk Lake', 'sbm-textdomain' )?></option>';

        <option value="ManzanitaLake" <?php if ( isset ( $sbm_stored_meta['meta-one-select'] ) )
          selected( $sbm_stored_meta['meta-one-select'][0], 'ManzanitaLake' ); ?>><?php _e( 'Manzanita Lake',
            'sbm-textdomain' )?></option>';

        <option value="McCloudReservoir" <?php if ( isset ( $sbm_stored_meta['meta-one-select']
        ) ) selected( $sbm_stored_meta['meta-one-select'][0], 'McCloudReservoir' ); ?>><?php _e( 'McCloud Reservoir', 'sbm-textdomain' )?></option>';

        <option value="McCloudRiver" <?php if ( isset ( $sbm_stored_meta['meta-one-select'] ) ) selected( $sbm_stored_meta['meta-one-select'][0], 'McCloudRiver' ); ?>><?php _e( 'McCloud River', 'sbm-textdomain' )?></option>';

        <option value="OasisSprings" <?php if ( isset ( $sbm_stored_meta['meta-one-select'] ) ) selected( $sbm_stored_meta['meta-one-select'][0], 'OasisSprings' ); ?>><?php _e( 'Oasis Springs', 'sbm-textdomain' )?></option>';

        <option value="PedrottiPonds" <?php if ( isset ( $sbm_stored_meta['meta-one-select'] ) ) selected( $sbm_stored_meta['meta-one-select'][0], 'PedrottiPonds' ); ?>><?php _e( 'Pedrotti Ponds',
            'sbm-textdomain' )?></option>';

        <option value="PitRiver" <?php if ( isset ( $sbm_stored_meta['meta-one-select'] ) )
          selected( $sbm_stored_meta['meta-one-select'][0], 'PitRiver' ); ?>><?php _e( 'Pit River',
            'sbm-textdomain' )?></option>';

        <option value="PyramidLake" <?php if ( isset ( $sbm_stored_meta['meta-one-select'] ) )
          selected( $sbm_stored_meta['meta-one-select'][0], 'PyramidLake' ); ?>><?php _e( 'Pyramid Lake',
            'sbm-textdomain' )?></option>';

        <option value="RockCreek" <?php if ( isset ( $sbm_stored_meta['meta-one-select'] ) )
          selected( $sbm_stored_meta['meta-one-select'][0], 'RockCreek' ); ?>><?php _e( 'Rock Creek',
            'sbm-textdomain' )?></option>';

        <option value="SugarCreek" <?php if ( isset ( $sbm_stored_meta['meta-one-select'] ) ) selected( $sbm_stored_meta['meta-one-select'][0], 'SugarCreek' ); ?>><?php _e( 'Sugar Creek', 'sbm-textdomain' )?></option>';

        <option value="Trinity" <?php if ( isset ( $sbm_stored_meta['meta-one-select'] ) ) selected( $sbm_stored_meta['meta-one-select'][0], 'Trinity' ); ?>><?php _e( 'Trinity River', 'sbm-textdomain' )?></option>';

        <option value="UpperSac" <?php if ( isset ( $sbm_stored_meta['meta-one-select'] ) )
          selected( $sbm_stored_meta['meta-one-select'][0], 'UpperSac' ); ?>><?php _e( 'Upper Sacramento',
            'sbm-textdomain' )?></option>';

      </select>
    </p>

    <!-- Meta Two Select -->
    <p>
      <label for="meta-two-select" class="sbm-row-title"><strong><?php _e('Featured Report #2','sbm-textdomain')?></strong></label>
      <select name="meta-two-select" id="meta-two-select">

        <option value="AntelopeCreek" <?php if ( isset ( $sbm_stored_meta['meta-two-select'] ) ) selected( $sbm_stored_meta['meta-two-select'][0], 'AntelopeCreek' ); ?>><?php _e( 'Antelope Creek Lodge',
            'sbm-textdomain' )?></option>';

        <option value="BaileyCreek" <?php if ( isset ( $sbm_stored_meta['meta-two-select'] ) )
          selected( $sbm_stored_meta['meta-two-select'][0], 'BaileyCreek' ); ?>><?php _e( 'Bailey Creek',
            'sbm-textdomain' )?></option>';

        <option value="BattleCreek" <?php if ( isset ( $sbm_stored_meta['meta-two-select'] ) )
          selected( $sbm_stored_meta['meta-two-select'][0], 'BattleCreek' ); ?>><?php _e( 'Battle Creek',
            'sbm-textdomain' )?></option>';

        <option value="BaumLake" <?php if ( isset ( $sbm_stored_meta['meta-two-select'] ) ) selected( $sbm_stored_meta['meta-two-select'][0], 'BaumLake' ); ?>><?php _e( 'Baum Lake',
            'sbm-textdomain' )?></option>';

        <option value="Bollibokka" <?php if ( isset ( $sbm_stored_meta['meta-two-select'] ) )
          selected( $sbm_stored_meta['meta-two-select'][0], 'Bollibokka' ); ?>><?php _e( 'Bollibokka',
            'sbm-textdomain' )?></option>';

        <option value="CircleSeven" <?php if ( isset ( $sbm_stored_meta['meta-two-select'] ) ) selected( $sbm_stored_meta['meta-two-select'][0], 'CircleSeven' ); ?>><?php _e( 'Circle 7 Guest Ranch',
            'sbm-textdomain' )?></option>';

        <option value="ClearCreek" <?php if ( isset ( $sbm_stored_meta['meta-two-select'] ) ) selected( $sbm_stored_meta['meta-two-select'][0], 'ClearCreek' ); ?>><?php _e( 'Clear Creek Ranch',
            'sbm-textdomain' )?></option>';

        <option value="FallRiver" <?php if ( isset ( $sbm_stored_meta['meta-two-select'] ) )
          selected($sbm_stored_meta['meta-two-select'][0], 'FallRiver' ); ?>><?php _e( 'Fall
          River', 'sbm-textdomain' )?></option>';

        <option value="GoldRiver" <?php if ( isset ( $sbm_stored_meta['meta-two-select'] ) )
          selected($sbm_stored_meta['meta-two-select'][0], 'GoldRiver' ); ?>><?php _e( 'Gold River Lodge',
            'sbm-textdomain' )?></option>';

        <option value="HatCreek" <?php if ( isset ( $sbm_stored_meta['meta-two-select'] ) ) selected( $sbm_stored_meta['meta-two-select'][0], 'HatCreek' ); ?>><?php _e( 'Hat Creek', 'sbm-textdomain' )?></option>';

        <option value="HatCreekRanch" <?php if ( isset ( $sbm_stored_meta['meta-two-select'] ) )
          selected( $sbm_stored_meta['meta-two-select'][0], 'HatCreekRanch' ); ?>><?php _e( 'Hat Creek Ranch', 'sbm-textdomain' )?></option>';

        <option value="IronCanyon" <?php if ( isset ( $sbm_stored_meta['meta-two-select'] ) )
          selected($sbm_stored_meta['meta-two-select'][0], 'IronCanyon' ); ?>><?php _e( 'Iron Canyon Res.',
            'sbm-textdomain' )?></option>';

        <option value="KeswickRes" <?php if ( isset ( $sbm_stored_meta['meta-two-select'] ) )
          selected($sbm_stored_meta['meta-two-select'][0], 'KeswickRes' ); ?>><?php _e( 'Keswick Res.',
            'sbm-textdomain' )?></option>';

        <option value="KlamathRiver" <?php if ( isset ( $sbm_stored_meta['meta-two-select'] ) ) selected( $sbm_stored_meta['meta-two-select'][0], 'KlamathRiver' ); ?>><?php _e( 'Klamath River', 'sbm-textdomain' )?></option>';

        <option value="LakeShasta" <?php if ( isset ( $sbm_stored_meta['meta-two-select'] ) )
          selected( $sbm_stored_meta['meta-two-select'][0], 'LakeShasta' ); ?>><?php _e( 'Lake Shasta', 'sbm-textdomain' )?></option>';

        <option value="LewistonLake" <?php if ( isset ( $sbm_stored_meta['meta-two-select'] ) ) selected( $sbm_stored_meta['meta-two-select'][0], 'LewistonLake' ); ?>><?php _e( 'Lewiston Lake', 'sbm-textdomain' )?></option>';

        <option value="LowerSac" <?php if ( isset ( $sbm_stored_meta['meta-two-select'] ) ) selected( $sbm_stored_meta['meta-two-select'][0], 'LowerSac' ); ?>><?php _e( 'Lower Sacramento', 'sbm-textdomain' )?></option>';

        <option value="LukLake" <?php if ( isset ( $sbm_stored_meta['meta-two-select'] ) ) selected( $sbm_stored_meta['meta-two-select'][0], 'LukLake' ); ?>><?php _e( 'Luk Lake', 'sbm-textdomain' )?></option>';

        <option value="ManzanitaLake" <?php if ( isset ( $sbm_stored_meta['meta-two-select'] ) )
          selected( $sbm_stored_meta['meta-two-select'][0], 'ManzanitaLake' ); ?>><?php _e( 'Manzanita Lake',
            'sbm-textdomain' )?></option>';

        <option value="McCloudReservoir" <?php if ( isset ( $sbm_stored_meta['meta-two-select'] ) ) selected( $sbm_stored_meta['meta-two-select'][0], 'McCloudReservoir' ); ?>><?php _e( 'McCloud Reservoir', 'sbm-textdomain' )?></option>';

        <option value="McCloudRiver" <?php if ( isset ( $sbm_stored_meta['meta-two-select'] ) ) selected( $sbm_stored_meta['meta-two-select'][0], 'McCloudRiver' ); ?>><?php _e( 'McCloud River', 'sbm-textdomain' )?></option>';

        <option value="OasisSprings" <?php if ( isset ( $sbm_stored_meta['meta-two-select'] ) ) selected( $sbm_stored_meta['meta-two-select'][0], 'OasisSprings' ); ?>><?php _e( 'Oasis Springs', 'sbm-textdomain' )?></option>';

        <option value="PedrottiPonds" <?php if ( isset ( $sbm_stored_meta['meta-two-select'] ) )
          selected( $sbm_stored_meta['meta-two-select'][0], 'PedrottiPonds' ); ?>><?php _e( 'Pedrotti Ponds',
            'sbm-textdomain' )?></option>';

        <option value="PitRiver" <?php if ( isset ( $sbm_stored_meta['meta-two-select'] ) )
          selected( $sbm_stored_meta['meta-two-select'][0], 'PitRiver' ); ?>><?php _e( 'Pit River',
            'sbm-textdomain' )?></option>';

        <option value="PyramidLake" <?php if ( isset ( $sbm_stored_meta['meta-two-select'] ) )
          selected( $sbm_stored_meta['meta-two-select'][0], 'PyramidLake' ); ?>><?php _e( 'Pyramid Lake',
            'sbm-textdomain' )?></option>';

        <option value="RockCreek" <?php if ( isset ( $sbm_stored_meta['meta-two-select'] ) )
          selected( $sbm_stored_meta['meta-two-select'][0], 'RockCreek' ); ?>><?php _e( 'Rock Creek',
            'sbm-textdomain' )?></option>';

        <option value="SugarCreek" <?php if ( isset ( $sbm_stored_meta['meta-two-select'] ) ) selected( $sbm_stored_meta['meta-two-select'][0], 'SugarCreek' ); ?>><?php _e( 'Sugar Creek', 'sbm-textdomain' )?></option>';

        <option value="Trinity" <?php if ( isset ( $sbm_stored_meta['meta-two-select'] ) ) selected( $sbm_stored_meta['meta-two-select'][0], 'Trinity' ); ?>><?php _e( 'Trinity River', 'sbm-textdomain' )?></option>';

        <option value="UpperSac" <?php if ( isset ( $sbm_stored_meta['meta-two-select'] ) )
          selected( $sbm_stored_meta['meta-two-select'][0], 'UpperSac' ); ?>><?php _e( 'Upper Sacramento',
            'sbm-textdomain' )?></option>';

      </select>
    </p>

    <!-- Meta Three Select -->
    <p>
      <label for="meta-three-select" class="sbm-row-title"><strong><?php _e('Featured Report #3','sbm-textdomain')?></strong></label>
      <select name="meta-three-select" id="meta-three-select">

        <option value="AntelopeCreek" <?php if ( isset ( $sbm_stored_meta['meta-three-select'] ) ) selected( $sbm_stored_meta['meta-three-select'][0], 'AntelopeCreek' ); ?>><?php _e( 'Antelope Creek Lodge',
            'sbm-textdomain' )?></option>';

        <option value="BaileyCreek" <?php if ( isset ( $sbm_stored_meta['meta-three-select'] ) ) selected( $sbm_stored_meta['meta-three-select'][0], 'BaileyCreek' ); ?>><?php _e( 'Bailey Creek',
            'sbm-textdomain' )?></option>';

        <option value="BattleCreek" <?php if ( isset ( $sbm_stored_meta['meta-three-select'] ) )
          selected( $sbm_stored_meta['meta-three-select'][0], 'BattleCreek' ); ?>><?php _e( 'Battle Creek',
            'sbm-textdomain' )?></option>';

        <option value="BaumLake" <?php if ( isset ( $sbm_stored_meta['meta-three-select'] ) ) selected( $sbm_stored_meta['meta-three-select'][0], 'BaumLake' ); ?>><?php _e( 'Baum Lake', 'sbm-textdomain' )?></option>';

        <option value="Bollibokka" <?php if ( isset ( $sbm_stored_meta['meta-three-select'] ) )
          selected( $sbm_stored_meta['meta-three-select'][0], 'Bollibokka' ); ?>><?php _e( 'Bollibokka',
            'sbm-textdomain' )?></option>';

        <option value="CircleSeven" <?php if ( isset ( $sbm_stored_meta['meta-three-select'] ) ) selected( $sbm_stored_meta['meta-three-select'][0], 'CircleSeven' ); ?>><?php _e( 'Circle 7 Guest Ranch',
            'sbm-textdomain' )?></option>';

        <option value="ClearCreek" <?php if ( isset ( $sbm_stored_meta['meta-three-select'] ) )
          selected( $sbm_stored_meta['meta-three-select'][0], 'ClearCreek' ); ?>><?php _e( 'Clear Creek Ranch',
            'sbm-textdomain' )?></option>';

        <option value="FallRiver" <?php if ( isset ( $sbm_stored_meta['meta-three-select'] ) ) selected($sbm_stored_meta['meta-three-select'][0], 'FallRiver' ); ?>><?php _e( 'Fall
          River', 'sbm-textdomain' )?></option>';

        <option value="GoldRiver" <?php if ( isset ( $sbm_stored_meta['meta-three-select'] ) )
          selected($sbm_stored_meta['meta-three-select'][0], 'GoldRiver' ); ?>><?php _e( 'Gold River Lodge',
            'sbm-textdomain' )?></option>';

        <option value="HatCreek" <?php if ( isset ( $sbm_stored_meta['meta-three-select'] ) ) selected( $sbm_stored_meta['meta-three-select'][0], 'HatCreek' ); ?>><?php _e( 'Hat Creek', 'sbm-textdomain' )?></option>';

        <option value="HatCreekRanch" <?php if ( isset ( $sbm_stored_meta['meta-three-select'] ) )
          selected( $sbm_stored_meta['meta-three-select'][0], 'HatCreekRanch' ); ?>><?php _e( 'Hat Creek Ranch', 'sbm-textdomain' )?></option>';

        <option value="IronCanyon" <?php if ( isset ( $sbm_stored_meta['meta-three-select'] ) ) selected($sbm_stored_meta['meta-three-select'][0], 'IronCanyon' ); ?>><?php _e( 'Iron Canyon Res.',
            'sbm-textdomain' )?></option>';

        <option value="KeswickRes" <?php if ( isset ( $sbm_stored_meta['meta-three-select'] ) )
          selected($sbm_stored_meta['meta-three-select'][0], 'KeswickRes' ); ?>><?php _e( 'Keswick Res.',
            'sbm-textdomain' )?></option>';

        <option value="KlamathRiver" <?php if ( isset ( $sbm_stored_meta['meta-three-select'] ) ) selected( $sbm_stored_meta['meta-three-select'][0], 'KlamathRiver' ); ?>><?php _e( 'Klamath River', 'sbm-textdomain' )?></option>';

        <option value="LakeShasta" <?php if ( isset ( $sbm_stored_meta['meta-three-select'] ) ) selected( $sbm_stored_meta['meta-three-select'][0], 'LakeShasta' ); ?>><?php _e( 'Lake Shasta', 'sbm-textdomain' )?></option>';

        <option value="LewistonLake" <?php if ( isset ( $sbm_stored_meta['meta-three-select'] ) ) selected( $sbm_stored_meta['meta-three-select'][0], 'LewistonLake' ); ?>><?php _e( 'Lewiston Lake', 'sbm-textdomain' )?></option>';

        <option value="LowerSac" <?php if ( isset ( $sbm_stored_meta['meta-three-select'] ) ) selected( $sbm_stored_meta['meta-three-select'][0], 'LowerSac' ); ?>><?php _e( 'Lower Sacramento', 'sbm-textdomain' )?></option>';

        <option value="LukLake" <?php if ( isset ( $sbm_stored_meta['meta-three-select'] ) ) selected( $sbm_stored_meta['meta-three-select'][0], 'LukLake' ); ?>><?php _e( 'Luk Lake', 'sbm-textdomain' )?></option>';

        <option value="ManzanitaLake" <?php if ( isset ( $sbm_stored_meta['meta-three-select'] ) ) selected( $sbm_stored_meta['meta-three-select'][0], 'ManzanitaLake' ); ?>><?php _e( 'Manzanita Lake',
            'sbm-textdomain' )?></option>';

        <option value="McCloudReservoir" <?php if ( isset ( $sbm_stored_meta['meta-three-select']
        ) ) selected( $sbm_stored_meta['meta-three-select'][0], 'McCloudReservoir' ); ?>><?php _e(
          'McCloud Reservoir', 'sbm-textdomain' )?></option>';

        <option value="McCloudRiver" <?php if ( isset ( $sbm_stored_meta['meta-three-select'] ) ) selected( $sbm_stored_meta['meta-three-select'][0], 'McCloudRiver' ); ?>><?php _e( 'McCloud River', 'sbm-textdomain' )?></option>';

        <option value="OasisSprings" <?php if ( isset ( $sbm_stored_meta['meta-three-select'] ) ) selected( $sbm_stored_meta['meta-three-select'][0], 'OasisSprings' ); ?>><?php _e( 'Oasis Springs', 'sbm-textdomain' )?></option>';

        <option value="PedrottiPonds" <?php if ( isset ( $sbm_stored_meta['meta-three-select'] ) ) selected( $sbm_stored_meta['meta-three-select'][0], 'PedrottiPonds' ); ?>><?php _e( 'Pedrotti Ponds',
            'sbm-textdomain' )?></option>';

        <option value="PitRiver" <?php if ( isset ( $sbm_stored_meta['meta-three-select'] ) ) selected( $sbm_stored_meta['meta-three-select'][0], 'PitRiver' ); ?>><?php _e( 'Pit River',
            'sbm-textdomain' )?></option>';

        <option value="PyramidLake" <?php if ( isset ( $sbm_stored_meta['meta-three-select'] ) )
          selected( $sbm_stored_meta['meta-three-select'][0], 'PyramidLake' ); ?>><?php _e( 'Pyramid Lake',
            'sbm-textdomain' )?></option>';

        <option value="RockCreek" <?php if ( isset ( $sbm_stored_meta['meta-three-select'] ) ) selected( $sbm_stored_meta['meta-three-select'][0], 'RockCreek' ); ?>><?php _e( 'Rock Creek',
            'sbm-textdomain' )?></option>';

        <option value="SugarCreek" <?php if ( isset ( $sbm_stored_meta['meta-three-select'] ) ) selected( $sbm_stored_meta['meta-three-select'][0], 'SugarCreek' ); ?>><?php _e( 'Sugar Creek', 'sbm-textdomain' )?></option>';

        <option value="Trinity" <?php if ( isset ( $sbm_stored_meta['meta-three-select'] ) ) selected( $sbm_stored_meta['meta-three-select'][0], 'Trinity' ); ?>><?php _e( 'Trinity River', 'sbm-textdomain' )?></option>';

        <option value="UpperSac" <?php if ( isset ( $sbm_stored_meta['meta-three-select'] ) ) selected( $sbm_stored_meta['meta-three-select'][0], 'UpperSac' ); ?>><?php _e( 'Upper Sacramento',
            'sbm-textdomain' )?></option>';

      </select>
    </p>

    <!-- Meta Four Select -->
    <p>
      <label for="meta-four-select" class="sbm-row-title"><strong><?php _e('Featured Report #4','sbm-textdomain')?></strong></label>
      <select name="meta-four-select" id="meta-four-select">

        <option value="AntelopeCreek" <?php if ( isset ( $sbm_stored_meta['meta-four-select'] ) )
          selected( $sbm_stored_meta['meta-four-select'][0], 'AntelopeCreek' ); ?>><?php _e( 'Antelope Creek Lodge',
            'sbm-textdomain' )?></option>';

        <option value="BaileyCreek" <?php if ( isset ( $sbm_stored_meta['meta-four-select'] ) ) selected( $sbm_stored_meta['meta-four-select'][0], 'BaileyCreek' ); ?>><?php _e( 'Bailey Creek',
            'sbm-textdomain' )?></option>';

        <option value="BattleCreek" <?php if ( isset ( $sbm_stored_meta['meta-four-select'] ) )
          selected( $sbm_stored_meta['meta-four-select'][0], 'BattleCreek' ); ?>><?php _e( 'Battle Creek',
            'sbm-textdomain' )?></option>';

        <option value="BaumLake" <?php if ( isset ( $sbm_stored_meta['meta-four-select'] ) ) selected( $sbm_stored_meta['meta-four-select'][0], 'BaumLake' ); ?>><?php _e( 'Baum Lake', 'sbm-textdomain' )?></option>';

        <option value="Bollibokka" <?php if ( isset ( $sbm_stored_meta['meta-four-select'] ) ) selected( $sbm_stored_meta['meta-four-select'][0], 'Bollibokka' ); ?>><?php _e( 'Bollibokka',
            'sbm-textdomain' )?></option>';

        <option value="CircleSeven" <?php if ( isset ( $sbm_stored_meta['meta-four-select'] ) ) selected( $sbm_stored_meta['meta-four-select'][0], 'CircleSeven' ); ?>><?php _e( 'Circle 7 Guest Ranch',
            'sbm-textdomain' )?></option>';

        <option value="ClearCreek" <?php if ( isset ( $sbm_stored_meta['meta-four-select'] ) ) selected( $sbm_stored_meta['meta-four-select'][0], 'ClearCreek' ); ?>><?php _e( 'Clear Creek Ranch',
            'sbm-textdomain' )?></option>';

        <option value="FallRiver" <?php if ( isset ( $sbm_stored_meta['meta-four-select'] ) ) selected($sbm_stored_meta['meta-four-select'][0], 'FallRiver' ); ?>><?php _e( 'Fall River', 'sbm-textdomain' )?></option>';

        <option value="GoldRiver" <?php if ( isset ( $sbm_stored_meta['meta-four-select'] ) )
          selected($sbm_stored_meta['meta-four-select'][0], 'GoldRiver' ); ?>><?php _e( 'Gold River Lodge',
            'sbm-textdomain' )?></option>';

        <option value="HatCreek" <?php if ( isset ( $sbm_stored_meta['meta-four-select'] ) ) selected( $sbm_stored_meta['meta-four-select'][0], 'HatCreek' ); ?>><?php _e( 'Hat Creek', 'sbm-textdomain' )?></option>';

        <option value="HatCreekRanch" <?php if ( isset ( $sbm_stored_meta['meta-four-select'] ) ) selected( $sbm_stored_meta['meta-four-select'][0], 'HatCreekRanch' ); ?>><?php _e( 'Hat Creek Ranch', 'sbm-textdomain' )?></option>';

        <option value="IronCanyon" <?php if ( isset ( $sbm_stored_meta['meta-four-select'] ) ) selected($sbm_stored_meta['meta-four-select'][0], 'IronCanyon' ); ?>><?php _e( 'Iron Canyon Res.',
            'sbm-textdomain' )?></option>';

        <option value="KlamathRiver" <?php if ( isset ( $sbm_stored_meta['meta-four-select'] ) ) selected( $sbm_stored_meta['meta-four-select'][0], 'KlamathRiver' ); ?>><?php _e( 'Klamath River', 'sbm-textdomain' )?></option>';

        <option value="KeswickRes" <?php if ( isset ( $sbm_stored_meta['meta-four-select'] ) )
          selected($sbm_stored_meta['meta-four-select'][0], 'KeswickRes' ); ?>><?php _e( 'Keswick Res.',
            'sbm-textdomain' )?></option>';

        <option value="LakeShasta" <?php if ( isset ( $sbm_stored_meta['meta-four-select'] ) )
          selected( $sbm_stored_meta['meta-four-select'][0], 'LakeShasta' ); ?>><?php _e( 'Lake Shasta', 'sbm-textdomain' )?></option>';

        <option value="LewistonLake" <?php if ( isset ( $sbm_stored_meta['meta-four-select'] ) ) selected( $sbm_stored_meta['meta-four-select'][0], 'LewistonLake' ); ?>><?php _e( 'Lewiston Lake', 'sbm-textdomain' )?></option>';

        <option value="LowerSac" <?php if ( isset ( $sbm_stored_meta['meta-four-select'] ) ) selected( $sbm_stored_meta['meta-four-select'][0], 'LowerSac' ); ?>><?php _e( 'Lower Sacramento', 'sbm-textdomain' )?></option>';

        <option value="LukLake" <?php if ( isset ( $sbm_stored_meta['meta-four-select'] ) ) selected( $sbm_stored_meta['meta-four-select'][0], 'LukLake' ); ?>><?php _e( 'Luk Lake', 'sbm-textdomain' )?></option>';

        <option value="ManzanitaLake" <?php if ( isset ( $sbm_stored_meta['meta-four-select'] ) ) selected( $sbm_stored_meta['meta-four-select'][0], 'ManzanitaLake' ); ?>><?php _e( 'Manzanita Lake',
            'sbm-textdomain' )?></option>';

        <option value="McCloudReservoir" <?php if ( isset ( $sbm_stored_meta['meta-four-select']
        ) ) selected( $sbm_stored_meta['meta-four-select'][0], 'McCloudReservoir' ); ?>><?php _e(
          'McCloud Reservoir', 'sbm-textdomain' )?></option>';

        <option value="McCloudRiver" <?php if ( isset ( $sbm_stored_meta['meta-four-select'] ) ) selected( $sbm_stored_meta['meta-four-select'][0], 'McCloudRiver' ); ?>><?php _e( 'McCloud River', 'sbm-textdomain' )?></option>';

        <option value="OasisSprings" <?php if ( isset ( $sbm_stored_meta['meta-four-select'] ) ) selected( $sbm_stored_meta['meta-four-select'][0], 'OasisSprings' ); ?>><?php _e( 'Oasis Springs', 'sbm-textdomain' )?></option>';

        <option value="PedrottiPonds" <?php if ( isset ( $sbm_stored_meta['meta-four-select'] ) ) selected( $sbm_stored_meta['meta-four-select'][0], 'PedrottiPonds' ); ?>><?php _e( 'Pedrotti Ponds',
            'sbm-textdomain' )?></option>';

        <option value="PitRiver" <?php if ( isset ( $sbm_stored_meta['meta-four-select'] ) )
          selected( $sbm_stored_meta['meta-four-select'][0], 'PitRiver' ); ?>><?php _e( 'Pit River',
            'sbm-textdomain' )?></option>';

        <option value="PyramidLake" <?php if ( isset ( $sbm_stored_meta['meta-four-select'] ) )
          selected( $sbm_stored_meta['meta-four-select'][0], 'PyramidLake' ); ?>><?php _e( 'Pyramid Lake',
            'sbm-textdomain' )?></option>';

        <option value="RockCreek" <?php if ( isset ( $sbm_stored_meta['meta-four-select'] ) )
          selected( $sbm_stored_meta['meta-four-select'][0], 'RockCreek' ); ?>><?php _e( 'Rock Creek',
            'sbm-textdomain' )?></option>';

        <option value="SugarCreek" <?php if ( isset ( $sbm_stored_meta['meta-four-select'] ) ) selected( $sbm_stored_meta['meta-four-select'][0], 'SugarCreek' ); ?>><?php _e( 'Sugar Creek', 'sbm-textdomain' )?></option>';

        <option value="Trinity" <?php if ( isset ( $sbm_stored_meta['meta-four-select'] ) ) selected( $sbm_stored_meta['meta-four-select'][0], 'Trinity' ); ?>><?php _e( 'Trinity River', 'sbm-textdomain' )?></option>';

        <option value="UpperSac" <?php if ( isset ( $sbm_stored_meta['meta-four-select'] ) )
          selected( $sbm_stored_meta['meta-four-select'][0], 'UpperSac' ); ?>><?php _e( 'Upper Sacramento',
            'sbm-textdomain' )?></option>';

      </select>
    </p>

    <!-- ====== STREAMREPORT TITLE AREA ====== -->
    <div style="margin-top: 1.618em;">
      <h3><?php echo 'Stream Report Title' ?></h3>
    </div>

    <p><!-- Title -->
      <strong><label for="stream-report-title" class="sbm-row-title"><?php _e( 'Title', 'sbm-textdomain' )?></label></strong>

      <input style="width: 100%;" type="text" name="stream-report-title" id="stream-report-title" value="<?php if ( isset ( $sbm_stored_meta['stream-report-title'] ) ) echo $sbm_stored_meta['stream-report-title'][0]; ?>" />
    </p>

    <div style="margin-top: 1.618em;">
      <h3><?php echo 'Stream Report Description' ?></h3>
    </div>

    <p><!-- Description -->
      <strong><label for="stream-report-description" class="sbm-row-title"><?php _e( 'Description', 'sbm-textdomain' )?></label></strong>

      <input style="width: 100%;" type="text" name="stream-report-description" id="stream-report-description" value="<?php if ( isset ( $sbm_stored_meta['stream-report-description'] ) ) echo $sbm_stored_meta['stream-report-description'][0]; ?>" />
    </p>

    <!-- ====== FALL RIVER ====== -->
    <hr style="margin-top: 1.618em; border-top: 3px double #8c8b8b;">
    <div style="margin-top: 1.618em;">
      <h1><?php echo 'Rivers' ?></h1>
    </div>

    <div class="panel with-nav-tabs panel-default">
      <div class="panel-heading">

        <!-- Nav tabs -->
        <ul class="nav nav-tabs" role="tablist">
          <li role="presentation" class="active"><a href="#fallriver" aria-controls="fallriver" role="tab" data-toggle="tab">Fall River</a></li>
          <li role="presentation"><a href="#hatcreek" aria-controls="hatcreek" role="tab" data-toggle="tab">Hat Creek</a></li>
          <li role="presentation"><a href="#klamathriver" aria-controls="klamathriver" role="tab" data-toggle="tab">Klamath River</a></li>
          <li role="presentation"><a href="#lowersac" aria-controls="lowersac" role="tab" data-toggle="tab">Lower Sacramento</a></li>
          <li role="presentation"><a href="#mccloudriver" aria-controls="mccloudriver" role="tab" data-toggle="tab">McCloud River</a></li>
          <li role="presentation"><a href="#pitriver" aria-control="pitriver" role="tab" data-toggle="tab">Pit River</a></li>
          <li role="presentation"><a href="#trinityriver" aria-control="trinityriver" role="tab" data-toggle="tab">Trinity River</a></li>
          <li role="presentation"><a href="#uppersac" aria-control="uppersac" role="tab" data-toggle="tab">Upper Sacramento</a></li>
        </ul>

        <div class="panel-body boof">
          <div class="tab-content">

            <div role="tabpanel" class="tab-pane fade in active" id="fallriver">

              <h3><?php echo 'Fall River' ?></h3>

              <p><!-- Fall River Updated -->

                <strong><label for="fallriver-report-date" class="sbm-row-title"><?php _e( 'Fall River Updated', 'sbm-textdomain' )?></label></strong>

                <input style="width: 100%;" type="text" name="fallriver-report-date" id="fallriver-report-date" value="<?php if ( isset ( $sbm_stored_meta['fallriver-report-date'] ) ) echo $sbm_stored_meta['fallriver-report-date'][0]; ?>" />
              </p>

              <p><!-- Fall River Report -->
                <strong><label for="fallriver-report" class="sbm-row-title"><?php _e( 'Fall River Report', 'sbm-textdomain' )?></label></strong>

                <textarea style="width: 100%;" rows="4" name="fallriver-report" id="fallriver-report"><?php if ( isset ( $sbm_stored_meta['fallriver-report'] ) ) echo $sbm_stored_meta['fallriver-report'][0]; ?></textarea>
              </p>

              <div class="mt-1618 mb-1618"><!-- Fall River Hot Flies -->
                <strong><label for="fallriver-hot-flies" class="sbm-row-title"><?php _e( 'Fall River Hot Flies', 'sbm-textdomain' )?></label></strong>
                <p>To create a link: <?php echo esc_html('<a href="www.hotflylink.com" title="A link to a hot fly" target="_blank">The name and size of the hot fly. ex: #16 Hot Fly</a>'); ?></p>

                <textarea style="width: 100%;" name="fallriver-hot-flies" id="fallriver-hot-flies"><?php if ( isset ( $sbm_stored_meta['fallriver-hot-flies'] ) ) echo $sbm_stored_meta['fallriver-hot-flies'][0]; ?></textarea>
              </div>

              <p><!-- Fall River Rating -->
                <span class="sbm-row-title"><?php _e( '<strong>How is the fishing?</strong> ', 'sbm-textdomain' )?></span>
              <div class="sbm-row-content">

                <label for="fallriver-closed-message">
                  <?php _e( 'Closed Message&nbsp;', 'sbm-textdomain' )?>
                  <input type="text" style="width: 50%;" name="fallriver-closed-message" id="fallriver-closed-message" value="<?php if ( isset ( $sbm_stored_meta['fallriver-closed-message'] ) ) echo $sbm_stored_meta['fallriver-closed-message'][0]; ?>" />
                </label>

              </div>
              <div class="sbm-row-content">
                <label for="fallriver-closed-checkbox">
                  <input type="checkbox" name="fallriver-closed-checkbox" id="fallriver-closed-checkbox" value="-danger" <?php if ( isset ( $sbm_stored_meta['fallriver-closed-checkbox'] ) ) checked( $sbm_stored_meta['fallriver-closed-checkbox'][0], '-danger' ); ?> />
                  <?php _e( 'Closed&nbsp;', 'sbm-textdomain' )?>
                </label>

                <label for="fallriver-checkbox-poor">
                  <input type="checkbox" name="fallriver-checkbox-poor" id="fallriver-checkbox-poor" value="-danger" <?php if ( isset ( $sbm_stored_meta['fallriver-checkbox-poor'] ) ) checked( $sbm_stored_meta['fallriver-checkbox-poor'][0], '-danger' ); ?> />
                  <?php _e( 'Poor&nbsp;', 'sbm-textdomain' )?>
                </label>

                <label for="fallriver-checkbox-fair">
                  <input type="checkbox" name="fallriver-checkbox-fair" id="fallriver-checkbox-fair" value="-danger" <?php if ( isset ( $sbm_stored_meta['fallriver-checkbox-fair'] ) ) checked( $sbm_stored_meta['fallriver-checkbox-fair'][0], '-danger' ); ?> />
                  <?php _e( 'Fair&nbsp;', 'sbm-textdomain' )?>
                </label>

                <label for="fallriver-checkbox-fairgood">
                  <input type="checkbox" name="fallriver-checkbox-fairgood" id="fallriver-checkbox-fairgood" value="-danger" <?php if ( isset ( $sbm_stored_meta['fallriver-checkbox-fairgood'] ) ) checked( $sbm_stored_meta['fallriver-checkbox-fairgood'][0], '-danger' ); ?> />
                  <?php _e( 'Fair to Good&nbsp;', 'sbm-textdomain' )?>
                </label>

                <label for="fallriver-checkbox-good">
                  <input type="checkbox" name="fallriver-checkbox-good" id="fallriver-checkbox-good" value="-danger" <?php if ( isset ( $sbm_stored_meta['fallriver-checkbox-good'] ) ) checked( $sbm_stored_meta['fallriver-checkbox-good'][0], '-danger' ); ?> />
                  <?php _e( 'Good&nbsp;', 'sbm-textdomain' )?>
                </label>

                <label for="fallriver-checkbox-great">
                  <input type="checkbox" name="fallriver-checkbox-great" id="fallriver-checkbox-great" value="-danger" <?php if ( isset ( $sbm_stored_meta['fallriver-checkbox-great'] ) ) checked( $sbm_stored_meta['fallriver-checkbox-great'][0], '-danger' ); ?> />
                  <?php _e( 'Great', 'sbm-textdomain' )?>
                </label>

              </div>
            </div> <!-- /.tab-pane fall river -->

            <div role="tabpanel" class="tab-pane fade" id="hatcreek">

              <!-- ====== HAT CREEK ====== -->

              <h3><?php echo 'Hat Creek'?></h3>

              <p>
                <!-- Hat Creek Report Date -->
                <strong><label for="hatcreek-report-update" class="sbm-row-title"><?php _e( 'Hat Creek Updated', 'sbm-textdomain' )?></label></strong>

                <input style="width: 100%;" type="text" name="hatcreek-report-update" id="hatcreek-report-update" value="<?php if ( isset ( $sbm_stored_meta['hatcreek-report-update'] ) ) echo $sbm_stored_meta['hatcreek-report-update'][0]; ?>" />

              </p>

              <p>
                <!-- Hat Creek Report -->
                <strong><label for="hatcreek-report" class="sbm-row-title"><?php _e( 'Hat Creek Report', 'sbm-textdomain' )?></label></strong>

                <textarea style="width: 100%;" rows="4" name="hatcreek-report" id="hatcreek-report"><?php if ( isset ( $sbm_stored_meta['hatcreek-report'] ) ) echo $sbm_stored_meta['hatcreek-report'][0]; ?></textarea>
              </p>

              <div class="mt-1618 mb-1618">
                <!-- Hat Creek Hot Flies -->
                <strong><label for="hatcreek-hot-flies" class="sbm-row-title"><?php _e( 'Hat Creek Hot Flies', 'sbm-textdomain' )?></label></strong>
                <p>To create a link: <?php echo esc_html('<a href="www.hotflylink.com" title="A link to a hot fly" target="_blank">The name and size of the hot fly. ex: #16 Hot Fly</a>'); ?></p>

                <textarea style="width: 100%;" name="hatcreek-hot-flies" id="hatcreek-hot-flies"><?php if ( isset ( $sbm_stored_meta['hatcreek-hot-flies'] ) ) echo $sbm_stored_meta['hatcreek-hot-flies'][0]; ?></textarea>

              </div>

              <p><!-- Hat Creek Rating -->
                <span class="sbm-row-title"><?php _e( '<strong>How is the fishing?</strong> ', 'sbm-textdomain' )?></span>
              <div class="sbm-row-content">

                <label for="hatcreek-closed-message">
                  <?php _e( 'Closed Message&nbsp;', 'sbm-textdomain' )?>
                  <input type="text" style="width: 50%;" name="hatcreek-closed-message" id="hatcreek-closed-message" value="<?php if ( isset ( $sbm_stored_meta['hatcreek-closed-message'] ) ) echo $sbm_stored_meta['hatcreek-closed-message'][0]; ?>" />
                </label>

              </div>
              <div class="sbm-row-content">

                <label for="hatcreek-closed-checkbox">
                  <input type="checkbox" name="hatcreek-closed-checkbox" id="hatcreek-closed-checkbox" value="-danger" <?php if ( isset ( $sbm_stored_meta['hatcreek-closed-checkbox'] ) ) checked( $sbm_stored_meta['hatcreek-closed-checkbox'][0], '-danger' ); ?> />
                  <?php _e( 'Closed&nbsp;', 'sbm-textdomain' )?>
                </label>

                <label for="hatcreek-checkbox-poor">
                  <input type="checkbox" name="hatcreek-checkbox-poor" id="hatcreek-checkbox-poor" value="-danger" <?php if ( isset ( $sbm_stored_meta['hatcreek-checkbox-poor'] ) ) checked( $sbm_stored_meta['hatcreek-checkbox-poor'][0], '-danger' ); ?> />
                  <?php _e( 'Poor&nbsp;', 'sbm-textdomain' )?>
                </label>

                <label for="hatcreek-checkbox-fair">
                  <input type="checkbox" name="hatcreek-checkbox-fair" id="hatcreek-checkbox-fair" value="-danger" <?php if ( isset ( $sbm_stored_meta['hatcreek-checkbox-fair'] ) ) checked( $sbm_stored_meta['hatcreek-checkbox-fair'][0], '-danger' ); ?> />
                  <?php _e( 'Fair&nbsp;', 'sbm-textdomain' )?>
                </label>

                <label for="hatcreek-checkbox-fairgood">
                  <input type="checkbox" name="hatcreek-checkbox-fairgood" id="hatcreek-checkbox-fairgood" value="-danger" <?php if ( isset ( $sbm_stored_meta['hatcreek-checkbox-fairgood'] ) ) checked( $sbm_stored_meta['hatcreek-checkbox-fairgood'][0], '-danger' ); ?> />
                  <?php _e( 'Fair to Good&nbsp;', 'sbm-textdomain' )?>
                </label>

                <label for="hatcreek-checkbox-good">
                  <input type="checkbox" name="hatcreek-checkbox-good" id="hatcreek-checkbox-good" value="-danger" <?php if ( isset ( $sbm_stored_meta['hatcreek-checkbox-good'] ) ) checked( $sbm_stored_meta['hatcreek-checkbox-good'][0], '-danger' ); ?> />
                  <?php _e( 'Good&nbsp;', 'sbm-textdomain' )?>
                </label>

                <label for="hatcreek-checkbox-great">
                  <input type="checkbox" name="hatcreek-checkbox-great" id="hatcreek-checkbox-great" value="-danger" <?php if ( isset ( $sbm_stored_meta['hatcreek-checkbox-great'] ) ) checked( $sbm_stored_meta['hatcreek-checkbox-great'][0], '-danger' ); ?> />
                  <?php _e( 'Great', 'sbm-textdomain' )?>
                </label>

              </div>
            </div> <!-- /.tab-pane hat creek -->

            <div role="tabpanel" class="tab-pane fade" id="klamathriver">

              <!-- ====== KLAMATH RIVER ====== -->

              <h3><?php echo ' Klamath River '  ?></h3>

              <p><!-- Klamath Updated -->

                <strong><label for="klamathriver-updated" class="sbm-row-title"><?php _e( 'Klamath River Updated', 'sbm-textdomain' )?></label></strong>

                <input style="width: 100%;" type="text" name="klamathriver-updated" id="klamathriver-updated" value="<?php if ( isset ( $sbm_stored_meta['klamathriver-updated'] ) ) echo $sbm_stored_meta['klamathriver-updated'][0]; ?>" />

              </p>

              <p><!-- Klamath River Report -->

                <strong><label for="klamathriver-report" class="sbm-row-title"><?php _e( 'Klamath River Report', 'sbm-textdomain' )?></label></strong>

                <textarea style="width: 100%;" rows="4" name="klamathriver-report" id="klamathriver-report"><?php if ( isset ( $sbm_stored_meta['klamathriver-report'] ) ) echo $sbm_stored_meta['klamathriver-report'][0]; ?></textarea>
              </p>

              <div class="mt-1618 mb-1618"><!-- Klamath River Hot Flies -->

                <strong><label for="klamathriver-hot-flies" class="sbm-row-title"><?php _e( 'Klamath River Hot Flies', 'sbm-textdomain' )?></label></strong>
                <p>To create a link: <?php echo esc_html('<a href="www.hotflylink.com" title="A link to a hot fly" target="_blank">The name and size of the hot fly. ex: #16 Hot Fly</a>'); ?></p>

                <textarea style="width: 100%;" name="klamathriver-hot-flies" id="klamathriver-hot-flies"><?php if ( isset ( $sbm_stored_meta['klamathriver-hot-flies'] ) ) echo $sbm_stored_meta['klamathriver-hot-flies'][0]; ?></textarea>

              </div>

              <p><!-- Klamath River Rating -->
                <span class="sbm-row-title"><?php _e( '<strong>How is the fishing?</strong> ', 'sbm-textdomain' )?></span>
              <div class="sbm-row-content">

                <label for="klamathriver-closed-message">
                  <?php _e( 'Closed Message&nbsp;', 'sbm-textdomain' )?>
                  <input type="text" style="width: 50%;" name="klamathriver-closed-message" id="klamathriver-closed-message" value="<?php if ( isset ( $sbm_stored_meta['klamathriver-closed-message'] ) ) echo $sbm_stored_meta['klamathriver-closed-message'][0]; ?>" />
                </label>

              </div>
              <div class="sbm-row-content">

                <label for="klamathriver-closed-checkbox">
                  <input type="checkbox" name="klamathriver-closed-checkbox" id="klamathriver-closed-checkbox" value="-danger" <?php if ( isset ( $sbm_stored_meta['klamathriver-closed-checkbox'] ) ) checked( $sbm_stored_meta['klamathriver-closed-checkbox'][0], '-danger' ); ?> />
                  <?php _e( 'Closed&nbsp;', 'sbm-textdomain' )?>
                </label>

                <label for="klamathriver-checkbox-poor">
                  <input type="checkbox" name="klamathriver-checkbox-poor" id="klamathriver-checkbox-poor" value="-danger" <?php if ( isset ( $sbm_stored_meta['klamathriver-checkbox-poor'] ) ) checked( $sbm_stored_meta['klamathriver-checkbox-poor'][0], '-danger' ); ?> />
                  <?php _e( 'Poor&nbsp;', 'sbm-textdomain' )?>
                </label>

                <label for="klamathriver-checkbox-fair">
                  <input type="checkbox" name="klamathriver-checkbox-fair" id="klamathriver-checkbox-fair" value="-danger" <?php if ( isset ( $sbm_stored_meta['klamathriver-checkbox-fair'] ) ) checked( $sbm_stored_meta['klamathriver-checkbox-fair'][0], '-danger' ); ?> />
                  <?php _e( 'Fair&nbsp;', 'sbm-textdomain' )?>
                </label>

                <label for="klamathriver-checkbox-fairgood">
                  <input type="checkbox" name="klamathriver-checkbox-fairgood" id="klamathriver-checkbox-fairgood" value="-danger" <?php if ( isset ( $sbm_stored_meta['klamathriver-checkbox-fairgood'] ) ) checked( $sbm_stored_meta['klamathriver-checkbox-fairgood'][0], '-danger' ); ?> />
                  <?php _e( 'Fair to Good&nbsp;', 'sbm-textdomain' )?>
                </label>

                <label for="klamathriver-checkbox-good">
                  <input type="checkbox" name="klamathriver-checkbox-good" id="klamathriver-checkbox-good" value="-danger" <?php if ( isset ( $sbm_stored_meta['klamathriver-checkbox-good'] ) ) checked( $sbm_stored_meta['klamathriver-checkbox-good'][0], '-danger' ); ?> />
                  <?php _e( 'Good&nbsp;', 'sbm-textdomain' )?>
                </label>

                <label for="klamathriver-checkbox-great">
                  <input type="checkbox" name="klamathriver-checkbox-great" id="klamathriver-checkbox-great" value="-danger" <?php if ( isset ( $sbm_stored_meta['klamathriver-checkbox-great'] ) ) checked( $sbm_stored_meta['klamathriver-checkbox-great'][0], '-danger' ); ?> />
                  <?php _e( 'Great', 'sbm-textdomain' )?>
                </label>

              </div>
            </div> <!-- /.tab-pane klamath river -->

            <div role="tabpanel" class="tab-pane fade" id="lowersac">

              <!-- ====== LOWER SACRAMENTO RIVER ====== -->

              <h3><?php echo ' Lower Sacramento River '  ?></h3>

              <p><!-- Lower Sacramento Updated -->

                <strong><label for="lowersacramento-updated" class="sbm-row-title"><?php _e( 'Lower Sacramento River Updated', 'sbm-textdomain' )?></label></strong>

                <input style="width: 100%;" type="text" name="lowersacramento-updated" id="lowersacramento-updated" value="<?php if ( isset ( $sbm_stored_meta['lowersacramento-updated'] ) ) echo $sbm_stored_meta['lowersacramento-updated'][0]; ?>" />

              </p>

              <p><!-- Lower Sacramento River Report -->

                <strong><label for="lowersacramento-report" class="sbm-row-title"><?php _e( 'Lower Sacramento River Report', 'sbm-textdomain' )?></label></strong>

                <textarea style="width: 100%;" rows="4" name="lowersacramento-report" id="lowersacramento-report"><?php if ( isset ( $sbm_stored_meta['lowersacramento-report'] ) ) echo $sbm_stored_meta['lowersacramento-report'][0]; ?></textarea>
              </p>

              <div class="mt-1618 mb-1618"><!-- Lower Sacramento Hot Flies -->

                <strong><label for="lowersacramento-hot-flies" class="sbm-row-title"><?php _e( 'Lower Sacramento River Hot Flies', 'sbm-textdomain' )?></label></strong>
                <p>To create a link: <?php echo esc_html('<a href="www.hotflylink.com" title="A link to a hot fly" target="_blank">The name and size of the hot fly. ex: #16 Hot Fly</a>'); ?></p>

                <textarea style="width: 100%;" name="lowersacramento-hot-flies" id="lowersacramento-hot-flies"><?php if ( isset ( $sbm_stored_meta['lowersacramento-hot-flies'] ) ) echo $sbm_stored_meta['lowersacramento-hot-flies'][0]; ?></textarea>

              </div>

              <p><!-- Lower Sacramento River Rating -->

                <span class="sbm-row-title"><?php _e( '<strong>How is the fishing?</strong> ', 'sbm-textdomain' )?></span>
              <div class="sbm-row-content">

                <label for="lowersacramento-closed-message">
                  <?php _e( 'Closed Message&nbsp;', 'sbm-textdomain' )?>
                  <input type="text" style="width: 50%;" name="lowersacramento-closed-message" id="lowersacramento-closed-message" value="<?php if ( isset ( $sbm_stored_meta['lowersacramento-closed-message'] ) ) echo $sbm_stored_meta['lowersacramento-closed-message'][0]; ?>" />
                </label>

              </div>
              <div class="sbm-row-content">

                <label for="lowersacramento-closed-checkbox">
                  <input type="checkbox" name="lowersacramento-closed-checkbox" id="lowersacramento-closed-checkbox" value="-danger" <?php if ( isset ( $sbm_stored_meta['lowersacramento-closed-checkbox'] ) ) checked( $sbm_stored_meta['lowersacramento-closed-checkbox'][0], '-danger' ); ?> />
                  <?php _e( 'Closed&nbsp;', 'sbm-textdomain' )?>
                </label>

                <label for="lowersacramento-checkbox-poor">
                  <input type="checkbox" name="lowersacramento-checkbox-poor" id="lowersacramento-checkbox-poor" value="-danger" <?php if ( isset ( $sbm_stored_meta['lowersacramento-checkbox-poor'] ) ) checked( $sbm_stored_meta['lowersacramento-checkbox-poor'][0], '-danger' ); ?> />
                  <?php _e( 'Poor&nbsp;', 'sbm-textdomain' )?>
                </label>

                <label for="lowersacramento-checkbox-fair">
                  <input type="checkbox" name="lowersacramento-checkbox-fair" id="lowersacramento-checkbox-fair" value="-danger" <?php if ( isset ( $sbm_stored_meta['lowersacramento-checkbox-fair'] ) ) checked( $sbm_stored_meta['lowersacramento-checkbox-fair'][0], '-danger' ); ?> />
                  <?php _e( 'Fair&nbsp;', 'sbm-textdomain' )?>
                </label>

                <label for="lowersacramento-checkbox-fairgood">
                  <input type="checkbox" name="lowersacramento-checkbox-fairgood" id="lowersacramento-checkbox-fairgood" value="-danger" <?php if ( isset ( $sbm_stored_meta['lowersacramento-checkbox-fairgood'] ) ) checked( $sbm_stored_meta['lowersacramento-checkbox-fairgood'][0], '-danger' ); ?> />
                  <?php _e( 'Fair to Good&nbsp;', 'sbm-textdomain' )?>
                </label>

                <label for="lowersacramento-checkbox-good">
                  <input type="checkbox" name="lowersacramento-checkbox-good" id="lowersacramento-checkbox-good" value="-danger" <?php if ( isset ( $sbm_stored_meta['lowersacramento-checkbox-good'] ) ) checked( $sbm_stored_meta['lowersacramento-checkbox-good'][0], '-danger' ); ?> />
                  <?php _e( 'Good&nbsp;', 'sbm-textdomain' )?>
                </label>

                <label for="lowersacramento-checkbox-great">
                  <input type="checkbox" name="lowersacramento-checkbox-great" id="lowersacramento-checkbox-great" value="-danger" <?php if ( isset ( $sbm_stored_meta['lowersacramento-checkbox-great'] ) ) checked( $sbm_stored_meta['lowersacramento-checkbox-great'][0], '-danger' ); ?> />
                  <?php _e( 'Great', 'sbm-textdomain' )?>
                </label>

              </div>
            </div> <!-- /.tab-pane lower sac -->

            <div role="tabpanel" class="tab-pane fade" id="mccloudriver">

              <!-- ====== McClOUD RIVER ====== -->

              <h3><?php echo ' McCloud River '  ?></h3>

              <p><!-- McCloud Updated -->

                <strong><label for="mccloudriver-updated" class="sbm-row-title"><?php _e( 'McCloud River Updated', 'sbm-textdomain' )?></label></strong>

                <input style="width: 100%;" type="text" name="mccloudriver-updated" id="mccloudriver-updated" value="<?php if ( isset ( $sbm_stored_meta['mccloudriver-updated'] ) ) echo $sbm_stored_meta['mccloudriver-updated'][0]; ?>" />

              </p>

              <p><!-- McCloud River Report -->

                <strong><label for="mccloudriver-report" class="sbm-row-title"><?php _e( 'McCloud River Report', 'sbm-textdomain' )?></label></strong>

                <textarea style="width: 100%;" rows="4" name="mccloudriver-report" id="mccloudriver-report"><?php if ( isset ( $sbm_stored_meta['mccloudriver-report'] ) ) echo $sbm_stored_meta['mccloudriver-report'][0]; ?></textarea>
              </p>

              <div class="mt-1618 mb-1618"><!-- McCloud River Hot Flies -->

                <strong><label for="mccloudriver-hot-flies" class="sbm-row-title"><?php _e( 'McCloud River Hot Flies', 'sbm-textdomain' )?></label></strong>
                <p>To create a link: <?php echo esc_html('<a href="www.hotflylink.com" title="A link to a hot fly" target="_blank">The name and size of the hot fly. ex: #16 Hot Fly</a>'); ?></p>

                <textarea style="width: 100%;" name="mccloudriver-hot-flies" id="mccloudriver-hot-flies"><?php if ( isset ( $sbm_stored_meta['mccloudriver-hot-flies'] ) ) echo $sbm_stored_meta['mccloudriver-hot-flies'][0]; ?></textarea>

              </div>

              <p><!-- McCloud River Rating -->
                <span class="sbm-row-title"><?php _e( '<strong>How is the fishing?</strong> ', 'sbm-textdomain' )?></span>
              <div class="sbm-row-content">

                <label for="mccloudriver-closed-message">
                  <?php _e( 'Closed Message&nbsp;', 'sbm-textdomain' )?>
                  <input type="text" style="width: 50%;" name="mccloudriver-closed-message" id="mccloudriver-closed-message" value="<?php if ( isset ( $sbm_stored_meta['mccloudriver-closed-message'] ) ) echo $sbm_stored_meta['mccloudriver-closed-message'][0]; ?>" />
                </label>

              </div>
              <div class="sbm-row-content">

                <label for="mccloudriver-closed-checkbox">
                  <input type="checkbox" name="mccloudriver-closed-checkbox" id="mccloudriver-closed-checkbox" value="-danger" <?php if ( isset ( $sbm_stored_meta['mccloudriver-closed-checkbox'] ) ) checked( $sbm_stored_meta['mccloudriver-closed-checkbox'][0], '-danger' ); ?> />
                  <?php _e( 'Closed&nbsp;', 'sbm-textdomain' )?>
                </label>

                <label for="mccloudriver-checkbox-poor">
                  <input type="checkbox" name="mccloudriver-checkbox-poor" id="mccloudriver-checkbox-poor" value="-danger" <?php if ( isset ( $sbm_stored_meta['mccloudriver-checkbox-poor'] ) ) checked( $sbm_stored_meta['mccloudriver-checkbox-poor'][0], '-danger' ); ?> />
                  <?php _e( 'Poor&nbsp;', 'sbm-textdomain' )?>
                </label>

                <label for="mccloudriver-checkbox-fair">
                  <input type="checkbox" name="mccloudriver-checkbox-fair" id="mccloudriver-checkbox-fair" value="-danger" <?php if ( isset ( $sbm_stored_meta['mccloudriver-checkbox-fair'] ) ) checked( $sbm_stored_meta['mccloudriver-checkbox-fair'][0], '-danger' ); ?> />
                  <?php _e( 'Fair&nbsp;', 'sbm-textdomain' )?>
                </label>

                <label for="mccloudriver-checkbox-fairgood">
                  <input type="checkbox" name="mccloudriver-checkbox-fairgood" id="mccloudriver-checkbox-fairgood" value="-danger" <?php if ( isset ( $sbm_stored_meta['mccloudriver-checkbox-fairgood'] ) ) checked( $sbm_stored_meta['mccloudriver-checkbox-fairgood'][0], '-danger' ); ?> />
                  <?php _e( 'Fair to Good&nbsp;', 'sbm-textdomain' )?>
                </label>

                <label for="mccloudriver-checkbox-good">
                  <input type="checkbox" name="mccloudriver-checkbox-good" id="mccloudriver-checkbox-good" value="-danger" <?php if ( isset ( $sbm_stored_meta['mccloudriver-checkbox-good'] ) ) checked( $sbm_stored_meta['mccloudriver-checkbox-good'][0], '-danger' ); ?> />
                  <?php _e( 'Good&nbsp;', 'sbm-textdomain' )?>
                </label>

                <label for="mccloudriver-checkbox-great">
                  <input type="checkbox" name="mccloudriver-checkbox-great" id="mccloudriver-checkbox-great" value="-danger" <?php if ( isset ( $sbm_stored_meta['mccloudriver-checkbox-great'] ) ) checked( $sbm_stored_meta['mccloudriver-checkbox-great'][0], '-danger' ); ?> />
                  <?php _e( 'Great', 'sbm-textdomain' )?>
                </label>

              </div>
            </div> <!-- /.tab-pane mccloud river -->

            <div role="tabpanel" class="tab-pane fade" id="pitriver">

              <!-- ====== PIT RIVER ====== -->

              <h3><?php echo ' Pit River '  ?></h3>

              <p><!-- Pit Updated -->

                <strong><label for="pitriver-updated" class="sbm-row-title"><?php _e( 'Pit River Updated', 'sbm-textdomain' )?></label></strong>

                <input style="width: 100%;" type="text" name="pitriver-updated" id="pitriver-updated" value="<?php if ( isset ( $sbm_stored_meta['pitriver-updated'] ) ) echo $sbm_stored_meta['pitriver-updated'][0]; ?>" />

              </p>

              <p><!-- Pit River Report -->

                <strong><label for="pitriver-report" class="sbm-row-title"><?php _e( 'Pit River Report', 'sbm-textdomain' )?></label></strong>

                <textarea style="width: 100%;" rows="4" name="pitriver-report" id="pitriver-report"><?php if ( isset ( $sbm_stored_meta['pitriver-report'] ) ) echo $sbm_stored_meta['pitriver-report'][0]; ?></textarea>
              </p>

              <div class="mt-1618 mb-1618"><!-- Pit River Hot Flies -->

                <strong><label for="pitriver-hot-flies" class="sbm-row-title"><?php _e( 'Pit River Hot Flies', 'sbm-textdomain' )?></label></strong>
                <p>To create a link: <?php echo esc_html('<a href="www.hotflylink.com" title="A link to a hot fly" target="_blank">The name and size of the hot fly. ex: #16 Hot Fly</a>'); ?></p>

                <textarea style="width: 100%;" name="pitriver-hot-flies" id="pitriver-hot-flies"><?php if ( isset ( $sbm_stored_meta['pitriver-hot-flies'] ) ) echo $sbm_stored_meta['pitriver-hot-flies'][0]; ?></textarea>

              </div>

              <p><!-- Pit River Rating -->
                <span class="sbm-row-title"><?php _e( '<strong>How is the fishing?</strong> ', 'sbm-textdomain' )?></span>
              <div class="sbm-row-content">

                <label for="pitriver-closed-message">
                  <?php _e( 'Closed Message&nbsp;', 'sbm-textdomain' )?>
                  <input type="text" style="width: 50%;" name="pitriver-closed-message" id="pitriver-closed-message" value="<?php if ( isset ( $sbm_stored_meta['pitriver-closed-message'] ) ) echo $sbm_stored_meta['pitriver-closed-message'][0]; ?>" />
                </label>

              </div>
              <div class="sbm-row-content">

                <label for="pitriver-closed-checkbox">
                  <input type="checkbox" name="pitriver-closed-checkbox" id="pitriver-closed-checkbox" value="-danger" <?php if ( isset ( $sbm_stored_meta['pitriver-closed-checkbox'] ) ) checked( $sbm_stored_meta['pitriver-closed-checkbox'][0], '-danger' ); ?> />
                  <?php _e( 'Closed&nbsp;', 'sbm-textdomain' )?>
                </label>

                <label for="pitriver-checkbox-poor">
                  <input type="checkbox" name="pitriver-checkbox-poor" id="pitriver-checkbox-poor" value="-danger" <?php if ( isset ( $sbm_stored_meta['pitriver-checkbox-poor'] ) ) checked( $sbm_stored_meta['pitriver-checkbox-poor'][0], '-danger' ); ?> />
                  <?php _e( 'Poor&nbsp;', 'sbm-textdomain' )?>
                </label>

                <label for="pitriver-checkbox-fair">
                  <input type="checkbox" name="pitriver-checkbox-fair" id="pitriver-checkbox-fair" value="-danger" <?php if ( isset ( $sbm_stored_meta['pitriver-checkbox-fair'] ) ) checked( $sbm_stored_meta['pitriver-checkbox-fair'][0], '-danger' ); ?> />
                  <?php _e( 'Fair&nbsp;', 'sbm-textdomain' )?>
                </label>

                <label for="pitriver-checkbox-fairgood">
                  <input type="checkbox" name="pitriver-checkbox-fairgood" id="pitriver-checkbox-fairgood" value="-danger" <?php if ( isset ( $sbm_stored_meta['pitriver-checkbox-fairgood'] ) ) checked( $sbm_stored_meta['pitriver-checkbox-fairgood'][0], '-danger' ); ?> />
                  <?php _e( 'Fair to Good&nbsp;', 'sbm-textdomain' )?>
                </label>

                <label for="pitriver-checkbox-good">
                  <input type="checkbox" name="pitriver-checkbox-good" id="pitriver-checkbox-good" value="-danger" <?php if ( isset ( $sbm_stored_meta['pitriver-checkbox-good'] ) ) checked( $sbm_stored_meta['pitriver-checkbox-good'][0], '-danger' ); ?> />
                  <?php _e( 'Good&nbsp;', 'sbm-textdomain' )?>
                </label>

                <label for="pitriver-checkbox-great">
                  <input type="checkbox" name="pitriver-checkbox-great" id="pitriver-checkbox-great" value="-danger" <?php if ( isset ( $sbm_stored_meta['pitriver-checkbox-great'] ) ) checked( $sbm_stored_meta['pitriver-checkbox-great'][0], '-danger' ); ?> />
                  <?php _e( 'Great', 'sbm-textdomain' )?>
                </label>

              </div>
            </div> <!-- /.tab-pane pit river -->

            <!-- ====== TRINITY RIVER ====== -->

            <div role="tabpanel" class="tab-pane fade" id="trinityriver">

              <h3><?php echo ' Trinity River '  ?></h3>

              <p><!-- Trinity Updated -->

                <strong><label for="trinityriver-updated" class="sbm-row-title"><?php _e( 'Trinity River Updated', 'sbm-textdomain' )?></label></strong>

                <input style="width: 100%;" type="text" name="trinityriver-updated" id="trinityriver-updated" value="<?php if ( isset ( $sbm_stored_meta['trinityriver-updated'] ) ) echo $sbm_stored_meta['trinityriver-updated'][0]; ?>" />

              </p>

              <p><!-- Trinity River Report -->

                <strong><label for="trinityriver-report" class="sbm-row-title"><?php _e( 'Trinity River Report', 'sbm-textdomain' )?></label></strong>

                <textarea style="width: 100%;" rows="4" name="trinityriver-report" id="trinityriver-report"><?php if ( isset ( $sbm_stored_meta['trinityriver-report'] ) ) echo $sbm_stored_meta['trinityriver-report'][0]; ?></textarea>
              </p>

              <div class="mt-1618 mb-1618"><!-- Trinity River Hot Flies -->

                <strong><label for="trinityriver-hot-flies" class="sbm-row-title"><?php _e( 'Trinity River Hot Flies', 'sbm-textdomain' )?></label></strong>
                <p>To create a link: <?php echo esc_html('<a href="www.hotflylink.com" title="A link to a hot fly" target="_blank">The name and size of the hot fly. ex: #16 Hot Fly</a>'); ?></p>

                <textarea style="width: 100%;" name="trinityriver-hot-flies" id="trinityriver-hot-flies"><?php if ( isset ( $sbm_stored_meta['trinityriver-hot-flies'] ) ) echo $sbm_stored_meta['trinityriver-hot-flies'][0]; ?></textarea>

              </div>

              <p><!-- Trinity River Rating -->
                <span class="sbm-row-title"><?php _e( '<strong>How is the fishing?</strong> ', 'sbm-textdomain' )?></span>
              <div class="sbm-row-content">

                <label for="trinityriver-closed-message">
                  <?php _e( 'Closed Message&nbsp;', 'sbm-textdomain' )?>
                  <input type="text" style="width: 50%;" name="trinityriver-closed-message" id="trinityriver-closed-message" value="<?php if ( isset ( $sbm_stored_meta['trinityriver-closed-message'] ) ) echo $sbm_stored_meta['trinityriver-closed-message'][0]; ?>" />
                </label>

              </div>
              <div class="sbm-row-content">

                <label for="trinityriver-closed-checkbox">
                  <input type="checkbox" name="trinityriver-closed-checkbox" id="trinityriver-closed-checkbox" value="-danger" <?php if ( isset ( $sbm_stored_meta['trinityriver-closed-checkbox'] ) ) checked( $sbm_stored_meta['trinityriver-closed-checkbox'][0], '-danger' ); ?> />
                  <?php _e( 'Closed&nbsp;', 'sbm-textdomain' )?>
                </label>

                <label for="trinityriver-checkbox-poor">
                  <input type="checkbox" name="trinityriver-checkbox-poor" id="trinityriver-checkbox-poor" value="-danger" <?php if ( isset ( $sbm_stored_meta['trinityriver-checkbox-poor'] ) ) checked( $sbm_stored_meta['trinityriver-checkbox-poor'][0], '-danger' ); ?> />
                  <?php _e( 'Poor&nbsp;', 'sbm-textdomain' )?>
                </label>

                <label for="trinityriver-checkbox-fair">
                  <input type="checkbox" name="trinityriver-checkbox-fair" id="trinityriver-checkbox-fair" value="-danger" <?php if ( isset ( $sbm_stored_meta['trinityriver-checkbox-fair'] ) ) checked( $sbm_stored_meta['trinityriver-checkbox-fair'][0], '-danger' ); ?> />
                  <?php _e( 'Fair&nbsp;', 'sbm-textdomain' )?>
                </label>

                <label for="trinityriver-checkbox-fairgood">
                  <input type="checkbox" name="trinityriver-checkbox-fairgood" id="trinityriver-checkbox-fairgood" value="-danger" <?php if ( isset ( $sbm_stored_meta['trinityriver-checkbox-fairgood'] ) ) checked( $sbm_stored_meta['trinityriver-checkbox-fairgood'][0], '-danger' ); ?> />
                  <?php _e( 'Fair to Good&nbsp;', 'sbm-textdomain' )?>
                </label>

                <label for="trinityriver-checkbox-good">
                  <input type="checkbox" name="trinityriver-checkbox-good" id="trinityriver-checkbox-good" value="-danger" <?php if ( isset ( $sbm_stored_meta['trinityriver-checkbox-good'] ) ) checked( $sbm_stored_meta['trinityriver-checkbox-good'][0], '-danger' ); ?> />
                  <?php _e( 'Good&nbsp;', 'sbm-textdomain' )?>
                </label>

                <label for="trinityriver-checkbox-great">
                  <input type="checkbox" name="trinityriver-checkbox-great" id="trinityriver-checkbox-great" value="-danger" <?php if ( isset ( $sbm_stored_meta['trinityriver-checkbox-great'] ) ) checked( $sbm_stored_meta['trinityriver-checkbox-great'][0], '-danger' ); ?> />
                  <?php _e( 'Great', 'sbm-textdomain' )?>
                </label>

              </div>
            </div> <!-- /.tab-pane trinity river -->

            <div role="tabpanel" class="tab-pane fade" id="uppersac">

              <!-- ====== UPPER SAC RIVER ====== -->

              <hr style="margin-top: 1.618em; border-top: 3px double #8c8b8b;">
              <h3><?php echo ' Upper Sacramento River '  ?></h3>

              <p><!-- Upper Sacramento Updated -->

                <strong><label for="uppersac-updated" class="sbm-row-title"><?php _e( 'Upper Sacramento River Updated', 'sbm-textdomain' )?></label></strong>

                <input style="width: 100%;" type="text" name="uppersac-updated" id="uppersac-updated" value="<?php if ( isset ( $sbm_stored_meta['uppersac-updated'] ) ) echo $sbm_stored_meta['uppersac-updated'][0]; ?>" />

              </p>

              <p><!-- Upper Sacramento River Report -->

                <strong><label for="uppersac-report" class="sbm-row-title"><?php _e( 'Upper Sacramento River Report', 'sbm-textdomain' )?></label></strong>

                <textarea style="width: 100%;" rows="4" name="uppersac-report" id="uppersac-report"><?php if ( isset ( $sbm_stored_meta['uppersac-report'] ) ) echo $sbm_stored_meta['uppersac-report'][0]; ?></textarea>
              </p>

              <div class="mt-1618 mb-1618"><!-- Upper Sacramento River Hot Flies -->

                <strong><label for="uppersac-hot-flies" class="sbm-row-title"><?php _e( 'Upper Sacramento River Hot Flies', 'sbm-textdomain' )?></label></strong>
                <p>To create a link: <?php echo esc_html('<a href="www.hotflylink.com" title="A link to a hot fly" target="_blank">The name and size of the hot fly. ex: #16 Hot Fly</a>'); ?></p>

                <textarea style="width: 100%;" name="uppersac-hot-flies" id="uppersac-hot-flies"><?php if ( isset ( $sbm_stored_meta['uppersac-hot-flies'] ) ) echo $sbm_stored_meta['uppersac-hot-flies'][0]; ?></textarea>

              </div>

              <p><!-- Upper Sacramento River Rating -->
                <span class="sbm-row-title"><?php _e( '<strong>How is the fishing?</strong> ', 'sbm-textdomain' )?></span>
              <div class="sbm-row-content">

                <label for="uppersac-closed-message">
                  <?php _e( 'Closed Message&nbsp;', 'sbm-textdomain' )?>
                  <input type="text" style="width: 50%;" name="uppersac-closed-message" id="uppersac-closed-message" value="<?php if ( isset ( $sbm_stored_meta['uppersac-closed-message'] ) ) echo $sbm_stored_meta['uppersac-closed-message'][0]; ?>" />
                </label>

              </div>
              <div class="sbm-row-content">

                <label for="uppersac-closed-checkbox">
                  <input type="checkbox" name="uppersac-closed-checkbox" id="uppersac-closed-checkbox" value="-danger" <?php if ( isset ( $sbm_stored_meta['uppersac-closed-checkbox'] ) ) checked( $sbm_stored_meta['uppersac-closed-checkbox'][0], '-danger' ); ?> />
                  <?php _e( 'Closed&nbsp;', 'sbm-textdomain' )?>
                </label>

                <label for="uppersac-checkbox-poor">
                  <input type="checkbox" name="uppersac-checkbox-poor" id="uppersac-checkbox-poor" value="-danger" <?php if ( isset ( $sbm_stored_meta['uppersac-checkbox-poor'] ) ) checked( $sbm_stored_meta['uppersac-checkbox-poor'][0], '-danger' ); ?> />
                  <?php _e( 'Poor&nbsp;', 'sbm-textdomain' )?>
                </label>

                <label for="uppersac-checkbox-fair">
                  <input type="checkbox" name="uppersac-checkbox-fair" id="uppersac-checkbox-fair" value="-danger" <?php if ( isset ( $sbm_stored_meta['uppersac-checkbox-fair'] ) ) checked( $sbm_stored_meta['uppersac-checkbox-fair'][0], '-danger' ); ?> />
                  <?php _e( 'Fair&nbsp;', 'sbm-textdomain' )?>
                </label>

                <label for="uppersac-checkbox-fairgood">
                  <input type="checkbox" name="uppersac-checkbox-fairgood" id="uppersac-checkbox-fairgood" value="-danger" <?php if ( isset ( $sbm_stored_meta['uppersac-checkbox-fairgood'] ) ) checked( $sbm_stored_meta['uppersac-checkbox-fairgood'][0], '-danger' ); ?> />
                  <?php _e( 'Fair to Good&nbsp;', 'sbm-textdomain' )?>
                </label>

                <label for="uppersac-checkbox-good">
                  <input type="checkbox" name="uppersac-checkbox-good" id="uppersac-checkbox-good" value="-danger" <?php if ( isset ( $sbm_stored_meta['uppersac-checkbox-good'] ) ) checked( $sbm_stored_meta['uppersac-checkbox-good'][0], '-danger' ); ?> />
                  <?php _e( 'Good&nbsp;', 'sbm-textdomain' )?>
                </label>

                <label for="uppersac-checkbox-great">
                  <input type="checkbox" name="uppersac-checkbox-great" id="uppersac-checkbox-great" value="-danger" <?php if ( isset ( $sbm_stored_meta['uppersac-checkbox-great'] ) ) checked( $sbm_stored_meta['uppersac-checkbox-great'][0], '-danger' ); ?> />
                  <?php _e( 'Great', 'sbm-textdomain' )?>
                </label>

              </div>
            </div> <!-- /.tab-pane upper sac -->
          </div> <!-- /.tab-content -->
        </div> <!-- /.panel-body boof -->
      </div> <!-- /.panel-heading -->
    </div> <!-- panel with-nav-tabs panel-defaultpanel with-nav-tabs -->

    <div style="margin-top: 1.618em;">
      <h1>Lakes</h1>
    </div>

    <div class="panel with-nav-tabs panel-default">
      <div class="panel-heading">

        <!-- Nav tabs -->
        <ul class="nav nav-tabs" role="tablist">
          <li role="presentation" class="active"><a href="#baumlake" aria-controls="baumlake" role="tab" data-toggle="tab">Baum Lake</a></li>
          <li role="presentation"><a href="#ironcanyon" aria-controls="ironcanyon" role="tab" data-toggle="tab">Iron Canyon</a></li>
          <li role="presentation"><a href="#keswickreservoir" aria-controls="keswickreservoir" role="tab" data-toggle="tab">Keswick Reservoir</a></li>
          <li role="presentation"><a href="#lakeshasta" aria-controls="lakeshasta" role="tab" data-toggle="tab">Lake Shasta</a></li>
          <li role="presentation"><a href="#lewistonlake" aria-controls="lewistonlake" role="tab" data-toggle="tab">Lewiston Lake</a></li>
          <li role="presentation"><a href="#manzanitalake" aria-controls="manzanitalake" role="tab" data-toggle="tab">Manzanita Lake</a></li>
          <li role="presentation"><a href="#mccloudreservoir" aria-controls="mccloudreservoir" role="tab" data-toggle="tab">McCloud Reservoir</a></li>
          <li role="presentation"><a href="#pyramidlake" aria-controls="pyramidlake" role="tab" data-toggle="tab">Pyramid Lake</a></li>
        </ul>

        <div class="panel-body boof">
          <div class="tab-content">

            <!-- ====== BAUM LAKE ====== -->

            <div role="tabpanel" class="tab-pane fade in active" id="baumlake">

              <h3><?php echo ' Baum Lake '  ?></h3>

              <p><!-- Baum Lake Updated -->

                <strong><label for="baumlake-updated" class="sbm-row-title"><?php _e( 'Baum Lake Updated', 'sbm-textdomain' )?></label></strong>

                <input style="width: 100%;" type="text" name="baumlake-updated" id="baumlake-updated" value="<?php if ( isset ( $sbm_stored_meta['baumlake-updated'] ) ) echo $sbm_stored_meta['baumlake-updated'][0]; ?>" />

              </p>

              <p><!-- Baum Lake Report -->

                <strong><label for="baumlake-report" class="sbm-row-title"><?php _e( 'Baum Lake Report', 'sbm-textdomain' )?></label></strong>

                <textarea style="width: 100%;" rows="4" name="baumlake-report" id="baumlake-report"><?php if ( isset ( $sbm_stored_meta['baumlake-report'] ) ) echo $sbm_stored_meta['baumlake-report'][0]; ?></textarea>
              </p>

              <div class="mt-1618 mb-1618"><!-- Baum Lake Hot Flies -->

                <strong><label for="baumlake-hot-flies" class="sbm-row-title"><?php _e( 'Baum Lake Hot Flies', 'sbm-textdomain' )?></label></strong>
                <p>To create a link: <?php echo esc_html('<a href="www.hotflylink.com" title="A link to a hot fly" target="_blank">The name and size of the hot fly. ex: #16 Hot Fly</a>'); ?></p>

                <textarea style="width: 100%;" name="baumlake-hot-flies" id="baumlake-hot-flies"><?php if ( isset ( $sbm_stored_meta['baumlake-hot-flies'] ) ) echo $sbm_stored_meta['baumlake-hot-flies'][0]; ?></textarea>

              </div>

              <p><!-- Baum Lake Rating -->
                <span class="sbm-row-title"><?php _e( '<strong>How is the fishing?</strong> ', 'sbm-textdomain' )?></span>
              <div class="sbm-row-content">

                <label for="baumlake-closed-message">
                  <?php _e( 'Closed Message&nbsp;', 'sbm-textdomain' )?>
                  <input type="text" style="width: 50%;" name="baumlake-closed-message" id="baumlake-closed-message" value="<?php if ( isset ( $sbm_stored_meta['baumlake-closed-message'] ) ) echo $sbm_stored_meta['baumlake-closed-message'][0]; ?>" />
                </label>

              </div>

              <div class="sbm-row-content">

                <label for="baumlake-closed-checkbox">
                  <input type="checkbox" name="baumlake-closed-checkbox" id="baumlake-closed-checkbox" value="-danger" <?php if ( isset ( $sbm_stored_meta['baumlake-closed-checkbox'] ) ) checked( $sbm_stored_meta['baumlake-closed-checkbox'][0], '-danger' ); ?> />
                  <?php _e( 'Closed&nbsp;', 'sbm-textdomain' )?>
                </label>

                <label for="baumlake-checkbox-poor">
                  <input type="checkbox" name="baumlake-checkbox-poor" id="baumlake-checkbox-poor" value="-danger" <?php if ( isset ( $sbm_stored_meta['baumlake-checkbox-poor'] ) ) checked( $sbm_stored_meta['baumlake-checkbox-poor'][0], '-danger' ); ?> />
                  <?php _e( 'Poor&nbsp;', 'sbm-textdomain' )?>
                </label>

                <label for="baumlake-checkbox-fair">
                  <input type="checkbox" name="baumlake-checkbox-fair" id="baumlake-checkbox-fair" value="-danger" <?php if ( isset ( $sbm_stored_meta['baumlake-checkbox-fair'] ) ) checked( $sbm_stored_meta['baumlake-checkbox-fair'][0], '-danger' ); ?> />
                  <?php _e( 'Fair&nbsp;', 'sbm-textdomain' )?>
                </label>

                <label for="baumlake-checkbox-fairgood">
                  <input type="checkbox" name="baumlake-checkbox-fairgood" id="baumlake-checkbox-fairgood" value="-danger" <?php if ( isset ( $sbm_stored_meta['baumlake-checkbox-fairgood'] ) ) checked( $sbm_stored_meta['baumlake-checkbox-fairgood'][0], '-danger' ); ?> />
                  <?php _e( 'Fair to Good&nbsp;', 'sbm-textdomain' )?>
                </label>

                <label for="baumlake-checkbox-good">
                  <input type="checkbox" name="baumlake-checkbox-good" id="baumlake-checkbox-good" value="-danger" <?php if ( isset ( $sbm_stored_meta['baumlake-checkbox-good'] ) ) checked( $sbm_stored_meta['baumlake-checkbox-good'][0], '-danger' ); ?> />
                  <?php _e( 'Good&nbsp;', 'sbm-textdomain' )?>
                </label>

                <label for="baumlake-checkbox-great">
                  <input type="checkbox" name="baumlake-checkbox-great" id="baumlake-checkbox-great" value="-danger" <?php if ( isset ( $sbm_stored_meta['baumlake-checkbox-great'] ) ) checked( $sbm_stored_meta['baumlake-checkbox-great'][0], '-danger' ); ?> />
                  <?php _e( 'Great', 'sbm-textdomain' )?>
                </label>

              </div>
            </div> <!-- /.tab-pane baum lake -->

            <!-- ====== IRON CANYON RESERVOIR ====== -->

            <div role="tabpanel" class="tab-pane fade" id="ironcanyon">

              <h3><?php echo ' Iron Canyon Reservoir '  ?></h3>

              <p><!-- Iron Canyon Updated -->

                <strong><label for="ironcanyonres-updated" class="sbm-row-title"><?php _e( 'Iron Canyon Reservoir Updated', 'sbm-textdomain' )?></label></strong>

                <input style="width: 100%;" type="text" name="ironcanyonres-updated" id="ironcanyonres-updated" value="<?php if ( isset ( $sbm_stored_meta['ironcanyonres-updated'] ) ) echo $sbm_stored_meta['ironcanyonres-updated'][0]; ?>" />

              </p>

              <p><!-- Iron Canyon Reservoir Report -->

                <strong><label for="ironcanyonres-report" class="sbm-row-title"><?php _e( 'Iron Canyon Reservoir Report', 'sbm-textdomain' )?></label></strong>

                <textarea style="width: 100%;" rows="4" name="ironcanyonres-report" id="ironcanyonres-report"><?php if ( isset ( $sbm_stored_meta['ironcanyonres-report'] ) ) echo $sbm_stored_meta['ironcanyonres-report'][0]; ?></textarea>
              </p>

              <div class="mt-1618 mb-1618"><!-- Iron Canyon Reservoir Hot Flies -->

                <strong><label for="ironcanyonres-hot-flies" class="sbm-row-title"><?php _e( 'Iron Canyon Reservoir Hot Flies', 'sbm-textdomain' )?></label></strong>
                <p>To create a link: <?php echo esc_html('<a href="www.hotflylink.com" title="A link to a hot fly" target="_blank">The name and size of the hot fly. ex: #16 Hot Fly</a>'); ?></p>

                <textarea style="width: 100%;" name="ironcanyonres-hot-flies" id="ironcanyonres-hot-flies"><?php if ( isset ( $sbm_stored_meta['ironcanyonres-hot-flies'] ) ) echo $sbm_stored_meta['ironcanyonres-hot-flies'][0]; ?></textarea>

              </div>

              <p><!-- Iron Canyon Reservoir Rating -->
                <span class="sbm-row-title"><?php _e( '<strong>How is the fishing?</strong> ', 'sbm-textdomain' )?></span>
              <div class="sbm-row-content">

                <label for="ironcanyonres-closed-message">
                  <?php _e( 'Closed Message&nbsp;', 'sbm-textdomain' )?>
                  <input type="text" style="width: 50%;" name="ironcanyonres-closed-message" id="ironcanyonres-closed-message" value="<?php if ( isset ( $sbm_stored_meta['ironcanyonres-closed-message'] ) ) echo $sbm_stored_meta['ironcanyonres-closed-message'][0]; ?>" />
                </label>

              </div>
              <div class="sbm-row-content">

                <label for="ironcanyonres-closed-checkbox">
                  <input type="checkbox" name="ironcanyonres-closed-checkbox" id="ironcanyonres-closed-checkbox" value="-danger" <?php if ( isset ( $sbm_stored_meta['ironcanyonres-closed-checkbox'] ) ) checked( $sbm_stored_meta['ironcanyonres-closed-checkbox'][0], '-danger' ); ?> />
                  <?php _e( 'Closed&nbsp;', 'sbm-textdomain' )?>
                </label>

                <label for="ironcanyonres-checkbox-poor">
                  <input type="checkbox" name="ironcanyonres-checkbox-poor" id="ironcanyonres-checkbox-poor" value="-danger" <?php if ( isset ( $sbm_stored_meta['ironcanyonres-checkbox-poor'] ) ) checked( $sbm_stored_meta['ironcanyonres-checkbox-poor'][0], '-danger' ); ?> />
                  <?php _e( 'Poor&nbsp;', 'sbm-textdomain' )?>
                </label>

                <label for="ironcanyonres-checkbox-fair">
                  <input type="checkbox" name="ironcanyonres-checkbox-fair" id="ironcanyonres-checkbox-fair" value="-danger" <?php if ( isset ( $sbm_stored_meta['ironcanyonres-checkbox-fair'] ) ) checked( $sbm_stored_meta['ironcanyonres-checkbox-fair'][0], '-danger' ); ?> />
                  <?php _e( 'Fair&nbsp;', 'sbm-textdomain' )?>
                </label>

                <label for="ironcanyonres-checkbox-fairgood">
                  <input type="checkbox" name="ironcanyonres-checkbox-fairgood" id="ironcanyonres-checkbox-fairgood" value="-danger" <?php if ( isset ( $sbm_stored_meta['ironcanyonres-checkbox-fairgood'] ) ) checked( $sbm_stored_meta['ironcanyonres-checkbox-fairgood'][0], '-danger' ); ?> />
                  <?php _e( 'Fair to Good&nbsp;', 'sbm-textdomain' )?>
                </label>

                <label for="ironcanyonres-checkbox-good">
                  <input type="checkbox" name="ironcanyonres-checkbox-good" id="ironcanyonres-checkbox-good" value="-danger" <?php if ( isset ( $sbm_stored_meta['ironcanyonres-checkbox-good'] ) ) checked( $sbm_stored_meta['ironcanyonres-checkbox-good'][0], '-danger' ); ?> />
                  <?php _e( 'Good&nbsp;', 'sbm-textdomain' )?>
                </label>

                <label for="ironcanyonres-checkbox-great">
                  <input type="checkbox" name="ironcanyonres-checkbox-great" id="ironcanyonres-checkbox-great" value="-danger" <?php if ( isset ( $sbm_stored_meta['ironcanyonres-checkbox-great'] ) ) checked( $sbm_stored_meta['ironcanyonres-checkbox-great'][0], '-danger' ); ?> />
                  <?php _e( 'Great', 'sbm-textdomain' )?>
                </label>

              </div>
            </div> <!-- /.tab-pane iron canyon reservoir -->

            <!-- ====== KESWICK RESERVOIR ====== -->

            <div role="tabpanel" class="tab-pane fade" id="keswickreservoir">

              <h3><?php echo ' Keswick Reservoir '  ?></h3>

              <p><!-- Keswick Reservoir Updated -->

                <strong><label for="keswickres-updated" class="sbm-row-title"><?php _e( 'Keswick Reservoir Updated', 'sbm-textdomain' )?></label></strong>

                <input style="width: 100%;" type="text" name="keswickres-updated" id="keswickres-updated" value="<?php if ( isset ( $sbm_stored_meta['keswickres-updated'] ) ) echo $sbm_stored_meta['keswickres-updated'][0]; ?>" />

              </p>

              <p><!-- Keswick Reservoir Report -->

                <strong><label for="keswickres-report" class="sbm-row-title"><?php _e( 'Keswick Reservoir Report', 'sbm-textdomain' )?></label></strong>

                <textarea style="width: 100%;" rows="4" name="keswickres-report" id="keswickres-report"><?php if ( isset ( $sbm_stored_meta['keswickres-report'] ) ) echo $sbm_stored_meta['keswickres-report'][0]; ?></textarea>
              </p>

              <div class="mt-1618 mb-1618"><!-- Keswick Reservoir Hot Flies -->

                <strong><label for="keswickres-hot-flies" class="sbm-row-title"><?php _e( 'Keswick Reservoir Hot Flies', 'sbm-textdomain' )?></label></strong>
                <p>To create a link: <?php echo esc_html('<a href="www.hotflylink.com" title="A link to a hot fly" target="_blank">The name and size of the hot fly. ex: #16 Hot Fly</a>'); ?></p>

                <textarea style="width: 100%;" name="keswickres-hot-flies" id="keswickres-hot-flies"><?php if ( isset ( $sbm_stored_meta['keswickres-hot-flies'] ) ) echo $sbm_stored_meta['keswickres-hot-flies'][0]; ?></textarea>

              </div>

              <p><!-- Keswick Reservoir Rating -->
                <span class="sbm-row-title"><?php _e( '<strong>How is the fishing?</strong> ', 'sbm-textdomain' )?></span>
              <div class="sbm-row-content">

                <label for="keswickres-closed-message">
                  <?php _e( 'Custom Message&nbsp;', 'sbm-textdomain' )?>
                  <input type="text" style="width: 50%;" name="keswickres-closed-message" id="keswickres-closed-message" value="<?php if ( isset ( $sbm_stored_meta['keswickres-closed-message'] ) ) echo $sbm_stored_meta['keswickres-closed-message'][0]; ?>" />
                </label>

              </div>

              <div class="sbm-row-content">

                <label for="keswickres-closed-checkbox">
                  <input type="checkbox" name="keswickres-closed-checkbox" id="keswickres-closed-checkbox" value="-danger" <?php if ( isset ( $sbm_stored_meta['keswickres-closed-checkbox'] ) ) checked( $sbm_stored_meta['keswickres-closed-checkbox'][0], '-danger' ); ?> />
                  <?php _e( 'Custom&nbsp;', 'sbm-textdomain' )?>
                </label>

                <label for="keswickres-checkbox-poor">
                  <input type="checkbox" name="keswickres-checkbox-poor" id="keswickres-checkbox-poor" value="-danger" <?php if ( isset ( $sbm_stored_meta['keswickres-checkbox-poor'] ) ) checked( $sbm_stored_meta['keswickres-checkbox-poor'][0], '-danger' ); ?> />
                  <?php _e( 'Poor&nbsp;', 'sbm-textdomain' )?>
                </label>

                <label for="keswickres-checkbox-fair">
                  <input type="checkbox" name="keswickres-checkbox-fair" id="keswickres-checkbox-fair" value="-danger" <?php if ( isset ( $sbm_stored_meta['keswickres-checkbox-fair'] ) ) checked( $sbm_stored_meta['keswickres-checkbox-fair'][0], '-danger' ); ?> />
                  <?php _e( 'Fair&nbsp;', 'sbm-textdomain' )?>
                </label>

                <label for="keswickres-checkbox-fairgood">
                  <input type="checkbox" name="keswickres-checkbox-fairgood" id="keswickres-checkbox-fairgood" value="-danger" <?php if ( isset ( $sbm_stored_meta['keswickres-checkbox-fairgood'] ) ) checked( $sbm_stored_meta['keswickres-checkbox-fairgood'][0], '-danger' ); ?> />
                  <?php _e( 'Fair to Good&nbsp;', 'sbm-textdomain' )?>
                </label>

                <label for="keswickres-checkbox-good">
                  <input type="checkbox" name="keswickres-checkbox-good" id="keswickres-checkbox-good" value="-danger" <?php if ( isset ( $sbm_stored_meta['keswickres-checkbox-good'] ) ) checked( $sbm_stored_meta['keswickres-checkbox-good'][0], '-danger' ); ?> />
                  <?php _e( 'Good&nbsp;', 'sbm-textdomain' )?>
                </label>

                <label for="keswickres-checkbox-great">
                  <input type="checkbox" name="keswickres-checkbox-great" id="keswickres-checkbox-great" value="-danger" <?php if ( isset ( $sbm_stored_meta['keswickres-checkbox-great'] ) ) checked( $sbm_stored_meta['keswickres-checkbox-great'][0], '-danger' ); ?> />
                  <?php _e( 'Great', 'sbm-textdomain' )?>
                </label>

              </div>
            </div> <!-- /.tab-pane keswick reservoir -->

            <!-- ====== LAKE SHASTA ====== -->

            <div role="tabpanel" class="tab-pane fade" id="lakeshasta">

              <h3><?php echo ' Lake Shasta '  ?></h3>

              <p><!-- Lake Shasta Updated -->

                <strong><label for="lakeshasta-updated" class="sbm-row-title"><?php _e( 'Lake Shasta Updated', 'sbm-textdomain' )?></label></strong>

                <input style="width: 100%;" type="text" name="lakeshasta-updated" id="lakeshasta-updated" value="<?php if ( isset ( $sbm_stored_meta['lakeshasta-updated'] ) ) echo $sbm_stored_meta['lakeshasta-updated'][0]; ?>" />

              </p>

              <p><!-- Lake Shasta Report -->

                <strong><label for="lakeshasta-report" class="sbm-row-title"><?php _e( 'Lake Shasta Report', 'sbm-textdomain' )?></label></strong>

                <textarea style="width: 100%;" rows="4" name="lakeshasta-report" id="lakeshasta-report"><?php if ( isset ( $sbm_stored_meta['lakeshasta-report'] ) ) echo $sbm_stored_meta['lakeshasta-report'][0]; ?></textarea>
              </p>

              <div class="mt-1618 mb-1618"><!-- Lake Shasta Hot Flies -->

                <strong><label for="lakeshasta-hot-flies" class="sbm-row-title"><?php _e( 'Lake Shasta Hot Flies', 'sbm-textdomain' )?></label></strong>
                <p>To create a link: <?php echo esc_html('<a href="www.hotflylink.com" title="A link to a hot fly" target="_blank">The name and size of the hot fly. ex: #16 Hot Fly</a>'); ?></p>

                <textarea style="width: 100%;" name="lakeshasta-hot-flies" id="lakeshasta-hot-flies"><?php if ( isset ( $sbm_stored_meta['lakeshasta-hot-flies'] ) ) echo $sbm_stored_meta['lakeshasta-hot-flies'][0]; ?></textarea>

              </div>

              <p><!-- Lake Shasta Rating -->
                <span class="sbm-row-title"><?php _e( '<strong>How is the fishing?</strong> ', 'sbm-textdomain' )?></span>
              <div class="sbm-row-content">

                <label for="lakeshasta-closed-message">
                  <?php _e( 'Closed Message&nbsp;', 'sbm-textdomain' )?>
                  <input type="text" style="width: 50%;" name="lakeshasta-closed-message" id="lakeshasta-closed-message" value="<?php if ( isset ( $sbm_stored_meta['lakeshasta-closed-message'] ) ) echo $sbm_stored_meta['lakeshasta-closed-message'][0]; ?>" />
                </label>

              </div>

              <div class="sbm-row-content">

                <label for="lakeshasta-closed-checkbox">
                  <input type="checkbox" name="lakeshasta-closed-checkbox" id="lakeshasta-closed-checkbox" value="-danger" <?php if ( isset ( $sbm_stored_meta['lakeshasta-closed-checkbox'] ) ) checked( $sbm_stored_meta['lakeshasta-closed-checkbox'][0], '-danger' ); ?> />
                  <?php _e( 'Closed&nbsp;', 'sbm-textdomain' )?>
                </label>

                <label for="lakeshasta-checkbox-poor">
                  <input type="checkbox" name="lakeshasta-checkbox-poor" id="lakeshasta-checkbox-poor" value="-danger" <?php if ( isset ( $sbm_stored_meta['lakeshasta-checkbox-poor'] ) ) checked( $sbm_stored_meta['lakeshasta-checkbox-poor'][0], '-danger' ); ?> />
                  <?php _e( 'Poor&nbsp;', 'sbm-textdomain' )?>
                </label>

                <label for="lakeshasta-checkbox-fair">
                  <input type="checkbox" name="lakeshasta-checkbox-fair" id="lakeshasta-checkbox-fair" value="-danger" <?php if ( isset ( $sbm_stored_meta['lakeshasta-checkbox-fair'] ) ) checked( $sbm_stored_meta['lakeshasta-checkbox-fair'][0], '-danger' ); ?> />
                  <?php _e( 'Fair&nbsp;', 'sbm-textdomain' )?>
                </label>

                <label for="lakeshasta-checkbox-fairgood">
                  <input type="checkbox" name="lakeshasta-checkbox-fairgood" id="lakeshasta-checkbox-fairgood" value="-danger" <?php if ( isset ( $sbm_stored_meta['lakeshasta-checkbox-fairgood'] ) ) checked( $sbm_stored_meta['lakeshasta-checkbox-fairgood'][0], '-danger' ); ?> />
                  <?php _e( 'Fair to Good&nbsp;', 'sbm-textdomain' )?>
                </label>

                <label for="lakeshasta-checkbox-good">
                  <input type="checkbox" name="lakeshasta-checkbox-good" id="lakeshasta-checkbox-good" value="-danger" <?php if ( isset ( $sbm_stored_meta['lakeshasta-checkbox-good'] ) ) checked( $sbm_stored_meta['lakeshasta-checkbox-good'][0], '-danger' ); ?> />
                  <?php _e( 'Good&nbsp;', 'sbm-textdomain' )?>
                </label>

                <label for="lakeshasta-checkbox-great">
                  <input type="checkbox" name="lakeshasta-checkbox-great" id="lakeshasta-checkbox-great" value="-danger" <?php if ( isset ( $sbm_stored_meta['lakeshasta-checkbox-great'] ) ) checked( $sbm_stored_meta['lakeshasta-checkbox-great'][0], '-danger' ); ?> />
                  <?php _e( 'Great', 'sbm-textdomain' )?>
                </label>

              </div>
            </div> <!-- /.tab-pane lake shasta -->

            <!-- ====== LEWISTON LAKE ====== -->

            <div role="tabpanel" class="tab-pane fade" id="lewistonlake">

              <h3><?php echo ' Lewiston Lake '  ?></h3>

              <p><!-- Lewiston Lake Updated -->

                <strong><label for="lewistonlake-updated" class="sbm-row-title"><?php _e( 'Lewiston Lake Updated', 'sbm-textdomain' )?></label></strong>

                <input style="width: 100%;" type="text" name="lewistonlake-updated" id="lewistonlake-updated" value="<?php if ( isset ( $sbm_stored_meta['lewistonlake-updated'] ) ) echo $sbm_stored_meta['lewistonlake-updated'][0]; ?>" />

              </p>

              <p><!-- Lewiston Lake Report -->

                <strong><label for="lewistonlake-report" class="sbm-row-title"><?php _e( 'Lewiston Lake Report', 'sbm-textdomain' )?></label></strong>

                <textarea style="width: 100%;" rows="4" name="lewistonlake-report" id="lewistonlake-report"><?php if ( isset ( $sbm_stored_meta['lewistonlake-report'] ) ) echo $sbm_stored_meta['lewistonlake-report'][0]; ?></textarea>
              </p>

              <div class="mt-1618 mb-1618"><!-- Lewiston Lake Hot Flies -->

                <strong><label for="lewistonlake-hot-flies" class="sbm-row-title"><?php _e( 'Lewiston Lake Hot Flies', 'sbm-textdomain' )?></label></strong>
                <p>To create a link: <?php echo esc_html('<a href="www.hotflylink.com" title="A link to a hot fly" target="_blank">The name and size of the hot fly. ex: #16 Hot Fly</a>'); ?></p>

                <textarea style="width: 100%;" name="lewistonlake-hot-flies" id="lewistonlake-hot-flies"><?php if ( isset ( $sbm_stored_meta['lewistonlake-hot-flies'] ) ) echo $sbm_stored_meta['lewistonlake-hot-flies'][0]; ?></textarea>

              </div>

              <p><!-- Lewiston Lake Rating -->
                <span class="sbm-row-title"><?php _e( '<strong>How is the fishing?</strong> ', 'sbm-textdomain' )?></span>
              <div class="sbm-row-content">

                <label for="lewistonlake-closed-message">
                  <?php _e( 'Closed Message&nbsp;', 'sbm-textdomain' )?>
                  <input type="text" style="width: 50%;" name="lewistonlake-closed-message" id="lewistonlake-closed-message" value="<?php if ( isset ( $sbm_stored_meta['lewistonlake-closed-message'] ) ) echo $sbm_stored_meta['lewistonlake-closed-message'][0]; ?>" />
                </label>

              </div>
              <div class="sbm-row-content">

                <label for="lewistonlake-closed-checkbox">
                  <input type="checkbox" name="lewistonlake-closed-checkbox" id="lewistonlake-closed-checkbox" value="-danger" <?php if ( isset ( $sbm_stored_meta['lewistonlake-closed-checkbox'] ) ) checked( $sbm_stored_meta['lewistonlake-closed-checkbox'][0], '-danger' ); ?> />
                  <?php _e( 'Closed&nbsp;', 'sbm-textdomain' )?>
                </label>

                <label for="lewistonlake-checkbox-poor">
                  <input type="checkbox" name="lewistonlake-checkbox-poor" id="lewistonlake-checkbox-poor" value="-danger" <?php if ( isset ( $sbm_stored_meta['lewistonlake-checkbox-poor'] ) ) checked( $sbm_stored_meta['lewistonlake-checkbox-poor'][0], '-danger' ); ?> />
                  <?php _e( 'Poor&nbsp;', 'sbm-textdomain' )?>
                </label>

                <label for="lewistonlake-checkbox-fair">
                  <input type="checkbox" name="lewistonlake-checkbox-fair" id="lewistonlake-checkbox-fair" value="-danger" <?php if ( isset ( $sbm_stored_meta['lewistonlake-checkbox-fair'] ) ) checked( $sbm_stored_meta['lewistonlake-checkbox-fair'][0], '-danger' ); ?> />
                  <?php _e( 'Fair&nbsp;', 'sbm-textdomain' )?>
                </label>

                <label for="lewistonlake-checkbox-fairgood">
                  <input type="checkbox" name="lewistonlake-checkbox-fairgood" id="lewistonlake-checkbox-fairgood" value="-danger" <?php if ( isset ( $sbm_stored_meta['lewistonlake-checkbox-fairgood'] ) ) checked( $sbm_stored_meta['lewistonlake-checkbox-fairgood'][0], '-danger' ); ?> />
                  <?php _e( 'Fair to Good&nbsp;', 'sbm-textdomain' )?>
                </label>

                <label for="lewistonlake-checkbox-good">
                  <input type="checkbox" name="lewistonlake-checkbox-good" id="lewistonlake-checkbox-good" value="-danger" <?php if ( isset ( $sbm_stored_meta['lewistonlake-checkbox-good'] ) ) checked( $sbm_stored_meta['lewistonlake-checkbox-good'][0], '-danger' ); ?> />
                  <?php _e( 'Good&nbsp;', 'sbm-textdomain' )?>
                </label>

                <label for="lewistonlake-checkbox-great">
                  <input type="checkbox" name="lewistonlake-checkbox-great" id="lewistonlake-checkbox-great" value="-danger" <?php if ( isset ( $sbm_stored_meta['lewistonlake-checkbox-great'] ) ) checked( $sbm_stored_meta['lewistonlake-checkbox-great'][0], '-danger' ); ?> />
                  <?php _e( 'Great', 'sbm-textdomain' )?>
                </label>

              </div>
            </div> <!-- /.tab-pane lewiston lake -->

            <!-- ====== MANZANITA LAKE ====== -->

            <div role="tabpanel" class="tab-pane fade" id="manzanitalake">

              <h3><?php echo ' Manzanita Lake '  ?></h3>

              <p><!-- Manzanita Lake Updated -->

                <strong><label for="manzanitalake-updated" class="sbm-row-title"><?php _e( 'Manzanita Lake Updated', 'sbm-textdomain' )?></label></strong>

                <input style="width: 100%;" type="text" name="manzanitalake-updated" id="manzanitalake-updated" value="<?php if ( isset ( $sbm_stored_meta['manzanitalake-updated'] ) ) echo $sbm_stored_meta['manzanitalake-updated'][0]; ?>" />

              </p>

              <p><!-- Manzanita Lake Report -->

                <strong><label for="manzanitalake-report" class="sbm-row-title"><?php _e( 'Manzanita Lake Report', 'sbm-textdomain' )?></label></strong>

                <textarea style="width: 100%;" rows="4" name="manzanitalake-report" id="manzanitalake-report"><?php if ( isset ( $sbm_stored_meta['manzanitalake-report'] ) ) echo $sbm_stored_meta['manzanitalake-report'][0]; ?></textarea>
              </p>

              <div class="mt-1618 mb-1618"><!-- Manzanita Lake Hot Flies -->

                <strong><label for="manzanitalake-hot-flies" class="sbm-row-title"><?php _e( 'Manzanita Lake Hot Flies', 'sbm-textdomain' )?></label></strong>
                <p>To create a link: <?php echo esc_html('<a href="www.hotflylink.com" title="A link to a hot fly" target="_blank">The name and size of the hot fly. ex: #16 Hot Fly</a>'); ?></p>

                <textarea style="width: 100%;" name="manzanitalake-hot-flies" id="manzanitalake-hot-flies"><?php if ( isset ( $sbm_stored_meta['manzanitalake-hot-flies'] ) ) echo $sbm_stored_meta['manzanitalake-hot-flies'][0]; ?></textarea>

              </div>

              <p><!-- Manzanita Lake Rating -->
                <span class="sbm-row-title"><?php _e( '<strong>How is the fishing?</strong> ', 'sbm-textdomain' )?></span>
              <div class="sbm-row-content">

                <label for="manzanitalake-closed-message">
                  <?php _e( 'Closed Message&nbsp;', 'sbm-textdomain' )?>
                  <input type="text" style="width: 50%;" name="manzanitalake-closed-message" id="manzanitalake-closed-message" value="<?php if ( isset ( $sbm_stored_meta['manzanitalake-closed-message'] ) ) echo $sbm_stored_meta['manzanitalake-closed-message'][0]; ?>" />
                </label>

              </div>

              <div class="sbm-row-content">

                <label for="manzanitalake-closed-checkbox">
                  <input type="checkbox" name="manzanitalake-closed-checkbox" id="manzanitalake-closed-checkbox" value="-danger" <?php if ( isset ( $sbm_stored_meta['manzanitalake-closed-checkbox'] ) ) checked( $sbm_stored_meta['manzanitalake-closed-checkbox'][0], '-danger' ); ?> />
                  <?php _e( 'Closed&nbsp;', 'sbm-textdomain' )?>
                </label>

                <label for="manzanitalake-checkbox-poor">
                  <input type="checkbox" name="manzanitalake-checkbox-poor" id="manzanitalake-checkbox-poor" value="-danger" <?php if ( isset ( $sbm_stored_meta['manzanitalake-checkbox-poor'] ) ) checked( $sbm_stored_meta['manzanitalake-checkbox-poor'][0], '-danger' ); ?> />
                  <?php _e( 'Poor&nbsp;', 'sbm-textdomain' )?>
                </label>

                <label for="manzanitalake-checkbox-fair">
                  <input type="checkbox" name="manzanitalake-checkbox-fair" id="manzanitalake-checkbox-fair" value="-danger" <?php if ( isset ( $sbm_stored_meta['manzanitalake-checkbox-fair'] ) ) checked( $sbm_stored_meta['manzanitalake-checkbox-fair'][0], '-danger' ); ?> />
                  <?php _e( 'Fair&nbsp;', 'sbm-textdomain' )?>
                </label>

                <label for="manzanitalake-checkbox-fairgood">
                  <input type="checkbox" name="manzanitalake-checkbox-fairgood" id="manzanitalake-checkbox-fairgood" value="-danger" <?php if ( isset ( $sbm_stored_meta['manzanitalake-checkbox-fairgood'] ) ) checked( $sbm_stored_meta['manzanitalake-checkbox-fairgood'][0], '-danger' ); ?> />
                  <?php _e( 'Fair to Good&nbsp;', 'sbm-textdomain' )?>
                </label>

                <label for="manzanitalake-checkbox-good">
                  <input type="checkbox" name="manzanitalake-checkbox-good" id="manzanitalake-checkbox-good" value="-danger" <?php if ( isset ( $sbm_stored_meta['manzanitalake-checkbox-good'] ) ) checked( $sbm_stored_meta['manzanitalake-checkbox-good'][0], '-danger' ); ?> />
                  <?php _e( 'Good&nbsp;', 'sbm-textdomain' )?>
                </label>

                <label for="manzanitalake-checkbox-great">
                  <input type="checkbox" name="manzanitalake-checkbox-great" id="manzanitalake-checkbox-great" value="-danger" <?php if ( isset ( $sbm_stored_meta['manzanitalake-checkbox-great'] ) ) checked( $sbm_stored_meta['manzanitalake-checkbox-great'][0], '-danger' ); ?> />
                  <?php _e( 'Great', 'sbm-textdomain' )?>
                </label>

              </div>
            </div> <!-- /.tab-pane manzanita lake -->

            <!-- ====== MCCLOUD RESERVOIR ====== -->

            <div role="tabpanel" class="tab-pane fade" id="mccloudreservoir">

              <h3><?php echo ' McCloud Reservoir '  ?></h3>

              <p><!-- McCloud Reservoir Updated -->

                <strong><label for="mccloudreservoir-updated" class="sbm-row-title"><?php _e( 'McCloud Reservoir Updated', 'sbm-textdomain' )?></label></strong>

                <input style="width: 100%;" type="text" name="mccloudreservoir-updated" id="mccloudreservoir-updated" value="<?php if ( isset ( $sbm_stored_meta['mccloudreservoir-updated'] ) ) echo $sbm_stored_meta['mccloudreservoir-updated'][0]; ?>" />

              </p>

              <p><!-- McCloud Reservoir Report -->

                <strong><label for="mccloudreservoir-report" class="sbm-row-title"><?php _e( 'McCloud Reservoir Report', 'sbm-textdomain' )?></label></strong>

                <textarea style="width: 100%;" rows="4" name="mccloudreservoir-report" id="mccloudreservoir-report"><?php if ( isset ( $sbm_stored_meta['mccloudreservoir-report'] ) ) echo $sbm_stored_meta['mccloudreservoir-report'][0]; ?></textarea>
              </p>

              <div class="mt-1618 mb-1618"><!-- McCloud Reservoir Hot Flies -->

                <strong><label for="mccloudreservoir-hot-flies" class="sbm-row-title"><?php _e( 'McCloud Reservoir Hot Flies', 'sbm-textdomain' )?></label></strong>
                <p>To create a link: <?php echo esc_html('<a href="www.hotflylink.com" title="A link to a hot fly" target="_blank">The name and size of the hot fly. ex: #16 Hot Fly</a>'); ?></p>

                <textarea style="width: 100%;" name="mccloudreservoir-hot-flies" id="mccloudreservoir-hot-flies"><?php if ( isset ( $sbm_stored_meta['mccloudreservoir-hot-flies'] ) ) echo $sbm_stored_meta['mccloudreservoir-hot-flies'][0]; ?></textarea>

              </div>

              <p><!-- McCloud Reservoir Rating -->
                <span class="sbm-row-title"><?php _e( '<strong>How is the fishing?</strong> ', 'sbm-textdomain' )?></span>
              <div class="sbm-row-content">

                <label for="mccloudreservoir-closed-message">
                  <?php _e( 'Closed Message&nbsp;', 'sbm-textdomain' )?>
                  <input type="text" style="width: 50%;" name="mccloudreservoir-closed-message" id="mccloudreservoir-closed-message" value="<?php if ( isset ( $sbm_stored_meta['mccloudreservoir-closed-message'] ) ) echo $sbm_stored_meta['mccloudreservoir-closed-message'][0]; ?>" />
                </label>

              </div>
              <div class="sbm-row-content">

                <label for="mccloudreservoir-closed-checkbox">
                  <input type="checkbox" name="mccloudreservoir-closed-checkbox" id="mccloudreservoir-closed-checkbox" value="-danger" <?php if ( isset ( $sbm_stored_meta['mccloudreservoir-closed-checkbox'] ) ) checked( $sbm_stored_meta['mccloudreservoir-closed-checkbox'][0], '-danger' ); ?> />
                  <?php _e( 'Closed&nbsp;', 'sbm-textdomain' )?>
                </label>

                <label for="mccloudreservoir-checkbox-poor">
                  <input type="checkbox" name="mccloudreservoir-checkbox-poor" id="mccloudreservoir-checkbox-poor" value="-danger" <?php if ( isset ( $sbm_stored_meta['mccloudreservoir-checkbox-poor'] ) ) checked( $sbm_stored_meta['mccloudreservoir-checkbox-poor'][0], '-danger' ); ?> />
                  <?php _e( 'Poor&nbsp;', 'sbm-textdomain' )?>
                </label>

                <label for="mccloudreservoir-checkbox-fair">
                  <input type="checkbox" name="mccloudreservoir-checkbox-fair" id="mccloudreservoir-checkbox-fair" value="-danger" <?php if ( isset ( $sbm_stored_meta['mccloudreservoir-checkbox-fair'] ) ) checked( $sbm_stored_meta['mccloudreservoir-checkbox-fair'][0], '-danger' ); ?> />
                  <?php _e( 'Fair&nbsp;', 'sbm-textdomain' )?>
                </label>

                <label for="mccloudreservoir-checkbox-fairgood">
                  <input type="checkbox" name="mccloudreservoir-checkbox-fairgood" id="mccloudreservoir-checkbox-fairgood" value="-danger" <?php if ( isset ( $sbm_stored_meta['mccloudreservoir-checkbox-fairgood'] ) ) checked( $sbm_stored_meta['mccloudreservoir-checkbox-fairgood'][0], '-danger' ); ?> />
                  <?php _e( 'Fair to Good&nbsp;', 'sbm-textdomain' )?>
                </label>

                <label for="mccloudreservoir-checkbox-good">
                  <input type="checkbox" name="mccloudreservoir-checkbox-good" id="mccloudreservoir-checkbox-good" value="-danger" <?php if ( isset ( $sbm_stored_meta['mccloudreservoir-checkbox-good'] ) ) checked( $sbm_stored_meta['mccloudreservoir-checkbox-good'][0], '-danger' ); ?> />
                  <?php _e( 'Good&nbsp;', 'sbm-textdomain' )?>
                </label>

                <label for="mccloudreservoir-checkbox-great">
                  <input type="checkbox" name="mccloudreservoir-checkbox-great" id="mccloudreservoir-checkbox-great" value="-danger" <?php if ( isset ( $sbm_stored_meta['mccloudreservoir-checkbox-great'] ) ) checked( $sbm_stored_meta['mccloudreservoir-checkbox-great'][0], '-danger' ); ?> />
                  <?php _e( 'Great', 'sbm-textdomain' )?>
                </label>

              </div>
            </div> <!-- /.tab-pane mccloud reservoir -->

            <!-- ====== PYRAMID LAKE ====== -->

            <div role="tabpanel" class="tab-pane fade" id="pyramidlake">

              <h3><?php echo ' Pyramid Lake '  ?></h3>

              <p><!-- Pyramid Lake Updated -->

                <strong><label for="pyramidlake-updated" class="sbm-row-title"><?php _e( 'Pyramid Lake Updated', 'sbm-textdomain' )?></label></strong>

                <input style="width: 100%;" type="text" name="pyramidlake-updated" id="pyramidlake-updated" value="<?php if ( isset ( $sbm_stored_meta['pyramidlake-updated'] ) ) echo $sbm_stored_meta['pyramidlake-updated'][0]; ?>" />

              </p>

              <p><!-- Pyramid Lake Report -->

                <strong><label for="pyramidlake-report" class="sbm-row-title"><?php _e( 'Pyramid Lake Report', 'sbm-textdomain' )?></label></strong>

                <textarea style="width: 100%;" rows="4" name="pyramidlake-report" id="pyramidlake-report"><?php if ( isset ( $sbm_stored_meta['pyramidlake-report'] ) ) echo $sbm_stored_meta['pyramidlake-report'][0]; ?></textarea>
              </p>

              <div class="mt-1618 mb-1618"><!-- McCloud Lake Hot Flies -->

                <strong><label for="pyramidlake-hot-flies" class="sbm-row-title"><?php _e( 'Pyramid Lake Hot Flies', 'sbm-textdomain' )?></label></strong>
                <p>To create a link: <?php echo esc_html('<a href="www.hotflylink.com" title="A link to a hot fly" target="_blank">The name and size of the hot fly. ex: #16 Hot Fly</a>'); ?></p>

                <textarea style="width: 100%;" name="pyramidlake-hot-flies" id="pyramidlake-hot-flies"><?php if ( isset ( $sbm_stored_meta['pyramidlake-hot-flies'] ) ) echo $sbm_stored_meta['pyramidlake-hot-flies'][0]; ?></textarea>

              </div>

              <p><!-- McCloud Lake Rating -->
                <span class="sbm-row-title"><?php _e( '<strong>How is the fishing?</strong> ', 'sbm-textdomain' )?></span>
              <div class="sbm-row-content">

                <label for="pyramidlake-closed-message">
                  <?php _e( 'Closed Message&nbsp;', 'sbm-textdomain' )?>
                  <input type="text" style="width: 50%;" name="pyramidlake-closed-message" id="pyramidlake-closed-message" value="<?php if ( isset ( $sbm_stored_meta['pyramidlake-closed-message'] ) ) echo $sbm_stored_meta['pyramidlake-closed-message'][0]; ?>" />
                </label>

              </div>
              <div class="sbm-row-content">

                <label for="pyramidlake-closed-checkbox">
                  <input type="checkbox" name="pyramidlake-closed-checkbox" id="pyramidlake-closed-checkbox" value="-danger" <?php if ( isset ( $sbm_stored_meta['pyramidlake-closed-checkbox'] ) ) checked( $sbm_stored_meta['pyramidlake-closed-checkbox'][0], '-danger' ); ?> />
                  <?php _e( 'Closed&nbsp;', 'sbm-textdomain' )?>
                </label>

                <label for="pyramidlake-checkbox-poor">
                  <input type="checkbox" name="pyramidlake-checkbox-poor" id="pyramidlake-checkbox-poor" value="-danger" <?php if ( isset ( $sbm_stored_meta['pyramidlake-checkbox-poor'] ) ) checked( $sbm_stored_meta['pyramidlake-checkbox-poor'][0], '-danger' ); ?> />
                  <?php _e( 'Poor&nbsp;', 'sbm-textdomain' )?>
                </label>

                <label for="pyramidlake-checkbox-fair">
                  <input type="checkbox" name="pyramidlake-checkbox-fair" id="pyramidlake-checkbox-fair" value="-danger" <?php if ( isset ( $sbm_stored_meta['pyramidlake-checkbox-fair'] ) ) checked( $sbm_stored_meta['pyramidlake-checkbox-fair'][0], '-danger' ); ?> />
                  <?php _e( 'Fair&nbsp;', 'sbm-textdomain' )?>
                </label>

                <label for="pyramidlake-checkbox-fairgood">
                  <input type="checkbox" name="pyramidlake-checkbox-fairgood" id="pyramidlake-checkbox-fairgood" value="-danger" <?php if ( isset ( $sbm_stored_meta['pyramidlake-checkbox-fairgood'] ) ) checked( $sbm_stored_meta['pyramidlake-checkbox-fairgood'][0], '-danger' ); ?> />
                  <?php _e( 'Fair to Good&nbsp;', 'sbm-textdomain' )?>
                </label>

                <label for="pyramidlake-checkbox-good">
                  <input type="checkbox" name="pyramidlake-checkbox-good" id="pyramidlake-checkbox-good" value="-danger" <?php if ( isset ( $sbm_stored_meta['pyramidlake-checkbox-good'] ) ) checked( $sbm_stored_meta['pyramidlake-checkbox-good'][0], '-danger' ); ?> />
                  <?php _e( 'Good&nbsp;', 'sbm-textdomain' )?>
                </label>

                <label for="pyramidlake-checkbox-great">
                  <input type="checkbox" name="pyramidlake-checkbox-great" id="pyramidlake-checkbox-great" value="-danger" <?php if ( isset ( $sbm_stored_meta['pyramidlake-checkbox-great'] ) ) checked( $sbm_stored_meta['pyramidlake-checkbox-great'][0], '-danger' ); ?> />
                  <?php _e( 'Great', 'sbm-textdomain' )?>
                </label>

              </div>
            </div> <!-- /.tab-pane pyramid lake -->
          </div> <!-- /.tab-content -->
        </div> <!-- /.panel-body boof -->
      </div> <!-- /.panel-heading -->
    </div> <!-- /.panel .with-nav-tabs .panel-default -->

    <!-- ====== ANTELOPE CREEK LODGE ====== -->

    <hr style="margin-top: 1.618em; border-top: 3px double #8c8b8b;">
    <div style="margin-top: 1.618em;">
      <h1>Private Waters</h1>
    </div>

    <div class="panel with-nav-tabs panel-default">
      <div class="panel-heading">

        <!-- Nav tabs -->
        <ul class="nav nav-tabs" role="tablist">
          <li role="presentation" class="active"><a href="#antelopecreek" aria-controls="antelopecreek" role="tab" data-toggle="tab">Antelope Creek Lodge</a></li>
          <!-- <li role="presentation"><a href="#baileycreek" aria-controls="baileycreek" role="tab" data-toggle="tab">Bailey Creek Lodge</a></li> -->
          <li role="presentation"><a href="#battlecreek" aria-controls="battlecreek" role="tab" data-toggle="tab">Battle Creek Lodge</a></li>
          <li role="presentation"><a href="#bollibokka" aria-controls="bollibokka" role="tab" data-toggle="tab">Bollibokka</a></li>
          <li role="presentation"><a href="#circle7" aria-controls="circle7" role="tab" data-toggle="tab">Circle 7 Guest Ranch</a></li>
          <li role="presentation"><a href="#clearcreek" aria-controls="clearcreek" role="tab" data-toggle="tab">Clear Creek Ranch</a></li>
          <li role="presentation"><a href="#goldriver" aria-controls="goldriver" role="tab" data-toggle="tab">Gold River Lodge</a></li>
          <li role="presentation"><a href="#hatcreekranch" aria-controls="hatcreekranch" role="tab" data-toggle="tab">Hat Creek Ranch</a></li>
          <li role="presentation"><a href="#luklake" aria-controls="luklake" role="tab" data-toggle="tab">Luk Lake</a></li>
          <li role="presentation"><a href="#oasissprings" aria-controls="oasissprings" role="tab" data-toggle="tab">Oasis Springs</a></li>
          <!-- <li role="presentation"><a href="#pedrottiponds" aria-controls="pedrottiponds" role="tab" data-toggle="tab">Pedrotti Ponds</a></li> -->
          <li role="presentation"><a href="#rockcreek" aria-controls="rockcreek" role="tab" data-toggle="tab">Rock Creek Lake</a></li>
          <!--<li role="presentation"><a href="#spinnerfall" aria-controls="spinnerfall" role="tab" data-toggle="tab">Spinner Fall Lodge</a></li>-->
          <li role="presentation"><a href="#sugarcreek" aria-controls="surgarcreek" role="tab" data-toggle="tab">Sugar Creek Ranch</a></li>
        </ul>

        <div class="panel-body boof">
          <div class="tab-content">

            <div role="tabpanel" class="tab-pane fade in active" id="antelopecreek">

              <h3><?php echo ' Antelope Creek Lodge '  ?></h3>

              <p><!-- Antelope Creek Lodge Updated -->

                <strong><label for="antelopecreek-updated" class="sbm-row-title"><?php _e( 'Antelope Creek Lodge Updated', 'sbm-textdomain' )?></label></strong>

                <input style="width: 100%;" type="text" name="antelopecreek-updated" id="antelopecreek-updated" value="<?php if ( isset ( $sbm_stored_meta['antelopecreek-updated'] ) ) echo $sbm_stored_meta['antelopecreek-updated'][0]; ?>" />

              </p>

              <p><!-- Antelope Creek Lodge Report -->

                <strong><label for="antelopecreek-report" class="sbm-row-title"><?php _e( 'Antelope Creek Lodge Report', 'sbm-textdomain' )?></label></strong>

                <textarea style="width: 100%;" rows="4" name="antelopecreek-report" id="antelopecreek-report"><?php if ( isset ( $sbm_stored_meta['antelopecreek-report'] ) ) echo $sbm_stored_meta['antelopecreek-report'][0]; ?></textarea>
              </p>

              <div class="mt-1618 mb-1618"><!-- Antelope Creek Lodge Hot Flies -->

                <strong><label for="antelopecreek-hot-flies" class="sbm-row-title"><?php _e( 'Antelope Creek Lodge Hot Flies', 'sbm-textdomain' )?></label></strong>
                <p>To create a link: <?php echo esc_html('<a href="www.hotflylink.com" title="A link to a hot fly" target="_blank">The name and size of the hot fly. ex: #16 Hot Fly</a>'); ?></p>

                <textarea style="width: 100%;" name="antelopecreek-hot-flies" id="antelopecreek-hot-flies"><?php if ( isset ( $sbm_stored_meta['antelopecreek-hot-flies'] ) ) echo $sbm_stored_meta['antelopecreek-hot-flies'][0]; ?></textarea>

              </div>

              <p><!-- Antelope Creek Lodge Rating -->
                <span class="sbm-row-title"><?php _e( '<strong>How is the fishing?</strong> ', 'sbm-textdomain' )?></span>
              <div class="sbm-row-content">

                <label for="antelopecreek-closed-message">
                  <?php _e( 'Closed Message&nbsp;', 'sbm-textdomain' )?>
                  <input type="text" style="width: 50%;" name="antelopecreek-closed-message" id="antelopecreek-closed-message" value="<?php if ( isset ( $sbm_stored_meta['antelopecreek-closed-message'] ) ) echo $sbm_stored_meta['antelopecreek-closed-message'][0]; ?>" />
                </label>

              </div>
              <div class="sbm-row-content">

                <label for="antelopecreek-closed-checkbox">
                  <input type="checkbox" name="antelopecreek-closed-checkbox" id="antelopecreek-closed-checkbox" value="-danger" <?php if ( isset ( $sbm_stored_meta['antelopecreek-closed-checkbox'] ) ) checked( $sbm_stored_meta['antelopecreek-closed-checkbox'][0], '-danger' ); ?> />
                  <?php _e( 'Closed&nbsp;', 'sbm-textdomain' )?>
                </label>

                <label for="antelopecreek-checkbox-poor">
                  <input type="checkbox" name="antelopecreek-checkbox-poor" id="antelopecreek-checkbox-poor" value="-danger" <?php if ( isset ( $sbm_stored_meta['antelopecreek-checkbox-poor'] ) ) checked( $sbm_stored_meta['antelopecreek-checkbox-poor'][0], '-danger' ); ?> />
                  <?php _e( 'Poor&nbsp;', 'sbm-textdomain' )?>
                </label>

                <label for="antelopecreek-checkbox-fair">
                  <input type="checkbox" name="antelopecreek-checkbox-fair" id="antelopecreek-checkbox-fair" value="-danger" <?php if ( isset ( $sbm_stored_meta['antelopecreek-checkbox-fair'] ) ) checked( $sbm_stored_meta['antelopecreek-checkbox-fair'][0], '-danger' ); ?> />
                  <?php _e( 'Fair&nbsp;', 'sbm-textdomain' )?>
                </label>

                <label for="antelopecreek-checkbox-fairgood">
                  <input type="checkbox" name="antelopecreek-checkbox-fairgood" id="antelopecreek-checkbox-fairgood" value="-danger" <?php if ( isset ( $sbm_stored_meta['antelopecreek-checkbox-fairgood'] ) ) checked( $sbm_stored_meta['antelopecreek-checkbox-fairgood'][0], '-danger' ); ?> />
                  <?php _e( 'Fair to Good&nbsp;', 'sbm-textdomain' )?>
                </label>

                <label for="antelopecreek-checkbox-good">
                  <input type="checkbox" name="antelopecreek-checkbox-good" id="antelopecreek-checkbox-good" value="-danger" <?php if ( isset ( $sbm_stored_meta['antelopecreek-checkbox-good'] ) ) checked( $sbm_stored_meta['antelopecreek-checkbox-good'][0], '-danger' ); ?> />
                  <?php _e( 'Good&nbsp;', 'sbm-textdomain' )?>
                </label>

                <label for="antelopecreek-checkbox-great">
                  <input type="checkbox" name="antelopecreek-checkbox-great" id="antelopecreek-checkbox-great" value="-danger" <?php if ( isset ( $sbm_stored_meta['antelopecreek-checkbox-great'] ) ) checked( $sbm_stored_meta['antelopecreek-checkbox-great'][0], '-danger' ); ?> />
                  <?php _e( 'Great', 'sbm-textdomain' )?>
                </label>

              </div>
            </div> <!-- /.tab-pane antelope creek -->

            <!-- ====== BAILEY CREEK LODGE ====== -->

             <!-- /.tab-pane bailey creek -->

            <!-- ====== BATTLE CREEK ====== -->

            <div role="tabpanel" class="tab-pane fade" id="battlecreek">

              <h3><?php echo ' Battle Creek '  ?></h3>

              <p><!-- Battle Creek Updated -->

                <strong><label for="battlecreek-updated" class="sbm-row-title"><?php _e( 'Battle Creek Updated', 'sbm-textdomain' )?></label></strong>

                <input style="width: 100%;" type="text" name="battlecreek-updated" id="battlecreek-updated" value="<?php if ( isset ( $sbm_stored_meta['battlecreek-updated'] ) ) echo $sbm_stored_meta['battlecreek-updated'][0]; ?>" />

              </p>

              <p><!-- Battle Creek Report -->

                <strong><label for="battlecreek-report" class="sbm-row-title"><?php _e( 'Battle Creek Report', 'sbm-textdomain' )?></label></strong>

                <textarea style="width: 100%;" rows="4" name="battlecreek-report" id="battlecreek-report"><?php if ( isset ( $sbm_stored_meta['battlecreek-report'] ) ) echo $sbm_stored_meta['battlecreek-report'][0]; ?></textarea>
              </p>

              <div class="mt-1618 mb-1618"><!-- Battle Creek Hot Flies -->

                <strong><label for="battlecreek-hot-flies" class="sbm-row-title"><?php _e( 'Battle Creek Hot Flies', 'sbm-textdomain' )?></label></strong>
                <p>To create a link: <?php echo esc_html('<a href="www.hotflylink.com" title="A link to a hot fly" target="_blank">The name and size of the hot fly. ex: #16 Hot Fly</a>'); ?></p>

                <textarea style="width: 100%;" name="battlecreek-hot-flies" id="battlecreek-hot-flies"><?php if ( isset ( $sbm_stored_meta['battlecreek-hot-flies'] ) ) echo $sbm_stored_meta['battlecreek-hot-flies'][0]; ?></textarea>

              </div>

              <p><!-- Battle Creek Rating -->
                <span class="sbm-row-title"><?php _e( '<strong>How is the fishing?</strong> ', 'sbm-textdomain' )?></span>
              <div class="sbm-row-content">

                <label for="battlecreek-closed-message">
                  <?php _e( 'Closed Message&nbsp;', 'sbm-textdomain' )?>
                  <input type="text" style="width: 50%;" name="battlecreek-closed-message" id="battlecreek-closed-message" value="<?php if ( isset ( $sbm_stored_meta['battlecreek-closed-message'] ) ) echo $sbm_stored_meta['battlecreek-closed-message'][0]; ?>" />
                </label>

              </div>
              <div class="sbm-row-content">

                <label for="battlecreek-closed-checkbox">
                  <input type="checkbox" name="battlecreek-closed-checkbox" id="battlecreek-closed-checkbox" value="-danger" <?php if ( isset ( $sbm_stored_meta['battlecreek-closed-checkbox'] ) ) checked( $sbm_stored_meta['battlecreek-closed-checkbox'][0], '-danger' ); ?> />
                  <?php _e( 'Closed&nbsp;', 'sbm-textdomain' )?>
                </label>

                <label for="battlecreek-checkbox-poor">
                  <input type="checkbox" name="battlecreek-checkbox-poor" id="battlecreek-checkbox-poor" value="-danger" <?php if ( isset ( $sbm_stored_meta['battlecreek-checkbox-poor'] ) ) checked( $sbm_stored_meta['battlecreek-checkbox-poor'][0], '-danger' ); ?> />
                  <?php _e( 'Poor&nbsp;', 'sbm-textdomain' )?>
                </label>

                <label for="battlecreek-checkbox-fair">
                  <input type="checkbox" name="battlecreek-checkbox-fair" id="battlecreek-checkbox-fair" value="-danger" <?php if ( isset ( $sbm_stored_meta['battlecreek-checkbox-fair'] ) ) checked( $sbm_stored_meta['battlecreek-checkbox-fair'][0], '-danger' ); ?> />
                  <?php _e( 'Fair&nbsp;', 'sbm-textdomain' )?>
                </label>

                <label for="battlecreek-checkbox-fairgood">
                  <input type="checkbox" name="battlecreek-checkbox-fairgood" id="battlecreek-checkbox-fairgood" value="-danger" <?php if ( isset ( $sbm_stored_meta['battlecreek-checkbox-fairgood'] ) ) checked( $sbm_stored_meta['battlecreek-checkbox-fairgood'][0], '-danger' ); ?> />
                  <?php _e( 'Fair to Good&nbsp;', 'sbm-textdomain' )?>
                </label>

                <label for="battlecreek-checkbox-good">
                  <input type="checkbox" name="battlecreek-checkbox-good" id="battlecreek-checkbox-good" value="-danger" <?php if ( isset ( $sbm_stored_meta['battlecreek-checkbox-good'] ) ) checked( $sbm_stored_meta['battlecreek-checkbox-good'][0], '-danger' ); ?> />
                  <?php _e( 'Good&nbsp;', 'sbm-textdomain' )?>
                </label>

                <label for="battlecreek-checkbox-great">
                  <input type="checkbox" name="battlecreek-checkbox-great" id="battlecreek-checkbox-great" value="-danger" <?php if ( isset ( $sbm_stored_meta['battlecreek-checkbox-great'] ) ) checked( $sbm_stored_meta['battlecreek-checkbox-great'][0], '-danger' ); ?> />
                  <?php _e( 'Great', 'sbm-textdomain' )?>
                </label>

              </div>
            </div> <!-- /.tab-pane battle creek -->

            <!-- ====== BOLLIBOKKA ====== -->

            <div role="tabpanel" class="tab-pane fade" id="bollibokka">

              <h3><?php echo ' Bollibokka '  ?></h3>

              <p><!-- Bollibokka Updated -->

                <strong><label for="bollibokka-updated" class="sbm-row-title"><?php _e( 'Bollibokka Updated', 'sbm-textdomain' )?></label></strong>

                <input style="width: 100%;" type="text" name="bollibokka-updated" id="bollibokka-updated" value="<?php if ( isset ( $sbm_stored_meta['bollibokka-updated'] ) ) echo $sbm_stored_meta['bollibokka-updated'][0]; ?>" />

              </p>

              <p><!-- Bollibokka Report -->

                <strong><label for="bollibokka-report" class="sbm-row-title"><?php _e( 'Bollibokka Report', 'sbm-textdomain' )?></label></strong>

                <textarea style="width: 100%;" rows="4" name="bollibokka-report" id="bollibokka-report"><?php if ( isset ( $sbm_stored_meta['bollibokka-report'] ) ) echo $sbm_stored_meta['bollibokka-report'][0]; ?></textarea>
              </p>

              <div class="mt-1618 mb-1618"><!-- Bollibokka Hot Flies -->

                <strong><label for="bollibokka-hot-flies" class="sbm-row-title"><?php _e( 'Bollibokka Hot Flies', 'sbm-textdomain' )?></label></strong>
                <p>To create a link: <?php echo esc_html('<a href="www.hotflylink.com" title="A link to a hot fly" target="_blank">The name and size of the hot fly. ex: #16 Hot Fly</a>'); ?></p>

                <textarea style="width: 100%;" name="bollibokka-hot-flies" id="bollibokka-hot-flies"><?php if ( isset ( $sbm_stored_meta['bollibokka-hot-flies'] ) ) echo $sbm_stored_meta['bollibokka-hot-flies'][0]; ?></textarea>

              </div>

              <p><!-- Bollibokka Rating -->
                <span class="sbm-row-title"><?php _e( '<strong>How is the fishing?</strong> ', 'sbm-textdomain' )?></span>
              <div class="sbm-row-content">

                <label for="bollibokka-closed-message">
                  <?php _e( 'Closed Mesage&nbsp;', 'sbm-textdomain' )?>
                  <input type="text" style="width: 50%;" name="bollibokka-closed-message" id="bollibokka-closed-message" value="<?php if ( isset ( $sbm_stored_meta['bollibokka-closed-message'] ) ) echo $sbm_stored_meta['bollibokka-closed-message'][0]; ?>" />
                </label>

              </div>

              <div class="sbm-row-content">

                <label for="bollibokka-closed-checkbox">
                  <input type="checkbox" name="bollibokka-closed-checkbox" id="bollibokka-closed-checkbox" value="-danger" <?php if ( isset ( $sbm_stored_meta['bollibokka-closed-checkbox'] ) ) checked( $sbm_stored_meta['bollibokka-closed-checkbox'][0], '-danger' ); ?> />
                  <?php _e( 'Closed For The Season&nbsp;', 'sbm-textdomain' )?>
                </label>

                <label for="bollibokka-checkbox-poor">
                  <input type="checkbox" name="bollibokka-checkbox-poor" id="bollibokka-checkbox-poor" value="-danger" <?php if ( isset ( $sbm_stored_meta['bollibokka-checkbox-poor'] ) ) checked( $sbm_stored_meta['bollibokka-checkbox-poor'][0], '-danger' ); ?> />
                  <?php _e( 'Poor&nbsp;', 'sbm-textdomain' )?>
                </label>

                <label for="bollibokka-checkbox-fair">
                  <input type="checkbox" name="bollibokka-checkbox-fair" id="bollibokka-checkbox-fair" value="-danger" <?php if ( isset ( $sbm_stored_meta['bollibokka-checkbox-fair'] ) ) checked( $sbm_stored_meta['bollibokka-checkbox-fair'][0], '-danger' ); ?> />
                  <?php _e( 'Fair', 'sbm-textdomain' )?>
                </label>

                <label for="bollibokka-checkbox-fairgood">
                  <input type="checkbox" name="bollibokka-checkbox-fairgood" id="bollibokka-checkbox-fairgood" value="-danger" <?php if ( isset ( $sbm_stored_meta['bollibokka-checkbox-fairgood'] ) ) checked( $sbm_stored_meta['bollibokka-checkbox-fairgood'][0], '-danger' ); ?> />
                  <?php _e( 'Fair to Good&nbsp;', 'sbm-textdomain' )?>
                </label>

                <label for="bollibokka-checkbox-good">
                  <input type="checkbox" name="bollibokka-checkbox-good" id="bollibokka-checkbox-good" value="-danger" <?php if ( isset ( $sbm_stored_meta['bollibokka-checkbox-good'] ) ) checked( $sbm_stored_meta['bollibokka-checkbox-good'][0], '-danger' ); ?> />
                  <?php _e( 'Good&nbsp;', 'sbm-textdomain' )?>
                </label>

                <label for="bollibokka-checkbox-great">
                  <input type="checkbox" name="bollibokka-checkbox-great" id="bollibokka-checkbox-great" value="-danger" <?php if ( isset ( $sbm_stored_meta['bollibokka-checkbox-great'] ) ) checked( $sbm_stored_meta['bollibokka-checkbox-great'][0], '-danger' ); ?> />
                  <?php _e( 'Great', 'sbm-textdomain' )?>
                </label>

              </div>
            </div> <!-- /.tab-pane bollibokka -->

            <!-- ====== CIRCLE 7 GUEST RANCH ====== -->

            <div role="tabpanel" class="tab-pane fade" id="circle7">

              <h3><?php echo ' Circle 7 Guest Ranch '  ?></h3>

              <p><!-- Circle 7 Guest Ranch Updated -->

                <strong><label for="circle7-updated" class="sbm-row-title"><?php _e( 'Circle 7 Guest Ranch Updated', 'sbm-textdomain' )?></label></strong>

                <input style="width: 100%;" type="text" name="circle7-updated" id="circle7-updated" value="<?php if ( isset ( $sbm_stored_meta['circle7-updated'] ) ) echo $sbm_stored_meta['circle7-updated'][0]; ?>" />

              </p>

              <p><!-- Circle 7 Guest Ranch Report -->

                <strong><label for="circle7-report" class="sbm-row-title"><?php _e( 'Circle 7 Guest Ranch Report', 'sbm-textdomain' )?></label></strong>

                <textarea style="width: 100%;" rows="4" name="circle7-report" id="circle7-report"><?php if ( isset ( $sbm_stored_meta['circle7-report'] ) ) echo $sbm_stored_meta['circle7-report'][0]; ?></textarea>
              </p>

              <div class="mt-1618 mb-1618"><!-- Circle 7 Guest Ranch Hot Flies -->

                <strong><label for="circle7-hot-flies" class="sbm-row-title"><?php _e( 'Circle 7 Guest Ranch Hot Flies', 'sbm-textdomain' )?></label></strong>
                <p>To create a link: <?php echo esc_html('<a href="www.hotflylink.com" title="A link to a hot fly" target="_blank">The name and size of the hot fly. ex: #16 Hot Fly</a>'); ?></p>

                <textarea style="width: 100%;" name="circle7-hot-flies" id="circle7-hot-flies"><?php if ( isset ( $sbm_stored_meta['circle7-hot-flies'] ) ) echo $sbm_stored_meta['circle7-hot-flies'][0]; ?></textarea>

              </div>

              <p><!-- Circle 7 Guest Ranch Rating -->
                <span class="sbm-row-title"><?php _e( '<strong>How is the fishing?</strong> ', 'sbm-textdomain' )?></span>
              <div class="sbm-row-content">

                <label for="circle7-closed-message">
                  <?php _e( 'Closed Message&nbsp;', 'sbm-textdomain' )?>
                  <input type="text" style="width: 50%;" name="circle7-closed-message" id="circle7-closed-message" value="<?php if ( isset ( $sbm_stored_meta['circle7-closed-message'] ) ) echo $sbm_stored_meta['circle7-closed-message'][0]; ?>" />
                </label>

              </div>

              <div class="sbm-row-content">

                <label for="circle7-closed-checkbox">
                  <input type="checkbox" name="circle7-closed-checkbox" id="circle7-closed-checkbox" value="-danger" <?php if ( isset ( $sbm_stored_meta['circle7-closed-checkbox'] ) ) checked( $sbm_stored_meta['circle7-closed-checkbox'][0], '-danger' ); ?> />
                  <?php _e( 'Closed&nbsp;', 'sbm-textdomain' )?>
                </label>

                <label for="circle7-checkbox-poor">
                  <input type="checkbox" name="circle7-checkbox-poor" id="circle7-checkbox-poor" value="-danger" <?php if ( isset ( $sbm_stored_meta['circle7-checkbox-poor'] ) ) checked( $sbm_stored_meta['circle7-checkbox-poor'][0], '-danger' ); ?> />
                  <?php _e( 'Poor&nbsp;', 'sbm-textdomain' )?>
                </label>

                <label for="circle7-checkbox-fair">
                  <input type="checkbox" name="circle7-checkbox-fair" id="circle7-checkbox-fair" value="-danger" <?php if ( isset ( $sbm_stored_meta['circle7-checkbox-fair'] ) ) checked( $sbm_stored_meta['circle7-checkbox-fair'][0], '-danger' ); ?> />
                  <?php _e( 'Fair&nbsp;', 'sbm-textdomain' )?>
                </label>

                <label for="circle7-checkbox-fairgood">
                  <input type="checkbox" name="circle7-checkbox-fairgood" id="circle7-checkbox-fairgood" value="-danger" <?php if ( isset ( $sbm_stored_meta['circle7-checkbox-fairgood'] ) ) checked( $sbm_stored_meta['circle7-checkbox-fairgood'][0], '-danger' ); ?> />
                  <?php _e( 'Fair to Good&nbsp;', 'sbm-textdomain' )?>
                </label>

                <label for="circle7-checkbox-good">
                  <input type="checkbox" name="circle7-checkbox-good" id="circle7-checkbox-good" value="-danger" <?php if ( isset ( $sbm_stored_meta['circle7-checkbox-good'] ) ) checked( $sbm_stored_meta['circle7-checkbox-good'][0], '-danger' ); ?> />
                  <?php _e( 'Good&nbsp;', 'sbm-textdomain' )?>
                </label>

                <label for="circle7-checkbox-great">
                  <input type="checkbox" name="circle7-checkbox-great" id="circle7-checkbox-great" value="-danger" <?php if ( isset ( $sbm_stored_meta['circle7-checkbox-great'] ) ) checked( $sbm_stored_meta['circle7-checkbox-great'][0], '-danger' ); ?> />
                  <?php _e( 'Great', 'sbm-textdomain' )?>
                </label>

              </div>
            </div> <!-- /.tab-pane bollibokka -->

            <!-- ====== CLEAR CREEK RANCH ====== -->

            <div role="tabpanel" class="tab-pane fade" id="clearcreek">

              <h3><?php echo ' Clear Creek Ranch '  ?></h3>

              <p><!-- Clear Creek Ranch Updated -->

                <strong><label for="clearcreek-updated" class="sbm-row-title"><?php _e( 'Clear Creek Ranch Updated', 'sbm-textdomain' )?></label></strong>

                <input style="width: 100%;" type="text" name="clearcreek-updated" id="clearcreek-updated" value="<?php if ( isset ( $sbm_stored_meta['clearcreek-updated'] ) ) echo $sbm_stored_meta['clearcreek-updated'][0]; ?>" />

              </p>

              <p><!-- Clear Creek Ranch Report -->

                <strong><label for="clearcreek-report" class="sbm-row-title"><?php _e( 'Clear Creek Ranch Report', 'sbm-textdomain' )?></label></strong>

                <textarea style="width: 100%;" rows="4" name="clearcreek-report" id="clearcreek-report"><?php if ( isset ( $sbm_stored_meta['clearcreek-report'] ) ) echo $sbm_stored_meta['clearcreek-report'][0]; ?></textarea>
              </p>

              <div class="mt-1618 mb-1618"><!-- Clear Creek Ranch Hot Flies -->

                <strong><label for="clearcreek-hot-flies" class="sbm-row-title"><?php _e( 'Clear Creek Ranch Hot Flies', 'sbm-textdomain' )?></label></strong>
                <p>To create a link: <?php echo esc_html('<a href="www.hotflylink.com" title="A link to a hot fly" target="_blank">The name and size of the hot fly. ex: #16 Hot Fly</a>'); ?></p>

                <textarea style="width: 100%;" name="clearcreek-hot-flies" id="clearcreek-hot-flies"><?php if ( isset ( $sbm_stored_meta['clearcreek-hot-flies'] ) ) echo $sbm_stored_meta['clearcreek-hot-flies'][0]; ?></textarea>

              </div>

              <p><!-- Clear Creek Ranch Rating -->
                <span class="sbm-row-title"><?php _e( '<strong>How is the fishing?</strong> ', 'sbm-textdomain' )?></span>
              <div class="sbm-row-content">

                <label for="clearcreek-closed-message">
                  <?php _e( 'Closed Message&nbsp;', 'sbm-textdomain' )?>
                  <input type="text" style="width: 50%;" name="clearcreek-closed-message" id="clearcreek-closed-message" value="<?php if ( isset ( $sbm_stored_meta['clearcreek-closed-message'] ) ) echo $sbm_stored_meta['clearcreek-closed-message'][0]; ?>" />
                </label>

              </div>
              <div class="sbm-row-content">

                <label for="clearcreek-closed-checkbox">
                  <input type="checkbox" name="clearcreek-closed-checkbox" id="clearcreek-closed-checkbox" value="-danger" <?php if ( isset ( $sbm_stored_meta['clearcreek-closed-checkbox'] ) ) checked( $sbm_stored_meta['clearcreek-closed-checkbox'][0], '-danger' ); ?> />
                  <?php _e( 'Closed&nbsp;', 'sbm-textdomain' )?>
                </label>

                <label for="clearcreek-checkbox-poor">
                  <input type="checkbox" name="clearcreek-checkbox-poor" id="clearcreek-checkbox-poor" value="-danger" <?php if ( isset ( $sbm_stored_meta['clearcreek-checkbox-poor'] ) ) checked( $sbm_stored_meta['clearcreek-checkbox-poor'][0], '-danger' ); ?> />
                  <?php _e( 'Poor&nbsp;', 'sbm-textdomain' )?>
                </label>

                <label for="clearcreek-checkbox-fair">
                  <input type="checkbox" name="clearcreek-checkbox-fair" id="clearcreek-checkbox-fair" value="-danger" <?php if ( isset ( $sbm_stored_meta['clearcreek-checkbox-fair'] ) ) checked( $sbm_stored_meta['clearcreek-checkbox-fair'][0], '-danger' ); ?> />
                  <?php _e( 'Fair&nbsp;', 'sbm-textdomain' )?>
                </label>

                <label for="clearcreek-checkbox-fairgood">
                  <input type="checkbox" name="clearcreek-checkbox-fairgood" id="clearcreek-checkbox-fairgood" value="-danger" <?php if ( isset ( $sbm_stored_meta['clearcreek-checkbox-fairgood'] ) ) checked( $sbm_stored_meta['clearcreek-checkbox-fairgood'][0], '-danger' ); ?> />
                  <?php _e( 'Fair to Good&nbsp;', 'sbm-textdomain' )?>
                </label>

                <label for="clearcreek-checkbox-good">
                  <input type="checkbox" name="clearcreek-checkbox-good" id="clearcreek-checkbox-good" value="-danger" <?php if ( isset ( $sbm_stored_meta['clearcreek-checkbox-good'] ) ) checked( $sbm_stored_meta['clearcreek-checkbox-good'][0], '-danger' ); ?> />
                  <?php _e( 'Good&nbsp;', 'sbm-textdomain' )?>
                </label>

                <label for="clearcreek-checkbox-great">
                  <input type="checkbox" name="clearcreek-checkbox-great" id="clearcreek-checkbox-great" value="-danger" <?php if ( isset ( $sbm_stored_meta['clearcreek-checkbox-great'] ) ) checked( $sbm_stored_meta['clearcreek-checkbox-great'][0], '-danger' ); ?> />
                  <?php _e( 'Great', 'sbm-textdomain' )?>
                </label>

              </div>
            </div> <!-- /.tab-pane clear creek -->

            <!-- ====== GOLD RIVER ====== -->

            <div role="tabpanel" class="tab-pane fade" id="goldriver">

              <h3><?php echo ' Gold River Lodge '  ?></h3>

              <p><!-- Gold River Lodge Updated -->

                <strong><label for="goldriver-updated" class="sbm-row-title"><?php _e( 'Gold River Lodge Updated', 'sbm-textdomain' )?></label></strong>

                <input style="width: 100%;" type="text" name="goldriver-updated" id="goldriver-updated" value="<?php if ( isset ( $sbm_stored_meta['goldriver-updated'] ) ) echo $sbm_stored_meta['goldriver-updated'][0]; ?>" />

              </p>

              <p><!-- Gold River Lodge Report -->

                <strong><label for="goldriver-report" class="sbm-row-title"><?php _e( 'Gold River Lodge Report', 'sbm-textdomain' )?></label></strong>

                <textarea style="width: 100%;" rows="4" name="goldriver-report" id="goldriver-report"><?php if ( isset ( $sbm_stored_meta['goldriver-report'] ) ) echo $sbm_stored_meta['goldriver-report'][0]; ?></textarea>
              </p>

              <div class="mt-1618 mb-1618"><!-- Gold River Lodge Hot Flies -->

                <strong><label for="goldriver-hot-flies" class="sbm-row-title"><?php _e( 'Gold River Lodge Hot Flies', 'sbm-textdomain' )?></label></strong>
                <p>To create a link: <?php echo esc_html('<a href="www.hotflylink.com" title="A link to a hot fly" target="_blank">The name and size of the hot fly. ex: #16 Hot Fly</a>'); ?></p>

                <textarea style="width: 100%;" name="goldriver-hot-flies" id="goldriver-hot-flies"><?php if ( isset ( $sbm_stored_meta['goldriver-hot-flies'] ) ) echo $sbm_stored_meta['goldriver-hot-flies'][0]; ?></textarea>

              </div>

              <p><!-- Gold River Lodge Rating -->
                <span class="sbm-row-title"><?php _e( '<strong>How is the fishing?</strong> ', 'sbm-textdomain' )?></span>
              <div class="sbm-row-content">

                <label for="goldriver-closed-message">
                  <?php _e( 'Closed Message&nbsp;', 'sbm-textdomain' )?>
                  <input type="text" style="width: 50%;" name="goldriver-closed-message" id="goldriver-closed-message" value="<?php if ( isset ( $sbm_stored_meta['goldriver-closed-message'] ) ) echo $sbm_stored_meta['goldriver-closed-message'][0]; ?>" />
                </label>

              </div>
              <div class="sbm-row-content">

                <label for="goldriver-closed-checkbox">
                  <input type="checkbox" name="goldriver-closed-checkbox" id="goldriver-closed-checkbox" value="-danger" <?php if ( isset ( $sbm_stored_meta['goldriver-closed-checkbox'] ) ) checked( $sbm_stored_meta['goldriver-closed-checkbox'][0], '-danger' ); ?> />
                  <?php _e( 'Closed For The Season&nbsp;', 'sbm-textdomain' )?>
                </label>

                <label for="goldriver-checkbox-poor">
                  <input type="checkbox" name="goldriver-checkbox-poor" id="goldriver-checkbox-poor" value="-danger" <?php if ( isset ( $sbm_stored_meta['goldriver-checkbox-poor'] ) ) checked( $sbm_stored_meta['goldriver-checkbox-poor'][0], '-danger' ); ?> />
                  <?php _e( 'Poor&nbsp;', 'sbm-textdomain' )?>
                </label>

                <label for="goldriver-checkbox-fair">
                  <input type="checkbox" name="goldriver-checkbox-fair" id="goldriver-checkbox-fair" value="-danger" <?php if ( isset ( $sbm_stored_meta['goldriver-checkbox-fair'] ) ) checked( $sbm_stored_meta['goldriver-checkbox-fair'][0], '-danger' ); ?> />
                  <?php _e( 'Fair&nbsp;', 'sbm-textdomain' )?>
                </label>

                <label for="goldriver-checkbox-fairgood">
                  <input type="checkbox" name="goldriver-checkbox-fairgood" id="goldriver-checkbox-fairgood" value="-danger" <?php if ( isset ( $sbm_stored_meta['goldriver-checkbox-fairgood'] ) ) checked( $sbm_stored_meta['goldriver-checkbox-fairgood'][0], '-danger' ); ?> />
                  <?php _e( 'Fair to Good&nbsp;', 'sbm-textdomain' )?>
                </label>

                <label for="goldriver-checkbox-good">
                  <input type="checkbox" name="goldriver-checkbox-good" id="goldriver-checkbox-good" value="-danger" <?php if ( isset ( $sbm_stored_meta['goldriver-checkbox-good'] ) ) checked( $sbm_stored_meta['goldriver-checkbox-good'][0], '-danger' ); ?> />
                  <?php _e( 'Good&nbsp;', 'sbm-textdomain' )?>
                </label>

                <label for="goldriver-checkbox-great">
                  <input type="checkbox" name="goldriver-checkbox-great" id="goldriver-checkbox-great" value="-danger" <?php if ( isset ( $sbm_stored_meta['goldriver-checkbox-great'] ) ) checked( $sbm_stored_meta['goldriver-checkbox-great'][0], '-danger' ); ?> />
                  <?php _e( 'Great', 'sbm-textdomain' )?>
                </label>

              </div>
            </div> <!-- /.tab-pane gold river -->

            <!-- ====== HAT CREEK RANCH ====== -->

            <div role="tabpanel" class="tab-pane fade" id="hatcreekranch">

              <h3><?php echo ' Hat Creek Ranch '  ?></h3>

              <p><!-- Hat Creek Ranch Updated -->

                <strong><label for="hatcreekranch-updated" class="sbm-row-title"><?php _e( 'Hat Creek Ranch Updated', 'sbm-textdomain' )?></label></strong>

                <input style="width: 100%;" type="text" name="hatcreekranch-updated" id="hatcreekranch-updated" value="<?php if ( isset ( $sbm_stored_meta['hatcreekranch-updated'] ) ) echo $sbm_stored_meta['hatcreekranch-updated'][0]; ?>" />

              </p>

              <p><!-- Hat Creek Ranch Report -->

                <strong><label for="hatcreekranch-report" class="sbm-row-title"><?php _e( 'Hat Creek Ranch Report', 'sbm-textdomain' )?></label></strong>

                <textarea style="width: 100%;" rows="4" name="hatcreekranch-report" id="hatcreekranch-report"><?php if ( isset ( $sbm_stored_meta['hatcreekranch-report'] ) ) echo $sbm_stored_meta['hatcreekranch-report'][0]; ?></textarea>
              </p>

              <div class="mt-1618 mb-1618"><!-- Hat Creek Ranch Hot Flies -->

                <strong><label for="hatcreekranch-hot-flies" class="sbm-row-title"><?php _e( 'Hat Creek Ranch Hot Flies', 'sbm-textdomain' )?></label></strong>
                <p>To create a link: <?php echo esc_html('<a href="www.hotflylink.com" title="A link to a hot fly" target="_blank">The name and size of the hot fly. ex: #16 Hot Fly</a>'); ?></p>

                <textarea style="width: 100%;" name="hatcreekranch-hot-flies" id="hatcreekranch-hot-flies"><?php if ( isset ( $sbm_stored_meta['hatcreekranch-hot-flies'] ) ) echo $sbm_stored_meta['hatcreekranch-hot-flies'][0]; ?></textarea>

              </div>

              <p><!-- Hat Creek Ranch Rating -->
                <span class="sbm-row-title"><?php _e( '<strong>How is the fishing?</strong> ', 'sbm-textdomain' )?></span>
              <div class="sbm-row-content">

                <label for="hatcreekranch-closed-message">
                  <?php _e( 'Closed Message&nbsp;', 'sbm-textdomain' )?>
                  <input type="text" style="width: 50%;" name="hatcreekranch-closed-message" id="hatcreekranch-closed-message" value="<?php if ( isset ( $sbm_stored_meta['hatcreekranch-closed-message'] ) ) echo $sbm_stored_meta['hatcreekranch-closed-message'][0]; ?>" />
                </label>

              </div>

              <div class="sbm-row-content">


                <label for="hatcreekranch-closed-checkbox">
                  <input type="checkbox" name="hatcreekranch-closed-checkbox" id="hatcreekranch-closed-checkbox" value="-danger" <?php if ( isset ( $sbm_stored_meta['hatcreekranch-closed-checkbox'] ) ) checked( $sbm_stored_meta['hatcreekranch-closed-checkbox'][0], '-danger' ); ?> />
                  <?php _e( 'Closed&nbsp;', 'sbm-textdomain' )?>
                </label>

                <label for="hatcreekranch-checkbox-poor">
                  <input type="checkbox" name="hatcreekranch-checkbox-poor" id="hatcreekranch-checkbox-poor" value="-danger" <?php if ( isset ( $sbm_stored_meta['hatcreekranch-checkbox-poor'] ) ) checked( $sbm_stored_meta['hatcreekranch-checkbox-poor'][0], '-danger' ); ?> />
                  <?php _e( 'Poor&nbsp;', 'sbm-textdomain' )?>
                </label>

                <label for="hatcreekranch-checkbox-fair">
                  <input type="checkbox" name="hatcreekranch-checkbox-fair" id="hatcreekranch-checkbox-fair" value="-danger" <?php if ( isset ( $sbm_stored_meta['hatcreekranch-checkbox-fair'] ) ) checked( $sbm_stored_meta['hatcreekranch-checkbox-fair'][0], '-danger' ); ?> />
                  <?php _e( 'Fair&nbsp;', 'sbm-textdomain' )?>
                </label>

                <label for="hatcreekranch-checkbox-fairgood">
                  <input type="checkbox" name="hatcreekranch-checkbox-fairgood" id="hatcreekranch-checkbox-fairgood" value="-danger" <?php if ( isset ( $sbm_stored_meta['hatcreekranch-checkbox-fairgood'] ) ) checked( $sbm_stored_meta['hatcreekranch-checkbox-fairgood'][0], '-danger' ); ?> />
                  <?php _e( 'Fair to Good&nbsp;', 'sbm-textdomain' )?>
                </label>

                <label for="hatcreekranch-checkbox-good">
                  <input type="checkbox" name="hatcreekranch-checkbox-good" id="hatcreekranch-checkbox-good" value="-danger" <?php if ( isset ( $sbm_stored_meta['hatcreekranch-checkbox-good'] ) ) checked( $sbm_stored_meta['hatcreekranch-checkbox-good'][0], '-danger' ); ?> />
                  <?php _e( 'Good&nbsp;', 'sbm-textdomain' )?>
                </label>

                <label for="hatcreekranch-checkbox-great">
                  <input type="checkbox" name="hatcreekranch-checkbox-great" id="hatcreekranch-checkbox-great" value="-danger" <?php if ( isset ( $sbm_stored_meta['hatcreekranch-checkbox-great'] ) ) checked( $sbm_stored_meta['hatcreekranch-checkbox-great'][0], '-danger' ); ?> />
                  <?php _e( 'Great', 'sbm-textdomain' )?>
                </label>

              </div>
            </div> <!-- /.tab-pane hat creek ranch -->

            <!-- ====== LUK LAKE ====== -->

            <div role="tabpanel" class="tab-pane fade" id="luklake">

              <h3><?php echo ' Luk Lake ' ?></h3>

              <p><!-- Luk Lake Updated -->

                <strong><label for="luklake-updated" class="sbm-row-title"><?php _e( 'Luk Lake Updated', 'sbm-textdomain' )?></label></strong>

                <input style="width: 100%;" type="text" name="luklake-updated" id="luklake-updated" value="<?php if ( isset ( $sbm_stored_meta['luklake-updated'] ) ) echo $sbm_stored_meta['luklake-updated'][0]; ?>" />

              </p>

              <p><!-- Luk Lake Report -->

                <strong><label for="luklake-report" class="sbm-row-title"><?php _e( 'Luk Lake Report', 'sbm-textdomain' )?></label></strong>

                <textarea style="width: 100%;" rows="4" name="luklake-report" id="luklake-report"><?php if ( isset ( $sbm_stored_meta['luklake-report'] ) ) echo $sbm_stored_meta['luklake-report'][0]; ?></textarea>
              </p>

              <div class="mt-1618 mb-1618"><!-- Luk Lake Hot Flies -->

                <strong><label for="luklake-hot-flies" class="sbm-row-title"><?php _e( 'Luk Lake Hot Flies', 'sbm-textdomain' )?></label></strong>
                <p>To create a link: <?php echo esc_html('<a href="www.hotflylink.com" title="A link to a hot fly" target="_blank">The name and size of the hot fly. ex: #16 Hot Fly</a>'); ?></p>

                <textarea style="width: 100%;" name="luklake-hot-flies" id="luklake-hot-flies"><?php if ( isset ( $sbm_stored_meta['luklake-hot-flies'] ) ) echo $sbm_stored_meta['luklake-hot-flies'][0]; ?></textarea>

              </div>

              <p><!-- Luk Lake Rating -->
                <span class="sbm-row-title"><?php _e( '<strong>How is the fishing?</strong> ', 'sbm-textdomain' )?></span>
              <div class="sbm-row-content">

                <label for="luklake-closed-message">
                  <?php _e( 'Closed Message&nbsp;', 'sbm-textdomain' )?>
                  <input type="text" style="width: 50%;" name="luklake-closed-message" id="luklake-closed-message" value="<?php if ( isset ( $sbm_stored_meta['luklake-closed-message'] ) ) echo $sbm_stored_meta['luklake-closed-message'][0]; ?>" />
                </label>

              </div>
              <div class="sbm-row-content">

                <label for="luklake-closed-checkbox">
                  <input type="checkbox" name="luklake-closed-checkbox" id="luklake-closed-checkbox" value="-danger" <?php if ( isset ( $sbm_stored_meta['luklake-closed-checkbox'] ) ) checked( $sbm_stored_meta['luklake-closed-checkbox'][0], '-danger' ); ?> />
                  <?php _e( 'Closed&nbsp;', 'sbm-textdomain' )?>
                </label>

                <label for="luklake-checkbox-poor">
                  <input type="checkbox" name="luklake-checkbox-poor" id="luklake-checkbox-poor" value="-danger" <?php if ( isset ( $sbm_stored_meta['luklake-checkbox-poor'] ) ) checked( $sbm_stored_meta['luklake-checkbox-poor'][0], '-danger' ); ?> />
                  <?php _e( 'Poor&nbsp;', 'sbm-textdomain' )?>
                </label>

                <label for="luklake-checkbox-fair">
                  <input type="checkbox" name="luklake-checkbox-fair" id="luklake-checkbox-fair" value="-danger" <?php if ( isset ( $sbm_stored_meta['luklake-checkbox-fair'] ) ) checked( $sbm_stored_meta['luklake-checkbox-fair'][0], '-danger' ); ?> />
                  <?php _e( 'Fair&nbsp;', 'sbm-textdomain' )?>
                </label>

                <label for="luklake-checkbox-fairgood">
                  <input type="checkbox" name="luklake-checkbox-fairgood" id="luklake-checkbox-fairgood" value="-danger" <?php if ( isset ( $sbm_stored_meta['luklake-checkbox-fairgood'] ) ) checked( $sbm_stored_meta['luklake-checkbox-fairgood'][0], '-danger' ); ?> />
                  <?php _e( 'Fair to Good&nbsp;', 'sbm-textdomain' )?>
                </label>

                <label for="luklake-checkbox-good">
                  <input type="checkbox" name="luklake-checkbox-good" id="luklake-checkbox-good" value="-danger" <?php if ( isset ( $sbm_stored_meta['luklake-checkbox-good'] ) ) checked( $sbm_stored_meta['luklake-checkbox-good'][0], '-danger' ); ?> />
                  <?php _e( 'Good&nbsp;', 'sbm-textdomain' )?>
                </label>

                <label for="luklake-checkbox-great">
                  <input type="checkbox" name="luklake-checkbox-great" id="luklake-checkbox-great" value="-danger" <?php if ( isset ( $sbm_stored_meta['luklake-checkbox-great'] ) ) checked( $sbm_stored_meta['luklake-checkbox-great'][0], '-danger' ); ?> />
                  <?php _e( 'Great', 'sbm-textdomain' )?>
                </label>

              </div>
            </div> <!-- /.tab-pane luk lake -->

            <!-- ====== OASIS SPRINGS ====== -->

            <div role="tabpanel" class="tab-pane fade" id="oasissprings">
              <h3><?php echo ' Oasis Springs ' ?></h3>

              <p><!-- Oasis Springs Updated -->

                <strong><label for="oasissprings-updated" class="sbm-row-title"><?php _e( 'Oasis Springs Updated', 'sbm-textdomain' )?></label></strong>

                <input style="width: 100%;" type="text" name="oasissprings-updated" id="oasissprings-updated" value="<?php if ( isset ( $sbm_stored_meta['oasissprings-updated'] ) ) echo $sbm_stored_meta['oasissprings-updated'][0]; ?>" />

              </p>

              <p><!-- Oasis Springs Report -->

                <strong><label for="oasissprings-report" class="sbm-row-title"><?php _e( 'Oasis Springs Report', 'sbm-textdomain' )?></label></strong>

                <textarea style="width: 100%;" rows="4" name="oasissprings-report" id="oasissprings-report"><?php if ( isset ( $sbm_stored_meta['oasissprings-report'] ) ) echo $sbm_stored_meta['oasissprings-report'][0]; ?></textarea>
              </p>

              <div class="mt-1618 mb-1618"><!-- Oasis Springs Hot Flies -->

                <strong><label for="oasissprings-hot-flies" class="sbm-row-title"><?php _e( 'Oasis Springs Hot Flies', 'sbm-textdomain' )?></label></strong>
                <p>To create a link: <?php echo esc_html('<a href="www.hotflylink.com" title="A link to a hot fly" target="_blank">The name and size of the hot fly. ex: #16 Hot Fly</a>'); ?></p>

                <textarea style="width: 100%;" name="oasissprings-hot-flies" id="oasissprings-hot-flies"><?php if ( isset ( $sbm_stored_meta['oasissprings-hot-flies'] ) ) echo $sbm_stored_meta['oasissprings-hot-flies'][0]; ?></textarea>

              </div>

              <p><!-- Oasis Springs Rating -->
                <span class="sbm-row-title"><?php _e( '<strong>How is the fishing?</strong> ', 'sbm-textdomain' )?></span>
              <div class="sbm-row-content">

                <label for="oasissprings-closed-message">
                  <?php _e( 'Closed Message&nbsp;', 'sbm-textdomain' )?>
                  <input type="text" style="width: 50%;" name="oasissprings-closed-message" id="oasissprings-closed-message" value="<?php if ( isset ( $sbm_stored_meta['oasissprings-closed-message'] ) ) echo $sbm_stored_meta['oasissprings-closed-message'][0]; ?>" />
                </label>

              </div>

              <div class="sbm-row-content">

                <label for="oasissprings-closed-checkbox">
                  <input type="checkbox" name="oasissprings-closed-checkbox" id="oasissprings-closed-checkbox" value="-danger" <?php if ( isset ( $sbm_stored_meta['oasissprings-closed-checkbox'] ) ) checked( $sbm_stored_meta['oasissprings-closed-checkbox'][0], '-danger' ); ?> />
                  <?php _e( 'Closed&nbsp;', 'sbm-textdomain' )?>
                </label>

                <label for="oasissprings-checkbox-poor">
                  <input type="checkbox" name="oasissprings-checkbox-poor" id="oasissprings-checkbox-poor" value="-danger" <?php if ( isset ( $sbm_stored_meta['oasissprings-checkbox-poor'] ) ) checked( $sbm_stored_meta['oasissprings-checkbox-poor'][0], '-danger' ); ?> />
                  <?php _e( 'Poor&nbsp;', 'sbm-textdomain' )?>
                </label>

                <label for="oasissprings-checkbox-fair">
                  <input type="checkbox" name="oasissprings-checkbox-fair" id="oasissprings-checkbox-fair" value="-danger" <?php if ( isset ( $sbm_stored_meta['oasissprings-checkbox-fair'] ) ) checked( $sbm_stored_meta['oasissprings-checkbox-fair'][0], '-danger' ); ?> />
                  <?php _e( 'Fair&nbsp;', 'sbm-textdomain' )?>
                </label>

                <label for="oasissprings-checkbox-fairgood">
                  <input type="checkbox" name="oasissprings-checkbox-fairgood" id="oasissprings-checkbox-fairgood" value="-danger" <?php if ( isset ( $sbm_stored_meta['oasissprings-checkbox-fairgood'] ) ) checked( $sbm_stored_meta['oasissprings-checkbox-fairgood'][0], '-danger' ); ?> />
                  <?php _e( 'Fair to Good&nbsp;', 'sbm-textdomain' )?>
                </label>

                <label for="oasissprings-checkbox-good">
                  <input type="checkbox" name="oasissprings-checkbox-good" id="oasissprings-checkbox-good" value="-danger" <?php if ( isset ( $sbm_stored_meta['oasissprings-checkbox-good'] ) ) checked( $sbm_stored_meta['oasissprings-checkbox-good'][0], '-danger' ); ?> />
                  <?php _e( 'Good&nbsp;', 'sbm-textdomain' )?>
                </label>

                <label for="oasissprings-checkbox-great">
                  <input type="checkbox" name="oasissprings-checkbox-great" id="oasissprings-checkbox-great" value="-danger" <?php if ( isset ( $sbm_stored_meta['oasissprings-checkbox-great'] ) ) checked( $sbm_stored_meta['oasissprings-checkbox-great'][0], '-danger' ); ?> />
                  <?php _e( 'Great', 'sbm-textdomain' )?>
                </label>

              </div>
            </div> <!-- /.tab-pane oasis springs -->

            <!-- ====== PEDROTTI PONDS ====== -->

             <!-- /.tab-pane pedrotti ponds -->

            <!-- ====== ROCK CREEK LAKE ====== -->

            <div role="tabpanel" class="tab-pane fade" id="rockcreek">

              <h3><?php echo ' Rock Creek Lake ' ?></h3>

              <p><!-- Rock Creek Lake Updated -->

                <strong><label for="rockcreek-updated" class="sbm-row-title"><?php _e( 'Rock Creek Lake Updated', 'sbm-textdomain' )?></label></strong>

                <input style="width: 100%;" type="text" name="rockcreek-updated" id="rockcreek-updated" value="<?php if ( isset ( $sbm_stored_meta['rockcreek-updated'] ) ) echo $sbm_stored_meta['rockcreek-updated'][0]; ?>" />

              </p>

              <p><!-- Rock Creek Lake Report -->

                <strong><label for="rockcreek-report" class="sbm-row-title"><?php _e( 'Rock Creek Lake Report', 'sbm-textdomain' )?></label></strong>

                <textarea style="width: 100%;" rows="4" name="rockcreek-report" id="rockcreek-report"><?php if ( isset ( $sbm_stored_meta['rockcreek-report'] ) ) echo $sbm_stored_meta['rockcreek-report'][0]; ?></textarea>
              </p>

              <div class="mt-1618 mb-1618"><!-- Rock Creek Lake Hot Flies -->

                <strong><label for="rockcreek-hot-flies" class="sbm-row-title"><?php _e( 'Rock Creek Lake Hot Flies', 'sbm-textdomain' )?></label></strong>
                <p>To create a link: <?php echo esc_html('<a href="www.hotflylink.com" title="A link to a hot fly" target="_blank">The name and size of the hot fly. ex: #16 Hot Fly</a>'); ?></p>

                <textarea style="width: 100%;" name="rockcreek-hot-flies" id="rockcreek-hot-flies"><?php if ( isset ( $sbm_stored_meta['rockcreek-hot-flies'] ) ) echo $sbm_stored_meta['rockcreek-hot-flies'][0]; ?></textarea>

              </div>

              <p><!-- Rock Creek Lake Rating -->
                <span class="sbm-row-title"><?php _e( '<strong>How is the fishing?</strong> ', 'sbm-textdomain' )?></span>
              <div class="sbm-row-content">

                <label for="rockcreek-closed-message">
                  <?php _e( 'Closed Message&nbsp;', 'sbm-textdomain' )?>
                  <input type="text" style="width: 50%;" name="rockcreek-closed-message" id="rockcreek-closed-message" value="<?php if ( isset ( $sbm_stored_meta['rockcreek-closed-message'] ) ) echo $sbm_stored_meta['rockcreek-closed-message'][0]; ?>" />
                </label>

              </div>
              <div class="sbm-row-content">

                <label for="rockcreek-closed-checkbox">
                  <input type="checkbox" name="rockcreek-closed-checkbox" id="rockcreek-closed-checkbox" value="-danger" <?php if ( isset ( $sbm_stored_meta['rockcreek-closed-checkbox'] ) ) checked( $sbm_stored_meta['rockcreek-closed-checkbox'][0], '-danger' ); ?> />
                  <?php _e( 'Closed&nbsp;', 'sbm-textdomain' )?>
                </label>

                <label for="rockcreek-checkbox-poor">
                  <input type="checkbox" name="rockcreek-checkbox-poor" id="rockcreek-checkbox-poor" value="-danger" <?php if ( isset ( $sbm_stored_meta['rockcreek-checkbox-poor'] ) ) checked( $sbm_stored_meta['rockcreek-checkbox-poor'][0], '-danger' ); ?> />
                  <?php _e( 'Poor&nbsp;', 'sbm-textdomain' )?>
                </label>

                <label for="rockcreek-checkbox-fair">
                  <input type="checkbox" name="rockcreek-checkbox-fair" id="rockcreek-checkbox-fair" value="-danger" <?php if ( isset ( $sbm_stored_meta['rockcreek-checkbox-fair'] ) ) checked( $sbm_stored_meta['rockcreek-checkbox-fair'][0], '-danger' ); ?> />
                  <?php _e( 'Fair&nbsp;', 'sbm-textdomain' )?>
                </label>

                <label for="rockcreek-checkbox-fairgood">
                  <input type="checkbox" name="rockcreek-checkbox-fairgood" id="rockcreek-checkbox-fairgood" value="-danger" <?php if ( isset ( $sbm_stored_meta['rockcreek-checkbox-fairgood'] ) ) checked( $sbm_stored_meta['rockcreek-checkbox-fairgood'][0], '-danger' ); ?> />
                  <?php _e( 'Fair to Good&nbsp;', 'sbm-textdomain' )?>
                </label>

                <label for="rockcreek-checkbox-good">
                  <input type="checkbox" name="rockcreek-checkbox-good" id="rockcreek-checkbox-good" value="-danger" <?php if ( isset ( $sbm_stored_meta['rockcreek-checkbox-good'] ) ) checked( $sbm_stored_meta['rockcreek-checkbox-good'][0], '-danger' ); ?> />
                  <?php _e( 'Good&nbsp;', 'sbm-textdomain' )?>
                </label>

                <label for="rockcreek-checkbox-great">
                  <input type="checkbox" name="rockcreek-checkbox-great" id="rockcreek-checkbox-great" value="-danger" <?php if ( isset ( $sbm_stored_meta['rockcreek-checkbox-great'] ) ) checked( $sbm_stored_meta['rockcreek-checkbox-great'][0], '-danger' ); ?> />
                  <?php _e( 'Great', 'sbm-textdomain' )?>
                </label>

              </div>
            </div> <!-- /.tab-pane rock creek -->

            <!-- ====== SPINNER FALL LODGE ====== -->

            <!-- <div role="tabpanel" class="tab-pane fade" id="spinnerfall">

    <h3><?php //echo ' Spinner Fall Lodge ' ?></h3>

    <p><!-- Spinner Fall Lodge Updated -->

            <!--  <strong><label for="spinnerfalllodge-updated" class="sbm-row-title"><?php // _e( 'Spinner Fall Lodge Updated', 'sbm-textdomain' )?></label></strong>

      <input style="width: 100%;" type="text" name="spinnerfalllodge-updated" id="spinnerfalllodge-updated" value="<?php// if ( isset ( $sbm_stored_meta['spinnerfalllodge-updated'] ) ) echo $sbm_stored_meta['spinnerfalllodge-updated'][0]; ?>" />

    </p>

    <p><!-- Spinner Fall Lodge Report -->

            <!--  <strong><label for="spinnerfalllodge-report" class="sbm-row-title"><?php // _e( 'Spinner Fall Lodge Report', 'sbm-textdomain' )?></label></strong>

    <textarea style="width: 100%;" rows="4" name="spinnerfalllodge-report" id="spinnerfalllodge-report"><?php// if ( isset ( $sbm_stored_meta['spinnerfalllodge-report'] ) ) echo $sbm_stored_meta['spinnerfalllodge-report'][0]; ?></textarea>
    </p>

    <div class="mt-1618 mb-1618"><!-- Spinner Fall Lodge Hot Flies -->

            <!--<strong><label for="spinnerfalllodge-hot-flies" class="sbm-row-title"><?php //_e( 'Spinner Fall Lodge Hot Flies', 'sbm-textdomain' )?></label></strong>
      <p>To create a link: <?php //echo esc_html('<a href="www.hotflylink.com" title="A link to a hot fly" target="_blank">The name and size of the hot fly. ex: #16 Hot Fly</a>'); ?></p>

      <textarea style="width: 100%;" name="spinnerfalllodge-hot-flies" id="spinnerfalllodge-hot-flies"><?php // if ( isset ( $sbm_stored_meta['spinnerfalllodge-hot-flies'] ) ) echo $sbm_stored_meta['spinnerfalllodge-hot-flies'][0]; ?></textarea>

    </div>

    <p><!-- Spinner Fall Lodge Rating -->
            <!--		<span class="sbm-row-title"><?php _e( '<strong>How is the fishing?</strong> ', 'sbm-textdomain' )?></span>
      <div class="sbm-row-content">

          <label for="spinnerfalllodge-closed-message">
              <?php  //_e( 'Closed Message&nbsp;', 'sbm-textdomain' )?>
							<input type="text" style="width: 50%;" name="spinnerfalllodge-closed-message" id="spinnerfalllodge-closed-message" value="<?php // if ( isset ( $sbm_stored_meta['spinnerfalllodge-closed-message'] ) ) echo $sbm_stored_meta['spinnerfalllodge-closed-message'][0]; ?>" />
					</label>

      </div>
			<div class="sbm-row-content">

          <label for="spinnerfalllodge-closed-checkbox">
							<input type="checkbox" name="spinnerfalllodge-closed-checkbox" id="spinnerfalllodge-closed-checkbox" value="-danger" <?php //if ( isset ( $sbm_stored_meta['spinnerfalllodge-closed-checkbox'] ) ) checked( $sbm_stored_meta['spinnerfalllodge-closed-checkbox'][0], '-danger' ); ?> />
							<?php //_e( 'Closed&nbsp;', 'sbm-textdomain' )?>
					</label>

					<label for="spinnerfalllodge-checkbox-poor">
							<input type="checkbox" name="spinnerfalllodge-checkbox-poor" id="spinnerfalllodge-checkbox-poor" value="-danger" <?php //if ( isset ( $sbm_stored_meta['spinnerfalllodge-checkbox-poor'] ) ) checked( $sbm_stored_meta['spinnerfalllodge-checkbox-poor'][0], '-danger' ); ?> />
							<?php //_e( 'Poor&nbsp;', 'sbm-textdomain' )?>
					</label>

					<label for="spinnerfalllodge-checkbox-fair">
							<input type="checkbox" name="spinnerfalllodge-checkbox-fair" id="spinnerfalllodge-checkbox-fair" value="-danger" <?php //if ( isset ( $sbm_stored_meta['spinnerfalllodge-checkbox-fair'] ) ) checked( $sbm_stored_meta['spinnerfalllodge-checkbox-fair'][0], '-danger' ); ?> />
							<?php// _e( 'Fair&nbsp;', 'sbm-textdomain' )?>
					</label>

					<label for="spinnerfalllodge-checkbox-fairgood">
							<input type="checkbox" name="spinnerfalllodge-checkbox-fairgood" id="spinnerfalllodge-checkbox-fairgood" value="-danger" <?php// if ( isset ( $sbm_stored_meta['spinnerfalllodge-checkbox-fairgood'] ) ) checked( $sbm_stored_meta['spinnerfalllodge-checkbox-fairgood'][0], '-danger' ); ?> />
							<?php// _e( 'Fair to Good&nbsp;', 'sbm-textdomain' )?>
					</label>

					<label for="spinnerfalllodge-checkbox-good">
							<input type="checkbox" name="spinnerfalllodge-checkbox-good" id="spinnerfalllodge-checkbox-good" value="-danger" <?php //if ( isset ( $sbm_stored_meta['spinnerfalllodge-checkbox-good'] ) ) checked( $sbm_stored_meta['spinnerfalllodge-checkbox-good'][0], '-danger' ); ?> />
							<?php// _e( 'Good&nbsp;', 'sbm-textdomain' )?>
					</label>

					<label for="spinnerfalllodge-checkbox-great">
							<input type="checkbox" name="spinnerfalllodge-checkbox-great" id="spinnerfalllodge-checkbox-great" value="-danger" <?php //if ( isset ( $sbm_stored_meta['spinnerfalllodge-checkbox-great'] ) ) checked( $sbm_stored_meta['spinnerfalllodge-checkbox-great'][0], '-danger' ); ?> />
							<?php// _e( 'Great', 'sbm-textdomain' )?>
					</label>

			</div>
		</p>
    </div> <!-- /.tab-pane spinner fall lodge -->

            <!-- ====== SUGAR CREEK RANCH ====== -->

            <div role="tabpanel" class="tab-pane fade" id="sugarcreek">

              <h3><?php echo ' Sugar Creek Ranch ' ?></h3>

              <p><!-- Sugar Creek Ranch Updated -->

                <strong><label for="sugarcreek-updated" class="sbm-row-title"><?php _e( 'Sugar Creek Ranch Updated', 'sbm-textdomain' )?></label></strong>

                <input style="width: 100%;" type="text" name="sugarcreek-updated" id="sugarcreek-updated" value="<?php if ( isset ( $sbm_stored_meta['sugarcreek-updated'] ) ) echo $sbm_stored_meta['sugarcreek-updated'][0]; ?>" />

              </p>

              <p><!-- Sugar Creek Ranch Report -->

                <strong><label for="sugarcreek-report" class="sbm-row-title"><?php _e( 'Sugar Creek Ranch Report', 'sbm-textdomain' )?></label></strong>

                <textarea style="width: 100%;" rows="4" name="sugarcreek-report" id="sugarcreek-report"><?php if ( isset ( $sbm_stored_meta['sugarcreek-report'] ) ) echo $sbm_stored_meta['sugarcreek-report'][0]; ?></textarea>
              </p>

              <div class="mt-1618 mb-1618"><!-- Sugar Creek Ranch Hot Flies -->

                <strong><label for="sugarcreek-hot-flies" class="sbm-row-title"><?php _e( 'Sugar Creek Ranch Hot Flies', 'sbm-textdomain' )?></label></strong>
                <p>To create a link: <?php echo esc_html('<a href="www.hotflylink.com" title="A link to a hot fly" target="_blank">The name and size of the hot fly. ex: #16 Hot Fly</a>'); ?></p>

                <textarea style="width: 100%;" name="sugarcreek-hot-flies" id="sugarcreek-hot-flies"><?php if ( isset ( $sbm_stored_meta['sugarcreek-hot-flies'] ) ) echo $sbm_stored_meta['sugarcreek-hot-flies'][0]; ?></textarea>

              </div>

              <p><!-- Sugar Creek Ranch Rating -->
                <span class="sbm-row-title"><?php _e( '<strong>How is the fishing?</strong> ', 'sbm-textdomain' )?></span>
              <div class="sbm-row-content">

                <label for="sugarcreek-closed-message">
                  <?php _e( 'Closed Message&nbsp;', 'sbm-textdomain' )?>
                  <input type="text" style="width: 50%;" name="sugarcreek-closed-message" id="sugarcreek-closed-message" value="<?php if ( isset ( $sbm_stored_meta['sugarcreek-closed-message'] ) ) echo $sbm_stored_meta['sugarcreek-closed-message'][0]; ?>" />
                </label>

              </div>

              <div class="sbm-row-content">

                <label for="sugarcreek-closed-checkbox">
                  <input type="checkbox" name="sugarcreek-closed-checkbox" id="sugarcreek-closed-checkbox" value="-danger" <?php if ( isset ( $sbm_stored_meta['sugarcreek-closed-checkbox'] ) ) checked( $sbm_stored_meta['sugarcreek-closed-checkbox'][0], '-danger' ); ?> />
                  <?php _e( 'Closed&nbsp;', 'sbm-textdomain' )?>
                </label>

                <label for="sugarcreek-checkbox-poor">
                  <input type="checkbox" name="sugarcreek-checkbox-poor" id="sugarcreek-checkbox-poor" value="-danger" <?php if ( isset ( $sbm_stored_meta['sugarcreek-checkbox-poor'] ) ) checked( $sbm_stored_meta['sugarcreek-checkbox-poor'][0], '-danger' ); ?> />
                  <?php _e( 'Poor&nbsp;', 'sbm-textdomain' )?>
                </label>

                <label for="sugarcreek-checkbox-fair">
                  <input type="checkbox" name="sugarcreek-checkbox-fair" id="sugarcreek-checkbox-fair" value="-danger" <?php if ( isset ( $sbm_stored_meta['sugarcreek-checkbox-fair'] ) ) checked( $sbm_stored_meta['sugarcreek-checkbox-fair'][0], '-danger' ); ?> />
                  <?php _e( 'Fair&nbsp;', 'sbm-textdomain' )?>
                </label>

                <label for="sugarcreek-checkbox-fairgood">
                  <input type="checkbox" name="sugarcreek-checkbox-fairgood" id="sugarcreek-checkbox-fairgood" value="-danger" <?php if ( isset ( $sbm_stored_meta['sugarcreek-checkbox-fairgood'] ) ) checked( $sbm_stored_meta['sugarcreek-checkbox-fairgood'][0], '-danger' ); ?> />
                  <?php _e( 'Fair to Good&nbsp;', 'sbm-textdomain' )?>
                </label>

                <label for="sugarcreek-checkbox-good">
                  <input type="checkbox" name="sugarcreek-checkbox-good" id="sugarcreek-checkbox-good" value="-danger" <?php if ( isset ( $sbm_stored_meta['sugarcreek-checkbox-good'] ) ) checked( $sbm_stored_meta['sugarcreek-checkbox-good'][0], '-danger' ); ?> />
                  <?php _e( 'Good&nbsp;', 'sbm-textdomain' )?>
                </label>

                <label for="sugarcreek-checkbox-great">
                  <input type="checkbox" name="sugarcreek-checkbox-great" id="sugarcreek-checkbox-great" value="-danger" <?php if ( isset ( $sbm_stored_meta['sugarcreek-checkbox-great'] ) ) checked( $sbm_stored_meta['sugarcreek-checkbox-great'][0], '-danger' ); ?> />
                  <?php _e( 'Great', 'sbm-textdomain' )?>
                </label>

              </div>
            </div> <!-- /.tab-pane sugar creek -->

          </div> <!-- /.tab-content -->
        </div> <!-- /.panel-body boof -->
      </div> <!-- /.panel-heading -->
    </div> <!-- /.panel .with-nav-tabs .panel-default -->

    <!-- ====== CALL TO ACTION ROW ====== -->
    <hr style="margin-top: 1.618em; border-top: 3px double #8c8b8b;">
    <h3><?php echo 'CTA Section' ?></h3>

    <p><!-- Call To Action Strong Into -->
      <strong><label for="cta-streamReport-intro" class="sbm-row-title"><?php _e('CTA Intro','sbm-textdomain')?></label></strong>
      <input style="width: 100%;" type="text" placeholder="Place CTA content here." name="cta-streamReport-intro" id="cta-streamReport-intro" value="<?php if (isset($sbm_stored_meta['cta-streamReport-intro'])) echo $sbm_stored_meta['cta-streamReport-intro'][0]; ?>" />
    </p>

    <p><!-- Call To Action Content -->
      <strong><label for="cta-streamReport-content" class="sbm-row-title"><?php _e( 'CTA Content', 'sbm-textdomain' )?></label></strong>

      <textarea style="width: 100%;" rows="4" name="cta-streamReport-content" id="cta-streamReport-content"><?php if ( isset ( $sbm_stored_meta['cta-streamReport-content'] ) ) echo $sbm_stored_meta['cta-streamReport-content'][0]; ?></textarea>
    </p>


    <?php
  }
