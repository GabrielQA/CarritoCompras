
$(document).ready(inicio);


var web = 'http://localhost/webProductos/';
function inicio() {
    mostrarDatos();
  
 
}
function mostrarDatos() {
    $.ajax({
        url: web + "categoria/mostrar_datosController2",
        type: "POST",
        dataType: "json",
        success: function (respuesta) {
            var registros = eval(respuesta);
           
           html ="";
            html += "<ul>";
            for (var i = 0; i < registros.length; i++) {
                id = registros[i]["id_categoria"];
                nombre = registros[i]["nombre_categoria"];


                html +=
                        "<li> " +
                        "<a id= '" + id + "' href='" + web +
                        "buscar_por_categoria?id=" + id + "&nom="+nombre+"'> <strong style='color:#FF5857'>>&nbsp;&nbsp;</strong>" +
                        nombre + "</a>" +
                        "</li>";

            }
            ;
            html += "</ul>";
            
            $("#tbCategoriaInicio tbody").html(html);

        }

    });


}








