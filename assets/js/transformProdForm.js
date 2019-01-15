$(".onClick").click(function() {

    $(".onClick ").toggleClass("btn-warning btn-danger");
    $(".span-mod1").text("Annuler");
    $(".onClick ").attr("type", "reset");
    $(".inputClass").toggleClass("form-control-plaintext form-control");
    $(".inputClass").removeAttr("readonly");
    $(".sub").removeAttr("style");
});
