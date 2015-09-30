@section('css')
<?= HTML::style('css/program/filtro.css') ?>
@stop

@section('filter')
<div ng-app="ctrlReporte">

    <div  class="body_conte">
        <div class="header_conte" style="font-size: 1em">{{$title}}</div>
        <div class="clearfix padding_10">
            <div class="wrap_conte_filtros">
                <div class="clearfix conte_filtros">
                    <div class="centrar"> 
                        <input type="button"   class="botones" value="CONSULTAR" ng-show="showconsultar" id="btConsulta" ng-click='btnConsulta()' ng-cloak>
                        <input type="button"   class="botones" value="EXPORTAR" ng-show="showexport" id="btnexport" ng-click='exportData()' ng-cloak>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br/>
    <br>  
    <div id="carga"></div>
    <div ng-show="showReporte" ng-cloak>
        <table width="100%"  border="1" bordercolor="#c5dbec">
            <tr bgcolor="#667595" align="center" style="font-size:14px;color: #FFFFFF">
                <th colspan="11">ESTADO</th>
                <th rowspan="2">AVANCE</th>
                <th rowspan="2">FALTAN</th>
            </tr><br>
            <tr bgcolor="#667595" align="center" style="font-size:13px;color: #FFFFFF">
                <th style="padding:10px">TIPO ELECCIÓN</th>
                <th style="padding:10px">RECIBIDO</th>
                <th style="padding:10px">ADMITIDO</th>
                <th style="padding:10px">PUBLICADO</th>
                <th style="padding:10px">INSCRITO</th>
                <th style="padding:10px">TACHA EN TRÁMITE</th>
                <th style="padding:10px">INADMISIBLE</th>
                <th style="padding:10px">EXCLUIDO</th>
                <th style="padding:10px">RENUNCIA</th>
                <th style="padding:10px">FALLECIDO</th>
                <th style="padding:10px">IMPROCEDENTE</th>
            </tr>   
            <tr ng-repeat="lista in lista" style="font-size:12px">
                <td align="left"><%lista.ambito%>&nbsp;</td>
                <td align="center"><%lista.recibido%>&nbsp;</td>
                <td align="center"><%lista.admitido%></td>
                <td align="center"><%lista.publicado%></td>
                <td align="center"><%lista.inscrito%></td>
                <td align="center"><%lista.tacha_tramite%></td>
                <td align="center"><%lista.inadmisible%></td>
                <td align="center"><%lista.excluido%>&nbsp;</td>
                <td align="center"><%lista.renuncia%>&nbsp;</td>
                <td align="center"><%lista.fallecido%>&nbsp;</td>
                <td align="center"><%lista.improcedente%>&nbsp;</td>  
                <td align="center"><%lista.avance%>&nbsp;</td>
                <td align="center"><%lista.faltan%>&nbsp;</td>
            </tr>
        </table>
    </div>
</div>
@stop



