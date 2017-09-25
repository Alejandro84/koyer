<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reserva_controller extends CI_Controller{

   private $tiempo_espera;

   public function __construct()
   {
      parent::__construct();


      if ( ! $this->session->logueado ) {
         redirect('login');
      }

      $this->load->model('reserva');
      $this->load->model('cliente');
      $this->load->model('vehiculo');
      $this->load->model('impuesto');
      $this->load->model('extra');
      $this->load->model('locacion');
      $this->load->model('extra_reserva');

   }

   public function index()
   {
      $reservas = $this->reserva->getArrendados();

         $data = array(
            'reservas' => $reservas,
            'locaciones' => $this->locacion->getall()
         );

      //echo "<pre>";
      //echo $this->calendar->generate();

      $this->load->view('template/header');
      $this->load->view('template/nav');
      $this->load->view('reserva/listar', $data);
      $this->load->view('template/footer');

   }

   public function cotizacion()
   {

      $reservas = $this->reserva->getCotizaciones();

         $data = array(
            'reservas' => $reservas,
            'locaciones' => $this->locacion->getall()
         );

      //echo "<pre>";
      //print_r($data);

      $this->load->view('template/header');
      $this->load->view('template/nav');
      $this->load->view('reserva/cotizacion', $data);
      $this->load->view('template/footer');

   }

   public function nuevo()
   {
      $this->load->model('locacion');

      $data = array(
         'locaciones' => $this->locacion->getAll()
      );

       $this->load->view('template/header');
       $this->load->view('template/nav');
       $this->load->view('reserva/nuevo', $data);
       $this->load->view('template/footer');

   }

   public function verificar()
   {
      //$this->output->enable_profiler(TRUE);
      $this->load->model('locacion');
      $this->load->model('vehiculo');
      $this->load->model('extra');

      $autos = $this->vehiculo->getAll();

      $reserva_fecha_desde = $this->input->post('reserva-fecha_desde');
      $reserva_fecha_hasta = $this->input->post('reserva-fecha_hasta');

      $locacion_entrega    =  $this->input->post('locacion_entrega');
      $locacion_devolucion =  $this->input->post('locacion_devolucion');

      $data = array(
         'fecha_desde' => $reserva_fecha_desde,
         'fecha_hasta' => $reserva_fecha_hasta,
         'locacion_entrega' => $locacion_entrega,
         'locacion_devolucion' => $locacion_devolucion
      );


      if ($locacion_entrega != null && $locacion_devolucion != null && $reserva_fecha_desde != null && $reserva_fecha_hasta != null) {

         $reserva_fecha_desde = DateTime::createFromFormat( 'd/m/Y H:i', $reserva_fecha_desde );
         $reserva_fecha_desde =  $reserva_fecha_desde->format( 'Y-m-d H:i:s' );

         $reserva_fecha_hasta = DateTime::createFromFormat( 'd/m/Y H:i', $reserva_fecha_hasta );
         $reserva_fecha_hasta =  $reserva_fecha_hasta->format( 'Y-m-d H:i:s' );

         // de: 22/11/2017 10:00
         // a: 2017-10-01 12:00:00
         $data = array(
            'fecha_entrega' => $reserva_fecha_desde ,
            'fecha_devolucion' => $reserva_fecha_hasta
         );

         foreach ($autos as $auto) {

            $id_auto = $auto->id_vehiculo;
            $estado = $this->reserva->buscar($id_auto , $data);

            $ubicacion = $this->reserva->dondeEsta($auto->id_vehiculo , $reserva_fecha_desde);

            $disponibles[] = array(
               'info_auto' => $auto,
               'estado' => $estado,
               'ubicacion' => $ubicacion
            );
         }

         $variables_vista = [
            'disponibles'  => $disponibles,
            'fecha_entrega' => $reserva_fecha_desde ,
            'fecha_devolucion' => $reserva_fecha_hasta ,
            'locacion_entrega' => $locacion_entrega,
            'locacion_devolucion' => $locacion_devolucion,
            'extras' => $this->extra->getAll(),
            'locaciones' => $this->locacion->getAll()
         ];


         echo "<pre>";
         print_r($variables_vista);

         //$this->load->view('template/header', $variables_vista );
         //$this->load->view('template/nav');
         //$this->load->view('reserva/disponibles');
         //$this->load->view('template/footer');


      }else {
         $mensaje = '¡Debe rellenar todos los campos!';
         $this->session->set_flashdata('error', $mensaje);
         redirect('reserva/nuevo');

      }

   }


   public function ingresarCliente()
   {

      $this->load->model('vehiculo');

      $autos = $this->vehiculo->getAll();

      $reserva_fecha_desde = $this->input->post('fecha_desde');
      $reserva_fecha_hasta = $this->input->post('fecha_hasta');

      $locacion_entrega    =  $this->input->post('locacion_entrega');
      $locacion_devolucion =  $this->input->post('locacion_devolucion');

      $vehiculo = $this->input->post('vehiculo');

      $extras = [];
      $cantidades = $this->input->post('cantidad');

      foreach ( $cantidades as $id_extra => $cantidad )
      {
          $extras[]   =   [
             'id_extra'  => $id_extra,
             'cantidad'  => $cantidad,
             'info_extra' => $this->extra->getOne($id_extra)
          ];
      }
      $arriendo = array(
         'vehiculo' => $vehiculo,
         'extra' => $extras,
         'fecha_entrega' => $reserva_fecha_desde ,
         'fecha_devolucion' => $reserva_fecha_hasta ,
         'locacion_entrega' => $locacion_entrega,
         'locacion_devolucion' => $locacion_devolucion,
      );

      $this->session->arriendo = $arriendo;

      $this->load->view('template/header');
      $this->load->view('template/nav');
      $this->load->view('reserva/buscar');
      $this->load->view('template/footer');

   }

   public function buscar()
   {

      $rut_busqueda           =  $this->input->post('rut_busqueda');
      $caracteres = array('-',',', '.' );

      $rut = str_replace($caracteres, '' , $rut_busqueda);

      $cliente = $this->cliente->buscar($rut);

      if ( ! $cliente ) {
         redirect('reserva/cliente_nuevo');
      } else {
         redirect('reserva/busqueda/'.$cliente->id_cliente);
      }
    }

    public function clienteNuevo()
   {

       $this->load->view('template/header');
       $this->load->view('template/nav');
       $this->load->view('reserva/cliente_nuevo');
       $this->load->view('template/footer');

   }

    public function busqueda($id_cliente)
    {
       $data['cliente'] = $this->cliente->getOne($id_cliente);

       $this->load->view('template/header');
       $this->load->view('template/nav');
       $this->load->view('reserva/ver', $data);
       $this->load->view('template/footer');

    }

    public function clienteRegistrado()
    {
       $id_cliente = $this->input->post('id_cliente');

       $mensaje = 'Sus datos han sido guardados exitosamente';
       $this->session->set_flashdata('success',$mensaje);
       $this->session->cliente = $id_cliente;
       redirect('reserva/resumen');
    }


    public function guardarCliente()
    {

      $caracteres = array('-',',', '.' );

      $rut                 =  $this->input->post('rut');
      $nombre              =  $this->input->post('nombre');
      $apellido            =  $this->input->post('apellido');
      $direccion           =  $this->input->post('direccion');
      $ciudad              =  $this->input->post('ciudad');
      $fecha_nacimiento    =  $this->input->post('fecha_nacimiento');
      $pais                =  $this->input->post('pais');
      $telefono            =  $this->input->post('telefono');
      $email               =  $this->input->post('email');

      $rut = str_replace($caracteres, '' , $rut);


   if ($rut != null && $nombre != null && $apellido != null && $direccion != null && $ciudad != null && $pais != null && $telefono != null && $email != null) {

         $insert = array(
            'rut' => $rut,
            'nombre' => $nombre,
            'apellido' => $apellido,
            'direccion' => $direccion,
            'ciudad' => $ciudad,
            'fecha_nacimiento' => $fecha_nacimiento,
            'pais' => $pais,
            'telefono' => $telefono,
            'email' => $email
          );

          if (! $this->cliente->guardar($insert)) {

             $mensaje = 'Sus datos han sido guardados exitosamente';
             $this->session->set_flashdata('success',$mensaje);
             $cliente = $this->cliente->buscar($rut);
             $this->session->cliente = $cliente->id_cliente;
             redirect('reserva/resumen');

            } else {
               $error = $this->db->_error_message();
               $mensaje = 'No se pudo guardar la informacion en la base de datos: <br>'.$error;
               $this->session->set_flashdata('error',$mensaje);
               redirect('reserva/cliente_nuevo');
          }

      }else {
         $mensaje = '¡Debe rellenar todos los campos!';
         $this->session->set_flashdata('error', $mensaje);
         redirect('reserva/cliente_nuevo');
      }
    }


    public function resumen()
   {
      ########################################################
      #### Codigo de reserva
      ########################################################
      $fecha = date("Ymd");
      $rand = strtoupper(substr(uniqid(sha1(time())),0,4));

      $codigo = 'RK'. $fecha . $rand;
      ##################################################################
      #### Calculo de dias de arriendo
      ##################################################################

      $fecha_entrega       = DateTime::createFromFormat( 'Y-m-d H:i:s' , $this->session->arriendo['fecha_entrega'] );
      $fecha_devolucion    = DateTime::createFromFormat( 'Y-m-d H:i:s' , $this->session->arriendo['fecha_devolucion'] );

      $fecha_entrega       = $fecha_entrega->getTimestamp();
      $fecha_devolucion    = $fecha_devolucion->getTimestamp();

      $delta_tiempo  = $fecha_devolucion - $fecha_entrega;

      $dias_arriendo = $delta_tiempo / 60 ; // minutos
      $dias_arriendo = $dias_arriendo / 60 ; // horas
      $dias_arriendo = $dias_arriendo / 24 ; // dias

      $dias_arriendo = number_format($dias_arriendo, '2', ',', '.');
      ##################################################################
      #### declaracion de variables
      ##################################################################

      $extras = $this->session->arriendo['extra'];

      $cliente = $this->cliente->getOne($this->session->cliente);

      $vehiculo = $this->vehiculo->getOne($this->session->arriendo['vehiculo']);

      $fecha_entrega = $this->session->arriendo['fecha_entrega'];
      $fecha_devolucion = $this->session->arriendo['fecha_devolucion'];

      $locacion_entrega = $this->locacion->getOne($this->session->arriendo['locacion_entrega']);
      $locacion_devolucion = $this->locacion->getOne($this->session->arriendo['locacion_devolucion']);

      $impuesto = $this->impuesto->getOne('1');

      $iva = '1.' . $impuesto->valor;
      ##################################################################
      #### Precio por el arriendo del vehiculo
      ##################################################################

      $precio_vehiculo = $vehiculo->precio * $dias_arriendo;

      $subtotal = $precio_vehiculo + $locacion_entrega->recargo_entrega + $locacion_devolucion->recargo_devolucion;

      $total = $subtotal * $iva;

      ##################################################################

      $insert = array(
         'codigo_reserva'        =>    $codigo,
         'fecha_entrega'         =>    $fecha_entrega,
         'fecha_devolucion'      =>    $fecha_devolucion,
         'locacion_entrega'      =>    $locacion_entrega->id_locacion,
         'locacion_devolucion'   =>    $locacion_devolucion->id_locacion,
         'id_cliente'            =>    $cliente->id_cliente,
         'id_vehiculo'           =>    $vehiculo->id_vehiculo,
         'precio_arriendo_vehiculo'    => $precio_vehiculo,
         'sub_total'              => $subtotal,
         'total'                 => $total
       );


       if ( ! $this->reserva->guardar( $insert ) )
      {
         $error = $this->db->_error_message();
         $mensaje = 'No se pudo guardar la informacion en la base de datos: <br>'.$error;
         $this->session->set_flashdata('error',$mensaje);
         redirect('reserva');
      } else {
         $mensaje = 'Sus datos han sido guardados exitosamente';
         $this->session->set_flashdata('success',$mensaje);
         foreach ($extras as $extra) {
            if ( $extra['cantidad'] != null) {
              $id_extra = $extra['id_extra'];
              $cantidad = $extra['cantidad'];
              $reserva = $this->reserva->devolverId($codigo);

              $insert2 = array(
                 'id_extra' => $id_extra,
                 'cantidad' => $cantidad,
                 'id_reserva' => $reserva->id_reserva
              );

              $this->extra_reserva->guardar($insert2);
            }
         }
         $reserva = $this->reserva->devolverId($codigo);
         redirect('reserva/ver_reserva/' . $reserva->id_reserva);
      }

   }

   public function verReserva($id_reserva)
   {
      $reserva = $this->reserva->verReserva($id_reserva);

      $vehiculo = $this->vehiculo->getOne($reserva->id_vehiculo);

      $cliente = $this->cliente->getOne($reserva->id_cliente);

      $locacion_entrega = $this->locacion->getOne($reserva->locacion_entrega);
      $locacion_devolucion = $this->locacion->getOne($reserva->locacion_devolucion);

      $datos_extra = $this->extra_reserva->getExtras($reserva->id_reserva);

      $data = array(
         'reserva' => $reserva ,
         'cliente' => $cliente ,
         'vehiculo' => $vehiculo ,
         'locacion_entrega' => $locacion_entrega ,
         'locacion_devolucion' => $locacion_devolucion,
         'extras' => $datos_extra
      );

      //echo "<pre>";
      //print_r($datos_extra);
      $this->load->view('template/header');
      $this->load->view('template/nav');
      $this->load->view('reserva/reserva', $data);
      $this->load->view('template/footer');


   }

   public function actualizarPrecio()
   {
      $descuento = $this->input->post('descuento');
      $id_reserva = $this->input->post('id_reserva');
      $total = $this->input->post('total');
      $descuento = (100 - $descuento)/100;

      //echo "<pre>";
      //print_r($descuento);

      if ($descuento == 0 || $descuento == null ) {
         $insert = array(
            'id_reserva' => $id_reserva ,
            'total' => $total ,
         );


      }else {
         $total = $total * $descuento;
         $insert = array(
            'id_reserva' => $id_reserva ,
            'total' => $total ,
         );

      }

      if ( ! $this->reserva->actualizarPrecio( $insert ) )
          {
             $error = $this->db->_error_message();
             $mensaje = 'No se pudo borrar el elemento: '.$error;
             $this->session->set_flashdata('error', $mensaje );
             redirect('reserva/ver_reserva/' . $id_reserva);
          } else {
             $mensaje = 'Se ha entregado correctamente.';
             $this->session->set_flashdata('success', $mensaje );
             redirect('reserva/ver_reserva/' . $id_reserva);
          }
   }

   public function definirReserva()
   {
      $esCotizacion = $this->input->post('cotizacion');
      $id_reserva = $this->input->post('id_reserva');

      $insert = array(
         'id_reserva' => $id_reserva,
         'cotizacion' => $esCotizacion
      );
      echo "<pre>";
      print_r($insert);

      if ($esCotizacion == 1) {
         if ( ! $this->reserva->esCotizacion($insert) )
             {
                $error = $this->db->_error_message();
                $mensaje = 'No se pudo borrar el elemento: '.$error;
                $this->session->set_flashdata('error', $mensaje );
                redirect('reserva');
             } else {
                $mensaje = 'Se ha entregado correctamente.';
                $this->session->set_flashdata('success', $mensaje );
                redirect('reserva/cotizacion');
             }
      }else {
         redirect('reserva');
      }

   }

   public function entregarVehiculo($id_reserva)
   {
      if ( ! $this->reserva->entregarVehiculo($id_reserva) )
          {
             $error = $this->db->_error_message();
             $mensaje = 'No se pudo borrar el elemento: '.$error;
             $this->session->set_flashdata('error', $mensaje );
             redirect('reserva');
          } else {
             $mensaje = 'Se ha entregado correctamente.';
             $this->session->set_flashdata('success', $mensaje );
             redirect('reserva');
          }
   }

   public function recibirVehiculo($id_reserva)
   {
      if ( ! $this->reserva->recibirVehiculo($id_reserva) )
          {
             $error = $this->db->_error_message();
             $mensaje = 'No se pudo borrar el elemento: '.$error;
             $this->session->set_flashdata('error', $mensaje );
             redirect('reserva');
          } else {
             $mensaje = 'Se ha recibido correctamente.';
             $this->session->set_flashdata('success', $mensaje );
             redirect('reserva');
          }
   }

   public function pagar($id_reserva)
   {
      if ( ! $this->reserva->pagar($id_reserva) )
          {
             $error = $this->db->_error_message();
             $mensaje = 'No se pudo borrar el elemento: '.$error;
             $this->session->set_flashdata('error', $mensaje );
             redirect('reserva');
          } else {
             $mensaje = 'El elemento se ha pagado correctamente.';
             $this->session->set_flashdata('success', $mensaje );
             redirect('reserva');
          }
   }

   public function formatoPdf( $id_reserva )
   {
            $reserva = $this->reserva->verReserva($id_reserva);

          $vehiculo = $this->vehiculo->getOne($reserva->id_vehiculo);

          $cliente = $this->cliente->getOne($reserva->id_cliente);

          $locacion_entrega = $this->locacion->getOne($reserva->locacion_entrega);
          $locacion_devolucion = $this->locacion->getOne($reserva->locacion_devolucion);

          $datos_extra = $this->extra_reserva->getExtras($reserva->id_reserva);

          $data = array(
             'reserva' => $reserva ,
             'cliente' => $cliente ,
             'vehiculo' => $vehiculo ,
             'locacion_entrega' => $locacion_entrega ,
             'locacion_devolucion' => $locacion_devolucion,
             'extras' => $datos_extra
          );

          $this->load->view('reserva/reserva_pdf', $data);
   }
    public function imprimirPDF($id_reserva)
    {
        $url    =   site_url('reserva/reserva_pdf/'.$id_reserva);
        $html   =   file_get_contents ( $url );

        $this->load->library('pdf');
        //$this->pdf->set_option('isHtml5ParserEnabled', true);
        $this->pdf->load_html($html);
        $this->pdf->render();
        $this->pdf->stream( date('YmdHis').'-koyer-reserva-'.trim($id_reserva).'.pdf');
        // AñoMesDiaHoraMinutoSegundo-koyer-reserva-IDReserva.pdf
        // asi despues puedes buscar
        // ls 2017*.pdf
        // y te da todos los pdf de un año donde esten desacrgados.. solo por siu acaso
    }

    public function enviarCorreo()
    {
      $para = 'thejanoo84@gmail.com';
      $titulo = 'mensaje de prueba Koyer';
      // El mensaje
      $mensaje = "Línea 1\r\nLínea 2\r\nLínea 3";

      // Enviarlo
      mail( $para , $titulo , $mensaje);

    }

}
?>
