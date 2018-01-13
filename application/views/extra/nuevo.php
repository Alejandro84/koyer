<form action="<?=site_url('extra/guardar');?>" method="post" >
   <div class="form-group">
      <label for="">Nombre</label>
      <input type="text" name="extra" class="form-control" placeholder="Ej: Bidón de 10 Lts.">
   </div>
   <div class="form-group">
      <label for="extra">Precio</label>
      <input type="number" name="precio" class="form-control" placeholder="Ej: 20000">
   </div>

   <div class="checkbox">
       <label for=""> <input type="checkbox" name="por_dia" value="1"> Pago por dia</label>
   </div>
   <input type="submit" name="" value="Guardar" class="btn btn-success">

</form>
