<?php 
$action='consultar()';
$title='LISTA DE CANDIDATOS POR UBIGEO';
$controller='ctrlReporte';
?>
@extends('layouts.main.master')

@section('content') 
	@extends('reportes.lc-lista-cand-ubigeo-form')
@stop


@section("javascript-ini")    
	<?= HTML::script('js/library/angularjs/controllers/reporte_lista_cand_ubigeo.js') ?>
@stop


