<?php

class elearning extends App {
    public function __construct() {
        parent::__construct();
        if (!isset($_SESSION['user']['codigo'])) 
        {
            reenviar('acceso');
        }
    }
    public function index() {    
        $this->listarCursos();
    }
    public function buscarCursos()
    {
        
    }
    public function logout(){
        logout();
    }
    public function curso(){
        $this->listarCursos();
    }
    public function listarCursos()
    {
        $modelo = new modeloElearning();
        $this->vista->curso = $modelo->getCursos();        
    }
}

?>