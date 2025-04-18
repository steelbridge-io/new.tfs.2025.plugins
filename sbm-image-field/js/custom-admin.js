jQuery(document).ready(function($) {
    // Check if the "Add Row" button is present and has been clicked
    if ($('#addRow').length > 0 && sessionStorage.getItem('addRowClicked')) {
        // Scroll to the meta box container
        var metaBoxContainer = $('.postbox-container');
        var scrollTo = metaBoxContainer.offset().top + metaBoxContainer.height();
        $('html, body').animate({
            scrollTop: scrollTo
        }, 500);

        // Clear the sessionStorage value
        sessionStorage.removeItem('addRowClicked');
    }

    // Set sessionStorage when the "Add Row" button is clicked
    $('#addRow').on('click', function() {
        sessionStorage.setItem('addRowClicked', true);
    });
});
