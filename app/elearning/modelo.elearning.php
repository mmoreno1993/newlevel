<?php

//OFFSET [valor_inicial] ROWS
//FETCH NEXT [valor_final] ROWS ONLY
//ESTO SOLO FUNCIONA EN SQLSERVER 2012
class modeloElearning extends MySQL {

    public function getCursos() {
        $sql = "select id,descripcion as curso
                from tbl_curso where estado=1";
        return $this->executeQuery($sql);
    }

    public function getEmpresasAnio($ruc, $num_emp, $cod_empresa) {
        $sql = "SELECT 
                    ANO 
                FROM 
                    (SELECT 
                        YEAR(FECHA_DOC) AS ANO 
                    FROM 
                        [" . $ruc . "_VENTAS_RESUMEN_" . $num_emp . "] 
                    WHERE 
                        COD_EMPRESA='$cod_empresa' GROUP BY YEAR(FECHA_DOC) 
                    UNION 
                    SELECT 
                        YEAR(FECHA_DOC) AS ANO 
                    FROM 
                        [" . $ruc . "_COMPRAS_RESUMEN_" . $num_emp . "] 
                    WHERE 
                        COD_EMPRESA='$cod_empresa' GROUP BY YEAR(FECHA_DOC) 
                    UNION 
                    SELECT 
                        YEAR(FECHA_DOC) AS ANO 
                    FROM 
                        [" . $ruc . "_COBRANZA_MOVIMIENTOS_" . $num_emp . "] 
                    WHERE 
                        COD_EMPRESA='$cod_empresa' GROUP BY YEAR(FECHA_DOC) 
                    UNION 
                    SELECT 
                        YEAR(FECHA_DOC) AS ANO 
                    FROM 
                        [" . $ruc . "_PAGOS_MOVIMIENTOS_" . $num_emp . "] 
                    WHERE 
                        COD_EMPRESA='$cod_empresa' GROUP BY YEAR(FECHA_DOC)
                    ) AS A GROUP BY ANO";
        return $this->executeQuery($sql);
    }

    public function getEmpresasAnioMes($ruc, $num_emp, $cod_empresa, $anno) {
        $sql = "SELECT MES
                FROM 
                    (SELECT 
                        MONTH(FECHA_DOC) AS MES 
                    FROM 
                        [" . $ruc . "_VENTAS_RESUMEN_" . $num_emp . "] 
                    WHERE 
                        YEAR(FECHA_DOC) = " . $anno . " 
                        AND COD_EMPRESA='" . $cod_empresa . "' 
                        GROUP BY MONTH(FECHA_DOC) 
                    UNION 
                    SELECT 
                        MONTH(FECHA_DOC) AS MES 
                    FROM 
                        [" . $ruc . "_COMPRAS_RESUMEN_" . $num_emp . "] 
                    WHERE 
                        YEAR(FECHA_DOC) = " . $anno . " 
                        AND COD_EMPRESA='" . $cod_empresa . "' 
                        GROUP BY MONTH(FECHA_DOC) 
                    UNION 
                    SELECT 
                        MONTH(FECHA_DOC)AS MES 
                    FROM 
                        [" . $ruc . "_COBRANZA_MOVIMIENTOS_" . $num_emp . "] 
                    WHERE 
                        YEAR(FECHA_DOC) = " . $anno . " 
                        AND COD_EMPRESA='" . $cod_empresa . "' 
                        GROUP BY MONTH(FECHA_DOC) 
                    UNION 
                    SELECT 
                        MONTH(FECHA_DOC) AS MES 
                    FROM 
                        [" . $ruc . "_PAGOS_MOVIMIENTOS_" . $num_emp . "] 
                    WHERE 
                        YEAR(FECHA_DOC) = " . $anno . " 
                        AND COD_EMPRESA='" . $cod_empresa . "' 
                        GROUP BY MONTH(FECHA_DOC)) AS A GROUP BY MES 
                    UNION 
                    SELECT 
                        MONTH(FECHA_DOC) AS MES 
                    FROM 
                        [" . $ruc . "_PLANILLAS_TRABAJADOR_" . $num_emp . "] 
                    WHERE 
                        YEAR(FECHA_DOC) = " . $anno . " 
                        AND COD_EMPRESA='" . $cod_empresa . "' 
                        GROUP BY MONTH(FECHA_DOC)";
        return $this->executeQuery($sql);
    }

    public function getEmpresasAnioMesDia($ruc, $num_emp, $cod_empresa, $anno, $mes) {
        $sql = "SELECT DIA 
                FROM (
                    SELECT 
                        DAY(FECHA_DOC) AS DIA 
                    FROM 
                        [" . $ruc . "_VENTAS_RESUMEN_" . $num_emp . "] 
                    WHERE 
                        YEAR(FECHA_DOC) = " . $anno . " 
                        AND MONTH(FECHA_DOC) = " . $mes . " 
                        AND COD_EMPRESA='" . $cod_empresa . "' 
                        GROUP BY DAY(FECHA_DOC) 
                    UNION 
                    SELECT 
                        DAY(FECHA_DOC) AS DIA 
                    FROM 
                        [" . $ruc . "_COMPRAS_RESUMEN_" . $num_emp . "] 
                    WHERE 
                        YEAR(FECHA_DOC) = " . $anno . " 
                        AND MONTH(FECHA_DOC) = " . $mes . " 
                        AND COD_EMPRESA='" . $cod_empresa . "' GROUP BY DAY(FECHA_DOC) 
                    UNION 
                    SELECT 
                        DAY(FECHA_DOC) AS DIA 
                    FROM 
                        [" . $ruc . "_COBRANZA_MOVIMIENTOS_" . $num_emp . "] 
                    WHERE 
                        YEAR(FECHA_DOC) = " . $anno . " 
                        AND MONTH(FECHA_DOC) = " . $mes . " 
                        AND COD_EMPRESA='" . $cod_empresa . "' GROUP BY DAY(FECHA_DOC) 
                    UNION 
                    SELECT 
                        DAY(FECHA_DOC) AS DIA 
                    FROM 
                        [" . $ruc . "_PAGOS_MOVIMIENTOS_" . $num_emp . "] 
                    WHERE 
                        YEAR(FECHA_DOC) = " . $anno . " 
                        AND MONTH(FECHA_DOC) = " . $mes . " 
                        AND COD_EMPRESA='" . $cod_empresa . "' GROUP BY DAY(FECHA_DOC)
                    UNION 
                    SELECT 
                        DAY(FECHA_DOC) AS DIA 
                    FROM 
                        [" . $ruc . "_PLANILLAS_TRABAJADOR_" . $num_emp . "] 
                    WHERE 
                        YEAR(FECHA_DOC) = " . $anno . " 
                        AND MONTH(FECHA_DOC) = " . $mes . " 
                        AND COD_EMPRESA='" . $cod_empresa . "' 
                        GROUP BY DAY(FECHA_DOC)
                    ) AS A GROUP BY DIA ";
        return $this->executeQuery($sql);
    }

