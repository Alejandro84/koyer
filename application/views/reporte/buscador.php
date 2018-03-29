<div class="container">
   <div class="row">
      <div class="row">
         <? $this->load->view('template/alert'); ?>
      </div>
      <div class="col-md-6 col-md-offset-3">
         <h1>Reportes</h1>

         <form class="" action="<?php echo base_url( 'reporte/buscar_reporte' ); ?>" method="post">

             <div class="form-group">
                <label for="">Fecha:</label>
                 <div class='input-group date' id='fecha_desde'>
                     <input type='text' name="fecha_reporte" class="form-control" />
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
