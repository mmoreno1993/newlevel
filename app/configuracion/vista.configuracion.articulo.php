<div id="modal_nuevo_articulo" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Nuevo de Artículo</h4>
            </div>
            <div class="modal-body">
                <form name="frmNuevoArticulo" method="POST" action="index.php?modulo=configuracion&accion=articulo">
                    <label for="txtdescripcion">Descripción(*)</label>
                    <input id="txtdescripcion" name="txtdescripcion" class="form-control" type="text" />
                    <label for="txtcodigo_alterno">Código Alterno</label>
                    <input id="txtcodigo_alterno" name="txtcodigo_alterno" class="form-control" type="text" />
                    <label for="txtfamilia">Familia(*)</label>
                    <input id="txtfamilia" name="txtfamilia" class="form-control" type="text" />
                    <label for="txtcategoria">Categoria</label>
                    <input id="txtcategoria" name="txtcategoria" class="form-control" type="text" />
                    <label for="txtcolor1">Color 1</label>
                    <input id="txtcolor1" name="txtcolor1" class="form-control" type="text" />
                    <label for="txtcolor2">Color 2</label>
                    <input id="txtcolor2" name="txtcolor2" class="form-control" type="text" />
                    <label for="txtcolor3">Color 3</label>
                    <input id="txtcolor3" name="txtcolor3" class="form-control" type="text" />
                    <label for="txtmarca">Marca</label>
                    <input id="txtmarca" name="txtmarca" class="form-control" type="text" />
                    <label for="txtfoto">Foto</label>
                    <input id="txtfoto" name="txtfoto" class="form-control" type="text" />
                    <input id="btnGuardar" type="submit" />
                </form>
            </div>
            <div class="modal-footer">
                <button onclick="$('#btnGuardar').click();" type="button" class="btn btn-primary">
                    <span class="glyphicon glyphicon-pencil"></span>
                    Guardar
                </button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">
                    <span class="glyphicon glyphicon-remove"></span>
                    Close
                </button>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <h3 class="page-header"><i class="icon_document_alt"></i> Configuración</h3>
        <ol class="breadcrumb">
            <li><i class="fa fa-home"></i><a href="index.php?modulo=almacen&accion=nsalida">Configuración</a></li>
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
                    <div class="row">
                        <div class="col-sm-4">
                            <label>Filtro por:</label>
                            <select class="form-control">
                                <option selected>Fecha</option>
                            </select>
                        </div>
                        <div class="col-sm-4">
                            <label>Desde:</label>
                            <input type="text" class="form-control" />
                        </div>
                        <div class="col-sm-4">
                            <label>Hasta:</label>
                            <input type="text" class="form-control" />
                        </div>
                    </div>
                    <br>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr class="info">
                                    <th>&nbsp;</th>
                                    <th>Artículo</th>
                                    <th>Familia</th>
                                    <th>Última modificación</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    for ($i=0; $i < count($this->articulos) ; $i++) { 
                                ?>
                                <tr>
                                    <td><input value="<? $this->[$i]['id'] ?>" type="checkbox" /></td>
                                    <td><?php echo $this->articulos[$i]['articulo']; ?></td>
                                    <td><?php echo $this->articulos[$i]['familia']; ?></td>
                                    <td><?php echo $this->articulos[$i]['ultima_modificacion']; ?></td>
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
                        <button style="width:100px;" class="btn btn-primary">
                            <span class="glyphicon glyphicon-pencil"></span>
                            Modificar
                        </button>
                        <button style="width:100px;" class="btn btn-primary">
                            <span class="glyphicon glyphicon-remove"></span>
                            Eliminar
                        </button>
                        <button style="width:100px;" class="btn btn-primary">
                            <i class="icon_document_alt"></i>
                            Reporte
                        </button>    
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
