<div id="modal_nueva_formapago" data-backdrop="static" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Nueva Forma de Pago</h4>
            </div>
            <form autocomplete="off" name="frmNuevoFormaPago" method="POST" action="index.php?modulo=configuracion&accion=formapago">
                <div class="modal-body">
                    <label for="txtdescripcion">Descripción(*)</label>
                    <input required id="txtdescripcion" name="txtdescripcion" class="form-control" type="text" />
                    <label for="txtdia">Cantidad de días</label>
                    <input id="txtdia" name="txtdia" class="form-control" type="text" />
                    <label for="chkdeposito">Deposito</label>
                    <input value="1" id="chkdeposito" name="chkdeposito" type="checkbox" />
                 

                </div>
                <div class="modal-footer">
                    <button name="btnNuevaFormaPago" type="submit" class="btn btn-primary">
                        <span class="glyphicon glyphicon-pencil"></span>
                        Guardar
                    </button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">
                        <span class="glyphicon glyphicon-remove"></span>
                        Close
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<div id="modal_modificar_formapago" data-backdrop="static" class="modal fade">
</div>
<div class="row">
    <div class="col-lg-12">
        <h3 class="page-header"><i class="icon_document_alt"></i> Configuración</h3>
        <ol class="breadcrumb">
            <li><i class="fa fa-home"></i><a href="#">Configuración</a></li>
            <li><i class="fa fa-laptop"></i>Reg. Forma Pago</li>                          
        </ol>
    </div>
</div>
<div class="row">
    <div class="col-xs-12">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <font color="white"><b>Registro de Forma de Pago</b></font>
            </div>
            <div class="panel-body">
                <form action="index.php?modulo=configuracion&accion=formapago" method="POST">
                    <div class="table-responsive">
                        <table class="table table-bordered display tablafiltro">
                            <thead>
                                <tr class="info">
                                    <th>&nbsp;</th>
                                    <th>Forma de Pago</th>
                                    <th>Última modificación</th>
                                    <th>Modificar</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    for ($i=0; $i < count($this->formaspago) ; $i++) { 
                                ?>
                                <tr>
                                    <td><input name="chkFormaPago[]" value="<?php echo $this->formaspago[$i]['id']; ?>" type="checkbox" /></td>
                                    <td><?php echo $this->formaspago[$i]['descripcion']; ?></td>
                                    <td><?php echo $this->formaspago[$i]['ultima_modificacion']; ?></td>
                                    <td><a data-toggle="modal" data-target="#modal_modificar_formapago" href="#" onclick="modificarFormaPago('index.php?modulo=configuracion&accion=modificarFormaPago&formapago=<?php echo $this->formaspago[$i]['id']; ?>&ajax=1');"><span class="glyphicon glyphicon-pencil"></span></a></td>
                                </tr>
                                <?php 
                                    }

                                ?>
                            </tbody>
                        </table>
                    </div>

                    <div align="center">
                        <button style="width:100px;" data-toggle="modal" data-target="#modal_nueva_formapago" class="btn btn-primary">
                            <span class="glyphicon glyphicon-plus"></span>
                            Nuevo
                        </button>
                        <button name="btnEliminarFormaPago" type="submit" style="width:100px;" class="btn btn-primary">
                            <span class="glyphicon glyphicon-remove"></span>
                            Eliminar
                        </button>
                        <button disabled style="width:100px;" class="btn btn-primary">
                            <i class="icon_document_alt"></i>
                            Reporte
                        </button>    
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
function modificarFormaPago(url){
    $('#modal_modificar_formapago').load(url);
}
</script>