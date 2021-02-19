<?php

// use Route;
// use Auth;
use App\Models\User;

Auth::routes();

Route::get('/', 'PagesController@welcome');

/**
 * API
 */
Route::get('/vault', 'AccountsController@show')->name('user.dashboard');
Route::post('/accounts/update', 'AccountsController@update')->name('api.accounts.update');
Route::get('/accounts', 'AccountsController@index')->name('api.accounts.index');
Route::post('/accounts/delete', 'AccountsController@destroy')->name('api.accounts.destroy');
Route::post('/accounts/create', 'AccountsController@store')->name('api.accounts.create');

Route::get('/users/dump', function () {
    return User::all();
});
