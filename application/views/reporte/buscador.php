<div class="container">
   <div class="row">
      <div class="row">
         <? $this->load->view('template/alert'); ?>
      </div>
      <div class="col-md-6 col-xs-12">
         <h1>Reportes</h1>

         <form class="" action="<?php echo base_url( 'reporte/buscar_reporte' ); ?>" method="post">

         <div class="form-group">
               <label for="">Vehiculo:</label>
               <select class="form-control" name="id_vehiculo">
                  <option value="">Elige un vehiculo</option>
                  <?php foreach ($vehiculos as $vehiculo ):?>
                     <option value="<?php echo $vehiculo->id_vehiculo;?>"> <b><?php echo $vehiculo->patente;?></b> <?php echo $vehiculo->modelo;?></option>
                  <?php endforeach; ?>
               </select>
            </div>

         <div class="form-group">
            <label for="">Fecha desde:</label>
            <div class='input-group date' id='repo_desde'>
               <input type='text' name="fecha_desde" class="form-control" />
               <span class="input-group-addon">
                     <span class="glyphicon glyphicon-calendar"></span>
               </span>
            </div>
         </div>

         <div class="form-group">
            <label for="">Fecha hasta:</label>
            <div class='input-group date' id='repo_hasta'>
               <input type='text' name="fecha_hasta" class="form-control" />
               <span class="input-group-addon">
                     <span class="glyphicon glyphicon-calendar"></span>
               </span>
            </div>
         </div>

         <input type="submit" class="btn btn-success btn-block" value="Buscar">
         
         </form>

      </div>
   </div>
</div>
