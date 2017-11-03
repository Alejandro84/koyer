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
