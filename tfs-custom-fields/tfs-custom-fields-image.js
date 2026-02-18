jQuery(document).ready(function($) {
    "use strict";

    // Store all media frames
    var mediaFrames = {};

    // Generic image upload handler using event delegation
    // Only target specific groups of buttons to avoid conflicts with other plugins
    var selectors = [
        '[id^="additional-"][id$="-button"]',
        '[id^="dest-"][id$="-button"]',
        '[id^="publication-cta-img-"][id$="-button"]',
        '#blog-template-logo-button',
        '#travel-costs-image-button',
        '#travel-seasons-image-button',
        '#feature-3-getting-to-image-button',
        '#feature-4-lodging-img-button',
        '#feature-5-angling-img-button',
        '#feature-6-species-img-button',
        '#guide-service-logo-button'
    ];

    $(document).on('click', selectors.join(', '), function(e) {
        e.preventDefault();
        e.stopImmediatePropagation();

        var $button = $(this);
        var buttonId = $button.attr('id');

        // Extract the field ID by removing '-button' suffix
        var fieldId = buttonId.replace('-button', '');
        var $field = $('#' + fieldId);

        // Only proceed if this is an image upload button
        if ($field.length === 0 || $field.attr('type') !== 'text') {
            return;
        }

        // Create a new media frame every time to avoid state management issues
        var frame = wp.media({
            title: meta_image.title,
            button: { text: meta_image.button },
            library: { type: 'image' },
            multiple: false
        });

        // When an image is selected
        frame.on('select', function() {
            var attachment = frame.state().get('selection').first().toJSON();

            // Set the image URL
            $field.val(attachment.url);

            // Update preview if preview container exists
            updateImagePreview(fieldId, attachment.url);

            // Close the media frame
            frame.close();
        });

        // Open the media frame
        frame.open();
    });

    // Generic remove image handler
    $(document).on('click', '[id$="-remove"]', function(e) {
        e.preventDefault();
        e.stopImmediatePropagation();

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