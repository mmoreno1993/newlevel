<!DOCTYPE HTML>
<html lang="es">
    <head>
        <meta charset="utf-8" />
        <title>New Level</title>
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
                <div class="col-xs-12 col-sm-offset-3 col-sm-6 col-md-offset-3 col-md-6">
                    <div class="panel panel-primary" align="center">
                        <div class="panel-heading">
                            <img src="assets/img/logonewlevel3.png" width="210" height="70" alt="" />
                        </div>
                        <div class="panel-body" align="left">
                            <br>
                            <form method="POST">
                                <label for="txtcorreo">
                                    Usuario:
                                </label>   
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <span class="glyphicon glyphicon-user"></span>
                                    </div>
                                    <input type="text" name="txtcorreo" id="txtcorreo" class="form-control" placeholder="Ingrese Usuario" />    
                                </div>
                                <br>
                                <label for="txtpassword">
                                    Contraseña:
                                </label>  
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <span class="glyphicon glyphicon-lock"></span>
                                    </div>
                                    <input type="password" name="txtpassword" id="txtpassword" class="form-control" placeholder="Ingrese Contraseña" />
                                </div>
                                <br>
                                <button onclick="index.php?modulo=configuracion&accion=articulo" align="center" name="acceso" class="btn btn-primary" >
                                    <span class="glyphicon glyphicon-ok"></span> 
                                    Ingresar
                                </button>        
                            </form>
                        </div>
                        <div class="panel-footer" align="center">
                            
                        </div>
                    </div>
                    <a href="#">Olvide mi contraseña</a>
                </div>
            </div>
        </div>
    </body>
</html>
