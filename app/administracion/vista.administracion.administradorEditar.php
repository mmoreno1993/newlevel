<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header btn-warning">
            <button type="button" class="close" data-dismiss="modal">
                <span aria-hidden="true">&times;</span>
                <span class="sr-only">Close</span>
            </button>
            <h4 class="modal-title">Editar Administrador</h4>
        </div>
        <form id="frmAdministrador" name="frmAdministrador" method="POST" action="index.php?modulo=administracion&accion=administrador" autocomplete="off" enctype="multipart/form-data">
            <div class="modal-body">
                <input type="hidden" value="<?php echo $this->administradorEditar[0]['codigo'] ?>" id="id" name="id" />
                <label for="nombre">Nombre</label>
                <input value="<?php echo $this->administradorEditar[0]['nombre'] ?>" required class="form-control" maxlength="70" name="nombre" id="nombre" />
                <label for="apellido_pat">Apellido Paterno</label>
                <input value="<?php echo $this->administradorEditar[0]['apellido_pat'] ?>" required class="form-control" maxlength="70" name="apellido_pat" id="apellido_pat" />
                <label for="apellido_mat">Apellido Materno</label>
                <input value="<?php echo $this->administradorEditar[0]['apellido_mat'] ?>" class="form-control" maxlength="70" name="apellido_mat" id="apellido_mat" />
                <label for="correo">Correo</label>
                <input value="<?php echo $this->administradorEditar[0]['correo'] ?>" required type="email" class="form-control" maxlength="150" name="correo" id="correo" />
                <label for="clave">Clave</label>
                <input value="<?php echo $this->administradorEditar[0]['clave'] ?>" required type="password" class="form-control" maxlength="50" name="clave" id="clave" />
                <label for="confclave">Confirme su Clave</label>
                <input value="<?php echo $this->administradorEditar[0]['clave'] ?>" required type="password" class="form-control" maxlength="50" name="confclave" id="confclave" />
                <label for="direccion">Dirección</label>
                <input value="<?php echo $this->administradorEditar[0]['direccion'] ?>" class="form-control" maxlength="70" name="direccion" id="direccion" />
                <label for="telefono">Teléfono</label>
                <input value="<?php echo $this->administradorEditar[0]['telefono'] ?>" class="form-control" maxlength="70" name="telefono" id="telefono" />
                <label for="foto">Foto</label><br>
                <img width="70" height="70" src="assets/img/foto/<?php echo $this->administradorEditar[0]['foto'] ?>" /><br><br>
                <input type="file"  maxlength="70" name="foto" id="foto" />
            </div>
            <div class="modal-footer" align="center">
                <button onclick="$('#btnEditar').click();" type="button" class="btn btn-success">
                    <span class="glyphicon glyphicon-pencil"></span>
                    &nbsp; Modificar
                </button>
                <input type="submit" name="btnEditar" id="btnEditar" style="display:none;" />
                <button type="button" class="btn btn-danger" data-dismiss="modal">
                    <span class="glyphicon glyphicon-remove"></span>
                    &nbsp; Cancelar
                </button>
            </div>
        </form>
    </div>
</div>