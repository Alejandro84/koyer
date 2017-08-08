<form action="<?=site_url('modelo/actualizar');?>" method="post">
   <input type="text" name="modelo" value="<?= $modelo->modelo;?>">

   <select class="" name="id_marca">
         <option value="<?=$modelo->id_marca;?>"><?=$modelo->marca;?></option>      
   </select>

      <input type="text" name="id_modelo" value="<?= $modelo->id_modelo;?>" hidden="true">
      <input type="submit" name="" value="Guardar">
</form>
