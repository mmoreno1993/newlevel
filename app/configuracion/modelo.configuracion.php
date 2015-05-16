<?php

class modeloConfiguracion extends MySQL {
    public function __construct(){
        //parent::__construct();   
    }
    public function obtenerArticulos(){
        $this->query = "
                select a.id,a.descripcion as articulo,a.codigo_alterno,f.descripcion as familia,
                concat(date_format(if(isnull(a.fecha_modificado)=1,a.fecha_creado,a.fecha_modificado),'%d/%m/%Y %h:%i %p'),' por ',
                if(isnull(a.modificado_por)=1,a.creado_por,a.modificado_por)) as ultima_modificacion from tbl_articulo a left 
                join tbl_familia f on a.tbl_familia_id=f.id
                where a.activo=1
                ";

        return $this->obtener_resultados();
    }
    public function obtenerFamilias(){
        $this->query = "
                select id,descripcion,concat(date_format(if(isnull(fecha_modificado)=1,fecha_creado,fecha_modificado),'%d/%m/%Y %h:%i %p'),' por ',
                if(isnull(modificado_por)=1,creado_por,modificado_por)) as ultima_modificacion,activo from tbl_familia
                where activo=1
                ";
        return $this->obtener_resultados();
    }
    public function obtenerFamilia($familia){
        $this->query = "
                select id,descripcion,concat(date_format(if(isnull(fecha_modificado)=1,fecha_creado,fecha_modificado),'%d/%m/%Y %h:%i %p'),' por ',
                if(isnull(modificado_por)=1,creado_por,modificado_por)) as ultima_modificacion,activo from tbl_familia
                where activo=1 and id=".$familia['id']."
                ";
        return $this->obtener_resultados();
    }
    public function registrarFamilia($familia){
        $this->query = "
                insert into tbl_familia(descripcion,creado_por,fecha_creado,activo) values('".$familia['descripcion']."','".$familia['creado_por']."',now(),1)
                ";

        return $this->ejecutar_query_simple();
    }
    public function modificarFamilia($familia){
        $this->query = "
                update tbl_familia set descripcion='".$familia['descripcion']."',modificado_por='".$familia['modificado_por']."',fecha_modificado=now() 
                where id=".$familia['id']."
                ";
        return $this->ejecutar_query_simple();
    }
    public function eliminarFamilia($familia){
        $this->query = "
                update tbl_familia set activo=0 where id=".$familia['id']."
                ";

        return $this->ejecutar_query_simple();
    }
    public function obtenerCategorias($familia){
        $this->query = "
                select id,descripcion,concat(date_format(if(isnull(fecha_modificado)=1,fecha_creado,fecha_modificado),'%d/%m/%Y %h:%i %p'),' por ',
                if(isnull(modificado_por)=1,creado_por,modificado_por)) as ultima_modificacion,activo from tbl_categoria
                where activo=1 and tbl_familia_id = ".$familia['id']."
                ";
        return $this->obtener_resultados();
    }
    public function obtenerColores(){
        $this->query = "
                select id,descripcion,concat(date_format(if(isnull(fecha_modificado)=1,fecha_creado,fecha_modificado),'%d/%m/%Y %h:%i %p'),' por ',
                if(isnull(modificado_por)=1,creado_por,modificado_por)) as ultima_modificacion,activo from tbl_color
                where activo=1
                ";
        return $this->obtener_resultados();
    }
    public function obtenerColor($color){
        $this->query = "
                select id,descripcion,concat(date_format(if(isnull(fecha_modificado)=1,fecha_creado,fecha_modificado),'%d/%m/%Y %h:%i %p'),' por ',
                if(isnull(modificado_por)=1,creado_por,modificado_por)) as ultima_modificacion,activo from tbl_color
                where activo=1 and id=".$color['id']."
                ";
        return $this->obtener_resultados();
    }
    public function registrarColor($color){
        $this->query = "
                insert into tbl_color(descripcion,creado_por,fecha_creado,activo) values('".$color['descripcion']."','".$color['creado_por']."',now(),1)
                ";
        return $this->ejecutar_query_simple();
    }
    public function modificarColor($color){
        $this->query = "
                update tbl_color set descripcion='".$color['descripcion']."',modificado_por='".$color['modificado_por']."',fecha_modificado=now() 
                where id=".$color['id']."
                ";
        return $this->ejecutar_query_simple();
    }
    public function eliminarColor($color){
        $this->query = "
                update tbl_color set activo=0 where id=".$color['id']."
                ";
        return $this->ejecutar_query_simple();
    }
    public function obtenerMarcas(){
        $this->query = "
                select id,descripcion,concat(date_format(if(isnull(fecha_modificado)=1,fecha_creado,fecha_modificado),'%d/%m/%Y %h:%i %p'),' por ',
                if(isnull(modificado_por)=1,creado_por,modificado_por)) as ultima_modificacion,activo from tbl_marca
                where activo=1
                ";
        return $this->obtener_resultados();
    }
    public function obtenerMarca($marca){
        $this->query = "
                select id,descripcion,concat(date_format(if(isnull(fecha_modificado)=1,fecha_creado,fecha_modificado),'%d/%m/%Y %h:%i %p'),' por ',
                if(isnull(modificado_por)=1,creado_por,modificado_por)) as ultima_modificacion,activo from tbl_marca
                where activo=1 and id=".$marca['id']."
                ";
        return $this->obtener_resultados();
    }
    public function registrarMarca($marca){
        $this->query = "
                insert into tbl_marca(descripcion,creado_por,fecha_creado,activo) values('".$marca['descripcion']."','".$marca['creado_por']."',now(),1)
                ";
        return $this->ejecutar_query_simple();
    }
    public function modificarMarca($marca){
        $this->query = "
                update tbl_marca set descripcion='".$marca['descripcion']."',modificado_por='".$marca['modificado_por']."',fecha_modificado=now() 
                where id=".$marca['id']."
                ";

        return $this->ejecutar_query_simple();
    }
    public function eliminarMarca($marca){
        $this->query = "
                update tbl_marca set activo=0 where id=".$marca['id']."
                ";
        return $this->ejecutar_query_simple();
    }
    public function obtenerArticulo($articulo){
        $this->query = "
                select a.id,a.precio1,a.precio2,a.precio3,a.precio_contable,a.descripcion as articulo,a.codigo_alterno,tbl_familia_id,tbl_categoria_id,tbl_color_id,f.descripcion as familia,
                concat(date_format(if(isnull(a.fecha_modificado)=1,a.fecha_creado,a.fecha_modificado),'%d/%m/%Y %h:%i %p'),' por ',
                if(isnull(a.modificado_por)=1,a.creado_por,a.modificado_por)) as ultima_modificacion from tbl_articulo a left 
                join tbl_familia f on a.tbl_familia_id=f.id where a.id=".$articulo['id']." and a.activo=1
                ";
        return $this->obtener_resultados();
    }
    public function registrarArticulo($articulo){
        $this->query = "
                    insert into tbl_articulo(descripcion,codigo_alterno,tbl_familia_id,tbl_categoria_id,tbl_color_id,
                    tbl_marca_id,creado_por,fecha_creado,activo,foto,precio1,precio2,precio3,precio_contable) values('".$articulo['descripcion']."',
                    '".$articulo['codigo_alterno']."',".$articulo['tbl_familia_id'].",".$articulo['tbl_categoria_id'].",
                    ".$articulo['tbl_color_id'].",".$articulo['tbl_marca_id'].",'".$articulo['creado_por']."',now(),
                    1,'".$articulo['foto']."',".$articulo['precio1'].",".$articulo['precio2'].",".$articulo['precio3'].",
                    ".$articulo['precio_contable'].")
                ";
        return $this->ejecutar_query_simple();
    }
    public function modificarArticulo($articulo){
        $this->query = "
                    update tbl_articulo set descripcion='".$articulo['descripcion']."',codigo_alterno='".$articulo['codigo_alterno']."',
                    tbl_familia_id=".$articulo['tbl_familia_id'].",tbl_categoria_id=".$articulo['tbl_categoria_id'].",
                    tbl_color_id=".$articulo['tbl_color_id'].",tbl_marca_id=".$articulo['tbl_marca_id'].",
                    modificado_por='".$articulo['modificado_por']."',fecha_modificado=now(),foto='".$articulo['foto']."',
                    precio1=".$articulo['precio1'].",precio2=".$articulo['precio2'].",precio3=".$articulo['precio3'].",
                    precio_contable=".$articulo['precio_contable']." where id=".$articulo['id']."
                ";
        return $this->ejecutar_query_simple();
    }
    public function eliminarArticulo($articulo){
        $this->query = "
                    update tbl_articulo set activo=0,modificado_por='".$articulo['modificado_por']."',fecha_modificado=now() where id=".$articulo['id']."
                ";
        return $this->ejecutar_query_simple();
    }



