<div class="container">

   <div class="row">

      <div class="col-xs-6">

         <table class="table table-striped">

            <thead>

               <th>Nº</th>
               <th>categoria</th>
               <th>Acciones</th>

            </thead>

            <tbody>

               <?php
                  foreach ($categorias as $categoria):
               ?>
                  <tr>
                     <td><?=$categoria->id_categoria;?></td>
                     <td><?=$categoria->categoria;?></td>
                     <td>

                        <a href="<?= site_url( 'categoria/editar/'.$categoria->id_categoria ); ?>" class="btn btn-primary" >Editar</a>
                        <a href="<?= site_url( 'categoria/borrar/'.$categoria->id_categoria ); ?>" class="btn btn-danger">Eliminar</a>
                     </td>
                  </tr>
               <? endforeach; ?>
            </tbody>

         </table>

      </div>

   </div>

</div>
