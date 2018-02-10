<div class="col-md-6">

    <h1>Dolar</h1>

    <table class="table table-striped">
        <thead>
            <th>Divisa</th>
            <th>valor</th>
        </thead>

        <tbody>
            <tr>
                <td><?php echo $dolar->divisa ?></td>
                <td><?php echo $dolar->valor ?></td>
            </tr>
        </tbody>
    </table>
</div>

<div class="col-md-6">

    <h1>Modificar valor del dolar</h1>

    <?php echo form_open('dolar/actualizar'); ?>
    <div class="form-group">
        <label>Valor del dolar(pesos chilenos)</label>
        <input type="text" name="valor" value="<?php echo $dolar->valor?>" class="form-control">
        <input type="text" name="id_divisa" value="<?php echo $dolar->id_divisa?>"hidden="true">
        <br>
        <input type="submit" value="Actualizar" class="btn btn-success btn-block">
    </div>
    <?php echo form_close() ?>
</div>
