<div class="container bloque">

   <div class="row">
      <h1>Vehículos</h1><a href="<?php echo site_url('vehiculos/nuevo');?>" class="btn btn-success pull-right">Agregar Móvil</a></h1>
   </div>

   <div class="row">

      <div class="col-xs-12 col-md-12">

         <table class="table table-striped">

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
                     <td><?php echo $vehiculo->id_vehiculo;?></td>
                     <td><?php echo $vehiculo->patente;?></td>
                     <td><?php echo $vehiculo->modelo;?></td>
                     <td><?php echo $vehiculo->marca;?></td>
                     <td><?php echo $vehiculo->transmision;?></td>
                     <td><?php echo $vehiculo->categoria;?></td>
                     <td><?php echo $vehiculo->combustible;?></td>
                     <td><?php echo $vehiculo->precio;?></td>
                     <td>
                        <a href="<?php echo  site_url( 'vehiculo/activar/'.$vehiculo->id_vehiculo ); ?>" class="btn btn-warning">Recuperar</a>
                     </td>
                     </td>
                  </tr>
               <? endforeach; ?>
            </tbody>

         </table>

      </div>

   </div>

</div>
