<?php

use Illuminate\Support\Facades\Route;


/*Route::get('/', function () {
    return view('welcome');
});
*/

Route::get('/', 'App\Http\Controllers\ClientController@home');
Route::get('/cart', 'App\Http\Controllers\ClientController@cart');
Route::get('/checkout', 'App\Http\Controllers\ClientController@checkout');
Route::get('/shop', 'App\Http\Controllers\ClientController@shop');
Route::get('/login', 'App\Http\Controllers\ClientController@login');
Route::get('/signup', 'App\Http\Controllers\ClientController@signup');
Route::get('/paiement', 'App\Http\Controllers\ClientController@paiement');



Route::get('/admin', 'App\Http\Controllers\AdminController@dashbord');
Route::get('/table', 'App\Http\Controllers\AdminController@table');
Route::get('/validation', 'App\Http\Controllers\AdminController@validation');
Route::get('/log', 'App\Http\Controllers\AdminController@log');

Route::get('/ajoutercategorie', 'App\Http\Controllers\CategorieController@ajoutercategorie');
