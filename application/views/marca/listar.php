<div class="container">
   <div class="">

      <table>
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
                     <a href="<?= site_url( 'marca/editar/'.$marca->id_marca ); ?>" >Editar</a>
                     <a href="<?= site_url( 'marca/borrar/'.$marca->id_marca ); ?>" >Eliminar</a>
                  </td>
               </tr>
            <? endforeach; ?>
         </tbody>
      </table>
   </div>

</div>
