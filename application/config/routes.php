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
$route['default_controller'] = 'welcome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['vehiculos']                                         =     'vehiculos_controller';

$route['marca']                                             =     'marca_controller';
$route['marca/nuevo']                                       =     'marca_controller/nuevo';
$route['marca/guardar']                                     =     'marca_controller/guardar';
$route['marca/editar/(:num)']                               =     'marca_controller/editar/$1';
$route['marca/actualizar']                                  =     'marca_controller/actualizar';
$route['marca/borrar/(:num)']                               =     'marca_controller/borrar/$1';
$route['marca/papelera']                                    =     'marca_controller/papelera';
$route['marca/reactivar/(:num)']                            =     'marca_controller/papelera/$1';

$route['modelo']                                            =     'modelo_controller';
$route['modelo/nuevo']                                      =     'modelo_controller/nuevo';
$route['modelo/guardar']                                    =     'modelo_controller/guardar';
$route['modelo/editar/(:num)']                              =     'modelo_controller/editar/$1';
$route['modelo/actualizar']                                 =     'modelo_controller/actualizar';
$route['modelo/borrar/(:num)']                              =     'modelo_controller/borrar/$1';
$route['modelo/papelera']                                   =     'modelo_controller/papelera';
$route['modelo/reactivar/(:num)']                           =     'modelo_controller/papelera/$1';

$route['categoria']                                         =     'categoria_controller';
$route['categoria/nuevo']                                   =     'categoria_controller/nuevo';
$route['categoria/guardar']                                 =     'categoria_controller/guardar';
$route['categoria/editar/(:num)']                           =     'categoria_controller/editar/$1';
$route['categoria/actualizar']                              =     'categoria_controller/actualizar';
$route['categoria/borrar/(:num)']                           =     'categoria_controller/borrar/$1';
$route['categoria/papelera']                                =     'categoria_controller/papelera';
$route['categoria/reactivar/(:num)']                        =     'categoria_controller/papelera/$1';

$route['transmision']                                       =     'transmision_controller';
$route['transmision/nuevo']                                 =     'transmision_controller/nuevo';
$route['transmision/guardar']                               =     'transmision_controller/guardar';
$route['transmision/editar/(:num)']                         =     'transmision_controller/editar/$1';
$route['transmision/actualizar']                            =     'transmision_controller/actualizar';
$route['transmision/borrar/(:num)']                         =     'transmision_controller/borrar/$1';
$route['transmision/papelera']                              =     'transmision_controller/papelera';
$route['transmision/reactivar/(:num)']                      =     'transmision_controller/papelera/$1';

$route['combustible']                                       =     'combustible_controller';
$route['combustible/nuevo']                                 =     'combustible_controller/nuevo';
$route['combustible/guardar']                               =     'combustible_controller/guardar';
$route['combustible/editar/(:num)']                         =     'combustible_controller/editar/$1';
$route['combustible/actualizar']                            =     'combustible_controller/actualizar';
$route['combustible/borrar/(:num)']                         =     'combustible_controller/borrar/$1';
$route['combustible/papelera']                              =     'combustible_controller/papelera';
$route['combustible/reactivar/(:num)']                      =     'combustible_controller/papelera/$1';
