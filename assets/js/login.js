$(document).on("ready", main);
//var web = 'http://www.webproductospruebas.esy.es/';
var web = 'http://localhost/webProductos/';
var web1='http://localhost/webProductos/';
function main() {
    
    $("#login").submit(function (event) {
        event.preventDefault();
        $.ajax({
            url: $(this).attr("action"),
            type: $(this).attr("method"),
            data: $(this).serialize(),
            success: function (respuesta) {
                 
                if (respuesta === "error") {
                    alert("Los datos estan erroneos.");
                } else {
                    alert("Logeado Correctamente.");
                    window.location.href = web1+'producto';
                }
            }
        });
    });





    $("#cerrar").on("click", function (event) {
        event.preventDefault();
        $.ajax({
            url: web+'login_controller/cerrar_controller',
            type: "POST",
            data: {},
            success: function () {
                window.location.href = web;
            }
        });
    });







}

