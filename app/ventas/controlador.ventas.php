<?php

class ventas extends App {

    public function __construct() {
        parent::__construct();
        /*
        if (!isset($_SESSION['admin']['codigo'])) 
        {
            reenviar('acceso');
        }
        */
        $this->modelo = new modeloVentas();
    }

    public function logout(){
        logout();
    }
    public function index() {
        //$this->vista->prueba = $this->modelo->getPrueba();
        //$this->vista->filasAfectadas = $this->modelo->actualizarAlmacen();
    }
    public function pedido()
    {
        if(isset($_POST['btnNuevoPedido'])){
            $this->modelo->registrarPedido(array(
                'tbl_cliente_id' => $_POST['txtcliente'],
                'creado_por' => $_SESSION['user']['nombre']
                ));
            header('Location:index.php?modulo=configuracion&accion=pedido');
        }
        if(isset($_POST['btnModificarPedido'])){
            $this->modelo->modificarPedido(array(
                'id' => $_POST['txtid'],
                'descripcion' => $_POST['txtdescripcion'],
                'modificado_por' => $_SESSION['user']['nombre'],
                ));
            header('Location:index.php?modulo=configuracion&accion=pedido');
        }
        if(isset($_POST['btnEliminarPedido'])){
            foreach ($_POST['chkPedido'] as $val) {
                $this->modelo->eliminarPedido(array(
                'id' => $val,
                'modificado_por' => $_SESSION['user']['nombre']
                ));
            }
            
            header('Location:index.php?modulo=configuracion&accion=pedido');
        }

        $this->vista->pedidos = $this->modelo->obtenerPedidos();
        $this->vista->clientes = $this->modelo->obtenerClientes();
    }
    public function modificarPedido(){
        $this->vista->Pedido = $this->modelo->obtenerPedido(array(
            'id' => $_GET['pedido']
            ));
    }
    public function cotizacion(){

    }

}
?>