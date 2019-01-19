<div class="container">

    <div class="row">

        <div class="col-md-12">

            <h2>Nuevo</h2>

            <form action="<?php echo base_url('locacion/actualizar');?>" method="post" >
            
            <div class="col-md-12">
                <div class="form-group">
                    <label>Nombre de locacion</label>
                    <input type="text" name="locacion" value="<?php echo $locacion->locacion?>"class="form-control" >
                </div>
            </div>

            <div class="col-md-12">
                <div class="form-group">
                    <label>Recargo</label>
                    <input type="text" name="recargo" value="<?php echo $locacion->recargo?>" class="form-control">
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="1" id="entrega" name="entrega">
                    <label class="form-check-label" for="entrega">Habilitado para entrega</label>
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="1" id="devolucion" name="devolucion">
                    <label class="form-check-label" for="devolucion">Habilitado para devolución</label>
                </div>
            </div>

            
            <div class="col-md-12">
                <input type="text" name="id_locacion" value="<?php echo $locacion->id_locacion;?>" hidden="true">    
                <input type="submit" name="" value="Guardar" class="btn btn-success btn-block">
            </div>
               



            </form>

        </div>

    </div>

</div>
