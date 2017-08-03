<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Modelo extends CI_Model{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }

   public function getAll()
  {
     $this->db->select('*');
     $this->db->from('modelos as mo');
     $this->db->join('marcas as ma', 'mo.id_marca = ma.id_marca', 'left');
     $this->db->where('mo.estado' , 1);


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
      $this->db->from('modelos as mo');
      $this->db->join('marcas as ma', 'mo.id_marca = ma.id_marca', 'left');
      $this->db->where('id_modelo' , $id);

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
     $this->db->insert('modelos', $data ) ;
  }


   public function borrar( $id )
   {

      $this->db->where( 'id_modelo', $id );
      $estado = array ( 'estado' => 0 );

      if ( ! $this->db->update('modelos', $estado ) )
      {
         return false;

      } else {

         return true;

      }
   }

   public function actualizar( $data, $id )
      {

         $this->db->where( 'id_modelo', $id );

         if ( ! $this->db->update('modelos', $data ) )
         {
            return false;

         } else {

            return true;

         }

      }
      public function getMarca()
     {
        $this->db->select('*');
        $this->db->from('marcas');
        $this->db->where('estado' , 1);


        $q = $this->db->get();

        if ($q->num_rows() < 1) {
           return false;
        } else {
           return $q->result();
        }
     }

}
