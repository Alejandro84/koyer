<div class="container">

   <div class="row">
      <h1>Reservas</h1>

   </div>

   <div class="row">

      <div class="col-xs-12 col-md-12">

         <table class="table table-striped">

            <thead>
               <th></th>
               <th>Codigo de reserva</th>
               <th>Patente</th>
               <th>Cliente</th>
               <th>Fecha de Entrega</th>
               <th>Fecha de Devolución</th>
               <th>Lugar de Entrega</th>
               <th>Lugar de Devolución</th>
               <th>Estado</th>
               <th>Pagado</th>
               <th>Acciones</th>

            </thead>
            <tbody>
               <?php foreach ($reservas as $reserva ): ?>
                  <tr>
                     <td><a href="<?= site_url( 'reserva/ver_reserva/'.$reserva->id_reserva ); ?>" class="btn btn-primary">Entregar</a></td>
                     <td><?=$reserva->codigo_reserva;?></td>
                     <td><?=$reserva->patente;?></td>
                     <td><?=$reserva->nombre . ' ' . $reserva->apellido;?></td>
                     <td><?=$reserva->fecha_entrega;?></td>
                     <td><?=$reserva->fecha_devolucion;?></td>
                     <td><?=$reserva->locacion_entrega;?></td>
                     <td><?=$reserva->locacion_devolucion;?></td>
                     <?php if ($reserva->estado_arriendo == 1): ?>
                        <td>En Arriendo</td>
                     <?php endif; ?>
                     <?php if ($reserva->pagado == 1): ?>
                        <td>Pagado</td>
                     <?php else: ?>
                        <td>Por Pagar</td>
                     <?php endif; ?>
                     <td>
                        <a href="<?= site_url( 'reserva/entregar_vehiculo/'.$reserva->id_reserva ); ?>" class="btn btn-warning">Entregar</a>
                        <a href="<?= site_url( 'reserva/recibir_vehiculo/'.$reserva->id_reserva ); ?>" class="btn btn-success">Recibir</a>
                     </td>
                  </tr>
               <?php endforeach; ?>


            </tbody>

         </table>

      </div>

   </div>

</div>
