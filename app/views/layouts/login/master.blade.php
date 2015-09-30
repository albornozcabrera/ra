<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>.:RA:.</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?= HTML::style('css/style.css') ?>
        <?= HTML::style('css/bootstrap.css') ?>
        <?= HTML::style('css/bootstrap.min.css') ?>
        <?= HTML::style('css/library/awesome-4.1.0/font-awesome.min.css') ?>
        <?= HTML::style('css/animate.css') ?>
        <?= HTML::style('css/bootstrap.css.map') ?>
    </head>
    <body>
        <section >
            @yield('content')
        </section>
        <footer class="footer">Copyright © Oficina Nacional de Procesos Electorales - ONPE 
        </footer>
    </body>
</html>
