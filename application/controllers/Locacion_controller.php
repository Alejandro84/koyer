<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Locacion_controller extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('locacion');
    }

    function index()
    {
        $data['locaciones'] = $this->locacion->getAll();

        //echo "<pre>";
        //print_r($data);
        $this->load->view('template/header');
        $this->load->view('template/nav');
        $this->load->view('locacion/listar', $data);
        $this->load->view('template/footer');

    }

    public function nuevo()
    {
        $this->load->view('template/header');
        $this->load->view('template/nav');
        $this->load->view('locacion/nuevo');
        $this->load->view('template/footer');
    }

    public function guardar()
    {
        $locacion      = $this->input->post('locacion');
        $recargo       = $this->input->post('recargo');
        $entrega       = $this->input->post('entrega');
        $devolucion    = $this->input->post('devolucion');
        

        if ( $locacion != null && $recargo != null)
            {

                $insert = array(
                    'locacion' => $locacion,
                    'recargo' => $recargo,
                    'entrega' => $entrega,
                    'devolucion' => $devolucion
                );

            if ( ! $this->locacion->guardar( $insert ) )
            {
                $error = $this->db->_error_message();
                $mensaje = 'No se pudo guardar la informacion en la base de datos: <br>'.$error;
                $this->session->set_flashdata('error',$mensaje);
                redirect('locacion');
            } else {
                $mensaje = 'Sus datos han sido guardados exitosamente';
                $this->session->set_flashdata('success',$mensaje);
                redirect('locacion');
            }
            } else {
            $mensaje = '¡Debe rellenar todos los campos!';
            $this->session->set_flashdata('error', $mensaje);
            redirect('locacion');
            }

    }

    public function editar($id_locacion)
    {
        $data['locacion'] = $this->locacion->getOne($id_locacion);

        $this->load->view('template/header');
        $this->load->view('template/nav');
        $this->load->view('locacion/editar', $data);
        $this->load->view('template/footer');
    }

    public function actualizar()
    {
            $id_locacion    = $this->input->post('id_locacion');
            
            $locacion       = $this->input->post('locacion');
            $recargo        = $this->input->post('recargo');
            $entrega        = $this->input->post('entrega');
            $devolucion     = $this->input->post('devolucion');
        

        if ( $locacion != null && $recargo != null )
            {

                $insert = array(
                    'locacion' => $locacion,
                    'recargo' => $recargo,
                    'entrega' => $entrega,
                    'devolucion' => $devolucion
                );

                if ( ! $this->locacion->actualizar( $insert , $id_locacion ) )
            {
                $error = $this->db->_error_message();
                $mensaje = 'No se pudo guardar la informacion en la base de datos: <br>'.$error;
                $this->session->set_flashdata('error',$mensaje);
                redirect('locacion');
            } else {
                $mensaje = 'Sus datos han sido guardados exitosamente';
                $this->session->set_flashdata('success',$mensaje);
                redirect('locacion');
            }
            } else {
            $mensaje = '¡Debe rellenar todos los campos!';
            $this->session->set_flashdata('error', $mensaje);
            redirect('locacion');
        }
    }

    public function borrar($id_locacion)
    {
        if ( ! $this->locacion->borrar($id_locacion) )
            {
                $error = $this->db->_error_message();
                $mensaje = 'No se pudo borrar el elemento: '.$error;
                $this->session->set_flashdata('error', $mensaje );
                redirect('locacion');
            } else {
                $mensaje = 'Elemento borrado de manera correcta. <a href="'.site_url('admin/taxis/papelera').'">¿Desea recuperarlo?</a>';
                $this->session->set_flashdata('success', $mensaje );
                redirect('locacion');
            }
    }


    function papelera()
    {
        $data['locacions'] = $this->locacion->getTrash();

        $this->load->view('template/header');
        $this->load->view('template/nav');
        $this->load->view('locacion/papelera', $data);
        $this->load->view('template/footer');


    }

    public function activar($id_locacion)
    {
        if ( ! $this->locacion->activar($id_locacion) )
            {
                //$error = $this->db->_error_message();
                $mensaje = 'No se pudo borrar el elemento: '.$error;
                // el flash data para mostrarlo en el listado
                //$this->session->set_flashdata('error', $mensaje );
                redirect('locacion');
            } else {
                // todo ok, creamos el mensaje y lo enviamos
                //$mensaje = 'Elemento borrado de manera correcta. <a href="'.site_url('admin/taxis/papelera').'">¿Desea recuperarlo?</a>';
                //$this->session->set_flashdata('success', $mensaje );
                redirect('locacion');
            }
    }
}?>
