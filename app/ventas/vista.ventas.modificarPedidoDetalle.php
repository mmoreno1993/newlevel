    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Modificar Detalle del Pedido</h4>
            </div>
            <form autocomplete="off" method="POST">
                <input type="hidden" value="<?php echo $this->pedido[0]['id']; ?>" name='id' />
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-3">
                            <label for="txtarticulo">Artículo</label>
                            <input value="<?php echo $this->pedido[0]['tbl_articulo_id'] ?>" data-toggle="modal" data-target="#modal_obtener_articulos" id="txtarticulo" name="txtarticulo" readonly type="text" class="form-control" />
                        </div>
                        <div class="col-sm-9">
                            <label>&nbsp;</label>
                            <label class="form-control" disabled id="lblarticulo"><?php echo $this->pedido[0]['articulo']; ?></label>
                        </div>    
                    </div>
                    <div class="row">
                        <div class="col-sm-4">
                            <label for="txtcantidad">Cantidad</label>
                            <input value="<?php echo $this->pedido[0]['cantidad']; ?>" id="txtcantidad" name="txtcantidad" class="form-control" type="text" />
                        </div>
                        <div class="col-sm-4">
                            <label for="txtpreciounitario">Precio Unitario</label>
                            <input value="<?php echo $this->pedido[0]['bruto'] ?>" id="txtpreciounitario" name="txtpreciounitario" class="form-control" type="text" />
                        </div>
                        <div class="col-sm-4">
                            <label for="txtdescuento">Descuento</label>
                            <input value="<?php echo $this->pedido[0]['descuento']; ?>" id="txtdescuento" name="txtdescuento" class="form-control" type="text" />
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <label for="txtglosa">Glosa</label>
                            <textarea rows="5" maxlength="200" id="txtglosa" name="txtglosa" type="text" class="form-control"><?php echo $this->pedido[0]['glosa']; ?></textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button name="btnModificarPedidoDetalle" type="submit" class="btn btn-primary">
                        <span class="glyphicon glyphicon-pencil"></span>
                        Modificar
                    </button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">
                        <span class="glyphicon glyphicon-remove"></span>
                        Close
                    </button>
                </div>
            </form>
        </div>
    </div>