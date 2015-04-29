function cargandoAjax(ref) {
    $(ref).html('<img width="16" src="assets/img/icono/generando.gif" /> ');
}

function onEnter(e,filtroId){
    if(e.keyCode==13){
        $('#'+filtroId).click();
    }
}

function filtrarSelectEnvio(modulo, accion) {
    var anio = $('#anio').val();
    var codEmp = $('#empresa').val();
    var numEmp = $('#empresa option:selected').text().substr(0, 1);
    var moneda = $('#moneda').val();
    var url = "";
    url = "index.php?modulo=" + modulo + "&accion=" + accion + "&anio=" + anio + "&codEmp=" + codEmp + "&numEmp=" + numEmp + "&moneda=" + moneda;
    location.href = url;
}

function filtrarTablaLista(modulo, accion, tabla_lista, page) {
    tabla_lista = tabla_lista || "#resultado_filtro";
    page = page || 1;
    url = 'index.php?modulo=' + modulo + '&accion=' + accion + '&filtrarAjax=true&page=' + page;
    $('div.filtrame input[type=text]').each(function() {
        valor = fixedEncodeURIComponent($(this).val());
        variable = $(this).attr('name');
        url = url + '&' + variable + '=' + valor;
    });
    $('div.filtrame select').each(function() {
        valor = $(this).val();
        variable = $(this).attr('name');
        url = url + '&' + variable + '=' + valor;
    });
    
    $('#resultado_filtro').slideUp('slow', function() {
        $('#resultado_filtro').load(url + ' ' + tabla_lista, function() {
            $('#resultado_filtro').slideDown('slow');
        });
    });
}
function cambiarPagina(url) {
    url = url + " #resultado_filtro";
    //$('#resultado_filtro').slideUp('slow', function() {
        $('#resultado_filtro').load(url, function() {
            $('#resultado_filtro').slideDown('slow');
            //cerrarEsperarPaginado();
        });
    //});
}
function cambiarPagina2(url) {
    url = url + " #resultado_filtro2";
    //$('#resultado_filtro').slideUp('slow', function() {
        $('#resultado_filtro2').load(url, function() {
            $('#resultado_filtro2').slideDown('slow');
            //cerrarEsperarPaginado();
        });
    //});
}

function fixedEncodeURIComponent(str) {
    return encodeURIComponent(str).replace(/[!'()*]/g, escape);
}

function esperarPaginado() {
    $('.delayPaginado').remove();
    $('.delayFaceboxIcon').remove();
    $('.content-wrapper').prepend('<div class="delayPaginado"></div><img class="delayFaceboxIcon" src="assets/img/icono/generando.gif" />');
}
function cerrarEsperarPaginado() {
    $('.delayPaginado').remove();
    $('.delayFaceboxIcon').remove();
}

