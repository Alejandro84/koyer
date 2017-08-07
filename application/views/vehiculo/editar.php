<form action="<?=site_url('vehiculo/actualizar');?>" method="post">

   <input type="text" name="patente" value="<?=$vehiculo->patente;?>">

   <select class="" name="id_marca">
      <? foreach ($marca as $marca ):?>
         <? if ( $marca->id_marca == $vehiculo->id_marca ) : ?>
            <option value="<?=$marca->id_marca;?>" selected><?=$marca->marca;?></option>
         <? else: ?>
            <option value="<?=$marca->id_marca;?>"><?=$marca->marca;?></option>
         <? endif; ?>
      <? endforeach;?>
   </select>

   <select class="" name="id_modelo">
      <?php foreach ($modelo as $modelo ):?>
         <? if ( $modelo->id_modelo == $vehiculo->id_modelo ) : ?>
            <option value="<?=$modelo->id_modelo;?>" selected><?=$modelo->modelo;?></option>
         <? else: ?>
            <option value="<?=$modelo->id_modelo;?>"><?=$modelo->modelo;?></option>
         <? endif; ?>
      <? endforeach;?>
   </select>

   <select class="" name="id_tarifa">
      <?php foreach ($tarifa as $tarifa ):?>
         <? if ( $tarifa->id_tarifa == $vehiculo->id_tarifa ) : ?>
            <option value="<?=$tarifa->id_tarifa;?>"selected><?=$tarifa->precio;?></option>
         <? else: ?>
            <option value="<?=$tarifa->id_tarifa;?>"><?=$tarifa->precio;?></option>
         <? endif; ?>
      <? endforeach;?>
   </select>

   <select class="" name="id_transmision">
      <? foreach ( $transmision as $transmision  ) : ?>
         <? if ( $transmision->id_transmision == $vehiculo->id_transmision ) : ?>
            <option value="<?=$transmision->id_transmision;?>" selected><?=$transmision->transmision;?></option>
         <? else: ?>
            <option value="<?=$transmision->id_transmision;?>"><?=$transmision->transmision;?></option>
         <? endif; ?>
      <? endforeach;?>
   </select>

   <select class="" name="id_combustible">
      <?php foreach ($combustible as $combustible ):?>
         <? if ( $combustible->id_combustible == $vehiculo->id_combustible ) : ?>
            <option value="<?=$combustible->id_combustible;?>" selected><?=$combustible->combustible;?></option>
         <? else: ?>
            <option value="<?=$combustible->id_combustible;?>"><?=$combustible->combustible;?></option>
         <? endif; ?>
      <? endforeach;?>
   </select>

   <select class="" name="id_categoria">
      <?php foreach ($categoria as $categoria ):?>
         <? if ( $categoria->id_categoria == $vehiculo->id_categoria ) : ?>
            <option value="<?=$categoria->id_categoria;?>" selected><?=$categoria->categoria;?></option>
         <? else: ?>
            <option value="<?=$categoria->id_categoria;?>"><?=$categoria->categoria;?></option>
         <? endif; ?>
      <? endforeach;?>
   </select>

   <input type="text" name="id_vehiculo" value="<?=$vehiculo->id_vehiculo;?>" hidden="true">
   <input type="submit" name="" value="Guardar">
</form>
