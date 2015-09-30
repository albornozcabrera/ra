<?php 
$action='consultar()';
$title='RESUMEN DE ORGANIZACIONES POLÍTICAS POR ODPE';
$controller='ctrlConsOdpe';
?>
@extends('layouts.main.master')
@section('content')
@extends('reportes.organizacion-filtro-odpe')

<div class="content-filter" ng-show='showreporte' ng-cloak>
<div id="carga"></div>
    <div class="scroll-general-rep">
        <table width="100%" class="table-program" ng-show='showreporteTable' ng-cloak>
            <thead>
                <tr>
                    <th>N°</th>
                    <th>ODPE
                        <input type="text" ng-show="viewsearch" ng-model='search_org' class="form-control form-search-imput" ng-cloak/>
                    </th>
                    <th>ELECCIÓN
                        <input type="text" ng-show="viewsearch" ng-model='search_tiporg' class="form-control form-search-imput" ng-cloak/>
                    </th>
                    <th>TRÁMITE
                        <span ng-show="viewsearch" class="form-element form-search-imput">&nbsp;</span>
                    </th>
                    <th>PERIODO DE TACHAS
                        <span ng-show="viewsearch" class="form-element form-search-imput">&nbsp;</span>
                    </th>
                    <th>INSCRITO
                        <span ng-show="viewsearch" class="form-element form-search-imput">&nbsp;</span>
                    </th>
                    <th>NO INSCRITO
                        <span ng-show="viewsearch" class="form-element form-search-imput">&nbsp;</span>
                    </th>
                    <th>INSCRITO EN APELACIÓN
                        <span ng-show="viewsearch" class="form-element form-search-imput">&nbsp;</span>
                    </th>
                    <th>NO INSCRITO EN APELACIÓN
                        <span ng-show="viewsearch" class="form-element form-search-imput">&nbsp;</span>
                    </th>
                </tr>   
            </thead>
            <tbody>
                <tr ng-repeat="odpe in data" >
                    <td><%$index + 1%></td>
                    <td><%odpe.odpe%></td>
                    <td><%odpe.des_amb%></td>
                    <td><%(odpe.tramite.e1==null?0:odpe.tramite.e1)%></td>
                    <td><%(odpe.tramite.e2==null?0:odpe.tramite.e2)%></td>
                    <td><%(odpe.tramite.e3==null?0:odpe.tramite.e3)%></td>
                    <td><%(odpe.tramite.e4==null?0:odpe.tramite.e4)%></td>
                    <td><%(odpe.tramite.e5==null?0:odpe.tramite.e5)%></td>
                    <td><%(odpe.tramite.e6==null?0:odpe.tramite.e6)%></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@stop
@section("javascript-ini")        
<?= HTML::script('js/library/angularjs/controllers/reporte-cons-odpe.js') ?>
<?= HTML::script('js/library/jquery/reporte.js') ?>
@stop

