<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Impuesto extends CI_Model{

   public function __construct()
   {
    parent::__construct();
    //Codeigniter : Write Less Do More
   }

   public function getAll()
   {
     $this->db->select('*');
     $this->db->from('impuestos');
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
       $this->db->from('impuestos');
       $this->db->where('id_impuesto' , $id);

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
     $this->db->insert('impuestos', $data ) ;
   }


   public function borrar( $id )
   {

      $this->db->where( 'id_impuesto', $id );
      $estado = array ( 'estado' => 0 );

      if ( ! $this->db->update('impuestos', $estado ) )
      {
         return false;

      } else {

         return true;

      }
   }

   public function actualizar( $data, $id )
   {

      $this->db->where( 'id_impuesto', $id );

      if ( ! $this->db->update('impuestos', $data ) )
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
      $this->db->from('impuestos');
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

      $this->db->where( 'id_impuesto', $id );
      $estado = array ( 'estado' => 1 );

      if ( ! $this->db->update('impuestos', $estado ) )
      {
         return false;

      } else {

         return true;

      }
   }


}
