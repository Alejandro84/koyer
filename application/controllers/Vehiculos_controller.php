<?php
   defined('BASEPATH') OR exit('No direct script access allowed');

   class Vehiculos_controller extends CI_Controller{

      public function __construct()
      {
         parent::__construct();

         $this->load->model('vehiculo');

      }

      public function index()
      {
         $data['vehiculo'] = $this->vehiculo->getAll();
         echo '<pre>';
         print_r($data);
         echo '</pre>';
      }
}
?>
