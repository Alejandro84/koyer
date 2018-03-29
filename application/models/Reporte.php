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

  public function getManteni( $mesano )
  {
     $this->db->select('MA.id_mantenimiento');
     $this->db->select('TM.mantenimiento');
     $this->db->select('MA.costo');
     $this->db->select('VE.patente');
     //$this->db->select('VE.modelo');
     //$this->db->select('VE.marca');
     $this->db->select('MA.comentario');
     $this->db->select('MA.fecha_mantencion');
     $this->db->from('mantenimientos as MA');
     $this->db->where('MA.estado', 1);
     $this->db->where('month(MA.fecha_mantencion) = '.$mesano->format('m'));
     $this->db->join('tipos_mantenimientos as TM', 'TM.id_tipo_mantenimiento = MA.id_tipo_mantenimiento', 'left');
     $this->db->join('vehiculos as VE', 'VE.id_vehiculo = MA.id_vehiculo', 'left');


     $q = $this->db->get();

     if ( $q->num_rows() < 1 )
     {

        return false;
     } else {

        return $q->result();
     }

  }


}
