<div id="modal_nuevo_color" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Nuevo Usuario</h4>
            </div>
            <form autocomplete="off" name="frmNuevoColor" method="POST" action="index.php?modulo=configuracion&accion=color">
                <div class="modal-body">
                    <label for="txtalias">Alias(*)</label>
                    <input required id="txtalias" name="txtalias" class="form-control" type="text" />
                    <label for="txtpassword">Password(*)</label>
                    <input required id="txtpassword" name="txtdescripcion" class="form-control" type="text" />
                    <label for="txtapepat">Apellido Paterno</label>
                    <input id="txtapepat" name="txtapepat" class="form-control" type="text" />
                    <label for="txtapemat">Apellido Materno</label>
                    <input id="txtapemat" name="txtapemat" class="form-control" type="text" />
                    <label for="txtnombre_1">Primer Nombre</label>
                    <input id="txtnombre_1" name="txtnombre_1" class="form-control" type="text" />
                    <label for="txtnombre_2">Segundo Nombre</label>
                    <input id="txtnombre_2" name="txtnombre_2" class="form-control" type="text" />

                    <label for="txtdireccion">Direccion</label>
                    <input id="txtdireccion" name="txtdireccion" class="form-control" type="text" />
                    <label for="txttelefono">Telefono</label>
                    <input id="txttelefono" name="txttelefono" class="form-control" type="text" />

                    <label for="txtdni">DNI</label>
                    <input id="txtdni" name="txtdni" class="form-control" type="text" />
                    <label for="txtfechanacimiento">Fecha de Nacimiento</label>
                    <input id="txtfechanacimiento" name="txtfechanacimiento" class="form-control" type="text" />

                    <label for="txttrabajador">Trabajador</label>
                    <input id="txttrabajador" name="txttrabajador" class="form-control" type="text" />
                    <label>Tipo de Usuario</label><br>
                    <label for="rdtipousuario_1">Administrador</label><input id="rdtipousuario_1" name="rdadmin" type="radio" /><br>
                    <label for="rdtipousuario_2">Usuario</label><input id="rdtipousuario_2" name="rdusuario" type="radio" />
                    

                </div>
                <div class="modal-footer">
                    <button name="btnNuevoColor" type="submit" class="btn btn-primary">
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
<div id="modal_modificar_color" class="modal fade">
</div>
<div class="row">
    <div class="col-lg-12">
        <h3 class="page-header"><i class="icon_document_alt"></i> Configuración</h3>
        <ol class="breadcrumb">
            <li><i class="fa fa-home"></i><a href="index.php?modulo=configuracion&accion=familia">Configuración</a></li>
            <li><i class="fa fa-laptop"></i>Reg. Familia</li>                          
        </ol>
    </div>
</div>
<div class="row">
    <div class="col-xs-12">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <font color="white"><b>Registro de Familias</b></font>
            </div>
            <div class="panel-body">
                <form action="index.php?modulo=configuracion&accion=color" method="POST">
                    <div class="row">
                        <div class="col-sm-4">
                            <label>Filtro por:</label>
                            <select class="form-control">
                                <option selected>Fecha</option>
                            </select>
                        </div>
                        <div class="col-sm-4">
                            <label>Desde:</label>
                            <input type="text" class="form-control" />
                        </div>
                        <div class="col-sm-4">
                            <label>Hasta:</label>
                            <input type="text" class="form-control" />
                        </div>
                    </div>
                    <br>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr class="info">
                                    <th>&nbsp;</th>
                                    <th>Color</th>
                                    <th>Última modificación</th>
                                    <th>Modificar</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    for ($i=0; $i < count($this->colores) ; $i++) { 
                                ?>
                                <tr>
                                    <td><input name="chkColor[]" value="<?php echo $this->colores[$i]['id']; ?>" type="checkbox" /></td>
                                    <td><?php echo $this->colores[$i]['descripcion']; ?></td>
                                    <td><?php echo $this->colores[$i]['ultima_modificacion']; ?></td>
                                    <td><a data-toggle="modal" data-target="#modal_modificar_color" href="#" onclick="modificarColor('index.php?modulo=configuracion&accion=modificarColor&color=<?php echo $this->colores[$i]['id']; ?>&ajax=1');"><span class="glyphicon glyphicon-pencil"></span></a></td>
                                </tr>
                                <?php 
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                    <div align="center">
                        <button style="width:100px;" data-toggle="modal" data-target="#modal_nuevo_color" class="btn btn-primary">
                            <span class="glyphicon glyphicon-plus"></span>
                            Nuevo
                        </button>
                        <button name="btnEliminarColor" type="submit" style="width:100px;" class="btn btn-primary">
                            <span class="glyphicon glyphicon-remove"></span>
                            Eliminar
                        </button>
                        <button style="width:100px;" class="btn btn-primary">
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
function modificarColor(url){
    $('#modal_modificar_color').load(url);
}
</script>