<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class tarifa_controller extends CI_Controller{

public function __construct()
{
    parent::__construct();
    $this->load->model('tarifa');
    $this->load->model('modelo');
}

function index()
{
    $data = array(
        'tarifas' => $this->tarifa->getAll(),
        'modelos' => $this->modelo->getAll()
    );

    //echo '<pre>';
    //print_r($data);
    $this->load->view('template/header');
    $this->load->view('template/nav');
    $this->load->view('tarifa/listar', $data);
    $this->load->view('template/footer');

}

public function nuevo()
{
    $this->load->view('template/header');
    $this->load->view('template/nav');
    $this->load->view('tarifa/nuevo');
    $this->load->view('template/footer');
}

public function guardar()
{
    $id_modelo = $this->input->post('id_modelo');
    $precio = $this->input->post('precio');

    if ( $id_modelo != null && $precio != null)
    {

        $insert = array(
            'id_modelo' => $id_modelo,
            'precio' => $precio
        );

        if ( ! $this->tarifa->guardar( $insert ) )
        {
            //$error = $this->db->_error_message();
            $mensaje = 'No se pudo guardar la informacion en la base de datos: <br>'.$error;
            $this->session->set_flashdata('error',$mensaje);
            redirect('tarifa');
        } else {
            $mensaje = 'Sus datos han sido guardados exitosamente';
            $this->session->set_flashdata('success',$mensaje);
            redirect('tarifa');
        }
    } else {
        $mensaje = '¡Debe rellenar todos los campos!';
        $this->session->set_flashdata('error', $mensaje);
        redirect('tarifa');
    }

}

public function editar($id_tarifa)
{
    $data = array(
        'tarifa' => $this->tarifa->getOne($id_tarifa),
    );
    //echo "<pre>";
    //print_r($data);

    $this->load->view('template/header');
    $this->load->view('template/nav');
    $this->load->view('tarifa/editar', $data);
    $this->load->view('template/footer');
}

public function actualizar()
{
    $id_tarifa = $this->input->post('id_tarifa');
    $precio = $this->input->post('precio');

    if ( $id_tarifa != null && $precio != null)
    {

        $insert = array(
                    'id_tarifa' => $id_tarifa,
                    'precio' => $precio
                    );

        if ( ! $this->tarifa->actualizar( $insert , $id_tarifa ) )
        {
            $error = $this->db->_error_message();
            $mensaje = 'No se pudo guardar la informacion en la base de datos: <br>'.$error;
            $this->session->set_flashdata('error',$mensaje);
            redirect('tarifa');
        } else {
            $mensaje = 'Sus datos han sido guardados exitosamente';
            $this->session->set_flashdata('success',$mensaje);
            redirect('tarifa');
        }
    } else {
        $mensaje = '¡Debe rellenar todos los campos!';
        $this->session->set_flashdata('error', $mensaje);
        redirect('tarifa/editar');
    }
}

public function borrar($id_tarifa)
{
    if ( ! $this->tarifa->borrar($id_tarifa) )
        {
        $error = $this->db->_error_message();
        $mensaje = 'No se pudo borrar el elemento: '.$error;
        $this->session->set_flashdata('error', $mensaje );
        redirect('tarifa');
        } else {
        $mensaje = 'Elemento borrado de manera correcta.';
        $this->session->set_flashdata('success', $mensaje );
        redirect('tarifa');
        }
}


function papelera()
{
    $data['tarifas'] = $this->tarifa->getTrash();

    $this->load->view('template/header');
    $this->load->view('template/nav');
    $this->load->view('tarifa/papelera', $data);
    $this->load->view('template/footer');


}

public function activar($id_tarifa)
{
    if ( ! $this->tarifa->activar($id_tarifa) )
        {
        $error = $this->db->_error_message();
        $mensaje = 'No se pudo borrar el elemento: '.$error;
        $this->session->set_flashdata('error', $mensaje );
        redirect('tarifa/papelera');
        } else {

        $mensaje = 'Elemento recuperado de manera correcta!';
        $this->session->set_flashdata('success', $mensaje );
        redirect('tarifa');
        }
}
}
