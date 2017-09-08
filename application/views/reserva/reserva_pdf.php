<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reserva</title>
    <style>
        body {
            color:#444;
        }
        .row {
            display: block;
            width: 100%;
            margin-bottom: 20px;
        }
        .label {
            font-weight:bold;
        }
        .col-md-4 {
            display: inline-block;
            width: 30%;
        }
        .table, th, td {
            border: 1px solid #444;
            border-collapse: collapse;
            width:100%;
        }
        .col-md-6 {
            width: 50%;
            display: inline-block;
        }

        .logo {
            text-align:right;
        }

        thead tr {
            background-color: #eee;
        }

        th, td {
            padding: 15px;
            text-align: left;
        }

    </style>
</head>
<body>
<?php  // lo primero es hacerlo objeto
$fecha_entrega       = DateTime::createFromFormat( 'Y-m-d H:i:s' , $reserva->fecha_entrega ); // los parametros son, el formato de la fecha que estas metiendo y la fecha
$fecha_devolucion    = DateTime::createFromFormat( 'Y-m-d H:i:s' , $reserva->fecha_devolucion );
$fecha_entrega       = $fecha_entrega->getTimestamp();
$fecha_devolucion    = $fecha_devolucion->getTimestamp();
$delta_tiempo = $fecha_devolucion - $fecha_entrega;
$dias_arriendo = $delta_tiempo / 60 ; // minutos
$dias_arriendo = $dias_arriendo / 60 ; // horas
$dias_arriendo = $dias_arriendo / 24 ; // dias
$dias_arriendo = number_format($dias_arriendo, '2', ',', '.');
?>
    
    
    <div class="container">
   
        <div class="row">
            <div class="col-md-6">
                <h1>Resumen</h1>
                <hr>
            </div>
        </div>


        <div class="row">
            <div class="col-md-12">
                <h2>Datos de la reserva</h2>
            </div>
        </div>



        <div class="row">
            
            <div class="col-md-4">
                <label class="label">Código de la reserva:</label><p><?php echo $reserva->codigo_reserva; ?></p>
                <label class="label">Dias de arriendo:</label><p><?php echo $dias_arriendo; ?></p>
            </div>

            <div class="col-md-4">
                <label class="label" for="">Fecha de Entrega:</label><p><?php echo $reserva->fecha_entrega; ?> </p>
                <label class="label" for="">Fecha de Devolución:</label><p><?php echo $reserva->fecha_devolucion; ?></p>
            </div>

            <div class="col-md-4">
                <label class="label" for="">Lugar de Entrega:</label><p><?php echo $locacion_entrega->locacion; ?></p>
                <label class="label" for="">Lugar de Devolucion:</label><p><?php echo $locacion_devolucion->locacion; ?></p>
            </div>

        </div> <!-- /row  datos reserva -->

        <div class="row">
            <div class="col-md-12">
                <h2>Datos del Cliente</h2>
            </div>

            <div class="col-md-12">
                <table class="table table-striped table-bordered">

                    <thead>
                        <tr>
                            <th>RUT</th>
                            <th>Nombre</th>
                            <th>Apellido</th>
                        </tr>
                    </thead>

                    <tbody>
                        <tr>
                            <td><?=$cliente->rut;?></td>
                            <td><?=$cliente->nombre;?></td>
                            <td><?=$cliente->apellido;?></td>
                        </tr>
                    </tbody>
                
                    <thead>
                        <tr>
                            <th>Dirección</th>
                            <th>Ciudad</th>
                            <th>País</th>
                        </tr>
                        
                    </thead>

                    <tbody>
                        <tr>
                            <td><?=$cliente->direccion;?></td>
                            <td><?=$cliente->ciudad;?></td>
                            <td><?=$cliente->pais;?></td>
                        </tr>
                    </tbody>
                
                    <thead>
                        <tr>
                            <th>Teléfono</th>
                            <th>E-Mail</th>
                            <th></th>
                        </tr>
                        
                    </thead>
                    
                    <tbody>
                        <tr>
                            <td><?=$cliente->telefono;?></td>
                            <td><?=$cliente->email;?></td>
                            <td></td>
                        </tr>
                    </tbody>

                </table>
            </div>

        </div> <!-- /row clientes -->


        <div class="row">

            <div class="col-md-12">
                <h2>Información del vehículo</h2>
            </div>

            <div class="col-md-12">

                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>Patente</th>
                            <th>Modelo</th>
                            <th>Marca</th>
                        </tr>
                        
                    </thead>

                    <tbody>
                        <tr>
                            <td><?=$vehiculo->patente;?></td>
                            <td><?=$vehiculo->modelo;?></td>
                            <td><?=$vehiculo->marca;?></td>
                        </tr>
                    </tbody>

                    <thead>
                        <tr>
                            <th>Transmision</th>
                            <th>Categoria</th>
                            <th>Combustible</th>
                        </tr>
                    </thead>

                    <tbody>
                        <tr>
                            <td><?=$vehiculo->transmision;?></td>
                            <td><?=$vehiculo->categoria;?></td>
                            <td><?=$vehiculo->combustible;?></td>
                        </tr>
                    </tbody>
                </table>

            </div>

        </div><!-- /row vehiculo -->


    <?php 
    $suma_extra = 0; 
    if ( ! $extras ):
    else: ?>


        <div class="row">

            <div class="col-md-12">
                <h2>Extras</h2>
            </div>

            <div class="col-md-12">

                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>Extra</th>
                            <th>Cantidad</th>
                            <th>Precio</th>
                        </tr>
                        
                    </thead>
                    
                    <tbody>
                        <?php 
                        foreach ($extras as $extra ): 
                            $total_extra = $extra->cantidad * $extra->precio;
                            $suma_extra = $suma_extra + $total_extra;
                        ?>
                        <tr>
                            <td><?= $extra->extra ?></td>
                            <td><?= $extra->cantidad ?></td>
                            <td><?= $total_extra ?></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>

            </div>
        </div><!-- /row extras -->
    <?php endif; ?>

    
        <div class="row">
            <div class="col-md-12">
                <h2>Precio</h2>
            </div>

            <div class="col-md-12">
                <table class="table table-striped table-bordered">
                    
                    <thead>
                        <tr>
                            <th>Precio por dia</th>
                            <th>Precio por extras</th>
                            <th>Sub total</th>
                            <th>Total CLP</th>
                            <th>Total USD</th>
                        </tr>
                    </thead>

                    <tbody>
                        <tr class="success">
                            <td><?php echo '$' . number_format($reserva->precio_arriendo_vehiculo , '2', ',' , '.');?></td>
                            <td><?php echo '$' . number_format($suma_extra , '2', ',' , '.');?></td>
                            <td><?php echo '$' . number_format($reserva->sub_total , '2', ',' , '.');?></td>
                            <td><?php echo '$' . number_format($reserva->total , '2', ',' , '.');?></td>
                            <td><?php $precio_en_usd = $reserva->total / 620; echo '$' . number_format($precio_en_usd , '2', ',' , '.');?></td>
                        </tr>
                    </tbody>
                </table>
            </div> 
        </div><!-- row precio -->

        <div class="row">
            <div class="col-md-"></div>
        </div>
    </div>
</body>
</html>