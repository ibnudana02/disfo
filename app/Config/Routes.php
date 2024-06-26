<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

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
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Auth::index');
$routes->post('/login', 'Auth::auth');
$routes->get('/dashboard', 'Dashboard::index', ['filter' => 'auth']);
$routes->get('/logout', 'Auth::logout', ['filter' => 'auth']);
$routes->get('/display', 'Dashboard::displayNew');
$routes->get('/test', 'Dashboard::test');
$routes->get('/profil', 'Users::profil', ['filter' => 'auth']);
$routes->group('produk', function ($routes) {
    $routes->get('/', 'Produk::index', ['filter' => 'auth']);
    $routes->post('list', 'Produk::list', ['filter' => 'auth']);
});
$routes->group('baghas', function ($routes) {
    $routes->get('/', 'Baghas::index', ['filter' => 'auth']);
    $routes->post('list', 'Baghas::list', ['filter' => 'auth']);
    $routes->post('save', 'Baghas::save', ['filter' => 'auth']);
    $routes->get('create', 'Baghas::create', ['filter' => 'auth']);
    $routes->post('delete', 'Baghas::delete', ['filter' => 'auth']);
    $routes->post('detail', 'Baghas::detail', ['filter' => 'auth']);
    $routes->post('update', 'Baghas::update', ['filter' => 'auth']);
});
$routes->group('aplikasi', function ($routes) {
    $routes->get('/', 'Aplikasi::index', ['filter' => 'auth']);
    $routes->post('update', 'Aplikasi::update', ['filter' => 'auth']);
});
$routes->group('users', function ($routes) {
    $routes->get('/', 'Users::index', ['filter' => 'auth']);
    $routes->post('save', 'Users::save', ['filter' => 'auth']);
    $routes->get('create', 'Users::create', ['filter' => 'auth']);
    $routes->post('list', 'Users::list', ['filter' => 'auth']);
    $routes->post('detail', 'Users::detail', ['filter' => 'auth']);
    $routes->post('update', 'Users::update', ['filter' => 'auth']);
    $routes->post('delete', 'Users::delete', ['filter' => 'auth']);
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
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
