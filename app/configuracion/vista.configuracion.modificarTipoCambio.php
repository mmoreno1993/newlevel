<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Modificar Tipo de Cambio</h4>
        </div>
        <form autocomplete="off" name="frmModificarTipoCambio" method="POST" action="index.php?modulo=configuracion&accion=tipocambio">
            <div class="modal-body">
                <input value="<?php echo $this->tipocambio[0]['id'] ?>" required id="txtid" name="txtid" class="form-control" type="hidden" />
                <label for="txtcambiocompra">Compra</label>
                <input value="<?php echo $this->tipocambio[0]['cambio_compra'] ?>" id="txtcambiocompra" name="txtcambiocompra" class="form-control" type="text" />
                <label for="txtcambioventa">Venta</label>
                <input value="<?php echo $this->tipocambio[0]['cambio_venta'] ?>" id="txtcambioventa" name="txtcambioventa" class="form-control" type="text" />
                <label for="txtfecha">Fecha</label>
                <input required value="<?php echo $this->tipocambio[0]['fecha'] ?>" id="txtfecha" name="txtfecha" class="form-control" type="text" />
            </div>
            <div class="modal-footer">
                <button name="btnModificarTipoCambio" type="submit" class="btn btn-primary">
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