<?php
//RUTAS PARA EL SISTEMA
define('RUTA_APP', 'app/');
define('RUTA_REQUIERE', RUTA_APP . 'libreria/requiere/');
define('RUTA_INCLUYE', RUTA_APP . 'libreria/incluye/');
define('RUTA_PUBLIC', 'public_html/');
define('RUTA_ACCESO', 'assets/img/');

//CONTROLES DEL SISTEMA
define('MODULO_DEFAULT', 'acceso');
define('ACCION_DEFAULT', 'index');

//CONEXION A BASE DE DATOS
define('HOST_BASE_DATOS','mmorenoel.mssql.somee.com');
define('USUARIO_BASE_DATOS','burakkiumbreon_SQLLogin_1');
define('CLAVE_BASE_DATOS','13pika13');
define('NOMBRE_BASE_DATOS','mmorenoel');
define('CHARSET_BASE_DATOS','UTF-8');

//ENVIO MENSAJES
define('EMAIL_SOPORTE','avisos@starsoft.com.pe');

//PRIVILEGIOS PARA EL DASHBOARD
$USUARIOS_SUPERADMIN = array('cvallejos','mmoreno','clevano','aacuna','cyalle');
?>