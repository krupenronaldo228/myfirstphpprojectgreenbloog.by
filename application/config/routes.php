<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'blog';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['blog']= 'blog/index';
$route['blog/(:num)']= 'blog/index/$2';
$route['blog/(:any)']= 'blog/view/$2';

