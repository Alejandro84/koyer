<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api_controller extends CI_Controller{

   public function __construct()
   {
      parent::__construct();
      $this->load->model('reserva');
      $this->load->model('vehiculo');
      $this->load->model('locacion');
   }

   function getReservas($fecha_busqueda)
   {
        $fecha = DateTime::createFromFormat( 'Y-m-d' , $fecha_busqueda );
        
        $vehiculosSection;
        $reservasItems;
        $vehiculos = $this->vehiculo->vehiculoApi();
        $reservas = $this->reserva->reservasApi($fecha);

        $clases = array(
            'item-status-none',
            'item-status-one',
            'item-status-two',
            'item-status-three'
        );

        foreach( $vehiculos as $v ) {
            $vehiculosSection[] = [
                'id' => $v->id_vehiculo,
                'name' => $v->patente .' ' . $v->marca .' '. $v->modelo,
            ];
        }
        $events;
        
        foreach ($reservas as $reserva) {
            $reservasItems[] = [
                'id' => $reserva->id_reserva,             
                'name' => '<div>' . $reserva->nombre .' '. $reserva->apellido. '</div> <div>'. $reserva->codigo_reserva .'</div>',
                'sectionID' => $reserva->id_vehiculo,
                'start'=> $reserva->fecha_entrega,
                'end' => $reserva->fecha_devolucion,
                'clases' => $clases[array_rand($clases, 1)],
                'reserva' => $reserva    
                
            ];
        }
        
        $data = array(
            'Sections' => $vehiculosSection,
            'Items' => $reservasItems,
        );

        $this->output->set_content_type('application/json')->set_output(json_encode($data));
    }

}

?>
