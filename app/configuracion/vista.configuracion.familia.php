<div id="modal_nueva_familia" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Nueva Familia</h4>
            </div>
            <form autocomplete="off" name="frmNuevaFamilia" method="POST" action="index.php?modulo=configuracion&accion=familia">
                <div class="modal-body">
                    <label for="txtdescripcion">Descripción(*)</label>
                    <input required id="txtdescripcion" name="txtdescripcion" class="form-control" type="text" />
                 

                </div>
                <div class="modal-footer">
                    <button name="btnNuevaFamilia" type="submit" class="btn btn-primary">
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
<div id="modal_modificar_familia" class="modal fade">
</div>
<div class="row">
    <div class="col-lg-12">
        <h3 class="page-header"><i class="icon_document_alt"></i> Configuración</h3>
        <ol class="breadcrumb">
            <li><i class="fa fa-home"></i><a href="index.php?modulo=configuracion&accion=familia">Configuración</a></li>
            <li><i class="fa fa-laptop"></i>Reg. Familia</li>                          
        </ol>
    </div>
</div>
<div class="row">
    <div class="col-xs-12">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <font color="white"><b>Registro de Familias</b></font>
            </div>
            <div class="panel-body">
                <form action="index.php?modulo=configuracion&accion=familia" method="POST">
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
                                    <th>Familia</th>
                                    <th>Última modificación</th>
                                    <th>Modificar</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    for ($i=0; $i < count($this->familias) ; $i++) { 
                                ?>
                                <tr>
                                    <td><input name="chkFamilia[]" value="<?php echo $this->familias[$i]['id']; ?>" type="checkbox" /></td>
                                    <td><?php echo $this->familias[$i]['descripcion']; ?></td>
                                    <td><?php echo $this->familias[$i]['ultima_modificacion']; ?></td>
                                    <td><a data-toggle="modal" data-target="#modal_modificar_familia" href="#" onclick="modificarFamilia('index.php?modulo=configuracion&accion=modificarFamilia&familia=<?php echo $this->familias[$i]['id']; ?>&ajax=1');"><span class="glyphicon glyphicon-pencil"></span></a></td>
                                </tr>
                                <?php 
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                    <div align="center">
                        <button style="width:100px;" data-toggle="modal" data-target="#modal_nueva_familia" class="btn btn-primary">
                            <span class="glyphicon glyphicon-plus"></span>
                            Nuevo
                        </button>
                        <button name="btnEliminarFamilia" type="submit" style="width:100px;" class="btn btn-primary">
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
<script>
function modificarFamilia(url){
    $('#modal_modificar_familia').load(url);
}
</script>