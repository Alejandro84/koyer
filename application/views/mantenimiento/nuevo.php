
      <h1>Mantenimientos <small>Ingrese mantenimiento</small></h1>

      <form action="<?php echo site_url('mantenimiento/guardar');?>" method="post">

          <div class="form-group">
             <label for="">Descripcion del Mantenimiento</label>
             <textarea class="form-control" name="mantenimiento" rows="3" cols="30"></textarea>
          </div>

         <div class="form-group">
            <label for="">Costo del mantenimiento:</label>
            <input type="number" name="costo" value="" class="form-control">
         </div>

         <div class="form-group">
            <label for="">Vehiculo:</label>
            <select class="form-control" name="id_vehiculo">
               <option value="">Elija una opción...</option>
               <?php foreach ($vehiculos as $vehiculo ):?>
                  <option value="<?php echo $vehiculo->id_vehiculo;?>"> <b><?php echo $vehiculo->patente;?></b> <?php echo $vehiculo->modelo;?></option>
               <?php endforeach; ?>
            </select>
         </div>

         <div class="form-group">
            <label for="">Fecha en que se hizo el mantenimiento:</label>
             <div class='input-group date' id='fecha_mantencion'>
                 <input type='text' name="fecha_mantencion" class="form-control" />
                 <span class="input-group-addon">
                     <span class="glyphicon glyphicon-calendar"></span>
                 </span>
             </div>
          </div>


         <input class="btn btn-success pull-right" type="submit" name="" value="Guardar">
      </form>
