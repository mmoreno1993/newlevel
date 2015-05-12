<?php

class modeloConfiguracion extends MySQL {
    public function __construct(){
        //parent::__construct();   
    }
    public function obtenerArticulos(){
        $this->query = "
                select a.id,a.descripcion as articulo,a.codigo_alterno,f.descripcion as familia,
                concat(date_format(if(isnull(a.fecha_modificado)=1,a.fecha_creado,a.fecha_modificado),'%d/%m/%Y %h:%i %p'),' por ',
                if(isnull(a.modificado_por)=1,a.creado_por,a.modificado_por)) as ultima_modificacion from tbl_articulo a inner 
                join tbl_familia f on a.tbl_familia_id=f.id
                where activo=1
                ";
        return $this->obtener_resultados();
    }
    public function obtenerFamilias(){
        $this->query = "
                select id,descripcion,concat(date_format(if(isnull(a.fecha_modificado)=1,a.fecha_creado,a.fecha_modificado),'%d/%m/%Y %h:%i %p'),' por ',
                if(isnull(a.modificado_por)=1,a.creado_por,a.modificado_por)) as ultima_modificacion,activo from tbl_familia
                where activo=1
                ";
        return $this->obtener_resultados();
    }
    public function obtenerArticulo($articulo){
        $this->query = "
                select a.id,a.descripcion as articulo,a.codigo_alterno,f.descripcion as familia,
                concat(date_format(if(isnull(a.fecha_modificado)=1,a.fecha_creado,a.fecha_modificado),'%d/%m/%Y %h:%i %p'),' por ',
                if(isnull(a.modificado_por)=1,a.creado_por,a.modificado_por)) as ultima_modificacion from tbl_articulo a inner 
                join tbl_familia f on a.tbl_familia_id=f.id where a.id=".$articulo['id']." and activo=1
                ";
        return $this->obtener_resultados();
    }
    public function registrarArticulo($articulo){
        $this->query = "
                    insert into tbl_articulo(descripcion,codigo_alterno,tbl_familia_id,tbl_categoria_id,tbl_color_id,
                    tbl_marca_id,creado_por,fecha_creado,activo,foto) values('".$articulo['descripcion']."',
                    '".$articulo['codigo_alterno']."',".$articulo['tbl_familia_id'].",".$articulo['tbl_categoria_id'].",
                    ".$articulo['tbl_color_id'].",".$articulo['tbl_marca_id'].",'".$articulo['creado_por']."',now(),
                    1,'".$articulo['foto']."')
                ";
        return $this->ejecutar_query_simple();
    }

  
}

?>