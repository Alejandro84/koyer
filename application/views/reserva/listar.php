<div class="container-fluid" style="margin:60px">
    <!-- igual tiene que ver el orden en el que cargas el css, el main se carga primero (asi como lo tienes) y despues las weas de calendario, por lo tanto
    todo cambio que hagas en main se sobreescribe con las librerias de css que cargues despues, por eso por mas que pongas z-index en el main se pasa por la raja
    el css del calendario /-->

    <h2> <b>Reservas</b> </h2>
    
    <div class="col-md-12">
    <? $this->load->view('template/alert'); ?>
    </div>

    <div class="calendar">

    </div>
    <div class="realtime-info">

    </div>

    <div id="tooltipJano" style="">
      <div id="reserva">
      </div>
      
      <div id="nombre">
      </div>
      
      <div id="fecha_entrega">
      </div>
      
      <div id="fecha_devolucion">
      </div>
      
      <div id="entrega">
      </div>
      
      <div id="devolucion">
      </div>
      
      <div id="abono">
      </div>
      
      <div id="total">
      </div>

    </div>


    <?php $fecha_mes = DateTime::createfromformat('Y-m-d H:i:s', $fecha->format('Y-m-d H:i:s'))?>
    <input type="hidden" id="fecha" value="<?php echo $fecha_mes->format('Y-m-d')?>">

 
</div>

