<?php

class configuracion extends App {

    public function __construct() {
        parent::__construct();
        $this->modelo = new modeloConfiguracion();
    }

    public function logout(){
        logout();
    }
    public function articulo() {
        if(isset($_POST['btnCambiarClave'])){
            $antigua = $_POST['txtpassact'];
            $nueva = $_POST['txtpassnew'];
            $confirma = $_POST['txtpasscon'];
            $modificado_por = $_SESSION['user']['nombre'];
            $id = $_SESSION['user']['codigo'];
            $this->modelo->cambiarClave($antigua,$nueva,$confirma,$modificado_por,$id);
            header('Location:index.php?modulo=configuracion&accion=articulo');
        }
        if(isset($_POST['btnCambiarAlmacen'])){
            $this->almacencambio = $this->modelo->obtenerAlmacen(array( 'id' => $_POST['cmbAlm']));
            $_SESSION['user']['almacencodigo'] = $this->almacencambio[0]['id'];
            $_SESSION['user']['almacen'] = $this->almacencambio[0]['descripcion'];
            header('Location:index.php?modulo=configuracion&accion=articulo');
        }
        if(isset($_POST['btnNuevoArticulo'])){
            $this->modelo->registrarArticulo(array(
                'descripcion' => $_POST['txtdescripcion'],
                'codigo_alterno' => $_POST['txtcodigo_alterno'],
                'tbl_familia_id' => $_POST['cmbfamilia'],
                'tbl_categoria_id' => $_POST['cmbcategoria'],
                'tbl_color_id' => $_POST['cmbcolor'],
                'tbl_marca_id' => $_POST['cmbmarca'],
                'creado_por' => $_SESSION['user']['nombre'],
                'foto' => '',
                'precio1' => ((trim($_POST['txtprecio1'])=='')?'null':$_POST['txtprecio1']),
                'precio2' => ((trim($_POST['txtprecio2'])=='')?'null':$_POST['txtprecio2']),
                'precio3' => ((trim($_POST['txtprecio3'])=='')?'null':$_POST['txtprecio3']),
                'precio_contable' => ((trim($_POST['txtprecio_contable'])=='')?'null':$_POST['txtprecio_contable'])
                ));
            header('Location:index.php?modulo=configuracion&accion=articulo');
        }
        if(isset($_POST['btnModificarArticulo'])){
            $this->modelo->modificarArticulo(array(
                'id' => $_POST['txtid'],
                'descripcion' => $_POST['txtdescripcion'],
                'codigo_alterno' => $_POST['txtcodigo_alterno'],
                'tbl_familia_id' => $_POST['cmbfamilia'],
                'tbl_categoria_id' => $_POST['cmbcategoria'],
                'tbl_color_id' => $_POST['cmbcolor'],
                'tbl_marca_id' => $_POST['cmbmarca'],
                'modificado_por' => $_SESSION['user']['nombre'],
                'foto' => '',
                'precio1' => ((trim($_POST['txtprecio1'])=='')?'null':$_POST['txtprecio1']),
                'precio2' => ((trim($_POST['txtprecio2'])=='')?'null':$_POST['txtprecio2']),
                'precio3' => ((trim($_POST['txtprecio3'])=='')?'null':$_POST['txtprecio3']),
                'precio_contable' => ((trim($_POST['txtprecio_contable'])=='')?'null':$_POST['txtprecio_contable'])
                ));
            header('Location:index.php?modulo=configuracion&accion=articulo');
        }
        if(isset($_POST['btnEliminarArticulo'])){
            foreach ($_POST['chkArticulo'] as $val) {
                $this->modelo->eliminarArticulo(array(
                'id' => $val,
                'modificado_por' => $_SESSION['user']['nombre']
                ));
            }
            
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
    public function familia(){
        if(isset($_POST['btnNuevaFamilia'])){
            $this->modelo->registrarFamilia(array(
                'descripcion' => $_POST['txtdescripcion'],
                'creado_por' => $_SESSION['user']['nombre']
                ));
            header('Location:index.php?modulo=configuracion&accion=familia');
        }
        if(isset($_POST['btnModificarFamilia'])){
            $this->modelo->modificarFamilia(array(
                'id' => $_POST['txtid'],
                'descripcion' => $_POST['txtdescripcion'],
                'modificado_por' => $_SESSION['user']['nombre'],
                ));
            header('Location:index.php?modulo=configuracion&accion=familia');
        }
        if(isset($_POST['btnEliminarFamilia'])){
            foreach ($_POST['chkFamilia'] as $val) {
                $this->modelo->eliminarFamilia(array(
                'id' => $val,
                'modificado_por' => $_SESSION['user']['nombre']
                ));
            }
            
            header('Location:index.php?modulo=configuracion&accion=familia');
        }
        $this->vista->familias = $this->modelo->obtenerFamilias();
        
    }
    public function modificarFamilia(){
        $this->vista->familia = $this->modelo->obtenerFamilia(array(
            'id' => $_GET['familia']
            ));
    }
    public function color(){
        if(isset($_POST['btnNuevoColor'])){
            $this->modelo->registrarColor(array(
                'descripcion' => $_POST['txtdescripcion'],
                'creado_por' => $_SESSION['user']['nombre']
                ));
            header('Location:index.php?modulo=configuracion&accion=color');
        }
        if(isset($_POST['btnModificarColor'])){
            $this->modelo->modificarColor(array(
                'id' => $_POST['txtid'],
                'descripcion' => $_POST['txtdescripcion'],
                'modificado_por' => $_SESSION['user']['nombre'],
                ));
            header('Location:index.php?modulo=configuracion&accion=color');
        }
        if(isset($_POST['btnEliminarColor'])){
            foreach ($_POST['chkColor'] as $val) {
                $this->modelo->eliminarColor(array(
                'id' => $val,
                'modificado_por' => $_SESSION['user']['nombre']
                ));
            }
            
            header('Location:index.php?modulo=configuracion&accion=color');
        }
        $this->vista->colores = $this->modelo->obtenerColores();
        
    }
    public function modificarColor(){
        $this->vista->color = $this->modelo->obtenerColor(array(
            'id' => $_GET['color']
            ));
    }
    public function marca(){
        if(isset($_POST['btnNuevaMarca'])){
            $this->modelo->registrarMarca(array(
                'descripcion' => $_POST['txtdescripcion'],
                'creado_por' => $_SESSION['user']['nombre']
                ));
            header('Location:index.php?modulo=configuracion&accion=marca');
        }
        if(isset($_POST['btnModificarMarca'])){
            $this->modelo->modificarMarca(array(
                'id' => $_POST['txtid'],
                'descripcion' => $_POST['txtdescripcion'],
                'modificado_por' => $_SESSION['user']['nombre'],
                ));
            header('Location:index.php?modulo=configuracion&accion=marca');
        }
        if(isset($_POST['btnEliminarMarca'])){
            foreach ($_POST['chkMarca'] as $val) {
                $this->modelo->eliminarMarca(array(
                'id' => $val,
                'modificado_por' => $_SESSION['user']['nombre']
                ));
            }
            
            header('Location:index.php?modulo=configuracion&accion=marca');
        }
        $this->vista->marcas = $this->modelo->obtenerMarcas();
        
    }
    public function modificarMarca(){
        $this->vista->marca = $this->modelo->obtenerMarca(array(
            'id' => $_GET['marca']
            ));
    }
    public function formapago(){
        if(isset($_POST['btnNuevaFormaPago'])){
            $this->modelo->registrarFormaPago(array(
                'descripcion' => $_POST['txtdescripcion'],
                'dia' => ((trim($_POST['txtdia'])=='')?'null':$_POST['txtdia']),
                'deposito' => ((trim($_POST['chkdeposito'])=='')?'null':$_POST['chkdeposito']),
                'creado_por' => $_SESSION['user']['nombre']
                ));
            header('Location:index.php?modulo=configuracion&accion=formapago');
        }
        if(isset($_POST['btnModificarFormaPago'])){
            $this->modelo->modificarFormaPago(array(
                'id' => $_POST['txtid'],
                'descripcion' => $_POST['txtdescripcion'],
                'dia' => ((trim($_POST['txtdia'])=='')?'null':$_POST['txtdia']),
                'deposito' => ((trim($_POST['chkdeposito'])=='')?'null':$_POST['chkdeposito']),
                'modificado_por' => $_SESSION['user']['nombre'],
                ));
            header('Location:index.php?modulo=configuracion&accion=formapago');
        }
        if(isset($_POST['btnEliminarFormaPago'])){
            foreach ($_POST['chkFormaPago'] as $val) {
                $this->modelo->eliminarFormaPago(array(
                'id' => $val,
                'modificado_por' => $_SESSION['user']['nombre']
                ));
            }
            
            header('Location:index.php?modulo=configuracion&accion=formapago');
        }
        $this->vista->formaspago = $this->modelo->obtenerFormasPago();
        
    }
    public function modificarFormaPago(){
        $this->vista->formapago = $this->modelo->obtenerFormaPago(array(
            'id' => $_GET['formapago']
            ));
    }
    public function almacen(){
        if(isset($_POST['btnNuevoAlmacen'])){
            $this->modelo->registrarAlmacen(array(
                'descripcion' => $_POST['txtdescripcion'],
                'direccion' => $_POST['txtdireccion'],
                'telefono' => $_POST['txttelefono'],
                'creado_por' => $_SESSION['user']['nombre']
                ));
            header('Location:index.php?modulo=configuracion&accion=almacen');
        }
        if(isset($_POST['btnModificarAlmacen'])){
            $this->modelo->modificarAlmacen(array(
                'id' => $_POST['txtid'],
                'descripcion' => $_POST['txtdescripcion'],
                'direccion' => $_POST['txtdireccion'],
                'telefono' => $_POST['txttelefono'],
                'modificado_por' => $_SESSION['user']['nombre'],
                ));
            header('Location:index.php?modulo=configuracion&accion=almacen');
        }
        if(isset($_POST['btnEliminarAlmacen'])){
            foreach ($_POST['chkAlmacen'] as $val) {
                $this->modelo->eliminarAlmacen(array(
                'id' => $val,
                'modificado_por' => $_SESSION['user']['nombre']
                ));
            }
            
            header('Location:index.php?modulo=configuracion&accion=almacen');
        }
        $this->vista->almacenes = $this->modelo->obtenerAlmacenes();
        
    }
    public function modificarAlmacen(){
        $this->vista->almacen = $this->modelo->obtenerAlmacen(array(
            'id' => $_GET['almacen']
            ));
    }
    public function puntoventa(){
        if(isset($_POST['btnNuevoPuntoVenta'])){
            $this->modelo->registrarPuntoVenta(array(
                'descripcion' => $_POST['txtdescripcion'],
                'direccion' => $_POST['txtdireccion'],
                'tbl_almacen_id' => $_POST['cmbAlmacen'],
                'telefono' => $_POST['txttelefono'],
                'creado_por' => $_SESSION['user']['nombre']
                ));
            header('Location:index.php?modulo=configuracion&accion=puntoventa');
        }

        if(isset($_POST['btnModificarPuntoVenta'])){
            $this->modelo->modificarPuntoVenta(array(
                'id' => $_POST['txtid'],
                'descripcion' => $_POST['txtdescripcion'],
                'direccion' => $_POST['txtdireccion'],
                'tbl_almacen_id' => $_POST['cmbAlmacen'],
                'telefono' => $_POST['txttelefono'],
                'modificado_por' => $_SESSION['user']['nombre'],
                ));
            header('Location:index.php?modulo=configuracion&accion=puntoventa');
        }
        if(isset($_POST['btnEliminarPuntoVenta'])){
            foreach ($_POST['chkPuntoVenta'] as $val) {
                $this->modelo->eliminarPuntoVenta(array(
                'id' => $val,
                'modificado_por' => $_SESSION['user']['nombre']
                ));
            }
            
            header('Location:index.php?modulo=configuracion&accion=puntoventa');
        }
        $this->vista->puntosventa = $this->modelo->obtenerPuntosVenta();
        $this->vista->almacenes = $this->modelo->obtenerAlmacenes();
    }
    public function modificarPuntoVenta(){
        $this->vista->puntoventa = $this->modelo->obtenerPuntoVenta(array(
            'id' => $_GET['puntoventa']
            ));
        $this->vista->almacenes = $this->modelo->obtenerAlmacenes();
    }
    public function tipocambio(){
        if(isset($_POST['btnNuevoTipoCambio'])){
            $this->modelo->registrarTipoCambio(array(
                'cambio_compra' => $_POST['txtcambiocompra'],
                'cambio_venta' => $_POST['txtcambioventa'],
                'fecha' => $_POST['txtfecha'],
                'creado_por' => $_SESSION['user']['nombre']
                ));
            header('Location:index.php?modulo=configuracion&accion=tipocambio');
        }

        if(isset($_POST['btnModificarTipoCambio'])){
            $this->modelo->modificarTipoCambio(array(
                'id' => $_POST['txtid'],
                'cambio_compra' => $_POST['txtcambiocompra'],
                'cambio_venta' => $_POST['txtcambioventa'],
                'fecha' => $_POST['txtfecha'],
                'modificado_por' => $_SESSION['user']['nombre'],
                ));
            header('Location:index.php?modulo=configuracion&accion=tipocambio');
        }
        if(isset($_POST['btnEliminarTipoCambio'])){
            foreach ($_POST['chkTipoCambio'] as $val) {
                $this->modelo->eliminarTipoCambio(array(
                'id' => $val,
                'modificado_por' => $_SESSION['user']['nombre']
                ));
            }
            
            header('Location:index.php?modulo=configuracion&accion=tipocambio');
        }
        $this->vista->tiposcambio = $this->modelo->obtenerTiposCambio();
    }
    public function modificarTipoCambio(){
        $this->vista->tipocambio = $this->modelo->obtenerTipoCambio(array(
            'id' => $_GET['tipocambio']
            ));
        //$this->vista->almacenes = $this->modelo->obtenerAlmacenes();
    }
    public function banco(){
        if(isset($_POST['btnNuevoBanco'])){
            $this->modelo->registrarBanco(array(
                'descripcion' => $_POST['txtdescripcion'],
                'creado_por' => $_SESSION['user']['nombre']
                ));
            header('Location:index.php?modulo=configuracion&accion=banco');
        }
        if(isset($_POST['btnModificarBanco'])){
            $this->modelo->modificarBanco(array(
                'id' => $_POST['txtid'],
                'descripcion' => $_POST['txtdescripcion'],
                'modificado_por' => $_SESSION['user']['nombre'],
                ));
            header('Location:index.php?modulo=configuracion&accion=banco');
        }
        if(isset($_POST['btnEliminarBanco'])){
            foreach ($_POST['chkBanco'] as $val) {
                $this->modelo->eliminarBanco(array(
                'id' => $val,
                'modificado_por' => $_SESSION['user']['nombre']
                ));
            }
            
            header('Location:index.php?modulo=configuracion&accion=banco');
        }
        $this->vista->bancos = $this->modelo->obtenerBancos();
        
    }
    public function modificarBanco(){
        $this->vista->banco = $this->modelo->obtenerBanco(array(
            'id' => $_GET['banco']
            ));
    }
    public function cuentacorriente(){
        if(isset($_POST['btnNuevaCuentaCorriente'])){
            $this->modelo->registrarCuentaCorriente(array(
                'cuenta' => $_POST['txtcuentacorriente'],
                'moneda' => $_POST['cmbMoneda'],
                'tbl_banco_id' => $_POST['banco'],
                'creado_por' => $_SESSION['user']['nombre']
                ));
            header('Location:index.php?modulo=configuracion&accion=cuentacorriente&banco='.$_POST['banco']);
        }
        if(isset($_POST['btnModificarCuentaCorriente'])){

            $this->modelo->modificarCuentaCorriente(array(
                'id' => $_POST['txtid'],
                'cuenta' => $_POST['txtcuentacorriente'],
                'moneda' => $_POST['cmbMoneda'],
                'modificado_por' => $_SESSION['user']['nombre'],
                ));
            header('Location:index.php?modulo=configuracion&accion=cuentacorriente&banco='.$_POST['banco']);
        }
        if(isset($_POST['btnEliminarCuentaCorriente'])){
            foreach ($_POST['chkCuentaCorriente'] as $val) {
                $this->modelo->eliminarCuentaCorriente(array(
                'id' => $val,
                'modificado_por' => $_SESSION['user']['nombre']
                ));
            }
            
            header('Location:index.php?modulo=configuracion&accion=cuentacorriente&banco='.$_POST['banco']);
        }
        //$this->vista->bancos = $this->modelo->obtenerBancos();
        $this->vista->cuentascorriente = $this->modelo->obtenerCuentasCorriente(array('tbl_banco_id'=>$_GET['banco']));
    }
    public function modificarCuentaCorriente(){
        $this->vista->cuentacorriente = $this->modelo->obtenerCuentaCorriente(array(
            'id' => $_GET['cuentacorriente']
            ));
    }
    public function cliente(){
        if(isset($_POST['btnNuevoCliente'])){
            $this->modelo->registrarCliente(array(
                'ruc' => $_POST['txtruc'],
                'razonsocial' => $_POST['txtrazonsocial'],
                'direccion' => $_POST['txtdireccion'],
                'contacto' => $_POST['txtcontacto'],
                'telefono_fijo' => $_POST['txttelefono'],
                'telefono_movil' => $_POST['txttelefonomovil'],
                'cuenta_inicial_soles' => $_POST['txtmontosoles'],
                'cuenta_inicial_dolares' => $_POST['txtmontodolares'],
                'cuenta_inicial_soles_fecha' => $_POST['txtfechasoles'],
                'cuenta_inicial_dolares_fecha' => $_POST['txtfechadolares'],
                'creado_por' => $_SESSION['user']['nombre']
                ));
            header('Location:index.php?modulo=configuracion&accion=cliente');
        }
        if(isset($_POST['btnModificarCliente'])){

            $this->modelo->modificarCliente(array(
                'id' => $_POST['txtid'],
                'ruc' => $_POST['txtruc'],
                'razonsocial' => $_POST['txtrazonsocial'],
                'direccion' => $_POST['txtdireccion'],
                'contacto' => $_POST['txtcontacto'],
                'telefono_fijo' => $_POST['txttelefono'],
                'telefono_movil' => $_POST['txttelefonomovil'],
                'cuenta_inicial_soles' => $_POST['txtmontosoles'],
                'cuenta_inicial_dolares' => $_POST['txtmontodolares'],
                'cuenta_inicial_soles_fecha' => $_POST['txtfechasoles_'],
                'cuenta_inicial_dolares_fecha' => $_POST['txtfechadolares_'],
                'modificado_por' => $_SESSION['user']['nombre'],
                ));
            header('Location:index.php?modulo=configuracion&accion=cliente');
        }
        if(isset($_POST['btnEliminarCliente'])){
            foreach ($_POST['chkCliente'] as $val) {
                $this->modelo->eliminarCliente(array(
                'id' => $val,
                'modificado_por' => $_SESSION['user']['nombre']
                ));
            }
            
            header('Location:index.php?modulo=configuracion&accion=cliente');
        }
        $this->vista->clientes = $this->modelo->obtenerClientes();
    }
    public function modificarCliente(){
        $this->vista->cliente = $this->modelo->obtenerCliente(array(
            'id' => $_GET['cliente']
            ));
    }
}
?>