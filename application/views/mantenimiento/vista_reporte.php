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
               <th>Comentario</th>
               <th>Fecha de mantenimiento</th>

            </thead>
            <tbody>
               <?php
                  foreach ($mantenimientos as $mantenimiento):
               ?>
                  <tr>
                     <td><?=$mantenimiento->mantenimiento;?></td>
                     <td>$<?= number_format($mantenimiento->costo, '0', ',' ,'.');?></td>
                     <td><?=$mantenimiento->patente;?></td>
                     <td><?=$mantenimiento->modelo;?></td>
                     <td><?=$mantenimiento->comentario;?></td>
                     <td><?=$mantenimiento->fecha_mantencion;?></td>

                  </tr>
               <? endforeach; ?>
            </tbody>

         </table>
         total <?=$total;?>
      </div>

      <form action="<?= site_url( 'mantenimiento/imprimir_pdf'); ?>" method="post">
         <input type="submit" name="" class="btn btn-success" value="Imprimir">
      </form>
   </div>

</div>
