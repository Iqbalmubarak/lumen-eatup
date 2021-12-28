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


$router->get('user', 'Controller@index');
$router->post('/key', function(){
    return 'a';
});

$router->post('/login', 'AuthController@login');
$router->post('/register', 'AuthController@register');
$router->post('/restaurants/all-data','RestaurantController@allData');
$router->post('/restaurants/get-data','RestaurantController@getData');
$router->post('/restaurants/show','RestaurantController@show');
$router->post('/restaurants','RestaurantController@store');
$router->post('/restaurants/around','RestaurantController@around');
$router->post('/favorite-restaurants/store','FavoriteRestaurantController@store');
$router->post('/favorite-restaurants/destroy','FavoriteRestaurantController@destroy');
$router->post('/favorite-restaurants/all-data','FavoriteRestaurantController@allData');
$router->post('/favorite-menu/store','FavoriteMenuController@store');
$router->post('/favorite-menu/destroy','FavoriteMenuController@destroy');
$router->post('/favorite-menu/all-data','FavoriteMenuController@allData');
