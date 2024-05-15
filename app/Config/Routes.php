<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::login');
$routes->get('/dashboard', 'Home::dashboard', ['filter' => 'auth_login']);
$routes->get('/register', 'Home::register');
$routes->post('/register_ac', 'Home::register_ac');
$routes->post('/login_ac', 'Home::login_ac');
$routes->get('/logout_ac', 'Home::logout_ac');
$routes->get('/tickets', 'Home::tickets');
$routes->get('/newtickets', 'Home::newTicket');