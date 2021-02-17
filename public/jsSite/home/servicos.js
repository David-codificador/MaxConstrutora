function listarServicos(id) {
    $.ajax({
        type: 'post',
        dataType: 'json',
        data: {id: id},
        url: $("#link").val() + 'servicos/listarAjax', //Definindo o arquivo onde serão buscados os dados
        beforeSend: function () {

        },
        success: function (dados) {
            if (dados.id != undefined) {
                var info = '';
                
                info += '<li>' + dados.tipo_servico + '</li>';
                info += '<h2>' + dados.titulo + '</h2>';
                info += '<p>' + dados.texto + '</p>';
                
            }
        }
    });
}

