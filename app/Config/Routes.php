<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
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
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');
// $routes->get('/dashboard', 'Dashboard::index',['filter' => 'auth']);
$routes->get('/c_resetOTP', 'PassReset/C_ResetPass::displayOTP', ['filter' => 'pauth']);
$routes->get('/c_resetNewPass', 'PassReset/C_ResetPass::displayResetPass', ['filter' => 'pauth']);
$routes->get('/r_resetOTP', 'PassReset/R_ResetPass::displayOTP', ['filter' => 'pauth']);
$routes->get('/r_resetNewPass', 'PassReset/R_ResetPass::displayResetPass', ['filter' => 'pauth']);

$myRoutes = array(
	"rider-login" => "RiderLogin::index",
	"client-login" => "ClientLogin::index",
	"rider-signup" => "RiderSignup::index",
	"client-signup" => "ClientSignup::index",
	"email-verification" => "EmailVerification::index",
	"riderNotif" => "EmailVerification::indexRider",

	// clients
	"client-dashboard/deliveries" => "ClientDashboard::index",
	"client-dashboard/pending" => "ClientDashboard::pending",
	"client-dashboard/deliveries/(:num)" => "ClientDashboard::acceptedDetails/$1",
	"client-dashboard/pending/(:num)" => "ClientDashboard::details/$1",
	"client-dashboard/tracking" => "ClientDashboard::tracking",
	"client-dashboard/profile" => "ClientProfile::index",
	"client-dashboard/password-and-security" => "ClientProfile::passwordAndSecurity",
	"client-dashboard/delete-account" => "ClientProfile::removeAccount",
	"client-dashboard/notifications" => "ClientProfile::notifications",
	"client-dashboard/notifications/(:num)" => "ClientProfile::notificationDetail/$1",
	"client-dashboard/success" => "ClientDashboard::successDeliveries",
	"client-dashboard/success/(:num)" => "ClientDashboard::successDeliveryDetail/$1",
	"client-dashboard/cancelled" => "ClientDashboard::cancelledDeliveries",
	"client-dashboard/cancelled/(:num)" => "ClientDashboard::cancelledDeliveryDetail/$1",

	// rider
	"rider-dashboard/requests" => "RiderDashboard::index",
	"rider-dashboard/deliveries" => "RiderDashboard::deliveries",
	"rider-dashboard/requests/(:num)" => "RiderDashboard::details/$1",
	"rider-dashboard/deliveries/(:num)" => "RiderDashboard::acceptedDetails/$1",
	"rider-dashboard/profile" => "RiderProfile::index",
	"rider-dashboard/password-and-security" => "RiderProfile::passwordAndSecurity",
	"rider-dashboard/delete-account" => "RiderProfile::removeAccount",

	// customer
	"tracking" => "Tracking::index",

	"c_resetPassword" => "PassReset/C_ResetPass::index",
	"r_resetPassword" => "PassReset/R_ResetPass::index",

	'test' => 'Test::index',

	'admin' => 'Admin::index',
	'admin/login' => 'Admin::login',
	'admin/client' => 'Admin::client',
	'admin/applications' => 'Admin::applications',
	'admin/delivery-personnels' => 'Admin::deliveryPersonnels',
	'admin/messages' => 'Admin::messages',
);

$routes->map($myRoutes);


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
