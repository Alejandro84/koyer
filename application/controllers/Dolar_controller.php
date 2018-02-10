<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dolar_controller extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('dolar');
  }

  function index()
  {
      $dolar = $this->dolar->getDolar();

      //echo "<pre>";
      //print_r($dolar);
      $this->load->view('template/header');
      $this->load->view('template/nav');
      $this->load->view('dolar/listar' , $dolar);
      $this->load->view('template/footer');

  }

    public function actualizarDolar()
    {
        $valor = $this->input->post('valor');
        $id_divisa = $this->input->post('id_divisa');

        $data = array(
            'valor' => $valor
        );

        if (! $this->dolar->actualizar($data, $id_divisa) ) {

            $error = $this->db->_error_message();
            $mensaje = 'No se pudo actualizar el valor del dolar '.$error;
            $this->session->set_flashdata('error', $mensaje );
            redirect('descuento');
        } else {
            $mensaje = 'Dolar actualizado de manera correcta.';
            $this->session->set_flashdata('success', $mensaje );
        redirect('descuento');
        }
    }
}
