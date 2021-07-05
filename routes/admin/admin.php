<?php

use Illuminate\Support\Facades\Route;

//rutas de administracion
    // para acceder a la administracion
    Route::get('/', 'AdminController@index')->name('admin');
    //USER
    Route::resource('users', 'UsersController', ['as' => 'admin']);



//Route::group(['prefix' => 'admin', 'namespace' => 'admin', 'middleware' => 'auth'],  function(){
//});

