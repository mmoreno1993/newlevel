
<div id="modal_modificar_pedidodetalle" data-backdrop="static" class="modal fade">
</div>
<div id="modal_nuevo_pedidodetalle" data-backdrop="static" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Nuevo Detalle del Pedido</h4>
            </div>
            <form autocomplete="off" method="POST">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-3">
                            <label for="txtarticulo">Artículo</label>
                            <input data-toggle="modal" data-target="#modal_obtener_articulos" id="txtarticulo" name="txtarticulo" readonly type="text" class="form-control" />
                        </div>
                        <div class="col-sm-9">
                            <label>&nbsp;</label>
                            <label class="form-control" disabled id="lblarticulo"></label>
                        </div>    
                    </div>
                    <div class="row">
                        <div class="col-sm-4">
                            <label for="txtcantidad">Cantidad</label>
                            <input id="txtcantidad" name="txtcantidad" class="form-control" type="text" />
                        </div>
                        <div class="col-sm-4">
                            <label for="txtpreciounitario">Precio Unitario</label>
                            <input id="txtpreciounitario" name="txtpreciounitario" class="form-control" type="text" />
                        </div>
                    	<div class="col-sm-4">
                    		<label for="txtdescuento">Descuento</label>
                            <input id="txtdescuento" name="txtdescuento" class="form-control" type="text" />
                    	</div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <label for="txtglosa">Glosa</label>
                            <textarea rows="5" maxlength="200" id="txtglosa" name="txtglosa" type="text" class="form-control"></textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button name="btnNuevoPedidoDetalle" type="submit" class="btn btn-primary">
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
<style type="text/css">
    .seleccion:hover{
        cursor:pointer;
    }
</style>
<div id="modal_obtener_articulos" data-backdrop="static" class="modal fade">
	<div class="modal-dialog">
	    <div class="modal-content">
	        <div class="modal-header">
	            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	            <h4 class="modal-title">Artículos</h4>
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
	                        for ($i=0; $i <count($this->articulos) ; $i++) { 
	                        ?>
	                        <tbody>
	                            <tr class="seleccion" onclick="$('#txtarticulo').val('<?php echo $this->articulos[$i]['id'] ?>');$('#lblarticulo').text('<?php echo $this->articulos[$i]['descripcion'] ?>')" data-dismiss="modal">
	                                <td><?php echo $this->articulos[$i]['id'] ?> </td>
	                                <td><?php echo $this->articulos[$i]['descripcion'] ?> </td>
	                            </tr>
	                        </tbody>
	                        <?php
	                        }
	                        ?>
	                    </table>
	                </div>
	            </div>
	            <div class="modal-footer">
	                <!--
	                <button name="btnModificarMarca" type="submit" class="btn btn-primary">
	                    <span class="glyphicon glyphicon-pencil"></span>
	                    Modificar
	                </button>
	                <button type="button" class="btn btn-danger" data-dismiss="modal">
	                    <span class="glyphicon glyphicon-remove"></span>
	                    Close
	                </button>
	                -->
	            </div>
	        </form>
	    </div>
	</div>
</div>
<div class="row">
    <div class="col-lg-12">
        <h3 class="page-header"><i class="icon_document_alt"></i> Ventas</h3>
        <ol class="breadcrumb">
            <li><i class="fa fa-home"></i><a href="#">Ventas</a></li>
            <li><i class="fa fa-laptop"></i><a href="index.php?modulo=ventas&accion=pedido">Pedidos</a></li>
            <li><i class="fa fa-laptop"></i><a href="#">Pedido <?php echo $_GET['pedido'] ?></a></li>
        </ol>
    </div>
</div>
<div class="row">
    <div class="col-xs-12">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <font color="white"><b>Registrar Detalle del Pedido <?php echo $_GET['pedido'] ?></b></font>
            </div>
            <div class="panel-body">
                <form action="" method="POST">
                    <div class="table-responsive">
                        <table class="table table-bordered display tablafiltro">
                            <thead>
                                <tr class="info">
                                    <th>&nbsp;</th>
                                    <th>Artículo</th>
                                    <th>Cantidad</th>
                                    <th>P.U.</th>
                                    <th>Descuento</th>
                                    <th>IGV</th>
                                    <th>Total</th>
                                    <th>Modificar</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    for ($i=0; $i <count($this->pedidos) ; $i++) { 
                                ?>
                                <tr>
                                    <td>
                                        <input name="chkPedido[]" value="<?php echo $this->pedidos[$i]['id']; ?>" type="checkbox" />
                                    </td>
                                    <td><?php echo $this->pedidos[$i]['articulo']; ?></td>
                                    <td><?php echo $this->pedidos[$i]['cantidad']; ?></td>
                                    <td><?php echo $this->pedidos[$i]['bruto']; ?></td>
                                    <td><?php echo $this->pedidos[$i]['descuento']; ?></td>
                                    <td><?php echo $this->pedidos[$i]['igv']; ?></td>
                                    <td><?php echo $this->pedidos[$i]['total']; ?></td>
                                    <td><a data-toggle="modal" data-target="#modal_modificar_pedidodetalle" href="#" onclick="modificarPedidoDetalle('index.php?modulo=ventas&accion=modificarPedidoDetalle&pedidoDetalle=<?php echo $this->pedidos[$i]['id']; ?>&ajax=1');"><span class="glyphicon glyphicon-pencil"></span></a></td>
                                </tr>
                                <?php
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                    <div align="center">
                        <button style="width:100px;" data-toggle="modal" data-target="#modal_nuevo_pedidodetalle" class="btn btn-primary">
                            <span class="glyphicon glyphicon-plus"></span>
                            Nuevo
                        </button>
                        <button name="btnEliminarPedidoDetalle" type="submit" style="width:100px;" class="btn btn-primary">
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

function modificarPedidoDetalle(url)
{
    $('#modal_modificar_pedidodetalle').load(url);
}
</script>