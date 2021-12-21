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

    Route::get('tdp-list', 'TdpListController@index')->name('tdp.list.index');
    Route::get('tdp-list-view/{logList}', 'TdpListController@show')->name('tdp.list.show');
    Route::get('tdp-list-edit/{logList}', 'TdpListController@edit')->name('tdp.list.edit');
    Route::get('tdp-list-assign/{logList}', 'TdpListController@assignTo')->name('tdp.list.assign');
    Route::get('tdp-list-create', 'TdpListController@create')->name('tdp.list.create');
    Route::post('tdp-list', 'TdpListController@store')->name('tdp.list');
    Route::post('tdp-list-update', 'TdpListController@update')->name('tdp.list.update');
    Route::post('assignedto', 'TdpListController@assignedTo')->name('tdp.list.assignedto');
    Route::post('statuslog', 'TdpListController@statuslog')->name('tdp.list.statuslog');
    Route::delete('tdp-list-delete/{tdpList}', 'TdpListController@destroy')->name('tdp.list.destroy');

});
