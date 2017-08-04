<div class="container">
   <div class="">

      <table>
         <thead>
            <th>ID</th>
            <th>combustible</th>
            <th>Acciones</th>

         </thead>
         <tbody>
            <?php
               foreach ($combustibles as $combustible):
            ?>
               <tr>
                  <td><?=$combustible->id_combustible;?></td>
                  <td><?=$combustible->combustible;?></td>
                  <td>
                     <a href="<?= site_url( 'combustible/editar/'.$combustible->id_combustible ); ?>" >Editar</a>
                     <a href="<?= site_url( 'combustible/borrar/'.$combustible->id_combustible ); ?>" >Eliminar</a>
                  </td>
               </tr>
            <? endforeach; ?>
         </tbody>
      </table>
   </div>

</div>
