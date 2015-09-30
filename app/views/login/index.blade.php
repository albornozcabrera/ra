@extends('layouts.login.master')

@section('content')
<div class="middle-box text-center loginscreen animated fadeInDown">
    <div class="fontForm">
        <div class="form-group">
            <h3>iniciar Sesión</h3>           
            {{ Form::open(array('url' => 'usuario/login', 'method' => 'post' , 'class' => 'm-t' ,'rol'=>'form')) }}
            <div class="form-group">
                {{Form::text('username',null,array('class' =>'form-control','placeholder'=>'Usuario','required'=>true,'id'=>'username','name'=>'username'));}}
            </div>
            <div class="form-group">
                {{Form::password('password',array('class' =>'form-control','placeholder'=>'Clave','required'=>true));}}
            </div>
            <button type="submit" class="btn btn-primary block full-width m-b">Iniciar session</button>
            <div class="div-centrar mensj-autentifacion">{{ Session::get('autentificacion.novalida') }}</div>
            {{ Form::close() }}       
        </div>
    </div>

</div>
@stop