    public function obtenerFormasPago(){
        $this->query = "
                select id,descripcion,dia,deposito,concat(date_format(if(isnull(fecha_modificado)=1,fecha_creado,fecha_modificado),'%d/%m/%Y %h:%i %p'),' por ',
                if(isnull(modificado_por)=1,creado_por,modificado_por)) as ultima_modificacion,activo from tbl_formapago
                where activo=1
                ";
        return $this->obtener_resultados();
    }
    public function obtenerFormaPago($formapago){
        $this->query = "
                select id,descripcion,dia,deposito,concat(date_format(if(isnull(fecha_modificado)=1,fecha_creado,fecha_modificado),'%d/%m/%Y %h:%i %p'),' por ',
                if(isnull(modificado_por)=1,creado_por,modificado_por)) as ultima_modificacion,activo from tbl_formapago
                where activo=1 and id=".$formapago['id']."
                ";
        return $this->obtener_resultados();
    }
    public function registrarFormaPago($formapago){
        $this->query = "
                insert into tbl_formapago(descripcion,dia,deposito,creado_por,fecha_creado,activo) values('".$formapago['descripcion']."',".$formapago['dia'].",
                    ".$formapago['deposito'].",'".$formapago['creado_por']."',now(),1)
                ";
        return $this->ejecutar_query_simple();
    }
    public function modificarFormaPago($formapago){
        $this->query = "
                update tbl_formapago set descripcion='".$formapago['descripcion']."',dia=".$formapago['dia'].",deposito=".$formapago['deposito'].",modificado_por='".$formapago['modificado_por']."',fecha_modificado=now() 
                where id=".$formapago['id']."
                ";

        return $this->ejecutar_query_simple();
    }
    public function eliminarFormaPago($formapago){
        $this->query = "
                update tbl_formapago set activo=0 where id=".$formapago['id']."
                ";
        return $this->ejecutar_query_simple();
    }

