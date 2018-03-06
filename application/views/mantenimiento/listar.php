<div class="container">

   <div class="row">

      <div class="col-md-6">
         <?php $this->load->view('mantenimiento/nuevo');?>
      </div>

      <div class="col-md-6">
         <h3>Ultimos mantenimiento</h3>

         <table class="table table-striped">

            <thead>
               <th>ID</th>
               <th>Mantenimiento</th>
               <th>Costo</th>
               <th>Impuesto</th>
               <th>Patente</th>
               <th>Modelo</th>

            </thead>
            <tbody>
               <?php
                  foreach ($mantenimientos as $mantenimiento):
               ?>
                  <tr>
                     <td><?php echo $mantenimiento->id_mantenimiento;?></td>
                     <td><?php echo $mantenimiento->mantenimiento;?></td>
                     <td>$<?php echo  number_format($mantenimiento->costo / $iva, '0', ',' ,'.');?></td>
                     <td>$<?php echo number_format($mantenimiento->costo - ($mantenimiento->costo / $iva), '0', ',','.');?></td>
                     <td><?php echo $mantenimiento->patente;?></td>
                     <td><?php echo $mantenimiento->modelo;?></td>
                     <td>
                        <a class="btn btn-primary" href="<?php echo  site_url( 'mantenimiento/editar/'.$mantenimiento->id_mantenimiento ); ?>" >Editar</a>
                     </td>
                  </tr>
               <? endforeach; ?>
            </tbody>

         </table>

      </div>


   </div>

</div>
