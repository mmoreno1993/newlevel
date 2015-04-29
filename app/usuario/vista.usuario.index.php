<div class="content" >
    <!-- Titulo-->
    <div class="main-header">
        <h2><?php echo ucfirst($this->modulo) ?></h2>
        <em>Estás en la sección de tu perfíl</em>
    </div>
    <!-- Fin Titulo-->
    <div class="main-content">
        <!-- Datos de mi perfil-->
        <div class="">
            <h5 style="margin: 0">Para cambiar la contraseña por favor clic en el boton de color naranja</h5>
        </div>
        <div class="tab-content profile-page" style="padding-top: 20px;">
            <div class="tab-pane profile active" id="profile-tab">
                <div class="row">
                    <!--Foto y envio de correo-->
                    <div class="col-md-3">
                        <div class="user-info-left">
                            <?php if ($this->usuario['foto'] != NULL) { ?>
                                <img src="assets/img/acceso/<?php echo $this->usuario['foto']; ?>" width="194" height="275" alt="Perfil de <?php echo $this->usuario['nombre']; ?>" />
                            <?php } else { ?>
                                <i class="fa fa-user fa-6" style="font-size: 20em"></i>
                            <?php } ?>
                            <h2 class="btn btn-block btn-custom-primary" id="nombreUsuario"><?php echo $this->usuario['nombre'] ?></h2>
                            <div class="hideEditar">
                                <a class="btn btn-block btn-info" data-toggle='modal' data-target='#modal_<?php echo $this->usuario['id'] ?>' href="index.php?modulo=<?php echo $this->modulo ?>&accion=editaryo&id=<?php echo $this->usuario['id'] ?>">
                                    <i class="fa fa-edit"></i>
                                    Editar
                                </a>
                            </div>
                        </div>
                    </div>
                    <!--Foto y envio de correo-->
                    <!--INFORMACION DE CONTACTO-->
                    <div class="col-md-9">
                        <div class="user-info-right">
                            <!--Informacion basica-->
                            <div class="basic-info">
                                <h3><i class="fa fa-square"></i>Información Basica</h3>
                                <p class="data-row">
                                    <span class="data-name">Usuario</span>
                                    <span class="data-value"><?php echo $this->usuario['nombre'] ?></span>
                                </p>
<!--                                <p class="data-row">
                                    <span class="data-name">Ultimo Ingreso</span>
                                    <span class="data-value">Hace 2 horas</span>
                                </p>-->
                                <p class="data-row">
                                    <span class="data-name">Fecha Registro</span>
                                    <span class="data-value"><?php echo $this->usuario['fechaCreado'] ?></span>
                                </p>
<!--                                <p class="data-row">
                                    
                                </p>-->
                            </div>
                            <!--fin Informacion basica-->
                            <!--Informacion contacto-->
<!--                            <div class="contact_info">
                                <h3><i class="fa fa-square"></i>Información Contacto</h3>
                                <p class="data-row">
                                    <span class="data-name">Email</span>
                                    <span class="data-value"><?php #echo $this->usuario['correo'] ?></span>
                                </p>
                                <p class="data-row">
                                    <span class="data-name">Telefono</span>
                                    <span class="data-value"><?php #echo $this->usuario['telefono'] ?></span>
                                </p>
                                <p class="data-row">
                                    <span class="data-name">Dirección</span>
                                    <span class="data-value"><?php #echo $this->usuario['direccion'] ?></span>
                                </p>
                            </div>-->
                            <!--Informacion contacto-->
                        </div>
                    </div>
                    <!--Fin INFORMACION DE CONTACTO-->
                </div>
            </div>
        </div>
        <!-- Fin datos de mi perfil-->
    </div>
    <!-- Modal -->
    <div class="modal fade" id="modal_<?php echo $this->usuario['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
            </div>
        </div>
    </div>
    <!-- Fin Modal -->
</div>
<script type="text/javascript">
    $(document).on('ready', function() {
        $('.hideEditar').hide();
    });
    $('#nombreUsuario').on('click', function() {
        $('.hideEditar').slideToggle('slow');
    });

</script>