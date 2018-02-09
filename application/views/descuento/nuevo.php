
<form action="<?php echo site_url('descuento/guardar');?>" method="post" >
   <div class="form-group">
      <label for="descuento">descuento</label>
      <input type="text" name="descuento" value="" class="form-control" placeholder="Ej: Chevrolet">
   </div>

   <div class="form-group">
      <label for="valor">Porcentaje (%)</label>
      <input type="text" name="valor" class="form-control" placeholder="Ej: 20">
   </div>

   <input type="submit" name="" value="Guardar" class="btn btn-success">

</form>
