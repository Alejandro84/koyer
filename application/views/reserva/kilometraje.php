<div class="container">

    <div class="row">

        <div class="col-md-4 col-md-offset-4 login">

            <h2>Kilomatraje final</h2>

            <h5>Ingrese el kilometraje final al momento de la devolucion del vehiculo</h5>

            <form action="<?= site_url( 'reserva/agregar_kilometraje' ); ?>" method="post">
                <div class="form-group">
                    <input type="text" name="kilometraje" class="form-control" placeholder="Ej.: 142000">
                </div>
                <input type="text" name="id_vehiculo" hidden="" value="<?=$reservas->id_vehiculo; ?>">
                <input type="submit" value="Guardar" class="btn btn-success form-control">

            </form>
        </div>

    </div>

</div>
