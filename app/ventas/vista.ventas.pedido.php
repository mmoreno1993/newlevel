<div id="modal_newpedido" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Nuevo Pedido</h4>
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
        <h3 class="page-header"><i class="icon_document_alt"></i> Ventas</h3>
        <ol class="breadcrumb">
            <li><i class="fa fa-home"></i><a href="#">Ventas</a></li>
            <li><i class="fa fa-laptop"></i>Pedido</li>                          
        </ol>
    </div>
</div>
<div class="row">
    <div class="col-xs-12">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <font color="white"><b>Registro de Pedidos</b></font>
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
                                    <th>Cliente</th>
                                    <th>Documento</th>
                                    <th>Fecha de Registro</th>
                                    <th>Total</th>
                                    <th>Estado</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><input type="checkbox" /></td>
                                    <td>Cliente 1</td>
                                    <td>0010000007</td>
                                    <td>25/04/2015</td>
                                    <td>1000</td>
                                    <td>Anulado</td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox" /></td>
                                    <td>Cliente 2</td>
                                    <td>0010000015</td>
                                    <td>26/04/2015</td>
                                    <td>7000</td>
                                    <td>Registrado</td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox" /></td>
                                    <td>Cliente 3</td>
                                    <td>0020060005</td>
                                    <td>27/04/2015</td>
                                    <td>500</td>
                                    <td>Despachado</td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox" /></td>
                                    <td>Cliente 4</td>
                                    <td>0010000062</td>
                                    <td>29/04/2015</td>
                                    <td>1230</td>
                                    <td>Despachado</td>
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
                        <button style="width:100px;" class="btn btn-primary">
                            <i class="glyphicon glyphicon-check"></i>
                            C. Estado
                        </button>
                    </div>
                    
                </form>
            </div>
        </div>
    </div>
</div>
