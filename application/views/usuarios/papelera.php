<div class="col-xs-6">
         <h1>Marcas <small>Papelera</small></h1>
         <table class="table table-striped">

            <thead>
               <th>ID</th>
               <th>Marca</th>
               <th>Acciones</th>

            </thead>
            <tbody>
               <?php
                  foreach ($marcas as $marca):
               ?>
                  <tr>
                     <td><?php echo $marca->id_marca;?></td>
                     <td><?php echo $marca->marca;?></td>
                     <td>
                        <a href="<?php echo  site_url( 'marca/activar/'.$marca->id_marca ); ?>" class="btn btn-warning">Recuperar</a>
                     </td>
                  </tr>
               <? endforeach; ?>
            </tbody>

         </table>

      </div>
