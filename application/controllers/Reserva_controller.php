<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reserva_controller extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }

  function index()
  {
    $this->load->model('reserva');
    $reservas = $this->reserva->getAll();
    $data = array('reservas' => $reservas);

    $this->load->view('reservas/listar', $data);
  }



}
