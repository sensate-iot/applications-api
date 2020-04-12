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

use Illuminate\Support\Facades\Route;

/*$router->get('/', function () use ($router) {
    return $router->app->version();
});*/

Route::get('/apps/v1', 'StatusController@index');
Route::get('/apps/v1', 'StatusController@options');

Route::get('/apps/v1/status', 'StatusController@index');
Route::get('/apps/v1/status', 'StatusController@options');

Route::get('/apps/v1/applications', 'ApplicationsController@index');
Route::options('/apps/v1/applications', 'ApplicationsController@options');

Route::get('/apps/v1/menus', 'MenusController@index');
Route::options('/apps/v1/menus', 'MenusController@options');