    public function obtenerAlmacenes(){
        $this->query = "
                select id,descripcion,direccion,telefono,concat(date_format(if(isnull(fecha_modificado) =1,fecha_creado,fecha_modificado),
                '%d/%m/%Y %h:%i %p'),' por ',if(isnull(modificado_por)=1,creado_por,modificado_por)) as ultima_modificacion,activo from 
                tbl_almacen where activo=1
                ";
        return $this->obtener_resultados();
    }
    public function obtenerAlmacen($almacen){
        $this->query = "
                select id,descripcion,direccion,telefono,concat(date_format(if(isnull(fecha_modificado) =1,fecha_creado,fecha_modificado),
                '%d/%m/%Y %h:%i %p'),' por ',if(isnull(modificado_por)=1,creado_por,modificado_por)) as ultima_modificacion,activo from 
                tbl_almacen where activo=1 and id=".$almacen['id']."
                ";
        return $this->obtener_resultados();
    }
    public function registrarAlmacen($almacen){
        $this->query = "
                insert into tbl_almacen(descripcion,direccion,telefono,creado_por,fecha_creado,activo) values('".$almacen['descripcion']."',
                    '".$almacen['direccion']."','".$almacen['telefono']."','".$almacen['creado_por']."',now(),1)
                ";
        return $this->ejecutar_query_simple();
    }
    public function modificarAlmacen($almacen){
        $this->query = "
                update tbl_almacen set descripcion='".$almacen['descripcion']."',direccion='".$almacen['direccion']."',telefono='".$almacen['telefono']."',modificado_por='".$almacen['modificado_por']."',fecha_modificado=now() 
                where id=".$almacen['id']."
                ";

        return $this->ejecutar_query_simple();
    }
    public function eliminarAlmacen($almacen){
        $this->query = "
                update tbl_almacen set activo=0 where id=".$almacen['id']."
                ";
        return $this->ejecutar_query_simple();
    }


