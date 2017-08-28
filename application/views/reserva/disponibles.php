<div class="container">
   <div class="row">
      <div class="col-md-12">
         <h1>Resultados de la búsqueda</h1>
         <hr>
      </div>
   </div>
   <div class="row jumbotron">

            <div class="col-md-6">
               <label for="">Fecha de Entrega:</label> <p><?= $fecha_entrega ?> </p>
               <label for="">Fecha de Devolución:</label> <p><?= $fecha_devolucion ?> </p>
            </div>

            <div class="col-md-6">
               <label for="">Lugar de Entrega:</label>
                  <?php foreach ($locaciones as $locacion): ?>
                     <?php if ($locacion->id_locacion == $locacion_entrega): ?>
                        <p><?= $locacion->locacion?></p>
                     <?php endif; ?>
                  <?php endforeach; ?>

               <label for="">Lugar de Devolucion:</label>
               <?php foreach ($locaciones as $locacion): ?>
                  <?php if ($locacion->id_locacion == $locacion_devolucion): ?>
                     <p><?= $locacion->locacion?></p>
                  <?php endif; ?>
               <?php endforeach; ?>

            </div>

   </div>

   <div class="row">

         <? foreach ( $disponibles as $auto ): ?>
            <? if ( $auto['estado'] === false ): ?>
            <form action="<?=site_url('reserva/ingresar_cliente');?>" method="post">

               <input type="text" name="fecha_desde" value="<?= $fecha_entrega ?>" hidden>
               <input type="text" name="fecha_hasta" value="<?= $fecha_devolucion ?>" hidden>

               <input type="text" name="locacion_entrega" value="<?= $locacion_entrega ?>" hidden>
               <input type="text" name="locacion_devolucion" value="<?= $locacion_devolucion ?>" hidden>

               <div class="col-md-3" style="margin-bottom:13px;">
                  <div style="height:400px">
                     <img src="http://placehold.it/300x250" width="100%">
                     <h3><?=$auto['info_auto']->modelo;?><small> <?=$auto['info_auto']->marca;?></small></h3>
                     <h4>Precio: $<?=number_format( $auto['info_auto']->precio, 2, ',', '.');?></h4>
                     <h4>Patente: <?= $auto['info_auto']->patente;?></h4>

                     <h4>Ubicacion Actual: <?= $auto['ubicacion']->locacion?></h4>

                     <input type="text" name="vehiculo" value="<?=$auto['info_auto']->id_vehiculo;?>" hidden="">
                     <input type="text" name="patente" value="<?=$auto['info_auto']->patente;?>" hidden="">

                  </div>
                  <input type="submit" class="btn btn-block btn-danger" value="Seleccionar">

               </div>
            </form>
            <? endif; ?>

         <? endforeach; ?>


   </div>

</div>
