<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home/index');
});

Route::get('/about', function () {
    return view('home/about');
});

Route::get('/contact', function () {
    return view('home/contact');
});

Route::get('/shop', 'SouvenirsController@shop');
Route::get('/souvenirs/display/{id}', 'SouvenirsController@display');
Route::get('/souvenirs/search', 'SouvenirsController@search');
Route::get('/souvenirs/filterByCategory/{id}', 'SouvenirsController@filterByCategory');


Route::get('/souvenirs/addToCart/{id}','SouvenirsController@addToCart');
Route::get('/souvenirs/getCart','SouvenirsController@getCart');
Route::get('/souvenirs/addCartItem/{id}','SouvenirsController@addCartItem');
Route::get('/souvenirs/minusCartItem/{id}','SouvenirsController@minusCartItem');
Route::get('/souvenirs/clearCart','SouvenirsController@clearCart');
Route::get('/souvenirs/searchIndex','SouvenirsController@searchIndex');

Route::resource('souvenirs','SouvenirsController');
Route::resource('suppliers','SuppliersController');
Route::post('/suppliers', 'SuppliersController@store');
Route::delete('/suppliers/{id}', 'SuppliersController@destroy');

Route::resource('orders','OrdersController');
Route::get('/orders/{id}/orderStatus','OrdersController@orderStatus');

Route::resource('categories','CategoriesController');

Auth::routes(['verify'=>true]);
Route::get('/admin','AdminController@admin')->middleware('is_admin')->name('admin');

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('users','UsersController');
Route::get('/users/{id}/changeStatus','UsersController@changeStatus');
