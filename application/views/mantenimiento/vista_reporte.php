<div class="container">

   <div class="row">

      <div class="col-md-12">
         <h3>Mantenimientos</h3>

         <table class="table table-striped">

            <thead>
               <th>Mantenimiento</th>
               <th>Costo</th>
               <th>Patente</th>
               <th>Modelo</th>
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
                     <td><?php echo $mantenimiento->fecha_mantencion;?></td>

                  </tr>
               <? endforeach; ?>
            </tbody>

         </table>
         total <?php echo $total;?>
      </div>

      <form action="<?php echo  site_url( ''.$url.''); ?>" method="post">
         <input type="submit" name="" class="btn btn-success" value="Imprimir">
      </form>
   </div>

</div>
