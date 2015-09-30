<?php 
$action='consultarParticipantes()';
$title='PARTICIPACIÓN DE CANDIDATOS';
$controller='ctrlParticipacion';
?>

@include('layouts.login.master')
@section('content')
<?php $display='block';?>    

<div id="modalParticipacion" title="Consulta" ng-controller="ctrlParticipacion">
    <div class="header_conte" style="font-size: 1em">PARTICIPACIÓN DE CANDIDATO</div>
    <br>
    <div  class="body_conte" >
        <div class="clearfix padding_10">
            <div class="wrap_conte_filtros">
                <div class="clearfix conte_filtros">
                    <label class="label_selects label-110 ">Búsqueda</label>
                    <select class="selects selects_filtros from-select" ng-model="select" ng-change="getBusqueda()" ng-cloak>
                        <option value='' selected="selected">Seleccione</option>
                        <option value="<%item.id%>" ng-repeat="item in busqueda"><%item.nom%></option>
                    </select> 
                </div>
            </div>
        </div>
    </div>
    <div  class="body_conte" ng-show="showFilUbi" ng-cloak>
        <div class="clearfix padding_10">
            <div class="wrap_conte_filtros" >
                <div class="controles-filtros">
                    <div class="clearfix conte_filtros">
                        <label class="label_selects label-100" >Departamento</label>
                        <select class="selects selects_filtros from-select" name="departamento" ng-model="departamento" ng-change="getDepartamento()" ng-cloak>
                            <option value='' selected="selected">Seleccione</option>
                            @foreach($departamentos as $d)
                                <option value="{{$d->cod}}">
                                        {{$d->nom}}
                                </option>
                            @endforeach
                        </select> 
                        <label class="label_selects label-100"  ng-show="showeleccion" ng-cloak>Elección</label>
                        <select class="selects selects_filtros from-select" ng-show="showeleccion" id="odpe" name="odpe" ng-model="eleccion" ng-change="getEleccion()" ng-cloak>
                            <option value='' selected="selected">Seleccione</option>
                            <option ng-repeat="e in elecciones" value="<%e.cod%>">
                                <%e.nom%>
                            </option>
                        </select> 
                    </div>
                    <div class="clearfix conte_filtros">
                        <label class="label_selects label-100" for="PROVINCIA" ng-show="showprovincia" ng-cloak>Provincia</label>
                        <select class="selects selects_filtros from-select" ng-show="showprovincia" d="provincia" name="provincia" ng-model="provincia" ng-change="getProvincia()" ng-cloak>
                            <option value='' selected="selected">Seleccione</option>
                            <option ng-repeat="p in provincias" value="<%p.cod%>">
                                <%p.nom%>
                            </option>
                        </select>
                        <label class="label_selects label-100" for="distrito" ng-show="showdistrito" ng-cloak>Distrito</label>
                        <select class="selects selects_filtros from-select" ng-show="showdistrito" id="distrito" name="distrito" ng-model="distrito" ng-change="getDistrito()" ng-cloak>
                            <option value='' selected="selected">Seleccione</option>
                            <option ng-repeat="d in distritos" value="<%d.cod%>">
                                <%d.nom%>
                            </option>
                        </select> 
                    </div> 
                </div>
                <div>
                    <div class="centra_botones"> <input type="button"  class=" botones" value="CONSULTAR" 
                    ng-show="showconsultar"id="btnconsulta" ng-click='{{$action}}' ng-cloak>
                    </div>
                </div>
            </div>    
        </div>
    </div> 
    <br>
    <div id="carga"></div>
    <div style="width: 100%; height: 500px; overflow-y: scroll;" ng-show="showListP" ng-cloak>
        <table  border="1" bordercolor="#c5dbec" width="100%" style="font-size:13px">
            <tr bgcolor="#667595" align="center" style="color: #FFFFFF" >
                <th>DNI</th>
                <th>NOMBRES</th>
                <th>APELLIDOS</th>    
                <th>CARGO</th>
                <th>TIPO DE ORGANIZACIÓN</th>
                <th>ORGANIZACIÓN</th>
                <th>ELECCIÓN</th>
                <th>DEPARTAMENTO</th>
                <th>PROVINCIA</th>
                <th>DISTRITO</th>
            </tr>
            <tr ng-repeat="item in candidato" ng-cloak>
                <td><%item.dni%></td>
                <td><%item.nombres%></td>
                <td><%item.apparterno%> <%item.apmaterno%></td>    
                <td><%item.nomcargo%></td>
                <td><%item.nomtipo%></td>            
                <td><%item.nomorg%></td>
                <td><%item.nomambito%></td> 
                <td><%item.departamento%></td>
                <td><%item.provincia%></td>
                <td><%item.distrito%></td>
            </tr>    
        </table>
    </div>
    <div  class="body_conte" ng-show="showFilDni" ng-cloak>
        <div class="clearfix padding_10">
            <div class="wrap_conte_filtros">
                <div class="clearfix conte_filtros">
                    <label class="label_selects label-110 ">DNI</label>
                    <form ng-submit="participacion()">
                        <input type="text" class="inputs input-1" ng-model="dni" ng-keypress="validaInteger($event)" maxlength="8"  />
                    </form>
                </div>
                <div ng-if="content" ng-cloak>
