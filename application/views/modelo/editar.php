<div class="container">
   <div class="row">
      <h1>Modelos <small>Editar</small></h1>
   </div>
   <div class="row">
      <form action="<?=site_url('modelo/actualizar');?>" method="post" class="col-md-4">
         <div class="form-group">
            <label for="">Model</label>
            <input type="text" name="modelo" value="<?= $modelos->modelo;?>" class="form-control">
         </div>
         <div class="form-group">
            <label for="">Marca</label>
            <select class="form-control" name="id_marca" class="form-control">
               <? foreach ($marcas as $marca ):?>
                  <? if ( $marca->id_marca == $modelos->id_marca ) : ?>
                     <option value="<?=$marca->id_marca;?>" selected><?=$marca->marca;?></option>
                  <? else: ?>
                     <option value="<?=$marca->id_marca;?>"><?=$marca->marca;?></option>
                  <? endif; ?>
               <? endforeach;?>
            </select>
         </div>

            <input type="text" name="id_modelo" value="<?= $modelos->id_modelo;?>" hidden="true">

            <input type="submit" class="btn btn-success" name="" value="Guardar">
      </form>

   </div>
</div>
