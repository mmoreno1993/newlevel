<div class="modal-header modalh4">
    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
    <h4 class="modal-title" id="myModalLabel">Agregar Usuario</h4>
</div>
<div class="modal-body">
    <form role="form" class="form-horizontal" action="index.php?modulo=<?php echo $this->modulo ?>&accion=crear" method="post" id="form_" >
        <input type="hidden" name="idCliente" value="<?php echo $_SESSION['usuario']['empresa']; ?>" />
        <input type="hidden" name="userPerfil" value="U" />
        <input type="hidden" name="comprobar" value="" id="comprobar" />
        <div class="form-group">
            <label for="user" class="col-md-3">Correo</label>
            <div class="col-md-9">
                <input type="text" name="nombre" id="user" class="form-control" placeholder="Correo" autocomplete="off"/>
            </div>
            <div class="respUser">&nbsp;</div>
        </div>
        <div class="form-group">
            <label for="pass" class="col-md-3">Password</label>
            <div class="col-md-9">
                <input type="password" name="clave" id="pass" class="form-control" placeholder="Contraseña" autocomplete="off"/>
            </div>
            <div class="respPass">&nbsp;</div>
        </div>
        <div class="col-md-offset-2 col-md-10 form-group">
            <div class="checkbox">
                <input type="checkbox" id="checkbox2" name="checkbox2"/>
                <label for="checkbox2" class="text-center">Contraseña visible</label>
            </div>
        </div>
        <div class=" text-center form-group">
            <button type="submit" class="btn btn-success" id="btnSingIn" name="guardar" ><i class="fa fa-check-circle"></i>Guardar</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times-circle"></i>Cancelar</button>
        </div>
    </form>
</div>
<style>
    .respUser ,.respPass {
        color: #BF7D00;
        font-style: italic;
        padding-left: 15px;
    }
</style>
<script type='text/javascript'>
    $('#checkbox2').click(function() {
        if ($('#checkbox2').is(':checked')) {
            $('input#pass').attr('type', 'text');
        } else {
            $('input#pass').attr('type', 'password');
        }
    });

    $(document).ready(function() {
        $('#user').blur(function() {
            var valor = $(this).val();
            $.get("index.php", {
                modulo: 'usuario',
                accion: 'getCorreo',
                correo: valor
            }, function(data) {
                if (data.trim() == "no") {
                    $('#comprobar').val("no");
                    $('.respUser').text("");
                } else if (data.trim() == "si") {
                    $('#comprobar').val("si");
                    $('.respUser').text("Correo ya existe...");
                }
            });
        });

        $('#btnSingIn').click(function() {
            var emailreg = /^[a-zA-Z0-9_\.\-]+@[a-zA-Z0-9\-]+\.[a-zA-Z0-9\-\.]+$/;
            if ($('#comprobar').val() == "si") {
                return false;
            } else {
                $('.respP').text("");
            }
            if ($('#user').val() == "" || !emailreg.test($('#user').val())) {
                $('.respUser').text("Ingrese Correo correcto");
                return false;
            }
            if ($('#pass').val() == "") {
                $('.respPass').text("Ingrese Contraseña");
                return false;
            } else {
                $('.respPass').text("");
            }
        });
    });

</script>
