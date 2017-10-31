<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mantenimiento_controller extends CI_Controller{

  public function __construct()
  {
     parent::__construct();
      $this->load->model('mantenimiento');
  }

  function index()
  {
     $this->load->model('vehiculo');
     $this->load->model('tipo_mantenimiento');

     $data = array(
     'vehiculos' => $this->vehiculo->getAll(),
     'mantenimientos' => $this->mantenimiento->getAll(),
     'tipos_mantenimientos' => $this->tipo_mantenimiento->getAll()
   );

     $this->load->view('template/header',$data);
     $this->load->view('template/nav');
     $this->load->view('mantenimiento/listar');
     $this->load->view('template/footer');
  }

  public function nuevo()
  {

      $this->load->view('template/header');
      $this->load->view('template/nav');
      $this->load->view('mantenimiento/nuevo');
      $this->load->view('template/footer');

  }

  public function guardar()
  {
     $id_tipo_mantenimiento = $this->input->post('id_tipo_mantenimiento');
     $costo = $this->input->post('costo');
     $id_vehiculo = $this->input->post('id_vehiculo');
     $comentario = $this->input->post('comentario');
     $fecha_mantencion = $this->input->post('fecha_mantencion');

     if ( $id_tipo_mantenimiento != null && $costo != null && $id_vehiculo != null && $fecha_mantencion != null )
        {

         $insert = array(
                        'id_tipo_mantenimiento' => $id_tipo_mantenimiento,
                        'costo' => $costo,
                        'id_vehiculo' => $id_vehiculo,
                        'comentario' => $comentario,
                        'fecha_mantencion' => $fecha_mantencion
                     );

           if ( ! $this->mantenimiento->guardar( $insert ) )
           {
              $error = $this->db->_error_message();
              $mensaje = 'No se pudo guardar la informacion en la base de datos: <br>'.$error;
              $this->session->set_flashdata('error',$mensaje);
              redirect('mantenimiento');
           } else {
              $mensaje = 'Sus datos han sido guardados exitosamente';
              $this->session->set_flashdata('success',$mensaje);
              redirect('mantenimiento');
           }
        } else {
           $mensaje = '¡Debe rellenar todos los campos!';
           $this->session->set_flashdata('error', $mensaje);
           redirect('mantenimiento');
        }

  }

  public function editar($id_mantenimiento)
  {
     $this->load->model('vehiculo');
     $this->load->model('tipo_mantenimiento');

     $data = array(
       'mantenimiento' => $this->mantenimiento->getOne($id_mantenimiento),
       'vehiculos' => $this->vehiculo->getAll(),
       'tipos_mantenimientos' => $this->tipo_mantenimiento->getAll()
    );

    $this->load->view('template/header', $data);
    $this->load->view('template/nav');
    $this->load->view('mantenimiento/editar');
    $this->load->view('template/footer');

   //print('<pre>');
   //print_r($data);
   //print('</pre>');
  }

  public function actualizar()
  {
     $id_mantenimiento = $this->input->post('id_mantenimiento');
     $id_tipo_mantenimiento = $this->input->post('id_tipo_mantenimiento');
     $costo = $this->input->post('costo');
     $id_vehiculo = $this->input->post('id_vehiculo');
     $comentario = $this->input->post('comentario');
     $fecha_mantencion = $this->input->post('fecha_mantencion');

     if ( $id_tipo_mantenimiento != null && $costo != null && $id_vehiculo != null && $comentario != null )
        {

         $insert = array(
                        'id_tipo_mantenimiento' => $id_tipo_mantenimiento,
                        'costo' => $costo,
                        'id_vehiculo' => $id_vehiculo,
                        'comentario' => $comentario,
                        'fecha_mantencion' => $fecha_mantencion
                     );

           if ( ! $this->mantenimiento->actualizar( $insert , $id_mantenimiento ) )
           {
              $error = $this->db->_error_message();
              $mensaje = 'No se pudo guardar la informacion en la base de datos: <br>'.$error;
              $this->session->set_flashdata('error',$mensaje);
              redirect('mantenimiento');
           } else {
              $mensaje = 'Sus datos han sido guardados exitosamente';
              $this->session->set_flashdata('success',$mensaje);
              redirect('mantenimiento');
           }
        } else {
           $mensaje = '¡Debe rellenar todos los campos!';
           $this->session->set_flashdata('error', $mensaje);
           redirect('mantenimiento');
        }
  }

  public function borrar($id_mantenimiento)
  {
     if ( ! $this->mantenimiento->borrar($id_mantenimiento) )
         {
            $error = $this->db->_error_message();
            $mensaje = 'No se pudo borrar el elemento: '.$error;
            $this->session->set_flashdata('error', $mensaje );
            redirect('mantenimiento');
         } else {
            $mensaje = 'Elemento borrado de manera correcta. <a href="'.site_url('admin/taxis/papelera').'">¿Desea recuperarlo?</a>';
            $this->session->set_flashdata('success', $mensaje );
            redirect('mantenimiento');
         }
  }
  function papelera()
  {
     $data['marcas'] = $this->marca->getTrash();

     $this->load->view('template/header');
     $this->load->view('template/nav');
     $this->load->view('marca/papelera', $data);
     $this->load->view('template/footer');


  }

  public function activar($id_mantenimiento)
  {
     if ( ! $this->manteni->activar($id_mantenimiento) )
         {
            $error = $this->db->_error_message();
            $mensaje = 'No se pudo borrar el elemento: '.$error;
            $this->session->set_flashdata('error', $mensaje );
            redirect('mantenimiento');
         } else {
            $mensaje = 'Elemento borrado de manera correcta. <a href="'.site_url('admin/taxis/papelera').'">¿Desea recuperarlo?</a>';
            $this->session->set_flashdata('success', $mensaje );
            redirect('mantenimiento');
         }
  }

     function reporte()
     {

       $this->load->model('vehiculo');
       $this->load->model('tipo_mantenimiento');

       $data = array(
       'vehiculos' => $this->vehiculo->getAll(),
       'mantenimientos' => $this->mantenimiento->getAll(),
       'tipos_mantenimientos' => $this->tipo_mantenimiento->getAll()
         );

        $this->load->view('template/header');
        $this->load->view('template/nav');
        $this->load->view('mantenimiento/reporte', $data);
        $this->load->view('template/footer');

     }

     public function buscarMantenimientos()
     {
        $vehiculo = $this->input->post('id_vehiculo');
        $fecha_desde = $this->input->post('fecha_desde');
        $fecha_hasta = $this->input->post('fecha_hasta');

        if ($vehiculo != null) {

           if ($fecha_desde != null && $fecha_hasta != null) {

             $insert = array(
                'id_vehiculo' => $vehiculo,
                'fecha_desde' => $fecha_desde,
                'fecha_hasta' => $fecha_hasta
              );

              $mantenimientos = $this->mantenimiento->getMantenimientosVehiFec($insert);
              $total_mantenimiento = $this->sumaMantenimientos($mantenimientos);

              $data = array(
                 'mantenimientos' => $mantenimientos,
                 'total' => $total_mantenimiento
              );

              //echo "<pre>";
              //print_r($insert);
              $this->load->view('template/header');
              $this->load->view('template/nav');
              $this->load->view('mantenimiento/vista_reporte' , $data);
              $this->load->view('template/footer');


           } else {

             $insert = array(
                 'id_vehiculo' => $vehiculo
              );

              $mantenimientos = $this->mantenimiento->getMantenimientosVehi($insert);
              $total_mantenimiento = $this->sumaMantenimientos($mantenimientos);

              $data = array(
                 'mantenimientos' => $mantenimientos,
                 'total' => $total_mantenimiento
              );

              //echo "<pre>";
              //print_r($insert);
              $this->load->view('template/header');
              $this->load->view('template/nav');
              $this->load->view('mantenimiento/vista_reporte' , $data);
              $this->load->view('template/footer');

              $this->datosMantenciones($data);

           }

        }else {

           if ($fecha_desde != null && $fecha_hasta != null) {

             $insert = array(
                 'fecha_desde' => $fecha_desde,
                 'fecha_hasta' => $fecha_hasta
              );

              $mantenimientos = $this->mantenimiento->getMantenimientosFec($insert);
              $total_mantenimiento = $this->sumaMantenimientos($mantenimientos);

              $data = array(
                 'mantenimientos' => $mantenimientos,
                 'total' => $total_mantenimiento
              );

              $this->load->view('template/header');
              $this->load->view('template/nav');
              $this->load->view('mantenimiento/vista_reporte' , $data);
              $this->load->view('template/footer');//

           }else {

             $mensaje = 'Debe ingresar una fecha desde y hasta o Ingresar el vehiculo! ';
             $this->session->set_flashdata('success', $mensaje );
             redirect('mantenimiento/reporte');
           }
        }


     }

     public function sumaMantenimientos($data)
     {
        $mantenimientos = $data;
        $total_mantenimiento = 0 ;

        foreach ($mantenimientos as $mantenimiento) {
            $total_mantenimiento = $total_mantenimiento + $mantenimiento->costo;
        }

        return $total_mantenimiento;
     }

     public function datosMantenciones($mantenimientos)
     {
        $data = $mantenimientos;

        $this->load->view('mantenimiento/mantencion_pdf', $data);
     }

     public function imprimirPDF()
     {
         $url    =   site_url('reserva/mantencion_pdf');
         $html   =   file_get_contents ( $url );

         $this->load->library('pdf');
         //$this->pdf->set_option('isHtml5ParserEnabled', true);
         $this->pdf->load_html($html);
         $this->pdf->render();
         $this->pdf->stream( date('YmdHis').'-koyer-mantencion-'.trim($id_reserva).'.pdf');
         // AñoMesDiaHoraMinutoSegundo-koyer-reserva-IDReserva.pdf
         // asi despues puedes buscar
         // ls 2017*.pdf
         // y te da todos los pdf de un año donde esten desacrgados.. solo por siu acaso
     }

}
