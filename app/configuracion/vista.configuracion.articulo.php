<div id="modal_nuevo_articulo" data-backdrop="static" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Nuevo Artículo</h4>
            </div>
            <form autocomplete="off" name="frmNuevoArticulo" method="POST" action="index.php?modulo=configuracion&accion=articulo">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-8">
                            <label for="txtdescripcion">Descripción(*)</label>
                            <input required id="txtdescripcion" name="txtdescripcion" class="form-control" type="text" />
                        </div>
                        <div class="col-sm-4">
                            <label for="txtcodigo_alterno">Código Alterno</label>
                            <input id="txtcodigo_alterno" name="txtcodigo_alterno" class="form-control" type="text" />
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-3">
                            <label for="cmbfamilia">Familia</label>
                            <select id="cmbfamilia" name="cmbfamilia" class="form-control">
                                <option selected value="null">Seleccione</option>
                                <?php
                                    for ($i=0; $i <count($this->familias) ; $i++) { 
                                        echo '<option value="'.$this->familias[$i]['id'].'">'.$this->familias[$i]['descripcion'].'</option>';
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
                                        echo '<option value="'.$this->colores[$i]['id'].'">'.$this->colores[$i]['descripcion'].'</option>';
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
                                        echo '<option value="'.$this->marcas[$i]['id'].'">'.$this->marcas[$i]['descripcion'].'</option>';
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
                            <input class="form-control" id="txtprecio1" name="txtprecio1" />
                        </div>
                        <div class="col-sm-3">
                            <label for="txtprecio2">Precio 2</label>
                            <input class="form-control" id="txtprecio2" name="txtprecio2" />
                        </div>
                        <div class="col-sm-3">
                            <label for="txtprecio3">Precio 3</label>
                            <input class="form-control" id="txtprecio3" name="txtprecio3" />
                        </div>
                        <div class="col-sm-3">
                            <label for="txtprecio_contable">Precio Contable</label>
                            <input class="form-control" id="txtprecio_contable" name="txtprecio_contable" />
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button name="btnNuevoArticulo" type="submit" class="btn btn-primary">
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
<div id="modal_modificar_articulo" data-backdrop="static" class="modal fade">
</div>
<div class="row">
    <div class="col-lg-12">
        <h3 class="page-header"><i class="icon_document_alt"></i> Configuración</h3>
        <ol class="breadcrumb">
            <li><i class="fa fa-home"></i><a href="#">Configuración</a></li>
            <li><i class="fa fa-laptop"></i>Reg. Artículos</li>                          
        </ol>
    </div>
</div>
<div class="row">
    <div class="col-xs-12">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <font color="white"><b>Registro de Artículos</b></font>
            </div>
            <div class="panel-body">
                <form action="" method="POST">
                    <div class="table-responsive">
                        <table class="table table-bordered display tablafiltro">
                            <thead>
                                <tr class="info">
                                    <th>&nbsp;</th>
                                    <th>Artículo</th>
                                    <th>Familia</th>
                                    <th>Última modificación</th>
                                    <th>Modificar</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    for ($i=0; $i < count($this->articulos) ; $i++) { 
                                ?>
                                <tr>
                                    <td><input name="chkArticulo[]" value="<?php echo $this->articulos[$i]['id']; ?>" type="checkbox" /></td>
                                    <td><?php echo $this->articulos[$i]['articulo']; ?></td>
                                    <td><?php echo $this->articulos[$i]['familia']; ?></td>
                                    
                                    <td><?php echo $this->articulos[$i]['ultima_modificacion']; ?></td>
                                    <td><a data-toggle="modal" data-target="#modal_modificar_articulo" href="#" onclick="modificarArticulo('index.php?modulo=configuracion&accion=modificarArticulo&articulo=<?php echo $this->articulos[$i]['id']; ?>&ajax=1');"><span class="glyphicon glyphicon-pencil"></span></a></td>
                                </tr>
                                <?php 
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                    <div align="center">
                        <button style="width:100px;" data-toggle="modal" data-target="#modal_nuevo_articulo" class="btn btn-primary">
                            <span class="glyphicon glyphicon-plus"></span>
                            Nuevo
                        </button>
                        <button name="btnEliminarArticulo" type="submit" style="width:100px;" class="btn btn-primary">
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
function modificarArticulo(url){
    $('#modal_modificar_articulo').load(url);
}
</script>