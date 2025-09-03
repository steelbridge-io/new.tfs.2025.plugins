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

  // Instantiates the variable that holds the media library frame.
  var travel_costs_image;

  // Runs when the image button is clicked.
  $('#travel-costs-image-button').click(function(e){

    // Prevents the default action from occuring.
    e.preventDefault();

    // If the frame already exists, re-open it.
    if ( travel_costs_image ) {
      travel_costs_image.open();
      return;
    }

    // Sets up the media library frame
    travel_costs_image = wp.media.frames.travel_costs_image = wp.media({
      title: meta_image.title,
      button: { text:  meta_image.button },
      library: { type: 'image' }
    });

    // Runs when an image is selected.
    travel_costs_image.on('select', function(){

      // Grabs the attachment selection and creates a JSON representation of the model.
      var media_attachment = travel_costs_image.state().get('selection').first().toJSON();

      // Sends the attachment URL to our custom image input field.
      $('#travel-costs-image').val(media_attachment.url);
    });

    // Opens the media library frame.
    travel_costs_image.open();
  });

  // Instantiates the variable that holds the media library frame.
  var travel_seasons_image;

  // Runs when the image button is clicked.
  $('#travel-seasons-image-button').click(function(e){

    // Prevents the default action from occuring.
    e.preventDefault();

    // If the frame already exists, re-open it.
    if ( travel_seasons_image ) {
      travel_seasons_image.open();
      return;
    }

    // Sets up the media library frame
    travel_seasons_image = wp.media.frames.travel_seasons_image = wp.media({
      title: meta_image.title,
      button: { text:  meta_image.button },
      library: { type: 'image' }
    });

    // Runs when an image is selected.
    travel_seasons_image.on('select', function(){

      // Grabs the attachment selection and creates a JSON representation of the model.
      var media_attachment = travel_seasons_image.state().get('selection').first().toJSON();

      // Sends the attachment URL to our custom image input field.
      $('#travel-seasons-image').val(media_attachment.url);
    });

    // Opens the media library frame.
    travel_seasons_image.open();
  });

  // Instantiates the variable that holds the media library frame.
  var feature_3_gettingto_image;

  // Runs when the image button is clicked.
  $('#feature-3-gettingto-image-button').click(function(e){

    // Prevents the default action from occuring.
    e.preventDefault();

    // If the frame already exists, re-open it.
    if ( feature_3_gettingto_image ) {
      feature_3_gettingto_image.open();
      return;
    }

    // Sets up the media library frame
    feature_3_gettingto_image = wp.media.frames.feature_3_gettingto_image = wp.media({
      title: meta_image.title,
      button: { text:  meta_image.button },
      library: { type: 'image' }
    });

    // Runs when an image is selected.
    feature_3_gettingto_image.on('select', function(){

      // Grabs the attachment selection and creates a JSON representation of the model.
      var media_attachment = feature_3_gettingto_image.state().get('selection').first().toJSON();

      // Sends the attachment URL to our custom image input field.
      $('#feature-3-gettingto-image').val(media_attachment.url);
    });

    // Opens the media library frame.
    feature_3_gettingto_image.open();
  });

  // Instantiates the variable that holds the media library frame.
  var feature_4_lodging_image;

  // Runs when the image button is clicked.
  $('#feature-4-lodging-image-button').click(function(e){

    // Prevents the default action from occuring.
    e.preventDefault();

    // If the frame already exists, re-open it.
    if ( feature_4_lodging_image ) {
      feature_4_lodging_image.open();
      return;
    }

    // Sets up the media library frame
    feature_4_lodging_image = wp.media.frames.feature_4_lodging_image = wp.media({
      title: meta_image.title,
      button: { text:  meta_image.button },
      library: { type: 'image' }
    });

    // Runs when an image is selected.
    feature_4_lodging_image.on('select', function(){

      // Grabs the attachment selection and creates a JSON representation of the model.
      var media_attachment = feature_4_lodging_image.state().get('selection').first().toJSON();

      // Sends the attachment URL to our custom image input field.
      $('#feature-4-lodging-image').val(media_attachment.url);
    });

    // Opens the media library frame.
    feature_4_lodging_image.open();
  });

  // Instantiates the variable that holds the media library frame.
  var feature_5_angling_image;

  // Runs when the image button is clicked.
  $('#feature-5-angling-image-button').click(function(e){

    // Prevents the default action from occuring.
    e.preventDefault();

    // If the frame already exists, re-open it.
    if ( feature_5_angling_image ) {
      feature_5_angling_image.open();
      return;
    }

    // Sets up the media library frame
    feature_5_angling_image = wp.media.frames.feature_5_angling_image = wp.media({
      title: meta_image.title,
      button: { text:  meta_image.button },
      library: { type: 'image' }
    });

    // Runs when an image is selected.
    feature_5_angling_image.on('select', function(){

      // Grabs the attachment selection and creates a JSON representation of the model.
      var media_attachment = feature_5_angling_image.state().get('selection').first().toJSON();

      // Sends the attachment URL to our custom image input field.
      $('#feature-5-angling-image').val(media_attachment.url);
    });

    // Opens the media library frame.
    feature_5_angling_image.open();
  });

  // Instantiates the variable that holds the media library frame.
  var additional_travel_image1_frame;

  // Runs when the image button is clicked.
  $('#additional-travel-image1-button').click(function(e){

    // Prevents the default action from occuring.
    e.preventDefault();

    // If the frame already exists, re-open it.
    if ( additional_travel_image1_frame ) {
      additional_travel_image1_frame.open();
      return;
    }

    // Sets up the media library frame
    additional_travel_image1_frame = wp.media.frames.additional_travel_image1_frame = wp.media({
      title: meta_image.title,
      button: { text:  meta_image.button },
      library: { type: 'image' }
    });

    // Runs when an image is selected.
    additional_travel_image1_frame.on('select', function(){

      // Grabs the attachment selection and creates a JSON representation of the model.
      var media_attachment = additional_travel_image1_frame.state().get('selection').first().toJSON();

      // Sends the attachment URL to our custom image input field.
      $('#additional-travel-image1').val(media_attachment.url);
    });

    // Opens the media library frame.
    additional_travel_image1_frame.open();
  });

  // Instantiates the variable that holds the media library frame.
  var additional_travel_image2_frame;

  // Runs when the image button is clicked.
  $('#additional-travel-image2-button').click(function(e){

    // Prevents the default action from occuring.
    e.preventDefault();

    // If the frame already exists, re-open it.
    if ( additional_travel_image2_frame ) {
      additional_travel_image2_frame.open();
      return;
    }

    // Sets up the media library frame
    additional_travel_image2_frame = wp.media.frames.additional_travel_image2_frame = wp.media({
      title: meta_image.title,
      button: { text:  meta_image.button },
      library: { type: 'image' }
    });

    // Runs when an image is selected.
    additional_travel_image2_frame.on('select', function(){

      // Grabs the attachment selection and creates a JSON representation of the model.
      var media_attachment = additional_travel_image2_frame.state().get('selection').first().toJSON();

      // Sends the attachment URL to our custom image input field.
      $('#additional-travel-image2').val(media_attachment.url);
    });

    // Opens the media library frame.
    additional_travel_image2_frame.open();
  });

  // Instantiates the variable that holds the media library frame.
  var additional_travel_image3_frame;

  // Runs when the image button is clicked.
  $('#additional-travel-image3-button').click(function(e){

    // Prevents the default action from occuring.
    e.preventDefault();

    // If the frame already exists, re-open it.
    if ( additional_travel_image3_frame ) {
      additional_travel_image3_frame.open();
      return;
    }

    // Sets up the media library frame
    additional_travel_image3_frame = wp.media.frames.additional_travel_image3_frame = wp.media({
      title: meta_image.title,
      button: { text:  meta_image.button },
      library: { type: 'image' }
    });

    // Runs when an image is selected.
    additional_travel_image3_frame.on('select', function(){

      // Grabs the attachment selection and creates a JSON representation of the model.
      var media_attachment = additional_travel_image3_frame.state().get('selection').first().toJSON();

      // Sends the attachment URL to our custom image input field.
      $('#additional-travel-image3').val(media_attachment.url);
    });

    // Opens the media library frame.
    additional_travel_image3_frame.open();
  });

  // Instantiates the variable that holds the media library frame.
  var additional_travel_image4_frame;

  // Runs when the image button is clicked.
  $('#additional-travel-image4-button').click(function(e){

    // Prevents the default action from occuring.
    e.preventDefault();

    // If the frame already exists, re-open it.
    if ( additional_travel_image4_frame ) {
      additional_travel_image4_frame.open();
      return;
    }

    // Sets up the media library frame
    additional_travel_image4_frame = wp.media.frames.additional_travel_image4_frame = wp.media({
      title: meta_image.title,
      button: { text:  meta_image.button },
      library: { type: 'image' }
    });

    // Runs when an image is selected.
    additional_travel_image4_frame.on('select', function(){

      // Grabs the attachment selection and creates a JSON representation of the model.
      var media_attachment = additional_travel_image4_frame.state().get('selection').first().toJSON();

      // Sends the attachment URL to our custom image input field.
      $('#additional-travel-image4').val(media_attachment.url);
    });

    // Opens the media library frame.
    additional_travel_image4_frame.open();
  });

  // Instantiates the variable that holds the media library frame.
  var additional_travel_image5_frame;

  // Runs when the image button is clicked.
  $('#additional-travel-image5-button').click(function(e){

    // Prevents the default action from occuring.
    e.preventDefault();

    // If the frame already exists, re-open it.
    if ( additional_travel_image5_frame ) {
      additional_travel_image5_frame.open();
      return;
    }

    // Sets up the media library frame
    additional_travel_image5_frame = wp.media.frames.additional_travel_image5_frame = wp.media({
      title: meta_image.title,
      button: { text:  meta_image.button },
      library: { type: 'image' }
    });

    // Runs when an image is selected.
    additional_travel_image5_frame.on('select', function(){

      // Grabs the attachment selection and creates a JSON representation of the model.
      var media_attachment = additional_travel_image5_frame.state().get('selection').first().toJSON();

      // Sends the attachment URL to our custom image input field.
      $('#additional-travel-image5').val(media_attachment.url);
    });

    // Opens the media library frame.
    additional_travel_image5_frame.open();
  });

  // Instantiates the variable that holds the media library frame.
  var additional_travel_image6_frame;

  // Runs when the image button is clicked.
  $('#additional-travel-image6-button').click(function(e){

    // Prevents the default action from occuring.
    e.preventDefault();

    // If the frame already exists, re-open it.
    if ( additional_travel_image6_frame ) {
      additional_travel_image6_frame.open();
      return;
    }

    // Sets up the media library frame
    additional_travel_image6_frame = wp.media.frames.additional_travel_image6_frame = wp.media({
      title: meta_image.title,
      button: { text:  meta_image.button },
      library: { type: 'image' }
    });

    // Runs when an image is selected.
    additional_travel_image6_frame.on('select', function(){

      // Grabs the attachment selection and creates a JSON representation of the model.
      var media_attachment = additional_travel_image6_frame.state().get('selection').first().toJSON();

      // Sends the attachment URL to our custom image input field.
      $('#additional-travel-image6').val(media_attachment.url);
    });

    // Opens the media library frame.
    additional_travel_image6_frame.open();
  });

  // Instantiates the variable that holds the media library frame.
  var additional_travel_image7_frame;

  // Runs when the image button is clicked.
  $('#additional-travel-image7-button').click(function(e){

    // Prevents the default action from occuring.
    e.preventDefault();

    // If the frame already exists, re-open it.
    if ( additional_travel_image7_frame ) {
      additional_travel_image7_frame.open();
      return;
    }

    // Sets up the media library frame
    additional_travel_image7_frame = wp.media.frames.additional_travel_image7_frame = wp.media({
      title: meta_image.title,
      button: { text:  meta_image.button },
      library: { type: 'image' }
    });

    // Runs when an image is selected.
    additional_travel_image7_frame.on('select', function(){

      // Grabs the attachment selection and creates a JSON representation of the model.
      var media_attachment = additional_travel_image7_frame.state().get('selection').first().toJSON();

      // Sends the attachment URL to our custom image input field.
      $('#additional-travel-image7').val(media_attachment.url);
    });

    // Opens the media library frame.
    additional_travel_image7_frame.open();
  });

  // Instantiates the variable that holds the media library frame.
  var additional_travel_image8_frame;

  // Runs when the image button is clicked.
  $('#additional-travel-image8-button').click(function(e){

    // Prevents the default action from occuring.
    e.preventDefault();

    // If the frame already exists, re-open it.
    if ( additional_travel_image8_frame ) {
      additional_travel_image8_frame.open();
      return;
    }

    // Sets up the media library frame
    additional_travel_image8_frame = wp.media.frames.additional_travel_image8_frame = wp.media({
      title: meta_image.title,
      button: { text:  meta_image.button },
      library: { type: 'image' }
    });

    // Runs when an image is selected.
    additional_travel_image8_frame.on('select', function(){

      // Grabs the attachment selection and creates a JSON representation of the model.
      var media_attachment = additional_travel_image8_frame.state().get('selection').first().toJSON();

      // Sends the attachment URL to our custom image input field.
      $('#additional-travel-image8').val(media_attachment.url);
    });

    // Opens the media library frame.
    additional_travel_image8_frame.open();
  });

});
