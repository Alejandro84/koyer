    <div class="container">
    <div class="row">
        <h1>Reporte</h1>
    </div>

    <div class="row">
        <div class="col-md-12">
            
            <?php if (! $reservas):?>
                
                <h5>No se registran reservas</h5>
            
            <?php else :?>
                
                <table class="table table-stripped table-bordered">
                    <thead>
                        <tr>
                            <th>Codigo de reserva</th>
                            <th>Patente</th>
                            <th>Marca</th>
                            <th>Modelo</th>
                            <th>Subtotal</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <?php foreach ($reservas as $reserva): ?>
                        <tr>
                            <td><?php echo $reserva->codigo_reserva ?></td>
                            <td><?php echo $reserva->patente ?></td>
                            <td><?php echo $reserva->marca ?></td>
                            <td><?php echo $reserva->modelo ?></td>
                            <td><?php echo $reserva->sub_total ?></td>
                            <td><?php echo $reserva->total ?></td>
                        </tr>
                    <?php endforeach; ?>
                </table>

            <?php endif; ?>

        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            
            <?php if (! $mantenimientos):?>
                
                <h5>No se registran mantenimiento</h5>
            
            <?php else :?>

                <table class="table table-stripped table-bordered">
                    <thead>
                        <tr>
                            <th>Mantenimiento</th>
                            <th>Patente</th>
                            <th>Marca</th>
                            <th>Modelo</th>
                            <th>Costo</th>
                        </tr>
                    </thead>
                    <?php foreach ($mantenimientos as $manteni): ?>
                        <tr>
                            <td><?php echo $manteni->mantenimiento?></td>
                            <td><?php echo $manteni->patente ?></td>
                            <td><?php echo $reserva->marca ?></td>
                            <td><?php echo $reserva->modelo ?></td>
                            <td><?php echo $manteni->costo ?></td>
                        </tr>
                    <?php endforeach; ?>
                </table>
            
            <?php endif; ?>
            
            
        </div>
    </div>

    <div class="row">
        <div class="col-md-6 col-md-offset-6">
                <table class="table table-striped table-bordered">
                    <tr>
                        <td><div class="pull-right">
                            Total de ingresos: <b>$<?php echo number_format($ingreso_total, '0', ',', '.')  ?></b>
                        </div></td>
                    </tr>

                    <tr>
                        <td><div class="pull-right">
                            Total de gastos: <b>$<?php echo number_format($costo, '0', ',', '.') ?></b>
                        </div></td>
                    </tr>

                    <tr>
                        <td><div class="pull-right">
                            Total final: <b>$<?php echo number_format($totalReporte, '0', ',' ,'.')?></b>
                        </div></td>
                    </tr>
                </table>
        </div>
    
    </div>

    </div>
