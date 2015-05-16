<?php

class modeloAcceso extends MySQL {

    public function getAcceso($usuario, $clave) {
        $res = FALSE;
        $this->query  = "
                select id,concat(apepat,' ',nombre_1) as nombrecompleto,correo,password,alias,fecha_nacimiento,
                concat(date_format(if(isnull(fecha_modificado) =1,fecha_creado,fecha_modificado),
                '%d/%m/%Y %h:%i %p'),' por ',if(isnull(modificado_por)=1,creado_por,modificado_por)) as ultima_modificacion,
                activo,tbl_trabajador_id,tipo_usuario from tbl_usuario where activo=1 and alias='".$usuario."' and password='".$clave."'
               ";
               
        $usuario = $this->obtener_resultados();
        if (count($usuario)>0) {
            $res = TRUE;
            $_SESSION['user']['codigo'] = $usuario[0]['id'];
            $_SESSION['user']['alias'] = $usuario[0]['alias'];
            $_SESSION['user']['nombre'] = $usuario[0]['nombrecompleto'];
            $_SESSION['user']['correo'] = $usuario[0]['correo'];
            $_SESSION['user']['tipo_usuario'] = $usuario[0]['tipo_usuario'];
            $this->query  = "
                    select * from tbl_almacen
                   ";
            $almacen = $this->obtener_resultados();
            if(count($almacen)>0){
                $_SESSION['user']['almacencodigo'] = $almacen[0]['id'];
                $_SESSION['user']['almacen'] = $almacen[0]['descripcion'];
                $_SESSION['user']['almacenes'] = $almacen;
            }
            //Sesion Usuario Foto
            //$_SESSION['user']['foto'] = $usuario[0]['foto'];
        }
        return $res;
    }

}

?>