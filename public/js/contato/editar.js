$(function($) {
    var smallElems = Array.prototype.slice.call(document.querySelectorAll(".js-switch-small"));

    smallElems.forEach(function(html) {
        var switchery = new Switchery(html, {
            size: "small"
        });
    });
});

$(".telefone").mask("(00) 0 0000-0000");



$(function($) {
    $(".js-states").select2();
});

