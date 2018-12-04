<?php


Route::get('/', 'PagesController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('user.dashboard');

Route::get('/account', 'HomeController@account')->name('user.account.edit');

Route::post('/home/accounts/create', 'AccountsController@store')->name('accounts.store');
Route::post('/home/accounts/update/{id}', 'AccountsController@update')->name('accounts.update');
Route::post('/home/accounts/retrieve', 'AccountsController@retrivePassword')->name('accounts.retrivePassword');
Route::get('/home/accounts/destroy', 'AccountsController@destroy')->name('accounts.destroy');

//use Illuminate\Support\Facades\Crypt;
//
// Route::get('/test', function () {
    //     $masterPass = 'jk9baAXP';
    //     $salt = 'oVEgbN1UeYr7iMTA'; //str_random(16)
    //     $password = encrypt($salt . $masterPass);
//     $hashed = substr(str_shuffle(bcrypt($salt . $masterPass)), 0, 16);
//     $encypt = encrypt($hashed);
//     echo 'Master Pass: ' . $masterPass . '<br>';
//     echo 'Salt: ' . $salt . '<br>';
//     echo 'Encrypted 1: ' . $password . '<br>';
//     echo 'Decrypted 1: ' . decrypt($password) . '<br>';
//     echo 'Scrambled Hash: ' . $hashed . '<br>';
//     echo 'Encrypted 2: ' . $encypt . '<br>';
//     echo 'Decrypted 2: ' . decrypt($encypt) . '<br>';
// });
