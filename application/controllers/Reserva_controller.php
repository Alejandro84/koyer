<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reserva_controller extends CI_Controller{

   private $tiempo_espera;

   public function __construct()
   {
      parent::__construct();

      $this->load->model('reserva');

   }

   public function index()
   {
      $data['reservas'] = $this->reserva->getAll();

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
      $this->output->enable_profiler(TRUE);
      
      $this->load->model('vehiculo');

      $autos = $this->vehiculo->getAll();

      $reserva_fecha_desde = $this->input->post('reserva-fecha_desde');
      $reserva_fecha_hasta = $this->input->post('reserva-fecha_hasta');

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

         $disponibles[] = array(
            'info_auto' => $auto,
            'estado' => $estado
         );
      }
      $variables_vista = [
         'disponibles'  => $disponibles
      ];

      $this->load->view('template/header', $variables_vista );
      $this->load->view('template/nav');
      $this->load->view('reserva/disponibles');
      $this->load->view('template/footer');


   }

   public function guardar()
   {
      $patente = $this->input->post('patente');
      $id_modelo = $this->input->post('id_modelo');
      $id_marca = $this->input->post('id_marca');
      $id_transmision = $this->input->post('id_transmision');
      $id_categoria = $this->input->post('id_categoria');
      $id_combustible = $this->input->post('id_combustible');
      $id_tarifa = $this->input->post('id_tarifa');

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
