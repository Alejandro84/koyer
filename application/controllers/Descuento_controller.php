<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Descuento_controller extends CI_Controller{

  public function __construct()
  {
     parent::__construct();
      $this->load->model('descuento');
  }

  function index()
  {
     $data['descuentos'] = $this->descuento->getAll();

     $this->load->view('template/header');
     $this->load->view('template/nav');
     $this->load->view('descuento/listar', $data);
     $this->load->view('template/footer');

  }

  public function nuevo()
  {
     $this->load->view('template/header');
     $this->load->view('template/nav');
     $this->load->view('descuento/nuevo');
     $this->load->view('template/footer');
  }

  public function guardar()
  {
     $descuento = $this->input->post('descuento');
     $valor = $this->input->post('valor');

     if ( $descuento != null && $valor != null)
        {

         $insert = array(
                        'descuento' => $descuento,
                        'valor' => $valor
                     );

           if ( ! $this->descuento->guardar( $insert ) )
           {
              $error = $this->db->_error_message();
              $mensaje = 'No se pudo guardar la informacion en la base de datos: <br>'.$error;
              $this->session->set_flashdata('error',$mensaje);
              redirect('descuento');
           } else {
              $mensaje = 'Sus datos han sido guardados exitosamente';
              $this->session->set_flashdata('success',$mensaje);
              redirect('descuento');
           }
        } else {
           $mensaje = '¡Debe rellenar todos los campos!';
           $this->session->set_flashdata('error', $mensaje);
           redirect('descuento');
        }

  }

  public function editar($id_descuento)
  {
     $data['descuento'] = $this->descuento->getOne($id_descuento);

     $this->load->view('template/header');
     $this->load->view('template/nav');
     $this->load->view('descuento/editar', $data);
     $this->load->view('template/footer');
  }

  public function actualizar()
  {
     $id_descuento = $this->input->post('id_descuento');
     $descuento = $this->input->post('descuento');
     $valor = $this->input->post('valor');

     if ( $descuento != null && $valor != null)
        {

         $insert = array(
                        'descuento' => $descuento,
                        'valor' => $valor
                     );

           if ( ! $this->descuento->actualizar( $insert , $id_descuento ) )
           {
              $error = $this->db->_error_message();
              $mensaje = 'No se pudo guardar la informacion en la base de datos: <br>'.$error;
              $this->session->set_flashdata('error',$mensaje);
              redirect('descuento/nuevo');
           } else {
              $mensaje = 'Sus datos han sido guardados exitosamente';
              $this->session->set_flashdata('success',$mensaje);
              redirect('descuento');
           }
        } else {
           $mensaje = '¡Debe rellenar todos los campos!';
           //$this->session->set_flashdata('error', $mensaje);
           redirect('descuento/editar');
        }
  }

  public function borrar($id_descuento)
  {
     if ( ! $this->descuento->borrar($id_descuento) )
         {
            $error = $this->db->_error_message();
            $mensaje = 'No se pudo borrar el elemento: '.$error;
            $this->session->set_flashdata('error', $mensaje );
            redirect('descuento');
         } else {
            $mensaje = 'Elemento borrado de manera correcta.';
            $this->session->set_flashdata('success', $mensaje );
            redirect('descuento');
         }
  }


  function papelera()
  {
     $data['descuentos'] = $this->descuento->getTrash();

     $this->load->view('template/header');
     $this->load->view('template/nav');
     $this->load->view('descuento/papelera', $data);
     $this->load->view('template/footer');


  }

  public function activar($id_descuento)
  {
     if ( ! $this->descuento->activar($id_descuento) )
         {
            //$error = $this->db->_error_message();
            $mensaje = 'No se pudo borrar el elemento: '.$error;
            // el flash data para mostrarlo en el listado
            //$this->session->set_flashdata('error', $mensaje );
            redirect('descuento');
         } else {
            // todo ok, creamos el mensaje y lo enviamos
            //$mensaje = 'Elemento borrado de manera correcta. <a href="'.site_url('admin/taxis/papelera').'">¿Desea recuperarlo?</a>';
            //$this->session->set_flashdata('success', $mensaje );
            redirect('descuento');
         }
  }
}
