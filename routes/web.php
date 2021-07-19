<?php

use Illuminate\Support\Facades\Route;

    Route::get('/', function () {
        return view('welcome');
    });
livewrite
    Auth::routes();
    Route::get('/home', 'HomeController@index')->name('home');

// Route::get('/admin', 'HomeController@admin')->name('admin');


