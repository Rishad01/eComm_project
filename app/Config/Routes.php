<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/','Home::index');
$routes->get('homepage', 'Homepage::index');
$routes->get('homepage/signup', 'Homepage::signup');
$routes->post('homepage/signup', 'Homepage::signup');
$routes->get('homepage/login', 'Homepage::login');
$routes->post('homepage/login', 'Homepage::login');
$routes->get('admin', 'Admin');
$routes->get('admin/category', 'Admin::category');
$routes->post('admin/category', 'Admin::category');
$routes->get('admin/product', 'Admin::product');
$routes->post('admin/product', 'Admin::product');
$routes->get('admin/edit_prod/(:any)', 'Admin::edit_prod/$1');
$routes->post('admin/edit_prod', 'Admin::edit_prod');
$routes->get('admin/service_area', 'Admin::service_area');
$routes->post('admin/service_area', 'Admin::service_area');
$routes->get('admin/orders', 'Admin::orders');
