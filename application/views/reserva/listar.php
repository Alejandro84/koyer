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
        <style>
            .calendario {
                width: 100%;
                display;block;
                border: solid 1px rgba(0,0,0,.07);
            }
            .calendario-header {
                display: flex;
                flex-direction: row;
                flex-wrap: nowrap;
                width: 100%;
            }
            .calendario-fila {
                display: flex;
                border-bottom: solid 1px rgba(0,0,0,.07);
                width: 100%;
            }
            .dia {
                border-left: solid 1px rgba(0,0,0,.07);
                flex-grow: 1;
                text-align: center;
                width: 20px;
            }
            .calendario-auto {
                width: 100px;
                padding: 5px;
            }
            .reservado {
                background-color: green;
            }
        </style>
        <div class="calendario">

            <div class="calendario-header">
            </div>

            <div class="autos">
                <div class="calendario-fila">
                    <div class="calendario-auto">
                        PATENTE
                    </div>
                    <?php for ( $dia = 1; $dia <= $dias; $dia++ ): ?>
                    <div class="dia">
                    <?php echo $dia; ?>
                    </div>
                    <?php endfor; ?>
                </div>
                <?php foreach ( $vehiculos as $a ): ?>
                <?php $v = $a['vehiculo'];?>
                <div class="calendario-fila">
                    <div class="calendario-auto"><?php echo $v->patente; ?></div>
                    <?php
                        $dArr = [];
                        for ( $d = 1; $d <= $dias; $d++ ) :

                            $dArr[$d] = false;

                            if ( $a['reservas'] ) :

                                foreach ( $a['reservas'] as $r ):
                                    $fecha_devolucion = DateTime::createFromFormat('Y-m-d H:i:s', $r->fecha_devolucion );
                                    $fecha_entrega = DateTime::createFromFormat('Y-m-d H:i:s', $r->fecha_entrega );
                                    $fecha_actual = $mes->format('Y-m').'-'.$d.' 00:00:00';
                                    $fecha_actual = DateTime::createFromFormat('Y-m-d H:i:s', $fecha_actual );

                                    if ( $fecha_actual >= $fecha_entrega && $fecha_actual <= $fecha_devolucion ) $dArr[$d] = $r;

                                endforeach;

                            endif;
                        endfor;
                    ?>


                    <?php foreach ( $dArr as $d ) {
                        if ( $d != false ) {
                            echo '<div class="dia reservado" data-toggle="tooltip" title="<strong>'.$d->nombre.' '.$d->apellido.'</strong><br>"><!--'; print_r($d); echo '--></div>';
                        } else {
                            echo '<div class="dia"></div>';
                        }
                    } ?>
                </div>
                <?php endforeach; ?>
            </div>

        </div>
