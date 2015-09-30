@section('css')
<?= HTML::style ( 'css/program/filtro.css' ) ?>
<?= HTML::style ( 'css/program/form.css' ) ?>
@stop

@section('javascript')
<?= HTML::script ( 'js/library/angularjs/controllers/filtro.js' ) ?>
<?= HTML::script('js/library/angularjs/controllers/reporte-cons-odpe.js') ?>
@stop


@section('filter')

<div  class="body_conte">
    <div class="header_conte" style="font-size: 1em">{{$title}}</div>
    <div class="clearfix padding_10">
        <div class="wrap_conte_filtros">
            <div class="clearfix conte_filtros">
                <label class="label_selects label-filter-1" for="odpe" ng-cloak>ODPE</label>
                <select class="selects selects_filtros from-select" id="odpe"  name="odpe" ng-model="odpe" ng-change="ShowBtnConsultar()" ng-cloak>
                    <option value='100' selected="selected">Seleccione</option>
                     <option value='' >TODOS</option>
                    @foreach ($odpes as $a)
                    <option value="{{$a -> o10}}">{{$a -> o11}} </option>
                    @endforeach
                </select>
               <input type="button"  ng-show="showList" class="botones" value="CONSULTAR" id="btnConsult" ng-click='getOdpeConsolidado()' ng-cloak>     
              <input type="button"  ng-show="showexport" class="botones" value="EXPORTAR" id="btnexport" ng-click='exportData()' ng-cloak>
              
            </div>          
        </div>

    </div>
</div>
@stop