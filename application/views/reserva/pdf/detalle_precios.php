<h2> VALOR ARRIENDO / PAYMENT </h2>
<table class="table table-striped table-bordered">
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

