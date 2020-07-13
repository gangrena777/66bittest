<?php

$router->get('mvcphp', 'PagesController@home');
$router->get('mvcphp/about', 'PagesController@about');
$router->get('mvcphp/contact', 'PagesController@contact');
$router->post('mvcphp/delete', 'UsersController@delete');
$router->post('mvcphp/edit', 'UsersController@edit');

$router->get('mvcphp/users', 'UsersController@index');
$router->post('mvcphp/users', 'UsersController@store');
$router->post('mvcphp/newteam', 'UsersController@newteam');