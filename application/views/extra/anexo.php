<div class="container">
    
    <div class="row">
        <div class="col-md-12">        
        <h2>Contrato Anexo para adicionales</h2>
        </div>
    </div>
    <hr>
    
    <div class="row">
    
        <div class="col-md-12">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Código Interno</th>
                        <th>Código del cliente</th>
                    </tr>
                </thead>
                
                <tbody>
                    <tr>
                        <td><?php echo $reserva->codigo_interno?></td>
                        <td><?php echo $reserva->codigo_reserva?></td>
                    </tr>
                </tbody>
                <thead>
                    <tr>
                        <th>Fecha y hora de entrega</th>
                        <th>Fecha y hora de devolución</th>
                    </tr>
                </thead>
                
                <tbody>
                    <tr>
                        <td><?php echo $reserva->fecha_entrega?></td>
                        <td><?php echo $reserva->fecha_devolucion?></td>
                    </tr>
                </tbody>

            </table>

            <!--Vechiulo-->

            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Patente</th>
                        <th>Marca</th>
                        <th>Modelo</th>
                    </tr>
                </thead>
                
                <tbody>
                    <tr>
                        <td><?php echo $vehiculo->patente?></td>
                        <td><?php echo $vehiculo->marca?></td>
                        <td><?php echo $vehiculo->modelo?></td>
                    </tr>
                </tbody>
               
            </table>
            
        </div>

    </div>
    <hr>

    <div class="row">
        <div class="col-md-12">
            <h4>Definir Extras al contrato anexo</h4>
        </div>  
    </div>

    <div class="row">

        <div class="col-md-7">
            <?php $sumaExtra=0;?>
            <?php if (! $extras_reservas ) : ?>
                <h5>Esta reserva no contiene adicionales</h5>
            <?php else : ?>
               <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>Extra</th>
                            <th>Cantidad</th>
                            <th>Precio</th>
                            <th>Total</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php foreach ($extras_reservas as $extraReserva) :?>
                            <tr>
                                <td><?php echo $extraReserva->extra?></td>
                                <td><?php echo $extraReserva->cantidad?></td>
                                <td><?php echo $extraReserva->precio?></td>
                                <td>
                                    <?php if ($extraReserva->por_dia == 1) {
                                        $total = $extraReserva->cantidad *  $extraReserva->precio * $dias;
                                        $sumaExtra = $sumaExtra+$total;
                                        echo $total;
                                    } else {
                                        $total = $extraReserva->cantidad *  $extraReserva->precio;
                                        $sumaExtra = $sumaExtra+$total;
                                        echo $total;
                                    }?>
                                </td>

                            </tr>
                        <?php endforeach;?>
                        
                    </tbody>
               </table> 
            <?php endif; ?>

        </div>

        <div class="col-md-5">
            
            <form action="<?php echo site_url('extra/agregar_extra/'.$reserva->id_reserva)?>" method="post">
            
                <div class="col-md-8">
                    <div class="form-group">
                        <label>Extra</label>
                        <select name="id_extra" class="form-control">
                            <?php foreach ($extras as $extra):?>
                                <option value="<?php echo $extra->id_extra?>"><?php echo $extra->extra?></option>
                            <?php endforeach;?>
                        </select>
                    </div>
                </div>
                
                <div class="col-md-4">
                
                    <div class="form-group">
                        <label>cantidad</label>
                        <select name="cantidad" class="form-control">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                        </select>
                    </div>
                
                </div>
                
                <div class="col-md-12">
                    <input type="submit" value="Agregar" class="btn btn-success btn-block">
                </div>
            </form>
            
            
        </div>

    </div>

    <div class="row">
    
        <div class="col-md-4 col-offset-md-4">
            <a href="<?php echo site_url('extra/imprimir_pdf/'. $reserva->id_reserva. '/' . $sumaExtra);?>" class="btn btn-primary btn-block">Imprimir contrato</a>
            <?php $this->session->total = $sumaExtra;?>
        </div>

    </div>

    <div class="row">
    </div>

</div>