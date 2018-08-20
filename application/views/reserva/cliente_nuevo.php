   <form action="<?php echo site_url('cliente/guardar_cliente');?>" method="post">

   <h3>Datos de Cliente</h3>
 
   <div class="row">

      <div class="col-md-2">
            <div class="form-group">
                  <label>Rut:</label>
                  <input type="text" class="form-control" name="rut" placeholder="Ej: 12345678-9">
            </div>
      </div>
      
      <div class="col-md-5">
            <div class="form-group">
                  <label for="">Nombre:</label>
                  <input type="text" name="nombre" class="form-control" placeholder="Ej: Yerko">
            </div>
      </div>

      <div class="col-md-5">
            <div class="form-group">
            <label for="">Apellido</label>
            <input type="text" name="apellido" class="form-control" placeholder="Ej: Vera">
            </div>
      </div>
      
      <div class="col-md-3">
            <div class="form-group">
                  <label for="">Fecha de nacimiento:</label>
                  <div class='input-group date' id='fecha_nacimiento'>
                  <input type='text' name='fecha_nacimiento' class="form-control">
                  <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                  </span>
                  </div>
            </div>
      </div>

      <div class="col-md-3">
            <div class="form-group">
            <label for="">Telefono:</label>
            <input type="number" name="telefono" class="form-control">
            </div>
      </div>

      <div class="col-md-6">
            <div class="form-group ">
                  <label for="">Correo electronico:</label>
                  <input type="email" name="email" class="form-control" id="exampleInputEmail1">
            </div>
      </div>
      
      <div class="col-md-4">
            <div class="form-group">
                  <label for="">Pais:</label>
                  <select class="form-control" name="pais" id="">
                        <option value="">Seleccione un país de la lista</option>
                        <?php foreach ($paises as $pais):?>
                              <option value="<?php echo $pais->pais; ?>"><?php echo $pais->pais;?></option>
                        <?php endforeach; ?>
                  </select>
            </div>
      </div>

      <div class="col-md-4">
            <div class="form-group">
                  <label for="">Ciudad:</label>
                  <input type="text" name="ciudad" class="form-control">
            </div>
      </div>
      
      <div class="col-md-4">
            <div class="form-group">
                  <label for="">Direccion:</label>
                  <input type="text" name="direccion" class="form-control">
            </div>
      </div>

   </div>

   <div class="row">
      <div class="col-md-12">
      <input type="submit" value="Guardar" class="btn btn-success pull-right">
      </div>
   </div>

   </form>

