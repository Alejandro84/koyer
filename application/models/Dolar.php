<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dolar extends CI_Model{

   public function __construct()
   {
    parent::__construct();
    //Codeigniter : Write Less Do More
   }


   public function getDolar()
   {
       $this->db->select('*');
       $this->db->from('dolares');
       $this->db->where('divisa' , 'dolar' );

       $q = $this->db->get();

       if ( $q->num_rows() > 0 )
      {
         $resultado = $q->result();
         return $resultado[0];

      } else {

         return false;

      }
   }

   public function actualizar( $data, $id_divisa )
   {

      $this->db->where( 'id_divisa', $id_divisa );

      if ( ! $this->db->update('dolares', $data ) )
      {
         return false;

      } else {

         return true;

      }

   }

}
