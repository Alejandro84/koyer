<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Categoria extends CI_Model{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }

   public function getAll()
  {
     $this->db->select('*');
     $this->db->from('categorias');
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
       $this->db->from('categorias');
       $this->db->where('id_categoria' , $id);

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
     $this->db->insert('categorias', $data ) ;
  }


   public function borrar( $id )
   {

      $this->db->where( 'id_categoria', $id );
      $estado = array ( 'estado' => 0 );

      if ( ! $this->db->update('categorias', $estado ) )
      {
         return false;

      } else {

         return true;

      }
   }

   public function actualizar( $data, $id )
      {

         $this->db->where( 'id_categoria', $id );

         if ( ! $this->db->update('categorias', $data ) )
         {
            return false;

         } else {

            return true;

         }

      }


}