<!--                    <div class="clearfix conte_filtros">
                        <label class="label_selects label-110 ">Nombres</label>
                        <label class="label_selects_bold "><%candidato.nombres%></label>
                    </div>
                    <div class="clearfix conte_filtros">
                        <label class="label_selects label-110 ">Apellidos</label>
                        <label class="label_selects_bold "><%candidato.appaterno+" "+candidato.apmaterno%></label>
                    </div>
                    <div class="clearfix conte_filtros">
                        <label class="label_selects label-110 ">Cargo</label>
                        <label class="label_selects_bold "><%candidato.nomcargo%></label>
                    </div>
                    <div class="clearfix conte_filtros">
                        <label class="label_selects label-110 ">ODPE</label>
                        <label class="label_selects_bold label-110 "><%candidato.nomodpe%></label>
                    </div>
                    <div class="clearfix conte_filtros">
                        <label class="label_selects label-110 ">Tipo</label>
                        <label class="label_selects_bold "><%candidato.nomtipo%></label>
                    </div>
                    <div class="clearfix conte_filtros">
                        <label class="label_selects label-110 ">Organización</label>
                        <label class="label_selects_bold "><%candidato.nomorg%></label>
                    </div>
                    <div class="clearfix conte_filtros">
                        <label class="label_selects label-110 ">Eleccion</label>
                        <label class="label_selects_bold "><%candidato.nomambito%></label>
                    </div>
                    <div class="clearfix conte_filtros">
                        <label class="label_selects label-110  ">Departamento</label>
                        <label class="label_selects_bold "><%candidato.departamento%></label>
                    </div>
                    <div class="clearfix conte_filtros">
                        <label class="label_selects label-110 ">Provincia</label>
                        <label class="label_selects_bold "><%candidato.provincia%></label>
                    </div>
                    <div class="clearfix conte_filtros">
                        <label class="label_selects label-110 ">Distrito</label>
                        <label class="label_selects_bold "><%candidato.distrito%></label>
                    </div>-->
                </div>
            </div>
        </div>
    </div>
    <div class="content-message  <%message.class%>" ng-show="message.visible" ng-cloak > 
            <span><%message.type%>:</span><%message.text%>&nbsp;&nbsp;
    </div>
    <br>
    <div style="width: 100%; height: 500px;" ng-show="showTable" ng-cloak>
        <table  border="1" bordercolor="#c5dbec" width="100%" style="font-size:13px" ng-if="content" ng-cloak>
            <tr bgcolor="#667595" align="center" style="color: #FFFFFF" >
                <th>NOMBRES</th>
                <th>APELLIDOS</th>    
                <th>CARGO</th>
                <th>TIPO DE ORGANIZACIÓN</th>
                <th>ORGANIZACIÓN</th>
                <th>ELECCIÓN</th>
                <th>DEPARTAMENTO</th>
                <th>PROVINCIA</th>
                <th>DISTRITO</th>
            </tr> <br>
            <tr  ng-cloak>
                <td><%candidato.nombres%></td>
                <td><%candidato.apparterno%> <%candidato.apmaterno%></td>    
                <td><%candidato.nomcargo%></td>           
                <td><%candidato.nomtipo%></td>
                <td><%candidato.nomorg%></td> 
                <td><%candidato.nomambito%></td> 
                <td><%candidato.departamento%></td> 
                <td><%candidato.provincia%></td>
                <td><%candidato.distrito%></td>
            </tr>    
        </table>
    </div>
</div>
@stop

@section("javascript-ini")      
<?= HTML::script('js/library/angularjs/controllers/participacion.js') ?>

<?= HTML::script('js/library/jquery/participacion.js') ?>
@stop
