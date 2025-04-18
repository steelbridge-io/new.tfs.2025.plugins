jQuery(document).ready( function($){ "use strict";

// Instantiates the variable that holds the media library frame.
    var holiday_image_1_frame;

    // Runs when the image button is clicked.
    $('#holiday-image-1-button').click(function(e){

        // Prevents the default action from occuring.
        e.preventDefault();

        // If the frame already exists, re-open it.
        if ( holiday_image_1_frame ) {
            holiday_image_1_frame.open();
            return;
        }

        // Sets up the media library frame
        holiday_image_1_frame = wp.media.frames.holiday_image_1_frame = wp.media({
            title: meta_image.title,
            button: { text:  meta_image.button },
            library: { type: 'image' }
        });

        // Runs when an image is selected.
        holiday_image_1_frame.on('select', function(){

            // Grabs the attachment selection and creates a JSON representation of the model.
            var media_attachment = holiday_image_1_frame.state().get('selection').first().toJSON();

            // Sends the attachment URL to our custom image input field.
            $('#holiday-image-1').val(media_attachment.url);
        });

        // Opens the media library frame.
        holiday_image_1_frame.open();
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
    var holidaydsel_1_img_frame;

    // Runs when the image button is clicked.
    $('#holidaydsel-1-img-button').click(function(e){

        // Prevents the default action from occuring.
        e.preventDefault();

        // If the frame already exists, re-open it.
        if ( holidaydsel_1_img_frame ) {
            holidaydsel_1_img_frame.open();
            return;
        }

        // Sets up the media library frame
        holidaydsel_1_img_frame = wp.media.frames.holidaydsel_1_img_frame = wp.media({
            title: meta_image.title,
            button: { text:  meta_image.button },
            library: { type: 'image' }
        });

        // Runs when an image is selected.
        holidaydsel_1_img_frame.on('select', function(){

            // Grabs the attachment selection and creates a JSON representation of the model.
            var media_attachment = holidaydsel_1_img_frame.state().get('selection').first().toJSON();

            // Sends the attachment URL to our custom image input field.
            $('#holidaydsel-1-img').val(media_attachment.url);
        });

        // Opens the media library frame.
        holidaydsel_1_img_frame.open();
    });
});

jQuery(document).ready( function($){ "use strict";

// Instantiates the variable that holds the media library frame.
    var holidaydsel_2_img_frame;

    // Runs when the image button is clicked.
    $('#holidaydsel-2-img-button').click(function(e){

        // Prevents the default action from occuring.
        e.preventDefault();

        // If the frame already exists, re-open it.
        if ( holidaydsel_2_img_frame ) {
            holidaydsel_2_img_frame.open();
            return;
        }

        // Sets up the media library frame
        holidaydsel_2_img_frame = wp.media.frames.holidaydsel_2_img_frame = wp.media({
            title: meta_image.title,
            button: { text:  meta_image.button },
            library: { type: 'image' }
        });

        // Runs when an image is selected.
        holidaydsel_2_img_frame.on('select', function(){

            // Grabs the attachment selection and creates a JSON representation of the model.
            var media_attachment = holidaydsel_2_img_frame.state().get('selection').first().toJSON();

            // Sends the attachment URL to our custom image input field.
            $('#holidaydsel-2-img').val(media_attachment.url);
        });

        // Opens the media library frame.
        holidaydsel_2_img_frame.open();
    });
});

jQuery(document).ready( function($){ "use strict";

// Instantiates the variable that holds the media library frame.
    var holidaydsel_3_img_frame;

    // Runs when the image button is clicked.
    $('#holidaydsel-3-img-button').click(function(e){

        // Prevents the default action from occuring.
        e.preventDefault();

        // If the frame already exists, re-open it.
        if ( holidaydsel_3_img_frame ) {
            holidaydsel_3_img_frame.open();
            return;
        }

        // Sets up the media library frame
        holidaydsel_3_img_frame = wp.media.frames.holidaydsel_3_img_frame = wp.media({
            title: meta_image.title,
            button: { text:  meta_image.button },
            library: { type: 'image' }
        });

        // Runs when an image is selected.
        holidaydsel_3_img_frame.on('select', function(){

            // Grabs the attachment selection and creates a JSON representation of the model.
            var media_attachment = holidaydsel_3_img_frame.state().get('selection').first().toJSON();

            // Sends the attachment URL to our custom image input field.
            $('#holidaydsel-3-img').val(media_attachment.url);
        });

        // Opens the media library frame.
        holidaydsel_3_img_frame.open();
    });
});

jQuery(document).ready( function($){ "use strict";

// Instantiates the variable that holds the media library frame.
    var holidaydsel_4_img_frame;

    // Runs when the image button is clicked.
    $('#holidaydsel-4-img-button').click(function(e){

        // Prevents the default action from occuring.
        e.preventDefault();

        // If the frame already exists, re-open it.
        if ( holidaydsel_4_img_frame ) {
            holidaydsel_4_img_frame.open();
            return;
        }

        // Sets up the media library frame
        holidaydsel_4_img_frame = wp.media.frames.holidaydsel_4_img_frame = wp.media({
            title: meta_image.title,
            button: { text:  meta_image.button },
            library: { type: 'image' }
        });

        // Runs when an image is selected.
        holidaydsel_4_img_frame.on('select', function(){

            // Grabs the attachment selection and creates a JSON representation of the model.
            var media_attachment = holidaydsel_4_img_frame.state().get('selection').first().toJSON();

            // Sends the attachment URL to our custom image input field.
            $('#holidaydsel-4-img').val(media_attachment.url);
        });

        // Opens the media library frame.
        holidaydsel_4_img_frame.open();
    });
});

jQuery(document).ready( function($){ "use strict";

// Instantiates the variable that holds the media library frame.
    var holidaydsel_5_img_frame;

    // Runs when the image button is clicked.
    $('#holidaydsel-5-img-button').click(function(e){

        // Prevents the default action from occuring.
        e.preventDefault();

        // If the frame already exists, re-open it.
        if ( holidaydsel_5_img_frame ) {
            holidaydsel_5_img_frame.open();
            return;
        }

        // Sets up the media library frame
        holidaydsel_5_img_frame = wp.media.frames.holidaydsel_5_img_frame = wp.media({
            title: meta_image.title,
            button: { text:  meta_image.button },
            library: { type: 'image' }
        });

        // Runs when an image is selected.
        holidaydsel_5_img_frame.on('select', function(){

            // Grabs the attachment selection and creates a JSON representation of the model.
            var media_attachment = holidaydsel_5_img_frame.state().get('selection').first().toJSON();

            // Sends the attachment URL to our custom image input field.
            $('#holidaydsel-5-img').val(media_attachment.url);
        });

        // Opens the media library frame.
        holidaydsel_5_img_frame.open();
    });
});

jQuery(document).ready( function($){ "use strict";

// Instantiates the variable that holds the media library frame.
    var holidaydsel_6_img_frame;

    // Runs when the image button is clicked.
    $('#holidaydsel-6-img-button').click(function(e){

        // Prevents the default action from occuring.
        e.preventDefault();

        // If the frame already exists, re-open it.
        if ( holidaydsel_6_img_frame ) {
            holidaydsel_6_img_frame.open();
            return;
        }

        // Sets up the media library frame
        holidaydsel_6_img_frame = wp.media.frames.holidaydsel_6_img_frame = wp.media({
            title: meta_image.title,
            button: { text:  meta_image.button },
            library: { type: 'image' }
        });

        // Runs when an image is selected.
        holidaydsel_6_img_frame.on('select', function(){

            // Grabs the attachment selection and creates a JSON representation of the model.
            var media_attachment = holidaydsel_6_img_frame.state().get('selection').first().toJSON();

            // Sends the attachment URL to our custom image input field.
            $('#holidaydsel-6-img').val(media_attachment.url);
        });

        // Opens the media library frame.
        holidaydsel_6_img_frame.open();
    });
});

jQuery(document).ready( function($){ "use strict";

// Instantiates the variable that holds the media library frame.
    var holiday_image_2_frame;

    // Runs when the image button is clicked.
    $('#holiday-image-2-button').click(function(e){

        // Prevents the default action from occuring.
        e.preventDefault();

        // If the frame already exists, re-open it.
        if ( holiday_image_2_frame ) {
            holiday_image_2_frame.open();
            return;
        }

        // Sets up the media library frame
        holiday_image_2_frame = wp.media.frames.holiday_image_2_frame = wp.media({
            title: meta_image.title,
            button: { text:  meta_image.button },
            library: { type: 'image' }
        });

        // Runs when an image is selected.
        holiday_image_2_frame.on('select', function(){

            // Grabs the attachment selection and creates a JSON representation of the model.
            var media_attachment = holiday_image_2_frame.state().get('selection').first().toJSON();

            // Sends the attachment URL to our custom image input field.
            $('#holiday-image-2').val(media_attachment.url);
        });

        // Opens the media library frame.
        holiday_image_2_frame.open();
    });
});

jQuery(document).ready( function($){ "use strict";

// Instantiates the variable that holds the media library frame.
    var holiday_image_3_frame;

    // Runs when the image button is clicked.
    $('#holiday-image-3-button').click(function(e){

        // Prevents the default action from occuring.
        e.preventDefault();

        // If the frame already exists, re-open it.
        if ( holiday_image_3_frame ) {
            holiday_image_3_frame.open();
            return;
        }

        // Sets up the media library frame
        holiday_image_3_frame = wp.media.frames.holiday_image_3_frame = wp.media({
            title: meta_image.title,
            button: { text:  meta_image.button },
            library: { type: 'image' }
        });

        // Runs when an image is selected.
        holiday_image_3_frame.on('select', function(){

            // Grabs the attachment selection and creates a JSON representation of the model.
            var media_attachment = holiday_image_3_frame.state().get('selection').first().toJSON();

            // Sends the attachment URL to our custom image input field.
            $('#holiday-image-3').val(media_attachment.url);
        });

        // Opens the media library frame.
        holiday_image_3_frame.open();
    });
});

jQuery(document).ready( function($){ "use strict";

// Instantiates the variable that holds the media library frame.
    var holiday_image_4_frame;

    // Runs when the image button is clicked.
    $('#holiday-image-4-button').click(function(e){

        // Prevents the default action from occuring.
        e.preventDefault();

        // If the frame already exists, re-open it.
        if ( holiday_image_4_frame ) {
            holiday_image_4_frame.open();
            return;
        }

        // Sets up the media library frame
        holiday_image_4_frame = wp.media.frames.holiday_image_4_frame = wp.media({
            title: meta_image.title,
            button: { text:  meta_image.button },
            library: { type: 'image' }
        });

        // Runs when an image is selected.
        holiday_image_4_frame.on('select', function(){

            // Grabs the attachment selection and creates a JSON representation of the model.
            var media_attachment = holiday_image_4_frame.state().get('selection').first().toJSON();

            // Sends the attachment URL to our custom image input field.
            $('#holiday-image-4').val(media_attachment.url);
        });

        // Opens the media library frame.
        holiday_image_4_frame.open();
    });
});

jQuery(document).ready( function($){ "use strict";

// Instantiates the variable that holds the media library frame.
    var holiday_image_5_frame;

    // Runs when the image button is clicked.
    $('#holiday-image-5-button').click(function(e){

        // Prevents the default action from occuring.
        e.preventDefault();

        // If the frame already exists, re-open it.
        if ( holiday_image_5_frame ) {
            holiday_image_5_frame.open();
            return;
        }

        // Sets up the media library frame
        holiday_image_5_frame = wp.media.frames.holiday_image_5_frame = wp.media({
            title: meta_image.title,
            button: { text:  meta_image.button },
            library: { type: 'image' }
        });

        // Runs when an image is selected.
        holiday_image_5_frame.on('select', function(){

            // Grabs the attachment selection and creates a JSON representation of the model.
            var media_attachment = holiday_image_5_frame.state().get('selection').first().toJSON();

            // Sends the attachment URL to our custom image input field.
            $('#holiday-image-5').val(media_attachment.url);
        });

        // Opens the media library frame.
        holiday_image_5_frame.open();
    });
});

jQuery(document).ready( function($){ "use strict";

// Instantiates the variable that holds the media library frame.
    var holiday_image_6_frame;

    // Runs when the image button is clicked.
    $('#holiday-image-6-button').click(function(e){

        // Prevents the default action from occuring.
        e.preventDefault();

        // If the frame already exists, re-open it.
        if ( holiday_image_6_frame ) {
            holiday_image_6_frame.open();
            return;
        }

        // Sets up the media library frame
        holiday_image_6_frame = wp.media.frames.holiday_image_6_frame = wp.media({
            title: meta_image.title,
            button: { text:  meta_image.button },
            library: { type: 'image' }
        });

        // Runs when an image is selected.
        holiday_image_6_frame.on('select', function(){

            // Grabs the attachment selection and creates a JSON representation of the model.
            var media_attachment = holiday_image_6_frame.state().get('selection').first().toJSON();

            // Sends the attachment URL to our custom image input field.
            $('#holiday-image-6').val(media_attachment.url);
        });

        // Opens the media library frame.
        holiday_image_6_frame.open();
    });
});

jQuery(document).ready( function($){ "use strict";

// Instantiates the variable that holds the media library frame.
    var holiday_image_7_frame;

    // Runs when the image button is clicked.
    $('#holiday-image-7-button').click(function(e){

        // Prevents the default action from occuring.
        e.preventDefault();

        // If the frame already exists, re-open it.
        if ( holiday_image_7_frame ) {
            holiday_image_7_frame.open();
            return;
        }

        // Sets up the media library frame
        holiday_image_7_frame = wp.media.frames.holiday_image_7_frame = wp.media({
            title: meta_image.title,
            button: { text:  meta_image.button },
            library: { type: 'image' }
        });

        // Runs when an image is selected.
        holiday_image_7_frame.on('select', function(){

            // Grabs the attachment selection and creates a JSON representation of the model.
            var media_attachment = holiday_image_7_frame.state().get('selection').first().toJSON();

            // Sends the attachment URL to our custom image input field.
            $('#holiday-image-7').val(media_attachment.url);
        });

        // Opens the media library frame.
        holiday_image_7_frame.open();
    });
});

jQuery(document).ready( function($){ "use strict";

// Instantiates the variable that holds the media library frame.
    var holiday_image_8_frame;

    // Runs when the image button is clicked.
    $('#holiday-image-8-button').click(function(e){

        // Prevents the default action from occuring.
        e.preventDefault();

        // If the frame already exists, re-open it.
        if ( holiday_image_8_frame ) {
            holiday_image_8_frame.open();
            return;
        }

        // Sets up the media library frame
        holiday_image_8_frame = wp.media.frames.holiday_image_8_frame = wp.media({
            title: meta_image.title,
            button: { text:  meta_image.button },
            library: { type: 'image' }
        });

        // Runs when an image is selected.
        holiday_image_8_frame.on('select', function(){

            // Grabs the attachment selection and creates a JSON representation of the model.
            var media_attachment = holiday_image_8_frame.state().get('selection').first().toJSON();

            // Sends the attachment URL to our custom image input field.
            $('#holiday-image-8').val(media_attachment.url);
        });

        // Opens the media library frame.
        holiday_image_8_frame.open();
    });
});

jQuery(document).ready( function($){ "use strict";

// Instantiates the variable that holds the media library frame.
    var holiday_image_9_frame;

    // Runs when the image button is clicked.
    $('#holiday-image-9-button').click(function(e){

        // Prevents the default action from occuring.
        e.preventDefault();

        // If the frame already exists, re-open it.
        if ( holiday_image_9_frame ) {
            holiday_image_9_frame.open();
            return;
        }

        // Sets up the media library frame
        holiday_image_9_frame = wp.media.frames.holiday_image_9_frame = wp.media({
            title: meta_image.title,
            button: { text:  meta_image.button },
            library: { type: 'image' }
        });

        // Runs when an image is selected.
        holiday_image_9_frame.on('select', function(){

            // Grabs the attachment selection and creates a JSON representation of the model.
            var media_attachment = holiday_image_9_frame.state().get('selection').first().toJSON();

            // Sends the attachment URL to our custom image input field.
            $('#holiday-image-9').val(media_attachment.url);
        });

        // Opens the media library frame.
        holiday_image_9_frame.open();
    });
});

jQuery(document).ready( function($){ "use strict";

// Instantiates the variable that holds the media library frame.
    var holiday_image_10_frame;

    // Runs when the image button is clicked.
    $('#holiday-image-10-button').click(function(e){

        // Prevents the default action from occuring.
        e.preventDefault();

        // If the frame already exists, re-open it.
        if ( holiday_image_10_frame ) {
            holiday_image_10_frame.open();
            return;
        }

        // Sets up the media library frame
        holiday_image_10_frame = wp.media.frames.holiday_image_10_frame = wp.media({
            title: meta_image.title,
            button: { text:  meta_image.button },
            library: { type: 'image' }
        });

        // Runs when an image is selected.
        holiday_image_10_frame.on('select', function(){

            // Grabs the attachment selection and creates a JSON representation of the model.
            var media_attachment = holiday_image_10_frame.state().get('selection').first().toJSON();

            // Sends the attachment URL to our custom image input field.
            $('#holiday-image-10').val(media_attachment.url);
        });

        // Opens the media library frame.
        holiday_image_10_frame.open();
    });
});

jQuery(document).ready( function($){ "use strict";

// Instantiates the variable that holds the media library frame.
    var holiday_image_11_frame;

    // Runs when the image button is clicked.
    $('#holiday-image-11-button').click(function(e){

        // Prevents the default action from occuring.
        e.preventDefault();

        // If the frame already exists, re-open it.
        if ( holiday_image_11_frame ) {
            holiday_image_11_frame.open();
            return;
        }

        // Sets up the media library frame
        holiday_image_11_frame = wp.media.frames.holiday_image_11_frame = wp.media({
            title: meta_image.title,
            button: { text:  meta_image.button },
            library: { type: 'image' }
        });

        // Runs when an image is selected.
        holiday_image_11_frame.on('select', function(){

            // Grabs the attachment selection and creates a JSON representation of the model.
            var media_attachment = holiday_image_11_frame.state().get('selection').first().toJSON();

            // Sends the attachment URL to our custom image input field.
            $('#holiday-image-11').val(media_attachment.url);
        });

        // Opens the media library frame.
        holiday_image_11_frame.open();
    });
});

jQuery(document).ready( function($){ "use strict";

// Instantiates the variable that holds the media library frame.
    var holiday_image_12_frame;

    // Runs when the image button is clicked.
    $('#holiday-image-12-button').click(function(e){

        // Prevents the default action from occuring.
        e.preventDefault();

        // If the frame already exists, re-open it.
        if ( holiday_image_12_frame ) {
            holiday_image_12_frame.open();
            return;
        }

        // Sets up the media library frame
        holiday_image_12_frame = wp.media.frames.holiday_image_12_frame = wp.media({
            title: meta_image.title,
            button: { text:  meta_image.button },
            library: { type: 'image' }
        });

        // Runs when an image is selected.
        holiday_image_12_frame.on('select', function(){

            // Grabs the attachment selection and creates a JSON representation of the model.
            var media_attachment = holiday_image_12_frame.state().get('selection').first().toJSON();

            // Sends the attachment URL to our custom image input field.
            $('#holiday-image-12').val(media_attachment.url);
        });

        // Opens the media library frame.
        holiday_image_12_frame.open();
    });
});

jQuery(document).ready( function($){ "use strict";

// Instantiates the variable that holds the media library frame.
    var holiday_image_13_frame;

    // Runs when the image button is clicked.
    $('#holiday-image-13-button').click(function(e){

        // Prevents the default action from occuring.
        e.preventDefault();

        // If the frame already exists, re-open it.
        if ( holiday_image_13_frame ) {
            holiday_image_13_frame.open();
            return;
        }

        // Sets up the media library frame
        holiday_image_13_frame = wp.media.frames.holiday_image_13_frame = wp.media({
            title: meta_image.title,
            button: { text:  meta_image.button },
            library: { type: 'image' }
        });

        // Runs when an image is selected.
        holiday_image_13_frame.on('select', function(){

            // Grabs the attachment selection and creates a JSON representation of the model.
            var media_attachment = holiday_image_13_frame.state().get('selection').first().toJSON();

            // Sends the attachment URL to our custom image input field.
            $('#holiday-image-13').val(media_attachment.url);
        });

        // Opens the media library frame.
        holiday_image_13_frame.open();
    });
});

jQuery(document).ready( function($){ "use strict";

// Instantiates the variable that holds the media library frame.
    var holiday_image_14_frame;

    // Runs when the image button is clicked.
    $('#holiday-image-14-button').click(function(e){

        // Prevents the default action from occuring.
        e.preventDefault();

        // If the frame already exists, re-open it.
        if ( holiday_image_14_frame ) {
            holiday_image_14_frame.open();
            return;
        }

        // Sets up the media library frame
        holiday_image_14_frame = wp.media.frames.holiday_image_14_frame = wp.media({
            title: meta_image.title,
            button: { text:  meta_image.button },
            library: { type: 'image' }
        });

        // Runs when an image is selected.
        holiday_image_14_frame.on('select', function(){

            // Grabs the attachment selection and creates a JSON representation of the model.
            var media_attachment = holiday_image_14_frame.state().get('selection').first().toJSON();

            // Sends the attachment URL to our custom image input field.
            $('#holiday-image-14').val(media_attachment.url);
        });

        // Opens the media library frame.
        holiday_image_14_frame.open();
    });
});

jQuery(document).ready( function($){ "use strict";

// Instantiates the variable that holds the media library frame.
    var holiday_image_15_frame;

    // Runs when the image button is clicked.
    $('#holiday-image-15-button').click(function(e){

        // Prevents the default action from occuring.
        e.preventDefault();

        // If the frame already exists, re-open it.
        if ( holiday_image_15_frame ) {
            holiday_image_15_frame.open();
            return;
        }

        // Sets up the media library frame
        holiday_image_15_frame = wp.media.frames.holiday_image_15_frame = wp.media({
            title: meta_image.title,
            button: { text:  meta_image.button },
            library: { type: 'image' }
        });

        // Runs when an image is selected.
        holiday_image_15_frame.on('select', function(){

            // Grabs the attachment selection and creates a JSON representation of the model.
            var media_attachment = holiday_image_15_frame.state().get('selection').first().toJSON();

            // Sends the attachment URL to our custom image input field.
            $('#holiday-image-15').val(media_attachment.url);
        });

        // Opens the media library frame.
        holiday_image_15_frame.open();
    });
});

jQuery(document).ready( function($){ "use strict";

// Instantiates the variable that holds the media library frame.
    var holiday_image_16_frame;

    // Runs when the image button is clicked.
    $('#holiday-image-16-button').click(function(e){

        // Prevents the default action from occuring.
        e.preventDefault();

        // If the frame already exists, re-open it.
        if ( holiday_image_16_frame ) {
            holiday_image_16_frame.open();
            return;
        }

        // Sets up the media library frame
        holiday_image_16_frame = wp.media.frames.holiday_image_16_frame = wp.media({
            title: meta_image.title,
            button: { text:  meta_image.button },
            library: { type: 'image' }
        });

        // Runs when an image is selected.
        holiday_image_16_frame.on('select', function(){

            // Grabs the attachment selection and creates a JSON representation of the model.
            var media_attachment = holiday_image_16_frame.state().get('selection').first().toJSON();

            // Sends the attachment URL to our custom image input field.
            $('#holiday-image-16').val(media_attachment.url);
        });

        // Opens the media library frame.
        holiday_image_16_frame.open();
    });
});

jQuery(document).ready( function($){ "use strict";

// Instantiates the variable that holds the media library frame.
    var holiday_image_17_frame;

    // Runs when the image button is clicked.
    $('#holiday-image-17-button').click(function(e){

        // Prevents the default action from occuring.
        e.preventDefault();

        // If the frame already exists, re-open it.
        if ( holiday_image_17_frame ) {
            holiday_image_17_frame.open();
            return;
        }

        // Sets up the media library frame
        holiday_image_17_frame = wp.media.frames.holiday_image_17_frame = wp.media({
            title: meta_image.title,
            button: { text:  meta_image.button },
            library: { type: 'image' }
        });

        // Runs when an image is selected.
        holiday_image_17_frame.on('select', function(){

            // Grabs the attachment selection and creates a JSON representation of the model.
            var media_attachment = holiday_image_17_frame.state().get('selection').first().toJSON();

            // Sends the attachment URL to our custom image input field.
            $('#holiday-image-17').val(media_attachment.url);
        });

        // Opens the media library frame.
        holiday_image_17_frame.open();
    });
});

jQuery(document).ready( function($){ "use strict";

// Instantiates the variable that holds the media library frame.
    var holiday_image_18_frame;

    // Runs when the image button is clicked.
    $('#holiday-image-18-button').click(function(e){

        // Prevents the default action from occuring.
        e.preventDefault();

        // If the frame already exists, re-open it.
        if ( holiday_image_18_frame ) {
            holiday_image_18_frame.open();
            return;
        }

        // Sets up the media library frame
        holiday_image_18_frame = wp.media.frames.holiday_image_18_frame = wp.media({
            title: meta_image.title,
            button: { text:  meta_image.button },
            library: { type: 'image' }
        });

        // Runs when an image is selected.
        holiday_image_18_frame.on('select', function(){

            // Grabs the attachment selection and creates a JSON representation of the model.
            var media_attachment = holiday_image_18_frame.state().get('selection').first().toJSON();

            // Sends the attachment URL to our custom image input field.
            $('#holiday-image-18').val(media_attachment.url);
        });

        // Opens the media library frame.
        holiday_image_18_frame.open();
    });
});

jQuery(document).ready( function($){ "use strict";

// Instantiates the variable that holds the media library frame.
    var holiday_image_19_frame;

    // Runs when the image button is clicked.
    $('#holiday-image-19-button').click(function(e){

        // Prevents the default action from occuring.
        e.preventDefault();

        // If the frame already exists, re-open it.
        if ( holiday_image_19_frame ) {
            holiday_image_19_frame.open();
            return;
        }

        // Sets up the media library frame
        holiday_image_19_frame = wp.media.frames.holiday_image_19_frame = wp.media({
            title: meta_image.title,
            button: { text:  meta_image.button },
            library: { type: 'image' }
        });

        // Runs when an image is selected.
        holiday_image_19_frame.on('select', function(){

            // Grabs the attachment selection and creates a JSON representation of the model.
            var media_attachment = holiday_image_19_frame.state().get('selection').first().toJSON();

            // Sends the attachment URL to our custom image input field.
            $('#holiday-image-19').val(media_attachment.url);
        });

        // Opens the media library frame.
        holiday_image_19_frame.open();
    });
});

jQuery(document).ready( function($){ "use strict";

// Instantiates the variable that holds the media library frame.
    var holiday_image_20_frame;

    // Runs when the image button is clicked.
    $('#holiday-image-20-button').click(function(e){

        // Prevents the default action from occuring.
        e.preventDefault();

        // If the frame already exists, re-open it.
        if ( holiday_image_20_frame ) {
            holiday_image_20_frame.open();
            return;
        }

        // Sets up the media library frame
        holiday_image_20_frame = wp.media.frames.holiday_image_20_frame = wp.media({
            title: meta_image.title,
            button: { text:  meta_image.button },
            library: { type: 'image' }
        });

        // Runs when an image is selected.
        holiday_image_20_frame.on('select', function(){

            // Grabs the attachment selection and creates a JSON representation of the model.
            var media_attachment = holiday_image_20_frame.state().get('selection').first().toJSON();

            // Sends the attachment URL to our custom image input field.
            $('#holiday-image-20').val(media_attachment.url);
        });

        // Opens the media library frame.
        holiday_image_20_frame.open();
    });
});

jQuery(document).ready( function($){ "use strict";

// Instantiates the variable that holds the media library frame.
    var holiday_image_21_frame;

    // Runs when the image button is clicked.
    $('#holiday-image-21-button').click(function(e){

        // Prevents the default action from occuring.
        e.preventDefault();

        // If the frame already exists, re-open it.
        if ( holiday_image_21_frame ) {
            holiday_image_21_frame.open();
            return;
        }

        // Sets up the media library frame
        holiday_image_21_frame = wp.media.frames.holiday_image_21_frame = wp.media({
            title: meta_image.title,
            button: { text:  meta_image.button },
            library: { type: 'image' }
        });

        // Runs when an image is selected.
        holiday_image_21_frame.on('select', function(){

            // Grabs the attachment selection and creates a JSON representation of the model.
            var media_attachment = holiday_image_21_frame.state().get('selection').first().toJSON();

            // Sends the attachment URL to our custom image input field.
            $('#holiday-image-21').val(media_attachment.url);
        });

        // Opens the media library frame.
        holiday_image_21_frame.open();
    });
});

jQuery(document).ready( function($){ "use strict";

// Instantiates the variable that holds the media library frame.
    var holiday_image_22_frame;

    // Runs when the image button is clicked.
    $('#holiday-image-22-button').click(function(e){

        // Prevents the default action from occuring.
        e.preventDefault();

        // If the frame already exists, re-open it.
        if ( holiday_image_22_frame ) {
            holiday_image_22_frame.open();
            return;
        }

        // Sets up the media library frame
        holiday_image_22_frame = wp.media.frames.holiday_image_22_frame = wp.media({
            title: meta_image.title,
            button: { text:  meta_image.button },
            library: { type: 'image' }
        });

        // Runs when an image is selected.
        holiday_image_22_frame.on('select', function(){

            // Grabs the attachment selection and creates a JSON representation of the model.
            var media_attachment = holiday_image_22_frame.state().get('selection').first().toJSON();

            // Sends the attachment URL to our custom image input field.
            $('#holiday-image-22').val(media_attachment.url);
        });

        // Opens the media library frame.
        holiday_image_22_frame.open();
    });
});

jQuery(document).ready( function($){ "use strict";

// Instantiates the variable that holds the media library frame.
    var holiday_image_23_frame;

    // Runs when the image button is clicked.
    $('#holiday-image-23-button').click(function(e){

        // Prevents the default action from occuring.
        e.preventDefault();

        // If the frame already exists, re-open it.
        if ( holiday_image_23_frame ) {
            holiday_image_23_frame.open();
            return;
        }

        // Sets up the media library frame
        holiday_image_23_frame = wp.media.frames.holiday_image_23_frame = wp.media({
            title: meta_image.title,
            button: { text:  meta_image.button },
            library: { type: 'image' }
        });

        // Runs when an image is selected.
        holiday_image_23_frame.on('select', function(){

            // Grabs the attachment selection and creates a JSON representation of the model.
            var media_attachment = holiday_image_23_frame.state().get('selection').first().toJSON();

            // Sends the attachment URL to our custom image input field.
            $('#holiday-image-23').val(media_attachment.url);
        });

        // Opens the media library frame.
        holiday_image_23_frame.open();
    });
});

jQuery(document).ready( function($){ "use strict";

// Instantiates the variable that holds the media library frame.
    var holiday_image_24_frame;

    // Runs when the image button is clicked.
    $('#holiday-image-24-button').click(function(e){

        // Prevents the default action from occuring.
        e.preventDefault();

        // If the frame already exists, re-open it.
        if ( holiday_image_24_frame ) {
            holiday_image_24_frame.open();
            return;
        }

        // Sets up the media library frame
        holiday_image_24_frame = wp.media.frames.holiday_image_24_frame = wp.media({
            title: meta_image.title,
            button: { text:  meta_image.button },
            library: { type: 'image' }
        });

        // Runs when an image is selected.
        holiday_image_24_frame.on('select', function(){

            // Grabs the attachment selection and creates a JSON representation of the model.
            var media_attachment = holiday_image_24_frame.state().get('selection').first().toJSON();

            // Sends the attachment URL to our custom image input field.
            $('#holiday-image-24').val(media_attachment.url);
        });

        // Opens the media library frame.
        holiday_image_24_frame.open();
    });

    // Instantiates the variable that holds the media library frame.
    var holiday_image_25_frame;

    // Runs when the image button is clicked.
    $('#holiday-image-25-button').click(function(e){

        // Prevents the default action from occuring.
        e.preventDefault();

        // If the frame already exists, re-open it.
        if ( holiday_image_25_frame ) {
            holiday_image_25_frame.open();
            return;
        }

        // Sets up the media library frame
        holiday_image_25_frame = wp.media.frames.holiday_image_25_frame = wp.media({
            title: meta_image.title,
            button: { text:  meta_image.button },
            library: { type: 'image' }
        });

        // Runs when an image is selected.
        holiday_image_25_frame.on('select', function(){

            // Grabs the attachment selection and creates a JSON representation of the model.
            var media_attachment = holiday_image_25_frame.state().get('selection').first().toJSON();

            // Sends the attachment URL to our custom image input field.
            $('#holiday-image-25').val(media_attachment.url);
        });

        // Opens the media library frame.
        holiday_image_25_frame.open();
    });

    // Instantiates the variable that holds the media library frame.
    var holiday_image_26_frame;

    // Runs when the image button is clicked.
    $('#holiday-image-26-button').click(function(e){

        // Prevents the default action from occuring.
        e.preventDefault();

        // If the frame already exists, re-open it.
        if ( holiday_image_26_frame ) {
            holiday_image_26_frame.open();
            return;
        }

        // Sets up the media library frame
        holiday_image_26_frame = wp.media.frames.holiday_image_26_frame = wp.media({
            title: meta_image.title,
            button: { text:  meta_image.button },
            library: { type: 'image' }
        });

        // Runs when an image is selected.
        holiday_image_26_frame.on('select', function(){

            // Grabs the attachment selection and creates a JSON representation of the model.
            var media_attachment = holiday_image_26_frame.state().get('selection').first().toJSON();

            // Sends the attachment URL to our custom image input field.
            $('#holiday-image-26').val(media_attachment.url);
        });

        // Opens the media library frame.
        holiday_image_26_frame.open();
    });

    // Instantiates the variable that holds the media library frame.
    var holiday_image_27_frame;

    // Runs when the image button is clicked.
    $('#holiday-image-27-button').click(function(e){

        // Prevents the default action from occuring.
        e.preventDefault();

        // If the frame already exists, re-open it.
        if ( holiday_image_27_frame ) {
            holiday_image_27_frame.open();
            return;
        }

        // Sets up the media library frame
        holiday_image_27_frame = wp.media.frames.holiday_image_27_frame = wp.media({
            title: meta_image.title,
            button: { text:  meta_image.button },
            library: { type: 'image' }
        });

        // Runs when an image is selected.
        holiday_image_27_frame.on('select', function(){

            // Grabs the attachment selection and creates a JSON representation of the model.
            var media_attachment = holiday_image_27_frame.state().get('selection').first().toJSON();

            // Sends the attachment URL to our custom image input field.
            $('#holiday-image-27').val(media_attachment.url);
        });

        // Opens the media library frame.
        holiday_image_27_frame.open();
    });

    // Instantiates the variable that holds the media library frame.
    var holiday_image_28_frame;

    // Runs when the image button is clicked.
    $('#holiday-image-28-button').click(function(e){

        // Prevents the default action from occuring.
        e.preventDefault();

        // If the frame already exists, re-open it.
        if ( holiday_image_28_frame ) {
            holiday_image_28_frame.open();
            return;
        }

        // Sets up the media library frame
        holiday_image_28_frame = wp.media.frames.holiday_image_28_frame = wp.media({
            title: meta_image.title,
            button: { text:  meta_image.button },
            library: { type: 'image' }
        });

        // Runs when an image is selected.
        holiday_image_28_frame.on('select', function(){

            // Grabs the attachment selection and creates a JSON representation of the model.
            var media_attachment = holiday_image_28_frame.state().get('selection').first().toJSON();

            // Sends the attachment URL to our custom image input field.
            $('#holiday-image-28').val(media_attachment.url);
        });

        // Opens the media library frame.
        holiday_image_28_frame.open();
    });

    // Instantiates the variable that holds the media library frame.
    var holiday_image_29_frame;

    // Runs when the image button is clicked.
    $('#holiday-image-29-button').click(function(e){

        // Prevents the default action from occuring.
        e.preventDefault();

        // If the frame already exists, re-open it.
        if ( holiday_image_29_frame ) {
            holiday_image_29_frame.open();
            return;
        }

        // Sets up the media library frame
        holiday_image_29_frame = wp.media.frames.holiday_image_29_frame = wp.media({
            title: meta_image.title,
            button: { text:  meta_image.button },
            library: { type: 'image' }
        });

        // Runs when an image is selected.
        holiday_image_29_frame.on('select', function(){

            // Grabs the attachment selection and creates a JSON representation of the model.
            var media_attachment = holiday_image_29_frame.state().get('selection').first().toJSON();

            // Sends the attachment URL to our custom image input field.
            $('#holiday-image-29').val(media_attachment.url);
        });

        // Opens the media library frame.
        holiday_image_29_frame.open();
    });

    // Instantiates the variable that holds the media library frame.
    var holiday_image_30_frame;

    // Runs when the image button is clicked.
    $('#holiday-image-30-button').click(function(e){

        // Prevents the default action from occuring.
        e.preventDefault();

        // If the frame already exists, re-open it.
        if ( holiday_image_30_frame ) {
            holiday_image_30_frame.open();
            return;
        }

        // Sets up the media library frame
        holiday_image_30_frame = wp.media.frames.holiday_image_30_frame = wp.media({
            title: meta_image.title,
            button: { text:  meta_image.button },
            library: { type: 'image' }
        });

        // Runs when an image is selected.
        holiday_image_30_frame.on('select', function(){

            // Grabs the attachment selection and creates a JSON representation of the model.
            var media_attachment = holiday_image_30_frame.state().get('selection').first().toJSON();

            // Sends the attachment URL to our custom image input field.
            $('#holiday-image-30').val(media_attachment.url);
        });

        // Opens the media library frame.
        holiday_image_30_frame.open();
    });

    // Instantiates the variable that holds the media library frame.
    var holiday_image_31_frame;

    // Runs when the image button is clicked.
    $('#holiday-image-31-button').click(function(e){

        // Prevents the default action from occuring.
        e.preventDefault();

        // If the frame already exists, re-open it.
        if ( holiday_image_31_frame ) {
            holiday_image_31_frame.open();
            return;
        }

        // Sets up the media library frame
        holiday_image_31_frame = wp.media.frames.holiday_image_31_frame = wp.media({
            title: meta_image.title,
            button: { text:  meta_image.button },
            library: { type: 'image' }
        });

        // Runs when an image is selected.
        holiday_image_31_frame.on('select', function(){

            // Grabs the attachment selection and creates a JSON representation of the model.
            var media_attachment = holiday_image_31_frame.state().get('selection').first().toJSON();

            // Sends the attachment URL to our custom image input field.
            $('#holiday-image-31').val(media_attachment.url);
        });

        // Opens the media library frame.
        holiday_image_31_frame.open();
    });

    // Instantiates the variable that holds the media library frame.
    var holiday_image_32_frame;

    // Runs when the image button is clicked.
    $('#holiday-image-32-button').click(function(e){

        // Prevents the default action from occuring.
        e.preventDefault();

        // If the frame already exists, re-open it.
        if ( holiday_image_32_frame ) {
            holiday_image_32_frame.open();
            return;
        }

        // Sets up the media library frame
        holiday_image_32_frame = wp.media.frames.holiday_image_32_frame = wp.media({
            title: meta_image.title,
            button: { text:  meta_image.button },
            library: { type: 'image' }
        });

        // Runs when an image is selected.
        holiday_image_32_frame.on('select', function(){

            // Grabs the attachment selection and creates a JSON representation of the model.
            var media_attachment = holiday_image_32_frame.state().get('selection').first().toJSON();

            // Sends the attachment URL to our custom image input field.
            $('#holiday-image-32').val(media_attachment.url);
        });

        // Opens the media library frame.
        holiday_image_32_frame.open();
    });

    // Instantiates the variable that holds the media library frame.
    var holiday_image_33_frame;

    // Runs when the image button is clicked.
    $('#holiday-image-33-button').click(function(e){

        // Prevents the default action from occuring.
        e.preventDefault();

        // If the frame already exists, re-open it.
        if ( holiday_image_33_frame ) {
            holiday_image_33_frame.open();
            return;
        }

        // Sets up the media library frame
        holiday_image_33_frame = wp.media.frames.holiday_image_33_frame = wp.media({
            title: meta_image.title,
            button: { text:  meta_image.button },
            library: { type: 'image' }
        });

        // Runs when an image is selected.
        holiday_image_33_frame.on('select', function(){

            // Grabs the attachment selection and creates a JSON representation of the model.
            var media_attachment = holiday_image_33_frame.state().get('selection').first().toJSON();

            // Sends the attachment URL to our custom image input field.
            $('#holiday-image-33').val(media_attachment.url);
        });

        // Opens the media library frame.
        holiday_image_33_frame.open();
    });

    // Instantiates the variable that holds the media library frame.
    var holiday_image_34_frame;

    // Runs when the image button is clicked.
    $('#holiday-image-34-button').click(function(e){

        // Prevents the default action from occuring.
        e.preventDefault();

        // If the frame already exists, re-open it.
        if ( holiday_image_34_frame ) {
            holiday_image_34_frame.open();
            return;
        }

        // Sets up the media library frame
        holiday_image_34_frame = wp.media.frames.holiday_image_34_frame = wp.media({
            title: meta_image.title,
            button: { text:  meta_image.button },
            library: { type: 'image' }
        });

        // Runs when an image is selected.
        holiday_image_34_frame.on('select', function(){

            // Grabs the attachment selection and creates a JSON representation of the model.
            var media_attachment = holiday_image_34_frame.state().get('selection').first().toJSON();

            // Sends the attachment URL to our custom image input field.
            $('#holiday-image-34').val(media_attachment.url);
        });

        // Opens the media library frame.
        holiday_image_34_frame.open();
    });

    // Instantiates the variable that holds the media library frame.
    var holiday_image_35_frame;

    // Runs when the image button is clicked.
    $('#holiday-image-35-button').click(function(e){

        // Prevents the default action from occuring.
        e.preventDefault();

        // If the frame already exists, re-open it.
        if ( holiday_image_35_frame ) {
            holiday_image_35_frame.open();
            return;
        }

        // Sets up the media library frame
        holiday_image_35_frame = wp.media.frames.holiday_image_35_frame = wp.media({
            title: meta_image.title,
            button: { text:  meta_image.button },
            library: { type: 'image' }
        });

        // Runs when an image is selected.
        holiday_image_35_frame.on('select', function(){

            // Grabs the attachment selection and creates a JSON representation of the model.
            var media_attachment = holiday_image_35_frame.state().get('selection').first().toJSON();

            // Sends the attachment URL to our custom image input field.
            $('#holiday-image-35').val(media_attachment.url);
        });

        // Opens the media library frame.
        holiday_image_35_frame.open();
    });

    // Instantiates the variable that holds the media library frame.
    var holiday_image_36_frame;

    // Runs when the image button is clicked.
    $('#holiday-image-36-button').click(function(e){

        // Prevents the default action from occuring.
        e.preventDefault();

        // If the frame already exists, re-open it.
        if ( holiday_image_36_frame ) {
            holiday_image_36_frame.open();
            return;
        }

        // Sets up the media library frame
        holiday_image_36_frame = wp.media.frames.holiday_image_36_frame = wp.media({
            title: meta_image.title,
            button: { text:  meta_image.button },
            library: { type: 'image' }
        });

        // Runs when an image is selected.
        holiday_image_36_frame.on('select', function(){

            // Grabs the attachment selection and creates a JSON representation of the model.
            var media_attachment = holiday_image_36_frame.state().get('selection').first().toJSON();

            // Sends the attachment URL to our custom image input field.
            $('#holiday-image-36').val(media_attachment.url);
        });

        // Opens the media library frame.
        holiday_image_36_frame.open();
    });

    // Instantiates the variable that holds the media library frame.
    var holiday_image_37_frame;

    // Runs when the image button is clicked.
    $('#holiday-image-37-button').click(function(e){

        // Prevents the default action from occuring.
        e.preventDefault();

        // If the frame already exists, re-open it.
        if ( holiday_image_37_frame ) {
            holiday_image_37_frame.open();
            return;
        }

        // Sets up the media library frame
        holiday_image_37_frame = wp.media.frames.holiday_image_37_frame = wp.media({
            title: meta_image.title,
            button: { text:  meta_image.button },
            library: { type: 'image' }
        });

        // Runs when an image is selected.
        holiday_image_37_frame.on('select', function(){

            // Grabs the attachment selection and creates a JSON representation of the model.
            var media_attachment = holiday_image_37_frame.state().get('selection').first().toJSON();

            // Sends the attachment URL to our custom image input field.
            $('#holiday-image-37').val(media_attachment.url);
        });

        // Opens the media library frame.
        holiday_image_37_frame.open();
    });

    // Instantiates the variable that holds the media library frame.
    var holiday_image_38_frame;

    // Runs when the image button is clicked.
    $('#holiday-image-38-button').click(function(e){

        // Prevents the default action from occuring.
        e.preventDefault();

        // If the frame already exists, re-open it.
        if ( holiday_image_38_frame ) {
            holiday_image_38_frame.open();
            return;
        }

        // Sets up the media library frame
        holiday_image_38_frame = wp.media.frames.holiday_image_38_frame = wp.media({
            title: meta_image.title,
            button: { text:  meta_image.button },
            library: { type: 'image' }
        });

        // Runs when an image is selected.
        holiday_image_38_frame.on('select', function(){

            // Grabs the attachment selection and creates a JSON representation of the model.
            var media_attachment = holiday_image_38_frame.state().get('selection').first().toJSON();

            // Sends the attachment URL to our custom image input field.
            $('#holiday-image-38').val(media_attachment.url);
        });

        // Opens the media library frame.
        holiday_image_38_frame.open();
    });

    // Instantiates the variable that holds the media library frame.
    var holiday_image_39_frame;

    // Runs when the image button is clicked.
    $('#holiday-image-39-button').click(function(e){

        // Prevents the default action from occuring.
        e.preventDefault();

        // If the frame already exists, re-open it.
        if ( holiday_image_39_frame ) {
            holiday_image_39_frame.open();
            return;
        }

        // Sets up the media library frame
        holiday_image_39_frame = wp.media.frames.holiday_image_39_frame = wp.media({
            title: meta_image.title,
            button: { text:  meta_image.button },
            library: { type: 'image' }
        });

        // Runs when an image is selected.
        holiday_image_39_frame.on('select', function(){

            // Grabs the attachment selection and creates a JSON representation of the model.
            var media_attachment = holiday_image_39_frame.state().get('selection').first().toJSON();

            // Sends the attachment URL to our custom image input field.
            $('#holiday-image-39').val(media_attachment.url);
        });

        // Opens the media library frame.
        holiday_image_39_frame.open();
    });

    // Instantiates the variable that holds the media library frame.
    var holiday_image_40_frame;

    // Runs when the image button is clicked.
    $('#holiday-image-40-button').click(function(e){

        // Prevents the default action from occuring.
        e.preventDefault();

        // If the frame already exists, re-open it.
        if ( holiday_image_40_frame ) {
            holiday_image_40_frame.open();
            return;
        }

        // Sets up the media library frame
        holiday_image_40_frame = wp.media.frames.holiday_image_40_frame = wp.media({
            title: meta_image.title,
            button: { text:  meta_image.button },
            library: { type: 'image' }
        });

        // Runs when an image is selected.
        holiday_image_40_frame.on('select', function(){

            // Grabs the attachment selection and creates a JSON representation of the model.
            var media_attachment = holiday_image_40_frame.state().get('selection').first().toJSON();

            // Sends the attachment URL to our custom image input field.
            $('#holiday-image-40').val(media_attachment.url);
        });

        // Opens the media library frame.
        holiday_image_40_frame.open();
    });

    // Instantiates the variable that holds the media library frame.
    var holiday_image_41_frame;

    // Runs when the image button is clicked.
    $('#holiday-image-41-button').click(function(e){

        // Prevents the default action from occuring.
        e.preventDefault();

        // If the frame already exists, re-open it.
        if ( holiday_image_41_frame ) {
            holiday_image_41_frame.open();
            return;
        }

        // Sets up the media library frame
        holiday_image_41_frame = wp.media.frames.holiday_image_41_frame = wp.media({
            title: meta_image.title,
            button: { text:  meta_image.button },
            library: { type: 'image' }
        });

        // Runs when an image is selected.
        holiday_image_41_frame.on('select', function(){

            // Grabs the attachment selection and creates a JSON representation of the model.
            var media_attachment = holiday_image_41_frame.state().get('selection').first().toJSON();

            // Sends the attachment URL to our custom image input field.
            $('#holiday-image-41').val(media_attachment.url);
        });

        // Opens the media library frame.
        holiday_image_41_frame.open();
    });

    // Instantiates the variable that holds the media library frame.
    var holiday_image_42_frame;

    // Runs when the image button is clicked.
    $('#holiday-image-42-button').click(function(e){

        // Prevents the default action from occuring.
        e.preventDefault();

        // If the frame already exists, re-open it.
        if ( holiday_image_42_frame ) {
            holiday_image_42_frame.open();
            return;
        }

        // Sets up the media library frame
        holiday_image_42_frame = wp.media.frames.holiday_image_42_frame = wp.media({
            title: meta_image.title,
            button: { text:  meta_image.button },
            library: { type: 'image' }
        });

        // Runs when an image is selected.
        holiday_image_42_frame.on('select', function(){

            // Grabs the attachment selection and creates a JSON representation of the model.
            var media_attachment = holiday_image_42_frame.state().get('selection').first().toJSON();

            // Sends the attachment URL to our custom image input field.
            $('#holiday-image-42').val(media_attachment.url);
        });

        // Opens the media library frame.
        holiday_image_42_frame.open();
    });
});

jQuery(document).ready( function($){ "use strict";

// Instantiates the variable that holds the media library frame.
    var holiday_centered_image_frame;

    // Runs when the image button is clicked.
    $('#holiday-centered-image-button').click(function(e){

        // Prevents the default action from occuring.
        e.preventDefault();

        // If the frame already exists, re-open it.
        if ( holiday_centered_image_frame ) {
            holiday_centered_image_frame.open();
            return;
        }

        // Sets up the media library frame
        holiday_centered_image_frame = wp.media.frames.holiday_centered_image_frame = wp.media({
            title: meta_image.title,
            button: { text:  meta_image.button },
            library: { type: 'image' }
        });

        // Runs when an image is selected.
        holiday_centered_image_frame.on('select', function(){

            // Grabs the attachment selection and creates a JSON representation of the model.
            var media_attachment = holiday_centered_image_frame.state().get('selection').first().toJSON();

            // Sends the attachment URL to our custom image input field.
            $('#holiday-centered-image').val(media_attachment.url);
        });

        // Opens the media library frame.
        holiday_centered_image_frame.open();
    });
});

jQuery(document).ready( function($){ "use strict";

// Instantiates the variable that holds the media library frame.
    var holiday_centered_l_frame;

    // Runs when the image button is clicked.
    $('#holiday-centered-l-button').click(function(e){

        // Prevents the default action from occuring.
        e.preventDefault();

        // If the frame already exists, re-open it.
        if ( holiday_centered_l_frame ) {
            holiday_centered_l_frame.open();
            return;
        }

        // Sets up the media library frame
        holiday_centered_l_frame = wp.media.frames.holiday_centered_l_frame = wp.media({
            title: meta_image.title,
            button: { text:  meta_image.button },
            library: { type: 'image' }
        });

        // Runs when an image is selected.
        holiday_centered_l_frame.on('select', function(){

            // Grabs the attachment selection and creates a JSON representation of the model.
            var media_attachment = holiday_centered_l_frame.state().get('selection').first().toJSON();

            // Sends the attachment URL to our custom image input field.
            $('#holiday-centered-l').val(media_attachment.url);
        });

        // Opens the media library frame.
        holiday_centered_l_frame.open();
    });
});

jQuery(document).ready( function($){ "use strict";

// Instantiates the variable that holds the media library frame.
    var holiday_centered_r_frame;

    // Runs when the image button is clicked.
    $('#holiday-centered-r-button').click(function(e){

        // Prevents the default action from occuring.
        e.preventDefault();

        // If the frame already exists, re-open it.
        if ( holiday_centered_r_frame ) {
            holiday_centered_r_frame.open();
            return;
        }

        // Sets up the media library frame
        holiday_centered_r_frame = wp.media.frames.holiday_centered_r_frame = wp.media({
            title: meta_image.title,
            button: { text:  meta_image.button },
            library: { type: 'image' }
        });

        // Runs when an image is selected.
        holiday_centered_r_frame.on('select', function(){

            // Grabs the attachment selection and creates a JSON representation of the model.
            var media_attachment = holiday_centered_r_frame.state().get('selection').first().toJSON();

            // Sends the attachment URL to our custom image input field.
            $('#holiday-centered-r').val(media_attachment.url);
        });

        // Opens the media library frame.
        holiday_centered_r_frame.open();
    });
});

jQuery(document).ready( function($){ "use strict";

    // Instantiates the variable that holds the media library frame.
    var holiday_events_image_1_frame;

    // Runs when the image button is clicked.
    $('#holiday-events-image-1-button').click(function(e){

        // Prevents the default action from occuring.
        e.preventDefault();

        // If the frame already exists, re-open it.
        if ( holiday_events_image_1_frame ) {
            holiday_events_image_1_frame.open();
            return;
        }

        // Sets up the media library frame
        holiday_events_image_1_frame = wp.media.frames.holiday_events_image_1_frame = wp.media({
            title: meta_image.title,
            button: { text:  meta_image.button },
            library: { type: 'image' }
        });

        // Runs when an image is selected.
        holiday_events_image_1_frame.on('select', function(){

            // Grabs the attachment selection and creates a JSON representation of the model.
            var media_attachment = holiday_events_image_1_frame.state().get('selection').first().toJSON();

            // Sends the attachment URL to our custom image input field.
            $('#holiday-events-image-1').val(media_attachment.url);
        });

        // Opens the media library frame.
        holiday_events_image_1_frame.open();
    });

// Instantiates the variable that holds the media library frame.
    var holiday_events_image_2_frame;

    // Runs when the image button is clicked.
    $('#holiday-events-image-2-button').click(function(e){

        // Prevents the default action from occuring.
        e.preventDefault();

        // If the frame already exists, re-open it.
        if ( holiday_events_image_2_frame ) {
            holiday_events_image_2_frame.open();
            return;
        }

        // Sets up the media library frame
        holiday_events_image_2_frame = wp.media.frames.holiday_events_image_2_frame = wp.media({
            title: meta_image.title,
            button: { text:  meta_image.button },
            library: { type: 'image' }
        });

        // Runs when an image is selected.
        holiday_events_image_2_frame.on('select', function(){

            // Grabs the attachment selection and creates a JSON representation of the model.
            var media_attachment = holiday_events_image_2_frame.state().get('selection').first().toJSON();

            // Sends the attachment URL to our custom image input field.
            $('#holiday-events-image-2').val(media_attachment.url);
        });

        // Opens the media library frame.
        holiday_events_image_2_frame.open();
    });
});