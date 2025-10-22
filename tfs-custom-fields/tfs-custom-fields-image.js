jQuery(document).ready(function($) {
    "use strict";

    // Store all media frames
    var mediaFrames = {};

    // Generic image upload handler using event delegation
    $(document).on('click', '[id$="-button"]', function(e) {
        e.preventDefault();

        var $button = $(this);
        var buttonId = $button.attr('id');

        // Extract the field ID by removing '-button' suffix
        var fieldId = buttonId.replace('-button', '');
        var $field = $('#' + fieldId);

        // Only proceed if this is an image upload button
        if ($field.length === 0 || $field.attr('type') !== 'text') {
            return;
        }

        // If the frame already exists, re-open it
        if (mediaFrames[fieldId]) {
            mediaFrames[fieldId].open();
            return;
        }

        // Create the media frame
        mediaFrames[fieldId] = wp.media({
            title: meta_image.title,
            button: { text: meta_image.button },
            library: { type: 'image' }
        });

        // When an image is selected
        mediaFrames[fieldId].on('select', function() {
            var attachment = mediaFrames[fieldId].state().get('selection').first().toJSON();

            // Set the image URL
            $field.val(attachment.url);

            // Update preview if preview container exists
            updateImagePreview(fieldId, attachment.url);
        });

        // Open the media frame
        mediaFrames[fieldId].open();
    });

    // Generic remove image handler
    $(document).on('click', '[id$="-remove"]', function(e) {
        e.preventDefault();

        var $button = $(this);
        var buttonId = $button.attr('id');

        // Extract the field ID by removing '-remove' suffix
        var fieldId = buttonId.replace('-remove', '');

        // Clear the field and preview
        $('#' + fieldId).val('');
        $('#' + fieldId + '-preview').html('');
    });

    // Update image preview function
    function updateImagePreview(fieldId, imageUrl) {
        var $previewContainer = $('#' + fieldId + '-preview');

        if ($previewContainer.length === 0) {
            return;
        }

        var previewHtml = '<img src="' + imageUrl + '" style="max-width: 250px; max-height: 250px; border: 1px solid #ddd; padding: 5px;" alt="Preview" />' +
            '<br><button type="button" id="' + fieldId + '-remove" class="button" style="margin-top: 5px;">Remove Image</button>';

        $previewContainer.html(previewHtml);
    }
});