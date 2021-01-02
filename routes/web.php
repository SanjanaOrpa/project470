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

Route::get('/', function () {
    return view('welcome');
});

Route::get('http://localhost/pharmacy/MVC/Controller/', function () {
    return view('welcome');
});

Route::post('http://localhost/pharmacy/MVC/Controller/', function () {
    return view('welcome');
});

Route::post('/admin' , 'Admin@index');

Route::post('/medicine' , 'Medicines@Name');
