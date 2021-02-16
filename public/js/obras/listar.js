function confirmacao(id){
    if(confirm("Deseja apagar esta foto?")){
        $(window.document.location).attr('href', $("#link").val() + 'obras/excluir/' + id);
    }
}