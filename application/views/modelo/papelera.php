<div class="container">
   <div class="row">
      <h1>Modelos <small>Papelera</small></h1>
   </div>
   <div class="row">

      <div class="col-xs-6">

         <table class="table table-striped">
            <thead>
               <th>ID</th>
               <th>Modelo</th>
               <th>Marca</th>
               <th>Acciones</th>

            </thead>
            <tbody>
               <?php
                  foreach ($modelos as $modelo):
               ?>
                  <tr>
                     <td><?=$modelo->id_modelo;?></td>
                     <td><?=$modelo->modelo;?></td>
                     <td><?=$modelo->marca;?></td>
                     <td>
                        <a href="<?= site_url( 'modelo/activar/'.$modelo->id_modelo ); ?>" class="btn btn-warning">Activar</a>
                     </td>
                  </tr>
               <? endforeach; ?>
            </tbody>
         </table>

      </div>

   </div>

</div>
