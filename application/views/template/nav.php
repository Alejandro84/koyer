<nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="http://web.koyer.dev"><img src="<?= base_url('assets/img/logo_koyer2.png');?>" width="100%" class="logo-nav"></a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
             <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Reservas<span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="<?= site_url('/reserva/nuevo');?>">Nueva reserva</a></li>
                <li><a href="<?= site_url('/reserva');?>">Reservas</a></li>
                <li><a href="<?= site_url('/reserva/cotizacion');?>">Cotizaciones</a></li>
              </ul>
            </li>

            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Vehiculos <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="<?= site_url('/vehiculo');?>">Listado de Vehiculos</a></li>
                <li><a href="<?= site_url('/modelo');?>">Configuraciones</a></li>
              </ul>
            </li>

            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Mantenimientos <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="<?= site_url('/mantenimiento');?>">Ingresar Mantenimiento</a></li>
                <li><a href="<?= site_url('/mantenimiento/reporte');?>">Generar reportes de mantenimiento</a></li>
                <li><a href="<?= site_url('/mantenimiento/ver_kilometraje');?>">Ver Kilometraje Actual</a></li>


              </ul>
            </li>

            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Ajustes <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="<?= site_url('/descuento');?>">Descuentos</a></li>
                <li><a href="<?= site_url('/tarifa');?>">Cambio de Precios</a></li>
                <li><a href="<?= site_url('/extra');?>">Administración de Extras</a></li>
              </ul>
            </li>
          </ul>
          <ul class="nav navbar-nav navbar-right">

             <li class="dropdown">

                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Bienvenido <?= $this->session->logueado->nombre.' '.$this->session->logueado->apellido;?> <span class="caret"></span></a>

                <ul class="dropdown-menu">
                   <li><a href="<?= site_url('usuario/editar/'.$this->session->logueado->id_usuario); ?>">Mi perfil</a></li>
                   <li><a href="<?= site_url('login/salir'); ?>">Cerrar sesión</a></li>
                </ul>

             </li>

          </ul>
        </div><!--/.nav-collapse -->
    </nav>
<?= site_url('/vehiculo');?>
