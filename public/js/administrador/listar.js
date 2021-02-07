function buscar (){
    var buscar = $('#buscar').val();
    
    window.location.href = $('#link').val() + 'administrador/listar/1/' + buscar;
}

$(function($) {
    $("[data-toggle=confirmation]").confirmation();
});