
<div class="container-fluid">

    <div id="pie" class="col-lg-12 col-md-12 col-xs-12">
        
        <div style="margin-top:12px;" class="col-lg-4 col-md-4 col-xs-12 center-block">
           

        </div>
        
        <div class="col-lg-4 col-md-4 col-xs-12">
            <h1 style=" color: #000000; font-size: 21px; font-family: 'Roboto', sans-serif;" class="text-center">Eshop UTN</h1>
            <div style=" color: #000000; font-size: 11px; font-family: 'Roboto', sans-serif; "class="text-center">Compre productos a su medida</div>
        </div>
        
        <div class="col-lg-4 col-md-4 col-xs-12 center-block">
            <div>
                <a class="navbar-left col-lg-4 col-md-4 col-xs-12" href="https://www.facebook.com" target="_BLANK">
                    <img class="center-block img-circle" style="width: 32px; height: 32px; margin-top:12px; padding: 8px;  background: #FF5857;" src="<?php base_url(); ?>assets/images/img/face.png"> 
                </a>
            </div>
            <div>
                <a class="navbar-left col-lg-4 col-md-4 col-xs-12" href="mailto:support@company.com" target="_BLANK">
                    <img class="center-block img-circle" style="width: 32px; height: 32px; margin-top:12px;  padding: 8px;  background: #FF5857;" src="<?php base_url(); ?>assets/images/img/gmail.png"> 
                </a>
            </div>
            
            <div>
                <a class="navbar-left col-lg-4 col-md-4 col-xs-12" href="#">
                    <img class="center-block img-circle" style="width: 32px; height: 32px; margin-top:12px;  padding: 8px;  background: #FF5857;" src="<?php base_url(); ?>assets/images/img/gmail.png"> 
                </a>
            </div>
        </div>
  
    </div>
</div>
<br><br>
 <div style="background: #000000; padding: 15px;" class="text-center">
            <span style="color:#FFFFFF">Derechos Reservados a ©2018 Empresa</span>
            <?php if ($this->session->userdata('login') == false) { ?>
                <a href="<?= base_url('login_controller') ?>"><i class="fa fa-user fa-fw"></i></a>
                <?php } ?>
        </div>

<script src="<?= base_url(); ?>assets/js/bootstrap.min.js"></script>
<script src="<?= base_url(); ?>assets/js/login.js"></script>

<?php if (($this->session->userdata('login') == true) && ($definir == 2)) { ?>
    <script src="<?= base_url(); ?>assets/js/producto.js"></script>
<?php } ?>

<?php if ($definir == 1) { ?>
    <script src="<?= base_url(); ?>assets/js/producto2.js"></script>
    <script src="<?= base_url(); ?>assets/js/categoria2.js"></script>
<?php } ?>


<?php if ($definir == 4) { ?>
    <script src="<?= base_url(); ?>assets/js/producto3.js"></script>
    <script src="<?= base_url(); ?>assets/js/categoria2.js"></script>
<?php } ?>


<?php if (($this->session->userdata('login') == true) && ($definir == 3)) { ?>
    <script src="<?= base_url(); ?>assets/js/categoria.js"></script>
<?php } ?>

</body>
</html>

