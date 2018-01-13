<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('America/Santiago');

class Calendario_controller extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
  }

  function index()
  {
      $fechaHoy = new DateTime();
      $this->load->model('calendario');
      $reservas = $this->calendario->getReservas($fechaHoy->format('m'));
      echo '<pre>';
      print_r($reservas);
        echo '</pre>';

  }

}
