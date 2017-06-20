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

Route::get('/', function () 
{
    return view('welcome');
});

Route::get('/mesh_login', function () 
{
    return view('auth.mesh_login');
})->name('mesh_login');;

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
