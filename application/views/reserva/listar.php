<div class="container">

   <div class="row">
      <h1>Reservas</h1>

   </div>
   <div class="row">
      <div class="col-md-6">
         <label>Fecha de hoy: </label>
         <h2><?php echo $fecha->format('l jS \of F Y h:i A'); ?> </h2>
      </div>

      <div class="col-md-6">
         <label>reservas de </label>
            <form action="<?= site_url( 'reserva/buscar_reserva' ); ?>" method="post">
               <div class="form-group">
                   <div class='input-group date' id='buqueda_fecha'>
                       <input type='text' name="busqueda_fecha" class="form-control" />
                       <span class="input-group-addon">
                           <span class="glyphicon glyphicon-calendar">
                           </span>
                       </span>
                   </div>
               </div>

               <input type="submit" name="buscar_fecha" value="Buscar Mes/Año" class="btn btn-primary pull-right">

            </form>

      </div>

   </div>
   <div class="row">
      <?= $calendar?>
   </div>

</div>
