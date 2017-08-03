<div class="container">
   <div class="">

      <table>
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
                     <a href="<?= site_url( 'transmision/editar/'.$transmision->id_transmision ); ?>" >Editar</a>
                     <a href="<?= site_url( 'transmision/borrar/'.$transmision->id_transmision ); ?>" >Eliminar</a>
                  </td>
               </tr>
            <? endforeach; ?>
         </tbody>
      </table>
   </div>

</div>
