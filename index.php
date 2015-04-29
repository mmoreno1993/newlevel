<?php
//Cargando configuración del sistema
include_once 'app/libreria/requiere/configuracion.php';

//Asignando modulo
(isset($_REQUEST['modulo'])) ? $modulo = $_REQUEST['modulo'] : $modulo = MODULO_DEFAULT;

//Asignando la acción
(isset($_REQUEST['accion'])) ? $accion = $_REQUEST['accion'] : $accion = ACCION_DEFAULT;

//Ubicación de la ruta a ejecutar
$ruta = RUTA_APP . $modulo;

//Ubicación del controlador
$controlador = $ruta . "/controlador." . $modulo . ".php";

//Ubicación del modelo
$modelo = $ruta . "/modelo." . $modulo . ".php";
//Ejecución
if (file_exists($controlador)) {
    include_once($controlador);
    if (file_exists($modelo))
        include_once($modelo);
    $objeto = new $modulo();
    
    if (!method_exists($modulo, $accion)) {
        $accion = ACCION_DEFAULT;
    }
    $objeto->vista->ruta = $ruta . "/vista." . $modulo . "." . $accion . ".php";
    $objeto->$accion();
    addJS($modulo);
    addCSS($modulo);
    if($modulo != 'administracion'){
        if($modulo != 'acceso'){
            $objeto->vista->setPlantilla();    
        }else{
            $objeto->vista->setBody();    
        }
    }else{
        if(isset($_GET['ajax'])){
            $objeto->vista->setBody();    
        }else{
            $objeto->vista->setPlantillaAdmin();
        }
        
    }

} else {
//    echo $controlador;
    echo "Error 404";
}
?>