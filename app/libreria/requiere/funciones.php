<?php

function logout() {
    if ($_REQUEST['modulo'] != "acceso") {
        header("Location: logout.php");
        exit;
    }
}

function getMes($mes) {
    switch ($mes) {
        case 1:
            $texto = "Enero";
            break;
        case 2:
            $texto = "Febrero";
            break;
        case 3:
            $texto = "Marzo";
            break;
        case 4:
            $texto = "Abril";
            break;
        case 5:
            $texto = "Mayo";
            break;
        case 6:
            $texto = "Junio";
            break;
        case 7:
            $texto = "Julio";
            break;
        case 8:
            $texto = "Agosto";
            break;
        case 9:
            $texto = "Setiembre";
            break;
        case 10:
            $texto = "Octubre";
            break;
        case 11:
            $texto = "Noviembre";
            break;
        case 12:
            $texto = "Diciembre";
            break;
    }
    return $texto;
    //$meses = array("1" => "Enero","2" => "Febrero","3"=>"Marzo","4"=>"Abril","5"=>"Mayo","6"=>"Junio","7"=>"Julio","8"=>"Agosto","9"=>"Septiembre","10"=>"Octubre","11"=>"Noviembre","12"=>"Diciembre");
    //return $meses;
}

function quitarTildes($parrafo) {
    $parrafo = strtolower($parrafo);
    $find = array('á', 'é', 'í', 'ó', 'ú');
    $repl = array('a', 'e', 'i', 'o', 'u');
    $parrafo = str_replace($find, $repl, $parrafo);
    $find = array(' ', '&', '\r\n', '\n', '+');
    $parrafo = str_replace($find, '-', $parrafo);
    $find = array('/[^a-z0-9\-<>]/', '/[\-]+/', '/<[^>]*>/');
    $repl = array('', '-', '');
    $parrafo = preg_replace($find, $repl, $parrafo);
    return $parrafo;
}

function getModelo($modulo) {
    include_once (RUTA_APP . $modulo . "/modelo." . $modulo . ".php");
}

function enviarCorreo($arrParms, $tipo) {
    $valida = false;
    $result = array();
    $result['valida'] = false;
    switch ($tipo) {
        case 'termino':
            if (is_array($arrParms)) {
                $para = $arrParms['correo'];
                $mensaje = $arrParms['mensaje'];
                $mensaje .="<br /><br />
                            <b>Saludos coordiales</b> <br/><br/>
                            <img src='http://www.starsoftservicios.com/dashboard/assets/img/logo/starsoft-logo_acceso_black.png' alt='logo-starsoft'/>
                            E-Cloud Starsoft - DashBoard Web<br />
                            <a href='http://www.starsoft.com.pe' target='_blank'>http://www.starsoft.com.pe</a>
                        ";
                $asunto = "E-Cloud :: " . $arrParms['asunto'];
                $de = EMAIL_SOPORTE;
                $result['valida'] = true;
                $result['mensaje'] = "Acepto los terminos y contratos.";
            }
            break;
    }
    if ($result['valida'] === true) {
        require_once RUTA_REQUIERE . "phpmailer/class.phpmailer.php";
        $mail = new PHPMailer();
        $mail->Mailer = "smtp";
        $mail->SMTPDebug = false;
        $mail->IsSMTP();
        $mail->Host = "smtpout.secureserver.net";
        $mail->Port = 25;
        $mail->SMTPAuth = true;
        $mail->Username = "avisos@starsoft.com.pe";
        $mail->Password = "a095GV4k";
        $mail->IsHTML(true);
        $mail->From = $de;
        $mail->FromName = "E-Cloud";
        $mail->Subject = utf8_encode($asunto);
        $mail->AddAddress($para, "E-Cloud");
        $mail->Body = utf8_encode($mensaje);
        $mail->Send();
        $Error = $mail->ErrorInfo;
        if ($Error != "") {
            $result['valida'] = false;
            $result['mensaje'] = "Mensaje no enviado... lo sentimos";
        }
    }
    return $result;
}

function addJS($ruta) {
    global $JS;
    array_push($JS, $ruta);
}

function addCSS($ruta) {
    global $CSS;
    array_push($CSS, $ruta);
}

function reenviar($modulo, $accion = NULL, $page = NULL) {
    (is_null($accion)) ? $accion = '' : $accion = "&accion=" . $accion;
    (is_null($page)) ? $page = '' : $page = "&page=" . $page;
    header("Location:index.php?modulo=" . $modulo . $accion . $page);
    exit;
}
