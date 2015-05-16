<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Modificar Cuenta Corriente</h4>
        </div>
        <form autocomplete="off" name="frmModificarCuentaCorriente" method="POST" action="index.php?modulo=configuracion&accion=cuentacorriente">
            <div class="modal-body">
                <input type="hidden" value="<?php echo $this->cuentacorriente[0]['tbl_banco_id']; ?>" name="banco" />
                <input value="<?php echo $this->cuentacorriente[0]['id'] ?>" required id="txtid" name="txtid" class="form-control" type="hidden" />
                <label for="txtcuentacorriente">Cuenta(*)</label>
                <input value="<?php echo $this->cuentacorriente[0]['cuenta'] ?>" required id="txtcuentacorriente" name="txtcuentacorriente" class="form-control" type="text" />
                <label for="cmbMoneda">Moneda</label>
                <select id="cmbMoneda" name="cmbMoneda" class="form-control">
                    <option <?php (($this->cuentacorriente[0]['moneda']==0)?'selected':''); ?> value="0">Soles</option>
                    <option <?php (($this->cuentacorriente[0]['moneda']==1)?'selected':''); ?> value="1">Dolares</option>
                </select>
            </div>
            <div class="modal-footer">
                <button name="btnModificarCuentaCorriente" type="submit" class="btn btn-primary">
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