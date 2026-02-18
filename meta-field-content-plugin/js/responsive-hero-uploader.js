/**
 * Media uploader for responsive hero images
 * Handles mobile and tablet image selection
 */

jQuery(document).ready(function($){ "use strict";
    
    // Mobile portrait image uploader
    var hero_mobile_portrait_frame;
    
    $('#hero-image-mobile-button').click(function(e){
        e.preventDefault();
        console.log('Mobile portrait button clicked');
        
        if (hero_mobile_portrait_frame) {
            console.log('Frame exists, reopening');
            hero_mobile_portrait_frame.open();
            return;
        }
        
        console.log('Creating new frame');
        hero_mobile_portrait_frame = wp.media.frames.hero_mobile_portrait_frame = wp.media({
            title: responsive_hero_image.title,
            button: { text:  responsive_hero_image.button },
            library: { type: 'image' }
        });
        
        hero_mobile_portrait_frame.on('select', function(){
            console.log('SELECT EVENT FIRED!');
            var media_attachment = hero_mobile_portrait_frame.state().get('selection').first().toJSON();
            console.log('Image URL:', media_attachment.url);
            $('#hero-image-mobile').val(media_attachment.url);
        });
        
        // Open after tiny delay to ensure event binding completes
        setTimeout(function() {
            hero_mobile_portrait_frame.open();
            console.log('Frame opened');
        }, 50);
    });
    
    // Mobile landscape image uploader
    var hero_mobile_landscape_frame;
    
    $('#hero-image-mobile-landscape-button').click(function(e){
        e.preventDefault();
        
        if (hero_mobile_landscape_frame) {
            hero_mobile_landscape_frame.open();
            return;
        }
        
        hero_mobile_landscape_frame = wp.media.frames.hero_mobile_landscape_frame = wp.media({
            title: responsive_hero_image.title,
            button: { text:  responsive_hero_image.button },
            library: { type: 'image' }
        });
        
        hero_mobile_landscape_frame.on('select', function(){
            var media_attachment = hero_mobile_landscape_frame.state().get('selection').first().toJSON();
            $('#hero-image-mobile-landscape').val(media_attachment.url);
        });
        
        setTimeout(function() {
            hero_mobile_landscape_frame.open();
        }, 50);
    });
    
    // Tablet portrait image uploader
    var hero_tablet_portrait_frame;
    
    $('#hero-image-tablet-portrait-button').click(function(e){
        e.preventDefault();
        
        if (hero_tablet_portrait_frame) {
            hero_tablet_portrait_frame.open();
            return;
        }
        
        hero_tablet_portrait_frame = wp.media.frames.hero_tablet_portrait_frame = wp.media({
            title: responsive_hero_image.title,
            button: { text:  responsive_hero_image.button },
            library: { type: 'image' }
        });
        
        hero_tablet_portrait_frame.on('select', function(){
            var media_attachment = hero_tablet_portrait_frame.state().get('selection').first().toJSON();
            $('#hero-image-tablet-portrait').val(media_attachment.url);
        });
        
        setTimeout(function() {
            hero_tablet_portrait_frame.open();
        }, 50);
    });
    
    // Tablet landscape image uploader
    var hero_tablet_landscape_frame;
    
    $('#hero-image-tablet-landscape-button').click(function(e){
        e.preventDefault();
        
        if (hero_tablet_landscape_frame) {
            hero_tablet_landscape_frame.open();
            return;
        }
        
        hero_tablet_landscape_frame = wp.media.frames.hero_tablet_landscape_frame = wp.media({
            title: responsive_hero_image.title,
            button: { text:  responsive_hero_image.button },
            library: { type: 'image' }
        });
        
        hero_tablet_landscape_frame.on('select', function(){
            var media_attachment = hero_tablet_landscape_frame.state().get('selection').first().toJSON();
            $('#hero-image-tablet-landscape').val(media_attachment.url);
        });
        
        setTimeout(function() {
            hero_tablet_landscape_frame.open();
        }, 50);
    });
    
});
