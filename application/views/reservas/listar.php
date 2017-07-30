<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8">
      <title></title>
   </head>
   <body>
      <?php
         foreach ($reservas as $reserva) {
            //echo $reserva->pickup_timestamp . '<br>';
            $fecha = new DateTime();
            $fecha = $fecha->setTimestamp($reserva->pickup_timestamp);
            $dia = $fecha->format('d');
            $mes = $fecha->format('m');

            echo '$data = ( "'.$dia.'" => "/booking/ver/'.$reserva->booking_code.'" )<br>';
         }
       ?>
   </body>
</html>
