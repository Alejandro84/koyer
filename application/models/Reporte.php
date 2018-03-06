<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reporte extends CI_Model{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }

  public function getAll()
  {
      $this->db->select('total');
      $this->db->from('reservas');
      $this->db->where('cotizacion' , 0);
      $this->db->where('fecha_entrega >= ' . 2018-03-01 00:00:00 .' AND fecha_devolucion >= ' . 2018-03-01 00:00:00);

      $q = $this->db->get();

      if ($q->num_rows() < 1) {
         return false;
      } else {
         return $q->result();
      }
  }

}
