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

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->group(['middleware' => []], function () use ($router) {
    
    //CRUD User
   $router->post('/user', ['uses' => 'UserController@post']);
   $router->get('/user', ['uses' => 'UserController@get']);
   $router->put('/user', ['uses' => 'UserController@put']);
   $router->delete('/user', ['uses' => 'UserController@delete']);
});