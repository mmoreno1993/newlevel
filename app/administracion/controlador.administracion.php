<?php

class administracion extends App {

    public function __construct() {
        parent::__construct();
        
        if (!isset($_SESSION['admin']['codigo'])) 
        {
            reenviar('acceso');
        }
    }
    public function logout(){
        logout();
    }
    public function index() {
        
    }
    public function curso(){
        $modelo = new modeloAdministracion();
        if(isset($_POST['btnEditar'])){
            $curso = array(
                'id'=>$_POST['id'],
                'descripcion'=>$_POST['txtCurso1'],
                'modificado_por' => $_SESSION['admin']['nombre']
            );
            $modelo->updCurso($curso);
            header('Location:index.php?modulo=administracion&accion=curso');
        }

        if(isset($_POST['btnGuardar'])){
            $curso = array(
                'descripcion'=>$_POST['txtCurso'],
                'creado_por'=>$_SESSION['admin']['nombre'],
                'estado' => 0
            );
            $modelo->regCurso($curso);
            
            header('Location:index.php?modulo=administracion&accion=curso');
        }
        
        if(isset($_POST['btnEliminar'])){
            if(is_array($_POST['chkcursos'])){
                foreach($_POST['chkcursos'] as $val){
                    $modelo->remCurso($val);
                }
            }
            header('Location:index.php?modulo=administracion&accion=curso');
        }
        
        
        if(isset($_POST['btndeshabilitar'])){
            
            if(is_array($_POST['chkcursos'])){
                foreach($_POST['chkcursos'] as $val){
                    $curso = null;
                    $curso = array(
                        'id'=>$val,
                        'estado'=>0,
                        'modificado_por'=>$_SESSION['admin']['nombre']
                    );
                    $modelo->cambiarEstadoCurso($curso);
                }
            }
            header('Location:index.php?modulo=administracion&accion=curso');
        }
        if(isset($_POST['btnhabilitar'])){
            if(is_array($_POST['chkcursos'])){
                foreach($_POST['chkcursos'] as $val){
                    $curso = null;
                    $curso = array(
                        'id'=>$val,
                        'estado'=>1,
                        'modificado_por'=>$_SESSION['admin']['nombre']
                    );
                    $modelo->cambiarEstadoCurso($curso);
                }
            }
            header('Location:index.php?modulo=administracion&accion=curso');
        }
        $this->vista->paginador = $modelo->getPaginacion('getCursos', null, 5);
        $this->vista->curso = $modelo->getCursos(); 
    }
    public function cursoDetalle(){
        $modelo = new modeloAdministracion();
        $this->vista->codigoCurso = $_GET['cod'];
        
        if(isset($_POST['btnGuardar'])){
            $tema = array(
                'tbl_curso_id'=> $this->vista->codigoCurso,
                'tbl_expositor_id'=> $_POST['ddlexpositor'],
                'orden' => $_POST['txtNro'],
                'descripcion' => $_POST['txtTema'],
                'video' => $_POST['urlTema'],
                'video_caso' => $_POST['urlCaso'],
                'creado_por' => $_SESSION['admin']['nombre']
            );
            $modelo->regTema($tema);
            header('Location:index.php?modulo=administracion&accion=cursoDetalle&cod='.$this->vista->codigoCurso);
        }
        
        if(isset($_POST['btnEditarTest'])){
            $test = array(
                'id' => $_POST['id'],
                'descripcion'=> $_POST['descripcion'],
                'orden' => $_POST['orden'],
                'multiple' => $_POST['multiple'],
                'modificado_por' => $_SESSION['admin']['nombre']
            );
            $modelo->updTest($test);
            header('Location:index.php?modulo=administracion&accion=cursoDetalle&cod='.$this->vista->codigoCurso);
        }
        if(isset($_POST['btnCrearTest'])){
            $test = array(
                'id' => $_POST['id'],
                'tbl_curso_id' => $this->vista->codigoCurso,
                'descripcion'=> $_POST['descripcion'],
                'orden' => $_POST['orden'],
                'multiple' => $_POST['multiple'],
                'creado_por' => $_SESSION['admin']['nombre']
            );
            $modelo->regTest($test);
            header('Location:index.php?modulo=administracion&accion=cursoDetalle&cod='.$this->vista->codigoCurso);
        }
        
        if(isset($_POST['btnEditar'])){
            $tema = array(
                'id' => $_POST['id'],
                'tbl_expositor_id'=> $_POST['tbl_expositor_id'],
                'orden' => $_POST['orden'],
                'descripcion' => $_POST['descripcion'],
                'video' => $_POST['video'],
                'video_caso' => $_POST['video_caso'],
                'modificado_por' => $_SESSION['admin']['nombre']
            );
            $modelo->updTema($tema);
            header('Location:index.php?modulo=administracion&accion=cursoDetalle&cod='.$this->vista->codigoCurso);
        }
        if(isset($_POST['btnEliminar'])){
            if(is_array($_POST['chktemas'])){
                foreach($_POST['chktemas'] as $val){
                    $modelo->remTema($val);
                }
            }
            header('Location:index.php?modulo=administracion&accion=cursoDetalle&cod='.$this->vista->codigoCurso);
        }
        if(isset($_POST['btnEliminarTest'])){
            if(is_array($_POST['chktest'])){
                foreach($_POST['chktest'] as $val){
                    $modelo->remTest($val);
                }
            }
            header('Location:index.php?modulo=administracion&accion=cursoDetalle&cod='.$this->vista->codigoCurso);
        }
        if(isset($_POST['btndeshabilitar'])){
            
            if(is_array($_POST['chktemas'])){
                foreach($_POST['chktemas'] as $val){
                    $tema = null;
                    $tema = array(
                        'id'=>$val,
                        'estado'=>0,
                        'modificado_por'=>$_SESSION['admin']['nombre']
                    );
                    $modelo->cambiarEstadoTema($tema);
                }
            }
            header('Location:index.php?modulo=administracion&accion=cursoDetalle&cod='.$this->vista->codigoCurso);
        }
        if(isset($_POST['btnhabilitar'])){
            if(is_array($_POST['chktemas'])){
                foreach($_POST['chktemas'] as $val){
                    $tema = null;
                    $tema = array(
                        'id'=>$val,
                        'estado'=>1,
                        'modificado_por'=>$_SESSION['admin']['nombre']
                    );
                    $modelo->cambiarEstadoTema($tema);
                }
            }
            header('Location:index.php?modulo=administracion&accion=cursoDetalle&cod='.$this->vista->codigoCurso);
        }
        //$this->vista->tema = $modelo->getTemas($_GET['cod']);
        $this->vista->tema = $modelo->getPaginacion('getTemas',$_GET['cod'],5);
        $this->vista->test = $modelo->getPaginacion2('getTest',$_GET['cod'],5);
        $this->vista->expositor = $modelo->getExpositor();
        $this->vista->cursoActual = $modelo->getNomCurso($_GET['cod']);
    }
    public function cursoEditar(){
        $modelo = new modeloAdministracion();
        if(isset($_GET['cod'])){
            $this->vista->cursoEditar = $modelo->getNomCurso($_GET['cod']);
        }
    }
    public function temaEditar(){
        $modelo = new modeloAdministracion();
        if(isset($_GET['tema'])){
            $this->vista->temaEditar = $modelo->getTema($_GET['tema']);
            $this->vista->expositor = $modelo->getExpositor();
        }
    }
    public function testEditar(){
        $modelo = new modeloAdministracion();
        if(isset($_GET['test'])){
            $this->vista->testEditar = $modelo->getTest2($_GET['test']);
        }
    }
    public function testRespuesta(){
        $modelo = new modeloAdministracion();
        $this->vista->codigoTest = $_GET['cod'];
        if(isset($_POST['btnGuardar'])){
            $respuesta = array(
                'tbl_testdetalle_id' => $this->vista->codigoTest,
                'respuesta'=>$_POST['txtrespuesta'],
                'orden' => $_POST['txtnro'],
                'verdadero' => $_POST['ddlrespuesta'],
                'creado_por'=>$_SESSION['admin']['nombre'],
                'estado' => 1
            );
            $modelo->regRespuesta($respuesta);
            header('Location:index.php?modulo=administracion&accion=testRespuesta&cod='.$this->vista->codigoTest);
        }
        if(isset($_POST['btnEliminar'])){
            if(is_array($_POST['chkrespuesta'])){
                foreach($_POST['chkrespuesta'] as $val){
                    $modelo->remRespuesta($val);
                }
            }
            header('Location:index.php?modulo=administracion&accion=testRespuesta&cod='.$this->vista->codigoTest);
        }
        if(isset($_POST['btnEditar'])){
            $respuesta = array(
                'id' => $_POST['id'],
                'respuesta'=>$_POST['respuesta'],
                'orden' => $_POST['orden'],
                'verdadero' => $_POST['multiple'],
                'modificado_por'=>$_SESSION['admin']['nombre']
            );
            $modelo->updRespuesta($respuesta);
            header('Location:index.php?modulo=administracion&accion=testRespuesta&cod='.$this->vista->codigoTest);
        }
        $this->vista->preguntaActual = $modelo->getPregunta($this->vista->codigoTest);
        $this->vista->respuesta = $modelo->getPaginacion('getRespuesta', $this->vista->codigoTest, 5);
        
    }
    public function editarRespuesta(){
        $modelo = new modeloAdministracion();
        if(isset($_GET['respuesta'])){
            $this->vista->respuestaEditar = $modelo->getRespuestawithoudRow($_GET['respuesta']);
        }
    }
    public function expositor(){
        $modelo = new modeloAdministracion();
        if(isset($_POST['btnGuardar'])){
            $expositor = array(
                'nombre'=> $_POST['nombre'],
                'apellido_pat' => $_POST['apellido_pat'],
                'apellido_mat' => $_POST['apellido_mat'],
                'correo' => $_POST['correo'],
                'creado_por' => $_SESSION['admin']['nombre'],
                'estado' => 1
            );
            $modelo->regExpositor($expositor);
            header('Location:index.php?modulo=administracion&accion=expositor');
        }
        if(isset($_POST['btnEliminar'])){
            foreach($_POST['chkexpositor'] as $val){
                $modelo->remExpositor($val);
            }
            header('Location:index.php?modulo=administracion&accion=expositor');
        }
        if(isset($_POST['btnEditar'])){
            $expositor = array(
                'id' => $_POST['id'],
                'nombre'=> $_POST['nombre'],
                'apellido_pat' => $_POST['apellido_pat'],
                'apellido_mat' => $_POST['apellido_mat'],
                'correo' => $_POST['correo'],
                'modificado_por' => $_SESSION['admin']['nombre']
            );
            $modelo->updExpositor($expositor);
            header('Location:index.php?modulo=administracion&accion=expositor');
        }
        $this->vista->paginador = $modelo->getPaginacion('getExpositores', null, 5);//$modelo->getExpositores();
    }
    public function expositorEditar(){
        $modelo = new modeloAdministracion();
        $this->vista->expositorEditar = $modelo->getExpositorEd($_GET['cod']);
    }
    public function administrador(){
        $modelo = new modeloAdministracion();
        if(isset($_POST['btnGuardar'])){
            $administrador = array(
                'nombre'=> $_POST['nombre'],
                'apellido_pat' => $_POST['apellido_pat'],
                'apellido_mat' => $_POST['apellido_mat'],
                'correo' => $_POST['correo'],
                'clave' => $_POST['clave'],
                'direccion' => $_POST['direccion'],
                'telefono' => $_POST['telefono'],
                'foto' => $_FILES['foto'],
                'creado_por' => $_SESSION['admin']['nombre'],
                'estado' => 1
            );
            $modelo->regAdministrador($administrador);
            header('Location:index.php?modulo=administracion&accion=administrador');
        }
        if(isset($_POST['btnEditar'])){
            $administrador = array(
                'id'=> $_POST['id'],
                'nombre'=> $_POST['nombre'],
                'apellido_pat' => $_POST['apellido_pat'],
                'apellido_mat' => $_POST['apellido_mat'],
                'clave' => $_POST['clave'],
                'direccion' => $_POST['direccion'],
                'telefono' => $_POST['telefono'],
                'foto' => $_FILES['foto'],
                'modificado_por' => $_SESSION['admin']['nombre'],
            );
            $modelo->updAdministrador($administrador);
            header('Location:index.php?modulo=administracion&accion=administrador');
        }
        if(isset($_POST['btnEliminar'])){
            if(is_array($_POST['chkadministrador'])){
                foreach($_POST['chkadministrador'] as $val){
                    $modelo->remAdministrador($val);
                }
            }
            header('Location:index.php?modulo=administracion&accion=administrador');
        }
        if(isset($_POST['btndeshabilitar'])){
            
            if(is_array($_POST['chkadministrador'])){
                foreach($_POST['chkadministrador'] as $val){
                    $administrador = null;
                    $administrador = array(
                        'id'=>$val,
                        'estado'=>0,
                        'modificado_por'=>$_SESSION['admin']['nombre']
                    );
                    $modelo->cambiarEstadoAdministrador($administrador);
                }
            }
            header('Location:index.php?modulo=administracion&accion=administrador');
        }
        if(isset($_POST['btnhabilitar'])){
            if(is_array($_POST['chkadministrador'])){
                foreach($_POST['chkadministrador'] as $val){
                    $administrador = null;
                    $administrador = array(
                        'id'=>$val,
                        'estado'=>1,
                        'modificado_por'=>$_SESSION['admin']['nombre']
                    );
                    $modelo->cambiarEstadoAdministrador($administrador);
                }
            }
            header('Location:index.php?modulo=administracion&accion=administrador');
        }
        $this->vista->paginador = $modelo->getPaginacion('getAdministradores', null, 5);//$modelo->getExpositores();
    }
    public function administradorEditar(){
        $modelo = new modeloAdministracion();
        $this->vista->administradorEditar = $modelo->getAdministrador($_GET['cod']);
    }
}
?>