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
$routes->get('/', 'LoginController::Index');
$routes->get('login', 'LoginController::Index');
$routes->get('logout', 'LoginController::Logout');
$routes->post('auth', 'LoginController::Auth');
$routes->group('admin', ['filter' => 'auth'], function ($routes) {
    // home
    $routes->add('/', 'Admin\HomeController::Index');
    $routes->add('home', 'Admin\HomeController::Index');

    // apps-managaement
    $routes->add('apps-management', 'Admin\AppsController::Index');
    $routes->add('apps-management/input', 'Admin\AppsController::Input');
    $routes->post('apps-management/insert', 'Admin\AppsController::Insert');
    $routes->add('apps-management/edit/(:any)', 'Admin\AppsController::Edit/$1');
    $routes->post('apps-management/update', 'Admin\AppsController::Update');
    $routes->add('apps-management/active/(:any)', 'Admin\AppsController::Active/$1');

    // apps-documentation
    $routes->add('apps-documentation', 'Admin\AppsDocumentationController::Index');

    // apps-sub-category
    $routes->add('apps-sub-category/input', 'Admin\AppsSubCategoryController::Input');

    // sop-documents
    $routes->add('sop-documents', 'Admin\SopDocumentsController::Index');

    // users
    $routes->add('users', 'Admin\UsersController::Index');
});
$routes->group('user', ['filter' => 'auth'], function ($routes) {
    $routes->add('/', 'User\HomeController::Index');
    $routes->add('apps', 'User\AppsController::Index');
    $routes->add('apps/detail/(:any)', 'User\AppsController::Detail/$1');
    $routes->add('documentations', 'User\DocumentationsController::Index');
    $routes->add('sop-documents', 'User\SopDocumentsController::Index');
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
