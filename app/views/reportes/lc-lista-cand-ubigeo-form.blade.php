@section('css')
<?= HTML::style('css/program/filtro.css') ?>
@stop

@section('javascript')
<?= HTML::script('js/library/angularjs/controllers/reporte_lista_cand_ubigeo.js') ?>
@stop



@section('filter')

<div  class="body_conte">
    <div class="header_conte" style="font-size: 1em">{{$title}}</div>
    <div class="clearfix padding_10">
        <div class="wrap_conte_filtros">
            <div class="clearfix conte_filtros">

                <label class="label_selects label-filter-1" for="departamento" ng-show="showdep" ng-cloak>Departamento</label>
                <select class="selects selects_filtros from-select" ng-show="showdep" id="departamento" name="departamento" ng-model="departamento" ng-change="getDepartamento()" ng-cloak>
                    <option value='' selected="selected">Seleccione</option>
                    <option ng-repeat="dep in departamentos" value="<%dep.cod%>"><%dep.nom%></option>
                </select>

                <label class="label_selects label-110" for="provincia" ng-show="showprovincia" ng-cloak>Provincia</label>
                <select class="selects selects_filtros from-select" ng-show="showprovincia" id="provincia" name="provincia" ng-model="provincia" ng-change="getProvincia()" ng-cloak>
                    <option value='' selected="selected">Seleccione</option> 
                    <option ng-repeat="p in provincias" value="<%p.cod%>"><%p.nom%></option>
                </select> 

                <input type="button" class="botones" value="CONSULTAR" ng-show="showconsultar"id="btnconsultar" ng-click='getConsultar()' ng-cloak>
              <!--<input type="button" class="botones" value="EXPORTAR"  ng-show="showexport"   id="btnexport"    ng-click='exportData()'   ng-cloak>-->
                <br><br>
                <label class="label_selects label-filter-1" for="distrito" ng-show="showdistrito" ng-cloak>Distrito</label>
                <select class="selects selects_filtros from-select" ng-show="showdistrito" id="distrito" name="distrito"  ng-model="distrito" ng-change="getDistrito()" ng-cloak>
                    <option value='' selected="selected">Seleccione</option> 
                    <option ng-repeat="d in distritos" value="<%d.cod%>"> <%d.nom%></option>
                </select>

<!--                <label class="label_selects label-filter-1" for="organizacion" ng-show="showorganizacion" ng-cloak>Organizacion</label>
                <select class="selects selects_filtros from-select" ng-show="showorganizacion" name="organizacion" ng-model="organizacion" ng-change="getOrganizacion()" ng-cloak>
                    <option value='' selected="selected">Mostrar Todas</option> 
                    <option ng-repeat="o in organizaciones" value="<%o.cod%>"><%o.nom%></option>
                </select> -->
            </div>
        </div>
    </div>
</div>
<br/>

<div style="width: 100%; height: 600px; overflow-y: scroll;" ng-show='showreporte'  ng-cloak>
    <div id="carga"></div>
    <div ng-show='showreporteTable' ng-cloak>
        <table width="850"  border="0" align="center" style="font-size:13px">
            <tr align="center"  style="cursor:pointer;" >
                <td><input type="button" class="botones" value="ORGANIZACIONES CON LISTA" ng-show="showexportar1"id="btnexportar1" ng-click='getExportar1()' ng-cloak></td>
                <td><input type="button" class="botones" value="ORGANIZACIONES CON LISTAS Y SUS CANDIDATOS" ng-show="showexportar2"id="btnExportar2" ng-click='getExportar2()' ng-cloak></td>
            </tr>
        </table>
    </div>
    <P> </P>
    <div ng-show='showreporteTable' ng-cloak>
        <table width="100%"  border="1" cellpadding="0" cellspacing="0" bordercolor="#c5dbec" style="font-size:13px">
            <tr bgcolor="#667595" align="center" style="color: #FFFFFF" >
                <td></td>
                <td>NRO</td> 
                <td>AMBITO ORG</td>
                <td>ORGANIZACIÓN</td>
                <td>ESTADO ORG.</td>
                <td>ULT. RES. ORG.</td>
            </tr>
            <tbody ng-repeat="item in lista">    
                <tr>   
                    <td ><span class="ui-icon ui-icon-plusthick btnplus" style="display:block;margin:0px auto;cursor:pointer;" data-nro="<%item.nro%>"></span></td>
                    <td align="center"><% item.nro %></td>
                    <td><% item.ambito %></td>
                    <td><% item.organizacion %></td>
                    <td align="center"><% item.estado %></td>
                    <td align="center"><% item.resolucion %></td>
                </tr>
                <tr id="<%item.nro%>" style="display:none;" >
                    <td colspan="6" align="center" style="padding:10px; ">
                        <table width="79%" border="1" bordercolor="#c5dbec">
                            <tr bgcolor="#99BEF0">
                                <td>NRO.</td>
                                <td>DNI</td>
                                <td>CANDIDATO</td>
                                <td>ESTADO</td>
                                <td>CARGO</td>
                                <td>POS.</td>
                                <td>ULT. RES.</td>
                            </tr>
                            <tr  ng-repeat="item2 in item.ListaCand" >
                                <td align="center"><% item2.nro %></td>
                                <td align="center"><% item2.c_dni %></td>
                                <td><% item2.candidato %></td>
                                <td><% item2.estado %></td>
                                <td><% item2.cargo %></td>
                                <td align="center"><% item2.pos %></td>
                                <td align="center"><% item2.resolucion %></td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </tbody>    
        </table>

    </div>
</div>   
<div class="content-message  <%message.class%>" ng-show="message.show" ng-cloak > 
    <span><%message.type%>:</span><%message.text%>&nbsp;&nbsp;
</div>
@stop

