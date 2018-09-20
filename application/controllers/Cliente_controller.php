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
    $data = array(
        'paises' => $this->cliente->getPaises()
    );

    $this->load->view('template/header');
    $this->load->view('template/nav');
    $this->load->view('reserva/buscar', $data);
    $this->load->view('template/footer');

  }

  public function buscar()
  {

     $rut_busqueda           =  $this->input->post('rut_busqueda');
     $caracteres = array('-',',', '.' );

     $rut = str_replace($caracteres, '' , $rut_busqueda);

     $cliente = $this->cliente->buscar($rut);

     if ( ! $cliente ) {
        $mensaje = 'No se encontró usuario registrado'.$error;
        $this->session->set_flashdata('error',$mensaje);
        redirect('cliente');
     } else {
        redirect('cliente/busqueda/'.$cliente->id_cliente);
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
        $data = array(
            'cliente' =>  $this->cliente->getOne($id_cliente),
            'paises' => $this->cliente->getPaises()
        );  

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


  if ($rut != null) {

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

            $error = $this->db->_error_message();
              $mensaje = 'No se pudo guardar la informacion en la base de datos: <br>'.$error;
              $this->session->set_flashdata('error',$mensaje);
              redirect('cliente');

           } else {
            $mensaje = 'Sus datos han sido guardados exitosamente';
            $this->session->set_flashdata('success',$mensaje);
            $cliente = $this->cliente->buscar($rut);
            $this->session->cliente = $cliente->id_cliente;
            redirect('reserva/resumen'); 
         }

     }else {
        $mensaje = '¡Debe rellenar por lo menos el campo <b>RUT</b>';
        $this->session->set_flashdata('warning', $mensaje);
        redirect('cliente');
     }
   }

   public function actualizarCliente()
   {

     $caracteres = array('-',',', '.' );

     $id_cliente          =  $this->input->post('id_cliente');
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


  if ($rut != null) {

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

         if (! $this->cliente->actualizar($insert, $id_cliente)) {

            $error = $this->db->_error_message();
              $mensaje = 'No se pudo guardar la informacion en la base de datos: <br>'.$error;
              $this->session->set_flashdata('error',$mensaje);
              redirect('cliente');

           } else {
            $mensaje = 'Sus datos han sido guardados exitosamente';
            $this->session->set_flashdata('success',$mensaje);
            $this->session->cliente = $id_cliente;
            redirect('reserva/resumen');
         }

     }else {
        $mensaje = '¡Debe rellenar todos los campos!';
        $this->session->set_flashdata('warning', $mensaje);
        redirect('cliente');
     }
   }

   public function actualizarClienteReserva()
   {

     $caracteres = array('-',',', '.' );

     $id_reserva          =   $this->input->post('id_reserva');
     $id_cliente          =   $this->input->post('id_cliente');
     $rut                 =   $this->input->post('rut');
     $nombre              =   $this->input->post('nombre');
     $apellido            =   $this->input->post('apellido');
     $direccion           =   $this->input->post('direccion');
     $ciudad              =   $this->input->post('ciudad');
     $fecha_nacimiento    =   $this->input->post('fecha_nacimiento');
     $pais                =   $this->input->post('pais');
     $telefono            =   $this->input->post('telefono');
     $email               =   $this->input->post('email');

     $rut = str_replace($caracteres, '' , $rut);


  if ($rut != null) {

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

         if (! $this->cliente->actualizar($insert, $id_cliente)) {

            $error = $this->db->_error_message();
              $mensaje = 'No se pudo guardar la informacion en la base de datos: <br>'.$error;
              $this->session->set_flashdata('error',$mensaje);
              redirect('reserva/ver_reserva/' . $id_reserva);

           } else {
            $mensaje = 'Los datos del cliente se han actulizado correctamente';
            $this->session->set_flashdata('success',$mensaje);
            redirect('reserva/ver_reserva/' . $id_reserva);
         }

     }else {
        $mensaje = '¡Debe rellenar todos los campos!';
        $this->session->set_flashdata('warning', $mensaje);
        redirect('reserva/ver_reserva/' . $id_reserva);
     }
   }

}


/*$mesano = $this->input->post('busqueda_fecha');

if ($mesano != null) {
    $fecha_busqueda = $mesano;
}else {
    $fecha_busqueda = $fecha->format('Y-m');
}*/
