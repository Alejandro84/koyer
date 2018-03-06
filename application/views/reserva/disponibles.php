<div class="container">
   <div class="row">
      <div class="col-md-12">
         <h1>Resultados de la búsqueda</h1>
         <hr>
      </div>
   </div>
   <div class="row jumbotron">

            <div class="col-md-6">
               <label for="">Fecha de Entrega:</label> <p><?php echo  $fecha_entrega ?> </p>
               <label for="">Fecha de Devolución:</label> <p><?php echo  $fecha_devolucion ?> </p>
            </div>

            <div class="col-md-6">
               <label for="">Lugar de Entrega:</label>
                  <?php foreach ($locaciones as $locacion): ?>
                     <?php if ($locacion->id_locacion == $locacion_entrega): ?>
                        <p><?php echo  $locacion->locacion?></p>
                     <?php endif; ?>
                  <?php endforeach; ?>

               <label for="">Lugar de Devolucion:</label>
               <?php foreach ($locaciones as $locacion): ?>
                  <?php if ($locacion->id_locacion == $locacion_devolucion): ?>
                     <p><?php echo  $locacion->locacion?></p>
                  <?php endif; ?>
               <?php endforeach; ?>

            </div>

   </div>

   <div class="row">

         <? foreach ( $disponibles as $auto ): ?>
            <? if ( $auto['estado'] === false ): ?>
            <form action="<?php echo site_url('reserva/vehiculos_seleccionado');?>" method="post" class="form-horizontal">

               <input type="text" name="fecha_desde" value="<?php echo  $fecha_entrega ?>" hidden>
               <input type="text" name="fecha_hasta" value="<?php echo  $fecha_devolucion ?>" hidden>

               <input type="text" name="locacion_entrega" value="<?php echo  $locacion_entrega ?>" hidden>
               <input type="text" name="locacion_devolucion" value="<?php echo  $locacion_devolucion ?>" hidden>

               <div class="col-md-3" style="margin-bottom:13px;">
                  <div style="height:400px">
                     <img src="http://placehold.it/300x250" width="100%">
                     <h3><?php echo $auto['info_auto']->modelo;?><small> <?php echo $auto['info_auto']->marca;?></small></h3>
                     <h4>Precio: $<?php echo number_format( $auto['info_auto']->precio, 2, ',', '.');?></h4>
                     <h4>Patente: <?php echo  $auto['info_auto']->patente;?></h4>

                     <!--<h4>Ubicacion Actual: <?php echo  $auto['ubicacion']->locacion?></h4>-->

                     <?php foreach ($extras as $extra): ?>
                         <?php if ($extra->por_dia == 1): ?>
                             <div class="form-group">
                                 <label for="inputEmail3" class="col-sm-8 control-label"><?php echo  $extra->extra;?></label>
                                 <div class="col-sm-4">
                                    <input type="number" name="cantidad[<?php echo $extra->id_extra?>]" class="form-control" id="inputEmail3" placeholder="Cantidad">
                                 </div>
                             </div>
                        <?php else: ?>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-8 control-label"><?php echo  $extra->extra;?></label>
                                <div class="col-sm-4">
                                   <input type="checkbox" name="cantidad[<?php echo $extra->id_extra?>]" value="1" class="form-control" id="inputEmail3" placeholder="Cantidad">
                                </div>
                            </div>
                        <?php endif; ?>

                     <?php endforeach; ?>

                     <input type="text" name="vehiculo" value="<?php echo $auto['info_auto']->id_vehiculo;?>" hidden="">

                  </div>
                  <input type="submit" class="btn btn-block btn-danger" value="Seleccionar" style="margin-top:20px;">

               </div>
            </form>
            <? endif; ?>

         <? endforeach; ?>


   </div>

</div>
