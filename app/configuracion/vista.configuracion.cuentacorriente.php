<div id="modal_nueva_cuentacorriente" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Nueva Cuenta Corriente</h4>
            </div>
            <form autocomplete="off" name="frmNuevaCuentaCorriente" method="POST" action="index.php?modulo=configuracion&accion=cuentacorriente">
                <div class="modal-body">
                    <input name="banco" type="hidden" value="<?php echo $_GET['banco']; ?>" />
                    <label for="txtcuentacorriente">Cuenta(*)</label>
                    <input required id="txtcuentacorriente" name="txtcuentacorriente" class="form-control" type="text" />
                    <label for="cmbMoneda">Moneda</label>
                    <select id="cmbMoneda" name="cmbMoneda" class="form-control">
                        <option selected value="0">Soles</option>
                        <option value="1">Dolares</option>
                    </select>
                </div>
                <div class="modal-footer">
                    <button name="btnNuevaCuentaCorriente" type="submit" class="btn btn-primary">
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
<div id="modal_modificar_cuentacorriente" class="modal fade">
</div>
<div class="row">
    <div class="col-lg-12">
        <h3 class="page-header"><i class="icon_document_alt"></i> Configuración</h3>
        <ol class="breadcrumb">
            <li><i class="fa fa-home"></i><a href="#">Configuración</a></li>
            <li><i class="fa fa-laptop"></i><a href="index.php?modulo=configuracion&accion=banco">Reg. Banco</a></li>   
            <li><i class="fa fa-laptop"></i>Reg. Cuenta Corriente</li>                          
        </ol>
    </div>
</div>
<div class="row">
    <div class="col-xs-12">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <font color="white"><b>Registro de Cuentas</b></font>
            </div>
            <div class="panel-body">
                <form action="" method="POST">
                    <input type="hidden" name="banco" value="<?php echo $_GET['banco']; ?>" />
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
                                    <th>Cuenta Corriente</th>
                                    <th>Moneda</th>
                                    <th>Última modificación</th>
                                    <th>Modificar</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    for ($i=0; $i < count($this->cuentascorriente) ; $i++) { 
                                ?>
                                <tr>
                                    <td><input name="chkCuentaCorriente[]" value="<?php echo $this->cuentascorriente[$i]['id']; ?>" type="checkbox" /></td>
                                    <td><?php echo $this->cuentascorriente[$i]['cuenta']; ?></td>
                                    <td><?php echo (($this->cuentascorriente[$i]['moneda']=="0")?'Soles':'Dolares'); ?></td>
                                    <td><?php echo $this->cuentascorriente[$i]['ultima_modificacion']; ?></td>

                                    <td><a data-toggle="modal" data-target="#modal_modificar_cuentacorriente" href="#" onclick="modificarCuentaCorriente('index.php?modulo=configuracion&accion=modificarCuentaCorriente&cuentacorriente=<?php echo $this->cuentascorriente[$i]['id'].'&banco='.$_GET['banco']; ?>&ajax=1');"><span class="glyphicon glyphicon-pencil"></span></a></td>
                                </tr>
                                <?php 
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                    <div align="center">
                        <button style="width:100px;" data-toggle="modal" data-target="#modal_nueva_cuentacorriente" class="btn btn-primary">
                            <span class="glyphicon glyphicon-plus"></span>
                            Nuevo
                        </button>
                        <button name="btnEliminarCuentaCorriente" type="submit" style="width:100px;" class="btn btn-primary">
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
function modificarCuentaCorriente(url){
    $('#modal_modificar_cuentacorriente').load(url);
}
</script>