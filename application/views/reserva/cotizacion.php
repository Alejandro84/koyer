<div class="container">

   <div class="row">
      <h1>Cotizaciones</h1>

   </div>

   <div class="row">

      <div class="col-xs-12 col-md-12">
         <? $this->load->view('template/alert'); ?>

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
               <th>Fecha de Creación</th>


            </thead>
            <tbody>
               <?php foreach ($reservas as $reserva ): ?>
                  <tr>
                     <td><a href="<?= site_url( 'reserva/ver_reserva/'.$reserva->id_reserva ); ?>" class="btn btn-primary">Ver Reserva</a></td>
                     <td><a href="<?= site_url( 'reserva/correo/'); ?>" class="btn btn-primary">Enviar Correo</a></td>
                     <td><?=$reserva->codigo_reserva;?></td>
                     <td><?=$reserva->patente;?></td>
                     <td><?=$reserva->nombre . ' ' . $reserva->apellido;?></td>
                     <td><?=$reserva->fecha_entrega;?></td>
                     <td><?=$reserva->fecha_devolucion;?></td>
                     <?php foreach ($locaciones as $locacion): ?>
                        <?php if ($locacion->id_locacion == $reserva->locacion_entrega): ?>
                              <td><?=$locacion->locacion;?></td>
                        <?php endif; ?>
                     <?php endforeach; ?>
                     <?php foreach ($locaciones as $locacion): ?>
                        <?php if ($locacion->id_locacion == $reserva->locacion_devolucion): ?>
                              <td><?=$locacion->locacion;?></td>
                        <?php endif; ?>
                     <?php endforeach; ?>
                     <td><?=$reserva->c_date;?></td>


                  </tr>
               <?php endforeach; ?>


            </tbody>

         </table>

      </div>

   </div>

</div>