<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends BaseModel implements UserInterface, RemindableInterface {

    use UserTrait,
        RemindableTrait;

    protected $table = 'tab_usuario';
    protected $primaryKey = 'n_usuario_pk';

    public $timestamps = false;

    public function getAuthIdentifier() {
        return $this->getKey();
    }


    public function getAuthPassword() {
        return $this->password;
    }

    public function getRememberToken() {
        return $this->remember_token;
    }

    public function setRememberToken($value) {
        $this->remember_token = $value;
    }

    public function getRememberTokenName() {
        return 'remember_token';
    }

    public function validar($input) {

        $restrinciones = array(
            "username" => "required",
            "password" => "required"
        );

        $validation = Validator::make($input, $restrinciones);

        if ($validation->fails()) {
            return $validation;
        } else {
            return 'ok';
        }
    }

    public function sincronizarIns($usuario) {
        $user = $this->buscarUsuario($usuario->call->return->usuario->nombreUsuario);
        $usuario_save = new User();

        if (is_null($user)) {
            
            $usuario_save->n_usuario_pk = User::max('n_usuario_pk') + 1;
            $usuario_save->c_usuario = $usuario->call->return->usuario->nombreUsuario;
            $usuario_save->c_estado = $usuario->call->return->usuario->codigoEstado;
            //$usuario_save->c_perfil = $usuario->call->return->usuario->listGrupo->nombre;
            $usuario_save->d_creacion   =   Carbon::now()->format(LogA::FORMAT_TIME);
            $saveu = $usuario_save->save(); exit;
            $this->inicializarSession($usuario);

        } else {
            $usuario_save = User::find($user->usuario);
            //codigo 
            $usuario_save->c_estado = $usuario->call->return->usuario->codigoEstado;
            $usuario_save->d_modificacion   =   Carbon::now()->format(LogA::FORMAT_TIME);
            
            $saveu = $usuario_save->save();

            $this->inicializarSession($usuario);
        }
    }

    public function inicializarSession($usuario) {

        Session::flush();
        Session::put('usuario.username', $usuario->call->return->usuario->nombreUsuario);
        Session::put('usuario.nombre', $usuario->call->return->usuario->apellidos . ", " . $usuario->call->return->usuario->nombre);

        if (is_array($usuario->call->return->usuario->listGrupo)) {
            $listgrupo = $usuario->call->return->usuario->listGrupo;

            foreach ($listgrupo as $lg) {

                if (strpos($lg->nombre, "ra_admin") !== false) {
                    Session::put('usuario.perfil', $lg->nombre);
                    break;
                }
//                if (strpos($lg->nombre, "ropc_digit") !== false) {
//                    Session::put('usuario.perfil', $lg->nombre);
//                    break;
//                }
//                if (strpos($lg->nombre, "ropc_gge") !== false) {
//                    Session::put('usuario.perfil', $lg->nombre);
//                    break;
//                }
            }
        } else {
            Session::put('usuario.perfil', $usuario->call->return->usuario->listGrupo->nombre);
        }
        Session::put('usuario.idSesion', $usuario->call->return->usuario->idSesion);
        Session::put('usuario.contrasena', $usuario->call->return->usuario->contrasena);
        $codigo = User::getPk($usuario->call->return->usuario->nombreUsuario);
        Session::put('usuario.codigo', $codigo->usuario);
    }

//    public function sincronizarDel($usuario) {
//        $user = $this->buscar($usuario);
//        if (isset($user->usuario)) {
//            $user_del = User::find($user->usuario);
//            $saved = $user_del->delete();
//
//            /////LOG
//            if ($saved) {
//                $this->saveLog(Config::get('constants.C_TAB_USUARIO'), Config::get('constants.C_DELETE'), User::find($user_del->n_usuario_pk)->toJson(), null);
//            }
//        }
//    }

    public function sincronizarEstadoSession($request, $estado) {
        $user_busc = $this->buscarSalir($request->nombreUsuario, $request->perfil);
        if (isset($user_busc->usuario)) {
            $user_up = User::find($user_busc->usuario);
            $user_up->c_estado_sesion = $estado;
            $user_up->d_modificacion   =   Carbon::now()->format(LogA::FORMAT_TIME);
            $saveu = $user_up->save();

            /////LOG
            // if ($saveu) {
            //     $this->saveLog(Config::get('constants.C_TAB_USUARIO'), Config::get('constants.C_UPDATE'), User::find($user_up->n_usuario_pk)->toJson(), null);
            // }
        }
    }

    public function buscar($usuario) {
        return User::select(array('n_usuario_pk as usuario', 'c_estado as estado'))
                        ->where('c_usuario', $usuario->call->return->usuario->nombreUsuario)
                        ->where('c_perfil', $usuario->call->return->usuario->listGrupo->nombre)
                        ->first();
    }

    public function buscarSalir($username, $perfil) {
        return User::select(array('n_usuario_pk as usuario', 'c_estado as estado'))
                        ->where('c_usuario', $username)
                        // ->where('c_perfil', $perfil)
                        ->first();
    }

    public function buscarUsuario($usuario) {
        return User::select(array('n_usuario_pk as usuario', 'n_estado as estado'))
                        ->where('c_usuario', $usuario)
                        ->first();
    }

    public function sincronizarUser($usuario, $tipo) {
        $usuario_save = new User();

        if ($tipo === 'ins') {
            $usuario_save->n_usuario_pk = User::max('n_usuario_pk') + 1;
            $usuario_save->c_usuario = $usuario->nombreUsuario;
            $usuario_save->c_estado = $usuario->codigoEstado;
            $usuario_save->c_nombre = $usuario->nombre;
            //$usuario_save->c_perfil = $usuario->listGrupo->nombre;
            $usuario_save->c_apellido = $usuario->apellidos;

            $saveu = $usuario_save->save();

            /////LOG
            if ($saveu) {
                $this->saveLog(Config::get('constants.C_TAB_USUARIO'), Config::get('constants.C_INSERT'), User::find($usuario_save->n_usuario_pk)->toJson(), null);
            }
            return $usuario_save->n_usuario_pk;
        }
        if ($tipo === 'upd') {
            $saveu = $this->updateUser($usuario);
            if ($saveu) {
                $this->saveLog(Config::get('constants.C_TAB_USUARIO'), Config::get('constants.C_UPDATE'), $this->getPkUser($usuario)->toJson(), null);
            }
        }
    }

    public function updateUser($usuario) {
        return DB::table('tab_usuario')
                        ->where('c_usuario', $usuario->usuario)
                        ->update(array('c_estado' => $usuario->codigoEstado));
    }

    static public function getPk($usuario) {
        return User::select(array('n_usuario_pk as usuario'))
                        ->where('c_usuario', $usuario)
                        ->first();
    }

    static public function getDataPk($usuario) {
        return User::where('c_usuario', $usuario)
                        ->first();
    }

    public function getPkUser($usuario) {
        return User::select(array('n_usuario_pk as usuario'))
                        ->where('c_usuario', $usuario)
                        ->first();
    }

    static public function getUsuarios() {
        $query = "SELECT n_usuario_pk as usu, c_usuario as usuario, c_nombre as nom, c_apellido as ap, c_estado as estado, c_estado_sesion as estado_sesion, c_perfil as perfil, d_modificacion as fecha    from tab_usuario order by c_estado_sesion asc, d_modificacion desc nulls last";
        return DB::select(DB::raw($query));
    }

    static public function getSession($estado) {
        return User::select(array('n_usuario_pk as usu', 
                        'c_usuario as usuario', 
                        'c_nombre as nom', 
                        'c_apellido as ap', 
                        'c_estado as estado',
                        'c_estado_sesion as estado_sesion', 
                        'd_modificacion as fecha'))
                        ->where('c_estado_sesion', $estado)
                        ->orderBy('d_modificacion', 'DESC', 'nulls last')
                        ->get();
    }

    static public function getUsuariosSession($usuario, $estado) {
        if($estado != 'todos'){
        return User::select(array('n_usuario_pk as usu', 
                        'c_usuario as usuario', 
                        'c_nombre as nom', 
                        'c_apellido as ap', 
                        'c_estado as estado',
                        'c_estado_sesion as estado_sesion', 
                        'd_modificacion as fecha'))
                        ->where('c_usuario', $usuario)
                        ->where('c_estado_sesion', $estado)
                        ->orderBy('d_modificacion', 'desc')
                        ->get();
        }else{     
        return User::select(array('n_usuario_pk as usu', 
                        'c_usuario as usuario', 
                        'c_nombre as nom', 
                        'c_apellido as ap', 
                        'c_estado as estado',
                        'c_estado_sesion as estado_sesion', 
                        'd_modificacion as fecha'))
                        ->where('c_usuario', $usuario)
                        ->orderBy('d_modificacion', 'desc')
                        ->get();            
        }

    }          

    static public function getdataUser($pk) {
        return User::select(array('c_usuario as usuario', 'c_nombre as nom', 'c_apellido as ap'))
                        ->where('n_usuario_pk', $pk)
                        ->first();
    }

    public function sincronizarUsuario($usuario, $tipo) {
        $usuario_save = new User();

        if ($tipo === 'ins') {
            $usuario_save->n_usuario_pk = User::max('n_usuario_pk') + 1;
            $usuario_save->c_usuario = $usuario->nombreUsuario;
            $usuario_save->c_estado = $usuario->codigoEstado;
            $usuario_save->c_nombre = $usuario->nombre;
            //$usuario_save->c_perfil = $usuario->listGrupo->nombre;
            $usuario_save->c_apellido = $usuario->apellidos;

            $saveu = $usuario_save->save();

            /////LOG
            if ($saveu) {
                $this->saveLog(Config::get('constants.C_TAB_USUARIO'), Config::get('constants.C_INSERT'), User::find($usuario_save->n_usuario_pk)->toJson(), null);
            }
            return $usuario_save->n_usuario_pk;
        }
        if ($tipo === 'upd') {
            $saveu = $this->updateUsuario($usuario);
            if ($saveu) {
                $this->saveLog(Config::get('constants.C_TAB_USUARIO'), Config::get('constants.C_UPDATE'), User::find($usuario->usuario)->toJson(), null);
            }
        }
    }

    public function updateUsuario($usuario) {
        return DB::table('tab_usuario')
                        ->where('n_usuario_pk', $usuario->usuario)
                        ->update(array(
                            'c_estado' => $usuario->codigoEstado,
                            'c_nombre' => $usuario->nombre,
                            'c_apellido' => $usuario->apellidos));
    }    

}
