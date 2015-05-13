    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Modificar Artículo</h4>
            </div>
            <form name="frmModificarArticulo" method="POST" action="index.php?modulo=configuracion&accion=articulo">
                <div class="modal-body">
                        <input value="<?php echo $this->articulo[0]['id'] ?>" required id="txtid" name="txtid" class="form-control" type="hidden" />
                        <label for="txtdescripcion">Descripción(*)</label>
                        <input value="<?php echo $this->articulo[0]['descripcion'] ?>" required id="txtdescripcion" name="txtdescripcion" class="form-control" type="text" />
                        <label for="txtcodigo_alterno">Código Alterno</label>
                        <input value="<?php echo $this->articulo[0]['codigo_alterno'] ?>" id="txtcodigo_alterno" name="txtcodigo_alterno" class="form-control" type="text" />
                        <label for="cmbfamilia">Familia</label>
                        <select id="cmbfamilia" name="cmbfamilia" class="form-control">
                            <option selected value="null">Seleccione</option>
                            <?php
                                for ($i=0; $i <count($this->familias) ; $i++) { 
                                    echo '<option value="'.$this->familias[$i]['id'].'">'.$this->familias[$i]['descripcion'].'</option>';
                                }
                            ?>
                        </select>
                        <label for="cmbcategoria">Categoria</label>
                        <select id="cmbcategoria" name="cmbcategoria" class="form-control">
                            <option selected value="null">Seleccione</option>
                        </select>
                        <label for="cmbcolor">Color</label>
                        <select id="cmbcolor" name="cmbcolor" class="form-control">
                            <option selected value="null">Seleccione</option>
                            <?php
                                for ($i=0; $i <count($this->colores) ; $i++) { 
                                    echo '<option value="'.$this->colores[$i]['id'].'">'.$this->colores[$i]['descripcion'].'</option>';
                                }
                            ?>
                        </select>
                        <label for="cmbmarca">Marca</label>
                        <select id="cmbmarca" name="cmbmarca" class="form-control">
                            <option selected value="null">Seleccione</option>
                            <?php
                                for ($i=0; $i <count($this->marcas) ; $i++) { 
                                    echo '<option value="'.$this->marcas[$i]['id'].'">'.$this->marcas[$i]['descripcion'].'</option>';
                                }
                            ?>
                        </select>
                        <label for="txtfoto">Foto</label><br>
                        <input id="txtfoto" name="txtfoto" type="file" />
                </div>
                <div class="modal-footer">
                    <button name="btnModificarArticulo" type="submit" class="btn btn-primary">
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