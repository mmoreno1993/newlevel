<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header btn-success">
            <button type="button" class="close" data-dismiss="modal">
                <span aria-hidden="true">&times;</span>
                <span class="sr-only">Close</span>
            </button>
            <h4 class="modal-title">Editar Respuesta</h4>
        </div>
        <form id="frmTest" name="frmTest" method="POST" action="index.php?modulo=administracion&accion=testRespuesta&cod=<?= $_GET['cod']?>" autocomplete="off">
            <div class="modal-body">
                <label for="respuesta">Respuesta</label>
                <input type="hidden" name="id" value="<?= $this->respuestaEditar[0]['codigo']; ?>" />
                <textarea class="form-control" maxlength="150" name="respuesta" id="respuesta"><?= trim($this->respuestaEditar[0]['respuesta']); ?></textarea>
                <label for="orden">Nro. Orden</label>
                <input type="number" class="form-control" maxlength="2" name="orden" value="<?= trim($this->respuestaEditar[0]['orden']); ?>" id="orden" />
                <label for="multiple">Respuesta correcta</label>
                <select name="multiple" id="multiple" class="form-control">
                    <option <?php echo (($this->respuestaEditar[0]['verdadero']=='0')?'selected':''); ?> value="0">NO</option>
                    <option <?php echo (($this->respuestaEditar[0]['verdadero']=='1')?'selected':''); ?> value="1">SI</option>
                </select>
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