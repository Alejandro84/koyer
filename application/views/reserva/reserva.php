<div class="container">
   <div class="row">
      <h1>Resumen</h1>
      <hr>
   </div>
   <div class="row"><!--informacion de la reserva-->

      <div class="col-md-12">
         <h2>Datos de la reserva</h2>

         <? $this->load->view('template/alert'); ?>
         <div class="col-md-4">
            <label for="">Código de la reserva:</label><p><?= $reserva->codigo_reserva ?> </p>

            <label for="">Dias de arriendo:</label>

            <?php  // lo primero es hacerlo objeto

            $fecha_entrega       = DateTime::createFromFormat( 'Y-m-d H:i:s' , $reserva->fecha_entrega ); // los parametros son, el formato de la fecha que estas metiendo y la fecha
            $fecha_devolucion    = DateTime::createFromFormat( 'Y-m-d H:i:s' , $reserva->fecha_devolucion );

            $fecha_entrega       = $fecha_entrega->getTimestamp();
            $fecha_devolucion    = $fecha_devolucion->getTimestamp();

            $delta_tiempo = $fecha_devolucion - $fecha_entrega;

            $dias_arriendo = $delta_tiempo / 60 ; // minutos
            $dias_arriendo = $dias_arriendo / 60 ; // horas
            $dias_arriendo = $dias_arriendo / 24 ; // dias

            $dias_arriendo = number_format($dias_arriendo, '2', ',', '.');
            ?>
            <p><? echo $dias_arriendo; ?></p>

         </div>

         <div class="col-md-4">
            <label for="">Fecha de Entrega:</label> <p><?= $reserva->fecha_entrega ?> </p>
            <label for="">Fecha de Devolución:</label><p><?= $reserva->fecha_devolucion ?> </p>

         </div>

         <div class="col-md-4">
            <label for="">Lugar de Entrega:</label><p><?= $locacion_entrega->locacion?></p>
            <label for="">Lugar de Devolucion:</label><p><?= $locacion_devolucion->locacion?></p>
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
            </thead>

            <tbody>
               <tr>
                  <td><?=$cliente->rut;?></td>
                  <td><?=$cliente->nombre;?></td>
                  <td><?=$cliente->apellido;?></td>
               </tr>
            </tbody>
            <thead>
               <th>Dirección</th>
               <th>Ciudad</th>
               <th>País</th>
            </thead>
            <tbody>
               <tr>
                  <td><?=$cliente->direccion;?></td>
                  <td><?=$cliente->ciudad;?></td>
                  <td><?=$cliente->pais;?></td>
               </tr>
            </tbody>
            <thead>
               <th>Teléfono</th>
               <th>E-Mail</th>
            </thead>
            <tbody>
               <tr>
                  <td><?=$cliente->telefono;?></td>
                  <td><?=$cliente->email;?></td>
               </tr>
            </tbody>

         </table>


      </div>
   </div>
   <hr>
   <div class="row"><!--informacion del vehiculo-->
      <div class="col-md-12">
         <h2>Informacion del Vehiculo</h2>
         <table class="table table-striped table-bordered">

            <thead>
               <th>Patente</th>
               <th>Modelo</th>
               <th>Marca</th>
            </thead>

            <tbody>
               <tr>
                  <td><?=$vehiculo->patente;?></td>
                  <td><?=$vehiculo->modelo;?></td>
                  <td><?=$vehiculo->marca;?></td>
               </tr>
            </tbody>
            <thead>
               <th>Transmision</th>
               <th>Categoria</th>
               <th>Combustible</th>
            </thead>
            <tbody>
               <tr>
                  <td><?=$vehiculo->transmision;?></td>
                  <td><?=$vehiculo->categoria;?></td>
                  <td><?=$vehiculo->combustible;?></td>
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
            </thead>
            <tbody>
               <?php foreach ($extras as $extra ): ?>
                  <tr>
                     <td><?= $extra->extra ?></td>
                     <td><?= $extra->cantidad ?></td>
                     <?
                        $total_extra = $extra->cantidad * $extra->precio;
                        $suma_extra = $suma_extra + $total_extra;
                     ?>
                     <td><?= $total_extra ?></td>

                  </tr>
               <?php endforeach; ?>
            </tbody>
         </table>
      </div>
   </div>
   <hr>
<?php endif; ?>
   <div class="row">
      <div class="col-md-4">
            <h2>Precios</h2>
      </div>

      <div class="col-md-8 ">
         <div class="row">
            <form class="" action="<?= site_url( 'reserva/actualizar_precio' ); ?>" method="post"><!--###############################-->
            <div class="form-group form-inline pull-right">
               <label for="">Descuento(%):</label>
               <input type="number" name="descuento" class="form-control" placeholder="Ej: 15">
            </div>
            <div class="form-group form-inline pull-right">
               <label for="">Modificar precio</label>
               <input type="text" name="total" value="<?=$reserva->total ?>" class="form-control">
            </div>
         </div>

         <div class="row">
            <div class="form-group form-inline">
               <input type="text" name="id_reserva" value="<?=$reserva->id_reserva?>" hidden="">
               <input type="submit" name="Actualizar Precio" class="btn btn-success pull-right" value="Actualizar Precio">
            </div>
         </div>

         </form>
      </div>

   </div>
   <br>
   <div class="row">

      <div class="col-md-12">

         <table class="table table-striped table-bordered">
            <thead>
               <th>Precio por dia</th>
               <th>Precio por extras</th>
               <th>Sub total</th>
               <th>Total</th>
            </thead>
            <tbody>

                  <tr class="success">
                     <td><?='$' . number_format($reserva->precio_arriendo_vehiculo , '0', ',' , '.');?></td>
                     <td><?='$' . number_format($suma_extra , '0', ',' , '.');?></td>
                     <td><?='$' . number_format($reserva->sub_total , '0', ',' , '.');?></td>
                     <td><?='$' . number_format($reserva->total , '0', ',' , '.');?></td>

                  </tr>
                  <tr>
                     <td></td>
                     <td></td>
                     <th>Precio Final USD</th>
                     <? $precio_en_usd = $reserva->total / 620?>
                     <td class="success"><?='$' . number_format($precio_en_usd , '2', ',' , '.');?></td>


                  </tr>
            </tbody>
         </table>
      </div>
   </div>
   <hr>
   <div class="row">
      <div class="col-md-6">
         <a href="<?= site_url( 'reserva/imprimir_pdf/'.$reserva->id_reserva ); ?>" class="btn btn-success">Imprimir Reserva en PDF</a>
      </div>

      <div class="col-md-6 pull-right">
         <form class="" action="<?= site_url( 'reserva/definir_reserva'); ?>" method="post">

            <h4>Propiedades de la Reseva:</h4>
            <div class="col-md-6">
               <div class="form-group">
                  <label for="">Cotizacion</label>
                  <input type="checkbox" name="cotizacion" value="1">
               </div>
            </div>
            <div class="col-md-6">
               <input type="text" name="id_reserva" value="<?=$reserva->id_reserva?>" hidden="">
               <input type="submit" name="" value="Guardar Cotizacion/Reserva" class="btn btn-primary btn-block">
            </div>

         </form>

      </div>

   </div>
</div>
