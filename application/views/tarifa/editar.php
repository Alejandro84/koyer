<div class="container">
   <div class="row">
      <h1>Precio<small>Editar</small></h1>
   </div>
   <div class="row bs-example">
      <form action="<?php echo site_url('tarifa/actualizar');?>" method="post" class="col-md-4">
         <div class="form-group">
            <label for=""></label>
            <input type="text" name="modelo" value="<?php echo $tarifa->modelo;?>" class="form-control" readonly>
         </div>

         <div class="form-group">
             <label for="">Precio</label>
             <input type="text" name="precio" value="<?php echo $tarifa->precio;?>" class="form-control">
         </div>

            <input type="text" name="id_tarifa" value="<?php echo $tarifa->id_tarifa;?>" hidden="true">

            <input type="submit" class="btn btn-success" value="Guardar">
      </form>

   </div>
</div>
