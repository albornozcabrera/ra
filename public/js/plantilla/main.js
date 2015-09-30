$(document).ready(function() {
    var altura = $("#sidebar").css("height");
    var bg_ocultar = $(".bg_ocultar");
    bg_ocultar.css("height", altura);    
    $(window).resize(function() { //Cuando redimensionamos la pantalla
    //    alert('content 1: ' + $(this).hasScrollBar());
    });
}); 