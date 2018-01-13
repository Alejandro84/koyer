<div class="container">

   <div class="row">
      <h1>extras <small>Editar</small></h1>
   </div>

   <div class="row">
      <? $this->load->view('template/alert'); ?>

      <form action="<?=site_url('extra/actualizar');?>" method="post" class="col-xs-4">

         <div class="form-group">
            <label for="extra">Extra:</label>
            <input type="text" name="extra" class="form-control" value="<?= $extra->extra;?>">
         </div>
         <div class="form-group">
            <label for="extra">Precio:</label>
            <input type="text" name="precio" class="form-control" value="<?= $extra->precio;?>">
         </div>

         <div class="checkbox">
             <label for=""> <input type="checkbox" name="por_dia" value="1"> Pago por dia</label>
         </div>

            <input type="text" name="id_extra" value="<?= $extra->id_extra;?>" hidden="true">

            <input type="submit" name="" value="Guardar" class="btn btn-success">

      </form>

   </div>

</div>
