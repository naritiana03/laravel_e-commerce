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
Route::get('/select_par_cat/{nom}', 'App\Http\Controllers\ClientController@select');
Route::get('/ajoutercart/{id}', 'App\Http\Controllers\ClientController@ajoutercart');
Route::post('/modifierquantite/{id}', 'App\Http\Controllers\ClientController@modifiercart');
Route::get('/retirerproduit/{id}', 'App\Http\Controllers\ClientController@retirerproduit');
Route::post('/creercompte', 'App\Http\Controllers\ClientController@creercompte');
Route::post('/accedercompte', 'App\Http\Controllers\ClientController@accedercompte');
Route::get('/logout', 'App\Http\Controllers\ClientController@logout');



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
Route::get('/produit', 'App\Http\Controllers\ProduitController@produit')->name('sauveproduit');
Route::get('/editproduit/{id}', 'App\Http\Controllers\ProduitController@editproduit');
Route::post('/modifierproduit' ,'App\Http\Controllers\ProduitController@modifierproduit');
Route::get('/deleteproduit/{id}', 'App\Http\Controllers\ProduitController@deleteproduit');
Route::get('/activer/{id}', 'App\Http\Controllers\ProduitController@activer');
Route::get('/desactiver/{id}', 'App\Http\Controllers\ProduitController@desactiver');



//Route Sliders
Route::get('/ajouterslider', 'App\Http\Controllers\SliderController@ajouterslider');
Route::post('/sauveslider', 'App\Http\Controllers\SliderController@sauveslider');
Route::get('/slider', 'App\Http\Controllers\SliderController@slider')->name('sauveslider');
Route::get('/editslider/{id}','App\Http\Controllers\SliderController@editslider');
Route::post('/modifierslider','App\Http\Controllers\SliderController@modifierslider');
Route::get('/activerslider/{id}', 'App\Http\Controllers\SliderController@activerslider');
Route::get('/desactiverslider/{id}', 'App\Http\Controllers\SliderController@desactiverslider');
Route::get('/deleteslider/{id}', 'App\Http\Controllers\SliderController@deleteslider');

