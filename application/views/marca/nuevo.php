
<div class="container">
   <div class="row">
      <h1>Marcas <small>Nuevo</small></h1>

   </div>
   <div class="row">

      <form action="<?=site_url('marca/guardar');?>" method="post" class="col-xs-4">
         <div class="form-group">
            <label for="marca">Marca</label>
            <input type="text" name="marca" value="" class="form-control" placeholder="Ej:Chevrolet">
         </div>

         <input type="submit" name="" value="Guardar" class="btn btn-success">

      </form>

   </div>

</div>
