<div class="container">
   <div class="row">

      <div class="col-md-6">
         <h1>Vehiculo <small>Editar</small></h1>
         <form action="<?php echo site_url('vehiculo/actualizar');?>" method="post">
            <div class="form-group">
               <label for="">Patente:</label>
               <input class="form-control" type="text" name="patente" value="<?php echo $vehiculo->patente;?>">
            </div>

            <div class="form-group">
               <label for="">Marca:</label>
               <select class="form-control" name="id_marca">
                  <? foreach ($marca as $marca ):?>
                     <? if ( $marca->id_marca == $vehiculo->id_marca ) : ?>
                        <option value="<?php echo $marca->id_marca;?>" selected><?php echo $marca->marca;?></option>
                     <? else: ?>
                        <option value="<?php echo $marca->id_marca;?>"><?php echo $marca->marca;?></option>
                     <? endif; ?>
                  <? endforeach;?>
               </select>
            </div>

            <div class="form-group">
               <label for="">Modelo</label>
               <select class="form-control" name="id_modelo">
                  <?php foreach ($modelo as $modelo ):?>
                     <? if ( $modelo->id_modelo == $vehiculo->id_modelo ) : ?>
                        <option value="<?php echo $modelo->id_modelo;?>" selected><?php echo $modelo->modelo;?></option>
                     <? else: ?>
                        <option value="<?php echo $modelo->id_modelo;?>"><?php echo $modelo->modelo;?></option>
                     <? endif; ?>
                  <? endforeach;?>
               </select>
            </div>



            <div class="form-group">
               <label for="">Tarifa</label>
               <select class="form-control" name="id_tarifa">
                  <?php foreach ($tarifa as $tarifa ):?>
                     <? if ( $tarifa->id_tarifa == $vehiculo->id_tarifa ) : ?>
                        <option value="<?php echo $tarifa->id_tarifa;?>"selected><?php echo $tarifa->precio;?></option>
                     <? else: ?>
                        <option value="<?php echo $tarifa->id_tarifa;?>"><?php echo $tarifa->precio;?></option>
                     <? endif; ?>
                  <? endforeach;?>
               </select>
            </div>


            <div class="form-group">
               <label for="">Transmisión:</label>
               <select class="form-control" name="id_transmision">
                  <? foreach ( $transmision as $transmision  ) : ?>
                     <? if ( $transmision->id_transmision == $vehiculo->id_transmision ) : ?>
                        <option value="<?php echo $transmision->id_transmision;?>" selected><?php echo $transmision->transmision;?></option>
                     <? else: ?>
                        <option value="<?php echo $transmision->id_transmision;?>"><?php echo $transmision->transmision;?></option>
                     <? endif; ?>
                  <? endforeach;?>
               </select>
            </div>


            <div class="form-group">
               <label for="">Combustible:</label>
               <select class="form-control" name="id_combustible">
                  <?php foreach ($combustible as $combustible ):?>
                     <? if ( $combustible->id_combustible == $vehiculo->id_combustible ) : ?>
                        <option value="<?php echo $combustible->id_combustible;?>" selected><?php echo $combustible->combustible;?></option>
                     <? else: ?>
                        <option value="<?php echo $combustible->id_combustible;?>"><?php echo $combustible->combustible;?></option>
                     <? endif; ?>
                  <? endforeach;?>
               </select>
            </div>


            <div class="form-group">
               <label for="">Categoria:</label>
               <select class="form-control" name="id_categoria">
                  <?php foreach ($categoria as $categoria ):?>
                     <? if ( $categoria->id_categoria == $vehiculo->id_categoria ) : ?>
                        <option value="<?php echo $categoria->id_categoria;?>" selected><?php echo $categoria->categoria;?></option>
                     <? else: ?>
                        <option value="<?php echo $categoria->id_categoria;?>"><?php echo $categoria->categoria;?></option>
                     <? endif; ?>
                  <? endforeach;?>
               </select>
            </div>


            <input type="text" name="id_vehiculo" value="<?php echo $vehiculo->id_vehiculo;?>" hidden="true">
            <input type="submit" name="" value="Guardar" class="btn btn-success">
         </form>
      </div>
   </div>
</div>
