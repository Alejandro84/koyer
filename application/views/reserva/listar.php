<div class="container-fluid" style="margin:60px">
    <link href="assets/css/jquery-ui.css" rel="stylesheet" />
    <link href="assets/css/jquery.ui.theme.css" rel="stylesheet" />

    <link href="assets/css/timelineScheduler.css" rel="stylesheet" />
    <link href="assets/css/timelineScheduler.styling.css" rel="stylesheet" />
    <link href="assets/css/calendar.css" rel="stylesheet" />

    <h2> <b>Reservas</b> </h2>
    <div class="calendar">

    </div>
    <div class="realtime-info">

    </div>
    <?php $fecha_mes = DateTime::createfromformat('Y-m-d H:i:s', $fecha->format('Y-m-d H:i:s'))?>
    <input type="hidden" id="fecha" value="<?php echo $fecha_mes->format('Y-m-d')?>">

 
</div>
