<div class="col-md-6">

      <h3>Nuevo</h3>

   <form action="<?php echo site_url('modelo/guardar');?>" method="post" >
      <div class="form-group">
         <label for="modelo">Modelo</label>
         <input type="text" name="modelo" value="" class="form-control">
      </div>

      <div class="form-group">
         <label for="id_marca">Marca</label>
         <select class="form-control" name="id_marca">
            <?php foreach ($marcas as $marca ):?>
               <option value="<?php echo $marca->id_marca;?>"><?php echo $marca->marca;?></option>
            <?php endforeach; ?>
         </select>
      </div>

      <div class="form-group">
         <label for="precio">Precio</label>
         <input type="text" name="precio" value="" class="form-control" placeholder="Ej: 45000">
      </div>

         <input type="submit" name="" value="Guardar" class="btn btn-success">
   </form>
</div>
