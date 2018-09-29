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

Route::get('/', 'PagesController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('user.dashboard');

Route::get('/account', 'HomeController@account')->name('user.account.edit');

Route::post('/home/accounts/create', 'AccountsController@store')->name('accounts.store');
Route::post('/home/accounts/retrieve', 'AccountsController@generatePassword')->name('user.accounts.generatePassword');
