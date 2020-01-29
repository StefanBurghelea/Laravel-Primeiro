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

Route::view('/','home');
Route::view('about','about')->middleware('test');

Route::get('contact','ContactFormController@create')->name('contact.create');
Route::post('contact','ContactFormController@store')->name('contact.store');

Route::get('customers','CustomersController@index')->name('customer.index');
Route::get('customers/create','CustomersController@create')->name('customer.create');
Route::post('customers','CustomersController@store')->name('customer.store');
Route::get('customers/{customer}','CustomersController@show')->middleware('can:view,customer');
Route::get('customers/{customer}/edit', 'CustomersController@edit')->name('customer.edit');
Route::patch('customers/{customer}', 'CustomersController@update')->name('customer.update');
Route::delete('customers/{customer}', 'CustomersController@destroy')->name('customer.destroy');

//ou

//Route::resource('customers','CustomersController');



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
