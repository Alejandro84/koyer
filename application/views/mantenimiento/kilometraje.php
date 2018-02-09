<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Kilometraje actual registrado</h1>

        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <table class="table table-bordered">
                <thead>
                    <td>Patente</td>
                    <td>Modelo</td>
                    <td>Kilometraje Actual</td>
                </thead>
                <tbody>
                    <?php foreach ($kilometrajes as $kilom): ?>
                        <tr>
                            <td><?php echo  $kilom['vehiculo']->patente ?></td>
                            <td><?php echo  $kilom['vehiculo']->marca . ' ' . $kilom['vehiculo']->modelo ?></td>
                            <td><?php echo  $kilom['km']->kilometraje?></td>
                        </tr>
                    <?php endforeach; ?>

                </tbody>
            </table>
        </div>
    </div>
</div>
