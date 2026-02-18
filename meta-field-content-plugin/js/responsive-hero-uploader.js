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
    
    // Tablet portrait image uploader
    var tabletPortraitFrame;
    $('#hero-image-tablet-portrait-button').on('click', function(e) {
        e.preventDefault();
        
        if (tabletPortraitFrame) {
            tabletPortraitFrame.open();
            return;
        }
        
        tabletPortraitFrame = wp.media({
            title: 'Choose Tablet Portrait Hero Image',
            button: {
                text: 'Use this image'
            },
            multiple: false
        });
        
        tabletPortraitFrame.on('select', function() {
            var attachment = tabletPortraitFrame.state().get('selection').first().toJSON();
            $('#hero-image-tablet-portrait').val(attachment.url);
        });
        
        tabletPortraitFrame.open();
    });
    
    // Tablet landscape image uploader
    var tabletLandscapeFrame;
    $('#hero-image-tablet-landscape-button').on('click', function(e) {
        e.preventDefault();
        
        if (tabletLandscapeFrame) {
            tabletLandscapeFrame.open();
            return;
        }
        
        tabletLandscapeFrame = wp.media({
            title: 'Choose Tablet Landscape Hero Image',
            button: {
                text: 'Use this image'
            },
            multiple: false
        });
        
        tabletLandscapeFrame.on('select', function() {
            var attachment = tabletLandscapeFrame.state().get('selection').first().toJSON();
            $('#hero-image-tablet-landscape').val(attachment.url);
        });
        
        tabletLandscapeFrame.open();
    });
    
});
