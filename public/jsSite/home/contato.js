function enviarContato() {
    var nome = $("#nome").val();
    var telefone = $("#telefone").val();
    var email = $("#email").val();
    var assunto = $("#assunto").val();

    if (nome.trim() == '') {
        alert("Digite o seu nome!");
        $("#nome").focus();
        return null;
    }

    if (telefone.trim() == '') {
        alert("Digite o seu telefone!");
        $("#telefone").focus();
        return null;
    }

    if (email.trim() == '') {
        alert("Digite o seu email!");
        $("#email").focus();
        return null;
    }

    if (assunto.trim() == '') {
        alert("Digite o Assunto!");
        $("#assunto").focus();
        return null;
    }

    $.ajax({
        type: 'post',
        dataType: 'json',
        data: {nome: nome, telefone: telefone, email: email, assunto: assunto},
        url: $("#link").val() + 'contato/inserirAjax',
        beforeSend: function () {
            $("#btn_inserir").addClass('hidden');
        },
        success: function (dados) {
            if (dados.status == '1') {
                alert(dados.msg);
                $("#nome").val("");
                $("#telefone").val("");
                $("#email").val("");
                $("#assunto").val("");
            } else {
                alert(dados.msg);
            }
            $("#btn_inserir").removeClass('hidden')
        }
    });
}