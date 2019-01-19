<?php 
    $fecha_entrega_o       = DateTime::createFromFormat( 'Y-m-d H:i:s' , $reserva->fecha_entrega ); // los parametros son, el formato de la fecha que estas metiendo y la fecha
    $fecha_devolucion_o    = DateTime::createFromFormat( 'Y-m-d H:i:s' , $reserva->fecha_devolucion );
    $fecha_entrega       = $fecha_entrega_o->getTimestamp();
    $fecha_devolucion    = $fecha_devolucion_o->getTimestamp();
    $delta_tiempo = $fecha_devolucion - $fecha_entrega;
    $dias_arriendo = $delta_tiempo / 60 ; // minutos
    $dias_arriendo = $dias_arriendo / 60 ; // horas
    $dias_arriendo = $dias_arriendo / 24 ; // dias
    $dias_arriendo = number_format($dias_arriendo, '2', ',', '.');
?>

<div class="col-md-12">
    <h2>DATOS ARRIENDO VEHICULO / RENTAL INFORMATION</h2>
</div>

<div class="col-md-12">

    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>Lugar Entrega vehículo / Pick-up Location</th>
                <th>Lugar Devolución Vehículo/ Return Location</th>
            </tr>
            
        </thead>
        <tbody>
            <tr>
                <td><?php echo $locacion_entrega->locacion; ?></td>
                <td><?php echo $locacion_devolucion->locacion; ?></td>
            </tr>
        </tbody>

        <thead>
            <tr>
                <th>Fecha Entrega Vehículo / Pick-up Date</th>
                <th>Fecha Devolución vehículo / Return Date</th>
            </tr>
            
        </thead>

        <tbody>
            <tr>
                <td><?php echo $fecha_entrega_o->format('Y-m-d'); ?></td>
                <td><?php echo $fecha_devolucion_o->format('Y-m-d'); ?></td>
            </tr>
        </tbody>

        <thead>
            <tr>
            <th>Hora Entrega Vehículo / Pick-up Hour</th>
            <th>Hora Devolución / Return Hour</th>
            </tr>
            
        </thead>

        <tbody>
            <tr>
                <td><?php echo $fecha_entrega_o->format('H:i'); ?></td>
                <td><?php echo $fecha_devolucion_o->format('H:i'); ?></td>
            </tr>
        </tbody>


    </table>

</div> 

        