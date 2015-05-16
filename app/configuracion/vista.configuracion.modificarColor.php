<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Modificar Color</h4>
        </div>
        <form autocomplete="off" name="frmModificarColor" method="POST" action="index.php?modulo=configuracion&accion=color">
            <div class="modal-body">
                <input value="<?php echo $this->color[0]['id'] ?>" required id="txtid" name="txtid" class="form-control" type="hidden" />
                <label for="txtdescripcion">Descripción(*)</label>
                <input value="<?php echo $this->color[0]['descripcion'] ?>" required id="txtdescripcion" name="txtdescripcion" class="form-control" type="text" />
            </div>
            <div class="modal-footer">
                <button name="btnModificarColor" type="submit" class="btn btn-primary">
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