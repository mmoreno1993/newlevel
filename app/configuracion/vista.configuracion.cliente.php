<div id="modal_nuevo_cliente" data-backdrop="static" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Nuevo Cliente</h4>
            </div>
            <form autocomplete="off" name="frmNuevoCliente" method="POST" action="index.php?modulo=configuracion&accion=cliente">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-4">
                            <label for="txtruc">RUC</label>
                            <input maxlength="11" id="txtruc" name="txtruc" class="form-control" type="text" />
                        </div>
                        <div class="col-sm-8">
                            <label for="txtrazonsocial">Razón Social(*)</label>
                            <input required id="txtrazonsocial" name="txtrazonsocial" class="form-control" type="text" />
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12">
                            <label for="txtdireccion">Dirección</label>
                            <input id="txtdireccion" name="txtdireccion" class="form-control" type="text" />                            
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <label for="txttelefono">Telefono</label>
                            <input class="form-control" id="txttelefono" name="txttelefono" />
                        </div>
                        <div class="col-sm-6">
                            <label for="txttelefonomovil">Telefono Movil</label>
                            <input class="form-control" id="txttelefonomovil" name="txttelefonomovil" />
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12">
                            <label for="txtcontacto">Contacto</label>
                            <input id="txtcontacto" name="txtcontacto" class="form-control" type="text" />                            
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <label for="txtmontosoles">Cuenta Inicial Soles</label>
                            <input class="form-control" id="txtmontosoles" name="txtmontosoles" />
                        </div>
                        <div class="col-sm-6">
                            <label for="txtfechasoles">Fecha</label>
                            <input value="<?php echo date('Y-m-d') ?>" readonly class="form-control datepicker" id="txtfechasoles" name="txtfechasoles" />
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <label for="txtmontodolares">Cuenta Inicial Dolares</label>
                            <input class="form-control" id="txtmontodolares" name="txtmontodolares" />
                        </div>
                        <div class="col-sm-6">
                            <label for="txtfechadolares">Fecha</label>
                            <input value="<?php echo date('Y-m-d') ?>" readonly class="form-control datepicker" id="txtfechadolares" name="txtfechadolares" />
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <label for="cmbtipocliente">Tipo de Cliente</label>
                            <select id="cmbtipocliente" name="cmbtipocliente" class="form-control">
                                <option selected value="1">Minorista</option>
                                <option value="2">Mayorista</option>
                                <option value="3">Mayorista Preferencia</option>
                            </select>
                        </div>
                        <div class="col-sm-6">
                            <label for="txtgrupo">Grupo</label>
                            <input class="form-control" type="text" name="txtgrupo" id="txtgrupo" />
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button name="btnNuevoCliente" type="submit" class="btn btn-primary">
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
<div id="modal_modificar_cliente" data-backdrop="static" class="modal fade">
</div>
<div class="row">
    <div class="col-lg-12">
        <h3 class="page-header"><i class="icon_document_alt"></i> Configuración</h3>
        <ol class="breadcrumb">
            <li><i class="fa fa-home"></i><a href="#">Configuración</a></li>
            <li><i class="fa fa-laptop"></i>Reg. Cliente</li>                          
        </ol>
    </div>
</div>
<div class="row">
    <div class="col-xs-12">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <font color="white"><b>Registro de Clientes</b></font>
            </div>
            <div class="panel-body">
                <form action="" method="POST">
                    <div class="table-responsive">
                        <table class="table table-bordered display tablafiltro">
                            <thead>
                                <tr class="info">
                                    <th>&nbsp;</th>
                                    <th>RUC</th>
                                    <th>Cliente</th>
                                    <th>Última modificación</th>
                                    <th>Modificar</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    for ($i=0; $i < count($this->clientes) ; $i++) { 
                                ?>
                                <tr>
                                    <td><input name="chkCliente[]" value="<?php echo $this->clientes[$i]['id']; ?>" type="checkbox" /></td>
                                    <td><?php echo $this->clientes[$i]['ruc']; ?></td>
                                    <td><?php echo $this->clientes[$i]['razonsocial']; ?></td>
                                    
                                    <td><?php echo $this->clientes[$i]['ultima_modificacion']; ?></td>
                                    <td><a data-toggle="modal" data-target="#modal_modificar_cliente" href="#" onclick="modificarCliente('index.php?modulo=configuracion&accion=modificarCliente&cliente=<?php echo $this->clientes[$i]['id']; ?>&ajax=1');"><span class="glyphicon glyphicon-pencil"></span></a></td>
                                </tr>
                                <?php 
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                    <div align="center">
                        <button style="width:100px;" data-toggle="modal" data-target="#modal_nuevo_cliente" class="btn btn-primary">
                            <span class="glyphicon glyphicon-plus"></span>
                            Nuevo
                        </button>
                        <button name="btnEliminarCliente" type="submit" style="width:100px;" class="btn btn-primary">
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
function modificarCliente(url){
    $('#modal_modificar_cliente').load(url);
}

</script>