    public function obtenerPuntosVenta(){
        $this->query = "
                select id,descripcion,direccion,telefono,tbl_almacen_id,concat(date_format(if(isnull(fecha_modificado) =1,fecha_creado,fecha_modificado),
                '%d/%m/%Y %h:%i %p'),' por ',if(isnull(modificado_por)=1,creado_por,modificado_por)) as ultima_modificacion,activo from 
                tbl_puntoventa where activo=1
                ";
        return $this->obtener_resultados();
    }
    public function obtenerPuntoVenta($puntoventa){
        $this->query = "
                select id,descripcion,direccion,telefono,tbl_almacen_id,concat(date_format(if(isnull(fecha_modificado) =1,fecha_creado,fecha_modificado),
                '%d/%m/%Y %h:%i %p'),' por ',if(isnull(modificado_por)=1,creado_por,modificado_por)) as ultima_modificacion,activo from 
                tbl_puntoventa where activo=1 and id=".$puntoventa['id']."
                ";
        return $this->obtener_resultados();
    }
    public function registrarPuntoVenta($puntoventa){
        $this->query = "
                insert into tbl_puntoventa(descripcion,direccion,telefono,tbl_almacen_id,creado_por,fecha_creado,activo) values('".$puntoventa['descripcion']."',
                    '".$puntoventa['direccion']."','".$puntoventa['telefono']."',".$puntoventa['tbl_almacen_id'].",'".$puntoventa['creado_por']."',now(),1)
                ";
                
        return $this->ejecutar_query_simple();
    }
    public function modificarPuntoVenta($puntoventa){
        $this->query = "
                update tbl_puntoventa set descripcion='".$puntoventa['descripcion']."',tbl_almacen_id=".$puntoventa['tbl_almacen_id'].",
                direccion='".$puntoventa['direccion']."',tbl_almacen_id=".$puntoventa['tbl_almacen_id'].",telefono='".$puntoventa['telefono']."',
                modificado_por='".$puntoventa['modificado_por']."',fecha_modificado=now() 
                where id=".$puntoventa['id']."
                ";

        return $this->ejecutar_query_simple();
    }
    public function eliminarPuntoVenta($almacen){
        $this->query = "
                update tbl_puntoventa set activo=0 where id=".$almacen['id']."
                ";
        return $this->ejecutar_query_simple();
    }


    public function cambiarClave($antigua,$nueva,$confirma,$modificado_por,$id){
        $this->query = "
                update tbl_usuario set password='".$confirma."',modificado_por='".$modificado_por."',
                fecha_modificado=now() 
                where id=".$id." and password='".$antigua."'
                ";
        if($nueva!=$confirma){
            $this->query = "select ''";
        }

        return $this->ejecutar_query_simple();
    }

