<?php

namespace Config;

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

$routes->get('/login', 'Login::loginView');
$routes->get('/register', 'Register::registerView');
$routes->get('/cookies/accept', 'Cookies::accept');
$routes->get('/cookies/decline', 'Cookies::decline');
$routes->get('/auth/logout', 'Login::logoutAction');
$routes->get('/product/add', 'ProductController::add');
$routes->get('/product/purchase', 'ProductController::purchase');

$routes->post('/auth/login', 'Login::loginAction');
$routes->post('/auth/register', 'Register::registerAction');
$routes->post('/product/add/add', 'ProductController::addAction');

service('auth')->routes($routes);
