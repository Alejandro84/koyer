<div class="container" style="margin-bottom: 60px;">
<div class="row">
    <h1>Resumen</h1>
    <hr>
</div>
<div class="row"><!--informacion de la reserva-->

    <div class="col-md-12">
        <? $this->load->view('template/alert'); ?>

        <h2>Datos de la reserva</h2>
        <div class="col-md-4">
            <label for="">Código de la reserva:</label><p><?php echo  $codigo_reserva ?> </p>

            <label for="">Días de arriendo:</label><p><? echo $dias; ?> días</p>

        </div>

        <div class="col-md-4">
            <label for="">Fecha de Entrega:</label> <p><?php echo  $fecha_entrega ?> </p>
            <label for="">Fecha de Devolución:</label><p><?php echo  $fecha_devolucion ?> </p>
        </div>

        <div class="col-md-4">
            <label for="">Lugar de Entrega:</label><p><?php echo  $locacion_entrega->locacion?></p>
            <label for="">Lugar de Devolucion:</label><p><?php echo  $locacion_devolucion->locacion?></p>

        </div>

    </div>
</div>
<hr>
<div class="row"><!--Informacion del cliente-->
    <div class="col-md-12">
        <h2>Datos del Cliente</h2>

        <table class="table table-striped table-bordered">

            <thead>
            <th>RUT</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>E-Mail</th>
            </thead>

            <tbody>
            <tr>
                <td><?php echo $cliente->rut;?></td>
                <td><?php echo $cliente->nombre;?></td>
                <td><?php echo $cliente->apellido;?></td>
                <td><?php echo $cliente->email;?></td>
            </tr>
            </tbody>
            <thead>
                <th>Teléfono</th>
                <th>País</th>
                <th>Ciudad</th>
                <th>Dirección</th>
                
            </thead>
            <tbody>
            <tr>
                <td><?php echo $cliente->telefono;?></td>
                <td><?php echo $cliente->pais;?></td>
                <td><?php echo $cliente->ciudad;?></td>
                <td><?php echo $cliente->direccion;?></td>
            </tr>
            </tbody>

        </table>


    </div>
</div>
<hr>
<div class="row"><!--informacion del vehiculo-->
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-6">
                <h2>Informacion del Vehiculo</h2>
            </div>
            <div class="col-md-6">
                <form action="<?php echo  site_url( 'reserva/cambiarauto' ); ?>" method="post">
                    <div class="form-group form-inline pull-right">
                        <select class="form-control" name="cambiar_auto">
                            <option value="">Si desea cambiar el auto, seleccione uno aquí</option>
                            <?php foreach ($autos_disponibles as $a ): ?>
                                <option value="<?php echo $a['info_auto']->id_vehiculo ?>"><?php echo $a['info_auto']->marca . ' ' . $a['info_auto']->modelo . ' (' . $a['info_auto']->patente . ')'?></option>
                            <?php endforeach; ?>
                        </select>
                        <input type="submit" value="Cambiar" class="btn btn-success ">
                    </div>

                </form>
            </div>
        </div>

        <table class="table table-striped table-bordered">

            <thead>
            <th>Patente</th>
            <th>Modelo</th>
            <th>Marca</th>
            </thead>

            <tbody>
            <tr>
                <td><?php echo $vehiculo->patente;?></td>
                <td><?php echo $vehiculo->modelo;?></td>
                <td><?php echo $vehiculo->marca;?></td>
            </tr>
            </tbody>
            <thead>
            <th>Transmision</th>
            <th>Categoria</th>
            <th>Combustible</th>
            </thead>
            <tbody>
            <tr>
                <td><?php echo $vehiculo->transmision;?></td>
                <td><?php echo $vehiculo->categoria;?></td>
                <td><?php echo $vehiculo->combustible;?></td>
            </tr>
            </tbody>


        </table>


    </div>
</div>
<hr>
<?php $suma_extra = 0; ?>
<?php if ( ! $extras ):
else: ?>
<div class="row"><!-- Informacio de los extras-->
    <div class="col-md-6">
        <h2>Extras</h2>

        <table class="table table-striped table-bordered">
            <thead>
            <th>Extra</th>
            <th>Cantidad</th>
            <th>Precio</th>
            <th>Total</th>
            </thead>
            <tbody>
                <?php foreach ($extras as $extra ): ?>
                    <?php if ($extra['cantidad'] != null): ?>
                        <tr>
                        <td><?php echo  $extra['info_extra']->extra ?></td>
                        <td><?php echo  $extra['cantidad'] ?></td>
                        <td><?php echo  $extra['info_extra']->precio?></td>
                        <?php if ($extra['info_extra']->por_dia == 1 ): ?>
                                <td><?php echo  ($extra['info_extra']->precio * $extra['cantidad']) * $dias ?> CLP</td>
                        <?php else: ?>
                                <td><?php echo  $extra['info_extra']->precio * $extra['cantidad']  ?> CLP</td>
                        <?php endif; ?>

                        </tr>

                    <?php endif; ?>


                    <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
