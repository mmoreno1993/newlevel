<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header btn-success">
            <button type="button" class="close" data-dismiss="modal">
                <span aria-hidden="true">&times;</span>
                <span class="sr-only">Close</span>
            </button>
            <h4 class="modal-title">Editar Expositor</h4>
        </div>
        <form id="frmExpositor" name="frmExpositor" method="POST" action="index.php?modulo=administracion&accion=expositor" autocomplete="off">
            <div class="modal-body">
                <label for="nombre">Nombre</label>
                <input type="hidden" name="id" value="<?= $this->expositorEditar[0]['codigo']; ?>" />
                <input required class="form-control" maxlength="70" name="nombre" value="<?= trim($this->expositorEditar[0]['nombre']); ?>" id="nombre" />
                <label for="apellido_pat">Apellido Paterno</label>
                <input required class="form-control" maxlength="70" name="apellido_pat" value="<?= trim($this->expositorEditar[0]['apellido_pat']); ?>" id="apellido_pat" />
                <label for="apellido_mat">Apellido Materno</label>
                <input class="form-control" maxlength="70" name="apellido_mat" value="<?= trim($this->expositorEditar[0]['apellido_mat']); ?>" id="apellido_mat" />
                <label for="correo">Correo</label>
                <input required type="email" class="form-control" maxlength="150" name="correo" value="<?= trim($this->expositorEditar[0]['correo']); ?>" id="correo" />
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