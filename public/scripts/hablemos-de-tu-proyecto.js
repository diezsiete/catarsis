jQuery.noConflict()(function ($) {
    const fields = [
        'video', 'fotografia', 'estrategia', 'grafica', 'aspectos', 'objetivo_comunicar', 'objetivo', 'personajes',
        'locaciones', 'fecha', 'donde_publicar', 'nombre', 'email'
    ];
    const fieldsRequired = [
        'aspectos', 'objetivo_comunicar', 'objetivo', 'nombre', 'email'
    ];
    $(document).ready(function() {
        $('#hablemos-form').on('submit', function(e) {
            return form_to_ajax_request($, $(this), fields, fieldsRequired);
        });

    });
});