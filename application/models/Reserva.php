<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reserva extends CI_Model{

  public function __construct()
  {
    parent::__construct();

  }

  public function getAll()
  {
     $this->db->select( '*' );
     $this->db->from( 'wpsr_car_rental_bookings' );
     $this->db->where( 'payment_successful', 1 );
     $this->db->where( 'is_cancelled', 0 );
     //$this->db->order_by('manufacturer_id');
     $q = $this->db->get();

     if ( $q->num_rows() < 1 )
     {

        return false;
     } else {

        return $q->result();
     }
  }

  

}
