<?php 
$action='consultar()';
$title=' LISTA DE CANDIDATOS CANCELADOS';
$controller='ctrlReporte';
?>
@extends('layouts.main.master')

@section('content')
	@extends('reportes.lc-candidato-cancelados-form')
@stop


@section("javascript-ini")        
	<?= HTML::script('js/library/angularjs/controllers/reporte_lc-candidato-cancelados.js') ?>
@stop


