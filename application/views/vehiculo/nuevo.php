<form action="<?=site_url('vehiculo/guardar');?>" method="post">

      <input type="text" name="patente" value="">

      <select class="" name="id_marca">
         <option value="">Seleccione una opcion...</option>
         <?php foreach ($marca as $marca ):?>
            <option value="<?=$marca->id_marca;?>"><?=$marca->marca;?></option>
         <?php endforeach; ?>
      </select>

      <select class="" name="id_modelo">
         <option value="">Seleccione una opcion...</option>
         <?php foreach ($modelo as $modelo ):?>
            <option value="<?=$modelo->id_modelo;?>"><?=$modelo->modelo;?></option>
         <?php endforeach; ?>
      </select>

      <select class="" name="id_tarifa">
         <option value="">Seleccione una opcion...</option>
         <?php foreach ($tarifa as $tarifa ):?>
            <option value="<?=$tarifa->id_tarifa;?>"><?=$tarifa->precio;?></option>
         <?php endforeach; ?>
      </select>

      <select class="" name="id_transmision">
         <option value="">Seleccione una opcion...</option>
         <?php foreach ($transmision as $transmision ):?>
            <option value="<?=$transmision->id_transmision;?>"><?=$transmision->transmision;?></option>
         <?php endforeach; ?>
      </select>

      <select class="" name="id_combustible">
         <option value="">Seleccione una opcion...</option>
         <?php foreach ($combustible as $combustible ):?>
            <option value="<?=$combustible->id_combustible;?>"><?=$combustible->combustible;?></option>
         <?php endforeach; ?>
      </select>

      <select class="" name="id_categoria">
         <option value="">Seleccione una opcion...</option>
         <?php foreach ($categoria as $categoria ):?>
            <option value="<?=$categoria->id_categoria;?>"><?=$categoria->categoria;?></option>
         <?php endforeach; ?>
      </select>
   
      <input type="submit" name="" value="Guardar">

</form>
