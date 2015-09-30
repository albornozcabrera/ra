@extends('layouts.main.master')
@section('content')

<table width="80%" border="1" align="center" >
  <tr bgcolor="#667595" style="color:#FFFFFF">
    <td height="50"  align="center"><strong>MODULO DE REPORTES</strong> : LISTA DE CANDIDATOS </td>
  </tr>
  <tr>
    <td style="padding:15px; font-size:13px">
    <?= HTML::link('reporte/lc-lista-cand-ubigeo', 'LISTA DE CANDIDATOS POR UBIGEO', array('class'=>'link')) ?>
    </td>
  </tr>
  
  <tr>
    <td style="padding:15px; font-size:13px">
	<?= HTML::link('reporte/lc-candidato-cancelados-excel', 'CANDIDATOS CANCELADOS', array('class'=>'link')) ?>
    </td>    
  </tr>
  <tr>
    <td style="padding:15px; font-size:13px">
    <?= HTML::link('reporte/lc-avance-cand-reg-amb-excel', 'AVANCE DE CANDIDATOS REGISTRADOS POR AMBITO', array('class'=>'link')) ?>
    </td>   
  </tr>
  <tr>  
    <td style="padding:15px; font-size:13px">
	<?= HTML::link('reporte/lc-res-resoluc-reg-dia-excel', 'RESUMEN DE RESOLUCIONES REGISTRADAS POR DÍA ', array('class'=>'link')) ?>
    </td>    
  </tr>
  <tr>
    <td style="padding:15px; font-size:13px">
    <?= HTML::link('reporte/lc-org-avan-org-pol-reg-amb', 'RESOLUCIÓN DIFINITIVA DE LISTA DE CANDIDATOS', array('class'=>'link')) ?> 
    </td>    
  </tr>
</table>

@stop
<?=HTML::style('css/program/descarga.css')?>
<?=HTML::style('css/program/reports.css')?>
@section("javascript-ini")        
	<? //= HTML::script('js/library/angularjs/controllers/reporte_cartel_candidato.js') ?>
@stop


