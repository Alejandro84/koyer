<div class="container">

   <div class="row">

      <div class="col-md-12">

      <h1>Reserva</h1>

         <form action="<?=site_url('reserva/guardar');?>" method="post">

         <div class="row">

            <div class="col-md-6">

               <div class="form-group">
                  <div class='input-group date' id='reserva-fecha_desde'>
                     <input type='text' class="form-control" />
                     <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                     </span>
                  </div>
               </div>

            </div>

         <div class="col-md-6">

            <div class="form-group">
               <div class='input-group date' id='reserva-fecha_hasta'>
                  <input type='text' class="form-control" />
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
                     <?php foreach ($locaciones as $locacion ):?>
                        <option value="<?=$locacion->id_locacion;?>"><?=$locacion->locacion;?></option>
                     <?php endforeach; ?>
                  </select>
               </div>

            </div>

         <div class="col-md-6">

            <div class="form-group">
               <label for="form-control">Lugar de devolucion</label>
                  <select class="form-control" name="locacion_devolcuion">
                     <option value="">Seleccione una opcion...</option>
                     <?php foreach ($locaciones as $locacion ):?>
                        <option value="<?=$locacion->id_locacion;?>"><?=$locacion->locacion;?></option>
                     <?php endforeach; ?>
               </select>
            </div>

         </div>

         </div>

         <div class="row">

            <div class="col-md-6">

               <div class="form-group">
                  <label for="form-control">Vehiculos:</label>
                  <select class="form-control" name="id_vehiculo">
                  <option value="">Seleccione una opcion...</option>
                     <?php foreach ($vehiculos as $vehiculo ):?>
                        <option value="<?=$vehiculo->id_vehiculo;?>"><?=$vehiculo->marca;?> <?=$vehiculo->modelo;?></option>
                     <?php endforeach; ?>
                  </select>
               </div>

            </div>

         </div>

         <div class="col-md-12">
            <? $this->load->view('cliente/nuevo'); ?>
         </div>

         <input type="submit" name="" value="Guardar" class="btn btn-success pull-right" >

         </form>

      </div>

   </div>

</div>
