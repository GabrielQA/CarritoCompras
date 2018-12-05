
//var web = 'http://localhost:8080/webProductos/';
//var web = 'http://www.webproductospruebas.esy.es/';

$(document).ready(inicio);

function inicio(){
$("#nombre").on("click",function (){
    $("#Mensaje1").addClass("hidden");
    $("#Mensaje2").addClass("hidden");
});
 
 
 $("#correo").on("click",function (){
    $("#Mensaje1").addClass("hidden");
    $("#Mensaje2").addClass("hidden");
});
 
 $("#mensaje").on("click",function (){
    $("#Mensaje1").addClass("hidden");
    $("#Mensaje2").addClass("hidden");
});
 
    
$("form").submit(function (event) {
     event.preventDefault();
    $.ajax({
        url: $("form").attr("action"), // ver lo que esta en el form
        type: $("form").attr("method"),
        data: $("form").serialize(),
        success: function (respuesta) {
            
            if (respuesta === "envio") {
                    
                formSuccess();
            }else if (respuesta === "noenvio"){
                formSuccess2();
            }
        }
    });

});
}


function formSuccess() {
    $("#Mensaje1").removeClass("hidden");
    $("#nombre").val("");
    $("#correo").val("");
    $("#mensaje").val("");
}


function formSuccess2() {
    
    $("#Mensaje2").removeClass("hidden");
    $("#nombre").val("");
    $("#correo").val("");
    $("#mensaje").val("");
}