// Publication CTA Image 1 through 4
jQuery(document).ready( function($){ "use strict";

    // Instantiates the variable that holds the media library frame.
    var publication_cta_img_1;

    // Runs when the image button is clicked.
    $('#publication-cta-img-1-button').click(function(e){

        // Prevents the default action from occuring.
        e.preventDefault();

        // If the frame already exists, re-open it.
        if ( publication_cta_img_1 ) {
            publication_cta_img_1.open();
            return;
        }

        // Sets up the media library frame
        publication_cta_img_1 = wp.media.frames.publication_cta_img_1 = wp.media({
            title: meta_image.title,
            button: { text:  meta_image.button },
            library: { type: 'image' }
        });

        // Runs when an image is selected.
        publication_cta_img_1.on('select', function(){

            // Grabs the attachment selection and creates a JSON representation of the model.
            var media_attachment = publication_cta_img_1.state().get('selection').first().toJSON();

            // Sends the attachment URL to our custom image input field.
            $('#publication-cta-img-1').val(media_attachment.url);
        });

        // Opens the media library frame.
        publication_cta_img_1.open();
    });

    // Instantiates the variable that holds the media library frame.
    var publication_cta_img_2;

    // Runs when the image button is clicked.
    $('#publication-cta-img-2-button').click(function(e){

        // Prevents the default action from occuring.
        e.preventDefault();

        // If the frame already exists, re-open it.
        if ( publication_cta_img_2 ) {
            publication_cta_img_2.open();
            return;
        }

        // Sets up the media library frame
        publication_cta_img_2 = wp.media.frames.publication_cta_img_2 = wp.media({
            title: meta_image.title,
            button: { text:  meta_image.button },
            library: { type: 'image' }
        });

        // Runs when an image is selected.
        publication_cta_img_2.on('select', function(){

            // Grabs the attachment selection and creates a JSON representation of the model.
            var media_attachment = publication_cta_img_2.state().get('selection').first().toJSON();

            // Sends the attachment URL to our custom image input field.
            $('#publication-cta-img-2').val(media_attachment.url);
        });

        // Opens the media library frame.
        publication_cta_img_2.open();
    });

    // Instantiates the variable that holds the media library frame.
    var publication_cta_img_3;

    // Runs when the image button is clicked.
    $('#publication-cta-img-3-button').click(function(e){

        // Prevents the default action from occuring.
        e.preventDefault();

        // If the frame already exists, re-open it.
        if ( publication_cta_img_3 ) {
            publication_cta_img_3.open();
            return;
        }

        // Sets up the media library frame
        publication_cta_img_3 = wp.media.frames.publication_cta_img_3 = wp.media({
            title: meta_image.title,
            button: { text:  meta_image.button },
            library: { type: 'image' }
        });

        // Runs when an image is selected.
        publication_cta_img_3.on('select', function(){

            // Grabs the attachment selection and creates a JSON representation of the model.
            var media_attachment = publication_cta_img_3.state().get('selection').first().toJSON();

            // Sends the attachment URL to our custom image input field.
            $('#publication-cta-img-3').val(media_attachment.url);
        });

        // Opens the media library frame.
        publication_cta_img_3.open();
    });

    // Instantiates the variable that holds the media library frame.
    var publication_cta_img_4;

    // Runs when the image button is clicked.
    $('#publication-cta-img-4-button').click(function(e){

        // Prevents the default action from occuring.
        e.preventDefault();

        // If the frame already exists, re-open it.
        if ( publication_cta_img_4 ) {
            publication_cta_img_4.open();
            return;
        }

        // Sets up the media library frame
        publication_cta_img_4 = wp.media.frames.publication_cta_img_4 = wp.media({
            title: meta_image.title,
            button: { text:  meta_image.button },
            library: { type: 'image' }
        });

        // Runs when an image is selected.
        publication_cta_img_4.on('select', function(){

            // Grabs the attachment selection and creates a JSON representation of the model.
            var media_attachment = publication_cta_img_4.state().get('selection').first().toJSON();

            // Sends the attachment URL to our custom image input field.
            $('#publication-cta-img-4').val(media_attachment.url);
        });

        // Opens the media library frame.
        publication_cta_img_4.open();
    });
});
