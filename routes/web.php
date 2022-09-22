<?php


use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProductController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Models\Product;

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

Route::get('/admin', [DashboardController::class, 'dashboard'])->name('admin');
Route::get('/product', [ProductController::class, 'index'])->name('Product');
Route::get('/productCreate', [ProductController::class, 'create'])->name('ProductCreate');
Route::post('/product', [ProductController::class, 'store'])->name('Product.store');
Route::get('/product/{id}', [ProductController::class, 'edit'])->name('product.edit');
Route::delete('/product/destroy', [ProductController::class, 'detroy'])->name('destroy');
    



Route::get('/', [HomeController::class, 'home'])->name('home');


Route::post('/search', [HomeController::class, 'search'])->name('sesarch');

Route::get('/CATEGORY',[HomeController::class,'CATEGORY'])->name('CATEGORY');

Route::get('/samsung',[HomeController::class,'samsung'])->name('samsung');

Route::get('/apple',[HomeController::class,'apple'])->name('apple');

Route::get('/xiaomi',[HomeController::class,'xiaomi'])->name('xiaomi');

Route::get('/garmin',[HomeController::class,'garmin'])->name('garmin');

Route::get('/detail/{id}',[HomeController::class,'detail'])->name('detail');

Route::post('/add_cart', [HomeController::class,'addCart'])->name('addCart');

Route::get('/register',[UserController::class,'register'])->name('register');
Route::post('/register',[UserController::class,'register_action'])->name('register.action');

Route::get('/login',[UserController::class,'login'])->name('login');
Route::post('/login',[UserController::class,'login_action'])->name('login.action');

// Route::get('/detail/{id}',[HomeController::class,'detail'])->name('details');

