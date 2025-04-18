
jQuery(document).ready(function($){

    /* Footer Carousel */
    $('#upload_image_button1').click(function(e) {
        e.preventDefault();
        var image = wp.media({
            title: 'Upload Image',
            // multiple: false
        }).open()
            .on('select', function(e){
                var uploaded_image = image.state().get('selection').first();
                console.log(uploaded_image);
                var image_url1 = uploaded_image.toJSON().url;
                $('#image_url1').val(image_url1);
            });
    });

    $('#upload_image_button2').click(function(e) {
        e.preventDefault();
        var image = wp.media({
            title: 'Upload Image',
            // multiple: false
        }).open()
            .on('select', function(e){
                var uploaded_image = image.state().get('selection').first();
                console.log(uploaded_image);
                var image_url2 = uploaded_image.toJSON().url;
                $('#image_url2').val(image_url2);
            });
    });

    $('#upload_image_button3').click(function(e) {
        e.preventDefault();
        var image = wp.media({
            title: 'Upload Image',
            // multiple: false
        }).open()
            .on('select', function(e){
                var uploaded_image = image.state().get('selection').first();
                console.log(uploaded_image);
                var image_url3 = uploaded_image.toJSON().url;
                $('#image_url3').val(image_url3);
            });
    });

    $('#upload_image_button4').click(function(e) {
        e.preventDefault();
        var image = wp.media({
            title: 'Upload Image',
            // multiple: false
        }).open()
            .on('select', function(e){
                var uploaded_image = image.state().get('selection').first();
                console.log(uploaded_image);
                var image_url4 = uploaded_image.toJSON().url;
                $('#image_url4').val(image_url4);
            });
    });

    $('#upload_image_button5').click(function(e) {
        e.preventDefault();
        var image = wp.media({
            title: 'Upload Image',
            // multiple: false
        }).open()
            .on('select', function(e){
                var uploaded_image = image.state().get('selection').first();
                console.log(uploaded_image);
                var image_url5 = uploaded_image.toJSON().url;
                $('#image_url5').val(image_url5);
            });
    });

    $('#upload_image_button6').click(function(e) {
        e.preventDefault();
        var image = wp.media({
            title: 'Upload Image',
            // multiple: false
        }).open()
            .on('select', function(e){
                var uploaded_image = image.state().get('selection').first();
                console.log(uploaded_image);
                var image_url6 = uploaded_image.toJSON().url;
                $('#image_url6').val(image_url6);
            });
    });

    $('#upload_image_button7').click(function(e) {
        e.preventDefault();
        var image = wp.media({
            title: 'Upload Image',
            // multiple: false
        }).open()
            .on('select', function(e){
                var uploaded_image = image.state().get('selection').first();
                console.log(uploaded_image);
                var image_url7 = uploaded_image.toJSON().url;
                $('#image_url7').val(image_url7);
            });
    });

    $('#upload_image_button8').click(function(e) {
        e.preventDefault();
        var image = wp.media({
            title: 'Upload Image',
            // multiple: false
        }).open()
            .on('select', function(e){
                var uploaded_image = image.state().get('selection').first();
                console.log(uploaded_image);
                var image_url8 = uploaded_image.toJSON().url;
                $('#image_url8').val(image_url8);
            });
    });

    /* Horizontal Slider */
    $('#hs_upload_image_button1').click(function(e) {
        e.preventDefault();
        var image = wp.media({
            title: 'Upload Image',
            // multiple: false
        }).open()
            .on('select', function(e){
                var uploaded_image = image.state().get('selection').first();
                console.log(uploaded_image);
                var hs_image_url1 = uploaded_image.toJSON().url;
                $('#hs_image_url1').val(hs_image_url1);
            });
    });

    $('#hs_upload_image_button2').click(function(e) {
        e.preventDefault();
        var image = wp.media({
            title: 'Upload Image',
            // multiple: false
        }).open()
            .on('select', function(e){
                var uploaded_image = image.state().get('selection').first();
                console.log(uploaded_image);
                var hs_image_url2 = uploaded_image.toJSON().url;
                $('#hs_image_url2').val(hs_image_url2);
            });
    });

    $('#hs_upload_image_button3').click(function(e) {
        e.preventDefault();
        var image = wp.media({
            title: 'Upload Image',
            // multiple: false
        }).open()
            .on('select', function(e){
                var uploaded_image = image.state().get('selection').first();
                console.log(uploaded_image);
                var hs_image_url3 = uploaded_image.toJSON().url;
                $('#hs_image_url3').val(hs_image_url3);
            });
    });

    $('#hs_upload_image_button4').click(function(e) {
        e.preventDefault();
        var image = wp.media({
            title: 'Upload Image',
            // multiple: false
        }).open()
            .on('select', function(e){
                var uploaded_image = image.state().get('selection').first();
                console.log(uploaded_image);
                var hs_image_url4 = uploaded_image.toJSON().url;
                $('#hs_image_url4').val(hs_image_url4);
            });
    });

    $('#hs_upload_image_button5').click(function(e) {
        e.preventDefault();
        var image = wp.media({
            title: 'Upload Image',
            // multiple: false
        }).open()
            .on('select', function(e){
                var uploaded_image = image.state().get('selection').first();
                console.log(uploaded_image);
                var hs_image_url5 = uploaded_image.toJSON().url;
                $('#hs_image_url5').val(hs_image_url5);
            });
    });

    $('#hs_upload_image_button6').click(function(e) {
        e.preventDefault();
        var image = wp.media({
            title: 'Upload Image',
            // multiple: false
        }).open()
            .on('select', function(e){
                var uploaded_image = image.state().get('selection').first();
                console.log(uploaded_image);
                var hs_image_url6 = uploaded_image.toJSON().url;
                $('#hs_image_url6').val(hs_image_url6);
            });
    });

    $('#hs_upload_image_button7').click(function(e) {
        e.preventDefault();
        var image = wp.media({
            title: 'Upload Image',
            // multiple: false
        }).open()
            .on('select', function(e){
                var uploaded_image = image.state().get('selection').first();
                console.log(uploaded_image);
                var hs_image_url7 = uploaded_image.toJSON().url;
                $('#hs_image_url7').val(hs_image_url7);
            });
    });

    $('#hs_upload_image_button8').click(function(e) {
        e.preventDefault();
        var image = wp.media({
            title: 'Upload Image',
            // multiple: false
        }).open()
            .on('select', function(e){
                var uploaded_image = image.state().get('selection').first();
                console.log(uploaded_image);
                var hs_image_url8 = uploaded_image.toJSON().url;
                $('#hs_image_url8').val(hs_image_url8);
            });
    });
});