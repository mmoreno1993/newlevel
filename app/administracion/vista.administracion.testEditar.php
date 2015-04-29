<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header btn-success">
            <button type="button" class="close" data-dismiss="modal">
                <span aria-hidden="true">&times;</span>
                <span class="sr-only">Close</span>
            </button>
            <h4 class="modal-title">Editar Test</h4>
        </div>
        <form id="frmTest" name="frmTest" method="POST" action="index.php?modulo=administracion&accion=cursoDetalle&cod=<?= $_GET['cod']?>" autocomplete="off">
            <div class="modal-body">
                <label for="descripcion">Pregunta</label>
                <input type="hidden" name="id" value="<?= $this->testEditar[0]['codigo']; ?>" />
                <textarea class="form-control" maxlength="150" name="descripcion" id="descripcion"><?= trim($this->testEditar[0]['test']); ?></textarea>
                <label for="orden">Nro. Orden</label>
                <input type="number" class="form-control" maxlength="2" name="orden" value="<?= trim($this->testEditar[0]['orden']); ?>" id="orden" />
                <label for="multiple">Respuesta Multiple</label>
                <select name="multiple" id="multiple" class="form-control">
                    <option <?php echo (($this->testEditar[0]['multiple']=='0')?'selected':''); ?> value="0">NO</option>
                    <option <?php echo (($this->testEditar[0]['multiple']=='1')?'selected':''); ?> value="1">SI</option>
                </select>
            </div>
            <div class="modal-footer" align="center">
                <button onclick="$('#btnEditarTest').click();" type="button" class="btn btn-success">
                    <span class="glyphicon glyphicon-pencil"></span>
                    &nbsp; Modificar
                </button>
                <input type="submit" name="btnEditarTest" id="btnEditarTest" style="display:none;" />
                <button type="button" class="btn btn-danger" data-dismiss="modal">
                    <span class="glyphicon glyphicon-remove"></span>
                    &nbsp; Cancelar
                </button>
            </div>
        </form>
    </div>
</div>