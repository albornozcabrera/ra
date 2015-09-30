<?php 
$action='consultar()';
$title='RESOLUCIÓN DEFINITIVA DE LISTA DE CANDIDATOS';
$controller='ctrlReporte';
?>
@extends('layouts.main.master')

@section('content')  
	@extends('reportes.lc-res-defin-list-cand-form')
@stop



@section("javascript-ini")    
	<?= HTML::script('js/library/angularjs/controllers/reporte-lista-res-defin-list-cand.js') ?>
@stop


