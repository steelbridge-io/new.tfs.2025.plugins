/*
 * Attaches the image uploader to the input field
 */

jQuery(document).ready( function($){ "use strict";

    // Signature Travel Template.
       var sig_travel_logo_frame;

    // Runs when the image button is clicked.
    $('#signature-travel-logo-button').click(function(e){

        // Prevents the default action from occuring.
        e.preventDefault();

        // If the frame already exists, re-open it.
        if ( sig_travel_logo_frame ) {
            sig_travel_logo_frame.open();
            return;
        }

        // Sets up the media library frame
        sig_travel_logo_frame = wp.media.frames.sig_travel_logo_frame = wp.media({
            title: meta_image.title,
            button: { text:  meta_image.button },
            library: { type: 'image' }
        });

        // Runs when an image is selected.
        sig_travel_logo_frame.on('select', function(){

            // Grabs the attachment selection and creates a JSON representation of the model.
            var media_attachment = sig_travel_logo_frame.state().get('selection').first().toJSON();

            // Sends the attachment URL to our custom image input field.
            $('#signature-travel-logo').val(media_attachment.url);
        });

        // Opens the media library frame.
        sig_travel_logo_frame.open();
    });


// Signature Travel Template.
    var sig_travel_csel_1_img_frame;

    // Runs when the image button is clicked.
    $('#signature-travel-csel-1-img-button').click(function(e){

        // Prevents the default action from occuring.
        e.preventDefault();

        // If the frame already exists, re-open it.
        if ( sig_travel_csel_1_img_frame ) {
            sig_travel_csel_1_img_frame.open();
            return;
        }

        // Sets up the media library frame
        sig_travel_csel_1_img_frame = wp.media.frames.sig_travel_csel_1_img_frame = wp.media({
            title: meta_image.title,
            button: { text:  meta_image.button },
            library: { type: 'image' }
        });

        // Runs when an image is selected.
        sig_travel_csel_1_img_frame.on('select', function(){

            // Grabs the attachment selection and creates a JSON representation of the model.
            var media_attachment = sig_travel_csel_1_img_frame.state().get('selection').first().toJSON();

            // Sends the attachment URL to our custom image input field.
            $('#signature-travel-csel-1-img').val(media_attachment.url);
        });

        // Opens the media library frame.
        sig_travel_csel_1_img_frame.open();
    });

    // Signature Travel Template.
    var sig_travel_csel_2_img_frame;

    // Runs when the image button is clicked.
    $('#signature-travel-csel-2-img-button').click(function(e){

        // Prevents the default action from occuring.
        e.preventDefault();

        // If the frame already exists, re-open it.
        if ( sig_travel_csel_2_img_frame ) {
            sig_travel_csel_2_img_frame.open();
            return;
        }

        // Sets up the media library frame
        sig_travel_csel_2_img_frame = wp.media.frames.sig_travel_csel_2_img_frame = wp.media({
            title: meta_image.title,
            button: { text:  meta_image.button },
            library: { type: 'image' }
        });

        // Runs when an image is selected.
        sig_travel_csel_2_img_frame.on('select', function(){

            // Grabs the attachment selection and creates a JSON representation of the model.
            var media_attachment = sig_travel_csel_2_img_frame.state().get('selection').first().toJSON();

            // Sends the attachment URL to our custom image input field.
            $('#signature-travel-csel-2-img').val(media_attachment.url);
        });

        // Opens the media library frame.
        sig_travel_csel_2_img_frame.open();
    });

    // Signature Travel Template.
    var sig_travel_csel_3_img_frame;

    // Runs when the image button is clicked.
    $('#signature-travel-csel-3-img-button').click(function(e){

        // Prevents the default action from occuring.
        e.preventDefault();

        // If the frame already exists, re-open it.
        if ( sig_travel_csel_3_img_frame ) {
            sig_travel_csel_3_img_frame.open();
            return;
        }

        // Sets up the media library frame
        sig_travel_csel_3_img_frame = wp.media.frames.sig_travel_csel_3_img_frame = wp.media({
            title: meta_image.title,
            button: { text:  meta_image.button },
            library: { type: 'image' }
        });

        // Runs when an image is selected.
        sig_travel_csel_3_img_frame.on('select', function(){

            // Grabs the attachment selection and creates a JSON representation of the model.
            var media_attachment = sig_travel_csel_3_img_frame.state().get('selection').first().toJSON();

            // Sends the attachment URL to our custom image input field.
            $('#signature-travel-csel-3-img').val(media_attachment.url);
        });

        // Opens the media library frame.
        sig_travel_csel_3_img_frame.open();
    });

    // Signature Travel Template.
    var sig_travel_csel_4_img_frame;

    // Runs when the image button is clicked.
    $('#signature-travel-csel-4-img-button').click(function(e){

        // Prevents the default action from occuring.
        e.preventDefault();

        // If the frame already exists, re-open it.
        if ( sig_travel_csel_4_img_frame ) {
            sig_travel_csel_4_img_frame.open();
            return;
        }

        // Sets up the media library frame
        sig_travel_csel_4_img_frame = wp.media.frames.sig_travel_csel_4_img_frame = wp.media({
            title: meta_image.title,
            button: { text:  meta_image.button },
            library: { type: 'image' }
        });

        // Runs when an image is selected.
        sig_travel_csel_4_img_frame.on('select', function(){

            // Grabs the attachment selection and creates a JSON representation of the model.
            var media_attachment = sig_travel_csel_4_img_frame.state().get('selection').first().toJSON();

            // Sends the attachment URL to our custom image input field.
            $('#signature-travel-csel-4-img').val(media_attachment.url);
        });

        // Opens the media library frame.
        sig_travel_csel_4_img_frame.open();
    });

    // Signature Travel Template.
    var sig_travel_csel_5_img_frame;

    // Runs when the image button is clicked.
    $('#signature-travel-csel-5-img-button').click(function(e){

        // Prevents the default action from occuring.
        e.preventDefault();

        // If the frame already exists, re-open it.
        if ( sig_travel_csel_5_img_frame ) {
            sig_travel_csel_5_img_frame.open();
            return;
        }

        // Sets up the media library frame
        sig_travel_csel_5_img_frame = wp.media.frames.sig_travel_csel_5_img_frame = wp.media({
            title: meta_image.title,
            button: { text:  meta_image.button },
            library: { type: 'image' }
        });

        // Runs when an image is selected.
        sig_travel_csel_5_img_frame.on('select', function(){

            // Grabs the attachment selection and creates a JSON representation of the model.
            var media_attachment = sig_travel_csel_5_img_frame.state().get('selection').first().toJSON();

            // Sends the attachment URL to our custom image input field.
            $('#signature-travel-csel-5-img').val(media_attachment.url);
        });

        // Opens the media library frame.
        sig_travel_csel_5_img_frame.open();
    });

    // Signature Travel Template.
    var sig_travel_csel_6_img_frame;

    // Runs when the image button is clicked.
    $('#signature-travel-csel-6-img-button').click(function(e){

        // Prevents the default action from occuring.
        e.preventDefault();

        // If the frame already exists, re-open it.
        if ( sig_travel_csel_6_img_frame ) {
            sig_travel_csel_6_img_frame.open();
            return;
        }

        // Sets up the media library frame
        sig_travel_csel_6_img_frame = wp.media.frames.sig_travel_csel_6_img_frame = wp.media({
            title: meta_image.title,
            button: { text:  meta_image.button },
            library: { type: 'image' }
        });

        // Runs when an image is selected.
        sig_travel_csel_6_img_frame.on('select', function(){

            // Grabs the attachment selection and creates a JSON representation of the model.
            var media_attachment = sig_travel_csel_6_img_frame.state().get('selection').first().toJSON();

            // Sends the attachment URL to our custom image input field.
            $('#signature-travel-csel-6-img').val(media_attachment.url);
        });

        // Opens the media library frame.
        sig_travel_csel_6_img_frame.open();
    });

    // Signature Travel Template.
    var sig_travel_1_image_frame;

    // Runs when the image button is clicked.
    $('#signature-travel-1-image-button').click(function(e){

        // Prevents the default action from occuring.
        e.preventDefault();

        // If the frame already exists, re-open it.
        if ( sig_travel_1_image_frame ) {
            sig_travel_1_image_frame.open();
            return;
        }

        // Sets up the media library frame
        sig_travel_1_image_frame = wp.media.frames.sig_travel_1_image_frame = wp.media({
            title: meta_image.title,
            button: { text:  meta_image.button },
            library: { type: 'image' }
        });

        // Runs when an image is selected.
        sig_travel_1_image_frame.on('select', function(){

            // Grabs the attachment selection and creates a JSON representation of the model.
            var media_attachment = sig_travel_1_image_frame.state().get('selection').first().toJSON();

            // Sends the attachment URL to our custom image input field.
            $('#signature-travel-1-image').val(media_attachment.url);
        });

        // Opens the media library frame.
        sig_travel_1_image_frame.open();
    });

    // Signature Travel Template.
    var sig_travel_2_image_frame;

    // Runs when the image button is clicked.
    $('#signature-travel-2-image-button').click(function(e){

        // Prevents the default action from occuring.
        e.preventDefault();

        // If the frame already exists, re-open it.
        if ( sig_travel_2_image_frame ) {
            sig_travel_2_image_frame.open();
            return;
        }

        // Sets up the media library frame
        sig_travel_2_image_frame = wp.media.frames.sig_travel_2_image_frame = wp.media({
            title: meta_image.title,
            button: { text:  meta_image.button },
            library: { type: 'image' }
        });

        // Runs when an image is selected.
        sig_travel_2_image_frame.on('select', function(){

            // Grabs the attachment selection and creates a JSON representation of the model.
            var media_attachment = sig_travel_2_image_frame.state().get('selection').first().toJSON();

            // Sends the attachment URL to our custom image input field.
            $('#signature-travel-2-image').val(media_attachment.url);
        });

        // Opens the media library frame.
        sig_travel_2_image_frame.open();
    });

    // Signature Travel Template.
    var sig_travel_3_image_frame;

    // Runs when the image button is clicked.
    $('#signature-travel-3-image-button').click(function(e){

        // Prevents the default action from occuring.
        e.preventDefault();

        // If the frame already exists, re-open it.
        if ( sig_travel_3_image_frame ) {
            sig_travel_3_image_frame.open();
            return;
        }

        // Sets up the media library frame
        sig_travel_3_image_frame = wp.media.frames.sig_travel_3_image_frame = wp.media({
            title: meta_image.title,
            button: { text:  meta_image.button },
            library: { type: 'image' }
        });

        // Runs when an image is selected.
        sig_travel_3_image_frame.on('select', function(){

            // Grabs the attachment selection and creates a JSON representation of the model.
            var media_attachment = sig_travel_3_image_frame.state().get('selection').first().toJSON();

            // Sends the attachment URL to our custom image input field.
            $('#signature-travel-3-image').val(media_attachment.url);
        });

        // Opens the media library frame.
        sig_travel_3_image_frame.open();
    });

    // Signature Travel Template.
    var sig_travel_4_image_frame;

    // Runs when the image button is clicked.
    $('#signature-travel-4-image-button').click(function(e){

        // Prevents the default action from occuring.
        e.preventDefault();

        // If the frame already exists, re-open it.
        if ( sig_travel_4_image_frame ) {
            sig_travel_4_image_frame.open();
            return;
        }

        // Sets up the media library frame
        sig_travel_4_image_frame = wp.media.frames.sig_travel_4_image_frame = wp.media({
            title: meta_image.title,
            button: { text:  meta_image.button },
            library: { type: 'image' }
        });

        // Runs when an image is selected.
        sig_travel_4_image_frame.on('select', function(){

            // Grabs the attachment selection and creates a JSON representation of the model.
            var media_attachment = sig_travel_4_image_frame.state().get('selection').first().toJSON();

            // Sends the attachment URL to our custom image input field.
            $('#signature-travel-4-image').val(media_attachment.url);
        });

        // Opens the media library frame.
        sig_travel_4_image_frame.open();
    });

    // Signature Travel Template.
    var sig_travel_5_image_frame;

    // Runs when the image button is clicked.
    $('#signature-travel-5-image-button').click(function(e){

        // Prevents the default action from occuring.
        e.preventDefault();

        // If the frame already exists, re-open it.
        if ( sig_travel_5_image_frame ) {
            sig_travel_5_image_frame.open();
            return;
        }

        // Sets up the media library frame
        sig_travel_5_image_frame = wp.media.frames.sig_travel_5_image_frame = wp.media({
            title: meta_image.title,
            button: { text:  meta_image.button },
            library: { type: 'image' }
        });

        // Runs when an image is selected.
        sig_travel_5_image_frame.on('select', function(){

            // Grabs the attachment selection and creates a JSON representation of the model.
            var media_attachment = sig_travel_5_image_frame.state().get('selection').first().toJSON();

            // Sends the attachment URL to our custom image input field.
            $('#signature-travel-5-image').val(media_attachment.url);
        });

        // Opens the media library frame.
        sig_travel_5_image_frame.open();
    });

    // Signature Travel Template.
    var sig_travel_6_image_frame;

    // Runs when the image button is clicked.
    $('#signature-travel-6-image-button').click(function(e){

        // Prevents the default action from occuring.
        e.preventDefault();

        // If the frame already exists, re-open it.
        if ( sig_travel_6_image_frame ) {
            sig_travel_6_image_frame.open();
            return;
        }

        // Sets up the media library frame
        sig_travel_6_image_frame = wp.media.frames.sig_travel_6_image_frame = wp.media({
            title: meta_image.title,
            button: { text:  meta_image.button },
            library: { type: 'image' }
        });

        // Runs when an image is selected.
        sig_travel_6_image_frame.on('select', function(){

            // Grabs the attachment selection and creates a JSON representation of the model.
            var media_attachment = sig_travel_6_image_frame.state().get('selection').first().toJSON();

            // Sends the attachment URL to our custom image input field.
            $('#signature-travel-6-image').val(media_attachment.url);
        });

        // Opens the media library frame.
        sig_travel_6_image_frame.open();
    });

    // Signature Travel Template.
    var sig_travel_7_image_frame;

    // Runs when the image button is clicked.
    $('#signature-travel-7-image-button').click(function(e){

        // Prevents the default action from occuring.
        e.preventDefault();

        // If the frame already exists, re-open it.
        if ( sig_travel_7_image_frame ) {
            sig_travel_7_image_frame.open();
            return;
        }

        // Sets up the media library frame
        sig_travel_7_image_frame = wp.media.frames.sig_travel_7_image_frame = wp.media({
            title: meta_image.title,
            button: { text:  meta_image.button },
            library: { type: 'image' }
        });

        // Runs when an image is selected.
        sig_travel_7_image_frame.on('select', function(){

            // Grabs the attachment selection and creates a JSON representation of the model.
            var media_attachment = sig_travel_7_image_frame.state().get('selection').first().toJSON();

            // Sends the attachment URL to our custom image input field.
            $('#signature-travel-7-image').val(media_attachment.url);
        });

        // Opens the media library frame.
        sig_travel_7_image_frame.open();
    });

    // Signature Travel Template.
    var sig_travel_8_image_frame;

    // Runs when the image button is clicked.
    $('#signature-travel-8-image-button').click(function(e){

        // Prevents the default action from occuring.
        e.preventDefault();

        // If the frame already exists, re-open it.
        if ( sig_travel_8_image_frame ) {
            sig_travel_8_image_frame.open();
            return;
        }

        // Sets up the media library frame
        sig_travel_8_image_frame = wp.media.frames.sig_travel_8_image_frame = wp.media({
            title: meta_image.title,
            button: { text:  meta_image.button },
            library: { type: 'image' }
        });

        // Runs when an image is selected.
        sig_travel_8_image_frame.on('select', function(){

            // Grabs the attachment selection and creates a JSON representation of the model.
            var media_attachment = sig_travel_8_image_frame.state().get('selection').first().toJSON();

            // Sends the attachment URL to our custom image input field.
            $('#signature-travel-8-image').val(media_attachment.url);
        });

        // Opens the media library frame.
        sig_travel_8_image_frame.open();
    });

    // Signature Travel Template.
    var sig_travel_9_image_frame;

    // Runs when the image button is clicked.
    $('#signature-travel-9-image-button').click(function(e){

        // Prevents the default action from occuring.
        e.preventDefault();

        // If the frame already exists, re-open it.
        if ( sig_travel_9_image_frame ) {
            sig_travel_9_image_frame.open();
            return;
        }

        // Sets up the media library frame
        sig_travel_9_image_frame = wp.media.frames.sig_travel_9_image_frame = wp.media({
            title: meta_image.title,
            button: { text:  meta_image.button },
            library: { type: 'image' }
        });

        // Runs when an image is selected.
        sig_travel_9_image_frame.on('select', function(){

            // Grabs the attachment selection and creates a JSON representation of the model.
            var media_attachment = sig_travel_9_image_frame.state().get('selection').first().toJSON();

            // Sends the attachment URL to our custom image input field.
            $('#signature-travel-9-image').val(media_attachment.url);
        });

        // Opens the media library frame.
        sig_travel_9_image_frame.open();
    });

    // Signature Travel Template.
    var sig_travel_10_image_frame;

    // Runs when the image button is clicked.
    $('#signature-travel-10-image-button').click(function(e){

        // Prevents the default action from occuring.
        e.preventDefault();

        // If the frame already exists, re-open it.
        if ( sig_travel_10_image_frame ) {
            sig_travel_10_image_frame.open();
            return;
        }

        // Sets up the media library frame
        sig_travel_10_image_frame = wp.media.frames.sig_travel_10_image_frame = wp.media({
            title: meta_image.title,
            button: { text:  meta_image.button },
            library: { type: 'image' }
        });

        // Runs when an image is selected.
        sig_travel_10_image_frame.on('select', function(){

            // Grabs the attachment selection and creates a JSON representation of the model.
            var media_attachment = sig_travel_10_image_frame.state().get('selection').first().toJSON();

            // Sends the attachment URL to our custom image input field.
            $('#signature-travel-10-image').val(media_attachment.url);
        });

        // Opens the media library frame.
        sig_travel_10_image_frame.open();
    });

    // Signature Travel Template.
    var sig_travel_11_image_frame;

    // Runs when the image button is clicked.
    $('#signature-travel-11-image-button').click(function(e){

        // Prevents the default action from occuring.
        e.preventDefault();

        // If the frame already exists, re-open it.
        if ( sig_travel_11_image_frame ) {
            sig_travel_11_image_frame.open();
            return;
        }

        // Sets up the media library frame
        sig_travel_11_image_frame = wp.media.frames.sig_travel_11_image_frame = wp.media({
            title: meta_image.title,
            button: { text:  meta_image.button },
            library: { type: 'image' }
        });

        // Runs when an image is selected.
        sig_travel_11_image_frame.on('select', function(){

            // Grabs the attachment selection and creates a JSON representation of the model.
            var media_attachment = sig_travel_11_image_frame.state().get('selection').first().toJSON();

            // Sends the attachment URL to our custom image input field.
            $('#signature-travel-11-image').val(media_attachment.url);
        });

        // Opens the media library frame.
        sig_travel_11_image_frame.open();
    });

    // Signature Travel Template.
    var sig_travel_12_image_frame;

    // Runs when the image button is clicked.
    $('#signature-travel-12-image-button').click(function(e){

        // Prevents the default action from occuring.
        e.preventDefault();

        // If the frame already exists, re-open it.
        if ( sig_travel_12_image_frame ) {
            sig_travel_12_image_frame.open();
            return;
        }

        // Sets up the media library frame
        sig_travel_12_image_frame = wp.media.frames.sig_travel_12_image_frame = wp.media({
            title: meta_image.title,
            button: { text:  meta_image.button },
            library: { type: 'image' }
        });

        // Runs when an image is selected.
        sig_travel_12_image_frame.on('select', function(){

            // Grabs the attachment selection and creates a JSON representation of the model.
            var media_attachment = sig_travel_12_image_frame.state().get('selection').first().toJSON();

            // Sends the attachment URL to our custom image input field.
            $('#signature-travel-12-image').val(media_attachment.url);
        });

        // Opens the media library frame.
        sig_travel_12_image_frame.open();
    });

    // Signature Travel Template.
    var sig_travel_13_image_frame;

    // Runs when the image button is clicked.
    $('#signature-travel-13-image-button').click(function(e){

        // Prevents the default action from occuring.
        e.preventDefault();

        // If the frame already exists, re-open it.
        if ( sig_travel_13_image_frame ) {
            sig_travel_13_image_frame.open();
            return;
        }

        // Sets up the media library frame
        sig_travel_13_image_frame = wp.media.frames.sig_travel_13_image_frame = wp.media({
            title: meta_image.title,
            button: { text:  meta_image.button },
            library: { type: 'image' }
        });

        // Runs when an image is selected.
        sig_travel_13_image_frame.on('select', function(){

            // Grabs the attachment selection and creates a JSON representation of the model.
            var media_attachment = sig_travel_13_image_frame.state().get('selection').first().toJSON();

            // Sends the attachment URL to our custom image input field.
            $('#signature-travel-13-image').val(media_attachment.url);
        });

        // Opens the media library frame.
        sig_travel_13_image_frame.open();
    });

    // Signature Travel Template.
    var sig_travel_14_image_frame;

    // Runs when the image button is clicked.
    $('#signature-travel-14-image-button').click(function(e){

        // Prevents the default action from occuring.
        e.preventDefault();

        // If the frame already exists, re-open it.
        if ( sig_travel_14_image_frame ) {
            sig_travel_14_image_frame.open();
            return;
        }

        // Sets up the media library frame
        sig_travel_14_image_frame = wp.media.frames.sig_travel_14_image_frame = wp.media({
            title: meta_image.title,
            button: { text:  meta_image.button },
            library: { type: 'image' }
        });

        // Runs when an image is selected.
        sig_travel_14_image_frame.on('select', function(){

            // Grabs the attachment selection and creates a JSON representation of the model.
            var media_attachment = sig_travel_14_image_frame.state().get('selection').first().toJSON();

            // Sends the attachment URL to our custom image input field.
            $('#signature-travel-14-image').val(media_attachment.url);
        });

        // Opens the media library frame.
        sig_travel_14_image_frame.open();
    });

    // Signature Travel Template.
    var sig_travel_15_image_frame;

    // Runs when the image button is clicked.
    $('#signature-travel-15-image-button').click(function(e){

        // Prevents the default action from occuring.
        e.preventDefault();

        // If the frame already exists, re-open it.
        if ( sig_travel_15_image_frame ) {
            sig_travel_15_image_frame.open();
            return;
        }

        // Sets up the media library frame
        sig_travel_15_image_frame = wp.media.frames.sig_travel_15_image_frame = wp.media({
            title: meta_image.title,
            button: { text:  meta_image.button },
            library: { type: 'image' }
        });

        // Runs when an image is selected.
        sig_travel_15_image_frame.on('select', function(){

            // Grabs the attachment selection and creates a JSON representation of the model.
            var media_attachment = sig_travel_15_image_frame.state().get('selection').first().toJSON();

            // Sends the attachment URL to our custom image input field.
            $('#signature-travel-15-image').val(media_attachment.url);
        });

        // Opens the media library frame.
        sig_travel_15_image_frame.open();
    });

    // Signature Travel Template.
    var sig_travel_16_image_frame;

    // Runs when the image button is clicked.
    $('#signature-travel-16-image-button').click(function(e){

        // Prevents the default action from occuring.
        e.preventDefault();

        // If the frame already exists, re-open it.
        if ( sig_travel_16_image_frame ) {
            sig_travel_16_image_frame.open();
            return;
        }

        // Sets up the media library frame
        sig_travel_16_image_frame = wp.media.frames.sig_travel_16_image_frame = wp.media({
            title: meta_image.title,
            button: { text:  meta_image.button },
            library: { type: 'image' }
        });

        // Runs when an image is selected.
        sig_travel_16_image_frame.on('select', function(){

            // Grabs the attachment selection and creates a JSON representation of the model.
            var media_attachment = sig_travel_16_image_frame.state().get('selection').first().toJSON();

            // Sends the attachment URL to our custom image input field.
            $('#signature-travel-16-image').val(media_attachment.url);
        });

        // Opens the media library frame.
        sig_travel_16_image_frame.open();
    });

    // Signature Travel Template.
    var sig_travel_17_image_frame;

    // Runs when the image button is clicked.
    $('#signature-travel-17-image-button').click(function(e){

        // Prevents the default action from occuring.
        e.preventDefault();

        // If the frame already exists, re-open it.
        if ( sig_travel_17_image_frame ) {
            sig_travel_17_image_frame.open();
            return;
        }

        // Sets up the media library frame
        sig_travel_17_image_frame = wp.media.frames.sig_travel_17_image_frame = wp.media({
            title: meta_image.title,
            button: { text:  meta_image.button },
            library: { type: 'image' }
        });

        // Runs when an image is selected.
        sig_travel_17_image_frame.on('select', function(){

            // Grabs the attachment selection and creates a JSON representation of the model.
            var media_attachment = sig_travel_17_image_frame.state().get('selection').first().toJSON();

            // Sends the attachment URL to our custom image input field.
            $('#signature-travel-17-image').val(media_attachment.url);
        });

        // Opens the media library frame.
        sig_travel_17_image_frame.open();
    });

    // Signature Travel Template.
    var sig_travel_18_image_frame;

    // Runs when the image button is clicked.
    $('#signature-travel-18-image-button').click(function(e){

        // Prevents the default action from occuring.
        e.preventDefault();

        // If the frame already exists, re-open it.
        if ( sig_travel_18_image_frame ) {
            sig_travel_18_image_frame.open();
            return;
        }

        // Sets up the media library frame
        sig_travel_18_image_frame = wp.media.frames.sig_travel_18_image_frame = wp.media({
            title: meta_image.title,
            button: { text:  meta_image.button },
            library: { type: 'image' }
        });

        // Runs when an image is selected.
        sig_travel_18_image_frame.on('select', function(){

            // Grabs the attachment selection and creates a JSON representation of the model.
            var media_attachment = sig_travel_18_image_frame.state().get('selection').first().toJSON();

            // Sends the attachment URL to our custom image input field.
            $('#signature-travel-18-image').val(media_attachment.url);
        });

        // Opens the media library frame.
        sig_travel_18_image_frame.open();
    });

    // Signature Travel Template.
    var sig_travel_19_image_frame;

    // Runs when the image button is clicked.
    $('#signature-travel-19-image-button').click(function(e){

        // Prevents the default action from occuring.
        e.preventDefault();

        // If the frame already exists, re-open it.
        if ( sig_travel_19_image_frame ) {
            sig_travel_19_image_frame.open();
            return;
        }

        // Sets up the media library frame
        sig_travel_19_image_frame = wp.media.frames.sig_travel_19_image_frame = wp.media({
            title: meta_image.title,
            button: { text:  meta_image.button },
            library: { type: 'image' }
        });

        // Runs when an image is selected.
        sig_travel_19_image_frame.on('select', function(){

            // Grabs the attachment selection and creates a JSON representation of the model.
            var media_attachment = sig_travel_19_image_frame.state().get('selection').first().toJSON();

            // Sends the attachment URL to our custom image input field.
            $('#signature-travel-19-image').val(media_attachment.url);
        });

        // Opens the media library frame.
        sig_travel_19_image_frame.open();
    });

    // Signature Travel Template.
    var sig_travel_20_image_frame;

    // Runs when the image button is clicked.
    $('#signature-travel-20-image-button').click(function(e){

        // Prevents the default action from occuring.
        e.preventDefault();

        // If the frame already exists, re-open it.
        if ( sig_travel_20_image_frame ) {
            sig_travel_20_image_frame.open();
            return;
        }

        // Sets up the media library frame
        sig_travel_20_image_frame = wp.media.frames.sig_travel_20_image_frame = wp.media({
            title: meta_image.title,
            button: { text:  meta_image.button },
            library: { type: 'image' }
        });

        // Runs when an image is selected.
        sig_travel_20_image_frame.on('select', function(){

            // Grabs the attachment selection and creates a JSON representation of the model.
            var media_attachment = sig_travel_20_image_frame.state().get('selection').first().toJSON();

            // Sends the attachment URL to our custom image input field.
            $('#signature-travel-20-image').val(media_attachment.url);
        });

        // Opens the media library frame.
        sig_travel_20_image_frame.open();
    });

    // Signature Travel Template.
    var sig_travel_21_image_frame;

    // Runs when the image button is clicked.
    $('#signature-travel-21-image-button').click(function(e){

        // Prevents the default action from occuring.
        e.preventDefault();

        // If the frame already exists, re-open it.
        if ( sig_travel_21_image_frame ) {
            sig_travel_21_image_frame.open();
            return;
        }

        // Sets up the media library frame
        sig_travel_21_image_frame = wp.media.frames.sig_travel_21_image_frame = wp.media({
            title: meta_image.title,
            button: { text:  meta_image.button },
            library: { type: 'image' }
        });

        // Runs when an image is selected.
        sig_travel_21_image_frame.on('select', function(){

            // Grabs the attachment selection and creates a JSON representation of the model.
            var media_attachment = sig_travel_21_image_frame.state().get('selection').first().toJSON();

            // Sends the attachment URL to our custom image input field.
            $('#signature-travel-21-image').val(media_attachment.url);
        });

        // Opens the media library frame.
        sig_travel_21_image_frame.open();
    });

    // Signature Travel Template.
    var sig_travel_22_image_frame;

    // Runs when the image button is clicked.
    $('#signature-travel-22-image-button').click(function(e){

        // Prevents the default action from occuring.
        e.preventDefault();

        // If the frame already exists, re-open it.
        if ( sig_travel_22_image_frame ) {
            sig_travel_22_image_frame.open();
            return;
        }

        // Sets up the media library frame
        sig_travel_22_image_frame = wp.media.frames.sig_travel_22_image_frame = wp.media({
            title: meta_image.title,
            button: { text:  meta_image.button },
            library: { type: 'image' }
        });

        // Runs when an image is selected.
        sig_travel_22_image_frame.on('select', function(){

            // Grabs the attachment selection and creates a JSON representation of the model.
            var media_attachment = sig_travel_22_image_frame.state().get('selection').first().toJSON();

            // Sends the attachment URL to our custom image input field.
            $('#signature-travel-22-image').val(media_attachment.url);
        });

        // Opens the media library frame.
        sig_travel_22_image_frame.open();
    });

    // Signature Travel Template.
    var sig_travel_23_image_frame;

    // Runs when the image button is clicked.
    $('#signature-travel-23-image-button').click(function(e){

        // Prevents the default action from occuring.
        e.preventDefault();

        // If the frame already exists, re-open it.
        if ( sig_travel_23_image_frame ) {
            sig_travel_23_image_frame.open();
            return;
        }

        // Sets up the media library frame
        sig_travel_23_image_frame = wp.media.frames.sig_travel_23_image_frame = wp.media({
            title: meta_image.title,
            button: { text:  meta_image.button },
            library: { type: 'image' }
        });

        // Runs when an image is selected.
        sig_travel_23_image_frame.on('select', function(){

            // Grabs the attachment selection and creates a JSON representation of the model.
            var media_attachment = sig_travel_23_image_frame.state().get('selection').first().toJSON();

            // Sends the attachment URL to our custom image input field.
            $('#signature-travel-23-image').val(media_attachment.url);
        });

        // Opens the media library frame.
        sig_travel_23_image_frame.open();
    });

    // Signature Travel Template.
    var sig_travel_24_image_frame;

    // Runs when the image button is clicked.
    $('#signature-travel-24-image-button').click(function(e){

        // Prevents the default action from occuring.
        e.preventDefault();

        // If the frame already exists, re-open it.
        if ( sig_travel_24_image_frame ) {
            sig_travel_24_image_frame.open();
            return;
        }

        // Sets up the media library frame
        sig_travel_24_image_frame = wp.media.frames.sig_travel_24_image_frame = wp.media({
            title: meta_image.title,
            button: { text:  meta_image.button },
            library: { type: 'image' }
        });

        // Runs when an image is selected.
        sig_travel_24_image_frame.on('select', function(){

            // Grabs the attachment selection and creates a JSON representation of the model.
            var media_attachment = sig_travel_24_image_frame.state().get('selection').first().toJSON();

            // Sends the attachment URL to our custom image input field.
            $('#signature-travel-24-image').val(media_attachment.url);
        });

        // Opens the media library frame.
        sig_travel_24_image_frame.open();
    });

    // Signature Travel Template.
    var sig_travel_25_image_frame;

    // Runs when the image button is clicked.
    $('#signature-travel-25-image-button').click(function(e){

        // Prevents the default action from occuring.
        e.preventDefault();

        // If the frame already exists, re-open it.
        if ( sig_travel_25_image_frame ) {
            sig_travel_25_image_frame.open();
            return;
        }

        // Sets up the media library frame
        sig_travel_25_image_frame = wp.media.frames.sig_travel_25_image_frame = wp.media({
            title: meta_image.title,
            button: { text:  meta_image.button },
            library: { type: 'image' }
        });

        // Runs when an image is selected.
        sig_travel_25_image_frame.on('select', function(){

            // Grabs the attachment selection and creates a JSON representation of the model.
            var media_attachment = sig_travel_25_image_frame.state().get('selection').first().toJSON();

            // Sends the attachment URL to our custom image input field.
            $('#signature-travel-25-image').val(media_attachment.url);
        });

        // Opens the media library frame.
        sig_travel_25_image_frame.open();
    });

    // Signature Travel Template.
    var sig_travel_26_image_frame;

    // Runs when the image button is clicked.
    $('#signature-travel-26-image-button').click(function(e){

        // Prevents the default action from occuring.
        e.preventDefault();

        // If the frame already exists, re-open it.
        if ( sig_travel_26_image_frame ) {
            sig_travel_26_image_frame.open();
            return;
        }

        // Sets up the media library frame
        sig_travel_26_image_frame = wp.media.frames.sig_travel_26_image_frame = wp.media({
            title: meta_image.title,
            button: { text:  meta_image.button },
            library: { type: 'image' }
        });

        // Runs when an image is selected.
        sig_travel_26_image_frame.on('select', function(){

            // Grabs the attachment selection and creates a JSON representation of the model.
            var media_attachment = sig_travel_26_image_frame.state().get('selection').first().toJSON();

            // Sends the attachment URL to our custom image input field.
            $('#signature-travel-26-image').val(media_attachment.url);
        });

        // Opens the media library frame.
        sig_travel_26_image_frame.open();
    });

    // Signature Travel Template.
    var sig_travel_27_image_frame;

    // Runs when the image button is clicked.
    $('#signature-travel-27-image-button').click(function(e){

        // Prevents the default action from occuring.
        e.preventDefault();

        // If the frame already exists, re-open it.
        if ( sig_travel_27_image_frame ) {
            sig_travel_27_image_frame.open();
            return;
        }

        // Sets up the media library frame
        sig_travel_27_image_frame = wp.media.frames.sig_travel_27_image_frame = wp.media({
            title: meta_image.title,
            button: { text:  meta_image.button },
            library: { type: 'image' }
        });

        // Runs when an image is selected.
        sig_travel_27_image_frame.on('select', function(){

            // Grabs the attachment selection and creates a JSON representation of the model.
            var media_attachment = sig_travel_27_image_frame.state().get('selection').first().toJSON();

            // Sends the attachment URL to our custom image input field.
            $('#signature-travel-27-image').val(media_attachment.url);
        });

        // Opens the media library frame.
        sig_travel_27_image_frame.open();
    });

    // Signature Travel Template.
    var sig_travel_28_image_frame;

    // Runs when the image button is clicked.
    $('#signature-travel-28-image-button').click(function(e){

        // Prevents the default action from occuring.
        e.preventDefault();

        // If the frame already exists, re-open it.
        if ( sig_travel_28_image_frame ) {
            sig_travel_28_image_frame.open();
            return;
        }

        // Sets up the media library frame
        sig_travel_28_image_frame = wp.media.frames.sig_travel_28_image_frame = wp.media({
            title: meta_image.title,
            button: { text:  meta_image.button },
            library: { type: 'image' }
        });

        // Runs when an image is selected.
        sig_travel_28_image_frame.on('select', function(){

            // Grabs the attachment selection and creates a JSON representation of the model.
            var media_attachment = sig_travel_28_image_frame.state().get('selection').first().toJSON();

            // Sends the attachment URL to our custom image input field.
            $('#signature-travel-28-image').val(media_attachment.url);
        });

        // Opens the media library frame.
        sig_travel_28_image_frame.open();
    });

    // Signature Travel Template.
    var sig_travel_29_image_frame;

    // Runs when the image button is clicked.
    $('#signature-travel-29-image-button').click(function(e){

        // Prevents the default action from occuring.
        e.preventDefault();

        // If the frame already exists, re-open it.
        if ( sig_travel_29_image_frame ) {
            sig_travel_29_image_frame.open();
            return;
        }

        // Sets up the media library frame
        sig_travel_29_image_frame = wp.media.frames.sig_travel_29_image_frame = wp.media({
            title: meta_image.title,
            button: { text:  meta_image.button },
            library: { type: 'image' }
        });

        // Runs when an image is selected.
        sig_travel_29_image_frame.on('select', function(){

            // Grabs the attachment selection and creates a JSON representation of the model.
            var media_attachment = sig_travel_29_image_frame.state().get('selection').first().toJSON();

            // Sends the attachment URL to our custom image input field.
            $('#signature-travel-29-image').val(media_attachment.url);
        });

        // Opens the media library frame.
        sig_travel_29_image_frame.open();
    });

    // Signature Travel Template.
    var sig_travel_30_image_frame;

    // Runs when the image button is clicked.
    $('#signature-travel-30-image-button').click(function(e){

        // Prevents the default action from occuring.
        e.preventDefault();

        // If the frame already exists, re-open it.
        if ( sig_travel_30_image_frame ) {
            sig_travel_30_image_frame.open();
            return;
        }

        // Sets up the media library frame
        sig_travel_30_image_frame = wp.media.frames.sig_travel_30_image_frame = wp.media({
            title: meta_image.title,
            button: { text:  meta_image.button },
            library: { type: 'image' }
        });

        // Runs when an image is selected.
        sig_travel_30_image_frame.on('select', function(){

            // Grabs the attachment selection and creates a JSON representation of the model.
            var media_attachment = sig_travel_30_image_frame.state().get('selection').first().toJSON();

            // Sends the attachment URL to our custom image input field.
            $('#signature-travel-30-image').val(media_attachment.url);
        });

        // Opens the media library frame.
        sig_travel_30_image_frame.open();
    });

    // Signature Travel Template.
    var sig_travel_31_image_frame;

    // Runs when the image button is clicked.
    $('#signature-travel-31-image-button').click(function(e){

        // Prevents the default action from occuring.
        e.preventDefault();

        // If the frame already exists, re-open it.
        if ( sig_travel_31_image_frame ) {
            sig_travel_31_image_frame.open();
            return;
        }

        // Sets up the media library frame
        sig_travel_31_image_frame = wp.media.frames.sig_travel_31_image_frame = wp.media({
            title: meta_image.title,
            button: { text:  meta_image.button },
            library: { type: 'image' }
        });

        // Runs when an image is selected.
        sig_travel_31_image_frame.on('select', function(){

            // Grabs the attachment selection and creates a JSON representation of the model.
            var media_attachment = sig_travel_31_image_frame.state().get('selection').first().toJSON();

            // Sends the attachment URL to our custom image input field.
            $('#signature-travel-31-image').val(media_attachment.url);
        });

        // Opens the media library frame.
        sig_travel_31_image_frame.open();
    });

    // Signature Travel Template.
    var sig_travel_32_image_frame;

    // Runs when the image button is clicked.
    $('#signature-travel-32-image-button').click(function(e){

        // Prevents the default action from occuring.
        e.preventDefault();

        // If the frame already exists, re-open it.
        if ( sig_travel_32_image_frame ) {
            sig_travel_32_image_frame.open();
            return;
        }

        // Sets up the media library frame
        sig_travel_32_image_frame = wp.media.frames.sig_travel_32_image_frame = wp.media({
            title: meta_image.title,
            button: { text:  meta_image.button },
            library: { type: 'image' }
        });

        // Runs when an image is selected.
        sig_travel_32_image_frame.on('select', function(){

            // Grabs the attachment selection and creates a JSON representation of the model.
            var media_attachment = sig_travel_32_image_frame.state().get('selection').first().toJSON();

            // Sends the attachment URL to our custom image input field.
            $('#signature-travel-32-image').val(media_attachment.url);
        });

        // Opens the media library frame.
        sig_travel_32_image_frame.open();
    });

    // Signature Travel Template.
    var sig_travel_33_image_frame;

    // Runs when the image button is clicked.
    $('#signature-travel-33-image-button').click(function(e){

        // Prevents the default action from occuring.
        e.preventDefault();

        // If the frame already exists, re-open it.
        if ( sig_travel_33_image_frame ) {
            sig_travel_33_image_frame.open();
            return;
        }

        // Sets up the media library frame
        sig_travel_33_image_frame = wp.media.frames.sig_travel_33_image_frame = wp.media({
            title: meta_image.title,
            button: { text:  meta_image.button },
            library: { type: 'image' }
        });

        // Runs when an image is selected.
        sig_travel_33_image_frame.on('select', function(){

            // Grabs the attachment selection and creates a JSON representation of the model.
            var media_attachment = sig_travel_33_image_frame.state().get('selection').first().toJSON();

            // Sends the attachment URL to our custom image input field.
            $('#signature-travel-33-image').val(media_attachment.url);
        });

        // Opens the media library frame.
        sig_travel_33_image_frame.open();
    });

    // Signature Travel Template.
    var sig_travel_34_image_frame;

    // Runs when the image button is clicked.
    $('#signature-travel-34-image-button').click(function(e){

        // Prevents the default action from occuring.
        e.preventDefault();

        // If the frame already exists, re-open it.
        if ( sig_travel_34_image_frame ) {
            sig_travel_34_image_frame.open();
            return;
        }

        // Sets up the media library frame
        sig_travel_34_image_frame = wp.media.frames.sig_travel_34_image_frame = wp.media({
            title: meta_image.title,
            button: { text:  meta_image.button },
            library: { type: 'image' }
        });

        // Runs when an image is selected.
        sig_travel_34_image_frame.on('select', function(){

            // Grabs the attachment selection and creates a JSON representation of the model.
            var media_attachment = sig_travel_34_image_frame.state().get('selection').first().toJSON();

            // Sends the attachment URL to our custom image input field.
            $('#signature-travel-34-image').val(media_attachment.url);
        });

        // Opens the media library frame.
        sig_travel_34_image_frame.open();
    });

    // Signature Travel Template.
    var sig_travel_35_image_frame;

    // Runs when the image button is clicked.
    $('#signature-travel-35-image-button').click(function(e){

        // Prevents the default action from occuring.
        e.preventDefault();

        // If the frame already exists, re-open it.
        if ( sig_travel_35_image_frame ) {
            sig_travel_35_image_frame.open();
            return;
        }

        // Sets up the media library frame
        sig_travel_35_image_frame = wp.media.frames.sig_travel_35_image_frame = wp.media({
            title: meta_image.title,
            button: { text:  meta_image.button },
            library: { type: 'image' }
        });

        // Runs when an image is selected.
        sig_travel_35_image_frame.on('select', function(){

            // Grabs the attachment selection and creates a JSON representation of the model.
            var media_attachment = sig_travel_35_image_frame.state().get('selection').first().toJSON();

            // Sends the attachment URL to our custom image input field.
            $('#signature-travel-35-image').val(media_attachment.url);
        });

        // Opens the media library frame.
        sig_travel_35_image_frame.open();
    });

    // Signature Travel Template.
    var sig_travel_36_image_frame;

    // Runs when the image button is clicked.
    $('#signature-travel-36-image-button').click(function(e){

        // Prevents the default action from occuring.
        e.preventDefault();

        // If the frame already exists, re-open it.
        if ( sig_travel_36_image_frame ) {
            sig_travel_36_image_frame.open();
            return;
        }

        // Sets up the media library frame
        sig_travel_36_image_frame = wp.media.frames.sig_travel_36_image_frame = wp.media({
            title: meta_image.title,
            button: { text:  meta_image.button },
            library: { type: 'image' }
        });

        // Runs when an image is selected.
        sig_travel_36_image_frame.on('select', function(){

            // Grabs the attachment selection and creates a JSON representation of the model.
            var media_attachment = sig_travel_36_image_frame.state().get('selection').first().toJSON();

            // Sends the attachment URL to our custom image input field.
            $('#signature-travel-36-image').val(media_attachment.url);
        });

        // Opens the media library frame.
        sig_travel_36_image_frame.open();
    });

    // Signature Travel Template.
    var sig_travel_37_image_frame;

    // Runs when the image button is clicked.
    $('#signature-travel-37-image-button').click(function(e){

        // Prevents the default action from occuring.
        e.preventDefault();

        // If the frame already exists, re-open it.
        if ( sig_travel_37_image_frame ) {
            sig_travel_37_image_frame.open();
            return;
        }

        // Sets up the media library frame
        sig_travel_37_image_frame = wp.media.frames.sig_travel_37_image_frame = wp.media({
            title: meta_image.title,
            button: { text:  meta_image.button },
            library: { type: 'image' }
        });

        // Runs when an image is selected.
        sig_travel_37_image_frame.on('select', function(){

            // Grabs the attachment selection and creates a JSON representation of the model.
            var media_attachment = sig_travel_37_image_frame.state().get('selection').first().toJSON();

            // Sends the attachment URL to our custom image input field.
            $('#signature-travel-37-image').val(media_attachment.url);
        });

        // Opens the media library frame.
        sig_travel_37_image_frame.open();
    });

    // Signature Travel Template.
    var sig_travel_38_image_frame;

    // Runs when the image button is clicked.
    $('#signature-travel-38-image-button').click(function(e){

        // Prevents the default action from occuring.
        e.preventDefault();

        // If the frame already exists, re-open it.
        if ( sig_travel_38_image_frame ) {
            sig_travel_38_image_frame.open();
            return;
        }

        // Sets up the media library frame
        sig_travel_38_image_frame = wp.media.frames.sig_travel_38_image_frame = wp.media({
            title: meta_image.title,
            button: { text:  meta_image.button },
            library: { type: 'image' }
        });

        // Runs when an image is selected.
        sig_travel_38_image_frame.on('select', function(){

            // Grabs the attachment selection and creates a JSON representation of the model.
            var media_attachment = sig_travel_38_image_frame.state().get('selection').first().toJSON();

            // Sends the attachment URL to our custom image input field.
            $('#signature-travel-38-image').val(media_attachment.url);
        });

        // Opens the media library frame.
        sig_travel_38_image_frame.open();
    });

    // Signature Travel Template.
    var sig_travel_39_image_frame;

    // Runs when the image button is clicked.
    $('#signature-travel-39-image-button').click(function(e){

        // Prevents the default action from occuring.
        e.preventDefault();

        // If the frame already exists, re-open it.
        if ( sig_travel_39_image_frame ) {
            sig_travel_39_image_frame.open();
            return;
        }

        // Sets up the media library frame
        sig_travel_39_image_frame = wp.media.frames.sig_travel_39_image_frame = wp.media({
            title: meta_image.title,
            button: { text:  meta_image.button },
            library: { type: 'image' }
        });

        // Runs when an image is selected.
        sig_travel_39_image_frame.on('select', function(){

            // Grabs the attachment selection and creates a JSON representation of the model.
            var media_attachment = sig_travel_39_image_frame.state().get('selection').first().toJSON();

            // Sends the attachment URL to our custom image input field.
            $('#signature-travel-39-image').val(media_attachment.url);
        });

        // Opens the media library frame.
        sig_travel_39_image_frame.open();
    });

    // Signature Travel Template.
    var sig_travel_40_image_frame;

    // Runs when the image button is clicked.
    $('#signature-travel-40-image-button').click(function(e){

        // Prevents the default action from occuring.
        e.preventDefault();

        // If the frame already exists, re-open it.
        if ( sig_travel_40_image_frame ) {
            sig_travel_40_image_frame.open();
            return;
        }

        // Sets up the media library frame
        sig_travel_40_image_frame = wp.media.frames.sig_travel_40_image_frame = wp.media({
            title: meta_image.title,
            button: { text:  meta_image.button },
            library: { type: 'image' }
        });

        // Runs when an image is selected.
        sig_travel_40_image_frame.on('select', function(){

            // Grabs the attachment selection and creates a JSON representation of the model.
            var media_attachment = sig_travel_40_image_frame.state().get('selection').first().toJSON();

            // Sends the attachment URL to our custom image input field.
            $('#signature-travel-40-image').val(media_attachment.url);
        });

        // Opens the media library frame.
        sig_travel_40_image_frame.open();
    });

    // Signature Travel Template.
    var sig_travel_41_image_frame;

    // Runs when the image button is clicked.
    $('#signature-travel-41-image-button').click(function(e){

        // Prevents the default action from occuring.
        e.preventDefault();

        // If the frame already exists, re-open it.
        if ( sig_travel_41_image_frame ) {
            sig_travel_41_image_frame.open();
            return;
        }

        // Sets up the media library frame
        sig_travel_41_image_frame = wp.media.frames.sig_travel_41_image_frame = wp.media({
            title: meta_image.title,
            button: { text:  meta_image.button },
            library: { type: 'image' }
        });

        // Runs when an image is selected.
        sig_travel_41_image_frame.on('select', function(){

            // Grabs the attachment selection and creates a JSON representation of the model.
            var media_attachment = sig_travel_41_image_frame.state().get('selection').first().toJSON();

            // Sends the attachment URL to our custom image input field.
            $('#signature-travel-41-image').val(media_attachment.url);
        });

        // Opens the media library frame.
        sig_travel_41_image_frame.open();
    });

    // Signature Travel Template.
    var sig_travel_42_image_frame;

    // Runs when the image button is clicked.
    $('#signature-travel-42-image-button').click(function(e){

        // Prevents the default action from occuring.
        e.preventDefault();

        // If the frame already exists, re-open it.
        if ( sig_travel_42_image_frame ) {
            sig_travel_42_image_frame.open();
            return;
        }

        // Sets up the media library frame
        sig_travel_42_image_frame = wp.media.frames.sig_travel_42_image_frame = wp.media({
            title: meta_image.title,
            button: { text:  meta_image.button },
            library: { type: 'image' }
        });

        // Runs when an image is selected.
        sig_travel_42_image_frame.on('select', function(){

            // Grabs the attachment selection and creates a JSON representation of the model.
            var media_attachment = sig_travel_42_image_frame.state().get('selection').first().toJSON();

            // Sends the attachment URL to our custom image input field.
            $('#signature-travel-42-image').val(media_attachment.url);
        });

        // Opens the media library frame.
        sig_travel_42_image_frame.open();
    });

    // Instantiates the variable that holds the media library frame.
    var featured1_image_frame;

    // Runs when the image button is clicked.
    $('#featured1-image-button').click(function(e){

        // Prevents the default action from occuring.
        e.preventDefault();

        // If the frame already exists, re-open it.
        if ( featured1_image_frame ) {
            featured1_image_frame.open();
            return;
        }

        // Sets up the media library frame
        featured1_image_frame = wp.media.frames.featured1_image_frame = wp.media({
            title: meta_image.title,
            button: { text:  meta_image.button },
            library: { type: 'image' }
        });

        // Runs when an image is selected.
        featured1_image_frame.on('select', function(){

            // Grabs the attachment selection and creates a JSON representation of the model.
            var media_attachment = featured1_image_frame.state().get('selection').first().toJSON();

            // Sends the attachment URL to our custom image input field.
            $('#featured1-image').val(media_attachment.url);
        });

        // Opens the media library frame.
        featured1_image_frame.open();
    });
});

// Featured Image 2

jQuery(document).ready( function($){ "use strict";

    // Instantiates the variable that holds the media library frame.
    var featured2_image_frame;

    // Runs when the image button is clicked.
    $('#featured2-image-button').click(function(e){

        // Prevents the default action from occuring.
        e.preventDefault();

        // If the frame already exists, re-open it.
        if ( featured2_image_frame ) {
            featured2_image_frame.open();
            return;
        }

        // Sets up the media library frame
        featured2_image_frame = wp.media.frames.featured2_image_frame = wp.media({
            title: meta_image.title,
            button: { text:  meta_image.button },
            library: { type: 'image' }
        });

        // Runs when an image is selected.
        featured2_image_frame.on('select', function(){

            // Grabs the attachment selection and creates a JSON representation of the model.
            var media_attachment = featured2_image_frame.state().get('selection').first().toJSON();

            // Sends the attachment URL to our custom image input field.
            $('#featured2-image').val(media_attachment.url);
        });

        // Opens the media library frame.
        featured2_image_frame.open();
    });
});

// Featured image 3

jQuery(document).ready( function($){ "use strict";

    // Instantiates the variable that holds the media library frame.
    var featured3_image_frame;

    // Runs when the image button is clicked.
    $('#featured3-image-button').click(function(e){

        // Prevents the default action from occuring.
        e.preventDefault();

        // If the frame already exists, re-open it.
        if ( featured3_image_frame ) {
            featured3_image_frame.open();
            return;
        }

        // Sets up the media library frame
        featured3_image_frame = wp.media.frames.featured3_image_frame = wp.media({
            title: meta_image.title,
            button: { text:  meta_image.button },
            library: { type: 'image' }
        });

        // Runs when an image is selected.
        featured3_image_frame.on('select', function(){

            // Grabs the attachment selection and creates a JSON representation of the model.
            var media_attachment = featured3_image_frame.state().get('selection').first().toJSON();

            // Sends the attachment URL to our custom image input field.
            $('#featured3-image').val(media_attachment.url);
        });

        // Opens the media library frame.
        featured3_image_frame.open();
    });
});

// Featured image

jQuery(document).ready( function($){ "use strict";

    // Instantiates the variable that holds the media library frame.
    var featured4_image_frame;

    // Runs when the image button is clicked.
    $('#featured4-image-button').click(function(e){

        // Prevents the default action from occuring.
        e.preventDefault();

        // If the frame already exists, re-open it.
        if ( featured4_image_frame ) {
            featured4_image_frame.open();
            return;
        }

        // Sets up the media library frame
        featured4_image_frame = wp.media.frames.featured4_image_frame = wp.media({
            title: meta_image.title,
            button: { text:  meta_image.button },
            library: { type: 'image' }
        });

        // Runs when an image is selected.
        featured4_image_frame.on('select', function(){

            // Grabs the attachment selection and creates a JSON representation of the model.
            var media_attachment = featured4_image_frame.state().get('selection').first().toJSON();

            // Sends the attachment URL to our custom image input field.
            $('#featured4-image').val(media_attachment.url);
        });

        // Opens the media library frame.
        featured4_image_frame.open();
    });
});

// Rivers Drop Down Image

jQuery(document).ready( function($){ "use strict";

    // Instantiates the variable that holds the media library frame.
    var rivers_image_frame;

    // Runs when the image button is clicked.
    $('#rivers-image-button').click(function(e){

        // Prevents the default action from occuring.
        e.preventDefault();

        // If the frame already exists, re-open it.
        if ( rivers_image_frame ) {
            rivers_image_frame.open();
            return;
        }

        // Sets up the media library frame
        rivers_image_frame = wp.media.frames.rivers_image_frame = wp.media({
            title: meta_image.title,
            button: { text:  meta_image.button },
            library: { type: 'image' }
        });

        // Runs when an image is selected.
        rivers_image_frame.on('select', function(){

            // Grabs the attachment selection and creates a JSON representation of the model.
            var media_attachment = rivers_image_frame.state().get('selection').first().toJSON();

            // Sends the attachment URL to our custom image input field.
            $('#rivers-image').val(media_attachment.url);
        });

        // Opens the media library frame.
        rivers_image_frame.open();
    });
});

// Lakes Drop Down Image

jQuery(document).ready( function($){ "use strict";

    // Instantiates the variable that holds the media library frame.
    var lakes_image_frame;

    // Runs when the image button is clicked.
    $('#lakes-image-button').click(function(e){

        // Prevents the default action from occuring.
        e.preventDefault();

        // If the frame already exists, re-open it.
        if ( lakes_image_frame ) {
            lakes_image_frame.open();
            return;
        }

        // Sets up the media library frame
        lakes_image_frame = wp.media.frames.lakes_image_frame = wp.media({
            title: meta_image.title,
            button: { text:  meta_image.button },
            library: { type: 'image' }
        });

        // Runs when an image is selected.
        lakes_image_frame.on('select', function(){

            // Grabs the attachment selection and creates a JSON representation of the model.
            var media_attachment = lakes_image_frame.state().get('selection').first().toJSON();

            // Sends the attachment URL to our custom image input field.
            $('#lakes-image').val(media_attachment.url);
        });

        // Opens the media library frame.
        lakes_image_frame.open();
    });
});

// Private Waters Drop Down Image

jQuery(document).ready( function($){ "use strict";

    // Instantiates the variable that holds the media library frame.
    var private_waters_image_frame;

    // Runs when the image button is clicked.
    $('#private-waters-image-button').click(function(e){

        // Prevents the default action from occuring.
        e.preventDefault();

        // If the frame already exists, re-open it.
        if ( private_waters_image_frame ) {
            private_waters_image_frame.open();
            return;
        }

        // Sets up the media library frame
        private_waters_image_frame = wp.media.frames.private_waters_image_frame = wp.media({
            title: meta_image.title,
            button: { text:  meta_image.button },
            library: { type: 'image' }
        });

        // Runs when an image is selected.
        private_waters_image_frame.on('select', function(){

            // Grabs the attachment selection and creates a JSON representation of the model.
            var media_attachment = private_waters_image_frame.state().get('selection').first().toJSON();

            // Sends the attachment URL to our custom image input field.
            $('#private-waters-image').val(media_attachment.url);
        });

        // Opens the media library frame.
        private_waters_image_frame.open();
    });
});

// TFS logo report Image

jQuery(document).ready( function($){ "use strict";

    // Instantiates the variable that holds the media library frame.
    var tfs_logo_report_frame;

    // Runs when the image button is clicked.
    $('#tfs-logo-report-button').click(function(e){

        // Prevents the default action from occuring.
        e.preventDefault();

        // If the frame already exists, re-open it.
        if ( tfs_logo_report_frame ) {
            tfs_logo_report_frame.open();
            return;
        }

        // Sets up the media library frame
        tfs_logo_report_frame = wp.media.frames.tfs_logo_report_frame = wp.media({
            title: meta_image.title,
            button: { text:  meta_image.button },
            library: { type: 'image' }
        });

        // Runs when an image is selected.
        tfs_logo_report_frame.on('select', function(){

            // Grabs the attachment selection and creates a JSON representation of the model.
            var media_attachment = tfs_logo_report_frame.state().get('selection').first().toJSON();

            // Sends the attachment URL to our custom image input field.
            $('#tfs-logo-report').val(media_attachment.url);
        });

        // Opens the media library frame.
        tfs_logo_report_frame.open();
    });
});

// TFS logo report Image

jQuery(document).ready( function($){ "use strict";

    // Instantiates the variable that holds the media library frame.
    var report_image_frame;

    // Runs when the image button is clicked.
    $('#report-image-button').click(function(e){

        // Prevents the default action from occuring.
        e.preventDefault();

        // If the frame already exists, re-open it.
        if ( report_image_frame ) {
            report_image_frame.open();
            return;
        }

        // Sets up the media library frame
        report_image_frame = wp.media.frames.report_image_frame = wp.media({
            title: meta_image.title,
            button: { text:  meta_image.button },
            library: { type: 'image' }
        });

        // Runs when an image is selected.
        report_image_frame.on('select', function(){

            // Grabs the attachment selection and creates a JSON representation of the model.
            var media_attachment = report_image_frame.state().get('selection').first().toJSON();

            // Sends the attachment URL to our custom image input field.
            $('#report-image').val(media_attachment.url);
        });

        // Opens the media library frame.
        report_image_frame.open();
    });
});

jQuery(document).ready( function($){ "use strict";

    // Instantiates the variable that holds the media library frame.
    var travel_logo_frame;

    // Runs when the image button is clicked.
    $('#travel-logo-button').click(function(e){

        // Prevents the default action from occuring.
        e.preventDefault();

        // If the frame already exists, re-open it.
        if ( travel_logo_frame ) {
            travel_logo_frame.open();
            return;
        }

        // Sets up the media library frame
        travel_logo_frame = wp.media.frames.travel_logo_frame = wp.media({
            title: meta_image.title,
            button: { text:  meta_image.button },
            library: { type: 'image' }
        });

        // Runs when an image is selected.
        travel_logo_frame.on('select', function(){

            // Grabs the attachment selection and creates a JSON representation of the model.
            var media_attachment = travel_logo_frame.state().get('selection').first().toJSON();

            // Sends the attachment URL to our custom image input field.
            $('#travel-logo').val(media_attachment.url);
        });

        // Opens the media library frame.
        travel_logo_frame.open();
    });
});

jQuery(document).ready( function($){ "use strict";

    // Instantiates the variable that holds the media library frame.
    var travel_image_frame;

    // Runs when the image button is clicked.
    $('#travel-image-button').click(function(e){

        // Prevents the default action from occuring.
        e.preventDefault();

        // If the frame already exists, re-open it.
        if ( travel_image_frame ) {
            travel_image_frame.open();
            return;
        }

        // Sets up the media library frame
        travel_image_frame = wp.media.frames.travel_image_frame = wp.media({
            title: meta_image.title,
            button: { text:  meta_image.button },
            library: { type: 'image' }
        });

        // Runs when an image is selected.
        travel_image_frame.on('select', function(){

            // Grabs the attachment selection and creates a JSON representation of the model.
            var media_attachment = travel_image_frame.state().get('selection').first().toJSON();

            // Sends the attachment URL to our custom image input field.
            $('#travel-image').val(media_attachment.url);
        });

        // Opens the media library frame.
        travel_image_frame.open();
    });
});

jQuery(document).ready( function($){ "use strict";

    // Instantiates the variable that holds the media library frame.
    var feature_1_image_frame;

    // Runs when the image button is clicked.
    $('#feature-1-image-button').click(function(e){

        // Prevents the default action from occuring.
        e.preventDefault();

        // If the frame already exists, re-open it.
        if ( feature_1_image_frame ) {
            feature_1_image_frame.open();
            return;
        }

        // Sets up the media library frame
        feature_1_image_frame = wp.media.frames.feature_1_image_frame = wp.media({
            title: meta_image.title,
            button: { text:  meta_image.button },
            library: { type: 'image' }
        });

        // Runs when an image is selected.
        feature_1_image_frame.on('select', function(){

            // Grabs the attachment selection and creates a JSON representation of the model.
            var media_attachment = feature_1_image_frame.state().get('selection').first().toJSON();

            // Sends the attachment URL to our custom image input field.
            $('#feature-1-image').val(media_attachment.url);
        });

        // Opens the media library frame.
        feature_1_image_frame.open();
    });
});

jQuery(document).ready( function($){ "use strict";

    // Instantiates the variable that holds the media library frame.
    var feature_2_image_frame;

    // Runs when the image button is clicked.
    $('#feature-2-image-button').click(function(e){

        // Prevents the default action from occuring.
        e.preventDefault();

        // If the frame already exists, re-open it.
        if ( feature_2_image_frame ) {
            feature_2_image_frame.open();
            return;
        }

        // Sets up the media library frame
        feature_2_image_frame = wp.media.frames.feature_2_image_frame = wp.media({
            title: meta_image.title,
            button: { text:  meta_image.button },
            library: { type: 'image' }
        });

        // Runs when an image is selected.
        feature_2_image_frame.on('select', function(){

            // Grabs the attachment selection and creates a JSON representation of the model.
            var media_attachment = feature_2_image_frame.state().get('selection').first().toJSON();

            // Sends the attachment URL to our custom image input field.
            $('#feature-2-image').val(media_attachment.url);
        });

        // Opens the media library frame.
        feature_2_image_frame.open();
    });
});

jQuery(document).ready( function($){ "use strict";

    // Instantiates the variable that holds the media library frame.
    var feature_3_gettingto_image_frame;

    // Runs when the image button is clicked.
    $('#feature-3-gettingto-image-button').click(function(e){

        // Prevents the default action from occuring.
        e.preventDefault();

        // If the frame already exists, re-open it.
        if ( feature_3_gettingto_image_frame ) {
            feature_3_gettingto_image_frame.open();
            return;
        }

        // Sets up the media library frame
        feature_3_gettingto_image_frame = wp.media.frames.feature_3_gettingto_image_frame = wp.media({
            title: meta_image.title,
            button: { text:  meta_image.button },
            library: { type: 'image' }
        });

        // Runs when an image is selected.
        feature_3_gettingto_image_frame.on('select', function(){

            // Grabs the attachment selection and creates a JSON representation of the model.
            var media_attachment = feature_3_gettingto_image_frame.state().get('selection').first().toJSON();

            // Sends the attachment URL to our custom image input field.
            $('#feature-3-gettingto-image').val(media_attachment.url);
        });

        // Opens the media library frame.
        feature_3_gettingto_image_frame.open();
    });
});

jQuery(document).ready( function($){ "use strict";

    // Instantiates the variable that holds the media library frame.
    var feature_4_lodging_image_frame;

    // Runs when the image button is clicked.
    $('#feature-4-lodging-image-button').click(function(e){

        // Prevents the default action from occuring.
        e.preventDefault();

        // If the frame already exists, re-open it.
        if ( feature_4_lodging_image_frame ) {
            feature_4_lodging_image_frame.open();
            return;
        }

        // Sets up the media library frame
        feature_4_lodging_image_frame = wp.media.frames.feature_4_lodging_image_frame = wp.media({
            title: meta_image.title,
            button: { text:  meta_image.button },
            library: { type: 'image' }
        });

        // Runs when an image is selected.
        feature_4_lodging_image_frame.on('select', function(){

            // Grabs the attachment selection and creates a JSON representation of the model.
            var media_attachment = feature_4_lodging_image_frame.state().get('selection').first().toJSON();

            // Sends the attachment URL to our custom image input field.
            $('#feature-4-lodging-image').val(media_attachment.url);
        });

        // Opens the media library frame.
        feature_4_lodging_image_frame.open();
    });
});

jQuery(document).ready( function($){ "use strict";

    // Instantiates the variable that holds the media library frame.
    var feature_5_angling_image_frame;

    // Runs when the image button is clicked.
    $('#feature-5-angling-image-button').click(function(e){

        // Prevents the default action from occuring.
        e.preventDefault();

        // If the frame already exists, re-open it.
        if ( feature_5_angling_image_frame ) {
            feature_5_angling_image_frame.open();
            return;
        }

        // Sets up the media library frame
        feature_5_angling_image_frame = wp.media.frames.feature_5_angling_image_frame = wp.media({
            title: meta_image.title,
            button: { text:  meta_image.button },
            library: { type: 'image' }
        });

        // Runs when an image is selected.
        feature_5_angling_image_frame.on('select', function(){

            // Grabs the attachment selection and creates a JSON representation of the model.
            var media_attachment = feature_5_angling_image_frame.state().get('selection').first().toJSON();

            // Sends the attachment URL to our custom image input field.
            $('#feature-5-angling-image').val(media_attachment.url);
        });

        // Opens the media library frame.
        feature_5_angling_image_frame.open();
    });
});

jQuery(document).ready( function($){ "use strict";

    // Instantiates the variable that holds the media library frame.
    var sth_img_1_frame;

    // Runs when the image button is clicked.
    $('#sth-img-1-button').click(function(e){

        // Prevents the default action from occuring.
        e.preventDefault();

        // If the frame already exists, re-open it.
        if ( sth_img_1_frame ) {
            sth_img_1_frame.open();
            return;
        }

        // Sets up the media library frame
        sth_img_1_frame = wp.media.frames.sth_img_1_frame = wp.media({
            title: meta_image.title,
            button: { text:  meta_image.button },
            library: { type: 'image' }
        });

        // Runs when an image is selected.
        sth_img_1_frame.on('select', function(){

            // Grabs the attachment selection and creates a JSON representation of the model.
            var media_attachment = sth_img_1_frame.state().get('selection').first().toJSON();

            // Sends the attachment URL to our custom image input field.
            $('#sth-img-1').val(media_attachment.url);
        });

        // Opens the media library frame.
        sth_img_1_frame.open();
    });
});

jQuery(document).ready( function($){ "use strict";

    // Instantiates the variable that holds the media library frame.
    var sth_img_2_frame;

    // Runs when the image button is clicked.
    $('#sth-img-2-button').click(function(e){

        // Prevents the default action from occuring.
        e.preventDefault();

        // If the frame already exists, re-open it.
        if ( sth_img_2_frame ) {
            sth_img_2_frame.open();
            return;
        }

        // Sets up the media library frame
        sth_img_2_frame = wp.media.frames.sth_img_2_frame = wp.media({
            title: meta_image.title,
            button: { text:  meta_image.button },
            library: { type: 'image' }
        });

        // Runs when an image is selected.
        sth_img_2_frame.on('select', function(){

            // Grabs the attachment selection and creates a JSON representation of the model.
            var media_attachment = sth_img_2_frame.state().get('selection').first().toJSON();

            // Sends the attachment URL to our custom image input field.
            $('#sth-img-2').val(media_attachment.url);
        });

        // Opens the media library frame.
        sth_img_2_frame.open();
    });
});

jQuery(document).ready( function($){ "use strict";

    // Instantiates the variable that holds the media library frame.
    var sth_img_3_frame;

    // Runs when the image button is clicked.
    $('#sth-img-3-button').click(function(e){

        // Prevents the default action from occuring.
        e.preventDefault();

        // If the frame already exists, re-open it.
        if ( sth_img_3_frame ) {
            sth_img_3_frame.open();
            return;
        }

        // Sets up the media library frame
        sth_img_3_frame = wp.media.frames.sth_img_3_frame = wp.media({
            title: meta_image.title,
            button: { text:  meta_image.button },
            library: { type: 'image' }
        });

        // Runs when an image is selected.
        sth_img_3_frame.on('select', function(){

            // Grabs the attachment selection and creates a JSON representation of the model.
            var media_attachment = sth_img_3_frame.state().get('selection').first().toJSON();

            // Sends the attachment URL to our custom image input field.
            $('#sth-img-3').val(media_attachment.url);
        });

        // Opens the media library frame.
        sth_img_3_frame.open();
    });
});

jQuery(document).ready( function($){ "use strict";

    // Instantiates the variable that holds the media library frame.
    var sth_img_4_frame;

    // Runs when the image button is clicked.
    $('#sth-img-4-button').click(function(e){

        // Prevents the default action from occuring.
        e.preventDefault();

        // If the frame already exists, re-open it.
        if ( sth_img_4_frame ) {
            sth_img_4_frame.open();
            return;
        }

        // Sets up the media library frame
        sth_img_4_frame = wp.media.frames.sth_img_4_frame = wp.media({
            title: meta_image.title,
            button: { text:  meta_image.button },
            library: { type: 'image' }
        });

        // Runs when an image is selected.
        sth_img_4_frame.on('select', function(){

            // Grabs the attachment selection and creates a JSON representation of the model.
            var media_attachment = sth_img_4_frame.state().get('selection').first().toJSON();

            // Sends the attachment URL to our custom image input field.
            $('#sth-img-4').val(media_attachment.url);
        });

        // Opens the media library frame.
        sth_img_4_frame.open();
    });
});

jQuery(document).ready( function($){ "use strict";

    // Instantiates the variable that holds the media library frame.
    var sth_img_5_frame;

    // Runs when the image button is clicked.
    $('#sth-img-5-button').click(function(e){

        // Prevents the default action from occuring.
        e.preventDefault();

        // If the frame already exists, re-open it.
        if ( sth_img_5_frame ) {
            sth_img_5_frame.open();
            return;
        }

        // Sets up the media library frame
        sth_img_5_frame = wp.media.frames.sth_img_5_frame = wp.media({
            title: meta_image.title,
            button: { text:  meta_image.button },
            library: { type: 'image' }
        });

        // Runs when an image is selected.
        sth_img_5_frame.on('select', function(){

            // Grabs the attachment selection and creates a JSON representation of the model.
            var media_attachment = sth_img_5_frame.state().get('selection').first().toJSON();

            // Sends the attachment URL to our custom image input field.
            $('#sth-img-5').val(media_attachment.url);
        });

        // Opens the media library frame.
        sth_img_5_frame.open();
    });
});

jQuery(document).ready( function($){ "use strict";

    // Instantiates the variable that holds the media library frame.
    var sth_img_6_frame;

    // Runs when the image button is clicked.
    $('#sth-img-6-button').click(function(e){

        // Prevents the default action from occuring.
        e.preventDefault();

        // If the frame already exists, re-open it.
        if ( sth_img_6_frame ) {
            sth_img_6_frame.open();
            return;
        }

        // Sets up the media library frame
        sth_img_6_frame = wp.media.frames.sth_img_6_frame = wp.media({
            title: meta_image.title,
            button: { text:  meta_image.button },
            library: { type: 'image' }
        });

        // Runs when an image is selected.
        sth_img_6_frame.on('select', function(){

            // Grabs the attachment selection and creates a JSON representation of the model.
            var media_attachment = sth_img_6_frame.state().get('selection').first().toJSON();

            // Sends the attachment URL to our custom image input field.
            $('#sth-img-6').val(media_attachment.url);
        });

        // Opens the media library frame.
        sth_img_6_frame.open();
    });
});

jQuery(document).ready( function($){ "use strict";

    // Instantiates the variable that holds the media library frame.
    var additional_info_image1_frame;

    // Runs when the image button is clicked.
    $('#additional-info-image1-button').click(function(e){

        // Prevents the default action from occuring.
        e.preventDefault();

        // If the frame already exists, re-open it.
        if ( additional_info_image1_frame ) {
            additional_info_image1_frame.open();
            return;
        }

        // Sets up the media library frame
        additional_info_image1_frame = wp.media.frames.additional_info_image1_frame = wp.media({
            title: meta_image.title,
            button: { text:  meta_image.button },
            library: { type: 'image' }
        });

        // Runs when an image is selected.
        additional_info_image1_frame.on('select', function(){

            // Grabs the attachment selection and creates a JSON representation of the model.
            var media_attachment = additional_info_image1_frame.state().get('selection').first().toJSON();

            // Sends the attachment URL to our custom image input field.
            $('#additional-info-image1').val(media_attachment.url);
        });

        // Opens the media library frame.
        additional_info_image1_frame.open();
    });
});

jQuery(document).ready( function($){ "use strict";

    // Instantiates the variable that holds the media library frame.
    var additional_info_image2_frame;

    // Runs when the image button is clicked.
    $('#additional-info-image2-button').click(function(e){

        // Prevents the default action from occuring.
        e.preventDefault();

        // If the frame already exists, re-open it.
        if ( additional_info_image2_frame ) {
            additional_info_image2_frame.open();
            return;
        }

        // Sets up the media library frame
        additional_info_image2_frame = wp.media.frames.additional_info_image2_frame = wp.media({
            title: meta_image.title,
            button: { text:  meta_image.button },
            library: { type: 'image' }
        });

        // Runs when an image is selected.
        additional_info_image2_frame.on('select', function(){

            // Grabs the attachment selection and creates a JSON representation of the model.
            var media_attachment = additional_info_image2_frame.state().get('selection').first().toJSON();

            // Sends the attachment URL to our custom image input field.
            $('#additional-info-image2').val(media_attachment.url);
        });

        // Opens the media library frame.
        additional_info_image2_frame.open();
    });
});

jQuery(document).ready( function($){ "use strict";

    // Instantiates the variable that holds the media library frame.
    var additional_info_image3_frame;

    // Runs when the image button is clicked.
    $('#additional-info-image3-button').click(function(e){

        // Prevents the default action from occuring.
        e.preventDefault();

        // If the frame already exists, re-open it.
        if ( additional_info_image3_frame ) {
            additional_info_image3_frame.open();
            return;
        }

        // Sets up the media library frame
        additional_info_image3_frame = wp.media.frames.additional_info_image3_frame = wp.media({
            title: meta_image.title,
            button: { text:  meta_image.button },
            library: { type: 'image' }
        });

        // Runs when an image is selected.
        additional_info_image3_frame.on('select', function(){

            // Grabs the attachment selection and creates a JSON representation of the model.
            var media_attachment = additional_info_image3_frame.state().get('selection').first().toJSON();

            // Sends the attachment URL to our custom image input field.
            $('#additional-info-image3').val(media_attachment.url);
        });

        // Opens the media library frame.
        additional_info_image3_frame.open();
    });
});

jQuery(document).ready( function($){ "use strict";

    // Instantiates the variable that holds the media library frame.
    var additional_info_image4_frame;

    // Runs when the image button is clicked.
    $('#additional-info-image4-button').click(function(e){

        // Prevents the default action from occuring.
        e.preventDefault();

        // If the frame already exists, re-open it.
        if ( additional_info_image4_frame ) {
            additional_info_image4_frame.open();
            return;
        }

        // Sets up the media library frame
        additional_info_image4_frame = wp.media.frames.additional_info_image4_frame = wp.media({
            title: meta_image.title,
            button: { text:  meta_image.button },
            library: { type: 'image' }
        });

        // Runs when an image is selected.
        additional_info_image4_frame.on('select', function(){

            // Grabs the attachment selection and creates a JSON representation of the model.
            var media_attachment = additional_info_image4_frame.state().get('selection').first().toJSON();

            // Sends the attachment URL to our custom image input field.
            $('#additional-info-image4').val(media_attachment.url);
        });

        // Opens the media library frame.
        additional_info_image4_frame.open();
    });
});

jQuery(document).ready( function($){ "use strict";

// Instantiates the variable that holds the media library frame.
    var additional_info_image5_frame;

    // Runs when the image button is clicked.
    $('#additional-info-image5-button').click(function(e){

        // Prevents the default action from occuring.
        e.preventDefault();

        // If the frame already exists, re-open it.
        if ( additional_info_image5_frame ) {
            additional_info_image5_frame.open();
            return;
        }

        // Sets up the media library frame
        additional_info_image5_frame = wp.media.frames.additional_info_image5_frame = wp.media({
            title: meta_image.title,
            button: { text:  meta_image.button },
            library: { type: 'image' }
        });

        // Runs when an image is selected.
        additional_info_image5_frame.on('select', function(){

            // Grabs the attachment selection and creates a JSON representation of the model.
            var media_attachment = additional_info_image5_frame.state().get('selection').first().toJSON();

            // Sends the attachment URL to our custom image input field.
            $('#additional-info-image5').val(media_attachment.url);
        });

        // Opens the media library frame.
        additional_info_image5_frame.open();
    });
});

jQuery(document).ready( function($){ "use strict";

// Instantiates the variable that holds the media library frame.
    var additional_info_image6_frame;

    // Runs when the image button is clicked.
    $('#additional-info-image6-button').click(function(e){

        // Prevents the default action from occuring.
        e.preventDefault();

        // If the frame already exists, re-open it.
        if ( additional_info_image6_frame ) {
            additional_info_image6_frame.open();
            return;
        }

        // Sets up the media library frame
        additional_info_image6_frame = wp.media.frames.additional_info_image6_frame = wp.media({
            title: meta_image.title,
            button: { text:  meta_image.button },
            library: { type: 'image' }
        });

        // Runs when an image is selected.
        additional_info_image6_frame.on('select', function(){

            // Grabs the attachment selection and creates a JSON representation of the model.
            var media_attachment = additional_info_image6_frame.state().get('selection').first().toJSON();

            // Sends the attachment URL to our custom image input field.
            $('#additional-info-image6').val(media_attachment.url);
        });

        // Opens the media library frame.
        additional_info_image6_frame.open();
    });
});

jQuery(document).ready( function($){ "use strict";

// Instantiates the variable that holds the media library frame.
    var additional_info_image7_frame;

    // Runs when the image button is clicked.
    $('#additional-info-image7-button').click(function(e){

        // Prevents the default action from occuring.
        e.preventDefault();

        // If the frame already exists, re-open it.
        if ( additional_info_image7_frame ) {
            additional_info_image7_frame.open();
            return;
        }

        // Sets up the media library frame
        additional_info_image7_frame = wp.media.frames.additional_info_image7_frame = wp.media({
            title: meta_image.title,
            button: { text:  meta_image.button },
            library: { type: 'image' }
        });

        // Runs when an image is selected.
        additional_info_image7_frame.on('select', function(){

            // Grabs the attachment selection and creates a JSON representation of the model.
            var media_attachment = additional_info_image7_frame.state().get('selection').first().toJSON();

            // Sends the attachment URL to our custom image input field.
            $('#additional-info-image7').val(media_attachment.url);
        });

        // Opens the media library frame.
        additional_info_image7_frame.open();
    });
});

jQuery(document).ready( function($){ "use strict";

// Instantiates the variable that holds the media library frame.
    var additional_info_image8_frame;

    // Runs when the image button is clicked.
    $('#additional-info-image8-button').click(function(e){

        // Prevents the default action from occuring.
        e.preventDefault();

        // If the frame already exists, re-open it.
        if ( additional_info_image8_frame ) {
            additional_info_image8_frame.open();
            return;
        }

        // Sets up the media library frame
        additional_info_image8_frame = wp.media.frames.additional_info_image8_frame = wp.media({
            title: meta_image.title,
            button: { text:  meta_image.button },
            library: { type: 'image' }
        });

        // Runs when an image is selected.
        additional_info_image8_frame.on('select', function(){

            // Grabs the attachment selection and creates a JSON representation of the model.
            var media_attachment = additional_info_image8_frame.state().get('selection').first().toJSON();

            // Sends the attachment URL to our custom image input field.
            $('#additional-info-image8').val(media_attachment.url);
        });

        // Opens the media library frame.
        additional_info_image8_frame.open();
    });
});

jQuery(document).ready(function($){ "use strict";

// Instantiates the variable that holds the media library frame.
    var private_logo_frame;

    // Runs when the image button is clicked.
    $('#private-logo-button').click(function(e){

        // Prevents the default action from occuring.
        e.preventDefault();

        // If the frame already exists, re-open it.
        if ( private_logo_frame ) {
            private_logo_frame.open();
            return;
        }

        // Sets up the media library frame
        private_logo_frame = wp.media.frames.private_logo_frame = wp.media({
            title: meta_image.title,
            button: { text:  meta_image.button },
            library: { type: 'image' }
        });

        // Runs when an image is selected.
        private_logo_frame.on('select', function(){

            // Grabs the attachment selection and creates a JSON representation of the model.
            var media_attachment = private_logo_frame.state().get('selection').first().toJSON();

            // Sends the attachment URL to our custom image input field.
            $('#private-logo').val(media_attachment.url);
        });

        // Opens the media library frame.
        private_logo_frame.open();
    });
});

jQuery(document).ready( function($){ "use strict";

// Instantiates the variable that holds the media library frame.
    var private_image_frame;

    // Runs when the image button is clicked.
    $('#private-image-button').click(function(e){

        // Prevents the default action from occuring.
        e.preventDefault();

        // If the frame already exists, re-open it.
        if ( private_image_frame ) {
            private_image_frame.open();
            return;
        }

        // Sets up the media library frame
        private_image_frame = wp.media.frames.private_image_frame = wp.media({
            title: meta_image.title,
            button: { text:  meta_image.button },
            library: { type: 'image' }
        });

        // Runs when an image is selected.
        private_image_frame.on('select', function(){

            // Grabs the attachment selection and creates a JSON representation of the model.
            var media_attachment = private_image_frame.state().get('selection').first().toJSON();

            // Sends the attachment URL to our custom image input field.
            $('#private-image').val(media_attachment.url);
        });

        // Opens the media library frame.
        private_image_frame.open();
    });
});

jQuery(document).ready( function($){ "use strict";

// Instantiates the variable that holds the media library frame.
    var feature_pw1_image_frame;

    // Runs when the image button is clicked.
    $('#feature-pw1-image-button').click(function(e){

        // Prevents the default action from occuring.
        e.preventDefault();

        // If the frame already exists, re-open it.
        if ( feature_pw1_image_frame ) {
            feature_pw1_image_frame.open();
            return;
        }

        // Sets up the media library frame
        feature_pw1_image_frame = wp.media.frames.feature_pw1_image_frame = wp.media({
            title: meta_image.title,
            button: { text:  meta_image.button },
            library: { type: 'image' }
        });

        // Runs when an image is selected.
        feature_pw1_image_frame.on('select', function(){

            // Grabs the attachment selection and creates a JSON representation of the model.
            var media_attachment = feature_pw1_image_frame.state().get('selection').first().toJSON();

            // Sends the attachment URL to our custom image input field.
            $('#feature-pw1-image').val(media_attachment.url);
        });

        // Opens the media library frame.
        feature_pw1_image_frame.open();
    });
});

jQuery(document).ready( function($){ "use strict";

// Instantiates the variable that holds the media library frame.
    var feature_pw2_image_frame;

    // Runs when the image button is clicked.
    $('#feature-pw2-image-button').click(function(e){

        // Prevents the default action from occuring.
        e.preventDefault();

        // If the frame already exists, re-open it.
        if ( feature_pw2_image_frame ) {
            feature_pw2_image_frame.open();
            return;
        }

        // Sets up the media library frame
        feature_pw2_image_frame = wp.media.frames.feature_pw2_image_frame = wp.media({
            title: meta_image.title,
            button: { text:  meta_image.button },
            library: { type: 'image' }
        });

        // Runs when an image is selected.
        feature_pw2_image_frame.on('select', function(){

            // Grabs the attachment selection and creates a JSON representation of the model.
            var media_attachment = feature_pw2_image_frame.state().get('selection').first().toJSON();

            // Sends the attachment URL to our custom image input field.
            $('#feature-pw2-image').val(media_attachment.url);
        });

        // Opens the media library frame.
        feature_pw2_image_frame.open();
    });
});

jQuery(document).ready( function($){ "use strict";

// Instantiates the variable that holds the media library frame.
    var feature_pw3_image_frame;

    // Runs when the image button is clicked.
    $('#feature-pw3-image-button').click(function(e){

        // Prevents the default action from occuring.
        e.preventDefault();

        // If the frame already exists, re-open it.
        if ( feature_pw3_image_frame ) {
            feature_pw3_image_frame.open();
            return;
        }

        // Sets up the media library frame
        feature_pw3_image_frame = wp.media.frames.feature_pw3_image_frame = wp.media({
            title: meta_image.title,
            button: { text:  meta_image.button },
            library: { type: 'image' }
        });

        // Runs when an image is selected.
        feature_pw3_image_frame.on('select', function(){

            // Grabs the attachment selection and creates a JSON representation of the model.
            var media_attachment = feature_pw3_image_frame.state().get('selection').first().toJSON();

            // Sends the attachment URL to our custom image input field.
            $('#feature-pw3-image').val(media_attachment.url);
        });

        // Opens the media library frame.
        feature_pw3_image_frame.open();
    });
});

jQuery(document).ready( function($){ "use strict";

// Instantiates the variable that holds the media library frame.
    var feature_pw4_image_frame;

    // Runs when the image button is clicked.
    $('#feature-pw4-image-button').click(function(e){

        // Prevents the default action from occuring.
        e.preventDefault();

        // If the frame already exists, re-open it.
        if ( feature_pw4_image_frame ) {
            feature_pw4_image_frame.open();
            return;
        }

        // Sets up the media library frame
        feature_pw4_image_frame = wp.media.frames.feature_pw4_image_frame = wp.media({
            title: meta_image.title,
            button: { text:  meta_image.button },
            library: { type: 'image' }
        });

        // Runs when an image is selected.
        feature_pw4_image_frame.on('select', function(){

            // Grabs the attachment selection and creates a JSON representation of the model.
            var media_attachment = feature_pw4_image_frame.state().get('selection').first().toJSON();

            // Sends the attachment URL to our custom image input field.
            $('#feature-pw4-image').val(media_attachment.url);
        });

        // Opens the media library frame.
        feature_pw4_image_frame.open();
    });
});

jQuery(document).ready( function($){ "use strict";

// Instantiates the variable that holds the media library frame.
    var feature_pw5_image_frame;

    // Runs when the image button is clicked.
    $('#feature-pw5-image-button').click(function(e){

        // Prevents the default action from occuring.
        e.preventDefault();

        // If the frame already exists, re-open it.
        if ( feature_pw5_image_frame ) {
            feature_pw5_image_frame.open();
            return;
        }

        // Sets up the media library frame
        feature_pw5_image_frame = wp.media.frames.feature_pw5_image_frame = wp.media({
            title: meta_image.title,
            button: { text:  meta_image.button },
            library: { type: 'image' }
        });

        // Runs when an image is selected.
        feature_pw5_image_frame.on('select', function(){

            // Grabs the attachment selection and creates a JSON representation of the model.
            var media_attachment = feature_pw5_image_frame.state().get('selection').first().toJSON();

            // Sends the attachment URL to our custom image input field.
            $('#feature-pw5-image').val(media_attachment.url);
        });

        // Opens the media library frame.
        feature_pw5_image_frame.open();
    });
});

jQuery(document).ready( function($){ "use strict";

// Instantiates the variable that holds the media library frame.
    var private_additional_info_image1_frame;

    // Runs when the image button is clicked.
    $('#private-additional-info-image1-button').click(function(e){

        // Prevents the default action from occuring.
        e.preventDefault();

        // If the frame already exists, re-open it.
        if ( private_additional_info_image1_frame ) {
            private_additional_info_image1_frame.open();
            return;
        }

        // Sets up the media library frame
        private_additional_info_image1_frame = wp.media.frames.private_additional_info_image1_frame = wp.media({
            title: meta_image.title,
            button: { text:  meta_image.button },
            library: { type: 'image' }
        });

        // Runs when an image is selected.
        private_additional_info_image1_frame.on('select', function(){

            // Grabs the attachment selection and creates a JSON representation of the model.
            var media_attachment = private_additional_info_image1_frame.state().get('selection').first().toJSON();

            // Sends the attachment URL to our custom image input field.
            $('#private-additional-info-image1').val(media_attachment.url);
        });

        // Opens the media library frame.
        private_additional_info_image1_frame.open();
    });
});

jQuery(document).ready( function($){ "use strict";

// Instantiates the variable that holds the media library frame.
    var private_additional_info_image2_frame;

    // Runs when the image button is clicked.
    $('#private-additional-info-image2-button').click(function(e){

        // Prevents the default action from occuring.
        e.preventDefault();

        // If the frame already exists, re-open it.
        if ( private_additional_info_image2_frame ) {
            private_additional_info_image2_frame.open();
            return;
        }

        // Sets up the media library frame
        private_additional_info_image2_frame = wp.media.frames.private_additional_info_image2_frame = wp.media({
            title: meta_image.title,
            button: { text:  meta_image.button },
            library: { type: 'image' }
        });

        // Runs when an image is selected.
        private_additional_info_image2_frame.on('select', function(){

            // Grabs the attachment selection and creates a JSON representation of the model.
            var media_attachment = private_additional_info_image2_frame.state().get('selection').first().toJSON();

            // Sends the attachment URL to our custom image input field.
            $('#private-additional-info-image2').val(media_attachment.url);
        });

        // Opens the media library frame.
        private_additional_info_image2_frame.open();
    });
});

jQuery(document).ready( function($){ "use strict";

// Instantiates the variable that holds the media library frame.
    var private_additional_info_image3_frame;

    // Runs when the image button is clicked.
    $('#private-additional-info-image3-button').click(function(e){

        // Prevents the default action from occuring.
        e.preventDefault();

        // If the frame already exists, re-open it.
        if ( private_additional_info_image3_frame ) {
            private_additional_info_image3_frame.open();
            return;
        }

        // Sets up the media library frame
        private_additional_info_image3_frame = wp.media.frames.private_additional_info_image3_frame = wp.media({
            title: meta_image.title,
            button: { text:  meta_image.button },
            library: { type: 'image' }
        });

        // Runs when an image is selected.
        private_additional_info_image3_frame.on('select', function(){

            // Grabs the attachment selection and creates a JSON representation of the model.
            var media_attachment = private_additional_info_image3_frame.state().get('selection').first().toJSON();

            // Sends the attachment URL to our custom image input field.
            $('#private-additional-info-image3').val(media_attachment.url);
        });

        // Opens the media library frame.
        private_additional_info_image3_frame.open();
    });
});

jQuery(document).ready( function($){ "use strict";

// Instantiates the variable that holds the media library frame.
    var private_additional_info_image4_frame;

    // Runs when the image button is clicked.
    $('#private-additional-info-image4-button').click(function(e){

        // Prevents the default action from occuring.
        e.preventDefault();

        // If the frame already exists, re-open it.
        if ( private_additional_info_image4_frame ) {
            private_additional_info_image4_frame.open();
            return;
        }

        // Sets up the media library frame
        private_additional_info_image4_frame = wp.media.frames.private_additional_info_image4_frame = wp.media({
            title: meta_image.title,
            button: { text:  meta_image.button },
            library: { type: 'image' }
        });

        // Runs when an image is selected.
        private_additional_info_image4_frame.on('select', function(){

            // Grabs the attachment selection and creates a JSON representation of the model.
            var media_attachment = private_additional_info_image4_frame.state().get('selection').first().toJSON();

            // Sends the attachment URL to our custom image input field.
            $('#private-additional-info-image4').val(media_attachment.url);
        });

        // Opens the media library frame.
        private_additional_info_image4_frame.open();
    });
});

jQuery(document).ready( function($){ "use strict";

// Instantiates the variable that holds the media library frame.
    var private_additional_info_image5_frame;

    // Runs when the image button is clicked.
    $('#private-additional-info-image5-button').click(function(e){

        // Prevents the default action from occuring.
        e.preventDefault();

        // If the frame already exists, re-open it.
        if ( private_additional_info_image5_frame ) {
            private_additional_info_image5_frame.open();
            return;
        }

        // Sets up the media library frame
        private_additional_info_image5_frame = wp.media.frames.private_additional_info_image5_frame = wp.media({
            title: meta_image.title,
            button: { text:  meta_image.button },
            library: { type: 'image' }
        });

        // Runs when an image is selected.
        private_additional_info_image5_frame.on('select', function(){

            // Grabs the attachment selection and creates a JSON representation of the model.
            var media_attachment = private_additional_info_image5_frame.state().get('selection').first().toJSON();

            // Sends the attachment URL to our custom image input field.
            $('#private-additional-info-image5').val(media_attachment.url);
        });

        // Opens the media library frame.
        private_additional_info_image5_frame.open();
    });
});

jQuery(document).ready( function($){ "use strict";

// Instantiates the variable that holds the media library frame.
    var private_additional_info_image6_frame;

    // Runs when the image button is clicked.
    $('#private-additional-info-image6-button').click(function(e){

        // Prevents the default action from occuring.
        e.preventDefault();

        // If the frame already exists, re-open it.
        if ( private_additional_info_image6_frame ) {
            private_additional_info_image6_frame.open();
            return;
        }

        // Sets up the media library frame
        private_additional_info_image6_frame = wp.media.frames.private_additional_info_image6_frame = wp.media({
            title: meta_image.title,
            button: { text:  meta_image.button },
            library: { type: 'image' }
        });

        // Runs when an image is selected.
        private_additional_info_image6_frame.on('select', function(){

            // Grabs the attachment selection and creates a JSON representation of the model.
            var media_attachment = private_additional_info_image6_frame.state().get('selection').first().toJSON();

            // Sends the attachment URL to our custom image input field.
            $('#private-additional-info-image6').val(media_attachment.url);
        });

        // Opens the media library frame.
        private_additional_info_image6_frame.open();
    });
});

jQuery(document).ready( function($){ "use strict";

// Instantiates the variable that holds the media library frame.
    var private_additional_info_image7_frame;

    // Runs when the image button is clicked.
    $('#private-additional-info-image7-button').click(function(e){

        // Prevents the default action from occuring.
        e.preventDefault();

        // If the frame already exists, re-open it.
        if ( private_additional_info_image7_frame ) {
            private_additional_info_image7_frame.open();
            return;
        }

        // Sets up the media library frame
        private_additional_info_image7_frame = wp.media.frames.private_additional_info_image7_frame = wp.media({
            title: meta_image.title,
            button: { text:  meta_image.button },
            library: { type: 'image' }
        });

        // Runs when an image is selected.
        private_additional_info_image7_frame.on('select', function(){

            // Grabs the attachment selection and creates a JSON representation of the model.
            var media_attachment = private_additional_info_image7_frame.state().get('selection').first().toJSON();

            // Sends the attachment URL to our custom image input field.
            $('#private-additional-info-image7').val(media_attachment.url);
        });

        // Opens the media library frame.
        private_additional_info_image7_frame.open();
    });
});

jQuery(document).ready( function($){ "use strict";

// Instantiates the variable that holds the media library frame.
    var private_additional_info_image8_frame;

    // Runs when the image button is clicked.
    $('#private-additional-info-image8-button').click(function(e){

        // Prevents the default action from occuring.
        e.preventDefault();

        // If the frame already exists, re-open it.
        if ( private_additional_info_image8_frame ) {
            private_additional_info_image8_frame.open();
            return;
        }

        // Sets up the media library frame
        private_additional_info_image8_frame = wp.media.frames.private_additional_info_image8_frame = wp.media({
            title: meta_image.title,
            button: { text:  meta_image.button },
            library: { type: 'image' }
        });

        // Runs when an image is selected.
        private_additional_info_image8_frame.on('select', function(){

            // Grabs the attachment selection and creates a JSON representation of the model.
            var media_attachment = private_additional_info_image8_frame.state().get('selection').first().toJSON();

            // Sends the attachment URL to our custom image input field.
            $('#private-additional-info-image8').val(media_attachment.url);
        });

        // Opens the media library frame.
        private_additional_info_image8_frame.open();
    });
});

jQuery(document).ready( function($){ "use strict";

// Instantiates the variable that holds the media library frame.
    var guide_logo_frame;

    // Runs when the image button is clicked.
    $('#guideservice-logo-button').click(function(e){

        // Prevents the default action from occuring.
        e.preventDefault();

        // If the frame already exists, re-open it.
        if ( guide_logo_frame ) {
            guide_logo_frame.open();
            return;
        }

        // Sets up the media library frame
        guide_logo_frame = wp.media.frames.guide_logo_frame = wp.media({
            title: meta_image.title,
            button: { text:  meta_image.button },
            library: { type: 'image' }
        });

        // Runs when an image is selected.
        guide_logo_frame.on('select', function(){

            // Grabs the attachment selection and creates a JSON representation of the model.
            var media_attachment = guide_logo_frame.state().get('selection').first().toJSON();

            // Sends the attachment URL to our custom image input field.
            $('#guideservice-logo').val(media_attachment.url);
        });

        // Opens the media library frame.
        guide_logo_frame.open();
    });
});

jQuery(document).ready( function($){ "use strict";

// Instantiates the variable that holds the media library frame.
    var guide_image_frame;

    // Runs when the image button is clicked.
    $('#guideservice-image-button').click(function(e){

        // Prevents the default action from occuring.
        e.preventDefault();

        // If the frame already exists, re-open it.
        if ( guide_image_frame ) {
            guide_image_frame.open();
            return;
        }

        // Sets up the media library frame
        guide_image_frame = wp.media.frames.guide_image_frame = wp.media({
            title: meta_image.title,
            button: { text:  meta_image.button },
            library: { type: 'image' }
        });

        // Runs when an image is selected.
        guide_image_frame.on('select', function(){

            // Grabs the attachment selection and creates a JSON representation of the model.
            var media_attachment = guide_image_frame.state().get('selection').first().toJSON();

            // Sends the attachment URL to our custom image input field.
            $('#guideservice-image').val(media_attachment.url);
        });

        // Opens the media library frame.
        guide_image_frame.open();
    });
});

jQuery(document).ready( function($){ "use strict";

// Instantiates the variable that holds the media library frame.
    var guide_image_gs1_frame;

    // Runs when the image button is clicked.
    $('#guideservice-gs1-image-button').click(function(e){

        // Prevents the default action from occuring.
        e.preventDefault();

        // If the frame already exists, re-open it.
        if ( guide_image_gs1_frame ) {
            guide_image_gs1_frame.open();
            return;
        }

        // Sets up the media library frame
        guide_image_gs1_frame = wp.media.frames.guide_image_gs1_frame = wp.media({
            title: meta_image.title,
            button: { text:  meta_image.button },
            library: { type: 'image' }
        });

        // Runs when an image is selected.
        guide_image_gs1_frame.on('select', function(){

            // Grabs the attachment selection and creates a JSON representation of the model.
            var media_attachment = guide_image_gs1_frame.state().get('selection').first().toJSON();

            // Sends the attachment URL to our custom image input field.
            $('#guideservice-gs1-image').val(media_attachment.url);
        });

        // Opens the media library frame.
        guide_image_gs1_frame.open();
    });
});

jQuery(document).ready( function($){ "use strict";

// Instantiates the variable that holds the media library frame.
    var feature_image_gs2_frame;

    // Runs when the image button is clicked.
    $('#feature-gs2-image-button').click(function(e){

        // Prevents the default action from occuring.
        e.preventDefault();

        // If the frame already exists, re-open it.
        if ( feature_image_gs2_frame ) {
            feature_image_gs2_frame.open();
            return;
        }

        // Sets up the media library frame
        feature_image_gs2_frame = wp.media.frames.feature_image_gs2_frame = wp.media({
            title: meta_image.title,
            button: { text:  meta_image.button },
            library: { type: 'image' }
        });

        // Runs when an image is selected.
        feature_image_gs2_frame.on('select', function(){

            // Grabs the attachment selection and creates a JSON representation of the model.
            var media_attachment = feature_image_gs2_frame.state().get('selection').first().toJSON();

            // Sends the attachment URL to our custom image input field.
            $('#feature-gs2-image').val(media_attachment.url);
        });

        // Opens the media library frame.
        feature_image_gs2_frame.open();
    });
});

jQuery(document).ready( function($){ "use strict";

// Instantiates the variable that holds the media library frame.
    var feature_image_gs3_frame;

    // Runs when the image button is clicked.
    $('#feature-gs3-image-button').click(function(e){

        // Prevents the default action from occuring.
        e.preventDefault();

        // If the frame already exists, re-open it.
        if ( feature_image_gs3_frame ) {
            feature_image_gs3_frame.open();
            return;
        }

        // Sets up the media library frame
        feature_image_gs3_frame = wp.media.frames.feature_image_gs3_frame = wp.media({
            title: meta_image.title,
            button: { text:  meta_image.button },
            library: { type: 'image' }
        });

        // Runs when an image is selected.
        feature_image_gs3_frame.on('select', function(){

            // Grabs the attachment selection and creates a JSON representation of the model.
            var media_attachment = feature_image_gs3_frame.state().get('selection').first().toJSON();

            // Sends the attachment URL to our custom image input field.
            $('#feature-gs3-image').val(media_attachment.url);
        });

        // Opens the media library frame.
        feature_image_gs3_frame.open();
    });
});

jQuery(document).ready( function($){ "use strict";

// Instantiates the variable that holds the media library frame.
    var feature_image_gs4_frame;

    // Runs when the image button is clicked.
    $('#feature-gs4-image-button').click(function(e){

        // Prevents the default action from occuring.
        e.preventDefault();

        // If the frame already exists, re-open it.
        if ( feature_image_gs4_frame ) {
            feature_image_gs4_frame.open();
            return;
        }

        // Sets up the media library frame
        feature_image_gs4_frame = wp.media.frames.feature_image_gs4_frame = wp.media({
            title: meta_image.title,
            button: { text:  meta_image.button },
            library: { type: 'image' }
        });

        // Runs when an image is selected.
        feature_image_gs4_frame.on('select', function(){

            // Grabs the attachment selection and creates a JSON representation of the model.
            var media_attachment = feature_image_gs4_frame.state().get('selection').first().toJSON();

            // Sends the attachment URL to our custom image input field.
            $('#feature-gs4-image').val(media_attachment.url);
        });

        // Opens the media library frame.
        feature_image_gs4_frame.open();
    });
});

jQuery(document).ready( function($){ "use strict";

// Instantiates the variable that holds the media library frame.
    var feature_image_gs5_frame;

    // Runs when the image button is clicked.
    $('#feature-gs5-image-button').click(function(e){

        // Prevents the default action from occuring.
        e.preventDefault();

        // If the frame already exists, re-open it.
        if ( feature_image_gs5_frame ) {
            feature_image_gs5_frame.open();
            return;
        }

        // Sets up the media library frame
        feature_image_gs5_frame = wp.media.frames.feature_image_gs5_frame = wp.media({
            title: meta_image.title,
            button: { text:  meta_image.button },
            library: { type: 'image' }
        });

        // Runs when an image is selected.
        feature_image_gs5_frame.on('select', function(){

            // Grabs the attachment selection and creates a JSON representation of the model.
            var media_attachment = feature_image_gs5_frame.state().get('selection').first().toJSON();

            // Sends the attachment URL to our custom image input field.
            $('#feature-gs5-image').val(media_attachment.url);
        });

        // Opens the media library frame.
        feature_image_gs5_frame.open();
    });
});

jQuery(document).ready( function($){ "use strict";

// Instantiates the variable that holds the media library frame.
    var guideservice_additional_info_image1_frame;

    // Runs when the image button is clicked.
    $('#guideservice-additional-info-image1-button').click(function(e){

        // Prevents the default action from occuring.
        e.preventDefault();

        // If the frame already exists, re-open it.
        if ( guideservice_additional_info_image1_frame ) {
            guideservice_additional_info_image1_frame.open();
            return;
        }

        // Sets up the media library frame
        guideservice_additional_info_image1_frame = wp.media.frames.guideservice_additional_info_image1_frame = wp.media({
            title: meta_image.title,
            button: { text:  meta_image.button },
            library: { type: 'image' }
        });

        // Runs when an image is selected.
        guideservice_additional_info_image1_frame.on('select', function(){

            // Grabs the attachment selection and creates a JSON representation of the model.
            var media_attachment = guideservice_additional_info_image1_frame.state().get('selection').first().toJSON();

            // Sends the attachment URL to our custom image input field.
            $('#guideservice-additional-info-image1').val(media_attachment.url);
        });

        // Opens the media library frame.
        guideservice_additional_info_image1_frame.open();
    });
});

jQuery(document).ready( function($){ "use strict";

// Instantiates the variable that holds the media library frame.
    var guideservice_additional_info_image2_frame;

    // Runs when the image button is clicked.
    $('#guideservice-additional-info-image2-button').click(function(e){

        // Prevents the default action from occuring.
        e.preventDefault();

        // If the frame already exists, re-open it.
        if ( guideservice_additional_info_image2_frame ) {
            guideservice_additional_info_image2_frame.open();
            return;
        }

        // Sets up the media library frame
        guideservice_additional_info_image2_frame = wp.media.frames.guideservice_additional_info_image2_frame = wp.media({
            title: meta_image.title,
            button: { text:  meta_image.button },
            library: { type: 'image' }
        });

        // Runs when an image is selected.
        guideservice_additional_info_image2_frame.on('select', function(){

            // Grabs the attachment selection and creates a JSON representation of the model.
            var media_attachment = guideservice_additional_info_image2_frame.state().get('selection').first().toJSON();

            // Sends the attachment URL to our custom image input field.
            $('#guideservice-additional-info-image2').val(media_attachment.url);
        });

        // Opens the media library frame.
        guideservice_additional_info_image2_frame.open();
    });
});

jQuery(document).ready( function($){ "use strict";

// Instantiates the variable that holds the media library frame.
    var guideservice_additional_info_image3_frame;

    // Runs when the image button is clicked.
    $('#guideservice-additional-info-image3-button').click(function(e){

        // Prevents the default action from occuring.
        e.preventDefault();

        // If the frame already exists, re-open it.
        if ( guideservice_additional_info_image3_frame ) {
            guideservice_additional_info_image3_frame.open();
            return;
        }

        // Sets up the media library frame
        guideservice_additional_info_image3_frame = wp.media.frames.guideservice_additional_info_image3_frame = wp.media({
            title: meta_image.title,
            button: { text:  meta_image.button },
            library: { type: 'image' }
        });

        // Runs when an image is selected.
        guideservice_additional_info_image3_frame.on('select', function(){

            // Grabs the attachment selection and creates a JSON representation of the model.
            var media_attachment = guideservice_additional_info_image3_frame.state().get('selection').first().toJSON();

            // Sends the attachment URL to our custom image input field.
            $('#guideservice-additional-info-image3').val(media_attachment.url);
        });

        // Opens the media library frame.
        guideservice_additional_info_image3_frame.open();
    });
});

jQuery(document).ready( function($){ "use strict";

// Instantiates the variable that holds the media library frame.
    var guideservice_additional_info_image4_frame;

    // Runs when the image button is clicked.
    $('#guideservice-additional-info-image4-button').click(function(e){

        // Prevents the default action from occuring.
        e.preventDefault();

        // If the frame already exists, re-open it.
        if ( guideservice_additional_info_image4_frame ) {
            guideservice_additional_info_image4_frame.open();
            return;
        }

        // Sets up the media library frame
        guideservice_additional_info_image4_frame = wp.media.frames.guideservice_additional_info_image4_frame = wp.media({
            title: meta_image.title,
            button: { text:  meta_image.button },
            library: { type: 'image' }
        });

        // Runs when an image is selected.
        guideservice_additional_info_image4_frame.on('select', function(){

            // Grabs the attachment selection and creates a JSON representation of the model.
            var media_attachment = guideservice_additional_info_image4_frame.state().get('selection').first().toJSON();

            // Sends the attachment URL to our custom image input field.
            $('#guideservice-additional-info-image4').val(media_attachment.url);
        });

        // Opens the media library frame.
        guideservice_additional_info_image4_frame.open();
    });
});

jQuery(document).ready( function($){ "use strict";

// Instantiates the variable that holds the media library frame.
    var guideservice_additional_info_image5_frame;

    // Runs when the image button is clicked.
    $('#guideservice-additional-info-image5-button').click(function(e){

        // Prevents the default action from occuring.
        e.preventDefault();

        // If the frame already exists, re-open it.
        if ( guideservice_additional_info_image5_frame ) {
            guideservice_additional_info_image5_frame.open();
            return;
        }

        // Sets up the media library frame
        guideservice_additional_info_image5_frame = wp.media.frames.guideservice_additional_info_image5_frame = wp.media({
            title: meta_image.title,
            button: { text:  meta_image.button },
            library: { type: 'image' }
        });

        // Runs when an image is selected.
        guideservice_additional_info_image5_frame.on('select', function(){

            // Grabs the attachment selection and creates a JSON representation of the model.
            var media_attachment = guideservice_additional_info_image5_frame.state().get('selection').first().toJSON();

            // Sends the attachment URL to our custom image input field.
            $('#guideservice-additional-info-image5').val(media_attachment.url);
        });

        // Opens the media library frame.
        guideservice_additional_info_image5_frame.open();
    });
});

jQuery(document).ready( function($){ "use strict";

// Instantiates the variable that holds the media library frame.
    var guideservice_additional_info_image6_frame;

    // Runs when the image button is clicked.
    $('#guideservice-additional-info-image6-button').click(function(e){

        // Prevents the default action from occuring.
        e.preventDefault();

        // If the frame already exists, re-open it.
        if ( guideservice_additional_info_image6_frame ) {
            guideservice_additional_info_image6_frame.open();
            return;
        }

        // Sets up the media library frame
        guideservice_additional_info_image6_frame = wp.media.frames.guideservice_additional_info_image6_frame = wp.media({
            title: meta_image.title,
            button: { text:  meta_image.button },
            library: { type: 'image' }
        });

        // Runs when an image is selected.
        guideservice_additional_info_image6_frame.on('select', function(){

            // Grabs the attachment selection and creates a JSON representation of the model.
            var media_attachment = guideservice_additional_info_image6_frame.state().get('selection').first().toJSON();

            // Sends the attachment URL to our custom image input field.
            $('#guideservice-additional-info-image6').val(media_attachment.url);
        });

        // Opens the media library frame.
        guideservice_additional_info_image6_frame.open();
    });
});

jQuery(document).ready( function($){ "use strict";

// Instantiates the variable that holds the media library frame.
    var guideservice_additional_info_image7_frame;

    // Runs when the image button is clicked.
    $('#guideservice-additional-info-image7-button').click(function(e){

        // Prevents the default action from occuring.
        e.preventDefault();

        // If the frame already exists, re-open it.
        if ( guideservice_additional_info_image7_frame ) {
            guideservice_additional_info_image7_frame.open();
            return;
        }

        // Sets up the media library frame
        guideservice_additional_info_image7_frame = wp.media.frames.guideservice_additional_info_image7_frame = wp.media({
            title: meta_image.title,
            button: { text:  meta_image.button },
            library: { type: 'image' }
        });

        // Runs when an image is selected.
        guideservice_additional_info_image7_frame.on('select', function(){

            // Grabs the attachment selection and creates a JSON representation of the model.
            var media_attachment = guideservice_additional_info_image7_frame.state().get('selection').first().toJSON();

            // Sends the attachment URL to our custom image input field.
            $('#guideservice-additional-info-image7').val(media_attachment.url);
        });

        // Opens the media library frame.
        guideservice_additional_info_image7_frame.open();
    });
});

jQuery(document).ready( function($){ "use strict";

// Instantiates the variable that holds the media library frame.
    var guideservice_additional_info_image8_frame;

    // Runs when the image button is clicked.
    $('#guideservice-additional-info-image8-button').click(function(e){

        // Prevents the default action from occuring.
        e.preventDefault();

        // If the frame already exists, re-open it.
        if ( guideservice_additional_info_image8_frame ) {
            guideservice_additional_info_image8_frame.open();
            return;
        }

        // Sets up the media library frame
        guideservice_additional_info_image8_frame = wp.media.frames.guideservice_additional_info_image8_frame = wp.media({
            title: meta_image.title,
            button: { text:  meta_image.button },
            library: { type: 'image' }
        });

        // Runs when an image is selected.
        guideservice_additional_info_image8_frame.on('select', function(){

            // Grabs the attachment selection and creates a JSON representation of the model.
            var media_attachment = guideservice_additional_info_image8_frame.state().get('selection').first().toJSON();

            // Sends the attachment URL to our custom image input field.
            $('#guideservice-additional-info-image8').val(media_attachment.url);
        });

        // Opens the media library frame.
        guideservice_additional_info_image8_frame.open();
    });
});

// SCHOOLS

jQuery(document).ready( function($){ "use strict";

// Instantiates the variable that holds the media library frame.
    var schools_logo_frame;

    // Runs when the image button is clicked.
    $('#schools-logo-button').click(function(e){

        // Prevents the default action from occuring.
        e.preventDefault();

        // If the frame already exists, re-open it.
        if ( schools_logo_frame ) {
            schools_logo_frame.open();
            return;
        }

        // Sets up the media library frame
        schools_logo_frame = wp.media.frames.schools_logo_frame = wp.media({
            title: meta_image.title,
            button: { text:  meta_image.button },
            library: { type: 'image' }
        });

        // Runs when an image is selected.
        schools_logo_frame.on('select', function(){

            // Grabs the attachment selection and creates a JSON representation of the model.
            var media_attachment = schools_logo_frame.state().get('selection').first().toJSON();

            // Sends the attachment URL to our custom image input field.
            $('#schools-logo').val(media_attachment.url);
        });

        // Opens the media library frame.
        schools_logo_frame.open();
    });
});
jQuery(document).ready( function($){ "use strict";

// Instantiates the variable that holds the media library frame.
    var schools_image_frame;

    // Runs when the image button is clicked.
    $('#schools-image-button').click(function(e){

        // Prevents the default action from occuring.
        e.preventDefault();

        // If the frame already exists, re-open it.
        if ( schools_image_frame ) {
            schools_image_frame.open();
            return;
        }

        // Sets up the media library frame
        schools_image_frame = wp.media.frames.schools_image_frame = wp.media({
            title: meta_image.title,
            button: { text:  meta_image.button },
            library: { type: 'image' }
        });

        // Runs when an image is selected.
        schools_image_frame.on('select', function(){

            // Grabs the attachment selection and creates a JSON representation of the model.
            var media_attachment = schools_image_frame.state().get('selection').first().toJSON();

            // Sends the attachment URL to our custom image input field.
            $('#schools-image').val(media_attachment.url);
        });

        // Opens the media library frame.
        schools_image_frame.open();
    });
});

jQuery(document).ready( function($){ "use strict";

// Instantiates the variable that holds the media library frame.
    var feature_sch1_image_frame;

    // Runs when the image button is clicked.
    $('#feature-sch1-image-button').click(function(e){

        // Prevents the default action from occuring.
        e.preventDefault();

        // If the frame already exists, re-open it.
        if ( feature_sch1_image_frame ) {
            feature_sch1_image_frame.open();
            return;
        }

        // Sets up the media library frame
        feature_sch1_image_frame = wp.media.frames.feature_sch1_image_frame = wp.media({
            title: meta_image.title,
            button: { text:  meta_image.button },
            library: { type: 'image' }
        });

        // Runs when an image is selected.
        feature_sch1_image_frame.on('select', function(){

            // Grabs the attachment selection and creates a JSON representation of the model.
            var media_attachment = feature_sch1_image_frame.state().get('selection').first().toJSON();

            // Sends the attachment URL to our custom image input field.
            $('#feature-sch1-image').val(media_attachment.url);
        });

        // Opens the media library frame.
        feature_sch1_image_frame.open();
    });
});

jQuery(document).ready( function($){ "use strict";

// Instantiates the variable that holds the media library frame.
    var feature_sch2_image_frame;

    // Runs when the image button is clicked.
    $('#feature-sch2-image-button').click(function(e){

        // Prevents the default action from occuring.
        e.preventDefault();

        // If the frame already exists, re-open it.
        if ( feature_sch2_image_frame ) {
            feature_sch2_image_frame.open();
            return;
        }

        // Sets up the media library frame
        feature_sch2_image_frame = wp.media.frames.feature_sch2_image_frame = wp.media({
            title: meta_image.title,
            button: { text:  meta_image.button },
            library: { type: 'image' }
        });

        // Runs when an image is selected.
        feature_sch2_image_frame.on('select', function(){

            // Grabs the attachment selection and creates a JSON representation of the model.
            var media_attachment = feature_sch2_image_frame.state().get('selection').first().toJSON();

            // Sends the attachment URL to our custom image input field.
            $('#feature-sch2-image').val(media_attachment.url);
        });

        // Opens the media library frame.
        feature_sch2_image_frame.open();
    });
});

jQuery(document).ready( function($){ "use strict";

// Instantiates the variable that holds the media library frame.
    var feature_sch3_itinerary_image_frame;

    // Runs when the image button is clicked.
    $('#feature-sch3-itinerary-image-button').click(function(e){

        // Prevents the default action from occuring.
        e.preventDefault();

        // If the frame already exists, re-open it.
        if ( feature_sch3_itinerary_image_frame ) {
            feature_sch3_itinerary_image_frame.open();
            return;
        }

        // Sets up the media library frame
        feature_sch3_itinerary_image_frame = wp.media.frames.feature_sch3_itinerary_image_frame = wp.media({
            title: meta_image.title,
            button: { text:  meta_image.button },
            library: { type: 'image' }
        });

        // Runs when an image is selected.
        feature_sch3_itinerary_image_frame.on('select', function(){

            // Grabs the attachment selection and creates a JSON representation of the model.
            var media_attachment = feature_sch3_itinerary_image_frame.state().get('selection').first().toJSON();

            // Sends the attachment URL to our custom image input field.
            $('#feature-sch3-itinerary-image').val(media_attachment.url);
        });

        // Opens the media library frame.
        feature_sch3_itinerary_image_frame.open();
    });
});

jQuery(document).ready( function($){ "use strict";

// Instantiates the variable that holds the media library frame.
    var feature_sch4_image_frame;

    // Runs when the image button is clicked.
    $('#feature-sch4-image-button').click(function(e){

        // Prevents the default action from occuring.
        e.preventDefault();

        // If the frame already exists, re-open it.
        if ( feature_sch4_image_frame ) {
            feature_sch4_image_frame.open();
            return;
        }

        // Sets up the media library frame
        feature_sch4_image_frame = wp.media.frames.feature_sch4_image_frame = wp.media({
            title: meta_image.title,
            button: { text:  meta_image.button },
            library: { type: 'image' }
        });

        // Runs when an image is selected.
        feature_sch4_image_frame.on('select', function(){

            // Grabs the attachment selection and creates a JSON representation of the model.
            var media_attachment = feature_sch4_image_frame.state().get('selection').first().toJSON();

            // Sends the attachment URL to our custom image input field.
            $('#feature-sch4-image').val(media_attachment.url);
        });

        // Opens the media library frame.
        feature_sch4_image_frame.open();
    });
});

jQuery(document).ready( function($){ "use strict";

// Instantiates the variable that holds the media library frame.
    var feature_sch5_image_frame;

    // Runs when the image button is clicked.
    $('#feature-sch5-image-button').click(function(e){

        // Prevents the default action from occuring.
        e.preventDefault();

        // If the frame already exists, re-open it.
        if ( feature_sch5_image_frame ) {
            feature_sch5_image_frame.open();
            return;
        }

        // Sets up the media library frame
        feature_sch5_image_frame = wp.media.frames.feature_sch5_image_frame = wp.media({
            title: meta_image.title,
            button: { text:  meta_image.button },
            library: { type: 'image' }
        });

        // Runs when an image is selected.
        feature_sch5_image_frame.on('select', function(){

            // Grabs the attachment selection and creates a JSON representation of the model.
            var media_attachment = feature_sch5_image_frame.state().get('selection').first().toJSON();

            // Sends the attachment URL to our custom image input field.
            $('#feature-sch5-image').val(media_attachment.url);
        });

        // Opens the media library frame.
        feature_sch5_image_frame.open();
    });
});

jQuery(document).ready( function($){ "use strict";

// Instantiates the variable that holds the media library frame.
    var schools_additional_info_image1_frame;

    // Runs when the image button is clicked.
    $('#schools-additional-info-image1-button').click(function(e){

        // Prevents the default action from occuring.
        e.preventDefault();

        // If the frame already exists, re-open it.
        if ( schools_additional_info_image1_frame ) {
            schools_additional_info_image1_frame.open();
            return;
        }

        // Sets up the media library frame
        schools_additional_info_image1_frame = wp.media.frames.schools_additional_info_image1_frame = wp.media({
            title: meta_image.title,
            button: { text:  meta_image.button },
            library: { type: 'image' }
        });

        // Runs when an image is selected.
        schools_additional_info_image1_frame.on('select', function(){

            // Grabs the attachment selection and creates a JSON representation of the model.
            var media_attachment = schools_additional_info_image1_frame.state().get('selection').first().toJSON();

            // Sends the attachment URL to our custom image input field.
            $('#schools-additional-info-image1').val(media_attachment.url);
        });

        // Opens the media library frame.
        schools_additional_info_image1_frame.open();
    });
});

jQuery(document).ready( function($){ "use strict";

// Instantiates the variable that holds the media library frame.
    var schools_additional_info_image2_frame;

    // Runs when the image button is clicked.
    $('#schools-additional-info-image2-button').click(function(e){

        // Prevents the default action from occuring.
        e.preventDefault();

        // If the frame already exists, re-open it.
        if ( schools_additional_info_image2_frame ) {
            schools_additional_info_image2_frame.open();
            return;
        }

        // Sets up the media library frame
        schools_additional_info_image2_frame = wp.media.frames.schools_additional_info_image2_frame = wp.media({
            title: meta_image.title,
            button: { text:  meta_image.button },
            library: { type: 'image' }
        });

        // Runs when an image is selected.
        schools_additional_info_image2_frame.on('select', function(){

            // Grabs the attachment selection and creates a JSON representation of the model.
            var media_attachment = schools_additional_info_image2_frame.state().get('selection').first().toJSON();

            // Sends the attachment URL to our custom image input field.
            $('#schools-additional-info-image2').val(media_attachment.url);
        });

        // Opens the media library frame.
        schools_additional_info_image2_frame.open();
    });
});

jQuery(document).ready( function($){ "use strict";

// Instantiates the variable that holds the media library frame.
    var schools_additional_info_image3_frame;

    // Runs when the image button is clicked.
    $('#schools-additional-info-image3-button').click(function(e){

        // Prevents the default action from occuring.
        e.preventDefault();

        // If the frame already exists, re-open it.
        if ( schools_additional_info_image3_frame ) {
            schools_additional_info_image3_frame.open();
            return;
        }

        // Sets up the media library frame
        schools_additional_info_image3_frame = wp.media.frames.schools_additional_info_image3_frame = wp.media({
            title: meta_image.title,
            button: { text:  meta_image.button },
            library: { type: 'image' }
        });

        // Runs when an image is selected.
        schools_additional_info_image3_frame.on('select', function(){

            // Grabs the attachment selection and creates a JSON representation of the model.
            var media_attachment = schools_additional_info_image3_frame.state().get('selection').first().toJSON();

            // Sends the attachment URL to our custom image input field.
            $('#schools-additional-info-image3').val(media_attachment.url);
        });

        // Opens the media library frame.
        schools_additional_info_image3_frame.open();
    });
});

jQuery(document).ready( function($){ "use strict";

// Instantiates the variable that holds the media library frame.
    var schools_additional_info_image4_frame;

    // Runs when the image button is clicked.
    $('#schools-additional-info-image4-button').click(function(e){

        // Prevents the default action from occuring.
        e.preventDefault();

        // If the frame already exists, re-open it.
        if ( schools_additional_info_image4_frame ) {
            schools_additional_info_image4_frame.open();
            return;
        }

        // Sets up the media library frame
        schools_additional_info_image4_frame = wp.media.frames.schools_additional_info_image4_frame = wp.media({
            title: meta_image.title,
            button: { text:  meta_image.button },
            library: { type: 'image' }
        });

        // Runs when an image is selected.
        schools_additional_info_image4_frame.on('select', function(){

            // Grabs the attachment selection and creates a JSON representation of the model.
            var media_attachment = schools_additional_info_image4_frame.state().get('selection').first().toJSON();

            // Sends the attachment URL to our custom image input field.
            $('#schools-additional-info-image4').val(media_attachment.url);
        });

        // Opens the media library frame.
        schools_additional_info_image4_frame.open();
    });
});

jQuery(document).ready( function($){ "use strict";

// Instantiates the variable that holds the media library frame.
    var schools_additional_info_image5_frame;

    // Runs when the image button is clicked.
    $('#schools-additional-info-image5-button').click(function(e){

        // Prevents the default action from occuring.
        e.preventDefault();

        // If the frame already exists, re-open it.
        if ( schools_additional_info_image5_frame ) {
            schools_additional_info_image5_frame.open();
            return;
        }

        // Sets up the media library frame
        schools_additional_info_image5_frame = wp.media.frames.schools_additional_info_image5_frame = wp.media({
            title: meta_image.title,
            button: { text:  meta_image.button },
            library: { type: 'image' }
        });

        // Runs when an image is selected.
        schools_additional_info_image5_frame.on('select', function(){

            // Grabs the attachment selection and creates a JSON representation of the model.
            var media_attachment = schools_additional_info_image5_frame.state().get('selection').first().toJSON();

            // Sends the attachment URL to our custom image input field.
            $('#schools-additional-info-image5').val(media_attachment.url);
        });

        // Opens the media library frame.
        schools_additional_info_image5_frame.open();
    });
});

jQuery(document).ready( function($){ "use strict";

// Instantiates the variable that holds the media library frame.
    var schools_additional_info_image6_frame;

    // Runs when the image button is clicked.
    $('#schools-additional-info-image6-button').click(function(e){

        // Prevents the default action from occuring.
        e.preventDefault();

        // If the frame already exists, re-open it.
        if ( schools_additional_info_image6_frame ) {
            schools_additional_info_image6_frame.open();
            return;
        }

        // Sets up the media library frame
        schools_additional_info_image6_frame = wp.media.frames.schools_additional_info_image6_frame = wp.media({
            title: meta_image.title,
            button: { text:  meta_image.button },
            library: { type: 'image' }
        });

        // Runs when an image is selected.
        schools_additional_info_image6_frame.on('select', function(){

            // Grabs the attachment selection and creates a JSON representation of the model.
            var media_attachment = schools_additional_info_image6_frame.state().get('selection').first().toJSON();

            // Sends the attachment URL to our custom image input field.
            $('#schools-additional-info-image6').val(media_attachment.url);
        });

        // Opens the media library frame.
        schools_additional_info_image6_frame.open();
    });
});

jQuery(document).ready( function($){ "use strict";

// Instantiates the variable that holds the media library frame.
    var schools_additional_info_image7_frame;

    // Runs when the image button is clicked.
    $('#schools-additional-info-image7-button').click(function(e){

        // Prevents the default action from occuring.
        e.preventDefault();

        // If the frame already exists, re-open it.
        if ( schools_additional_info_image7_frame ) {
            schools_additional_info_image7_frame.open();
            return;
        }

        // Sets up the media library frame
        schools_additional_info_image7_frame = wp.media.frames.schools_additional_info_image7_frame = wp.media({
            title: meta_image.title,
            button: { text:  meta_image.button },
            library: { type: 'image' }
        });

        // Runs when an image is selected.
        schools_additional_info_image7_frame.on('select', function(){

            // Grabs the attachment selection and creates a JSON representation of the model.
            var media_attachment = schools_additional_info_image7_frame.state().get('selection').first().toJSON();

            // Sends the attachment URL to our custom image input field.
            $('#schools-additional-info-image7').val(media_attachment.url);
        });

        // Opens the media library frame.
        schools_additional_info_image7_frame.open();
    });
});

jQuery(document).ready( function($){ "use strict";

// Instantiates the variable that holds the media library frame.
    var schools_additional_info_image8_frame;

    // Runs when the image button is clicked.
    $('#schools-additional-info-image8-button').click(function(e){

        // Prevents the default action from occuring.
        e.preventDefault();

        // If the frame already exists, re-open it.
        if ( schools_additional_info_image8_frame ) {
            schools_additional_info_image8_frame.open();
            return;
        }

        // Sets up the media library frame
        schools_additional_info_image8_frame = wp.media.frames.schools_additional_info_image8_frame = wp.media({
            title: meta_image.title,
            button: { text:  meta_image.button },
            library: { type: 'image' }
        });

        // Runs when an image is selected.
        schools_additional_info_image8_frame.on('select', function(){

            // Grabs the attachment selection and creates a JSON representation of the model.
            var media_attachment = schools_additional_info_image8_frame.state().get('selection').first().toJSON();

            // Sends the attachment URL to our custom image input field.
            $('#schools-additional-info-image8').val(media_attachment.url);
        });

        // Opens the media library frame.
        schools_additional_info_image8_frame.open();
    });
});

// FISH CAMP

jQuery(document).ready( function($){ "use strict";

// Instantiates the variable that holds the media library frame.
    var fish_camp_logo_frame;

    // Runs when the image button is clicked.
    $('#fish-camp-logo-button').click(function(e){

        // Prevents the default action from occuring.
        e.preventDefault();

        // If the frame already exists, re-open it.
        if ( fish_camp_logo_frame ) {
            fish_camp_logo_frame.open();
            return;
        }

        // Sets up the media library frame
        fish_camp_logo_frame = wp.media.frames.fish_camp_logo_frame = wp.media({
            title: meta_image.title,
            button: { text:  meta_image.button },
            library: { type: 'image' }
        });

        // Runs when an image is selected.
        fish_camp_logo_frame.on('select', function(){

            // Grabs the attachment selection and creates a JSON representation of the model.
            var media_attachment = fish_camp_logo_frame.state().get('selection').first().toJSON();

            // Sends the attachment URL to our custom image input field.
            $('#fish-camp-logo').val(media_attachment.url);
        });

        // Opens the media library frame.
        fish_camp_logo_frame.open();
    });
});
jQuery(document).ready( function($){ "use strict";

// Instantiates the variable that holds the media library frame.
    var fish_camp_image_frame;

    // Runs when the image button is clicked.
    $('#fish-camp-image-button').click(function(e){

        // Prevents the default action from occuring.
        e.preventDefault();

        // If the frame already exists, re-open it.
        if ( fish_camp_image_frame ) {
            fish_camp_image_frame.open();
            return;
        }

        // Sets up the media library frame
        fish_camp_image_frame = wp.media.frames.fish_camp_image_frame = wp.media({
            title: meta_image.title,
            button: { text:  meta_image.button },
            library: { type: 'image' }
        });

        // Runs when an image is selected.
        fish_camp_image_frame.on('select', function(){

            // Grabs the attachment selection and creates a JSON representation of the model.
            var media_attachment = fish_camp_image_frame.state().get('selection').first().toJSON();

            // Sends the attachment URL to our custom image input field.
            $('#fish-camp-image').val(media_attachment.url);
        });

        // Opens the media library frame.
        fish_camp_image_frame.open();
    });
});

jQuery(document).ready( function($){ "use strict";

// Instantiates the variable that holds the media library frame.
    var feature_sch1_image_frame;

    // Runs when the image button is clicked.
    $('#feature-fc1-image-button').click(function(e){

        // Prevents the default action from occuring.
        e.preventDefault();

        // If the frame already exists, re-open it.
        if ( feature_sch1_image_frame ) {
            feature_sch1_image_frame.open();
            return;
        }

        // Sets up the media library frame
        feature_sch1_image_frame = wp.media.frames.feature_sch1_image_frame = wp.media({
            title: meta_image.title,
            button: { text:  meta_image.button },
            library: { type: 'image' }
        });

        // Runs when an image is selected.
        feature_sch1_image_frame.on('select', function(){

            // Grabs the attachment selection and creates a JSON representation of the model.
            var media_attachment = feature_sch1_image_frame.state().get('selection').first().toJSON();

            // Sends the attachment URL to our custom image input field.
            $('#feature-fc1-image').val(media_attachment.url);
        });

        // Opens the media library frame.
        feature_sch1_image_frame.open();
    });
});

jQuery(document).ready( function($){ "use strict";

// Instantiates the variable that holds the media library frame.
    var feature_sch2_image_frame;

    // Runs when the image button is clicked.
    $('#feature-fc2-image-button').click(function(e){

        // Prevents the default action from occuring.
        e.preventDefault();

        // If the frame already exists, re-open it.
        if ( feature_sch2_image_frame ) {
            feature_sch2_image_frame.open();
            return;
        }

        // Sets up the media library frame
        feature_sch2_image_frame = wp.media.frames.feature_sch2_image_frame = wp.media({
            title: meta_image.title,
            button: { text:  meta_image.button },
            library: { type: 'image' }
        });

        // Runs when an image is selected.
        feature_sch2_image_frame.on('select', function(){

            // Grabs the attachment selection and creates a JSON representation of the model.
            var media_attachment = feature_sch2_image_frame.state().get('selection').first().toJSON();

            // Sends the attachment URL to our custom image input field.
            $('#feature-fc2-image').val(media_attachment.url);
        });

        // Opens the media library frame.
        feature_sch2_image_frame.open();
    });
});

jQuery(document).ready( function($){ "use strict";

// Instantiates the variable that holds the media library frame.
    var feature_sch3_image_frame;

    // Runs when the image button is clicked.
    $('#feature-fc3-image-button').click(function(e){

        // Prevents the default action from occuring.
        e.preventDefault();

        // If the frame already exists, re-open it.
        if ( feature_sch3_image_frame ) {
            feature_sch3_image_frame.open();
            return;
        }

        // Sets up the media library frame
        feature_sch3_image_frame = wp.media.frames.feature_sch3_image_frame = wp.media({
            title: meta_image.title,
            button: { text:  meta_image.button },
            library: { type: 'image' }
        });

        // Runs when an image is selected.
        feature_sch3_image_frame.on('select', function(){

            // Grabs the attachment selection and creates a JSON representation of the model.
            var media_attachment = feature_sch3_image_frame.state().get('selection').first().toJSON();

            // Sends the attachment URL to our custom image input field.
            $('#feature-fc3-image').val(media_attachment.url);
        });

        // Opens the media library frame.
        feature_sch3_image_frame.open();
    });
});

jQuery(document).ready( function($){ "use strict";

// Instantiates the variable that holds the media library frame.
    var feature_sch4_image_frame;

    // Runs when the image button is clicked.
    $('#feature-fc4-image-button').click(function(e){

        // Prevents the default action from occuring.
        e.preventDefault();

        // If the frame already exists, re-open it.
        if ( feature_sch4_image_frame ) {
            feature_sch4_image_frame.open();
            return;
        }

        // Sets up the media library frame
        feature_sch4_image_frame = wp.media.frames.feature_sch4_image_frame = wp.media({
            title: meta_image.title,
            button: { text:  meta_image.button },
            library: { type: 'image' }
        });

        // Runs when an image is selected.
        feature_sch4_image_frame.on('select', function(){

            // Grabs the attachment selection and creates a JSON representation of the model.
            var media_attachment = feature_sch4_image_frame.state().get('selection').first().toJSON();

            // Sends the attachment URL to our custom image input field.
            $('#feature-fc4-image').val(media_attachment.url);
        });

        // Opens the media library frame.
        feature_sch4_image_frame.open();
    });
});

jQuery(document).ready( function($){ "use strict";

// Instantiates the variable that holds the media library frame.
    var feature_sch5_image_frame;

    // Runs when the image button is clicked.
    $('#feature-fc5-image-button').click(function(e){

        // Prevents the default action from occuring.
        e.preventDefault();

        // If the frame already exists, re-open it.
        if ( feature_sch5_image_frame ) {
            feature_sch5_image_frame.open();
            return;
        }

        // Sets up the media library frame
        feature_sch5_image_frame = wp.media.frames.feature_sch5_image_frame = wp.media({
            title: meta_image.title,
            button: { text:  meta_image.button },
            library: { type: 'image' }
        });

        // Runs when an image is selected.
        feature_sch5_image_frame.on('select', function(){

            // Grabs the attachment selection and creates a JSON representation of the model.
            var media_attachment = feature_sch5_image_frame.state().get('selection').first().toJSON();

            // Sends the attachment URL to our custom image input field.
            $('#feature-fc5-image').val(media_attachment.url);
        });

        // Opens the media library frame.
        feature_sch5_image_frame.open();
    });
});

jQuery(document).ready( function($){ "use strict";

// Instantiates the variable that holds the media library frame.
    var fish_camp_additional_info_image1_frame;

    // Runs when the image button is clicked.
    $('#fish-camp-additional-info-image1-button').click(function(e){

        // Prevents the default action from occuring.
        e.preventDefault();

        // If the frame already exists, re-open it.
        if ( fish_camp_additional_info_image1_frame ) {
            fish_camp_additional_info_image1_frame.open();
            return;
        }

        // Sets up the media library frame
        fish_camp_additional_info_image1_frame = wp.media.frames.fish_camp_additional_info_image1_frame = wp.media({
            title: meta_image.title,
            button: { text:  meta_image.button },
            library: { type: 'image' }
        });

        // Runs when an image is selected.
        fish_camp_additional_info_image1_frame.on('select', function(){

            // Grabs the attachment selection and creates a JSON representation of the model.
            var media_attachment = fish_camp_additional_info_image1_frame.state().get('selection').first().toJSON();

            // Sends the attachment URL to our custom image input field.
            $('#fish-camp-additional-info-image1').val(media_attachment.url);
        });

        // Opens the media library frame.
        fish_camp_additional_info_image1_frame.open();
    });
});

jQuery(document).ready( function($){ "use strict";

// Instantiates the variable that holds the media library frame.
    var fish_camp_additional_info_image2_frame;

    // Runs when the image button is clicked.
    $('#fish-camp-additional-info-image2-button').click(function(e){

        // Prevents the default action from occuring.
        e.preventDefault();

        // If the frame already exists, re-open it.
        if ( fish_camp_additional_info_image2_frame ) {
            fish_camp_additional_info_image2_frame.open();
            return;
        }

        // Sets up the media library frame
        fish_camp_additional_info_image2_frame = wp.media.frames.fish_camp_additional_info_image2_frame = wp.media({
            title: meta_image.title,
            button: { text:  meta_image.button },
            library: { type: 'image' }
        });

        // Runs when an image is selected.
        fish_camp_additional_info_image2_frame.on('select', function(){

            // Grabs the attachment selection and creates a JSON representation of the model.
            var media_attachment = fish_camp_additional_info_image2_frame.state().get('selection').first().toJSON();

            // Sends the attachment URL to our custom image input field.
            $('#fish-camp-additional-info-image2').val(media_attachment.url);
        });

        // Opens the media library frame.
        fish_camp_additional_info_image2_frame.open();
    });
});

jQuery(document).ready( function($){ "use strict";

// Instantiates the variable that holds the media library frame.
    var fish_camp_additional_info_image3_frame;

    // Runs when the image button is clicked.
    $('#fish-camp-additional-info-image3-button').click(function(e){

        // Prevents the default action from occuring.
        e.preventDefault();

        // If the frame already exists, re-open it.
        if ( fish_camp_additional_info_image3_frame ) {
            fish_camp_additional_info_image3_frame.open();
            return;
        }

        // Sets up the media library frame
        fish_camp_additional_info_image3_frame = wp.media.frames.fish_camp_additional_info_image3_frame = wp.media({
            title: meta_image.title,
            button: { text:  meta_image.button },
            library: { type: 'image' }
        });

        // Runs when an image is selected.
        fish_camp_additional_info_image3_frame.on('select', function(){

            // Grabs the attachment selection and creates a JSON representation of the model.
            var media_attachment = fish_camp_additional_info_image3_frame.state().get('selection').first().toJSON();

            // Sends the attachment URL to our custom image input field.
            $('#fish-camp-additional-info-image3').val(media_attachment.url);
        });

        // Opens the media library frame.
        fish_camp_additional_info_image3_frame.open();
    });
});

jQuery(document).ready( function($){ "use strict";

// Instantiates the variable that holds the media library frame.
    var fish_camp_additional_info_image4_frame;

    // Runs when the image button is clicked.
    $('#fish-camp-additional-info-image4-button').click(function(e){

        // Prevents the default action from occuring.
        e.preventDefault();

        // If the frame already exists, re-open it.
        if ( fish_camp_additional_info_image4_frame ) {
            fish_camp_additional_info_image4_frame.open();
            return;
        }

        // Sets up the media library frame
        fish_camp_additional_info_image4_frame = wp.media.frames.fish_camp_additional_info_image4_frame = wp.media({
            title: meta_image.title,
            button: { text:  meta_image.button },
            library: { type: 'image' }
        });

        // Runs when an image is selected.
        fish_camp_additional_info_image4_frame.on('select', function(){

            // Grabs the attachment selection and creates a JSON representation of the model.
            var media_attachment = fish_camp_additional_info_image4_frame.state().get('selection').first().toJSON();

            // Sends the attachment URL to our custom image input field.
            $('#fish-camp-additional-info-image4').val(media_attachment.url);
        });

        // Opens the media library frame.
        fish_camp_additional_info_image4_frame.open();
    });
});

jQuery(document).ready( function($){ "use strict";

// Instantiates the variable that holds the media library frame.
    var fish_camp_additional_info_image5_frame;

    // Runs when the image button is clicked.
    $('#fish-camp-additional-info-image5-button').click(function(e){

        // Prevents the default action from occuring.
        e.preventDefault();

        // If the frame already exists, re-open it.
        if ( fish_camp_additional_info_image5_frame ) {
            fish_camp_additional_info_image5_frame.open();
            return;
        }

        // Sets up the media library frame
        fish_camp_additional_info_image5_frame = wp.media.frames.fish_camp_additional_info_image5_frame = wp.media({
            title: meta_image.title,
            button: { text:  meta_image.button },
            library: { type: 'image' }
        });

        // Runs when an image is selected.
        fish_camp_additional_info_image5_frame.on('select', function(){

            // Grabs the attachment selection and creates a JSON representation of the model.
            var media_attachment = fish_camp_additional_info_image5_frame.state().get('selection').first().toJSON();

            // Sends the attachment URL to our custom image input field.
            $('#fish-camp-additional-info-image5').val(media_attachment.url);
        });

        // Opens the media library frame.
        fish_camp_additional_info_image5_frame.open();
    });
});

jQuery(document).ready( function($){ "use strict";

// Instantiates the variable that holds the media library frame.
    var fish_camp_additional_info_image6_frame;

    // Runs when the image button is clicked.
    $('#fish-camp-additional-info-image6-button').click(function(e){

        // Prevents the default action from occuring.
        e.preventDefault();

        // If the frame already exists, re-open it.
        if ( fish_camp_additional_info_image6_frame ) {
            fish_camp_additional_info_image6_frame.open();
            return;
        }

        // Sets up the media library frame
        fish_camp_additional_info_image6_frame = wp.media.frames.fish_camp_additional_info_image6_frame = wp.media({
            title: meta_image.title,
            button: { text:  meta_image.button },
            library: { type: 'image' }
        });

        // Runs when an image is selected.
        fish_camp_additional_info_image6_frame.on('select', function(){

            // Grabs the attachment selection and creates a JSON representation of the model.
            var media_attachment = fish_camp_additional_info_image6_frame.state().get('selection').first().toJSON();

            // Sends the attachment URL to our custom image input field.
            $('#fish-camp-additional-info-image6').val(media_attachment.url);
        });

        // Opens the media library frame.
        fish_camp_additional_info_image6_frame.open();
    });
});

jQuery(document).ready( function($){ "use strict";

// Instantiates the variable that holds the media library frame.
    var fish_camp_additional_info_image7_frame;

    // Runs when the image button is clicked.
    $('#fish-camp-additional-info-image7-button').click(function(e){

        // Prevents the default action from occuring.
        e.preventDefault();

        // If the frame already exists, re-open it.
        if ( fish_camp_additional_info_image7_frame ) {
            fish_camp_additional_info_image7_frame.open();
            return;
        }

        // Sets up the media library frame
        fish_camp_additional_info_image7_frame = wp.media.frames.fish_camp_additional_info_image7_frame = wp.media({
            title: meta_image.title,
            button: { text:  meta_image.button },
            library: { type: 'image' }
        });

        // Runs when an image is selected.
        fish_camp_additional_info_image7_frame.on('select', function(){

            // Grabs the attachment selection and creates a JSON representation of the model.
            var media_attachment = fish_camp_additional_info_image7_frame.state().get('selection').first().toJSON();

            // Sends the attachment URL to our custom image input field.
            $('#fish-camp-additional-info-image7').val(media_attachment.url);
        });

        // Opens the media library frame.
        fish_camp_additional_info_image7_frame.open();
    });
});

jQuery(document).ready( function($){ "use strict";

// Instantiates the variable that holds the media library frame.
    var fish_camp_additional_info_image8_frame;

    // Runs when the image button is clicked.
    $('#fish-camp-additional-info-image8-button').click(function(e){

        // Prevents the default action from occuring.
        e.preventDefault();

        // If the frame already exists, re-open it.
        if ( fish_camp_additional_info_image8_frame ) {
            fish_camp_additional_info_image8_frame.open();
            return;
        }

        // Sets up the media library frame
        fish_camp_additional_info_image8_frame = wp.media.frames.fish_camp_additional_info_image8_frame = wp.media({
            title: meta_image.title,
            button: { text:  meta_image.button },
            library: { type: 'image' }
        });

        // Runs when an image is selected.
        fish_camp_additional_info_image8_frame.on('select', function(){

            // Grabs the attachment selection and creates a JSON representation of the model.
            var media_attachment = fish_camp_additional_info_image8_frame.state().get('selection').first().toJSON();

            // Sends the attachment URL to our custom image input field.
            $('#fish-camp-additional-info-image8').val(media_attachment.url);
        });

        // Opens the media library frame.
        fish_camp_additional_info_image8_frame.open();
    });
});

jQuery(document).ready( function($){ "use strict";

// Instantiates the variable that holds the media library frame.
    var staff_logo_frame;

    // Runs when the image button is clicked.
    $('#staff-logo-button').click(function(e){

        // Prevents the default action from occuring.
        e.preventDefault();

        // If the frame already exists, re-open it.
        if ( staff_logo_frame ) {
            staff_logo_frame.open();
            return;
        }

        // Sets up the media library frame
        staff_logo_frame = wp.media.frames.staff_logo_frame = wp.media({
            title: meta_image.title,
            button: { text:  meta_image.button },
            library: { type: 'image' }
        });

        // Runs when an image is selected.
        staff_logo_frame.on('select', function(){

            // Grabs the attachment selection and creates a JSON representation of the model.
            var media_attachment = staff_logo_frame.state().get('selection').first().toJSON();

            // Sends the attachment URL to our custom image input field.
            $('#staff-logo').val(media_attachment.url);
        });

        // Opens the media library frame.
        staff_logo_frame.open();
    });
});

jQuery(document).ready( function($){ "use strict";

// Instantiates the variable that holds the media library frame.
    var staff_image_1_frame;

    // Runs when the image button is clicked.
    $('#staff-image-1-button').click(function(e){

        // Prevents the default action from occuring.
        e.preventDefault();

        // If the frame already exists, re-open it.
        if ( staff_image_1_frame ) {
            staff_image_1_frame.open();
            return;
        }

        // Sets up the media library frame
        staff_image_1_frame = wp.media.frames.staff_image_1_frame = wp.media({
            title: meta_image.title,
            button: { text:  meta_image.button },
            library: { type: 'image' }
        });

        // Runs when an image is selected.
        staff_image_1_frame.on('select', function(){

            // Grabs the attachment selection and creates a JSON representation of the model.
            var media_attachment = staff_image_1_frame.state().get('selection').first().toJSON();

            // Sends the attachment URL to our custom image input field.
            $('#staff-image-1').val(media_attachment.url);
        });

        // Opens the media library frame.
        staff_image_1_frame.open();
    });
});

jQuery(document).ready( function($){ "use strict";

// Instantiates the variable that holds the media library frame.
    var staff_image_2_frame;

    // Runs when the image button is clicked.
    $('#staff-image-2-button').click(function(e){

        // Prevents the default action from occuring.
        e.preventDefault();

        // If the frame already exists, re-open it.
        if ( staff_image_2_frame ) {
            staff_image_2_frame.open();
            return;
        }

        // Sets up the media library frame
        staff_image_2_frame = wp.media.frames.staff_image_2_frame = wp.media({
            title: meta_image.title,
            button: { text:  meta_image.button },
            library: { type: 'image' }
        });

        // Runs when an image is selected.
        staff_image_2_frame.on('select', function(){

            // Grabs the attachment selection and creates a JSON representation of the model.
            var media_attachment = staff_image_2_frame.state().get('selection').first().toJSON();

            // Sends the attachment URL to our custom image input field.
            $('#staff-image-2').val(media_attachment.url);
        });

        // Opens the media library frame.
        staff_image_2_frame.open();
    });
});

jQuery(document).ready( function($){ "use strict";

// Instantiates the variable that holds the media library frame.
    var staff_image_3_frame;

    // Runs when the image button is clicked.
    $('#staff-image-3-button').click(function(e){

        // Prevents the default action from occuring.
        e.preventDefault();

        // If the frame already exists, re-open it.
        if ( staff_image_3_frame ) {
            staff_image_3_frame.open();
            return;
        }

        // Sets up the media library frame
        staff_image_3_frame = wp.media.frames.staff_image_3_frame = wp.media({
            title: meta_image.title,
            button: { text:  meta_image.button },
            library: { type: 'image' }
        });

        // Runs when an image is selected.
        staff_image_3_frame.on('select', function(){

            // Grabs the attachment selection and creates a JSON representation of the model.
            var media_attachment = staff_image_3_frame.state().get('selection').first().toJSON();

            // Sends the attachment URL to our custom image input field.
            $('#staff-image-3').val(media_attachment.url);
        });

        // Opens the media library frame.
        staff_image_3_frame.open();
    });
});

jQuery(document).ready( function($){ "use strict";

// Instantiates the variable that holds the media library frame.
    var staff_image_4_frame;

    // Runs when the image button is clicked.
    $('#staff-image-4-button').click(function(e){

        // Prevents the default action from occuring.
        e.preventDefault();

        // If the frame already exists, re-open it.
        if ( staff_image_4_frame ) {
            staff_image_4_frame.open();
            return;
        }

        // Sets up the media library frame
        staff_image_4_frame = wp.media.frames.staff_image_4_frame = wp.media({
            title: meta_image.title,
            button: { text:  meta_image.button },
            library: { type: 'image' }
        });

        // Runs when an image is selected.
        staff_image_4_frame.on('select', function(){

            // Grabs the attachment selection and creates a JSON representation of the model.
            var media_attachment = staff_image_4_frame.state().get('selection').first().toJSON();

            // Sends the attachment URL to our custom image input field.
            $('#staff-image-4').val(media_attachment.url);
        });

        // Opens the media library frame.
        staff_image_4_frame.open();
    });
});

jQuery(document).ready( function($){ "use strict";

// Instantiates the variable that holds the media library frame.
    var staff_image_5_frame;

    // Runs when the image button is clicked.
    $('#staff-image-5-button').click(function(e){

        // Prevents the default action from occuring.
        e.preventDefault();

        // If the frame already exists, re-open it.
        if ( staff_image_5_frame ) {
            staff_image_5_frame.open();
            return;
        }

        // Sets up the media library frame
        staff_image_5_frame = wp.media.frames.staff_image_5_frame = wp.media({
            title: meta_image.title,
            button: { text:  meta_image.button },
            library: { type: 'image' }
        });

        // Runs when an image is selected.
        staff_image_5_frame.on('select', function(){

            // Grabs the attachment selection and creates a JSON representation of the model.
            var media_attachment = staff_image_5_frame.state().get('selection').first().toJSON();

            // Sends the attachment URL to our custom image input field.
            $('#staff-image-5').val(media_attachment.url);
        });

        // Opens the media library frame.
        staff_image_5_frame.open();
    });
});

jQuery(document).ready( function($){ "use strict";

// Instantiates the variable that holds the media library frame.
    var staff_image_6_frame;

    // Runs when the image button is clicked.
    $('#staff-image-6-button').click(function(e){

        // Prevents the default action from occuring.
        e.preventDefault();

        // If the frame already exists, re-open it.
        if ( staff_image_6_frame ) {
            staff_image_6_frame.open();
            return;
        }

        // Sets up the media library frame
        staff_image_6_frame = wp.media.frames.staff_image_6_frame = wp.media({
            title: meta_image.title,
            button: { text:  meta_image.button },
            library: { type: 'image' }
        });

        // Runs when an image is selected.
        staff_image_6_frame.on('select', function(){

            // Grabs the attachment selection and creates a JSON representation of the model.
            var media_attachment = staff_image_6_frame.state().get('selection').first().toJSON();

            // Sends the attachment URL to our custom image input field.
            $('#staff-image-6').val(media_attachment.url);
        });

        // Opens the media library frame.
        staff_image_6_frame.open();
    });
});

jQuery(document).ready( function($){ "use strict";

// Instantiates the variable that holds the media library frame.
    var staff_image_7_frame;

    // Runs when the image button is clicked.
    $('#staff-image-7-button').click(function(e){

        // Prevents the default action from occuring.
        e.preventDefault();

        // If the frame already exists, re-open it.
        if ( staff_image_7_frame ) {
            staff_image_7_frame.open();
            return;
        }

        // Sets up the media library frame
        staff_image_7_frame = wp.media.frames.staff_image_7_frame = wp.media({
            title: meta_image.title,
            button: { text:  meta_image.button },
            library: { type: 'image' }
        });

        // Runs when an image is selected.
        staff_image_7_frame.on('select', function(){

            // Grabs the attachment selection and creates a JSON representation of the model.
            var media_attachment = staff_image_7_frame.state().get('selection').first().toJSON();

            // Sends the attachment URL to our custom image input field.
            $('#staff-image-7').val(media_attachment.url);
        });

        // Opens the media library frame.
        staff_image_7_frame.open();
    });
});

jQuery(document).ready( function($){ "use strict";

// Instantiates the variable that holds the media library frame.
    var staff_image_8_frame;

    // Runs when the image button is clicked.
    $('#staff-image-8-button').click(function(e){

        // Prevents the default action from occuring.
        e.preventDefault();

        // If the frame already exists, re-open it.
        if ( staff_image_8_frame ) {
            staff_image_8_frame.open();
            return;
        }

        // Sets up the media library frame
        staff_image_8_frame = wp.media.frames.staff_image_8_frame = wp.media({
            title: meta_image.title,
            button: { text:  meta_image.button },
            library: { type: 'image' }
        });

        // Runs when an image is selected.
        staff_image_8_frame.on('select', function(){

            // Grabs the attachment selection and creates a JSON representation of the model.
            var media_attachment = staff_image_8_frame.state().get('selection').first().toJSON();

            // Sends the attachment URL to our custom image input field.
            $('#staff-image-8').val(media_attachment.url);
        });

        // Opens the media library frame.
        staff_image_8_frame.open();
    });
});

jQuery(document).ready( function($){ "use strict";

// Instantiates the variable that holds the media library frame.
    var staff_image_9_frame;

    // Runs when the image button is clicked.
    $('#staff-image-9-button').click(function(e){

        // Prevents the default action from occuring.
        e.preventDefault();

        // If the frame already exists, re-open it.
        if ( staff_image_9_frame ) {
            staff_image_9_frame.open();
            return;
        }

        // Sets up the media library frame
        staff_image_9_frame = wp.media.frames.staff_image_9_frame = wp.media({
            title: meta_image.title,
            button: { text:  meta_image.button },
            library: { type: 'image' }
        });

        // Runs when an image is selected.
        staff_image_9_frame.on('select', function(){

            // Grabs the attachment selection and creates a JSON representation of the model.
            var media_attachment = staff_image_9_frame.state().get('selection').first().toJSON();

            // Sends the attachment URL to our custom image input field.
            $('#staff-image-9').val(media_attachment.url);
        });

        // Opens the media library frame.
        staff_image_9_frame.open();
    });
});

jQuery(document).ready( function($){ "use strict";

// Instantiates the variable that holds the media library frame.
    var staff_image_10_frame;

    // Runs when the image button is clicked.
    $('#staff-image-10-button').click(function(e){

        // Prevents the default action from occuring.
        e.preventDefault();

        // If the frame already exists, re-open it.
        if ( staff_image_10_frame ) {
            staff_image_10_frame.open();
            return;
        }

        // Sets up the media library frame
        staff_image_10_frame = wp.media.frames.staff_image_10_frame = wp.media({
            title: meta_image.title,
            button: { text:  meta_image.button },
            library: { type: 'image' }
        });

        // Runs when an image is selected.
        staff_image_10_frame.on('select', function(){

            // Grabs the attachment selection and creates a JSON representation of the model.
            var media_attachment = staff_image_10_frame.state().get('selection').first().toJSON();

            // Sends the attachment URL to our custom image input field.
            $('#staff-image-10').val(media_attachment.url);
        });

        // Opens the media library frame.
        staff_image_10_frame.open();
    });
});

jQuery(document).ready( function($){ "use strict";

// Instantiates the variable that holds the media library frame.
    var staff_image_11_frame;

    // Runs when the image button is clicked.
    $('#staff-image-11-button').click(function(e){

        // Prevents the default action from occuring.
        e.preventDefault();

        // If the frame already exists, re-open it.
        if ( staff_image_11_frame ) {
            staff_image_11_frame.open();
            return;
        }

        // Sets up the media library frame
        staff_image_11_frame = wp.media.frames.staff_image_11_frame = wp.media({
            title: meta_image.title,
            button: { text:  meta_image.button },
            library: { type: 'image' }
        });

        // Runs when an image is selected.
        staff_image_11_frame.on('select', function(){

            // Grabs the attachment selection and creates a JSON representation of the model.
            var media_attachment = staff_image_11_frame.state().get('selection').first().toJSON();

            // Sends the attachment URL to our custom image input field.
            $('#staff-image-11').val(media_attachment.url);
        });

        // Opens the media library frame.
        staff_image_11_frame.open();
    });
});

jQuery(document).ready( function($){ "use strict";

// Instantiates the variable that holds the media library frame.
    var staff_image_12_frame;

    // Runs when the image button is clicked.
    $('#staff-image-12-button').click(function(e){

        // Prevents the default action from occuring.
        e.preventDefault();

        // If the frame already exists, re-open it.
        if ( staff_image_12_frame ) {
            staff_image_12_frame.open();
            return;
        }

        // Sets up the media library frame
        staff_image_12_frame = wp.media.frames.staff_image_12_frame = wp.media({
            title: meta_image.title,
            button: { text:  meta_image.button },
            library: { type: 'image' }
        });

        // Runs when an image is selected.
        staff_image_12_frame.on('select', function(){

            // Grabs the attachment selection and creates a JSON representation of the model.
            var media_attachment = staff_image_12_frame.state().get('selection').first().toJSON();

            // Sends the attachment URL to our custom image input field.
            $('#staff-image-12').val(media_attachment.url);
        });

        // Opens the media library frame.
        staff_image_12_frame.open();
    });
});

jQuery(document).ready( function($){ "use strict";

// Instantiates the variable that holds the media library frame.
    var staff_image_13_frame;

    // Runs when the image button is clicked.
    $('#staff-image-13-button').click(function(e){

        // Prevents the default action from occuring.
        e.preventDefault();

        // If the frame already exists, re-open it.
        if ( staff_image_13_frame ) {
            staff_image_13_frame.open();
            return;
        }

        // Sets up the media library frame
        staff_image_13_frame = wp.media.frames.staff_image_13_frame = wp.media({
            title: meta_image.title,
            button: { text:  meta_image.button },
            library: { type: 'image' }
        });

        // Runs when an image is selected.
        staff_image_13_frame.on('select', function(){

            // Grabs the attachment selection and creates a JSON representation of the model.
            var media_attachment = staff_image_13_frame.state().get('selection').first().toJSON();

            // Sends the attachment URL to our custom image input field.
            $('#staff-image-13').val(media_attachment.url);
        });

        // Opens the media library frame.
        staff_image_13_frame.open();
    });
});

jQuery(document).ready( function($){ "use strict";

// Instantiates the variable that holds the media library frame.
    var staff_image_14_frame;

    // Runs when the image button is clicked.
    $('#staff-image-14-button').click(function(e){

        // Prevents the default action from occuring.
        e.preventDefault();

        // If the frame already exists, re-open it.
        if ( staff_image_14_frame ) {
            staff_image_14_frame.open();
            return;
        }

        // Sets up the media library frame
        staff_image_14_frame = wp.media.frames.staff_image_14_frame = wp.media({
            title: meta_image.title,
            button: { text:  meta_image.button },
            library: { type: 'image' }
        });

        // Runs when an image is selected.
        staff_image_14_frame.on('select', function(){

            // Grabs the attachment selection and creates a JSON representation of the model.
            var media_attachment = staff_image_14_frame.state().get('selection').first().toJSON();

            // Sends the attachment URL to our custom image input field.
            $('#staff-image-14').val(media_attachment.url);
        });

        // Opens the media library frame.
        staff_image_14_frame.open();
    });
});

jQuery(document).ready( function($){ "use strict";

// Instantiates the variable that holds the media library frame.
    var staff_image_15_frame;

    // Runs when the image button is clicked.
    $('#staff-image-15-button').click(function(e){

        // Prevents the default action from occuring.
        e.preventDefault();

        // If the frame already exists, re-open it.
        if ( staff_image_15_frame ) {
            staff_image_15_frame.open();
            return;
        }

        // Sets up the media library frame
        staff_image_15_frame = wp.media.frames.staff_image_15_frame = wp.media({
            title: meta_image.title,
            button: { text:  meta_image.button },
            library: { type: 'image' }
        });

        // Runs when an image is selected.
        staff_image_15_frame.on('select', function(){

            // Grabs the attachment selection and creates a JSON representation of the model.
            var media_attachment = staff_image_15_frame.state().get('selection').first().toJSON();

            // Sends the attachment URL to our custom image input field.
            $('#staff-image-15').val(media_attachment.url);
        });

        // Opens the media library frame.
        staff_image_15_frame.open();
    });
});

jQuery(document).ready( function($){ "use strict";

// Instantiates the variable that holds the media library frame.
    var staff_image_16_frame;

    // Runs when the image button is clicked.
    $('#staff-image-16-button').click(function(e){

        // Prevents the default action from occuring.
        e.preventDefault();

        // If the frame already exists, re-open it.
        if ( staff_image_16_frame ) {
            staff_image_16_frame.open();
            return;
        }

        // Sets up the media library frame
        staff_image_16_frame = wp.media.frames.staff_image_16_frame = wp.media({
            title: meta_image.title,
            button: { text:  meta_image.button },
            library: { type: 'image' }
        });

        // Runs when an image is selected.
        staff_image_16_frame.on('select', function(){

            // Grabs the attachment selection and creates a JSON representation of the model.
            var media_attachment = staff_image_16_frame.state().get('selection').first().toJSON();

            // Sends the attachment URL to our custom image input field.
            $('#staff-image-16').val(media_attachment.url);
        });

        // Opens the media library frame.
        staff_image_16_frame.open();
    });
});

jQuery(document).ready( function($){ "use strict";

// Instantiates the variable that holds the media library frame.
    var staff_image_17_frame;

    // Runs when the image button is clicked.
    $('#staff-image-17-button').click(function(e){

        // Prevents the default action from occuring.
        e.preventDefault();

        // If the frame already exists, re-open it.
        if ( staff_image_17_frame ) {
            staff_image_17_frame.open();
            return;
        }

        // Sets up the media library frame
        staff_image_17_frame = wp.media.frames.staff_image_17_frame = wp.media({
            title: meta_image.title,
            button: { text:  meta_image.button },
            library: { type: 'image' }
        });

        // Runs when an image is selected.
        staff_image_17_frame.on('select', function(){

            // Grabs the attachment selection and creates a JSON representation of the model.
            var media_attachment = staff_image_17_frame.state().get('selection').first().toJSON();

            // Sends the attachment URL to our custom image input field.
            $('#staff-image-17').val(media_attachment.url);
        });

        // Opens the media library frame.
        staff_image_17_frame.open();
    });
});

jQuery(document).ready( function($){ "use strict";

// Instantiates the variable that holds the media library frame.
    var staff_image_18_frame;

    // Runs when the image button is clicked.
    $('#staff-image-18-button').click(function(e){

        // Prevents the default action from occuring.
        e.preventDefault();

        // If the frame already exists, re-open it.
        if ( staff_image_18_frame ) {
            staff_image_18_frame.open();
            return;
        }

        // Sets up the media library frame
        staff_image_18_frame = wp.media.frames.staff_image_18_frame = wp.media({
            title: meta_image.title,
            button: { text:  meta_image.button },
            library: { type: 'image' }
        });

        // Runs when an image is selected.
        staff_image_18_frame.on('select', function(){

            // Grabs the attachment selection and creates a JSON representation of the model.
            var media_attachment = staff_image_18_frame.state().get('selection').first().toJSON();

            // Sends the attachment URL to our custom image input field.
            $('#staff-image-18').val(media_attachment.url);
        });

        // Opens the media library frame.
        staff_image_18_frame.open();
    });
});

jQuery(document).ready( function($){ "use strict";

// Instantiates the variable that holds the media library frame.
    var staff_image_19_frame;

    // Runs when the image button is clicked.
    $('#staff-image-19-button').click(function(e){

        // Prevents the default action from occuring.
        e.preventDefault();

        // If the frame already exists, re-open it.
        if ( staff_image_19_frame ) {
            staff_image_19_frame.open();
            return;
        }

        // Sets up the media library frame
        staff_image_19_frame = wp.media.frames.staff_image_19_frame = wp.media({
            title: meta_image.title,
            button: { text:  meta_image.button },
            library: { type: 'image' }
        });

        // Runs when an image is selected.
        staff_image_19_frame.on('select', function(){

            // Grabs the attachment selection and creates a JSON representation of the model.
            var media_attachment = staff_image_19_frame.state().get('selection').first().toJSON();

            // Sends the attachment URL to our custom image input field.
            $('#staff-image-19').val(media_attachment.url);
        });

        // Opens the media library frame.
        staff_image_19_frame.open();
    });
});

jQuery(document).ready( function($){ "use strict";

// Instantiates the variable that holds the media library frame.
    var staff_image_20_frame;

    // Runs when the image button is clicked.
    $('#staff-image-20-button').click(function(e){

        // Prevents the default action from occuring.
        e.preventDefault();

        // If the frame already exists, re-open it.
        if ( staff_image_20_frame ) {
            staff_image_20_frame.open();
            return;
        }

        // Sets up the media library frame
        staff_image_20_frame = wp.media.frames.staff_image_20_frame = wp.media({
            title: meta_image.title,
            button: { text:  meta_image.button },
            library: { type: 'image' }
        });

        // Runs when an image is selected.
        staff_image_20_frame.on('select', function(){

            // Grabs the attachment selection and creates a JSON representation of the model.
            var media_attachment = staff_image_20_frame.state().get('selection').first().toJSON();

            // Sends the attachment URL to our custom image input field.
            $('#staff-image-20').val(media_attachment.url);
        });

        // Opens the media library frame.
        staff_image_20_frame.open();
    });
});

jQuery(document).ready( function($){ "use strict";

// Instantiates the variable that holds the media library frame.
    var staff_image_21_frame;

    // Runs when the image button is clicked.
    $('#staff-image-21-button').click(function(e){

        // Prevents the default action from occuring.
        e.preventDefault();

        // If the frame already exists, re-open it.
        if ( staff_image_21_frame ) {
            staff_image_21_frame.open();
            return;
        }

        // Sets up the media library frame
        staff_image_21_frame = wp.media.frames.staff_image_21_frame = wp.media({
            title: meta_image.title,
            button: { text:  meta_image.button },
            library: { type: 'image' }
        });

        // Runs when an image is selected.
        staff_image_21_frame.on('select', function(){

            // Grabs the attachment selection and creates a JSON representation of the model.
            var media_attachment = staff_image_21_frame.state().get('selection').first().toJSON();

            // Sends the attachment URL to our custom image input field.
            $('#staff-image-21').val(media_attachment.url);
        });

        // Opens the media library frame.
        staff_image_21_frame.open();
    });
});

jQuery(document).ready( function($){ "use strict";

// Instantiates the variable that holds the media library frame.
    var staff_image_22_frame;

    // Runs when the image button is clicked.
    $('#staff-image-22-button').click(function(e){

        // Prevents the default action from occuring.
        e.preventDefault();

        // If the frame already exists, re-open it.
        if ( staff_image_22_frame ) {
            staff_image_22_frame.open();
            return;
        }

        // Sets up the media library frame
        staff_image_22_frame = wp.media.frames.staff_image_22_frame = wp.media({
            title: meta_image.title,
            button: { text:  meta_image.button },
            library: { type: 'image' }
        });

        // Runs when an image is selected.
        staff_image_22_frame.on('select', function(){

            // Grabs the attachment selection and creates a JSON representation of the model.
            var media_attachment = staff_image_22_frame.state().get('selection').first().toJSON();

            // Sends the attachment URL to our custom image input field.
            $('#staff-image-22').val(media_attachment.url);
        });

        // Opens the media library frame.
        staff_image_22_frame.open();
    });
});

jQuery(document).ready( function($){ "use strict";

// Instantiates the variable that holds the media library frame.
    var staff_image_23_frame;

    // Runs when the image button is clicked.
    $('#staff-image-23-button').click(function(e){

        // Prevents the default action from occuring.
        e.preventDefault();

        // If the frame already exists, re-open it.
        if ( staff_image_23_frame ) {
            staff_image_23_frame.open();
            return;
        }

        // Sets up the media library frame
        staff_image_23_frame = wp.media.frames.staff_image_23_frame = wp.media({
            title: meta_image.title,
            button: { text:  meta_image.button },
            library: { type: 'image' }
        });

        // Runs when an image is selected.
        staff_image_23_frame.on('select', function(){

            // Grabs the attachment selection and creates a JSON representation of the model.
            var media_attachment = staff_image_23_frame.state().get('selection').first().toJSON();

            // Sends the attachment URL to our custom image input field.
            $('#staff-image-23').val(media_attachment.url);
        });

        // Opens the media library frame.
        staff_image_23_frame.open();
    });
});

jQuery(document).ready( function($){ "use strict";

// Instantiates the variable that holds the media library frame.
    var staff_image_24_frame;

    // Runs when the image button is clicked.
    $('#staff-image-24-button').click(function(e){

        // Prevents the default action from occuring.
        e.preventDefault();

        // If the frame already exists, re-open it.
        if ( staff_image_24_frame ) {
            staff_image_24_frame.open();
            return;
        }

        // Sets up the media library frame
        staff_image_24_frame = wp.media.frames.staff_image_24_frame = wp.media({
            title: meta_image.title,
            button: { text:  meta_image.button },
            library: { type: 'image' }
        });

        // Runs when an image is selected.
        staff_image_24_frame.on('select', function(){

            // Grabs the attachment selection and creates a JSON representation of the model.
            var media_attachment = staff_image_24_frame.state().get('selection').first().toJSON();

            // Sends the attachment URL to our custom image input field.
            $('#staff-image-24').val(media_attachment.url);
        });

        // Opens the media library frame.
        staff_image_24_frame.open();
    });
});

jQuery(document).ready( function($){
  "use strict";
    var staff_image_25_frame;
    // Runs when the image button is clicked.
    $('#staff-image-25-button').click(function(e){

        // Prevents the default action from occuring.
        e.preventDefault();

        // If the frame already exists, re-open it.
        if ( staff_image_25_frame ) {
            staff_image_25_frame.open();
            return;
        }

        // Sets up the media library frame
        staff_image_25_frame = wp.media.frames.staff_image_25_frame = wp.media({
            title: meta_image.title,
            button: { text:  meta_image.button },
            library: { type: 'image' }
        });

        // Runs when an image is selected.
        staff_image_25_frame.on('select', function(){

            // Grabs the attachment selection and creates a JSON representation of the model.
            var media_attachment = staff_image_25_frame.state().get('selection').first().toJSON();

            // Sends the attachment URL to our custom image input field.
            $('#staff-image-25').val(media_attachment.url);
        });

        // Opens the media library frame.
        staff_image_25_frame.open();
    });

// Instantiates the variable that holds the media library frame.
    var staff_image_26_frame;

    // Runs when the image button is clicked.
    $('#staff-image-26-button').click(function(e){

        // Prevents the default action from occuring.
        e.preventDefault();

        // If the frame already exists, re-open it.
        if ( staff_image_26_frame ) {
            staff_image_26_frame.open();
            return;
        }

        // Sets up the media library frame
        staff_image_26_frame = wp.media.frames.staff_image_26_frame = wp.media({
            title: meta_image.title,
            button: { text:  meta_image.button },
            library: { type: 'image' }
        });

        // Runs when an image is selected.
        staff_image_26_frame.on('select', function(){

            // Grabs the attachment selection and creates a JSON representation of the model.
            var media_attachment = staff_image_26_frame.state().get('selection').first().toJSON();

            // Sends the attachment URL to our custom image input field.
            $('#staff-image-26').val(media_attachment.url);
        });

        // Opens the media library frame.
        staff_image_26_frame.open();
    });

// Instantiates the variable that holds the media library frame.
    var staff_image_27_frame;

    // Runs when the image button is clicked.
    $('#staff-image-27-button').click(function(e){

        // Prevents the default action from occuring.
        e.preventDefault();

        // If the frame already exists, re-open it.
        if ( staff_image_27_frame ) {
            staff_image_27_frame.open();
            return;
        }

        // Sets up the media library frame
        staff_image_27_frame = wp.media.frames.staff_image_27_frame = wp.media({
            title: meta_image.title,
            button: { text:  meta_image.button },
            library: { type: 'image' }
        });

        // Runs when an image is selected.
        staff_image_27_frame.on('select', function(){

            // Grabs the attachment selection and creates a JSON representation of the model.
            var media_attachment = staff_image_27_frame.state().get('selection').first().toJSON();

            // Sends the attachment URL to our custom image input field.
            $('#staff-image-27').val(media_attachment.url);
        });

        // Opens the media library frame.
        staff_image_27_frame.open();
    });
});

jQuery(document).ready( function($){
  "use strict";
    var staff_image_28_frame;
    // Runs when the image button is clicked.
    $('#staff-image-28-button').click(function(e){

        // Prevents the default action from occuring.
        e.preventDefault();

        // If the frame already exists, re-open it.
        if ( staff_image_28_frame ) {
            staff_image_28_frame.open();
            return;
        }

        // Sets up the media library frame
        staff_image_28_frame = wp.media.frames.staff_image_28_frame = wp.media({
            title: meta_image.title,
            button: { text:  meta_image.button },
            library: { type: 'image' }
        });

        // Runs when an image is selected.
        staff_image_28_frame.on('select', function(){

            // Grabs the attachment selection and creates a JSON representation of the model.
            var media_attachment = staff_image_28_frame.state().get('selection').first().toJSON();

            // Sends the attachment URL to our custom image input field.
            $('#staff-image-28').val(media_attachment.url);
        });

        // Opens the media library frame.
        staff_image_28_frame.open();
    });

// Instantiates the variable that holds the media library frame.
    var staff_image_29_frame;

    // Runs when the image button is clicked.
    $('#staff-image-29-button').click(function(e){

        // Prevents the default action from occuring.
        e.preventDefault();

        // If the frame already exists, re-open it.
        if ( staff_image_29_frame ) {
            staff_image_29_frame.open();
            return;
        }

        // Sets up the media library frame
        staff_image_29_frame = wp.media.frames.staff_image_29_frame = wp.media({
            title: meta_image.title,
            button: { text:  meta_image.button },
            library: { type: 'image' }
        });

        // Runs when an image is selected.
        staff_image_29_frame.on('select', function(){

            // Grabs the attachment selection and creates a JSON representation of the model.
            var media_attachment = staff_image_29_frame.state().get('selection').first().toJSON();

            // Sends the attachment URL to our custom image input field.
            $('#staff-image-29').val(media_attachment.url);
        });

        // Opens the media library frame.
        staff_image_29_frame.open();
    });

// Instantiates the variable that holds the media library frame.
    var staff_image_30_frame;

    // Runs when the image button is clicked.
    $('#staff-image-30-button').click(function(e){

        // Prevents the default action from occuring.
        e.preventDefault();

        // If the frame already exists, re-open it.
        if ( staff_image_30_frame ) {
            staff_image_30_frame.open();
            return;
        }

        // Sets up the media library frame
        staff_image_30_frame = wp.media.frames.staff_image_30_frame = wp.media({
            title: meta_image.title,
            button: { text:  meta_image.button },
            library: { type: 'image' }
        });

        // Runs when an image is selected.
        staff_image_30_frame.on('select', function(){

            // Grabs the attachment selection and creates a JSON representation of the model.
            var media_attachment = staff_image_30_frame.state().get('selection').first().toJSON();

            // Sends the attachment URL to our custom image input field.
            $('#staff-image-30').val(media_attachment.url);
        });

        // Opens the media library frame.
        staff_image_30_frame.open();
    });
});

jQuery(document).ready( function($){ "use strict";

// Instantiates the variable that holds the media library frame.
    var staff_image_centered_left_frame;

    // Runs when the image button is clicked.
    $('#staff-image-centered-left-button').click(function(e){

        // Prevents the default action from occuring.
        e.preventDefault();

        // If the frame already exists, re-open it.
        if ( staff_image_centered_left_frame ) {
            staff_image_centered_left_frame.open();
            return;
        }

        // Sets up the media library frame
        staff_image_centered_left_frame = wp.media.frames.staff_image_centered_left_frame = wp.media({
            title: meta_image.title,
            button: { text:  meta_image.button },
            library: { type: 'image' }
        });

        // Runs when an image is selected.
        staff_image_centered_left_frame.on('select', function(){

            // Grabs the attachment selection and creates a JSON representation of the model.
            var media_attachment = staff_image_centered_left_frame.state().get('selection').first().toJSON();

            // Sends the attachment URL to our custom image input field.
            $('#staff-image-centered-left').val(media_attachment.url);
        });

        // Opens the media library frame.
        staff_image_centered_left_frame.open();
    });
});

jQuery(document).ready( function($){ "use strict";

// Instantiates the variable that holds the media library frame.
    var staff_image_centered_right_frame;

    // Runs when the image button is clicked.
    $('#staff-image-centered-right-button').click(function(e){

        // Prevents the default action from occuring.
        e.preventDefault();

        // If the frame already exists, re-open it.
        if ( staff_image_centered_right_frame ) {
            staff_image_centered_right_frame.open();
            return;
        }

        // Sets up the media library frame
        staff_image_centered_right_frame = wp.media.frames.staff_image_centered_right_frame = wp.media({
            title: meta_image.title,
            button: { text:  meta_image.button },
            library: { type: 'image' }
        });

        // Runs when an image is selected.
        staff_image_centered_right_frame.on('select', function(){

            // Grabs the attachment selection and creates a JSON representation of the model.
            var media_attachment = staff_image_centered_right_frame.state().get('selection').first().toJSON();

            // Sends the attachment URL to our custom image input field.
            $('#staff-image-centered-right').val(media_attachment.url);
        });

        // Opens the media library frame.
        staff_image_centered_right_frame.open();
    });
});

jQuery(document).ready( function($){ "use strict";

// Instantiates the variable that holds the media library frame.
    var staff_image_centered_frame;

    // Runs when the image button is clicked.
    $('#staff-image-centered-button').click(function(e){

        // Prevents the default action from occuring.
        e.preventDefault();

        // If the frame already exists, re-open it.
        if ( staff_image_centered_frame ) {
            staff_image_centered_frame.open();
            return;
        }

        // Sets up the media library frame
        staff_image_centered_frame = wp.media.frames.staff_image_centered_frame = wp.media({
            title: meta_image.title,
            button: { text:  meta_image.button },
            library: { type: 'image' }
        });

        // Runs when an image is selected.
        staff_image_centered_frame.on('select', function(){

            // Grabs the attachment selection and creates a JSON representation of the model.
            var media_attachment = staff_image_centered_frame.state().get('selection').first().toJSON();

            // Sends the attachment URL to our custom image input field.
            $('#staff-image-centered').val(media_attachment.url);
        });

        // Opens the media library frame.
        staff_image_centered_frame.open();
    });
});

jQuery(document).ready( function($){ "use strict";

// Instantiates the variable that holds the media library frame.
    var front_page_logo_frame;

    // Runs when the image button is clicked.
    $('#front-page-logo-button').click(function(e){

        // Prevents the default action from occuring.
        e.preventDefault();

        // If the frame already exists, re-open it.
        if ( front_page_logo_frame ) {
            front_page_logo_frame.open();
            return;
        }

        // Sets up the media library frame
        front_page_logo_frame = wp.media.frames.front_page_logo_frame = wp.media({
            title: meta_image.title,
            button: { text:  meta_image.button },
            library: { type: 'image' }
        });

        // Runs when an image is selected.
        front_page_logo_frame.on('select', function(){

            // Grabs the attachment selection and creates a JSON representation of the model.
            var media_attachment = front_page_logo_frame.state().get('selection').first().toJSON();

            // Sends the attachment URL to our custom image input field.
            $('#front-page-logo').val(media_attachment.url);
        });

        // Opens the media library frame.
        front_page_logo_frame.open();
    });
});

jQuery(document).ready( function($){ "use strict";

// Instantiates the variable that holds the media library frame.
    var front_page_image_1_frame;

    // Runs when the image button is clicked.
    $('#front-page-image-1-button').click(function(e){

        // Prevents the default action from occuring.
        e.preventDefault();

        // If the frame already exists, re-open it.
        if ( front_page_image_1_frame ) {
            front_page_image_1_frame.open();
            return;
        }

        // Sets up the media library frame
        front_page_image_1_frame = wp.media.frames.front_page_image_1_frame = wp.media({
            title: meta_image.title,
            button: { text:  meta_image.button },
            library: { type: 'image' }
        });

        // Runs when an image is selected.
        front_page_image_1_frame.on('select', function(){

            // Grabs the attachment selection and creates a JSON representation of the model.
            var media_attachment = front_page_image_1_frame.state().get('selection').first().toJSON();

            // Sends the attachment URL to our custom image input field.
            $('#front-page-image-1').val(media_attachment.url);
        });

        // Opens the media library frame.
        front_page_image_1_frame.open();
    });
});

jQuery(document).ready( function($){ "use strict";

// Instantiates the variable that holds the media library frame.
    var front_page_image_2_frame;

    // Runs when the image button is clicked.
    $('#front-page-image-2-button').click(function(e){

        // Prevents the default action from occuring.
        e.preventDefault();

        // If the frame already exists, re-open it.
        if ( front_page_image_2_frame ) {
            front_page_image_2_frame.open();
            return;
        }

        // Sets up the media library frame
        front_page_image_2_frame = wp.media.frames.front_page_image_2_frame = wp.media({
            title: meta_image.title,
            button: { text:  meta_image.button },
            library: { type: 'image' }
        });

        // Runs when an image is selected.
        front_page_image_2_frame.on('select', function(){

            // Grabs the attachment selection and creates a JSON representation of the model.
            var media_attachment = front_page_image_2_frame.state().get('selection').first().toJSON();

            // Sends the attachment URL to our custom image input field.
            $('#front-page-image-2').val(media_attachment.url);
        });

        // Opens the media library frame.
        front_page_image_2_frame.open();
    });
});

jQuery(document).ready( function($){ "use strict";

// Instantiates the variable that holds the media library frame.
    var front_page_image_3_frame;

    // Runs when the image button is clicked.
    $('#front-page-image-3-button').click(function(e){

        // Prevents the default action from occuring.
        e.preventDefault();

        // If the frame already exists, re-open it.
        if ( front_page_image_3_frame ) {
            front_page_image_3_frame.open();
            return;
        }

        // Sets up the media library frame
        front_page_image_3_frame = wp.media.frames.front_page_image_3_frame = wp.media({
            title: meta_image.title,
            button: { text:  meta_image.button },
            library: { type: 'image' }
        });

        // Runs when an image is selected.
        front_page_image_3_frame.on('select', function(){

            // Grabs the attachment selection and creates a JSON representation of the model.
            var media_attachment = front_page_image_3_frame.state().get('selection').first().toJSON();

            // Sends the attachment URL to our custom image input field.
            $('#front-page-image-3').val(media_attachment.url);
        });

        // Opens the media library frame.
        front_page_image_3_frame.open();
    });
});

jQuery(document).ready( function($){ "use strict";

// Instantiates the variable that holds the media library frame.
    var front_page_image_4_frame;

    // Runs when the image button is clicked.
    $('#front-page-image-4-button').click(function(e){

        // Prevents the default action from occuring.
        e.preventDefault();

        // If the frame already exists, re-open it.
        if ( front_page_image_4_frame ) {
            front_page_image_4_frame.open();
            return;
        }

        // Sets up the media library frame
        front_page_image_4_frame = wp.media.frames.front_page_image_4_frame = wp.media({
            title: meta_image.title,
            button: { text:  meta_image.button },
            library: { type: 'image' }
        });

        // Runs when an image is selected.
        front_page_image_4_frame.on('select', function(){

            // Grabs the attachment selection and creates a JSON representation of the model.
            var media_attachment = front_page_image_4_frame.state().get('selection').first().toJSON();

            // Sends the attachment URL to our custom image input field.
            $('#front-page-image-4').val(media_attachment.url);
        });

        // Opens the media library frame.
        front_page_image_4_frame.open();
    });
});

jQuery(document).ready( function($){ "use strict";

// Instantiates the variable that holds the media library frame.
    var front_page_image_5_frame;

    // Runs when the image button is clicked.
    $('#front-page-image-5-button').click(function(e){

        // Prevents the default action from occuring.
        e.preventDefault();

        // If the frame already exists, re-open it.
        if ( front_page_image_5_frame ) {
            front_page_image_5_frame.open();
            return;
        }

        // Sets up the media library frame
        front_page_image_5_frame = wp.media.frames.front_page_image_5_frame = wp.media({
            title: meta_image.title,
            button: { text:  meta_image.button },
            library: { type: 'image' }
        });

        // Runs when an image is selected.
        front_page_image_5_frame.on('select', function(){

            // Grabs the attachment selection and creates a JSON representation of the model.
            var media_attachment = front_page_image_5_frame.state().get('selection').first().toJSON();

            // Sends the attachment URL to our custom image input field.
            $('#front-page-image-5').val(media_attachment.url);
        });

        // Opens the media library frame.
        front_page_image_5_frame.open();
    });
});

jQuery(document).ready( function($){ "use strict";

// Instantiates the variable that holds the media library frame.
    var front_page_image_6_frame;

    // Runs when the image button is clicked.
    $('#front-page-image-6-button').click(function(e){

        // Prevents the default action from occuring.
        e.preventDefault();

        // If the frame already exists, re-open it.
        if ( front_page_image_6_frame ) {
            front_page_image_6_frame.open();
            return;
        }

        // Sets up the media library frame
        front_page_image_6_frame = wp.media.frames.front_page_image_6_frame = wp.media({
            title: meta_image.title,
            button: { text:  meta_image.button },
            library: { type: 'image' }
        });

        // Runs when an image is selected.
        front_page_image_6_frame.on('select', function(){

            // Grabs the attachment selection and creates a JSON representation of the model.
            var media_attachment = front_page_image_6_frame.state().get('selection').first().toJSON();

            // Sends the attachment URL to our custom image input field.
            $('#front-page-image-6').val(media_attachment.url);
        });

        // Opens the media library frame.
        front_page_image_6_frame.open();
    });
});

jQuery(document).ready( function($){ "use strict";

// Instantiates the variable that holds the media library frame.
    var front_page_image_7_frame;

    // Runs when the image button is clicked.
    $('#front-page-image-7-button').click(function(e){

        // Prevents the default action from occuring.
        e.preventDefault();

        // If the frame already exists, re-open it.
        if ( front_page_image_7_frame ) {
            front_page_image_7_frame.open();
            return;
        }

        // Sets up the media library frame
        front_page_image_7_frame = wp.media.frames.front_page_image_7_frame = wp.media({
            title: meta_image.title,
            button: { text:  meta_image.button },
            library: { type: 'image' }
        });

        // Runs when an image is selected.
        front_page_image_7_frame.on('select', function(){

            // Grabs the attachment selection and creates a JSON representation of the model.
            var media_attachment = front_page_image_7_frame.state().get('selection').first().toJSON();

            // Sends the attachment URL to our custom image input field.
            $('#front-page-image-7').val(media_attachment.url);
        });

        // Opens the media library frame.
        front_page_image_7_frame.open();
    });
});

jQuery(document).ready( function($){ "use strict";

// Instantiates the variable that holds the media library frame.
    var front_page_image_8_frame;

    // Runs when the image button is clicked.
    $('#front-page-image-8-button').click(function(e){

        // Prevents the default action from occuring.
        e.preventDefault();

        // If the frame already exists, re-open it.
        if ( front_page_image_8_frame ) {
            front_page_image_8_frame.open();
            return;
        }

        // Sets up the media library frame
        front_page_image_8_frame = wp.media.frames.front_page_image_8_frame = wp.media({
            title: meta_image.title,
            button: { text:  meta_image.button },
            library: { type: 'image' }
        });

        // Runs when an image is selected.
        front_page_image_8_frame.on('select', function(){

            // Grabs the attachment selection and creates a JSON representation of the model.
            var media_attachment = front_page_image_8_frame.state().get('selection').first().toJSON();

            // Sends the attachment URL to our custom image input field.
            $('#front-page-image-8').val(media_attachment.url);
        });

        // Opens the media library frame.
        front_page_image_8_frame.open();
    });
});

jQuery(document).ready( function($){ "use strict";

// Instantiates the variable that holds the media library frame.
    var front_page_image_9_frame;

    // Runs when the image button is clicked.
    $('#front-page-image-9-button').click(function(e){

        // Prevents the default action from occuring.
        e.preventDefault();

        // If the frame already exists, re-open it.
        if ( front_page_image_9_frame ) {
            front_page_image_9_frame.open();
            return;
        }

        // Sets up the media library frame
        front_page_image_9_frame = wp.media.frames.front_page_image_9_frame = wp.media({
            title: meta_image.title,
            button: { text:  meta_image.button },
            library: { type: 'image' }
        });

        // Runs when an image is selected.
        front_page_image_9_frame.on('select', function(){

            // Grabs the attachment selection and creates a JSON representation of the model.
            var media_attachment = front_page_image_9_frame.state().get('selection').first().toJSON();

            // Sends the attachment URL to our custom image input field.
            $('#front-page-image-9').val(media_attachment.url);
        });

        // Opens the media library frame.
        front_page_image_9_frame.open();
    });
});

jQuery(document).ready( function($){ "use strict";

// Instantiates the variable that holds the media library frame.
    var front_page_image_10_frame;

    // Runs when the image button is clicked.
    $('#front-page-image-10-button').click(function(e){

        // Prevents the default action from occuring.
        e.preventDefault();

        // If the frame already exists, re-open it.
        if ( front_page_image_10_frame ) {
            front_page_image_10_frame.open();
            return;
        }

        // Sets up the media library frame
        front_page_image_10_frame = wp.media.frames.front_page_image_10_frame = wp.media({
            title: meta_image.title,
            button: { text:  meta_image.button },
            library: { type: 'image' }
        });

        // Runs when an image is selected.
        front_page_image_10_frame.on('select', function(){

            // Grabs the attachment selection and creates a JSON representation of the model.
            var media_attachment = front_page_image_10_frame.state().get('selection').first().toJSON();

            // Sends the attachment URL to our custom image input field.
            $('#front-page-image-10').val(media_attachment.url);
        });

        // Opens the media library frame.
        front_page_image_10_frame.open();
    });
});

jQuery(document).ready( function($){ "use strict";

// Instantiates the variable that holds the media library frame.
    var front_page_image_11_frame;

    // Runs when the image button is clicked.
    $('#front-page-image-11-button').click(function(e){

        // Prevents the default action from occuring.
        e.preventDefault();

        // If the frame already exists, re-open it.
        if ( front_page_image_11_frame ) {
            front_page_image_11_frame.open();
            return;
        }

        // Sets up the media library frame
        front_page_image_11_frame = wp.media.frames.front_page_image_11_frame = wp.media({
            title: meta_image.title,
            button: { text:  meta_image.button },
            library: { type: 'image' }
        });

        // Runs when an image is selected.
        front_page_image_11_frame.on('select', function(){

            // Grabs the attachment selection and creates a JSON representation of the model.
            var media_attachment = front_page_image_11_frame.state().get('selection').first().toJSON();

            // Sends the attachment URL to our custom image input field.
            $('#front-page-image-11').val(media_attachment.url);
        });

        // Opens the media library frame.
        front_page_image_11_frame.open();
    });
});

jQuery(document).ready( function($){ "use strict";

// Instantiates the variable that holds the media library frame.
    var front_page_image_12_frame;

    // Runs when the image button is clicked.
    $('#front-page-image-12-button').click(function(e){

        // Prevents the default action from occuring.
        e.preventDefault();

        // If the frame already exists, re-open it.
        if ( front_page_image_12_frame ) {
            front_page_image_12_frame.open();
            return;
        }

        // Sets up the media library frame
        front_page_image_12_frame = wp.media.frames.front_page_image_12_frame = wp.media({
            title: meta_image.title,
            button: { text:  meta_image.button },
            library: { type: 'image' }
        });

        // Runs when an image is selected.
        front_page_image_12_frame.on('select', function(){

            // Grabs the attachment selection and creates a JSON representation of the model.
            var media_attachment = front_page_image_12_frame.state().get('selection').first().toJSON();

            // Sends the attachment URL to our custom image input field.
            $('#front-page-image-12').val(media_attachment.url);
        });

        // Opens the media library frame.
        front_page_image_12_frame.open();
    });
});

jQuery(document).ready( function($){ "use strict";

// Instantiates the variable that holds the media library frame.
    var front_page_image_13_frame;

    // Runs when the image button is clicked.
    $('#front-page-image-13-button').click(function(e){

        // Prevents the default action from occuring.
        e.preventDefault();

        // If the frame already exists, re-open it.
        if ( front_page_image_13_frame ) {
            front_page_image_13_frame.open();
            return;
        }

        // Sets up the media library frame
        front_page_image_13_frame = wp.media.frames.front_page_image_13_frame = wp.media({
            title: meta_image.title,
            button: { text:  meta_image.button },
            library: { type: 'image' }
        });

        // Runs when an image is selected.
        front_page_image_13_frame.on('select', function(){

            // Grabs the attachment selection and creates a JSON representation of the model.
            var media_attachment = front_page_image_13_frame.state().get('selection').first().toJSON();

            // Sends the attachment URL to our custom image input field.
            $('#front-page-image-13').val(media_attachment.url);
        });

        // Opens the media library frame.
        front_page_image_13_frame.open();
    });
});

jQuery(document).ready( function($){ "use strict";

// Instantiates the variable that holds the media library frame.
    var front_page_image_14_frame;

    // Runs when the image button is clicked.
    $('#front-page-image-14-button').click(function(e){

        // Prevents the default action from occuring.
        e.preventDefault();

        // If the frame already exists, re-open it.
        if ( front_page_image_14_frame ) {
            front_page_image_14_frame.open();
            return;
        }

        // Sets up the media library frame
        front_page_image_14_frame = wp.media.frames.front_page_image_14_frame = wp.media({
            title: meta_image.title,
            button: { text:  meta_image.button },
            library: { type: 'image' }
        });

        // Runs when an image is selected.
        front_page_image_14_frame.on('select', function(){

            // Grabs the attachment selection and creates a JSON representation of the model.
            var media_attachment = front_page_image_14_frame.state().get('selection').first().toJSON();

            // Sends the attachment URL to our custom image input field.
            $('#front-page-image-14').val(media_attachment.url);
        });

        // Opens the media library frame.
        front_page_image_14_frame.open();
    });
});

jQuery(document).ready( function($){ "use strict";

// Instantiates the variable that holds the media library frame.
    var front_page_image_15_frame;

    // Runs when the image button is clicked.
    $('#front-page-image-15-button').click(function(e){

        // Prevents the default action from occuring.
        e.preventDefault();

        // If the frame already exists, re-open it.
        if ( front_page_image_15_frame ) {
            front_page_image_15_frame.open();
            return;
        }

        // Sets up the media library frame
        front_page_image_15_frame = wp.media.frames.front_page_image_15_frame = wp.media({
            title: meta_image.title,
            button: { text:  meta_image.button },
            library: { type: 'image' }
        });

        // Runs when an image is selected.
        front_page_image_15_frame.on('select', function(){

            // Grabs the attachment selection and creates a JSON representation of the model.
            var media_attachment = front_page_image_15_frame.state().get('selection').first().toJSON();

            // Sends the attachment URL to our custom image input field.
            $('#front-page-image-15').val(media_attachment.url);
        });

        // Opens the media library frame.
        front_page_image_15_frame.open();
    });
});

jQuery(document).ready( function($){ "use strict";

// Instantiates the variable that holds the media library frame.
    var front_page_image_16_frame;

    // Runs when the image button is clicked.
    $('#front-page-image-16-button').click(function(e){

        // Prevents the default action from occuring.
        e.preventDefault();

        // If the frame already exists, re-open it.
        if ( front_page_image_16_frame ) {
            front_page_image_16_frame.open();
            return;
        }

        // Sets up the media library frame
        front_page_image_16_frame = wp.media.frames.front_page_image_16_frame = wp.media({
            title: meta_image.title,
            button: { text:  meta_image.button },
            library: { type: 'image' }
        });

        // Runs when an image is selected.
        front_page_image_16_frame.on('select', function(){

            // Grabs the attachment selection and creates a JSON representation of the model.
            var media_attachment = front_page_image_16_frame.state().get('selection').first().toJSON();

            // Sends the attachment URL to our custom image input field.
            $('#front-page-image-16').val(media_attachment.url);
        });

        // Opens the media library frame.
        front_page_image_16_frame.open();
    });
});

jQuery(document).ready( function($){ "use strict";

// Instantiates the variable that holds the media library frame.
    var front_page_image_17_frame;

    // Runs when the image button is clicked.
    $('#front-page-image-17-button').click(function(e){

        // Prevents the default action from occuring.
        e.preventDefault();

        // If the frame already exists, re-open it.
        if ( front_page_image_17_frame ) {
            front_page_image_17_frame.open();
            return;
        }

        // Sets up the media library frame
        front_page_image_17_frame = wp.media.frames.front_page_image_17_frame = wp.media({
            title: meta_image.title,
            button: { text:  meta_image.button },
            library: { type: 'image' }
        });

        // Runs when an image is selected.
        front_page_image_17_frame.on('select', function(){

            // Grabs the attachment selection and creates a JSON representation of the model.
            var media_attachment = front_page_image_17_frame.state().get('selection').first().toJSON();

            // Sends the attachment URL to our custom image input field.
            $('#front-page-image-17').val(media_attachment.url);
        });

        // Opens the media library frame.
        front_page_image_17_frame.open();
    });
});

jQuery(document).ready( function($){ "use strict";

// Instantiates the variable that holds the media library frame.
    var front_page_image_18_frame;

    // Runs when the image button is clicked.
    $('#front-page-image-18-button').click(function(e){

        // Prevents the default action from occuring.
        e.preventDefault();

        // If the frame already exists, re-open it.
        if ( front_page_image_18_frame ) {
            front_page_image_18_frame.open();
            return;
        }

        // Sets up the media library frame
        front_page_image_18_frame = wp.media.frames.front_page_image_18_frame = wp.media({
            title: meta_image.title,
            button: { text:  meta_image.button },
            library: { type: 'image' }
        });

        // Runs when an image is selected.
        front_page_image_18_frame.on('select', function(){

            // Grabs the attachment selection and creates a JSON representation of the model.
            var media_attachment = front_page_image_18_frame.state().get('selection').first().toJSON();

            // Sends the attachment URL to our custom image input field.
            $('#front-page-image-18').val(media_attachment.url);
        });

        // Opens the media library frame.
        front_page_image_18_frame.open();
    });
});

jQuery(document).ready( function($){ "use strict";

// Instantiates the variable that holds the media library frame.
    var front_page_image_19_frame;

    // Runs when the image button is clicked.
    $('#front-page-image-19-button').click(function(e){

        // Prevents the default action from occuring.
        e.preventDefault();

        // If the frame already exists, re-open it.
        if ( front_page_image_19_frame ) {
            front_page_image_19_frame.open();
            return;
        }

        // Sets up the media library frame
        front_page_image_19_frame = wp.media.frames.front_page_image_19_frame = wp.media({
            title: meta_image.title,
            button: { text:  meta_image.button },
            library: { type: 'image' }
        });

        // Runs when an image is selected.
        front_page_image_19_frame.on('select', function(){

            // Grabs the attachment selection and creates a JSON representation of the model.
            var media_attachment = front_page_image_19_frame.state().get('selection').first().toJSON();

            // Sends the attachment URL to our custom image input field.
            $('#front-page-image-19').val(media_attachment.url);
        });

        // Opens the media library frame.
        front_page_image_19_frame.open();
    });
});

jQuery(document).ready( function($){ "use strict";

// Instantiates the variable that holds the media library frame.
    var front_page_image_20_frame;

    // Runs when the image button is clicked.
    $('#front-page-image-20-button').click(function(e){

        // Prevents the default action from occuring.
        e.preventDefault();

        // If the frame already exists, re-open it.
        if ( front_page_image_20_frame ) {
            front_page_image_20_frame.open();
            return;
        }

        // Sets up the media library frame
        front_page_image_20_frame = wp.media.frames.front_page_image_20_frame = wp.media({
            title: meta_image.title,
            button: { text:  meta_image.button },
            library: { type: 'image' }
        });

        // Runs when an image is selected.
        front_page_image_20_frame.on('select', function(){

            // Grabs the attachment selection and creates a JSON representation of the model.
            var media_attachment = front_page_image_20_frame.state().get('selection').first().toJSON();

            // Sends the attachment URL to our custom image input field.
            $('#front-page-image-20').val(media_attachment.url);
        });

        // Opens the media library frame.
        front_page_image_20_frame.open();
    });
});

jQuery(document).ready( function($){ "use strict";

// Instantiates the variable that holds the media library frame.
    var front_page_image_21_frame;

    // Runs when the image button is clicked.
    $('#front-page-image-21-button').click(function(e){

        // Prevents the default action from occuring.
        e.preventDefault();

        // If the frame already exists, re-open it.
        if ( front_page_image_21_frame ) {
            front_page_image_21_frame.open();
            return;
        }

        // Sets up the media library frame
        front_page_image_21_frame = wp.media.frames.front_page_image_21_frame = wp.media({
            title: meta_image.title,
            button: { text:  meta_image.button },
            library: { type: 'image' }
        });

        // Runs when an image is selected.
        front_page_image_21_frame.on('select', function(){

            // Grabs the attachment selection and creates a JSON representation of the model.
            var media_attachment = front_page_image_21_frame.state().get('selection').first().toJSON();

            // Sends the attachment URL to our custom image input field.
            $('#front-page-image-21').val(media_attachment.url);
        });

        // Opens the media library frame.
        front_page_image_21_frame.open();
    });
});

jQuery(document).ready( function($){ "use strict";

// Instantiates the variable that holds the media library frame.
    var front_page_image_22_frame;

    // Runs when the image button is clicked.
    $('#front-page-image-22-button').click(function(e){

        // Prevents the default action from occuring.
        e.preventDefault();

        // If the frame already exists, re-open it.
        if ( front_page_image_22_frame ) {
            front_page_image_22_frame.open();
            return;
        }

        // Sets up the media library frame
        front_page_image_22_frame = wp.media.frames.front_page_image_22_frame = wp.media({
            title: meta_image.title,
            button: { text:  meta_image.button },
            library: { type: 'image' }
        });

        // Runs when an image is selected.
        front_page_image_22_frame.on('select', function(){

            // Grabs the attachment selection and creates a JSON representation of the model.
            var media_attachment = front_page_image_22_frame.state().get('selection').first().toJSON();

            // Sends the attachment URL to our custom image input field.
            $('#front-page-image-22').val(media_attachment.url);
        });

        // Opens the media library frame.
        front_page_image_22_frame.open();
    });
});

jQuery(document).ready( function($){ "use strict";

// Instantiates the variable that holds the media library frame.
    var front_page_image_23_frame;

    // Runs when the image button is clicked.
    $('#front-page-image-23-button').click(function(e){

        // Prevents the default action from occuring.
        e.preventDefault();

        // If the frame already exists, re-open it.
        if ( front_page_image_23_frame ) {
            front_page_image_23_frame.open();
            return;
        }

        // Sets up the media library frame
        front_page_image_23_frame = wp.media.frames.front_page_image_23_frame = wp.media({
            title: meta_image.title,
            button: { text:  meta_image.button },
            library: { type: 'image' }
        });

        // Runs when an image is selected.
        front_page_image_23_frame.on('select', function(){

            // Grabs the attachment selection and creates a JSON representation of the model.
            var media_attachment = front_page_image_23_frame.state().get('selection').first().toJSON();

            // Sends the attachment URL to our custom image input field.
            $('#front-page-image-23').val(media_attachment.url);
        });

        // Opens the media library frame.
        front_page_image_23_frame.open();
    });
});

jQuery(document).ready( function($){ "use strict";

// Instantiates the variable that holds the media library frame.
    var front_page_image_24_frame;

    // Runs when the image button is clicked.
    $('#front-page-image-24-button').click(function(e){

        // Prevents the default action from occuring.
        e.preventDefault();

        // If the frame already exists, re-open it.
        if ( front_page_image_24_frame ) {
            front_page_image_24_frame.open();
            return;
        }

        // Sets up the media library frame
        front_page_image_24_frame = wp.media.frames.front_page_image_24_frame = wp.media({
            title: meta_image.title,
            button: { text:  meta_image.button },
            library: { type: 'image' }
        });

        // Runs when an image is selected.
        front_page_image_24_frame.on('select', function(){

            // Grabs the attachment selection and creates a JSON representation of the model.
            var media_attachment = front_page_image_24_frame.state().get('selection').first().toJSON();

            // Sends the attachment URL to our custom image input field.
            $('#front-page-image-24').val(media_attachment.url);
        });

        // Opens the media library frame.
        front_page_image_24_frame.open();
    });
});

jQuery(document).ready( function($){ "use strict";

// Instantiates the variable that holds the media library frame.
    var signature_image_1_frame;

    // Runs when the image button is clicked.
    $('#signature-image-1-button').click(function(e){

        // Prevents the default action from occuring.
        e.preventDefault();

        // If the frame already exists, re-open it.
        if ( signature_image_1_frame ) {
            signature_image_1_frame.open();
            return;
        }

        // Sets up the media library frame
        signature_image_1_frame = wp.media.frames.signature_image_1_frame = wp.media({
            title: meta_image.title,
            button: { text:  meta_image.button },
            library: { type: 'image' }
        });

        // Runs when an image is selected.
        signature_image_1_frame.on('select', function(){

            // Grabs the attachment selection and creates a JSON representation of the model.
            var media_attachment = signature_image_1_frame.state().get('selection').first().toJSON();

            // Sends the attachment URL to our custom image input field.
            $('#signature-image-1').val(media_attachment.url);
        });

        // Opens the media library frame.
        signature_image_1_frame.open();
    });
});

jQuery(document).ready( function($){ "use strict";

// Instantiates the variable that holds the media library frame.
    var sig_logo_frame;

    // Runs when the image button is clicked.
    $('#sig-logo-button').click(function(e){

        // Prevents the default action from occuring.
        e.preventDefault();

        // If the frame already exists, re-open it.
        if ( sig_logo_frame ) {
            sig_logo_frame.open();
            return;
        }

        // Sets up the media library frame
        sig_logo_frame = wp.media.frames.sig_logo_frame = wp.media({
            title: meta_image.title,
            button: { text:  meta_image.button },
            library: { type: 'image' }
        });

        // Runs when an image is selected.
        sig_logo_frame.on('select', function(){

            // Grabs the attachment selection and creates a JSON representation of the model.
            var media_attachment = sig_logo_frame.state().get('selection').first().toJSON();

            // Sends the attachment URL to our custom image input field.
            $('#sig-logo').val(media_attachment.url);
        });

        // Opens the media library frame.
        sig_logo_frame.open();
    });
});


jQuery(document).ready( function($){ "use strict";

// Instantiates the variable that holds the media library frame.
    var csel_1_img_frame;

    // Runs when the image button is clicked.
    $('#csel-1-img-button').click(function(e){

        // Prevents the default action from occuring.
        e.preventDefault();

        // If the frame already exists, re-open it.
        if ( csel_1_img_frame ) {
            csel_1_img_frame.open();
            return;
        }

        // Sets up the media library frame
        csel_1_img_frame = wp.media.frames.csel_1_img_frame = wp.media({
            title: meta_image.title,
            button: { text:  meta_image.button },
            library: { type: 'image' }
        });

        // Runs when an image is selected.
        csel_1_img_frame.on('select', function(){

            // Grabs the attachment selection and creates a JSON representation of the model.
            var media_attachment = csel_1_img_frame.state().get('selection').first().toJSON();

            // Sends the attachment URL to our custom image input field.
            $('#csel-1-img').val(media_attachment.url);
        });

        // Opens the media library frame.
        csel_1_img_frame.open();
    });
});

jQuery(document).ready( function($){ "use strict";

// Instantiates the variable that holds the media library frame.
    var csel_2_img_frame;

    // Runs when the image button is clicked.
    $('#csel-2-img-button').click(function(e){

        // Prevents the default action from occuring.
        e.preventDefault();

        // If the frame already exists, re-open it.
        if ( csel_2_img_frame ) {
            csel_2_img_frame.open();
            return;
        }

        // Sets up the media library frame
        csel_2_img_frame = wp.media.frames.csel_2_img_frame = wp.media({
            title: meta_image.title,
            button: { text:  meta_image.button },
            library: { type: 'image' }
        });

        // Runs when an image is selected.
        csel_2_img_frame.on('select', function(){

            // Grabs the attachment selection and creates a JSON representation of the model.
            var media_attachment = csel_2_img_frame.state().get('selection').first().toJSON();

            // Sends the attachment URL to our custom image input field.
            $('#csel-2-img').val(media_attachment.url);
        });

        // Opens the media library frame.
        csel_2_img_frame.open();
    });
});

jQuery(document).ready( function($){ "use strict";

// Instantiates the variable that holds the media library frame.
    var csel_3_img_frame;

    // Runs when the image button is clicked.
    $('#csel-3-img-button').click(function(e){

        // Prevents the default action from occuring.
        e.preventDefault();

        // If the frame already exists, re-open it.
        if ( csel_3_img_frame ) {
            csel_3_img_frame.open();
            return;
        }

        // Sets up the media library frame
        csel_3_img_frame = wp.media.frames.csel_3_img_frame = wp.media({
            title: meta_image.title,
            button: { text:  meta_image.button },
            library: { type: 'image' }
        });

        // Runs when an image is selected.
        csel_3_img_frame.on('select', function(){

            // Grabs the attachment selection and creates a JSON representation of the model.
            var media_attachment = csel_3_img_frame.state().get('selection').first().toJSON();

            // Sends the attachment URL to our custom image input field.
            $('#csel-3-img').val(media_attachment.url);
        });

        // Opens the media library frame.
        csel_3_img_frame.open();
    });
});

jQuery(document).ready( function($){ "use strict";

// Instantiates the variable that holds the media library frame.
    var csel_4_img_frame;

    // Runs when the image button is clicked.
    $('#csel-4-img-button').click(function(e){

        // Prevents the default action from occuring.
        e.preventDefault();

        // If the frame already exists, re-open it.
        if ( csel_4_img_frame ) {
            csel_4_img_frame.open();
            return;
        }

        // Sets up the media library frame
        csel_4_img_frame = wp.media.frames.csel_4_img_frame = wp.media({
            title: meta_image.title,
            button: { text:  meta_image.button },
            library: { type: 'image' }
        });

        // Runs when an image is selected.
        csel_4_img_frame.on('select', function(){

            // Grabs the attachment selection and creates a JSON representation of the model.
            var media_attachment = csel_4_img_frame.state().get('selection').first().toJSON();

            // Sends the attachment URL to our custom image input field.
            $('#csel-4-img').val(media_attachment.url);
        });

        // Opens the media library frame.
        csel_4_img_frame.open();
    });
});

jQuery(document).ready( function($){ "use strict";

// Instantiates the variable that holds the media library frame.
    var csel_5_img_frame;

    // Runs when the image button is clicked.
    $('#csel-5-img-button').click(function(e){

        // Prevents the default action from occuring.
        e.preventDefault();

        // If the frame already exists, re-open it.
        if ( csel_5_img_frame ) {
            csel_5_img_frame.open();
            return;
        }

        // Sets up the media library frame
        csel_5_img_frame = wp.media.frames.csel_5_img_frame = wp.media({
            title: meta_image.title,
            button: { text:  meta_image.button },
            library: { type: 'image' }
        });

        // Runs when an image is selected.
        csel_5_img_frame.on('select', function(){

            // Grabs the attachment selection and creates a JSON representation of the model.
            var media_attachment = csel_5_img_frame.state().get('selection').first().toJSON();

            // Sends the attachment URL to our custom image input field.
            $('#csel-5-img').val(media_attachment.url);
        });

        // Opens the media library frame.
        csel_5_img_frame.open();
    });
});

jQuery(document).ready( function($){ "use strict";

// Instantiates the variable that holds the media library frame.
    var csel_6_img_frame;

    // Runs when the image button is clicked.
    $('#csel-6-img-button').click(function(e){

        // Prevents the default action from occuring.
        e.preventDefault();

        // If the frame already exists, re-open it.
        if ( csel_6_img_frame ) {
            csel_6_img_frame.open();
            return;
        }

        // Sets up the media library frame
        csel_6_img_frame = wp.media.frames.csel_6_img_frame = wp.media({
            title: meta_image.title,
            button: { text:  meta_image.button },
            library: { type: 'image' }
        });

        // Runs when an image is selected.
        csel_6_img_frame.on('select', function(){

            // Grabs the attachment selection and creates a JSON representation of the model.
            var media_attachment = csel_6_img_frame.state().get('selection').first().toJSON();

            // Sends the attachment URL to our custom image input field.
            $('#csel-6-img').val(media_attachment.url);
        });

        // Opens the media library frame.
        csel_6_img_frame.open();
    });
});

jQuery(document).ready( function($){ "use strict";

// Instantiates the variable that holds the media library frame.
    var signature_image_2_frame;

    // Runs when the image button is clicked.
    $('#signature-image-2-button').click(function(e){

        // Prevents the default action from occuring.
        e.preventDefault();

        // If the frame already exists, re-open it.
        if ( signature_image_2_frame ) {
            signature_image_2_frame.open();
            return;
        }

        // Sets up the media library frame
        signature_image_2_frame = wp.media.frames.signature_image_2_frame = wp.media({
            title: meta_image.title,
            button: { text:  meta_image.button },
            library: { type: 'image' }
        });

        // Runs when an image is selected.
        signature_image_2_frame.on('select', function(){

            // Grabs the attachment selection and creates a JSON representation of the model.
            var media_attachment = signature_image_2_frame.state().get('selection').first().toJSON();

            // Sends the attachment URL to our custom image input field.
            $('#signature-image-2').val(media_attachment.url);
        });

        // Opens the media library frame.
        signature_image_2_frame.open();
    });
});

jQuery(document).ready( function($){ "use strict";

// Instantiates the variable that holds the media library frame.
    var signature_image_3_frame;

    // Runs when the image button is clicked.
    $('#signature-image-3-button').click(function(e){

        // Prevents the default action from occuring.
        e.preventDefault();

        // If the frame already exists, re-open it.
        if ( signature_image_3_frame ) {
            signature_image_3_frame.open();
            return;
        }

        // Sets up the media library frame
        signature_image_3_frame = wp.media.frames.signature_image_3_frame = wp.media({
            title: meta_image.title,
            button: { text:  meta_image.button },
            library: { type: 'image' }
        });

        // Runs when an image is selected.
        signature_image_3_frame.on('select', function(){

            // Grabs the attachment selection and creates a JSON representation of the model.
            var media_attachment = signature_image_3_frame.state().get('selection').first().toJSON();

            // Sends the attachment URL to our custom image input field.
            $('#signature-image-3').val(media_attachment.url);
        });

        // Opens the media library frame.
        signature_image_3_frame.open();
    });
});

jQuery(document).ready( function($){ "use strict";

// Instantiates the variable that holds the media library frame.
    var signature_image_4_frame;

    // Runs when the image button is clicked.
    $('#signature-image-4-button').click(function(e){

        // Prevents the default action from occuring.
        e.preventDefault();

        // If the frame already exists, re-open it.
        if ( signature_image_4_frame ) {
            signature_image_4_frame.open();
            return;
        }

        // Sets up the media library frame
        signature_image_4_frame = wp.media.frames.signature_image_4_frame = wp.media({
            title: meta_image.title,
            button: { text:  meta_image.button },
            library: { type: 'image' }
        });

        // Runs when an image is selected.
        signature_image_4_frame.on('select', function(){

            // Grabs the attachment selection and creates a JSON representation of the model.
            var media_attachment = signature_image_4_frame.state().get('selection').first().toJSON();

            // Sends the attachment URL to our custom image input field.
            $('#signature-image-4').val(media_attachment.url);
        });

        // Opens the media library frame.
        signature_image_4_frame.open();
    });
});

jQuery(document).ready( function($){ "use strict";

// Instantiates the variable that holds the media library frame.
		var signature_image_5_frame;

		// Runs when the image button is clicked.
		$('#signature-image-5-button').click(function(e){

				// Prevents the default action from occuring.
				e.preventDefault();

				// If the frame already exists, re-open it.
				if ( signature_image_5_frame ) {
						signature_image_5_frame.open();
						return;
				}

				// Sets up the media library frame
				signature_image_5_frame = wp.media.frames.signature_image_5_frame = wp.media({
						title: meta_image.title,
						button: { text:  meta_image.button },
						library: { type: 'image' }
				});

				// Runs when an image is selected.
				signature_image_5_frame.on('select', function(){

						// Grabs the attachment selection and creates a JSON representation of the model.
						var media_attachment = signature_image_5_frame.state().get('selection').first().toJSON();

						// Sends the attachment URL to our custom image input field.
						$('#signature-image-5').val(media_attachment.url);
				});

				// Opens the media library frame.
				signature_image_5_frame.open();
		});
});

jQuery(document).ready( function($){ "use strict";

// Instantiates the variable that holds the media library frame.
		var signature_image_6_frame;

		// Runs when the image button is clicked.
		$('#signature-image-6-button').click(function(e){

				// Prevents the default action from occuring.
				e.preventDefault();

				// If the frame already exists, re-open it.
				if ( signature_image_6_frame ) {
						signature_image_6_frame.open();
						return;
				}

				// Sets up the media library frame
				signature_image_6_frame = wp.media.frames.signature_image_6_frame = wp.media({
						title: meta_image.title,
						button: { text:  meta_image.button },
						library: { type: 'image' }
				});

				// Runs when an image is selected.
				signature_image_6_frame.on('select', function(){

						// Grabs the attachment selection and creates a JSON representation of the model.
						var media_attachment = signature_image_6_frame.state().get('selection').first().toJSON();

						// Sends the attachment URL to our custom image input field.
						$('#signature-image-6').val(media_attachment.url);
				});

				// Opens the media library frame.
				signature_image_6_frame.open();
		});
});

jQuery(document).ready( function($){ "use strict";

// Instantiates the variable that holds the media library frame.
		var signature_image_7_frame;

		// Runs when the image button is clicked.
		$('#signature-image-7-button').click(function(e){

				// Prevents the default action from occuring.
				e.preventDefault();

				// If the frame already exists, re-open it.
				if ( signature_image_7_frame ) {
						signature_image_7_frame.open();
						return;
				}

				// Sets up the media library frame
				signature_image_7_frame = wp.media.frames.signature_image_7_frame = wp.media({
						title: meta_image.title,
						button: { text:  meta_image.button },
						library: { type: 'image' }
				});

				// Runs when an image is selected.
				signature_image_7_frame.on('select', function(){

						// Grabs the attachment selection and creates a JSON representation of the model.
						var media_attachment = signature_image_7_frame.state().get('selection').first().toJSON();

						// Sends the attachment URL to our custom image input field.
						$('#signature-image-7').val(media_attachment.url);
				});

				// Opens the media library frame.
				signature_image_7_frame.open();
		});
});

jQuery(document).ready( function($){ "use strict";

// Instantiates the variable that holds the media library frame.
		var signature_image_8_frame;

		// Runs when the image button is clicked.
		$('#signature-image-8-button').click(function(e){

				// Prevents the default action from occuring.
				e.preventDefault();

				// If the frame already exists, re-open it.
				if ( signature_image_8_frame ) {
						signature_image_8_frame.open();
						return;
				}

				// Sets up the media library frame
				signature_image_8_frame = wp.media.frames.signature_image_8_frame = wp.media({
						title: meta_image.title,
						button: { text:  meta_image.button },
						library: { type: 'image' }
				});

				// Runs when an image is selected.
				signature_image_8_frame.on('select', function(){

						// Grabs the attachment selection and creates a JSON representation of the model.
						var media_attachment = signature_image_8_frame.state().get('selection').first().toJSON();

						// Sends the attachment URL to our custom image input field.
						$('#signature-image-8').val(media_attachment.url);
				});

				// Opens the media library frame.
				signature_image_8_frame.open();
		});
});

jQuery(document).ready( function($){ "use strict";

// Instantiates the variable that holds the media library frame.
		var signature_image_9_frame;

		// Runs when the image button is clicked.
		$('#signature-image-9-button').click(function(e){

				// Prevents the default action from occuring.
				e.preventDefault();

				// If the frame already exists, re-open it.
				if ( signature_image_9_frame ) {
						signature_image_9_frame.open();
						return;
				}

				// Sets up the media library frame
				signature_image_9_frame = wp.media.frames.signature_image_9_frame = wp.media({
						title: meta_image.title,
						button: { text:  meta_image.button },
						library: { type: 'image' }
				});

				// Runs when an image is selected.
				signature_image_9_frame.on('select', function(){

						// Grabs the attachment selection and creates a JSON representation of the model.
						var media_attachment = signature_image_9_frame.state().get('selection').first().toJSON();

						// Sends the attachment URL to our custom image input field.
						$('#signature-image-9').val(media_attachment.url);
				});

				// Opens the media library frame.
				signature_image_9_frame.open();
		});
});

jQuery(document).ready( function($){ "use strict";

// Instantiates the variable that holds the media library frame.
		var signature_image_10_frame;

		// Runs when the image button is clicked.
		$('#signature-image-10-button').click(function(e){

				// Prevents the default action from occuring.
				e.preventDefault();

				// If the frame already exists, re-open it.
				if ( signature_image_10_frame ) {
						signature_image_10_frame.open();
						return;
				}

				// Sets up the media library frame
				signature_image_10_frame = wp.media.frames.signature_image_10_frame = wp.media({
						title: meta_image.title,
						button: { text:  meta_image.button },
						library: { type: 'image' }
				});

				// Runs when an image is selected.
				signature_image_10_frame.on('select', function(){

						// Grabs the attachment selection and creates a JSON representation of the model.
						var media_attachment = signature_image_10_frame.state().get('selection').first().toJSON();

						// Sends the attachment URL to our custom image input field.
						$('#signature-image-10').val(media_attachment.url);
				});

				// Opens the media library frame.
				signature_image_10_frame.open();
		});
});

jQuery(document).ready( function($){ "use strict";

// Instantiates the variable that holds the media library frame.
		var signature_image_11_frame;

		// Runs when the image button is clicked.
		$('#signature-image-11-button').click(function(e){

				// Prevents the default action from occuring.
				e.preventDefault();

				// If the frame already exists, re-open it.
				if ( signature_image_11_frame ) {
						signature_image_11_frame.open();
						return;
				}

				// Sets up the media library frame
				signature_image_11_frame = wp.media.frames.signature_image_11_frame = wp.media({
						title: meta_image.title,
						button: { text:  meta_image.button },
						library: { type: 'image' }
				});

				// Runs when an image is selected.
				signature_image_11_frame.on('select', function(){

						// Grabs the attachment selection and creates a JSON representation of the model.
						var media_attachment = signature_image_11_frame.state().get('selection').first().toJSON();

						// Sends the attachment URL to our custom image input field.
						$('#signature-image-11').val(media_attachment.url);
				});

				// Opens the media library frame.
				signature_image_11_frame.open();
		});
});

jQuery(document).ready( function($){ "use strict";

// Instantiates the variable that holds the media library frame.
		var signature_image_12_frame;

		// Runs when the image button is clicked.
		$('#signature-image-12-button').click(function(e){

				// Prevents the default action from occuring.
				e.preventDefault();

				// If the frame already exists, re-open it.
				if ( signature_image_12_frame ) {
						signature_image_12_frame.open();
						return;
				}

				// Sets up the media library frame
				signature_image_12_frame = wp.media.frames.signature_image_12_frame = wp.media({
						title: meta_image.title,
						button: { text:  meta_image.button },
						library: { type: 'image' }
				});

				// Runs when an image is selected.
				signature_image_12_frame.on('select', function(){

						// Grabs the attachment selection and creates a JSON representation of the model.
						var media_attachment = signature_image_12_frame.state().get('selection').first().toJSON();

						// Sends the attachment URL to our custom image input field.
						$('#signature-image-12').val(media_attachment.url);
				});

				// Opens the media library frame.
				signature_image_12_frame.open();
		});
});

jQuery(document).ready( function($){ "use strict";

// Instantiates the variable that holds the media library frame.
		var signature_image_13_frame;

		// Runs when the image button is clicked.
		$('#signature-image-13-button').click(function(e){

				// Prevents the default action from occuring.
				e.preventDefault();

				// If the frame already exists, re-open it.
				if ( signature_image_13_frame ) {
						signature_image_13_frame.open();
						return;
				}

				// Sets up the media library frame
				signature_image_13_frame = wp.media.frames.signature_image_13_frame = wp.media({
						title: meta_image.title,
						button: { text:  meta_image.button },
						library: { type: 'image' }
				});

				// Runs when an image is selected.
				signature_image_13_frame.on('select', function(){

						// Grabs the attachment selection and creates a JSON representation of the model.
						var media_attachment = signature_image_13_frame.state().get('selection').first().toJSON();

						// Sends the attachment URL to our custom image input field.
						$('#signature-image-13').val(media_attachment.url);
				});

				// Opens the media library frame.
				signature_image_13_frame.open();
		});
});

jQuery(document).ready( function($){ "use strict";

// Instantiates the variable that holds the media library frame.
		var signature_image_14_frame;

		// Runs when the image button is clicked.
		$('#signature-image-14-button').click(function(e){

				// Prevents the default action from occuring.
				e.preventDefault();

				// If the frame already exists, re-open it.
				if ( signature_image_14_frame ) {
						signature_image_14_frame.open();
						return;
				}

				// Sets up the media library frame
				signature_image_14_frame = wp.media.frames.signature_image_14_frame = wp.media({
						title: meta_image.title,
						button: { text:  meta_image.button },
						library: { type: 'image' }
				});

				// Runs when an image is selected.
				signature_image_14_frame.on('select', function(){

						// Grabs the attachment selection and creates a JSON representation of the model.
						var media_attachment = signature_image_14_frame.state().get('selection').first().toJSON();

						// Sends the attachment URL to our custom image input field.
						$('#signature-image-14').val(media_attachment.url);
				});

				// Opens the media library frame.
				signature_image_14_frame.open();
		});
});

jQuery(document).ready( function($){ "use strict";

// Instantiates the variable that holds the media library frame.
		var signature_image_15_frame;

		// Runs when the image button is clicked.
		$('#signature-image-15-button').click(function(e){

				// Prevents the default action from occuring.
				e.preventDefault();

				// If the frame already exists, re-open it.
				if ( signature_image_15_frame ) {
						signature_image_15_frame.open();
						return;
				}

				// Sets up the media library frame
				signature_image_15_frame = wp.media.frames.signature_image_15_frame = wp.media({
						title: meta_image.title,
						button: { text:  meta_image.button },
						library: { type: 'image' }
				});

				// Runs when an image is selected.
				signature_image_15_frame.on('select', function(){

						// Grabs the attachment selection and creates a JSON representation of the model.
						var media_attachment = signature_image_15_frame.state().get('selection').first().toJSON();

						// Sends the attachment URL to our custom image input field.
						$('#signature-image-15').val(media_attachment.url);
				});

				// Opens the media library frame.
				signature_image_15_frame.open();
		});
});

jQuery(document).ready( function($){ "use strict";

// Instantiates the variable that holds the media library frame.
		var signature_image_16_frame;

		// Runs when the image button is clicked.
		$('#signature-image-16-button').click(function(e){

				// Prevents the default action from occuring.
				e.preventDefault();

				// If the frame already exists, re-open it.
				if ( signature_image_16_frame ) {
						signature_image_16_frame.open();
						return;
				}

				// Sets up the media library frame
				signature_image_16_frame = wp.media.frames.signature_image_16_frame = wp.media({
						title: meta_image.title,
						button: { text:  meta_image.button },
						library: { type: 'image' }
				});

				// Runs when an image is selected.
				signature_image_16_frame.on('select', function(){

						// Grabs the attachment selection and creates a JSON representation of the model.
						var media_attachment = signature_image_16_frame.state().get('selection').first().toJSON();

						// Sends the attachment URL to our custom image input field.
						$('#signature-image-16').val(media_attachment.url);
				});

				// Opens the media library frame.
				signature_image_16_frame.open();
		});
});

jQuery(document).ready( function($){ "use strict";

// Instantiates the variable that holds the media library frame.
		var signature_image_17_frame;

		// Runs when the image button is clicked.
		$('#signature-image-17-button').click(function(e){

				// Prevents the default action from occuring.
				e.preventDefault();

				// If the frame already exists, re-open it.
				if ( signature_image_17_frame ) {
						signature_image_17_frame.open();
						return;
				}

				// Sets up the media library frame
				signature_image_17_frame = wp.media.frames.signature_image_17_frame = wp.media({
						title: meta_image.title,
						button: { text:  meta_image.button },
						library: { type: 'image' }
				});

				// Runs when an image is selected.
				signature_image_17_frame.on('select', function(){

						// Grabs the attachment selection and creates a JSON representation of the model.
						var media_attachment = signature_image_17_frame.state().get('selection').first().toJSON();

						// Sends the attachment URL to our custom image input field.
						$('#signature-image-17').val(media_attachment.url);
				});

				// Opens the media library frame.
				signature_image_17_frame.open();
		});
});

jQuery(document).ready( function($){ "use strict";

// Instantiates the variable that holds the media library frame.
		var signature_image_18_frame;

		// Runs when the image button is clicked.
		$('#signature-image-18-button').click(function(e){

				// Prevents the default action from occuring.
				e.preventDefault();

				// If the frame already exists, re-open it.
				if ( signature_image_18_frame ) {
						signature_image_18_frame.open();
						return;
				}

				// Sets up the media library frame
				signature_image_18_frame = wp.media.frames.signature_image_18_frame = wp.media({
						title: meta_image.title,
						button: { text:  meta_image.button },
						library: { type: 'image' }
				});

				// Runs when an image is selected.
				signature_image_18_frame.on('select', function(){

						// Grabs the attachment selection and creates a JSON representation of the model.
						var media_attachment = signature_image_18_frame.state().get('selection').first().toJSON();

						// Sends the attachment URL to our custom image input field.
						$('#signature-image-18').val(media_attachment.url);
				});

				// Opens the media library frame.
				signature_image_18_frame.open();
		});
});

jQuery(document).ready( function($){ "use strict";

// Instantiates the variable that holds the media library frame.
		var signature_image_19_frame;

		// Runs when the image button is clicked.
		$('#signature-image-19-button').click(function(e){

				// Prevents the default action from occuring.
				e.preventDefault();

				// If the frame already exists, re-open it.
				if ( signature_image_19_frame ) {
						signature_image_19_frame.open();
						return;
				}

				// Sets up the media library frame
				signature_image_19_frame = wp.media.frames.signature_image_19_frame = wp.media({
						title: meta_image.title,
						button: { text:  meta_image.button },
						library: { type: 'image' }
				});

				// Runs when an image is selected.
				signature_image_19_frame.on('select', function(){

						// Grabs the attachment selection and creates a JSON representation of the model.
						var media_attachment = signature_image_19_frame.state().get('selection').first().toJSON();

						// Sends the attachment URL to our custom image input field.
						$('#signature-image-19').val(media_attachment.url);
				});

				// Opens the media library frame.
				signature_image_19_frame.open();
		});
});

jQuery(document).ready( function($){ "use strict";

// Instantiates the variable that holds the media library frame.
		var signature_image_20_frame;

		// Runs when the image button is clicked.
		$('#signature-image-20-button').click(function(e){

				// Prevents the default action from occuring.
				e.preventDefault();

				// If the frame already exists, re-open it.
				if ( signature_image_20_frame ) {
						signature_image_20_frame.open();
						return;
				}

				// Sets up the media library frame
				signature_image_20_frame = wp.media.frames.signature_image_20_frame = wp.media({
						title: meta_image.title,
						button: { text:  meta_image.button },
						library: { type: 'image' }
				});

				// Runs when an image is selected.
				signature_image_20_frame.on('select', function(){

						// Grabs the attachment selection and creates a JSON representation of the model.
						var media_attachment = signature_image_20_frame.state().get('selection').first().toJSON();

						// Sends the attachment URL to our custom image input field.
						$('#signature-image-20').val(media_attachment.url);
				});

				// Opens the media library frame.
				signature_image_20_frame.open();
		});
});

jQuery(document).ready( function($){ "use strict";

// Instantiates the variable that holds the media library frame.
		var signature_image_21_frame;

		// Runs when the image button is clicked.
		$('#signature-image-21-button').click(function(e){

				// Prevents the default action from occuring.
				e.preventDefault();

				// If the frame already exists, re-open it.
				if ( signature_image_21_frame ) {
						signature_image_21_frame.open();
						return;
				}

				// Sets up the media library frame
				signature_image_21_frame = wp.media.frames.signature_image_21_frame = wp.media({
						title: meta_image.title,
						button: { text:  meta_image.button },
						library: { type: 'image' }
				});

				// Runs when an image is selected.
				signature_image_21_frame.on('select', function(){

						// Grabs the attachment selection and creates a JSON representation of the model.
						var media_attachment = signature_image_21_frame.state().get('selection').first().toJSON();

						// Sends the attachment URL to our custom image input field.
						$('#signature-image-21').val(media_attachment.url);
				});

				// Opens the media library frame.
				signature_image_21_frame.open();
		});
});

jQuery(document).ready( function($){ "use strict";

// Instantiates the variable that holds the media library frame.
		var signature_image_22_frame;

		// Runs when the image button is clicked.
		$('#signature-image-22-button').click(function(e){

				// Prevents the default action from occuring.
				e.preventDefault();

				// If the frame already exists, re-open it.
				if ( signature_image_22_frame ) {
						signature_image_22_frame.open();
						return;
				}

				// Sets up the media library frame
				signature_image_22_frame = wp.media.frames.signature_image_22_frame = wp.media({
						title: meta_image.title,
						button: { text:  meta_image.button },
						library: { type: 'image' }
				});

				// Runs when an image is selected.
				signature_image_22_frame.on('select', function(){

						// Grabs the attachment selection and creates a JSON representation of the model.
						var media_attachment = signature_image_22_frame.state().get('selection').first().toJSON();

						// Sends the attachment URL to our custom image input field.
						$('#signature-image-22').val(media_attachment.url);
				});

				// Opens the media library frame.
				signature_image_22_frame.open();
		});
});

jQuery(document).ready( function($){ "use strict";

// Instantiates the variable that holds the media library frame.
		var signature_image_23_frame;

		// Runs when the image button is clicked.
		$('#signature-image-23-button').click(function(e){

				// Prevents the default action from occuring.
				e.preventDefault();

				// If the frame already exists, re-open it.
				if ( signature_image_23_frame ) {
						signature_image_23_frame.open();
						return;
				}

				// Sets up the media library frame
				signature_image_23_frame = wp.media.frames.signature_image_23_frame = wp.media({
						title: meta_image.title,
						button: { text:  meta_image.button },
						library: { type: 'image' }
				});

				// Runs when an image is selected.
				signature_image_23_frame.on('select', function(){

						// Grabs the attachment selection and creates a JSON representation of the model.
						var media_attachment = signature_image_23_frame.state().get('selection').first().toJSON();

						// Sends the attachment URL to our custom image input field.
						$('#signature-image-23').val(media_attachment.url);
				});

				// Opens the media library frame.
				signature_image_23_frame.open();
		});
});

jQuery(document).ready( function($){ "use strict";

// Instantiates the variable that holds the media library frame.
		var signature_image_24_frame;

		// Runs when the image button is clicked.
		$('#signature-image-24-button').click(function(e){

				// Prevents the default action from occuring.
				e.preventDefault();

				// If the frame already exists, re-open it.
				if ( signature_image_24_frame ) {
						signature_image_24_frame.open();
						return;
				}

				// Sets up the media library frame
				signature_image_24_frame = wp.media.frames.signature_image_24_frame = wp.media({
						title: meta_image.title,
						button: { text:  meta_image.button },
						library: { type: 'image' }
				});

				// Runs when an image is selected.
				signature_image_24_frame.on('select', function(){

						// Grabs the attachment selection and creates a JSON representation of the model.
						var media_attachment = signature_image_24_frame.state().get('selection').first().toJSON();

						// Sends the attachment URL to our custom image input field.
						$('#signature-image-24').val(media_attachment.url);
				});

				// Opens the media library frame.
				signature_image_24_frame.open();
		});

		// Instantiates the variable that holds the media library frame.
		var signature_image_25_frame;

		// Runs when the image button is clicked.
		$('#signature-image-25-button').click(function(e){

				// Prevents the default action from occuring.
				e.preventDefault();

				// If the frame already exists, re-open it.
				if ( signature_image_25_frame ) {
						signature_image_25_frame.open();
						return;
				}

				// Sets up the media library frame
				signature_image_25_frame = wp.media.frames.signature_image_25_frame = wp.media({
						title: meta_image.title,
						button: { text:  meta_image.button },
						library: { type: 'image' }
				});

				// Runs when an image is selected.
				signature_image_25_frame.on('select', function(){

						// Grabs the attachment selection and creates a JSON representation of the model.
						var media_attachment = signature_image_25_frame.state().get('selection').first().toJSON();

						// Sends the attachment URL to our custom image input field.
						$('#signature-image-25').val(media_attachment.url);
				});

				// Opens the media library frame.
				signature_image_25_frame.open();
		});

		// Instantiates the variable that holds the media library frame.
		var signature_image_26_frame;

		// Runs when the image button is clicked.
		$('#signature-image-26-button').click(function(e){

				// Prevents the default action from occuring.
				e.preventDefault();

				// If the frame already exists, re-open it.
				if ( signature_image_26_frame ) {
						signature_image_26_frame.open();
						return;
				}

				// Sets up the media library frame
				signature_image_26_frame = wp.media.frames.signature_image_26_frame = wp.media({
						title: meta_image.title,
						button: { text:  meta_image.button },
						library: { type: 'image' }
				});

				// Runs when an image is selected.
				signature_image_26_frame.on('select', function(){

						// Grabs the attachment selection and creates a JSON representation of the model.
						var media_attachment = signature_image_26_frame.state().get('selection').first().toJSON();

						// Sends the attachment URL to our custom image input field.
						$('#signature-image-26').val(media_attachment.url);
				});

				// Opens the media library frame.
				signature_image_26_frame.open();
		});

		// Instantiates the variable that holds the media library frame.
		var signature_image_27_frame;

		// Runs when the image button is clicked.
		$('#signature-image-27-button').click(function(e){

				// Prevents the default action from occuring.
				e.preventDefault();

				// If the frame already exists, re-open it.
				if ( signature_image_27_frame ) {
						signature_image_27_frame.open();
						return;
				}

				// Sets up the media library frame
				signature_image_27_frame = wp.media.frames.signature_image_27_frame = wp.media({
						title: meta_image.title,
						button: { text:  meta_image.button },
						library: { type: 'image' }
				});

				// Runs when an image is selected.
				signature_image_27_frame.on('select', function(){

						// Grabs the attachment selection and creates a JSON representation of the model.
						var media_attachment = signature_image_27_frame.state().get('selection').first().toJSON();

						// Sends the attachment URL to our custom image input field.
						$('#signature-image-27').val(media_attachment.url);
				});

				// Opens the media library frame.
				signature_image_27_frame.open();
		});

		// Instantiates the variable that holds the media library frame.
		var signature_image_28_frame;

		// Runs when the image button is clicked.
		$('#signature-image-28-button').click(function(e){

				// Prevents the default action from occuring.
				e.preventDefault();

				// If the frame already exists, re-open it.
				if ( signature_image_28_frame ) {
						signature_image_28_frame.open();
						return;
				}

				// Sets up the media library frame
				signature_image_28_frame = wp.media.frames.signature_image_28_frame = wp.media({
						title: meta_image.title,
						button: { text:  meta_image.button },
						library: { type: 'image' }
				});

				// Runs when an image is selected.
				signature_image_28_frame.on('select', function(){

						// Grabs the attachment selection and creates a JSON representation of the model.
						var media_attachment = signature_image_28_frame.state().get('selection').first().toJSON();

						// Sends the attachment URL to our custom image input field.
						$('#signature-image-28').val(media_attachment.url);
				});

				// Opens the media library frame.
				signature_image_28_frame.open();
		});

		// Instantiates the variable that holds the media library frame.
		var signature_image_29_frame;

		// Runs when the image button is clicked.
		$('#signature-image-29-button').click(function(e){

				// Prevents the default action from occuring.
				e.preventDefault();

				// If the frame already exists, re-open it.
				if ( signature_image_29_frame ) {
						signature_image_29_frame.open();
						return;
				}

				// Sets up the media library frame
				signature_image_29_frame = wp.media.frames.signature_image_29_frame = wp.media({
						title: meta_image.title,
						button: { text:  meta_image.button },
						library: { type: 'image' }
				});

				// Runs when an image is selected.
				signature_image_29_frame.on('select', function(){

						// Grabs the attachment selection and creates a JSON representation of the model.
						var media_attachment = signature_image_29_frame.state().get('selection').first().toJSON();

						// Sends the attachment URL to our custom image input field.
						$('#signature-image-29').val(media_attachment.url);
				});

				// Opens the media library frame.
				signature_image_29_frame.open();
		});

		// Instantiates the variable that holds the media library frame.
		var signature_image_30_frame;

		// Runs when the image button is clicked.
		$('#signature-image-30-button').click(function(e){

				// Prevents the default action from occuring.
				e.preventDefault();

				// If the frame already exists, re-open it.
				if ( signature_image_30_frame ) {
						signature_image_30_frame.open();
						return;
				}

				// Sets up the media library frame
				signature_image_30_frame = wp.media.frames.signature_image_30_frame = wp.media({
						title: meta_image.title,
						button: { text:  meta_image.button },
						library: { type: 'image' }
				});

				// Runs when an image is selected.
				signature_image_30_frame.on('select', function(){

						// Grabs the attachment selection and creates a JSON representation of the model.
						var media_attachment = signature_image_30_frame.state().get('selection').first().toJSON();

						// Sends the attachment URL to our custom image input field.
						$('#signature-image-30').val(media_attachment.url);
				});

				// Opens the media library frame.
				signature_image_30_frame.open();
		});

		// Instantiates the variable that holds the media library frame.
		var signature_image_31_frame;

		// Runs when the image button is clicked.
		$('#signature-image-31-button').click(function(e){

				// Prevents the default action from occuring.
				e.preventDefault();

				// If the frame already exists, re-open it.
				if ( signature_image_31_frame ) {
						signature_image_31_frame.open();
						return;
				}

				// Sets up the media library frame
				signature_image_31_frame = wp.media.frames.signature_image_31_frame = wp.media({
						title: meta_image.title,
						button: { text:  meta_image.button },
						library: { type: 'image' }
				});

				// Runs when an image is selected.
				signature_image_31_frame.on('select', function(){

						// Grabs the attachment selection and creates a JSON representation of the model.
						var media_attachment = signature_image_31_frame.state().get('selection').first().toJSON();

						// Sends the attachment URL to our custom image input field.
						$('#signature-image-31').val(media_attachment.url);
				});

				// Opens the media library frame.
				signature_image_31_frame.open();
		});

		// Instantiates the variable that holds the media library frame.
		var signature_image_32_frame;

		// Runs when the image button is clicked.
		$('#signature-image-32-button').click(function(e){

				// Prevents the default action from occuring.
				e.preventDefault();

				// If the frame already exists, re-open it.
				if ( signature_image_32_frame ) {
						signature_image_32_frame.open();
						return;
				}

				// Sets up the media library frame
				signature_image_32_frame = wp.media.frames.signature_image_32_frame = wp.media({
						title: meta_image.title,
						button: { text:  meta_image.button },
						library: { type: 'image' }
				});

				// Runs when an image is selected.
				signature_image_32_frame.on('select', function(){

						// Grabs the attachment selection and creates a JSON representation of the model.
						var media_attachment = signature_image_32_frame.state().get('selection').first().toJSON();

						// Sends the attachment URL to our custom image input field.
						$('#signature-image-32').val(media_attachment.url);
				});

				// Opens the media library frame.
				signature_image_32_frame.open();
		});

		// Instantiates the variable that holds the media library frame.
		var signature_image_33_frame;

		// Runs when the image button is clicked.
		$('#signature-image-33-button').click(function(e){

				// Prevents the default action from occuring.
				e.preventDefault();

				// If the frame already exists, re-open it.
				if ( signature_image_33_frame ) {
						signature_image_33_frame.open();
						return;
				}

				// Sets up the media library frame
				signature_image_33_frame = wp.media.frames.signature_image_33_frame = wp.media({
						title: meta_image.title,
						button: { text:  meta_image.button },
						library: { type: 'image' }
				});

				// Runs when an image is selected.
				signature_image_33_frame.on('select', function(){

						// Grabs the attachment selection and creates a JSON representation of the model.
						var media_attachment = signature_image_33_frame.state().get('selection').first().toJSON();

						// Sends the attachment URL to our custom image input field.
						$('#signature-image-33').val(media_attachment.url);
				});

				// Opens the media library frame.
				signature_image_33_frame.open();
		});

    		// Instantiates the variable that holds the media library frame.
		var signature_image_34_frame;

		// Runs when the image button is clicked.
		$('#signature-image-34-button').click(function(e){

				// Prevents the default action from occuring.
				e.preventDefault();

				// If the frame already exists, re-open it.
				if ( signature_image_34_frame ) {
						signature_image_34_frame.open();
						return;
				}

				// Sets up the media library frame
				signature_image_34_frame = wp.media.frames.signature_image_34_frame = wp.media({
						title: meta_image.title,
						button: { text:  meta_image.button },
						library: { type: 'image' }
				});

				// Runs when an image is selected.
				signature_image_34_frame.on('select', function(){

						// Grabs the attachment selection and creates a JSON representation of the model.
						var media_attachment = signature_image_34_frame.state().get('selection').first().toJSON();

						// Sends the attachment URL to our custom image input field.
						$('#signature-image-34').val(media_attachment.url);
				});

				// Opens the media library frame.
				signature_image_34_frame.open();
		});

    // Instantiates the variable that holds the media library frame.
		var signature_image_35_frame;

		// Runs when the image button is clicked.
		$('#signature-image-35-button').click(function(e){

				// Prevents the default action from occuring.
				e.preventDefault();

				// If the frame already exists, re-open it.
				if ( signature_image_35_frame ) {
						signature_image_35_frame.open();
						return;
				}

				// Sets up the media library frame
				signature_image_35_frame = wp.media.frames.signature_image_35_frame = wp.media({
						title: meta_image.title,
						button: { text:  meta_image.button },
						library: { type: 'image' }
				});

				// Runs when an image is selected.
				signature_image_35_frame.on('select', function(){

						// Grabs the attachment selection and creates a JSON representation of the model.
						var media_attachment = signature_image_35_frame.state().get('selection').first().toJSON();

						// Sends the attachment URL to our custom image input field.
						$('#signature-image-35').val(media_attachment.url);
				});

				// Opens the media library frame.
				signature_image_35_frame.open();
		});

    // Instantiates the variable that holds the media library frame.
		var signature_image_36_frame;

		// Runs when the image button is clicked.
		$('#signature-image-36-button').click(function(e){

				// Prevents the default action from occuring.
				e.preventDefault();

				// If the frame already exists, re-open it.
				if ( signature_image_36_frame ) {
						signature_image_36_frame.open();
						return;
				}

				// Sets up the media library frame
				signature_image_36_frame = wp.media.frames.signature_image_36_frame = wp.media({
						title: meta_image.title,
						button: { text:  meta_image.button },
						library: { type: 'image' }
				});

				// Runs when an image is selected.
				signature_image_36_frame.on('select', function(){

						// Grabs the attachment selection and creates a JSON representation of the model.
						var media_attachment = signature_image_36_frame.state().get('selection').first().toJSON();

						// Sends the attachment URL to our custom image input field.
						$('#signature-image-36').val(media_attachment.url);
				});

				// Opens the media library frame.
				signature_image_36_frame.open();
		});

    // Instantiates the variable that holds the media library frame.
		var signature_image_37_frame;

		// Runs when the image button is clicked.
		$('#signature-image-37-button').click(function(e){

				// Prevents the default action from occuring.
				e.preventDefault();

				// If the frame already exists, re-open it.
				if ( signature_image_37_frame ) {
						signature_image_37_frame.open();
						return;
				}

				// Sets up the media library frame
				signature_image_37_frame = wp.media.frames.signature_image_37_frame = wp.media({
						title: meta_image.title,
						button: { text:  meta_image.button },
						library: { type: 'image' }
				});

				// Runs when an image is selected.
				signature_image_37_frame.on('select', function(){

						// Grabs the attachment selection and creates a JSON representation of the model.
						var media_attachment = signature_image_37_frame.state().get('selection').first().toJSON();

						// Sends the attachment URL to our custom image input field.
						$('#signature-image-37').val(media_attachment.url);
				});

				// Opens the media library frame.
				signature_image_37_frame.open();
		});

    // Instantiates the variable that holds the media library frame.
		var signature_image_38_frame;

		// Runs when the image button is clicked.
		$('#signature-image-38-button').click(function(e){

				// Prevents the default action from occuring.
				e.preventDefault();

				// If the frame already exists, re-open it.
				if ( signature_image_38_frame ) {
						signature_image_38_frame.open();
						return;
				}

				// Sets up the media library frame
				signature_image_38_frame = wp.media.frames.signature_image_38_frame = wp.media({
						title: meta_image.title,
						button: { text:  meta_image.button },
						library: { type: 'image' }
				});

				// Runs when an image is selected.
				signature_image_38_frame.on('select', function(){

						// Grabs the attachment selection and creates a JSON representation of the model.
						var media_attachment = signature_image_38_frame.state().get('selection').first().toJSON();

						// Sends the attachment URL to our custom image input field.
						$('#signature-image-38').val(media_attachment.url);
				});

				// Opens the media library frame.
				signature_image_38_frame.open();
		});

		// Instantiates the variable that holds the media library frame.
		var signature_image_39_frame;

		// Runs when the image button is clicked.
		$('#signature-image-39-button').click(function(e){

				// Prevents the default action from occuring.
				e.preventDefault();

				// If the frame already exists, re-open it.
				if ( signature_image_39_frame ) {
						signature_image_39_frame.open();
						return;
				}

				// Sets up the media library frame
				signature_image_39_frame = wp.media.frames.signature_image_39_frame = wp.media({
						title: meta_image.title,
						button: { text:  meta_image.button },
						library: { type: 'image' }
				});

				// Runs when an image is selected.
				signature_image_39_frame.on('select', function(){

						// Grabs the attachment selection and creates a JSON representation of the model.
						var media_attachment = signature_image_39_frame.state().get('selection').first().toJSON();

						// Sends the attachment URL to our custom image input field.
						$('#signature-image-39').val(media_attachment.url);
				});

				// Opens the media library frame.
				signature_image_39_frame.open();
		});

		// Instantiates the variable that holds the media library frame.
		var signature_image_40_frame;

		// Runs when the image button is clicked.
		$('#signature-image-40-button').click(function(e){

				// Prevents the default action from occuring.
				e.preventDefault();

				// If the frame already exists, re-open it.
				if ( signature_image_40_frame ) {
						signature_image_40_frame.open();
						return;
				}

				// Sets up the media library frame
				signature_image_40_frame = wp.media.frames.signature_image_40_frame = wp.media({
						title: meta_image.title,
						button: { text:  meta_image.button },
						library: { type: 'image' }
				});

				// Runs when an image is selected.
				signature_image_40_frame.on('select', function(){

						// Grabs the attachment selection and creates a JSON representation of the model.
						var media_attachment = signature_image_40_frame.state().get('selection').first().toJSON();

						// Sends the attachment URL to our custom image input field.
						$('#signature-image-40').val(media_attachment.url);
				});

				// Opens the media library frame.
				signature_image_40_frame.open();
		});

		// Instantiates the variable that holds the media library frame.
		var signature_image_41_frame;

		// Runs when the image button is clicked.
		$('#signature-image-41-button').click(function(e){

				// Prevents the default action from occuring.
				e.preventDefault();

				// If the frame already exists, re-open it.
				if ( signature_image_41_frame ) {
						signature_image_41_frame.open();
						return;
				}

				// Sets up the media library frame
				signature_image_41_frame = wp.media.frames.signature_image_41_frame = wp.media({
						title: meta_image.title,
						button: { text:  meta_image.button },
						library: { type: 'image' }
				});

				// Runs when an image is selected.
				signature_image_41_frame.on('select', function(){

						// Grabs the attachment selection and creates a JSON representation of the model.
						var media_attachment = signature_image_41_frame.state().get('selection').first().toJSON();

						// Sends the attachment URL to our custom image input field.
						$('#signature-image-41').val(media_attachment.url);
				});

				// Opens the media library frame.
				signature_image_41_frame.open();
		});

		// Instantiates the variable that holds the media library frame.
		var signature_image_42_frame;

		// Runs when the image button is clicked.
		$('#signature-image-42-button').click(function(e){

				// Prevents the default action from occuring.
				e.preventDefault();

				// If the frame already exists, re-open it.
				if ( signature_image_42_frame ) {
						signature_image_42_frame.open();
						return;
				}

				// Sets up the media library frame
				signature_image_42_frame = wp.media.frames.signature_image_42_frame = wp.media({
						title: meta_image.title,
						button: { text:  meta_image.button },
						library: { type: 'image' }
				});

				// Runs when an image is selected.
				signature_image_42_frame.on('select', function(){

						// Grabs the attachment selection and creates a JSON representation of the model.
						var media_attachment = signature_image_42_frame.state().get('selection').first().toJSON();

						// Sends the attachment URL to our custom image input field.
						$('#signature-image-42').val(media_attachment.url);
				});

				// Opens the media library frame.
				signature_image_42_frame.open();
		});

    // Instantiates the variable that holds the media library frame.
    var signature_image_43_frame;

    // Runs when the image button is clicked.
    $('#signature-image-43-button').click(function(e){

        // Prevents the default action from occuring.
        e.preventDefault();

        // If the frame already exists, re-open it.
        if ( signature_image_43_frame ) {
            signature_image_43_frame.open();
            return;
        }

        // Sets up the media library frame
        signature_image_43_frame = wp.media.frames.signature_image_43_frame = wp.media({
            title: meta_image.title,
            button: { text:  meta_image.button },
            library: { type: 'image' }
        });

        // Runs when an image is selected.
        signature_image_43_frame.on('select', function(){

            // Grabs the attachment selection and creates a JSON representation of the model.
            var media_attachment = signature_image_43_frame.state().get('selection').first().toJSON();

            // Sends the attachment URL to our custom image input field.
            $('#signature-image-43').val(media_attachment.url);
        });

        // Opens the media library frame.
        signature_image_43_frame.open();
    });

    // Instantiates the variable that holds the media library frame.
    var signature_image_44_frame;

    // Runs when the image button is clicked.
    $('#signature-image-44-button').click(function(e){

        // Prevents the default action from occuring.
        e.preventDefault();

        // If the frame already exists, re-open it.
        if ( signature_image_44_frame ) {
            signature_image_44_frame.open();
            return;
        }

        // Sets up the media library frame
        signature_image_44_frame = wp.media.frames.signature_image_44_frame = wp.media({
            title: meta_image.title,
            button: { text:  meta_image.button },
            library: { type: 'image' }
        });

        // Runs when an image is selected.
        signature_image_44_frame.on('select', function(){

            // Grabs the attachment selection and creates a JSON representation of the model.
            var media_attachment = signature_image_44_frame.state().get('selection').first().toJSON();

            // Sends the attachment URL to our custom image input field.
            $('#signature-image-44').val(media_attachment.url);
        });

        // Opens the media library frame.
        signature_image_44_frame.open();
    });

    // Instantiates the variable that holds the media library frame.
    var signature_image_45_frame;

    // Runs when the image button is clicked.
    $('#signature-image-45-button').click(function(e){

        // Prevents the default action from occuring.
        e.preventDefault();

        // If the frame already exists, re-open it.
        if ( signature_image_45_frame ) {
            signature_image_45_frame.open();
            return;
        }

        // Sets up the media library frame
        signature_image_45_frame = wp.media.frames.signature_image_45_frame = wp.media({
            title: meta_image.title,
            button: { text:  meta_image.button },
            library: { type: 'image' }
        });

        // Runs when an image is selected.
        signature_image_45_frame.on('select', function(){

            // Grabs the attachment selection and creates a JSON representation of the model.
            var media_attachment = signature_image_45_frame.state().get('selection').first().toJSON();

            // Sends the attachment URL to our custom image input field.
            $('#signature-image-45').val(media_attachment.url);
        });

        // Opens the media library frame.
        signature_image_45_frame.open();
    });

    // Instantiates the variable that holds the media library frame.
    var signature_image_46_frame;

    // Runs when the image button is clicked.
    $('#signature-image-46-button').click(function(e){

        // Prevents the default action from occuring.
        e.preventDefault();

        // If the frame already exists, re-open it.
        if ( signature_image_46_frame ) {
            signature_image_46_frame.open();
            return;
        }

        // Sets up the media library frame
        signature_image_46_frame = wp.media.frames.signature_image_46_frame = wp.media({
            title: meta_image.title,
            button: { text:  meta_image.button },
            library: { type: 'image' }
        });

        // Runs when an image is selected.
        signature_image_46_frame.on('select', function(){

            // Grabs the attachment selection and creates a JSON representation of the model.
            var media_attachment = signature_image_46_frame.state().get('selection').first().toJSON();

            // Sends the attachment URL to our custom image input field.
            $('#signature-image-46').val(media_attachment.url);
        });

        // Opens the media library frame.
        signature_image_46_frame.open();
    });

    // Instantiates the variable that holds the media library frame.
    var signature_image_47_frame;

    // Runs when the image button is clicked.
    $('#signature-image-47-button').click(function(e){

        // Prevents the default action from occuring.
        e.preventDefault();

        // If the frame already exists, re-open it.
        if ( signature_image_47_frame ) {
            signature_image_47_frame.open();
            return;
        }

        // Sets up the media library frame
        signature_image_47_frame = wp.media.frames.signature_image_47_frame = wp.media({
            title: meta_image.title,
            button: { text:  meta_image.button },
            library: { type: 'image' }
        });

        // Runs when an image is selected.
        signature_image_47_frame.on('select', function(){

            // Grabs the attachment selection and creates a JSON representation of the model.
            var media_attachment = signature_image_47_frame.state().get('selection').first().toJSON();

            // Sends the attachment URL to our custom image input field.
            $('#signature-image-47').val(media_attachment.url);
        });

        // Opens the media library frame.
        signature_image_47_frame.open();
    });

    // Instantiates the variable that holds the media library frame.
    var signature_image_48_frame;

    // Runs when the image button is clicked.
    $('#signature-image-48-button').click(function(e){

        // Prevents the default action from occuring.
        e.preventDefault();

        // If the frame already exists, re-open it.
        if ( signature_image_48_frame ) {
            signature_image_48_frame.open();
            return;
        }

        // Sets up the media library frame
        signature_image_48_frame = wp.media.frames.signature_image_48_frame = wp.media({
            title: meta_image.title,
            button: { text:  meta_image.button },
            library: { type: 'image' }
        });

        // Runs when an image is selected.
        signature_image_48_frame.on('select', function(){

            // Grabs the attachment selection and creates a JSON representation of the model.
            var media_attachment = signature_image_48_frame.state().get('selection').first().toJSON();

            // Sends the attachment URL to our custom image input field.
            $('#signature-image-48').val(media_attachment.url);
        });

        // Opens the media library frame.
        signature_image_48_frame.open();
    });

    // Instantiates the variable that holds the media library frame.
    var signature_image_49_frame;

    // Runs when the image button is clicked.
    $('#signature-image-49-button').click(function(e){

        // Prevents the default action from occuring.
        e.preventDefault();

        // If the frame already exists, re-open it.
        if ( signature_image_49_frame ) {
            signature_image_49_frame.open();
            return;
        }

        // Sets up the media library frame
        signature_image_49_frame = wp.media.frames.signature_image_49_frame = wp.media({
            title: meta_image.title,
            button: { text:  meta_image.button },
            library: { type: 'image' }
        });

        // Runs when an image is selected.
        signature_image_49_frame.on('select', function(){

            // Grabs the attachment selection and creates a JSON representation of the model.
            var media_attachment = signature_image_49_frame.state().get('selection').first().toJSON();

            // Sends the attachment URL to our custom image input field.
            $('#signature-image-49').val(media_attachment.url);
        });

        // Opens the media library frame.
        signature_image_49_frame.open();
    });

    // Instantiates the variable that holds the media library frame.
    var signature_image_50_frame;

    // Runs when the image button is clicked.
    $('#signature-image-50-button').click(function(e){

        // Prevents the default action from occuring.
        e.preventDefault();

        // If the frame already exists, re-open it.
        if ( signature_image_50_frame ) {
            signature_image_50_frame.open();
            return;
        }

        // Sets up the media library frame
        signature_image_50_frame = wp.media.frames.signature_image_50_frame = wp.media({
            title: meta_image.title,
            button: { text:  meta_image.button },
            library: { type: 'image' }
        });

        // Runs when an image is selected.
        signature_image_50_frame.on('select', function(){

            // Grabs the attachment selection and creates a JSON representation of the model.
            var media_attachment = signature_image_50_frame.state().get('selection').first().toJSON();

            // Sends the attachment URL to our custom image input field.
            $('#signature-image-50').val(media_attachment.url);
        });

        // Opens the media library frame.
        signature_image_50_frame.open();
    });

    // Instantiates the variable that holds the media library frame.
    var signature_image_51_frame;

    // Runs when the image button is clicked.
    $('#signature-image-51-button').click(function(e){

        // Prevents the default action from occuring.
        e.preventDefault();

        // If the frame already exists, re-open it.
        if ( signature_image_51_frame ) {
            signature_image_51_frame.open();
            return;
        }

        // Sets up the media library frame
        signature_image_51_frame = wp.media.frames.signature_image_51_frame = wp.media({
            title: meta_image.title,
            button: { text:  meta_image.button },
            library: { type: 'image' }
        });

        // Runs when an image is selected.
        signature_image_51_frame.on('select', function(){

            // Grabs the attachment selection and creates a JSON representation of the model.
            var media_attachment = signature_image_51_frame.state().get('selection').first().toJSON();

            // Sends the attachment URL to our custom image input field.
            $('#signature-image-51').val(media_attachment.url);
        });

        // Opens the media library frame.
        signature_image_51_frame.open();
    });

    // Instantiates the variable that holds the media library frame.
    var signature_image_52_frame;

    // Runs when the image button is clicked.
    $('#signature-image-52-button').click(function(e){

        // Prevents the default action from occuring.
        e.preventDefault();

        // If the frame already exists, re-open it.
        if ( signature_image_52_frame ) {
            signature_image_52_frame.open();
            return;
        }

        // Sets up the media library frame
        signature_image_52_frame = wp.media.frames.signature_image_52_frame = wp.media({
            title: meta_image.title,
            button: { text:  meta_image.button },
            library: { type: 'image' }
        });

        // Runs when an image is selected.
        signature_image_52_frame.on('select', function(){

            // Grabs the attachment selection and creates a JSON representation of the model.
            var media_attachment = signature_image_52_frame.state().get('selection').first().toJSON();

            // Sends the attachment URL to our custom image input field.
            $('#signature-image-52').val(media_attachment.url);
        });

        // Opens the media library frame.
        signature_image_52_frame.open();
    });

    // Instantiates the variable that holds the media library frame.
    var signature_image_53_frame;

    // Runs when the image button is clicked.
    $('#signature-image-53-button').click(function(e){

        // Prevents the default action from occuring.
        e.preventDefault();

        // If the frame already exists, re-open it.
        if ( signature_image_53_frame ) {
            signature_image_53_frame.open();
            return;
        }

        // Sets up the media library frame
        signature_image_53_frame = wp.media.frames.signature_image_53_frame = wp.media({
            title: meta_image.title,
            button: { text:  meta_image.button },
            library: { type: 'image' }
        });

        // Runs when an image is selected.
        signature_image_53_frame.on('select', function(){

            // Grabs the attachment selection and creates a JSON representation of the model.
            var media_attachment = signature_image_53_frame.state().get('selection').first().toJSON();

            // Sends the attachment URL to our custom image input field.
            $('#signature-image-53').val(media_attachment.url);
        });

        // Opens the media library frame.
        signature_image_53_frame.open();
    });

    // Instantiates the variable that holds the media library frame.
    var signature_image_54_frame;

    // Runs when the image button is clicked.
    $('#signature-image-54-button').click(function(e){

        // Prevents the default action from occuring.
        e.preventDefault();

        // If the frame already exists, re-open it.
        if ( signature_image_54_frame ) {
            signature_image_54_frame.open();
            return;
        }

        // Sets up the media library frame
        signature_image_54_frame = wp.media.frames.signature_image_54_frame = wp.media({
            title: meta_image.title,
            button: { text:  meta_image.button },
            library: { type: 'image' }
        });

        // Runs when an image is selected.
        signature_image_54_frame.on('select', function(){

            // Grabs the attachment selection and creates a JSON representation of the model.
            var media_attachment = signature_image_54_frame.state().get('selection').first().toJSON();

            // Sends the attachment URL to our custom image input field.
            $('#signature-image-54').val(media_attachment.url);
        });

        // Opens the media library frame.
        signature_image_54_frame.open();
    });

    // Instantiates the variable that holds the media library frame.
    var signature_image_55_frame;

    // Runs when the image button is clicked.
    $('#signature-image-55-button').click(function(e){

        // Prevents the default action from occuring.
        e.preventDefault();

        // If the frame already exists, re-open it.
        if ( signature_image_55_frame ) {
            signature_image_55_frame.open();
            return;
        }

        // Sets up the media library frame
        signature_image_55_frame = wp.media.frames.signature_image_55_frame = wp.media({
            title: meta_image.title,
            button: { text:  meta_image.button },
            library: { type: 'image' }
        });

        // Runs when an image is selected.
        signature_image_55_frame.on('select', function(){

            // Grabs the attachment selection and creates a JSON representation of the model.
            var media_attachment = signature_image_55_frame.state().get('selection').first().toJSON();

            // Sends the attachment URL to our custom image input field.
            $('#signature-image-55').val(media_attachment.url);
        });

        // Opens the media library frame.
        signature_image_55_frame.open();
    });

    // Instantiates the variable that holds the media library frame.
    var signature_image_56_frame;

    // Runs when the image button is clicked.
    $('#signature-image-56-button').click(function(e){

        // Prevents the default action from occuring.
        e.preventDefault();

        // If the frame already exists, re-open it.
        if ( signature_image_56_frame ) {
            signature_image_56_frame.open();
            return;
        }

        // Sets up the media library frame
        signature_image_56_frame = wp.media.frames.signature_image_56_frame = wp.media({
            title: meta_image.title,
            button: { text:  meta_image.button },
            library: { type: 'image' }
        });

        // Runs when an image is selected.
        signature_image_56_frame.on('select', function(){

            // Grabs the attachment selection and creates a JSON representation of the model.
            var media_attachment = signature_image_56_frame.state().get('selection').first().toJSON();

            // Sends the attachment URL to our custom image input field.
            $('#signature-image-56').val(media_attachment.url);
        });

        // Opens the media library frame.
        signature_image_56_frame.open();
    });

    // Instantiates the variable that holds the media library frame.
    var signature_image_57_frame;

    // Runs when the image button is clicked.
    $('#signature-image-57-button').click(function(e){

        // Prevents the default action from occuring.
        e.preventDefault();

        // If the frame already exists, re-open it.
        if ( signature_image_57_frame ) {
            signature_image_57_frame.open();
            return;
        }

        // Sets up the media library frame
        signature_image_57_frame = wp.media.frames.signature_image_57_frame = wp.media({
            title: meta_image.title,
            button: { text:  meta_image.button },
            library: { type: 'image' }
        });

        // Runs when an image is selected.
        signature_image_57_frame.on('select', function(){

            // Grabs the attachment selection and creates a JSON representation of the model.
            var media_attachment = signature_image_57_frame.state().get('selection').first().toJSON();

            // Sends the attachment URL to our custom image input field.
            $('#signature-image-57').val(media_attachment.url);
        });

        // Opens the media library frame.
        signature_image_57_frame.open();
    });

    // Instantiates the variable that holds the media library frame.
    var signature_image_58_frame;

    // Runs when the image button is clicked.
    $('#signature-image-58-button').click(function(e){

        // Prevents the default action from occuring.
        e.preventDefault();

        // If the frame already exists, re-open it.
        if ( signature_image_58_frame ) {
            signature_image_58_frame.open();
            return;
        }

        // Sets up the media library frame
        signature_image_58_frame = wp.media.frames.signature_image_58_frame = wp.media({
            title: meta_image.title,
            button: { text:  meta_image.button },
            library: { type: 'image' }
        });

        // Runs when an image is selected.
        signature_image_58_frame.on('select', function(){

            // Grabs the attachment selection and creates a JSON representation of the model.
            var media_attachment = signature_image_58_frame.state().get('selection').first().toJSON();

            // Sends the attachment URL to our custom image input field.
            $('#signature-image-58').val(media_attachment.url);
        });

        // Opens the media library frame.
        signature_image_58_frame.open();
    });

    // Instantiates the variable that holds the media library frame.
    var signature_image_59_frame;

    // Runs when the image button is clicked.
    $('#signature-image-59-button').click(function(e){

        // Prevents the default action from occuring.
        e.preventDefault();

        // If the frame already exists, re-open it.
        if ( signature_image_59_frame ) {
            signature_image_59_frame.open();
            return;
        }

        // Sets up the media library frame
        signature_image_59_frame = wp.media.frames.signature_image_59_frame = wp.media({
            title: meta_image.title,
            button: { text:  meta_image.button },
            library: { type: 'image' }
        });

        // Runs when an image is selected.
        signature_image_59_frame.on('select', function(){

            // Grabs the attachment selection and creates a JSON representation of the model.
            var media_attachment = signature_image_59_frame.state().get('selection').first().toJSON();

            // Sends the attachment URL to our custom image input field.
            $('#signature-image-59').val(media_attachment.url);
        });

        // Opens the media library frame.
        signature_image_59_frame.open();
    });

    // Instantiates the variable that holds the media library frame.
    var signature_image_60_frame;

    // Runs when the image button is clicked.
    $('#signature-image-60-button').click(function(e){

        // Prevents the default action from occuring.
        e.preventDefault();

        // If the frame already exists, re-open it.
        if ( signature_image_60_frame ) {
            signature_image_60_frame.open();
            return;
        }

        // Sets up the media library frame
        signature_image_60_frame = wp.media.frames.signature_image_60_frame = wp.media({
            title: meta_image.title,
            button: { text:  meta_image.button },
            library: { type: 'image' }
        });

        // Runs when an image is selected.
        signature_image_60_frame.on('select', function(){

            // Grabs the attachment selection and creates a JSON representation of the model.
            var media_attachment = signature_image_60_frame.state().get('selection').first().toJSON();

            // Sends the attachment URL to our custom image input field.
            $('#signature-image-60').val(media_attachment.url);
        });

        // Opens the media library frame.
        signature_image_60_frame.open();
    });

    // Instantiates the variable that holds the media library frame.
    var signature_image_61_frame;

    // Runs when the image button is clicked.
    $('#signature-image-61-button').click(function(e){

        // Prevents the default action from occuring.
        e.preventDefault();

        // If the frame already exists, re-open it.
        if ( signature_image_61_frame ) {
            signature_image_61_frame.open();
            return;
        }

        // Sets up the media library frame
        signature_image_61_frame = wp.media.frames.signature_image_61_frame = wp.media({
            title: meta_image.title,
            button: { text:  meta_image.button },
            library: { type: 'image' }
        });

        // Runs when an image is selected.
        signature_image_61_frame.on('select', function(){

            // Grabs the attachment selection and creates a JSON representation of the model.
            var media_attachment = signature_image_61_frame.state().get('selection').first().toJSON();

            // Sends the attachment URL to our custom image input field.
            $('#signature-image-61').val(media_attachment.url);
        });

        // Opens the media library frame.
        signature_image_61_frame.open();
    });

    // Instantiates the variable that holds the media library frame.
    var signature_image_62_frame;

    // Runs when the image button is clicked.
    $('#signature-image-62-button').click(function(e){

        // Prevents the default action from occuring.
        e.preventDefault();

        // If the frame already exists, re-open it.
        if ( signature_image_62_frame ) {
            signature_image_62_frame.open();
            return;
        }

        // Sets up the media library frame
        signature_image_62_frame = wp.media.frames.signature_image_62_frame = wp.media({
            title: meta_image.title,
            button: { text:  meta_image.button },
            library: { type: 'image' }
        });

        // Runs when an image is selected.
        signature_image_62_frame.on('select', function(){

            // Grabs the attachment selection and creates a JSON representation of the model.
            var media_attachment = signature_image_62_frame.state().get('selection').first().toJSON();

            // Sends the attachment URL to our custom image input field.
            $('#signature-image-62').val(media_attachment.url);
        });

        // Opens the media library frame.
        signature_image_62_frame.open();
    });

});

jQuery(document).ready( function($){ "use strict";

// Instantiates the variable that holds the media library frame.
		var signature_centered_image_frame;

		// Runs when the image button is clicked.
		$('#signature-centered-image-button').click(function(e){

				// Prevents the default action from occuring.
				e.preventDefault();

				// If the frame already exists, re-open it.
				if ( signature_centered_image_frame ) {
						signature_centered_image_frame.open();
						return;
				}

				// Sets up the media library frame
				signature_centered_image_frame = wp.media.frames.signature_centered_image_frame = wp.media({
						title: meta_image.title,
						button: { text:  meta_image.button },
						library: { type: 'image' }
				});

				// Runs when an image is selected.
				signature_centered_image_frame.on('select', function(){

						// Grabs the attachment selection and creates a JSON representation of the model.
						var media_attachment = signature_centered_image_frame.state().get('selection').first().toJSON();

						// Sends the attachment URL to our custom image input field.
						$('#signature-centered-image').val(media_attachment.url);
				});

				// Opens the media library frame.
				signature_centered_image_frame.open();
		});
});

jQuery(document).ready( function($){ "use strict";

// Instantiates the variable that holds the media library frame.
		var signature_centered_l_frame;

		// Runs when the image button is clicked.
		$('#signature-centered-l-button').click(function(e){

				// Prevents the default action from occuring.
				e.preventDefault();

				// If the frame already exists, re-open it.
				if ( signature_centered_l_frame ) {
						signature_centered_l_frame.open();
						return;
				}

				// Sets up the media library frame
				signature_centered_l_frame = wp.media.frames.signature_centered_l_frame = wp.media({
						title: meta_image.title,
						button: { text:  meta_image.button },
						library: { type: 'image' }
				});

				// Runs when an image is selected.
				signature_centered_l_frame.on('select', function(){

						// Grabs the attachment selection and creates a JSON representation of the model.
						var media_attachment = signature_centered_l_frame.state().get('selection').first().toJSON();

						// Sends the attachment URL to our custom image input field.
						$('#signature-centered-l').val(media_attachment.url);
				});

				// Opens the media library frame.
				signature_centered_l_frame.open();
		});
});

jQuery(document).ready( function($){ "use strict";

// Instantiates the variable that holds the media library frame.
		var signature_centered_r_frame;

		// Runs when the image button is clicked.
		$('#signature-centered-r-button').click(function(e){

				// Prevents the default action from occuring.
				e.preventDefault();

				// If the frame already exists, re-open it.
				if ( signature_centered_r_frame ) {
						signature_centered_r_frame.open();
						return;
				}

				// Sets up the media library frame
				signature_centered_r_frame = wp.media.frames.signature_centered_r_frame = wp.media({
						title: meta_image.title,
						button: { text:  meta_image.button },
						library: { type: 'image' }
				});

				// Runs when an image is selected.
				signature_centered_r_frame.on('select', function(){

						// Grabs the attachment selection and creates a JSON representation of the model.
						var media_attachment = signature_centered_r_frame.state().get('selection').first().toJSON();

						// Sends the attachment URL to our custom image input field.
						$('#signature-centered-r').val(media_attachment.url);
				});

				// Opens the media library frame.
				signature_centered_r_frame.open();
		});
});

jQuery(document).ready( function($){ "use strict";

	// Instantiates the variable that holds the media library frame.
		var signature_events_image_1_frame;

		// Runs when the image button is clicked.
		$('#signature-events-image-1-button').click(function(e){

				// Prevents the default action from occuring.
				e.preventDefault();

				// If the frame already exists, re-open it.
				if ( signature_events_image_1_frame ) {
						signature_events_image_1_frame.open();
						return;
				}

				// Sets up the media library frame
				signature_events_image_1_frame = wp.media.frames.signature_events_image_1_frame = wp.media({
						title: meta_image.title,
						button: { text:  meta_image.button },
						library: { type: 'image' }
				});

				// Runs when an image is selected.
				signature_events_image_1_frame.on('select', function(){

						// Grabs the attachment selection and creates a JSON representation of the model.
						var media_attachment = signature_events_image_1_frame.state().get('selection').first().toJSON();

						// Sends the attachment URL to our custom image input field.
						$('#signature-events-image-1').val(media_attachment.url);
				});

				// Opens the media library frame.
				signature_events_image_1_frame.open();
		});

// Instantiates the variable that holds the media library frame.
		var signature_events_image_2_frame;

		// Runs when the image button is clicked.
		$('#signature-events-image-2-button').click(function(e){

				// Prevents the default action from occuring.
				e.preventDefault();

				// If the frame already exists, re-open it.
				if ( signature_events_image_2_frame ) {
						signature_events_image_2_frame.open();
						return;
				}

				// Sets up the media library frame
				signature_events_image_2_frame = wp.media.frames.signature_events_image_2_frame = wp.media({
						title: meta_image.title,
						button: { text:  meta_image.button },
						library: { type: 'image' }
				});

				// Runs when an image is selected.
				signature_events_image_2_frame.on('select', function(){

						// Grabs the attachment selection and creates a JSON representation of the model.
						var media_attachment = signature_events_image_2_frame.state().get('selection').first().toJSON();

						// Sends the attachment URL to our custom image input field.
						$('#signature-events-image-2').val(media_attachment.url);
				});

				// Opens the media library frame.
				signature_events_image_2_frame.open();
		});
});

jQuery(document).ready( function($){ "use strict";

    // Instantiates the variable that holds the media library frame.
    var sections_hero_frame;

    // Runs when the image button is clicked.
    $('#sections-hero-image-button').click(function(e){

        // Prevents the default action from occuring.
        e.preventDefault();

        // If the frame already exists, re-open it.
        if ( sections_hero_frame ) {
            sections_hero_frame.open();
            return;
        }

        // Sets up the media library frame
        sections_hero_frame = wp.media.frames.sections_hero_frame = wp.media({
            title: meta_image.title,
            button: { text:  meta_image.button },
            library: { type: 'image' }
        });

        // Runs when an image is selected.
        sections_hero_frame.on('select', function(){

            // Grabs the attachment selection and creates a JSON representation of the model.
            var media_attachment = sections_hero_frame.state().get('selection').first().toJSON();

            // Sends the attachment URL to our custom image input field.
            $('#sections-hero-image').val(media_attachment.url);
        });

        // Opens the media library frame.
        sections_hero_frame.open();
    });

// Instantiates the variable that holds the media library frame.
		var sections_logo_frame;

		// Runs when the image button is clicked.
		$('#sections-logo-button').click(function(e){

				// Prevents the default action from occuring.
				e.preventDefault();

				// If the frame already exists, re-open it.
				if ( sections_logo_frame ) {
						sections_logo_frame.open();
						return;
				}

				// Sets up the media library frame
				sections_logo_frame = wp.media.frames.sections_logo_frame = wp.media({
						title: meta_image.title,
						button: { text:  meta_image.button },
						library: { type: 'image' }
				});

				// Runs when an image is selected.
				sections_logo_frame.on('select', function(){

						// Grabs the attachment selection and creates a JSON representation of the model.
						var media_attachment = sections_logo_frame.state().get('selection').first().toJSON();

						// Sends the attachment URL to our custom image input field.
						$('#sections-logo').val(media_attachment.url);
				});

				// Opens the media library frame.
				sections_logo_frame.open();
		});
});

jQuery(document).ready( function($){ "use strict";

// Instantiates the variable that holds the media library frame.
		var sections_csel_1_img_frame;

		// Runs when the image button is clicked.
		$('#sections-csel-1-img-button').click(function(e){

				// Prevents the default action from occuring.
				e.preventDefault();

				// If the frame already exists, re-open it.
				if ( sections_csel_1_img_frame ) {
						sections_csel_1_img_frame.open();
						return;
				}

				// Sets up the media library frame
				sections_csel_1_img_frame = wp.media.frames.sections_csel_1_img_frame = wp.media({
						title: meta_image.title,
						button: { text:  meta_image.button },
						library: { type: 'image' }
				});

				// Runs when an image is selected.
				sections_csel_1_img_frame.on('select', function(){

						// Grabs the attachment selection and creates a JSON representation of the model.
						var media_attachment = sections_csel_1_img_frame.state().get('selection').first().toJSON();

						// Sends the attachment URL to our custom image input field.
						$('#sections-csel-1-img').val(media_attachment.url);
				});

				// Opens the media library frame.
				sections_csel_1_img_frame.open();
		});
});

jQuery(document).ready( function($){ "use strict";

// Instantiates the variable that holds the media library frame.
		var sections_csel_2_img_frame;

		// Runs when the image button is clicked.
		$('#sections-csel-2-img-button').click(function(e){

				// Prevents the default action from occuring.
				e.preventDefault();

				// If the frame already exists, re-open it.
				if ( sections_csel_2_img_frame ) {
						sections_csel_2_img_frame.open();
						return;
				}

				// Sets up the media library frame
				sections_csel_2_img_frame = wp.media.frames.sections_csel_2_img_frame = wp.media({
						title: meta_image.title,
						button: { text:  meta_image.button },
						library: { type: 'image' }
				});

				// Runs when an image is selected.
				sections_csel_2_img_frame.on('select', function(){

						// Grabs the attachment selection and creates a JSON representation of the model.
						var media_attachment = sections_csel_2_img_frame.state().get('selection').first().toJSON();

						// Sends the attachment URL to our custom image input field.
						$('#sections-csel-2-img').val(media_attachment.url);
				});

				// Opens the media library frame.
				sections_csel_2_img_frame.open();
		});
});

jQuery(document).ready( function($){ "use strict";

// Instantiates the variable that holds the media library frame.
		var sections_csel_3_img_frame;

		// Runs when the image button is clicked.
		$('#sections-csel-3-img-button').click(function(e){

				// Prevents the default action from occuring.
				e.preventDefault();

				// If the frame already exists, re-open it.
				if ( sections_csel_3_img_frame ) {
						sections_csel_3_img_frame.open();
						return;
				}

				// Sets up the media library frame
				sections_csel_3_img_frame = wp.media.frames.sections_csel_3_img_frame = wp.media({
						title: meta_image.title,
						button: { text:  meta_image.button },
						library: { type: 'image' }
				});

				// Runs when an image is selected.
				sections_csel_3_img_frame.on('select', function(){

						// Grabs the attachment selection and creates a JSON representation of the model.
						var media_attachment = sections_csel_3_img_frame.state().get('selection').first().toJSON();

						// Sends the attachment URL to our custom image input field.
						$('#sections-csel-3-img').val(media_attachment.url);
				});

				// Opens the media library frame.
				sections_csel_3_img_frame.open();
		});
});

jQuery(document).ready( function($){ "use strict";

// Instantiates the variable that holds the media library frame.
		var sections_csel_4_img_frame;

		// Runs when the image button is clicked.
		$('#sections-csel-4-img-button').click(function(e){

				// Prevents the default action from occuring.
				e.preventDefault();

				// If the frame already exists, re-open it.
				if ( sections_csel_4_img_frame ) {
						sections_csel_4_img_frame.open();
						return;
				}

				// Sets up the media library frame
				sections_csel_4_img_frame = wp.media.frames.sections_csel_4_img_frame = wp.media({
						title: meta_image.title,
						button: { text:  meta_image.button },
						library: { type: 'image' }
				});

				// Runs when an image is selected.
				sections_csel_4_img_frame.on('select', function(){

						// Grabs the attachment selection and creates a JSON representation of the model.
						var media_attachment = sections_csel_4_img_frame.state().get('selection').first().toJSON();

						// Sends the attachment URL to our custom image input field.
						$('#sections-csel-4-img').val(media_attachment.url);
				});

				// Opens the media library frame.
				sections_csel_4_img_frame.open();
		});
});

jQuery(document).ready( function($){ "use strict";

// Instantiates the variable that holds the media library frame.
		var sections_csel_5_img_frame;

		// Runs when the image button is clicked.
		$('#sections-csel-5-img-button').click(function(e){

				// Prevents the default action from occuring.
				e.preventDefault();

				// If the frame already exists, re-open it.
				if ( sections_csel_5_img_frame ) {
						sections_csel_5_img_frame.open();
						return;
				}

				// Sets up the media library frame
				sections_csel_5_img_frame = wp.media.frames.sections_csel_5_img_frame = wp.media({
						title: meta_image.title,
						button: { text:  meta_image.button },
						library: { type: 'image' }
				});

				// Runs when an image is selected.
				sections_csel_5_img_frame.on('select', function(){

						// Grabs the attachment selection and creates a JSON representation of the model.
						var media_attachment = sections_csel_5_img_frame.state().get('selection').first().toJSON();

						// Sends the attachment URL to our custom image input field.
						$('#sections-csel-5-img').val(media_attachment.url);
				});

				// Opens the media library frame.
				sections_csel_5_img_frame.open();
		});
});

jQuery(document).ready( function($){ "use strict";

// Instantiates the variable that holds the media library frame.
		var sections_csel_6_img_frame;

		// Runs when the image button is clicked.
		$('#sections-csel-6-img-button').click(function(e){

				// Prevents the default action from occuring.
				e.preventDefault();

				// If the frame already exists, re-open it.
				if ( sections_csel_6_img_frame ) {
						sections_csel_6_img_frame.open();
						return;
				}

				// Sets up the media library frame
				sections_csel_6_img_frame = wp.media.frames.sections_csel_6_img_frame = wp.media({
						title: meta_image.title,
						button: { text:  meta_image.button },
						library: { type: 'image' }
				});

				// Runs when an image is selected.
				sections_csel_6_img_frame.on('select', function(){

						// Grabs the attachment selection and creates a JSON representation of the model.
						var media_attachment = sections_csel_6_img_frame.state().get('selection').first().toJSON();

						// Sends the attachment URL to our custom image input field.
						$('#sections-csel-6-img').val(media_attachment.url);
				});

				// Opens the media library frame.
				sections_csel_6_img_frame.open();
		});
});

jQuery(document).ready( function($){ "use strict";

// Instantiates the variable that holds the media library frame.
		var sections_1_image_frame;

		// Runs when the image button is clicked.
		$('#sections-1-image-button').click(function(e){

				// Prevents the default action from occuring.
				e.preventDefault();

				// If the frame already exists, re-open it.
				if ( sections_1_image_frame ) {
						sections_1_image_frame.open();
						return;
				}

				// Sets up the media library frame
				sections_1_image_frame = wp.media.frames.sections_1_image_frame = wp.media({
						title: meta_image.title,
						button: { text:  meta_image.button },
						library: { type: 'image' }
				});

				// Runs when an image is selected.
				sections_1_image_frame.on('select', function(){

						// Grabs the attachment selection and creates a JSON representation of the model.
						var media_attachment = sections_1_image_frame.state().get('selection').first().toJSON();

						// Sends the attachment URL to our custom image input field.
						$('#sections-1-image').val(media_attachment.url);
				});

				// Opens the media library frame.
				sections_1_image_frame.open();
		});
});

jQuery(document).ready( function($){ "use strict";

// Instantiates the variable that holds the media library frame.
		var sections_2_image_frame;

		// Runs when the image button is clicked.
		$('#sections-2-image-button').click(function(e){

				// Prevents the default action from occuring.
				e.preventDefault();

				// If the frame already exists, re-open it.
				if ( sections_2_image_frame ) {
						sections_2_image_frame.open();
						return;
				}

				// Sets up the media library frame
				sections_2_image_frame = wp.media.frames.sections_2_image_frame = wp.media({
						title: meta_image.title,
						button: { text:  meta_image.button },
						library: { type: 'image' }
				});

				// Runs when an image is selected.
				sections_2_image_frame.on('select', function(){

						// Grabs the attachment selection and creates a JSON representation of the model.
						var media_attachment = sections_2_image_frame.state().get('selection').first().toJSON();

						// Sends the attachment URL to our custom image input field.
						$('#sections-2-image').val(media_attachment.url);
				});

				// Opens the media library frame.
				sections_2_image_frame.open();
		});
});

jQuery(document).ready( function($){ "use strict";

// Instantiates the variable that holds the media library frame.
		var sections_3_image_frame;

		// Runs when the image button is clicked.
		$('#sections-3-image-button').click(function(e){

				// Prevents the default action from occuring.
				e.preventDefault();

				// If the frame already exists, re-open it.
				if ( sections_3_image_frame ) {
						sections_3_image_frame.open();
						return;
				}

				// Sets up the media library frame
				sections_3_image_frame = wp.media.frames.sections_3_image_frame = wp.media({
						title: meta_image.title,
						button: { text:  meta_image.button },
						library: { type: 'image' }
				});

				// Runs when an image is selected.
				sections_3_image_frame.on('select', function(){

						// Grabs the attachment selection and creates a JSON representation of the model.
						var media_attachment = sections_3_image_frame.state().get('selection').first().toJSON();

						// Sends the attachment URL to our custom image input field.
						$('#sections-3-image').val(media_attachment.url);
				});

				// Opens the media library frame.
				sections_3_image_frame.open();
		});
});

jQuery(document).ready( function($){ "use strict";

// Instantiates the variable that holds the media library frame.
		var sections_4_image_frame;

		// Runs when the image button is clicked.
		$('#sections-4-image-button').click(function(e){

				// Prevents the default action from occuring.
				e.preventDefault();

				// If the frame already exists, re-open it.
				if ( sections_4_image_frame ) {
						sections_4_image_frame.open();
						return;
				}

				// Sets up the media library frame
				sections_4_image_frame = wp.media.frames.sections_4_image_frame = wp.media({
						title: meta_image.title,
						button: { text:  meta_image.button },
						library: { type: 'image' }
				});

				// Runs when an image is selected.
				sections_4_image_frame.on('select', function(){

						// Grabs the attachment selection and creates a JSON representation of the model.
						var media_attachment = sections_4_image_frame.state().get('selection').first().toJSON();

						// Sends the attachment URL to our custom image input field.
						$('#sections-4-image').val(media_attachment.url);
				});

				// Opens the media library frame.
				sections_4_image_frame.open();
		});
});

jQuery(document).ready( function($){ "use strict";

// Instantiates the variable that holds the media library frame.
		var sections_5_image_frame;

		// Runs when the image button is clicked.
		$('#sections-5-image-button').click(function(e){

				// Prevents the default action from occuring.
				e.preventDefault();

				// If the frame already exists, re-open it.
				if ( sections_5_image_frame ) {
						sections_5_image_frame.open();
						return;
				}

				// Sets up the media library frame
				sections_5_image_frame = wp.media.frames.sections_5_image_frame = wp.media({
						title: meta_image.title,
						button: { text:  meta_image.button },
						library: { type: 'image' }
				});

				// Runs when an image is selected.
				sections_5_image_frame.on('select', function(){

						// Grabs the attachment selection and creates a JSON representation of the model.
						var media_attachment = sections_5_image_frame.state().get('selection').first().toJSON();

						// Sends the attachment URL to our custom image input field.
						$('#sections-5-image').val(media_attachment.url);
				});

				// Opens the media library frame.
				sections_5_image_frame.open();
		});
});

jQuery(document).ready( function($){ "use strict";

// Instantiates the variable that holds the media library frame.
		var sections_6_image_frame;

		// Runs when the image button is clicked.
		$('#sections-6-image-button').click(function(e){

				// Prevents the default action from occuring.
				e.preventDefault();

				// If the frame already exists, re-open it.
				if ( sections_6_image_frame ) {
						sections_6_image_frame.open();
						return;
				}

				// Sets up the media library frame
				sections_6_image_frame = wp.media.frames.sections_6_image_frame = wp.media({
						title: meta_image.title,
						button: { text:  meta_image.button },
						library: { type: 'image' }
				});

				// Runs when an image is selected.
				sections_6_image_frame.on('select', function(){

						// Grabs the attachment selection and creates a JSON representation of the model.
						var media_attachment = sections_6_image_frame.state().get('selection').first().toJSON();

						// Sends the attachment URL to our custom image input field.
						$('#sections-6-image').val(media_attachment.url);
				});

				// Opens the media library frame.
				sections_6_image_frame.open();
		});
});

jQuery(document).ready( function($){ "use strict";

// Instantiates the variable that holds the media library frame.
		var sections_7_image_frame;

		// Runs when the image button is clicked.
		$('#sections-7-image-button').click(function(e){

				// Prevents the default action from occuring.
				e.preventDefault();

				// If the frame already exists, re-open it.
				if ( sections_7_image_frame ) {
						sections_7_image_frame.open();
						return;
				}

				// Sets up the media library frame
				sections_7_image_frame = wp.media.frames.sections_7_image_frame = wp.media({
						title: meta_image.title,
						button: { text:  meta_image.button },
						library: { type: 'image' }
				});

				// Runs when an image is selected.
				sections_7_image_frame.on('select', function(){

						// Grabs the attachment selection and creates a JSON representation of the model.
						var media_attachment = sections_7_image_frame.state().get('selection').first().toJSON();

						// Sends the attachment URL to our custom image input field.
						$('#sections-7-image').val(media_attachment.url);
				});

				// Opens the media library frame.
				sections_7_image_frame.open();
		});
});

jQuery(document).ready( function($){ "use strict";

// Instantiates the variable that holds the media library frame.
		var sections_8_image_frame;

		// Runs when the image button is clicked.
		$('#sections-8-image-button').click(function(e){

				// Prevents the default action from occuring.
				e.preventDefault();

				// If the frame already exists, re-open it.
				if ( sections_8_image_frame ) {
						sections_8_image_frame.open();
						return;
				}

				// Sets up the media library frame
				sections_8_image_frame = wp.media.frames.sections_8_image_frame = wp.media({
						title: meta_image.title,
						button: { text:  meta_image.button },
						library: { type: 'image' }
				});

				// Runs when an image is selected.
				sections_8_image_frame.on('select', function(){

						// Grabs the attachment selection and creates a JSON representation of the model.
						var media_attachment = sections_8_image_frame.state().get('selection').first().toJSON();

						// Sends the attachment URL to our custom image input field.
						$('#sections-8-image').val(media_attachment.url);
				});

				// Opens the media library frame.
				sections_8_image_frame.open();
		});
});

jQuery(document).ready( function($){ "use strict";

// Instantiates the variable that holds the media library frame.
		var sections_9_image_frame;

		// Runs when the image button is clicked.
		$('#sections-9-image-button').click(function(e){

				// Prevents the default action from occuring.
				e.preventDefault();

				// If the frame already exists, re-open it.
				if ( sections_9_image_frame ) {
						sections_9_image_frame.open();
						return;
				}

				// Sets up the media library frame
				sections_9_image_frame = wp.media.frames.sections_9_image_frame = wp.media({
						title: meta_image.title,
						button: { text:  meta_image.button },
						library: { type: 'image' }
				});

				// Runs when an image is selected.
				sections_9_image_frame.on('select', function(){

						// Grabs the attachment selection and creates a JSON representation of the model.
						var media_attachment = sections_9_image_frame.state().get('selection').first().toJSON();

						// Sends the attachment URL to our custom image input field.
						$('#sections-9-image').val(media_attachment.url);
				});

				// Opens the media library frame.
				sections_9_image_frame.open();
		});
});

jQuery(document).ready( function($){ "use strict";

// Instantiates the variable that holds the media library frame.
		var sections_10_image_frame;

		// Runs when the image button is clicked.
		$('#sections-10-image-button').click(function(e){

				// Prevents the default action from occuring.
				e.preventDefault();

				// If the frame already exists, re-open it.
				if ( sections_10_image_frame ) {
						sections_10_image_frame.open();
						return;
				}

				// Sets up the media library frame
				sections_10_image_frame = wp.media.frames.sections_10_image_frame = wp.media({
						title: meta_image.title,
						button: { text:  meta_image.button },
						library: { type: 'image' }
				});

				// Runs when an image is selected.
				sections_10_image_frame.on('select', function(){

						// Grabs the attachment selection and creates a JSON representation of the model.
						var media_attachment = sections_10_image_frame.state().get('selection').first().toJSON();

						// Sends the attachment URL to our custom image input field.
						$('#sections-10-image').val(media_attachment.url);
				});

				// Opens the media library frame.
				sections_10_image_frame.open();
		});
});

jQuery(document).ready( function($){ "use strict";

// Instantiates the variable that holds the media library frame.
		var flippage1_image_frame;

		// Runs when the image button is clicked.
		$('#flippage1-image-button').click(function(e){

				// Prevents the default action from occuring.
				e.preventDefault();

				// If the frame already exists, re-open it.
				if ( flippage1_image_frame ) {
						flippage1_image_frame.open();
						return;
				}

				// Sets up the media library frame
				flippage1_image_frame = wp.media.frames.flippage1_image_frame = wp.media({
						title: meta_image.title,
						button: { text:  meta_image.button },
						library: { type: 'image' }
				});

				// Runs when an image is selected.
				flippage1_image_frame.on('select', function(){

						// Grabs the attachment selection and creates a JSON representation of the model.
						var media_attachment = flippage1_image_frame.state().get('selection').first().toJSON();

						// Sends the attachment URL to our custom image input field.
						$('#flippage1-image').val(media_attachment.url);
				});

				// Opens the media library frame.
				flippage1_image_frame.open();
		});
});

jQuery(document).ready( function($){ "use strict";

// Instantiates the variable that holds the media library frame.
		var flippage2_image_frame;

		// Runs when the image button is clicked.
		$('#flippage2-image-button').click(function(e){

				// Prevents the default action from occuring.
				e.preventDefault();

				// If the frame already exists, re-open it.
				if ( flippage2_image_frame ) {
						flippage2_image_frame.open();
						return;
				}

				// Sets up the media library frame
				flippage2_image_frame = wp.media.frames.flippage2_image_frame = wp.media({
						title: meta_image.title,
						button: { text:  meta_image.button },
						library: { type: 'image' }
				});

				// Runs when an image is selected.
				flippage2_image_frame.on('select', function(){

						// Grabs the attachment selection and creates a JSON representation of the model.
						var media_attachment = flippage2_image_frame.state().get('selection').first().toJSON();

						// Sends the attachment URL to our custom image input field.
						$('#flippage2-image').val(media_attachment.url);
				});

				// Opens the media library frame.
				flippage2_image_frame.open();
		});
});

jQuery(document).ready( function($){ "use strict";

// Instantiates the variable that holds the media library frame.
		var flippage3_image_frame;

		// Runs when the image button is clicked.
		$('#flippage3-image-button').click(function(e){

				// Prevents the default action from occuring.
				e.preventDefault();

				// If the frame already exists, re-open it.
				if ( flippage3_image_frame ) {
						flippage3_image_frame.open();
						return;
				}

				// Sets up the media library frame
				flippage3_image_frame = wp.media.frames.flippage3_image_frame = wp.media({
						title: meta_image.title,
						button: { text:  meta_image.button },
						library: { type: 'image' }
				});

				// Runs when an image is selected.
				flippage3_image_frame.on('select', function(){

						// Grabs the attachment selection and creates a JSON representation of the model.
						var media_attachment = flippage3_image_frame.state().get('selection').first().toJSON();

						// Sends the attachment URL to our custom image input field.
						$('#flippage3-image').val(media_attachment.url);
				});

				// Opens the media library frame.
				flippage3_image_frame.open();
		});
});

jQuery(document).ready( function($){ "use strict";

// Instantiates the variable that holds the media library frame.
		var flippage4_image_frame;

		// Runs when the image button is clicked.
		$('#flippage4-image-button').click(function(e){

				// Prevents the default action from occuring.
				e.preventDefault();

				// If the frame already exists, re-open it.
				if ( flippage4_image_frame ) {
						flippage4_image_frame.open();
						return;
				}

				// Sets up the media library frame
				flippage4_image_frame = wp.media.frames.flippage4_image_frame = wp.media({
						title: meta_image.title,
						button: { text:  meta_image.button },
						library: { type: 'image' }
				});

				// Runs when an image is selected.
				flippage4_image_frame.on('select', function(){

						// Grabs the attachment selection and creates a JSON representation of the model.
						var media_attachment = flippage4_image_frame.state().get('selection').first().toJSON();

						// Sends the attachment URL to our custom image input field.
						$('#flippage4-image').val(media_attachment.url);
				});

				// Opens the media library frame.
				flippage4_image_frame.open();
		});
});

jQuery(document).ready( function($){ "use strict";

var outfitters_blog_logo_frame;

// Runs when the image button is clicked.
$('#outfitters-blog-logo-button').click(function(e){

    // Prevents the default action from occuring.
    e.preventDefault();

    // If the frame already exists, re-open it.
    if ( outfitters_blog_logo_frame ) {
        outfitters_blog_logo_frame.open();
        return;
    }

    // Sets up the media library frame
    outfitters_blog_logo_frame = wp.media.frames.outfitters_blog_logo_frame = wp.media({
        title: meta_image.title,
        button: { text:  meta_image.button },
        library: { type: 'image' }
    });

    // Runs when an image is selected.
    outfitters_blog_logo_frame.on('select', function(){

        // Grabs the attachment selection and creates a JSON representation of the model.
        var media_attachment = outfitters_blog_logo_frame.state().get('selection').first().toJSON();

        // Sends the attachment URL to our custom image input field.
        $('#outfitters-blog-logo').val(media_attachment.url);

        // Update the preview
        updateImagePreview('outfitters-blog-logo', media_attachment.url);
    });

    // Opens the media library frame.
    outfitters_blog_logo_frame.open();
});
// Remove image functionality
    $(document).on('click', '#outfitters-blog-logo-remove', function(e) {
        e.preventDefault();
        $('#outfitters-blog-logo').val('');
        $('#outfitters-blog-logo-preview').html('');
    });

    // Function to update image preview
    function updateImagePreview(fieldId, imageUrl) {
        var previewContainer = $('#' + fieldId + '-preview');
        var previewHtml = '<img src="' + imageUrl + '" style="max-width: 250px; max-height: 250px; border: 1px solid #ddd; padding: 5px;" alt="Preview" />' +
            '<br><button type="button" id="' + fieldId + '-remove" class="button" style="margin-top: 5px;">Remove Image</button>';
        previewContainer.html(previewHtml);
    }
});

jQuery(document).ready( function($){ "use strict";

// Instantiates the variable that holds the media library frame.
    var newstemplate_image_frame;

    // Runs when the image button is clicked.
    $('#news-template-logo-button').click(function(e){

        // Prevents the default action from occuring.
        e.preventDefault();

        // If the frame already exists, re-open it.
        if ( newstemplate_image_frame ) {
            newstemplate_image_frame.open();
            return;
        }

        // Sets up the media library frame
        newstemplate_image_frame = wp.media.frames.newstemplate_image_frame = wp.media({
            title: meta_image.title,
            button: { text:  meta_image.button },
            library: { type: 'image' }
        });

        // Runs when an image is selected.
        newstemplate_image_frame.on('select', function(){

            // Grabs the attachment selection and creates a JSON representation of the model.
            var media_attachment = newstemplate_image_frame.state().get('selection').first().toJSON();

            // Sends the attachment URL to our custom image input field.
            $('#news-template-logo').val(media_attachment.url);
        });

        // Opens the media library frame.
        newstemplate_image_frame.open();
    });
});

jQuery(document).ready( function($){ "use strict";

// Instantiates the variable that holds the media library frame.
    var read_more_image_one_image_frame;

    // Runs when the image button is clicked.
    $('#read-more-image-one-button').click(function(e){

        // Prevents the default action from occuring.
        e.preventDefault();

        // If the frame already exists, re-open it.
        if ( read_more_image_one_image_frame ) {
            read_more_image_one_image_frame.open();
            return;
        }

        // Sets up the media library frame
        read_more_image_one_image_frame = wp.media.frames.read_more_image_one_image_frame = wp.media({
            title: meta_image.title,
            button: { text:  meta_image.button },
            library: { type: 'image' }
        });

        // Runs when an image is selected.
        read_more_image_one_image_frame.on('select', function(){

            // Grabs the attachment selection and creates a JSON representation of the model.
            var media_attachment = read_more_image_one_image_frame.state().get('selection').first().toJSON();

            // Sends the attachment URL to our custom image input field.
            $('#read-more-image-one').val(media_attachment.url);
        });

        // Opens the media library frame.
        read_more_image_one_image_frame.open();
    });
});

jQuery(document).ready( function($){ "use strict";

// Instantiates the variable that holds the media library frame.
    var read_more_image_two_image_frame;

    // Runs when the image button is clicked.
    $('#read-more-image-two-button').click(function(e){

        // Prevents the default action from occuring.
        e.preventDefault();

        // If the frame already exists, re-open it.
        if ( read_more_image_two_image_frame ) {
            read_more_image_two_image_frame.open();
            return;
        }

        // Sets up the media library frame
        read_more_image_two_image_frame = wp.media.frames.read_more_image_two_image_frame = wp.media({
            title: meta_image.title,
            button: { text:  meta_image.button },
            library: { type: 'image' }
        });

        // Runs when an image is selected.
        read_more_image_two_image_frame.on('select', function(){

            // Grabs the attachment selection and creates a JSON representation of the model.
            var media_attachment = read_more_image_two_image_frame.state().get('selection').first().toJSON();

            // Sends the attachment URL to our custom image input field.
            $('#read-more-image-two').val(media_attachment.url);
        });

        // Opens the media library frame.
        read_more_image_two_image_frame.open();
    });
});

jQuery(document).ready( function($){ "use strict";

// Instantiates the variable that holds the media library frame.
    var read_more_image_three_image_frame;

    // Runs when the image button is clicked.
    $('#read-more-image-three-button').click(function(e){

        // Prevents the default action from occuring.
        e.preventDefault();

        // If the frame already exists, re-open it.
        if ( read_more_image_three_image_frame ) {
            read_more_image_three_image_frame.open();
            return;
        }

        // Sets up the media library frame
        read_more_image_three_image_frame = wp.media.frames.read_more_image_three_image_frame = wp.media({
            title: meta_image.title,
            button: { text:  meta_image.button },
            library: { type: 'image' }
        });

        // Runs when an image is selected.
        read_more_image_three_image_frame.on('select', function(){

            // Grabs the attachment selection and creates a JSON representation of the model.
            var media_attachment = read_more_image_three_image_frame.state().get('selection').first().toJSON();

            // Sends the attachment URL to our custom image input field.
            $('#read-more-image-three').val(media_attachment.url);
        });

        // Opens the media library frame.
        read_more_image_three_image_frame.open();
    });
});

jQuery(document).ready( function($){ "use strict";

// Instantiates the variable that holds the media library frame.
    var read_more_image_four_image_frame;

    // Runs when the image button is clicked.
    $('#read-more-image-four-button').click(function(e){

        // Prevents the default action from occuring.
        e.preventDefault();

        // If the frame already exists, re-open it.
        if ( read_more_image_four_image_frame ) {
            read_more_image_four_image_frame.open();
            return;
        }

        // Sets up the media library frame
        read_more_image_four_image_frame = wp.media.frames.read_more_image_four_image_frame = wp.media({
            title: meta_image.title,
            button: { text:  meta_image.button },
            library: { type: 'image' }
        });

        // Runs when an image is selected.
        read_more_image_four_image_frame.on('select', function(){

            // Grabs the attachment selection and creates a JSON representation of the model.
            var media_attachment = read_more_image_four_image_frame.state().get('selection').first().toJSON();

            // Sends the attachment URL to our custom image input field.
            $('#read-more-image-four').val(media_attachment.url);
        });

        // Opens the media library frame.
        read_more_image_four_image_frame.open();
    });
});

jQuery(document).ready( function($){ "use strict";

// Instantiates the variable that holds the media library frame.
    var read_more_image_five_image_frame;

    // Runs when the image button is clicked.
    $('#read-more-image-five-button').click(function(e){

        // Prevents the default action from occuring.
        e.preventDefault();

        // If the frame already exists, re-open it.
        if ( read_more_image_five_image_frame ) {
            read_more_image_five_image_frame.open();
            return;
        }

        // Sets up the media library frame
        read_more_image_five_image_frame = wp.media.frames.read_more_image_five_image_frame = wp.media({
            title: meta_image.title,
            button: { text:  meta_image.button },
            library: { type: 'image' }
        });

        // Runs when an image is selected.
        read_more_image_five_image_frame.on('select', function(){

            // Grabs the attachment selection and creates a JSON representation of the model.
            var media_attachment = read_more_image_five_image_frame.state().get('selection').first().toJSON();

            // Sends the attachment URL to our custom image input field.
            $('#read-more-image-five').val(media_attachment.url);
        });

        // Opens the media library frame.
        read_more_image_five_image_frame.open();
    });
});

jQuery(document).ready( function($){ "use strict";

// Instantiates the variable that holds the media library frame.
    var prime_travel_logo_image_frame;

    // Runs when the image button is clicked.
    $('#prime-travel-logo-button').click(function(e){

        // Prevents the default action from occuring.
        e.preventDefault();

        // If the frame already exists, re-open it.
        if ( prime_travel_logo_image_frame ) {
            prime_travel_logo_image_frame.open();
            return;
        }

        // Sets up the media library frame
        prime_travel_logo_image_frame = wp.media.frames.prime_travel_logo_image_frame = wp.media({
            title: meta_image.title,
            button: { text:  meta_image.button },
            library: { type: 'image' }
        });

        // Runs when an image is selected.
        prime_travel_logo_image_frame.on('select', function(){

            // Grabs the attachment selection and creates a JSON representation of the model.
            var media_attachment = prime_travel_logo_image_frame.state().get('selection').first().toJSON();

            // Sends the attachment URL to our custom image input field.
            $('#prime-travel-logo').val(media_attachment.url);
        });

        // Opens the media library frame.
        prime_travel_logo_image_frame.open();
    });
});

jQuery(document).ready( function($){ "use strict";

// Instantiates the variable that holds the media library frame.
    var prime_travel_header_image_frame;

    // Runs when the image button is clicked.
    $('#prime-travel-header-image-button').click(function(e){

        // Prevents the default action from occuring.
        e.preventDefault();

        // If the frame already exists, re-open it.
        if ( prime_travel_header_image_frame ) {
            prime_travel_header_image_frame.open();
            return;
        }

        // Sets up the media library frame
        prime_travel_header_image_frame = wp.media.frames.prime_travel_header_image_frame = wp.media({
            title: meta_image.title,
            button: { text:  meta_image.button },
            library: { type: 'image' }
        });

        // Runs when an image is selected.
        prime_travel_header_image_frame.on('select', function(){

            // Grabs the attachment selection and creates a JSON representation of the model.
            var media_attachment = prime_travel_header_image_frame.state().get('selection').first().toJSON();

            // Sends the attachment URL to our custom image input field.
            $('#prime-travel-header-image').val(media_attachment.url);
        });

        // Opens the media library frame.
        prime_travel_header_image_frame.open();
    });
});

jQuery(document).ready( function($){ "use strict";

// Instantiates the variable that holds the media library frame.
    var hero_temp_header_image_frame;

    // Runs when the image button is clicked.
    $('#hero-temp-image-button').click(function(e){

        // Prevents the default action from occuring.
        e.preventDefault();

        // If the frame already exists, re-open it.
        if ( hero_temp_header_image_frame ) {
            hero_temp_header_image_frame.open();
            return;
        }

        // Sets up the media library frame
        hero_temp_header_image_frame = wp.media.frames.hero_temp_header_image_frame = wp.media({
            title: meta_image.title,
            button: { text:  meta_image.button },
            library: { type: 'image' }
        });

        // Runs when an image is selected.
        hero_temp_header_image_frame.on('select', function(){

            // Grabs the attachment selection and creates a JSON representation of the model.
            var media_attachment = hero_temp_header_image_frame.state().get('selection').first().toJSON();

            // Sends the attachment URL to our custom image input field.
            $('#hero-temp-image').val(media_attachment.url);
        });

        // Opens the media library frame.
        hero_temp_header_image_frame.open();
    });
});


jQuery(document).ready( function($){ "use strict";

// Instantiates the variable that holds the media library frame.
    var pdf_upload_travel_1_image_frame;

    // Runs when the image button is clicked.
    $('#travel-pdf-upload-1-button').click(function(e){

        // Prevents the default action from occuring.
        e.preventDefault();

        // If the frame already exists, re-open it.
        if ( pdf_upload_travel_1_image_frame ) {
            pdf_upload_travel_1_image_frame.open();
            return;
        }

        // Sets up the media library frame
        pdf_upload_travel_1_image_frame = wp.media.frames.pdf_upload_travel_1_image_frame = wp.media({
            title: meta_image.title,
            button: { text:  meta_image.button },
            /*library: { type: 'image' }*/
        });

        // Runs when an image is selected.
        pdf_upload_travel_1_image_frame.on('select', function(){

            // Grabs the attachment selection and creates a JSON representation of the model.
            var media_attachment = pdf_upload_travel_1_image_frame.state().get('selection').first().toJSON();

            // Sends the attachment URL to our custom image input field.
            $('#travel-pdf-upload-1').val(media_attachment.url);
        });

        // Opens the media library frame.
        pdf_upload_travel_1_image_frame.open();
    });

    // Instantiates the variable that holds the media library frame.
    var pdf_upload_travel_2_image_frame;

    // Runs when the image button is clicked.
    $('#travel-pdf-upload-2-button').click(function(e){

        // Prevents the default action from occuring.
        e.preventDefault();

        // If the frame already exists, re-open it.
        if ( pdf_upload_travel_2_image_frame ) {
            pdf_upload_travel_2_image_frame.open();
            return;
        }

        // Sets up the media library frame
        pdf_upload_travel_2_image_frame = wp.media.frames.pdf_upload_travel_2_image_frame = wp.media({
            title: meta_image.title,
            button: { text:  meta_image.button },
            /*library: { type: 'image' }*/
        });

        // Runs when an image is selected.
        pdf_upload_travel_2_image_frame.on('select', function(){

            // Grabs the attachment selection and creates a JSON representation of the model.
            var media_attachment = pdf_upload_travel_2_image_frame.state().get('selection').first().toJSON();

            // Sends the attachment URL to our custom image input field.
            $('#travel-pdf-upload-2').val(media_attachment.url);
        });

        // Opens the media library frame.
        pdf_upload_travel_2_image_frame.open();
    });

    // Instantiates the variable that holds the media library frame.
    var pdf_upload_travel_3_image_frame;

    // Runs when the image button is clicked.
    $('#travel-pdf-upload-3-button').click(function(e){

        // Prevents the default action from occuring.
        e.preventDefault();

        // If the frame already exists, re-open it.
        if ( pdf_upload_travel_3_image_frame ) {
            pdf_upload_travel_3_image_frame.open();
            return;
        }

        // Sets up the media library frame
        pdf_upload_travel_3_image_frame = wp.media.frames.pdf_upload_travel_3_image_frame = wp.media({
            title: meta_image.title,
            button: { text:  meta_image.button },
            /*library: { type: 'image' }*/
        });

        // Runs when an image is selected.
        pdf_upload_travel_3_image_frame.on('select', function(){

            // Grabs the attachment selection and creates a JSON representation of the model.
            var media_attachment = pdf_upload_travel_3_image_frame.state().get('selection').first().toJSON();

            // Sends the attachment URL to our custom image input field.
            $('#travel-pdf-upload-3').val(media_attachment.url);
        });

        // Opens the media library frame.
        pdf_upload_travel_3_image_frame.open();
    });

    // Instantiates the variable that holds the media library frame.
    var pdf_upload_travel_4_image_frame;

    // Runs when the image button is clicked.
    $('#travel-pdf-upload-4-button').click(function(e){

        // Prevents the default action from occuring.
        e.preventDefault();

        // If the frame already exists, re-open it.
        if ( pdf_upload_travel_4_image_frame ) {
            pdf_upload_travel_4_image_frame.open();
            return;
        }

        // Sets up the media library frame
        pdf_upload_travel_4_image_frame = wp.media.frames.pdf_upload_travel_4_image_frame = wp.media({
            title: meta_image.title,
            button: { text:  meta_image.button },
            /*library: { type: 'image' }*/
        });

        // Runs when an image is selected.
        pdf_upload_travel_4_image_frame.on('select', function(){

            // Grabs the attachment selection and creates a JSON representation of the model.
            var media_attachment = pdf_upload_travel_4_image_frame.state().get('selection').first().toJSON();

            // Sends the attachment URL to our custom image input field.
            $('#travel-pdf-upload-4').val(media_attachment.url);
        });

        // Opens the media library frame.
        pdf_upload_travel_4_image_frame.open();
    });

    // Instantiates the variable that holds the media library frame.
    var pdf_upload_travel_5_image_frame;

    // Runs when the image button is clicked.
    $('#travel-pdf-upload-5-button').click(function(e){

        // Prevents the default action from occuring.
        e.preventDefault();

        // If the frame already exists, re-open it.
        if ( pdf_upload_travel_5_image_frame ) {
            pdf_upload_travel_5_image_frame.open();
            return;
        }

        // Sets up the media library frame
        pdf_upload_travel_5_image_frame = wp.media.frames.pdf_upload_travel_5_image_frame = wp.media({
            title: meta_image.title,
            button: { text:  meta_image.button },
            /*library: { type: 'image' }*/
        });

        // Runs when an image is selected.
        pdf_upload_travel_5_image_frame.on('select', function(){

            // Grabs the attachment selection and creates a JSON representation of the model.
            var media_attachment = pdf_upload_travel_5_image_frame.state().get('selection').first().toJSON();

            // Sends the attachment URL to our custom image input field.
            $('#travel-pdf-upload-5').val(media_attachment.url);
        });

        // Opens the media library frame.
        pdf_upload_travel_5_image_frame.open();
    });

    // Instantiates the variable that holds the media library frame.
    var pdf_upload_travel_6_image_frame;

    // Runs when the image button is clicked.
    $('#travel-pdf-upload-6-button').click(function(e){

        // Prevents the default action from occuring.
        e.preventDefault();

        // If the frame already exists, re-open it.
        if ( pdf_upload_travel_6_image_frame ) {
            pdf_upload_travel_6_image_frame.open();
            return;
        }

        // Sets up the media library frame
        pdf_upload_travel_6_image_frame = wp.media.frames.pdf_upload_travel_6_image_frame = wp.media({
            title: meta_image.title,
            button: { text:  meta_image.button },
            /*library: { type: 'image' }*/
        });

        // Runs when an image is selected.
        pdf_upload_travel_6_image_frame.on('select', function(){

            // Grabs the attachment selection and creates a JSON representation of the model.
            var media_attachment = pdf_upload_travel_6_image_frame.state().get('selection').first().toJSON();

            // Sends the attachment URL to our custom image input field.
            $('#travel-pdf-upload-6').val(media_attachment.url);
        });

        // Opens the media library frame.
        pdf_upload_travel_6_image_frame.open();
    });

    // Instantiates the variable that holds the media library frame.
    var travel_sidebar_img_upload_6_image_frame;

    // Runs when the image button is clicked.
    $('#travel-sidebar-img-upload-6-button').click(function(e){

        // Prevents the default action from occuring.
        e.preventDefault();

        // If the frame already exists, re-open it.
        if ( travel_sidebar_img_upload_6_image_frame ) {
            travel_sidebar_img_upload_6_image_frame.open();
            return;
        }

        // Sets up the media library frame
        travel_sidebar_img_upload_6_image_frame = wp.media.frames.travel_sidebar_img_upload_6_image_frame = wp.media({
            title: meta_image.title,
            button: { text:  meta_image.button },
            /*library: { type: 'image' }*/
        });

        // Runs when an image is selected.
        travel_sidebar_img_upload_6_image_frame.on('select', function(){

            // Grabs the attachment selection and creates a JSON representation of the model.
            var media_attachment = travel_sidebar_img_upload_6_image_frame.state().get('selection').first().toJSON();

            // Sends the attachment URL to our custom image input field.
            $('#travel-sidebar-img-upload-6').val(media_attachment.url);
        });

        // Opens the media library frame.
        travel_sidebar_img_upload_6_image_frame.open();
    });

    // Instantiates the variable that holds the media library frame.
    var galleryphoto_1_image_frame;

    // Runs when the image button is clicked.
    $('#galleryphoto-1-image-button').click(function(e) {

        // Prevents the default action from occuring.
        e.preventDefault();

        // If the frame already exists, re-open it.
        if (galleryphoto_1_image_frame) {
            galleryphoto_1_image_frame.open();
            return;
        }

        // Sets up the media library frame
        galleryphoto_1_image_frame = wp.media.frames.galleryphoto_1_image_frame = wp.media({
            title: meta_image.title,
            button: {text: meta_image.button},
            /*library: { type: 'image' }*/
        });

        // Runs when an image is selected.
        galleryphoto_1_image_frame.on('select', function () {

            // Grabs the attachment selection and creates a JSON representation of the model.
            var media_attachment = galleryphoto_1_image_frame.state().get('selection').first().toJSON();

            // Sends the attachment URL to our custom image input field.
            $('#galleryphoto-1-image').val(media_attachment.url);
        });

        // Opens the media library frame.
        galleryphoto_1_image_frame.open();
    });

    // Instantiates the variable that holds the media library frame.
    var galleryphoto_2_image_frame;

    // Runs when the image button is clicked.
    $('#galleryphoto-2-image-button').click(function(e) {

        // Prevents the default action from occuring.
        e.preventDefault();

        // If the frame already exists, re-open it.
        if (galleryphoto_2_image_frame) {
            galleryphoto_2_image_frame.open();
            return;
        }

        // Sets up the media library frame
        galleryphoto_2_image_frame = wp.media.frames.galleryphoto_2_image_frame = wp.media({
            title: meta_image.title,
            button: {text: meta_image.button},
            /*library: { type: 'image' }*/
        });

        // Runs when an image is selected.
        galleryphoto_2_image_frame.on('select', function () {

            // Grabs the attachment selection and creates a JSON representation of the model.
            var media_attachment = galleryphoto_2_image_frame.state().get('selection').first().toJSON();

            // Sends the attachment URL to our custom image input field.
            $('#galleryphoto-2-image').val(media_attachment.url);
        });

        // Opens the media library frame.
        galleryphoto_2_image_frame.open();
    });

    // Instantiates the variable that holds the media library frame.
    var galleryphoto_3_image_frame;

    // Runs when the image button is clicked.
    $('#galleryphoto-3-image-button').click(function(e) {

        // Prevents the default action from occuring.
        e.preventDefault();

        // If the frame already exists, re-open it.
        if (galleryphoto_3_image_frame) {
            galleryphoto_3_image_frame.open();
            return;
        }

        // Sets up the media library frame
        galleryphoto_3_image_frame = wp.media.frames.galleryphoto_3_image_frame = wp.media({
            title: meta_image.title,
            button: {text: meta_image.button},
            /*library: { type: 'image' }*/
        });

        // Runs when an image is selected.
        galleryphoto_3_image_frame.on('select', function () {

            // Grabs the attachment selection and creates a JSON representation of the model.
            var media_attachment = galleryphoto_3_image_frame.state().get('selection').first().toJSON();

            // Sends the attachment URL to our custom image input field.
            $('#galleryphoto-3-image').val(media_attachment.url);
        });

        // Opens the media library frame.
        galleryphoto_3_image_frame.open();
    });

    // Instantiates the variable that holds the media library frame.
    var galleryphoto_4_image_frame;

    // Runs when the image button is clicked.
    $('#galleryphoto-4-image-button').click(function(e) {

        // Prevents the default action from occuring.
        e.preventDefault();

        // If the frame already exists, re-open it.
        if (galleryphoto_4_image_frame) {
            galleryphoto_4_image_frame.open();
            return;
        }

        // Sets up the media library frame
        galleryphoto_4_image_frame = wp.media.frames.galleryphoto_4_image_frame = wp.media({
            title: meta_image.title,
            button: {text: meta_image.button},
            /*library: { type: 'image' }*/
        });

        // Runs when an image is selected.
        galleryphoto_4_image_frame.on('select', function () {

            // Grabs the attachment selection and creates a JSON representation of the model.
            var media_attachment = galleryphoto_4_image_frame.state().get('selection').first().toJSON();

            // Sends the attachment URL to our custom image input field.
            $('#galleryphoto-4-image').val(media_attachment.url);
        });

        // Opens the media library frame.
        galleryphoto_4_image_frame.open();
    });



    // Instantiates the variable that holds the media library frame.
    var galleryphoto_4_image_frame;

    // Runs when the image button is clicked.
    $('#galleryphoto-4-image-button').click(function(e) {

        // Prevents the default action from occuring.
        e.preventDefault();

        // If the frame already exists, re-open it.
        if (galleryphoto_4_image_frame) {
            galleryphoto_4_image_frame.open();
            return;
        }

        // Sets up the media library frame
        galleryphoto_4_image_frame = wp.media.frames.galleryphoto_4_image_frame = wp.media({
            title: meta_image.title,
            button: {text: meta_image.button},
            /*library: { type: 'image' }*/
        });

        // Runs when an image is selected.
        galleryphoto_4_image_frame.on('select', function () {

            // Grabs the attachment selection and creates a JSON representation of the model.
            var media_attachment = galleryphoto_4_image_frame.state().get('selection').first().toJSON();

            // Sends the attachment URL to our custom image input field.
            $('#galleryphoto-4-image').val(media_attachment.url);
        });

        // Opens the media library frame.
        galleryphoto_4_image_frame.open();
    });




    // Instantiates the variable that holds the media library frame.
    var galleryphoto_5_image_frame;

    // Runs when the image button is clicked.
    $('#galleryphoto-5-image-button').click(function(e) {

        // Prevents the default action from occuring.
        e.preventDefault();

        // If the frame already exists, re-open it.
        if (galleryphoto_5_image_frame) {
            galleryphoto_5_image_frame.open();
            return;
        }

        // Sets up the media library frame
        galleryphoto_5_image_frame = wp.media.frames.galleryphoto_5_image_frame = wp.media({
            title: meta_image.title,
            button: {text: meta_image.button},
            /*library: { type: 'image' }*/
        });

        // Runs when an image is selected.
        galleryphoto_5_image_frame.on('select', function () {

            // Grabs the attachment selection and creates a JSON representation of the model.
            var media_attachment = galleryphoto_5_image_frame.state().get('selection').first().toJSON();

            // Sends the attachment URL to our custom image input field.
            $('#galleryphoto-5-image').val(media_attachment.url);
        });

        // Opens the media library frame.
        galleryphoto_5_image_frame.open();
    });

    // Instantiates the variable that holds the media library frame.
    var galleryphoto_6_image_frame;

    // Runs when the image button is clicked.
    $('#galleryphoto-6-image-button').click(function(e) {

        // Prevents the default action from occuring.
        e.preventDefault();

        // If the frame already exists, re-open it.
        if (galleryphoto_6_image_frame) {
            galleryphoto_6_image_frame.open();
            return;
        }

        // Sets up the media library frame
        galleryphoto_6_image_frame = wp.media.frames.galleryphoto_6_image_frame = wp.media({
            title: meta_image.title,
            button: {text: meta_image.button},
            /*library: { type: 'image' }*/
        });

        // Runs when an image is selected.
        galleryphoto_6_image_frame.on('select', function () {

            // Grabs the attachment selection and creates a JSON representation of the model.
            var media_attachment = galleryphoto_6_image_frame.state().get('selection').first().toJSON();

            // Sends the attachment URL to our custom image input field.
            $('#galleryphoto-6-image').val(media_attachment.url);
        });

        // Opens the media library frame.
        galleryphoto_6_image_frame.open();
    });

    // Instantiates the variable that holds the media library frame.
    var galleryphoto_7_image_frame;

    // Runs when the image button is clicked.
    $('#galleryphoto-7-image-button').click(function(e) {

        // Prevents the default action from occuring.
        e.preventDefault();

        // If the frame already exists, re-open it.
        if (galleryphoto_7_image_frame) {
            galleryphoto_7_image_frame.open();
            return;
        }

        // Sets up the media library frame
        galleryphoto_7_image_frame = wp.media.frames.galleryphoto_7_image_frame = wp.media({
            title: meta_image.title,
            button: {text: meta_image.button},
            /*library: { type: 'image' }*/
        });

        // Runs when an image is selected.
        galleryphoto_7_image_frame.on('select', function () {

            // Grabs the attachment selection and creates a JSON representation of the model.
            var media_attachment = galleryphoto_7_image_frame.state().get('selection').first().toJSON();

            // Sends the attachment URL to our custom image input field.
            $('#galleryphoto-7-image').val(media_attachment.url);
        });

        // Opens the media library frame.
        galleryphoto_7_image_frame.open();
    });

    // Instantiates the variable that holds the media library frame.
    var galleryphoto_8_image_frame;

    // Runs when the image button is clicked.
    $('#galleryphoto-8-image-button').click(function(e) {

        // Prevents the default action from occuring.
        e.preventDefault();

        // If the frame already exists, re-open it.
        if (galleryphoto_8_image_frame) {
            galleryphoto_8_image_frame.open();
            return;
        }

        // Sets up the media library frame
        galleryphoto_8_image_frame = wp.media.frames.galleryphoto_8_image_frame = wp.media({
            title: meta_image.title,
            button: {text: meta_image.button},
            /*library: { type: 'image' }*/
        });

        // Runs when an image is selected.
        galleryphoto_8_image_frame.on('select', function () {

            // Grabs the attachment selection and creates a JSON representation of the model.
            var media_attachment = galleryphoto_8_image_frame.state().get('selection').first().toJSON();

            // Sends the attachment URL to our custom image input field.
            $('#galleryphoto-8-image').val(media_attachment.url);
        });

        // Opens the media library frame.
        galleryphoto_8_image_frame.open();
    });

    // Instantiates the variable that holds the media library frame.
    var sections_video_poster_frame;

    // Runs when the image button is clicked.
    $('#sections-video-poster-button').click(function(e) {

        // Prevents the default action from occuring.
        e.preventDefault();

        // If the frame already exists, re-open it.
        if (sections_video_poster_frame) {
            sections_video_poster_frame.open();
            return;
        }

        // Sets up the media library frame
        sections_video_poster_frame = wp.media.frames.sections_video_poster_frame = wp.media({
            title: meta_image.title,
            button: {text: meta_image.button},
            /*library: { type: 'image' }*/
        });

        // Runs when an image is selected.
        sections_video_poster_frame.on('select', function () {

            // Grabs the attachment selection and creates a JSON representation of the model.
            var media_attachment = sections_video_poster_frame.state().get('selection').first().toJSON();

            // Sends the attachment URL to our custom image input field.
            $('#sections-video-poster').val(media_attachment.url);
        });

        // Opens the media library frame.
        sections_video_poster_frame.open();
    });


    // Instantiates the variable that holds the media library frame.
    var travel_temp_video_poster_frame;

    // Runs when the image button is clicked.
    $('#travel-temp-video-poster-button').click(function(e) {

        // Prevents the default action from occuring.
        e.preventDefault();

        // If the frame already exists, re-open it.
        if (travel_temp_video_poster_frame) {
            travel_temp_video_poster_frame.open();
            return;
        }

        // Sets up the media library frame
        travel_temp_video_poster_frame = wp.media.frames.travel_temp_video_poster_frame = wp.media({
            title: meta_image.title,
            button: {text: meta_image.button},
            /*library: { type: 'image' }*/
        });

        // Runs when an image is selected.
        travel_temp_video_poster_frame.on('select', function () {

            // Grabs the attachment selection and creates a JSON representation of the model.
            var media_attachment = travel_temp_video_poster_frame.state().get('selection').first().toJSON();

            // Sends the attachment URL to our custom image input field.
            $('#travel-temp-video-poster').val(media_attachment.url);
        });

        // Opens the media library frame.
        travel_temp_video_poster_frame.open();
    });

    // Instantiates the variable that holds the media library frame.
    var private_temp_video_poster_frame;

    // Runs when the image button is clicked.
    $('#private-temp-video-poster-button').click(function(e) {

        // Prevents the default action from occuring.
        e.preventDefault();

        // If the frame already exists, re-open it.
        if (private_temp_video_poster_frame) {
            private_temp_video_poster_frame.open();
            return;
        }

        // Sets up the media library frame
        private_temp_video_poster_frame = wp.media.frames.private_temp_video_poster_frame = wp.media({
            title: meta_image.title,
            button: {text: meta_image.button},
            /*library: { type: 'image' }*/
        });

        // Runs when an image is selected.
        private_temp_video_poster_frame.on('select', function () {

            // Grabs the attachment selection and creates a JSON representation of the model.
            var media_attachment = private_temp_video_poster_frame.state().get('selection').first().toJSON();

            // Sends the attachment URL to our custom image input field.
            $('#private-temp-video-poster').val(media_attachment.url);
        });

        // Opens the media library frame.
        private_temp_video_poster_frame.open();
    });

    // Instantiates the variable that holds the media library frame.
    var guidesvc_temp_video_poster_frame;

    // Runs when the image button is clicked.
    $('#guidesvc-temp-video-poster-button').click(function(e) {

        // Prevents the default action from occuring.
        e.preventDefault();

        // If the frame already exists, re-open it.
        if (private_temp_video_poster_frame) {
            guidesvc_temp_video_poster_frame.open();
            return;
        }

        // Sets up the media library frame
        guidesvc_temp_video_poster_frame = wp.media.frames.guidesvc_temp_video_poster_frame = wp.media({
            title: meta_image.title,
            button: {text: meta_image.button},
            /*library: { type: 'image' }*/
        });

        // Runs when an image is selected.
        guidesvc_temp_video_poster_frame.on('select', function () {

            // Grabs the attachment selection and creates a JSON representation of the model.
            var media_attachment = guidesvc_temp_video_poster_frame.state().get('selection').first().toJSON();

            // Sends the attachment URL to our custom image input field.
            $('#guidesvc-temp-video-poster').val(media_attachment.url);
        });

        // Opens the media library frame.
        guidesvc_temp_video_poster_frame.open();
    });

    var front_page_video_poster_frame;

    // Runs when the image button is clicked.
    $('#front-page-video-poster-button').click(function(e) {

        // Prevents the default action from occuring.
        e.preventDefault();

        // If the frame already exists, re-open it.
        if (front_page_video_poster_frame) {
            front_page_video_poster_frame.open();
            return;
        }

        // Sets up the media library frame
        front_page_video_poster_frame = wp.media.frames.front_page_video_poster_frame = wp.media({
            title: meta_image.title,
            button: {text: meta_image.button},
            /*library: { type: 'image' }*/
        });

        // Runs when an image is selected.
        front_page_video_poster_frame.on('select', function () {

            // Grabs the attachment selection and creates a JSON representation of the model.
            var media_attachment = front_page_video_poster_frame.state().get('selection').first().toJSON();

            // Sends the attachment URL to our custom image input field.
            $('#front-page-video-poster').val(media_attachment.url);
        });

        // Opens the media library frame.
        front_page_video_poster_frame.open();
    });





    var multidest_carousel_1_img_frame;

    // Runs when the image button is clicked.
    $('#multidest-carousel-1-img-button').click(function(e) {

        // Prevents the default action from occuring.
        e.preventDefault();

        // If the frame already exists, re-open it.
        if (multidest_carousel_1_img_frame) {
            multidest_carousel_1_img_frame.open();
            return;
        }

        // Sets up the media library frame
        multidest_carousel_1_img_frame = wp.media.frames.multidest_carousel_1_img_frame = wp.media({
            title: meta_image.title,
            button: {text: meta_image.button},
            /*library: { type: 'image' }*/
        });

        // Runs when an image is selected.
        multidest_carousel_1_img_frame.on('select', function () {

            // Grabs the attachment selection and creates a JSON representation of the model.
            var media_attachment = multidest_carousel_1_img_frame.state().get('selection').first().toJSON();

            // Sends the attachment URL to our custom image input field.
            $('#multidest-carousel-1-img').val(media_attachment.url);
        });

        // Opens the media library frame.
        multidest_carousel_1_img_frame.open();
    });

    var multidest_carousel_2_img_frame;

    // Runs when the image button is clicked.
    $('#multidest-carousel-2-img-button').click(function(e) {

        // Prevents the default action from occuring.
        e.preventDefault();

        // If the frame already exists, re-open it.
        if (multidest_carousel_2_img_frame) {
            multidest_carousel_2_img_frame.open();
            return;
        }

        // Sets up the media library frame
        multidest_carousel_2_img_frame = wp.media.frames.multidest_carousel_2_img_frame = wp.media({
            title: meta_image.title,
            button: {text: meta_image.button},
            /*library: { type: 'image' }*/
        });

        // Runs when an image is selected.
        multidest_carousel_2_img_frame.on('select', function () {

            // Grabs the attachment selection and creates a JSON representation of the model.
            var media_attachment = multidest_carousel_2_img_frame.state().get('selection').first().toJSON();

            // Sends the attachment URL to our custom image input field.
            $('#multidest-carousel-2-img').val(media_attachment.url);
        });

        // Opens the media library frame.
        multidest_carousel_2_img_frame.open();
    });

    var multidest_carousel_3_img_frame;

    // Runs when the image button is clicked.
    $('#multidest-carousel-3-img-button').click(function(e) {

        // Prevents the default action from occuring.
        e.preventDefault();

        // If the frame already exists, re-open it.
        if (multidest_carousel_3_img_frame) {
            multidest_carousel_3_img_frame.open();
            return;
        }

        // Sets up the media library frame
        multidest_carousel_3_img_frame = wp.media.frames.multidest_carousel_3_img_frame = wp.media({
            title: meta_image.title,
            button: {text: meta_image.button},
            /*library: { type: 'image' }*/
        });

        // Runs when an image is selected.
        multidest_carousel_3_img_frame.on('select', function () {

            // Grabs the attachment selection and creates a JSON representation of the model.
            var media_attachment = multidest_carousel_3_img_frame.state().get('selection').first().toJSON();

            // Sends the attachment URL to our custom image input field.
            $('#multidest-carousel-3-img').val(media_attachment.url);
        });

        // Opens the media library frame.
        multidest_carousel_3_img_frame.open();
    });
});



