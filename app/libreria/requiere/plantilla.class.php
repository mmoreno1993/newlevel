<?php
class Plantilla {
    var $ruta;
    var $html = TRUE;
    var $ajaxVacio = FALSE;
    var $rutaVista = "";
    var $nomUsuarioPersona;
    var $paquete;
    var $modulo;
    var $accion;
    var $nuevo = TRUE;

    public function setPlantilla() {
        $this->getCabecera();
        if (!$this->ajaxVacio) {
            include ($this->ruta);
        }
        $this->getMenu();
        $this->getPie();
    }
    public function setPlantillaAdmin(){
        $this->getCabeceraAdmin();
        $this->getMenuAdmin();
        if (!$this->ajaxVacio) {
            include ($this->ruta);
        }
        $this->getPieAdmin();
    }
    public function setBody(){
        if(!$this->ajaxVacio){
            include($this->ruta);
        }
    }

    public function getCabecera() {
        if ($this->html) {
            include (RUTA_INCLUYE . "cabecera.php");
        }
    }

    public function getPie() {
        if ($this->html) {
            include (RUTA_INCLUYE . "pie.php");
        }
    }

    public function getMenu() {
        //include (RUTA_INCLUYE . "menu.php");
    }
    
    public function getCabeceraAdmin() {
        if ($this->html) {
            include (RUTA_INCLUYE . "cabecera_admin.php");
        }
    }

    public function getPieAdmin() {
        if ($this->html) {
            include (RUTA_INCLUYE . "pie_admin.php");
        }
    }

    public function getMenuAdmin() {
        include (RUTA_INCLUYE . "menu_admin.php");
    }
    
    public function getReferenciaCSS() {
        global $CSS;
        if (is_array($CSS)) {
            foreach ($CSS as $css) {
                print '<link type="text/css" rel="stylesheet" href="assets/css/' . $css . '.css" />';
            }
        }
    }
    public function getReferenciaJS() {
        global $JS;
        if (is_array($JS)) {
            foreach ($JS as $js) {
                print '<script type="text/javascript" src="assets/js/' . $js . '.js" ></script>';
            }
        }
    }
    
    public function getReady() {
        global $READY;
        if (is_array($READY)) {
            foreach ($READY as $ready) {
                print $ready . "\n";
            }
        }
    }
}

?>