<div class="container">

   <div class="row">

      <h1>Modelos<small>Nuevo</small></h1>

   </div>

   <div class="row">

      <form action="<?=site_url('modelo/guardar');?>" method="post" class="col-md-4 col-xs-4">
         <div class="form-group">
            <label for="modelo">Modelo</label>
            <input type="text" name="modelo" value="" class="form-control">
         </div>

         <div class="form-group">
            <label for="id_marca">Marca</label>
            <select class="form-control" name="id_marca">
               <?php foreach ($marcas as $marca ):?>
                  <option value="<?=$marca->id_marca;?>"><?=$marca->marca;?></option>
               <?php endforeach; ?>
            </select>
         </div>


            <input type="submit" name="" value="Guardar" class="btn btn-success">
      </form>

   </div>

</div>
