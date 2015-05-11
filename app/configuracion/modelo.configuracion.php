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
                ";
        return $this->obtener_resultados();
    }
    public function obtenerArticulo($articulo){
        $this->query = "
                select a.id,a.descripcion as articulo,a.codigo_alterno,f.descripcion as familia,
                concat(date_format(if(isnull(a.fecha_modificado)=1,a.fecha_creado,a.fecha_modificado),'%d/%m/%Y %h:%i %p'),' por ',
                if(isnull(a.modificado_por)=1,a.creado_por,a.modificado_por)) as ultima_modificacion from tbl_articulo a inner 
                join tbl_familia f on a.tbl_familia_id=f.id where a.id=".$articulo['id']."
                ";
        return $this->obtener_resultados();
    }
    public function registrarArticulo(){
        $this->query = "
                
                ";
        return $this->ejecutar_query_simple();
    }

  
}

?>