@extends('layouts.main.master')
@section('content')

<table width="50%" border="1" align="center" >
  <tr bgcolor="#667595" style="color:#FFFFFF">
 
    <td height="50" colspan="2"  align="center"><strong>LISTAS VÁLIDAS</strong></td>
  </tr>
<!--  <tr>
    <td style="padding:15px; font-size:13px">1. NACIONAL </td>
    <td style="padding:15px; font-size:13px">
        <?= HTML::link('reporte/lista-reg-cand-nac-excel', 'EXPORTAR A EXCEL', array('class'=>'link')) ?>&nbsp;        
    </td>
  </tr>
  <tr>
    <td style="padding:15px; font-size:13px">2. REGIONAL</td>
    <td style="padding:15px; font-size:13px">
        <?= HTML::link('reporte/lista-reg-cand-dep-excel', 'EXPORTAR A EXCEL', array('class'=>'link')) ?>&nbsp;
    </td>
  </tr>-->
  <tr>
    <td style="padding:15px; font-size:13px"> PROVINCIAL</td>  
    <td style="padding:15px; font-size:13px"><?= HTML::link('reporte/lista-reg-cand-prov-excel', 'EXPORTAR A EXCEL', array('class'=>'link')) ?>&nbsp;</td>
  </tr>
  <tr>
    <td style="padding:15px; font-size:13px"> DISTRITAL</td>
    <td style="padding:15px; font-size:13px"><?= HTML::link('reporte/lista-reg-cand-dist-excel', 'EXPORTAR A EXCEL', array('class'=>'link')) ?>&nbsp; </td>
    
  </tr>
</table>



@stop
<?=HTML::style('css/program/descarga.css')?>
<?=HTML::style('css/program/reports.css')?>
@section("javascript-ini")        
	<? //= HTML::script('js/library/angularjs/controllers/reporte_cartel_candidato.js') ?>
@stop


