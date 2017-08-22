<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tarifa extends CI_Model{

   public function __construct()
   {
      parent::__construct();
      //Codeigniter : Write Less Do More
   }

   public function getAll()
   {
      $this->db->select('*');
      $this->db->from('tarifas as TA ');
      $this->db->join('modelos as MO', 'TA.id_modelo = MO.id_modelo', 'left');
      $this->db->where('TA.estado' , 1);

      $q = $this->db->get();

      if ($q->num_rows() < 1) {
         return false;
      } else {
         return $q->result();
      }
   }

   public function getOne($id)
   {
      $this->db->select('*');
      $this->db->from('tarifas as TA ');
      $this->db->join('modelos as MO', 'TA.id_modelo = MO.id_modelo', 'left');
      $this->db->where('TA.id_tarifa' , $id);

      $q = $this->db->get();

      if ( $q->num_rows() > 0 )
      {
      $resultado = $q->result();
      return $resultado[0];

      } else {
         return false;
      }
   }

   public function guardar( $data )
   {
      $this->db->insert('tarifas', $data ) ;
   }


   public function borrar( $id )
   {

      $this->db->where( 'id_tarifa', $id );
      $estado = array ( 'estado' => 0 );

      if ( ! $this->db->update('tarifas', $estado ) )
      {
         return false;
      } else {
         return true;
      }
   }

   public function actualizar( $data, $id )
   {
      $this->db->where( 'id_tarifa', $id );

      if ( ! $this->db->update('tarifas', $data ) )
      {
         return false;
      } else {
         return true;
      }

   }
}