<hr>
<?php endif; ?>
<div class="row">

    <div class="col-md-12">
        <div class="row">
            <div class="col-md-6">
            <h2>Precios</h2>
            </div>
        </div>


        <table class="table table-striped table-bordered">
            <thead>
            <th>Precio por dia</th>
            <th>Precio por extras</th>
            <th>Sub total</th>
            <th>Total</th>
            </thead>
            <tbody>
    <form class="" action="<?php echo  site_url( 'reserva/generar_reserva' ); ?>" method="post">
            <tr class="success">
                <td><?php echo '$' . number_format($precio_arriendo_vehiculo , '0', ',' , '.');?></td>
                <td><?php echo '$' . number_format($total_extra , '0', ',' , '.');?></td>
                <td><?php echo '$' . number_format($sub_total , '0', ',' , '.');?></td>
                <td><input type="text" name="total" value="<?php echo '$' . number_format($total , '0', ',' , '.');?>" class="form-control"></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <th>Precio Final USD</th>
                
                <td class="success"><?php echo '$' . number_format($total_usd , '2', ',' , '.');?></td>
            </tr>
            </tbody>
        </table>
    </div>

</div>
<hr>
<div class="row">

    <h4>Datos Extras(obligatorio)</h4>
        
        <div class="form-group col-md-4">
            <label for="">Codigo Interno</label>
            <input type="nunmber" name="codigo_interno" class="form-control">
        </div>

        <div class="form-group col-md-4">
            <label>Cantidad de pasajeros</label>
            <input type="number" name="pasajeros" class="form-control">
        </div>

        <div class="form-group col-md-4">
            <label>Fecha de vencimiento del documento de conducir</label>
            <div class="form-group">
                <div class="input-group">
                    <input name="permiso_conducir" type="text" id="fecha_mantencion" class="form-control datepicker">
                    <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                </div>
            </div>
        </div>

    </div>

        <div class="row">
            <div class="col-md-6 col-xs-12">
                
                <h4>Datos De vuelo (no obligatorio)</h4>
                
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Nro del vuelo</label>
                        <input type="text" name="numero_vuelo" class="form-control">
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="form-group">
                        <label>Nombre de Hospedaje</label>
                        <input type="mail" name="hospedaje" class="form-control">
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="form-group">
                        <label>Dirección de Hospedaje</label>
                        <input type="mail" name="direccion_hospedaje" class="form-control">
                    </div>
                </div>

            </div>
            
            <div class="col-md-6 col-xs-12">
                <div class="form-group">
                    <label for="comment">Comentario</label>
                    <textarea name="comentario" class="form-control" rows="9" id="comment"></textarea>
                </div>
            </div>

        </div>
    <input type="text" name="codigo_reserva" value="<?php echo  $codigo_reserva?>" hidden="">
    <input type="text" name="fecha_entrega" value="<?php echo  $fecha_entrega?>" hidden="">
    <input type="text" name="fecha_devolucion" value="<?php echo  $fecha_devolucion?>" hidden="">
    <input type="text" name="locacion_entrega" value="<?php echo  $locacion_entrega->id_locacion?>" hidden="">
    <input type="text" name="locacion_devolucion" value="<?php echo  $locacion_devolucion->id_locacion?>" hidden="">
    <input type="text" name="id_cliente" value="<?php echo $cliente->id_cliente;?>" hidden="">
    <input type="text" name="id_vehiculo" value="<?php echo $vehiculo->id_vehiculo;?>" hidden="">
    <input type="text" name="precio_arriendo_vehiculo" value="<?php echo $precio_arriendo_vehiculo;?>" hidden="">
    <input type="text" name="sub_total" value="<?php echo $sub_total;?>" hidden="">
    <hr>
    <div class="row">
        
        <div class="col-md-6 pull-right">
            <form class="" action="<?php echo  site_url( 'reserva/definir_reserva'); ?>" method="post">

            <h4>Propiedades de la Reseva:</h4>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="">Cotizacion</label>
                    <input type="checkbox" name="cotizacion" value="1">
                </div>
            </div>
            <div class="col-md-6">
                <input type="submit" name="" value="Guardar Cotizacion/Reserva" class="btn btn-primary btn-block">
            </div>

            </form>

        </div>

    </div>


</div>
