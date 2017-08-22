<div class="container">

   <div class="row">

      <div class="col-xs-8">

         <table class="table table-striped">

            <thead>

               <th>Nº</th>
               <th>Rut</th>
               <th>nombre</th>
               <th>apellido</th>
               <th>Telefono</th>
               <th>E-mail</th>
               <th>Acciones</th>

            </thead>

            <tbody>

               <?php
                  foreach ($clientes as $cliente):
               ?>
                  <tr>
                     <td><?=$cliente->id_cliente;?></td>
                     <td><?=number_format( substr ( $cliente->rut, 0 , -1 ) , 0, "", ".") . '-' . substr ( $cliente->rut, strlen($cliente->rut) -1 , 1 );?></td>
                     <td><?=$cliente->nombre;?></td>
                     <td><?=$cliente->apellido;?></td>
                     <td><?=$cliente->telefono;?></td>
                     <td><?=$cliente->email;?></td>
                     <td>

                        <a href="<?= site_url( 'cliente/editar/'.$cliente->id_cliente ); ?>" class="btn btn-primary" >Editar</a>
                        <a href="<?= site_url( 'cliente/borrar/'.$cliente->id_cliente ); ?>" class="btn btn-danger">Eliminar</a>
                     </td>
                  </tr>
               <? endforeach; ?>
            </tbody>

         </table>

      </div>

   </div>

</div>
