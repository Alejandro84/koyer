<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Marca_controller extends CI_Controller{

  public function __construct()
  {
     parent::__construct();
      $this->load->model('marca');
  }

  function index()
  {
     $data['marcas'] = $this->marca->getAll();

     $this->load->view('marca/listar', $data);


  }

  public function nuevo()
  {
     $this->load->view('marca/nuevo');
  }

  public function guardar()
  {
     $marca = $this->input->post('marca');

     $insert = array(
               'marca' => $marca
            );

     $this->marca->guardar( $insert );

      redirect('marca');
  }

  public function editar($id_marca)
  {
     $data['marca'] = $this->marca->getOne($id_marca);
     $this->load->view('marca/editar', $data);
  }

  public function actualizar()
  {
     $id_marca = $this->input->post('id_marca');
     $marca = $this->input->post('marca');

     $insert = array(
               'marca' => $marca
            );

     $this->marca->actualizar( $insert , $id_marca );
     redirect('marca');
  }

  public function borrar($id_marca)
  {
     $data['marca'] = $this->marca->borrar($id_marca);
     redirect('marca');
  }
}
