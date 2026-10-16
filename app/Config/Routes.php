<?php

use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */
$routes->get('/', 'Home::index');
$routes->get('/home', 'HomeController::index');

$routes->group('', ['filter' => 'auth'], static function ($routes) {
    $routes->get('/tickets', 'TicketController::index');
    $routes->get('/tickets/create', 'TicketController::create');
    $routes->post('/tickets/store', 'TicketController::store');
    $routes->get('/tickets/(:num)', 'TicketController::show/$1');
    $routes->get('/tickets/(:num)/edit', 'TicketController::edit/$1', ['filter' => 'role:admin']);
    $routes->post('/tickets/(:num)/update', 'TicketController::update/$1', ['filter' => 'role:admin']);
    $routes->post('/tickets/(:num)/delete', 'TicketController::delete/$1', ['filter' => 'role:admin']);
});

$routes->get('/login', 'AuthController::login');
$routes->post('/login', 'AuthController::attemptLogin');
$routes->post('/logout', 'AuthController::logout');