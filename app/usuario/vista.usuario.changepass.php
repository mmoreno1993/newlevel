<div class="modal-header modalh4">
    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
    <h4 class="modal-title" id="myModalPassword">Cambiar Contraseña</h4>
</div>
<div class="modal-body">
    <form role="form" class="form-horizontal" action="index.php?modulo=usuario&accion=changepass&id=<?php echo $_SESSION['usuario']['idUsuario']; ?>" method="post" id="form_" >
        <input type="hidden" name="idCliente" value="<?php echo $_SESSION['usuario']['empresa']; ?>" />
        <input type="hidden" name="userPerfil" value="U" />
        <input type="hidden" name="comprobar" value="" id="comprobar" />
        <div class="form-group">
            <label for="passwordOrigen" class="col-md-3">Contraseña actual</label>
            <div class="col-md-9">
                <input type="password" id="passwordOrigen" class="form-control" name="passwordOrigen"  placeholder="Contraseña actual" />
            </div>
            <div class="respP">&nbsp;</div>
        </div>
        <div class="form-group">
            <label for="newpass" class="col-md-3">Nueva contraseña</label>
            <div class="col-md-9">
                <input type="password" id="newpass" class="form-control" name="newpass" placeholder="Nueva contraseña"/>
            </div>
            <div class="new_pass">&nbsp;</div>
        </div>
        <div class="form-group">
            <label for="repnewpass" class="col-md-3">Confirme contraseña nueva</label>
            <div class="col-md-9">
                <input type="password" id="repnewpass" class="form-control" name="repnewpass" placeholder="Repita contraseña"/>
            </div>
            <div class="rep_newpass">&nbsp;</div>
        </div>
        <div class="text-center form-group">
            <button type="submit" class="btn btn-success btn-guardarChange" id="btnSingChange" style="padding: 8px !important;margin-right: 5px;" name="guardar" ><i class="fa fa-check-circle"></i>GUARDAR</button>
            <button type="button" class="btn btn-danger btn-guardarChangeCancel" style="padding: 8px !important;margin-left: 5px;" data-dismiss="modal"><i class="fa fa-times-circle"></i>CANCELAR</button>
        </div>
    </form>
</div>
<style>
    .respP ,.new_pass ,.rep_newpass {
        color: #BF7D00;
        font-style: italic;
        padding-left: 15px;
    }
</style>
<script type="text/javascript">
    $(document).ready(function() {
        $('#passwordOrigen').blur(function() {
            var valor = $(this).val();
            $.get("index.php", {
                modulo: 'usuario',
                accion: 'getPass',
                psw: valor
            }, function(data) {
                if (data.trim() == "no") {
                    $('#comprobar').val("no");
                    $('.respP').text("Contraseña incorrecta...");
                } else if (data.trim() == "si") {
                    $('#comprobar').val("si");
                    $('.respP').text("");
                }
            });
        });
        $('#btnSingChange').click(function() {
            if ($('#comprobar').val() == "no" || $('#passwordOrigen').val() == "") {
                return false;
            } else {
                $('.respP').text("");
            }
            if ($('#newpass').val() == "") {
                $('.new_pass').text("Ingrese Contraseña Nueva");
                return false;
            } else {
                $('.new_pass').text("");
            }
            if ($('#newpass').val() != $('#repnewpass').val()) {
                $('.rep_newpass').text("Contraseña no coinciden");
                return false;
            } else {
                $('.rep_newpass').text("");
            }
        });
    });
</script>