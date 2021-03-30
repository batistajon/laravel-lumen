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
    
    return 'Criação de API REST simples com Lumen! by Jon Batista na versão do ' . $router->app->version() . ', deploy pelo git no terminal. #5';
});

$router->group(['prefix' => 'courses'], function () use ($router) {

    $router->get('/', 'CourseController@index');

    $router->get('/{id}', 'CourseController@show');

    $router->post('/', 'CourseController@store');

    $router->put('/{id}', 'CourseController@update');

    $router->delete('/{id}', 'CourseController@destroy');
});