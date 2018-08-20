<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'login_controller';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['login']                     =     'login_controller';
$route['login/verificar']           =     'login_controller/verificar';
$route['login/salir']               =     'login_controller/salir';

$route['vehiculo']                        =     'vehiculo_controller';
$route['vehiculo/nuevo']                  =     'vehiculo_controller/nuevo';
$route['vehiculo/guardar']                =     'vehiculo_controller/guardar';
$route['vehiculo/editar/(:num)']          =     'vehiculo_controller/editar/$1';
$route['vehiculo/actualizar']             =     'vehiculo_controller/actualizar';
$route['vehiculo/borrar/(:num)']          =     'vehiculo_controller/borrar/$1';
$route['vehiculo/papelera']               =     'vehiculo_controller/papelera';
$route['vehiculo/activar/(:num)']         =     'vehiculo_controller/activar/$1';

$route['usuario']                        =     'usuario_controller';
$route['usuario/nuevo']                  =     'usuario_controller/nuevo';
$route['usuario/guardar']                =     'usuario_controller/guardar';
$route['usuario/editar/(:num)']          =     'usuario_controller/editar/$1';
$route['usuario/actualizar']             =     'usuario_controller/actualizar';
$route['usuario/borrar/(:num)']          =     'usuario_controller/borrar/$1';
$route['usuario/papelera']               =     'usuario_controller/papelera';
$route['usuario/activar/(:num)']         =     'usuario_controller/activar/$1';

$route['marca']                           =     'marca_controller';
$route['marca/nuevo']                     =     'marca_controller/nuevo';
$route['marca/guardar']                   =     'marca_controller/guardar';
$route['marca/editar/(:num)']             =     'marca_controller/editar/$1';
$route['marca/actualizar']                =     'marca_controller/actualizar';
$route['marca/borrar/(:num)']             =     'marca_controller/borrar/$1';
$route['marca/papelera']                  =     'marca_controller/papelera';
$route['marca/activar/(:num)']            =     'marca_controller/activar/$1';

$route['descuento']                           =     'descuento_controller';
$route['descuento/nuevo']                     =     'descuento_controller/nuevo';
$route['descuento/guardar']                   =     'descuento_controller/guardar';
$route['descuento/editar/(:num)']             =     'descuento_controller/editar/$1';
$route['descuento/actualizar']                =     'descuento_controller/actualizar';
$route['descuento/borrar/(:num)']             =     'descuento_controller/borrar/$1';
$route['descuento/papelera']                  =     'descuento_controller/papelera';
$route['descuento/activar/(:num)']            =     'descuento_controller/activar/$1';

$route['extra']                           =     'extra_controller';
$route['extra/nuevo']                     =     'extra_controller/nuevo';
$route['extra/guardar']                   =     'extra_controller/guardar';
$route['extra/editar/(:num)']             =     'extra_controller/editar/$1';
$route['extra/actualizar']                =     'extra_controller/actualizar';
$route['extra/borrar/(:num)']             =     'extra_controller/borrar/$1';
$route['extra/papelera']                  =     'extra_controller/papelera';
$route['extra/activar/(:num)']            =     'extra_controller/activar/$1';

$route['tarifa']                           =     'tarifa_controller';
$route['tarifa/nuevo']                     =     'tarifa_controller/nuevo';
$route['tarifa/guardar']                   =     'tarifa_controller/guardar';
$route['tarifa/editar/(:num)']             =     'tarifa_controller/editar/$1';
$route['tarifa/actualizar']                =     'tarifa_controller/actualizar';
$route['tarifa/borrar/(:num)']             =     'tarifa_controller/borrar/$1';
$route['tarifa/papelera']                  =     'tarifa_controller/papelera';
$route['tarifa/activar/(:num)']            =     'tarifa_controller/activar/$1';

$route['modelo']                          =     'modelo_controller';
$route['modelo/nuevo']                    =     'modelo_controller/nuevo';
$route['modelo/guardar']                  =     'modelo_controller/guardar';
$route['modelo/editar/(:num)']            =     'modelo_controller/editar/$1';
$route['modelo/actualizar']               =     'modelo_controller/actualizar';
$route['modelo/borrar/(:num)']            =     'modelo_controller/borrar/$1';
$route['modelo/papelera']                 =     'modelo_controller/papelera';
$route['modelo/activar/(:num)']           =     'modelo_controller/activar/$1';

