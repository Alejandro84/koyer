<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Fabian_controller extends CI_Controller{

   public function __construct()
   {
      parent::__construct();
   }

   function index()
   {

      $this->load->model('fabian');
      $bookings   =  $this->fabian->getBookings();

      $reservas;

      foreach ( $bookings as $booking )
      {
         $fecha_retiro     =  $this->formatearFecha( $booking->pickup_timestamp );
         $fecha_devolucion =  $this->formatearFecha( $booking->return_timestamp );
         $lugar_retiro     =  '';

         if ( $booking->pickup_location_code != "" ){
            $lugar_retiro     =  $this->fabian->getLugar( $booking->pickup_location_code )[0];
         }

         $reservas[] =  array(
            'booking_info'       => $booking,
            'fecha_retiro'       => $fecha_retiro,
            'fecha_devolucion'   => $fecha_devolucion,
            'lugar_retiro'       => $lugar_retiro
         );
      }

      echo '<pre>';
      print_r( $reservas );

   }

   private function formatearFecha( $timestamp )
   {
      $fecha = new DateTime();
      $fecha->setTimestamp( $timestamp );
      return $fecha->format('d/m/Y - H:i:s');
   }
}
