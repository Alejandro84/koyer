<div class="container">
   <div class="row">

      <div class="col-md-6">
         <h1>Vehiculo <small>Editar</small></h1>
         <form action="<?=site_url('vehiculo/actualizar');?>" method="post">
            <div class="form-group">
               <label for="">Patente:</label>
               <input class="form-control" type="text" name="patente" value="<?=$vehiculo->patente;?>">
            </div>

            <div class="form-group">
               <label for="">Marca:</label>
               <select class="form-control" name="id_marca">
                  <? foreach ($marca as $marca ):?>
                     <? if ( $marca->id_marca == $vehiculo->id_marca ) : ?>
                        <option value="<?=$marca->id_marca;?>" selected><?=$marca->marca;?></option>
                     <? else: ?>
                        <option value="<?=$marca->id_marca;?>"><?=$marca->marca;?></option>
                     <? endif; ?>
                  <? endforeach;?>
               </select>
            </div>

            <div class="form-group">
               <label for="">Modelo</label>
               <select class="form-control" name="id_modelo">
                  <?php foreach ($modelo as $modelo ):?>
                     <? if ( $modelo->id_modelo == $vehiculo->id_modelo ) : ?>
                        <option value="<?=$modelo->id_modelo;?>" selected><?=$modelo->modelo;?></option>
                     <? else: ?>
                        <option value="<?=$modelo->id_modelo;?>"><?=$modelo->modelo;?></option>
                     <? endif; ?>
                  <? endforeach;?>
               </select>
            </div>



            <div class="form-group">
               <label for="">Tarifa</label>
               <select class="form-control" name="id_tarifa">
                  <?php foreach ($tarifa as $tarifa ):?>
                     <? if ( $tarifa->id_tarifa == $vehiculo->id_tarifa ) : ?>
                        <option value="<?=$tarifa->id_tarifa;?>"selected><?=$tarifa->precio;?></option>
                     <? else: ?>
                        <option value="<?=$tarifa->id_tarifa;?>"><?=$tarifa->precio;?></option>
                     <? endif; ?>
                  <? endforeach;?>
               </select>
            </div>


            <div class="form-group">
               <label for="">Transmisión:</label>
               <select class="form-control" name="id_transmision">
                  <? foreach ( $transmision as $transmision  ) : ?>
                     <? if ( $transmision->id_transmision == $vehiculo->id_transmision ) : ?>
                        <option value="<?=$transmision->id_transmision;?>" selected><?=$transmision->transmision;?></option>
                     <? else: ?>
                        <option value="<?=$transmision->id_transmision;?>"><?=$transmision->transmision;?></option>
                     <? endif; ?>
                  <? endforeach;?>
               </select>
            </div>


            <div class="form-group">
               <label for="">Combustible:</label>
               <select class="form-control" name="id_combustible">
                  <?php foreach ($combustible as $combustible ):?>
                     <? if ( $combustible->id_combustible == $vehiculo->id_combustible ) : ?>
                        <option value="<?=$combustible->id_combustible;?>" selected><?=$combustible->combustible;?></option>
                     <? else: ?>
                        <option value="<?=$combustible->id_combustible;?>"><?=$combustible->combustible;?></option>
                     <? endif; ?>
                  <? endforeach;?>
               </select>
            </div>


            <div class="form-group">
               <label for="">Categoria:</label>
               <select class="form-control" name="id_categoria">
                  <?php foreach ($categoria as $categoria ):?>
                     <? if ( $categoria->id_categoria == $vehiculo->id_categoria ) : ?>
                        <option value="<?=$categoria->id_categoria;?>" selected><?=$categoria->categoria;?></option>
                     <? else: ?>
                        <option value="<?=$categoria->id_categoria;?>"><?=$categoria->categoria;?></option>
                     <? endif; ?>
                  <? endforeach;?>
               </select>
            </div>


            <input type="text" name="id_vehiculo" value="<?=$vehiculo->id_vehiculo;?>" hidden="true">
            <input type="submit" name="" value="Guardar" class="btn btn-success">
         </form>
      </div>
   </div>
</div>
