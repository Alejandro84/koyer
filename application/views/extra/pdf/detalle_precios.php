<h2> VALOR ARRIENDO / PAYMENT </h2>
<table class="table table-striped table-bordered">
    <tr>
        <th>VALOR NETO</th>
        <td><?php echo '$' . number_format($sub_total , '2', ',' , '.');?> CLP</td>
        <td><?php $subtotal_en_usd = $sub_total / $dolar; echo '$' . number_format($subtotal_en_usd , '2', ',' , '.');?> USD</td>
    </tr>

    <tr>
        <th>IVA / TAX</th>
        <td><?php $iva = ($sub_total * $impuesto) - $sub_total; echo '$' . number_format($iva , '2', ',' , '.');?></td>
        <td><?php $iva_usd = $iva / $dolar; echo '$' . number_format($iva_usd , '2', ',' , '.');?></td>
    </tr>

    <tr>
        <th>VALOR A PAGAR</th>
        <td><?php echo '$' . number_format($sub_total + $iva , '2', ',' , '.');?> CLP</td>
        <td><?php $precio_en_usd = ($sub_total + $iva)  / $dolar; echo '$' . number_format($precio_en_usd , '2', ',' , '.');?>USD</td>
    </tr>


</table>

