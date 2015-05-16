    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Modificar Artículo</h4>
            </div>
            <form autocomplete="off" name="frmModificarArticulo" method="POST" action="index.php?modulo=configuracion&accion=articulo">
                <div class="modal-body">
                    <div class="row">
                        <input value="<?php echo $this->articulo[0]['id'] ?>" required id="txtid" name="txtid" class="form-control" type="hidden" />
                        <div class="col-sm-8">
                            <label for="txtdescripcion">Descripción(*)</label>
                            <input value="<?php echo $this->articulo[0]['articulo'] ?>" required id="txtdescripcion" name="txtdescripcion" class="form-control" type="text" />
                        </div>
                        <div class="col-sm-4">
                            <label for="txtcodigo_alterno">Código Alterno</label>
                            <input value="<?php echo $this->articulo[0]['codigo_alterno'] ?>" id="txtcodigo_alterno" name="txtcodigo_alterno" class="form-control" type="text" />
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-3">
                            <label for="cmbfamilia">Familia</label>
                            <select id="cmbfamilia" name="cmbfamilia" class="form-control">
                                <option selected value="null">Seleccione</option>
                                <?php
                                    for ($i=0; $i <count($this->familias) ; $i++) { 
                                        echo '<option '.(($this->familias[$i]["id"]==$this->articulo[0]["tbl_familia_id"])?'selected':'').' value="'.$this->familias[$i]['id'].'">'.$this->familias[$i]['descripcion'].'</option>';
                                    }
                                ?>
                            </select>
                        </div>
                        <div class="col-sm-3">
                            <label for="cmbcategoria">Categoria</label>
                            <select id="cmbcategoria" name="cmbcategoria" class="form-control">
                                <option selected value="null">Seleccione</option>
                            </select>
                        </div>
                        <div class="col-sm-3">
                            <label for="cmbcategoria">Categoria</label>
                            <select id="cmbcategoria" name="cmbcategoria" class="form-control">
                                <option selected value="null">Seleccione</option>
                            </select>
                        </div>
                        <div class="col-sm-3">
                            <label for="cmbcolor">Color</label>
                            <select id="cmbcolor" name="cmbcolor" class="form-control">
                                <option selected value="null">Seleccione</option>
                                <?php
                                    for ($i=0; $i <count($this->colores) ; $i++) { 
                                        echo '<option '.(($this->colores[$i]["id"]==$this->articulo[0]["tbl_color_id"])?'selected':'').' value="'.$this->colores[$i]['id'].'">'.$this->colores[$i]['descripcion'].'</option>';
                                    }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <label for="cmbmarca">Marca</label>
                            <select id="cmbmarca" name="cmbmarca" class="form-control">
                                <option selected value="null">Seleccione</option>
                                <?php
                                    for ($i=0; $i <count($this->marcas) ; $i++) { 
                                        echo '<option '.(($this->marcas[$i]["id"]==$this->articulo[0]["tbl_marca_id"])?'selected':'').' value="'.$this->marcas[$i]['id'].'">'.$this->marcas[$i]['descripcion'].'</option>';
                                    }
                                ?>
                            </select>
                        </div>
                        <div class="col-sm-6">
                            <label for="txtfoto">Foto</label><br>
                            <input class="form-control" id="txtfoto" name="txtfoto" type="file" /><br>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-3">
                            <label for="txtprecio1">Precio 1</label>
                            <input value="<?php echo $this->articulo[0]['precio1'] ?>" class="form-control" id="txtprecio1" name="txtprecio1" />
                        </div>
                        <div class="col-sm-3">
                            <label for="txtprecio2">Precio 2</label>
                            <input value="<?php echo $this->articulo[0]['precio2'] ?>" class="form-control" id="txtprecio2" name="txtprecio2" />
                        </div>
                        <div class="col-sm-3">
                            <label for="txtprecio3">Precio 3</label>
                            <input value="<?php echo $this->articulo[0]['precio3'] ?>" class="form-control" id="txtprecio3" name="txtprecio3" />
                        </div>
                        <div class="col-sm-3">
                            <label for="txtprecio_contable">Precio Contable</label>
                            <input value="<?php echo $this->articulo[0]['precio_contable'] ?>" class="form-control" id="txtprecio_contable" name="txtprecio_contable" />
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button name="btnModificarArticulo" type="submit" class="btn btn-primary">
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