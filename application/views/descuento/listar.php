<div class="container">

   <div class="row">
      <? $this->load->view('template/alert'); ?>
   </div>
   <div class="row">
      <div class="col-md-6 col-xs-6">
         <h1>Descuentos</h1>
      </div>
      <div class="col-md-6 col-xs-6">
         <h2>Nuevo</h2>
      </div>

   </div>

   <div class="row">

      <div class="col-md-6 col-xs-6">

         <table class="table table-striped">

            <thead>
               <th>ID</th>
               <th>Descuento</th>
               <th>Valor (%)</th>
               <th>Acciones</th>

            </thead>
            <tbody>
               <?php
                  foreach ($descuentos as $descuento):
               ?>
                  <tr>
                     <td><?php echo $descuento->id_descuento;?></td>
                     <td><?php echo $descuento->descuento;?></td>
                     <td><?php echo $descuento->valor;?> %</td>
                     <td>
                        <a href="<?php echo  site_url( 'descuento/editar/'.$descuento->id_descuento ); ?>" class="btn btn-primary">Editar</a>
                        <a href="<?php echo  site_url( 'descuento/borrar/'.$descuento->id_descuento ); ?>" class="btn btn-danger">Eliminar</a>
                     </td>
                  </tr>
               <? endforeach; ?>
            </tbody>

         </table>

      </div>

      <div class="col-md-6 col-xs-6">
         <? $this->load->view('descuento/nuevo');?>
      </div>

   </div>
   <hr>
   <div class="row">

       <div class="col-md-12">
            <?php $this->load->view('dolar/listar') ?>
       </div>

   </div>


</div>
