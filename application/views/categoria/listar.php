<div class="container">
   <div class="">

      <table>
         <thead>
            <th>ID</th>
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
                     <a href="<?= site_url( 'categoria/editar/'.$categoria->id_categoria ); ?>" >Editar</a>
                     <a href="<?= site_url( 'categoria/borrar/'.$categoria->id_categoria ); ?>" >Eliminar</a>
                  </td>
               </tr>
            <? endforeach; ?>
         </tbody>
      </table>
   </div>

</div>
