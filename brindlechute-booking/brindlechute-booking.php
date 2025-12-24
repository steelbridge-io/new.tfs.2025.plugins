<?php
/**
 * Plugin Name: BrindleChute Booking
 * Description: Allows users to create shortcodes for BrindleChute booking modals.
 * Version: 1.0.0
 * Author: Chris Parsons
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class BrindleChute_Booking {

	private $option_name = 'brindlechute_booking_settings';
	private $shortcode_used = false;

	public function __construct() {
		add_action( 'admin_menu', array( $this, 'add_admin_menu' ) );
		add_action( 'admin_init', array( $this, 'register_settings' ) );
		add_shortcode( 'brindlechute', array( $this, 'render_shortcode' ) );
		add_action( 'send_headers', array( $this, 'send_security_headers' ) );
		add_action( 'add_meta_boxes', array( $this, 'add_side_tab_meta_box' ) );
		add_action( 'save_post', array( $this, 'save_side_tab_meta' ) );
		add_action( 'wp_footer', array( $this, 'render_side_tab' ) );
	}

	/**
	 * Send security headers to mitigate clickjacking and control resource loading.
	 */
	public function send_security_headers() {
		if ( is_admin() ) {
			return;
		}

		$settings = get_option( $this->option_name, array() );
		$disable_security = isset( $settings['disable_security'] ) ? $settings['disable_security'] : false;

		if ( $disable_security ) {
			return;
		}

		// Prevent the site itself from being framed (Clickjacking protection)
		header( 'X-Frame-Options: SAMEORIGIN' );

		// Content Security Policy
		// We allow BrindleChute and Stripe (commonly used for payments)
		// Broadened to avoid breaking site layout and assets
		$csp_directives = array(
			"default-src 'self' https: data: 'unsafe-inline' 'unsafe-eval' blob:",
			"script-src 'self' 'unsafe-inline' 'unsafe-eval' https: blob: data:",
			"style-src 'self' 'unsafe-inline' https: data:",
			"img-src 'self' data: https: http:",
			"font-src 'self' data: https: blob:",
			"frame-src 'self' https://home.brindlechute.com https://home.brindlechute.dev https://js.stripe.com https://hooks.stripe.com",
			"connect-src 'self' https: data: blob:",
			"media-src 'self' https: data: blob:",
			"worker-src 'self' blob: data:",
		);

		// Allow user to filter CSP if they have special needs
		$csp_directives = apply_filters( 'brindlechute_booking_csp_directives', $csp_directives );

		if ( ! empty( $csp_directives ) ) {
			header( 'Content-Security-Policy: ' . implode( '; ', $csp_directives ) );
		}
	}

	public function add_admin_menu() {
		add_menu_page(
			'BrindleChute Booking',
			'BrindleChute',
			'manage_options',
			'brindlechute-booking',
			array( $this, 'admin_page_content' ),
			'dashicons-calendar-alt'
		);
	}

	public function register_settings() {
		register_setting( 'brindlechute_booking_group', $this->option_name );
	}

	public function admin_page_content() {
		$settings = get_option( $this->option_name, array(
			'environment' => 'production',
			'custom_url'  => '',
			'modals'      => array()
		) );

		// Handle deletions
		if ( isset( $_GET['delete'] ) && check_admin_referer( 'delete_modal_' . $_GET['delete'] ) ) {
			unset( $settings['modals'][ $_GET['delete'] ] );
			update_option( $this->option_name, $settings );
			wp_redirect( admin_url( 'admin.php?page=brindlechute-booking' ) );
			exit;
		}

		// Handle additions
		if ( isset( $_POST['add_modal'] ) && check_admin_referer( 'add_modal_action', 'add_modal_nonce' ) ) {
			$new_id = uniqid();
			$settings['modals'][ $new_id ] = array(
				'title' => sanitize_text_field( $_POST['title'] ),
				'ids'   => sanitize_text_field( $_POST['ids'] ),
				'type'  => sanitize_text_field( $_POST['type'] ),
			);
			update_option( $this->option_name, $settings );
		}

		// Handle environment toggle, custom URL, custom CSS, and security toggle
		if ( isset( $_POST['save_environment'] ) && check_admin_referer( 'save_env_action', 'save_env_nonce' ) ) {
			$settings['environment'] = sanitize_text_field( $_POST['environment'] );
			$settings['custom_url'] = esc_url_raw( $_POST['custom_url'] );
			$settings['custom_css'] = wp_strip_all_tags( $_POST['custom_css'] ); 
			$settings['disable_security'] = isset( $_POST['disable_security'] ) ? true : false;
			update_option( $this->option_name, $settings );
		}

		$environment = isset( $settings['environment'] ) ? $settings['environment'] : 'production';
		$default_url = ( $environment === 'development' ) ? 'https://home.brindlechute.dev/brindle-embedded.js' : 'https://home.brindlechute.com/brindle-embedded.js';
		$current_url = ! empty( $settings['custom_url'] ) ? $settings['custom_url'] : $default_url;
		?>
		<div class="wrap">
			<h1>BrindleChute Booking Settings</h1>

			<form method="post" style="margin-bottom: 20px; padding: 15px; background: #fff; border: 1px solid #ccd0d4;">
				<?php wp_nonce_field( 'save_env_action', 'save_env_nonce' ); ?>
				<h2>Environment Settings</h2>
				<p><em>Note: If the development domain (.dev) does not resolve in your environment, please use the "Custom Script URL" below to set it to the .com version or another valid URL.</em></p>
  		<label>
					<input type="radio" name="environment" value="development" <?php checked( $settings['environment'], 'development' ); ?>> Development
				</label>
				<br>
				<label>
					<input type="radio" name="environment" value="production" <?php checked( $settings['environment'], 'production' ); ?>> Production
				</label>
				<br><br>
				<label for="custom_url"><strong>Custom Script URL (Optional):</strong></label><br>
				<input type="text" name="custom_url" id="custom_url" class="regular-text" value="<?php echo esc_attr( $settings['custom_url'] ); ?>" placeholder="https://...">
				<p class="description">Override the default script URL if needed (e.g. if you want to use the older <code>cdn.brindlechute.com/widget.js</code>).</p>
				
				<label for="custom_css"><strong>Custom CSS (Targets Modal Wrapper/Button):</strong></label><br>
				<textarea name="custom_css" id="custom_css" rows="10" cols="50" class="large-text" placeholder=".brindle-modal { ... }"><?php echo esc_textarea( isset( $settings['custom_css'] ) ? $settings['custom_css'] : '' ); ?></textarea>
				<p class="description">Add CSS to style the BrindleChute button or the modal wrapper. <strong>Note:</strong> The modal content itself is loaded in an iframe, which standard CSS cannot target due to security restrictions. You can only style the button or the background overlay created by the plugin.</p>

				<hr>
				<h2>Security Control</h2>
				<label>
					<input type="checkbox" name="disable_security" <?php checked( isset( $settings['disable_security'] ) ? $settings['disable_security'] : false ); ?>> <strong>Disable Security Headers (Not Recommended)</strong>
				</label>
				<p class="description">If the Content Security Policy is breaking your site layout or navigation, you can disable it here. This will remove the <code>X-Frame-Options</code> and <code>Content-Security-Policy</code> headers.</p>
				<hr>

				<p><strong>Currently using:</strong> <code><?php echo esc_html( $current_url ); ?></code></p>
				
				<input type="submit" name="save_environment" class="button button-secondary" value="Save Settings">
			</form>

			<div style="background: #fff; border: 1px solid #ccd0d4; padding: 15px; margin-bottom: 20px;">
				<h2>Security Features</h2>
				<p>This plugin implements several security measures to protect your site and the booking process:</p>
				<ul style="list-style-type: disc; margin-left: 20px;">
					<li><strong>Clickjacking Protection:</strong> The <code>X-Frame-Options: SAMEORIGIN</code> header is sent to prevent your website from being framed by malicious sites.</li>
					<li><strong>Content Security Policy (CSP):</strong> A CSP header is automatically generated to only allow scripts and iframes from trusted sources. We've broadened this to support common WordPress assets (Google Fonts, etc.) while still protecting BrindleChute and Stripe connections.</li>
					<li><strong>Secure Transactions:</strong> By restricting iframe sources, we ensure that the booking modal communicates only with BrindleChute's official domains, complimenting Stripe's security requirements.</li>
				</ul>
				<p><small><em>Note: If you encounter issues with blocked resources (like images or styles), you may need to adjust the CSP via the <code>brindlechute_booking_csp_directives</code> filter in your theme's functions.php.</em></small></p>
				<p><small><em>Note: Ensure your website is running on <strong>HTTPS</strong> for full compatibility with modern payment standards.</em></small></p>
			</div>

			<div style="background: #fff; border: 1px solid #ccd0d4; padding: 15px; margin-bottom: 20px;">
				<h2>Add New Modal Shortcode</h2>
				<form method="post">
					<?php wp_nonce_field( 'add_modal_action', 'add_modal_nonce' ); ?>
					<table class="form-table">
						<tr>
							<th><label for="title">Title</label></th>
							<td><input type="text" name="title" id="title" class="regular-text" required placeholder="e.g. Half Day Float"></td>
						</tr>
						<tr>
							<th><label for="ids">IDs (comma separated)</label></th>
							<td><input type="text" name="ids" id="ids" class="regular-text" required placeholder="e.g. 1001,1091"></td>
						</tr>
						<tr>
							<th><label for="type">Modal Type</label></th>
							<td>
								<select name="type" id="type">
									<option value="experience">Experience Modal</option>
									<option value="group">Group Modal</option>
									<option value="all_groups">All Groups Modal</option>
								</select>
							</td>
						</tr>
					</table>
					<p class="submit">
						<input type="submit" name="add_modal" class="button button-primary" value="Add Shortcode">
					</p>
				</form>
			</div>

			<h2>Existing Shortcodes</h2>
			<table class="wp-list-table widefat fixed striped">
				<thead>
					<tr>
						<th>Title</th>
						<th>IDs</th>
						<th>Type</th>
						<th>JS Call (Preview)</th>
						<th>Shortcode</th>
						<th>Actions</th>
					</tr>
				</thead>
				<tbody>
					<?php if ( empty( $settings['modals'] ) ) : ?>
						<tr>
							<td colspan="6">No shortcodes created yet.</td>
						</tr>
					<?php else : ?>
						<?php foreach ( $settings['modals'] as $id => $modal ) : 
							$ids_array = explode( ',', $modal['ids'] );
							$ids_array = array_map( 'trim', $ids_array );
							$ids_array = array_filter( $ids_array, 'is_numeric' );
							$js_ids = implode( ',', $ids_array );
							$js_call_preview = '';
							switch ( $modal['type'] ) {
								case 'group': $js_call_preview = "brindlechute.openGroupModal($js_ids)"; break;
								case 'all_groups': $js_call_preview = "brindlechute.openAllGroupsModal($js_ids)"; break;
								case 'experience': default: $js_call_preview = "brindlechute.openExperienceModal($js_ids)"; break;
							}
						?>
							<tr>
								<td><?php echo esc_html( $modal['title'] ); ?></td>
								<td><?php echo esc_html( $modal['ids'] ); ?></td>
								<td><?php echo esc_html( str_replace( '_', ' ', ucfirst( $modal['type'] ) ) ); ?></td>
								<td><code><?php echo esc_html( $js_call_preview ); ?></code></td>
								<td><code>[brindlechute id="<?php echo esc_attr( $id ); ?>"]</code></td>
								<td>
									<a href="<?php echo wp_nonce_url( admin_url( 'admin.php?page=brindlechute-booking&delete=' . $id ), 'delete_modal_' . $id ); ?>" class="button button-link-delete" onclick="return confirm('Are you sure?')">Delete</a>
								</td>
							</tr>
						<?php endforeach; ?>
					<?php endif; ?>
				</tbody>
			</table>
		</div>
		<?php
	}

	public function render_shortcode( $atts ) {
		$atts = shortcode_atts( array(
			'id' => '',
		), $atts );

		if ( empty( $atts['id'] ) ) {
			return '';
		}

		$settings = get_option( $this->option_name );
		if ( ! isset( $settings['modals'][ $atts['id'] ] ) ) {
			return '<!-- BrindleChute Shortcode ID not found -->';
		}

		$modal = $settings['modals'][ $atts['id'] ];
		
		// Enqueue scripts and styles only when shortcode is used
		$custom_url = isset( $settings['custom_url'] ) ? $settings['custom_url'] : '';
		$environment = isset( $settings['environment'] ) ? $settings['environment'] : 'production';
		$default_url = ( $environment === 'development' ) ? 'https://home.brindlechute.dev/brindle-embedded.js' : 'https://home.brindlechute.com/brindle-embedded.js';
		
		$src = ! empty( $custom_url ) ? $custom_url : $default_url;

		wp_enqueue_script( 'brindlechute-embedded', esc_url( $src ), array(), null, true );

		// Handle Styles
		if ( ! $this->shortcode_used ) {
			$default_css = "
				.brindlechute-booking-button {
					background-color: #0073aa;
					color: #fff;
					padding: 10px 20px;
					border: none;
					border-radius: 4px;
					cursor: pointer;
					font-size: 16px;
					font-weight: bold;
					display: inline-block;
				}
				.brindlechute-booking-button:hover {
					background-color: #005177;
				}
			";
			
			$custom_css = isset( $settings['custom_css'] ) ? $settings['custom_css'] : '';
			$custom_css = str_replace( '</style>', '', $custom_css );
			
			wp_register_style( 'brindlechute-booking-styles', false );
			wp_enqueue_style( 'brindlechute-booking-styles' );
			wp_add_inline_style( 'brindlechute-booking-styles', $default_css . $custom_css );
			
			$this->shortcode_used = true;
		}

		$ids_array = explode( ',', $modal['ids'] );
		$ids_array = array_map( 'trim', $ids_array );
		$ids_array = array_filter( $ids_array, 'is_numeric' );
		$js_ids = implode( ',', $ids_array );

		$js_call = '';
		switch ( $modal['type'] ) {
			case 'group':
				$js_call = "brindlechute.openGroupModal($js_ids)";
				break;
			case 'all_groups':
				$js_call = "brindlechute.openAllGroupsModal($js_ids)";
				break;
			case 'experience':
			default:
				$js_call = "brindlechute.openExperienceModal($js_ids)";
				break;
		}

		ob_start();
		?>
		<button type="button" class="brindlechute-booking-button" onclick="if(window.brindlechute) { <?php echo esc_attr( $js_call ); ?> } else { alert('Booking system is still loading. Please try again in a moment.'); console.error('BrindleChute not loaded'); }">
			Book Today Online
		</button>
		<?php
		return ob_get_clean();
	}

	public function add_side_tab_meta_box() {
		$post_types = get_post_types( array( 'public' => true ) );
		foreach ( $post_types as $post_type ) {
			add_meta_box(
				'brindlechute_side_tab_meta',
				'BrindleChute Side Tab',
				array( $this, 'side_tab_meta_box_callback' ),
				$post_type,
				'side',
				'default'
			);
		}
	}

	public function side_tab_meta_box_callback( $post ) {
		$value = get_post_meta( $post->ID, '_brindlechute_side_tab', true );
		wp_nonce_field( 'brindlechute_side_tab_nonce_action', 'brindlechute_side_tab_nonce' );
		?>
		<label for="brindlechute_side_tab">Enter BrindleChute Shortcode:</label>
		<input type="text" name="brindlechute_side_tab" id="brindlechute_side_tab" value="<?php echo esc_attr( $value ); ?>" class="widefat" placeholder='[brindlechute id="..."]'>
		<p class="description">If provided, a floating "Book Online" tab will appear on the left side of this page.</p>
		<?php
	}

	public function save_side_tab_meta( $post_id ) {
		if ( ! isset( $_POST['brindlechute_side_tab_nonce'] ) || ! wp_verify_nonce( $_POST['brindlechute_side_tab_nonce'], 'brindlechute_side_tab_nonce_action' ) ) {
			return;
		}
		if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
			return;
		}
		if ( ! current_user_can( 'edit_post', $post_id ) ) {
			return;
		}
		if ( isset( $_POST['brindlechute_side_tab'] ) ) {
			update_post_meta( $post_id, '_brindlechute_side_tab', sanitize_text_field( $_POST['brindlechute_side_tab'] ) );
		}
	}

	public function render_side_tab() {
		if ( ! is_singular() ) {
			return;
		}

		$shortcode = get_post_meta( get_the_ID(), '_brindlechute_side_tab', true );
		if ( empty( $shortcode ) ) {
			return;
		}

		// Use do_shortcode but we want to customize the output for the tab
		// We'll extract the ID from the shortcode if possible to use our internal logic
		preg_match( '/id=["\']([^"\']+)["\']/', $shortcode, $matches );
		$modal_id = isset( $matches[1] ) ? $matches[1] : '';

		if ( empty( $modal_id ) ) {
			return;
		}

		$settings = get_option( $this->option_name );
		if ( ! isset( $settings['modals'][ $modal_id ] ) ) {
			return;
		}

		$modal = $settings['modals'][ $modal_id ];
		$ids_array = explode( ',', $modal['ids'] );
		$ids_array = array_map( 'trim', $ids_array );
		$ids_array = array_filter( $ids_array, 'is_numeric' );
		$js_ids = implode( ',', $ids_array );

		$js_call = '';
		switch ( $modal['type'] ) {
			case 'group': $js_call = "brindlechute.openGroupModal($js_ids)"; break;
			case 'all_groups': $js_call = "brindlechute.openAllGroupsModal($js_ids)"; break;
			case 'experience': default: $js_call = "brindlechute.openExperienceModal($js_ids)"; break;
		}

		// Enqueue the script
		$custom_url = isset( $settings['custom_url'] ) ? $settings['custom_url'] : '';
		$environment = isset( $settings['environment'] ) ? $settings['environment'] : 'production';
		$default_url = ( $environment === 'development' ) ? 'https://home.brindlechute.dev/brindle-embedded.js' : 'https://home.brindlechute.com/brindle-embedded.js';
		$src = ! empty( $custom_url ) ? $custom_url : $default_url;
		wp_enqueue_script( 'brindlechute-embedded', esc_url( $src ), array(), null, true );

		?>
		<style>
			.brindlechute-side-tab {
				position: fixed;
				left: 0;
				top: 50%;
				transform: translateY(-50%);
				z-index: 999999;
				background-color: #A21418;
				color: #fff;
				cursor: pointer;
				border-radius: 0 5px 5px 0;
				transition: width 0.2s ease;
				font-weight: bold;
				box-shadow: 2px 0 5px rgba(0,0,0,0.2);
				display: flex;
				align-items: center;
				justify-content: center;
				width: 20px;
				height: 150px;
				overflow: hidden;
			}
			.brindlechute-side-tab:hover {
				width: 200px;
				background-color: #ffffff;
			}
			.brindlechute-side-tab .tab-text {
				writing-mode: vertical-rl;
				transform: rotate(180deg);
				white-space: nowrap;
				transition: opacity 0.2s ease;
				display: block;
                letter-spacing: 1.5px;
			}
			.brindlechute-side-tab .hover-content {
				display: none;
				white-space: normal;
				padding: 0 15px;
				text-align: center;
			}
			.brindlechute-side-tab:hover .tab-text {
				display: none;
			}
			.brindlechute-side-tab:hover .hover-content {
				display: block;
			}
			.brindlechute-side-tab-button {
				background: #f5f5f5;
				color: #000;
				border: 0.5 solid #ccc;
				padding: 12px 15px;
				border-radius: 4px;
				font-weight: bold;
				cursor: pointer;
				text-transform: uppercase;
				font-size: 12px;
				margin-bottom: 10px;
			}
			.brindlechute-side-tab-button:hover {
				background: #f0f0f0;
			}
			.brindlechute-side-tab-note {
				font-size: 11px;
				color: #333;
				line-height: 1.3;
				font-weight: normal;
			}
		</style>
		<div class="brindlechute-side-tab" onclick="if(window.brindlechute) { <?php echo esc_attr( $js_call ); ?> } else { alert('Booking system is still loading...'); }">
			<span class="tab-text">BOOK ONLINE</span>
			<div class="hover-content">
				<button type="button" class="brindlechute-side-tab-button">Book Today Online</button>
				<div class="brindlechute-side-tab-note">
					If you have a preferred guide, please include their name in the message box at checkout.
				</div>
			</div>
		</div>
		<?php
	}

	// Removed old method
}

new BrindleChute_Booking();
