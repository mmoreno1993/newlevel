<style type="text/css">
    .seleccion:hover{
        cursor:pointer;
    }
</style>
<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Clientes</h4>
        </div>
        <form autocomplete="off" method="POST">
            <div class="modal-body">
                <div class="table">
                    <table class="table table-responsive table-bordered display tablafiltro">
                        <thead>
                            <tr class="primary">
                                <th>Código</th>
                                <th>Descripción</th>
                            </tr>
                        </thead>
                        <?php
                        for ($i=0; $i <count($this->articulos) ; $i++) { 
                        ?>
                        <tbody>
                            <tr class="seleccion" onclick="$('#txtarticulo_nuevo').val('<?php echo $this->articulos[$i]['id'] ?>');$('#lblarticulo').text('<?php echo $this->articulos[$i]['descripcion'] ?>')" data-dismiss="modal">
                                <td><?php echo $this->articulos[$i]['id'] ?> </td>
                                <td><?php echo $this->articulos[$i]['descripcion'] ?> </td>
                            </tr>
                        </tbody>
                        <?php
                        }
                        ?>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <!--
                <button name="btnModificarMarca" type="submit" class="btn btn-primary">
                    <span class="glyphicon glyphicon-pencil"></span>
                    Modificar
                </button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">
                    <span class="glyphicon glyphicon-remove"></span>
                    Close
                </button>
                -->
            </div>
        </form>
    </div>
</div>