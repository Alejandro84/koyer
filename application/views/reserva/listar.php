<div class="container">
    <div class="row">
       <h1> <?php echo $mes->format('F'); ?> </h1>
       <div class="col-xs-12 col-md-12">
          <?php $this->load->view('template/alert'); ?>
        
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

    <div class="row">
        <div class="col-md-12 col-xs-12">
            <?php foreach ($vehiculos as $vehiculo): ?>

                <table class="table table-striped table-bordered">
                    <h3>Datos del vehiculo</h3>
                    <thead>
                        <th>Vehiculo</th>
                        <th>Modelo</th>
                        <th>Caracteristica</th>
                    </thead>

                    <tbody>
                        <tr>
                            <td>
                                <ul class="list-unstyled">
                                    <li><b>Codigo vehiculo:</b> <?php echo $vehiculo['vehiculo']->id_vehiculo; ?> </li>
                                    <li><b>Patente:</b> <?php echo $vehiculo['vehiculo']->patente; ?> </li>
                                    <li><b>Precio por dia:</b> <?php echo $vehiculo['vehiculo']->precio; ?> </li>
                                </ul>
                            </td>

                            <td>
                                <ul class="list-unstyled">
                                    <li><b>Marca:</b> <?php echo $vehiculo['vehiculo']->marca; ?> </li>
                                    <li><b>Modelo</b> <?php echo $vehiculo['vehiculo']->modelo; ?> </li>
                                </ul>
                            </td>

                            <td>
                                <ul class="list-unstyled">
                                    <li><b>Categoría:</b> <?php echo $vehiculo['vehiculo']->categoria; ?> </li>
                                    <li><b>Combustible</b> <?php echo $vehiculo['vehiculo']->combustible; ?> </li>
                                    <li><b>Transmisión</b> <?php echo $vehiculo['vehiculo']->transmision; ?> </li>
                                </ul>
                            </td>

                        </tr>
                    </tbody>

                </table>

                <?php if (! $vehiculo['reservas']): ?>
                <?php else: ?>
                    <?php foreach ($vehiculo['reservas'] as $reserva): ?>
                        <table class="table table-striped table-bordered">
                            <thead>
                                <th></th>
                                <th>Codigo de reservas</th>
                                <th>Cliente</th>
                                <th>Entrega</th>
                                <th>Devolución</th>
                                <th>Extras</th>
                                <th>Pagos</th>
                                <th>Estado</th>

                            </thead>

                            <tbody>
                                <tr>
                                    <td>
                                        <ul class="list-unstyled">
                                            <li><a href="<?php echo  site_url( 'reserva/ver_reserva/'.$reserva->id_reserva ); ?>" class="btn btn-primary btn-block">Ver Reserva</a></li>
                                            <li><a href="<?php echo  site_url( 'reserva/entregar_vehiculo/'.$reserva->id_reserva ); ?>" class="btn btn-warning btn-block ">Entregar</a></li>
                                            <li><a href="<?php echo  site_url( 'reserva/recibir_vehiculo/'.$reserva->id_reserva ); ?>" class="btn btn-success btn-block ">Recibir</a></li>
                                            <li><a href="<?php echo  site_url( 'reserva/pagado/'.$reserva->id_reserva ); ?>" class="btn btn-primary btn-block">Pagado</a></li>
                                        </ul>
                                    </td>

                                    <td>
                                        <ul class="list-unstyled">
                                            <li><b>Interno:</b> <?php echo $reserva->id_reserva; ?></li>
                                            <li><b>Cliente:</b> <?php echo $reserva->codigo_reserva; ?></li>
                                        </ul>
                                    </td>

                                    <td>
                                        <ul class="list-unstyled">
                                            <li><b>DNI ó RUT: </b> <?php echo $reserva->rut; ?></li>
                                            <li><?php echo $reserva->nombre . ' ' . $reserva->apellido; ?></li>
                                            <li><b>Teléfono: </b><?php echo $reserva->telefono ?> </li>
                                            <li><b>Ciudad: </b><?php echo $reserva->ciudad . ', ' . $reserva->pais ?> </li>
                                            <li><b>FV permiso de conducir: </b><?php echo $reserva->vencimiento_permiso ?> </li>
                                        </ul>
                                    </td>

                                    <td>
                                        <ul class="list-unstyled">
                                            <!--AGREGARLE EL NOMBRE DE LA LOCACION (SE MUESTRA SOLO EL ID)-->
                                            <li><b>Locación: </b>
                                                <?php foreach ($locaciones as $locacion): ?>
                                                    <?php if ($locacion->id_locacion == $reserva->locacion_entrega): ?>
                                                        <?php echo $locacion->locacion; ?>
                                                    <?php endif; ?>
                                                <?php endforeach; ?>
                                                </li>
                                            <li><b>Fecha de entrega: </b> <?php echo $reserva->fecha_entrega; ?></li>
                                        </ul>
                                    </td>
                                    <td>
                                        <ul class="list-unstyled">
                                            <!--AGREGARLE EL NOMBRE DE LA LOCACION (SE MUESTRA SOLO EL ID)-->
                                            <li><b>Locación: </b>
                                                <?php foreach ($locaciones as $locacion): ?>
                                                    <?php if ($locacion->id_locacion == $reserva->locacion_devolucion): ?>
                                                        <?php echo $locacion->locacion; ?>
                                                    <?php endif; ?>
                                                <?php endforeach; ?>
                                                </li>
                                            <li><b>Fecha de entrega: </b> <?php echo $reserva->fecha_devolucion; ?></li>
                                        </ul>
                                    </td>

                                    <td><!-- EXTRAS--></td>

                                    <td>
                                        <ul class="list-unstyled">
                                            <li><b>Total: </b> <?php echo $reserva->total; ?></li>
                                            <li><b>Abonado: </b> <?php echo $reserva->abonado; ?></li>
                                        </ul>
                                    </td>

                                </tr>

                        </tbody>
                    </table>
                    <hr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </table>
            <hr>
            <?php endforeach; ?>

        </div>
    </div>
</div>
