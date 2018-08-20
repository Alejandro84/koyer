<div class="container">
    <form action="<?php echo site_url('cliente/actualizar_cliente');?>" method="post">

    <h3>Datos de Cliente</h3>

    <div class="row">

    <div class="form-group">
        <div class="form-inline">

            <div class="form-group">
                <label>Rut:</label>
                <input type="text" class="form-control" name="rut" value="<?php echo  $cliente->rut;?>" readonly>
            </div>
        </div>
    </div>

    </div>

    <div class="row">

    <div class="form-group col-md-6">
        <label for="">Nombre:</label>
        <input type="text" name="nombre" value="<?php echo  $cliente->nombre;?>" class="form-control">
    </div>

    <div class="form-group col-md-6">
        <label for="">Apellido</label>
        <input type="text" name="apellido" value="<?php echo  $cliente->apellido;?>" class="form-control">
    </div>

    </div>

    <div class="row">

    <div class="form-group col-md-6">
        <div class="form-group">
            <label for="">Fecha de nacimiento:</label>
            <div class='input-group date' id='fecha_nacimiento'>
                <input type='text' name='fecha_nacimiento' class="form-control" value="<?php echo  $cliente->fecha_nacimiento;?>">
                <span class="input-group-addon">
                    <span class="glyphicon glyphicon-calendar"></span>
                </span>
            </div>
        </div>    
    </div>

    <div class="form-group col-md-6">
        <label for="">Direccion:</label>
        <input type="text" name="direccion" value="<?php echo  $cliente->direccion;?>" class="form-control">
    </div>

    </div>

    <div class="row">

    <div class="form-group col-md-6">
        <label for="">Ciudad:</label>
        <input type="text" name="ciudad" value="<?php echo  $cliente->ciudad;?>" class="form-control">
    </div>

    <div class="form-group col-md-6">
        <div class="form-group">
                <label for="">Pais:</label>
                <select class="form-control" name="pais" id="">
                <option selected value="<?php echo  $cliente->pais;?>"><?php echo  $cliente->pais;?></option>
                    <option value=""> <b>Seleccione un país de la lista</b> </option>
                    <?php foreach ($paises as $pais):?>
                            <option value="<?php echo $pais->pais; ?>"><?php echo $pais->pais;?></option>
                    <?php endforeach; ?>
                </select>
        </div>

    </div>

    </div>
    <div class="row">

    <div class="form-group col-md-6">
        <label for="">Telefono:</label>
        <input type="number" name="telefono" value="<?php echo  $cliente->telefono;?>" class="form-control">
    </div>

    <div class="form-group col-md-6">
        <label for="">Correo electronico:</label>
        <input type="email" name="email" value="<?php echo  $cliente->email;?>" class="form-control">
    </div>

    </div>
        <input type="text" name="id_cliente" value="<?php echo  $cliente->id_cliente;?>" hidden>
        <input type="submit" value="Siguiente" class="btn btn-success pull-right">
    </form>

</div>   
   