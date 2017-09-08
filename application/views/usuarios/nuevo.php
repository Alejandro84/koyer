<div class="col-md-6">

      <h1>Usuarios <small>Nuevo</small></h1>

      <form action="<?=site_url('usuario/guardar');?>" method="post" >
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

         <input type="submit" name="" value="Guardar" class="btn btn-success">

      </form>

</div>
