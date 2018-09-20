<div class="container">

    <div class="row">

        <form action="<?php echo  site_url( 'reserva/agregar_kilometraje' ); ?>" method="post">

        <div class="col-md-4 col-md-offset-2 login">

            <h2>Kilomatraje final</h2>

            <h5>Ingrese el kilometraje final al momento de la devolucion del vehiculo</h5>

            
                <div class="form-group">
                    <input type="text" name="kilometraje" class="form-control" placeholder="Ej.: 142000">
                </div>
                
        </div>
        <div class="col-md-4">
            <h3>Sobrecargo por demora</h3>
            <? $this->load->view('template/alert'); ?>
                        
            <?php if ($reservas->total == $total_recargo):?>
                <p>Todo esta OK</p>                
            
            <?php else:?>
                <div class="form-group form-check">
                    <input type="checkbox" class="form-check-input" name="aplicar_recargo" value="1">
                    <label class="form-check-label" for="exampleCheck1">¿Desea aplicar recargo por demora?</label>
                </div>
            <?php endif;?>

            
        </div>
        
        <input type="text" name="total" hidden="" value="<?php echo $total_recargo;?>">
        <input type="text" name="id_reserva" hidden="" value="<?php echo $reservas->id_reserva; ?>">
        <input type="text" name="id_vehiculo" hidden="" value="<?php echo $reservas->id_vehiculo; ?>">
        <input type="submit" value="Guardar" class="btn btn-success btn-block">

        </form>

    </div>

</div>
