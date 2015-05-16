<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Modificar Cliente</h4>
        </div>
        <form autocomplete="off" name="frmModificarCliente" method="POST" action="index.php?modulo=configuracion&accion=cliente">
            <div class="modal-body">
                <input value="<?php echo $this->cliente[0]['id'] ?>" required id="txtid" name="txtid" class="form-control" type="hidden" />
                <div class="row">
                    <div class="col-sm-4">
                        <label for="txtruc">RUC</label>
                        <input value="<?php echo $this->cliente[0]['ruc'] ?>" maxlength="11" id="txtruc" name="txtruc" class="form-control" type="text" />
                    </div>
                    <div class="col-sm-8">
                        <label for="txtrazonsocial">Razón Social(*)</label>
                        <input value="<?php echo $this->cliente[0]['razonsocial'] ?>" required id="txtrazonsocial" name="txtrazonsocial" class="form-control" type="text" />
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12">
                        <label for="txtdireccion">Dirección</label>
                        <input value="<?php echo $this->cliente[0]['direccion'] ?>" id="txtdireccion" name="txtdireccion" class="form-control" type="text" />                            
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <label for="txttelefono">Telefono</label>
                        <input value="<?php echo $this->cliente[0]['telefono_fijo'] ?>" class="form-control" id="txttelefono" name="txttelefono" />
                    </div>
                    <div class="col-sm-6">
                        <label for="txttelefonomovil">Telefono Movil</label>
                        <input value="<?php echo $this->cliente[0]['telefono_movil'] ?>" class="form-control" id="txttelefonomovil" name="txttelefonomovil" />
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12">
                        <label for="txtcontacto">Contacto</label>
                        <input value="<?php echo $this->cliente[0]['contacto'] ?>" id="txtcontacto" name="txtcontacto" class="form-control" type="text" />                            
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <label for="txtmontosoles">Cuenta Inicial Soles</label>
                        <input value="<?php echo $this->cliente[0]['cuenta_inicial_soles'] ?>" class="form-control" id="txtmontosoles" name="txtmontosoles" />
                    </div>
                    <div class="col-sm-6">
                        <label for="txtfechasoles">Fecha</label>
                        <input value="<?php echo substr($this->cliente[0]['cuenta_inicial_soles_fecha'],0,10) ?>" readonly class="form-control datepicker" id="txtfechasoles_" name="txtfechasoles_" />
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <label for="txtmontodolares">Cuenta Inicial Dolares</label>
                        <input value="<?php echo $this->cliente[0]['cuenta_inicial_dolares'] ?>" class="form-control" id="txtmontodolares" name="txtmontodolares" />
                    </div>
                    <div class="col-sm-6">
                        <label for="txtfechadolares">Fecha</label>
                        <input value="<?php echo substr($this->cliente[0]['cuenta_inicial_dolares_fecha'],0,10) ?>" readonly class="form-control datepicker" id="txtfechadolares_" name="txtfechadolares_" />
                    </div>
                </div>
            </div>

            <div class="modal-footer">
                <button name="btnModificarCliente" type="submit" class="btn btn-primary">
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