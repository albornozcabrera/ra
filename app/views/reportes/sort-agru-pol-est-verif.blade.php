<?php 
$action='consultar()';
$title='RESUMEN DE SORTEO DE ORGANIZACIONES POLÍTICAS SEGÚN ESTADO DE VERIFICACIÓN';
$controller='ctrlReporte';
?>
@extends('layouts.main.master')

@section('content')
	@extends('reportes.sort-agru-pol-est-verif-form')
@stop


@section("javascript-ini")        
	<?= HTML::script('js/library/angularjs/controllers/reporte_sor_ag_pol_est_verif.js') ?> 
@stop


