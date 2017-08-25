<div class="container">
   <div class="row">
      <div class="col-md-12">
         <h1>Resultados de la búsqueda</h1>
         <hr>
      </div>
   </div>
   <div class="row">
      <div class="col-md-12">

         <h2>Datos de arriendo</h2>

         <h3>Fecha de entrega: <?= $fecha_entrega ?> </h3>
         <h3>Fecha de devolución: <?= $fecha_devolucion ?></h3>
         <h3>Lugar de entrega: <?= $locacion_entrega ?></h3>
         <h3>Lugar de devolución: <?= $locacion_entrega ?></h3>

      </div>
   </div>

   <div class="row">

         <? foreach ( $disponibles as $auto ): ?>
         <? if ( $auto['estado'] === false ): ?>
         <div class="col-md-3" style="margin-bottom:13px;">
            <div style="height:400px">
               <img src="http://placehold.it/300x250" width="100%">
               <h3><?=$auto['info_auto']->modelo;?><small> <?=$auto['info_auto']->marca;?></small></h3>
               <h4>Precio: $<?=number_format( $auto['info_auto']->precio, 2, ',', '.');?></h4>
            </div>
            <a class="btn btn-block btn-danger" href="#">Seleccionar</a>
         </div>
         <? endif; ?>
         <? endforeach; ?>

   </div>

</div>
