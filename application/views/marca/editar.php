<form action="<?=site_url('marca/actualizar');?>" method="post">
      <input type="text" name="marca" value="<?= $marca->marca;?>">
      <input type="text" name="id_marca" value="<?= $marca->id_marca;?>" hidden="true">
      <input type="submit" name="" value="Guardar">
</form>
