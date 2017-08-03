<form action="<?=site_url('transmision/actualizar');?>" method="post">
      <input type="text" name="transmision" value="<?= $transmision->transmision;?>">
      <input type="text" name="id_transmision" value="<?= $transmision->id_transmision;?>" hidden="true">
      <input type="submit" name="" value="Guardar">
</form>
