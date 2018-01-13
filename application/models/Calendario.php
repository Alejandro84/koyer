<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Calendario extends CI_Model{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }
  /**
  * Devuelve las reservas en un mes
  * @param int $mes mes a filtrar
  **/

  public function getReservas($mes )
  {
      $this->db->select('*');
      $this->db->from('reservas');
      $this->db->where('estado', 1);
      $q = $this->db->get();

      if ( $q->num_rows() < 1 )
      {

         return false;
      } else {

         return $q->result();
      }
  }

}
