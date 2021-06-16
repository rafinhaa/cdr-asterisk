<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php'))
{
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
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

$routes->group('/', ['filter' => 'login'], function($routes){
	/** Redirect attempts to Registration, Activation and Forgot/Resets */
	$routes->match(['get', 'post'], 'register', 'CDR\Dashboard::index');
	$routes->get('activate-account', 'CDR\Dashboard::index');
	$routes->get('resend-activate-accoun', 'CDR\Dashboard::index');
	$routes->match(['get', 'post'], 'forgot', 'CDR\Dashboard::index');
	$routes->match(['get', 'post'], 'reset-password', 'CDR\Dashboard::index');
	/** Redirect end */
	$routes->get('', 'CDR\Dashboard::index');
	$routes->group('users', function($routes){
		$routes->get('add', 'CDR\Users::add');
		$routes->post('add', 'CDR\Users::store');
		$routes->get('list', 'CDR\Users::list');
		$routes->get('status', 'CDR\Users::doStatus');
	});
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
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php'))
{
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
