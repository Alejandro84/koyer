<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cliente_controller extends CI_Controller{

  public function __construct()
  {
     parent::__construct();
     $this->load->model('cliente');
  }

  function index()
  {
     $data['clientes'] = $this->cliente->getAll();

     $this->load->view('template/header');
     $this->load->view('template/nav');
     $this->load->view('cliente/listar', $data);
     $this->load->view('template/footer');

  }

  public function nuevo()
  {
     $this->load->view('template/header');
     $this->load->view('template/nav');
     $this->load->view('cliente/nuevo');
     $this->load->view('template/footer');
  }

  public function guardar()
  {
     $cliente = $this->input->post('cliente');

     if ( $cliente != null )
        {

         $insert = array(
                        'cliente' => $cliente
                     );

           if ( ! $this->cliente->guardar( $insert ) )
           {
              $error = $this->db->_error_message();
              $mensaje = 'No se pudo guardar la informacion en la base de datos: <br>'.$error;
              //$this->session->set_flashdata('error',$mensaje);
              redirect('cliente');
           } else {
              $mensaje = 'Sus datos han sido guardados exitosamente';
              //$this->session->set_flashdata('success',$mensaje);
              redirect('cliente');
           }
        } else {
           $mensaje = '¡Debe rellenar todos los campos!';
           //$this->session->set_flashdata('error', $mensaje);
           redirect('cliente');
        }

  }

  public function editar($id_cliente)
  {
     $data['cliente'] = $this->cliente->getOne($id_cliente);

     $this->load->view('template/header');
     $this->load->view('template/nav');
     $this->load->view('cliente/editar', $data);
     $this->load->view('template/footer');

  }

  public function actualizar()
  {
     $id_cliente = $this->input->post('id_cliente');
     $cliente = $this->input->post('cliente');

     if ( $cliente != null )
        {

         $insert = array(
                        'cliente' => $cliente
                     );

           if ( ! $this->cliente->actualizar( $insert , $id_cliente ) )
           {
              $error = $this->db->_error_message();
              $mensaje = 'No se pudo guardar la informacion en la base de datos: <br>'.$error;
              //$this->session->set_flashdata('error',$mensaje);
              redirect('cliente');
           } else {
              $mensaje = 'Sus datos han sido guardados exitosamente';
              //$this->session->set_flashdata('success',$mensaje);
              redirect('cliente');
           }
        } else {
           $mensaje = '¡Debe rellenar todos los campos!';
           //$this->session->set_flashdata('error', $mensaje);
           redirect('cliente/editar');
        }
  }

  
}
