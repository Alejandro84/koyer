<div class="container">

   <div class="row">
      <h1>Reservas</h1>

   </div>
   <div class="row">
      <div class="col-md-6">
         <label>Fecha de hoy: </label>
         <h2><?php echo $mes->format('F'); ?></h2>
      </div>

   </div>

   <div class="row">
      <h1> <?php echo $mes->format('F'); ?> </h1>
      <div class="col-xs-12 col-md-12">
         <? $this->load->view('template/alert'); ?>

         <table class="table table-striped">

            <thead>
               <th></th>
               <th>Codigo interno</th>
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
                     <td><a href="<?php echo  site_url( 'reserva/ver_reserva/'.$reserva->id_reserva ); ?>" class="btn btn-primary">Ver Reserva</a></td>
                     <td><?php echo $reserva->id_reserva;?></td>
                     <td><?php echo $reserva->codigo_reserva;?></td>
                     <td><?php echo $reserva->patente;?></td>
                     <td><?php echo $reserva->nombre . ' ' . $reserva->apellido;?></td>
                     <td><?php echo $reserva->fecha_entrega;?></td>
                     <td><?php echo $reserva->fecha_devolucion;?></td>
                     <?php foreach ($locaciones as $locacion): ?>
                        <?php if ($locacion->id_locacion == $reserva->locacion_entrega): ?>
                              <td><?php echo $locacion->locacion;?></td>
                        <?php endif; ?>
                     <?php endforeach; ?>
                     <?php foreach ($locaciones as $locacion): ?>
                        <?php if ($locacion->id_locacion == $reserva->locacion_devolucion): ?>
                              <td><?php echo $locacion->locacion;?></td>
                        <?php endif; ?>
                     <?php endforeach; ?>
                     <?php if ($reserva->estado_arriendo == 1): ?>
                        <td class="success">En Arriendo </td>
                     <?php else: ?>
                        <td class="warning">En Espera </td>
                     <?php endif; ?>

                     <?php if ($reserva->pagado == 1): ?>
                        <td class="success">Pagado </td>
                     <?php else: ?>
                        <td class="danger" >Por Pagar </td>
                     <?php endif; ?>
                     <td>
                        <div class="row">
                           <div class="col-md-12">
                              <a href="<?php echo  site_url( 'reserva/entregar_vehiculo/'.$reserva->id_reserva ); ?>" class="btn btn-warning btn-block">Entregar</a>
                           </div>
                        </div>

                        <div class="row">
                           <div class="col-md-12">
                              <a href="<?php echo  site_url( 'reserva/recibir_vehiculo/'.$reserva->id_reserva ); ?>" class="btn btn-success btn-block">Recibir</a>
                           </div>
                        </div>

                        <div class="row">
                           <div class="col-md-12">
                              <a href="<?php echo  site_url( 'reserva/pagado/'.$reserva->id_reserva ); ?>" class="btn btn-primary pull-right btn-block">Pagado</a>
                           </div>
                        </div>

                     </td>
                  </tr>
               <?php endforeach; ?>


            </tbody>

         </table>

      </div>

   </div>

</div>