    public function getVentasAnio($ruc, $num_emp, $cod_empresa, $moneda) {
        $sql = "SELECT 
                    YEAR(FECHA_DOC) as ANO,
                    CONVERT(numeric(15,2),SUM(TOTAL_VENTA_" . $moneda . ")) AS TOTAL_VENTA 
                FROM 
                    [" . $ruc . "_VENTAS_RESUMEN_" . $num_emp . "] 
                WHERE 
                    COD_EMPRESA='" . $cod_empresa . "' 
                    GROUP BY YEAR(FECHA_DOC) ORDER BY 1";
        return $this->executeQuery($sql);
    }

    public function getComprasAnio($ruc, $num_emp, $cod_empresa, $moneda) {
        $sql = "SELECT 
                    YEAR(FECHA_DOC) as ANO,
                    CONVERT(numeric(15,2),SUM(TOTAL_VENTA_" . $moneda . ")) AS TOTAL_VENTA 
                FROM 
                    [" . $ruc . "_COMPRAS_RESUMEN_" . $num_emp . "] 
                WHERE 
                    COD_EMPRESA='" . $cod_empresa . "' 
                    GROUP BY YEAR(FECHA_DOC) ORDER BY 1";
        return $this->executeQuery($sql);
    }

    public function getIngresosAnio($ruc, $num_emp, $cod_empresa, $moneda) {
        $sql = "SELECT 
                    YEAR(FECHA_DOC) as ANO,
                    CONVERT(numeric(15,2),SUM(IMPORTE_" . $moneda . ")) AS TOTAL_VENTA 
                FROM 
                    [" . $ruc . "_COBRANZA_MOVIMIENTOS_" . $num_emp . "] 
                WHERE 
                    COD_EMPRESA='" . $cod_empresa . "' 
                    GROUP BY YEAR(FECHA_DOC) ORDER BY 1";
        return $this->executeQuery($sql);
    }

    public function getEgresosAnio($ruc, $num_emp, $cod_empresa, $moneda) {
        $sql = "SELECT 
                    YEAR(FECHA_DOC) as ANO,
                    CONVERT(numeric(15,2),SUM(IMPORTE_" . $moneda . ")) AS TOTAL_VENTA 
                FROM 
                    [" . $ruc . "_PAGOS_MOVIMIENTOS_" . $num_emp . "] 
                WHERE 
                    COD_EMPRESA='" . $cod_empresa . "' 
                    GROUP BY YEAR(FECHA_DOC) ORDER BY 1";
        return $this->executeQuery($sql);
    }

    public function getVentasMeses($ruc, $num_emp, $cod_empresa, $anio, $moneda) {
        $sql = "SELECT 
                    MONTH(FECHA_DOC) AS MES,
                    CONVERT(numeric(15,2),SUM(TOTAL_VENTA_" . $moneda . ")) AS TOTAL_VENTA 
                FROM 
                    [" . $ruc . "_VENTAS_RESUMEN_" . $num_emp . "] 
                WHERE 
                    YEAR(FECHA_DOC) = " . $anio . " 
                    AND COD_EMPRESA='" . $cod_empresa . "' 
                    GROUP BY MONTH(FECHA_DOC) ORDER BY 1";
        return $this->executeQuery($sql);
    }

    public function getComprasMeses($ruc, $num_emp, $cod_empresa, $anio, $moneda) {
        $sql = "SELECT 
                    MONTH(FECHA_DOC) AS MES,
                    CONVERT(numeric(15,2),SUM(TOTAL_VENTA_" . $moneda . ")) AS TOTAL_VENTA 
                FROM 
                    [" . $ruc . "_COMPRAS_RESUMEN_" . $num_emp . "] 
                WHERE 
                    YEAR(FECHA_DOC) = " . $anio . " 
                    AND COD_EMPRESA='" . $cod_empresa . "' 
                    GROUP BY MONTH(FECHA_DOC) ORDER BY 1";
        return $this->executeQuery($sql);
    }

    public function getIngresosMeses($ruc, $num_emp, $cod_empresa, $anio, $moneda) {
        $sql = "SELECT 
                    MONTH(FECHA_DOC) AS MES,
                    CONVERT(numeric(15,2),SUM(IMPORTE_" . $moneda . ")) AS TOTAL_VENTA 
                FROM 
                    [" . $ruc . "_COBRANZA_MOVIMIENTOS_" . $num_emp . "] 
                WHERE 
                    YEAR(FECHA_DOC) = " . $anio . " 
                    AND COD_EMPRESA='" . $cod_empresa . "' 
                    GROUP BY MONTH(FECHA_DOC) ORDER BY 1";
        return $this->executeQuery($sql);
    }

