<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario_controller extends CI_Controller{

  public function __construct()
  {
     parent::__construct();
      $this->load->model('usuario');
  }

  function index()
  {
     $data['usuarios'] = $this->usuario->getAll();

     $this->load->view('template/header');
     $this->load->view('template/nav');
     $this->load->view('usuario/listar', $data);
     $this->load->view('template/footer');

  }

  public function nuevo()
  {
     $this->load->view('template/header');
     $this->load->view('template/nav');
     $this->load->view('usuario/nuevo');
     $this->load->view('template/footer');
  }

  public function guardar()
  {
     $nombre = $this->input->post('nombre');
     $apellido = $this->input->post('apellido');
     $usuario = $this->input->post('usuario');
     $clave = $this->input->post('clave');

     if ( $nombre != null && $apellido != null && $usuario != null && $clave != null )
        {

         $insert = array(
                        'nombre' => $nombre,
                        'apellido' => $apellido,
                        'usuario' => $usuario,
                        'clave' => $clave
                    );

           if ( ! $this->usuario->guardar( $insert ) )
           {
              $error = $this->db->_error_message();
              $mensaje = 'No se pudo guardar la informacion en la base de datos: <br>'.$error;
              $this->session->set_flashdata('error',$mensaje);
              redirect('usuario/nuevo');
           } else {
              $mensaje = 'Sus datos han sido guardados exitosamente';
              $this->session->set_flashdata('success',$mensaje);
              redirect('reserva');
           }
        } else {
           $mensaje = '¡Debe rellenar todos los campos!';
           $this->session->set_flashdata('error', $mensaje);
           redirect('usuario/nuevo');
        }

  }

  public function editar($id_usuario)
  {
     $data['usuario'] = $this->usuario->getOne($id_usuario);

     $this->load->view('template/header');
     $this->load->view('template/nav');
     $this->load->view('usuario/editar', $data);
     $this->load->view('template/footer');
  }

  public function actualizar()
  {
     $id_usuario = $this->input->post('id_usuario');
     $nombre = $this->input->post('nombre');
     $apellido = $this->input->post('apellido');
     $usuario = $this->input->post('usuario');
     $clave = $this->input->post('clave');

     if ( $nombre != null && $apellido != null && $usuario != null && $clave != null )
        {

         $insert = array(
                        'nombre' => $nombre,
                        'apellido' => $apellido,
                        'usuario' => $usuario,
                        'clave' => $clave
                    );

           if ( ! $this->usuario->actualizar( $insert , $id_usuario ) )
           {
              $error = $this->db->_error_message();
              $mensaje = 'No se pudo guardar la informacion en la base de datos: <br>'.$error;
              $this->session->set_flashdata('error',$mensaje);
              redirect('usuario/nuevo');
           } else {
              $mensaje = 'Sus datos han sido guardados exitosamente';
              $this->session->set_flashdata('success',$mensaje);
              redirect('usuario');
           }
        } else {
           $mensaje = '¡Debe rellenar todos los campos!';
           $this->session->set_flashdata('error', $mensaje);
           redirect('usuario/editar');
        }
  }

  public function borrar($id_usuario)
  {
     if ( ! $this->usuario->borrar($id_usuario) )
         {
            $error = $this->db->_error_message();
            $mensaje = 'No se pudo borrar el elemento: '.$error;
            $this->session->set_flashdata('error', $mensaje );
            redirect('usuario');
         } else {
            $mensaje = 'Elemento borrado de manera correcta. <a href="'.site_url('admin/taxis/papelera').'">¿Desea recuperarlo?</a>';
            $this->session->set_flashdata('success', $mensaje );
            redirect('usuario');
         }
  }


  function papelera()
  {
     $data['usuarios'] = $this->usuario->getTrash();

     $this->load->view('template/header');
     $this->load->view('template/nav');
     $this->load->view('usuario/papelera', $data);
     $this->load->view('template/footer');


  }

  public function activar($id_usuario)
  {
     if ( ! $this->usuario->activar($id_usuario) )
         {
            $error = $this->db->_error_message();
            $mensaje = 'No se pudo borrar el elemento: '.$error;
            $this->session->set_flashdata('error', $mensaje );
            redirect('usuario');
         } else {
            $mensaje = 'Elemento borrado de manera correcta. <a href="'.site_url('admin/taxis/papelera').'">¿Desea recuperarlo?</a>';
            $this->session->set_flashdata('success', $mensaje );
            redirect('usuario');
         }
  }
}
