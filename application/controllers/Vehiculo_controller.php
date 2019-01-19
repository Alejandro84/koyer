<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Vehiculo_controller extends CI_Controller{

    public function __construct()
    {
        parent::__construct();

        $this->load->model('vehiculo');
        $this->load->library('upload' , $this->configuracionImagenes());
        $this->load->model('modelo');
        $this->load->model('marca');
        $this->load->model('combustible');
        $this->load->model('transmision');
        $this->load->model('categoria');
        $this->load->model('tarifa');
    }

    public function index()
    {
        $data['vehiculos'] = $this->vehiculo->getAll();

        $this->load->view('template/header');
        $this->load->view('template/nav');
        $this->load->view('vehiculo/listar', $data);
        $this->load->view('template/footer');

    }

    public function nuevo()
    {
    $data = array(
        'combustible' => $this->combustible->getAll(),
        'transmision' => $this->transmision->getAll(),
        'categoria' => $this->categoria->getAll(),
        'modelo' => $this->modelo->getAll(),
        'marca' => $this->marca->getAll(),
        'tarifa' => $this->tarifa->getAll(),
    );

    $this->load->view('template/header');
    $this->load->view('template/nav');
    $this->load->view('vehiculo/nuevo', $data);
    $this->load->view('template/footer');

    }


    public function guardar()
    {
        $patente        =   $this->input->post('patente');
        $id_modelo      =   $this->input->post('id_modelo');
        $id_marca       =   $this->input->post('id_marca');
        $id_transmision =   $this->input->post('id_transmision');
        $id_categoria   =   $this->input->post('id_categoria');
        $id_combustible =   $this->input->post('id_combustible');
        $id_tarifa      =   $this->input->post('id_tarifa');
        $comentario     =   $this->input->post('comentario');  

        if ( $patente != null && $id_modelo != null && $id_marca != null && $id_transmision != null && $id_categoria != null && $id_combustible != null && $id_tarifa != null )
            {

            $insert = array(
                'patente'           =>  $patente,
                'id_modelo'         =>  $id_modelo,
                'id_marca'          =>  $id_marca,
                'id_transmision'    =>  $id_transmision,
                'id_categoria'      =>  $id_categoria,
                'id_combustible'    =>  $id_combustible,
                'id_tarifa'         =>  $id_tarifa,
                'comentario'        =>  $comentario
            );

            if ( ! $this->vehiculo->guardar( $insert ) )
            {
                $error = $this->db->_error_message();
                $mensaje = 'No se pudo guardar la informacion en la base de datos: <br>'.$error;
                $this->session->set_flashdata('error',$mensaje);
                redirect('vehiculo');
            } else {
                $mensaje = 'Sus datos han sido guardados exitosamente';
                $this->session->set_flashdata('success',$mensaje);
                redirect('vehiculo');
            }
            } else {
            $mensaje = '¡Debe rellenar todos los campos!';
            $this->session->set_flashdata('error', $mensaje);
            redirect('vehiculo/nuevo');
            }

    }

    public function configuracionImagenes()
    {
        $config [ 'upload_path' ]  =  'assets/img/car' ;
        $config [ 'allowed_types' ]  =  'gif | jpg | png' ;
        $config [ 'max_size' ]      =  '100' ;
        $config [ 'max_width' ]  =  '250' ;
        $config [ 'max_height' ]  =  '300' ;

        return $config;
    }

    public function editar($id_vehiculo)
    {
        $this->load->model('modelo');
        $this->load->model('marca');
        $this->load->model('combustible');
        $this->load->model('transmision');
        $this->load->model('categoria');
        $this->load->model('tarifa');

        $data = array(
            'vehiculo' => $this->vehiculo->getOne($id_vehiculo),
            'modelo' => $this->modelo->getAll(),
            'marca' => $this->marca->getAll(),
            'combustible' => $this->combustible->getAll(),
            'transmision' => $this->transmision->getAll(),
            'categoria' => $this->categoria->getAll(),
            'tarifa' => $this->tarifa->getAll(),
        );


        $this->load->view('template/header');
        $this->load->view('template/nav');
        $this->load->view('vehiculo/editar', $data);
        $this->load->view('template/footer');
    }
    public function actualizar()
    {
        $id_vehiculo    =   $this->input->post('id_vehiculo');

        $patente        =   $this->input->post('patente');
        $id_modelo      =   $this->input->post('id_modelo');
        $id_marca       =   $this->input->post('id_marca');
        $id_transmision =   $this->input->post('id_transmision');
        $id_categoria   =   $this->input->post('id_categoria');
        $id_combustible =   $this->input->post('id_combustible');
        $id_tarifa      =   $this->input->post('id_tarifa');

        if ( $patente != null && $id_modelo != null && $id_marca != null && $id_transmision != null && $id_categoria != null && $id_combustible != null && $id_tarifa != null )
            {

            $insert = array(
                'patente' => $patente,
                'id_modelo' => $id_modelo,
                'id_marca' => $id_marca,
                'id_transmision' => $id_transmision,
                'id_categoria' => $id_categoria,
                'id_combustible' => $id_combustible,
                'id_tarifa' => $id_tarifa
            );

            if ( ! $this->vehiculo->actualizar( $insert , $id_vehiculo) )
            {
                $error = $this->db->_error_message();
                $mensaje = 'No se pudo guardar la informacion en la base de datos: <br>'.$error;
                $this->session->set_flashdata('error',$mensaje);
                redirect('vehiculo/editar');
            } else {
                $mensaje = 'Sus datos han sido guardados exitosamente';
                $this->session->set_flashdata('success',$mensaje);
                redirect('vehiculo');
            }
            } else {
            $mensaje = '¡Debe rellenar todos los campos!';
            $this->session->set_flashdata('error', $mensaje);
            redirect('vehiculo/editar');
            }

    }

    public function borrar($id_vehiculo)
    {
        if ( ! $this->vehiculo->borrar($id_vehiculo) )
            {
                //$error = $this->db->_error_message();
                $mensaje = 'No se pudo borrar el elemento: '.$error;
                // el flash data para mostrarlo en el listado
                //$this->session->set_flashdata('error', $mensaje );
                redirect('vehiculo');
            } else {
                // todo ok, creamos el mensaje y lo enviamos
                $mensaje = 'Elemento borrado de manera correcta. <a href="'.site_url('admin/taxis/papelera').'">¿Desea recuperarlo?</a>';
                //$this->session->set_flashdata('success', $mensaje );
                redirect('vehiculo');
            }
    }

    function papelera()
    {

        $data['vehiculos'] = $this->vehiculo->getTrash();

        $this->load->view('template/header');
        $this->load->view('template/nav');
        $this->load->view('vehiculo/papelera', $data);
        $this->load->view('template/footer');

    }

    public function activar($id_vehiculo)
    {
        if ( ! $this->vehiculo->activar($id_vehiculo) )
            {
                //$error = $this->db->_error_message();
                $mensaje = 'No se pudo borrar el elemento: '.$error;
                //$this->session->set_flashdata('error', $mensaje );
                redirect('vehiculo');
            } else {
                $mensaje = 'Elemento borrado de manera correcta. <a href="'.site_url('admin/taxis/papelera').'">¿Desea recuperarlo?</a>';
                //$this->session->set_flashdata('success', $mensaje );
                redirect('vehiculo');
            }
    }
}
?>
