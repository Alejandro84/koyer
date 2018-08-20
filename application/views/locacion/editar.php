<div class="container">

    <div class="row">

        <div class="col-md-12">

            <h2>Nuevo</h2>

            <form action="<?php echo site_url('locacion/actualizar');?>" method="post" >
               <div class="form-group">
                  <label for="marca">Nombre de locacion</label>
                  <input type="text" name="locacion" value="<?php echo $locacion->locacion?>" class="form-control" placeholder="Ej: Santiago">
               </div>

               <div class="form-group">
                  <label for="marca">Recargo de entrega</label>
                  <input type="text" name="recargo_entrega" value="<?php echo $locacion->recargo_entrega?>" class="form-control" placeholder="Ej: 50000">
               </div>
               <div class="form-group">
                  <label for="marca">Recargo de devolución</label>
                  <input type="text" name="recargo_devolucion" value="<?php echo $locacion->recargo_devolucion?>" class="form-control" placeholder="Ej: 50000">
               </div>
               <div class="row">
                   <div class="col-md-4">
                       <div class="form-group">

                           <label>Habilitado para entrega</label>
                           <input type="checkbox" name="entrega" value="1">
                       </div>
                   </div>
                   <div class="col-md-4">
                       <div class="form-group">
                           <label for="">Habilitado para devolución</label>
                           <input type="checkbox" name="devolucion" value="1">
                       </div>
                   </div>
               </div>

               <input type="text" name="id_locacion" value="<?php echo $locacion->id_locacion;?>" hidden="true">

               <input type="submit" name="" value="Guardar" class="btn btn-success">

            </form>

        </div>

    </div>

</div>
