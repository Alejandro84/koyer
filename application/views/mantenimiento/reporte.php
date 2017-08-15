<div class="container">
   <div class="row">
      <div class="col-md-6">
         <h1>Reportes <small>Mantenimientos</small></h1>
         <div class="form-group">
            <label for="">Vehiculo:</label>
            <select class="form-control" name="id_vehiculo">
               <?php foreach ($vehiculos as $vehiculo ):?>
                  <option value="<?=$vehiculo->id_vehiculo;?>"> <b><?=$vehiculo->patente;?></b> <?=$vehiculo->modelo;?></option>
               <?php endforeach; ?>
            </select>
         </div>
      </div>
   </div>
   <div class="row">
      <div class="col-md-10">

            <div class="form-group">
               <label for="">Desde:</label>
                <div class='input-group date' id='fecha_desde'>
                    <input type='text' name="fecha_desde" class="form-control" />
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                </div>
             </div>

             <div class="form-group">
               <label for="">Hasta:</label>
                <div class='input-group date' id='fecha_hasta'>
                    <input type='text' name="fecha_hasta" class="form-control" />
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                </div>
             </div>

      </div>
   </div>
</div>
