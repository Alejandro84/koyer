<div class="container">

   <div class="row">

      <div class="col-xs-6">

         <table class="table table-striped">
            <thead>
               <th>ID</th>
               <th>transmision</th>
               <th>Acciones</th>

            </thead>
            <tbody>
               <?php
                  foreach ($transmisiones as $transmision):
               ?>
                  <tr>
                     <td><?=$transmision->id_transmision;?></td>
                     <td><?=$transmision->transmision;?></td>
                     <td>
                        <a href="<?= site_url( 'transmision/editar/'.$transmision->id_transmision ); ?>" class="btn btn-primary">Editar</a>
                        <a href="<?= site_url( 'transmision/borrar/'.$transmision->id_transmision ); ?>" class="btn btn-danger">Eliminar</a>
                     </td>
                  </tr>
               <? endforeach; ?>
            </tbody>
         </table>

      </div>

   </div>

</div>
