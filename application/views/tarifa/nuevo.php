
<h3>Nuevo</h3>

<form action="<?php echo site_url('tarifa/guardar');?>" method="post" >

<div class="form-group">
      <label >Modelo</label>
      <select class="form-control" name="id_modelo">
      <?php foreach ($modelos as $modelo ):?>
            <option value="<?php echo $modelo->id_modelo;?>"><?php echo $modelo->modelo;?></option>
      <?php endforeach; ?>
      </select>
</div>

<div class="form-group">
      <label for="precio">Precio</label>
      <input type="text" name="precio" value="" class="form-control" placeholder="Ej: 45000">
</div>

      <input type="submit" name="" value="Guardar" class="btn btn-success">
</form>

