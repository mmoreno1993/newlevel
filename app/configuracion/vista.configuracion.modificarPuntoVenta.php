<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Modificar Artículo</h4>
        </div>
        <form autocomplete="off" name="frmModificarPuntoVenta" method="POST" action="index.php?modulo=configuracion&accion=puntoventa">
            <div class="modal-body">
                    <input value="<?php echo $this->puntoventa[0]['id'] ?>" required id="txtid" name="txtid" class="form-control" type="hidden" />
                    <label for="txtdescripcion">Descripción(*)</label>
                    <input value="<?php echo $this->puntoventa[0]['descripcion'] ?>" required id="txtdescripcion" name="txtdescripcion" class="form-control" type="text" />
                    <label for="txtdireccion">Dirección</label>
                    <input value="<?php echo $this->puntoventa[0]['direccion'] ?>" id="txtdireccion" name="txtdireccion" class="form-control" type="text" />
                    <label for="txttelefono">Telefono</label>
                    <input value="<?php echo $this->puntoventa[0]['telefono'] ?>" id="txttelefono" name="txttelefono" class="form-control" type="text" />
                    <label for="cmbAlmacen">Almacen</label>
                    <select id="cmbAlmacen" name="cmbAlmacen" class="form-control">
                        <option selected value="null">Seleccione</option>
                        <?php
                            for ($i=0; $i <count($this->almacenes) ; $i++) { 
                                echo '<option '.(($this->almacenes[$i]["id"]==$this->puntoventa[0]["tbl_almacen_id"])?'selected':'').' value="'.$this->almacenes[$i]['id'].'">'.$this->almacenes[$i]['descripcion'].'</option>';
                            }
                        ?>
                    </select>
            </div>
            <div class="modal-footer">
                <button name="btnModificarPuntoVenta" type="submit" class="btn btn-primary">
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