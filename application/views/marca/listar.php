<div class="container">
   <div class="row">
      <div class="col-xs-4">
         <h1>Marcas</h1>   
      </div>

   </div>
   <div class="row">

      <div class="col-xs-4">

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
                        <a href="<?= site_url( 'marca/editar/'.$marca->id_marca ); ?>" class="btn btn-primary">Editar</a>
                        <a href="<?= site_url( 'marca/borrar/'.$marca->id_marca ); ?>" class="btn btn-danger">Eliminar</a>
                     </td>
                  </tr>
               <? endforeach; ?>
            </tbody>

         </table>

      </div>

   </div>

</div>
