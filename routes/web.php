<?php

Route::get('/', 'PagesController@welcome');
/**
 * API
 */
Route::get('/vault', 'AccountsController@show')->name('user.dashboard');
Route::post('/accounts/update', 'AccountsController@update')->name('api.accounts.update');
Route::get('/accounts', 'AccountsController@index')->name('api.accounts.index');
Route::post('/accounts/delete', 'AccountsController@destroy')->name('api.accounts.destroy');
Route::post('/accounts/create', 'AccountsController@store')->name('api.accounts.create');

Auth::routes();

// Route::post('/home/accounts/create', 'AccountsController@store')->name('accounts.store');
// Route::post('/home/accounts/update/{id}', 'AccountsController@update')->name('accounts.update');
// Route::post('/home/accounts/retrieve', 'AccountsController@retrivePassword')->name('accounts.retrivePassword');
// Route::get('/home/accounts/destroy', 'AccountsController@destroy')->name('accounts.destroy');


