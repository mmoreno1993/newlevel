<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Modificar Forma de Pago</h4>
        </div>
        <form autocomplete="off" name="frmModificarFormaPago" method="POST" action="index.php?modulo=configuracion&accion=formapago">
            <div class="modal-body">
                <input value="<?php echo $this->formapago[0]['id'] ?>" required id="txtid" name="txtid" class="form-control" type="hidden" />
                <label for="txtdescripcion">Descripción(*)</label>
                <input value="<?php echo $this->formapago[0]['descripcion'] ?>" required id="txtdescripcion" name="txtdescripcion" class="form-control" type="text" />
                <label for="txtdia">Cantidad de días</label>
                <input value="<?php echo $this->formapago[0]['dia'] ?>" id="txtdia" name="txtdia" class="form-control" type="text" />
                <label for="chkdeposito">Deposito</label>
                <input <?php echo (($this->formapago[0]['deposito']=="1")?'checked':'') ?> value="1" id="chkdeposito" name="chkdeposito" type="checkbox" />
            </div>
            <div class="modal-footer">
                <button name="btnModificarFormaPago" type="submit" class="btn btn-primary">
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