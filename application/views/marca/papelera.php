<div class="container">

   <div class="row">
      <h1>Marcas <small>Papelera</small></h1>
   </div>
   <div class="row">

      <div class="col-xs-6">

         <table class="table table-striped">

            <thead>
               <th>ID</th>
               <th>Marca</th>
               <th>Acciones</th>

            </thead>
            <tbody>
               <?php
                  foreach ($marcas as $marca):
               ?>
                  <tr>
                     <td><?=$marca->id_marca;?></td>
                     <td><?=$marca->marca;?></td>
                     <td>
                        <a href="<?= site_url( 'marca/activar/'.$marca->id_marca ); ?>" class="btn btn-warning">Recuperar</a>
                     </td>
                  </tr>
               <? endforeach; ?>
            </tbody>

         </table>

      </div>

   </div>

</div>
