<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

$route['default_controller'] = "users_interface";
$route['404_override'] = '';

/***************************************************	USERS INTRERFACE	***********************************************/

$route[''] = 'users_interface/index';
$route['about'] = 'users_interface/about';
$route['news'] = 'users_interface/news';
$route['objects'] = 'users_interface/objects';
$route['contacts'] = 'users_interface/contacts';
$route['licenzii'] = 'users_interface/licenzii';
$route['blagodarnosti'] = 'users_interface/blagodarnosti';


$route['for-partners'] = 'users_interface/for_partners';
$route['for-individuals'] = 'users_interface/for_individuals';
$route['for-architectors'] = 'users_interface/for_architectors';

/*************************************************** 	ADMINS INTRERFACE	***********************************************/