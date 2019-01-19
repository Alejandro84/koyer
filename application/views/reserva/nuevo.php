<div class="container">

   <div class="row">

      <div class="col-md-12 ">

      <h1>Reserva</h1>

      <?php /* <form action="<?php echo site_url('reserva/verificar');?>" method="post"> */ ?>

         <? $this->load->view('template/alert'); ?>

         <div class="row">

            <div class="col-md-6 col-xs-12">

               <div class="form-group">
                  <label for="reserva-fecha_desde">Desde:</label>
                  <div class='input-group date' id='reserva-fecha_desde'>
                     <input type='text' name='reserva-fecha_desde' id="desde" class="form-control" />
                     <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                     </span>
                  </div>
               </div>

            </div>

         <div class="col-md-6 col-xs-12">

            <div class="form-group">
               <label for="reserva-fecha_hasta">Hasta:</label>
               <div class='input-group date' id='reserva-fecha_hasta'>
                  <input type='text' name='reserva-fecha_hasta' id="hasta" class="form-control" />
                  <span class="input-group-addon">
                     <span class="glyphicon glyphicon-calendar"></span>
                  </span>
               </div>
            </div>

         </div>

         </div>

         <div class="row">

            <div class="col-md-6 col-xs-12">

               <div class="form-group">
                  <label for="form-control">lugar de Entrega</label>
                  <select class="form-control" name="locacion_entrega" id="entrega">
                     <option value="">Seleccione una opcion...</option>
                     <?php foreach ($locaciones_entrega as $locacion_entrega ):?>
                        <option value="<?php echo $locacion_entrega->id_locacion;?>"><?php echo $locacion_entrega->locacion;?></option>
                     <?php endforeach; ?>
                  </select>
               </div>

            </div>

         <div class="col-md-6 col-xs-12">

            <div class="form-group">
               <label for="form-control">Lugar de devolucion</label>
                  <select class="form-control" name="locacion_devolucion" id="devolucion">
                     <option value="">Seleccione una opcion...</option>
                     <?php foreach ($locaciones_devolucion as $locacion_devolucion ):?>
                        <option value="<?php echo $locacion_devolucion->id_locacion;?>"><?php echo $locacion_devolucion->locacion;?></option>
                     <?php endforeach; ?>
               </select>
            </div>

         </div>

         </div>

         <input id="buscarReserva" type="submit" onclick="buscarDisponibles()" name="" value="Buscar" class="btn btn-success pull-right" >

         <?php /* </form> */ ?>

      </div>

   </div>

</div>

<script>
      function buscarDisponibles()
      {
            var desde = document.getElementById("desde").value;
            desde = desde.split(" ");
            var desdeFecha = desde[0];
            var desdeHora = desde[1];
            var hasta = document.getElementById("hasta").value;
            hasta = hasta.split(" ");
            var hastaFecha = hasta[0];
            var hastaHora = hasta[1];
            var entrega = document.getElementById("entrega").value;
            var devolucion = document.getElementById("devolucion").value;

            window.location = "/koyer/reserva/verificar?desdeFecha="+desdeFecha+"&desdeHora="+desdeHora+"&hastaFecha="+hastaFecha+"&hastaHora="+hastaHora+"&entrega="+entrega+"&devolucion="+devolucion;
      }
</script>
