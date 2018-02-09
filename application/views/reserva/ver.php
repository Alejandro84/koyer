<div class="container">

   <form action="<?php echo site_url('cliente/cliente_registrado');?>" method="post">

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
         <input type="text" name="nombre" value="<?php echo  $cliente->nombre;?>" class="form-control"  readonly>
      </div>

      <div class="form-group col-md-6">
         <label for="">Apellido</label>
         <input type="text" name="apellido" value="<?php echo  $cliente->apellido;?>" class="form-control" readonly>
      </div>

   </div>

   <div class="row">

      <div class="form-group col-md-6">
         <label for="">Fecha de nacimiento:</label>
         <input type="text" name="fecha_nacimiento" value="<?php echo  $cliente->fecha_nacimiento;?>" class="form-control" readonly>
      </div>

      <div class="form-group col-md-6">
         <label for="">Direccion:</label>
         <input type="text" name="direccion" value="<?php echo  $cliente->direccion;?>" class="form-control" readonly>
      </div>

   </div>

   <div class="row">

      <div class="form-group col-md-6">
         <label for="">Ciudad:</label>
         <input type="text" name="ciudad" value="<?php echo  $cliente->ciudad;?>" class="form-control" readonly>
      </div>

      <div class="form-group col-md-6">
         <label for="">Pais:</label>
         <input type="text" name="pais" value="<?php echo  $cliente->pais;?>" class="form-control" readonly>
      </div>

   </div>
   <div class="row">

      <div class="form-group col-md-6">
         <label for="">Telefono:</label>
         <input type="number" name="telefono" value="<?php echo  $cliente->telefono;?>" class="form-control" readonly>
      </div>

      <div class="form-group col-md-6">
         <label for="">Correo electronico:</label>
         <input type="email" name="email" value="<?php echo  $cliente->email;?>" class="form-control" readonly>
      </div>

   </div>
   <input type="text" name="id_cliente" value="<?php echo  $cliente->id_cliente;?>" hidden>
   <input type="submit" value="Siguiente" class="btn btn-success pull-right">
   </form>
</div>
