<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Administración de contenido del ELEARNING STARSOFT">
        <meta name="author" content="Moisés Moreno Usnayo">
        <title>BACKEND ELEARNING STARSOFT</title>
        <link href="assets/css/bootstrap.min.css" rel="stylesheet">
        <link href="assets/css/sb-admin.css" rel="stylesheet">
        <link href="assets/font-awesome-4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <script src="assets/js/jquery.js" ></script>
        <script src="assets/js/jquery-2.1.0.min.js" ></script>
        <script src="assets/js/bootstrap.js" ></script>
        <script src="assets/js/global.js" ></script>
    </head>
<body>
    <div id="wrapper">
        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php?modulo=administracion"><img width="150" height="30" src="assets/img/logo/logo.png" /></a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <span class="badge">3</span>
                        <i class="fa fa-envelope text-warning"></i> 
                        <b class="caret"></b></a>
                    <ul class="dropdown-menu message-dropdown">
                        <li class="message-preview">
                            <a href="#">
                                <div class="media">
                                    <span class="pull-left">
                                        <img class="media-object" src="" alt="">
                                    </span>
                                    <div class="media-body">
                                        <h5 class="media-heading"><strong>José Díaz</strong>
                                        </h5>
                                        <p class="small text-muted"><i class="fa fa-clock-o"></i> 10/09/2014 a las 4:32 p.m.</p>
                                        <p style="overflow:hidden;text-overflow:ellipsis;white-space:nowrap;">
                                            Ya está listo el backend del e-learning?.
                                        </p>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="message-preview">
                            <a href="#">
                                <div class="media">
                                    <span class="pull-left">
                                        <img class="media-object" src="" alt="">
                                    </span>
                                    <div class="media-body">
                                        <h5 class="media-heading"><strong>Cesar Vallejos</strong>
                                        </h5>
                                        <p class="small text-muted"><i class="fa fa-clock-o"></i> 10/09/2014 a las 4:32 p.m.</p>
                                        <p style="overflow:hidden;text-overflow:ellipsis;white-space:nowrap;">
                                            Pruebas realizadas satisfactoriamente. Está perfecto.
                                        </p>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="message-preview">
                            <a href="#">
                                <div class="media">
                                    <span class="pull-left">
                                        <img class="media-object" src="" alt="">
                                    </span>
                                    <div class="media-body">
                                        <h5 class="media-heading"><strong>Cintia Yalle</strong>
                                        </h5>
                                        <p class="small text-muted"><i class="fa fa-clock-o"></i> 10/09/2014 a las 4:32 p.m.</p>
                                        <p style="overflow:hidden;text-overflow:ellipsis;white-space:nowrap;">
                                            (Y)
                                        </p>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="message-footer">
                            <a href="#">Ver todos los mensajes</a>
                        </li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user text-primary"></i> <?= $_SESSION['admin']['nombre']; ?> <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <!--
                        <li>
                            <a href="#"><i class="fa fa-fw fa-user text-primary"></i> Perfil</a>
                        </li>
                        -->
                        <!--
                        <li>
                            <a href="#"><i class="fa fa-fw fa-envelope"></i> Inbox</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-fw fa-gear"></i> Settings</a>
                        </li>
                        
                        <li class="divider"></li>
                        -->
                        <li>
                            <a href="index.php?modulo=administracion&accion=logout"><i class="fa fa-fw fa-power-off text-danger"></i> Cerrar sesión</a>
                        </li>
                    </ul>
                </li>
            </ul>