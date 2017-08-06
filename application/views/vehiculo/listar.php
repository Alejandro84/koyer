<div class="container">
   <div class="">

      <table>
         <thead>
            <th>ID</th>
            <th>Patente</th>
            <th>Modelo</th>
            <th>Marca</th>
            <th>Transmision</th>
            <th>Categoria</th>
            <th>Combustible</th>
            <th>Precio</th>
            <th>Acciones</th>

         </thead>
         <tbody>
            <?php
               foreach ($vehiculos as $vehiculo):
            ?>
               <tr>
                  <td><?=$vehiculo->id_vehiculo;?></td>
                  <td><?=$vehiculo->patente;?></td>
                  <td><?=$vehiculo->modelo;?></td>
                  <td><?=$vehiculo->marca;?></td>
                  <td><?=$vehiculo->transmision;?></td>
                  <td><?=$vehiculo->categoria;?></td>
                  <td><?=$vehiculo->combustible;?></td>
                  <td><?=$vehiculo->precio;?></td>
                  <td>
                     <a href="<?= site_url( 'vehiculo/editar/'.$vehiculo->id_vehiculo ); ?>" >Editar</a>
                     <a href="<?= site_url( 'vehiculo/borrar/'.$vehiculo->id_vehiculo ); ?>" >Eliminar</a>
                  </td>
               </tr>
            <? endforeach; ?>
         </tbody>
      </table>
   </div>

</div>
