<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header btn-success">
            <button type="button" class="close" data-dismiss="modal">
                <span aria-hidden="true">&times;</span>
                <span class="sr-only">Close</span>
            </button>
            <h4 class="modal-title">Editar Tema</h4>
        </div>
        <form id="frmCurso" name="frmCurso" method="POST" action="index.php?modulo=administracion&accion=cursoDetalle&cod=<?= $_GET['cod']?>" autocomplete="off">
            <div class="modal-body">
                <label for="descripcion">Nombre del Tema</label>
                <input type="hidden" name="id" value="<?php echo $_GET['tema']; ?>" />
                <input required type="text" class="form-control" maxlength="70" name="descripcion" id="descripcion" value="<?= $this->temaEditar[0]['descripcion'] ?>" />
                <label for="video">Código del tema[youtube]</label>
                <input required type="text" class="form-control" maxlength="50" name="video" id="video" value="<?= $this->temaEditar[0]['video'] ?>" />
                <label for="video_caso">Código del caso[youtube]</label>
                <input required type="text" class="form-control" maxlength="50" name="video_caso" id="video_caso" value="<?= $this->temaEditar[0]['video_caso'] ?>" />
                <label for="tbl_expositor_id">Expositor</label>
                <select id="tbl_expositor_id" name="tbl_expositor_id" class="form-control">
                    <?php 
                        if(count($this->expositor)!=0){
                            foreach($this->expositor as $expositor){
                                if($this->temaEditar[0]['tbl_expositor_id']==$expositor['codigo']){
                                    echo '<option selected value="'.$expositor['codigo'].'">';
                                }else{
                                    echo '<option value="'.$expositor['codigo'].'">';
                                }
                                echo $expositor['expositor'];
                                echo '</option>';
                            }
                        }
                    ?>
                </select>
                <label for="orden">Nro. de Orden</label>
                <input required type="number" class="form-control" value="<?= $this->temaEditar[0]['orden'] ?>" maxlength="2" name="orden" id="orden" />
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