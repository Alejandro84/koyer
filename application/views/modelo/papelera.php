<div class="container">
   <div class="row">
      <a class="btn btn-warning btn-lg" href="<?= site_url('modelo');?>" role="button">Volver</a>
   </div>
   <div class="row">

      <div class="col-md-6">
         <h1>Modelos <small>Papelera</small></h1>
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
                        <a href="<?= site_url( 'modelo/activar/'.$modelo->id_modelo ); ?>" class="btn btn-warning">Recuperar</a>
                     </td>
                  </tr>
               <? endforeach; ?>
            </tbody>
         </table>

      </div>
      <div class="col-md-6">
      </div>

   </div>

</div>
