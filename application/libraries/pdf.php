<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed'); ini_set('error_reporting', E_STRICT); 

require APPPATH."/third_party/dompdf/autoload.inc.php"; 
use Dompdf\Dompdf;

class Pdf extends Dompdf { 

    public function __construct() { 
        parent::__construct();
        
    } 

} 

?>