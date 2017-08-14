<div class="container">

   <div class="row">

      <div class="col-md-6">
         <? $this->load->view('mantenimiento/nuevo');?>
      </div>

      <div class="col-md-6">
         <h3>Ultimos mantenimiento</h3>

         <table class="table table-striped">

            <thead>
               <th>ID</th>
               <th>Mantenimiento</th>
               <th>Costo</th>
               <th>Patente</th>
               <th>Modelo</th>

            </thead>
            <tbody>
               <?php
                  foreach ($mantenimientos as $mantenimiento):
               ?>
                  <tr>
                     <td><?=$mantenimiento->id_mantenimiento;?></td>
                     <td><?=$mantenimiento->mantenimiento;?></td>
                     <td>$<?= number_format($mantenimiento->costo, '0', ',' ,'.');?></td>
                     <td><?=$mantenimiento->patente;?></td>
                     <td><?=$mantenimiento->modelo;?></td>
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
