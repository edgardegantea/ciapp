<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

// Router Setup
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(false);
// $routes->setAutoRoute(true);


// Route Definitions
$routes->get('/', 'Home::index');
// $routes->get('/pages', 'Pages::index');
// $routes->get('(:any)', 'Pages::view/$1');

$routes->match(['get', 'post'], 'news/create', 'NewsController::create');
$routes->get('news/(:segment)', 'NewsController::show/$1');
$routes->get('news', 'NewsController::index');

// Additional Routing
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
