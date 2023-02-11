<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/

// Xác định thiết bị truy cập
$ZERO_PATH = "./Mobile-Detect-2.8.34/Mobile_Detect.php";

require_once($ZERO_PATH);

$detect = new Mobile_Detect;






$route['default_controller'] = 'home/index';
$route['404_override'] = 'home/error';
$route['translate_uri_dashes'] = true; 


// Rewrite trang login admin
$route['^admin?$'] = 'admin/login';
$route['^admin/(:any)?$'] = 'admin/$1';

//rewrite front-end
$route['^product-category/(:any)-c(:num)?$'] = 'catalog/catalog/$2';
$route['^product/(:any)-p(:num)?$'] = 'product/product/$2';
$route['^project(.html)?$'] = 'project/index/';
$route['^project/(:any)-p(:num)?$'] = 'project/view/$2';
$route['^blog(.html)?$'] = 'blog/index/';
$route['^blog/(:any)-n(:num)?$'] = 'blog/view/$2';
$route['^about-us(.html)?$'] = 'about_us/index/';
$route['^technology(.html)?$'] = 'technology/index/';
$route['^shop(.html)?$'] = 'product/index/';

