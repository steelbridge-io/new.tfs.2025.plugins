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

      // Update the preview
      updateImagePreview('dest-travel-logo', media_attachment.url);

    });

    // Opens the media library frame.
    tfstravel_dest_logo.open();
  });

  // Remove image functionality
  $(document).on('click', '#dest-travel-logo-remove', function(e) {
    e.preventDefault();
    $('#dest-travel-logo').val('');
    $('#dest-travel-logo-preview').html('');
  });

  // Function to update image preview
  function updateImagePreview(fieldId, imageUrl) {
    var previewContainer = $('#' + fieldId + '-preview');
    var previewHtml = '<img src="' + imageUrl + '" style="max-width: 250px; max-height: 250px; border: 1px solid #ddd; padding: 5px;" alt="Preview" />' +
        '<br><button type="button" id="' + fieldId + '-remove" class="button" style="margin-top: 5px;">Remove Image</button>';
    previewContainer.html(previewHtml);
  }

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

      // Update the preview
      updateImagePreview('travel-costs-image', media_attachment.url);
    });

    // Opens the media library frame.
    travel_costs_image.open();
  });

  // Remove image functionality
  $(document).on('click', '#travel-costs-image-remove', function(e) {
    e.preventDefault();
    $('#travel-costs-image').val('');
    $('#travel-costs-image-preview').html('');
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

      // Update the preview
      updateImagePreview('travel-seasons-image', media_attachment.url);
    });

    // Opens the media library frame.
    travel_seasons_image.open();
  });

  // Remove image functionality
  $(document).on('click', '#travel-seasons-image-remove', function(e) {
    e.preventDefault();
    $('#travel-seasons-image').val('');
    $('#travel-seasons-image-preview').html('');
  });

  // Instantiates the variable that holds the media library frame.
  var feature_3_gettingto_img;

  // Runs when the image button is clicked.
  $('#feature-3-getting-to-image-button').click(function(e){

    // Prevents the default action from occuring.
    e.preventDefault();

    // If the frame already exists, re-open it.
    if ( feature_3_gettingto_img ) {
      feature_3_gettingto_img.open();
      return;
    }

    // Sets up the media library frame
    feature_3_gettingto_img = wp.media.frames.feature_3_gettingto_img = wp.media({
      title: meta_image.title,
      button: { text:  meta_image.button },
      library: { type: 'image' }
    });

    // Runs when an image is selected.
    feature_3_gettingto_img.on('select', function(){

      // Grabs the attachment selection and creates a JSON representation of the model.
      var media_attachment = feature_3_gettingto_img.state().get('selection').first().toJSON();

      // Sends the attachment URL to our custom image input field.
      $('#feature-3-getting-to-image').val(media_attachment.url);

      // Update the preview
      updateImagePreview('feature-3-getting-to-image', media_attachment.url);
    });

    // Opens the media library frame.
    feature_3_gettingto_img.open();
  });

  // Remove image functionality
  $(document).on('click', '#feature-3-getting-to-image-remove', function(e) {
    e.preventDefault();
    $('#feature-3-getting-to-image').val('');
    $('#feature-3-getting-to-image-preview').html('');
  });

  // Instantiates the variable that holds the media library frame.
  var feature_4_lodging_img;

  // Runs when the image button is clicked.
  $('#feature-4-lodging-img-button').click(function(e){

    // Prevents the default action from occuring.
    e.preventDefault();

    // If the frame already exists, re-open it.
    if ( feature_4_lodging_img ) {
      feature_4_lodging_img.open();
      return;
    }

    // Sets up the media library frame
    feature_4_lodging_img = wp.media.frames.feature_4_lodging_img = wp.media({
      title: meta_image.title,
      button: { text:  meta_image.button },
      library: { type: 'image' }
    });

    // Runs when an image is selected.
    feature_4_lodging_img.on('select', function(){

      // Grabs the attachment selection and creates a JSON representation of the model.
      var media_attachment = feature_4_lodging_img.state().get('selection').first().toJSON();

      // Sends the attachment URL to our custom image input field.
      $('#feature-4-lodging-img').val(media_attachment.url);

      // Update the preview
      updateImagePreview('feature-4-lodging-img', media_attachment.url);
    });

    // Opens the media library frame.
    feature_4_lodging_img.open();
  });

  // Remove image functionality
  $(document).on('click', '#feature-4-lodging-img-remove', function(e) {
    e.preventDefault();
    $('#feature-4-lodging-img').val('');
    $('#feature-4-lodging-img-preview').html('');
  });

  // Instantiates the variable that holds the media library frame.
  var feature_5_angling_img;

  // Runs when the image button is clicked.
  $('#feature-5-angling-img-button').click(function(e){

    // Prevents the default action from occuring.
    e.preventDefault();

    // If the frame already exists, re-open it.
    if ( feature_5_angling_img ) {
      feature_5_angling_img.open();
      return;
    }

    // Sets up the media library frame
    feature_5_angling_img = wp.media.frames.feature_5_angling_img = wp.media({
      title: meta_image.title,
      button: { text:  meta_image.button },
      library: { type: 'image' }
    });

    // Runs when an image is selected.
    feature_5_angling_img.on('select', function(){

      // Grabs the attachment selection and creates a JSON representation of the model.
      var media_attachment = feature_5_angling_img.state().get('selection').first().toJSON();

      // Sends the attachment URL to our custom image input field.
      $('#feature-5-angling-img').val(media_attachment.url);

      // Update the preview
      updateImagePreview('feature-5-angling-img', media_attachment.url);
    });

    // Opens the media library frame.
    feature_5_angling_img.open();
  });

  // Remove image functionality
  $(document).on('click', '#feature-5-angling-img-remove', function(e) {
    e.preventDefault();
    $('#feature-5-angling-img').val('');
    $('#feature-5-angling-img-preview').html('');
  });

  // Instantiates the variable that holds the media library frame.
  var additional_travel_img1_frame;

  // Runs when the image button is clicked.
  $('#additional-travel-image1-button').click(function(e){

    // Prevents the default action from occuring.
    e.preventDefault();

    // If the frame already exists, re-open it.
    if ( additional_travel_img1_frame ) {
      additional_travel_img1_frame.open();
      return;
    }

    // Sets up the media library frame
    additional_travel_img1_frame = wp.media.frames.additional_travel_img1_frame = wp.media({
      title: meta_image.title,
      button: { text:  meta_image.button },
      library: { type: 'image' }
    });

    // Runs when an image is selected.
    additional_travel_img1_frame.on('select', function(){

      // Grabs the attachment selection and creates a JSON representation of the model.
      var media_attachment = additional_travel_img1_frame.state().get('selection').first().toJSON();

      // Sends the attachment URL to our custom image input field.
      $('#additional-travel-image1').val(media_attachment.url);
    });

    // Opens the media library frame.
    additional_travel_img1_frame.open();
  });

  // Instantiates the variable that holds the media library frame.
  var additional_travel_img2_frame;

  // Runs when the image button is clicked.
  $('#additional-travel-image2-button').click(function(e){

    // Prevents the default action from occuring.
    e.preventDefault();

    // If the frame already exists, re-open it.
    if ( additional_travel_img2_frame ) {
      additional_travel_img2_frame.open();
      return;
    }

    // Sets up the media library frame
    additional_travel_img2_frame = wp.media.frames.additional_travel_img2_frame = wp.media({
      title: meta_image.title,
      button: { text:  meta_image.button },
      library: { type: 'image' }
    });

    // Runs when an image is selected.
    additional_travel_img2_frame.on('select', function(){

      // Grabs the attachment selection and creates a JSON representation of the model.
      var media_attachment = additional_travel_img2_frame.state().get('selection').first().toJSON();

      // Sends the attachment URL to our custom image input field.
      $('#additional-travel-image2').val(media_attachment.url);
    });

    // Opens the media library frame.
    additional_travel_img2_frame.open();
  });

  // Instantiates the variable that holds the media library frame.
  var additional_travel_img3_frame;

  // Runs when the image button is clicked.
  $('#additional-travel-image3-button').click(function(e){

    // Prevents the default action from occuring.
    e.preventDefault();

    // If the frame already exists, re-open it.
    if ( additional_travel_img3_frame ) {
      additional_travel_img3_frame.open();
      return;
    }

    // Sets up the media library frame
    additional_travel_img3_frame = wp.media.frames.additional_travel_img3_frame = wp.media({
      title: meta_image.title,
      button: { text:  meta_image.button },
      library: { type: 'image' }
    });

    // Runs when an image is selected.
    additional_travel_img3_frame.on('select', function(){

      // Grabs the attachment selection and creates a JSON representation of the model.
      var media_attachment = additional_travel_img3_frame.state().get('selection').first().toJSON();

      // Sends the attachment URL to our custom image input field.
      $('#additional-travel-image3').val(media_attachment.url);
    });

    // Opens the media library frame.
    additional_travel_img3_frame.open();
  });

  // Instantiates the variable that holds the media library frame.
  var additional_travel_img4_frame;

  // Runs when the image button is clicked.
  $('#additional-travel-image4-button').click(function(e){

    // Prevents the default action from occuring.
    e.preventDefault();

    // If the frame already exists, re-open it.
    if ( additional_travel_img4_frame ) {
      additional_travel_img4_frame.open();
      return;
    }

    // Sets up the media library frame
    additional_travel_img4_frame = wp.media.frames.additional_travel_img4_frame = wp.media({
      title: meta_image.title,
      button: { text:  meta_image.button },
      library: { type: 'image' }
    });

    // Runs when an image is selected.
    additional_travel_img4_frame.on('select', function(){

      // Grabs the attachment selection and creates a JSON representation of the model.
      var media_attachment = additional_travel_img4_frame.state().get('selection').first().toJSON();

      // Sends the attachment URL to our custom image input field.
      $('#additional-travel-image4').val(media_attachment.url);
    });

    // Opens the media library frame.
    additional_travel_img4_frame.open();
  });

  // Instantiates the variable that holds the media library frame.
  var additional_travel_img5_frame;

  // Runs when the image button is clicked.
  $('#additional-travel-image5-button').click(function(e){

    // Prevents the default action from occuring.
    e.preventDefault();

    // If the frame already exists, re-open it.
    if ( additional_travel_img5_frame ) {
      additional_travel_img5_frame.open();
      return;
    }

    // Sets up the media library frame
    additional_travel_img5_frame = wp.media.frames.additional_travel_img5_frame = wp.media({
      title: meta_image.title,
      button: { text:  meta_image.button },
      library: { type: 'image' }
    });

    // Runs when an image is selected.
    additional_travel_img5_frame.on('select', function(){

      // Grabs the attachment selection and creates a JSON representation of the model.
      var media_attachment = additional_travel_img5_frame.state().get('selection').first().toJSON();

      // Sends the attachment URL to our custom image input field.
      $('#additional-travel-image5').val(media_attachment.url);
    });

    // Opens the media library frame.
    additional_travel_img5_frame.open();
  });

  // Instantiates the variable that holds the media library frame.
  var additional_travel_img6_frame;

  // Runs when the image button is clicked.
  $('#additional-travel-image6-button').click(function(e){

    // Prevents the default action from occuring.
    e.preventDefault();

    // If the frame already exists, re-open it.
    if ( additional_travel_img6_frame ) {
      additional_travel_img6_frame.open();
      return;
    }

    // Sets up the media library frame
    additional_travel_img6_frame = wp.media.frames.additional_travel_img6_frame = wp.media({
      title: meta_image.title,
      button: { text:  meta_image.button },
      library: { type: 'image' }
    });

    // Runs when an image is selected.
    additional_travel_img6_frame.on('select', function(){

      // Grabs the attachment selection and creates a JSON representation of the model.
      var media_attachment = additional_travel_img6_frame.state().get('selection').first().toJSON();

      // Sends the attachment URL to our custom image input field.
      $('#additional-travel-image6').val(media_attachment.url);
    });

    // Opens the media library frame.
    additional_travel_img6_frame.open();
  });

  // Instantiates the variable that holds the media library frame.
  var additional_travel_img7_frame;

  // Runs when the image button is clicked.
  $('#additional-travel-image7-button').click(function(e){

    // Prevents the default action from occuring.
    e.preventDefault();

    // If the frame already exists, re-open it.
    if ( additional_travel_img7_frame ) {
      additional_travel_img7_frame.open();
      return;
    }

    // Sets up the media library frame
    additional_travel_img7_frame = wp.media.frames.additional_travel_img7_frame = wp.media({
      title: meta_image.title,
      button: { text:  meta_image.button },
      library: { type: 'image' }
    });

    // Runs when an image is selected.
    additional_travel_img7_frame.on('select', function(){

      // Grabs the attachment selection and creates a JSON representation of the model.
      var media_attachment = additional_travel_img7_frame.state().get('selection').first().toJSON();

      // Sends the attachment URL to our custom image input field.
      $('#additional-travel-image7').val(media_attachment.url);
    });

    // Opens the media library frame.
    additional_travel_img7_frame.open();
  });

  // Instantiates the variable that holds the media library frame.
  var additional_travel_img8_frame;

  // Runs when the image button is clicked.
  $('#additional-travel-image8-button').click(function(e){

    // Prevents the default action from occuring.
    e.preventDefault();

    // If the frame already exists, re-open it.
    if ( additional_travel_img8_frame ) {
      additional_travel_img8_frame.open();
      return;
    }

    // Sets up the media library frame
    additional_travel_img8_frame = wp.media.frames.additional_travel_img8_frame = wp.media({
      title: meta_image.title,
      button: { text:  meta_image.button },
      library: { type: 'image' }
    });

    // Runs when an image is selected.
    additional_travel_img8_frame.on('select', function(){

      // Grabs the attachment selection and creates a JSON representation of the model.
      var media_attachment = additional_travel_img8_frame.state().get('selection').first().toJSON();

      // Sends the attachment URL to our custom image input field.
      $('#additional-travel-image8').val(media_attachment.url);
    });

    // Opens the media library frame.
    additional_travel_img8_frame.open();
  });

    // Instantiates the variable that holds the media library frame.
    var guide_service_logo_frame;

    // Runs when the image button is clicked.
    $('#guide-service-logo-button').click(function(e){

        // Prevents the default action from occuring.
        e.preventDefault();

        // If the frame already exists, re-open it.
        if ( guide_service_logo_frame ) {
            guide_service_logo_frame.open();
            return;
        }

        // Sets up the media library frame
        guide_service_logo_frame = wp.media.frames.guide_service_logo_frame = wp.media({
            title: meta_image.title,
            button: { text:  meta_image.button },
            library: { type: 'image' }
        });

        // Runs when an image is selected.
        guide_service_logo_frame.on('select', function(){

            // Grabs the attachment selection and creates a JSON representation of the model.
            var media_attachment = guide_service_logo_frame.state().get('selection').first().toJSON();

            // Sends the attachment URL to our custom image input field.
            $('#guide-service-logo').val(media_attachment.url);

            // Update the preview
            updateImagePreview('guide-service-logo', media_attachment.url);
        });

        // Opens the media library frame.
        guide_service_logo_frame.open();
    });
    // Remove image functionality
    $(document).on('click', '#guide-service-logo-remove', function(e) {
        e.preventDefault();
        $('#guide-service-logo').val('');
        $('#guide-service-logo-preview').html('');
    });
});
