<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reporte_controller extends CI_Controller{

  public function __construct()
  {
     parent::__construct();
     date_default_timezone_set('America/Buenos_Aires');

     $this->load->library('Pdf');
     $this->load->model('reporte');

  }

    public function index()
    {
        $this->load->view('template/header', $data);
        $this->load->view('template/nav');
        $this->load->view('reporte/buscador');
        $this->load->view('template/footer');

    }

    public function buscarReporte()
    {
        $fecha = $this->input->post('fecha_reporte');
        $fecha = DateTime::createFromFormat('m/Y', $fecha);

        $reservas = $this->reporte->getAll($fecha);

        $ingreso_subtotal = 0;
        $ingreso_total = 0;

        foreach ($reservas as $reserva) {
            $ingreso_subtotal = $reserva->sub_total + $ingreso_subtotal;
            $ingreso_total = $reserva->total + $ingreso_total;
        }

        $mantenimientos = $this->reporte->getManteni($fecha);

        $costo = 0;

        foreach ($mantenimientos as $mantenimiento) {
            $costo = $mantenimiento->costo + $costo;
        }

        $totalReporte = $ingreso_total - $costo;

        $data = array(
            'reservas' => $reservas,
            'mantenimientos' => $mantenimientos,
            'ingreso_subtotal' => $ingreso_subtotal,
            'ingreso_total' => $ingreso_total,
            'costo' => $costo,
            'totalReporte' => $totalReporte
        );

        //echo "<pre>";
        //print_r($data);

        $this->load->view('template/header', $data);
        $this->load->view('template/nav');
        $this->load->view('reporte/reporte_vista');
        $this->load->view('template/footer');
    }
}
