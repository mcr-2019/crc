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

use App\Models\Permission;

Route::group([
    'prefix' => 'admin-panel',
    'namespace' => 'Admin',
    'middleware' => 'admin'
], function () {
    Route::get('/', 'AdminController@redirect');

    Route::group(['middleware' => 'hasPermission:'.Permission::PERMISSION_NEWS], function () {
        CRUD::resource('news', 'NewsCrudController');
    });

    Route::group(['middleware' => 'hasPermission:'.Permission::PERMISSION_CARS], function () {
        CRUD::resource('cars_with_driver', 'CarsWithDriverCrudController');
        CRUD::resource('cars_without_driver', 'CarsWithoutDriverCrudController');
    });
     
    Route::post('/car/upload', 'CarsWithDriverCrudController@upload');
    Route::post('/car/delete/image', 'CarsWithDriverCrudController@deleteImage');
});

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

Route::get('/news', 'NewsController@showNews');
Route::get('/news/{news_id}', 'NewsController@showNewsItem')->name('news.item');

Route::get('/booking', function () { return view('booking'); });
Route::get('/service', 'CarsController@service');
Route::get('/service/{car_id}', 'CarsController@getCarWithDriver');
Route::get('/rent', 'CarsController@rent');
Route::get('/rent/{car_id}', 'CarsController@getCarWithoutDriver');


