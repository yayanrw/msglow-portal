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
$routes->setDefaultController('Login');
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
$routes->get('/', 'Login::Index');
$routes->get('login', 'Login::Index');
$routes->get('logout', 'Login::Logout');
$routes->post('auth', 'Login::Auth');
$routes->group('admin', ['filter' => 'auth'], function ($routes) {
    $routes->add('/', 'Admin\Home::Index');
    $routes->add('home', 'Admin\Home::Index');
});
$routes->group('user', ['filter' => 'auth'], function ($routes) {
    $routes->add('/', 'User\Home::Index');
    $routes->add('apps', 'User\Apps::Index');
    $routes->add('apps/detail/(:any)', 'User\Apps::Detail/$1');
    $routes->add('documentations', 'User\Documentations::Index');
    $routes->add('sopdocuments', 'User\SopDocuments::Index');
});

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
