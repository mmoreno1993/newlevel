<?php

class almacen extends App {

    public function __construct() {
        parent::__construct();
        /*
        if (!isset($_SESSION['admin']['codigo'])) 
        {
            reenviar('acceso');
        }
        */
        $this->modelo = new modeloAlmacen();
    }

    public function logout(){
        logout();
    }
    public function ningreso() {
        //$this->vista->prueba = $this->modelo->getPrueba();
        //$this->vista->filasAfectadas = $this->modelo->actualizarAlmacen();
    }
    public function nsalida()
    {

    }
    public function cotizacion()
    {
        
    }
}
?>