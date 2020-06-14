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

Route::get('/', 'HomeController@index');

Route::get('/payment', function () { return view('payment'); });

Route::get('/about', function () { return view('about'); });
Route::get('/about/events', function () { return view('about.events'); });
Route::get('/about/drivers', function () { return view('about.drivers'); });
Route::get('/about/partners', function () { return view('about.partners'); });
Route::get('/about/faq', function () { return view('about.faq'); });

Route::get('/contacts', function () { return view('contacts'); });

Route::get('/terms', function () { return view('terms'); });

Route::get('/more', function () { return view('more'); });

Route::get('/booking', function () { return view('booking'); });