    public function obtenerTiposCambio(){
        $this->query = "
                select id,cambio_compra,cambio_venta,date_format(fecha,'%d/%m/%Y') as fecha,concat(date_format(if(isnull(fecha_modificado) =1,fecha_creado,
                fecha_modificado),'%d/%m/%Y %h:%i %p'),' por ',if(isnull(modificado_por)=1,creado_por,modificado_por)) 
                as ultima_modificacion,activo from tbl_tipocambio where activo=1
                ";

        return $this->obtener_resultados();
    }
    public function obtenerTipoCambio($tipocambio){
        $this->query = "
                select id,cambio_compra,cambio_venta,date_format(fecha,'%d/%m/%Y') as fecha,concat(date_format(if(isnull(fecha_modificado) =1,fecha_creado,
                fecha_modificado),'%d/%m/%Y %h:%i %p'),' por ',if(isnull(modificado_por)=1,creado_por,modificado_por)) 
                as ultima_modificacion,activo from tbl_tipocambio where activo=1 
                and id=".$tipocambio['id']."
                ";
        return $this->obtener_resultados();
    }
    public function registrarTipoCambio($tipocambio){
        $this->query = "
                insert into tbl_tipocambio(cambio_compra,cambio_venta,fecha,
                creado_por,fecha_creado,activo) values(".$tipocambio['cambio_compra'].",".$tipocambio['cambio_venta'].",
                '".$tipocambio['fecha']."','".$tipocambio['creado_por']."',now(),1)
                ";
                
        return $this->ejecutar_query_simple();
    }
    public function modificarTipoCambio($tipocambio){
        $this->query = "
                update tbl_tipocambio set cambio_compra=".$tipocambio['cambio_compra'].",cambio_venta=".$tipocambio['cambio_venta'].",
                fecha='".$tipocambio['fecha']."',modificado_por='".$tipocambio['modificado_por']."',
                fecha_modificado=now() 
                where id=".$tipocambio['id']."
                ";

        return $this->ejecutar_query_simple();
    }


    public function eliminarTipoCambio($tipocambio){
        $this->query = "
                update tbl_tipocambio set activo=0 where id=".$tipocambio['id']."
                ";
        return $this->ejecutar_query_simple();
    }

    public function obtenerBancos(){
        $this->query = "
                select id,descripcion,concat(date_format(if(isnull(fecha_modificado)=1,fecha_creado,fecha_modificado),'%d/%m/%Y %h:%i %p'),' por ',
                if(isnull(modificado_por)=1,creado_por,modificado_por)) as ultima_modificacion,activo from tbl_banco
                where activo=1
                ";
        return $this->obtener_resultados();
    }
    public function obtenerBanco($banco){
        $this->query = "
                select id,descripcion,concat(date_format(if(isnull(fecha_modificado)=1,fecha_creado,fecha_modificado),'%d/%m/%Y %h:%i %p'),' por ',
                if(isnull(modificado_por)=1,creado_por,modificado_por)) as ultima_modificacion,activo from tbl_banco
                where activo=1 and id=".$banco['id']."
                ";
        return $this->obtener_resultados();
    }
    public function registrarBanco($banco){
        $this->query = "
                insert into tbl_banco(descripcion,creado_por,fecha_creado,activo) values('".$banco['descripcion']."','".$banco['creado_por']."',now(),1)
                ";
        return $this->ejecutar_query_simple();
    }
    public function modificarBanco($banco){
        $this->query = "
                update tbl_banco set descripcion='".$banco['descripcion']."',modificado_por='".$banco['modificado_por']."',fecha_modificado=now() 
                where id=".$banco['id']."
                ";

        return $this->ejecutar_query_simple();
    }
    public function eliminarBanco($banco){
        $this->query = "
                update tbl_banco set activo=0 where id=".$banco['id']."
                ";
        return $this->ejecutar_query_simple();
    }
    public function obtenerCuentasCorriente($cuentacorriente){
        $this->query = "
                select id,cuenta,moneda,concat(date_format(if(isnull(fecha_modificado)=1,fecha_creado,fecha_modificado),'%d/%m/%Y %h:%i %p'),' por ',
                if(isnull(modificado_por)=1,creado_por,modificado_por)) as ultima_modificacion,activo from tbl_cuenta_corriente
                where activo=1 and tbl_banco_id=".$cuentacorriente['tbl_banco_id']."
                ";
        return $this->obtener_resultados();
    }
    public function obtenerCuentaCorriente($cuentacorriente){
        $this->query = "
                select id,cuenta,moneda,tbl_banco_id,concat(date_format(if(isnull(fecha_modificado)=1,fecha_creado,fecha_modificado),'%d/%m/%Y %h:%i %p'),' por ',
                if(isnull(modificado_por)=1,creado_por,modificado_por)) as ultima_modificacion,activo from tbl_cuenta_corriente
                where activo=1 and id=".$cuentacorriente['id']."
                ";
        return $this->obtener_resultados();
    }
    public function registrarCuentaCorriente($cuentacorriente){
        $this->query = "
                insert into tbl_cuenta_corriente(cuenta,moneda,tbl_banco_id,creado_por,fecha_creado,activo) values('".$cuentacorriente['cuenta']."',".$cuentacorriente['moneda'].",".$cuentacorriente['tbl_banco_id'].",'".$cuentacorriente['creado_por']."',now(),1)
                ";
        return $this->ejecutar_query_simple();
    }
    public function modificarCuentaCorriente($cuentacorriente){
        $this->query = "
                update tbl_cuenta_corriente set cuenta='".$cuentacorriente['cuenta']."',moneda=".$cuentacorriente['moneda'].",
                modificado_por='".$cuentacorriente['modificado_por']."',fecha_modificado=now() 
                where id=".$cuentacorriente['id']."
                ";

        return $this->ejecutar_query_simple();
    }
    public function eliminarCuentaCorriente($cuentacorriente){
        $this->query = "
                update tbl_cuenta_corriente set activo=0 where id=".$cuentacorriente['id']."
                ";
        return $this->ejecutar_query_simple();
    }

