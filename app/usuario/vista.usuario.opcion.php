<div class="content" >
    <!-- Titulo-->
    <div class="main-header">
        <h2><?php echo ucfirst($this->accion) ?></h2>
        <em>Estás en la sección de tu <?php echo $this->accion ?> para configurar tu cuenta</em>
    </div>
    <!-- Fin Titulo-->
    <!-- Contenedor de la tabla-->
    <div class="main-content">
        <div class="row">
            <div class="col-md-8">
                <div class="widget widget-table">
                    <!-- Cabecera de mi tabla-->
                    <div class="widget-header">
                        <h3><i class="fa fa-users"></i>Tabla de Usuarios</h3>
                        <div class="btn-group widget-header-toolbar">
                            <a data-toggle='modal' data-target='#modal_crear'  href="index.php?modulo=<?php echo $this->modulo ?>&accion=crear" title="Agregar" class="btn-borderless tipTip"><i class="fa fa-plus-circle"></i></a>
                            <a href="#" id="tour-focus" title="Focus" class="btn-borderless btn-focus"><i class="fa fa-eye"></i></a>
                            <a href="#" title="Expand/Collapse" class="btn-borderless btn-toggle-expand"><i class="fa fa-chevron-up"></i></a>
                        </div>
                    </div>
                    <!-- fin Cabecera de mi tabla-->
                    <!-- Contenido de mi tabla-->
                    <div class="widget-content">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th class="text-center">Nro</th>
                                        <th class="text-center">Usuario</th>
                                        <th class="text-center">Perfil</th>
                                        <th class="text-center">Estado</th>
                                        <th class="text-center">Ultima Actualización</th>
                                        <th class="text-center">Accion</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if (isset($this->allUsuarios) and count($this->allUsuarios)) {
                                        $i = 1;
                                        foreach ($this->allUsuarios as $usuarios) {
                                            ?>
                                            <tr>
                                                <td class="text-center"><?php echo $i++; ?></td>
                                                <td class="text-center"><?php echo $usuarios['nombre'] ?></td>
                                                <td class="text-center"><?php echo $usuarios['perfil'] ?></td>
                                                <td class="text-center">
                                                    <?php if ($usuarios['estado'] == 1) { ?>
                                                        <a data-toggle='modal' data-target='#estado_<?php echo $usuarios['id'] ?>' href="index.php?modulo=<?php echo $this->modulo ?>&accion=cambiarEstado&id=<?php echo $usuarios['id'] ?>&estado=<?php echo $usuarios['estado'] ?>" ><img src="assets/img/icono/verde.png" /></a>
                                                    <?php } else { ?>
                                                        <a data-toggle='modal' data-target='#estado_<?php echo $usuarios['id'] ?>' href="index.php?modulo=<?php echo $this->modulo ?>&accion=cambiarEstado&id=<?php echo $usuarios['id'] ?>&estado=<?php echo $usuarios['estado'] ?>" ><img src="assets/img/icono/rojo.png" /></a>
                                                    <?php } ?>
                                                </td>
                                                <?php
                                                if ($usuarios['fecha_modificado'] == '' and $usuarios['fecha_modificado'] == NULL) {
                                                    $correoOriginal = $usuarios['creado_por'];
                                                    $correoCortar = explode('@', $correoOriginal);
                                                    $texto = date_format($usuarios['fecha_creado'], 'd/m/Y') . " por " . $correoCortar[0];
                                                    $textoTitle = "Fecha: " . date_format($usuarios['fecha_creado'], 'd/m/Y') . "<br>Hora: " . date_format($usuarios['fecha_creado'], 'H:i:s') . "<br>Usuario: " . $usuarios['creado_por'];
                                                } else {
                                                    $correoOriginal = $usuarios['modificado_por'];
                                                    $correoCortar = explode('@', $correoOriginal);
                                                    $texto = date_format($usuarios['fecha_modificado'], 'd/m/Y') . " por " . $correoCortar[0];
                                                    $textoTitle = "Fecha: " . date_format($usuarios['fecha_modificado'], 'd/m/Y') . "<br>Hora: " . date_format($usuarios['fecha_modificado'], 'H:i:s') . "<br>Usuario: " . $usuarios['modificado_por'];
                                                }
                                                ?>
                                                <td class="text-muted mutedhover text-center"><span class="tipTip" title="<?php echo $textoTitle ?>"><?php echo $texto ?> </span></td>
                                                <td class="text-center"><a data-toggle='modal' data-target='#modal_<?php echo $usuarios['id'] ?>' href="index.php?modulo=<?php echo $this->modulo ?>&accion=editar&id=<?php echo $usuarios['id'] ?>"><img src="assets/img/icono/editar.png" class="tipTip" title="Editar"/></a></td>
                                            </tr>
                                            <!-- Modal -->
                                        <div class="modal fade" id="modal_<?php echo $usuarios['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-sm">
                                                <div class="modal-content">
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Fin Modal -->

                                        <!-- Modal para CambiarEstado-->
                                        <div class="modal fade" id="estado_<?php echo $usuarios['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-sm">
                                                <div class="modal-content">
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Fin Modal para CambiarEstado-->

                                        <?php
                                    }
                                }
                                ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- Fin Contenido de mi tabla-->
                </div>

            </div>
            <div class="col-md-4">
                <!-- Leyenda -->
                <div class="widget widget-table">
                    <div class="widget-header">
                        <h3><i class="fa fa-bullhorn"></i>Leyenda</h3>
                    </div>
                    <div class="widget-content">
                        <p><img src="assets/img/icono/verde.png"/> : <span class="text-success">Indica que el usuario está activo</span></p>
                        <p><img src="assets/img/icono/rojo.png" /> : <span class="text-danger">Indica que el usuario está inactivo</span></p>
                        <p><img src="assets/img/icono/editar.png"/> : <span class="text-info">Edita un usuario</span></p>
                    </div>
                </div>
                <!-- Fin Leyenda -->
            </div>
        </div>
    </div>
    <!-- Fin Contenedor de la tabla-->
    <!-- Modal -->
    <div class="modal fade" id="modal_crear" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
            </div>
        </div>
    </div>
    <!-- Fin Modal -->
</div>
<style type="text/css">
    .mutedhover:hover{
        color: #000;
    }
</style>