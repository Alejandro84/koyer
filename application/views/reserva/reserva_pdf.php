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
            font-family:Helvetica,Arial,Verdana,sans-serif; 
        }
        .row {
            display: block;
            width: 100%;
            margin-bottom: 10px;
        }
        .label {
            font-weight:bold;
        }
        .col-md-4 {
            display: inline-block;
            width: 30%;
        }
        .col-md-5 {
            display: inline-block;
            width: 40%;
        }

        .col-md-3 {
            display: inline-block;
            width: 20%;
        }
        .table, th, td{
            border: 1px solid #444;
            border-collapse: collapse;
            width:100%;
            font-size:10px;
        }
        .col-md-6 {
            width: 50%;
            display: inline-block;
        }
        .col-md-6-m {
            width: 70%;
            display: inline-block;
        }
        .col-md-2 {
            width: 10%;
            display: inline-block;
        }

        .logo {
            text-align:right;
        }

        thead tr {
            background-color: #eee;
        }

        th, td {
            padding: 5px;
            text-align: left;
        }

        h2{
            font-size:12px;
        }

        h3{
            font-size:10px;
        }
        p {
            font-size:12px;
        }
        .table_2 {
            border-collapse: collapse;
        }

        .table_2 tr td{
            border: 0px solid black;
            margin:0px;
            padding:0px;
        }
        



    </style>
