<?php

class HomeController extends BaseController {

    protected $layout = 'layouts.login.master';

    public function index() {
//        $p = new Proceso();
//        $procesos = $p->listarProcesoActivos();
        if (!Session::has('usuario.username')) {
            return View::make('login.index', array());
        } else {
            return View::make('login/bienvenida');
        }

    }
    private function getAccesos(){
        $url=array();
        $accesos = Session::get('usuario.accesos');
        foreach ( $accesos->call->return as $item) {
            try {

                if(is_array($item->listaFormulario)){
                    foreach ($item->listaFormulario as $form) {
                        $url[]=$form->url;
                    }
                }else{
                     $url[]=$item->listaFormulario->url;
                } 
            } catch (Exception $e) {
                try {
                    if(is_array($item->listaMenuOpcion)){
                       foreach ($item->listaMenuOpcion as $listaFormulario) {
                            foreach ($listaFormulario->listaFormulario as $form) {
                                $url[]=$form->url;
                            } 
                       }
                    }else{
                        $url[]=$item->listaMenuOpcion->url;
                    }
               } catch (Exception $e) {

               }
           }
        }
        Session::put('usuario.urls',$url);
    }

    public function showWelcome() {
        return View::make('hello');
    }

    public function bienvenida() {
        $this->getAccesos();
        return View::make('login.bienvenida');
    }

    //    METODO NO ENXONTRADO
    public function missingMethod($parameters = array()) {
        return Redirect::to("/");
    }

}
