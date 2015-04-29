<?php

class modeloAcceso extends MySQL {

    public function getAcceso($usuario, $clave) {
        $res = FALSE;
        $sql = "select tu.nombre as correo,tp.nombre + ' ' + 
                tp.apellido_pat + ' ' + tp.apellido_mat as nombrecompleto,
                tp.foto,tu.tbl_clientes_id,
                tu.tbl_perfil_id from tbl_usuario tu inner join tbl_persona 
                tp on tu.tbl_persona_id=tp.id where tu.nombre='".$usuario."'
                and tu.clave='".$clave."' and tu.estado=1
               ";
        $usuario = $this->executeQuery($sql);
        if (is_array($usuario) and $usuario != NULL) {
            $res = TRUE;
            $_SESSION['user']['codigo'] = $usuario[0]['correo'];
            $_SESSION['user']['nombre'] = $usuario[0]['nombrecompleto'];
            $_SESSION['user']['perfil'] = $usuario[0]['tbl_perfil_id'];
            $_SESSION['user']['empresa'] = $usuario[0]['tbl_clientes_id'];
            //Sesion Usuario Foto
            $_SESSION['user']['foto'] = $usuario[0]['foto'];
        }
        return $res;
    }
    public function getAdmin($usuario, $clave) {
        $res = FALSE;
        $sql = "select tu.id as codigo,tu.nombre as correo,tp.nombre + ' ' + 
                tp.apellido_pat /*+ ' ' + tp.apellido_mat*/ as nombrecompleto,
                tp.foto from tbl_administrador tu inner join tbl_persona 
                tp on tu.tbl_persona_id=tp.id where tu.nombre='".$usuario."'
                and tu.clave='".$clave."' and tu.estado=1
               ";
       
        $administracion = $this->executeQuery($sql);
        if (is_array($administracion) and $administracion != NULL) {
            $res = TRUE;
            $_SESSION['admin']['id'] = $administracion[0]['codigo'];
            $_SESSION['admin']['codigo'] = $administracion[0]['correo'];
            $_SESSION['admin']['nombre'] = $administracion[0]['nombrecompleto'];
            //Sesion Usuario Foto
            $_SESSION['admin']['foto'] = $administracion[0]['foto'];
        }
        return $res;
    }
    public function getClave($nombre, $clave) {
        $sql = " SELECT id FROM USER_DASH WHERE nombre='" . $nombre . "' AND clave='" . md5($clave) . "' AND estado='1'";
        return $this->executeQuery($sql);
    }

}

?>