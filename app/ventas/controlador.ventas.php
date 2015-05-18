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

            if($_POST['cmbautomatico']=="0"){
                $_POST['txtnumero'] = $this->modelo->obtenerPedidoMayor()[0]['mayor'];
            }
            $this->modelo->registrarPedido(array(
                'tbl_cliente_id' => $_POST['txtcliente'],
                'numero' => $_POST['txtnumero'],
                'moneda' => $_POST['cmbmoneda'],
                'fecha_registro' => $_POST['txtfecharegistro'],
                'fecha_vigente' => $_POST['txtfechavigencia'],
                'glosa' => $_POST['txtglosa'],
                'creado_por' => $_SESSION['user']['nombre']
                ));
            header('Location:index.php?modulo=ventas&accion=pedido');
        }
        if(isset($_POST['btnModificarPedido'])){
            $this->modelo->modificarPedido(array(
                'id' => $_POST['id'],
                'tbl_cliente_id' => $_POST['txtcliente'],
                'numero' => $_POST['txtnumero'],
                'moneda' => $_POST['cmbmoneda'],
                'fecha_registro' => $_POST['txtfecharegistro'],
                'fecha_vigente' => $_POST['txtfechavigencia'],
                'glosa' => $_POST['txtglosa'],
                'modificado_por' => $_SESSION['user']['nombre'],
                ));
            header('Location:index.php?modulo=ventas&accion=pedido');
        }
        if(isset($_POST['btnEliminarPedido'])){
            foreach ($_POST['chkPedido'] as $val) {
                $this->modelo->eliminarPedido(array(
                'id' => $val,
                'modificado_por' => $_SESSION['user']['nombre']
                ));
            }
            
            header('Location:index.php?modulo=ventas&accion=pedido');
        }

        $this->vista->pedidos = $this->modelo->obtenerPedidos();
        $this->vista->clientes = $this->modelo->obtenerClientes();
    }
    public function modificarPedido(){
        $this->vista->pedido = $this->modelo->obtenerPedido(array(
            'id' => $_GET['pedido']
        ));
    }
    public function detallePedido(){
        if(isset($_POST['btnNuevoPedidoDetalle'])){
            $_POST['txtigv'] = ($_POST['txtpreciounitario'] * $_POST['txtcantidad']) * 0.18;
            $this->modelo->registrarPedidoDetalle(array(
                'tbl_articulo_id' => $_POST['txtarticulo'],
                'cantidad' => $_POST['txtcantidad'],
                'bruto' => $_POST['txtpreciounitario'],
                'igv' => $_POST['txtigv'],
                'descuento' => $_POST['txtdescuento'],
                'glosa' => $_POST['txtglosa'],
                'tbl_pedcab_id' => $_GET['id'],
                'creado_por' => $_SESSION['user']['nombre']
                ));
            header('Location:index.php?modulo=ventas&accion=detallePedido&pedido='.$_GET['pedido'].'&id='.$_GET['id']);
        }
        if(isset($_POST['btnModificarPedidoDetalle'])){
            $_POST['txtigv'] = ($_POST['txtpreciounitario'] * $_POST['txtcantidad']) * 0.18;
            $this->modelo->modificarPedidoDetalle(array(
                'id' => $_POST['id'],
                'tbl_articulo_id' => $_POST['txtarticulo'],
                'cantidad' => $_POST['txtcantidad'],
                'bruto' => $_POST['txtpreciounitario'],
                'igv' => $_POST['txtigv'],
                'descuento' => $_POST['txtdescuento'],
                'glosa' => $_POST['txtglosa'],
                'tbl_pedcab_id' => $_GET['id'],
                'modificado_por' => $_SESSION['user']['nombre'],
                ));
            header('Location:index.php?modulo=ventas&accion=detallePedido&pedido='.$_GET['pedido'].'&id='.$_GET['id']);
        }
        if(isset($_POST['btnEliminarPedidoDetalle'])){
            foreach ($_POST['chkPedido'] as $val) {
                $this->modelo->eliminarPedidoDetalle(array(
                'id' => $val,
                'modificado_por' => $_SESSION['user']['nombre']
                ));
            }
            
            header('Location:index.php?modulo=ventas&accion=detallePedido&pedido='.$_GET['pedido'].'&id='.$_GET['id']);
        }
        $this->vista->pedidos = $this->modelo->obtenerPedidosDetalle(array(
            'tbl_pedcab_id' => $_GET['id']
        ));
        $this->vista->articulos = $this->modelo->obtenerArticulos();
    }
    public function modificarPedidoDetalle(){
        $this->vista->pedido = $this->modelo->obtenerPedidoDetalle(array(
            'id' => $_GET['pedidoDetalle']
        ));
    }
    public function cotizacion(){

    }

}
?>