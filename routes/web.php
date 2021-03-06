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

$app->get('/', function () use ($app) {
    return $app->version();
});

$app->group(['prefix' => 'api'], function($app)
{
    $app->get('posts', 'PostController@index');
    $app->get('posts/{slug}', 'PostController@show');

    $app->group(['middleware' => 'auth'], function($app) {
        $app->post('posts', 'PostController@create');
        $app->put('posts/{slug}', 'PostController@update');
        $app->patch('posts/{slug}', 'PostController@update');
        $app->delete('posts/{slug}', 'PostController@destroy');
    });
});