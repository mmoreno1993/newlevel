<div id="modal_nuevo_tipocambio" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Nuevo Tipo de Cambio</h4>
            </div>
            <form autocomplete="off" name="frmNuevoTipoCambio" method="POST" action="index.php?modulo=configuracion&accion=tipocambio">
                <div class="modal-body">
                    <label for="txtcambiocompra">Compra</label>
                    <input id="txtcambiocompra" name="txtcambiocompra" class="form-control" type="text" />
                    <label for="txtcambioventa">Venta</label>
                    <input id="txtcambioventa" name="txtcambioventa" class="form-control" type="text" />
                    <label for="txtfecha">Fecha</label>
                    <input readonly required id="txtfecha" value="<?php echo date('Y-m-d'); ?>" name="txtfecha" class="form-control datepicker" type="text" />
                </div>
                <div class="modal-footer">
                    <button name="btnNuevoTipoCambio" type="submit" class="btn btn-primary">
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
<div id="modal_modificar_tipocambio" class="modal fade">
</div>
<div class="row">
    <div class="col-lg-12">
        <h3 class="page-header"><i class="icon_document_alt"></i> Configuración</h3>
        <ol class="breadcrumb">
            <li><i class="fa fa-home"></i><a href="index.php?modulo=configuracion&accion=tipocambio">Configuración</a></li>
            <li><i class="fa fa-laptop"></i>Reg. Tipo Cambio</li>                          
        </ol>
    </div>
</div>
<div class="row">
    <div class="col-xs-12">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <font color="white"><b>Registro de Tipos de Cambio</b></font>
            </div>
            <div class="panel-body">
                <form action="index.php?modulo=configuracion&accion=tipocambio" method="POST">
                    <div class="row">
                        <div class="col-sm-4">
                            <label>Filtro por:</label>
                            <select class="form-control">
                                <option selected>Fecha</option>
                            </select>
                        </div>
                        <div class="col-sm-4">
                            <label>Desde:</label>
                            <input type="text" class="form-control" />
                        </div>
                        <div class="col-sm-4">
                            <label>Hasta:</label>
                            <input type="text" class="form-control" />
                        </div>
                    </div>
                    <br>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr class="info">
                                    <th>&nbsp;</th>
                                    <th>Fecha</th>
                                    <th>Compra</th>
                                    <th>Venta</th>
                                    <th>Última modificación</th>
                                    <th>Modificar</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    for ($i=0; $i < count($this->tiposcambio) ; $i++) { 
                                ?>
                                <tr>
                                    <td><input name="chkTipoCambio[]" value="<?php echo $this->tiposcambio[$i]['id']; ?>" type="checkbox" /></td>
                                    <td><?php echo $this->tiposcambio[$i]['fecha']; ?></td>
                                    <td><?php echo $this->tiposcambio[$i]['cambio_compra']; ?></td>
                                    <td><?php echo $this->tiposcambio[$i]['cambio_venta']; ?></td>
                                    <td><?php echo $this->tiposcambio[$i]['ultima_modificacion']; ?></td>
                                    <td><a data-toggle="modal" data-target="#modal_modificar_tipocambio" href="#" onclick="modificarAlmacen('index.php?modulo=configuracion&accion=modificarTipoCambio&tipocambio=<?php echo $this->tiposcambio[$i]['id']; ?>&ajax=1');"><span class="glyphicon glyphicon-pencil"></span></a></td>
                                </tr>
                                <?php 
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                    <div align="center">
                        <button style="width:100px;" data-toggle="modal" data-target="#modal_nuevo_tipocambio" class="btn btn-primary">
                            <span class="glyphicon glyphicon-plus"></span>
                            Nuevo
                        </button>
                        <button name="btnEliminarTipoCambio" type="submit" style="width:100px;" class="btn btn-primary">
                            <span class="glyphicon glyphicon-remove"></span>
                            Eliminar
                        </button>
                        <button style="width:100px;" class="btn btn-primary">
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
function modificarTipoCambio(url){
    $('#modal_modificar_tipocambio').load(url);
}
</script>