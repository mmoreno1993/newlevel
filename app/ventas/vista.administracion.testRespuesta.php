<div class="row">
    <div class="col-xs-12">
        <div class="page-header">
            <h1 class="text-info">
                <b><a href="index.php?modulo=administracion&accion=cursoDetalle&cod=<?=$this->preguntaActual[0]['codigoCurso']; ?>"><?php echo ucfirst($this->preguntaActual[0]['curso']); ?></a> - </b> <small><?php echo $this->preguntaActual[0]['pregunta'] ?></small> 
            </h1>    
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xs-12">
        <div class="panel panel-success">
            <div class="panel-heading">
                <span class="glyphicon glyphicon-folder-open"></span>
                &nbsp; Temas
            </div>
            <div align="center" class="panel-body">
                <form method="POST" action="index.php?modulo=administracion&accion=testRespuesta&cod=<?= $this->codigoTest; ?>" >
                    <div align="left" class="table-responsive" id="resultado_filtro">
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr class="success">
                                    <th>&nbsp;</th>
                                    <th>Respuesta</th>
                                    <th>Orden</th>
                                    <th>Verdadera</th>
                                    <th>Ultima Modificación</th>
                                    <th>Modificar</th>
                                </tr>
                            </thead>
                            <tbody class="registroCursos">
                                <?php
                                    for($i=0;$i<count($this->respuesta['lista']);$i++){
                                        echo '<tr>';
                                        echo '<td><input value="'.$this->respuesta['lista'][$i]['codigo'].'" name="chkrespuesta[]" type="checkbox" /></td>';
                                        echo '<td>'.$this->respuesta['lista'][$i]["respuesta"].'</td>';
                                        echo '<td>'.$this->respuesta['lista'][$i]["orden"].'</td>';
                                        echo '<td>'.$this->respuesta['lista'][$i]["verdadero"].'</td>';
                                        echo '<td>'.$this->respuesta['lista'][$i]["modificado_por"].'</td>';
                                        echo '<td align="center"><a href="#" role="menuitem" data-toggle="modal" data-target="#editarRespuesta" tabindex="-1"';
                                        echo "onclick=editarRespuesta('index.php?modulo=administracion&accion=editarRespuesta&cod=".$_GET['cod']."&respuesta=".$this->respuesta['lista'][$i]['codigo']."&ajax=1')";
                                        echo '>';
                                        echo '<span class="glyphicon glyphicon-pencil text-warning"></span></a></td>';
                                        echo '</tr>';
                                    }
                                ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="6">
                                        <div class="paginacion_desc col-xs-6 col-md-6">
                                            <?php echo $this->respuesta['descripcion'] ?>
                                        </div>
                                        <!-- Paginación-->
                                        <div class="col-xs-6 col-md-6 text-right">
                                            <?php echo $this->respuesta['botones'] ?>
                                        </div>
                                        <!-- Fin Paginación-->
                                    </td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <input style="display:none;" type="submit" name="btnEliminar" id="btnEliminar" />
                </form>
                <button style="width:110px;" role="menuitem" data-toggle="modal" data-target="#crearTema" tabindex="-1" href="#" class="btn btn-primary">
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
                <div align="left" class="modal fade" id="editarRespuesta" tabindex="-1" role="dialog" aria-labelledby="#editarRespuesta" aria-hidden="true">
                    
                </div>
                <div align="left" class="modal fade" id="crearTema" tabindex="-1" role="dialog" aria-labelledby="#crearTema" aria-hidden="true">
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
                </div>
            </div>
        </div>
    </div>
</div>
<br><br><br><br><br>
<br><br><br><br><br>
<script>

   function editarRespuesta(url){
        url = url + "#editarRespuesta";
        $('#editarRespuesta').load(url, function() {
            $('#editarRespuesta').slideDown('slow');
        });
   }

</script>