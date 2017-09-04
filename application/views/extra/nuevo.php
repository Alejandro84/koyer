<form action="<?=site_url('extra/guardar');?>" method="post" >
   <div class="form-group">
      <label for="">Nombre</label>
      <input type="text" name="extra" class="form-control" placeholder="Ej: Bidón de 10 Lts.">
   </div>
   <div class="form-group">
      <label for="extra">Precio</label>
      <input type="number" name="precio" class="form-control" placeholder="Ej: 20000">
   </div>
   <div class="form-group">
      <label for="extra">Unidades</label>
      <input type="number" name="stock" class="form-control" placeholder="Ej: 10">
   </div>

   <input type="submit" name="" value="Guardar" class="btn btn-success">

</form>
