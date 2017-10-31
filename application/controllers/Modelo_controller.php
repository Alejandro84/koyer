<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Modelo_controller extends CI_Controller{

  public function __construct()
  {
     parent::__construct();
      $this->load->model('modelo');
      $this->load->model('tarifa');
      $this->load->model('marca');
  }

  function index()
  {
     $data = array(
        'modelos' => $this->modelo->getAll(),
        'marcas' => $this->modelo->getMarca(),
      );

     $this->load->view('template/header', $data);
     $this->load->view('template/nav');
     $this->load->view('modelo/listar');
     $this->load->view('template/footer');
  }

  public function nuevo()
  {
     $data['marcas'] = $this->modelo->getMarca();

     $this->load->view('template/header', $data);
     $this->load->view('template/nav');
     $this->load->view('modelo/nuevo');
     $this->load->view('template/footer');

  }

  public function guardar()
  {
     $modelo = $this->input->post('modelo');
     $id_marca = $this->input->post('id_marca');
     $tarifa = $this->input->post('precio');

     if ( $modelo != null && $id_marca != null && $tarifa != null)
        {

         $insert = array(
                        'modelo' => $modelo,
                        'id_marca' => $id_marca
                     );

           if ( ! $this->modelo->guardar( $insert ) )
           {
              $error = $this->db->_error_message();
              $mensaje = 'No se pudo guardar la informacion en la base de datos: <br>'.$error;
              $this->session->set_flashdata('error',$mensaje);
              redirect('modelo');
           } else {
              $mensaje = 'Sus datos han sido guardados exitosamente';
              $this->session->set_flashdata('success',$mensaje);

              $id_modelo = $this->modelo->getID($modelo);

              $insert2 = array(
                 'precio' => $tarifa,
                 'id_modelo' => $id_modelo['0']->id_modelo
               );
              $this->tarifa->guardar($insert2);
              redirect('modelo');
           }
        } else {
           $mensaje = '¡Debe rellenar todos los campos!';
           $this->session->set_flashdata('error', $mensaje);
           redirect('modelo');
        }

  }

  public function editar($id_modelo)
  {
      $data = array(
        'modelos' => $this->modelo->getOne($id_modelo),
        'marcas' => $this->marca->getAll(),

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
            //$this->session->set_flashdata('error', $mensaje );
            redirect('modelo');
         } else {
            $mensaje = 'Elemento borrado de manera correcta. <a href="'.site_url('admin/taxis/papelera').'">¿Desea recuperarlo?</a>';
            //$this->session->set_flashdata('success', $mensaje );
            redirect('modelo');
         }
  }
  function papelera()
  {
     //$data['modelos'] = $this->modelo->getTrash();

     $this->load->model('marca');
     $data = array(
      'modelos' => $this->modelo->getTrash(),
      'marcas' => $this->marca->getTrash()
     );

     $this->load->view('template/header', $data);
     $this->load->view('template/nav');
     $this->load->view('modelo/papelera');
     $this->load->view('template/footer');


  }

  public function activar($id_modelo)
  {
     if ( ! $this->modelo->activar($id_modelo) )
         {
            //$error = $this->db->_error_message();
            $mensaje = 'No se pudo borrar el elemento: '.$error;
            //$this->session->set_flashdata('error', $mensaje );
            redirect('modelo');
         } else {
            $mensaje = 'Elemento borrado de manera correcta. <a href="'.site_url('admin/taxis/papelera').'">¿Desea recuperarlo?</a>';
            //$this->session->set_flashdata('success', $mensaje );
            redirect('modelo');
         }
  }
}
