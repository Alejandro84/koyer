<div class="container">

   <div class="row">
      <h1>Impuestos</h1>
      <hr>
   </div>

   <div class="row">

      <div class="col-md-6">

         <table class="table table-striped">

            <thead>
               <th>ID</th>
               <th>Impuesto</th>
               <th>valor</th>
               <th>Acciones</th>

            </thead>
            <tbody>
               <?php
                  foreach ($impuestos as $impuesto):
               ?>
                  <tr>
                     <td><?php echo $impuesto->id_impuesto;?></td>
                     <td><?php echo $impuesto->impuesto;?></td>
                     <td><?php echo $impuesto->valor;?> %</td>
                     <td>
                        <a href="<?php echo  site_url( 'impuesto/editar/'.$impuesto->id_impuesto ); ?>" class="btn btn-primary">Editar</a>
                        <a href="<?php echo  site_url( 'impuesto/borrar/'.$impuesto->id_impuesto ); ?>" class="btn btn-danger">Eliminar</a>
                     </td>
                  </tr>
               <? endforeach; ?>
            </tbody>

         </table>

      </div>

      <div class="col-md-6">
         <? $this->load->view('impuesto/nuevo');?>
      </div>

   </div>

</div>