    public function getEgresosMeses($ruc, $num_emp, $cod_empresa, $anio, $moneda) {
        $sql = "SELECT 
                    MONTH(FECHA_DOC) AS MES,
                    CONVERT(numeric(15,2),SUM(IMPORTE_" . $moneda . ")) AS TOTAL_VENTA 
                FROM 
                    [" . $ruc . "_PAGOS_MOVIMIENTOS_" . $num_emp . "] 
                WHERE 
                    YEAR(FECHA_DOC) = " . $anio . " 
                    AND COD_EMPRESA='" . $cod_empresa . "' 
                    GROUP BY MONTH(FECHA_DOC) ORDER BY 1";
        return $this->executeQuery($sql);
    }

    public function getInventarioAnio($ruc, $num_emp, $cod_empresa, $anio, $moneda) {
        $sql = "SELECT 
                    ISNULL(CONVERT(numeric(15,2),CANTIDAD),0) AS CANTIDAD,
                    ISNULL(CONVERT(numeric(15,2),VALOR_" . $moneda . "),0) AS TOTAL_ANNO 
                FROM 
                    [" . $ruc . "_INVENTARIO_TOTAL_" . $num_emp . "] 
                WHERE 
                    COD_EMPRESA='" . $cod_empresa . "'";
        return $this->executeQuery($sql);
    }

    public function getPersonalAnio($ruc, $num_emp, $cod_empresa, $anio, $moneda) {
        $sql = "SELECT 
                    ISNULL(COUNT(CODTRAB),0) AS CANTIDAD,
                    ISNULL(CONVERT(numeric(15,2),SUM(TOTAL_ANNO)),0) AS TOTAL_ANNO 
                FROM 
                    (SELECT 
                        CODTRAB,SUM(MONTO" . $moneda . ") AS TOTAL_ANNO 
                    FROM 
                        [" . $ruc . "_PLANILLAS_TRABAJADOR_" . $num_emp . "] 
                    WHERE 
                        TIPO IN(1,3) 
                        AND COD_EMPRESA='" . $cod_empresa . "' 
                        GROUP BY CODTRAB) AS A";
        return $this->executeQuery($sql);
    }

    public function getVentasAnioMesDia($cod_empresa, $ruc, $num_emp, $anio, $mes, $dia, $moneda) {
        $sql = "SELECT 
                    A.ANNO,ISNULL(CONVERT(numeric(15,2),A.TOTAL_ANNO),0) as TOTAL_ANNO,
                    B.MES,ISNULL(CONVERT(numeric(15,2),B.TOTAL_MES),0) as TOTAL_MES,
                    C.DIAS,ISNULL(CONVERT(numeric(15,2),C.TOTAL_DIA),0) as TOTAL_DIA 
                FROM 
                    (SELECT 
                        SUM(TOTAL_VENTA_" . $moneda . ") AS TOTAL_ANNO, 
                        " . $anio . " AS ANNO,
                        '" . $cod_empresa . "' AS COD_EMPRESA 
                    FROM 
                        [" . $ruc . "_VENTAS_RESUMEN_" . $num_emp . "] 
                    WHERE 
                        YEAR(FECHA_DOC)=" . $anio . " 
                        AND COD_EMPRESA='" . $cod_empresa . "') AS A 
                        LEFT JOIN (SELECT 
                                        '" . $mes . "' AS MES,
                                        SUM(TOTAL_VENTA_" . $moneda . ") AS TOTAL_MES,
                                        '" . $cod_empresa . "' AS COD_EMPRESA 
                                    FROM 
                                        [" . $ruc . "_VENTAS_RESUMEN_" . $num_emp . "] 
                                    WHERE 
                                        MONTH(FECHA_DOC)=" . $mes . " 
                                        AND YEAR(FECHA_DOC)=" . $anio . " 
                                        AND COD_EMPRESA='" . $cod_empresa . "') AS B ON A.COD_EMPRESA=B.COD_EMPRESA 
                        LEFT JOIN (SELECT 
                                        " . $dia . " AS DIAS,
                                        SUM(TOTAL_VENTA_" . $moneda . ") AS TOTAL_DIA,
                                        '" . $cod_empresa . "' AS COD_EMPRESA 
                                    FROM 
                                        [" . $ruc . "_VENTAS_RESUMEN_" . $num_emp . "]
                                    WHERE 
                                        DAY(FECHA_DOC)=" . $dia . " 
                                        AND MONTH(FECHA_DOC)=" . $mes . " 
                                        AND YEAR(FECHA_DOC)=" . $anio . " 
                                        AND COD_EMPRESA='" . $cod_empresa . "') AS C ON A.COD_EMPRESA=C.COD_EMPRESA 
                        ORDER BY A.ANNO,B.MES,C.DIAS";
        return $this->executeQuery($sql);
    }

