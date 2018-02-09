<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8">
      <title>Mantenimientos</title>
   </head>
   <body>
      <h3>Mantenimientos</h3>

      <table class="table table-striped">

         <thead>
            <th>Mantenimiento</th>
            <th>Costo</th>
            <th>Patente</th>
            <th>Modelo</th>
            <th>Comentario</th>
            <th>Fecha de mantenimiento</th>

         </thead>
         <tbody>
            <?php
               foreach ($mantenimientos as $mantenimiento):
            ?>
               <tr>
                  <td><?php echo $mantenimiento->mantenimiento;?></td>
                  <td>$<?php echo  number_format($mantenimiento->costo, '0', ',' ,'.');?></td>
                  <td><?php echo $mantenimiento->patente;?></td>
                  <td><?php echo $mantenimiento->modelo;?></td>
                  <td><?php echo $mantenimiento->comentario;?></td>
                  <td><?php echo $mantenimiento->fecha_mantencion;?></td>

               </tr>
            <? endforeach; ?>
         </tbody>

         <thead>
            <th>Total</th>
         </thead>
         <tbody>
            <tr>
               <td><?php echo $total;?></td>
            </tr>
         </tbody>
      </table>
   </body>
</html>
