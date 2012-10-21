<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

$route['default_controller'] = "users_interface";
$route['404_override'] = '';

/***************************************************	USERS INTRERFACE	***********************************************/

$route[''] = 'users_interface/index';
$route['about'] = 'users_interface/about';
$route['news'] = 'users_interface/news';
$route['news/:any'] = 'users_interface/news';
$route['objects'] = 'users_interface/objects';
$route['contacts'] = 'users_interface/contacts';
$route['licenzii'] = 'users_interface/licenzii';
$route['blagodarnosti'] = 'users_interface/blagodarnosti';

$route['admin'] 	= "users_interface/admin_login";

$route['for-partners'] = 'users_interface/for_partners';
$route['for-individuals'] = 'users_interface/for_individuals';
$route['for-architectors'] = 'users_interface/for_architectors';

/*************************************************** 	ADMINS INTRERFACE	***********************************************/

$route['admin-panel/actions/logoff']		= "admin_interface/admin_logoff";

$route['admin-panel/actions/news']		= "admin_interface/control_news";
$route['admin-panel/actions/news/from']		= "admin_interface/control_news";
$route['admin-panel/actions/news/from/:num']= "admin_interface/control_news";
$route['admin-panel/actions/news/add']		= "admin_interface/control_add_new";
$route['admin-panel/actions/news/edit/id/:num'] = "admin_interface/control_edit_news";
$route['admin-panel/actions/news/delete/id/:num'] = "admin_interface/control_delete_news";