<?php

Route::middleware('auth')->group(function () {
    Route::post('/users/get-account-password', 'AccountsController@apiGetAccountPassword')->name('api.user.get-account-password');
});
