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

     if ( $marca != null )
        {

         $insert = array(
                        'marca' => $marca
                     );

           if ( ! $this->marca->guardar( $insert ) )
           {
              //$error = $this->db->_error_message();
              //$mensaje = 'No se pudo guardar la informacion en la base de datos: <br>'.$error;
              //$this->session->set_flashdata('error',$mensaje);
              redirect('marca');
           } else {
              //$mensaje = 'Sus datos han sido guardados exitosamente';
              //$this->session->set_flashdata('success',$mensaje);
              redirect('marca');
           }
        } else {
           //$mensaje = '¡Debe rellenar todos los campos!';
           //$this->session->set_flashdata('error', $mensaje);
           redirect('marca');
        }

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

     if ( $marca != null )
        {

         $insert = array(
                        'marca' => $marca
                     );

           if ( ! $this->marca->actualizar( $insert , $id_marca ) )
           {
              $error = $this->db->_error_message();
              $mensaje = 'No se pudo guardar la informacion en la base de datos: <br>'.$error;
              //$this->session->set_flashdata('error',$mensaje);
              redirect('marca/nuevo');
           } else {
              $mensaje = 'Sus datos han sido guardados exitosamente';
              //$this->session->set_flashdata('success',$mensaje);
              redirect('marca');
           }
        } else {
           $mensaje = '¡Debe rellenar todos los campos!';
           //$this->session->set_flashdata('error', $mensaje);
           redirect('marca/editar');
        }
  }

  public function borrar($id_marca)
  {
     if ( ! $this->marca->borrar($id_marca) )
         {
            //$error = $this->db->_error_message();
            $mensaje = 'No se pudo borrar el elemento: '.$error;
            // el flash data para mostrarlo en el listado
            //$this->session->set_flashdata('error', $mensaje );
            redirect('marca');
         } else {
            // todo ok, creamos el mensaje y lo enviamos
            //$mensaje = 'Elemento borrado de manera correcta. <a href="'.site_url('admin/taxis/papelera').'">¿Desea recuperarlo?</a>';
            //$this->session->set_flashdata('success', $mensaje );
            redirect('marca');
         }
  }
}
