<form action="<?=site_url('categoria/actualizar');?>" method="post">
      <input type="text" name="categoria" value="<?= $categoria->categoria;?>">
      <input type="text" name="id_categoria" value="<?= $categoria->id_categoria;?>" hidden="true">
      <input type="submit" name="" value="Guardar">
</form>
