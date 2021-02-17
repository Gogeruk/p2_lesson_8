<?php

use  Illuminate\Events\Dispatcher;

$request = \Illuminate\Http\Request::createFromGlobals();
function request() {
    global $request;

    return $request;
}

$dispatcher = new Dispatcher;
$container = new \Illuminate\Container\Container();
$router = new \Illuminate\Routing\Router($dispatcher, $container);
function router() {
    global $router;

    return $router;
}


// index
$router->get('/', "\Hillel\Controllers\HomeController@home");

// Categories
$router->get('/category', "\Hillel\Controllers\CategoryController@table");

$router->get('/category/create', "\Hillel\Controllers\CategoryController@create");
$router->post('/category/create', "\Hillel\Controllers\CategoryController@saveCreate");

$router->get('/category/update', "\Hillel\Controllers\CategoryController@update");
$router->get('/category/{id}/update', "\Hillel\Controllers\CategoryController@saveUpdate");

$router->get('/category/delete', "\Hillel\Controllers\CategoryController@delete");
$router->post('/category/delete', "\Hillel\Controllers\CategoryController@saveDelete");

// Tags
$router->get('/tag', "\Hillel\Controllers\TagController@table");

$router->get('/tag/create', "\Hillel\Controllers\TagController@create");
$router->post('/tag/create', "\Hillel\Controllers\TagController@saveCreate");

$router->get('/tag/update', "\Hillel\Controllers\TagController@update");
$router->get('/tag/{id}/update', "\Hillel\Controllers\TagController@saveUpdate");

$router->get('/tag/delete', "\Hillel\Controllers\TagController@delete");
$router->post('/tag/delete', "\Hillel\Controllers\TagController@saveDelete");


?>
