<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Clogin');

$routes->resource('Api/Signalement');
//service('auth')->routes($routes, ['except' => ['login', 'register']]);

/*$routes->group('user', ['filter' => 'group:user'], static function ($routes) {
    $routes->group(
        '',
        ['filter' => ['group:user', 'permission:user.access']],
        static function ($routes) {
            $routes->resource('users');
        }
    );
});*/