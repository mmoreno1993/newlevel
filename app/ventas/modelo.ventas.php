<?php

class modeloVentas extends MySQL {
    public function __construct(){
        //parent::__construct();   
    }
    public function getPrueba(){
        $this->query = "
            select * from tbl_almacen
            ";
        return $this->obtener_resultados();
    }
    public function obtenerPedidos(){
        $this->query = "
            select coc.id,coc.numero,coc.fecha_registro,coc.fecha_vigente,coc.moneda,coc.glosa,tc.razonsocial,
            sum(cod.descuento) as descuento,sum(((cod.cantidad * cod.bruto) + cod.igv - cod.descuento)) as total,tec.descripcion as estado,
            concat(date_format(if(isnull(coc.fecha_modificado)=1,coc.fecha_creado,coc.fecha_modificado),'%d/%m/%Y %h:%i %p'),
            ' por ',if(isnull(coc.modificado_por)=1,coc.creado_por,coc.modificado_por)) as ultima_modificacion,coc.activo 
            from tbl_pedcab coc left join tbl_peddet cod on cod.tbl_pedcab_id = coc.id left join tbl_cliente tc
            on coc.tbl_cliente_id = tc.id left join tbl_estado_cotizacion tec on coc.tbl_estado_cotizacion_id=tec.id
            where coc.activo=1
            group by coc.id,coc.numero,coc.fecha_registro,coc.fecha_vigente,coc.moneda,coc.glosa,tc.razonsocial,
            tec.descripcion,concat(date_format(if(isnull(coc.fecha_modificado)=1,coc.fecha_creado,coc.fecha_modificado),
            '%d/%m/%Y %h:%i %p'),' por ',if(isnull(coc.modificado_por)=1,coc.creado_por,coc.modificado_por)),coc.activo 
            ";
        return $this->ejecutar_query_simple();
    }
    public function obtenerPedido($pedido){
        $this->query = "
            select coc.id,coc.numero,coc.fecha_registro,coc.fecha_vigente,coc.moneda,coc.glosa,tc.razonsocial,
            sum(cod.descuento) as descuento,sum(((cod.cantidad * cod.bruto) + cod.igv - cod.descuento)) as total,tec.descripcion as estado,
            concat(date_format(if(isnull(coc.fecha_modificado)=1,coc.fecha_creado,coc.fecha_modificado),'%d/%m/%Y %h:%i %p'),
            ' por ',if(isnull(coc.modificado_por)=1,coc.creado_por,coc.modificado_por)) as ultima_modificacion,coc.activo 
            from tbl_pedcab coc left join tbl_peddet cod on cod.tbl_pedcab_id = coc.id inner join tbl_cliente tc
            on coc.tbl_cliente_id = tc.id left join tbl_estado_cotizacion tec on coc.tbl_estado_cotizacion_id=tec.id
            where coc.activo=1 and id=".$pedido['id']."
            group by coc.id,coc.numero,coc.fecha_registro,coc.fecha_vigente,coc.moneda,coc.glosa,tc.razonsocial,
            tec.descripcion,concat(date_format(if(isnull(coc.fecha_modificado)=1,coc.fecha_creado,coc.fecha_modificado),
            '%d/%m/%Y %h:%i %p'),' por ',if(isnull(coc.modificado_por)=1,coc.creado_por,coc.modificado_por)),coc.activo 
            ";
        return $this->obtener_resultados();
    }
    public function obtenerClientes(){
        $this->query = "
                select id,razonsocial as descripcion,grupo,ruc,direccion,contacto,telefono_fijo,telefono_movil,cuenta_inicial_soles,
                cuenta_inicial_dolares,cuenta_inicial_soles_fecha,cuenta_inicial_dolares_fecha,
                concat(date_format(if(isnull(fecha_modificado)=1,fecha_creado,fecha_modificado),'%d/%m/%Y %h:%i %p'),
                ' por ',if(isnull(modificado_por)=1,creado_por,modificado_por)) as ultima_modificacion,activo,
                tipo_cliente from tbl_cliente where activo=1
                ";
        return $this->obtener_resultados();
    }
    public function obtenerCliente($cliente){
        $this->query = "
                select id,razonsocial as descripcion,grupo,ruc,direccion,contacto,telefono_fijo,telefono_movil,cuenta_inicial_soles,
                cuenta_inicial_dolares,cuenta_inicial_soles_fecha,cuenta_inicial_dolares_fecha,
                concat(date_format(if(isnull(fecha_modificado)=1,fecha_creado,fecha_modificado),'%d/%m/%Y %h:%i %p'),
                ' por ',if(isnull(modificado_por)=1,creado_por,modificado_por)) as ultima_modificacion,activo,
                tipo_cliente from tbl_cliente
                where activo=1 and id=".$cliente['id']."
                ";
        return $this->obtener_resultados();
    }
  
}

?>