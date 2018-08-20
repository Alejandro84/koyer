<h2>Nuevo</h2>

<form action="<?php echo site_url('locacion/guardar');?>" method="post" >
   <div class="form-group">
      <label for="marca">Nombre de locacion</label>
      <input type="text" name="locacion" value="" class="form-control" placeholder="Ej: Santiago">
   </div>

   <div class="form-group">
      <label for="marca">Recargo de entrega</label>
      <input type="text" name="recargo_entrega" value="1" class="form-control" placeholder="Ej: 50000">
   </div>
   <div class="form-group">
      <label for="marca">Recargo de devolución</label>
      <input type="text" name="recargo_devolucion" value="1" class="form-control" placeholder="Ej: 50000">
   </div>
   <div class="row">
       <div class="col-md-6">
           <div class="form-group">
               <div class="checkbox">
                    <input type="checkbox" name="entrega" value="1"> Habilitado para entrega
               </div>
           </div>
       </div>
       <div class="col-md-6">
           <div class="form-group">
               <div class="checkbox">
                    <input type="checkbox" name="devolucion" value="1"> Habilitado para devolución
               </div>
           </div>
       </div>
   </div>

   <input type="submit" name="" value="Guardar" class="btn btn-success">

</form>
