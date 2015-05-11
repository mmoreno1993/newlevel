<?php

class configuracion extends App {

    public function __construct() {
        parent::__construct();
        /*
        if (!isset($_SESSION['admin']['codigo'])) 
        {
            reenviar('acceso');
        }
        */
        $this->modelo = new modeloConfiguracion();
    }

    public function logout(){
        logout();
    }
    public function articulo() {
        if(isset($_POST['frmNuevoArticulo'])){
            $this->modelo->registrarArticulo(
                'descripcion' => $_POST['txtdescripcion'];
                );
        }

        $this->vista->articulos = $this->modelo->obtenerArticulos();
        //$this->vista->prueba = $this->modelo->getPrueba();
        //$this->vista->filasAfectadas = $this->modelo->actualizarAlmacen();
    }

}
?>