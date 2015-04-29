<?php

abstract class App {

    var $vista;
    var $modulo;
    var $accion;
    var $paquete;

    public function __construct() {
        global $paquete, $modulo, $accion;
        $this->modulo = $modulo;
        $this->accion = $accion;
        $this->paquete = $paquete;
        $this->vista = new Plantilla();
        $this->vista->modulo = $modulo;
        $this->vista->accion = $accion;
    }

    public function render($vista) {
        $this->vista->accion = $vista;
    }

}

?>