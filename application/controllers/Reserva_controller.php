<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reserva_controller extends CI_Controller{

   public function __construct()
   {
      parent::__construct();

      $this->load->model('reserva');

   }

   public function index()
   {
      $data['reservas'] = $this->reserva->getAll();

      $this->load->view('template/header');
      $this->load->view('template/nav');
      $this->load->view('reserva/listar', $data);
      $this->load->view('template/footer');

   }

   public function nuevo()
   {
      $this->load->model('locacion');
      $this->load->model('vehiculo');

      $data = array(
         'locaciones' => $this->locacion->getAll(),
         'vehiculos' => $this->vehiculo->disponible()
      );

       //print('<pre>');
       //print_r($data);
       //print('</pre>');

       $this->load->view('template/header');
       $this->load->view('template/nav');
       $this->load->view('reserva/nuevo', $data);
       $this->load->view('template/footer');

   }

   public function guardar()
   {
      $patente = $this->input->post('patente');
      $id_modelo = $this->input->post('id_modelo');
      $id_marca = $this->input->post('id_marca');
      $id_transmision = $this->input->post('id_transmision');
      $id_categoria = $this->input->post('id_categoria');
      $id_combustible = $this->input->post('id_combustible');
      $id_tarifa = $this->input->post('id_tarifa');

      if ( $patente != null && $id_modelo != null && $id_marca != null && $id_transmision != null && $id_categoria != null && $id_combustible != null && $id_tarifa != null )
         {

          $insert = array(
                         'patente' => $patente,
                         'id_modelo' => $id_modelo,
                         'id_marca' => $id_marca,
                         'id_transmision' => $id_transmision,
                         'id_categoria' => $id_categoria,
                         'id_combustible' => $id_combustible,
                         'id_tarifa' => $id_tarifa
                      );

            if ( ! $this->reserva->guardar( $insert ) )
            {
               //$error = $this->db->_error_message();
               $mensaje = 'No se pudo guardar la informacion en la base de datos: <br>'.$error;
               //$this->session->set_flashdata('error',$mensaje);
               redirect('reserva');
            } else {
               $mensaje = 'Sus datos han sido guardados exitosamente';
               //$this->session->set_flashdata('success',$mensaje);
               redirect('reserva');
            }
         } else {
            $mensaje = '¡Debe rellenar todos los campos!';
            //$this->session->set_flashdata('error', $mensaje);
            redirect('reserva/nuevo');
         }

   }

   public function editar($id_reserva)
   {
      $this->load->model('modelo');
      $this->load->model('marca');
      $this->load->model('combustible');
      $this->load->model('transmision');
      $this->load->model('categoria');
      $this->load->model('tarifa');

      $data = array(
         'reserva' => $this->reserva->getOne($id_reserva),
         'modelo' => $this->modelo->getAll(),
         'marca' => $this->marca->getAll(),
         'combustible' => $this->combustible->getAll(),
         'transmision' => $this->transmision->getAll(),
         'categoria' => $this->categoria->getAll(),
         'tarifa' => $this->tarifa->getAll(),
       );


       $this->load->view('template/header');
       $this->load->view('template/nav');
      $this->load->view('reserva/editar', $data);
      $this->load->view('template/footer');
   }
   public function actualizar()
   {
      $id_reserva = $this->input->post('id_reserva');

      $patente = $this->input->post('patente');
      $id_modelo = $this->input->post('id_modelo');
      $id_marca = $this->input->post('id_marca');
      $id_transmision = $this->input->post('id_transmision');
      $id_categoria = $this->input->post('id_categoria');
      $id_combustible = $this->input->post('id_combustible');
      $id_tarifa = $this->input->post('id_tarifa');

      if ( $patente != null && $id_modelo != null && $id_marca != null && $id_transmision != null && $id_categoria != null && $id_combustible != null && $id_tarifa != null )
         {

          $insert = array(
                         'patente' => $patente,
                         'id_modelo' => $id_modelo,
                         'id_marca' => $id_marca,
                         'id_transmision' => $id_transmision,
                         'id_categoria' => $id_categoria,
                         'id_combustible' => $id_combustible,
                         'id_tarifa' => $id_tarifa
                      );

            if ( ! $this->reserva->actualizar( $insert , $id_reserva) )
            {
               $error = $this->db->_error_message();
               $mensaje = 'No se pudo guardar la informacion en la base de datos: <br>'.$error;
               //$this->session->set_flashdata('error',$mensaje);
               redirect('reserva/editar');
            } else {
               $mensaje = 'Sus datos han sido guardados exitosamente';
               //$this->session->set_flashdata('success',$mensaje);
               redirect('reserva');
            }
         } else {
            $mensaje = '¡Debe rellenar todos los campos!';
            //$this->session->set_flashdata('error', $mensaje);
            redirect('reserva/editar');
         }

   }

   public function borrar($id_reserva)
   {
      if ( ! $this->reserva->borrar($id_reserva) )
          {
             //$error = $this->db->_error_message();
             $mensaje = 'No se pudo borrar el elemento: '.$error;
             // el flash data para mostrarlo en el listado
             //$this->session->set_flashdata('error', $mensaje );
             redirect('reserva');
          } else {
             // todo ok, creamos el mensaje y lo enviamos
             $mensaje = 'Elemento borrado de manera correcta. <a href="'.site_url('admin/taxis/papelera').'">¿Desea recuperarlo?</a>';
             //$this->session->set_flashdata('success', $mensaje );
             redirect('reserva');
          }
   }

   function papelera()
   {

      $data['reservas'] = $this->reserva->getTrash();

      $this->load->view('template/header');
      $this->load->view('template/nav');
      $this->load->view('reserva/papelera', $data);
      $this->load->view('template/footer');

   }

   public function activar($id_reserva)
   {
      if ( ! $this->reserva->activar($id_reserva) )
          {
             //$error = $this->db->_error_message();
             $mensaje = 'No se pudo borrar el elemento: '.$error;
             //$this->session->set_flashdata('error', $mensaje );
             redirect('reserva');
          } else {
             $mensaje = 'Elemento borrado de manera correcta. <a href="'.site_url('admin/taxis/papelera').'">¿Desea recuperarlo?</a>';
             //$this->session->set_flashdata('success', $mensaje );
             redirect('reserva');
          }
   }
}
?>
