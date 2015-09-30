<?php

/*
  |--------------------------------------------------------------------------
  | Application & Route Filters
  |--------------------------------------------------------------------------
  |
  | Below you will find the "before" and "after" events for the application
  | which may be used to do any work before or after a request into your
  | application. Here you may also register your custom route filters.
  |
 */

App::before(function($request) {
    //
});


App::after(function($request, $response) {
    //
});

/*
  |--------------------------------------------------------------------------
  | Authentication Filters
  |--------------------------------------------------------------------------
  |
  | The following filters are used to verify that the user of the current
  | session is logged into this application. The "basic" filter easily
  | integrates HTTP Basic authentication for quick, simple checking.
  |
 */

Route::filter('auth', function() {
    if (Auth::guest()) {
        if (Request::ajax()) {
            return 'noLogin';
        } else {
            return Redirect::guest('/');
        }
    }
});


Route::filter('auth.basic', function() {
    return Auth::basic();
});

/*
  |--------------------------------------------------------------------------
  | Guest Filter
  |--------------------------------------------------------------------------
  |
  | The "guest" filter is the counterpart of the authentication filters as
  | it simply checks that the current user is not logged in. A redirect
  | response will be issued if they are, which you may freely change.
  |
 */

Route::filter('guest', function() {
    if (Auth::check())
        return Redirect::to('/');
});

/*
  |--------------------------------------------------------------------------
  | CSRF Protection Filter
  |--------------------------------------------------------------------------
  |
  | The CSRF filter is responsible for protecting your application against
  | cross-site request forgery attacks. If this special token in a user
  | session does not match the one given in this request, we'll bail.
  |
 */

Route::filter('csrf', function() {
    if (Session::token() != Input::get('_token')) {
        throw new Illuminate\Session\TokenMismatchException;
    }
});


Route::filter('auth.mcasi', function() {
    try {
        $base = new BaseController();
        $constanst = $base->getConstants();
        $mcasi = new McasiSoap($base->getConstants());
        $request = new stdClass();
        $usuario = new User();

        if ((Session::has('usuario.username'))) {

            $request->nombreUsuario = Session::get('usuario.username');
            $request->contrasena = Session::get('usuario.contrasena');
            $request->perfil = Session::get('usuario.perfil');
            $request->codigoSistema = $constanst->MCASI_CODIGO_SISTEMA;
            $request->idSesion = Session::get('usuario.idSesion');
            $valid = $mcasi->callMethod($constanst->MCASI_METHODO_AU, $request);

            if (is_object($valid)) {
                if (!isset($valid->call->return)) {
                    $usuario->sincronizarEstadoSession($request, $constants->C_SESSION_FINALIZADA);
                    Session::flash('autentificacion.novalida', $constanst->C_SESSION_EXPIRADO);
                    return Redirect::to('/');
                }
            }
        } else {
            Session::flush();
            Session::flash('autentificacion.novalida', $constanst->C_SESSION_EXPIRADO);
            return Redirect::to('/');
        }
    } catch (Exception $exc) {
        Session::flush();
        Session::flash('autentificacion.novalida', $constanst->C_SESSION_EXISTE);
        return Redirect::to('/');
    }
});


Route::filter('auth.menu', function() {
    try {
      $url = Request::url();
      $contains=false;
      
      foreach (Session::get('usuario.urls') as $item) {
        if (strpos($url,$item) !== false) {
            $contains=true;
        }
      }
      if(!$contains){
        return Redirect::to('/');
      }
    } catch (Exception $exc) {
        return Redirect::to('/');
    }
});