$(document).ready(function() {
    redimensionar_principal(); //Al cargar la pagina    
    redimensionar_menu();
    $(window).resize(function() { //Cuando redimensionamos la pantalla    
        if ($("#sidebar").css("display") == "none") {
            var width_contenedor = $("#contenedor").width();
            var width_ocultar = $("#ocultar").width();
            var width_section = width_contenedor - width_ocultar;
            $("section#principal").css({"width": width_section});            
            redimensionar_menu();
        } else {
            redimensionar_principal();
            redimensionar_menu();
        }
    });
      /***Focus en username***/   
    if ($("#username").length) {                
        $("#username").focus();
    }
});


//Redimensiona el width del #principal
function redimensionar_principal() {
    var width_contenedor = $("#contenedor").width();
    var width_sidebar = $("#sidebar").width();
    var width_ocultar = $("#ocultar").width();
//    if ($(document).height() > $(window).height())          
//       $("body").css({"overflow": "auto"});
    var width_section = width_contenedor - width_sidebar - width_ocultar;    
    $("section#principal").css({"width": width_section});    
}

function redimensionar_menu() {
    var w_contenedor = $("#contenedor").width();
    $(".mi-menu").css({"width": w_contenedor - 220/*--padding-left--*/});     
}

// Ventana Modal
$(function() {
    $("a[rel='abrir-modal']").on("click", function() {
        var wModal = $("#contenido-modal").width();
        var w = $(window).width();
        var izquierda = w / 2 - wModal / 2;
        $("#contenido-modal").css("left", izquierda);
        $("#overlay").css({"height": $(document).height()});
        $("#overlay").css({"visibility": "visible"});
    });
    $("#cerrar-modal").on("click", function() {
        $("#overlay").css({"visibility": "hidden"});
    });
});




// Mostrar y ocultar #ocultar
$(function() {
    $("#ocultar").click(function() {
        $("#sidebar").toggle();
        if ($("#sidebar").css("display") == "none") {
            var altura=$("#sidebar").css("height");          
            var bg_ocultar = $(".bg_ocultar");
            bg_ocultar.css("height",altura);   
            var width_contenedor = $("#contenedor").width();           
            var width_ocultar = $("#ocultar").width();            
            var width_section = width_contenedor - width_ocultar;                       
            $("section#principal").css({"width": width_section}); 
            $('#logo_onpe2').animate({'margin-top': '0px'}, 600);

        } else {            
            redimensionar_principal();
            $('#logo_onpe2').animate({'margin-top': '-135px'}, 600);
        }        
    });

});



//<!-- menu accordion-->

