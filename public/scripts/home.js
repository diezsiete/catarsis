jQuery.noConflict()(function ($) {
    $('.lo-que-hacemos .seccion').each(function(){
        var playlist = $(this).data('playlist');
        if(playlist) {
            $(this).magnificPopup({
                type: 'iframe',
                delegate: 'a',

                gallery: {enabled: true},
                iframe: {
                    markup: '<div class="mfp-iframe-scaler">'+
                        '<div class="mfp-close"></div>'+
                        '<iframe class="mfp-iframe" frameborder="0" allowfullscreen allow="autoplay; encrypted-media"></iframe>'+
                        '</div>',
                    patterns: {
                        youtube: {
                            src: 'https://www.youtube.com/embed/%id%?listType=playlist&list=' + playlist + '&rel=0&autoplay=1'
                        }
                    }
                }

            });
        }
    });

    $(document).ready(function() {
        owl_carousel('quienes', 2);
        owl_carousel('aliados', 3);

        $('#contact-form').on('submit', function(e) {
            return form_to_ajax_request($, $(this), ['email', 'name', 'message'], ['email', 'name', 'message']);
        });

    });


    function owl_carousel(carouselName, items){

        let currentItem = 0;
        const carousel = $('.owl-'+carouselName+'-slider').owlCarousel({
            items: items,
            loop: true,
            dots: true,
        });


        $('.'+carouselName+'-nav .lnr-arrow-left').on('click', function () {
            // carousel.trigger('prev.owl.carousel');
            currentItem--;
            carousel.trigger('to.owl.carousel', [currentItem]);

        });

        $('.'+carouselName+'-nav .lnr-arrow-right').on('click', function () {
            // carousel.trigger('next.owl.carousel');
            currentItem++;
            carousel.trigger('to.owl.carousel', [currentItem])
        });

    }


    $(window).on('resize', function() {
        owl_carousel('quienes', 2);
        owl_carousel('aliados', 3);
    });

});