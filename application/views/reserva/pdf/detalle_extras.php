<?php
    $suma_extra = 0;
    if ( ! $extras ):
    else: ?>

        <div class="col-md-12">
            <h2>SERVICIOS ADICIONALES - ACCESORIOS - SEGUROS EXTRA/ ADDITIONAL SERVICES - ACCESORIES - EXTRA INSURANCES</h2>
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
