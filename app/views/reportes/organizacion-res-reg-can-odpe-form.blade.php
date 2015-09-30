@section('css')
<?= HTML::style('css/program/filtro.css') ?>
@stop

@section('javascript')
<?= HTML::script('js/library/angularjs/controllers/reporte_org_res_reg_can_odpe.js') ?>
@stop


@section('filter')

<div  class="body_conte">
    <div class="header_conte" style="font-size: 1em">{{$title}}{{$t_odpe}}</div>
    <div class="clearfix padding_10">
        <div class="wrap_conte_filtros">
            <div class="clearfix conte_filtros">
              <label class="label_selects label-110" for="departamento" ng-show="showdep" ng-cloak>Departamento</label>
              <select class="selects selects_filtros from-select" ng-show="showdep" name="departamento" ng-model="departamento" ng-change="getDepartamento()" ng-cloak>
                 <option value='' selected="selected">Seleccione</option>
                 <option ng-repeat="dep in departamentos" value="<%dep.cod%>"><%dep.nom%></option>
              </select>

<!--              <label class="label_selects label-filter-1" for="ambito" ng-show="showambito" >Ámbito</label>
              <select class="selects selects_filtros from-select" ng-show="showambito"  id="ambito" name="ambito" ng-model="ambito" ng-change="getAmbito()" >
                <option value="">Seleccione</option>
                <option value="{{Config::get('constants.C_AMBITO_REG')}}">REGIONAL</option>
                <option value="{{Config::get('constants.C_AMBITO_PRO')}}">PROVINCIAL</option>
                <option value="{{Config::get('constants.C_AMBITO_DIS')}}">DISTRITAL</option>
              </select>  -->
                <label class="label_selects label-100"  ng-show="showeleccion" ng-cloak>Elección</label>
                <select class="selects selects_filtros from-select" ng-show="showeleccion" id="odpe" name="odpe" ng-model="eleccion" ng-change="getConsultar()" ng-cloak>
                    <option value='' selected="selected">Seleccione</option>
                    <option ng-repeat="e in elecciones" value="<%e.cod%>">
                        <%e.nom%>
                    </option>
                </select> 
              <input type="button"  class=" botones" value="CONSULTAR" ng-show="showconsultar"id="btnconsultar" ng-click='getConsultar()' ng-disabled='disableConsultar'  ng-cloak>
              <input type="button"   class="botones" value="EXPORTAR" ng-show="showexport" id="btnexport" ng-click='exportData()' ng-disabled='disableExportar' ng-cloak>       
            </div>
        </div>
    </div>
</div>


<br/>

<div style="width: 100%; height: 490px; overflow-y: auto;" ng-show='showreporte'>
<div id="carga"></div>
<table border="1" bordercolor="#c5dbec" width="100%" style="font-size: 11px" ng-show='showreporteTable' ng-cloak>
  <tr bgcolor="#667595" align="center" style="color: #FFFFFF"  >
    <th rowspan="2">N°</th>  
    <th rowspan="2">ORGANIZACIÓN</th>
    <th rowspan="2">TIPO <br>ELECCIÓN</th>
    <th rowspan="2">DEPARTAMENTO</th>
    <th rowspan="2">PROVINCIA</th>
    <th rowspan="2">DISTRITO</th>
    <th colspan="10" align="center">RESOLUCIONES</th>
    <th colspan="2" align="center">VALIDADO POR</th>
  </tr>
  <tr bgcolor="#667595" align="center" style="color: #FFFFFF" >
    <td>RECIBIDO</td>
    <td>ADMITIDO</td>
    <td>PUBLICADO</td>
    <td>INSCRITO</td>
    <td>TACHA TRÁMITE</td>
    <td>INADMISIBLE</td>
    <td>EXCLUIDO</td>
    <td>RENUNCIA</td>
    <td>FALLECIDO</td>
    <td>IMPROCEDENTE</td>
    <td>REGISTRO</td>
    <td>GESTIÓN</td>
  </tr>
  <tr ng-repeat="item in lista" >
    <td><% $index+1 %></td>  
    <td><% item.organizacion %></td>
    <td align="center"><% item.tipo %></td>
    <td><% item.departamento %></td>
    <td><% item.provincia %></td>
    <td><% item.distrito %></td>
    <td align="center"><% item.recibido %></td>
    <td align="center"><% item.admitido %></td>
    <td align="center"><% item.publicado %></td>
    <td align="center"><% item.inscrito %></td>
    <td align="center"><% item.tacha_tramite %></td>
    <td align="center"><% item.inadmisible %></td>
    <td align="center"><% item.excluido %></td>
    <td align="center"><% item.renuncia %></td>
    <td align="center"><% item.fallecido %></td>
    <td align="center"><% item.improcedente %></td>
    <td ng-if=" item.checkR == 's'" align="center" valign="middle">{{ HTML::image('img/plantilla/check.jpg','ONPE', array('width'=>'27', 'height'=>'22')) }} </td>
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



