<?php

use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */
$routes->get('/', 'Home::index');
$routes->get('/home', 'HomeController::index');

$routes->get('/tickets', 'TicketController::index');
$routes->get('/tickets/create', 'TicketController::create');
$routes->post('tickets/store', 'TicketController::store');
$routes->get('/tickets/(:num)', 'TicketController::show/$1');

$routes->get('/tickets/(:num)/edit', 'TicketController::edit/$1');
$routes->post('/tickets/(:num)/update', 'TicketController::update/$1');
$routes->post('/tickets/(:num)/delete', 'TicketController::delete/$1');
