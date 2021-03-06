<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transmision_controller extends CI_Controller{

  public function __construct()
  {
     parent::__construct();
      $this->load->model('transmision');
  }

  function index()
  {
     $data['transmisiones'] = $this->transmision->getAll();

     $this->load->view('transmision/listar', $data);


  }

  public function nuevo()
  {
     $this->load->view('transmision/nuevo');
  }

  public function guardar()
  {
     $transmision = $this->input->post('transmision');

     if ( $transmision != null )
        {

         $insert = array(
                        'transmision' => $transmision
                     );

           if ( ! $this->transmision->guardar( $insert ) )
           {
              //$error = $this->db->_error_message();
              //$mensaje = 'No se pudo guardar la informacion en la base de datos: <br>'.$error;
              //$this->session->set_flashdata('error',$mensaje);
              redirect('transmision');
           } else {
              //$mensaje = 'Sus datos han sido guardados exitosamente';
              //$this->session->set_flashdata('success',$mensaje);
              redirect('transmision');
           }
        } else {
           //$mensaje = '¡Debe rellenar todos los campos!';
           //$this->session->set_flashdata('error', $mensaje);
           redirect('transmision');
        }

  }

  public function editar($id_transmision)
  {
     $data['transmision'] = $this->transmision->getOne($id_transmision);
     $this->load->view('transmision/editar', $data);
  }

  public function actualizar()
  {
     $id_transmision = $this->input->post('id_transmision');
     $transmision = $this->input->post('transmision');

     if ( $transmision != null )
        {

         $insert = array(
                        'transmision' => $transmision
                     );

           if ( ! $this->transmision->actualizar( $insert , $id_transmision ) )
           {
              $error = $this->db->_error_message();
              $mensaje = 'No se pudo guardar la informacion en la base de datos: <br>'.$error;
              //$this->session->set_flashdata('error',$mensaje);
              redirect('transmision/nuevo');
           } else {
              $mensaje = 'Sus datos han sido guardados exitosamente';
              //$this->session->set_flashdata('success',$mensaje);
              redirect('transmision');
           }
        } else {
           $mensaje = '¡Debe rellenar todos los campos!';
           //$this->session->set_flashdata('error', $mensaje);
           redirect('transmision/editar');
        }

  }

  public function borrar($id_transmision)
  {

     if ( ! $this->transmision->borrar($id_transmision) )
         {
            //$error = $this->db->_error_message();
            $mensaje = 'No se pudo borrar el elemento: '.$error;
            // el flash data para mostrarlo en el listado
            //$this->session->set_flashdata('error', $mensaje );
            redirect('transmision');
         } else {
            // todo ok, creamos el mensaje y lo enviamos
            //$mensaje = 'Elemento borrado de manera correcta. <a href="'.site_url('admin/taxis/papelera').'">¿Desea recuperarlo?</a>';
            //$this->session->set_flashdata('success', $mensaje );
            redirect('transmision');
         }
  }
}
