jQuery.noConflict()(function ($) {
    $('.capitulo-item').each(function(){
        $(this).magnificPopup({
            type: 'iframe',
            delegate: 'a',
            iframe: {
                markup: '<div class="mfp-iframe-scaler">'+
                    '<div class="mfp-close"></div>'+
                    '<iframe class="mfp-iframe" frameborder="0" allowfullscreen allow="autoplay; encrypted-media"></iframe>'+
                    '</div>',
                patterns: {
                    youtube: {
                        src: 'https://www.youtube.com/embed/%id%?rel=0&autoplay=1'
                    }
                }
            }
        });
    });
});