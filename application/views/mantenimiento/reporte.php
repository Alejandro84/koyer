<div class="container">
   <div class="row">
      <div class="row">
         <? $this->load->view('template/alert'); ?>
      </div>
      <div class="col-md-6">
         <h1>Reportes <small>Mantenimientos</small></h1>

         <form class="" action="<?php echo  site_url( 'mantenimiento/buscar_mantenimientos' ); ?>" method="post">

            <div class="form-group">
               <label for="">Vehiculo:</label>
               <select class="form-control" name="id_vehiculo">
                  <option value="">Elija un vehiculo</option>
                  <?php foreach ($vehiculos as $vehiculo ):?>
                     <option value="<?php echo $vehiculo->id_vehiculo;?>"> <b><?php echo $vehiculo->patente;?></b> <?php echo $vehiculo->modelo;?></option>
                  <?php endforeach; ?>
               </select>
            </div>
            <!--
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
            </div>-->
             <input type="submit" class="btn btn-success btn-block" value="Buscar">
         </form>

      </div>
   </div>
</div>
