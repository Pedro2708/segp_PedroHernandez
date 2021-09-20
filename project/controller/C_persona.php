<?php

class CoPer {
    
    public function c(){

        require_once "model/M_persona.php";
        $person = new Person();
        $cata["titulo"]="INGRESO DE DATOS";
        $cata["ninios"]= $person->get_PERSON();

        require_once "view/V_persona.php";
    }
}

?>