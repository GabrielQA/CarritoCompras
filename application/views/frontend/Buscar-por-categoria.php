<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<script>
    $(document).ready(function () {
        $(".fadeProd").hide().fadeIn(4000);
    });
</script>
            
    <br>
    <br>
    <br>
    
    <!--  PAGINACION Y MOSTRAR DATOS  --> 
    <div class="row">
        <!-- CATEGORIA -->

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

        <!-- MOSTRAR PRODUCTOS -->
        <div class="col-lg-9 col-md-9">
            <div class="panel panel-defaul">
                
                <div class="panel-heading">
                    <center>
                    <div style=" color:#000000; border-bottom: 1px solid #DDDDDD;" id="headProd"><span>PRODUCTOS ENCONTRADOS EN LA CATEGORIA : &nbsp; </span><strong><span id="spn" style="color:#FF5F5E; text-transform: uppercase;"></span></strong> </div>
                    </center>                
                </div>
            
                <div class="row">
                    <div class="col-lg-12  col-md-12 col-xs-12 ">
                        <span>Mostrar por : </span>
                        <select name="cantidad" id="cantidad2">
                            <option value="4">4</option>
                            <option value="8">8</option>
                        </select>
                    </div> 
                    <br>
                    <div id='tbProductoInicio' class="tab-pane fadeProd">
                    </div>
                    <div class="text-center paginacion">
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
