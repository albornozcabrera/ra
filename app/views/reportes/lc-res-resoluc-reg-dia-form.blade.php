@section('css')
<?= HTML::style('css/program/filtro.css') ?>
@stop

@section('javascript')
<?= HTML::script('js/library/jquery/avance_impresion.js') ?>
<?= HTML::script('js/library/angularjs/controllers/reporte_lc-res-resoluc-reg-dia.js') ?>
@stop


@section('filter')
<div  class="body_conte">
    <div class="header_conte" style="font-size: 1em">{{$title}}</div>
    <div class="clearfix padding_10">
        <div class="wrap_conte_filtros">
            <div class="clearfix conte_filtros">
                <label class="label_selects label-filter-org-1">FECHA INICIAL</label>
                <input class="selects datepicker" type="text" placeholder="  dd/mm/aaaa" id="feIni" ng-model="fini"/>

                <label class="label_selects label-filter-org-1">FECHA FINAL</label>
                <input class="selects datepicker" type="text" placeholder="  dd/mm/aaaa" id="feFin" ng-model="ffin"/>
                <div class="centrar"> 
                    <input type="button"   class="botones" value="CONSULTAR" ng-show="showconsulta" id="btConsulta" ng-click='btnConsulta()' ng-cloak>
                    <input type="button"   class="botones" value="EXPORTAR" ng-show="showexport" id="btnexport" ng-click='exportData()' ng-cloak>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="carga"></div>

<br>
<div ng-app="ctrlReporte"><br>  
    <div style="width: 100%; height: 500px; overflow-y: scroll;" ng-show="showReporte" ng-cloak>
        <table   border="1" bordercolor="#c5dbec" width="100%" style="font-size:13px">
            <tr bgcolor="#667595" align="center" style="color: #FFFFFF">
                <th style="padding:10px">N°</th>
                <th style="padding:10px">COD. ODPE</th>
                <th style="padding:10px">ODPE</th>
                <th style="padding:10px">FECHA</th>
                <th style="padding:10px">CANT. RES.<br> ORG. POL</th>
                <th style="padding:10px">CANT. RES.<br> POR LISTA</th>
                <th style="padding:10px">CANT. RES.<br> POR CAND</th>
                <th style="padding:10px">USUARIO</th>
            </tr><br>
            <tr ng-repeat="lista in lista">
                <td width="2" align="center"><%$index + 1%></td>
                <td width="10" align="center"><%lista.c_odpe %></td>
                <td width="15" align="center"><%lista.odpe %></td>
                <td width="10" align="center"><%lista.fecha_format %></td>
                <td width="15" align="center"><%lista.cant_r_op %></td>
                <td width="15" align="center"><%lista.cant_r_list%></td>
                <td width="15" align="center"><%lista.cant_r_cand%></td>
                <td width="15" align="center"><%lista.usuario %></td> 
            </tr>
        </table>
    </div>
    <div>
        <div class="content-message notice" ng-show="showAlert" ng-cloak>
            <span class="ng-binding">INFO:</span>NO SE ENCONTRARON REGISTROS  
        </div>
    </div>
</div>  
@stop

