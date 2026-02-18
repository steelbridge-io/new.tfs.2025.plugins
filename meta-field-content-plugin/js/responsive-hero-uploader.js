/**
 * Media uploader for responsive hero images
 * Handles mobile and tablet image selection
 */

jQuery(document).ready(function($) {
    
    // Mobile portrait image uploader
    var mobileFrame;
    $('#hero-image-mobile-button').on('click', function(e) {
        e.preventDefault();
        
        if (mobileFrame) {
            mobileFrame.open();
            return;
        }
        
        mobileFrame = wp.media({
            title: 'Choose Mobile Portrait Hero Image',
            button: {
                text: 'Use this image'
            },
            multiple: false
        });
        
        mobileFrame.on('select', function() {
            var attachment = mobileFrame.state().get('selection').first().toJSON();
            $('#hero-image-mobile').val(attachment.url);
        });
        
        mobileFrame.open();
    });
    
    // Mobile landscape image uploader
    var mobileLandscapeFrame;
    $('#hero-image-mobile-landscape-button').on('click', function(e) {
        e.preventDefault();
        
        if (mobileLandscapeFrame) {
            mobileLandscapeFrame.open();
            return;
        }
        
        mobileLandscapeFrame = wp.media({
            title: 'Choose Mobile Landscape Hero Image',
            button: {
                text: 'Use this image'
            },
            multiple: false
        });
        
        mobileLandscapeFrame.on('select', function() {
            var attachment = mobileLandscapeFrame.state().get('selection').first().toJSON();
            $('#hero-image-mobile-landscape').val(attachment.url);
        });
        
        mobileLandscapeFrame.open();
    });
    
    // Tablet image uploader
    var tabletFrame;
    $('#hero-image-tablet-button').on('click', function(e) {
        e.preventDefault();
        
        if (tabletFrame) {
            tabletFrame.open();
            return;
        }
        
        tabletFrame = wp.media({
            title: 'Choose Tablet Hero Image',
            button: {
                text: 'Use this image'
            },
            multiple: false
        });
        
        tabletFrame.on('select', function() {
            var attachment = tabletFrame.state().get('selection').first().toJSON();
            $('#hero-image-tablet').val(attachment.url);
        });
        
        tabletFrame.open();
    });
    
});
