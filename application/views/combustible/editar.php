<form action="<?=site_url('combustible/actualizar');?>" method="post">
      <input type="text" name="combustible" value="<?= $combustible->combustible;?>">
      <input type="text" name="id_combustible" value="<?= $combustible->id_combustible;?>" hidden="true">
      <input type="submit" name="" value="Guardar">
</form>
