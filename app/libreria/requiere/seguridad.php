<?php
session_start();
if (isset($_REQUEST['modulo']) or isset($_REQUEST['accion'])) {
    if (!isset($_SESSION['user'])) {
        logout();
    }
} else {
    
}
?>