    public function getComprasAnioMesDia($cod_empresa, $ruc, $num_emp, $anio, $mes, $dia, $moneda) {
        $sql = "SELECT 
                    A.ANNO,
                    ISNULL(CONVERT(numeric(15,2),A.TOTAL_ANNO),0) as TOTAL_ANNO,
                    B.MES,
                    ISNULL(CONVERT(numeric(15,2),B.TOTAL_MES),0) as TOTAL_MES,
                    C.DIAS,ISNULL(CONVERT(numeric(15,2),C.TOTAL_DIA),0) as TOTAL_DIA 
                FROM 
                    (SELECT SUM(TOTAL_VENTA_" . $moneda . ") AS TOTAL_ANNO,
                        " . $anio . " AS ANNO,
                        '" . $cod_empresa . "' AS COD_EMPRESA 
                    FROM 
                        [" . $ruc . "_COMPRAS_RESUMEN_" . $num_emp . "] 
                    WHERE 
                        YEAR(FECHA_DOC)=" . $anio . " 
                        AND COD_EMPRESA='" . $cod_empresa . "') AS A 
                        LEFT JOIN (SELECT 
                                        " . $mes . " AS MES,
                                        SUM(TOTAL_VENTA_" . $moneda . ") AS TOTAL_MES,
                                        '" . $cod_empresa . "' AS COD_EMPRESA 
                                    FROM 
                                        [" . $ruc . "_COMPRAS_RESUMEN_" . $num_emp . "] 
                                    WHERE 
                                        MONTH(FECHA_DOC)=" . $mes . " 
                                        AND YEAR(FECHA_DOC)=" . $anio . " 
                                        AND COD_EMPRESA='" . $cod_empresa . "') AS B ON A.COD_EMPRESA=B.COD_EMPRESA 
                                        LEFT JOIN (SELECT 
                                                        " . $dia . " AS DIAS,
                                                        SUM(TOTAL_VENTA_" . $moneda . ") AS TOTAL_DIA,
                                                        '" . $cod_empresa . "' AS COD_EMPRESA 
                                                    FROM 
                                                        [" . $ruc . "_COMPRAS_RESUMEN_" . $num_emp . "] 
                                                    WHERE 
                                                        DAY(FECHA_DOC)=" . $dia . " 
                                                        AND MONTH(FECHA_DOC)=" . $mes . " 
                                                        AND YEAR(FECHA_DOC)=" . $anio . " 
                                                        AND COD_EMPRESA='" . $cod_empresa . "') AS C ON A.COD_EMPRESA=C.COD_EMPRESA 
                        ORDER BY A.ANNO,B.MES,C.DIAS";
        return $this->executeQuery($sql);
    }

    public function getIngresosAnioMesDia($cod_empresa, $ruc, $num_emp, $anio, $mes, $dia, $moneda) {
        $sql = "SELECT 
                    A.ANNO,
                    ISNULL(CONVERT(numeric(15,2),A.TOTAL_ANNO),0) as TOTAL_ANNO,
                    B.MES,
                    ISNULL(CONVERT(numeric(15,2),B.TOTAL_MES),0) as TOTAL_MES,
                    C.DIAS,
                    ISNULL(CONVERT(numeric(15,2),C.TOTAL_DIA),0) as TOTAL_DIA 
                FROM 
                    (SELECT 
                        SUM(IMPORTE_" . $moneda . ") AS TOTAL_ANNO,
                        " . $anio . " AS ANNO,'" . $cod_empresa . "' 
                    AS COD_EMPRESA FROM [" . $ruc . "_COBRANZA_MOVIMIENTOS_" . $num_emp . "] WHERE YEAR(FECHA_DOC)=" . $anio . " AND COD_EMPRESA='" . $cod_empresa . "') AS A 
                    LEFT JOIN (SELECT " . $mes . " AS MES,SUM(IMPORTE_" . $moneda . ") AS TOTAL_MES,'" . $cod_empresa . "' AS COD_EMPRESA FROM [" . $ruc . "_COBRANZA_MOVIMIENTOS_" . $num_emp . "] 
                    WHERE MONTH(FECHA_DOC)=" . $mes . " AND YEAR(FECHA_DOC)=" . $anio . " AND COD_EMPRESA='" . $cod_empresa . "') AS B ON A.COD_EMPRESA=B.COD_EMPRESA 
                    LEFT JOIN (SELECT " . $dia . " AS DIAS,SUM(IMPORTE_" . $moneda . ") AS TOTAL_DIA,'" . $cod_empresa . "' AS COD_EMPRESA FROM [" . $ruc . "_COBRANZA_MOVIMIENTOS_" . $num_emp . "] 
                    WHERE DAY(FECHA_DOC)=" . $dia . " AND MONTH(FECHA_DOC)=" . $mes . " AND YEAR(FECHA_DOC)=" . $anio . " AND COD_EMPRESA='" . $cod_empresa . "') AS C ON A.COD_EMPRESA=C.COD_EMPRESA 
                    ORDER BY A.ANNO,B.MES,C.DIAS";
        return $this->executeQuery($sql);
    }

    public function getEgresosAnioMesDia($cod_empresa, $ruc, $num_emp, $anio, $mes, $dia, $moneda) {
        $sql = "SELECT 
                    A.ANNO,
                    ISNULL(CONVERT(numeric(15,2),A.TOTAL_ANNO),0) as TOTAL_ANNO,
                    B.MES,
                    ISNULL(CONVERT(numeric(15,2),B.TOTAL_MES),0) as TOTAL_MES,
                    C.DIAS,
                    ISNULL(CONVERT(numeric(15,2),C.TOTAL_DIA),0) as TOTAL_DIA 
                FROM (SELECT SUM(IMPORTE_" . $moneda . ") AS TOTAL_ANNO," . $anio . " AS ANNO,'" . $cod_empresa . "' 
                    AS COD_EMPRESA FROM [" . $ruc . "_PAGOS_MOVIMIENTOS_" . $num_emp . "] WHERE YEAR(FECHA_DOC)=" . $anio . " AND COD_EMPRESA='" . $cod_empresa . "') AS A 
                    LEFT JOIN (SELECT " . $mes . " AS MES,SUM(IMPORTE_" . $moneda . ") AS TOTAL_MES,'" . $cod_empresa . "' AS COD_EMPRESA FROM [" . $ruc . "_PAGOS_MOVIMIENTOS_" . $num_emp . "] 
                    WHERE MONTH(FECHA_DOC)=" . $mes . " AND YEAR(FECHA_DOC)=" . $anio . " AND COD_EMPRESA='" . $cod_empresa . "') AS B ON A.COD_EMPRESA=B.COD_EMPRESA 
                    LEFT JOIN (SELECT " . $dia . " AS DIAS,SUM(IMPORTE_" . $moneda . ") AS TOTAL_DIA,'" . $cod_empresa . "' AS COD_EMPRESA FROM [" . $ruc . "_PAGOS_MOVIMIENTOS_" . $num_emp . "] 
                    WHERE DAY(FECHA_DOC)=" . $dia . " AND MONTH(FECHA_DOC)=" . $mes . " AND YEAR(FECHA_DOC)=" . $anio . " AND COD_EMPRESA='" . $cod_empresa . "') AS C ON A.COD_EMPRESA=C.COD_EMPRESA 
                    ORDER BY A.ANNO,B.MES,C.DIAS";
        return $this->executeQuery($sql);
    }

