<?php


require_once "../controllers/ctr_person.php";
require_once "../models/mds_person.php";


class Ajax {

    public $idContacto;

    public function seleccionar_contacto_ajax(){

        $dato = $this -> idContacto;

        $respuesta = Controller_person::seleccionar_contacto_ctr($dato);

       
        
        echo json_encode($respuesta);

        
    }

    
}

/* OBJETOS   */

if (isset($_POST["idContacto"])) {
    
    $seleccionar = new Ajax();
    $seleccionar -> idContacto = $_POST["idContacto"];
    $seleccionar -> seleccionar_contacto_ajax();
}
   