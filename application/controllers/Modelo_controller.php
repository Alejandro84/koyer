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
     $this->load->view('modelo/listar', $data);
  }

  public function nuevo()
  {
     $data['marcas'] = $this->modelo->getMarca();
     $this->load->view('modelo/nuevo' , $data);

  }

  public function guardar()
  {
     $modelo = $this->input->post('modelo');
     $id_marca = $this->input->post('id_marca');

     $insert = array(
               'modelo' => $modelo,
               'id_marca' => $id_marca
            );

     $this->modelo->guardar( $insert );

      redirect('modelo');
  }

  public function editar($id_modelo)
  {
     $data['modelo'] = $this->modelo->getOne($id_modelo);

     $this->load->view('modelo/editar', $data);
  }

  public function actualizar()
  {
     $id_modelo = $this->input->post('id_modelo');
     $modelo = $this->input->post('modelo');
     $id_marca = $this->input->post('id_marca');

     $insert = array(
               'modelo' => $modelo,
               'id_marca' => $id_marca
            );

     $this->modelo->actualizar( $insert , $id_modelo );

     redirect('modelo');
  }

  public function borrar($id_modelo)
  {
     $data['modelo'] = $this->modelo->borrar($id_modelo);
     redirect('modelo');
  }
}
