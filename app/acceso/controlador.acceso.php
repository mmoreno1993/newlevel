<?php

class acceso extends App {

    public function index() {
        if (isset($_POST['acceso'])) {
            //if($_POST['tipoAcceso']=="admin"){
                $modelo = new modeloAcceso();
                $acceso = $modelo->getAcceso($_POST['txtcorreo'], $_POST['txtpassword']);
                if ($acceso) {
                    reenviar('configuracion','articulo');
                }
            //}else if($_POST['tipoAcceso']=="user"){
                //$modelo = new modeloAcceso();
                //$acceso = $modelo->getAcceso($_POST['txtcorreo'], $_POST['txtpassword']);
                //if ($acceso) {
                    //reenviar('ventas');
                //}
            //}
            
        }
    }
}
?>