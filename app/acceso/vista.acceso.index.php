<!DOCTYPE HTML>
<html lang="es">
    <head>
        <meta charset="utf-8" />
        <title>e-Learning STARSOFT</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="assets/css/bootstrap.css"/>
        <link rel="stylesheet" href="assets/css/bootstrap-theme.css"/>
        <link rel="stylesheet" href="assets/css/elearning.css"/>
        <script src="assets/js/jquery.js" ></script>
        <script src="assets/js/jquery-2.1.0.min.js" ></script>
        <script src="assets/js/bootstrap.js" ></script>
        <script src="assets/js/bootstrap-tour.custom.js" ></script>
        <script src="assets/js/elearning.js" language="javascript" ></script>
        
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="panel panel-primary" align="center">
                        <div class="panel-heading">
                            <img src="assets/img/logo/logo.png" width="210" height="70" alt="" />
                        </div>
                        <div class="panel-body" align="left">
                            <br>
                            <form method="POST">
                                <label for="txtcorreo">
                                    Correo:
                                </label>   
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <span class="glyphicon glyphicon-user"></span>
                                    </div>
                                    <input type="email" name="txtcorreo" id="txtcorreo" class="form-control" placeholder="Ingrese correo" />    
                                </div>
                                <br>
                                <label for="txtpassword">
                                    Password:
                                </label>  
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <span class="glyphicon glyphicon-lock"></span>
                                    </div>
                                    <input type="password" name="txtpassword" id="txtpassword" class="form-control" placeholder="Ingrese password" />
                                </div>
                                
                                <br>
                                <input id="rdadmin" name="tipoAcceso" type="radio" value="admin" /> <label for="rdadmin">Administración</label>
                                <input id="rduser" name="tipoAcceso" checked="" type="radio" value="user" /> <label for="rduser">Usuario</label>
                                <br><br>
                                <button align="center" name="acceso" class="btn btn-primary" >
                                    <span class="glyphicon glyphicon-ok"></span> Ingresar
                                </button>        
                            </form>
                        </div>
                        <div class="panel-footer" align="center">
                            Copyright © STARSOFT S.A.C.
                        </div>
                    </div>
                    <a href="#">Olvide mi contraseña</a>
                </div>
            </div>
        </div>
    </body>
</html>
