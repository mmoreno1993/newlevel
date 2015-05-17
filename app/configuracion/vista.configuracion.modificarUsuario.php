<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Modificar Usuario</h4>
        </div>
        <form autocomplete="off" name="frmModificarUsuario" method="POST" action="index.php?modulo=configuracion&accion=usuario">
            <div class="modal-body">
                <input value="<?php echo $this->usuario[0]['id'] ?>" required id="txtid" name="txtid" class="form-control" type="hidden" />
                <div class="row">
                    <div class="col-sm-6">
                        <label for="txtalias">Alias(*)</label>
                        <input value="<?php echo $this->usuario[0]['alias'] ?>" required id="txtalias" name="txtalias" class="form-control" type="text" />
                    </div>
                    <div class="col-sm-6">
                        <label for="txtpassword">Password(*)</label>
                        <input value="<?php echo $this->usuario[0]['password'] ?>" required id="txtpassword" name="txtpassword" class="form-control" type="password" />
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <label for="txtapepat">Apellido Paterno</label>
                        <input value="<?php echo $this->usuario[0]['apepat'] ?>" id="txtapepat" name="txtapepat" class="form-control" type="text" />        
                    </div>
                    <div class="col-sm-6">
                        <label for="txtapemat">Apellido Materno</label>
                        <input value="<?php echo $this->usuario[0]['apemat'] ?>" id="txtapemat" name="txtapemat" class="form-control" type="text" />        
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <label for="txtnombre_1">Primer Nombre</label>
                        <input value="<?php echo $this->usuario[0]['nombre_1'] ?>" id="txtnombre_1" name="txtnombre_1" class="form-control" type="text" />
                    </div>
                    <div class="col-sm-6">
                        <label for="txtnombre_2">Segundo Nombre</label>
                        <input value="<?php echo $this->usuario[0]['nombre_2'] ?>" id="txtnombre_2" name="txtnombre_2" class="form-control" type="text" />
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <label for="txtcorreo">Correo</label>
                        <input value="<?php echo $this->usuario[0]['correo'] ?>" id="txtcorreo" name="txtcorreo" class="form-control" type="email" />
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12">
                        <label for="txtdireccion">Direccion</label>
                        <input value="<?php echo $this->usuario[0]['direccion'] ?>" id="txtdireccion" name="txtdireccion" class="form-control" type="text" />
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-4">
                        <label for="txttelefono">Telefono</label>
                        <input value="<?php echo $this->usuario[0]['telefono'] ?>" id="txttelefono" name="txttelefono" class="form-control" type="text" />
                    </div>                        
                    <div class="col-sm-4">
                        <label for="txtdni">DNI</label>
                        <input value="<?php echo $this->usuario[0]['dni'] ?>" maxlength="8" id="txtdni" name="txtdni" class="form-control" type="text" />
                    </div>                        
                    <div class="col-sm-4">
                        <label for="txtfechanacimiento_">Fecha de Nacimiento</label>
                        <input value="<?php echo $this->usuario[0]['fecha_nacimiento'] ?>" readonly id="txtfechanacimiento_" name="txtfechanacimiento_" class="form-control datepicker" type="text" />
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
                    </div>
                    <div class="col-sm-6">
                        <label for="rdtipousuario_1_">Administrador</label><input <?php echo (($this->usuario[0]['tipo_usuario']=="1")?'checked':'') ?> id="rdtipousuario_1_" value="1" name="rdtipousuario" type="radio" />
                    </div>
                    <div class="col-sm-6">
                        <label for="rdtipousuario_2_">Usuario</label><input <?php echo (($this->usuario[0]['tipo_usuario']=="0")?'checked':'') ?> id="rdtipousuario_2_" value="0" name="rdtipousuario" type="radio" />
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button name="btnModificarUsuario" type="submit" class="btn btn-primary">
                    <span class="glyphicon glyphicon-pencil"></span>
                    Modificar
                </button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">
                    <span class="glyphicon glyphicon-remove"></span>
                    Close
                </button>
            </div>
        </form>
    </div>
</div>