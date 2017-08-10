<div class="container">

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
                        <a href="<?= site_url( 'modelo/editar/'.$modelo->id_modelo ); ?>" >Editar</a>
                        <a href="<?= site_url( 'modelo/borrar/'.$modelo->id_modelo ); ?>" >Eliminar</a>
                     </td>
                  </tr>
               <? endforeach; ?>
            </tbody>

         </table>

      </div>

   </div>

</div>
