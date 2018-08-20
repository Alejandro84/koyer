<div class="container">

   <div class="row">
      <h1>Locaciones de Arriendo</h1>
      <hr>

      <? $this->load->view('template/alert'); ?>
   </div>

   <div class="row">

      <div class="col-md-6">

         <table class="table table-striped">

            <thead>
               <th>ID</th>
               <th>locacion</th>
               <th>Recargo Entrega</th>
               <th>Recargo Entrega</th>
               <th>Habilitado para entrega</th>
               <th>Habilitado para entrega</th>
               <th>Acciones</th>

            </thead>
            <tbody>
               <?php
                  foreach ($locaciones as $locacion):
               ?>
                  <tr>
                     <td><?php echo $locacion->id_locacion;?></td>
                     <td><?php echo $locacion->locacion;?></td>
                     <td>$<?php echo number_format($locacion->recargo_entrega, '0', ',','.') ;?></td>
                     <td>$<?php echo number_format($locacion->recargo_devolucion, '0', ',','.') ;?></td>
                     <td>
                        <?php if ($locacion->entrega == 1): ?>
                            <?php echo 'Sí' ?>
                        <?php else: ?>
                            <?php echo 'No' ?>
                        <?php endif; ?>
                     </td>
                     <td>
                        <?php if ($locacion->devolucion == 1): ?>
                            <?php echo 'Sí' ?>
                        <?php else: ?>
                            <?php echo 'No' ?>
                        <?php endif; ?>
                     </td>
                     <td>
                        <a href="<?php echo  site_url( 'locacion/editar/'.$locacion->id_locacion ); ?>" class="btn btn-primary btn-block" style="margin-bottom:1px">Editar</a>
                        <a href="<?php echo  site_url( 'locacion/borrar/'.$locacion->id_locacion ); ?>" class="btn btn-danger btn-block">Eliminar</a>
                     </td>
                  </tr>
               <? endforeach; ?>
            </tbody>

         </table>

      </div>

      <div class="col-md-6">
          <?php $this->load->view('locacion/nuevo'); ?>
      </div>

   </div>

</div>
