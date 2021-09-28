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
$routes->group('admin', ['filter' => 'is_admin'], function ($routes) {
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
    $routes->add('apps-documentation/input', 'Admin\AppsDocumentationController::Input');
    $routes->post('apps-documentation/insert', 'Admin\AppsDocumentationController::Insert');
    $routes->add('apps-documentation/edit/(:any)', 'Admin\AppsDocumentationController::Edit/$1');
    $routes->post('apps-documentation/update', 'Admin\AppsDocumentationController::Update');
    $routes->add('apps-documentation/active/(:any)', 'Admin\AppsDocumentationController::Active/$1');

    // apps-sub-category
    $routes->add('apps-sub-category/input', 'Admin\AppsSubCategoryController::Input');
    $routes->post('apps-sub-category/insert', 'Admin\AppsSubCategoryController::Insert');
    $routes->add('apps-sub-category/edit/(:any)', 'Admin\AppsSubCategoryController::Edit/$1');
    $routes->post('apps-sub-category/update', 'Admin\AppsSubCategoryController::Update');
    $routes->add('apps-sub-category/active/(:any)', 'Admin\AppsSubCategoryController::Active/$1');

    // sop-documents
    $routes->add('sop-documents', 'Admin\SopDocumentsController::Index');
    $routes->add('sop-documents/input', 'Admin\SopDocumentsController::Input');
    $routes->post('sop-documents/insert', 'Admin\SopDocumentsController::Insert');
    $routes->add('sop-documents/edit/(:any)', 'Admin\SopDocumentsController::Edit/$1');
    $routes->post('sop-documents/update', 'Admin\SopDocumentsController::Update');
    $routes->add('sop-documents/active/(:any)', 'Admin\SopDocumentsController::Active/$1');

    // sop-category
    $routes->add('sop-category/input', 'Admin\SopCategoryController::Input');
    $routes->post('sop-category/insert', 'Admin\SopCategoryController::Insert');
    $routes->add('sop-category/edit/(:any)', 'Admin\SopCategoryController::Edit/$1');
    $routes->post('sop-category/update', 'Admin\SopCategoryController::Update');
    $routes->add('sop-category/active/(:any)', 'Admin\SopCategoryController::Active/$1');

    // users
    $routes->add('users', 'Admin\UsersController::Index');
    $routes->add('users/edit/(:any)', 'Admin\UsersController::Edit/$1');
    $routes->add('users/update', 'Admin\UsersController::Update');
});
$routes->group('user', ['filter' => 'is_user'], function ($routes) {
    // home
    $routes->add('/', 'User\HomeController::Index');
    $routes->add('home', 'User\HomeController::Index');

    // apps
    $routes->add('apps', 'User\AppsController::Index');
    $routes->add('apps/detail/(:any)', 'User\AppsController::Detail/$1');

    // sop-documents
    $routes->add('sop-documents', 'User\SopDocumentsController::Index');
    $routes->add('sop-documents/detail/(:any)', 'User\SopDocumentsController::Detail/$1');

    // apps-documentation
    $routes->add('apps-documentation/detail/(:any)', 'User\AppsDocumentationController::Detail/$1');
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
