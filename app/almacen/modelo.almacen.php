<?php

class modeloAlmacen extends MySQL {
    public function __construct(){
        //parent::__construct();   
    }
    public function getPrueba(){
        $this->query = "
                select * from tbl_almacen
                ";
        return $this->obtener_resultados();
    }
    public function actualizarAlmacen(){
        $this->query = "
                update tbl_almacen set nombre='Pruefsdafdsaba' where id=0
                ";
        return $this->ejecutar_query_simple();
    }

  
}

?>