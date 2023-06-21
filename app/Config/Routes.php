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
$routes->setDefaultController('home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'HomeController::home', ['as' => 'index']);
$routes->get('/home', 'HomeController::home', ['as' => 'home']);
$routes->get('/m', 'HomeController::manual' ,['as' => 'manual']);

$routes->get('/org_level1', 'HomeController::org_level1', ['as' => 'org_level1']);
$routes->get('/org_level2/(:num)', 'HomeController::org_level2/$1', ['as' => 'org_level2']);

$routes->get('/show' ,'HomeController::show',['as' => 'show']);


$routes->get('/login', 'Authentication::login',['filter' => 'guestFilter'] ,['as' => 'login']);

$routes->post('/authorize', 'Authentication::authorize',['filter' => 'guestFilter'] , ['as' => 'authorize']);
$routes->get('/logout', 'Authentication::logout', ['filter' => 'authFilter'] ,['as' => 'logout']);

$routes->get('/uploader', 'upload::uploader', ['filter' => 'authFilter']);
$routes->post('/upload_pic', 'upload::upload_pic',['filter' => 'authFilter']);
$routes->post('/get_activity', 'upload::get_activity', ['filter' => 'authFilter']);

$routes->get('/register', 'RegisterController::index' ,['filter' => 'guestFilter'],['as' => 'register']);
$routes->post('/register', 'RegisterController::index' ,['filter' => 'guestFilter'],['as' => 'register_save']);

$routes->get('/statistics', 'HomeController::statistics' ,['as' => 'statistics']);

$routes->post('/delete', 'upload::activity_delete', ['filter' => 'authFilter']);

$routes->get('/stats', 'StatisticsController::index_act_all' ,['as' => 'index_act_all']);

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
