<?php
/**
 * Default widget template.
 *
 * Copy this template to /foundation-image-widget/widget.php in your theme or
 * child theme to make edits.
 *
 * @package   FoundationImageWidget
 * @copyright Copyright (c) 2019 Chris Parsons, LLC
 * @license   GPL-2.0+
 * @since     4.0.0
 */
?>

<?php
  $before_title = '<h3 class="imagetitle">';
  $after_title = '</h3>';
if ( ! empty( $title ) ) :
	echo $before_title . $title .  $after_title;
endif;
?>

<?php if ( ! empty( $image_id ) ) : ?>
	<p class="foundation-image">
		<?php
		echo $link_open;
    echo '<div class="image-wrapper overlay-fade-in">';
		echo wp_get_attachment_image( $image_id, $image_size );
    echo '<div class="image-overlay-content">';
            if ( ! empty( $text ) ) :
	           echo wpautop( $text ); 
            endif;
    echo  '</div>' .
          '</div>';
		echo $link_close;
		?>
	</p>
<?php endif; ?>


<!-- if ( ! empty( $text ) ) :
	echo wpautop( $text );
endif; -->


<?php if ( ! empty( $link_text ) ) : ?>
	<p class="more">
		<?php
		echo $text_link_open;
		echo $link_text;
		echo $text_link_close;
		?>
	</p>
<?php endif; ?>
