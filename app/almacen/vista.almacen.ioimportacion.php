<div id="modal_newdocument" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Ingreso por Orden de Importación</h4>
            </div>
            <div class="modal-body">
                <form>
                    <!--
                    <label for="txt">Almacen:</label>
                    <input />
                    -->
                    Falta planificar
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary">
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
        <h3 class="page-header"><i class="icon_document_alt"></i> Almacen</h3>
        <ol class="breadcrumb">
            <li><i class="fa fa-home"></i><a href="index.php?modulo=almacen&accion=ioimportacion">Almacen</a></li>
            <li><i class="fa fa-laptop"></i>Ingreso por Orden de Importación</li>
        </ol>
    </div>
</div>
<div class="row">
    <div class="col-xs-12">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <font color="white"><b>Registro de Ingreso por Orden de Importación</b></font>
            </div>
            <div class="panel-body">
                <form action="" method="POST">
                    <div class="row">
                        <div class="col-xs-12">
                            <label for="txtordenimportacion">Nro. Orden de Importación:</label>
                            <input class="form-control" type="text" id="txtordenimportacion" name="txtordenimportacion" />
                        </div>
                    </div>
                    <br>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr class="info">
                                    <th>&nbsp;</th>
                                    <th>Código</th>
                                    <th>Descripción</th>
                                    <th>Cantidad</th>
                                    <th>Saldo</th>
                                    <th>P.U.</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><input type="checkbox" /></td>
                                    <td>A0001</td>
                                    <td>Lápiz Faber Castell</td>
                                    <td>20.00</td>
                                    <td>5.00</td>
                                    <td>1.54</td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox" /></td>
                                    <td>A0002</td>
                                    <td>Cuaderno Standford</td>
                                    <td>10.00</td>
                                    <td>8.00</td>
                                    <td>2.35</td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox" /></td>
                                    <td>A0003</td>
                                    <td>Lapicero Color Rojo</td>
                                    <td>11.00</td>
                                    <td>3.00</td>
                                    <td>3.00</td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox" /></td>
                                    <td>A0004</td>
                                    <td>Borrador Faber Castell</td>
                                    <td>20.00</td>
                                    <td>10.00</td>
                                    <td>1.21</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div align="center">
                        <button style="width:100px;" class="btn btn-primary">
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
