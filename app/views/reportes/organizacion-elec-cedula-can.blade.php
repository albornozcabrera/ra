@section('css')
<?= HTML::style('css/program/filtro.css') ?>
@stop

@section('javascript')
<?= HTML::script('js/library/angularjs/controllers/reporte_cedula_candidato.js') ?>
@stop


@section('filter')

<div  class="body_conte">
    <div class="header_conte" style="font-size: 1em">{{$title}}</div>
    <div class="clearfix padding_10">
        <div class="wrap_conte_filtros">
            <div class="clearfix conte_filtros">
            
            
            
      <label class="label_selects label-filter-1" for="ambito">Ambito</label>

      <select class="selects selects_filtros from-select" id="ambito" name="ambito" ng-model="ambito" ng-change="getAmbito()" ng-cloak>
          <option value=''>Seleccione</option>
                  <!--<option value="{{Config::get('constants.C_DEPARTAMENTAL')}}">REGIONAL</option>-->
                  <option value="{{Config::get('constants.C_DISTRITAL')}}">MUNICIPAL</option>
      </select>

      <label class="label_selects label-110" for="departamento" ng-show="showdep" ng-cloak>Departamento</label>
      <select class="selects selects_filtros from-select" ng-show="showdep" name="departamento" ng-model="departamento" ng-change="getDepartamento()" ng-cloak>
         <option value='' selected="selected">TODOS</option>
          <!-- <option value="{{Config::get('constants.C_TODOS_DE')}}"  selected="selected">TODOS</option> -->
          <option ng-repeat="dep in departamentos" value="<%dep.cod%>"><%dep.nom%></option>
      </select>
      

      <input type="button"  class=" botones" value="CONSULTAR" ng-show="showconsultar"id="btnconsultar" ng-disabled="disableConsultar" ng-click='getConsultar()' ng-cloak>           
      <input type="button"   class="botones" value="EXPORTAR" ng-show="showexport" id="btnexport" ng-disabled='disableExportar' ng-click='getexportData()' ng-cloak>
  
      
      <br>
      <br>
      <label class="label_selects label-filter-1" for="PROVINCIA" ng-show="showprovincia" ng-cloak>Provincia</label>
      <select class="selects selects_filtros from-select"  ng-show="showprovincia" id="provincia" name="provincia" ng-model="provincia" ng-change="getProvincia()" ng-cloak>
                        <option value=''>TODOS</option> 
                        <!--  <option value="{{Config::get('constants.C_TODOS_P')}}"  selected="selected">TODOS</option>-->
                        <option ng-repeat="p in provincias" value="<%p.cod%>"><%p.nom%></option>
      </select> 
      

       <label class="label_selects label-110" for="distrito" ng-show="showdistrito" ng-cloak>Distrito</label>
       <select class="selects selects_filtros from-select" ng-show="showdistrito" id="distrito" name="distrito" ng-model="distrito" ng-change="getDistrito()" ng-cloak>
                      <option value=''>TODOS</option> 
                       <!--  <option value="{{Config::get('constants.C_TODOS_DI')}}"  selected="selected" >TODOS</option> -->
                        <option ng-repeat="d in distritos" value="<%d.cod%>">
                            <%d.nom%>
                        </option>
                    </select>


                 
                
                
                
            </div>
        </div>

    </div>
</div>


<br/>

<div style="width: 100%; height: 600px; overflow-y: scroll;" ng-show='showreporte' ng-cloak>
<div id="carga"></div>
<table  border="1" bordercolor="#c5dbec" width="100%"  style="font-size:13px" ng-show='showreporteTable'  ng-cloak>
    <tr bgcolor="#667595" align="center" style="color: #FFFFFF" >
    <td>DEPARTAMENTO</td>
    <td>PROVINCIA</td>
    <td>DISTRITO</td>
    
    <td>TRÁMITE</td>
    <td>PERIODO DE TACHAS</td>
    <td>INSCRITO</td>
    <td>NO INSCRITO</td>
    <td>INSCRITO EN APELACIÓN</td>
    <td>NO INSCRITO EN APELACIÓN</td>
    <td>ESTADO</td>
    </tr>
    <tr ng-repeat="item in lista" style="background-color:<% (item.departamento != null?'#eafadc':(item.provincia != null?'#ffffe0':''))  %> " >
    	<td><% item.departamento %></td>
        <td><% item.provincia %></td>
        <td><% item.distrito %></td>
        <td align="center"><% (ambito == '03' && item.departamento != null )?'':(item.capital == '01'?'':item.tramite) %></td>
        <td align="center"><% (ambito == '03' && item.departamento != null )?'':(item.capital == '01'?'':item.periodo_tacha) %></td>
        <td align="center"><% (ambito == '03' && item.departamento != null )?'':(item.capital == '01'?'':item.inscrito) %></td>
        <td align="center"><% (ambito == '03' && item.departamento != null )?'':(item.capital == '01'?'':item.no_inscrito) %></td>
        <td align="center"><% (ambito == '03' && item.departamento != null )?'':(item.capital == '01'?'':item.inscrito_apel) %></td>
        <td align="center"><% (ambito == '03' && item.departamento != null )?'':(item.capital == '01'?'':item.no_inscrito_apel) %></td>
        <td style="color:<% item.capital == '01'?'':(item.est_a != 0 && item.est_b == 0)?'#002CFC':'#FF0004' %>" >
       			<% (ambito == '03' && item.departamento != null )?'':item.estado %> </td> 
  


    </tr>
</table>
</div>   

@stop



