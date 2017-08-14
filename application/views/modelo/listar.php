<div class="container">
   <div class="row">
      <h1>Modelos</h1>
   </div>
   <div class="row">

      <div class="col-md-6">

         <table class="table table-striped">
            <thead>
               <th>ID</th>
               <th>Modelo</th>
               <th>Marca</th>
               <th>Acciones</th>

            </thead>
            <tbody>
               <?php
                  foreach ($modelos as $modelo):
               ?>
                  <tr>
                     <td><?=$modelo->id_modelo;?></td>
                     <td><?=$modelo->modelo;?></td>
                     <td><?=$modelo->marca;?></td>
                     <td>
                        <a href="<?= site_url( 'modelo/editar/'.$modelo->id_modelo ); ?>" class="btn btn-primary btn-sm" >Editar</a>
                        <a href="<?= site_url( 'modelo/borrar/'.$modelo->id_modelo ); ?>" class="btn btn-danger btn-sm">Eliminar</a>
                     </td>
                  </tr>
               <? endforeach; ?>
            </tbody>
         </table>

      </div>
      <div class="col-md-6">
         <div class="row">
            <? $this->load->view('marca/nuevo');?>
         </div>
         <div class="row">
            <? $this->load->view('modelo/nuevo');?>
         </div>
         <div class="row col-md-6 papelera">
            <a class="btn btn-warning btn-lg btn-block" href="<?= site_url('modelo/papelera');?>" role="button">Papelera</a>
         </div>

      </div>
   </div>
</div>
