/**
 * Media uploader for responsive hero images
 * Handles mobile and tablet image selection
 */

jQuery(document).ready(function($){ "use strict";
    
    $('#hero-image-mobile-button').click(function(e){
        e.preventDefault();
        e.stopImmediatePropagation();
        console.log('Mobile portrait button clicked');
        
        var frame = wp.media({
            title: responsive_hero_image.title,
            button: { text:  responsive_hero_image.button },
            library: { type: 'image' },
            multiple: false
        });
        
        frame.on('select', function(){
            console.log('SELECT EVENT FIRED!');
            var selection = frame.state().get('selection');
            if (!selection) return;
            var media_attachment = selection.first().toJSON();
            console.log('Image URL:', media_attachment.url);
            $('#hero-image-mobile').val(media_attachment.url);
            frame.close();
        });
        
        frame.open();
    });
    
    $('#hero-image-mobile-landscape-button').click(function(e){
        e.preventDefault();
        e.stopImmediatePropagation();
        
        var frame = wp.media({
            title: responsive_hero_image.title,
            button: { text:  responsive_hero_image.button },
            library: { type: 'image' },
            multiple: false
        });
        
        frame.on('select', function(){
            var selection = frame.state().get('selection');
            if (!selection) return;
            var media_attachment = selection.first().toJSON();
            $('#hero-image-mobile-landscape').val(media_attachment.url);
            frame.close();
        });
        
        frame.open();
    });
    
    $('#hero-image-tablet-portrait-button').click(function(e){
        e.preventDefault();
        e.stopImmediatePropagation();
        
        var frame = wp.media({
            title: responsive_hero_image.title,
            button: { text:  responsive_hero_image.button },
            library: { type: 'image' },
            multiple: false
        });
        
        frame.on('select', function(){
            var selection = frame.state().get('selection');
            if (!selection) return;
            var media_attachment = selection.first().toJSON();
            $('#hero-image-tablet-portrait').val(media_attachment.url);
            frame.close();
        });
        
        frame.open();
    });
    
    $('#hero-image-tablet-landscape-button').click(function(e){
        e.preventDefault();
        e.stopImmediatePropagation();
        
        var frame = wp.media({
            title: responsive_hero_image.title,
            button: { text:  responsive_hero_image.button },
            library: { type: 'image' },
            multiple: false
        });
        
        frame.on('select', function(){
            var selection = frame.state().get('selection');
            if (!selection) return;
            var media_attachment = selection.first().toJSON();
            $('#hero-image-tablet-landscape').val(media_attachment.url);
            frame.close();
        });
        
        frame.open();
    });
    
});
