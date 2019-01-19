<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reporte_controller extends CI_Controller{

  public function __construct()
  {
     parent::__construct();
     date_default_timezone_set('America/Buenos_Aires');

    $this->load->model('reporte');
    $this->load->model('vehiculo');


  }

    public function index()
    {
        $vehiculo = $this->vehiculo->getAll();

        $data = array(
            'vehiculos' => $vehiculo 
        
        );

        $this->load->view('template/header');
        $this->load->view('template/nav');
        $this->load->view('reporte/buscador', $data);
        $this->load->view('template/footer');

    }

    public function buscarReporte()
    {
        $vehiculo       =   $this->input->post('id_vehiculo');

        $fecha_desde    =   $this->input->post('fecha_desde');
        $fecha_desde = DateTime::createFromFormat('Y-m-d', $fecha_desde);
        
        $fecha_hasta    =   $this->input->post('fecha_hasta');
        $fecha_hasta = DateTime::createFromFormat('Y-m-d', $fecha_hasta);
        
        $mantenimientos;
        $reservas;

        if ( $vehiculo) {//sí elijo un vehiculo, entra en esta opcion
            
            if ( $fecha_desde && $fecha_hasta) { //sí se eligieron fechas, por lo que la busqueda sera con un vehiculo en especifico y entre fechas establecidas...
                               
                $data = [
                    'vehiculo' => $vehiculo,
                    'fecha_desde' => $fecha_desde->format('Y-m-d H:i:s'),
                    'fecha_hasta' => $fecha_hasta->format('Y-m-d H:i:s')
                ];
                
                $reservas = $this->reporte->getReservasVehiculoFecha($data);
                $mantenimientos = $this->reporte->getManteniVehiculoFecha($data);
               

            } else if ($fecha_desde && $fecha_hasta == null || $fecha_desde == null && $fecha_hasta) {
                
                $mensaje = 'Si desea hacer una busqueda con fechas establecidas <b><u>debe ingresar una fecha de INICIO y una fecha de FIN</u></b>';
                $this->session->set_flashdata('error',$mensaje);
                redirect('reporte');

            } else {
                                           
                $data = [
                    'vehiculo' => $vehiculo,
                ];
                
                $reservas = $this->reporte->getReservasVehiculo($data);
                $mantenimientos = $this->reporte->getManteniVehiculo($data);
            }
            

        } else { //No se elijio un vehiculo...
            
            if ( $fecha_desde &&  $fecha_hasta) { //sí se eligieron fechas, por lo que la busqueda sera con un vehiculo en especifico y entre fechas establecidas...
                
                $data = [
                    'fecha_desde' => $fecha_desde->format('Y-m-d H:i:s'),
                    'fecha_hasta' => $fecha_hasta->format('Y-m-d H:i:s')
                ];
                
                $reservas = $this->reporte->getReservasFecha($data);
                $mantenimientos = $this->reporte->getManteniFecha($data);            

            } else {
                $mensaje = 'Si desea hacer una busqueda con fechas establecidas <b><u>debe ingresar una fecha de INICIO y una fecha de FIN</u></b>';
                $this->session->set_flashdata('error',$mensaje);
                redirect('reporte');
            }

        }// Fin IF vehiculo

        $ingreso_subtotal = 0;
        $ingreso_total = 0;

        foreach ($reservas as $reserva) {
            $ingreso_subtotal = $reserva->sub_total + $ingreso_subtotal;
            $ingreso_total = $reserva->total + $ingreso_total;
        }

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
            'totalReporte' => $totalReporte,
        );     
        
        $this->load->view('template/header');
        $this->load->view('template/nav');
        $this->load->view('reporte/reporte_vista', $data);
        $this->load->view('template/footer');

    }
    
    public function formatoPdf( $fecha_busqueda)
    {
        $fecha = $fecha_busqueda;
        $fecha = DateTime::createFromFormat('m-Y', $fecha);

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
        $this->load->view('reporte/reporte_pdf', $data);
    }

    public function imprimirPDF($fecha_reporte)
    {
        $url    =   site_url('reporte/reporte_pdf/'.$fecha_reporte);
        $html   =   file_get_contents ( $url );

        $this->load->library('pdf');
        //$this->pdf->set_option('isHtml5ParserEnabled', true);
        $this->pdf->load_html($html);
        $this->pdf->render();
        $this->pdf->stream( date('YmdHis').'-reporte-koyer.pdf');
        // AñoMesDiaHoraMinutoSegundo-koyer-reserva-IDReserva.pdf
        // asi despues puedes buscar
        // ls 2017*.pdf
        // y te da todos los pdf de un año donde esten desacrgados.. solo por siu acaso*/
    }
}
