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
        if(isset($_POST['btnNuevoArticulo'])){
            $this->modelo->registrarArticulo(array(
                'descripcion' => $_POST['txtdescripcion'],
                'codigo_alterno' => $_POST['txtcodigo_alterno'],
                'tbl_familia_id' => $_POST['cmbfamilia'],
                'tbl_categoria_id' => $_POST['cmbcategoria'],
                'tbl_color_id' => $_POST['cmbcolor'],
                'tbl_marca_id' => $_POST['cmbmarca'],
                'creado_por' => 'Moisés Moreno',
                'foto' => ''
                ));
            header('Location:index.php?modulo=configuracion&accion=articulo');
        }
        $this->vista->articulos = $this->modelo->obtenerArticulos();
        $this->vista->familias = $this->modelo->obtenerFamilias();
        $this->vista->colores = $this->modelo->obtenerColores();
        $this->vista->marcas = $this->modelo->obtenerMarcas();
        
        //$this->vista->prueba = $this->modelo->getPrueba();
        //$this->vista->filasAfectadas = $this->modelo->actualizarAlmacen();
    }
    public function modificarArticulo(){
        $this->vista->articulo = $this->modelo->obtenerArticulo(array(
            'id' => $_GET['articulo']
            ));
        $this->vista->familias = $this->modelo->obtenerFamilias();
        $this->vista->colores = $this->modelo->obtenerColores();
        $this->vista->marcas = $this->modelo->obtenerMarcas();
    }

}
?>