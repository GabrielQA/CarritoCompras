
$(document).ready(inicio);

var web = 'http://localhost/webProductos/';

function inicio() {

    mostrarDatos("", 1, 5);
    $("#btnbuscar").click(function () {
        mostrarDatos("", 1, 5);
        $("#bus").val("");

    });

    $("input[name=busqueda]").keyup(function () {
        textobuscar = $(this).val();
        valoroption = $("#cantidad").val();
        mostrarDatos(textobuscar, 1, valoroption);

    });

    $("body").on("click", ".paginacion li a", function (e) {
        e.preventDefault();
        valorhref = $(this).attr("href");
        valorBuscar = $("input[name=busqueda]").val();
        valoroption = $("#cantidad").val();
        mostrarDatos(valorBuscar, valorhref, valoroption);
      
    });

    $("#cantidad").change(function () {
        valoroption = $(this).val();
        valorBuscar = $("input[name=busqueda]").val();
        mostrarDatos(valorBuscar, 1, valoroption);

    });

    // ACTUALIZAR DATOS
    $("#btnactualizar").click(actualizar_datos);

    // INGRESAR DATOS
    $("form").submit(function (event) {
        // corta el flujo 
        event.preventDefault();
        var formData = new FormData($("form")[0]);
        $.ajax({
            url: $("form").attr("action"), // ver lo que esta en el form
            type: $("form").attr("method"),
            data: formData, //$("form").serialize(),
            cache: false,
            contentType: false,
            processData: false,
            success: function (respuesta) {
                alert(respuesta);
                $("#nombre").val("");
                mostrarDatos("", 1, 5);
            }
        });// end ajax
    });   // end $form

    // ACTUALIZAR() PASAR DATOS CON UN BOTON AL FORMULARIO 
    $("body").on("click", "#tbempleado tbody a", function (event) {
        event.preventDefault();


        //selector padre td     tr    busca hijos con indice 1 para el nombre 
        id = $(this).attr("href");
        nombre = $(this).parent().parent().children("td:eq(1)").text();
       
        $("#idsele").val(id);
        $("#nombressele").val(nombre);
    });




    // ELIMINAR() PASAR DATOS CON UN BOTON AL FORMULARIO 
    $("body").on("click", "#tbempleado tbody button", function (event) {
        event.preventDefault();
        id = $(this).attr("value"); //
        eliminar_datos(id);
    });
} // end funcion inicio

function mostrarDatos(valorBuscar, pagina, cantidad) {
    $.ajax({
        url: web + "categoria/mostrar_datosController",
        type: "POST",
        data: {buscar: valorBuscar, nropagina: pagina, cantidad: cantidad},
        dataType: "json",
        success: function (response) {

            filas = "";
            $.each(response.categoria, function (key, item) {
                filas += "<tr>" +
                        "<td>" +
                        item.id_categoria +
                        "</td>" +
                        "<td>" +
                        item.nombre_categoria +
                        "</td>" +
                        "<td>" +
                        "<a href='" + item.id_categoria + "' class='btn btn-warning' data-toggle='modal' data-target='#myModal'>A</a> " +
                        "<button class='btn btn-danger' type='button' value='" + item.id_categoria + "'>E</button>" +
                        "</td>" +
                        "</tr>";
            });


            $("#tbempleado tbody").html(filas);
            linkseleccionado = Number(pagina);

            totalregistros = response.totalregistros;

            cantidadregistros = response.cantidad;

            numerolinks = Math.ceil(totalregistros / cantidadregistros);
            paginador = "<ul class='pagination'>";
            if (linkseleccionado > 1)
            {
                paginador += "<li><a href='1'>&laquo;</a></li>";
                paginador += "<li><a href='" + (linkseleccionado - 1) + "' '>&lsaquo;</a></li>";

            } else
            {
                paginador += "<li class='disabled'><a href='#'>&laquo;</a></li>";
                paginador += "<li class='disabled'><a href='#'>&lsaquo;</a></li>";
            }
            //muestro de los enlaces 
            //cantidad de link hacia atras y adelante
            cant = 2;
            //inicio de donde se va a mostrar los links
            pagInicio = (linkseleccionado > cant) ? (linkseleccionado - cant) : 1;
            //condicion en la cual establecemos el fin de los links
            if (numerolinks > cant)
            {
                //conocer los links que hay entre el seleccionado y el final
                pagRestantes = numerolinks - linkseleccionado;
                //defino el fin de los links
                pagFin = (pagRestantes > cant) ? (linkseleccionado + cant) : numerolinks;
            } else
            {
                pagFin = numerolinks;
            }

            for (var i = pagInicio; i <= pagFin; i++) {
                if (i === linkseleccionado)
                    paginador += "<li class='active'><a href='javascript:void(0)'>" + i + "</a></li>";
                else
                    paginador += "<li><a href='" + i + "'>" + i + "</a></li>";
            }
            //condicion para mostrar el boton sigueinte y ultimo
            if (linkseleccionado < numerolinks)
            {
                paginador += "<li><a href='" + (linkseleccionado + 1) + "' >&rsaquo;</a></li>";
                paginador += "<li><a href='" + numerolinks + "'>&raquo;</a></li>";

            } else
            {
                paginador += "<li class='disabled'><a href='#'>&rsaquo;</a></li>";
                paginador += "<li class='disabled'><a href='#'>&raquo;</a></li>";
            }

            paginador += "</ul>";
            $(".paginacion").html(paginador);

        }
    });
}



function actualizar_datos() {
    $.ajax({
        url: web + "categoria/actualizar_datosController",
        type: 'POST',
        data: $("#form-actualizar").serialize(),
        success: function (respuesta) {
            alert(respuesta);
            mostrarDatos("", 1, 5);
            $("#idsele").val("");
            $("#nombressele").val("");
            $("#descripcionsele").val("");
            $("#valorsele").val("");

        }
    });
}


function eliminar_datos(id) {
    $.ajax({
        url: web + "categoria/eliminar_datosController",
        type: 'POST',
        data: {id: id},
        success: function (respuesta) {
            alert(respuesta);
            mostrarDatos("", 1, 5);
        }
    });
}


