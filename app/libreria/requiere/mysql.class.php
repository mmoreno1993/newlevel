<?php

class MySQL {

    private static $servidor="localhost";
    private static $usuario_servidor="root";
    private static $contrasena_servidor="";
    protected $bd="mydb";
    protected $query="";
    protected $filas = array();
    protected $cn;
    var $count = FALSE;
    var $resultados_por_pagina = 0;
    var $pagina_actual = 1;

    public function abrir_conexion(){
        $this->cn = new mysqli(self::$servidor,self::$usuario_servidor,self::$contrasena_servidor,$this->bd);
        $this->cn->set_charset("utf8");
    }
    
    public function cerrar_conexion(){
        $this->cn->close();
    }
    
    public function ejecutar_query_simple(){
        $this->abrir_conexion();
        $this->cn->query($this->query);
        $filas_afectadas = $this->cn->affected_rows;
        $this->cerrar_conexion();
        return $filas_afectadas;
    }
    
    public function obtener_resultados(){
        $this->abrir_conexion();
        $result = $this->cn->query($this->query);
        while ($this->filas[]=$result->fetch_assoc());
        $result->close();
        $this->cerrar_conexion();
        array_pop($this->filas);
        return $this->filas;
    }

    public function getPaginacion($accion, $params, $cantidad) {
        require RUTA_REQUIERE . 'Zebra_Pagination.php';
        $paginador = array();
        $this->count = TRUE;
        $total = $this->$accion($params);
        $paginacion = new Zebra_Pagination();
        if (is_null($cantidad)) {
            $cantidad = $total;
        }
        $this->resultados_por_pagina = $cantidad;
        $this->pagina_actual = $paginacion->get_page();
        $paginacion->records($total);
        $paginacion->records_per_page($cantidad);
        $paginador['num'] = $this->getNum();
        $paginador['botones'] = $paginacion->render(TRUE);
        $paginador['lista'] = $this->$accion($params);
        $total_paginas = ceil($total / $cantidad);
        $paginas = '';
        if ($total_paginas > 0) {
            $paginas = " - página " . $this->pagina_actual . " de " . $total_paginas;
        }
        $paginador['descripcion'] = '<div class="paginacion_desc">' . $total . " registros encontrados " . $paginas . '</div>';
        $this->resultados_por_pagina = 0;
        return $paginador;
    }

    public function getPaginacion2($accion, $params, $cantidad) {
        //require RUTA_REQUIERE . 'Zebra_Pagination.php';
        $paginador = array();
        $this->count = TRUE;
        $total = $this->$accion($params);
        $paginacion = new Zebra_Pagination();
        if (is_null($cantidad)) {
            $cantidad = $total;
        }
        $this->resultados_por_pagina = $cantidad;
        $this->pagina_actual = $paginacion->get_page();
        $paginacion->records($total);
        $paginacion->records_per_page($cantidad);
        $paginador['num'] = $this->getNum();
        $paginador['botones'] = $paginacion->render2(TRUE);
        $paginador['lista'] = $this->$accion($params);
        $total_paginas = ceil($total / $cantidad);
        $paginas = '';
        if ($total_paginas > 0) {
            $paginas = " - página " . $this->pagina_actual . " de " . $total_paginas;
        }
        $paginador['descripcion'] = '<div class="paginacion_desc">' . $total . " registros encontrados " . $paginas . '</div>';
        $this->resultados_por_pagina = 0;
        return $paginador;
    }

    public function getNum() {
        if ($this->pagina_actual == 0) {
            $num = 0;
        } else {
            $num = (($this->pagina_actual - 1 ) * $this->resultados_por_pagina);
        }
        return $num;
    }
    public function __destruct(){
        unset($this);
    }

}
?>



