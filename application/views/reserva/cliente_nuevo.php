<div class="container">
   <form action="<?php echo site_url('cliente/guardar_cliente');?>" method="post">

   <h3>Datos de Cliente</h3>
   <? $this->load->view('template/alert'); ?>
   <div class="row">

      <div class="form-group">
         <div class="form-inline">

            <div class="form-group">
               <label>Rut:</label>
               <input type="text" class="form-control" name="rut" >
            </div>

         </div>
      </div>

   </div>

   <div class="row">

      <div class="form-group col-md-6">
         <label for="">Nombre:</label>
         <input type="text" name="nombre" class="form-control">
      </div>

      <div class="form-group col-md-6">
         <label for="">Apellido</label>
         <input type="text" name="apellido" class="form-control">
      </div>

   </div>

   <div class="row">


         <div class="form-group col-md-6">
            <label for="">Fecha de nacimiento:</label>
            <div class='input-group date' id='reserva-fecha_desde'>
               <input type='text' name='fecha_nacimiento' class="form-control">
               <span class="input-group-addon">
                  <span class="glyphicon glyphicon-calendar"></span>
               </span>
            </div>
         </div>


      <div class="form-group col-md-6">
         <label for="">Direccion:</label>
         <input type="text" name="direccion" class="form-control">
      </div>

   </div>

   <div class="row">

      <div class="form-group col-md-6">
         <label for="">Ciudad:</label>
         <input type="text" name="ciudad" class="form-control">
      </div>

      <div class="form-group col-md-6">
         <label for="">Pais:</label>
         <input type="text" name="pais" class="form-control">
      </div>

   </div>
   <div class="row">

      <div class="form-group col-md-6">
         <label for="">Telefono:</label>
         <input type="number" name="telefono" class="form-control">
      </div>

      <div class="form-group col-md-6">
         <label for="">Correo electronico:</label>
         <input type="mail" name="email" class="form-control" id="exampleInputEmail1">
      </div>

      <input type="submit" value="Guardar" class="btn btn-success pull-right">
   </div>

   </form>

</div>
