<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>


<br><br><br><br>
<!-- CONTENEDOR  PRINCIPAL--> 
<div class="container">

    <!-- FORMULARIO --> 
    <div class="row">

        <div class="col-lg-8 col-lg-offset-2 col-md-8 col-md-offset-2 col-xs-12">
            <span class="text-center">INGRESAR NUEVOS PRODUCTOS</span>
            <form id="form-create-empleado" class="form-horizontal col-lg-12 col-md-12 col-xs-12" role="form" action="<?php base_url(); ?>producto/guardar_datosController" method="POST">

                <div class="form-group">
                    <input id="nombre" type="text" name="nombre" class="form-control" placeholder="Nombre" required/>
                </div>
                <div class="form-group ">
                    <input id="descripcion" type="text" name="descripcion" class="form-control" placeholder="Descripcion" required/>
                </div>
                <div class="form-group ">
                    <input id="valor" type="text" name="valor" class="form-control" placeholder="Valor " required/>
                </div>

                <div class="form-group ">
                    <label>Unir a categoria:</label>
                    <select name="categoria" id="categoria">
                    </select>
                    <input type="hidden" name='idCategoria' id='idCategoria' required>
                </div>
                <div class="form-group">
                    <input id="foto" type="file" name="imagen_producto" />
                </div>
                <div class="form-group pull-right col-lg-5 col-md-5 col-xs-10">
                    <button type="submit" class="btn btn-danger btn-block" value="Registrar">Ingresar Producto</button>
                </div>
            </form>
        </div>
    </div>
    <br><hr><br>
    <div class="row">
        <div class="col-lg-8 col-lg-offset-2 col-md-8 col-md-offset-2 col-xs-12">
            <div class="col-lg-12">
                <span class="text-center">FORMULARIO DE BUSQUEDA</span>
            </div>
            <div class="col-lg-12">
                <input type="text" class="form-control" id="bus" name="busqueda" placeholder="Ingrese producto a buscar">
            </div>
            <br>
            <div class="col-lg-12">
                <input type="button" class="btn btn-danger btn-block" id="btnbuscar" value="Mostrar Todo" data-toggle='modal' data-target='#basicModal'>
            </div>
        </div>
    </div>

    <hr>

    <!-- PAGINACION Y MOSTRAR DATOS  --> 
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-danger">
                <div class="panel-heading">
                    <span class="text-center">PRODUCTOS EN LA BASE DE DATOS</span>
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
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nombre</th>
                                    <th>Descripcion</th>
                                    <th>Precio</th>
                                    <th>Categoria</th>
                                    <th>Imagen</th>
                                    <th>E = Editar<br>A = Actualiza</th>
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

    <!-- FORMULARIO PARA ACTUALIZAR PRODUCTOS -->
    <div class="row">

        <div class="col-lg-8 col-lg-offset-2 col-md-8 col-md-offset-2 col-xs-12">
            <div class="panel panel-danger">
                <div class="panel-heading">
                    <span class="text-center">ACTUALIZAR PRODUCTOS</span>
                </div>
                <div class="panel-body">
                    <form id="form-actualizar" class="form-horizontal" action="<?php echo base_url(); ?>producto/actualizar_datos" method="post" role="form" style="padding:0 10px;">
                        <div class="form-group">
                            <label>Nombres Producto:</label>
                            <input type="hidden" id="idsele" name="idsele" value="">
                            <input type="text" name="nombressele" id="nombressele" class="form-control">
                        </div>

                        <div class="form-group">
                            <label>Descripcion Producto:</label>
                            <input type="text" name="descripcionsele" id="descripcionsele" class="form-control">
                        </div>

                        <div class="form-group">
                            <label>Valor Producto: </label>
                            <input type="text" name="valorsele" id="valorsele" class="form-control">
                        </div>

                        <div class="form-group">
                            <button type="button" id="btnactualizar" class="btn btn-danger btn-block">Guardar Cambios</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <br><br><br><br>
</div>



