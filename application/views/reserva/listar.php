<div class="container">

   <div class="row">
      <h1>Reservas</h1>

   </div>
   <div class="row">
      <div class="col-md-6">
         <label>Fecha de hoy: </label>
         <h2><?php echo $fecha->format('l jS \of F Y h:i A'); ?> </h2>
      </div>

      <div class="col-md-6">
         <label>reservas de </label>
            <form action="<?= site_url( 'reserva/buscar_reserva' ); ?>" method="post">
               <div class="form-group">
                   <div class='input-group date' id='buqueda_fecha'>
                       <input type='text' name="busqueda_fecha" class="form-control" />
                       <span class="input-group-addon">
                           <span class="glyphicon glyphicon-calendar">
                           </span>
                       </span>
                   </div>
               </div>

               <input type="submit" name="buscar_fecha" value="Buscar Mes/Año" class="btn btn-primary pull-right">

            </form>

      </div>

   </div>

   <div class="row">
      <h1> <?php echo $mes->format('F'); ?> </h1>
      <div class="col-xs-12 col-md-12">
         <?php $this->load->view('template/alert'); ?>
        <?php if ( ! $reservas ) : ?>
        <div class="alert alert-info">
            No hay reservas para este mes
        </div>
        <?php else: ?>
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
                     <td><a href="<?= site_url( 'reserva/ver_reserva/'.$reserva->id_reserva ); ?>" class="btn btn-primary">Ver Reserva</a></td>
                     <td><?=$reserva->id_reserva;?></td>
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
                              <a href="<?= site_url( 'reserva/entregar_vehiculo/'.$reserva->id_reserva ); ?>" class="btn btn-warning btn-block">Entregar</a>
                           </div>
                        </div>

                        <div class="row">
                           <div class="col-md-12">
                              <a href="<?= site_url( 'reserva/recibir_vehiculo/'.$reserva->id_reserva ); ?>" class="btn btn-success btn-block">Recibir</a>
                           </div>
                        </div>

                        <div class="row">
                           <div class="col-md-12">
                              <a href="<?= site_url( 'reserva/pagado/'.$reserva->id_reserva ); ?>" class="btn btn-primary pull-right btn-block">Pagado</a>
                           </div>
                        </div>

                     </td>
                  </tr>
               <?php endforeach; endif; ?>


            </tbody>

         </table>

      </div>

   </div>

</div>
