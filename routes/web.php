<?php


use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProductController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthenticationController;


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



// admin
Route::get('/admin', [DashboardController::class, 'dashboard']);
Route::get('/product', [ProductController::class, 'index'])->name("ProductList");
Route::get('/createproduct', [ProductController::class, 'create'])->name("CreateProduct");


// home
Route::get('/', [HomeController::class, 'home'])->name('home');

// home product
Route::get('/search', [HomeController::class, 'search'])->name('sesarch');

Route::get('/CATEGORY', [HomeController::class, 'CATEGORY'])->name('CATEGORY');

Route::get('/samsung', [HomeController::class, 'samsung'])->name('samsung');

Route::get('/apple', [HomeController::class, 'apple'])->name('apple');

Route::get('/xiaomi', [HomeController::class, 'xiaomi'])->name('xiaomi');

Route::get('/garmin', [HomeController::class, 'garmin'])->name('garmin');

Route::get('/detail/{id}', [HomeController::class, 'detail'])->name('detail');

Route::post('/add_cart', [HomeController::class, 'addCart'])->name('addCart');

Route::get('/register', [UserController::class, 'register'])->name('register');
Route::post('/register', [UserController::class, 'register_action'])->name('register.action');

Route::get('/login', [AuthenticationController::class, 'login'])->name('login');
Route::post('/login', [AuthenticationController::class, 'login_action'])->name('processLogin');

// Route::get('/detail/{id}',[HomeController::class,'detail'])->name('details');


// auth
    Route::post('/add_cart', [HomeController::class, 'addCart'])->name('addCart');
    Route::get('/view_cart', [HomeController::class, 'viewCart'])->name('viewCart');
    Route::post('/update_cart', [HomeController::class, 'updateCart'])->name('updateCart');
    Route::get('/checkout', [HomeController::class, 'checkout'])->name('checkout');
    Route::get('/clear_cart', [HomeController::class, 'clearCart'])->name('clearCart');
    Route::get('/save_cart', [HomeController::class, 'saveCart'])->name('saveCart');



Route::group(['middleware' => 'signined', 'prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::group(['middleware' => 'foradmin'], function () {

        Route::get('/admin', [DashboardController::class, 'dashboard'])->name('home');
        Route::get('/product', [ProductController::class, 'index'])->name('product');
    });
});

