<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Categoria_controller extends CI_Controller{

  public function __construct()
  {
     parent::__construct();
      $this->load->model('categoria');
  }

  function index()
  {
     $data['categorias'] = $this->categoria->getAll();

     $this->load->view('categoria/listar', $data);


  }

  public function nuevo()
  {
     $this->load->view('categoria/nuevo');
  }

  public function guardar()
  {
     $categoria = $this->input->post('categoria');

     $insert = array(
               'categoria' => $categoria
            );

     $this->categoria->guardar( $insert );

      redirect('categoria');
  }

  public function editar($id_categoria)
  {
     $data['categoria'] = $this->categoria->getOne($id_categoria);
     $this->load->view('categoria/editar', $data);
  }

  public function actualizar()
  {
     $id_categoria = $this->input->post('id_categoria');
     $categoria = $this->input->post('categoria');

     $insert = array(
               'categoria' => $categoria
            );

     $this->categoria->actualizar( $insert , $id_categoria );
     redirect('categoria');
  }

  public function borrar($id_categoria)
  {
     $data['categoria'] = $this->categoria->borrar($id_categoria);
     redirect('categoria');
  }
}
