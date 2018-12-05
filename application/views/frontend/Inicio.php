<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>


<script>
    $(function () {

        $('#carousel-example-generic').on('slide.bs.carousel', function () {
            $('.tooltip-carousel').popover('hide');
            $(this).find('.caraousel-tooltip-item.active').fadeOut(function () {
                $(this).removeClass('active');
            });
        });

        $('#carousel-example-generic').on('slid.bs.carousel', function () {
            var index = $(this).find('.carousel-inner > .item.active').index();
            $(this).find('.caraousel-tooltip-item').eq(index).fadeIn(function () {
                $(this).addClass('active');
            });
        });

        $('.tooltip-carousel').mouseenter(function () {
            $(this).popover('show');
        }).mouseleave(function () {
            $(this).popover('hide');
        });
    });


    $("#inicio").addClass("activo");
    $("#contacto").removeClass("activo");
    $("#quienes").removeClass("activo");


</script>

<script>
    $(document).ready(function () {
        $(".fadeProd").hide().fadeIn(4000);
    });
</script>
    <br>

      <!--  CATEGORIA  --> 
      <div class="row">
        <div class="col-lg-3 col-md-3">
            <div class="panel panel-defaul">
                <div class="panel-heading"  style=" color:#000000; ">
                    <div style=" color:#000000; border-bottom: 1px solid #DDDDDD;" id="headProd">
                        <span style=" border-bottom:3px #FF5857 solid;">CATEGORÍAS</span>
                    </div>
                </div>
                <div class="panel-body">
                    <table id="tbCategoriaInicio" class="table table-responsive">
                        <thead>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    <!-- PARTE PARA MOSTRAR LOS PRODUCTOS-->
    <div class="row">
        <div class="col-lg-12 col-md-12 col-xs-12">
            <div class="panel panel-defaul">
                <div class="panel-heading" >
                    <div style=" color:#000000; border-bottom: 1px solid #DDDDDD;" id="headProd"><span style=" border-bottom:3px #FF5857 solid;">PRODUCTOS Nuevos Todos los Dias</span></div>
                </div>
                <div class="panel-body">
                    <div class="col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3  col-xs-12 ">
                        <br>
                        <input type="text" class="form-control" id="bus" name="busqueda" placeholder="Nombre del producto">
                    </div>
                </div>
                <div class="row">
                   
                    <br>
                    <div id='tbProductoInicio' class="tab-pane fadeProd">
                    </div>
                    <div class="text-center paginacion">
                    </div>
                </div>
            </div>
        </div>
    </div>
  
        <!-- COMO ENVIAR UN CORREO-->
        <div class="col-lg-9 col-md-9 text-center">

            <div class="col-lg-12 col-md-12 col-xs-12">

</div>

</html>