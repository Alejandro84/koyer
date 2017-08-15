<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'vehiculos_controller';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['vehiculo']                                          =     'vehiculo_controller';
$route['vehiculo/nuevo']                                    =     'vehiculo_controller/nuevo';
$route['vehiculo/guardar']                                  =     'vehiculo_controller/guardar';
$route['vehiculo/editar/(:num)']                            =     'vehiculo_controller/editar/$1';
$route['vehiculo/actualizar']                               =     'vehiculo_controller/actualizar';
$route['vehiculo/borrar/(:num)']                            =     'vehiculo_controller/borrar/$1';
$route['vehiculo/papelera']                                 =     'vehiculo_controller/papelera';
$route['vehiculo/activar/(:num)']                           =     'vehiculo_controller/activar/$1';

$route['marca']                                             =     'marca_controller';
$route['marca/nuevo']                                       =     'marca_controller/nuevo';
$route['marca/guardar']                                     =     'marca_controller/guardar';
$route['marca/editar/(:num)']                               =     'marca_controller/editar/$1';
$route['marca/actualizar']                                  =     'marca_controller/actualizar';
$route['marca/borrar/(:num)']                               =     'marca_controller/borrar/$1';
$route['marca/papelera']                                    =     'marca_controller/papelera';
$route['marca/activar/(:num)']                              =     'marca_controller/activar/$1';

$route['modelo']                                            =     'modelo_controller';
$route['modelo/nuevo']                                      =     'modelo_controller/nuevo';
$route['modelo/guardar']                                    =     'modelo_controller/guardar';
$route['modelo/editar/(:num)']                              =     'modelo_controller/editar/$1';
$route['modelo/actualizar']                                 =     'modelo_controller/actualizar';
$route['modelo/borrar/(:num)']                              =     'modelo_controller/borrar/$1';
$route['modelo/papelera']                                   =     'modelo_controller/papelera';
$route['modelo/activar/(:num)']                             =     'modelo_controller/activar/$1';

$route['categoria']                                         =     'categoria_controller';
$route['categoria/nuevo']                                   =     'categoria_controller/nuevo';
$route['categoria/guardar']                                 =     'categoria_controller/guardar';
$route['categoria/editar/(:num)']                           =     'categoria_controller/editar/$1';
$route['categoria/actualizar']                              =     'categoria_controller/actualizar';
$route['categoria/borrar/(:num)']                           =     'categoria_controller/borrar/$1';
$route['categoria/papelera']                                =     'categoria_controller/papelera';
$route['categoria/activar/(:num)']                          =     'categoria_controller/activar/$1';

$route['transmision']                                       =     'transmision_controller';
$route['transmision/nuevo']                                 =     'transmision_controller/nuevo';
$route['transmision/guardar']                               =     'transmision_controller/guardar';
$route['transmision/editar/(:num)']                         =     'transmision_controller/editar/$1';
$route['transmision/actualizar']                            =     'transmision_controller/actualizar';
$route['transmision/borrar/(:num)']                         =     'transmision_controller/borrar/$1';
$route['transmision/papelera']                              =     'transmision_controller/papelera';
$route['transmision/activar/(:num)']                        =     'transmision_controller/activar/$1';

$route['combustible']                                       =     'combustible_controller';
$route['combustible/nuevo']                                 =     'combustible_controller/nuevo';
$route['combustible/guardar']                               =     'combustible_controller/guardar';
$route['combustible/editar/(:num)']                         =     'combustible_controller/editar/$1';
$route['combustible/actualizar']                            =     'combustible_controller/actualizar';
$route['combustible/borrar/(:num)']                         =     'combustible_controller/borrar/$1';
$route['combustible/papelera']                              =     'combustible_controller/papelera';
$route['combustible/activar/(:num)']                        =     'combustible_controller/activar/$1';

$route['mantenimiento']                                     =     'mantenimiento_controller';
$route['mantenimiento/nuevo']                               =     'mantenimiento_controller/nuevo';
$route['mantenimiento/guardar']                             =     'mantenimiento_controller/guardar';
$route['mantenimiento/editar/(:num)']                       =     'mantenimiento_controller/editar/$1';
$route['mantenimiento/actualizar']                          =     'mantenimiento_controller/actualizar';
$route['mantenimiento/borrar/(:num)']                       =     'mantenimiento_controller/borrar/$1';
$route['mantenimiento/papelera']                            =     'mantenimiento_controller/papelera';
$route['mantenimiento/activar/(:num)']                      =     'mantenimiento_controller/activar/$1';
$route['mantenimiento/reporte']                             =     'mantenimiento_controller/reporte';