</head>
<body>
<?php  // lo primero es hacerlo objeto
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


    <div class="container">

        <div class="row">
            <div class="col-md-2">
                
            </div>
            <div class="col-md-6-m" align="center">
                <h4 style="font-size:12px">CONTRATO DE ARRIENDO/RENTAL AGREEMENT</h4>
                <p style="font-size:10px">
                    Punta Arenas: José Menéndez 1024 - Teléfono: 56 (61) 2243357  <br>
                    Puerto Natales: Manuel Baquedano 558 - Teléfono: +56944667705 <br>
                    Celular 24 horas: +56987319616 - reservas@koyer.cl - www.arriendoskoyer.cl 
                </p>
            </div>
            <div class="col-md-2" align="right">
                <h2>Nº <span class="cuadro"><?php echo $reserva->codigo_interno?></span></h2>
            </div>
            <hr>
        </div>


        
        <div class="row">
            <div class="col-md-12">
                <h2>Datos del Cliente</h2>
            </div>

            <div class="col-md-12">
                <table class="table table-striped table-bordered">

                    <thead>
                        <tr>
                            <th>Cédula-Pasaporte / DNI-Passport</th>
                            <th>Nombre y Apellido / Name & lastname</th>
                            <th>Apellido</th>
                        </tr>
                    </thead>

                    <tbody>
                        <tr>
                            <td><?php echo $cliente->rut;?></td>
                            <td><?php echo $cliente->nombre . ' ' . $cliente->apellido;?></td>
                            <td></td>
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
                            <td><?php echo $cliente->direccion;?></td>
                            <td><?php echo $cliente->ciudad;?></td>
                            <td><?php echo $cliente->pais;?></td>
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
                            <td><?php echo $cliente->telefono;?></td>
                            <td><?php echo $cliente->email;?></td>
                            <td></td>
                        </tr>
                    </tbody>

                </table>
            </div>

        </div> <!-- /row clientes -->


        <div class="row">

            <div class="col-md-12">
                <h2>VEHICULO ARRENDADO/  RENTED VEHICLE</h2>
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
                            <td><?php echo $vehiculo->patente;?></td>
                            <td><?php echo $vehiculo->modelo;?></td>
                            <td><?php echo $vehiculo->marca;?></td>
                        </tr>
                    </tbody>

                </table>

            </div>

        </div><!-- /row vehiculo -->

        <div class="row"><!--Row estras-->

            <div class="col-md-12">
                <h2>SERVICIOS ADICIONALES - ACCESORIOS - SEGUROS EXTRA/ ADDITIONAL SERVICES - ACCESORIES - EXTRA INSURANCES</h2>
            </div>

            <?php if (! $extras) :?>
                <p>No incluye servicios extras/ Not include extra services</p>
            <?php else:?>
                <div class="col-md-12">

                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Cantidad</th>
                            </tr>

                        </thead>

                        <tbody>
                            <?php foreach ($extras as $extra):?>
                            <tr>
                                <td><?php echo $extra->extra;?></td>
                                <td><?php echo $extra->cantidad;?></td>
                            </tr>
                            <?php endforeach;?>
                            
                        </tbody>

                    </table>

                </div>
            <?php endif;?>
            

        </div><!-- /row vehiculo -->

        
    <div class="row" >
        <div class="col-md-12">
            <h2>DATOS ARRIENDO VEHICULO / RENTAL INFORMATION</h2>
        </div>
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
                    <td><?php echo $fecha_entrega_o->format('Y-m-d')?></td>
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
                    <td><?php echo $fecha_entrega_o->format('H:i') ?></td>
                    <td><?php echo $fecha_devolucion_o->format('H:i'); ?></td>
                </tr>
            </tbody>


        </table>
    
    </div>


        
 <!-- /row  datos reserva -->

    <?php
    $suma_extra = 0;
    if ( ! $extras ):
    else: ?>


        <div class="row">

            <div class="col-md-5">
                <h2>SERVICIOS ADICIONALES - ACCESORIOS - SEGUROS EXTRA/ ADDITIONAL SERVICES - ACCESORIES - EXTRA INSURANCES</h2>
            </div>
            
            <div class="col-md-5">
            <h2>VALOR ARRIENDO / PAYMENT</h2>
            </div>

            <div class="col-md-12">

                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>Extra</th>
                            <th>Cantidad</th>
                        </tr>

                    </thead>

                    <tbody>
                        <?php
                        foreach ($extras as $extra ):
                            $total_extra = $extra->cantidad * $extra->precio;
                            $suma_extra = $suma_extra + $total_extra;
                        ?>
                        <tr>
                            <td><?php echo  $extra->extra ?></td>
                            <td><?php echo  $extra->cantidad ?></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>

            </div>
        </div><!-- /row extras -->
    <?php endif; ?>

    <div class="row">
        
        <div class="col-md-12">
            
        </div>
        
        <div class="col-md-12">
            <table class="table">
                <tr>
                    <th>VALOR NETO</th>
                    <td><?php echo '$' . number_format($reserva->sub_total , '2', ',' , '.');?> CLP</td>
                    <td><?php $subtotal_en_usd = $reserva->sub_total / $dolar; echo '$' . number_format($subtotal_en_usd , '2', ',' , '.');?> USD</td>
                </tr>

                <tr>
                    <th>IVA / TAX</th>
                    <td><?php $iva = ($reserva->sub_total * 1.19) - $reserva->sub_total; echo '$' . number_format($iva , '2', ',' , '.');?></td>
                    <td><?php $iva_usd = $iva / $dolar; echo '$' . number_format($iva_usd , '2', ',' , '.');?></td>
                </tr>

                <tr>
                    <th>VALOR A PAGAR</th>
                    <td><?php echo '$' . number_format($reserva->total , '2', ',' , '.');?> CLP</td>
                    <td><?php $precio_en_usd = $reserva->total / $dolar; echo '$' . number_format($precio_en_usd , '2', ',' , '.');?>USD</td>
                </tr>

                <tr>
                    <th>DESCUENTO ABONO / BOOKING</th>
                    <td><?php echo '$' . number_format($reserva->abonado , '2', ',' , '.');?></td>
                    <td><??></td>
                </tr>

                <tr>
                    <th>SALDO A PAGAR / BALANCE DUE</th>
                    <td><?php $por_pagar = $reserva->total - $reserva->abonado; echo '$' . number_format($por_pagar , '2', ',' , '.');?> CLP</td>
                    <td><?php $por_pagar_usd = $por_pagar / $dolar; echo '$' . number_format($por_pagar_usd , '2', ',' , '.');?> USD</td>
                </tr>

            </table>
        </div>
        <div class="col-md-12">

            <div class="row">

                <div class="col-md-5">
                        
                

                



                </div>

                <div class="col-md-6">
                    <h3>FORMA DE PAGO / PAYMENT FORM</h3>

                    <table class="table">
                        <tr>
                                <td>EFECTIVO</td>
                                <td>_____________________________</td>
                        </tr>
                        <tr>
                                <td>TRASNFERENCIA</td>
                                <td></td>
                        </tr>
                        <tr>
                                <td>CHEQUE</td>
                                <td></td>
                        </tr>
                        <tr>
                                <td>TCRÉDITO/TDÉBITO</td>
                                <td></td>
                        </tr>
                        <tr>
                                <td>ÓRDEN DE COMPRA</td>
                                <td style="width:120px"></td>
                        </tr>
                    </table>
                </div>

            </div>

        </div>

    </div>
    <div class="row">
        <div class="col-md-12">
            <table class="tabla_2">
                <tr>
                    <td>DEPÓSITO GARANTÍA / GUARANTEE DEPOSIT</td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>DEDUCIBLE POR DAÑOS AL VEHICULO / DAMAGE EXCESS</td>
                    <td>UF. 30 + IVA</td>
                    <td>(Aprox. $1,000,000 CLP)</td>
                </tr>

                <tr>
                    <td>DEDUCIBLE POR DAÑOS AL VEHICULO / DAMAGE EXCESS</td>
                    <td>UF. 40 + IVA</td>
                    <td>(Aprox. $1,400,000 CLP)</td>
                </tr>

            </table>
        </div>
    </div>
</body>
</html>
