<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

 <br><br><br>
<!-- CONTENEDOR  PRINCIPAL--> 
<div class="container">
    <!-- FORMULARIO --> 
    <div class="row">
        <div class="col-lg-8 col-lg-offset-2 col-md-8 col-md-offset-2 col-xs-12">
            <form id="form-create-categoria" class="form-horizontal col-lg-10" role="form" action="<?php base_url(); ?>categoria/guardar_datosController" method="POST">
               <span class="text-center">FORMULARIO INGRESO DE CATEGORIAS</span>
                <div class="form-group">
                    <input id="nombre" type="text" name="nombre" class="form-control" placeholder="Nombre" required/>
                </div>

                <div class="form-group pull-right col-lg-5 col-md-5 col-xs-10">
                    <button type="submit" class="btn btn-danger btn-block" value="Registrar">Ingresar Categoria</button>
                </div>
            </form>
        </div>
    </div>

    <br><br><br>
    <!-- BUSQUEDA Y BOTON  --> 
    <div class="row">
        <div class="col-lg-8 col-lg-offset-2 col-md-8 col-md-offset-2 col-xs-12">
            <span class="text-center">FORMULARIO DE BUSQUEDA</span>
            <div>
                <input type="text" class="form-control" id="bus" name="busqueda" placeholder="Ingrese Categoria a buscar">
            </div>
            <br>
            <div>
                <input type="button" class="btn btn-danger btn-block" id="btnbuscar" value="Mostrar Todo" data-toggle='modal' data-target='#basicModal'>
            </div>
        </div>
    </div>
    <br><br><br>
    <!-- PAGINACION Y MOSTRAR DATOS  --> 
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="panel panel-danger">
                <div class="panel-heading">
                    <span>Lista de Categorias en la base de datos</span>
                </div>
                <div class="panel-body">
                    <p>
                        <strong>Mostrar por : </strong>
                        <select name="cantidad" id="cantidad">
                            <option value="5">5</option>
                            <option value="10">10</option>
                            <option value="15">15</option>
                        </select>
                    </p>
                    <div class="table-responsive">
                        <table id="tbempleado" class="table table-condensed table-striped">
                            <thead class="text-center">
                                <tr>
                                    <th>Codigo</th>
                                    <th>Nombre</th>
                                    <th>E = Eliminar / A = Actualizar</th>
                                </tr> 
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                    <div class="text-center paginacion">
                    </div>
                </div>
            </div>

        </div>
    </div>
<br><br><br>
    <!-- FORMULARIO PARA ACTUALIZAR PRODUCTOS -->
    <div class="row">
        <div class="col-lg-8 col-lg-offset-2 col-md-8 col-md-offset-2 col-xs-12">
            <div class="panel panel-danger">
                <div class="panel-heading">Editar Categoria</div>
                <div class="panel-body">
                    <form id="form-actualizar" class="form-horizontal" action="<?php echo base_url(); ?>categoria/actualizar_datos" method="post" role="form" style="padding:0 10px;">
                        <div class="form-group">
                            <label>Nombre Categoria:</label>
                            <input type="hidden" id="idsele" name="idsele" value="">
                            <input type="text" name="nombressele" id="nombressele" class="form-control">
                        </div>
                        <div class="form-group">
                            <button type="button" id="btnactualizar" class="btn btn-danger btn-block">Guardar Cambios</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<br><br><br><br>



