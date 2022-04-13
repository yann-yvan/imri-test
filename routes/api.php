<?php

/** @var \Laravel\Lumen\Routing\Router $router */

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->group(['prefix' => 'product'], function () use ($router) {
    $router->post('add', "ProductController@add");
    $router->post('search', "ProductController@search");
    $router->post('update', "ProductController@update");
    $router->post('delete', "ProductController@delete");
    $router->post('restore', "ProductController@restore");
});

$router->group(['prefix' => 'component'], function () use ($router) {
    $router->post('add', "ComponentController@add");
    $router->post('update', "ComponentController@update");
    $router->post('delete', "ComponentController@delete");
    $router->post('restore', "ComponentController@restore");
});
