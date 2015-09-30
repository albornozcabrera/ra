<?php 
$action='consultar()';
$title=' RESUMEN DE RESOLUCIONES REGISTRADAS POR DÍA';
$controller='ctrlReporte';
?>
@extends('layouts.main.master')


@section('content')
	@extends('reportes.lc-res-resoluc-reg-dia-form')
@stop


@section("javascript-ini")        
	<?= HTML::script('js/library/angularjs/controllers/reporte_lc-res-resoluc-reg-dia.js') ?>
@stop