    public function getObtenerCobrar($cod_empresa, $ruc, $num_emp, $moneda) {
        $sql = "SELECT CONVERT(numeric(15,2),TOTAL_POR_COBRAR_" . $moneda . ") AS TOTAL_POR_COBRAR, CONVERT(numeric(15,2),VENCIDO_FECHA_" . $moneda . ") AS VENCIDO_FECHA,
                CONVERT(numeric(15,2),VENCIDO_30_" . $moneda . ") AS VENCIDO_30, CONVERT(numeric(15,2),VENCIDO_60_" . $moneda . ") AS VENCIDO_60, 
                CONVERT(numeric(15,2),VENCIDO_90_" . $moneda . ") AS VENCIDO_90, CONVERT(numeric(15,2),VENCIDO_MAS_" . $moneda . ") AS VENCIDO_MAS 
                FROM [" . $ruc . "_PROYECCION_COBRANZA_TOTAL_" . $num_emp . "] WHERE COD_EMPRESA='" . $cod_empresa . "'";
        return $this->executeQuery($sql);
    }

    public function getObtenerPagar($cod_empresa, $ruc, $num_emp, $moneda) {
        $sql = "SELECT CONVERT(numeric(15,2),IMPORTE_TOTAL_" . $moneda . ") AS TOTAL_POR_COBRAR, CONVERT(numeric(15,2),IMPORTE_VENCIDO_" . $moneda . ") AS VENCIDO_FECHA, 
                CONVERT(numeric(15,2),IMPORTE_VENCE30_" . $moneda . ") AS VENCIDO_30, CONVERT(numeric(15,2),IMPORTE_VENCE60_" . $moneda . ") AS VENCIDO_60, 
                CONVERT(numeric(15,2),IMPORTE_VENCE90_" . $moneda . ") AS VENCIDO_90, CONVERT(numeric(15,2),IMPORTE_VENCEMAS_" . $moneda . ") AS VENCIDO_MAS 
                FROM [" . $ruc . "_PROYECCION_PAGOS_TOTAL_" . $num_emp . "] WHERE COD_EMPRESA='" . $cod_empresa . "'";
        return $this->executeQuery($sql);
    }

    public function getInventariosArticulos($params) {
        if (isset($params['referencia']) and $params['referencia'] != null and $params['referencia'] != "") {
            $hacer = true;
            $referencia = trim(strtolower($params['referencia']));
            $pos = strpos($params['referencia'], "''");
            if ($pos !== false) {
                $hacer = false;
            }
            if ($hacer) {
                $ref = explode(" ", $referencia);
                $str = " AND (";
                $or = "";
                foreach ($ref as $r) {
                    $str .= $or . " COD_ARTICULO LIKE '%" . $r . "%'";
                    $or = " OR ";
                }
                foreach ($ref as $r) {
                    $str .= $or . " ARTICULO LIKE '%" . $r . "%'";
                    $or = " OR ";
                }
                $str .=")";
                $where_referencia = $str;
            } else {
                $referencia = str_replace(",", "", str_replace(" ", "%", str_replace('"', "", str_replace("'", "", $referencia))));
                $where_referencia = " AND (COD_ARTICULO LIKE '%" . $referencia . "%' OR ARTICULO LIKE '%" . $referencia . "%')";
            }
        } else {
            $where_referencia = "";
        }
        if (isset($params['umedida']) and $params['umedida'] != '0') {
            $sql_umedida = " AND UNIDAD_MEDIDA='" . $params['umedida'] . "' ";
        } else {
            $sql_umedida = "";
        }
        $sql = "SELECT ROW_NUMBER() Over(Order by COD_ARTICULO Asc) As RowNum,  
                    COD_ARTICULO,
                    ARTICULO,
                    UNIDAD_MEDIDA,
                    CONVERT(NUMERIC(15,2),CANTIDAD) AS CANTIDAD,
                    CONVERT(NUMERIC(15,2),VALOR_" . $params['moneda'] . ") AS VALOR	
                FROM 
                    [" . $params['ruc'] . "_INVENTARIO_ARTICULO_" . $params['numEmp'] . "] 
                WHERE 
                    1=1 " . $where_referencia . $sql_umedida . "  ";
        //echo $sql;
        return $this->executeQuery($sql);
    }

//    public function inventarioArticuloCantidad($param) {
//        $sql = "SELECT CONVERT(NUMERIC(15,2),SUM(CANTIDAD)) as CANTIDAD FROM [" . $ruc . "_INVENTARIO_ARTICULO_" . $num_emp . "] WHERE COD_EMPRESA='" . $cod_empresa . "'";
//        return $this->executeQuery($sql);
//        
//    }
    
    public function getUnidadMedidaInventarios($params) {
        $sql = " SELECT 
                    UNIDAD_MEDIDA AS uniMedida
                FROM 
                    [" . $params['ruc'] . "_INVENTARIO_ARTICULO_" . $params['numEmp'] . "] 
                GROUP BY UNIDAD_MEDIDA ORDER BY UNIDAD_MEDIDA ";
        return $this->executeQuery($sql);
    }

