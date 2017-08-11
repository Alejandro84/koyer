<div class="container">

   <div class="row">

      <div class="col-xs-6">

         <table class="table table-striped">

            <thead>
               <th>ID</th>
               <th>Mantenimiento</th>
               <th>Costo</th>
               <th>Vehiculo</th>

            </thead>
            <tbody>
               <?php
                  foreach ($mantenimientos as $mantenimiento):
               ?>
                  <tr>
                     <td><?=$mantenimiento->id_mantenimiento;?></td>
                     <td><?=$mantenimiento->mantenimiento;?></td>
                     <td><?=$mantenimiento->costo;?></td>
                     <td><?=$mantenimiento->patente;?></td>
                     <td>
                        <a class="btn btn-primary" href="<?= site_url( 'mantenimiento/editar/'.$mantenimiento->id_mantenimiento ); ?>" >Editar</a>
                     </td>
                  </tr>
               <? endforeach; ?>
            </tbody>

         </table>

      </div>

   </div>

</div>
