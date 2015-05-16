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
    public function obtenerCotizaciones(){
        $this->query = "
                select 
                ";
        return $this->ejecutar_query_simple();
    }

  
}

?>