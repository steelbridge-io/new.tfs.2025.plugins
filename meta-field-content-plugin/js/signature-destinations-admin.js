/**
 * Signature Destinations Repeater Admin JS
 * Uses event delegation - no hardcoded IDs needed!
 */

jQuery(document).ready(function($){ "use strict";

    let rowCount = $('.signature-destination-row').length;

    /**
     * Add new destination row
     */
    $(document).on('click', '.add-destination-row', function(e) {
        e.preventDefault();

        const newIndex = rowCount++;
        const template = getDestinationRowTemplate(newIndex);

        const $container = $('.signature-destinations-container');
        $container.append(template);
        updateRowNumbers();

        // Scroll to the new row
        const $newRow = $container.find('.signature-destination-row').last();
        if ($newRow.length) {
            $('html, body').animate({
                scrollTop: $newRow.offset().top - 150
            }, 500);

            // Highlight the new row briefly
            $newRow.css('background-color', '#fff9c4');
            setTimeout(function() {
                $newRow.css('background-color', '#fff');
            }, 2000);
        }
    });

    /**
     * Scroll to bottom
     */
    $(document).on('click', '.scroll-to-bottom', function(e) {
        e.preventDefault();
        const $container = $('.signature-destinations-container');
        const $lastRow = $container.find('.signature-destination-row').last();

        if ($lastRow.length) {
            $('html, body').animate({
                scrollTop: $lastRow.offset().top - 150
            }, 500);
        }
    });

    /**
     * Remove destination row
     */
    $(document).on('click', '.remove-destination-row', function(e) {
        e.preventDefault();

        if ($('.signature-destination-row').length <= 1) {
            alert('You must have at least one destination row.');
            return;
        }

        if (confirm('Are you sure you want to remove this destination?')) {
            $(this).closest('.signature-destination-row').fadeOut(300, function() {
                $(this).remove();
                updateRowNumbers();
            });
        }
    });

    /**
     * Toggle destination row collapse/expand
     */
    $(document).on('click', '.toggle-destination', function(e) {
        e.preventDefault();

        const $row = $(this).closest('.signature-destination-row');
        const $icon = $(this).find('.dashicons');

        $row.toggleClass('collapsed');

        if ($row.hasClass('collapsed')) {
            $icon.removeClass('dashicons-arrow-up-alt2').addClass('dashicons-arrow-down-alt2');
        } else {
            $icon.removeClass('dashicons-arrow-down-alt2').addClass('dashicons-arrow-up-alt2');
        }
    });

    /**
     * Update title in header when title field changes
     */
    $(document).on('input', '.destination-title-input', function() {
        const title = $(this).val() || 'New Destination';
        $(this).closest('.signature-destination-row').find('.destination-header h4').text(title);
    });

    /**
     * WordPress Media Uploader - Event delegation
     */
    $(document).on('click', '.upload-destination-image', function(e) {
        e.preventDefault();
        e.stopImmediatePropagation();

        const $button = $(this);
        const $row = $button.closest('.signature-destination-row');
        const $input = $row.find('.destination-image-url');
        const $previewContainer = $row.find('.image-preview-container');
        const $removeBtn = $row.find('.remove-destination-image');

        // Create media frame
        const frame = wp.media({
            title: 'Choose or Upload an Image',
            button: { text: 'Use this image' },
            library: { type: 'image' },
            multiple: false
        });

        // When image is selected
        frame.on('select', function() {
            const attachment = frame.state().get('selection').first().toJSON();

            // Update input field
            $input.val(attachment.url);

            // Update preview
            $previewContainer.html(
                '<div class="image-preview"><img src="' + attachment.url + '" alt="Preview"></div>'
            );

            // Show remove button
            $removeBtn.show();

            frame.close();
        });

        frame.open();
    });

    /**
     * Remove image
     */
    $(document).on('click', '.remove-destination-image', function(e) {
        e.preventDefault();

        const $row = $(this).closest('.signature-destination-row');
        const $input = $row.find('.destination-image-url');
        const $previewContainer = $row.find('.image-preview-container');

        $input.val('');
        $previewContainer.html('<div class="image-preview empty">No image selected</div>');
        $(this).hide();
    });

    /**
     * Make rows sortable (drag and drop)
     */
    if (typeof $.fn.sortable !== 'undefined') {
        $('.signature-destinations-container').sortable({
            handle: '.destination-header',
            placeholder: 'sortable-placeholder',
            start: function(e, ui) {
                ui.placeholder.height(ui.item.height());
            },
            stop: function(e, ui) {
                updateRowNumbers();
            }
        });
    }

    /**
     * Update row numbers and field names after reordering
     */
    function updateRowNumbers() {
        $('.signature-destination-row').each(function(index) {
            $(this).attr('data-index', index);

            // Update field names
            $(this).find('input, textarea').each(function() {
                const name = $(this).attr('name');
                if (name) {
                    const newName = name.replace(/\[\d+\]/, '[' + index + ']');
                    $(this).attr('name', newName);
                }
            });

            // Update button data-index
            $(this).find('.upload-destination-image, .remove-destination-image').attr('data-index', index);

            // Update header title if it's just a number
            const $header = $(this).find('.destination-header h4');
            const currentTitle = $header.text();
            if (currentTitle.match(/^Destination #\d+$/) || currentTitle === 'New Destination') {
                $header.text('Destination #' + (index + 1));
            }
        });
    }

    /**
     * Template for new destination row
     */
    function getDestinationRowTemplate(index) {
        return `
            <div class="signature-destination-row" data-index="${index}">
                <div class="destination-header">
                    <span class="dashicons dashicons-menu" style="cursor: move; color: #999;"></span>
                    <h4>Destination #${index + 1}</h4>
                    <div class="destination-controls">
                        <button type="button" class="button toggle-destination">
                            <span class="dashicons dashicons-arrow-up-alt2"></span>
                        </button>
                        <button type="button" class="button button-link-delete remove-destination-row" style="color: #b32d2e;">
                            <span class="dashicons dashicons-trash"></span> Remove
                        </button>
                    </div>
                </div>

                <div class="destination-fields">
                    <div class="destination-field">
                        <label>Title</label>
                        <input type="text"
                               name="signature_destinations[${index}][title]"
                               value=""
                               class="destination-title-input"
                               placeholder="Destination title">
                    </div>

                    <div class="destination-field">
                        <label>Link URL</label>
                        <input type="url"
                               name="signature_destinations[${index}][link]"
                               value=""
                               placeholder="https://example.com/destination">
                    </div>

                    <div class="destination-field">
                        <label>Image</label>
                        <div class="image-upload-group">
                            <input type="text"
                                   name="signature_destinations[${index}][image]"
                                   value=""
                                   class="destination-image-url"
                                   placeholder="Image URL"
                                   readonly>
                            <button type="button" class="button upload-destination-image" data-index="${index}">
                                Choose Image
                            </button>
                            <button type="button" class="button remove-destination-image" data-index="${index}" style="display:none;">
                                Remove
                            </button>
                        </div>
                        <div class="image-preview-container" style="margin-top: 10px;">
                            <div class="image-preview empty">No image selected</div>
                        </div>
                    </div>

                    <div class="destination-field">
                        <label>Description/Caption</label>
                        <textarea name="signature_destinations[${index}][caption]"
                                  rows="4"
                                  placeholder="Enter destination description"></textarea>
                    </div>
                </div>
            </div>
        `;
    }

    // Initialize on load
    updateRowNumbers();
});
