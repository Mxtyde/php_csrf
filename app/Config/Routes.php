<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Auth::register');  // Redirect root to the registration page

$routes->match(['get', 'post'], 'auth/register', 'Auth::register');  // Handle both GET and POST requests for registration
$routes->match(['get', 'post'], 'auth/login', 'Auth::login');  // Handle both GET and POST requests for login
$routes->get('auth/logout', 'Auth::logout');  // Logout route

$routes->get('welcome', 'Auth::welcome');  // Route to the welcome page
