<div class="container">

   <div class="row">

      <div class="col-md-6">

         <h1>Extras <small>Papelera</small></h1>

         <? $this->load->view('template/alert'); ?>

         <table class="table table-striped">

            <thead>
               <th>ID</th>
               <th>Extra</th>
               <th>Precio</th>
               <th>Unidades</th>
               <th>Acciones</th>

            </thead>
            <tbody>
               <?php
                  foreach ($extras as $extra):
               ?>
                  <tr>
                     <td><?php echo $extra->id_extra;?></td>
                     <td><?php echo $extra->extra;?></td>
                     <td><?php echo $extra->extra;?></td>
                     <td><?php echo $extra->stock;?></td>
                     <td>
                        <a href="<?php echo  site_url( 'extra/activar/'.$extra->id_extra ); ?>" class="btn btn-warning">Recuperar</a>
                     </td>
                  </tr>
               <? endforeach; ?>
            </tbody>

         </table>

      </div>

   </div>
</div>
