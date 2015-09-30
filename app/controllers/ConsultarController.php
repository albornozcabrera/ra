<?php

class ConsultarController extends BaseController {

    protected $layout = 'layouts.main.master';
//    private $mcasi;

    public function __construct() {

        $this->constants = $this->getConstants();
        //$this->mcasi = new McasiSoap($this->constants);
    }
    public function index(){
        return View::make('consultar.index', array());
    }
}
