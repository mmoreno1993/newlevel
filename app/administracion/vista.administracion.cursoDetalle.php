<div class="row">
    <div class="col-xs-12">
        <div class="page-header">
            <h1 class="text-info">
                <b><?php echo ucfirst($this->cursoActual[0]['curso']); ?></b>
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
                <form method="POST" action="index.php?modulo=administracion&accion=cursoDetalle&cod=<?= $_GET['cod']; ?>" >
                    <div align="left" class="table-responsive" id="resultado_filtro">
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr class="success">
                                    <th>&nbsp;</th>
                                    <th>Tema</th>
                                    <th>Orden</th>
                                    <th>Ultima Modificación</th>
                                    <th>Estado</th>
                                    <th>Modificar</th>
                                </tr>
                            </thead>
                            <tbody class="registroCursos">
                                <?php
                                    for($i=0;$i<count($this->tema['lista']);$i++){
                                        echo '<tr>';
                                        echo '<td><input value="'.$this->tema['lista'][$i]['codigo'].'" name="chktemas[]" type="checkbox" /></td>';
                                        echo '<td>'.$this->tema['lista'][$i]["tema"].'</td>';
                                        echo '<td>'.$this->tema['lista'][$i]["orden"].'</td>';
                                        echo '<td>'.$this->tema['lista'][$i]["modificado_por"].'</td>';
                                        echo '<td align="center"><img src="assets/img/icon/'.$this->tema['lista'][$i]["estado"].'" /></td>';
                                        
                                        echo '<td align="center"><a href="#" role="menuitem" data-toggle="modal" data-target="#editarTema" tabindex="-1"';
                                        echo "onclick=editarTema('index.php?modulo=administracion&accion=temaEditar&cod=".$_GET['cod']."&tema=".$this->tema['lista'][$i]['codigo']."&ajax=1')";
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
                                            <?php echo $this->tema['descripcion'] ?>
                                        </div>
                                        <!-- Paginación-->
                                        <div class="col-xs-6 col-md-6 text-right">
                                            <?php echo $this->tema['botones'] ?>
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
                <div align="left" class="modal fade" id="editarTema" tabindex="-1" role="dialog" aria-labelledby="#editarTema" aria-hidden="true">
                    
                </div>
                <div align="left" class="modal fade" id="crearTema" tabindex="-1" role="dialog" aria-labelledby="#crearTema" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header btn-success">
                                <button type="button" class="close" data-dismiss="modal">
                                    <span aria-hidden="true">&times;</span>
                                    <span class="sr-only">Close</span>
                                </button>
                                <h4 class="modal-title">Crear Tema</h4>
                            </div>
                            
                            <form id="frmCurso" name="frmCurso" method="POST" action="index.php?modulo=administracion&accion=cursoDetalle&cod=<?= $this->codigoCurso ?>" autocomplete="off">
                                <div class="modal-body">
                                    <label for="txtTema">Nombre del Tema</label>
                                    <input required type="text" class="form-control" maxlength="70" name="txtTema" id="txtTema" />
                                    <label for="urlTema">Código del tema[youtube]</label>
                                    <input required type="text" class="form-control" maxlength="50" name="urlTema" id="urlTema" />
                                    <label for="urlCaso">Código del caso[youtube]</label>
                                    <input required type="text" class="form-control" maxlength="50" name="urlCaso" id="urlCaso" />
                                    <label for="ddlexpositor">Expositor</label>
                                    <select id="ddlexpositor" name="ddlexpositor" class="form-control">
                                        <option selected value="null">Seleccione</option>
                                        <?php 
                                            if(count($this->expositor)!=0){
                                                foreach($this->expositor as $expositor){
                                                    echo '<option value="'.$expositor['codigo'].'">';
                                                    echo $expositor['expositor'];
                                                    echo '</option>';
                                                }
                                            }
                                        ?>
                                    </select>
                                    <label for="txtNro">Nro. de Orden</label>
                                    <input required type="number" class="form-control" maxlength="2" name="txtNro" id="txtNro" />
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
<div class="row">
    <div class="col-xs-12">
        <!--
        <div role="alert" class="alert alert-danger">
            <b>Recuerde que debe asignar un número de orden que no esté en uso, caso contrario se tomará el número de orden mayor disponible.</b>
        </div>
        -->
        <div class="panel panel-info">
            <div class="panel-heading">
                <span class="glyphicon glyphicon-folder-open"></span>
                &nbsp; Test
            </div>
            <div class="panel-body" align="center">
                <form name="frmTest" id="frmTest" method="POST" action="index.php?modulo=administracion&accion=cursoDetalle&cod=<?= $this->codigoCurso ?>" autocomplete="off">
                    <div align="left" id="resultado_filtro2" class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr class="info">
                                    <th>&nbsp;</th>
                                    <th>Nro.</th>
                                    <th>Pregunta</th>
                                    <th>R.Multiple</th>
                                    <th>Ultima Modificación</th>
                                    <th>Estado</th>
                                    <th>R.Detalle</th>
                                    <th>Modificar</th>
                                </tr>
                            </thead>
                            <tbody class="registroCursos">
                                <?php
                                    for($i=0;$i<count($this->test["lista"]);$i++)
                                    {
                                        echo '<tr>';
                                        echo '<td><input value="'.$this->test["lista"][$i]["codigo"].'" name="chktest[]" type="checkbox" /></td>';
                                        echo '<td>'.$this->test["lista"][$i]["orden"].'</td>';
                                        echo '<td>'.$this->test["lista"][$i]["pregunta"].'</td>';
                                        echo '<td>'.$this->test["lista"][$i]["multiple"].'</td>';
                                        echo '<td>'.$this->test["lista"][$i]["modificado_por"].'</td>';
                                        echo '<td align="center"><img src="assets/img/icon/'.$this->test["lista"][$i]["estado"].'" /></td>';
                                        echo '<td align="center"><a href="index.php?modulo=administracion&accion=testRespuesta&cod='.$this->test["lista"][$i]["codigo"].'"><span class="glyphicon glyphicon-folder-open text-warning"></span></a></td>';
                                        echo '<td align="center"><a href="#" role="menuitem" data-toggle="modal" data-target="#editarTest" tabindex="-1" ';
                                        echo " onclick=editarTest('index.php?modulo=administracion&accion=testEditar&cod=".$_GET['cod']."&test=".$this->test['lista'][$i]['codigo']."&ajax=1')";
                                        echo '>';
                                        echo '<span class="glyphicon glyphicon-pencil text-warning"></span></a></td>';
                                        echo '</tr>';
                                    }
                                ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="8">
                                        <div class="paginacion_desc col-xs-6 col-md-6">
                                            <?php echo $this->test['descripcion'] ?>
                                        </div>
                                        <!-- Paginación-->
                                        <div class="col-xs-6 col-md-6 text-right">
                                            <?php echo $this->test['botones'] ?>
                                        </div>
                                        <!-- Fin Paginación-->
                                    </td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <input style="display:none;" type="submit" name="btnEliminarTest" id="btnEliminarTest" />
                </form>
                <div align="left" class="modal fade" id="editarTest" tabindex="-1" role="dialog" aria-labelledby="#editarTest" aria-hidden="true">
                    
                </div>
                <div align="left" class="modal fade" id="crearTest" tabindex="-1" role="dialog" aria-labelledby="#crearTest" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header btn-success">
                                <button type="button" class="close" data-dismiss="modal">
                                    <span aria-hidden="true">&times;</span>
                                    <span class="sr-only">Close</span>
                                </button>
                                <h4 class="modal-title">Crear Test</h4>
                            </div>
                            <form id="frmTest" name="frmTest" method="POST" action="index.php?modulo=administracion&accion=cursoDetalle&cod=<?= $_GET['cod']?>" autocomplete="off">
                                <div class="modal-body">
                                    <label for="descripcion">Pregunta</label>
                                    <textarea class="form-control" maxlength="70" name="descripcion" id="descripcion"></textarea>
                                    <label for="orden">Nro. Orden</label>
                                    <input type="number" class="form-control" maxlength="70" name="orden" id="orden" />
                                    <label for="multiple">Respuesta Multiple</label>
                                    <select name="multiple" id="multiple" class="form-control">
                                        <option selected value="0">NO</option>
                                        <option value="1">SI</option>
                                    </select>
                                </div>
                                <div class="modal-footer" align="center">
                                    <button onclick="$('#btnCrearTest').click();" type="button" class="btn btn-success">
                                        <span class="glyphicon glyphicon-check"></span>
                                        &nbsp; Crear
                                    </button>
                                    <input type="submit" name="btnCrearTest" id="btnCrearTest" style="display:none;" />
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">
                                        <span class="glyphicon glyphicon-remove"></span>
                                        &nbsp; Cancelar
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div align="left" class="modal fade" id="eliminarSeleccionTest" tabindex="-1" role="dialog" aria-labelledby="#eliminarSeleccionTest" aria-hidden="true">
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
                                <button type="button" class="btn btn-danger" onclick="$('#btnEliminarTest').click();">
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
                <button style="width:110px;" role="menuitem" data-toggle="modal" data-target="#crearTest" tabindex="-1" href="#" class="btn btn-primary">
                    <span class="glyphicon glyphicon-plus"></span>
                    Nuevo
                </button>
                <button style="width:110px;" role="menuitem" data-toggle="modal" data-target="#eliminarSeleccionTest" tabindex="-1" href="#" class="btn btn-danger">
                    <font color="white">
                    <span class="glyphicon glyphicon-remove"></span>
                    Eliminar
                    </font>
                </button>
            </div>
        </div>
    </div>
</div>
<script>

   function editarTema(url){
        url = url + "#editarTema";
        $('#editarTema').load(url, function() {
            $('#editarTema').slideDown('slow');
        });
   }
   function editarTest(url){
        url = url + "#editarTest";
        $('#editarTest').load(url, function() {
            $('#editarTest').slideDown('slow');
        });
   }

</script>