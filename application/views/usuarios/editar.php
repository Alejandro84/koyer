<div class="container">

   <div class="row">
      <h1>Usuarios <small>Editar</small></h1>
   </div>

   <div class="row">

      <form action="<?php echo site_url('usuario/actualizar');?>" method="post" class="col-xs-4">

         <div class="form-group">
            <label for="usuario">Nombre:</label>
            <input type="text" name="nombre" value="" class="form-control">
         </div>
         <div class="form-group">
            <label for="usuario">Apellido:</label>
            <input type="text" name="apellido" value="" class="form-control">
         </div>
         <div class="form-group">
            <label for="usuario">Usuario:</label>
            <input type="text" name="usuario" value="" class="form-control">
         </div>
         <div class="form-group">
            <label for="usuario">Contraseña:</label>
            <input type="password" name="clave" value="" class="form-control">
         </div>

            <input type="text" name="id_usuario" value="<?php echo  $usuario->id_usuario;?>" hidden="true">

            <input type="submit" name="" value="Guardar" class="btn btn-success">

      </form>

   </div>

</div>
