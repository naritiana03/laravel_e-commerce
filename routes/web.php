<?php

use Illuminate\Support\Facades\Route;


/*Route::get('/', function () {
    return view('welcome');
});
*/

//Route Client

Route::get('/', 'App\Http\Controllers\ClientController@home');
Route::get('/cart', 'App\Http\Controllers\ClientController@cart');
Route::get('/checkout', 'App\Http\Controllers\ClientController@checkout');
Route::get('/shop', 'App\Http\Controllers\ClientController@shop');
Route::get('/login', 'App\Http\Controllers\ClientController@login');
Route::get('/signup', 'App\Http\Controllers\ClientController@signup');
Route::get('/paiement', 'App\Http\Controllers\ClientController@paiement');


//Route Admin
Route::get('/admin', 'App\Http\Controllers\AdminController@dashbord');
Route::get('/table', 'App\Http\Controllers\AdminController@table');
Route::get('/validation', 'App\Http\Controllers\AdminController@validation');
Route::get('/log', 'App\Http\Controllers\AdminController@log');
Route::get('/commande', 'App\Http\Controllers\AdminController@commande');



//Route Categorie
Route::get('/ajoutercategorie', 'App\Http\Controllers\CategorieController@ajoutercategorie');
Route::post('/sauvecategorie', 'App\Http\Controllers\CategorieController@sauvecategorie');
Route::get('/categorie', 'App\Http\Controllers\CategorieController@categorie');
Route::get('/editcategorie/{id}', 'App\Http\Controllers\CategorieController@editcategorie');
Route::post('/modifiercategorie', 'App\Http\Controllers\CategorieController@modifiercategorie');
Route::get('/deletecategorie/{id}', 'App\Http\Controllers\CategorieController@deletecategorie');



//Route Produit
Route::get('/ajouterproduit', 'App\Http\Controllers\ProduitController@ajouterproduit');
Route::post('/sauveproduit', 'App\Http\Controllers\ProduitController@sauveproduit');
Route::get('/produit', 'App\Http\Controllers\ProduitController@produit');



//Route Sliders
Route::get('/ajouterslider', 'App\Http\Controllers\SliderController@ajouterslider');
Route::post('/sauveslider', 'App\Http\Controllers\SliderController@sauveslider');
Route::get('/slider', 'App\Http\Controllers\SliderController@slider');

