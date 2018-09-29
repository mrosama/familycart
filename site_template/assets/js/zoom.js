    //product images
    if ($('#lang').val() == 'en')
        var zoomConfig = {cursor: 'crosshair', zoomWindowPosition: 1, gallery: 'gallery_01', galleryActiveClass: 'active'};
    else
        var zoomConfig = {cursor: 'crosshair', zoomWindowPosition: 11, gallery: 'gallery_01', galleryActiveClass: 'active'};

    var image = $('#gallery_01 a');
    var zoomImage = $('img#zoom_03');

    //zoomImage.elevateZoom(zoomConfig);//initialise zoom

    image.on('click', function () {
        // Remove old instance od EZ
        $('.zoomContainer').remove();
        zoomImage.removeData('elevateZoom');
        // Update source for images
        zoomImage.attr('src', $(this).data('image'));
        zoomImage.data('zoom-image', $(this).data('zoom-image'));
        // Reinitialize EZ
        zoomImage.elevateZoom(zoomConfig);
    });

    if ($('#lang').val() == 'en')
        $("#zoom_03").elevateZoom({
            zoomWindowFadeIn: 500,
            zoomWindowFadeOut: 500,
            lensFadeIn: 500,
            lensFadeOut: 500,
            zoomWindowPosition: 1
        });
    else
        $("#zoom_03").elevateZoom({
            zoomWindowFadeIn: 500,
            zoomWindowFadeOut: 500,
            lensFadeIn: 500,
            lensFadeOut: 500,
            zoomWindowPosition: 11
        });
