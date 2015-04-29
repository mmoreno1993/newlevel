<br><br>
<div class="row">
    <div class="col-xs-12">
        <div class="alert alert-warning">
            <b>No se podrán eliminar expositores que están siendo utilizados.</b>
        </div>
        <div class="panel panel-info">
            <div class="panel-heading">
                <span class="glyphicon glyphicon-folder-open"></span>
                &nbsp; Expositores
            </div>
            <div align="center" class="panel-body" >
                <form method="POST" action="index.php?modulo=administracion&accion=expositor" >
                    <div align="left" id="resultado_filtro" class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr class="info">
                                    <th>
                                        &nbsp;
                                    </th>
                                    <th>Nombre</th>
                                    <th>Correo</th>
                                    <th>Ultima Modificación</th>
                                    <th>Estado</th>
                                    <th>Modificar</th>
                                </tr>
                            </thead>
                            <tbody class="registroCursos">
                                <?php
                                    for($i=0;$i<count($this->paginador['lista']);$i++){
                                        echo '<tr>';
                                        echo '<td><input name="chkexpositor[]" type="checkbox" value="'.$this->paginador['lista'][$i]["codigo"].'" /></td>';
                                        echo '<td>'.$this->paginador['lista'][$i]["nombre"].'</td>';
                                        echo '<td>'.$this->paginador['lista'][$i]["correo"].'</td>';
                                        echo '<td>'.$this->paginador['lista'][$i]["modificado_por"].'</td>';
                                        echo '<td align="center"><img src="assets/img/icon/'.$this->paginador['lista'][$i]["estado"].'" /></td>';
                                        echo '<td align="center"><a role="menuitem" data-toggle="modal" data-target="#editarExpositor" tabindex="-1" ';
                                        echo "onclick=editarExpositor('index.php?modulo=administracion&accion=expositorEditar&cod=".$this->paginador['lista'][$i]["codigo"]."&ajax=1')";
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
                <div align="left" class="modal fade" id="crearCurso" tabindex="-1" role="dialog" aria-labelledby="#crearCurso" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header btn-info">
                                <button type="button" class="close" data-dismiss="modal">
                                    <span aria-hidden="true">&times;</span>
                                    <span class="sr-only">Close</span>
                                </button>
                                <h4 class="modal-title">Crear Expositor</h4>
                            </div>
                            <form id="frmExpositor" name="frmExpositor" method="POST" action="index.php?modulo=administracion&accion=expositor" autocomplete="off">
                                <div class="modal-body">
                                    <label for="nombre">Nombre</label>
                                    <input required class="form-control" maxlength="70" name="nombre" id="nombre" />
                                    <label for="apellido_pat">Apellido Paterno</label>
                                    <input required class="form-control" maxlength="70" name="apellido_pat" id="apellido_pat" />
                                    <label for="apellido_mat">Apellido Materno</label>
                                    <input class="form-control" maxlength="70" name="apellido_mat" id="apellido_mat" />
                                    <label for="correo">Correo</label>
                                    <input required type="email" class="form-control" maxlength="150" name="correo" id="correo" />
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
                <div align="left" class="modal fade" id="editarExpositor" tabindex="-1" role="dialog" aria-labelledby="#editarExpositor" aria-hidden="true">
                    
                </div>
            </div>
        </div>
        
    </div>
</div>
<script>

   function editarExpositor(url){
        url = url + "#editarExpositor";
        $('#editarExpositor').load(url, function() {
            $('#editarExpositor').slideDown('slow');
        });
   }

</script>
<br>
<br>
<br>
<br>
<br>