<div class="container">
    <div class="row">
        <div class="col-md-12">
        <? $this->load->view('template/alert'); ?>
        </div>
    </div>
   
   <div class="row">

      <div class="col-md-6 col-md-offset-4 login">
         <h3>Cliente registrado</h3>

        <div class="form-group">
            <form action="<?php echo site_url('cliente/buscar');?>" method="post">
               <div class="form-inline">

                  <div class="form-group">
                     <label>Rut:</label>
                     <input type="text" class="form-control" name="rut_busqueda">
                  </div>
                  <div class="form-group">
                     <input type="submit" class="btn btn-success"  name="Buscar" value="Buscar">
                  </div>
               </div>
            </form>
         </div>

      </div>

   </div>

     <?php $this->load->view('reserva/cliente_nuevo');?>   

</div>