$route['impuesto']                        =     'impuesto_controller';
$route['impuesto/nuevo']                  =     'impuesto_controller/nuevo';
$route['impuesto/guardar']                =     'impuesto_controller/guardar';
$route['impuesto/editar/(:num)']          =     'impuesto_controller/editar/$1';
$route['impuesto/actualizar']             =     'impuesto_controller/actualizar';
$route['impuesto/borrar/(:num)']          =     'impuesto_controller/borrar/$1';
$route['impuesto/papelera']               =     'impuesto_controller/papelera';
$route['impuesto/activar/(:num)']         =     'impuesto_controller/activar/$1';

$route['locacion']                        =     'locacion_controller';
$route['locacion/nuevo']                  =     'locacion_controller/nuevo';
$route['locacion/guardar']                =     'locacion_controller/guardar';
$route['locacion/editar/(:num)']          =     'locacion_controller/editar/$1';
$route['locacion/actualizar']             =     'locacion_controller/actualizar';
$route['locacion/borrar/(:num)']          =     'locacion_controller/borrar/$1';
$route['locacion/papelera']               =     'locacion_controller/papelera';
$route['locacion/activar/(:num)']         =     'locacion_controller/activar/$1';

$route['categoria']                       =     'categoria_controller';
$route['categoria/nuevo']                 =     'categoria_controller/nuevo';
$route['categoria/guardar']               =     'categoria_controller/guardar';
$route['categoria/editar/(:num)']         =     'categoria_controller/editar/$1';
$route['categoria/actualizar']            =     'categoria_controller/actualizar';
$route['categoria/borrar/(:num)']         =     'categoria_controller/borrar/$1';
$route['categoria/papelera']              =     'categoria_controller/papelera';
$route['categoria/activar/(:num)']        =     'categoria_controller/activar/$1';

$route['transmision']                     =     'transmision_controller';
$route['transmision/nuevo']               =     'transmision_controller/nuevo';
$route['transmision/guardar']             =     'transmision_controller/guardar';
$route['transmision/editar/(:num)']       =     'transmision_controller/editar/$1';
$route['transmision/actualizar']          =     'transmision_controller/actualizar';
$route['transmision/borrar/(:num)']       =     'transmision_controller/borrar/$1';
$route['transmision/papelera']            =     'transmision_controller/papelera';
$route['transmision/activar/(:num)']      =     'transmision_controller/activar/$1';

$route['combustible']                     =     'combustible_controller';
$route['combustible/nuevo']               =     'combustible_controller/nuevo';
$route['combustible/guardar']             =     'combustible_controller/guardar';
$route['combustible/editar/(:num)']       =     'combustible_controller/editar/$1';
$route['combustible/actualizar']          =     'combustible_controller/actualizar';
$route['combustible/borrar/(:num)']       =     'combustible_controller/borrar/$1';
$route['combustible/papelera']            =     'combustible_controller/papelera';
$route['combustible/activar/(:num)']      =     'combustible_controller/activar/$1';

$route['mantenimiento']                             =     'mantenimiento_controller';
$route['mantenimiento/nuevo']                       =     'mantenimiento_controller/nuevo';
$route['mantenimiento/guardar']                     =     'mantenimiento_controller/guardar';
$route['mantenimiento/editar/(:num)']               =     'mantenimiento_controller/editar/$1';
$route['mantenimiento/actualizar']                  =     'mantenimiento_controller/actualizar';
$route['mantenimiento/borrar/(:num)']               =     'mantenimiento_controller/borrar/$1';
$route['mantenimiento/papelera']                    =     'mantenimiento_controller/papelera';
$route['mantenimiento/activar/(:num)']              =     'mantenimiento_controller/activar/$1';
$route['mantenimiento/reporte']                     =     'mantenimiento_controller/reporte';
$route['mantenimiento/buscar_mantenimientos']       =     'mantenimiento_controller/buscarMantenimientos';
$route['mantenimiento/mantencion_pdf']              =     'mantenimiento_controller/datosMantenciones';
$route['mantenimiento/imprimir_pdf']                =     'mantenimiento_controller/imprimirPDF';

