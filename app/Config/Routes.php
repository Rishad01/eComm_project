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
$routes->get('user/profile/(:any)', 'User::profile/$1');
$routes->get('admin/status_change/(:any)', 'Admin::status_change/$1');
$routes->post('admin/status_change/(:any)', 'Admin::status_change/$1');
$routes->get('user/category_page', 'User::category_page');
$routes->get('user/prod_page/(:any)', 'User::prod_page/$1');
$routes->post('user/cart/(:any)', 'User::cart/$1');
$routes->get('homepage/logout', 'Homepage::logout');

$routes->group('',['filter'=>'isLoggedIn'],function($routes){
    $routes->get('user/profile/(:any)', 'User::profile/$1');
});

$routes->get('user/show_cart', 'User::show_cart');
$routes->post('user/update_cart/(:any)', 'User::update_cart/$1');
$routes->get('user/remove_cart/(:any)', 'User::remove_cart/$1');
$routes->get('user/checkout', 'User::checkout');
$routes->post('user/final_order/(:any)', 'User::final_order/$1');
$routes->get('user/profile', 'User::profile');






