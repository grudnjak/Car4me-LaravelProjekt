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

Route::get('/', 'PagesController@index' );
Route::get('/about', 'PagesController@about' );
Route::get('/services', 'PagesController@services' );


Route::resource('posts', 'PostsController'); 
Route::resource('cars', 'CarsController'); 
Route::resource('brands', 'BrandsController'); 
Route::resource('models', 'ModelsController'); 
Route::resource('rents', 'RentsController'); 
Route::resource('users', 'UsersController'); 
Route::resource('cities', 'CitiesController'); 
Route::resource('countries', 'CountriesController'); 
Auth::routes();

Route::get('/dashboard', 'DashboardController@index')  ;

Route::get('/rents/create/{id}', 'RentsController@create');
