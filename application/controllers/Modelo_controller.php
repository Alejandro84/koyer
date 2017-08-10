<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Modelo_controller extends CI_Controller{

  public function __construct()
  {
     parent::__construct();
      $this->load->model('modelo');
  }

  function index()
  {
     $data['modelos'] = $this->modelo->getAll();

     $this->load->view('template/header');
     $this->load->view('template/nav');
     $this->load->view('modelo/listar', $data);
     $this->load->view('template/footer');
  }

  public function nuevo()
  {
     $data['marcas'] = $this->modelo->getMarca();

     $this->load->view('template/header');
     $this->load->view('template/nav');
     $this->load->view('modelo/nuevo' , $data);
     $this->load->view('template/footer');

  }

  public function guardar()
  {
     $modelo = $this->input->post('modelo');
     $id_marca = $this->input->post('id_marca');

     if ( $modelo != null && $id_marca != null)
        {

         $insert = array(
                        'modelo' => $modelo,
                        'id_marca' => $id_marca
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

  public function editar($id_modelo)
  {
      $this->load->model('marca');
      $data = array(
        'modelo' => $this->modelo->getOne($id_modelo),
        'marca' => $this->marca->getAll()
      );

      $this->load->view('template/header');
      $this->load->view('template/nav');
      $this->load->view('modelo/editar', $data);
      $this->load->view('template/footer');
  }

  public function actualizar()
  {
     $id_modelo = $this->input->post('id_modelo');
     $modelo = $this->input->post('modelo');
     $id_marca = $this->input->post('id_marca');

     if ( $modelo != null )
        {

         $insert = array(
                        'modelo' => $modelo,
                        'id_marca' => $id_marca
                     );

           if ( ! $this->modelo->actualizar( $insert , $id_modelo ) )
           {
              $error = $this->db->_error_message();
              $mensaje = 'No se pudo guardar la informacion en la base de datos: <br>'.$error;
              //$this->session->set_flashdata('error',$mensaje);
              redirect('modelo/nuevo');
           } else {
              $mensaje = 'Sus datos han sido guardados exitosamente';
              //$this->session->set_flashdata('success',$mensaje);
              redirect('modelo');
           }
        } else {
           $mensaje = '¡Debe rellenar todos los campos!';
           //$this->session->set_flashdata('error', $mensaje);
           redirect('modelo/editar');
        }
  }

  public function borrar($id_modelo)
  {
     if ( ! $this->modelo->borrar($id_modelo) )
         {
            //$error = $this->db->_error_message();
            $mensaje = 'No se pudo borrar el elemento: '.$error;
            // el flash data para mostrarlo en el listado
            //$this->session->set_flashdata('error', $mensaje );
            redirect('modelo');
         } else {
            // todo ok, creamos el mensaje y lo enviamos
            //$mensaje = 'Elemento borrado de manera correcta. <a href="'.site_url('admin/taxis/papelera').'">¿Desea recuperarlo?</a>';
            //$this->session->set_flashdata('success', $mensaje );
            redirect('modelo');
         }
  }
  function papelera()
  {
     $data['modelos'] = $this->modelo->getTrash();

     $this->load->view('template/header');
     $this->load->view('template/nav');
     $this->load->view('modelo/papelera', $data);
     $this->load->view('template/footer');


  }

  public function activar($id_modelo)
  {
     if ( ! $this->modelo->activar($id_modelo) )
         {
            //$error = $this->db->_error_message();
            $mensaje = 'No se pudo borrar el elemento: '.$error;
            // el flash data para mostrarlo en el listado
            //$this->session->set_flashdata('error', $mensaje );
            redirect('modelo');
         } else {
            // todo ok, creamos el mensaje y lo enviamos
            //$mensaje = 'Elemento borrado de manera correcta. <a href="'.site_url('admin/taxis/papelera').'">¿Desea recuperarlo?</a>';
            //$this->session->set_flashdata('success', $mensaje );
            redirect('modelo');
         }
  }
}
