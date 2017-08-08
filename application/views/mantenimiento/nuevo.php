<form action="<?=site_url('mantenimiento/guardar');?>" method="post">

      <select class="" name="id_mantenimiento">
         <?php foreach ($tipos_mantenimientos as $tipo_mantenimiento ):?>
            <option value="<?=$tipo_mantenimiento->id_tipo_mantenimiento;?>"><?=$tipo_mantenimiento->mantenimiento;?></option>
         <?php endforeach; ?>
      </select>

      <input type="number" name="costo" value="">

      <select class="" name="id_vehiculo">
         <?php foreach ($vehiculos as $vehiculo ):?>
            <option value="<?=$vehiculo->id_vehiculo;?>"><?=$vehiculo->patente;?></option>
         <?php endforeach; ?>
      </select>

      <textarea name="comentario" rows="5" cols="40"></textarea>

      <input type="text" name="fecha_mantencion" value="">

      <input type="submit" name="" value="Guardar">
</form>
