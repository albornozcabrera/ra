@extends('layouts.main.master')
@section('content')



<table width="80%" border="1" align="center" >
  <tr bgcolor="#667595" style="color:#FFFFFF">
    <td height="50"  align="center"><strong>MODULO DE REPORTES</strong> : ORGANIZACIONES POLÍTICAS </td>
  </tr>
  <tr >
    <td style="padding:15px; font-size:13px" >
        <?= HTML::link('reporte/sorteo-agrup-polt-est-verif', 'RESUMEN DE SORTEO DE ORGANIZACIONES POLÍTICAS SEGÚN ESTADO DE VERIFICACIÓN', array('class'=>'link')) ?>
   </td>
  </tr>
  
  <tr>
    <td style="padding:15px; font-size:13px">
    <?= HTML::link('reporte/org-resol-reg-cand-odpe', 'LISTADO DE ORGANIZACIONES CON RESOLUCIONES REGISTRADAS DE CANDIDATOS POR ODPE', array('class'=>'link')) ?>
    </td>
  </tr>
  
  <tr>
    <td style="padding:15px; font-size:13px">
	<?= HTML::link('reporte/org-eleccion-cartel', 'ORGANIZACIONES POLÍTICAS POR ELECCIÓN PARA CARTEL DE CANDIDATOS', array('class'=>'link')) ?>
    </td>
    
  </tr>
  <tr>
    <td style="padding:15px; font-size:13px">
    <?= HTML::link('reporte/org-eleccion-cedula', 'ORGANIZACIONES POLÍTICAS POR ELECCIÓN PARA CÉDULAS', array('class'=>'link')) ?>
    </td>
   
  </tr>
  <tr>  
    <td style="padding:15px; font-size:13px">
	<?= HTML::link('reporte/org-consolidado-odpe', 'RESUMEN DE ORGANIZACIONES POLÍTICAS POR ODPE', array('class'=>'link')) ?></td>
    
  </tr>
  <tr>
    <td style="padding:15px; font-size:13px">
    <?= HTML::link('reporte/org-avance-org-politica-reg-ambito/listar', 'AVANCE DE ORGANIZACIONES POLÍTICAS REGISTRADAS POR ÁMBITO', array('class'=>'link')) ?> </td>
    
  </tr>
</table>



@stop
<?=HTML::style('css/program/descarga.css')?>
<?=HTML::style('css/program/reports.css')?>
@section("javascript-ini")        
	<? //= HTML::script('js/library/angularjs/controllers/reporte_cartel_candidato.js') ?>
@stop


