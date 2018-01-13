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
               <th>Tipo de cobro</th>
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
                     <?php if ($extra->por_dia ==1): ?>
                         <td>Pago por dia</td>
                     <?php else: ?>
                         <td>Pago por reserva</td>
                    <?php endif; ?>
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
      </div>

   </div>

</div>
