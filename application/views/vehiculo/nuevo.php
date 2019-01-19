<div class="container">

    <div class="row">
        <div class="col-md-12">
            <?php $this->load->view('template/alert');?>
        </div>
    </div>
    
    <div class="row">
        <div class="col-md-12">
            <h1>Vehiculo <small>Nuevo</small></h1>
        </div>
    </div>

    <form action="<?php echo site_url('vehiculo/guardar');?>" method="post">

    <div class="row">
        <div class="col-md-4"> <!--PATENTE-->
            <div class="form-group">
            <label for="patente">Patente:</label>
            <input type="text" id="patente" name="patente" value=""class="form-control" placeholder="ej: ABCD96">
            </div>
        </div><!-- COL PATENTE-->

        <div class="col-md-4"> <!--MARCA-->
            <div class="form-group">
            <label for="marca">Marca:</label>
            <select class="form-control"  name="id_marca">
                <option value="">Seleccione una opcion...</option>
                <?php foreach ($marca as $marca ):?>
                    <option value="<?php echo $marca->id_marca;?>"><?php echo $marca->marca;?></option>
                <?php endforeach; ?>
            </select>
            </div>
        </div> <!-- COL MARCA-->

        <div class="col-md-4">
            <div class="form-group">
                <label for="">Modelo</label>
                <select name="id_modelo" class="form-control">
                    <option value="">Seleccione una opcion...</option>
                    <?php foreach ($modelo as $modelo) :?>
                        <option value="<?php echo $modelo->id_modelo?>"><?php echo $modelo->modelo?></option>
                    <?php endforeach;?>
                </select>
            </div>
        </div>
        <!-- COL MODELO-->

    </div> <!--row patente marca modelo-->

    <div class="row">

        <div class="col-md-6"> <!-- categoria -->
            <div class="form-group">
            <label for="form-control">Categoria:</label>
            <select class="form-control" name="id_categoria">
                <option value="">Seleccione una opcion...</option>
                <?php foreach ($categoria as $categoria ):?>
                    <option value="<?php echo $categoria->id_categoria;?>"><?php echo $categoria->categoria;?></option>
                <?php endforeach; ?>
            </select>
            </div>
        </div><!-- COL categoria-->

        <div class="col-md-6">
        <div class="form-group">
            <label for="">Tarifa:</label>
            <select class="form-control" name="id_tarifa">
                <option value="">Seleccione una opcion...</option>
                <?php foreach ($tarifa as $tarifa ):?>
                    <option value="<?php echo $tarifa->id_tarifa;?>"><?php echo $tarifa->precio;?></option>
                <?php endforeach; ?>
            </select>
            </div>
        </div>


    </div>

    <div class="row">

        <div class="col-md-6">

            <div class="form-group">
            <label for="">Combustible:</label>
            <select class="form-control" name="id_combustible">
                <option value="">Seleccione una opcion...</option>
                <?php foreach ($combustible as $combustible ):?>
                    <option value="<?php echo $combustible->id_combustible;?>"><?php echo $combustible->combustible;?></option>
                <?php endforeach; ?>
            </select>
            </div>
            
            <div class="form-group">
            <label for="">Transmisión:</label>
            <select class="form-control" name="id_transmision">
                <option value="">Seleccione una opcion...</option>
                <?php foreach ($transmision as $transmision ):?>
                    <option value="<?php echo $transmision->id_transmision;?>"><?php echo $transmision->transmision;?></option>
                <?php endforeach; ?>
            </select>
            </div>
            

        </div>

        <div class="col-md-6">
            <div class="form-group">
                <label>Comentario</label>
                <textarea name="comentario" rows="5" class="form-control"></textarea>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <input type="submit" name="" value="Guardar" class="btn btn-success btn-block" >
        </div>
    </div>

    </form>
    
</div>
