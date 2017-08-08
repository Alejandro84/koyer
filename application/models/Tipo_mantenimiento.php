<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tipo_mantenimiento extends CI_Model{

   public function __construct()
   {
     parent::__construct();

   }

    public function getAll()
   {
      $this->db->select('*');
      $this->db->from('tipos_mantenimientos');
      $this->db->where('estado' , 1);


      $q = $this->db->get();

      if ($q->num_rows() < 1) {
         return false;
      } else {
         return $q->result();
      }
   }

}


?>
