<?php

class usuario extends App {

    public function index() {
        if (isset($_SESSION['usuario']['idUsuario']) and $_SESSION['usuario']['termino'] == 0) {
            reenviar('confidencialidad');
        } else {
            if (isset($_SESSION['usuario']['idUsuario']) and isset($_SESSION['usuario']['perfil']) and $_SESSION['usuario']['perfil'] == "U") {
                reenviar('dashboard');
            } else {
                $modelo = new modeloUsuario();
                $id = $_SESSION['usuario']['idUsuario'];
                $this->vista->usuarios = $modelo->getUsuario($id);
                $this->vista->usuario = $this->vista->usuarios[0];
            }
        }
    }

    public function opcion() {
        if (isset($_SESSION['usuario']['idUsuario']) and $_SESSION['usuario']['termino'] == 0) {
            reenviar('confidencialidad');
        } else {
            if (isset($_SESSION['usuario']['idUsuario']) and isset($_SESSION['usuario']['perfil']) and $_SESSION['usuario']['perfil'] == "U") {
                reenviar('dashboard');
            } else {
                $modelo = new modeloUsuario();
                $this->vista->allUsuarios = $modelo->allUsuarios();
            }
        }
    }

    public function editaryo() {
        if (isset($_SESSION['usuario']['idUsuario']) and $_SESSION['usuario']['termino'] == 0) {
            reenviar('confidencialidad');
        } else {
            if (isset($_SESSION['usuario']['idUsuario']) and isset($_SESSION['usuario']['perfil']) and $_SESSION['usuario']['perfil'] == "U") {
                reenviar('dashboard');
            } else {
                $this->vista->html = FALSE;
                $modelo = new modeloUsuario();
                if (isset($_REQUEST['id']) and $_REQUEST['id'] != "") {
                    $id = $_REQUEST['id'];
                }
                if (isset($_REQUEST['guardar'])) {
                    $modelo->actualizarUsuario($_REQUEST, $id);
                    if($modelo){
                        
                    }
                    reenviar($this->modulo, 'index');
                } else {
                    if (!is_null($id)) {
                        $this->vista->usuarios = $modelo->getUsuario($id);
                        $this->vista->usuario = $this->vista->usuarios[0];
                    }
                }
            }
        }
    }

    public function getPass() {
        getModelo('acceso');
        $modelo = new modeloAcceso();
        $rtn = $modelo->getClave($_SESSION['usuario']['nombre'], $_REQUEST['psw']);
        if (is_array($rtn) and count($rtn) > 0) {
            echo "si";
            exit;
        } else {
            echo "no";
            exit;
        }
    }

    public function getCorreo() {
        $modelo = new modeloUsuario();
        $rtn = $modelo->getCorreo($_REQUEST['correo']);
        if (is_array($rtn) and count($rtn) > 0) {
            echo "si";
            exit;
        } else {
            echo "no";
            exit;
        }
    }

    public function editar() {
        if (isset($_SESSION['usuario']['idUsuario']) and $_SESSION['usuario']['termino'] == 0) {
            reenviar('confidencialidad');
        } else {
            $this->vista->html = FALSE;
            $modelo = new modeloUsuario();
            if (isset($_REQUEST['id']) and $_REQUEST['id'] != "") {
                $id = $_REQUEST['id'];
            }
            if (isset($_REQUEST['guardar'])) {
                $modelo->actualizarUsuario($_REQUEST, $id);
                reenviar($this->modulo, 'opcion');
            } else {
                if (!is_null($id)) {
                    $this->vista->usuarios = $modelo->getUsuario($id);
                    $this->vista->usuario = $this->vista->usuarios[0];
                }
            }
        }
    }

    public function crear() {
        if (isset($_SESSION['usuario']['idUsuario']) and $_SESSION['usuario']['termino'] == 0) {
            reenviar('confidencialidad');
        } else {
            if (isset($_SESSION['usuario']['idUsuario']) and $_SESSION['usuario']['perfil'] == "U") {
                reenviar('dashboard');
            } else {
                $this->vista->html = FALSE;
                $modelo = new modeloUsuario();
                if (isset($_REQUEST['guardar'])) {
                    $modelo->insertarUsuario($_REQUEST);
                    reenviar($this->modulo, 'opcion');
                }
            }
        }
    }

    public function changepass() {
        $this->vista->html = FALSE;
        $modelo = new modeloUsuario();
        if (isset($_REQUEST['id']) and $_REQUEST['id'] != "") {
            $id = $_REQUEST['id'];
        }
        if (isset($_REQUEST['guardar'])) {
            $modelo->actualizarPassword($_REQUEST, $id);
            reenviar('dashboard');
        }
    }

    public function cambiarEstado() {
        $this->vista->html = FALSE;
        $modelo = new modeloUsuario();
        if (isset($_REQUEST['id']) and $_REQUEST['id'] != "") {
            $id = $_REQUEST['id'];
        }
        (isset($_REQUEST['estado']) and $_REQUEST['estado'] == 1 ) ? $this->vista->est = 1 : $this->vista->est = 0;
        if (!isset($_REQUEST['confirmar'])) {
            $this->vista->usuario = $modelo->selectRowData('USER_DASH', '*', array('id' => $_REQUEST['id']));
        } else {
            $res = $modelo->cambiarEstado($_REQUEST);
            reenviar($this->modulo, 'opcion');
        }
    }

}

?>