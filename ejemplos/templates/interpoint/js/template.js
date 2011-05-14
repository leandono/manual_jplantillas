jQuery.noConflict();

/*Funciones para el slideshow*/

jQuery(document).ready(function() {

    jQuery('#slideshow_contenedor').cycle({
        fx:      'scrollHorz',
        timeout:  3000,
        prev:    '#slideshow_izq',
        next:    '#slideshow_der'
    });
    
});
