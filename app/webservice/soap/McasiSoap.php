<?php

class McasiSoap {

    private $constants = null;

    public function __construct($constants) {
        $this->constants = $constants;
        $this->inicializar();
    }

    public function inicializar() {
        SoapWrapper::add(function ($service) {
            $service->name($this->constants->MCASI_SERVICE_NAME)
                    ->wsdl($this->constants->MCASI_WSDL)
                    ->cache(WSDL_CACHE_NONE)
                    ->trace(true);
        });
    }

    public function callMethod($metodo, $request) {

        $request = (array) $request;
        $response = new stdClass();

        SoapWrapper::service($this->constants->MCASI_SERVICE_NAME, function ($service) 
            use ($metodo, $request, $response) {
            $response->call = $service->call($metodo, [$request]);
            
        });

        return $response;
    }

}