    public function getDetalleArticuloAlmacen($params) {
        $sql = " SELECT 
                    COD_ARTICULO AS codigoArticulo,
                    ARTICULO AS articulo
                FROM 
                    [" . $params['ruc'] . "_INVENTARIO_ARTICULO_" . $params['numEmp'] . "]
                where
                        COD_ARTICULO = '" . $params['codigoart'] . "'";
        return $this->executeQuery($sql);
    }

    public function getInventarioAlmacen($params) {
        $sql = "SELECT 
                    COD_ALMACEN as CODIGO,
                    ALMACEN as DESCRIPCION,
                    CONVERT(NUMERIC(15,2),CANTIDAD) as CANTIDAD 
                FROM 
                    [" . $params['ruc'] . "_INVENTARIO_ALMACEN_" . $params['numEmp'] . "] 
                WHERE 
                    COD_ARTICULO='" . $params['codigoart'] . "'";
        //echo $sql;
        return $this->executeQuery($sql);
    }

    public function getDatosPersonal($params) {
        if (isset($params['tipogasto']) and $params['tipogasto'] == 1) {
            $filtro = 'TRAB';
            $tipogasto = "PERSONAL";
        } else {
            $filtro = 'CCOSTO';
            $tipogasto = "CENTRO_COSTO";
        }

        $sql = "SELECT ROW_NUMBER() Over(Order by A.TOTAL_ANO DESC) As RowNum, V.COD" . $filtro . ",V." . (($params['tipogasto'] == 1) ? 'NOMBRES' : 'CENTRO_COSTO') . ", D.DIA,
						ISNULL(D.TOTAL_DIA,0) AS TOTAL_DIA,M.MES,CONVERT(NUMERIC(15,2),ISNULL(M.TOTAL_MES,0))AS TOTAL_MES,
						A.ANO,CONVERT(NUMERIC(15,2),ISNULL(A.TOTAL_ANO,0)) AS TOTAL_ANO 
						FROM [" . $params['ruc'] . "_PLANILLAS_" . $tipogasto . "_" . $params['numEmp'] . "] AS V /* ANO */ LEFT JOIN (SELECT COD" . $filtro . ",YEAR(FECHA_DOC)AS ANO,
						CONVERT(NUMERIC(15,2),SUM(MONTO" . $params['moneda'] . "))AS TOTAL_ANO FROM [" . $params['ruc'] . "_PLANILLAS_" . $tipogasto . "_" . $params['numEmp'] . "] WHERE YEAR(FECHA_DOC) = '" . $params['anio'] . "' 
						/*AND TIPO IN (1,3)*/ AND COD_EMPRESA='" . $params['codEmp'] . "' GROUP BY COD" . $filtro . ",YEAR(FECHA_DOC))AS A ON A.COD" . $filtro . " = V.COD" . $filtro . " 
						/* MES */ LEFT JOIN (SELECT COD" . $filtro . ",MONTH(FECHA_DOC)AS MES,CONVERT(NUMERIC(15,2),SUM(MONTO" . $params['moneda'] . "))AS 
						TOTAL_MES FROM [" . $params['ruc'] . "_PLANILLAS_" . $tipogasto . "_" . $params['numEmp'] . "] 
						WHERE YEAR(FECHA_DOC) = '" . $params['anio'] . "' AND MONTH(FECHA_DOC) = '" . $params['mes'] . "' /*AND TIPO IN (1,3)*/ AND COD_EMPRESA='" . $params['codEmp'] . "' 
						GROUP BY COD" . $filtro . ",YEAR(FECHA_DOC),MONTH(FECHA_DOC))AS M ON M.COD" . $filtro . " = V.COD" . $filtro . " /* DIA */ LEFT JOIN 
						(SELECT COD" . $filtro . ",DAY(FECHA_DOC)AS DIA,CONVERT(NUMERIC(15,2),SUM(MONTO" . $params['moneda'] . "))AS TOTAL_DIA FROM [" . $params['ruc'] . "_PLANILLAS_" . $tipogasto . "_" . $params['numEmp'] . "] 
						WHERE YEAR(FECHA_DOC) = '" . $params['anio'] . "' AND MONTH(FECHA_DOC) = '" . $params['mes'] . "' AND DAY(FECHA_DOC) = '" . $params['dias'] . "' /*AND 
						TIPO IN (1,3)*/ AND COD_EMPRESA='" . $params['codEmp'] . "' GROUP BY COD" . $filtro . ",YEAR(FECHA_DOC),MONTH(FECHA_DOC),DAY(FECHA_DOC))AS D ON 
						D.COD" . $filtro . " = V.COD" . $filtro . " WHERE YEAR(V.FECHA_DOC) = '" . $params['anio'] . "' AND COD_EMPRESA='" . $params['codEmp'] . "' GROUP BY 
						V.COD" . $filtro . ",V." . (($params['tipogasto'] == 1) ? 'NOMBRES' : 'CENTRO_COSTO') . ",A.ANO,A.TOTAL_ANO,M.TOTAL_MES,M.MES ,D.DIA,D.TOTAL_DIA ";
        //echo $sql;
        return $this->executeQuery($sql);
    }

    public function getAnioPersonalDetalle($params) {
        if (isset($params['tipogasto']) and $params['tipogasto'] == 1) {
            $filtro = 'TRAB';
            $tipogasto = "PERSONAL";
        } else {
            $filtro = 'CCOSTO';
            $tipogasto = "CENTRO_COSTO";
        }
        $sql = "SELECT YEAR(FECHA_DOC)AS ANO,CONVERT(NUMERIC(15,2),SUM(MONTO" . $params['moneda'] . ")) AS TOTAL_VENTA FROM [" . $params['ruc'] . "_PLANILLAS_" . $tipogasto . "_" . $params['numEmp'] . "] WHERE COD_EMPRESA='" . $params['codEmp'] . "' 
						/*AND TIPO IN(1,3)*/ AND  COD" . $filtro . " = '" . trim($params['codigo']) . "' GROUP BY YEAR(FECHA_DOC) ORDER BY 1";
        //echo $sql;
        return $this->executeQuery($sql);
    }

