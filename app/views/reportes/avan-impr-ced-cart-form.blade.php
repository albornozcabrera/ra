@section('css')
<?= HTML::style('css/program/filtro.css') ?>
@stop

@section('filter')
<div ng-controller="ctrlReporte">
    <div  class="body_conte" >
        <div class="header_conte" style="font-size: 1em">{{$title}}</div>
        <div class="clearfix padding_10">
            <div class="wrap_conte_filtros">
                <div class="controles-filtros">
                    <div class="clearfix conte_filtros">
                        <label class="label_selects label-filter-org-1 ">ELECCIÓN</label>
                        <select class="selects selects_filtros from-select" ng-model="eleccion">
                            <option value='' selected="selected">Seleccione</option>
                            <!--<option value='9'>TODOS</option> -->
                            @foreach($eleccion as $d)
                                    <option value="{{$d->cod}}">
                                            {{$d->nom}}
                                    </option>
                                @endforeach
                        </select> 
<!--                         <label class="label_selects label-filter-org-1">FECHA INICIAL</label>
                        <input class="selects datepicker" type="text" placeholder="  dd/mm/aaaa" id="feIni" ng-model="fini"/>

                        <<label class="label_selects label-filter-org-1">FECHA FINAL</label>
                        <input class="selects datepicker" type="text" placeholder="  dd/mm/aaaa" id="feFin" ng-model="ffin"/> -->
                    </div>
                    <div class="clearfix conte_filtros">
                        <label class="label_selects label-filter-org-1">ESTADO</label>
                        <select class="selects selects_filtros from-select" ng-model="estadoImp" ng-model="estadoImp">
                            <option value='' selected="selected"  >Seleccione</option>
                            <option value='1'>VALIDADAS</option>
                            <option value='0'>POR VALIDAR</option>
                        </select> 
                        <label class="label_selects label-filter-org-1">TIPO</label>
                        <select class="selects selects_filtros from-select" ng-model="tipoImp">
                            <option value='' selected="selected"  >Seleccione</option>
                            <option value='2'>CÉDULA</option>
                            <option value='1'>CARTEL</option>
                        </select> 
                    </div>
                </div>
                <div>
                    <div class="centra_botones">
                        <input id="btnconsultar" class="botones" type="button" ng-show="showconsultar" value="CONSULTAR" ng-click="getConsultar()" ng-cloak>
                        <input id="btnconsultar" class="botones" type="button" value="EXPORTAR" ng-show="showexport" ng-click="getExportData()" ng-cloak>
                    </div>
                </div>
            </div>
            <br>
        </div>
    </div>
    <br>
    <div id="carga" ></div>
    <div style="width: 100%; height: 600px; overflow-y: scroll;" ng-show="showAvanceImp" ng-cloak>
        <table  border="1" bordercolor="#c5dbec" width="100%" style="font-size:13px">
            <tr bgcolor="#667595" align="center" style="color: #FFFFFF" >
                <th>NRO°</th>
                <th>DEPARTAMENTO</th>
                <th>PROVINCIA</th>
                <th>DISTRITO</th>
                <th>V.B. CED/CART</th>
                <th>TIPO</th>
                <!--<th>FECHA</th>--> 
                <!--<th>USUARIO</th>--> 
            </tr>
            <tr ng-repeat="item in lista">
                <td align="center"><% $index + 1%></td>
                <td align="center"><% item.departamento %></td>
                <td align="center"><% item.provincia %></td>
                <td align="center"><% item.distrito %></td>
                <!--<td align="center"><% item.c_tipo %></td>-->
                <td ng-if=" item.estado == 1" align="center" valign="middle">{{ HTML::image('img/plantilla/check.jpg','ONPE', array('width'=>'27', 'height'=>'22')) }} </td>
                <td ng-if="item.estado == 0 || item.estado == null" align="center" valign="middle">{{ HTML::image('img/plantilla/nocheck.jpg','ONPE', array('width'=>'27', 'height'=>'22')) }} </td> 
                <td align="center"><% item.tipo  %></td> 
                <!--<td align="center"><% item.fecha %></td>--> 
                <!--<td align="center"><% item.nombre_apellido %></td>--> 
            </tr>
        </table>
    </div>
    <div class="centrar content-message   notice" ng-show="showAlertCompletar" ng-cloak> 
        <div><strong>NOTA:</strong>Para consultar el avance de Impresión complete todos los datos</div>
    </div>
    <div class="centrar content-message   notice" ng-show="showAlertFaltan" ng-cloak> 
        <div><strong>NOTA:</strong>Complete todos los Datos para Realizar una búsqueda</div>
    </div>
    <div class="centrar content-message   notice" ng-show="showAlertFecha" ng-cloak> 
        <div><strong>NOTA:</strong>La Fecha Final no puede ser menor que la Fecha Inicial</div>
    </div>
    <div class="centrar content-message   notice" ng-show="showAlertData" ng-cloak> 
        <div><strong>NOTA:</strong>No existen Datos para Mostrar</div>
    </div>
</div>
@stop

@section("javascript-ini")      
<?= HTML::script('js/library/angularjs/controllers/avance_impresion.js') ?>
<?= HTML::script('js/library/angularjs/controllers/filtro.js') ?>
<?= HTML::script('js/library/jquery/avance_impresion.js') ?>
@stop



