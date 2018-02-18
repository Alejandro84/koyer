<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Upload extends CI_Model{

    public function construct() {
         parent::__construct();
     }

     //FUNCIÓN PARA INSERTAR LOS DATOS DE LA IMAGEN SUBIDA
     function subir($titulo,$imagen)
     {
         $data = array(
             'titulo' => $titulo,
             'ruta' => $imagen
         );
         return $this->db->insert('imagenes', $data);
     }

}
