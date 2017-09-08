<div class="container">

   <div class="row">
      <h1>Usuarios</h1>
   </div>

   <div class="row">

      <div class="col-xs-4">

         <table class="table table-striped">

            <thead>
               <th>ID</th>
               <th>usuario</th>
               <th>Acciones</th>

            </thead>
            <tbody>
               <?php
                  foreach ($usuarios as $usuario):
               ?>
                  <tr>
                     <td><?=$usuario->id_usuario;?></td>
                     <td><?=$usuario->usuario;?></td>
                     <td>
                        <a href="<?= site_url( 'usuario/editar/'.$usuario->id_usuario ); ?>" class="btn btn-primary">Editar</a>
                        <a href="<?= site_url( 'usuario/borrar/'.$usuario->id_usuario ); ?>" class="btn btn-danger">Eliminar</a>
                     </td>
                  </tr>
               <? endforeach; ?>
            </tbody>

         </table>

      </div>

   </div>

</div>
