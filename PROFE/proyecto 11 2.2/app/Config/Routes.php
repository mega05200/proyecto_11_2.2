<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('unidades', 'UnidadesController::index');
$routes->get('unidades/eliminadas', 'UnidadesController::eliminadas');
$routes->get('unidades/registrar', 'UnidadesController::registrar');
$routes->post('unidades/guardar', 'UnidadesController::guardar');
$routes->get('unidades/editar/(:num)', 'UnidadesController::editar/$1');
$routes->post('unidades/modificar', 'UnidadesController::modificar');
$routes->get('unidades/eliminar/(:num)', 'UnidadesController::eliminar/$1');
$routes->get('unidades/activar/(:num)', 'UnidadesController::activar/$1');

$routes->get('categorias', 'CategoriasController::index');
$routes->get('categorias/eliminadas', 'CategoriasController::eliminadas');
$routes->get('categorias/registrar', 'CategoriasController::registrar');
$routes->post('categorias/guardar', 'CategoriasController::guardar');
$routes->get('categorias/editar/(:num)', 'CategoriasController::editar/$1');
$routes->post('categorias/modificar', 'CategoriasController::modificar');
$routes->get('categorias/eliminar/(:num)', 'CategoriasController::eliminar/$1');
$routes->get('categorias/activar/(:num)', 'CategoriasController::activar/$1');