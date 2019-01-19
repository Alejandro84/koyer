<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reporte extends CI_Model{

   public function __construct()
   {
      parent::__construct();
      //Codeigniter : Write Less Do More
   }

   public function getAll( $mesano )
   {
      $this->db->select('RE.id_reserva');
      $this->db->select('RE.codigo_reserva');
      $this->db->select('RE.sub_total');
      $this->db->select('RE.total');
      $this->db->from('reservas as RE');
      $this->db->where('RE.estado', 1);
      $this->db->where( ' ( month(RE.fecha_devolucion) = '.$mesano->format('m').' OR month(RE.fecha_entrega) = '.$mesano->format('m').' ) ');
      $this->db->join('clientes as CL', 'CL.id_cliente = RE.id_cliente', 'left');

      $q = $this->db->get();

      if ( $q->num_rows() < 1 )
      {

         return false;
      } else {

         return $q->result();
      }

   }

   //########################################################################
   //######## Consultas para vehiculo y fechas 
   //########################################################################


   public function getManteniVehiculoFecha( $data )
   {
      $vehiculo = $data['vehiculo'];
      $fecha_desde = $data['fecha_desde'];
      $fecha_hasta = $data['fecha_hasta'];

      $this->db->select('MAN.id_mantenimiento');
      $this->db->select('MAN.mantenimiento');
      $this->db->select('MAN.costo');
      $this->db->select('VE.patente');
      $this->db->select('MO.modelo');
      $this->db->select('MA.marca');
      $this->db->select('MAN.fecha_mantencion');
      $this->db->from('mantenimientos as MAN');
      $this->db->where('MAN.estado', 1);
      $this->db->where('MAN.id_vehiculo', $vehiculo);
      $this->db->where('MAN.fecha_mantencion >', $fecha_desde);
      $this->db->where('MAN.fecha_mantencion <', $fecha_hasta);
      $this->db->join('vehiculos as VE', 'VE.id_vehiculo = MAN.id_vehiculo', 'left');
      $this->db->join('Modelos as MO', 'VE.id_modelo = MO.id_modelo', 'left');
      $this->db->join('Marcas as MA', 'VE.id_marca = MA.id_Marca', 'left');

      $q = $this->db->get();

      if ( $q->num_rows() < 1 )
      {

         return false;
      } else {

         return $q->result();
      }

   }

   public function getReservasVehiculoFecha($data)
   {
      $vehiculo = $data['vehiculo'];
      $fecha_desde = $data['fecha_desde'];
      $fecha_hasta = $data['fecha_hasta'];

      $this->db->select('RE.id_reserva');
      $this->db->select('RE.codigo_reserva');
      $this->db->select('VE.patente');
      $this->db->select('MO.modelo');
      $this->db->select('MA.marca');
      $this->db->select('RE.sub_total');
      $this->db->select('RE.total');
      $this->db->from('reservas as RE');
      $this->db->where('RE.estado', 1);
      $this->db->where('RE.id_vehiculo', $vehiculo);
      $this->db->where('RE.fecha_entrega >', $fecha_desde);
      $this->db->where('RE.fecha_entrega <', $fecha_hasta);
      $this->db->join('Vehiculos as VE', 'RE.id_vehiculo = VE.id_vehiculo', 'left');
      $this->db->join('Modelos as MO', 'VE.id_modelo = MO.id_modelo', 'left');
      $this->db->join('Marcas as MA', 'VE.id_marca = MA.id_Marca', 'left');

      $q = $this->db->get();

      if ( $q->num_rows() < 1 )
      {

         return false;
      } else {

         return $q->result();
      }
   }

   //########################################################################
   //######## Consultas para vehiculo
   //########################################################################


   public function getManteniVehiculo( $data )
   {
      $vehiculo = $data['vehiculo'];
      
      $this->db->select('MAN.id_mantenimiento');
      $this->db->select('MAN.mantenimiento');
      $this->db->select('MAN.costo');
      $this->db->select('VE.patente');
      $this->db->select('MO.modelo');
      $this->db->select('MA.marca');
      $this->db->select('MAN.fecha_mantencion');
      $this->db->from('mantenimientos as MAN');
      $this->db->where('MAN.estado', 1);
      $this->db->where('MAN.id_vehiculo', $vehiculo);
      $this->db->join('vehiculos as VE', 'VE.id_vehiculo = MAN.id_vehiculo', 'left');
      $this->db->join('Modelos as MO', 'VE.id_modelo = MO.id_modelo', 'left');
      $this->db->join('Marcas as MA', 'VE.id_marca = MA.id_Marca', 'left');

      $q = $this->db->get();

      if ( $q->num_rows() < 1 )
      {

         return false;
      } else {

         return $q->result();
      }

   }

   public function getReservasVehiculo($data)
   {
      $vehiculo = $data['vehiculo'];

      $this->db->select('RE.id_reserva');
      $this->db->select('RE.codigo_reserva');
      $this->db->select('VE.patente');
      $this->db->select('MO.modelo');
      $this->db->select('MA.marca');
      $this->db->select('RE.sub_total');
      $this->db->select('RE.total');
      $this->db->from('reservas as RE');
      $this->db->where('RE.estado', 1);
      $this->db->where('RE.id_vehiculo', $vehiculo);
      $this->db->join('Vehiculos as VE', 'RE.id_vehiculo = VE.id_vehiculo', 'left');
      $this->db->join('Modelos as MO', 'VE.id_modelo = MO.id_modelo', 'left');
      $this->db->join('Marcas as MA', 'VE.id_marca = MA.id_Marca', 'left');

      $q = $this->db->get();

      if ( $q->num_rows() < 1 )
      {

         return false;
      } else {

         return $q->result();
      }
   }

   //########################################################################
   //######## Consultas para fechas 
   //########################################################################


   public function getManteniFecha( $data )
   {
      $fecha_desde = $data['fecha_desde'];
      $fecha_hasta = $data['fecha_hasta'];

      $this->db->select('MAN.id_mantenimiento');
      $this->db->select('MAN.mantenimiento');
      $this->db->select('MAN.costo');
      $this->db->select('VE.patente');
      $this->db->select('MO.modelo');
      $this->db->select('MA.marca');
      $this->db->select('MAN.fecha_mantencion');
      $this->db->from('mantenimientos as MAN');
      $this->db->where('MAN.estado', 1);
      $this->db->where('MAN.fecha_mantencion >', $fecha_desde);
      $this->db->where('MAN.fecha_mantencion <', $fecha_hasta);
      $this->db->join('vehiculos as VE', 'VE.id_vehiculo = MAN.id_vehiculo', 'left');
      $this->db->join('Modelos as MO', 'VE.id_modelo = MO.id_modelo', 'left');
      $this->db->join('Marcas as MA', 'VE.id_marca = MA.id_Marca', 'left');

      $q = $this->db->get();

      if ( $q->num_rows() < 1 )
      {

         return false;
      } else {

         return $q->result();
      }

   }

   public function getReservasFecha($data)
   {
      $fecha_desde = $data['fecha_desde'];
      $fecha_hasta = $data['fecha_hasta'];

      $this->db->select('RE.id_reserva');
      $this->db->select('RE.codigo_reserva');
      $this->db->select('VE.patente');
      $this->db->select('MO.modelo');
      $this->db->select('MA.marca');
      $this->db->select('RE.sub_total');
      $this->db->select('RE.total');
      $this->db->from('reservas as RE');
      $this->db->where('RE.estado', 1);
      $this->db->where('RE.fecha_entrega >', $fecha_desde);
      $this->db->where('RE.fecha_entrega <', $fecha_hasta);
      $this->db->join('Vehiculos as VE', 'RE.id_vehiculo = VE.id_vehiculo', 'left');
      $this->db->join('Modelos as MO', 'VE.id_modelo = MO.id_modelo', 'left');
      $this->db->join('Marcas as MA', 'VE.id_marca = MA.id_Marca', 'left');

      $q = $this->db->get();

      if ( $q->num_rows() < 1 )
      {

         return false;
      } else {

         return $q->result();
      }
   }
   

}
