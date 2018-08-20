<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cliente extends CI_Model{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }

   public function getAll()
  {
     $this->db->select('*');
     $this->db->from('clientes');


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
       $this->db->from('clientes');
       $this->db->where('id_cliente' , $id);

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
    if (! $this->db->insert('clientes', $data ) ) {
      return false;

    } else {

       return true;
    }
    
  }


   public function borrar( $id )
   {

      $this->db->where( 'id_cliente', $id );
      $estado = array ( 'estado' => 0 );

      if ( ! $this->db->update('clientes', $estado ) )
      {
         return false;

      } else {

         return true;

      }
   }

   public function actualizar( $data, $id )
      {

         $this->db->where( 'id_cliente', $id );

         if ( ! $this->db->update('clientes', $data ) )
         {
            return false;

         } else {

            return true;

         }

      }

      public function buscar($id)
       {
           $this->db->select('*');
           $this->db->from('clientes');
           $this->db->where('rut' , $id);

           $q = $this->db->get();

           if ( $q->num_rows() === 0 )
           {
             return false;
          } else {
             return $q->result()[0];
          }

       }

  public function getPaises()
  {
      $this->db->select('*');
      $this->db->from('paises');


      $q = $this->db->get();

      if ($q->num_rows() < 1) {
        return false;
      } else {
        return $q->result();
      }
  }

}
