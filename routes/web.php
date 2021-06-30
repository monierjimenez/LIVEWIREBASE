<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// Route::get('/admin', 'HomeController@admin')->name('admin');

//rutas de administracion
Route::group(['prefix' => 'admin', 'namespace' => 'admin', 'middleware' => 'auth'],  function(){

    // para acceder a la administracion
        Route::get('/', 'AdminController@index')->name('admin');
    //USER
		Route::resource('users', 'UsersController', ['as' => 'admin']);

});