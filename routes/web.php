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

Route::get('/where',function (){
    return view('where');
});
Route::get('/catalog',[App\Http\Controllers\product::class, 'prodlist']);
Route::get('/about',[App\Http\Controllers\about::class, 'slider']);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
