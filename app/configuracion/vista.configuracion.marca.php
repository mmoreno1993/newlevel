<div id="modal_nueva_marca" data-backdrop="static" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Nueva Marca</h4>
            </div>
            <form autocomplete="off" name="frmNuevoMarca" method="POST" action="index.php?modulo=configuracion&accion=marca">
                <div class="modal-body">
                    <label for="txtdescripcion">Descripción(*)</label>
                    <input required id="txtdescripcion" name="txtdescripcion" class="form-control" type="text" />
                 

                </div>
                <div class="modal-footer">
                    <button name="btnNuevaMarca" type="submit" class="btn btn-primary">
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
<div id="modal_modificar_marca" data-backdrop="static" class="modal fade">
</div>
<div class="row">
    <div class="col-lg-12">
        <h3 class="page-header"><i class="icon_document_alt"></i> Configuración</h3>
        <ol class="breadcrumb">
            <li><i class="fa fa-home"></i><a href="#">Configuración</a></li>
            <li><i class="fa fa-laptop"></i>Reg. Marca</li>                          
        </ol>
    </div>
</div>
<div class="row">
    <div class="col-xs-12">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <font color="white"><b>Registro de Marcas</b></font>
            </div>
            <div class="panel-body">
                <form action="index.php?modulo=configuracion&accion=marca" method="POST">
                    <div class="table-responsive">
                        <table class="table table-bordered display tablafiltro">
                            <thead>
                                <tr class="info">
                                    <th>&nbsp;</th>
                                    <th>Marca</th>
                                    <th>Última modificación</th>
                                    <th>Modificar</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    for ($i=0; $i < count($this->marcas) ; $i++) { 
                                ?>
                                <tr>
                                    <td><input name="chkMarca[]" value="<?php echo $this->marcas[$i]['id']; ?>" type="checkbox" /></td>
                                    <td><?php echo $this->marcas[$i]['descripcion']; ?></td>
                                    <td><?php echo $this->marcas[$i]['ultima_modificacion']; ?></td>
                                    <td><a data-toggle="modal" data-target="#modal_modificar_marca" href="#" onclick="modificarMarca('index.php?modulo=configuracion&accion=modificarMarca&marca=<?php echo $this->marcas[$i]['id']; ?>&ajax=1');"><span class="glyphicon glyphicon-pencil"></span></a></td>
                                </tr>
                                <?php 
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                    <div align="center">
                        <button style="width:100px;" data-toggle="modal" data-target="#modal_nueva_marca" class="btn btn-primary">
                            <span class="glyphicon glyphicon-plus"></span>
                            Nuevo
                        </button>
                        <button name="btnEliminarMarca" type="submit" style="width:100px;" class="btn btn-primary">
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
function modificarMarca(url){
    $('#modal_modificar_marca').load(url);
}
</script>