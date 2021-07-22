<?php
use Illuminate\Support\Facades\Route;

//ROUTE THE ADMINISTRATOR

    // para acceder a la administracion
    Route::get('/', 'AdminController@index')->name('admin');
    //USER
    Route::resource('users', 'UsersController', ['as' => 'admin']);
    //ROLE
    Route::resource('roles', 'RolesController', ['as' => 'admin']);



    //movimientos
    Route::get('records-users', 'RecordController@index')->name('admin.records');
    //rutas datatables ajax
    Route::get('record/generales', 'RecordController@recordGeneral');



//Route::group(['prefix' => 'admin', 'namespace' => 'admin', 'middleware' => 'auth'],  function(){
//});

