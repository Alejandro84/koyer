<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reserva extends CI_Model{

  public function __construct()
  {
    parent::__construct();

  }

  public function getArrendados()
  {
     $this->db->select( 'RE.*' );
     $this->db->select( 'VE.patente' );
     $this->db->select( 'CL.nombre' );
     $this->db->select( 'CL.apellido' );

     $this->db->from( 'reservas as RE' );

     $this->db->join( 'vehiculos as VE', 'RE.id_vehiculo = VE.id_vehiculo', 'left' );
     $this->db->join( 'clientes as CL', 'RE.id_cliente = CL.id_cliente', 'left' );

     $this->db->where( 'RE.estado', 1 );

     $q = $this->db->get();

     if ( $q->num_rows() < 1 )
     {

        return false;
     } else {

        return $q->result();
     }
  }

  public function verReserva($id)
  {
     $this->db->select( '*' );
     $this->db->from( 'reservas' );
     $this->db->where( 'id_reserva', $id );

     $q = $this->db->get();

     if ( $q->num_rows() > 0 )
   {
     $disponibles = $q->result();
     return $disponibles[0];

   } else {

     return false;

   }
  }


   public function buscar($id_vehiculo, $fechas)
   {
      $fecha_entrega    =  $fechas['fecha_entrega'];
      $fecha_devolucion =  $fechas['fecha_devolucion'];


      $this->db->select('*');
      $this->db->from('reservas');
      $this->db->where('id_vehiculo', $id_vehiculo );
      $this->db->where('( fecha_devolucion >="'.$fecha_entrega.'" or fecha_entrega >= "'. $fecha_entrega.'" or fecha_entrega >= "'. $fecha_devolucion.'")' ); // quiero sacarlo antes que lo devuelvan
               //->or_where( ) // quiero sacarlo cuando alguien ya lo saco
               //->or_where(); // quiero devolverlo cuando alquien ya lo tiene

      $query = $this->db->get();

      if ( $query->num_rows() > 0 )
      {
         // hay más de un resultado, por tanto estan chocando las fechas...
         return $query->result();
      } else {
         return false;
      }

   }

   public function dondeEsta( $id_vehiculo , $fecha_retiro)
   {
      $this->db->select( 'RE.id_reserva' );
      $this->db->select( 'RE.id_vehiculo' );
      $this->db->select( 'RE.locacion_devolucion' );
      $this->db->select( 'LO.locacion' );
      $this->db->from( 'reservas as RE' );
      $this->db->join('locaciones as LO', 'RE.locacion_devolucion = LO.id_locacion', 'left');
      $this->db->where('RE.id_vehiculo', $id_vehiculo );
      $this->db->where('RE.fecha_devolucion <=', $fecha_retiro);
      $this->db->order_by('RE.fecha_devolucion', 'desc' );
      $this->db->limit(1);

      $q = $this->db->get();

      if ( $q->num_rows() > 0 )
    {
      $disponibles = $q->result();
      return $disponibles[0];

    } else {

      return false;

    }
   }

   public function guardar( $data )
  {
     if (! $this->db->insert('reservas', $data )) {
        return false;
     }   else {
        return true;
     }

  }
  public function devolverId($codigo)
  {
     $this->db->select( 'id_reserva' );
     $this->db->from( 'reservas' );
     $this->db->where( 'codigo_reserva', $codigo );

     $q = $this->db->get();

     if ( $q->num_rows() > 0 )
   {
     $disponibles = $q->result();
     return $disponibles[0];

   } else {

     return false;

   }
  }

  public function entregarVehiculo($id)
  {
     $this->db->where( 'id_reserva', $id );
     $estado = array ( 'estado_arriendo' => 1 );

     if ( ! $this->db->update('reservas', $estado ) )
     {
       return false;

     } else {

       return true;

     }
  }

  public function recibirVehiculo($id)
  {
     $this->db->where( 'id_reserva', $id );
     $estado = array (
        'estado_arriendo' => 0,
        'estado' => 0,
      );

     if ( ! $this->db->update('reservas', $estado ) )
     {
       return false;

     } else {

       return true;

     }
  }

  public function pagar($id)
  {
     $this->db->where( 'id_reserva', $id );
     $estado = array (
        'pagado' => 0
      );

     if ( ! $this->db->update('reservas', $estado ) )
     {
       return false;

     } else {

       return true;

     }
  }
}
