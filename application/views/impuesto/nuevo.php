<h2>Nuevo</h2>

<form action="<?php echo site_url('impuesto/guardar');?>" method="post" >
   <div class="form-group">
      <label for="marca">Nombre de impuesto</label>
      <input type="text" name="impuesto" value="" class="form-control" placeholder="Ej: IVA">
   </div>

   <div class="form-group">
      <label for="marca">Valor (%)</label>
      <input type="text" name="valor" value="" class="form-control" placeholder="Ej: 20">
   </div>

   <input type="submit" name="" value="Guardar" class="btn btn-success">

</form>
