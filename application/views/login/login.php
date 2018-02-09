<div class="container">
   <div class="row">
      <center>  <img src="<?php echo  base_url('assets/img/logo_koyer2.png');?>" class="im"></center>
   </div>
   <div class="row">
      <div class="col-md-4 col-md-offset-4 login">

         <h2><center> Iniciar Sesión</center></h2>

         <? $this->load->view('template/alert'); ?>

         <form method="post" action="<?php echo site_url('login/verificar');?>">

            <div class="form-group">
               <caption>Usuario</caption>
               <input type="text" name="usuario" class="form-control min">
            </div>

            <div class="form-group">
               <caption>Contraseña</caption>
               <input type="password" name="password" class="form-control min">
            </div>

            <br>

            <button class="btn btn-success btn-block" type="submit">Entrar</button>
         </form>

      </div>

   </div>

   <div class="row">

      <div class="col-md-4 col-md-offset-4">
         <center><small>Sistema de administracion de Koyer Rent-a-Car </small></center>
      </div>

   </div>

</div>
