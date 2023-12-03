<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'Shinearium';

/*** admin routes - start ***/
$route['admin'] = 'Admin/index';
$route['login'] = 'Admin/login';
$route['logout'] = 'Admin/logout';
$route['change-password'] = 'Admin/changePassword';
$route['shop'] = 'Shinearium/shop';
/*** admin routes - end ***/

/*** Product dynamic routes - start*/
$route['([^/]+)/?'] = 'Product/index/$1';
$route['product-list/([^/]+)/?'] = 'Product/product_list/$1';
$route['product/([^/]+)/?'] = 'Product/product/$1';
$route['product-pdf/([^/]+)/?'] = "Product/product_pdf/$1";
/*** Product dynamic routes - end ***/

$route['404_override'] = 'Custom_404';
$route['translate_uri_dashes'] = FALSE;
