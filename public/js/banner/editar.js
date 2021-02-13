$(function($) {
    var smallElems = Array.prototype.slice.call(document.querySelectorAll(".js-switch-small"));

    smallElems.forEach(function(html) {
        var switchery = new Switchery(html, {
            size: "small"
        });
    });
});

$(function($) {
    $(".js-states").select2();
});

function exibirImgBanerRotativo(src){
    $("#tag_exibir_img").attr("src", src);
    $("#exibirImgBanerRotativo").modal();
}
