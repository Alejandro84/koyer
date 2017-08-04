<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Combustible_controller extends CI_Controller{

  public function __construct()
  {
     parent::__construct();
      $this->load->model('combustible');
  }

  function index()
  {
     $data['combustibles'] = $this->combustible->getAll();

     $this->load->view('combustible/listar', $data);


  }

  public function nuevo()
  {
     $this->load->view('combustible/nuevo');
  }

  public function guardar()
  {
     $combustible = $this->input->post('combustible');

     if ( $combustible != null )
        {

         $insert = array(
                        'combustible' => $combustible
                     );

           if ( ! $this->combustible->guardar( $insert ) )
           {
              //$error = $this->db->_error_message();
              //$mensaje = 'No se pudo guardar la informacion en la base de datos: <br>'.$error;
              //$this->session->set_flashdata('error',$mensaje);
              redirect('combustible');
           } else {
              //$mensaje = 'Sus datos han sido guardados exitosamente';
              //$this->session->set_flashdata('success',$mensaje);
              redirect('combustible');
           }
        } else {
           //$mensaje = '¡Debe rellenar todos los campos!';
           //$this->session->set_flashdata('error', $mensaje);
           redirect('combustible');
        }

  }

  public function editar($id_combustible)
  {
     $data['combustible'] = $this->combustible->getOne($id_combustible);
     $this->load->view('combustible/editar', $data);
  }

  public function actualizar()
  {
     $id_combustible = $this->input->post('id_combustible');
     $combustible = $this->input->post('combustible');

     if ( $combustible != null )
        {

         $insert = array(
                        'combustible' => $combustible
                     );

           if ( ! $this->combustible->actualizar( $insert , $id_combustible ) )
           {
              $error = $this->db->_error_message();
              $mensaje = 'No se pudo guardar la informacion en la base de datos: <br>'.$error;
              //$this->session->set_flashdata('error',$mensaje);
              redirect('combustible/nuevo');
           } else {
              $mensaje = 'Sus datos han sido guardados exitosamente';
              //$this->session->set_flashdata('success',$mensaje);
              redirect('combustible');
           }
        } else {
           $mensaje = '¡Debe rellenar todos los campos!';
           //$this->session->set_flashdata('error', $mensaje);
           redirect('combustible/editar');
        }
  }

  public function borrar($id_combustible)
  {
     if ( ! $this->combustible->borrar($id_combustible) )
         {
            //$error = $this->db->_error_message();
            $mensaje = 'No se pudo borrar el elemento: '.$error;
            // el flash data para mostrarlo en el listado
            //$this->session->set_flashdata('error', $mensaje );
            redirect('combustible');
         } else {
            // todo ok, creamos el mensaje y lo enviamos
            $mensaje = 'Elemento borrado de manera correcta. <a href="'.site_url('admin/taxis/papelera').'">¿Desea recuperarlo?</a>';
            //$this->session->set_flashdata('success', $mensaje );
            redirect('combustible');
         }
  }
}
