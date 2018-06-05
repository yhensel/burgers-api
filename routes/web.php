<?php

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

$router->group(['prefix' => '/', 'middleware' => 'client', 'as' => 'users', 'namespace' => 'Api'], function () use ($router) {
    $router->post('/register', ['as' => 'register', 'uses' => 'UserController@create']);
});

$router->group(['prefix' => 'users', 'middleware' => 'auth:api', 'as' => 'users', 'namespace' => 'Api'], function () use ($router) {
    $router->get('/', ['as' => 'index', 'uses' => 'UserController@index']);
    $router->put('/{user}/update', ['as' => 'update', 'uses' => 'UserController@update']);
});
