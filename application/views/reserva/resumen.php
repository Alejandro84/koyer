<div class="container" style="margin-bottom: 60px;">
   <div class="row">
      <h1>Resumen</h1>
      <hr>
   </div>
   <div class="row"><!--informacion de la reserva-->

      <div class="col-md-12">
         <h2>Datos de la reserva</h2>
         <div class="col-md-4">
            <label for="">Código de la reserva:</label><p><?= $codigo_reserva ?> </p>

            <label for="">Dias de arriendo:</label>

            <?php  // lo primero es hacerlo objeto

            $f_entrega       = DateTime::createFromFormat( 'Y-m-d H:i:s' , $fecha_entrega ); // los parametros son, el formato de la fecha que estas metiendo y la fecha
            $f_devolucion    = DateTime::createFromFormat( 'Y-m-d H:i:s' , $fecha_devolucion );

            $f_entrega       = $f_entrega->getTimestamp();
            $f_devolucion    = $f_devolucion->getTimestamp();

            $delta_tiempo = $f_devolucion - $f_entrega;

            $dias_arriendo = $delta_tiempo / 60 ; // minutos
            $dias_arriendo = $dias_arriendo / 60 ; // horas
            $dias_arriendo = $dias_arriendo / 24 ; // dias

            $dias_arriendo = number_format($dias_arriendo, '2', ',', '.');
            ?>
            <p><? echo $dias_arriendo; ?></p>

         </div>

         <div class="col-md-4">
            <label for="">Fecha de Entrega:</label> <p><?= $fecha_entrega ?> </p>
            <label for="">Fecha de Devolución:</label><p><?= $fecha_devolucion ?> </p>
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
               <th>Total</th>
            </thead>
            <tbody>
                <?php foreach ($extras as $extra ): ?>
                    <?php if ($extra['cantidad'] != null): ?>
                        <tr>
                           <td><?= $extra['info_extra']->extra ?></td>
                           <td><?= $extra['cantidad'] ?></td>
                           <td><?= $extra['info_extra']->precio?></td>
                           <?php if ($extra['info_extra']->por_dia == 1 ): ?>
                                 <td><?= ($extra['info_extra']->precio * $extra['cantidad']) * $dias ?> CLP</td>
                           <?php else: ?>
                                 <td><?= $extra['info_extra']->precio * $extra['cantidad']  ?> CLP</td>
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
            <div class="col-md-6">
               <div class="form-group pull-right">
                  <label for="">Descuento</label>
                  <input type="text" name="descuento" value="" class="form-control">
               </div>
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
      <form class="" action="<?= site_url( 'reserva/generar_reserva' ); ?>" method="post">
               <tr class="success">
                  <td><?='$' . number_format($precio_arriendo_vehiculo , '0', ',' , '.');?></td>
                  <td><?='$' . number_format($total_extra , '0', ',' , '.');?></td>
                  <td><?='$' . number_format($sub_total , '0', ',' , '.');?></td>
                  <td><input type="text" name="total" value="<?='$' . number_format($total , '0', ',' , '.');?>" class="form-control"></td>
               </tr>
               <tr>
                  <td></td>
                  <td></td>
                  <th>Precio Final USD</th>
                  <? $precio_en_usd = $total?>
                  <td class="success"><?='$' . number_format($precio_en_usd , '2', ',' , '.');?></td>
               </tr>
            </tbody>
         </table>
      </div>

   </div>

      <input type="text" name="codigo_reserva" value="<?= $codigo_reserva?>" hidden="">
      <input type="text" name="fecha_entrega" value="<?= $fecha_entrega?>" hidden="">
      <input type="text" name="fecha_devolucion" value="<?= $fecha_devolucion?>" hidden="">
      <input type="text" name="locacion_entrega" value="<?= $locacion_entrega->id_locacion?>" hidden="">
      <input type="text" name="locacion_devolucion" value="<?= $locacion_devolucion->id_locacion?>" hidden="">
      <input type="text" name="id_cliente" value="<?=$cliente->id_cliente;?>" hidden="">
      <input type="text" name="id_vehiculo" value="<?=$vehiculo->id_vehiculo;?>" hidden="">
      <input type="text" name="precio_arriendo_vehiculo" value="<?=$precio_arriendo_vehiculo;?>" hidden="">
      <input type="text" name="sub_total" value="<?=$sub_total;?>" hidden="">

      <div class="row">
          <!--
         <div class="col-md-6">
            <a href="<?= site_url( 'reserva/imprimir_pdf/'.$reserva->id_reserva ); ?>" class="btn btn-success">Imprimir Reserva en PDF</a>
         </div>
         -->
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
                  <input type="submit" name="" value="Guardar Cotizacion/Reserva" class="btn btn-primary btn-block">
               </div>

            </form>

         </div>

      </div>


</div>
