@section('css')
<?= HTML::style('css/program/filtro.css') ?>
@stop

@section('javascript')
<?= HTML::script('js/library/angularjs/controllers/reporte_avance_org_pol_reg_ambito.js') ?>
@stop


@section('filter')

<div  class="body_conte">
    <div class="header_conte" style="font-size: 1em">{{$title}}</div>
    <div class="clearfix padding_10">
        <div class="wrap_conte_filtros">
            <div class="clearfix conte_filtros">
              <div class="centrar"> 
                <input type="button"   class="botones" value="CONSULTAR" id="btConsulta" ng-click='btnConsulta()' ng-cloak>
                <input type="button"   class="botones" value="EXPORTAR" ng-show="showexport" id="btnexport" ng-click='exportData()' ng-cloak>
              </div>
            </div>
        </div>

    </div>
</div>
<br/>
<div ng-app="ctrlReporte"><br>
<div ng-show="showReporte">
    <table width="100%"  border="1" bordercolor="#c5dbec" style="font-size:15px" ng-cloak  >
      <tr bgcolor="#667595" align="center" style="color: #FFFFFF">
        <th rowspan="2" style="padding:10px">TIPO<br>ELECCIÓN</th>
        <th colspan="6"  style="padding:10px">ESTADO</th>
        <th rowspan="2"  style="padding:10px">AVANCE</th>
        <th rowspan="2"  style="padding:10px">FALTAN</th>
      </tr><br>
      <tr bgcolor="#667595" align="center" style="color: #FFFFFF" >
        <th style="padding:10px">EN TRÁMITE</th>
        <th style="padding:10px">PERIODO DE TACHA</th>
        <th style="padding:10px">INSCRITO</th>
        <th style="padding:10px">NO INSCRITO</th>
        <th style="padding:10px">INSCRITO EN APELACIÓN</th>
        <th style="padding:10px">NO INSCRITO EN APELACIÓN</th>
      </tr>
      <tr ng-repeat="lista in lista">
          <td align="left"><%lista.ambito%></td>
          <td align="center"><%lista.tramite%></td>
          <td align="center"><%lista.periodo_tacha%></td>
          <td align="center"><%lista.inscrito%></td>
          <td align="center"><%lista.no_inscrito%></td>
          <td align="center"><%lista.inscrito_apel%></td>
          <td align="center"><%lista.no_inscrito_apel%></td>
          <td align="center"><%lista.avance%></td>
          <td align="center"><%lista.faltan%></td>
      </tr>

    </table>
</div>
    
</div>


@stop



