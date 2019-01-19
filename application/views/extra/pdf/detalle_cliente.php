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