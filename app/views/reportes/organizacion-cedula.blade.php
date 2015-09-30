<?php 
$action='consultar()';
$title='ORGANIZACIONES POLÍTICAS POR ELECCIÓN PARA CÉDULAS';
$controller='ctrlReporte';
?>
@extends('layouts.main.master')

@section('content')
	@extends('reportes.organizacion-elec-cedula-can')
@stop


@section("javascript-ini")        
	<?= HTML::script('js/library/angularjs/controllers/reporte_cedula_candidato.js') ?>
@stop


