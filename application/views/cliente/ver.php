<div class="container">
   <div class="row">
      <? $this->load->view('cliente/buscar'); ?>

   </div>

   <form action="<?=site_url('cliente/guardar');?>" method="post">

   <h3>Datos de Cliente</h3>

   <div class="row">

      <div class="form-group">
         <div class="form-inline">

            <div class="form-group">
               <label>Rut:</label>
               <input type="text" class="form-control" name="rut_numero" value="<?= $cliente->rut;?>">
            </div>
            <div class="form-group">
               <input type="text" class="form-control" maxlength="1" name="rut_cod_verificador">
            </div>

         </div>
      </div>

   </div>

   <div class="row">

      <div class="form-group col-md-6">
         <label for="">Nombre:</label>
         <input type="text" name="nombre" value="<?= $cliente->nombre;?>" class="form-control">
      </div>

      <div class="form-group col-md-6">
         <label for="">Apellido</label>
         <input type="text" name="apellido" value="<?= $cliente->apellido;?>" class="form-control">
      </div>

   </div>

   <div class="row">

      <div class="form-group col-md-6">
         <label for="">Fecha de nacimiento:</label>
         <input type="text" name="fecha_nacimiento" value="<?= $cliente->fecha_nacimiento;?>" class="form-control">
      </div>

      <div class="form-group col-md-6">
         <label for="">Direccion:</label>
         <input type="text" name="direccion" value="<?= $cliente->direccion;?>" class="form-control">
      </div>

   </div>

   <div class="row">

      <div class="form-group col-md-6">
         <label for="">Ciudad:</label>
         <input type="text" name="ciudad" value="<?= $cliente->ciudad;?>" class="form-control">
      </div>

      <div class="form-group col-md-6">
         <label for="">Pais:</label>
         <input type="text" name="pais" value="<?= $cliente->pais;?>" class="form-control">
      </div>

   </div>
   <div class="row">

      <div class="form-group col-md-6">
         <label for="">Telefono:</label>
         <input type="number" name="telefono" value="<?= $cliente->telefono;?>" class="form-control">
      </div>

      <div class="form-group col-md-6">
         <label for="">Correo electronico:</label>
         <input type="email" name="email" value="<?= $cliente->email;?>" class="form-control">
      </div>

   </div>

   </form>
</div>
