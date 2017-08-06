<form action="<?=site_url('modelo/guardar');?>" method="post">

      <input type="text" name="patente" value="">
      <input type="text" name="modelo" value="">
      <input type="text" name="modelo" value="">
      <input type="text" name="modelo" value="">
      <input type="text" name="modelo" value="">


      <select class="" name="id_marca">

         <?php foreach ($marcas as $marca ):?>

            <option value="<?=$marca->id_marca;?>"><?=$marca->marca;?></option>

         <?php endforeach; ?>

      </select>

      <input type="submit" name="" value="Guardar">

</form>
