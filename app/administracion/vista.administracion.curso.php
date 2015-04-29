<br><br>
<div class="row">
    <div class="col-xs-12">
        <div class="alert alert-info">
            <b>Solo se podrán habilitar los cursos que tengan temas y preguntas.</b>
        </div>
        <div class="panel panel-red">
            <div class="panel-heading">
                <span class="glyphicon glyphicon-folder-open"></span>
                &nbsp; Cursos
            </div>
            <div align="center" class="panel-body" >
                <form method="POST" action="index.php?modulo=administracion&accion=curso" >
                    <div align="left" id="resultado_filtro" class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr class="danger">
                                    <th>
                                        &nbsp;
                                    </th>
                                    <th>Curso</th>
                                    <th>Ultima Modificación</th>
                                    <th>Estado</th>
                                    <th>Detalle</th>
                                    <th>Modificar</th>
                                </tr>
                            </thead>
                            
                            <tbody class="registroCursos">
                                <?php
                                    for($i=0;$i<count($this->paginador['lista']);$i++){
                                        echo '<tr>';
                                        echo '<td><input name="chkcursos[]" type="checkbox" value="'.$this->paginador['lista'][$i]["codigo"].'" /></td>';
                                        echo '<td>'.$this->paginador['lista'][$i]["curso"].'</td>';
                                        echo '<td>'.$this->paginador['lista'][$i]["modificado_por"].'</td>';
                                        echo '<td align="center"><img src="assets/img/icon/'.$this->paginador['lista'][$i]["estado"].'" /></td>';
                                        echo '<td align="center"><a href="index.php?modulo=administracion&accion=cursoDetalle&cod='.$this->paginador['lista'][$i]["codigo"].'"><span class="glyphicon glyphicon-th text-info"></span></a></td>';
                                        echo '<td align="center"><a role="menuitem" data-toggle="modal" data-target="#editarCurso" tabindex="-1" ';
                                        echo "onclick=editarCurso('index.php?modulo=administracion&accion=cursoEditar&cod=".$this->paginador['lista'][$i]["codigo"]."&ajax=1')";
                                        echo ' href="#"><span class="glyphicon glyphicon-pencil text-warning"></span></a></td>';
                                        echo '</tr>';
                                    }
                                ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="6">
                                        <div class="paginacion_desc col-xs-6 col-md-6">
                                            <?php echo $this->paginador['descripcion'] ?>
                                        </div>
                                        <!-- Paginación-->
                                        <div class="col-xs-6 col-md-6 text-right">
                                            <?php echo $this->paginador['botones'] ?>
                                        </div>
                                        <!-- Fin Paginación-->
                                    </td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <input style="display:none;" type="submit" name="btnEliminar" id="btnEliminar" />
                    <input style="display:none;" type="submit" name="btnhabilitar" id="btnhabilitar" />
                    <input style="display:none;" type="submit" name="btndeshabilitar" id="btndeshabilitar" />
                </form>
                <button style="width:110px;" role="menuitem" data-toggle="modal" data-target="#crearCurso" tabindex="-1" href="#" class="btn btn-primary">
                    <span class="glyphicon glyphicon-plus"></span>
                    Nuevo
                </button>
                <button style="width:110px;" role="menuitem" data-toggle="modal" data-target="#eliminarSeleccion" tabindex="-1" href="#" class="btn btn-danger">
                    <font color="white">
                    <span class="glyphicon glyphicon-remove"></span>
                    Eliminar
                    </font>
                </button>
                <button style="width:110px;" onclick="$('.spanCambiarEstado').text('habilitar');" role="menuitem" data-toggle="modal" data-target="#cambiarEstado" tabindex="-1" href="#" class="btn btn-success">
                    <font color="white">
                    <span class="glyphicon glyphicon-check"></span>
                    Habilitar
                    </font>
                </button>
                <button style="width:110px;" onclick="$('.spanCambiarEstado').text('deshabilitar');" role="menuitem" data-toggle="modal" data-target="#cambiarEstado" tabindex="-1" href="#" class="btn btn-warning">
                    <font color="white">
                    <span class="glyphicon glyphicon-check"></span>
                    DesHabilitar
                    </font>
                </button>
                <div align="left" class="modal fade" id="eliminarSeleccion" tabindex="-1" role="dialog" aria-labelledby="#eliminarSeleccion" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header btn-danger">
                                <button type="button" class="close" data-dismiss="modal">
                                    <span aria-hidden="true">&times;</span>
                                    <span class="sr-only">Close</span>
                                </button>
                                <h4 class="modal-title">Eliminar</h4>
                            </div>
                            <div class="modal-body">
                                ¿Desea eliminar los registros seleccionados?
                            </div>
                            <div class="modal-footer" align="center">
                                <button type="button" class="btn btn-danger" onclick="$('#btnEliminar').click();">
                                    <span class="glyphicon glyphicon-check"></span>
                                    &nbsp; Sí
                                </button>
                                <button type="button" class="btn btn-primary" data-dismiss="modal">
                                    <span class="glyphicon glyphicon-remove"></span>
                                    &nbsp; No
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div align="left" class="modal fade" id="cambiarEstado" tabindex="-1" role="dialog" aria-labelledby="#cambiarEstado" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header btn-warning">
                                <button type="button" class="close" data-dismiss="modal">
                                    <span aria-hidden="true">&times;</span>
                                    <span class="sr-only">Close</span>
                                </button>
                                <h4 class="modal-title">Cambiar estado</h4>
                            </div>
                            <div class="modal-body">
                                ¿Desea <span class="spanCambiarEstado"></span> los registros seleccionados?
                            </div>
                            <div class="modal-footer" align="center">
                                <button type="button" class="btn btn-primary" onclick="$('#btn'+($('.spanCambiarEstado').text())).click();">
                                    <span class="glyphicon glyphicon-check"></span>
                                    &nbsp; Sí
                                </button>
                                <button type="button" class="btn btn-danger" data-dismiss="modal">
                                    <span class="glyphicon glyphicon-remove"></span>
                                    &nbsp; No
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div align="left" class="modal fade" id="crearCurso" tabindex="-1" role="dialog" aria-labelledby="#crearCurso" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header btn-success">
                                <button type="button" class="close" data-dismiss="modal">
                                    <span aria-hidden="true">&times;</span>
                                    <span class="sr-only">Close</span>
                                </button>
                                <h4 class="modal-title">Crear Curso</h4>
                            </div>
                            
                            <form id="frmCurso" name="frmCurso" method="POST" action="index.php?modulo=administracion&accion=curso" autocomplete="off">
                                <div class="modal-body">
                                    <label for="txtCurso">Nombre del Curso</label>
                                    <input required class="form-control" maxlength="70" name="txtCurso" id="txtCurso" />
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
                </div>
                <div align="left" class="modal fade" id="editarCurso" tabindex="-1" role="dialog" aria-labelledby="#editarCurso" aria-hidden="true">
                    
                </div>
            </div>
        </div>
        <div class="alert alert-danger">
            <b>No se eliminarán los cursos que tengan temas o preguntas.</b>
        </div>
    </div>
</div>
<script>

   function editarCurso(url){
        url = url + "#editarCurso";
        $('#editarCurso').load(url, function() {
            $('#editarCurso').slideDown('slow');
        });
   }

</script>
<br>
<br>
<br>
<br>
<br>