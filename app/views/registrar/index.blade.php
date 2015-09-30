@extends('layouts.main.master')
@section('content')
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
<div class="body_conte">
    <div class="clearfix padding_10">
        <div class="wrap_conte_filtros">
            <div class="wrap_conte_filtros">
                <!--    DATA CARGADA   -->
                @include('registrar.registrar-acceso')
            </div>
        </div>
    </div>
</div>
@stop