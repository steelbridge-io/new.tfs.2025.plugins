// Featured Image 1
jQuery(document).ready( function($){ "use strict";

  // Instantiates the variable that holds the media library frame.
  var tfstravel_blog_logo;

  // Runs when the image button is clicked.
  $('#blog-template-logo-button').click(function(e){

    // Prevents the default action from occuring.
    e.preventDefault();

    // If the frame already exists, re-open it.
    if ( tfstravel_blog_logo ) {
      tfstravel_blog_logo.open();
      return;
    }

    // Sets up the media library frame
    tfstravel_blog_logo = wp.media.frames.tfstravel_blog_logo = wp.media({
      title: meta_image.title,
      button: { text:  meta_image.button },
      library: { type: 'image' }
    });

    // Runs when an image is selected.
    tfstravel_blog_logo.on('select', function(){

      // Grabs the attachment selection and creates a JSON representation of the model.
      var media_attachment = tfstravel_blog_logo.state().get('selection').first().toJSON();

      // Sends the attachment URL to our custom image input field.
      $('#blog-template-logo').val(media_attachment.url);
    });

    // Opens the media library frame.
    tfstravel_blog_logo.open();
  });


  // Instantiates the variable that holds the media library frame.
  var tfstravel_dest_logo;

  // Runs when the image button is clicked.
  $('#dest-travel-logo-button').click(function(e){

    // Prevents the default action from occuring.
    e.preventDefault();

    // If the frame already exists, re-open it.
    if ( tfstravel_dest_logo ) {
      tfstravel_dest_logo.open();
      return;
    }

    // Sets up the media library frame
    tfstravel_dest_logo = wp.media.frames.tfstravel_dest_logo = wp.media({
      title: meta_image.title,
      button: { text:  meta_image.button },
      library: { type: 'image' }
    });

    // Runs when an image is selected.
    tfstravel_dest_logo.on('select', function(){

      // Grabs the attachment selection and creates a JSON representation of the model.
      var media_attachment = tfstravel_dest_logo.state().get('selection').first().toJSON();

      // Sends the attachment URL to our custom image input field.
      $('#dest-travel-logo').val(media_attachment.url);
    });

    // Opens the media library frame.
    tfstravel_dest_logo.open();
  });






});