    public function obtenerClientes(){
        $this->query = "
                select id,razonsocial,grupo,ruc,direccion,contacto,telefono_fijo,telefono_movil,cuenta_inicial_soles,
                cuenta_inicial_dolares,cuenta_inicial_soles_fecha,cuenta_inicial_dolares_fecha,
                concat(date_format(if(isnull(fecha_modificado)=1,fecha_creado,fecha_modificado),'%d/%m/%Y %h:%i %p'),
                ' por ',if(isnull(modificado_por)=1,creado_por,modificado_por)) as ultima_modificacion,activo,
                tipo_cliente from tbl_cliente where activo=1
                ";
        return $this->obtener_resultados();
    }
    public function obtenerCliente($cliente){
        $this->query = "
                select id,razonsocial,grupo,ruc,direccion,contacto,telefono_fijo,telefono_movil,cuenta_inicial_soles,
                cuenta_inicial_dolares,cuenta_inicial_soles_fecha,cuenta_inicial_dolares_fecha,
                concat(date_format(if(isnull(fecha_modificado)=1,fecha_creado,fecha_modificado),'%d/%m/%Y %h:%i %p'),
                ' por ',if(isnull(modificado_por)=1,creado_por,modificado_por)) as ultima_modificacion,activo,
                tipo_cliente from tbl_cliente
                where activo=1 and id=".$cliente['id']."
                ";
        return $this->obtener_resultados();
    }
    public function registrarCliente($cliente){
        $this->query = "
                insert into tbl_cliente(razonsocial,grupo,ruc,direccion,contacto,telefono_fijo,telefono_movil,
                cuenta_inicial_soles,cuenta_inicial_dolares,cuenta_inicial_soles_fecha,cuenta_inicial_dolares_fecha,
                creado_por,fecha_creado,activo) 
                values('".$cliente['razonsocial']."','".$cliente['grupo']."','".$cliente['ruc']."',
                '".$cliente['direccion']."','".$cliente['contacto']."','".$cliente['telefono_fijo']."',
                '".$cliente['telefono_movil']."',".$cliente['cuenta_inicial_soles'].",".$cliente['cuenta_inicial_dolares'].",
                '".$cliente['cuenta_inicial_soles_fecha']."','".$cliente['cuenta_inicial_dolares_fecha']."',
                '".$cliente['creado_por']."',now(),1)
                ";
        return $this->ejecutar_query_simple();
    }
    public function modificarCliente($cliente){
        $this->query = "
                update tbl_cliente set razonsocial='".$cliente['razonsocial']."',grupo='".$cliente['grupo']."',
                razonsocial='".$cliente['razonsocial']."',grupo='".$cliente['grupo']."',ruc='".$cliente['ruc']."',
                direccion='".$cliente['direccion']."',contacto='".$cliente['contacto']."',telefono_fijo='".$cliente['telefono_fijo']."',
                telefono_movil='".$cliente['telefono_movil']."',cuenta_inicial_soles=".$cliente['cuenta_inicial_soles'].",
                cuenta_inicial_dolares=".$cliente['cuenta_inicial_dolares'].",
                cuenta_inicial_soles_fecha='".$cliente['cuenta_inicial_soles_fecha']."',cuenta_inicial_dolares_fecha='".$cliente['cuenta_inicial_dolares_fecha']."',
                modificado_por='".$cliente['modificado_por']."',fecha_modificado=now() 
                where id=".$cliente['id']."
                ";

        return $this->ejecutar_query_simple();
    }
    public function eliminarCliente($cliente){
        $this->query = "
                update tbl_cliente set activo=0 where id=".$cliente['id']."
                ";
        return $this->ejecutar_query_simple();
    }


