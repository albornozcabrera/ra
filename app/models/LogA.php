<?php

class LogA extends BaseModel {

    protected $table = 'tab_log';
    protected $primaryKey = 'n_log_pk';
    public $timestamps = false;


    static public function guardar($tabla, $evento, $data, $f_importado) {

        $log = new LogA();
        $id = ((int) LogA::max('n_log_pk')) + 1;
        $log->n_log_pk  = $id;
        $log->n_usuario = Session::get('usuario.codigo');
        $log->c_evento  = $evento;
        $log->d_fecha   = Carbon::now()->format('Y-m-d H:i:s');
        $log->c_proceso = Session::get('proceso');

        (!is_null($tabla)) ? $log->c_tabla = $tabla : null;
        (!is_null($data)) ? $log->c_data = str_replace("\"rn\":\"1\",", "", $data) : null;
        (!is_null($f_importado)) ? $log->f_importado = $f_importado : null;
        return $log->save();
    }

    static public function listarLog($request, $const, $cantreg) {
        $data = DB::table('tab_log');
        if (isset($request->usuario) && !empty($request->usuario)) {
            $data = $data->where('n_usuario', $request->usuario);
        }
        if (isset($request->importado) && !empty($request->importado)) {
            if ($request->importado) {
                $data = $data->where('f_importado', $const->F_IMPORTADO);
            }
        }
        if (isset($request->tabla) && !empty($request->tabla)) {
            $data = $data->where('c_tabla', $request->tabla);
        }
        if (isset($request->evento) && !empty($request->evento)) {
            $data = $data->where('c_evento', $request->evento);
        }
        if (isset($request->fechaini) && !empty($request->fechaini)) {
            if (isset($request->fechafin) && !empty($request->fechafin)) {
                $data = $data->whereBetween('d_fecha', array($request->fechaini, $request->fechafin));
            }
        }

        $data = $data->orderBy("d_fecha", "desc");
        $data = $data->select(array('n_usuario AS usu',
                            'c_evento as eve',
                            'c_tabla as tab',
                            'd_fecha as fec',
                            'c_data as dat',
                            'f_importado as imp'))
                        ->take($cantreg)->skip((int)$cantreg*$request->pag)->get();

        return $data;
    }

    static public function countlistarLog($request, $const) {
        $data = DB::table('tab_log');
        if (isset($request->usuario) && !empty($request->usuario)) {
            $data = $data->where('n_usuario', $request->usuario);
        }
        if (isset($request->importado) && !empty($request->importado)) {
            if ($request->importado) {
                $data = $data->where('f_importado', $const->F_IMPORTADO);
            }
        }
        if (isset($request->tabla) && !empty($request->tabla)) {
            $data = $data->where('c_tabla', $request->tabla);
        }
        if (isset($request->evento) && !empty($request->evento)) {
            $data = $data->where('c_evento', $request->evento);
        }
        if (isset($request->fechaini) && !empty($request->fechaini)) {
            if (isset($request->fechafin) && !empty($request->fechafin)) {
                $data = $data->whereBetween('d_fecha', array($request->fechaini, $request->fechafin));
            }
        }

        $data = $data->count();

        return $data;
    }

}
