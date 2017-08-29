<div class="container">

   <div class="row">
      <h3>Cliente registrado</h3>

      <div class="col-md-12">

         <div class="form-group">
            <form action="<?=site_url('reserva/buscar');?>" method="post">
               <div class="form-inline">

                  <div class="form-group">
                     <label>Rut:</label>
                     <input type="text" class="form-control" name="rut_numero_busqueda">
                  </div>
                  <div class="form-group">
                     <input type="text" class="form-control" maxlength="1" name="rut_cod_verificador_busqueda">
                  </div>
                  <div class="form-group">
                     <input type="submit" class="btn btn-success"  name="Buscar">
                  </div>
               </div>
            </form>
         </div>
         
      </div>

   </div>

</div>
