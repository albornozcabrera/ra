<?php 
$action='consultar()';
$title='AVANCE DE ORGANIZACIONES POLÍTICAS REGISTRADAS POR ÁMBITO';
$controller='ctrlReporte';
?>
@extends('layouts.main.master')

@section('content')
	@extends('reportes.avance-org-politica-reg-ambito-can')
@stop


@section("javascript-ini")        
	<?= HTML::script('js/library/angularjs/controllers/reporte_avance_org_pol_reg_ambito.js') ?>
@stop


