<?php 
$action='consultar()';
$title='ORGANIZACIONES POR ELECCIÓN PARA CARTEL DE CANDIDATOS';
$controller='ctrlReporte';
?>
@extends('layouts.main.master')

@section('content')
	@extends('reportes.organizacion-elec-cartel-can')
@stop


@section("javascript-ini")        
	<?= HTML::script('js/library/angularjs/controllers/reporte_cartel_candidato.js') ?>
@stop