$route['cliente']                            =     'cliente_controller';
$route['cliente/nuevo']                      =     'cliente_controller/nuevo';
$route['cliente/guardar']                    =     'cliente_controller/guardar';
$route['cliente/editar/(:num)']              =     'cliente_controller/editar/$1';
$route['cliente/actualizar_cliente']         =     'cliente_controller/actualizarCliente';
$route['cliente/ingresar_cliente']           =     'cliente_controller/ingresarCliente';
$route['cliente/buscar']                     =     'cliente_controller/buscar';
$route['cliente/busqueda/(:num)']            =     'cliente_controller/busqueda/$1';
$route['cliente/cliente_nuevo']              =     'cliente_controller/clienteNuevo';
$route['cliente/cliente_registrado']         =     'cliente_controller/clienteRegistrado';
$route['cliente/guardar_cliente']            =     'cliente_controller/guardarCliente';

$route['reserva']                            =     'reserva_controller';
$route['reserva/nuevo']                      =     'reserva_controller/nuevo';
$route['reserva/guardar']                    =     'reserva_controller/guardar';
$route['reserva/editar/(:num)']              =     'reserva_controller/editar/$1';
$route['reserva/actualizar']                 =     'reserva_controller/actualizar';
$route['reserva/borrar/(:num)']              =     'reserva_controller/borrar/$1';
$route['reserva/resumen']                    =     'reserva_controller/resumen';
$route['reserva/verificar']                  =     'reserva_controller/verificar';
$route['reserva/ver_reserva/(:num)']         =     'reserva_controller/verReserva/$1';
$route['reserva/entregar_vehiculo/(:num)']   =     'reserva_controller/entregarVehiculo/$1';
$route['reserva/recibir_vehiculo/(:num)']    =     'reserva_controller/recibirVehiculo/$1';
$route['reserva/pagado/(:num)']              =     'reserva_controller/pagar/$1';
$route['reserva/generar_reserva']            =     'reserva_controller/generarReserva';
$route['reserva/imprimir_pdf/(:num)']        =     'reserva_controller/imprimirPDF/$1';
$route['reserva/reserva_pdf/(:num)']         =     'reserva_controller/formatoPdf/$1';
$route['reserva/actualizar_precio']          =     'reserva_controller/actualizarPrecio';
$route['reserva/definir_reserva']            =     'reserva_controller/definirReserva';
$route['reserva/cotizacion']                 =     'reserva_controller/cotizacion';
$route['reserva/buscar_reserva']                 =     'reserva_controller/buscarReservas';
$route['reserva/kilometraje/(:num)']                =     'reserva_controller/kilometraje/$1';
$route['reserva/agregar_kilometraje']        =     'reserva_controller/agregarKilometraje';
$route['reserva/vehiculos_seleccionado']        =     'reserva_controller/vehiculoSeleccionado';
$route['reserva/cambiarauto']        =     'reserva_controller/cambiarAuto';

$route['api-reserva/(:any)'] = 'api_controller/getReservas/$1';
$route['api-vehiculo'] = 'vehiculo_controller/apiVehiculos';

$route['reserva/correo']                  =     'reserva_controller/enviarCorreo';

$route['mantenimiento/ver_kilometraje']                  =     'mantenimiento_controller/mostrarKilometraje';
$route['mantenimiento/datos_mantenciones/(:num)']                  =     'mantenimiento_controller/datosMantenciones/$1';

$route['dolar/actualizar'] = 'dolar_controller/actualizarDolar';

$route['reporte'] = 'reporte_controller';
$route['reporte/buscar_reporte'] = 'reporte_controller/buscarReporte';
$route['reporte/reporte_pdf/(:any)'] = 'reporte_controller/formatoPdf/$1';
$route['reporte/imprimir_pdf/(:any)'] = 'reporte_controller/imprimirPDF/$1';
