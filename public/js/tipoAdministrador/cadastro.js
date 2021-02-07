$(function($) {
    var smallElems = Array.prototype.slice.call(document.querySelectorAll(".js-switch-small"));

    smallElems.forEach(function(html) {
        var switchery = new Switchery(html, {
            size: "small"
        });
    });
});