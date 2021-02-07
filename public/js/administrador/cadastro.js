$(function ($) {
    var smallElems = Array.prototype.slice.call(document.querySelectorAll(".js-switch-small"));

    smallElems.forEach(function (html) {
        var switchery = new Switchery(html, {
            size: "small"
        });
    });
});

$(function ($) {
    $(".js-states").select2();
});

$(".telefone").mask("(00) 00000-0000");

function verificaNomeUsuario() {
    var usuario = $("#usuario").val();

    if (usuario.length < 4) {
        var resposta = '';
        resposta += '<p class="text-danger">O usuário deve ter no minímo 4 caracteres.</p>'

        $("#respostaUsuario").html(resposta);
        $("#usuario").focus();
        return;
    }

    $.ajax({
        type: 'post',
        dataType: 'json',
        data: {usuario: usuario},
        url: $("#link").val() + 'administrador/verificaUsuarioAjax',
        beforeSend: function () {
            var resposta = '';
            resposta += '<p class="text-primary">Verificando...</p>'

            $("#respostaUsuario").html(resposta);
        },

        success: function (dados) {
            $("#respostaUsuario").html(dados.msg);
            if (dados.status == 0) {
                $("#usuario").val('');
                $("#usuario").focus();
            } else{
                 $("#usuario").val(dados.usuario); 
            }
        },
        error: function (dados) {
            var resposta = '';
            resposta += '<p class="text-danger">Serviço Indisponivel.</p>'

            $("#respostaUsuario").html(resposta);
            $("#usuario").val('');
            $("#usuario").focus();
        }

    });


}
