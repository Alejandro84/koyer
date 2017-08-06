<?php
   defined('BASEPATH') OR exit('No direct script access allowed');

   class Vehiculos_controller extends CI_Controller{

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
         $this->load->view('vehiculo/nuevo');
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

               if ( ! $this->modelo->guardar( $insert ) )
               {
                  //$error = $this->db->_error_message();
                  //$mensaje = 'No se pudo guardar la informacion en la base de datos: <br>'.$error;
                  //$this->session->set_flashdata('error',$mensaje);
                  redirect('modelo');
               } else {
                  //$mensaje = 'Sus datos han sido guardados exitosamente';
                  //$this->session->set_flashdata('success',$mensaje);
                  redirect('modelo');
               }
            } else {
               //$mensaje = '¡Debe rellenar todos los campos!';
               //$this->session->set_flashdata('error', $mensaje);
               redirect('modelo');
            }

      }
}
?>
