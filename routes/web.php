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

use App\Http\Controllers\DrugController;

$router->get('/', ["as" => "home","uses" => "DrugController@search"]);

$router->get('drug/search', ["as" => "search", "uses" => "DrugController@search"]);


$router->get('drug/specialty/{specialty}', ['as' => 'specialty', function ($specialty) {
    return (new DrugController())->search(request()->merge(["label" => $specialty]));
}]);

$router->get('drug/category/{category}', ['as' => 'category', function ($category) {
    return (new DrugController())->search(request()->merge(["label" => $category]));
}]);

$router->get('drug/{id}/{label}', ["as" => "detail", "uses" => "DrugController@detail"]);


