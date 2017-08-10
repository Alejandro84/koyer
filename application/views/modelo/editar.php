<div class="container">
   <div class="row">
      <h1>Modelos <small>editar</small></h1>
   </div>
   <div class="row">
      <form action="<?=site_url('modelo/actualizar');?>" method="post" class="col-md-4">
         <div class="form-group">
            <label for="">Model</label>
            <input type="text" name="modelo" value="<?= $modelo->modelo;?>" class="form-control">
         </div>
         <div class="form-group">
            <label for="">Marca</label>
            <select class="" name="id_marca" class="form-control">
               <? foreach ($marca as $marca ):?>
                  <? if ( $marca->id_marca == $modelo->id_marca ) : ?>
                     <option value="<?=$marca->id_marca;?>" selected><?=$marca->marca;?></option>
                  <? else: ?>
                     <option value="<?=$marca->id_marca;?>"><?=$marca->marca;?></option>
                  <? endif; ?>
               <? endforeach;?>
            </select>
         </div>

            <input type="text" name="id_modelo" value="<?= $modelo->id_modelo;?>" hidden="true">

            <input type="submit" class="btn btn-success" name="" value="Guardar">
      </form>

   </div>
</div>
