<div class="container">
   <div class="row">
      <h1>Resumen</h1>
      <hr>
   </div>
   <div class="row"><!--informacion de la reserva-->

      <div class="col-md-12">
         <h2>Datos de la reserva</h2>
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

      <div class="col-md-12">
         <h2>Precios</h2>
         <table class="table table-striped table-bordered">
            <thead>
               <th>Precio por dia</th>
               <th>Precio por extras</th>
               <th>Sub total</th>
               <th>Total</th>
            </thead>
            <tbody>
               <tr class="success">
                  <td><?='$' . number_format($reserva->precio_arriendo_vehiculo , '2', ',' , '.');?></td>
                  <td><?='$' . number_format($suma_extra , '2', ',' , '.');?></td>
                  <td><?='$' . number_format($reserva->sub_total , '2', ',' , '.');?></td>
                  <td><?='$' . number_format($reserva->total , '2', ',' , '.');?></td>
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
   <div class="row">
      <div class="col-md-12">
         <td><a href="<?= site_url( 'reserva/pagado/'.$reserva->id_reserva ); ?>" class="btn btn-primary pull-right">Pagado</a></td>
         <td><a href="<?= site_url( 'reserva/imprimir_pdf/'.$reserva->id_reserva ); ?>" class="btn btn-success pull-right">Imprimir en PDF</a></td>
      </div>
   </div>
</div>
