<div class="container">

   <div class="row">

      <h1>Extras</h1>

      <? $this->load->view('template/alert'); ?>

      <div class="col-md-8">

         <table class="table table-striped">

            <thead>
               <th>ID</th>
               <th>Nombre</th>
               <th>Precio</th>
               <th>Unidades</th>
               <th>Acciones</th>

            </thead>
            <tbody>
               <?php
                  foreach ($extras as $extra):
               ?>
                  <tr>
                     <td><?=$extra->id_extra;?></td>
                     <td><?=$extra->extra;?></td>
                     <td><?=$extra->precio;?></td>
                     <td><?=$extra->stock;?></td>
                     <td>
                        <a href="<?= site_url( 'extra/editar/'.$extra->id_extra ); ?>" class="btn btn-primary">Editar</a>
                        <a href="<?= site_url( 'extra/borrar/'.$extra->id_extra ); ?>" class="btn btn-danger">Eliminar</a>
                     </td>
                  </tr>
               <? endforeach; ?>
            </tbody>

         </table>

      </div>

      <div class="col-md-4">
         <h2>Nuevo</h2>
         <? $this->load->view('extra/nuevo')?>
         <br>
         <a href="<?= site_url('extra/papelera');?>" class="btn btn-warning btn-block">Papelera</a>
      </div>

   </div>

</div>
