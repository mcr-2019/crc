<?php

/*
use App\Models\Permission;

Route::group([
    'prefix' => 'admin-panel',
    'namespace' => 'App\Http\Controllers\Admin',
    'middleware' => 'admin'
], function () {
    Route::get('/', 'AdminController@redirect');

    Route::group(['middleware' => 'hasPermission:'.Permission::PERMISSION_NEWS], function () {
        CRUD::resource('news', 'NewsCrudController');
    });
});
*/