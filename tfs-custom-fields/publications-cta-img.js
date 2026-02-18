// Publication CTA Image 1 through 4
jQuery(document).ready( function($){ "use strict";

    // Instantiates the variable that holds the media library frame.
    var publication_cta_img_1;

    // Runs when the image button is clicked.
    $('#publication-cta-img-1-button').click(function(e){

        // Prevents the default action from occuring.
        e.preventDefault();
        e.stopImmediatePropagation();

        // Sets up the media library frame
        var frame = wp.media({
            title: meta_image.title,
            button: { text:  meta_image.button },
            library: { type: 'image' },
            multiple: false
        });

        // Runs when an image is selected.
        frame.on('select', function(){

            // Grabs the attachment selection and creates a JSON representation of the model.
            var media_attachment = frame.state().get('selection').first().toJSON();

            // Sends the attachment URL to our custom image input field.
            $('#publication-cta-img-1').val(media_attachment.url);

            // Close the media frame.
            frame.close();
        });

        // Opens the media library frame.
        frame.open();
    });

    // Runs when the image button is clicked.
    $('#publication-cta-img-2-button').click(function(e){

        // Prevents the default action from occuring.
        e.preventDefault();
        e.stopImmediatePropagation();

        // Sets up the media library frame
        var frame = wp.media({
            title: meta_image.title,
            button: { text:  meta_image.button },
            library: { type: 'image' },
            multiple: false
        });

        // Runs when an image is selected.
        frame.on('select', function(){

            // Grabs the attachment selection and creates a JSON representation of the model.
            var media_attachment = frame.state().get('selection').first().toJSON();

            // Sends the attachment URL to our custom image input field.
            $('#publication-cta-img-2').val(media_attachment.url);

            // Close the media frame.
            frame.close();
        });

        // Opens the media library frame.
        frame.open();
    });

    // Runs when the image button is clicked.
    $('#publication-cta-img-3-button').click(function(e){

        // Prevents the default action from occuring.
        e.preventDefault();
        e.stopImmediatePropagation();

        // Sets up the media library frame
        var frame = wp.media({
            title: meta_image.title,
            button: { text:  meta_image.button },
            library: { type: 'image' },
            multiple: false
        });

        // Runs when an image is selected.
        frame.on('select', function(){

            // Grabs the attachment selection and creates a JSON representation of the model.
            var media_attachment = frame.state().get('selection').first().toJSON();

            // Sends the attachment URL to our custom image input field.
            $('#publication-cta-img-3').val(media_attachment.url);

            // Close the media frame.
            frame.close();
        });

        // Opens the media library frame.
        frame.open();
    });

    // Runs when the image button is clicked.
    $('#publication-cta-img-4-button').click(function(e){

        // Prevents the default action from occuring.
        e.preventDefault();
        e.stopImmediatePropagation();

        // Sets up the media library frame
        var frame = wp.media({
            title: meta_image.title,
            button: { text:  meta_image.button },
            library: { type: 'image' },
            multiple: false
        });

        // Runs when an image is selected.
        frame.on('select', function(){

            // Grabs the attachment selection and creates a JSON representation of the model.
            var media_attachment = frame.state().get('selection').first().toJSON();

            // Sends the attachment URL to our custom image input field.
            $('#publication-cta-img-4').val(media_attachment.url);

            // Close the media frame.
            frame.close();
        });

        // Opens the media library frame.
        frame.open();
    });
});
