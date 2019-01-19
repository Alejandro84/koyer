<?php
defined('BASEPATH') OR exit('No direct script access allowed');

    class Extra_controller extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('extra');
        $this->load->model('extra_reserva');
        $this->load->model('locacion');
        $this->load->model('reserva');
        $this->load->model('vehiculo');
        $this->load->model('cliente');
    }

    function index()
    {
        $data['extras'] = $this->extra->getAll();

        $this->load->view('template/header');
        $this->load->view('template/nav');
        $this->load->view('extra/listar', $data);
        $this->load->view('template/footer');

    }

    public function nuevo()
    {
        $this->load->view('template/header');
        $this->load->view('template/nav');
        $this->load->view('extra/nuevo');
        $this->load->view('template/footer');
    }

    public function guardar()
    {
        $extra = $this->input->post('extra');
        $precio = $this->input->post('precio');
        $por_dia = $this->input->post('por_dia');

        if ( $extra != null && $precio != null)
            {

            $insert = array(
                            'extra' => $extra,
                            'precio' => $precio,
                            'por_dia' => $por_dia
                        );

            if ( ! $this->extra->guardar( $insert ) )
            {
                //$error = $this->db->_error_message();
                $mensaje = 'No se pudo guardar la informacion en la base de datos: <br>'.$error;
                $this->session->set_flashdata('error',$mensaje);
                redirect('extra');
            } else {
                $mensaje = 'Sus datos han sido guardados exitosamente';
                $this->session->set_flashdata('success',$mensaje);
                redirect('extra');
            }
            } else {
            $mensaje = '¡Debe rellenar todos los campos!';
            $this->session->set_flashdata('error', $mensaje);
            redirect('extra');
            }

    }

    public function editar($id_extra)
    {
        $data['extra'] = $this->extra->getOne($id_extra);

        $this->load->view('template/header');
        $this->load->view('template/nav');
        $this->load->view('extra/editar', $data);
        $this->load->view('template/footer');
    }

    public function actualizar()
    {
        $id_extra = $this->input->post('id_extra');
        $extra = $this->input->post('extra');
        $precio = $this->input->post('precio');
        $por_dia = $this->input->post('por_dia');

        if ( $extra != null && $precio != null)
            {

            $insert = array(
                            'extra' => $extra,
                            'precio' => $precio,
                            'por_dia' => $por_dia
                        );

            if ( ! $this->extra->actualizar( $insert , $id_extra ) )
            {
                $error = $this->db->_error_message();
                $mensaje = 'No se pudo guardar la informacion en la base de datos: <br>'.$error;
                $this->session->set_flashdata('error',$mensaje);
                redirect('extra');
            } else {
                $mensaje = 'Sus datos han sido guardados exitosamente';
                $this->session->set_flashdata('success',$mensaje);
                redirect('extra');
            }
            } else {
            $mensaje = '¡Debe rellenar todos los campos!';
            $this->session->set_flashdata('error', $mensaje);
            redirect('extra/editar');
            }
    }

    public function borrar($id_extra)
    {
        if ( ! $this->extra->borrar($id_extra) )
            {
                $error = $this->db->_error_message();
                $mensaje = 'No se pudo borrar el elemento: '.$error;
                $this->session->set_flashdata('error', $mensaje );
                redirect('extra');
            } else {
                $mensaje = 'Elemento borrado de manera correcta.';
                $this->session->set_flashdata('success', $mensaje );
                redirect('extra');
            }
    }


    function papelera()
    {
        $data['extras'] = $this->extra->getTrash();

        $this->load->view('template/header');
        $this->load->view('template/nav');
        $this->load->view('extra/papelera', $data);
        $this->load->view('template/footer');


    }

    public function activar($id_extra)
    {
        if ( ! $this->extra->activar($id_extra) )
            {
                $error = $this->db->_error_message();
                $mensaje = 'No se pudo borrar el elemento: '.$error;
                $this->session->set_flashdata('error', $mensaje );
                redirect('extra/papelera');
            } else {

                $mensaje = 'Elemento recuperado de manera correcta!';
                $this->session->set_flashdata('success', $mensaje );
                redirect('extra');
            }
    }

    public function anexo($id_reserva)
    {
        

        $reserva = $this->reserva->verReserva($id_reserva);

        $extras = $this->extra->getAll();

        $extras_reservas = $this->extra_reserva->getExtras($id_reserva);

        $vehiculo = $this->vehiculo->getOne($reserva->id_vehiculo);
        
        $dias = $this->diasArriendo($reserva->fecha_entrega, $reserva->fecha_devolucion );

        $data = array(
            'extras' => $extras,
            'extras_reservas' => $extras_reservas, 
            'reserva' => $reserva,
            'vehiculo' => $vehiculo, 
            'dias' => $dias
        );

        //echo '<pre>';
        //print_r($data);
        
        $this->load->view('template/header');
        $this->load->view('template/nav');
        $this->load->view('extra/anexo', $data);
        $this->load->view('template/footer');

    }

    public function agregarExtra($id_reserva)
    {
        $extra = $this->input->post('id_extra');
        $cantidad = $this->input->post('cantidad');

        $insert = array(
            'id_reserva' =>$id_reserva , 
            'id_extra' => $extra,
            'cantidad' => $cantidad
        );

        if (! $this->extra_reserva->guardar($insert) ) {
            $error = $this->db->_error_message();
            $mensaje = 'No se pudo ingresar el elemento: '.$error;
            $this->session->set_flashdata('error', $mensaje );
            redirect('extra/anexo/'.$id_reserva);
        } else {
            $mensaje = 'El elemento se agrego correctamente ';
            $this->session->set_flashdata('success', $mensaje );
            redirect('extra/anexo/'.$id_reserva);
        }
        
    }

    public function diasArriendo($f_entrega , $f_devolucion)
    {
        $fecha_entrega       = DateTime::createFromFormat( 'Y-m-d H:i:s' , $f_entrega );
        $fecha_devolucion    = DateTime::createFromFormat( 'Y-m-d H:i:s' , $f_devolucion );

        $fecha_entrega       = $fecha_entrega->getTimestamp();
        $fecha_devolucion    = $fecha_devolucion->getTimestamp();

        $delta_tiempo  = $fecha_devolucion - $fecha_entrega;

        $dias_arriendo = $delta_tiempo / 60 ; // minutos
        $dias_arriendo = $dias_arriendo / 60 ; // horas
        $dias_arriendo = $dias_arriendo / 24 ; // dias

        $dias_arriendo_trunchado = number_format($dias_arriendo, '0', ',', '.');
        //$dias_arriendo = number_format($dias_arriendo, '4', ',', '.');
        $dias;

        if ( ($dias_arriendo_trunchado + 0.083333) < $dias_arriendo ) {
            $dias = $dias_arriendo_trunchado + 1;
        }else {
            $dias = $dias_arriendo_trunchado;
        }

        return $dias;
    }

    public function Dolar()
    {
        $this->load->model('dolar');
        $dolar = $this->dolar->getDolar();

        return $dolar->valor;
    }

    public function impuesto()
    {
        $this->load->model('impuesto');
        
        $impuesto = $this->impuesto->getOne('1');

        $iva = '1.' . $impuesto->valor;

        return $iva;
    }

        
    public function anexoPdf( $id_reserva, $total )
    {
        

        $reserva = $this->reserva->verReserva($id_reserva);

        $vehiculo = $this->vehiculo->getOne($reserva->id_vehiculo);

        $cliente = $this->cliente->getOne($reserva->id_cliente);

        $locacion_entrega = $this->locacion->getOne($reserva->locacion_entrega);
        $locacion_devolucion = $this->locacion->getOne($reserva->locacion_devolucion);

        $datos_extra = $this->extra_reserva->getExtras($reserva->id_reserva);

        $dolar = $this->dolar();
        
        $impuesto = $this->impuesto();

        $data = array(
            'reserva' => $reserva ,
            'cliente' => $cliente ,
            'vehiculo' => $vehiculo ,
            'locacion_entrega' => $locacion_entrega ,
            'locacion_devolucion' => $locacion_devolucion,
            'extras' => $datos_extra,
            'dolar' => $dolar,
            'impuesto' => $impuesto,
            'sub_ total' => $total
        );

        
        //echo '<pre>';
        //print_r($data);
        $this->load->view('extra/anexo_pdf', $data);
        
    }
        public function imprimirPDF($id_reserva, $total)
        {
            $url    =   site_url('extra/anexo_pdf/'.$id_reserva.'/' . $total);
            $html   =   file_get_contents ( $url );
            $this->load->library('pdf');
            $pdf = $this->pdf->nuevo();
            //var_dump($pdf);
            //$pdf->set('isRemoteEnabled', true);
            $pdf->set_option('isHtml5ParserEnabled', true);
            //$pdf->set_base_path('localhost/koyer/assets/css/bootstrap.min.css');
            $pdf->load_html($html);
            $pdf->render();
            $pdf->stream( 'koyer-anexo-'.trim($id_reserva).'.pdf');
            // AñoMesDiaHoraMinutoSegundo-koyer-reserva-IDReserva.pdf
            // asi despues puedes buscar
            // ls 2017*.pdf
            // y te da todos los pdf de un año donde esten desacrgados.. solo por siu acaso
        }
}
