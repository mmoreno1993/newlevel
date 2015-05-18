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
            select coc.id,coc.numero,coc.fecha_registro,coc.fecha_vigente,coc.moneda,coc.glosa,coc.tbl_cliente_id,tc.razonsocial,
            sum(cod.descuento) as descuento,round(sum(((cod.cantidad * cod.bruto) + cod.igv - cod.descuento)),2) as total,tec.descripcion as estado,
            concat(date_format(if(isnull(coc.fecha_modificado)=1,coc.fecha_creado,coc.fecha_modificado),'%d/%m/%Y %h:%i %p'),
            ' por ',if(isnull(coc.modificado_por)=1,coc.creado_por,coc.modificado_por)) as ultima_modificacion,coc.activo 
            from tbl_pedcab coc left join tbl_peddet cod on cod.tbl_pedcab_id = coc.id left join tbl_cliente tc
            on coc.tbl_cliente_id = tc.id left join tbl_estado_pedido tec on coc.tbl_estado_pedido_id=tec.id
            where coc.activo=1
            group by coc.id,coc.numero,coc.fecha_registro,coc.fecha_vigente,coc.moneda,coc.glosa,tc.razonsocial,
            tec.descripcion,concat(date_format(if(isnull(coc.fecha_modificado)=1,coc.fecha_creado,coc.fecha_modificado),
            '%d/%m/%Y %h:%i %p'),' por ',if(isnull(coc.modificado_por)=1,coc.creado_por,coc.modificado_por)),coc.activo 
            ";
        return $this->obtener_resultados();
    }
    public function obtenerPedido($pedido){
        $this->query = "
            select coc.id,coc.numero,coc.fecha_registro,coc.fecha_vigente,coc.moneda,coc.glosa,coc.tbl_cliente_id,tc.razonsocial,
            sum(cod.descuento) as descuento,round(sum(((cod.cantidad * cod.bruto) + cod.igv - cod.descuento)),2) as total,tec.descripcion as estado,
            concat(date_format(if(isnull(coc.fecha_modificado)=1,coc.fecha_creado,coc.fecha_modificado),'%d/%m/%Y %h:%i %p'),
            ' por ',if(isnull(coc.modificado_por)=1,coc.creado_por,coc.modificado_por)) as ultima_modificacion,coc.activo 
            from tbl_pedcab coc left join tbl_peddet cod on cod.tbl_pedcab_id = coc.id inner join tbl_cliente tc
            on coc.tbl_cliente_id = tc.id left join tbl_estado_pedido tec on coc.tbl_estado_pedido_id=tec.id
            where coc.activo=1 and coc.id=".$pedido['id']."
            group by coc.id,coc.numero,coc.fecha_registro,coc.fecha_vigente,coc.moneda,coc.glosa,tc.razonsocial,
            tec.descripcion,concat(date_format(if(isnull(coc.fecha_modificado)=1,coc.fecha_creado,coc.fecha_modificado),
            '%d/%m/%Y %h:%i %p'),' por ',if(isnull(coc.modificado_por)=1,coc.creado_por,coc.modificado_por)),coc.activo 
            ";

        return $this->obtener_resultados();
    }
    public function registrarPedido($pedido)
    {
        $this->query = "
            insert into tbl_pedcab(numero,fecha_registro,fecha_vigente,moneda,glosa,tbl_cliente_id,tbl_estado_pedido_id,
            creado_por,fecha_creado,activo) values('".$pedido['numero']."','".$pedido['fecha_registro']."',
            '".$pedido['fecha_vigente']."',".$pedido['moneda'].",'".$pedido['glosa']."',".$pedido['tbl_cliente_id'].",
            1,'".$pedido['creado_por']."',now(),1)
            ";

        return $this->ejecutar_query_simple();
    }
    public function obtenerPedidoMayor(){
        $this->query = "
            select if(isnull(max(numero))=1,'0000001',lpad(max(numero)+1,7,'0')) as mayor from tbl_pedcab where activo=1
            ";
        return $this->obtener_resultados();
    }
    public function modificarPedido($pedido)
    {
        $this->query = "
            update tbl_pedcab set numero='".$pedido['numero']."',fecha_registro='".$pedido['fecha_registro']."',
            fecha_vigente='".$pedido['fecha_vigente']."',moneda=".$pedido['moneda'].",glosa='".$pedido['glosa']."',
            tbl_cliente_id=".$pedido['tbl_cliente_id'].",modificado_por='".$pedido['modificado_por']."',
            fecha_modificado=now() where activo=1 and id=".$pedido['id']."
            ";
        return $this->ejecutar_query_simple();
    }
    public function eliminarPedido($pedido)
    {
        $this->query = "
            update tbl_pedcab set activo=0,modificado_por='".$pedido['modificado_por']."',fecha_modificado=now() where id=".$pedido['id']." and activo=1;
            ";
        $this->ejecutar_query_simple();
        $this->query = "
            update tbl_peddet set activo=0,modificado_por='".$pedido['modificado_por']."',fecha_modificado=now() where tbl_pedcab_id=".$pedido['id']." and activo=1;
            ";
        $this->ejecutar_query_simple();
    }
    public function cambiarEstadoPedido($pedido)
    {
        $this->query = "
            update tbl_pedcab set tbl_estado_pedido_id=".$pedido['tbl_estado_pedido_id'].",
            modificado_por='".$pedido['modificado_por']."',fecha_modificado=now() where id=".$pedido['id']."
            ";
        return $this->ejecutar_query_simple();
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
    public function obtenerPedidosDetalle($pedido){
        $this->query = "
                select tp.id,tp.tbl_articulo_id,ta.descripcion as articulo,round(tp.cantidad,2) as cantidad,round(tp.bruto,2) as bruto,round(tp.igv,2) as igv,
                round(tp.descuento,2) as descuento,
                round(((tp.cantidad*tp.bruto)+tp.igv-tp.descuento),2) as total,tp.glosa from tbl_peddet tp inner join tbl_articulo ta on
                tp.tbl_articulo_id = ta.id where tp.activo=1 
                and tp.tbl_pedcab_id=".$pedido['tbl_pedcab_id']."
                ";

        return $this->obtener_resultados();
    }
    public function obtenerPedidoDetalle($pedido){
        $this->query = "
                select tp.id,tp.tbl_articulo_id,ta.descripcion as articulo,round(tp.cantidad,2) as cantidad,round(tp.bruto,2) as bruto,round(tp.igv,2) as igv,
                round(tp.descuento,2) as descuento,
                round(((tp.cantidad*tp.bruto)+tp.igv-tp.descuento),2) as total,tp.glosa from tbl_peddet tp inner join tbl_articulo ta on
                tp.tbl_articulo_id = ta.id where tp.activo=1 
                and tp.id=".$pedido['id']."
                ";

        return $this->obtener_resultados();
    }

    public function registrarPedidoDetalle($pedido)
    {
        $this->query = "
                insert into tbl_peddet(tbl_pedcab_id,tbl_articulo_id,glosa,cantidad,bruto,igv,descuento
                ,creado_por,fecha_creado,activo) values(".$pedido['tbl_pedcab_id'].",".$pedido['tbl_articulo_id'].",
                '".$pedido['glosa']."',".$pedido['cantidad'].",".$pedido['bruto'].",".$pedido['igv'].",".$pedido['descuento'].",'".
                $pedido['creado_por']."',now(),1)
            ";


        return $this->ejecutar_query_simple();
    }
    public function modificarPedidoDetalle($pedido)
    {
        $this->query = "
            update tbl_peddet set tbl_articulo_id=".$pedido['tbl_articulo_id'].",glosa='".$pedido['glosa']."',
            cantidad=".$pedido['cantidad'].",bruto=".$pedido['bruto'].",igv=".$pedido['igv'].",
            descuento=".$pedido['descuento'].",
            modificado_por='".$pedido['modificado_por']."',
            fecha_modificado=now() where activo=1 and id=".$pedido['id']."
            ";
        return $this->ejecutar_query_simple();
    }
    public function eliminarPedidoDetalle($pedido)
    {
        $this->query = "
            update tbl_peddet set activo=0,modificado_por='".$pedido['modificado_por']."',fecha_modificado=now() where id=".$pedido['id']." and activo=1;
            ";
        $this->ejecutar_query_simple();
    }
    public function obtenerArticulos(){
        $this->query = "
                select a.id,a.descripcion,a.codigo_alterno,f.descripcion as familia,
                concat(date_format(if(isnull(a.fecha_modificado)=1,a.fecha_creado,a.fecha_modificado),'%d/%m/%Y %h:%i %p'),' por ',
                if(isnull(a.modificado_por)=1,a.creado_por,a.modificado_por)) as ultima_modificacion from tbl_articulo a left 
                join tbl_familia f on a.tbl_familia_id=f.id
                where a.activo=1
                ";

        return $this->obtener_resultados();
    }
}

?>