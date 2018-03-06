<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reporte_controller extends CI_Controller{

  public function __construct()
  {
     parent::__construct();
     $this->load->library('Pdf');
     $this->load->model('reporte');
  }

  public function index()
  {
    $costos = $this->reporte->getAll();

    echo "<pre>";
    print_r($costos);
  }
}
