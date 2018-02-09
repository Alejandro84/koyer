<div class="container">
   <div class="row">
      <h1>Precios</h1>
   </div>
   <div class="row">

      <div class="col-md-6">

         <table class="table table-striped">
            <thead>
               <th>ID</th>
               <th>Modelo</th>
               <th>Precio</th>
               <th>Acciones</th>

            </thead>
            <tbody>
               <?php
                  foreach ($modelos as $modelo):
               ?>
                  <tr>
                     <td><?php echo $modelo->id_modelo;?></td>
                     <td><?php echo $modelo->modelo;?></td>
                     <td>$ <?php echo  number_format($modelo->precio, '0', ',','.');?></td>
                     <td>
                        <a href="<?php echo  site_url( 'tarifa/editar/'.$modelo->id_modelo ); ?>" class="btn btn-primary btn-sm" >Editar</a>
                     </td>
                  </tr>
               <? endforeach; ?>
            </tbody>
         </table>

      </div>

   </div>
</div>
