<?php

use Illuminate\Support\Facades\Route;

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Anything related to car
Route::get('/carlist', [App\Http\Controllers\CarController::class, 'getAllCar']);
Route::get('/timeIn', function () {
    return view('carlist');
});
Route::post('/timeIn', [App\Http\Controllers\CarController::class, 'timeIn']);

//Anything related to user