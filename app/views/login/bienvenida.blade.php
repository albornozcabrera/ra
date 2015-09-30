
@extends('layouts.main.master')

@section('content')
<div class="padding_10" ng-controller="ctrlMain" ng-cloak>
    <p class="titulo_bienvenida">Bienvenido AQUÍ ESTARÁ EL DASHBOARD</p>
    <p class="txt_bienvenida">{{Session::get('usuario.username')}}</p>
    <p class="msjerror">{{Session::get('autentificacion.exit')}}</p>
    <div class="content-buttons">
        <div class="box-buttons">
            <div class="btn-dash1">
                <a href="#" ng-click="mostrarRegistrar()" ng-cloak>
                    <div class="buttons1"></div>
                    <div class="text-monitoreoleft"><strong>REGISTRAR</strong></div>
                </a>
            </div>
            <div class="btn-dash3"></div>
            <div class="btn-dash2">
                <a href="#" ng-click="mostrarConsultar()" ng-cloak>
                    <div class="buttons2"></div>
                    <div class="text-monitoreoright"><strong>CONSULTAR</strong></div>
                </a>
            </div>
            <div class="btn-dash3"></div>
            <div class="btn-dash4">
                <a href="#" ng-click="mostrarImportar()" ng-cloak>
                    <div class="buttons3"></div>
                    <div class="text-monitoreoright"><strong>IMPORTAR</strong></div>
                </a>
            </div>
        </div>
    </div>
</div>
@stop
@section("javascript-ini")        
<?= HTML::script('js/library/angularjs/controllers/main.js') ?>
@stop
