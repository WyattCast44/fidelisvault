<?php

use Illuminate\Http\Request;

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::middleware('auth:api')->group(function () {

    Route::get('/vault', 'AccountsController@index')->name('api.accounts.index');

    Route::post('/users/get-account-password', 'AccountsController@apiGetAccountPassword')->name('api.user.get-account-password');

});
