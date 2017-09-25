<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Descuento extends CI_Model{

   public function __construct()
   {
    parent::__construct();
    //Codeigniter : Write Less Do More
   }

   public function getAll()
   {
     $this->db->select('*');
     $this->db->from('descuentos');
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
       $this->db->from('descuentos');
       $this->db->where('id_descuento' , $id);

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
     $this->db->insert('descuentos', $data ) ;
   }


   public function borrar( $id )
   {

      $this->db->where( 'id_descuento', $id );
      $estado = array ( 'estado' => 0 );

      if ( ! $this->db->update('descuentos', $estado ) )
      {
         return false;

      } else {

         return true;

      }
   }

   public function actualizar( $data, $id )
   {

      $this->db->where( 'id_descuento', $id );

      if ( ! $this->db->update('descuentos', $data ) )
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
      $this->db->from('descuentos');
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

      $this->db->where( 'id_descuento', $id );
      $estado = array ( 'estado' => 1 );

      if ( ! $this->db->update('descuentos', $estado ) )
      {
         return false;

      } else {

         return true;

      }
   }


}
