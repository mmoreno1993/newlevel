<?php 
extract($_REQUEST);
if(isset($this->usuario['id'])){
    $id = $this->usuario['id'];
}
?>
<div class="modal-header modalh4">
    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
    <h4 class="modal-title" id="myModalPassword">Cambiar Estado</h4>
</div>
<div class="modal-body">
    <form role="form" class="form-horizontal" action="index.php?modulo=usuario&accion=cambiarEstado&id=<?php echo $id; ?>&est=<?php echo $this->est?>" method="post" id="form_" >
        <input type="hidden" name="idCliente" value="<?php echo $_SESSION['usuario']['empresa']; ?>" />
        <input type="hidden" name="userPerfil" value="U" />
        <div class="form-group">
            <?php 
            if($this->usuario['estado'] == 1){
                $no = "no ";
                $des = "des";
            }else{
                $no = "";
                $des = "";
            }
            ?>
            <label class="col-md-12">Está seguro que desea <?php echo $des;?>habilitar a: <br /><strong>"<?php echo $this->usuario['nombre']?>"</strong><br />Una vez <?php echo $des;?>habilitado el usuario <?php echo $no?>podra acceder al DashBoard</label>
        </div>      
        <div class="text-center form-group">
            <button type="submit" class="btn btn-success btn-guardarChange" id="btnSingChange" style="padding: 8px !important;margin-right: 5px;" name="confirmar" ><i class="fa fa-check-circle"></i>CONFIRMAR</button>
            <button type="button" class="btn btn-danger btn-guardarChangeCancel" style="padding: 8px !important;margin-left: 5px;" data-dismiss="modal"><i class="fa fa-times-circle"></i>CANCELAR</button>
        </div>
    </form>
</div>
