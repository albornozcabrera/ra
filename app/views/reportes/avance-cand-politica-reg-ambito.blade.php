<?php 
$action='consultar()';
$title=' AVANCE DE CANDIDATOS REGISTRADOS POR ÁMBITO';
$controller='ctrlReporte';
?>
@extends('layouts.main.master')

@section('content')
	@extends('reportes.avance-cand-politica-reg-ambito-can')
@stop


@section("javascript-ini")        
	<?= HTML::script('js/library/angularjs/controllers/reporte_avance_cand_pol_reg_ambito.js') ?>
@stop


