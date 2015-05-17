<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Modificar Banco</h4>
        </div>
        <form autocomplete="off" name="frmModificarBanco" method="POST" action="index.php?modulo=configuracion&accion=banco">
            <div class="modal-body">
                <input value="<?php echo $this->banco[0]['id'] ?>" required id="txtid" name="txtid" class="form-control" type="hidden" />
                <label for="txtdescripcion">Descripción(*)</label>
                <input value="<?php echo $this->banco[0]['descripcion'] ?>" required id="txtdescripcion" name="txtdescripcion" class="form-control" type="text" />
            </div>
            <div class="modal-footer">
                <button name="btnModificarBanco" type="submit" class="btn btn-primary">
                    <span class="glyphicon glyphicon-pencil"></span>
                    Modificar
                </button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">
                    <span class="glyphicon glyphicon-remove"></span>
                    Close
                </button>
            </div>
            <div class="row">
                <div class="col-sm-8">
                    <label for="txtcliente">Cliente</label>
                    <input data-toggle="modal" data-target="#modal_obtener_clientes" id="txtcliente" name="txtcliente" readonly type="text" class="form-control" onclick="obtenerCliente('index.php?modulo=ventas&accion=obtenerClientes&ajax=1');" />
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
</div>