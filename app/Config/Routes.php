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
$routes->resource('api/v1/users');
$routes->resource('api/v1/groups');
$routes->group('/', ['filter' => 'login'], function($routes){
	/** Redirect attempts to Registration, Activation and Forgot/Resets */
	$routes->match(['get', 'post'], 'register', 'CDR\Dashboard::index');
	$routes->get('activate-account', 'CDR\Dashboard::index');
	$routes->get('resend-activate-accoun', 'CDR\Dashboard::index');
	$routes->match(['get', 'post'], 'forgot', 'CDR\Dashboard::index');
	$routes->match(['get', 'post'], 'reset-password', 'CDR\Dashboard::index');
	/** Redirect end */
	$routes->get('', 'CDR\Dashboard::index');
	$routes->group('users',function($routes){
		$routes->get('add', 'CDR\Users::add', ['filter' => 'permission:users-add']);
		$routes->post('add', 'CDR\Users::store', ['filter' => 'permission:users-add']);
		$routes->get('list', 'CDR\Users::list', ['filter' => 'permission:users-list']);
		$routes->get('status', 'CDR\Users::doStatus', ['filter' => 'permission:users-status']);
		$routes->get('delete', 'CDR\Users::delete', ['filter' => 'permission:users-remove']);
		$routes->get('profile/(:num)', 'CDR\Users::profile/$1', ['filter' => 'permission:users-edit']);
		$routes->post('profile/(:num)', 'CDR\Users::updateProfile/$1', ['filter' => 'permission:users-edit']);
	});
	$routes->group('config', ['filter' => 'role:Admin'], function($routes){
		$routes->group('groups',function($routes){
			$routes->get('add', 'CDR\Groups::add');
			$routes->post('add', 'CDR\Groups::store');
			$routes->get('', 'CDR\Groups::list',);
			$routes->get('edit/(:num)', 'CDR\Groups::edit/$1');
			$routes->post('edit/(:num)', 'CDR\Groups::store');
			$routes->get('removeuser', 'CDR\Groups::removeUserInGroup');
			$routes->get('delgroup', 'CDR\Groups::removeGroup');
			$routes->get('(:num)/add/user', 'CDR\Groups::listUsersToAddInGroup/$1');
			$routes->get('adduser', 'CDR\Groups::doAddUserinGroup');
		});
	});
	$routes->group('cdr', function($routes){
		$routes->get('', 'CDR\CDR::list');
		$routes->post('', 'CDR\CDR::search');
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
