<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Fabian extends CI_Model{

   public function __construct()
   {
      parent::__construct();
      // Codeigniter : Write Less Do More
      // pichulita
   }

   public function getBookings()
   {
      $this->db->select('booking_id, booking_code, pickup_timestamp, return_timestamp, pickup_location_code, return_location_code, customer_id');
      $this->db->from('wpsr_car_rental_bookings');
      $this->db->where( 'payment_successful', 1 );
      $this->db->where( 'is_cancelled', 0 );

      $query = $this->db->get();

      return $query->result();
   }

   public function getLugar( $location_code )
   {
      $this->db->select('location_id, location_code, location_name, return_fee, pickup_fee');
      $this->db->from('wpsr_car_rental_locations');
      $this->db->where('location_code', $location_code );
      $query = $this->db->get();
      return $query->result();
   }

   public function getBooking( $id_booking)
   {
      $this->db->select('booking_id, booking_code, pickup_timestamp, return_timestamp, pickup_location_code, return_location_code, customer_id');
      $this->db->from('wpsr_car_rental_bookings');
      $this->db->where('booking_id', $id_booking );

      $query = $this->db->get();

      return $query->result();
   }

   public function getFactura( $booking_id )
   {
      $this->db->select('booking_id, customer_name, customer_email, grand_total, fixed_deposit_amount');
      $this->db->select('total_pay_now, total_pay_later, pickup_location, return_location');
      $this->db->from('wpsr_car_rental_invoices');
      $this->db->where('booking_id', $booking_id );

      $query = $this->db->get();
      return $query->result();
   }

   public function getFacturas()
   {
      $this->db->select('booking_id, customer_name, customer_email, grand_total, fixed_deposit_amount');
      $this->db->select('total_pay_now, total_pay_later, pickup_location, return_location');
      $this->db->from('wpsr_car_rental_invoices');

      $query = $this->db->get();
      return $query->result();
   }

}
