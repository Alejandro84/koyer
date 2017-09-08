<div class="container">

   <div class="row">
      <h1>Reservas</h1>

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
                  <tr>

               
                     <td><?=$vehiculo->precio;?></td>
                     <td>
                        <a href="<?= site_url( 'vehiculo/editar/'.$vehiculo->id_vehiculo ); ?>" class="btn btn-primary">Editar</a>
                        <a href="<?= site_url( 'vehiculo/borrar/'.$vehiculo->id_vehiculo ); ?>" class="btn btn-danger">Eliminar</a>
                     </td>
                  </tr>

            </tbody>

         </table>

      </div>

   </div>

</div>
