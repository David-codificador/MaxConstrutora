function enviarContato() {
    var nome = $("#nome").val();
    var telefone = $("#telefone").val();
    var email = $("#email").val();
    var assunto = $("#assunto").val();


    $.ajax({
        type: 'post',
        dataType: 'json',
        data: {nome: nome, telefone: telefone, email: email, assunto: assunto},
        url: $("#link").val() + 'contato/inserirAjax',
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
              
        }
    });
}