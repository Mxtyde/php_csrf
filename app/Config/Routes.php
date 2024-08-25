<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Auth::register');  

$routes->match(['get', 'post'], 'auth/register', 'Auth::register'); 

$routes->match(['get', 'post'], 'auth/login', 'Auth::login');  

$routes->get('auth/logout', 'Auth::logout');  

// $routes->get('welcome', 'Auth::welcome');

$routes->get('welcome', 'Auth::welcome', ['filter' => 'auth']);
