<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Impuesto_controller extends CI_Controller{

  public function __construct()
  {
     parent::__construct();
      $this->load->model('impuesto');
  }

  function index()
  {
     $data['impuestos'] = $this->impuesto->getAll();

     $this->load->view('template/header');
     $this->load->view('template/nav');
     $this->load->view('impuesto/listar', $data);
     $this->load->view('template/footer');

  }

  public function nuevo()
  {
     $this->load->view('template/header');
     $this->load->view('template/nav');
     $this->load->view('impuesto/nuevo');
     $this->load->view('template/footer');
  }

  public function guardar()
  {
     $impuesto = $this->input->post('impuesto');
     $valor = $this->input->post('valor');

     if ( $impuesto != null && $valor != null )
        {

         $insert = array(
                        'impuesto' => $impuesto,
                        'valor' => $valor
                     );

           if ( ! $this->impuesto->guardar( $insert ) )
           {
              //$error = $this->db->_error_message();
              //$mensaje = 'No se pudo guardar la informacion en la base de datos: <br>'.$error;
              //$this->session->set_flashdata('error',$mensaje);
              redirect('impuesto');
           } else {
              //$mensaje = 'Sus datos han sido guardados exitosamente';
              //$this->session->set_flashdata('success',$mensaje);
              redirect('impuesto');
           }
        } else {
           //$mensaje = '¡Debe rellenar todos los campos!';
           //$this->session->set_flashdata('error', $mensaje);
           redirect('impuesto');
        }

  }

  public function editar($id_impuesto)
  {
     $data['impuesto'] = $this->impuesto->getOne($id_impuesto);

     $this->load->view('template/header');
     $this->load->view('template/nav');
     $this->load->view('impuesto/editar', $data);
     $this->load->view('template/footer');
  }

  public function actualizar()
  {
     $id_impuesto = $this->input->post('id_impuesto');
     $impuesto = $this->input->post('impuesto');
     $valor = $this->input->post('valor');

     if ( $impuesto != null && $valor != null  )
        {

         $insert = array(
                        'impuesto' => $impuesto,
                        'valor' => $valor
                     );

           if ( ! $this->impuesto->actualizar( $insert , $id_impuesto ) )
           {
              $error = $this->db->_error_message();
              $mensaje = 'No se pudo guardar la informacion en la base de datos: <br>'.$error;
              //$this->session->set_flashdata('error',$mensaje);
              redirect('impuesto/nuevo');
           } else {
              $mensaje = 'Sus datos han sido guardados exitosamente';
              //$this->session->set_flashdata('success',$mensaje);
              redirect('impuesto');
           }
        } else {
           $mensaje = '¡Debe rellenar todos los campos!';
           //$this->session->set_flashdata('error', $mensaje);
           redirect('impuesto/editar');
        }
  }

  public function borrar($id_impuesto)
  {
     if ( ! $this->impuesto->borrar($id_impuesto) )
         {
            //$error = $this->db->_error_message();
            $mensaje = 'No se pudo borrar el elemento: '.$error;
            // el flash data para mostrarlo en el listado
            //$this->session->set_flashdata('error', $mensaje );
            redirect('impuesto');
         } else {
            // todo ok, creamos el mensaje y lo enviamos
            //$mensaje = 'Elemento borrado de manera correcta. <a href="'.site_url('admin/taxis/papelera').'">¿Desea recuperarlo?</a>';
            //$this->session->set_flashdata('success', $mensaje );
            redirect('impuesto');
         }
  }


  function papelera()
  {
     $data['impuestos'] = $this->impuesto->getTrash();

     $this->load->view('template/header');
     $this->load->view('template/nav');
     $this->load->view('impuesto/papelera', $data);
     $this->load->view('template/footer');


  }

  public function activar($id_impuesto)
  {
     if ( ! $this->impuesto->activar($id_impuesto) )
         {
            //$error = $this->db->_error_message();
            $mensaje = 'No se pudo borrar el elemento: '.$error;
            // el flash data para mostrarlo en el listado
            //$this->session->set_flashdata('error', $mensaje );
            redirect('impuesto');
         } else {
            // todo ok, creamos el mensaje y lo enviamos
            //$mensaje = 'Elemento borrado de manera correcta. <a href="'.site_url('admin/taxis/papelera').'">¿Desea recuperarlo?</a>';
            //$this->session->set_flashdata('success', $mensaje );
            redirect('impuesto');
         }
  }
}
