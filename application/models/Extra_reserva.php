<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Extra_reserva extends CI_Model{

   public function __construct()
   {
    parent::__construct();
    //Codeigniter : Write Less Do More
   }

   public function getAll()
   {
     $this->db->select('*');
     $this->db->from('extra_reservas');
     $this->db->where('estado' , 1);

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
       $this->db->from('extras_reservas');
       $this->db->where('id_extra_reserva' , $id);

       $q = $this->db->get();

       if ( $q->num_rows() > 0 )
      {
         $resultado = $q->result();
         return $resultado[0];

      } else {

         return false;

      }
   }

   public function getExtras($id)
   {
       $this->db->select('ER.*');
       $this->db->select('EX.*');

       $this->db->from('extras_reservas as ER');
       $this->db->join('extras as EX', 'ER.id_extra = EX.id_extra', 'left');
       $this->db->where('id_reserva' , $id);

       $q = $this->db->get();

       if ($q->num_rows() < 1) {
          return false;
       } else {
          return $q->result();
       }
   }
 
   public function guardar( $data )
   {
      if ( ! $this->db->insert('extras_reservas', $data )) {
         return false;
      }   else {
         return true;
      }
   }


   public function borrar( $id )
   {

      $this->db->where( 'id_extra_reserva', $id );
      $estado = array ( 'estado' => 0 );

      if ( ! $this->db->update('extras_reservas', $estado ) )
      {
         return false;

      } else {

         return true;

      }
   }

   public function actualizar( $data, $id )
   {

      $this->db->where( 'id_extra_reserva', $id );

      if ( ! $this->db->update('extras_reservas', $data ) )
      {
         return false;

      } else {

         return true;

      }

   }

   //####### BORRADOS #########
   public function getTrash()
   {

      $this->db->select('*');
      $this->db->from('extras_reservas');
      $this->db->where( 'estado', 0);
      $q = $this->db->get();

      if ( $q->num_rows() < 1 )
      {
         return false;

      } else {
         return $q->result();
      }
   }

   public function activar( $id )
   {

      $this->db->where( 'id_extra_reserva', $id );
      $estado = array ( 'estado' => 1 );

      if ( ! $this->db->update('extras_reservas', $estado ) )
      {
         return false;

      } else {

         return true;

      }
   }


}
