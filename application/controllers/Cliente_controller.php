<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cliente_controller extends CI_Controller{

  public function __construct()
  {
     parent::__construct();
     $this->load->model('cliente');
  }


  public function index()
  {
      $this->load->view('template/header');
      $this->load->view('template/nav');
      $this->load->view('reserva/buscar');
      $this->load->view('template/footer');

  }

  public function buscar()
  {

     $rut_busqueda           =  $this->input->post('rut_busqueda');
     $caracteres = array('-',',', '.' );

     $rut = str_replace($caracteres, '' , $rut_busqueda);

     $cliente = $this->cliente->buscar($rut);

     if ( ! $cliente ) {
        redirect('reserva/cliente_nuevo');
     } else {
        redirect('reserva/busqueda/'.$cliente->id_cliente);
     }
   }

   public function clienteNuevo()
  {

      $this->load->view('template/header');
      $this->load->view('template/nav');
      $this->load->view('reserva/cliente_nuevo');
      $this->load->view('template/footer');

  }

   public function busqueda($id_cliente)
   {
      $data['cliente'] = $this->cliente->getOne($id_cliente);

      $this->load->view('template/header');
      $this->load->view('template/nav');
      $this->load->view('reserva/ver', $data);
      $this->load->view('template/footer');

   }

   public function clienteRegistrado()
   {
      $id_cliente = $this->input->post('id_cliente');

      $mensaje = 'Sus datos han sido guardados exitosamente';
      $this->session->set_flashdata('success',$mensaje);
      $this->session->cliente = $id_cliente;
      redirect('reserva/resumen');
   }

   public function guardarCliente()
   {

     $caracteres = array('-',',', '.' );

     $rut                 =  $this->input->post('rut');
     $nombre              =  $this->input->post('nombre');
     $apellido            =  $this->input->post('apellido');
     $direccion           =  $this->input->post('direccion');
     $ciudad              =  $this->input->post('ciudad');
     $fecha_nacimiento    =  $this->input->post('fecha_nacimiento');
     $pais                =  $this->input->post('pais');
     $telefono            =  $this->input->post('telefono');
     $email               =  $this->input->post('email');

     $rut = str_replace($caracteres, '' , $rut);


  if ($rut != null && $nombre != null && $apellido != null && $direccion != null && $ciudad != null && $pais != null && $telefono != null && $email != null) {

        $insert = array(
           'rut' => $rut,
           'nombre' => $nombre,
           'apellido' => $apellido,
           'direccion' => $direccion,
           'ciudad' => $ciudad,
           'fecha_nacimiento' => $fecha_nacimiento,
           'pais' => $pais,
           'telefono' => $telefono,
           'email' => $email
         );

         if (! $this->cliente->guardar($insert)) {

            $mensaje = 'Sus datos han sido guardados exitosamente';
            $this->session->set_flashdata('success',$mensaje);
            $cliente = $this->cliente->buscar($rut);
            $this->session->cliente = $cliente->id_cliente;
            redirect('reserva/resumen');

           } else {
              $error = $this->db->_error_message();
              $mensaje = 'No se pudo guardar la informacion en la base de datos: <br>'.$error;
              $this->session->set_flashdata('error',$mensaje);
              redirect('reserva/cliente_nuevo');
         }

     }else {
        $mensaje = '¡Debe rellenar todos los campos!';
        $this->session->set_flashdata('error', $mensaje);
        redirect('reserva/cliente_nuevo');
     }
   }

}


/*$mesano = $this->input->post('busqueda_fecha');

if ($mesano != null) {
    $fecha_busqueda = $mesano;
}else {
    $fecha_busqueda = $fecha->format('Y-m');
}*/
