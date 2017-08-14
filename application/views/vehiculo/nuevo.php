<div class="container">

   <div class="row">
      <div class="col-md-6">
         <h1>Vehiculo <small>Nuevo</small></h1>
         <form action="<?=site_url('vehiculo/guardar');?>" method="post">

            <div class="form-inline form-group">
               <label for="patente">Patente:</label>
               <input type="text" id="patente" name="patente" value=""class="form-control" placeholder="ej: ABCD96">
            </div>

            <div class="form-group">
               <label for="marca">Marca:</label>
               <select class="form-control" id="marca" name="id_marca">
                  <option value="">Seleccione una opcion...</option>
                  <?php foreach ($marca as $marca ):?>
                     <option value="<?=$marca->id_marca;?>"><?=$marca->marca;?></option>
                  <?php endforeach; ?>
               </select>
            </div>

            <div class="form-group">
               <label for="">Modelo:</label>
               <select class="form-control" id="modelo" name="id_modelo">
                  <option value="">Seleccione una opcion...</option>
                  <?php foreach ($modelo as $modelo ):?>
                     <option value="<?=$modelo->id_modelo;?>"><?=$modelo->modelo;?></option>
                  <?php endforeach; ?>
               </select>
            </div>

            <div class="form-group">
               <label for="">Tarifa:</label>
               <select class="form-control" name="id_tarifa">
                  <option value="">Seleccione una opcion...</option>
                  <?php foreach ($tarifa as $tarifa ):?>
                     <option value="<?=$tarifa->id_tarifa;?>"><?=$tarifa->precio;?></option>
                  <?php endforeach; ?>
               </select>
            </div>

            <div class="form-group">
               <label for="">Transmisión:</label>
               <select class="form-control" name="id_transmision">
                  <option value="">Seleccione una opcion...</option>
                  <?php foreach ($transmision as $transmision ):?>
                     <option value="<?=$transmision->id_transmision;?>"><?=$transmision->transmision;?></option>
                  <?php endforeach; ?>
               </select>
            </div>

            <div class="form-group">
               <label for="">Combustible:</label>
               <select class="form-control" name="id_combustible">
                  <option value="">Seleccione una opcion...</option>
                  <?php foreach ($combustible as $combustible ):?>
                     <option value="<?=$combustible->id_combustible;?>"><?=$combustible->combustible;?></option>
                  <?php endforeach; ?>
               </select>
            </div>

            <div class="form-group">
               <label for="form-control">Categoria:</label>
               <select class="form-control" name="id_categoria">
                  <option value="">Seleccione una opcion...</option>
                  <?php foreach ($categoria as $categoria ):?>
                     <option value="<?=$categoria->id_categoria;?>"><?=$categoria->categoria;?></option>
                  <?php endforeach; ?>
               </select>
            </div>

            <input type="submit" name="" value="Guardar" class="btn btn-success pull-right" >

         </form>
      </div>

   </div>
</div>
