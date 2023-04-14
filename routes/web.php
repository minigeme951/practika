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

//Route::get('/', function () {
//    return view('welcome');
//});

Auth::routes();

Route::get('/where', function () {
    return view('where');//Страница сайта о месте нахожденеия компании
});
//Ссылки админ панели
Route::get('/admin', [adminpanel::class, 'admin'])->name('admin')->middleware('administartor');//Админ панель
Route::get('/admin/product', [adminpanel::class, 'prod'])->middleware('administartor');//Форма создания товара
Route::post('/admin/product/create', [adminpanel::class, 'prodcreate'])->name('createprod'); // Отправка данных в базу данных
Route::get('/admin/product/edit/{id}',[adminpanel::class,'prodedit'])->middleware('administartor')->name('productedit');//редактирование продукта занесеного в базу данных
Route::post('/admin/product/edit/update/{id}',[adminpanel::class,'produpdate'])->name('produpdate');
Route::get('/admin/product/delete/{id}', [adminpanel::class, 'proddel'])->middleware('administartor');//Удаление продукта из базы данных
Route::get('/admin/category', function () {
    return view('createcat');
})->middleware('administartor');//Форма создания категорий
Route::post('/admin/category/create', [adminpanel::class, 'catcreate'])->name('createcat');
Route::get('/admin/category/edit/{id}',[adminpanel::class, 'catedit'])->middleware('administartor')->name('catedit');
Route::post('/admin/category/edit/{id}/update',[adminpanel::class, 'catupdate'])->name('catupdate');
Route::get('/admin/category/delete/{id}', [adminpanel::class, 'catdel'])->middleware('administartor');//Удаление категории из базы данных
//Конец ссылок админ панели

Route::get('/catalog/product/{id}', [App\Http\Controllers\oneproduct::class, 'onelist']);
Route::get('/catalog', [product::class, 'prodlist']);
Route::get('/catalog/filter/{id}', [product::class, 'filterr']);
Route::get('/catalog/sort/{name}/{sort}', [product::class, 'prodlist']);
Route::get('/', [App\Http\Controllers\about::class, 'slider']);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/error', function () {
    return view('Error');//Вывод страницы ошибки
});
//Ссылки корзины которые доступны только для авторизированных пользователей
Route::group(['middleware' => 'auth'], function () {
    Route::get('/cart', [App\Http\Controllers\cartcontroller::class, 'index'])->name('cartIndex');
    Route::get('/cart/add/{product_id}', [App\Http\Controllers\cartcontroller::class, 'add'])->name('cartAdd');
    Route::get('/cart/remove/{id}', [App\Http\Controllers\cartcontroller::class, 'remove'])->name('cartRemove');
    Route::post('cart/update/{id}',[App\Http\Controllers\cartcontroller::class,'update'])->name('cartUpadate');
});
