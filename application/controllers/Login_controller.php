<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_controller extends CI_Controller{

  public function __construct()
  {
     parent::__construct();
      $this->load->model('usuario');
  }

  function index()
  {
     if ( ! $this->session->logeado )
     {
       // si no está logueado, mostramos login...
       $this->load->view('template/header');
       $this->load->view('login/login');
       $this->load->view('template/footer');


     } else {
       // de lo contrario enviamos al dashboard
       redirect('reserva/listar');

     }
  }


  public function verificar()
 {

     if ( ! $this->session->logeado )
     {
       $usuario = $this->input->post('usuario');
       $password = $this->input->post('password');

       ## vemos si existe el usuario y concuerda la contraseña en el modelo
       if ( ! $this->usuario->verificar($usuario, $password) )
       {

           ## si es falso, error y devolvemos
           $mensaje = 'Usuario o contraseña erroneos.';
           $this->session->set_flashdata( 'error', $mensaje );
           redirect('login');

       } else {

           ## el usuario y contraseña existen, creamos el logeado en la session
           $usuario_session = $this->usuario->verificar( $usuario, $password ); // revisar metodo en modelo
           $this->session->logueado = $usuario_session;
           $mensaje = 'Sesión iniciada correctamente!, bienvenido '.$this->session->logueado->nombre.' '.$this->session->logueado->apellido;
           $this->session->set_userdata( 'success', $mensaje );

           $nuevaRuta = "";

           ## aquí verificamos el tipo de usuario para redireccionarlo donde corresponda
           ## hasta el momento solo 2 roles, admin dios y operador.
           /*
           switch ( $usuario_session->rol_id )
           {
              case 1:
                 $nuevaRuta = 'admin/dashboard';
                 break;
              case 2:
                 $nuevaRuta = 'llamada/nueva';
                 break;
           }

           redirect($nuevaRuta);
           */
           redirect('reserva');
       }

     } else {

       ## si ya está logeado para que vamos a hacer todo denuevo...
       redirect('admin');

     }
 }
    public function salir()
      {
          if ( $this->session->logueado )
          {
            $this->session->unset_userdata('logueado');
            redirect('login');
          } else {
            redirect('login');
          }
      }

      public function inicio()
      {
          redirect('login');
      }
}
