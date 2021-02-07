$(function($) {
    var smallElems = Array.prototype.slice.call(document.querySelectorAll(".js-switch-small"));

    smallElems.forEach(function(html) {
        var switchery = new Switchery(html, {
            size: "small"
        });
    });
});

$(".telefone").mask("(00) 0 0000-0000");

function exibirImgAdministrador(src){
    $("#tag_exibir_img").attr("src", src);
    $("#exibirImgAdministrador").modal();
}

$(function($) {
    $(".js-states").select2();
});

verificaNomeUsuario();



function verificaNomeUsuario(){
    var usuario = $("#usuario").val();
    var administrador = $("#administrador").val();

    $.ajax({
        type:"post",
        dataType: "json",
        data: {usuario : usuario, administrador : administrador},
        url: $("#link").val()+"administrador/verificaUsuarioAjax",
        success: function(dados){
            if(dados.resposta){
                $("#respostaUsuario").html(dados.msg);
            }else{
                $("#respostaUsuario").html(dados.msg);
                //$("#usuario").val("");
                $("#usuario").focus();
            }
        }
    });
}
