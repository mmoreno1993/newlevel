<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Modificar Pedido</h4>
        </div>
        <form autocomplete="off" name="frmModificarPedido" method="POST" action="index.php?modulo=ventas&accion=pedido">
            <div class="modal-body">
                <input value="<?php echo $this->pedido[0]['id'] ?>" type="hidden" name="id" id="id">
                <div class="row">
                    <div class="col-sm-8">
                        <label for="txtcliente">Cliente</label>
                        <input value="<?php echo $this->pedido[0]['tbl_cliente_id'] ?>" data-toggle="modal" data-target="#modal_obtener_clientes" id="txtcliente" name="txtcliente" readonly type="text" class="form-control" />
                    </div>
                    <div class="col-sm-4">
                        <label>&nbsp;</label>
                        <label class="form-control" disabled id="lblrazonsocial"><?php echo $this->pedido[0]['razonsocial']; ?></label>
                    </div>    
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <label for="txtfecharegistro">Fecha de Registro</label>
                        <input value="<?php echo $this->pedido[0]['fecha_registro']; ?>" id="txtfecharegistro" name="txtfecharegistro" class="form-control datepicker" type="text" readonly />
                    </div>
                    <div class="col-sm-6">
                        <label for="txtfechavigencia">Fecha de Vigencia</label>
                        <input value="<?php echo $this->pedido[0]['fecha_vigente']; ?>" id="txtfechavigencia" name="txtfechavigencia" class="form-control datepicker" type="text" readonly />
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-4">
                        <label for="txtnumero">Número</label>
                        <input value="<?php echo $this->pedido[0]['numero']; ?>" maxlength="7" id="txtnumero" readonly name="txtnumero" type="text" class="form-control" />
                    </div>
                    <div class="col-sm-4">
                        <label for="cmbmoneda">Moneda</label>
                        <select id="cmbmoneda" name="cmbmoneda" class="form-control">
                            <option <?php echo (($this->pedido[0]['moneda']=="0")?'selected':''); ?> value="0">Soles</option>
                            <option <?php echo (($this->pedido[0]['moneda']=="1")?'selected':''); ?> value="1">Dolares</option>
                        </select>
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
                <button name="btnModificarPedido" type="submit" class="btn btn-primary">
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