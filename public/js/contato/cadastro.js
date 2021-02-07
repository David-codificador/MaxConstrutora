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

