<?php

abstract class BaseModel extends Eloquent {

    const FORMAT_TIME='Y/m/d H:i:s';
    const FORMAT_TIME_NORMAL='d/m/Y H:i:s';
    const ORACLE_FORMAT_TIME='DD/MM/YYYY HH:MI:SS';
    

    public function getConstants() {
        $constants = json_encode(Config::get('constants'));
        $constants = json_decode($constants);
        return $constants;
    }

    public function getMessages() {
        $messages = json_encode(Lang::get('message'));
        $messages = json_decode($messages);
        return $messages;
    }

    /**
     * The name of the "created at" column.
     *
     * @var string
     */
    const CREATED_AT = 'D_CREACION';

    /**
     * The name of the "updated at" column.
     *
     * @var string
     */
    const UPDATED_AT = 'D_MODIFICACION';

    /**
     * The name of the "deleted at" column.
     *
     * @var string
     */
    const DELETED_AT = 'D_MODIFICACION';

    protected function getDateFormat() {
        return 'Y-m-d H:i:s';
    }





    /* formato de fecha para resoluciones */

    public function getFormat() {
        return 'd/m/Y';
    }

    public function getAmbito($ubi) {
        $constants = $this->getConstants();
        if (substr($ubi, 2, 4) == "0000") {
            $amb = $constants->C_AMBITO_REG;
        } else if (substr($ubi, 2, 4) != "0000" && substr($ubi, 4, 2) == "00") {
            $amb = $constants->C_AMBITO_PRO;
        } else {
            $amb = $constants->C_AMBITO_DIS;
        }
        return $amb;
    }

    public function getClassResponse() {
        $error = new stdClass();
        $error->success = true;
        $error->message = '';
        $error->code = '';
        $error->data = null;
        return $error;
    }

    public function saveLog($table, $event, $data, $f_importado) {
       return  LogA::guardar($table, $event, $data, $f_importado);
    }

}
