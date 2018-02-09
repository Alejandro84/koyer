<div class="container">

   <div class="row">
      <h1>Marcas <small>Editar</small></h1>
   </div>

   <div class="row">

      <form action="<?php echo site_url('marca/actualizar');?>" method="post" class="col-xs-4">

         <div class="form-group">
            <label for="marca">Marcas:</label>
            <input type="text" name="marca" class="form-control" value="<?php echo  $marca->marca;?>">
         </div>

            <input type="text" name="id_marca" value="<?php echo  $marca->id_marca;?>" hidden="true">

            <input type="submit" name="" value="Guardar" class="btn btn-success">

      </form>

   </div>

</div>
