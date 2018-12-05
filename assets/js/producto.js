
$(document).ready(inicio);
var web = 'http://localhost/webProductos/';

function inicio() {

    mostrarCombo();


    //pasarCategoriaInicio();

    $("#categoria").change(function () {
        var1 = $(this).val();

        $("#idCategoria").val(var1);
    });



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
                $("#descripcion").val("");
                $("#valor").val("");
                $("#foto").val("");


                $("#idcategoria").val("");

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
        descripcion = $(this).parent().parent().children("td:eq(2)").text();
        valor = $(this).parent().parent().children("td:eq(3)").text();
        
        
        $("#idsele").val(id);
        $("#nombressele").val(nombre);
        $("#descripcionsele").val(descripcion);
        $("#valorsele").val(valor);


    });


    // ELIMINAR() PASAR DATOS CON UN BOTON AL FORMULARIO 
    $("body").on("click", "#tbempleado tbody button", function (event) {
        event.preventDefault();
        id = $(this).attr("value"); //
        eliminar_datos(id);
    });
} // end funcion inicio

/*
 function pasarCategoriaInicio() {
 var1 = $("#categoria").select().val();
 alert(var1);
 $("#idCategoria").val(var1);
 
 }*/


function mostrarCombo() {
    $.ajax({
        url: web + "categoria/mostrar_datosController2",
        type: "POST",
        dataType: "json",
        success: function (respuesta) {
            var registros = eval(respuesta);

            html = "<option>elige una categoria</option>";

            for (var i = 0; i < registros.length; i++) {
                id = registros[i]["id_categoria"];
                nombre = registros[i]["nombre_categoria"];


                html += "<option value='" + id + "'>" +
                        nombre +
                        "</option>";

            }
            ;

            $("#categoria").html(html);

        }

    });
}


function mostrarDatos(valorBuscar, pagina, cantidad) {
    $.ajax({
        url: web + "producto/mostrar_datosController",
        type: "POST",
        data: {buscar: valorBuscar, nropagina: pagina, cantidad: cantidad},
        dataType: "json",
        success: function (response) {

            filas = "";
            $.each(response.producto, function (key, item) {
                filas += "<tr>" +
                        "<td>" +
                        item.id_producto +
                        "</td>" +
                        "<td>" +
                        item.nombre_producto +
                        "</td>" +
                        "<td>" +
                        item.descripcion_producto +
                        "</td>" +
                        "<td>" +
                        item.valor_producto +
                        "</td>" +
                        
                        "<td>" +
                        item.id_categoriaFK +
                        "</td>" +
                        
                        "<td>" +
                        "<img src='" + web + "assets/images/uploads/" + item.imagen_producto + "' style='width:150px; height:100px;'/>" +
                        "</td>" +
                        "<td>" +
                        "<a href='" + item.id_producto + "' class='btn btn-warning' data-toggle='modal' data-target='#myModal'>A</a> " +
                        "<button class='btn btn-danger' type='button' value='" + item.id_producto + "'>E</button>" +
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
        url: web + "producto/actualizar_datosController",
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
        url: web + "producto/eliminar_datosController",
        type: 'POST',
        data: {id: id},
        success: function (respuesta) {
            alert(respuesta);
            mostrarDatos("", 1, 5);
        }
    });
}




