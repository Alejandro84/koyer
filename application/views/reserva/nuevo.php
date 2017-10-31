<div class="container">

   <div class="row">

      <div class="col-md-12">

      <h1>Reserva</h1>

         <form action="<?=site_url('reserva/verificar');?>" method="post">

         <? $this->load->view('template/alert'); ?>

         <div class="row">

            <div class="col-md-6">

               <div class="form-group">
                  <label for="reserva-fecha_desde">Desde:</label>
                  <div class='input-group date' id='reserva-fecha_desde'>
                     <input type='text' name='reserva-fecha_desde' class="form-control" />
                     <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                     </span>
                  </div>
               </div>

            </div>

         <div class="col-md-6">

            <div class="form-group">
               <label for="reserva-fecha_hasta">Hasta:</label>
               <div class='input-group date' id='reserva-fecha_hasta'>
                  <input type='text' name='reserva-fecha_hasta' class="form-control" />
                  <span class="input-group-addon">
                     <span class="glyphicon glyphicon-calendar"></span>
                  </span>
               </div>
            </div>

         </div>

         </div>

         <div class="row">

            <div class="col-md-6">

               <div class="form-group">
                  <label for="form-control">lugar de Entrega</label>
                  <select class="form-control" name="locacion_entrega">
                     <option value="">Seleccione una opcion...</option>
                     <?php foreach ($locaciones_entrega as $locacion_entrega ):?>
                        <option value="<?=$locacion_entrega->id_locacion;?>"><?=$locacion_entrega->locacion;?></option>
                     <?php endforeach; ?>
                  </select>
               </div>

            </div>

         <div class="col-md-6">

            <div class="form-group">
               <label for="form-control">Lugar de devolucion</label>
                  <select class="form-control" name="locacion_devolucion">
                     <option value="">Seleccione una opcion...</option>
                     <?php foreach ($locaciones_devolucion as $locacion_devolucion ):?>
                        <option value="<?=$locacion_devolucion->id_locacion;?>"><?=$locacion_devolucion->locacion;?></option>
                     <?php endforeach; ?>
               </select>
            </div>

         </div>

         </div>

         <input type="submit" name="" value="Buscar" class="btn btn-success pull-right" >

         </form>

      </div>

   </div>

</div>
