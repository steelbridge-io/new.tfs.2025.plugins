<?php
/**
* Plugin Name: TFS Custom Text
* Version: 1.1.0
* Plugin URI: http://steelbridgemedia.com
* Description: Custom text widget
* Author: Chris Parsons
* Author URI: http://steelbridgemedia.com
*/

	/** 
	* Block direct requests
	*/
	if ( !defined('ABSPATH') ) {
		die('-1');
	}

	/**
	* Core class used to implement the TFS Custom Text widget.
	*
	* @since 2.3.0
	*
	*/

	class tfs_customtext extends WP_Widget {

	public function __construct() {
		$widget_ops = array(
			'classname' => 'tfs_customtext',
			'description' => __( 'Arbitrary text or HTML.' ),
			'customize_selective_refresh' => true,
		);

		parent::__construct( 'tfs_customtext', __( 'TFS Custom Text' ), $widget_ops);
	}

	/**
	 * Outputs the content for the current TFS Custom Text widget instance.
	 *
	 * @since 2.3.0
	 * @access public
	 *
	 * @param array $args     Display arguments including 'before_title', 'after_title',
	 *                        'before_widget', and 'after_widget'.
	 * @param array $instance Settings for the current TFS Custom Text widget instance.
	 */
	
		public function widget( $args, $instance ) {

			/** This filter is documented in wp-includes/widgets/class-wp-widget-pages.php */
			$title = apply_filters( 'widget_title', empty( $instance['title'] ) ? '' : $instance['title'], $instance, $this->id_base );

			$widget_text = ! empty( $instance['text'] ) ? $instance['text'] : '';

		/**
		* Filters the content of the TFS Custom Text widget.
		*
		* @since 2.3.0
		* @since 4.4.0 Added the `$this` parameter.
		*
		* @param string         $widget_text The widget content.
		* @param array          $instance    Array of settings for the current widget.
		* @param WP_Widget_Text $this        Current TFS Custom Text widget instance.
		*/
			$text = apply_filters( 'tfs_customtext', $widget_text, $instance, $this );

		echo $args['before_widget'];
			//if ( ! empty( $title ) ) {
				//echo $args['before_title'] . $title . $args['after_title'];
				 //echo $args['before_widget'] . $args['before_title'] . $title . $args['after_title']; 
			echo $args['before_tag'] . $args['before_title'] . $title . $args['after_title'] . $args['before_text'] . $text . $args['after_text'] . $args['after_tag']; 

			/*} ?>
			<div class="caption"><?php echo !empty( $instance['filter'] ) ? wpautop( $text ) : $text; ?></div>*/
		//<?php
		echo $args['after_widget'];
		}

		/**
		* Handles updating settings for the current TFS Custom Text widget instance.
		*
		* @since 2.8.0
		* @access public
		*
		* @param array $new_instance New settings for this instance as input by the user via
		*                            WP_Widget::form().
		* @param array $old_instance Old settings for this instance.
		* @return array Settings to save or bool false to cancel saving.
		*/
		public function update( $new_instance, $old_instance ) {
			$instance = $old_instance;
			$instance['title'] = sanitize_text_field( $new_instance['title'] );
			if ( current_user_can( 'unfiltered_html' ) ) {
				$instance['text'] = $new_instance['text'];
			} else {
				$instance['text'] = wp_kses_post( $new_instance['text'] );
			}
			$instance['filter'] = ! empty( $new_instance['filter'] );
			return $instance;
			}

		/**
		* Outputs the TFS Custom Text widget settings form.
		*
		* @since 2.8.0
		* @access public
		*
		* @param array $instance Current settings.
		*/
		public function form( $instance ) {
			$instance = wp_parse_args( (array) $instance, array( 'title' => '', 'text' => '' ) );
			$filter = isset( $instance['filter'] ) ? $instance['filter'] : 0;
			$title = sanitize_text_field( $instance['title'] );
			?>
			<p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" /></p>

			<p><label for="<?php echo $this->get_field_id( 'text' ); ?>"><?php _e( 'Content:' ); ?></label>
			<textarea class="widefat" rows="16" cols="20" id="<?php echo $this->get_field_id('text'); ?>" name="<?php echo $this->get_field_name('text'); ?>"><?php echo esc_textarea( $instance['text'] ); ?></textarea></p>

			<p><input id="<?php echo $this->get_field_id('filter'); ?>" name="<?php echo $this->get_field_name('filter'); ?>" type="checkbox"<?php checked( $filter ); ?> />&nbsp;<label for="<?php echo $this->get_field_id('filter'); ?>"><?php _e('Automatically add paragraphs'); ?></label></p>
<?php
		}
	}

		function tfs_register_customtext() { 
		register_widget( 'tfs_customtext' );
		}
		add_action( 'widgets_init', 'tfs_register_customtext' );