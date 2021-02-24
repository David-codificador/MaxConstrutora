function buscarTipo() {
    $("#tipo_ajax").text('');
    $("#resposta_ajax").text('');

    $.ajax({
        type: 'post',
        dataType: 'json',
        data: {},
        url: $("#link").val() + 'servicos/tipoAjax',
        beforeSend: function () {
            $("#tipo_ajax").html("<img src='" + $("#recurso").val() + "/imagemSite/carregando.gif' class='gif-carregando' />");
        },

        success: function (dados) {
            if (dados.status == 1) {
                var div = '';

                for (i = 0; i < dados.retorno.length; i++) {
                    if ($("#selecao_id").val() != ' ') {
                        if (dados.retorno[i].id == $("#selecao_id").val()) {
                            buscarInfo(dados.retorno[i].id);
                            div += '<li><a class="active" onclick="buscarInfo(' + dados.retorno[i].id + ', $(this));">' + dados.retorno[i].tipo_servico + ' </a></li>';
                        } else {
                            div += '<li><a onclick="buscarInfo(' + dados.retorno[i].id + ', $(this));">' + dados.retorno[i].tipo_servico + '</a></li>';
                        }
                    } else {
                        if (i == 0) {
                            buscarInfo(dados.retorno[i].id);
                            div += '<li><a class="active" onclick="buscarInfo(' + dados.retorno[i].id + ', $(this));">' + dados.retorno[i].tipo_servico + ' </a></li>';
                        } else {
                            div += '<li><a onclick="buscarInfo(' + dados.retorno[i].id + ', $(this));">' + dados.retorno[i].tipo_servico + '</a></li>';
                        }
                    }
                }


                $("#tipo_ajax").html(div);
            } else {
                $("#resposta_ajax").html("<a class='btn btn-primary' onclick='buscarTipo()'>Tentar Novamente!</a>");
                $("#tipo_ajax").html("<h1>" + dados.msg + "</h1>");
            }
        },
        error: function () {
            $("#resposta_ajax").html("<a class='btn btn-primary' onclick='buscarTipo()'>Tentar Novamente!</a>");
            $("#tipo_ajax").html("<h1>Nosso sistema está passando por instabilidades, aguarde alguns instantes e tente novamente!</h1>");
        }

    });
}

buscarTipo();

function buscarInfo(id, elemento) {
    $("#resposta_ajax").text('');

    $(".active").removeClass("active");
    $(elemento).addClass("active");

    $.ajax({
        type: 'post',
        dataType: 'json',
        data: {id: id},
        url: $("#link").val() + 'servicos/buscarInfo',
        beforeSend: function () {
            $("#resposta_ajax").html("<img src='" + $("#recurso").val() + "/imagemSite/carregando.gif' class='gif-carregando' />");
        },

        success: function (dados) {
            if (dados.status == 1) {
                var div = '';

                div += '<h2>' + dados.retorno.titulo + ' </h2>';
                div += '<p>' + dados.retorno.texto + ' </p>';

                $("#resposta_ajax").html(div);
            } else {
                $("#resposta_ajax").html('<h1>' + dados.msg + '</h1><a class="btn btn-primary" onclick="buscarInfo(' + id + ')">Tentar Novamente!</a>');

            }
        },
        error: function () {
            $("#tipo_ajax").html("<h1>Nosso sistema está passando por instabilidades, aguarde alguns instantes e tente novamente!</h1><a class='btn btn-primary' onclick='buscarInfo(" + id + ")'>Tentar Novamente!</a>");
        }

    });
}