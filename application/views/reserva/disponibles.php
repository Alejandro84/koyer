<div class="container">
   <div class="row">
      <div class="col-md-12">
         <h1>Resultados de la búsqueda</h1>
         <hr>
      </div>
   </div>
   <div class="row">
      <div class="col-md-12">
         <?php
         echo '<pre>';
         print_r($disponibles);
         ?>
      </div>
   </div>

   <div class="row">
      <? foreach ( $disponibles as $auto ): ?>
      <? if ( $auto['estado'] === false ): ?>
      <div class="col-md-3" style="margin-bottom:13px;">
         <div style="height:400px">
            <img src="http://placehold.it/300x250" width="100%">
            <h2><?=$auto['info_auto']->modelo;?></h2>
            <h4>$<?=number_format( $auto['info_auto']->precio, 2, ',', '.');?></h4>
         </div>
         <a class="btn btn-block btn-danger" href="#">Seleccionar</a>
      </div>
      <? endif; ?>
      <? endforeach; ?>
   </div>

</div>
