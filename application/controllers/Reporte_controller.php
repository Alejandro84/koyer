<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reporte_controller extends CI_Controller{

  public function __construct()
  {
     parent::__construct();
     $this->load->library('Pdf');
  }

  public function index()
  {
    $this->load->view('prueba');
  }
}
