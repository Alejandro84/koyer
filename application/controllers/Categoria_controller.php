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

     if ( $categoria != null )
        {

         $insert = array(
                        'categoria' => $categoria
                     );

           if ( ! $this->categoria->guardar( $insert ) )
           {
              //$error = $this->db->_error_message();
              //$mensaje = 'No se pudo guardar la informacion en la base de datos: <br>'.$error;
              //$this->session->set_flashdata('error',$mensaje);
              redirect('categoria');
           } else {
              //$mensaje = 'Sus datos han sido guardados exitosamente';
              //$this->session->set_flashdata('success',$mensaje);
              redirect('categoria');
           }
        } else {
           //$mensaje = '¡Debe rellenar todos los campos!';
           //$this->session->set_flashdata('error', $mensaje);
           redirect('categoria');
        }

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

     if ( $categoria != null )
        {

         $insert = array(
                        'categoria' => $categoria
                     );

           if ( ! $this->categoria->actualizar( $insert , $id_categoria ) )
           {
              $error = $this->db->_error_message();
              $mensaje = 'No se pudo guardar la informacion en la base de datos: <br>'.$error;
              //$this->session->set_flashdata('error',$mensaje);
              redirect('categoria/nuevo');
           } else {
              $mensaje = 'Sus datos han sido guardados exitosamente';
              //$this->session->set_flashdata('success',$mensaje);
              redirect('categoria');
           }
        } else {
           $mensaje = '¡Debe rellenar todos los campos!';
           //$this->session->set_flashdata('error', $mensaje);
           redirect('categoria/editar');
        }
  }

  public function borrar($id_categoria)
  {
     if ( ! $this->categoria->borrar($id_categoria) )
         {
            //$error = $this->db->_error_message();
            $mensaje = 'No se pudo borrar el elemento: '.$error;
            // el flash data para mostrarlo en el listado
            //$this->session->set_flashdata('error', $mensaje );
            redirect('categoria');
         } else {
            // todo ok, creamos el mensaje y lo enviamos
            $mensaje = 'Elemento borrado de manera correcta. <a href="'.site_url('admin/taxis/papelera').'">¿Desea recuperarlo?</a>';
            //$this->session->set_flashdata('success', $mensaje );
            redirect('categoria');
         }
  }
}
