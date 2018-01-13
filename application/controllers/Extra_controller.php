<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Extra_controller extends CI_Controller{

  public function __construct()
  {
     parent::__construct();
      $this->load->model('extra');
  }

  function index()
  {
     $data['extras'] = $this->extra->getAll();

     $this->load->view('template/header');
     $this->load->view('template/nav');
     $this->load->view('extra/listar', $data);
     $this->load->view('template/footer');

  }

  public function nuevo()
  {
     $this->load->view('template/header');
     $this->load->view('template/nav');
     $this->load->view('extra/nuevo');
     $this->load->view('template/footer');
  }

  public function guardar()
  {
     $extra = $this->input->post('extra');
     $precio = $this->input->post('precio');
    $por_dia = $this->input->post('por_dia');

     if ( $extra != null && $precio != null)
        {

         $insert = array(
                        'extra' => $extra,
                        'precio' => $precio,
                        'por_dia' => $por_dia
                     );

           if ( ! $this->extra->guardar( $insert ) )
           {
              //$error = $this->db->_error_message();
              $mensaje = 'No se pudo guardar la informacion en la base de datos: <br>'.$error;
              $this->session->set_flashdata('error',$mensaje);
              redirect('extra');
           } else {
              $mensaje = 'Sus datos han sido guardados exitosamente';
              $this->session->set_flashdata('success',$mensaje);
              redirect('extra');
           }
        } else {
           $mensaje = '¡Debe rellenar todos los campos!';
           $this->session->set_flashdata('error', $mensaje);
           redirect('extra');
        }

  }

  public function editar($id_extra)
  {
     $data['extra'] = $this->extra->getOne($id_extra);

     $this->load->view('template/header');
     $this->load->view('template/nav');
     $this->load->view('extra/editar', $data);
     $this->load->view('template/footer');
  }

  public function actualizar()
  {
     $id_extra = $this->input->post('id_extra');
     $extra = $this->input->post('extra');
     $precio = $this->input->post('precio');
     $por_dia = $this->input->post('por_dia');

     if ( $extra != null && $precio != null)
        {

         $insert = array(
                        'extra' => $extra,
                        'precio' => $precio,
                        'por_dia' => $por_dia
                     );

           if ( ! $this->extra->actualizar( $insert , $id_extra ) )
           {
              $error = $this->db->_error_message();
              $mensaje = 'No se pudo guardar la informacion en la base de datos: <br>'.$error;
              $this->session->set_flashdata('error',$mensaje);
              redirect('extra');
           } else {
              $mensaje = 'Sus datos han sido guardados exitosamente';
              $this->session->set_flashdata('success',$mensaje);
              redirect('extra');
           }
        } else {
           $mensaje = '¡Debe rellenar todos los campos!';
           $this->session->set_flashdata('error', $mensaje);
           redirect('extra/editar');
        }
  }

  public function borrar($id_extra)
  {
     if ( ! $this->extra->borrar($id_extra) )
         {
            $error = $this->db->_error_message();
            $mensaje = 'No se pudo borrar el elemento: '.$error;
            $this->session->set_flashdata('error', $mensaje );
            redirect('extra');
         } else {
            $mensaje = 'Elemento borrado de manera correcta.';
            $this->session->set_flashdata('success', $mensaje );
            redirect('extra');
         }
  }


  function papelera()
  {
     $data['extras'] = $this->extra->getTrash();

     $this->load->view('template/header');
     $this->load->view('template/nav');
     $this->load->view('extra/papelera', $data);
     $this->load->view('template/footer');


  }

  public function activar($id_extra)
  {
     if ( ! $this->extra->activar($id_extra) )
         {
            $error = $this->db->_error_message();
            $mensaje = 'No se pudo borrar el elemento: '.$error;
            $this->session->set_flashdata('error', $mensaje );
            redirect('extra/papelera');
         } else {

            $mensaje = 'Elemento recuperado de manera correcta!';
            $this->session->set_flashdata('success', $mensaje );
            redirect('extra');
         }
  }
}
