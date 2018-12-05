
$(document).ready(inicio);

var web = 'http://localhost/webProductos/';
function inicio() {

    mostrarDatos3(getQueryVariable('id'), 1, 4);

    $("body").on("click", "#pag li a", function (e) {
        e.preventDefault();

        valorhref = $(this).attr("href");
        valorBuscar = getQueryVariable('id');
        valoroption = $("#cantidad2").val();
        mostrarDatos3(valorBuscar, valorhref, valoroption);

    });

    $("#cantidad2").change(function () {

        valoroption = $(this).val();
        valorBuscar = getQueryVariable('id');
        mostrarDatos3(valorBuscar, 1, valoroption);

    });
    var nombre = getQueryVariable('nom');

   // res = nombre.replace("%20", " ");
    res = nombre.split('%20').join(' ');
    $("#spn").html(res);
}

function getQueryVariable(variable) {
    var query = window.location.search.substring(1);
    var vars = query.split("&");
    for (var i = 0; i < vars.length; i++) {
        var pair = vars[i].split("=");
        if (pair[0] === variable) {
            return pair[1];
        }
    }
    return false;
}


function mostrarDatos3(valorBuscar, pagina, cantidad) {


    $.ajax({
        url: web + "producto/mostrarConCategoria_datosController",
        type: "POST",
        data: {buscar: valorBuscar, nropagina: pagina, cantidad: cantidad},
        dataType: "json",
       success: function (response) {
            var contador = 0;
            var var1 = 0;
            var filas = "";
            filas += "<br>";
            $.each(response.producto, function (key, item) {
                var1++;
                 
                if (var1 === 1) {
                    filas += "<div class='row'>";

                } else if (var1 === 5) {
                    filas += "<div class='row'>";
                }
                filas +=
                        "<div class='col-lg-3 col-md-3 col-xs-12 text-center'>" +
                        "<img class ='img-responsive center-block' src='" + web + "assets/images/uploads/" + item.imagen_producto + "' style='width:240px; height:240px;'/><br>" +
                        "<div class='caption'>" +
                        "<span style='color:#000000;'>" + item.nombre_producto + "</span>" +
                        "</div>" +
                        "<div class='caption'>" +
                        "<p style='color:#94908F;'>" + item.descripcion_producto + "</p>" +
                        "<span style='color:#E7214C;'> $" + item.valor_producto + "</span>" +
                        "<h5 id='codigo' class='center-block' style=' border: 1px solid #D0D0D0;  background:#FFFFFF; color:#000000;'>CODIGO " + item.id_producto +" &nbsp &hearts;</h5>"+ 
                        "</div> <br>" +
                        "</div>";


                contador = contador + 1;
                if (contador === 4) {
                    filas += "</div>";
                   
                } else if (contador === 8) {
                    filas += "</div";
                }
            });

            $("#tbProductoInicio").html(filas);


            linkseleccionado = Number(pagina);

            totalregistros = response.totalregistros;

            cantidadregistros = response.cantidad;

            numerolinks = Math.ceil(totalregistros / cantidadregistros);
            paginador = "<ul class='pagination' id='pag'>";
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


