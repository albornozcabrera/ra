<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> 
<html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?= HTML::script('js/library/jquery/jquery-2.1.0.min.js') ?>
        <?= HTML::script('js/library/jquery/jquery-ui.js') ?>
        <?= HTML::script('js/library/angularjs/angular-1.3.min.js') ?>
        <?= HTML::script('js/library/angularjs/app.js') ?>
        <?= HTML::script('js/other/inactividadController.js') ?>
        <?= HTML::script('js/other/inactividadSession.min.js') ?>
        <?//= HTML::script('js/library/bootstrap/bootstrap-3.2.0.min.js') ?>
        @yield('javascript-ini')        
        <?= HTML::style('css/program/form.css') ?>
        <?= HTML::style('css/plantilla/normalize.css') ?>
        <?= HTML::style('css/plantilla/colorbox.css') ?>
        <?= HTML::style('css/program/ui.jqgrid.css') ?>
        <?= HTML::style('css/program/redmond/jquery-ui-1.10.3.custom.css') ?>
        <?= HTML::style('css/library/boostrap-3.2.0/bootstrap.pagination.min.css') ?>        
        <?= HTML::style('css/style.css') ?>
        <?= HTML::style('css/bootstrap.css') ?>
        <?= HTML::style('css/bootstrap.min.css') ?>
        <?= HTML::style('css/library/awesome-4.1.0/font-awesome.min.css') ?>
        <?= HTML::style('css/animate.css') ?>
        <?= HTML::style('css/bootstrap.css.map') ?>
        
		<link rel="icon" type="image/ico" href="{{{ asset('favicon.ico') }}}">
        @yield('css')
    </head>
    <body ng-app="app">
        <section id="contenedor">
            <div class="contenedorGlobal">
                <div style="width: 100%">
                    <section class="col_de" id="principal">
                        <header class="">
                            <h1>REGISTRO DE ACCESO A ONPE</h1>                          
                        </header>

                        @include('layouts.main.info-user')

                        <div class="wrap block" {{isset($controller)?'ng-controller='.$controller:''}} >
                            <!--<h3 class="title ">{{isset($title)? $title :''}}</h3>-->
                            <div class="content" style="display:none;" id="mainContainerPage">                   
                                <!--@yield('filter')-->
                                @yield('content')
                            </div>
                        </div>
                    </section>
                </div>
                <div class="bg_ocultar_right2"><div id="ocultar_rigth2"></div></div>
            </div>

        </section>
        <footer class="footer">Copyright © Oficina Nacional de Procesos Electorales - ONPE 
        </footer>

        <?= HTML::script('js/plantilla/cargar.js') ?>
        <?= HTML::script('js/plantilla/plugins.js') ?>
        <?= HTML::script('js/plantilla/ocultar_menu.js') ?>        
        <?= HTML::script('js/library/jquery/jquery.jqGrid.min.js') ?>
        <?= HTML::script('js/plantilla/vendor/modernizr-2.6.2.min.js') ?>
        <?= HTML::script('js/plantilla/jquery.colorbox-min.js') ?>

        @yield('javascript') 
    </body>
</html>
