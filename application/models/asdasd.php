<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Vehiculo extends CI_Model{

   public function getAll()
   {
      $this->db->select( '*' );
      $this->db->from( 'wpsr_car_rental_items' );
      $this->db->where( 'blog_id', 1 );
      $this->db->order_by('manufacturer_id');
      $q = $this->db->get();

      if ( $q->num_rows() < 1 )
      {
         // si no hay, al menos 1 resultado, devolvemo falso, esto lo usamos en el view
         return false;
      } else {
         // si las filas totales son 1 o más, devolvemos el objeto que entrega el metodo result()
         // y esto es lo que queda en el $data['taxis'] = $this->taxi->getAll() en el controller
         return $q->result();
      }
   }

   public function getOne($id)
   {
      $this->db->select('*');
      $this->db->from('wpsr_car_rental_items');
      $this->db->where('item_id', $id);
      $q = $this->db->get();
      if ( $q->num_rows() > 0 )
      {
         $resultado = $q->result();
         return $resultado[0];
      } else {
         return false;
      }
   }
}
?>
