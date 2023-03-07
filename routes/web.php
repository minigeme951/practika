<?php

use App\Http\Controllers\product;
use App\Http\Controllers\adminpanel;
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

Route::get('/where', function () {
    return view('where');
});
//Ссылки админ панели
Route::get('/admin',[adminpanel::class,'admin'])->name('admin')->middleware('administartor');//Админ панель
Route::get('/admin/product',[adminpanel::class,'prod'])->middleware('administartor');//Форма создания товара
Route::post('/admin/product/create',[adminpanel::class,'prodcreate'])->name('createprod'); // Отправка данных в базу данных
Route::get('/admin/product/delete/{id}',[adminpanel::class,'proddel'])->middleware('administartor');//Удаление продукта из базы данных
Route::get('/admin/category',function (){
    return view('createcat');
})->middleware('administartor');//Форма создания категорий
Route::post('/admin/category/create',[adminpanel::class,'catcreate'])->name('createcat');
Route::get('/admin/category/delete/{id}',[adminpanel::class,'catdel'])->middleware('administartor');//Удаление категории из базы данных
//Конец ссылок админ панели
Route::get('/catalog/product/{id}',[App\Http\Controllers\oneproduct::class, 'onelist']);
Route::get('/catalog',[product::class,'prodlist']);
Route::get('/catalog/filter/{id}', [product::class, 'filterr']);
Route::get('/catalog/sort/{name}/{sort}', [product::class, 'prodlist']);
Route::get('/about', [App\Http\Controllers\about::class, 'slider']);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
