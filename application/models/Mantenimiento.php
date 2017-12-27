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
     $this->db->select('MA.*');
     $this->db->select('TMA.mantenimiento');
     $this->db->select('VE.patente');
     $this->db->select('MO.modelo');
     $this->db->from('mantenimientos as MA');
     $this->db->join('tipos_mantenimientos as TMA', 'MA.id_tipo_mantenimiento = TMA.id_tipo_mantenimiento', 'left');
     $this->db->join('vehiculos as VE', 'MA.id_vehiculo = VE.id_vehiculo ', 'left');
     $this->db->join('modelos as MO', 'MO.id_modelo = VE.id_modelo ', 'left');
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
      $this->db->select('MA.*');
     $this->db->select('TMA.mantenimiento');
     $this->db->select('VE.patente');
     $this->db->select('MO.modelo');
     $this->db->from('mantenimientos as MA');
     $this->db->join('tipos_mantenimientos as TMA', 'MA.id_tipo_mantenimiento = TMA.id_tipo_mantenimiento', 'left');
     $this->db->join('vehiculos as VE', 'MA.id_vehiculo = VE.id_vehiculo ', 'left');
     $this->db->join('modelos as MO', 'MO.id_modelo = VE.id_modelo ', 'left');
      $this->db->where('MA.id_mantenimiento' , $id);

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
     if (! $this->db->insert('mantenimientos', $data )) {
        return false;
     }else {
        return true;
     }

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

      public function getMantenimientosVehiFec($data)
     {
        $id_vehiculo = $data['id_vehiculo'];
        $fecha_desde = $data['fecha_desde'];
        $fecha_hasta = $data['fecha_hasta'];

        $this->db->select('MA.*');
        $this->db->select('TMA.mantenimiento');
        $this->db->select('VE.patente');
        $this->db->select('MO.modelo');
        $this->db->from('mantenimientos as MA');
        $this->db->join('tipos_mantenimientos as TMA', 'MA.id_tipo_mantenimiento = TMA.id_tipo_mantenimiento', 'left');
        $this->db->join('vehiculos as VE', 'MA.id_vehiculo = VE.id_vehiculo ', 'left');
        $this->db->join('modelos as MO', 'MO.id_modelo = VE.id_modelo ', 'left');
        $this->db->where('MA.id_vehiculo = ' . $id_vehiculo. ' and "MA.fecha_mantencion" => '.$fecha_desde.' and "MA.fecha_mantencion" =< '.$fecha_hasta );
        $this->db->where('MA.estado' , 1);

        $q = $this->db->get();

        if ($q->num_rows() < 1) {
           return false;
        } else {
           return $q->result();
        }
     }

     public function getMantenimientosVehi($data)
    {
      $id_vehiculo = $data['id_vehiculo'];

      $this->db->select('MA.*');
      $this->db->select('TMA.mantenimiento');
      $this->db->select('VE.patente');
      $this->db->select('MO.modelo');
      $this->db->from('mantenimientos as MA');
      $this->db->join('tipos_mantenimientos as TMA', 'MA.id_tipo_mantenimiento = TMA.id_tipo_mantenimiento', 'left');
      $this->db->join('vehiculos as VE', 'MA.id_vehiculo = VE.id_vehiculo ', 'left');
      $this->db->join('modelos as MO', 'MO.id_modelo = VE.id_modelo ', 'left');
      $this->db->where('MA.id_vehiculo = "'. $id_vehiculo.'"');
      $this->db->where('MA.estado' , 1);

      $q = $this->db->get();

      if ($q->num_rows() < 1 ) {
          return false;
      } else {
          return $q->result();
      }
    }


    public function getMantenimientosFec($data)
   {
     $fecha_desde = $data['fecha_desde'];
     $fecha_hasta = $data['fecha_hasta'];

     $this->db->select('MA.*');
     $this->db->select('TMA.mantenimiento');
     $this->db->select('VE.patente');
     $this->db->select('MO.modelo');
     $this->db->from('mantenimientos as MA');
     $this->db->join('tipos_mantenimientos as TMA', 'MA.id_tipo_mantenimiento = TMA.id_tipo_mantenimiento', 'left');
     $this->db->join('vehiculos as VE', 'MA.id_vehiculo = VE.id_vehiculo ', 'left');
     $this->db->join('modelos as MO', 'MO.id_modelo = VE.id_modelo ', 'left');
     $this->db->where('"MA.fecha_mantencion" >= "'.$fecha_desde.'" and "MA.fecha_mantencion" <= "'.$fecha_hasta.'"' );
     $this->db->where('MA.estado' , 1);

     $q = $this->db->get();

     if ($q->num_rows() < 1) {
         return false;
     } else {
         return $q->result();
     }
   }

   public function getUltimoKilometraje($id_vehiculo)
   {

       $this->db->select('*');
       $this->db->from('kilometrajes');
       $this->db->where('id_vehiculo', $id_vehiculo);
       $this->db->order_by('kilometraje', 'desc' );
       $this->db->limit(1);

       $q = $this->db->get();

       if ($q->num_rows() < 1) {
           return false;
       } else {
           return $q->result()[0];
       }
   }


}
