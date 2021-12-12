<?php

Route::redirect('/', '/login');
Route::redirect('/home', '/admin');
Auth::routes(['register' => false]);

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
    Route::get('/', 'HomeController@index')->name('home');
    // Permissions
    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
    Route::resource('permissions', 'PermissionsController');

    // Roles
    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
    Route::resource('roles', 'RolesController');

    // Users
    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
    Route::resource('users', 'UsersController');

    // Region
    Route::delete('regions/destroy', 'RegionController@massDestroy')->name('regions.massDestroy');
    Route::resource('regions', 'RegionController');

    // Region
    Route::delete('districts/destroy', 'DistrictController@massDestroy')->name('districts.massDestroy');
    Route::resource('districts', 'DistrictController');

    // Land Status
    Route::delete('land_status/destroy', 'LandStatusController@massDestroy')->name('land_status.massDestroy');
    Route::resource('land_status', 'LandStatusController');

    // Species
    Route::delete('species/destroy', 'SpeciesController@massDestroy')->name('species.massDestroy');
    Route::resource('species', 'SpeciesController');

    Route::get('log-list', 'LogListController@index')->name('log.list.index');
    Route::get('log-list-view/{logList}', 'LogListController@show')->name('log.list.show');
    Route::get('log-list-create', 'LogListController@create')->name('log.list.create');
    Route::post('log-list', 'LogListController@store')->name('log.list');
    Route::delete('log-list-delete/{logList}', 'LogListController@destroy')->name('log.list.destroy');

});
