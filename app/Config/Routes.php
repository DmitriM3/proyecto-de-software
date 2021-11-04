<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');

/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}

$routes->get('listar', 'Usuarios::index');
$routes->get('login', 'Usuarios::login');
$routes->get('crear', 'Usuarios::crear');
$routes->get('venderEstadia', 'Usuarios::venderEstadia');
$routes->get('consultarPrecio', 'Usuarios::consultarPrecio');
$routes->get('homeCliente', 'Usuarios::homeCliente');
$routes->get('homeInspector', 'Usuarios::homeInspector');
$routes->get('homeVendedor', 'Usuarios::homeVendedor');
$routes->get('borrar/(:num)', 'Usuarios::borrar/$1');
$routes->get('editar/(:num)', 'Usuarios::editar/$1');
$routes->get('resetPass/(:num)', 'Usuarios::resetPass/$1');
$routes->get('consultaEstacionamiento', 'Inspectores::listarEstacionamiento');
$routes->get('consultaEstacionamientoAdmin', 'Usuarios::listarEstacionamiento');


$routes->post('guardar', 'Usuarios::guardar');
$routes->post('actualizar', 'Usuarios::actualizar');
$routes->post('venderNuevaEstadia', 'Usuarios::venderNuevaEstadia');
