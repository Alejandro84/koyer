<div class="container">
   <div class="row">
      <h1>Resumen</h1>
      <hr>
   </div>
   <div class="row"><!--informacion de la reserva-->

      <div class="col-md-12">
         <h2>Datos de la reserva</h2>
         <div class="col-md-4">
            <label for="">Código de la reserva:</label><p><?= $codigo ?> </p>

            <label for="">Dias de arriendo:</label>

            <?php  // lo primero es hacerlo objeto

            $fecha_entrega       = DateTime::createFromFormat( 'Y-m-d H:i:s' , $arriendo['fecha_entrega'] ); // los parametros son, el formato de la fecha que estas metiendo y la fecha
            $fecha_devolucion    = DateTime::createFromFormat( 'Y-m-d H:i:s' , $arriendo['fecha_devolucion'] );

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
            <label for="">Fecha de Entrega:</label> <p><?= $arriendo['fecha_entrega'] ?> </p>
            <label for="">Fecha de Devolución:</label><p><?= $arriendo['fecha_devolucion'] ?> </p>

         </div>

         <div class="col-md-4">
            <label for="">Lugar de Entrega:</label>
               <?php foreach ($locaciones as $locacion): ?>
                  <?php if ($locacion->id_locacion == $arriendo['locacion_entrega']): ?>
                     <p><?= $locacion->locacion?></p>
                  <?php endif; ?>
               <?php endforeach; ?>

            <label for="">Lugar de Devolucion:</label>
            <?php foreach ($locaciones as $locacion): ?>
               <?php if ($locacion->id_locacion == $arriendo['locacion_devolucion']): ?>
                  <p><?= $locacion->locacion?></p>
               <?php endif; ?>
            <?php endforeach; ?>

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
                  <td><?=$datos_cliente->rut;?></td>
                  <td><?=$datos_cliente->nombre;?></td>
                  <td><?=$datos_cliente->apellido;?></td>
               </tr>
            </tbody>
            <thead>
               <th>Dirección</th>
               <th>Ciudad</th>
               <th>País</th>
            </thead>
            <tbody>
               <tr>
                  <td><?=$datos_cliente->direccion;?></td>
                  <td><?=$datos_cliente->ciudad;?></td>
                  <td><?=$datos_cliente->pais;?></td>
               </tr>
            </tbody>
            <thead>
               <th>Teléfono</th>
               <th>E-Mail</th>
            </thead>
            <tbody>
               <tr>
                  <td><?=$datos_cliente->telefono;?></td>
                  <td><?=$datos_cliente->email;?></td>
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
               <?php
               $extras = $arriendo['extra'];
               foreach ($extras as $extra): ?>
                  <?php if ($extra['cantidad'] != null): ?>
                     <tr>
                        <td><?= $extra['info_extra']->extra;?></td>
                        <td><?= $extra['cantidad'];?></td>
                        <td><?= $extra['cantidad'] * $extra['info_extra']->precio;?></td>
                     </tr>
                  <?php endif; ?>
               <?php endforeach; ?>
            </tbody>
         </table>
      </div>
   </div>
   <hr>
   <div class="row">

      <div class="col-md-12">
         <h2>Precios</h2>
         <table class="table table-striped table-bordered">
            <thead>
               <th>Precio por dia</th>
               <th>Sub total</th>
               <th>Total</th>
            </thead>
            <tbody>
               <tr>
                  <td><?=$vehiculo->precio;?></td>
                  <td><?=$vehiculo->precio * $dias_arriendo;?></td>
                  <td><?=($vehiculo->precio * $dias_arriendo) * ('1.' . $impuestos['0']->valor)?></td>
               </tr>
            </tbody>
         </table>
      </div>

   </div>
</div>
