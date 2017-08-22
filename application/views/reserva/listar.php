<div class="container">

   <div class="row">
      <h1>Vehículos</h1>
      <a href="<?=site_url('vehiculo/nuevo');?>" class="btn btn-success pull-right">Agregar Móvil</a></h1>
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
               <th>Estado</th>
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
                        <? if ($vehiculo->disponible == 1) {
                           echo "<td>Disponible</td>";
                        }else {
                           echo "<td>En Arriendo</td>";
                        }?>

                     <td><?=$vehiculo->precio;?></td>
                     <td>
                        <a href="<?= site_url( 'vehiculo/editar/'.$vehiculo->id_vehiculo ); ?>" class="btn btn-primary">Editar</a>
                        <a href="<?= site_url( 'vehiculo/borrar/'.$vehiculo->id_vehiculo ); ?>" class="btn btn-danger">Eliminar</a>
                     </td>
                  </tr>
               <? endforeach; ?>
            </tbody>

         </table>

      </div>

   </div>

</div>