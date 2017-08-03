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

     $insert = array(
               'transmision' => $transmision
            );

     $this->transmision->guardar( $insert );

      redirect('transmision');
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

     $insert = array(
               'transmision' => $transmision
            );

     $this->transmision->actualizar( $insert , $id_transmision );
     redirect('transmision');
  }

  public function borrar($id_transmision)
  {
     $data['transmision'] = $this->transmision->borrar($id_transmision);
     redirect('transmision');
  }
}
