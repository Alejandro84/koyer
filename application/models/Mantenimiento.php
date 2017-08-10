<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mantenimiento extends CI_Model{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }

   public function getAll()
  {
     $this->db->select('*');
     $this->db->from('mantenimientos as MA');
     $this->db->join('tipos_mantenimientos as TMA', 'MA.id_tipo_mantenimiento = TMA.id_tipo_mantenimiento', 'left');
     $this->db->where('MA.estado' , 1);


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
      $this->db->from('mantenimientos as mo');
      $this->db->join('tipos_mantenimientos as TMA', 'MA.id_tipo_mantenimiento = TMA.id_tipo_mantenimiento', 'left');
      $this->db->where('id_mantenimiento' , $id);

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
     $this->db->insert('mantenimientos', $data ) ;
  }


   public function borrar( $id )
   {

      $this->db->where( 'id_mantenimiento', $id );
      $estado = array ( 'estado' => 0 );

      if ( ! $this->db->update('mantenimientos', $estado ) )
      {
         return false;

      } else {

         return true;

      }
   }

   public function actualizar( $data, $id )
      {

         $this->db->where( 'id_mantenimiento', $id );

         if ( ! $this->db->update('mantenimientos', $data ) )
         {
            return false;

         } else {

            return true;

         }

      }
      public function gettipo_mantenimiento()
     {
        $this->db->select('*');
        $this->db->from('tipo_mantenimientos');
        $this->db->where('estado' , 1);


        $q = $this->db->get();

        if ($q->num_rows() < 1) {
           return false;
        } else {
           return $q->result();
        }
     }

}