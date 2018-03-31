<div class="container">
   <div class="row">
      <h1>Reporte</h1>
   </div>

   <div class="row">
       <div class="col-md-12">
           <table class="table table-stripped table-bordered">
               <thead>
                   <tr>
                       <th>Codigo de reserva</th>
                       <th>Subtotal</th>
                       <th>Total</th>
                   </tr>
               </thead>
               <?php foreach ($reservas as $reserva): ?>
                   <tr>
                       <td><?php echo $reserva->codigo_reserva ?></td>
                       <td><?php echo $reserva->sub_total ?></td>
                       <td><?php echo $reserva->total ?></td>
                   </tr>
               <?php endforeach; ?>
           </table>
       </div>
   </div>

   <div class="row">
       <div class="col-md-12">
           <table class="table table-stripped table-bordered">
               <thead>
                   <tr>
                       <th>Mantenimiento</th>
                       <th>Vehiculo</th>
                       <th>Comentario</th>
                       <th>Costo</th>
                   </tr>
               </thead>
               <?php foreach ($mantenimientos as $manteni): ?>
                   <tr>
                       <td><?php echo $manteni->mantenimiento?></td>
                       <td><?php echo $manteni->patente ?></td>
                       <td><?php echo $manteni->comentario?></td>
                       <td><?php echo $manteni->costo ?></td>
                   </tr>
               <?php endforeach; ?>
           </table>
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
   <div class="row">
       <div class="col-md-3 col-md-offset-3">
           <form action="<?php echo site_url('reporte/imprimir_pdf/'. $fecha  );?>" method="post">
               <button type="submit" class="btn btn-success btn-block">Imprimir Reporte</button>
           </form>

       </div>
   </div>
</div>
