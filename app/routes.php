<?php

/* * ************* HOME *************** */
Route::get('/', 'HomeController@index');

/* * ************* USUARIO *************** */
Route::post('usuario/login', array('uses' => 'UsuarioController@login'));
Route::get('usuario/exit', array('uses' => 'UsuarioController@salir'));

Route::group(array('before' => 'auth.mcasi'), function() {
    Route::group(array('before' => 'auth.menu'), function() {
        /*  ---------------------------- REGISTRAR ACCESO -------------------------  */
        Route::get('registrar/index',  array('uses' => 'RegistrarController@index'));
        
        /*  ---------------------------- CONSULTAR ACCESOS -------------------------  */
        Route::get('consultar/index',  array('uses' => 'ConsultarController@index'));
        
        /*  ---------------------------- CONSULTAR ACCESOS -------------------------  */
        Route::get('importar/index',  array('uses' => 'ImportarController@index'));
        
    });
    
    /*     * ************* PRINCIPAL *************** */
    Route::get('login/bienvenida', 'HomeController@bienvenida');
   
});
