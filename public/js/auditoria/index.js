window.pagina = 0;
listar();

$("#modal11").iziModal();

function buscarInfo(id) {
    $.ajax({
        type: 'post',
        dataType: 'json',
        data: {id: id},
        url: $("#link").val() + 'auditoria/buscarInfoAjax',
        beforeSend: function () {
        },

        success: function (dados) {
            var div = '';

            div += '<h4 style="margin-top: 0px; margin-bottom: 0px">Tipo :</h4> ' + dados.tipo + '</br>';
            div += ' <h4 style="margin-top: 0px; margin-bottom: 0px">Descrição :</h4> ' + dados.descricao + '</br>';
            div += '<h4 style="margin-top: 0px; margin-bottom: 0px">Tabela :</h4> ' + dados.tabela + '</br>';
            if (dados.campos != null) {
                div += '<h4 style="margin-top: 0px; margin-bottom: 0px">Campos :</h4> ' + dados.campos + '</br>';
            } else {
                div += '<h4 style="margin-top: 0px; margin-bottom: 0px">Campos :</h4>  - </br>';
            }
            div += ' <h4 style="margin-top: 0px; margin-bottom: 0px">Data :</h4> ' + dados.data + '</br>';
            div += '<h4 style="margin-top: 0px; margin-bottom: 0px">IP :</h4>' + dados.ip + '</br>';
            if (dados.nome != null) {
                div += '<h4 style="margin-top: 0px; margin-bottom: 0px">Responsável :</h4> ' + dados.nome + '</br>';
            } else {
                div += '<h4 style="margin-top: 0px; margin-bottom: 0px">Responsável :</h4> : Automático </br>';
            }
            $("#conteudo").html(div);
            $('#modal11').iziModal('open', this);
        }

    });
}



function listar() {
    window.pagina = window.pagina + 1;

    $.ajax({
        type: 'post',
        dataType: 'json',
        data: {pagina: window.pagina},
        url: $("#link").val() + 'auditoria/listarAjax',
        beforeSend: function () {
        },

        success: function (dados) {
            if (dados.status == '1') {
                for (var i = 0; dados.registros.length > i; i++) {
                    var newRow = $("<tr>");
                    var cols = "";

                    cols += '<td>';
                    cols += dados.registros[i].tipo;
                    cols += '</td>';

                    cols += '<td>';
                    cols += dados.registros[i].tabela;
                    cols += '</td>';

                    cols += '<td>';
                    cols += dados.registros[i].descricao;
                    cols += '</td>';

                    cols += '<td>';
                    cols += '<div class="text-center">';
                    cols += '<button type="button" class="btn btn-primary btn-animated btn-wide" onclick="buscarInfo(' + dados.registros[i].id + ')">';
                    cols += '<span class="visible-content">Ver</span>';
                    cols += '<span class="hidden-content"><i class="fa fa-arrow-right"></i></span>';
                    cols += '</button>';
                    cols += '</div>';
                    cols += '</td>';




                    newRow.append(cols);
                    $("#tabela").append(newRow);
                }
            } else {
                toastr["warning"](dados.msg, '');
                $("#btn-mais").addClass('hidden');
            }
        }

    });
}




