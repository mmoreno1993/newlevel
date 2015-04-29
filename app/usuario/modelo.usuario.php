<?php

class modeloUsuario extends MySQL {

    public function getUsuario($id) {
        $sql = "SELECT 
                    udas.id,
                    udas.nombre,
                    udas.clave,
                    udas.tbl_cliente_id,
                    udas.perfil,
                    udas.estado,
                    udas.foto,
                    convert(varchar(10),udas.fecha_creado,103) AS fechaCreado
                FROM 
                    USER_DASH AS udas
                WHERE
                    udas.id = " . $id;
        return $this->executeQuery($sql);
    }

    public function allUsuarios() {
        //condiconal si en caso no funca en la nube
        //IIF(udas.perfil = 'A','Admin','User') AS perfil,
        $sql = "SELECT 
                    udas.id,
                    udas.nombre,
                    CASE WHEN udas.perfil='A' THEN 'Admin' ELSE 'Usuario' END AS perfil,
                    udas.estado,
                    udas.creado_por,
                    udas.fecha_creado,
                    udas.modificado_por,
                    udas.fecha_modificado
                FROM 
                    USER_DASH AS udas
                WHERE 
                    udas.perfil = 'U'
                    AND udas.tbl_cliente_id = ".$_SESSION['usuario']['empresa'];
        return $this->executeQuery($sql);
    }

    public function insertarUsuario($params) {
        $resul = $this->insertData('USER_DASH', array(
            'nombre' => trim($params['nombre']),
            'clave' => md5(trim($params['clave'])),
            'tbl_cliente_id' => $params['idCliente'],
            'perfil' => $params['userPerfil'],
            'estado' => 1,
            'creado_por' => $_SESSION['usuario']['nombre'],
            'fecha_creado' => date("d-m-Y H:i:s")));
        return $resul;
    }

    //Funcion para poder actualizar datos -Yo(usuario) y la accion "opcion"
    public function actualizarUsuario($params, $id_usuario) {
        $valInsertar = array(
            'modificado_por' => $_SESSION['usuario']['nombre'],
            'fecha_modificado' => date("d-m-Y H:i:s"));
        if (isset($params['clave']) and $params['clave'] != "") {
            $valInsertar['clave'] = md5(trim($params['clave']));
        }

        $resul = $this->updateData('USER_DASH', $valInsertar, array('id' => $id_usuario, 'perfil' => $params['userPerfil'], 'tbl_cliente_id' => $params['idCliente']));
        if ($resul) {
            if ((isset($_FILES['fotoAdmin']) and $_FILES['fotoAdmin']['name'] != "")) {
                $ruta_destino = RUTA_ACCESO . 'acceso';
                //Comprobando si el archivo es imagen
                //$mime = array('image/jpg', 'image/jpeg', 'image/gif', 'image/png');
                $mime = array('image/jpg', 'image/jpeg');
                if (in_array($_FILES['fotoAdmin']['type'], $mime)) {
                    $error = $_FILES['fotoAdmin']['error'];
                    if ($error == UPLOAD_ERR_OK) {
                        $tmp_name = $_FILES['fotoAdmin']['tmp_name'];
                        $nombre = uniqid(microtime()) . $_FILES['fotoAdmin']['name'];
                        $ext = end(explode('.', $nombre));
                        $fielname = substr(md5($nombre), 0, 12);
                        $name = $fielname . '.' . $ext;
                        move_uploaded_file($tmp_name, "$ruta_destino/$name");
                        $this->updateData('USER_DASH', array('foto' => $name), array('id' => $id_usuario));
                        $_SESSION['usuario']['foto'] = $name;
                    }
                }
            }
        }
        return $resul;
    }

    //Funcion para poder cambiar el password -- Solo el usuario

    public function actualizarPassword($params) {
        $resul = $this->updateData('USER_DASH', array(
            'clave' => md5(trim($params['newpass'])),
            'tbl_cliente_id' => $params['idCliente'],
            'modificado_por' => $_SESSION['usuario']['nombre'],
            'fecha_modificado' => date("d-m-Y H:i:s")), array('id' => $params['id'], 'perfil' => $params['userPerfil']));
        return $resul;
    }

    public function cambiarEstado($params) {
        if (isset($params['est']) and $params['est'] == 1) {
            return $this->updateData('USER_DASH', array('estado' => '0', 'modificado_por' => $_SESSION['usuario']['nombre'], 'fecha_modificado' => date("d-m-Y H:i:s")), array('id' => $params['id']));
        } else {
            return $this->updateData('USER_DASH', array('estado' => '1', 'modificado_por' => $_SESSION['usuario']['nombre'], 'fecha_modificado' => date("d-m-Y H:i:s")), array('id' => $params['id']));
        }
    }

    public function getCorreo($correo) {
        $sql = "select nombre from USER_DASH where nombre='" . $correo . "'";
        return $this->executeQuery($sql);
    }

}

?>