    public function obtenerUsuarios(){
        $this->query = "
                select id,apepat,apemat,nombre_1,nombre_2, concat(apepat,' ',nombre_1) as usuario,correo,password,
                alias,telefono,direccion,dni,fecha_nacimiento,concat(date_format(if(isnull(fecha_modificado)=1,
                fecha_creado,fecha_modificado),'%d/%m/%Y %h:%i %p'),' por ',if(isnull(modificado_por)=1,creado_por,
                modificado_por)) as ultima_modificacion,activo,tipo_usuario from tbl_usuario
                where activo=1
                ";
        return $this->obtener_resultados();
    }
    public function obtenerUsuario($usuario){
        $this->query = "
                select id,apepat,apemat,nombre_1,nombre_2, concat(apepat,' ',nombre_1) as usuario,correo,password,
                alias,telefono,direccion,dni,fecha_nacimiento,concat(date_format(if(isnull(fecha_modificado)=1,
                fecha_creado,fecha_modificado),'%d/%m/%Y %h:%i %p'),' por ',if(isnull(modificado_por)=1,creado_por,
                modificado_por)) as ultima_modificacion,activo,tipo_usuario from tbl_usuario
                where activo=1 and id=".$usuario['id']."
                ";
        return $this->obtener_resultados();
    }
    public function registrarUsuario($usuario){
        $this->query = "
                insert into tbl_usuario(apepat,apemat,nombre_1,nombre_2,correo,password,alias,telefono,direccion,dni,
                fecha_nacimiento,creado_por,fecha_creado,activo,tipo_usuario) values('".$usuario['apepat']."',
                '".$usuario['apemat']."','".$usuario['nombre_1']."','".$usuario['nombre_2']."','".$usuario['correo']."',
                '".$usuario['password']."','".$usuario['alias']."','".$usuario['telefono']."','".$usuario['direccion']."',
                '".$usuario['dni']."','".$usuario['fecha_nacimiento']."','".$usuario['creado_por']."',now(),1,
                ".$usuario['tipo_usuario'].")
                ";
        return $this->ejecutar_query_simple();
    }
    public function modificarUsuario($usuario){
        $this->query = "
                update tbl_usuario set apepat='".$usuario['apepat']."',apemat='".$usuario['apemat']."',nombre_1='".$usuario['nombre_1']."',
                nombre_2='".$usuario['nombre_2']."',correo='".$usuario['correo']."',password='".$usuario['password']."',
                alias='".$usuario['alias']."',telefono='".$usuario['telefono']."',direccion='".$usuario['direccion']."',
                dni='".$usuario['dni']."',fecha_nacimiento='".$usuario['fecha_nacimiento']."',
                modificado_por='".$usuario['modificado_por']."',
                fecha_modificado=now(),tipo_usuario=".$usuario['tipo_usuario']."
                where id=".$banco['id']."
                ";

        return $this->ejecutar_query_simple();
    }
    public function eliminarUsuario($usuario){
        $this->query = "
                update tbl_usuario set activo=0 where id=".$usuario['id']."
                ";
        return $this->ejecutar_query_simple();
    }

    public function __destruct(){
        unset($this);
    }

}

?>