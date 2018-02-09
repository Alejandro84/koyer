<div class="container">
   <div class="row">
      <h1>Mantenimientos <small>Editar</small></h1>

      <form action="<?php echo site_url('mantenimiento/actualizar');?>" method="post">

         <div class="form-group">
            <label for="">Tipo de Mantenimiento:</label>
            <select class="form-control" name="id_tipo_mantenimiento">
               <?php foreach ($tipos_mantenimientos as $tipo_mantenimiento ):?>
                  <?php if ($mantenimiento->id_tipo_mantenimiento == $tipo_mantenimiento->id_tipo_mantenimiento): ?>
                     <option value="<?php echo $tipo_mantenimiento->id_tipo_mantenimiento;?>" selected><?php echo $tipo_mantenimiento->mantenimiento;?></option>
                  <?php else: ?>
                     <option value="<?php echo $tipo_mantenimiento->id_tipo_mantenimiento;?>"><?php echo $tipo_mantenimiento->mantenimiento;?></option>
                  <?php endif; ?>


               <?php endforeach; ?>
            </select>
         </div>

         <div class="form-group">
            <label for="">Costo del mantenimiento:</label>
            <input type="number" name="costo" value="<?php echo $mantenimiento->costo;?>" class="form-control">
         </div>

         <div class="form-group">
            <label for="">Vehiculo:</label>
            <select class="form-control" name="id_vehiculo">
               <option value="">Elija una opción...</option>
               <?php foreach ($vehiculos as $vehiculo ):?>
                  <?php if ($vehiculo->id_vehiculo == $mantenimiento->id_vehiculo): ?>
                     <option value="<?php echo $vehiculo->id_vehiculo;?>" selected><?php echo $vehiculo->patente;?> <?php echo $vehiculo->modelo;?></option>
                  <?php else: ?>
                     <option value="<?php echo $vehiculo->id_vehiculo;?>"><?php echo $vehiculo->patente;?> <?php echo $vehiculo->modelo;?></option>
                  <?php endif; ?>


               <?php endforeach; ?>
            </select>
         </div>


         <div class="form-group">
            <label for="">Comentario:</label>
            <textarea class="form-control" name="comentario" rows="3" cols="30"><?php echo $mantenimiento->comentario;?></textarea>
         </div>

         <input type="text" name="id_mantenimiento" value="<?php echo $mantenimiento->id_mantenimiento;?>" hidden="">

         <input class="btn btn-success pull-right" type="submit" name="" value="Actualizar">
      </form>

   </div>
</div>
