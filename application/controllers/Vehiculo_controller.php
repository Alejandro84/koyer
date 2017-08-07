<?php
   defined('BASEPATH') OR exit('No direct script access allowed');

   class Vehiculo_controller extends CI_Controller{

      public function __construct()
      {
         parent::__construct();

         $this->load->model('vehiculo');

      }

      public function index()
      {
         $data['vehiculos'] = $this->vehiculo->getAll();
         $this->load->view('vehiculo/listar', $data);
      }

      public function nuevo()
      {
         $this->load->model('modelo');
         $this->load->model('marca');
         $this->load->model('combustible');
         $this->load->model('transmision');
         $this->load->model('categoria');
         $this->load->model('tarifa');

         $data = array(
            'modelo' => $this->modelo->getAll(),
            'marca' => $this->marca->getAll(),
            'combustible' => $this->combustible->getAll(),
            'transmision' => $this->transmision->getAll(),
            'categoria' => $this->categoria->getAll(),
            'tarifa' => $this->tarifa->getAll(),
          );

          //echo "<pre>";
          //print_r($data);
          //echo "</pre>";

         $this->load->view('vehiculo/nuevo' , $data);
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

               if ( ! $this->vehiculo->guardar( $insert ) )
               {
                  //$error = $this->db->_error_message();
                  //$mensaje = 'No se pudo guardar la informacion en la base de datos: <br>'.$error;
                  //$this->session->set_flashdata('error',$mensaje);
                  redirect('vehiculo');
               } else {
                  //$mensaje = 'Sus datos han sido guardados exitosamente';
                  //$this->session->set_flashdata('success',$mensaje);
                  redirect('vehiculo');
               }
            } else {
               //$mensaje = '¡Debe rellenar todos los campos!';
               //$this->session->set_flashdata('error', $mensaje);
               redirect('vehiculo');
            }

      }

      public function editar($id_vehiculo)
      {
         $this->load->model('modelo');
         $this->load->model('marca');
         $this->load->model('combustible');
         $this->load->model('transmision');
         $this->load->model('categoria');
         $this->load->model('tarifa');

         $data = array(
            'vehiculo' => $this->vehiculo->getOne($id_vehiculo),
            'modelo' => $this->modelo->getAll(),
            'marca' => $this->marca->getAll(),
            'combustible' => $this->combustible->getAll(),
            'transmision' => $this->transmision->getAll(),
            'categoria' => $this->categoria->getAll(),
            'tarifa' => $this->tarifa->getAll(),
          );

         //$data['vehiculo'] = $this->vehiculo->getOne($id_vehiculo);

         //echo "<pre>";
         //print_r($data);
         //echo "<pre>";
         $this->load->view('vehiculo/editar', $data);
      }
      public function actualizar()
      {
         $id_vehiculo = $this->input->post('id_vehiculo');
         
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

               if ( ! $this->vehiculo->actualizar( $insert , $id_vehiculo) )
               {
                  //$error = $this->db->_error_message();
                  //$mensaje = 'No se pudo guardar la informacion en la base de datos: <br>'.$error;
                  //$this->session->set_flashdata('error',$mensaje);
                  redirect('vehiculo');
               } else {
                  //$mensaje = 'Sus datos han sido guardados exitosamente';
                  //$this->session->set_flashdata('success',$mensaje);
                  redirect('vehiculo');
               }
            } else {
               //$mensaje = '¡Debe rellenar todos los campos!';
               //$this->session->set_flashdata('error', $mensaje);
               redirect('vehiculo');
            }

      }
}
?>