$(function() {

    var menu_ul = $('.menu_principal > ul > li > ul');
    var menu_a = $('.menu_principal > ul > li > a');
    var menu_a_span = $('.menu_principal > ul > li > a > span');

    var menu_ul2 = $('.menu_principal > ul > li > ul > li > ul');
    var menu_a2 = $('.menu_principal > ul > li > ul > li > a');
    
    var menu_ul3 = $('.menu_principal > ul > li > ul > li > ul');
    var menu_a3 = $('.menu_principal > ul > li > ul > li > ul > li > a');

    menu_ul.hide();
    menu_ul2.hide();
    menu_ul3.hide();
    
    menu_a.click(function(e) {
        e.preventDefault();        
        if (!$(this).hasClass('active')) {
            menu_ul.filter(':visible').slideUp('normal');
            $(this).addClass('active').next().stop(true, true).slideDown('normal');                           
            var url="/img/plantilla/flecha_arriba.png";            
            url=window.location.origin+"/"+window.location.pathname.split('/')[1]+"/"+window.location.pathname.split('/')[2]+url;            
            $(this).find('span').html('<img src="'+ url +'" width="13" height="7" alt="  ">');
        } else {
            $(this).removeClass('active');
            $(this).next().stop(true, true).slideUp('normal');            
            var url="/img/plantilla/flecha_abajo.png";           
            url=window.location.origin+"/"+window.location.pathname.split('/')[1]+"/"+window.location.pathname.split('/')[2]+url;            
            $(this).find('span').html('<img src="'+ url +'" width="13" height="7" alt="  ">');
        }
    });

    menu_a2.click(function(e) {
        //e.preventDefault();
        if (!$(this).hasClass('active')) {
            menu_ul2.filter(':visible').slideUp('normal');
            $(this).addClass('active').next().stop(true, true).slideDown('normal');            
            var url="/img/plantilla/flecha_arriba.png";            
            url=window.location.origin+"/"+window.location.pathname.split('/')[1]+"/"+window.location.pathname.split('/')[2]+url;            
            $(this).find('span').html('<img src="'+ url +'" width="13" height="7" alt="  ">');           
            if ($(this).text() === 'Organizacion') {
//                $('#ocultar').height('1050px').fadeIn(1000);
//                $('#sidebar').height('1127px').fadeIn(1000);
                $('#ocultar').height('auto').fadeIn(1000);
                $('#sidebar').height('auto').fadeIn(1000);
            }
            if ($(this).text() === 'Candidato') {
//                $('#ocultar').height('950px').fadeIn(1000);
//                $('#sidebar').height('1027px').fadeIn(1000);
                $('#ocultar').height('auto').fadeIn(1000);
                $('#sidebar').height('auto').fadeIn(1000);
            }
           // $('html, body').animate({scrollTop: $(document).height()});
        } else {
            $(this).removeClass('active');
            $(this).next().stop(true, true).slideUp('normal');
            var url="/img/plantilla/flecha_abajo.png";           
            url=window.location.origin+"/"+window.location.pathname.split('/')[1]+"/"+window.location.pathname.split('/')[2]+url;            
            $(this).find('span').html('<img src="'+ url +'" width="13" height="7" alt="  ">');
            if ($(this).text() === 'Organizacion' || $(this).text() === 'Candidato') {
//                setTimeout("$('#ocultar').height('837px')", 600);
//                setTimeout("$('#sidebar').height('914px')", 600);
                  setTimeout("$('#ocultar').height('auto')", 600);
                  setTimeout("$('#sidebar').height('auto')", 600);
            }
          //  $('html, body').animate({scrollTop: $(document).height()});
        }
    });
    
    menu_a3.click(function(e) {
        //e.preventDefault();
        if (!$(this).hasClass('active')) {
            menu_ul3.filter(':visible').slideUp('normal');
            $(this).addClass('active').next().stop(true, true).slideDown('normal');
            var url="/img/plantilla/flecha_arriba.png";           
            url=window.location.origin+"/"+window.location.pathname.split('/')[1]+"/"+window.location.pathname.split('/')[2]+url;            
            $(this).find('span').html('<img src="'+ url +'" width="13" height="7" alt="  ">');            
            if ($(this).text() === 'Organizacion') {
                $('#ocultar').height('1050px').fadeIn(1000);
                $('#sidebar').height('1127px').fadeIn(1000);
            }
            if ($(this).text() === 'Candidato') {
                $('#ocultar').height('950px').fadeIn(1000);
                $('#sidebar').height('1027px').fadeIn(1000);
            }
            $('html, body').animate({scrollTop: $(document).height()});

        } else {
            $(this).removeClass('active');
            $(this).next().stop(true, true).slideUp('normal');
            var url="/img/plantilla/flecha_abajo.png";           
            url=window.location.origin+"/"+window.location.pathname.split('/')[1]+"/"+window.location.pathname.split('/')[2]+url;            
            $(this).find('span').html('<img src="'+ url +'" width="13" height="7" alt="  ">');
            if ($(this).text() === 'Organizacion' || $(this).text() === 'Candidato') {
                setTimeout("$('#ocultar').height('837px')", 600);
                setTimeout("$('#sidebar').height('914px')", 600);
            }
            $('html, body').animate({scrollTop: $(document).height()});
        }
    });
});

function iniciar_principal() {   
    var width_contenedor = $("#contenedor").width();
    var width_sidebar = $("#sidebar").width();
    var width_ocultar = $("#ocultar").width();
    var width_section = width_contenedor - width_sidebar - width_ocultar-25;    
    $("section#principal").css({"width": width_section});   
}

$(window).resize(function() {
    iniciar_principal();
});
iniciar_principal();