    public function getMesesPersonalDetalle($params) {
        if (isset($params['tipogasto']) and $params['tipogasto'] == 1) {
            $filtro = 'TRAB';
            $tipogasto = "PERSONAL";
        } else {
            $filtro = 'CCOSTO';
            $tipogasto = "CENTRO_COSTO";
        }
        $sql = "SELECT MONTH(FECHA_DOC)AS MES,SUM(MONTO" . $params['moneda'] . ")AS TOTAL_VENTA FROM [" . $params['ruc'] . "_PLANILLAS_" . $tipogasto . "_" . $params['numEmp'] . "] 
						WHERE YEAR(FECHA_DOC) = '" . $params['anio'] . "' /*AND TIPO IN(1,3)*/  
						AND COD_EMPRESA='" . $params['codEmp'] . "' AND COD" . $filtro . " = '" . trim($params['codigo']) . "' GROUP BY MONTH(FECHA_DOC) ORDER BY 1";
        //echo $sql;
        return $this->executeQuery($sql);
    }

    public function getDatosVentas($params) {
        $sql = "SELECT  ROW_NUMBER() Over(ORDER BY A.TOTAL_ANO DESC) As RowNum, V.COD_" . $params['tipoventa'] . ",V." . $params['tipoventa'] . ",D.DIA,ISNULL(convert(numeric(15,2),D.TOTAL_DIA),0)AS TOTAL_DIA,M.MES,ISNULL(convert(numeric(15,2),M.TOTAL_MES)
					,0)AS TOTAL_MES,A.ANO,ISNULL(convert(numeric(15,2),A.TOTAL_ANO),0)AS TOTAL_ANO 
					FROM [" . $params['ruc'] . "_VENTAS_" . $params['tipoventa'] . "_" . $params['numEmp'] . "] AS V /* ANO */ LEFT JOIN (SELECT COD_" . $params['tipoventa'] . ",YEAR(FECHA_DOC)AS ANO,SUM(TOTAL_VENTA_" . $params['moneda'] . ")AS TOTAL_ANO FROM [" . $params['ruc'] . "_VENTAS_" . $params['tipoventa'] . "_" . $params['numEmp'] . "] 
					WHERE YEAR(FECHA_DOC) = '" . $params['anio'] . "' AND COD_EMPRESA='" . $params['codEmp'] . "' GROUP BY COD_" . $params['tipoventa'] . ",YEAR(FECHA_DOC))AS A ON A.COD_" . $params['tipoventa'] . " = V.COD_" . $params['tipoventa'] . "
					/* MES */ LEFT JOIN (SELECT COD_" . $params['tipoventa'] . ",MONTH(FECHA_DOC)AS MES,SUM(TOTAL_VENTA_" . $params['moneda'] . ")AS TOTAL_MES 
					FROM [" . $params['ruc'] . "_VENTAS_" . $params['tipoventa'] . "_" . $params['numEmp'] . "] WHERE YEAR(FECHA_DOC) = '" . $params['anio'] . "' AND MONTH(FECHA_DOC) = '" . $params['mes'] . "' AND COD_EMPRESA='" . $params['codEmp'] . "' 
					GROUP BY COD_" . $params['tipoventa'] . ",YEAR(FECHA_DOC),MONTH(FECHA_DOC))AS M ON M.COD_" . $params['tipoventa'] . " = V.COD_" . $params['tipoventa'] . "
					/* DIA */ LEFT JOIN (SELECT COD_" . $params['tipoventa'] . ",DAY(FECHA_DOC)AS DIA,SUM(TOTAL_VENTA_" . $params['moneda'] . ")AS TOTAL_DIA 
					FROM [" . $params['ruc'] . "_VENTAS_" . $params['tipoventa'] . "_" . $params['numEmp'] . "] WHERE YEAR(FECHA_DOC) = '" . $params['anio'] . "' AND MONTH(FECHA_DOC) = '" . $params['mes'] . "' AND DAY(FECHA_DOC) = '" . $params['dias'] . "' 
					AND COD_EMPRESA='" . $params['codEmp'] . "' GROUP BY COD_" . $params['tipoventa'] . ",YEAR(FECHA_DOC),MONTH(FECHA_DOC),DAY(FECHA_DOC))AS D ON 
					D.COD_" . $params['tipoventa'] . " = V.COD_" . $params['tipoventa'] . " WHERE YEAR(V.FECHA_DOC) = '" . $params['anio'] . "' AND COD_EMPRESA='" . $params['codEmp'] . "' 
					GROUP BY V.COD_" . $params['tipoventa'] . ",V." . $params['tipoventa'] . ",A.ANO,A.TOTAL_ANO,M.TOTAL_MES,M.MES ,D.DIA,D.TOTAL_DIA ";
        //echo $sql;
        return $this->executeQuery($sql);
    }

    public function getAnioVentasDetalle($params) {
        $sql = "SELECT YEAR(FECHA_DOC)AS ANO,SUM(TOTAL_VENTA_" . $params['moneda'] . ")AS TOTAL_VENTA FROM [" . $params['ruc'] . "_VENTAS_" . $params['tipoventa'] . "_" . $params['numEmp'] . "] WHERE 
					COD_EMPRESA='" . $params['codEmp'] . "' AND  COD_" . $params['tipoventa'] . " = '" . $params['codigo'] . "' GROUP BY YEAR(FECHA_DOC) ORDER BY 1";
        return $this->executeQuery($sql);
    }

    public function getMesesVentasDetalle($params) {
        $sql = "SELECT MONTH(FECHA_DOC)AS MES,SUM(TOTAL_VENTA_" . $params['moneda'] . ")AS TOTAL_VENTA 
					FROM [" . $params['ruc'] . "_VENTAS_" . $params['tipoventa'] . "_" . $params['numEmp'] . "] WHERE YEAR(FECHA_DOC) = '" . $params['anio'] . "' AND 
					COD_EMPRESA='" . $params['codEmp'] . "' AND COD_" . $params['tipoventa'] . " = '" . $params['codigo'] . "'
					GROUP BY MONTH(FECHA_DOC) ORDER BY 1";
        return $this->executeQuery($sql);
        ;
    }

    public function getDatosCompras($params) {
        $sql = "SELECT  ROW_NUMBER() Over(ORDER BY A.TOTAL_ANO DESC) As RowNum, V.COD_" . $params['tipocompra'] . ",V." . $params['tipocompra'] . ", D.DIA,ISNULL(convert(numeric(15,2),D.TOTAL_DIA),0)AS TOTAL_DIA, M.MES,ISNULL(convert(numeric(15,2),M.TOTAL_MES),0)AS TOTAL_MES, A.ANO,
					ISNULL(convert(numeric(15,2),A.TOTAL_ANO),0)AS TOTAL_ANO
					FROM [" . $params['ruc'] . "_COMPRAS_" . $params['tipocompra'] . "_" . $params['numEmp'] . "] AS V /* ANO */ LEFT JOIN (SELECT COD_" . $params['tipocompra'] . ",YEAR(FECHA_DOC)AS ANO,SUM
					(TOTAL_VENTA_" . $params['moneda'] . ")AS TOTAL_ANO 
					FROM [" . $params['ruc'] . "_COMPRAS_" . $params['tipocompra'] . "_" . $params['numEmp'] . "] WHERE YEAR(FECHA_DOC) = '" . $params['anio'] . "' AND COD_EMPRESA='" . $params['codEmp'] . "' 
					GROUP BY COD_" . $params['tipocompra'] . ",YEAR(FECHA_DOC))AS A ON A.COD_" . $params['tipocompra'] . " = V.COD_" . $params['tipocompra'] . " /* MES */ LEFT JOIN 
					(SELECT COD_" . $params['tipocompra'] . ",MONTH(FECHA_DOC)AS MES,SUM(TOTAL_VENTA_" . $params['moneda'] . ")AS TOTAL_MES FROM [" . $params['ruc'] . "_COMPRAS_" . $params['tipocompra'] . "_" . $params['numEmp'] . "] 
					WHERE YEAR(FECHA_DOC) = '" . $params['anio'] . "' AND MONTH(FECHA_DOC) = '" . $params['mes'] . "' AND COD_EMPRESA='" . $params['codEmp'] . "' 
					GROUP BY COD_" . $params['tipocompra'] . ",YEAR(FECHA_DOC),MONTH(FECHA_DOC))AS M ON M.COD_" . $params['tipocompra'] . " = V.COD_" . $params['tipocompra'] . "
					/* DIA */ LEFT JOIN (SELECT COD_" . $params['tipocompra'] . ",DAY(FECHA_DOC)AS DIA,SUM(TOTAL_VENTA_" . $params['moneda'] . ")AS TOTAL_DIA FROM 
					[" . $params['ruc'] . "_COMPRAS_" . $params['tipocompra'] . "_" . $params['numEmp'] . "] 
					WHERE YEAR(FECHA_DOC) = '" . $params['anio'] . "' AND MONTH(FECHA_DOC) = '" . $params['mes'] . "' AND DAY(FECHA_DOC) = '" . $params['dias'] . "' AND COD_EMPRESA='" . $params['codEmp'] . "' 
					GROUP BY COD_" . $params['tipocompra'] . ",YEAR(FECHA_DOC),MONTH(FECHA_DOC),DAY(FECHA_DOC))AS D ON D.COD_" . $params['tipocompra'] . " = V.COD_" . $params['tipocompra'] . " WHERE 
					YEAR(V.FECHA_DOC) = '" . $params['anio'] . "' AND COD_EMPRESA='" . $params['codEmp'] . "' GROUP BY V.COD_" . $params['tipocompra'] . ",V." . $params['tipocompra'] . ",A.ANO,
					A.TOTAL_ANO,M.TOTAL_MES,M.MES ,D.DIA,D.TOTAL_DIA ";
        //echo $sql;
        return $this->executeQuery($sql);
    }

    public function getAnioComprasDetalle($params) {
        $sql = "SELECT YEAR(FECHA_DOC)AS ANO,SUM(TOTAL_VENTA_" . $params['moneda'] . ")AS TOTAL_VENTA FROM [" . $params['ruc'] . "_COMPRAS_" . $params['tipocompra'] . "_" . $params['numEmp'] . "] WHERE 
					COD_EMPRESA='" . $params['codEmp'] . "' AND  COD_" . $params['tipocompra'] . " = '" . $params['codigo'] . "' GROUP BY YEAR(FECHA_DOC) ORDER BY 1";
        return $this->executeQuery($sql);
    }

    public function getMesesComprasDetalle($params) {
        $sql = "SELECT MONTH(FECHA_DOC)AS MES,SUM(TOTAL_VENTA_" . $params['moneda'] . ")AS TOTAL_VENTA 
					FROM [" . $params['ruc'] . "_COMPRAS_" . $params['tipocompra'] . "_" . $params['numEmp'] . "] WHERE YEAR(FECHA_DOC) = '" . $params['anio'] . "' AND 
					COD_EMPRESA='" . $params['codEmp'] . "' AND COD_" . $params['tipocompra'] . " = '" . $params['codigo'] . "'
					GROUP BY MONTH(FECHA_DOC) ORDER BY 1";
        return $this->executeQuery($sql);
    }

}

?>