<hr>
        <table class="table table-striped">

            <thead>
                <th></th>
                <th>Codigos</th>
                <th>Patente</th>
                <th>Cliente</th>
                <th>Fechas</th>
                <th>Lugares</th>
                <th>Extras</th>
                <th>Precios</th>
                <th>Estado</th>
                <th>Pagado</th>
            </thead>

            <tbody>
               <?php foreach ($reservas as $reserva ): ?>
                  <tr>
                     <td>
                         <div class="row">
                             <div class="col-md-12">
                                 <a href="<?= site_url( 'reserva/ver_reserva/'.$reserva['reserva']->id_reserva ); ?>" class="btn btn-primary btn-block">Ver Reserva</a>
                             </div>
                         </div>
                         <div class="row">
                             <div class="col-md-12">
                                 <a href="<?= site_url( 'reserva/entregar_vehiculo/'.$reserva['reserva']->id_reserva ); ?>" class="btn btn-warning btn-block ">Entregar</a>
                             </div>

                         </div>
                         <div class="row">
                             <div class="col-md-12">
                                <a href="<?= site_url( 'reserva/recibir_vehiculo/'.$reserva['reserva']->id_reserva ); ?>" class="btn btn-success btn-block ">Recibir</a>
                             </div>

                         </div>
                         <div class="row">
                             <div class="col-md-12">
                                 <a href="<?= site_url( 'reserva/pagado/'.$reserva['reserva']->id_reserva ); ?>" class="btn btn-primary btn-block">Pagado</a>
                             </div>

                         </div>

                     </td>
                     <td>
                         <ul class="list-unstyled">
                             <li><b>Interno:</b> <?=$reserva['reserva']->id_reserva;?></li>
                             <hr>
                             <li><b>De Reserva:</b> <?=$reserva['reserva']->codigo_reserva;?></li>
                         </ul>
                     </td>
                     <td>
                         <ul class="list-unstyled">
                             <li><?=$reserva['reserva']->patente;?></li>
                         </ul>

                     </td>
                     <td><?=$reserva['reserva']->nombre . ' ' . $reserva['reserva']->apellido;?></td>
                     <td>
                         <ul class="list-unstyled">
                             <li><b>Entrega:</b> <?=$reserva['reserva']->fecha_entrega;?></li>
                             <hr>
                             <li><b>Devolución:</b> <?=$reserva['reserva']->fecha_devolucion;?></li>
                         </ul>
                     </td>
                     <td>
                         <ul class="list-unstyled">
                             <?php foreach ($locaciones as $locacion): ?>
                                <?php if ($locacion->id_locacion == $reserva['reserva']->locacion_entrega): ?>
                                      <li><b>Entrega:</b> <?=$locacion->locacion;?></li>
                                <?php endif; ?>
                           <?php endforeach; ?>

                           <hr>
                             <?php foreach ($locaciones as $locacion): ?>
                                <?php if ($locacion->id_locacion == $reserva['reserva']->locacion_devolucion): ?>
                                      <li><b>Devolución:</b> <?=$locacion->locacion;?></li>
                                <?php endif; ?>
                             <?php endforeach; ?>
                         </ul>


                     </td>
                     <td>
                         <?php if ($reserva['extras'] != null): ?>
                             <?php foreach ($reserva['extras'] as $extra): ?>
                                 <?= $extra->extra ?>
                                 <b>cantidad:</b> <?= $extra->cantidad ?>
                             <?php endforeach; ?>
                         <?php else: ?>
                             No tiene adicionales contratados
                         <?php endif; ?>

                     </td>
                     <td>
                         <ul>
                             <li><b>Total:</b> $<?= number_format($reserva['reserva']->total, '2', ',' , '.');?></li>
                             <li><b>Abonado:</b> $<?= number_format($reserva['reserva']->abonado, '2', ',' , '.');?></li>
                         </ul>
                     </td>
                     <?php if ($reserva['reserva']->estado_arriendo == 1): ?>
                        <td class="success">En Arriendo </td>
                     <?php else: ?>
                        <td class="warning">En Espera </td>
                     <?php endif; ?>

                     <?php if ($reserva['reserva']->pagado == 1): ?>
                        <td class="success">Pagado </td>
                     <?php else: ?>
                        <td class="danger" >Por Pagar </td>
                     <?php endif; ?>

                  </tr>

            <?php endforeach; endif; ?>
            </tbody>

        </table>


      </div>

   </div>
   <div class="row">
       <div class="col-md-12">
           <?php $this->load->view('template/alert'); ?>
          <?php if ( ! $reservas ) : ?>
          <div class="alert alert-info">
              No hay reservas para este mes
          </div>
          <?php else: ?>
             <table class="table table-striped">

                 <thead>
                    <th></th>
                    <th>Codigos</th>
                    <th>Patente</th>
                    <th>Cliente</th>
                    <th>Fechas</th>
                    <th>Lugares</th>
                    <th>Extras</th>
                    <th>Estado</th>
                    <th>Pagado</th>


                 </thead>
                 <tbody>
                    <?php foreach ($reservasPorPagar as $reserva ): ?>
                       <tr>
                          <td>
                              <div class="row">
                                  <div class="col-md-12">
                                      <a href="<?= site_url( 'reserva/ver_reserva/'.$reserva['reserva']->id_reserva ); ?>" class="btn btn-primary btn-block">Ver Reserva</a>
                                  </div>
                              </div>
                              <div class="row">
                                  <div class="col-md-12">
                                      <a href="<?= site_url( 'reserva/entregar_vehiculo/'.$reserva['reserva']->id_reserva ); ?>" class="btn btn-warning btn-block ">Entregar</a>
                                  </div>

                              </div>
                              <div class="row">
                                  <div class="col-md-12">
                                     <a href="<?= site_url( 'reserva/recibir_vehiculo/'.$reserva['reserva']->id_reserva ); ?>" class="btn btn-success btn-block ">Recibir</a>
                                  </div>

                              </div>
                              <div class="row">
                                  <div class="col-md-12">
                                      <a href="<?= site_url( 'reserva/pagado/'.$reserva['reserva']->id_reserva ); ?>" class="btn btn-primary btn-block">Pagado</a>
                                  </div>

                              </div>

                          </td>
                          <td>
                              <ul class="list-unstyled">
                                  <li><b>Interno:</b> <?=$reserva['reserva']->id_reserva;?></li>
                                  <li><b>De Reserva:</b> <?=$reserva['reserva']->codigo_reserva;?></li>
                              </ul>
                          </td>
                          <td>
                              <ul class="list-unstyled">
                                  <li><?=$reserva['reserva']->patente;?></li>
                              </ul>

                          </td>
                          <td><?=$reserva['reserva']->nombre . ' ' . $reserva['reserva']->apellido;?></td>
                          <td>
                              <ul class="list-unstyled">
                                  <li><b>Entrega:</b> <?=$reserva['reserva']->fecha_entrega;?></li>
                                  <li><b>Devolución:</b> <?=$reserva['reserva']->fecha_devolucion;?></li>
                              </ul>
                          </td>
                          <td>
                              <ul class="list-unstyled">
                                  <?php foreach ($locaciones as $locacion): ?>
                                     <?php if ($locacion->id_locacion == $reserva['reserva']->locacion_entrega): ?>
                                           <li><b>Entrega:</b> <?=$locacion->locacion;?></li>
                                     <?php endif; ?>
                                <?php endforeach; ?>


                                  <?php foreach ($locaciones as $locacion): ?>
                                     <?php if ($locacion->id_locacion == $reserva['reserva']->locacion_devolucion): ?>
                                           <li><b>Devolución:</b> <?=$locacion->locacion;?></li>
                                     <?php endif; ?>
                                  <?php endforeach; ?>
                              </ul>


                          </td>

                          <td>
                              <?php if ($reserva['extras'] != null): ?>
                                  <?php foreach ($reserva['extras'] as $extra): ?>
                                      <?= $extra->extra ?>
                                      <b>cantidad:</b> <?= $extra->cantidad ?>
                                  <?php endforeach; ?>
                              <?php else: ?>
                                  No tiene adicionales contratados
                              <?php endif; ?>

                          </td>
                          <td>
                              <ul>
                                  <li><b>Total:</b> $<?= number_format($reserva['reserva']->total, '2', ',' , '.');?></li>
                                  <li><b>Abonado:</b> $<?= number_format($reserva['reserva']->abonado, '2', ',' , '.');?></li>
                              </ul>
                          </td>

                          <?php if ($reserva['reserva']->estado_arriendo == 1): ?>
                             <td class="success">En Arriendo </td>
                          <?php else: ?>
                             <td class="warning">En Espera </td>
                          <?php endif; ?>

                          <?php if ($reserva['reserva']->pagado == 1): ?>
                             <td class="success">Pagado </td>
                          <?php else: ?>
                             <td class="danger" >Por Pagar </td>
                          <?php endif; ?>

                       </tr>

                 <?php endforeach; endif;?>
                 </tbody>

             </table>

       </div>
   </div>

</div>
