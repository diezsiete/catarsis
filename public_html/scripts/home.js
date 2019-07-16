jQuery.noConflict()(function ($) {
    $('.lo-que-hacemos .link').each(function(){
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


        const carousel = $('.owl-'+carouselName+'-slider').owlCarousel({
            items: items,
            loop: true,
            dots: true,
            responsiveClass:true,
            responsive:{
                0:{
                    items:1,
                    nav: false,
                },
                600:{
                    items: items,
                },
            },
            autoplay:true,
            autoplayTimeout: 5000,
            autoplayHoverPause:true,
            checkVisibility: false,

            onInitialized: function() {
                // los items visibles tendran clases first y second para ajustar posicion
                this._pipe.push({
                    'filter': ['position'],
                    'run': $.proxy(() => {
                        let classNames = ['first', 'second'];
                        this.$stage.children('.active').each((key, element) => {
                            if(classNames[key]) {
                                $(element).children(":first").removeClass(classNames.join(" ")).addClass(classNames[key])
                            }
                        })
                    }, this)
                });
            }
        });

        let currentItem = 0;
        $('.'+carouselName+'-nav .lnr-arrow-left').on('click', function () {
            carousel.trigger('prev.owl.carousel');
            // currentItem--;
            // carousel.trigger('to.owl.carousel', [currentItem]);

        });

        $('.'+carouselName+'-nav .lnr-arrow-right').on('click', function () {
            carousel.trigger('next.owl.carousel');
            // currentItem++;
            // carousel.trigger('to.owl.carousel', [currentItem])
        });



    }


    $(window).on('resize', function() {
        // owl_carousel('quienes', 2);
        //owl_carousel('aliados', 3);
    });

});

