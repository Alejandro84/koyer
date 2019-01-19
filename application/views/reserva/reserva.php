<div class="container" style="margin-bottom:50px;">
   <div class="row">
      <h1>Resumen</h1>
      <hr>
   </div>
   <div class="row"><!--informacion de la reserva-->

      <div class="col-md-12">
         <h2>Datos de la reserva</h2>

         <? $this->load->view('template/alert'); ?>
         <div class="col-md-3 col-xs-6">
            <label for="">Código de la reserva:</label><p><?php echo  $reserva->codigo_reserva ?> </p>
            
            <label for="">Código interno</label><p><?php echo  $reserva->codigo_interno ?> </p>

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

        <div class="col-md-3 col-xs-6">
            <label for="">Lugar de Entrega:</label><p><?php echo  $locacion_entrega->locacion?></p>
            <label for="">Lugar de Entrega:</label><p><?php echo  $locacion_entrega->locacion?></p>
         </div>
         
         <div class="col-md-3">
            <label for="">Fecha de Entrega:</label><p><?php echo  $reserva->fecha_entrega?></p>
            <label for="">Fecha de Devolución:</label><p><?php echo  $reserva->fecha_devolucion?></p>
         </div>

         <div class="col-md-3 col-xs-6">
            
            <form action="<?php echo  site_url( 'reserva/cambiarfechas' ); ?>" method="post">
                <div class="form-group">
                    <label for="">Fecha de Entrega:</label>
                    <div class='input-group date' id='reserva-fecha_desde'>
                        <input type='text' name='fecha_entrega' class="form-control" value="<?php echo $reserva->fecha_entrega?>">
                        <span class="input-group-addon">
                            <span class="glyphicon glyphicon-calendar"></span>
                        </span>
                    </div>
                    <label for="">Fecha </label>
                </div>
                
                <div class="form-group">
                    <label for="">Fecha de Devolución:</label>
                    <div class='input-group date' id='reserva-fecha_hasta'>
                        <input type='text' name='fecha_devolucion' class="form-control" value="<?php echo $reserva->fecha_devolucion?>">
                        <span class="input-group-addon">
                            <span class="glyphicon glyphicon-calendar"></span>
                        </span>
                    </div>
                </div>

                <input type="hidden" name="id_reserva" value="<?php echo $reserva->id_reserva?>">
                <input type="submit" value="Cambiar" class="btn btn-success btn-block">
            </form>

         </div>
         

      </div>
   </div>
   <hr>
        <!--Informacion del vehiculo-->
        <div class="row"><!--informacion del vehiculo-->
      <div class="col-md-12">

         <div class="row">
              <div class="col-md-6">
                  <h2>Información del vehiculo</h2>
              </div>
              <div class="col-md-6">
                  <form action="<?php echo  site_url( 'reserva/cambiarauto' ); ?>" method="post">
                      <div class="form-group form-inline pull-right">
                          <select class="form-control" name="id_vehiculo">
                              <option value="">Si desea cambiar el auto, seleccione uno aquí</option>
                              <?php foreach ($autos_disponibles as $a ): ?>
                                  <option value="<?php echo $a['info_auto']->id_vehiculo ?>"><?php echo $a['info_auto']->marca . ' ' . $a['info_auto']->modelo . ' (' . $a['info_auto']->patente . ')'?></option>
                              <?php endforeach; ?>
                          </select>
                          <input type="hidden" name="id_reserva" value="<?php echo $reserva->id_reserva?>">
                          <input type="submit" value="Cambiar" class="btn btn-success ">
                      </div>

                  </form>
              </div>
          </div>
         
         <table class="table table-striped table-bordered">

            <thead>
               <th>Modelo</th>
               <th>Marca</th>
               <th>Categoria</th>
            </thead>

            <tbody>
               <tr>
                  <td><?php echo $vehiculo->modelo;?></td>
                  <td><?php echo $vehiculo->marca;?></td>
                  <td><?php echo $vehiculo->categoria;?></td>
               </tr>
            </tbody>
            <thead>
               <th>Transmisión</th>
               <th>Combustible</th>
            </thead>
            <tbody>
               <tr>
                  <td><?php echo $vehiculo->transmision;?></td>
                  <td><?php echo $vehiculo->combustible;?></td>
               </tr>
            </tbody>


         </table>


      </div>
   </div>
        <!-- FIN Informacion del vehiculo-->

        <!--Informacion Extra-->
    <div class="row">

        <div class="col-md-6 col-xs-12">

            <div class="row">
                <div class="col-md-12">
                    <h2>Datos adicionales</h2>
                </div>

                <div class="col-md-12">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <th>Nº de pasajeros</th>
                            <th>Nº de Vuelo(para entregas en el aeropuerto)</th>
                            <th>Hospedaje</th>
                            <th>Dirección del hospedaje</th>
                        </thead>

                        <tbody>
                            <tr>
                                <td><?php echo $reserva->pasajeros?></td>
                                <td><?php echo $reserva->nro_vuelo ?></td>   
                                <td><?php echo $reserva->hospedaje?></td>
                                <td><?php echo $reserva->direccion_hospedaje?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="col-md-12">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <th>Comentario de la reserva</th>
                        </thead>
                        <tbody>
                            <tr>
                                <td><?php echo $reserva->comentario?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            
        </div>
        <div class="col-md-6 col-xs-12">
        <?php $suma_extra = 0; ?>
            <?php if ( ! $extras ):
            else: ?>
            <div class="row"><!-- Informacio de los extras-->
                <div class="col-md-12">
                    <h2>Extras</h2>

                    <table class="table table-striped table-bordered">
                        <thead>
                        <th>Extra</th>
                        <th>Cantidad</th>
                        <th>Precio</th>
                        </thead>
                        <tbody>
                            <?php if ($extras) : foreach ($extras as $extra ): ?>
                            
                                <?php if ($extra->cantidad != null): ?>
                                    <tr>
                                    <td><?php echo  $extra->extra ?></td>
                                    <td><?php echo  $extra->cantidad ?></td>
                                    <td><?php echo  $extra->precio?></td>
                                    <?php if ($extra->por_dia == 1 ): ?>
                                            <td><?php echo  ($extra->precio * $extra->cantidad) * $dias ?> CLP</td>
                                    <?php else: ?>
                                            <td><?php echo  $extra->precio * $extra->cantidad  ?> CLP</td>
                                    <?php endif; ?>

                                    </tr>

                                <?php endif; ?>


                                <?php endforeach; endif;?>
                        </tbody>
                    </table>
                </div>
            </div>
            <?php endif; ?>

        </div>
    </div>
        
        
        <!--Informacion Extra-->


        <!--Informacion del cliente-->
    <div class="row">
        <div class="col-md-12">
            <h2>Información del Cliente</h2>     
        </div>
    </div>
    
    <form action="<?php echo site_url('cliente/actualizar_cliente_reserva');?>" method="post">
    <div class="row">

            <div class="col-md-2">
                <div class="form-group">
                        <label>Rut:</label>
                        <input type="text" class="form-control" name="rut" value="<?php echo $cliente->rut ?>">
                </div>
            </div>

            <div class="col-md-5">
                <div class="form-group">
                        <label for="">Nombre:</label>
                        <input type="text" name="nombre" class="form-control" value="<?php echo $cliente->nombre ?>">
                </div>
            </div>

            <div class="col-md-5">
                <div class="form-group">
                <label for="">Apellido</label>
                <input type="text" name="apellido" class="form-control" value="<?php echo $cliente->apellido ?>">
                </div>
            </div>

            <div class="col-md-3">
                <div class="form-group">
                        <label for="">Fecha de nacimiento:</label>
                        <div class='input-group date' id='fecha_nacimiento'>
                        <input type='text' name='fecha_nacimiento' class="form-control" value="<?php echo $cliente->fecha_nacimiento?>">
                        <span class="input-group-addon">
                            <span class="glyphicon glyphicon-calendar"></span>
                        </span>
                        </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="form-group">
                <label for="">Telefono:</label>
                <input type="number" name="telefono" class="form-control" value="<?php echo $cliente->telefono?>">
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group ">
                        <label for="">Correo electronico:</label>
                        <input type="email" name="email" class="form-control" id="exampleInputEmail1" value="<?php echo $cliente->email?>">
                </div>
            </div>

            <div class="col-md-4">
                <div class="form-group">
                        <label for="">Pais:</label>
                        <select class="form-control" name="pais" id="">
                            <option value="">Seleccione un país de la lista</option>
                            <?php foreach ($paises as $pais):?>
                                <?php if ($pais->pais == $cliente->pais):?>
                                    <option value="<?php echo $pais->pais; ?>" selected><?php echo $pais->pais;?></option>
                                <? else :?>
                                    <option value="<?php echo $pais->pais; ?>"><?php echo $pais->pais;?></option>
                                <?php endif;?>
                                
                            <?php endforeach; ?>
                        </select>
                </div>
            </div>

            <div class="col-md-4">
                <div class="form-group">
                        <label for="">Ciudad:</label>
                        <input type="text" name="ciudad" class="form-control" value="<?php echo $cliente->ciudad?>">
                </div>
            </div>

            <div class="col-md-4">
                <div class="form-group">
                        <label for="">Direccion:</label>
                        <input type="text" name="direccion" class="form-control" value="<?php echo $cliente->direccion?>">
                </div>
            </div>
            
            <div class="col-md-12">
                <input type="text" name="id_cliente" value="<?php echo  $cliente->id_cliente;?>" hidden>
                <input type="text" name="id_reserva" value="<?php echo  $reserva->id_reserva;?>" hidden>
                <input type="submit" value="Actualizar" class="btn btn-success pull-right">
            </div>
        
        </form>
        
        </div>

    <!-- FIN Informacion del cliente-->

   <hr>
   
   <div class="row">
      <div class="col-md-4">
            <h2>Precios</h2>
      </div>

      <div class="col-md-8 ">
         <div class="row">
            <form class="" action="<?php echo  site_url( 'reserva/actualizar_precio' ); ?>" method="post">
            <div class="form-group form-inline pull-right">
               <label for="">Descuento(%):</label>
               <input type="number" name="descuento" class="form-control" placeholder="Ej: 15">
            </div>
            <div class="form-group form-inline pull-right">
               <label for="">  Modificar precio</label>
               <input type="text" name="total" value="<?php echo $reserva->total ?>" class="form-control">
            </div>
         </div>

         <div class="row">
            <div class="form-group form-inline">
               <input type="text" name="id_reserva" value="<?php echo $reserva->id_reserva?>" hidden="">
               <input type="submit" name="Actualizar Precio" class="btn btn-success pull-right" value="Actualizar Precio">
            </div>
         </div>

         </form>
      </div>

   </div>
   <br>
   <div class="row">

      <div class="col-md-12">

         <table class="table table-striped table-bordered">
            <thead>
               <th>Precio por dia</th>
               <th>Precio por extras</th>
               <th>Sub total</th>
               <th>Total</th>
            </thead>
            <tbody>

                  <tr class="success">
                     <td><?php echo '$' . number_format($reserva->precio_arriendo_vehiculo , '0', ',' , '.');?></td>
                     <td><?php echo '$' . number_format($suma_extra , '0', ',' , '.');?></td>
                     <td><?php echo '$' . number_format($reserva->sub_total , '0', ',' , '.');?></td>
                     <td><?php echo '$' . number_format($reserva->total , '0', ',' , '.');?></td>

                  </tr>
                  <tr>
                     <td></td>
                     <td></td>
                     <th>Abonado a la reserva</th>
                     <td class="success"><?php echo '$' . number_format($reserva->abonado , '0', ',' , '.');?></td>

                  </tr>
                  <tr>
                     <td></td>
                     <td></td>
                     <th>Precio Final USD</th>
                     <? $precio_en_usd = $reserva->total / 620?>
                     <td class="success"><?php echo '$' . number_format($precio_en_usd , '2', ',' , '.');?></td>

                  </tr>

            </tbody>
         </table>
      </div>
   </div>
   <hr>

    <div class="row">
        <div class="col-md-6">
            <div class="col-md-12">
                <a href="<?php echo  site_url( 'reserva/imprimir_pdf/'.$reserva->id_reserva ); ?>" class="btn btn-success btn-block">Imprimir Reserva en PDF</a>
            </div>

            <div class="col-md-12" style="margin-top:10px;">
                <a href="<?php echo  site_url( 'reserva/recibir_vehiculo/'.$reserva->id_reserva ); ?>" class="btn btn-danger btn-block">Entregar Vehiculo</a>
            </div>

            <div class="col-md-12" style="margin-top:10px;">
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary btn-block" data-toggle="modal" data-target="#exampleModal">
                Ingresar abono
                </button>

                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                            <h2 class="modal-title" id="exampleModalLabel">Ingresar Abono de la reserva</h2>

                            </div>
                            <form action="<?php echo  site_url( 'reserva/pagar_abono'); ?>"  method="post">
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="">Ingresa el monto a abonar en la reserva</label>
                                                <input type="number" name="abono" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <input type="hidden" name="id_reserva" value="<?php echo $reserva->id_reserva?>">
                                    <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                                </div>

                            </form>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>

        

        <div class="col-md-6">
            <form class="" action="<?php echo  site_url( 'reserva/definir_reserva'); ?>" method="post">

                <h4>Propiedades de la Reseva:</h4>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Cotizacion</label>
                        <input type="checkbox" name="cotizacion" value="1">
                    </div>
                </div>
                <div class="col-md-6">
                    <input type="text" name="id_reserva" value="<?php echo $reserva->id_reserva?>" hidden="">
                    <input type="submit" name="" value="Guardar Cotizacion/Reserva" class="btn btn-primary btn-block">
                </div>

            </form>
        </div>
    </div>
    
    <a href="<?php echo site_url('extra/anexo/'. $reserva->id_reserva)?>" class='btn btn-danger '>Contrato anexo</a>
 
</div>