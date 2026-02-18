/**
 * Media uploader for responsive hero images
 * Handles mobile and tablet image selection
 */

jQuery(document).ready(function($) { "use strict";
    
    // Mobile portrait image uploader
    $('#hero-image-mobile-button').click(function(e) {
        e.preventDefault();
        console.log('Mobile portrait button clicked');
        
        if (wp.media.frames.mobileFrame) {
            console.log('Frame exists, reopening');
            wp.media.frames.mobileFrame.open();
            return;
        }
        
        console.log('Creating new frame');
        wp.media.frames.mobileFrame = wp.media({
            title: 'Choose Mobile Portrait Hero Image',
            button: { text: 'Use this image' },
            library: { type: 'image' }
        });
        
        wp.media.frames.mobileFrame.on('select', function() {
            console.log('SELECT EVENT FIRED!');
            var media_attachment = wp.media.frames.mobileFrame.state().get('selection').first().toJSON();
            console.log('Image URL:', media_attachment.url);
            $('#hero-image-mobile').val(media_attachment.url);
            console.log('Calling close...');
            wp.media.frames.mobileFrame.close();
            console.log('Close called');
        });
        
        wp.media.frames.mobileFrame.open();
    });
    
    // Mobile landscape image uploader
    $('#hero-image-mobile-landscape-button').click(function(e) {
        e.preventDefault();
        
        if (wp.media.frames.mobileLandscapeFrame) {
            wp.media.frames.mobileLandscapeFrame.open();
            return;
        }
        
        wp.media.frames.mobileLandscapeFrame = wp.media({
            title: 'Choose Mobile Landscape Hero Image',
            button: { text: 'Use this image' },
            library: { type: 'image' }
        });
        
        wp.media.frames.mobileLandscapeFrame.on('select', function() {
            var media_attachment = wp.media.frames.mobileLandscapeFrame.state().get('selection').first().toJSON();
            $('#hero-image-mobile-landscape').val(media_attachment.url);
            wp.media.frames.mobileLandscapeFrame.close();
        });
        
        wp.media.frames.mobileLandscapeFrame.open();
    });
    
    // Tablet portrait image uploader
    $('#hero-image-tablet-portrait-button').click(function(e) {
        e.preventDefault();
        
        if (wp.media.frames.tabletPortraitFrame) {
            wp.media.frames.tabletPortraitFrame.open();
            return;
        }
        
        wp.media.frames.tabletPortraitFrame = wp.media({
            title: 'Choose Tablet Portrait Hero Image',
            button: { text: 'Use this image' },
            library: { type: 'image' }
        });
        
        wp.media.frames.tabletPortraitFrame.on('select', function() {
            var media_attachment = wp.media.frames.tabletPortraitFrame.state().get('selection').first().toJSON();
            $('#hero-image-tablet-portrait').val(media_attachment.url);
            wp.media.frames.tabletPortraitFrame.close();
        });
        
        wp.media.frames.tabletPortraitFrame.open();
    });
    
    // Tablet landscape image uploader
    $('#hero-image-tablet-landscape-button').click(function(e) {
        e.preventDefault();
        
        if (wp.media.frames.tabletLandscapeFrame) {
            wp.media.frames.tabletLandscapeFrame.open();
            return;
        }
        
        wp.media.frames.tabletLandscapeFrame = wp.media({
            title: 'Choose Tablet Landscape Hero Image',
            button: { text: 'Use this image' },
            library: { type: 'image' }
        });
        
        wp.media.frames.tabletLandscapeFrame.on('select', function() {
            var media_attachment = wp.media.frames.tabletLandscapeFrame.state().get('selection').first().toJSON();
            $('#hero-image-tablet-landscape').val(media_attachment.url);
            wp.media.frames.tabletLandscapeFrame.close();
        });
        
        wp.media.frames.tabletLandscapeFrame.open();
    });
    
});
