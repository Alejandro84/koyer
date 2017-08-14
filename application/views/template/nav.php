<nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="http://web.koyer.cl"><img src="<?= base_url('assets/img/logo_koyer.png');?>" width="90%" class="logo-nav"></a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="">Pagina WEB</a></li>
            <li><a href="<?= site_url('/vehiculo');?>">Vehiculos</a></li>
            <li><a href="#contact"></a></li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Mantenimientos <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="<?= site_url('/mantenimiento');?>">Ingresar Mantenimiento</a></li>
                <li><a href="#">Generar reportes de mantenimiento</a></li>


              </ul>
            </li>
          </ul>
        </div><!--/.nav-collapse -->
    </nav>
