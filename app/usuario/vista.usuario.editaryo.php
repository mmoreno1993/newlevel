<?php
extract($_REQUEST);
if (isset($this->usuario['id'])) {
    $id = $this->usuario['id'];
}
?>
<div class="modal-header modalh4">
    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
    <h4 class="modal-title"  id="myModalLabel">Editar Usuario</h4>
</div>
<div class="modal-body">
    <form role="form" class="form-horizontal" action="index.php?modulo=<?php echo $this->modulo ?>&accion=editaryo&id=<?php echo $id ?>" method="post" id="form_" enctype="multipart/form-data">
        <input type="hidden" name="idCliente" value="<?php echo $_SESSION['usuario']['empresa']; ?>" />
        <input type="hidden" name="userPerfil" value="A" />
        <div class="form-group">
            <label for="user" class="col-md-3">Usuario</label>
            <div class="col-md-9">
                <input type="text" name="nombre" id="user" readonly="" value="<?php echo $this->usuario['nombre'] ?>" class="form-control" placeholder="Correo" autocomplete="off"/>
            </div>
        </div>
        <div class="form-group">
            <label for="pass" class="col-md-3">Password</label>
            <div class="col-md-9">
                <input type="password" name="clave"  id="pass" value="" class="form-control" placeholder="Contraseña" autocomplete="off"/>
            </div>
            <div class="respPass">&nbsp;</div>
        </div>
        <div class="form-group">
            <div class="checkbox">
                <label for="checkbox2" class="col-md-12"><input type="checkbox" id="checkbox2" name="checkbox2"/> Contraseña visible</label>
            </div>
        </div>
        <div class="imagenAdmin form-group">
            <div class="checkbox ">
                <label for="checkbox3" class="col-md-12"><input type="checkbox" id="checkbox3" name="checkbox3"/> Cambiar foto</label>
            </div>
        </div>
        <div class="form-group fotoVer">
            <label class="col-md-12 text-danger">Formato de imagen permitido <strong>.jpg</strong></label>
            <div class="col-md-12">
                <input type="file" id="fotoAdmin" name="fotoAdmin" />
            </div>
        </div>
        <div class=" text-center form-group">
            <button type="submit" class="btn btn-success" id="editaryo" name="guardar"><i class="fa fa-check-circle"></i>GUARDAR</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times-circle"></i>CANCELAR</button>
        </div>
    </form>
</div>
<style>
    .respPass {
        color: #BF7D00;
        font-style: italic;
        padding-left: 15px;
    }
</style>
<script type='text/javascript'>
    $(document).ready(function() {
        $(".fotoVer").hide();
    });
    $('#checkbox3').click(function() {
        if ($('#checkbox3').is(':checked')) {
            $(".fotoEsconder").hide();
            $(".fotoVer").show();
            
        } else {
            $(".fotoVer").hide();
            $(".fotoEsconder").show();
            
        }
    });
    $('#checkbox2').click(function() {
        if ($('#checkbox2').is(':checked')) {
            $('input#pass').attr('type', 'text');
        } else {
            $('input#pass').attr('type', 'password');
        }
    });
</script>