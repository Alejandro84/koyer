<div class="container-fluid" style="margin:60px">

  <div class="fila cabecera">

      <div class="vehiculo">Vehiculo</div>
      <?php for ($dia=1; $dia < $dias+1; $dia++) {
          echo '<div class="celda">'.$dia.'</div>';
      } ?>

  </div>

    <?php foreach ($vehiculos as $vehiculo): ?>
        <div class="fila">
            <div class="celda inicial"><?php echo $vehiculo['vehiculo']->patente; ?></div>
            <div class="periodo" x-data-percent='14.3'></div>
            <div class="periodo otro" x-data-percent='9'></div>
            <div class="periodo" x-data-percent='30'></div>
            <div class="periodo" x-data-percent='10'></div>
            <div class="periodo no-disponible" x-data-percent='16.7'></div>
        </div>
    <?php endforeach; ?>

  <div class="fila">
    <div class="celda inicial">Tesla</div>
    <div class="periodo" x-data-percent='24.3'></div>
    <div class="periodo no-disponible" x-data-percent='19'></div>
    <div class="periodo" x-data-percent='3'></div>
    <div class="periodo" x-data-percent='10'></div>
    <div class="periodo otro" x-data-percent='16.7'></div>
  </div>

</div>

<button id="load">Cargar datos</button>
