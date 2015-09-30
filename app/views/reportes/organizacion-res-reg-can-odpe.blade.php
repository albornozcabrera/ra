<?php 
$action='consultar()';
$title='LISTADO DE ORGANIZACIONES CONSOLIDADAS SEGÚN ';
$controller='ctrlReporte';
?>
@extends('layouts.main.master')

@section('content')
	@extends('reportes.organizacion-res-reg-can-odpe-form')
@stop


@section("javascript-ini")        
	<?= HTML::script('js/library/angularjs/controllers/reporte_org_res_reg_can_odpe.js') ?>
@stop


