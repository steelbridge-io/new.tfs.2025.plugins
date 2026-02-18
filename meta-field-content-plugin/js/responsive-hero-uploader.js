/**
 * Media uploader for responsive hero images
 * Handles mobile and tablet image selection
 */

jQuery(document).ready(function($) { "use strict";
    
    // Mobile portrait image uploader
    var mobileFrame;
    $('#hero-image-mobile-button').click(function(e) {
        e.preventDefault();
        
        if (mobileFrame) {
            mobileFrame.open();
            return;
        }
        
        mobileFrame = wp.media.frames.mobileFrame = wp.media({
            title: 'Choose Mobile Portrait Hero Image',
            button: { text: 'Use this image' },
            library: { type: 'image' }
        });
        
        mobileFrame.on('select', function() {
            var media_attachment = mobileFrame.state().get('selection').first().toJSON();
            $('#hero-image-mobile').val(media_attachment.url);
        });
        
        mobileFrame.open();
    });
    
    // Mobile landscape image uploader
    var mobileLandscapeFrame;
    $('#hero-image-mobile-landscape-button').click(function(e) {
        e.preventDefault();
        
        if (mobileLandscapeFrame) {
            mobileLandscapeFrame.open();
            return;
        }
        
        mobileLandscapeFrame = wp.media.frames.mobileLandscapeFrame = wp.media({
            title: 'Choose Mobile Landscape Hero Image',
            button: { text: 'Use this image' },
            library: { type: 'image' }
        });
        
        mobileLandscapeFrame.on('select', function() {
            var media_attachment = mobileLandscapeFrame.state().get('selection').first().toJSON();
            $('#hero-image-mobile-landscape').val(media_attachment.url);
        });
        
        mobileLandscapeFrame.open();
    });
    
    // Tablet portrait image uploader
    var tabletPortraitFrame;
    $('#hero-image-tablet-portrait-button').click(function(e) {
        e.preventDefault();
        
        if (tabletPortraitFrame) {
            tabletPortraitFrame.open();
            return;
        }
        
        tabletPortraitFrame = wp.media.frames.tabletPortraitFrame = wp.media({
            title: 'Choose Tablet Portrait Hero Image',
            button: { text: 'Use this image' },
            library: { type: 'image' }
        });
        
        tabletPortraitFrame.on('select', function() {
            var media_attachment = tabletPortraitFrame.state().get('selection').first().toJSON();
            $('#hero-image-tablet-portrait').val(media_attachment.url);
        });
        
        tabletPortraitFrame.open();
    });
    
    // Tablet landscape image uploader
    var tabletLandscapeFrame;
    $('#hero-image-tablet-landscape-button').click(function(e) {
        e.preventDefault();
        
        if (tabletLandscapeFrame) {
            tabletLandscapeFrame.open();
            return;
        }
        
        tabletLandscapeFrame = wp.media.frames.tabletLandscapeFrame = wp.media({
            title: 'Choose Tablet Landscape Hero Image',
            button: { text: 'Use this image' },
            library: { type: 'image' }
        });
        
        tabletLandscapeFrame.on('select', function() {
            var media_attachment = tabletLandscapeFrame.state().get('selection').first().toJSON();
            $('#hero-image-tablet-landscape').val(media_attachment.url);
        });
        
        tabletLandscapeFrame.open();
    });
    
});
