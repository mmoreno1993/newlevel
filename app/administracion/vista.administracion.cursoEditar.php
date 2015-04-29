<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header btn-success">
            <button type="button" class="close" data-dismiss="modal">
                <span aria-hidden="true">&times;</span>
                <span class="sr-only">Close</span>
            </button>
            <h4 class="modal-title">Editar Curso</h4>
        </div>
        <form id="frmCurso" name="frmCurso" method="POST" action="index.php?modulo=administracion&accion=curso" autocomplete="off">
            <div class="modal-body">
                <label for="txtCurso1">Nombre del Curso</label>
                <input type="hidden" name="id" value="<?= $this->cursoEditar[0]['codigo']; ?>" />
                <input required class="form-control" maxlength="70" name="txtCurso1" value="<?= trim($this->cursoEditar[0]['curso']); ?>" id="txtCurso1" />
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