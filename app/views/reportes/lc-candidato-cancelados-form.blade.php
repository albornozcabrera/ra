@section('css')
<?= HTML::style('css/program/filtro.css') ?>
@stop

@section('javascript')
<?= HTML::script('js/library/angularjs/controllers/reporte_lc-candidato-cancelados.js') ?>
@stop


@section('filter')
<!--<div class="centrar content-message   warning"> 
    <div>NO SE ENCONTRARON CANDIDATOS CANCELADOS</div>
</div>-->

<div  class="body_conte">
    <div class="header_conte" style="font-size: 1em">{{$title}}</div>
    <div class="clearfix padding_10">
        <div class="wrap_conte_filtros">
            <div class="clearfix conte_filtros">
                <div class="centrar"> 
                    <input type="button"   class="botones" value="CONSULTAR" ng-show="showconsultar" id="btnexport" ng-click='getConsultar()' ng-cloak>
                    <input type="button"   class="botones" value="EXPORTAR" ng-show="showexport" id="btnexport" ng-click='exportData()' ng-cloak>
                </div>                
            </div>
        </div>
    </div>
</div>
<br>
<div id="carga"></div>
<div style="width: 100%; height:450px; overflow-y: scroll" ng-show="showreport" ng-cloak>
    <table width="100%"  border="1" bordercolor="#c5dbec" style="font-size:12px; overflow-y: scroll; ">
        <tr bgcolor="#667595" align="center" style="font-size:12px;color: #FFFFFF">
            <th style="padding:5px">N°</th>
            <th style="pahding:5px">DNI</th>
            <th style="padding:5px">APELLIDO PATERNO</th>
            <th style="padding:5px">APELLIDO MATERNO</th>
            <th style="padding:5px">NOMBRES</th>
            <th style="padding:5px">CARGO</th>
            <th style="padding:5px">ORGANIZACIÓN POLÍTICA</th>
            <th style="padding:5px">ODPE</th>
            <th style="padding:5px">TIP. ORG. POLI.</th>
            <th style="padding:5px">UBIGEO</th>
            <th style="padding:5px">DEPARTAMENTO</th>
            <th style="padding:5px">PROVINCIA</th>
            <th style="padding:5px">DISTRITO</th>
            <th style="padding:5px">MOTIVO</th>
        </tr>   
        <tr ng-repeat="list in lista" ng-cloak>
            <td width="5" align="center"><%$index+1 %></td>
            <td width="12" align="center"><%list.c_dni%></td>
            <td width="25" align="center"><%list.c_apellido_paterno%></td>
            <td width="25" align="center"><%list.c_apellido_materno%></td>
            <td width="15" align="center"><%list.c_nombres%></td>
            <td width="15" align="center"><%list.cargo%></td>
            <td width="32" align="center"><%list.organizacion%></td>
            <td width="25" align="center"><%list.odpe%>&nbsp;</td>
            <td width="15" align="center"><%list.tip_org%>&nbsp;</td>
            <td width="12" align="center"><%list.c_ubigeo%>&nbsp;</td>
            <td width="25" align="center"><%list.departamento%>&nbsp;</td>
            <td width="25" align="center"><%list.provincia%>&nbsp;</td>
            <td width="25" align="center"><%list.distrito%>&nbsp;</td> 
            <td width="12" align="center"><%list.motivo%>&nbsp;</td>
        </tr>
    </table>
</div>

@stop



