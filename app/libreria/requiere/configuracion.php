<?php

require_once "constante.php";

$CSS = array('bootstrap','font-awesome','global','main','tipTip/tipTip');

$JS = array('bootstrap','modernizr','bootstrap-tour.custom',
            'st-common.min','st-elements.min','tipTip/jquery.tipTip','global');

$READY = array("$('.tipTip').tipTip();");

//$SUPERADMIN = array('cvallejos','mmoreno','clevano','aacuna','cyalle');

//LIBRERIAS REQUERIDAS
require_once RUTA_REQUIERE.'funciones.php';
require_once RUTA_REQUIERE.'mysql.class.php';
require_once RUTA_REQUIERE.'seguridad.php';
require_once RUTA_REQUIERE.'app.class.php';
require_once RUTA_REQUIERE.'plantilla.class.php';
?>