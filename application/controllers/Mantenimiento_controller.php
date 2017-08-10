<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mantenimiento_controller extends CI_Controller{

  public function __construct()
  {
     parent::__construct();
      $this->load->model('mantenimiento');
      $this->load->model('tipo_mantenimiento');
  }

  function index()
  {
     $data = array(
        'mantenimientos' => $this->mantenimiento->getAll(),
        'tipos_mantenimientos' => $this->tipo_mantenimiento->getAll()
     );

     $this->load->view('mantenimiento/listar', $data);
  }

  public function nuevo()
  {
     $this->load->model('vehiculo');

     $data = array(
      'vehiculos' => $this->vehiculo->getAll(),
      'mantenimientos' => $this->mantenimiento->getAll(),
      'tipos_mantenimientos' => $this->tipo_mantenimiento->getAll()
    );
     $this->load->view('mantenimiento/nuevo' , $data);

  }

  public function guardar()
  {
     $id_tipo_mantenimiento = $this->input->post('id_tipo_mantenimiento');
     $costo = $this->input->post('costo');
     $id_vehiculo = $this->input->post('id_vehiculo');
     $comentario = $this->input->post('comentario');
     $fecha_mantencion = $this->input->post('fecha_mantencion');

     if ( $id_tipo_mantenimiento != null && $costo != null && $id_vehiculo != null && $comentario != null && $fecha_mantencion != null )
        {

         $insert = array(
                        'id_tipo_mantenimiento' => $id_tipo_mantenimiento,
                        'costo' => $costo,
                        'id_vehiculo' => $id_vehiculo,
                        'comentario' => $comentario,
                        'fecha_mantencion' => $fecha_mantencion
                     );

           if ( ! $this->mantenimiento->guardar( $insert ) )
           {
              //$error = $this->db->_error_message();
              //$mensaje = 'No se pudo guardar la informacion en la base de datos: <br>'.$error;
              //$this->session->set_flashdata('error',$mensaje);
              redirect('mantenimiento');
           } else {
              //$mensaje = 'Sus datos han sido guardados exitosamente';
              //$this->session->set_flashdata('success',$mensaje);
              redirect('mantenimiento');
           }
        } else {
           //$mensaje = '¡Debe rellenar todos los campos!';
           //$this->session->set_flashdata('error', $mensaje);
           redirect('mantenimiento');
        }

  }

  public function editar($id_mantenimiento)
  {
     $this->load->model('vehiculo');

     $data = array(
      'mantenimientos' => $this->mantenimiento->getOne($id_mantenimiento),
      'tipos_mantenimientos' => $this->tipo_mantenimiento->getAll()
    );

     $this->load->view('mantenimiento/editar', $data);
  }

  public function actualizar()
  {
     $id_mantenimiento = $this->input->post('id_mantenimiento');
     $id_tipo_mantenimiento = $this->input->post('id_tipo_mantenimiento');
     $costo = $this->input->post('costo');
     $id_vehiculo = $this->input->post('id_vehiculo');
     $comentario = $this->input->post('comentario');
     $fecha_mantencion = $this->input->post('fecha_mantencion');

     if ( $id_tipo_mantenimiento != null && $costo != null && $id_vehiculo != null && $comentario != null && $fecha_mantencion != null )
       {

         $insert = array(
                        'id_tipo_mantenimiento' => $id_tipo_mantenimiento,
                        'costo' => $costo,
                        'id_vehiculo' => $id_vehiculo,
                        'comentario' => $comentario,
                        'fecha_mantencion' => $fecha_mantencion
                     );

           if ( ! $this->mantenimiento->actualizar( $insert , $id_mantenimiento ) )
           {
              $error = $this->db->_error_message();
              $mensaje = 'No se pudo guardar la informacion en la base de datos: <br>'.$error;
              //$this->session->set_flashdata('error',$mensaje);
              redirect('mantenimiento');
           } else {
              $mensaje = 'Sus datos han sido guardados exitosamente';
              //$this->session->set_flashdata('success',$mensaje);
              redirect('mantenimiento');
           }
        } else {
           $mensaje = '¡Debe rellenar todos los campos!';
           //$this->session->set_flashdata('error', $mensaje);
           redirect('mantenimiento/editar');
        }
  }

  public function borrar($id_mantenimiento)
  {
     if ( ! $this->mantenimiento->borrar($id_mantenimiento) )
         {
            //$error = $this->db->_error_message();
            $mensaje = 'No se pudo borrar el elemento: '.$error;
            // el flash data para mostrarlo en el listado
            //$this->session->set_flashdata('error', $mensaje );
            redirect('mantenimiento');
         } else {
            // todo ok, creamos el mensaje y lo enviamos
            //$mensaje = 'Elemento borrado de manera correcta. <a href="'.site_url('admin/taxis/papelera').'">¿Desea recuperarlo?</a>';
            //$this->session->set_flashdata('success', $mensaje );
            redirect('mantenimiento');
         }
  }
}