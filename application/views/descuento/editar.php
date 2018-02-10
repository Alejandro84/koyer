<div class="container">

   <div class="row">
      <h1>Descuentos <small>Editar</small></h1>
   </div>

   <div class="row">

      <form action="<?php echo site_url('descuento/actualizar');?>" method="post" class="col-xs-4">

         <div class="form-group">
            <label for="descuento">descuento</label>
            <input type="text" name="descuento" value="<?php echo $descuento->descuento;?>" class="form-control" placeholder="Ej.: reserva web">
         </div>

         <div class="form-group">
            <label for="valor">Porcentaje (%)</label>
            <input type="text" name="valor" value="<?php echo $descuento->valor;?>" class="form-control" >
         </div>

            <input type="text" name="id_descuento" value="<?php echo $descuento->id_descuento;?>" hidden="true">

            <input type="submit" name="" value="Guardar" class="btn btn-success">

      </form>

   </div>

</div>
