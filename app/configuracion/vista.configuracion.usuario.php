<div id="modal_nuevo_usuario" data-backdrop="static" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Nuevo Usuario</h4>
            </div>
            <form autocomplete="off" name="frmNuevoUsuario" method="POST" action="index.php?modulo=configuracion&accion=usuario">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-6">
                            <label for="txtalias">Alias(*)</label>
                            <input required id="txtalias" name="txtalias" class="form-control" type="text" />
                        </div>
                        <div class="col-sm-6">
                            <label for="txtpassword">Password(*)</label>
                            <input required id="txtpassword" name="txtpassword" class="form-control" type="password" />
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <label for="txtapepat">Apellido Paterno</label>
                            <input id="txtapepat" name="txtapepat" class="form-control" type="text" />        
                        </div>
                        <div class="col-sm-6">
                            <label for="txtapemat">Apellido Materno</label>
                            <input id="txtapemat" name="txtapemat" class="form-control" type="text" />        
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <label for="txtnombre_1">Primer Nombre</label>
                            <input id="txtnombre_1" name="txtnombre_1" class="form-control" type="text" />
                        </div>
                        <div class="col-sm-6">
                            <label for="txtnombre_2">Segundo Nombre</label>
                            <input id="txtnombre_2" name="txtnombre_2" class="form-control" type="text" />
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <label for="txtcorreo">Correo</label>
                            <input id="txtcorreo" name="txtcorreo" class="form-control" type="email" />
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12">
                            <label for="txtdireccion">Direccion</label>
                            <input id="txtdireccion" name="txtdireccion" class="form-control" type="text" />
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4">
                            <label for="txttelefono">Telefono</label>
                            <input id="txttelefono" name="txttelefono" class="form-control" type="text" />
                        </div>                        
                        <div class="col-sm-4">
                            <label for="txtdni">DNI</label>
                            <input maxlength="8" id="txtdni" name="txtdni" class="form-control" type="text" />
                        </div>                        
                        <div class="col-sm-4">
                            <label for="txtfechanacimiento">Fecha de Nacimiento</label>
                            <input readonly id="txtfechanacimiento" name="txtfechanacimiento" class="form-control datepicker" type="text" />
                        </div>                   
                    </div>
                    <div class="row">
                        <!--
                        <div class="col-sm-6">
                            <label for="txttrabajador">Trabajador</label>
                            <input id="txttrabajador" name="txttrabajador" class="form-control" type="text" />
                        </div>
                    -->
                        <div class="col-sm-12">
                            <br>
                            <label>Tipo de Usuario</label>
                            <select>
                                <option value="0">Usuario</option>
                                <option value="0">Administrador</option>
                            </select>
                        </div>
                        <div class="col-sm-6">
                            <label for="rdtipousuario_1">Administrador</label><input id="rdtipousuario_1" value="1" name="rdtipousuario" type="radio" />
                            
                        </div>
                        <div class="col-sm-6">
                            <label for="rdtipousuario_2">Usuario</label><input id="rdtipousuario_2" value="0" name="rdtipousuario" type="radio" />
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button name="btnNuevoUsuario" type="submit" class="btn btn-primary">
                        <span class="glyphicon glyphicon-pencil"></span>
                        Guardar
                    </button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">
                        <span class="glyphicon glyphicon-remove"></span>
                        Close
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<div id="modal_modificar_usuario" data-backdrop="static" class="modal fade">
</div>
<div class="row">
    <div class="col-lg-12">
        <h3 class="page-header"><i class="icon_document_alt"></i> Configuración</h3>
        <ol class="breadcrumb">
            <li><i class="fa fa-home"></i><a href="#">Configuración</a></li>
            <li><i class="fa fa-laptop"></i>Reg. Usuario</li>                          
        </ol>
    </div>
</div>
<div class="row">
    <div class="col-xs-12">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <font color="white"><b>Registro de Usuarios</b></font>
            </div>
            <div class="panel-body">
                <form action="index.php?modulo=configuracion&accion=usuario" method="POST">
                    <div class="table-responsive">
                        <table class="table table-bordered display tablafiltro">
                            <thead>
                                <tr class="info">
                                    <th>&nbsp;</th>
                                    <th>Usuario</th>
                                    <th>Contraseña</th>
                                    <th>Última modificación</th>
                                    <th>Modificar</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    for ($i=0; $i < count($this->usuarios) ; $i++) { 
                                ?>
                                <tr>
                                    <td><input name="chkUsuario[]" value="<?php echo $this->usuarios[$i]['id']; ?>" type="checkbox" /></td>
                                    <td><?php echo $this->usuarios[$i]['usuario']; ?></td>
                                    <td>****</td>
                                    <td><?php echo $this->usuarios[$i]['ultima_modificacion']; ?></td>
                                    <td><a data-toggle="modal" data-target="#modal_modificar_usuario" href="#" onclick="modificarUsuario('index.php?modulo=configuracion&accion=modificarUsuario&usuario=<?php echo $this->usuarios[$i]['id']; ?>&ajax=1');"><span class="glyphicon glyphicon-pencil"></span></a></td>
                                </tr>
                                <?php 
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                    <div align="center">
                        <button style="width:100px;" data-toggle="modal" data-target="#modal_nuevo_usuario" class="btn btn-primary">
                            <span class="glyphicon glyphicon-plus"></span>
                            Nuevo
                        </button>
                        <button name="btnEliminarUsuario" type="submit" style="width:100px;" class="btn btn-primary">
                            <span class="glyphicon glyphicon-remove"></span>
                            Eliminar
                        </button>
                        <button disabled style="width:100px;" class="btn btn-primary">
                            <i class="icon_document_alt"></i>
                            Reporte
                        </button>    
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
function modificarUsuario(url){
    $('#modal_modificar_usuario').load(url);
}
</script>