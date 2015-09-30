@section('css')
<?= HTML::style('css/program/filtro.css') ?>
@stop

@section('javascript')
<?= HTML::script('js/library/angularjs/controllers/reporte-lista-res-defin-list-cand.js') ?>
@stop


@section('filter')

<div  class="body_conte">
    <div class="header_conte" style="font-size: 1em">{{$title}}</div>
    <div class="clearfix padding_10">
        <div class="wrap_conte_filtros">
            <div class="clearfix conte_filtros" >
            

      <label class="label_selects label-1" for="departamento" ng-show="showdep" ng-cloak>Departamento</label>
      <select class="selects selects_filtros from-select" ng-show="showdep" name="departamento" ng-model="departamento" ng-change="getDepartamento()" ng-cloak>
            <option value='Seleccione' selected="selected">Seleccione</option> 
            <option value='' selected="selected">TODOS</option> 
          <!-- <option value="{{Config::get('constants.C_TODOS_DE')}}" >TODOS</option> -->
          <option ng-repeat="dep in departamentos" value="<%dep.cod%>"><%dep.nom%></option>
      </select>
    

      <label class="label_selects label-1" for="PROVINCIA" ng-show="showprovincia" ng-cloak>Provincia</label>
      <select class="selects selects_filtros from-select"  ng-show="showprovincia" id="provincia" name="provincia" ng-model="provincia"          ng-change="getProvincia()" ng-cloak>
                        <option value='' selected="selected">TODOS</option> 
                      <!--  <option value="{{Config::get('constants.C_TODOS_P')}}"  >TODOS</option> -->
                        <option ng-repeat="p in provincias" value="<%p.cod%>"><%p.nom%></option>
      </select> 
      

       <label class="label_selects label-1" for="distrito" ng-show="showdistrito" ng-cloak>Distrito</label>
      <select class="selects selects_filtros from-select" ng-show="showdistrito" id="distrito" name="distrito" ng-model="distrito" ng-change="getDistrito()" ng-cloak>
        <option value='' selected="selected">TODOS</option> 
       <!-- <option value="{{Config::get('constants.C_TODOS_DI')}}" >TODOS</option>  -->
        <option ng-repeat="d in distritos" value="<%d.cod%>"> <%d.nom%> </option>
      </select>


                <input type="button" class="botones" value="CONSULTAR" ng-show="showconsultar"id="btnconsultar" ng-click='getConsultar()' ng-cloak>
				<input type="button" class="botones" value="EXPORTAR"  ng-show="showexport" id="btnexport" ng-click='exportData()' ng-cloak>


                
                
          </div>
        </div>

    </div>
</div>


<br/>

<div style="width: 100%; height: 500px; overflow-y: scroll;" ng-show='showreporte' ng-cloak>
    <div id="carga"></div>
    <table  border="1" bordercolor="#c5dbec" width="100%" ng-show='showreporteTable' ng-cloak>
        <tr bgcolor="#667595" align="center" style="color: #FFFFFF" >
            <td>DEPARTAMENTO</td>
            <td>PROVINCIA</td>
            <td>DISTRITO</td>
            <td>PROVISIONAL</td>
            <td>DEFINITIVA</td>
            <td>ESTADO</td>
        </tr>
        <tr ng-repeat="item in lista" style="background-color:<% (item.departamento != null?'#eafadc':(item.provincia != null?'#ffffe0':''))  %> " >

            <td><% item.departamento %></td>
            <td><% item.provincia %></td>
            <td><% item.distrito %></td>
            <td align="center"><% item.capital == '01'?'':item.provicional %></td>
            <td align="center"><% item.capital == '01'?'':item.definitiva  %></td> 
            <td align="center" style="color:<% item.color_est %>" ><% item.estado %>  </td> 

        </tr>
    </table>
</div>   

@stop



