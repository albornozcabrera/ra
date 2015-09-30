<?php

class UsuarioController extends BaseController {

    protected $layout = 'layouts.main.master';
    private $mcasi;

    public function __construct() {

        $this->constants = $this->getConstants();
        $this->mcasi = new McasiSoap($this->constants);
    }

    public function login() {
        try {
            $u = new User();
            $usuario = new stdClass();
            $datauser = (Object) Input::all();
            //******VALIDACION DE INPUT            
            if (!Session::has('usuario.username')) {
                $validation_input = $u->validar(Input::all());
                if ($validation_input !== 'ok') {
                    return Redirect::to("/")->withErrors($validation_input)->withInput();
                }
                $usuario = $this->validarMcasi($datauser);
                if (is_object($usuario)) {
                    if ($usuario->call->return->estadoSesion !== '1') {
                        Session::flash('autentificacion.novalida', $this->constants->C_SESSION_NOVALIDO);
                        return Redirect::to("/");
                    } else {
                        //INICIALIZAR SESSION
                        //Sincronizar los usuarios con Mcasi y la tabla usuario                           
                        $u->sincronizarIns($usuario);
                        $this->consultarAccesos($usuario);
                        return Redirect::to('login/bienvenida');//->with('existe', $existe_session);
                    }
                } else {
                    //$u->sincronizarDel($usuario);
                    Session::flash('autentificacion.novalida', $this->constants->C_SESSION_FALLO);
                    return Redirect::to("/");
                }
            } else {
                return Redirect::to('login/bienvenida');
            }
        } catch (Exception $exc) {
            Session::flush();
            Session::flash('autentificacion.novalida', $this->constants->C_SESSION_FALLO);
            return Redirect::to('/');
        }
    }

    public function validarMcasi($datauser) {
        //******VALIDACION DE AUTENTIFICACION  ---- CONSULTA AH UN SERVICIO MCASI
        $request = new stdClass();
        $request->nombreUsuario = $datauser->username;
        $request->contrasena = $datauser->password;
        $request->codigoSistema = $this->constants->MCASI_CODIGO_SISTEMA;

        return $this->mcasi->callMethod($this->constants->MCASI_METHODO_IS, $request);
    }

    public function consultarAccesos($usuario) {
        $request = new stdClass();
        $request->nombreUsuario = $usuario->call->return->usuario->nombreUsuario;
        $request->codigoSistema = $this->constants->MCASI_CODIGO_SISTEMA;
        $request->idSesion = $usuario->call->return->usuario->idSesion;
        $accesos = $this->mcasi->callMethod($this->constants->MCASI_METHODO_CA, $request);

        Session::put('usuario.accesos', $accesos);
    }

    public function salir() {
        try {
            if (!empty(Session::get('usuario.username'))) {

                $request = new stdClass();

                $request->nombreUsuario = Session::get('usuario.username');
                $request->idSesion = Session::get('usuario.idSesion');
                $request->perfil = Session::get('usuario.perfil');
                $request->codigoSistema = $this->constants->MCASI_CODIGO_SISTEMA;
                $user_sin = new User();

                $exit = $this->mcasi->callMethod($this->constants->MCASI_METHODO_CS, $request);

                if (isset($exit->call->return->idRespuesta)) {
                    if ($exit->call->return->idRespuesta === '1') {
                        $user_sin->sincronizarEstadoSession($request, $this->constants->C_SESSION_FINALIZADA);
                        LogA::guardar(null, $this->constants->C_CIERRA_SESSION, User::getDataPk(Session::get('usuario.username')), null);
                        Session::flush();
                        return Redirect::to("/");
                    }
                }

                Session::flush();
                return Redirect::to("/");
            } else {
                Session::flush();
                Session::flash('autentificacion.exit', $this->constants->C_SESSION_EXPIRADO);
                return Redirect::to("/");
            }
        } catch (Exception $exc) {
            Session::flush();
            Session::flash('autentificacion.novalida', $this->constants->C_SESSION_FALLO);
            return Redirect::to('/');
        }
    }

    public function existeSesion($datauser) {
        $request = new stdClass();
        $request->nombreUsuario = $datauser->username;
        $request->codigoSistema = $this->constants->MCASI_CODIGO_SISTEMA;
        return $this->mcasi->callMethod($this->constants->MCASI_METHODO_ES, $request);
    }

    public function saveLog($usuario, $metodo, $evento) {
        $logdata = new stdClass();
        $logdata->servicioweb = $this->constants->MCASI_SERVICE_NAME;
        $logdata->metodo = $metodo;
        $logdata->usuario = (isset($usuario->call->return->usuario)) ? $usuario->call->return->usuario : $usuario;
        LogA::guardar(null, $evento, json_encode($logdata), null);
    }

}
