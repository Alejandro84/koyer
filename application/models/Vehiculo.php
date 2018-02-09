<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Vehiculo extends CI_Model{

  public function __construct()
  {
    parent::__construct();

  }

   public function getAll()
      {
        $this->db->select('VE.id_vehiculo');
        $this->db->select('VE.patente');
        $this->db->select('MA.marca');
        $this->db->select('MO.modelo');
        $this->db->select('TR.transmision');
        $this->db->select('CO.combustible');
        $this->db->select('CA.categoria');
        $this->db->select('TA.precio');
        $this->db->from('vehiculos as VE');
        $this->db->join('modelos as MO', 'VE.id_modelo = MO.id_modelo', 'left');
        $this->db->join('marcas as MA', 'VE.id_marca = MA.id_marca', 'left');
        $this->db->join('transmisiones as TR', 'VE.id_transmision = TR.id_transmision', 'left');
        $this->db->join('combustibles as CO', 'VE.id_combustible = CO.id_combustible', 'left');
        $this->db->join('categorias as CA', 'VE.id_categoria = CA.id_categoria', 'left');
        $this->db->join('tarifas as TA', 'VE.id_tarifa = TA.id_tarifa', 'left');
        $this->db->where('VE.estado' , 1);


     $q = $this->db->get();

     if ($q->num_rows() < 1) {
        return false;
     } else {
        return $q->result();
     }
  }

   public function getOne($id)
      {
         $this->db->select('VE.*');
         $this->db->select('MA.marca');
         $this->db->select('MO.modelo');
         $this->db->select('TR.transmision');
         $this->db->select('CO.combustible');
         $this->db->select('CA.categoria');
         $this->db->select('TA.precio');
         $this->db->from('vehiculos as VE');
         $this->db->join('modelos as MO', 'VE.id_modelo = MO.id_modelo', 'left');
         $this->db->join('marcas as MA', 'VE.id_marca = MA.id_marca', 'left');
         $this->db->join('transmisiones as TR', 'VE.id_transmision = TR.id_transmision', 'left');
         $this->db->join('combustibles as CO', 'VE.id_combustible = CO.id_combustible', 'left');
         $this->db->join('categorias as CA', 'VE.id_categoria = CA.id_categoria', 'left');
         $this->db->join('tarifas as TA', 'VE.id_tarifa = TA.id_tarifa', 'left');
         $this->db->where('VE.id_vehiculo' , $id);

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
     $this->db->insert('vehiculos', $data ) ;
  }


   public function borrar( $id )
   {

      $this->db->where( 'id_vehiculo', $id );
      $estado = array ( 'estado' => 0 );

      if ( ! $this->db->update('vehiculos', $estado ) )
      {
         return false;

      } else {

         return true;

      }
   }

   public function actualizar( $data, $id )
      {

         $this->db->where( 'id_vehiculo', $id );

         if ( ! $this->db->update('vehiculos', $data ) )
         {
            return false;

         } else {

            return true;

         }

      }

   public function getTrash()
   {
      $this->db->select('VE.*');
      $this->db->select('MA.marca');
      $this->db->select('MO.modelo');
      $this->db->select('TR.transmision');
      $this->db->select('CO.combustible');
      $this->db->select('CA.categoria');
      $this->db->select('TA.precio');
      $this->db->from('vehiculos as VE');
      $this->db->join('modelos as MO', 'VE.id_modelo = MO.id_modelo', 'left');
      $this->db->join('marcas as MA', 'VE.id_marca = MA.id_marca', 'left');
      $this->db->join('transmisiones as TR', 'VE.id_transmision = TR.id_transmision', 'left');
      $this->db->join('combustibles as CO', 'VE.id_combustible = CO.id_combustible', 'left');
      $this->db->join('categorias as CA', 'VE.id_categoria = CA.id_categoria', 'left');
      $this->db->join('tarifas as TA', 'VE.id_tarifa = TA.id_tarifa', 'left');
      $this->db->where( 'VE.estado', 0);

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
      $this->db->where( 'id_vehiculo', $id );
      $estado = array ( 'estado' => 1 );

      if ( ! $this->db->update('vehiculos', $estado ) )
      {
        return false;

      } else {

        return true;
     }
   }

   public function disponible()
      {
        $this->db->select('VE.*');
        $this->db->select('MA.marca');
        $this->db->select('MO.modelo');
        $this->db->select('TR.transmision');
        $this->db->select('CO.combustible');
        $this->db->select('CA.categoria');
        $this->db->select('TA.precio');
        $this->db->from('vehiculos as VE');
        $this->db->join('modelos as MO', 'VE.id_modelo = MO.id_modelo', 'left');
        $this->db->join('marcas as MA', 'VE.id_marca = MA.id_marca', 'left');
        $this->db->join('transmisiones as TR', 'VE.id_transmision = TR.id_transmision', 'left');
        $this->db->join('combustibles as CO', 'VE.id_combustible = CO.id_combustible', 'left');
        $this->db->join('categorias as CA', 'VE.id_categoria = CA.id_categoria', 'left');
        $this->db->join('tarifas as TA', 'VE.id_tarifa = TA.id_tarifa', 'left');
        $this->db->where('VE.disponible' , 1);
        $this->db->where('VE.estado' , 1);

        $q = $this->db->get();

       if ($q->num_rows() < 1) {
          return false;
       } else {
          return $q->result();
       }
     }
}
