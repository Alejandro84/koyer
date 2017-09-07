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

   }

   public function index()
   {
      $data['reservas'] = $this->reserva->getDisponibles();

      $this->load->view('template/header');
      $this->load->view('template/nav');
      $this->load->view('reserva/listar', $data);
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


         //echo "<pre>";
         //print_r($variables_vista);

         $this->load->view('template/header', $variables_vista );
         $this->load->view('template/nav');
         $this->load->view('reserva/disponibles');
         $this->load->view('template/footer');


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
               //$error = $this->db->_error_message();
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
      $this->load->model('locacion');
      $this->load->model('extra');

      $fecha = date("Ymd");
      $rand = strtoupper(substr(uniqid(sha1(time())),0,4));

      $codigo = 'RK'. $fecha . $rand;

      $data = array(
         'codigo' => $codigo,
         'arriendo' => $this->session->arriendo,
         'cliente' => $this->session->cliente,
         'locaciones' => $this->locacion->getAll(),
         'vehiculo' => $this->vehiculo->getOne($this->session->arriendo['vehiculo']),
         'datos_cliente' => $this->cliente->getOne($this->session->cliente),
         'impuestos' => $this->impuesto->getAll(),
         'extras' => $this->extra->getAll()
      );

      //echo "<pre>";
      //print_r($data);
      $this->load->view('template/header' , $data);
      $this->load->view('template/nav');
      $this->load->view('reserva/resumen');
      $this->load->view('template/footer');

   }

   public function guardar()
   {
      $patente          =  $this->input->post('patente');
      $id_modelo        =  $this->input->post('id_modelo');
      $id_marca         =  $this->input->post('id_marca');
      $id_transmision   =  $this->input->post('id_transmision');
      $id_categoria     =  $this->input->post('id_categoria');
      $id_combustible   =  $this->input->post('id_combustible');
      $id_tarifa        =  $this->input->post('id_tarifa');

      if ( $patente != null && $id_modelo != null && $id_marca != null && $id_transmision != null && $id_categoria != null && $id_combustible != null && $id_tarifa != null )
         {

          $insert = array(
                         'patente' => $patente,
                         'id_modelo' => $id_modelo,
                         'id_marca' => $id_marca,
                         'id_transmision' => $id_transmision,
                         'id_categoria' => $id_categoria,
                         'id_combustible' => $id_combustible,
                         'id_tarifa' => $id_tarifa
                      );

            if ( ! $this->reserva->guardar( $insert ) )
            {
               //$error = $this->db->_error_message();
               $mensaje = 'No se pudo guardar la informacion en la base de datos: <br>'.$error;
               //$this->session->set_flashdata('error',$mensaje);
               redirect('reserva');
            } else {
               $mensaje = 'Sus datos han sido guardados exitosamente';
               //$this->session->set_flashdata('success',$mensaje);
               redirect('reserva');
            }
         } else {
            $mensaje = '¡Debe rellenar todos los campos!';
            //$this->session->set_flashdata('error', $mensaje);
            redirect('reserva/nuevo');
         }

   }

   public function editar($id_reserva)
   {
      $this->load->model('modelo');
      $this->load->model('marca');
      $this->load->model('combustible');
      $this->load->model('transmision');
      $this->load->model('categoria');
      $this->load->model('tarifa');

      $data = array(
         'reserva' => $this->reserva->getOne($id_reserva),
         'modelo' => $this->modelo->getAll(),
         'marca' => $this->marca->getAll(),
         'combustible' => $this->combustible->getAll(),
         'transmision' => $this->transmision->getAll(),
         'categoria' => $this->categoria->getAll(),
         'tarifa' => $this->tarifa->getAll(),
       );


       $this->load->view('template/header');
       $this->load->view('template/nav');
      $this->load->view('reserva/editar', $data);
      $this->load->view('template/footer');
   }


   public function cancelar($id_reserva)
   {
      if ( ! $this->reserva->borrar($id_reserva) )
          {
             //$error = $this->db->_error_message();
             $mensaje = 'No se pudo borrar el elemento: '.$error;
             // el flash data para mostrarlo en el listado
             //$this->session->set_flashdata('error', $mensaje );
             redirect('reserva');
          } else {
             // todo ok, creamos el mensaje y lo enviamos
             $mensaje = 'Elemento borrado de manera correcta. <a href="'.site_url('admin/taxis/papelera').'">¿Desea recuperarlo?</a>';
             //$this->session->set_flashdata('success', $mensaje );
             redirect('reserva');
          }
   }


}
?>
