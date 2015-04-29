<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header btn-success">
            <button type="button" class="close" data-dismiss="modal">
                <span aria-hidden="true">&times;</span>
                <span class="sr-only">Close</span>
            </button>
            <h4 class="modal-title">Crear Respuesta</h4>
        </div>
        <form id="frmRespuesta" name="frmRespuesta" method="POST" action="index.php?modulo=administracion&accion=testRespuesta&cod=<?= $this->codigoTest ?>" autocomplete="off">
            <div class="modal-body">
                <label for="txtrespuesta">Respuesta</label>
                <textarea required id="txtRespuesta" name="txtrespuesta" class="form-control"></textarea>
                <label for="ddlrespuesta">Respuesta correcta</label>
                <select id="ddlrespuesta" name="ddlrespuesta" class="form-control">
                    <option selected value="0">NO</option>
                    <option value="1">SI</option>
                </select>
                <label for="txtnro">Nro. de Orden</label>
                <input required type="number" class="form-control" maxlength="2" name="txtnro" id="txtnro" />
            </div>
            <div class="modal-footer" align="center">
                <button onclick="$('#btnGuardar').click();" type="button" class="btn btn-success">
                    <span class="glyphicon glyphicon-check"></span>
                    &nbsp; Guardar
                </button>
                <input type="submit" name="btnGuardar" id="btnGuardar" style="display:none;" />
                <button type="button" class="btn btn-danger" data-dismiss="modal">
                    <span class="glyphicon glyphicon-remove"></span>
                    &nbsp; Cancelar
                </button>
            </div>
        </form>
    </div>
</div>