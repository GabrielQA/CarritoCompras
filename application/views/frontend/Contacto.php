<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<script src="<?= base_url(); ?>assets/js/form-scripts.js"></script>
<script>
    $("#contacto").addClass("activo");
    $("#inicio").removeClass("activo");
    $("#quienes").removeClass("activo");
</script>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-lg-8 col-sm-6 col-sm-offset-2 col-xs-12">
            <div style=" color:#000000; border-bottom: 1px solid #DDDDDD;" id="headProd"><span style=" border-bottom:3px #FF5857 solid;">FORMULARIO DE CONTACTO</span></div>
            <br>

            <div class="text-center" style="color:#707776; font-family: 'Roboto Condensed', sans-serif; font-size: 15px;">
                Llena los campos y solicita la información 
                que necesites responderemos tu mensaje antes posible.
            </div>
            <br>
            <form role="form"  id="contactForm" method="POST" action="<?php echo base_url(); ?>Contacto/enviarCorreo">
                <div class="form-group">
                    <label for="name"><span style="font-size: 15px">Nombre :</span></label>
                    <input type="text" class="form-control " id="nombre" name="nombre" required>
                </div>
                <div class="form-group">  
                    <label for="email"><span>Correo electronico :</span></label>
                    <input type="email" class="form-control" name="correo" id="correo"  required>
                </div>

                <div class="form-group">
                    <label for="message"><span>Mensaje con sus preguntas :</span></label>
                    <textarea id="mensaje" name="mensaje" class="form-control" rows="5"  required></textarea>
                </div>

                <button type="submit" id="form-submit" class="btn btn-md pull-right" style=" font-family: 'Roboto Condensed', sans-serif; font-size: 15px; background:#FFC60A; color:#f7f7f7;">Enviar</button>
            </form>
            <div id="Mensaje1" class="text-center hidden" style="font-family:'Roboto', sans-serif; font-size: 25; color:#FF5857">Mensaje enviado! Te contactaremos lo antes posible.</div>
            <div id="Mensaje2" class="text-center hidden"  style="font-family:'Roboto', sans-serif; font-size: 25; color:#FF5857">Oops! tenemos un problema. Intenta por alguna Red Social.</div>
        </div>
    </div>
</div>
<br><br>