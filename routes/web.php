<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;


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



Route::get('/', [HomeController::class, 'home'])->name('home');


Route::get('/search', [HomeController::class, 'search'])->name('sesarch');

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