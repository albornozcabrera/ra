@section('css')
<?= HTML::style('css/program/filtro.css') ?>
@stop

@section('javascript')
<?= HTML::script('js/library/angularjs/controllers/reporte_sor_ag_pol_est_verif.js') ?>
@stop

@section('filter')

<div  class="body_conte">
    <div class="header_conte" style="font-size: 1em">{{$title}}</div>
    <div class="clearfix padding_10">
        <div class="wrap_conte_filtros">
            <div class="clearfix conte_filtros">
              <label class="label_selects label-1" for="departamento" ng-show="showdep" ng-cloak>Departamento</label>
              <select class="selects selects_filtros from-select" ng-show="showdep" name="departamento" ng-model="departamento" ng-change="getDepartamento()" ng-cloak>
                 <option value='' selected="selected">Seleccione</option>
                 <option value="{{Config::get('constants.C_TODOS_DE')}}"  selected="selected">TODOS</option> 
                 <option ng-repeat="dep in departamentos" value="<%dep.cod%>"><%dep.nom%></option>
              </select>
            
              <label class="label_selects label-1" for="PROVINCIA" ng-show="showprovincia" ng-cloak> Provincia</label>
              <select class="selects selects_filtros from-select"  ng-show="showprovincia" id="provincia" name="provincia" ng-model="provincia" ng-change="getProvincia()" ng-cloak>
                                <option value=''>Seleccione</option> 
                               <option value="{{Config::get('constants.C_TODOS_P')}}"  selected="selected">TODOS</option>
                                <option ng-repeat="p in provincias" value="<%p.cod%>"><%p.nom%></option>
              </select> 

               <label class="label_selects label-1" for="distrito" ng-show="showdistrito" ng-cloak>Distrito</label>
               <select class="selects selects_filtros from-select" name="distrito" ng-show="showdistrito" id="distrito"  ng-model="distrito" ng-change="getDistrito()" ng-cloak>
                                <option value=''>Seleccione</option> 
                                <option value="{{Config::get('constants.C_TODOS_DI')}}"  selected="selected" >TODOS</option> 
                                <option ng-repeat="d in distritos" value="<%d.cod%>"><%d.nom%></option>
               </select>
            
               <div align="center" class="label_selects label-1" > 
                  <label>REGISTRO </label><input type="checkbox" name="registro" ng-model="registro"   /> 
                  <label>GESTION </label><input  type="checkbox" name="gestion"  ng-model="gestion"   />  
                  <input type="button"  class=" botones" value="CONSULTAR" ng-show="showconsultar"id="btnconsultar" ng-click='getConsultar()' ng-cloak>
                  <input type="button"   class="botones" value="EXPORTAR" ng-show="showexport" id="btnexport" ng-click='exportData()' ng-cloak>
               </div>            
            </div>
        </div>
    </div>
</div>

<br/>

<div style="width: 100%; height: 600px; overflow-y: scroll;" ng-show='showreporte'  ng-cloak>
<div id="carga"></div>
<table  border="1" bordercolor="#c5dbec" width="100%" style="font-size:12px"  ng-show='showreporteTable'   ng-cloak> 
    <tr bgcolor="#667595" align="center" style="color: #FFFFFF" >
        <td>TIPO</td>
        <td>ORGANIZACIÓN</td> 
        <td>DEPARTAMENTO</td>
        <td>PROVINCIA</td>
        <td>DISTRITO</td>
        <!--<td>ORDEN_BLOQUE</td>-->
        <td>NRO.ORDEN</td>
        <td>REGISTRO</td>
        <td>GESTIÓN</td>
    </tr>
    <tr ng-repeat="item in lista"  >
    	<td align="center"><% item.tipo %></td>
        <td><% item.organizacion %></td>
        <td align="center"><% item.departamento %></td>
        <td align="center"><% item.provincia %></td>
        <td align="center"><% item.distrito %></td>
        <!--<td align="center"><% item.or_bloque %></td>-->
        <td align="center"><% item.n_orden %></td>
        <td ng-if="item.checkR == 's'" align="center" valign="middle">{{ HTML::image('img/plantilla/check.jpg','ONPE', array('width'=>'27', 'height'=>'22')) }} </td>
        <td ng-if="item.checkR != 's'" align="center" valign="middle">{{ HTML::image('img/plantilla/nocheck.jpg','ONPE', array('width'=>'27', 'height'=>'22')) }} </td>    

        <td ng-if="item.checkG == 's'" align="center" valign="middle">{{ HTML::image('img/plantilla/check.jpg',  'ONPE', array('width'=>'27', 'height'=>'22')) }} </td>
        <td ng-if="item.checkG != 's'" align="center" valign="middle">{{ HTML::image('img/plantilla/nocheck.jpg','ONPE', array('width'=>'27', 'height'=>'22')) }} </td>    
    </tr>
</table>
</div>   
<div class="content-message  <%message.class%>" ng-show="message.show" ng-cloak > 
            <span><%message.type%>:</span><%message.text%>&nbsp;&nbsp;
</div>
@stop

