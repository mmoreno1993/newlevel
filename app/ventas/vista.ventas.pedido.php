
<div id="modal_nuevo_pedido" data-backdrop="static" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Nuevo Pedido</h4>
            </div>
            <div class="modal-body">
                <form autocomplete="off">
                    <div class="row">
                        <div class="col-sm-8">
                            <label for="txtcliente">Cliente</label>
                            <input data-toggle="modal" data-target="#modal_obtener_clientes" id="txtcliente" name="txtcliente" readonly type="text" class="form-control" />
                        </div>
                        <div class="col-sm-4">
                            <br>
                            <label id="lblrazonsocial"></label>
                        </div>    
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <label for="txtfecharegistro">Fecha de Registro</label>
                            <input id="txtfecharegistro" name="txtfecharegistro" class="form-control datepicker" type="text" readonly />
                        </div>
                        <div class="col-sm-6">
                            <label for="txtfechavigencia">Fecha de Vigencia</label>
                            <input id="txtfechavigencia" name="txtfechavigencia" class="form-control datepicker" type="text" readonly />
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <label for="txtnumero">Número</label>
                            <input id="txtnumero" readonly name="txtnumero" type="text" class="form-control" />
                        </div>
                        <div class="col-sm-6">
                            <label for="cmbautomatico">Automático</label>
                            <select id="cmbautomatico" name="cmbautomatico" class="form-control">
                                <option selected value="0">SI</option>
                                <option value="1">NO</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4">
                            <label for="cmbmoneda">Moneda</label>
                            <select id="cmbmoneda" name="cmbmoneda" class="form-control">
                                <option selected value="0">Soles</option>
                                <option value="1">Dolares</option>
                            </select>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary">
                    <span class="glyphicon glyphicon-pencil"></span>
                    Guardar
                </button>
                <button style="width:100px;" data-toggle="modal" data-target="#modal_nuevo_pedido" class="btn btn-primary">
                    <span class="glyphicon glyphicon-plus"></span>
                    Nuevo
                </button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">
                    <span class="glyphicon glyphicon-remove"></span>
                    Close
                </button>
            </div>
        </div>
    </div>
</div>
<div id="modal_obtener_clientes" data-backdrop="static" class="modal fade">
    <style type="text/css">
        .seleccion:hover{
            cursor:pointer;
        }
    </style>
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Clientes</h4>
            </div>
            <form autocomplete="off" method="POST">
                <div class="modal-body">
                    <div class="table">
                        <table class="table table-responsive table-bordered display tablafiltro">
                            <thead>
                                <tr class="primary">
                                    <th>Código</th>
                                    <th>Descripción</th>
                                </tr>
                            </thead>
                            <?php
                            for ($i=0; $i <count($this->clientes) ; $i++) { 
                            ?>
                            <tbody>
                                <tr class="seleccion" onclick="$('#txtcliente').val('<?php echo $this->clientes[$i]['id'] ?>');$('#lblrazonsocial').text('<?php echo $this->clientes[$i]['descripcion'] ?>')" data-dismiss="modal">
                                    <td><?php echo $this->clientes[$i]['id'] ?> </td>
                                    <td><?php echo $this->clientes[$i]['descripcion'] ?> </td>
                                </tr>
                            </tbody>
                            <?php
                            }
                            ?>
                        </table>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<div id="modal_modificar_pedido" data-backdrop="static" class="modal fade">
</div>
<div class="row">
    <div class="col-lg-12">
        <h3 class="page-header"><i class="icon_document_alt"></i> Ventas</h3>
        <ol class="breadcrumb">
            <li><i class="fa fa-home"></i><a href="#">Ventas</a></li>
            <li><i class="fa fa-laptop"></i>Cotizacion</li>                          
        </ol>
    </div>
</div>
<div class="row">
    <div class="col-xs-12">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <font color="white"><b>Registro de Pedidos</b></font>
            </div>
            <div class="panel-body">
                <form action="" method="POST">
                    <div class="table-responsive">
                        <table class="table table-bordered display tablafiltro">
                            <thead>
                                <tr class="info">
                                    <th>&nbsp;</th>
                                    <th>Cliente</th>
                                    <th>Documento</th>
                                    <th>Estado</th>
                                    <th>Fecha de Registro</th>
                                    <th>Fecha de Vigencia</th>
                                    <th>Total</th>
                                    <th>Modificar</th>
                                    <th>Detalles</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    for ($i=0; $i <count($this->pedidos) ; $i++) { 
                                ?>
                                <tr>
                                    <td>
                                        <input name="chkPedido[]" value="" type="checkbox" />
                                    </td>
                                    <td><?php echo $this->pedidos[$i]['razonsocial']; ?></td>
                                    <td><?php echo $this->pedidos[$i]['numero']; ?></td>
                                    <td><?php echo $this->pedidos[$i]['estado']; ?></td>
                                    <td><?php echo $this->pedidos[$i]['fecha_registro']; ?></td>
                                    <td><?php echo $this->pedidos[$i]['fecha_vigencia']; ?></td>
                                    <td><?php echo $this->pedidos[$i]['total']; ?></td>
                                    <td><a href="index.php?modulo=ventas&accion=pedidoDetalle&pedido=<?php echo $this->pedidos[$i]['id']; ?>"><span class="glyphicon glyphicon-align-justify"></span></a></td>
                                    <td><a data-toggle="modal" data-target="#modal_modificar_pedido" href="#" onclick="modificarPedido('index.php?modulo=ventas&accion=modificarPedido&pedido=<?php echo $this->pedidos[$i]['id']; ?>&ajax=1');"><span class="glyphicon glyphicon-pencil"></span></a></td>
                                </tr>
                                <?php
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                    <div align="center">
                        <button style="width:100px;" data-toggle="modal" data-target="#modal_nuevo_pedido" class="btn btn-primary">
                            <span class="glyphicon glyphicon-plus"></span>
                            Nuevo
                        </button>
                        <button style="width:100px;" class="btn btn-primary">
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

function obtenerPedido(url)
{
    $('#modal_modificar_pedido').load(url);
}
</script>