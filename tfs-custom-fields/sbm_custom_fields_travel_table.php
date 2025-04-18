<?php
/**
 * Description: Travel Custom Table For Rates & Reservations
 *
 * @package		tfsTravel
 * @since		1.2.3
 * @author		Chris Parsons
 * @link		http://steelbridge.io
 * @license		GNU General Public License
 */
include( plugin_dir_path( __FILE__ ) . 'inc/sanitize_fields_table.php');
// Adds a table to the travel template in place of the expanding rates & reservations
function tfs_custom_travel_table_meta() {
    global $post;
    if(!empty($post)){
        $pageTemplate = get_post_meta($post->ID, '_wp_page_template', true);
        if($pageTemplate == 'page-templates/travel-template.php') {
            $types = array('post', 'page', 'travel_cpt', 'lower48', 'esb_lodge');
            foreach($types as $type) {
                add_meta_box( 'sbm_table_meta', __( 'Travel Table For Rates &amp; Reservations', 'tfs-table-travel-textdomain' ),
                    'tfs_travel_table_callback', $type, 'normal', 'high' );
            }
        }
    }
}
add_action( 'add_meta_boxes', 'tfs_custom_travel_table_meta' );

// Outputs the content of the meta box
function tfs_travel_table_callback( $post ) {
    wp_nonce_field( basename( __FILE__ ), 'table_nonce' );
    $sbm_stored_table_meta = get_post_meta( $post->ID );
    ?>

    <!-- ====== Travel Details ====== -->
    <div><p>Note!!!: Adding a title here will override the rendering on the Rates &amp; Reservations. By adding a title below, a clickable link is added to the Rates &amp; Reservations section where a modal reveals a cost schedule produced using html.</p></div>
    <div class="mt-1618">
        <label for="rr-table-title"><strong><?php _e( 'Add the table title here:','tfs-table-travel-textdomain');
        ?></strong></label>
        <input style="width:100%;" type="text" name="rr-table-title" id="rr-table-title" value="<?php if ( isset
        ($sbm_stored_table_meta['rr-table-title'])) echo $sbm_stored_table_meta['rr-table-title'][0];?>" />
    </div>

    <div class="mt-1618">
        <label for="rr-table-content-textarea"><strong><?php _e( 'Add content and html here that appears above the
        table:','tfs-table-travel-textdomain');
                ?></strong></label>
        <textarea rows="5" style="width:100%;" name="rr-table-content-textarea" id="rr-table-content-textarea"><?php
            if( isset ($sbm_stored_table_meta['rr-table-content-textarea'])) echo $sbm_stored_table_meta['rr-table-content-textarea'][0];?></textarea>
    </div>

    <div class="mt-1618">
        <label for="rr-table-textarea"><strong><?php _e( 'Add your content, html inside &lt;tr&gt;&lt;/tr&gt; &amp; &lt;td&gt;&lt;/td&gt; here:','tfs-table-travel-textdomain');
        ?></strong></label>
        <textarea rows="10" style="width:100%;" name="rr-table-textarea" id="rr-table-textarea"><?php if( isset ($sbm_stored_table_meta['rr-table-textarea'])) echo $sbm_stored_table_meta['rr-table-textarea'][0];?></textarea>
    </div>


<?php } ?>
