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

  public function getCotizaciones()
  {
     $this->db->select( 'RE.*' );
     $this->db->select( 'VE.patente' );
     $this->db->select( 'CL.nombre' );
     $this->db->select( 'CL.apellido' );

     $this->db->from( 'reservas as RE' );

     $this->db->join( 'vehiculos as VE', 'RE.id_vehiculo = VE.id_vehiculo', 'left' );
     $this->db->join( 'clientes as CL', 'RE.id_cliente = CL.id_cliente', 'left' );

     $this->db->where( 'RE.cotizacion', 1 );

     $q = $this->db->get();

     if ( $q->num_rows() < 1 )
     {

        return false;
     } else {

        return $q->result();
     }
  }

  public function getReservasPorPagar($data)
  {
      $this->db->select( 'RE.*' );
      $this->db->select( 'VE.patente' );
      $this->db->select( 'CL.nombre' );
      $this->db->select( 'CL.apellido' );

      $this->db->from( 'reservas as RE' );
      $this->db->where('RE.estado', 1);
      $this->db->where('RE.transferencia', 1);

      $this->db->join( 'vehiculos as VE', 'RE.id_vehiculo = VE.id_vehiculo', 'left' );
      $this->db->join( 'clientes as CL', 'RE.id_cliente = CL.id_cliente', 'left' );

      $this->db->where('RE.fecha_entrega >= "'.$data.'-01 00:00:00" AND
                         RE.fecha_entrega <= "'.$data.'-30 00:00:00" OR
                         RE.fecha_devolucion >= "'.$data.'-01 00:00:00" AND
                         RE.fecha_devolucion <= "'.$data.'-30 00:00:00"');


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
      $this->db->where('id_vehiculo', (int)$id_vehiculo );
      $this->db->where('estado', 1 );

      $this->db->where("((fecha_devolucion between '$fecha_entrega' and '$fecha_devolucion') or (fecha_entrega between '$fecha_entrega' and '$fecha_devolucion'))");


      $query = $this->db->get();

      if ( $query->num_rows() == 0 )
      {
         return false;
      } else {
         return $query->result();
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

  public function guardarCotizacion( $data )
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

  public function ingresarABono($data)
  {
    $this->db->where( 'id_reserva', $data['id_reserva'] );
    $estado = array ('abonado' => $data['abono']);

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
     $estado = array ('pagado' => 1);

     if ( ! $this->db->update('reservas', $estado ) )
     {
       return false;

     } else {

       return true;

     }
  }

  public function actualizarPrecio($data)
  {
     $this->db->where( 'id_reserva', $data['id_reserva'] );
     $estado = array ('total' => $data['total']);

     if ( ! $this->db->update('reservas', $estado ) )
     {
       return false;

     } else {

       return true;

     }
  }

  public function esCotizacion($data)
  {
     $this->db->where( 'id_reserva', $data['id_reserva'] );
     $estado = array (
        'cotizacion' => $data['cotizacion'],
        'estado' => 0
     );

     if ( ! $this->db->update('reservas', $estado ) )
     {
       return false;

     } else {

       return true;

     }
  }

  public function getReservasMes($data)
  {
     $this->db->select( 'RE.*' );
     $this->db->select( 'VE.patente' );
     $this->db->select( 'CL.nombre' );
     $this->db->select( 'CL.apellido' );

     $this->db->from( 'reservas as RE' );
     $this->db->where('RE.estado', 1);
     $this->db->where('RE.transferencia', 0);

     $this->db->join( 'vehiculos as VE', 'RE.id_vehiculo = VE.id_vehiculo', 'left' );
     $this->db->join( 'clientes as CL', 'RE.id_cliente = CL.id_cliente', 'left' );

     $this->db->where('RE.fecha_entrega >= "'.$data.'-01 00:00:00" AND
                        RE.fecha_entrega <= "'.$data.'-30 00:00:00" OR
                        RE.fecha_devolucion >= "'.$data.'-01 00:00:00" AND
                        RE.fecha_devolucion <= "'.$data.'-30 00:00:00"');


     $q = $this->db->get();

     if ( $q->num_rows() < 1 )
     {

        return false;
     } else {

        return $q->result();
     }

  }

  public function vehiculoMes($id_vehiculo, $mesano )
  {
     $this->db->select('*');
     $this->db->from('reservas');
     $this->db->where('estado', 1);
     $this->db->where('id_vehiculo', $id_vehiculo );
     $this->db->where( ' ( month(fecha_devolucion) = '.$mesano->format('m').' OR month(fecha_entrega) = '.$mesano->format('m').' ) ');
     $this->db->join('clientes', 'clientes.id_cliente = reservas.id_cliente', 'left');

     $q = $this->db->get();

     if ( $q->num_rows() < 1 )
     {

        return false;
     } else {

        return $q->result();
     }

  }

  public function actulizarFechas($data , $id_reserva)
  {
    $this->db->where( 'id_reserva', $id_reserva );
    $estado = array (
      'fecha_entrega' => $data['fecha_entrega'],
      'fecha_devolucion' => $data['fecha_devolucion']
    );

    if ( ! $this->db->update('reservas', $estado ) )
    {
      return false;

    } else {

      return true;

    }
  }

  public function actulizarVehiculo($id_vehiculo , $id_reserva)
  {
    $this->db->where( 'id_reserva', $id_reserva );
    $estado = array (
      'id_vehiculo' => $id_vehiculo
    );

    if ( ! $this->db->update('reservas', $estado ) )
    {
      return false;

    } else {

      return true;

    }
  }

  public function reservasApi()
  {
     $this->db->select('reservas.*');
     $this->db->select('loc1.locacion as locacion_entrega');
     $this->db->select('loc2.locacion as locacion_devolucion');
     $this->db->select('clientes.*');
     $this->db->from('reservas');
     $this->db->where('reservas.estado', 1);
     $this->db->join('clientes', 'clientes.id_cliente = reservas.id_cliente', 'left');
     $this->db->join('locaciones as loc1', 'loc1.id_locacion = reservas.locacion_entrega', 'left');
     $this->db->join('locaciones as loc2', 'loc2.id_locacion = reservas.locacion_devolucion', 'left');

     $q = $this->db->get();

     if ( $q->num_rows() < 1 )
     {

        return false;
     } else {

        return $q->result();
     }

  }

  public function guardarKilometraje($data)
  {
      if (! $this->db->insert('kilometrajes', $data )) {
         return false;
      }   else {
         return true;
      }
  }

}
