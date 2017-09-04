<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario extends CI_Model{

   public function __construct()
   {
    parent::__construct();
    //Codeigniter : Write Less Do More
   }

   public function verificar( $usuario, $password )
   {

      $this->db->select('*');
      $this->db->from('usuarios');
      $this->db->where('usuario', $usuario);
      $this->db->where('clave', $password);
      $this->db->where('estado', 1 );
      $this->db->limit(1);
      $q = $this->db->get();

      if ( $q->num_rows() > 0 )
      {
         $resultado = $q->result();
         return $resultado[0];
      } else {

         return false;

      }

   }


   public function getAll()
   {

      $this->db->select('u.*');
      $this->db->select('r.nombre as rol');
      $this->db->from('usuarios as u');
      $this->db->join('roles as r', 'u.rol_id=r.id_rol', 'left' );
      $this->db->where( 'u.estado', 1);
      $q = $this->db->get();

      if ( $q->num_rows() < 1 )
      {
         return false;

      } else {
         return $q->result();
      }
   }

   public function getOne($id)
   {

      $this->db->select('*');
      $this->db->from('usuarios');
      $this->db->where('id_usuario', $id);
      $q = $this->db->get();

      if ( $q->num_rows() > 0 )
      {
         $resultado = $q->result();
         return $resultado[0];

      } else {

         return false;

      }
   }



   public function getTrash()
   {

      $this->db->select('*');
      $this->db->from('usuarios');
      $this->db->where( 'estado', 0);
      $q = $this->db->get();

      if ( $q->num_rows() < 1 )
      {
         return false;

      } else {
         return $q->result();
      }
   }

   public function guardar( $data )
   {
      if ( ! $this->db->insert('usuarios', $data ) )
      {
         return false;
      } else {
         return true;
      }
   }

   public function borrar( $id )
   {

      $this->db->where( 'id_usuario', $id );
      $estado = array ( 'estado' => 0 );

      if ( ! $this->db->update('usuarios', $estado ) )
      {
         return false;

      } else {

         return true;

      }

   }

   public function actualizar( $data, $id )
   {

      $this->db->where( 'id_usuario', $id );

      if ( ! $this->db->update('usuarios', $data ) )
      {
         return false;

      } else {

         return true;

      }

   }

}
