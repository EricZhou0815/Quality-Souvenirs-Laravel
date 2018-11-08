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

Route::resource('souvenirs','SouvenirsController');

Route::resource('suppliers','SuppliersController');
Route::post('/suppliers', 'SuppliersController@store');
Route::delete('/suppliers/{id}', 'SuppliersController@destroy');



Route::resource('categories','CategoriesController');

Auth::routes();
Route::get('/admin','AdminController@admin')->middleware('is_admin')->name('admin');

Route::get('/home', 'HomeController@index')->name('home');
