<?php


use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProductController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Models\Product;
use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\ProfileController;
use App\Http\Middleware\ForAdmin;

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
// Route::get('/admin', [DashboardController::class, 'dashboard']);
// Route::get('/admin/createuser', [DashboardController::class, 'create_user'])->name('createuser');

// home
Route::get('/', [HomeController::class, 'home'])->name('home');




// Route::get('/admin', [DashboardController::class, 'dashboard'])->name('admin');
//Product Route
Route::resource('/product', ProductController::class);

Route::get('/product', [ProductController::class, 'index'])->name('Product.index');
Route::get('/productCreate', [ProductController::class, 'create'])->name('ProductCreate');
Route::post('/product', [ProductController::class, 'store'])->name('Product.store');
Route::get('/product/{id}', [ProductController::class, 'edit'])->name('product.edit');  

// middleware admin

    Route::get('/admin', [UserController::class, 'users'])->name("ProfileList");
    Route::get('/createuser', [UserController::class, 'displayAddUser'])->name('createuser');
    Route::post('/createuser', [UserController::class, 'addUser'])->name('addUser');

    Route::get('/resetPassword/{id}', [UserController::class, 'resetPassword']);


// middleware user

    Route::get('/userdetail/{id}', [UserController::class, 'userdetail']);





Route::post('/search', [HomeController::class, 'search'])->name('sesarch');
Route::get('/CATEGORY', [HomeController::class, 'CATEGORY'])->name('CATEGORY');
Route::get('/samsung', [HomeController::class, 'samsung'])->name('samsung');
Route::get('/apple', [HomeController::class, 'apple'])->name('apple');
Route::get('/xiaomi', [HomeController::class, 'xiaomi'])->name('xiaomi');
Route::get('/garmin', [HomeController::class, 'garmin'])->name('garmin');
Route::get('/detail/{id}', [HomeController::class, 'detail'])->name('product.detail');

// Route::post('/add_cart', [HomeController::class, 'addCart'])->name('addCart');

//register
Route::get('/register', [UserController::class, 'register'])->name('register');
Route::post('/register', [UserController::class, 'register_action'])->name('register.action');

//user Login
Route::get('/login', [UserController::class, 'login'])->name('login');
Route::post('/login', [UserController::class, 'login_action'])->name('processLogin');
Route::get('/logout', [UserController::class, 'logout'])->name('logout');

//admin login
Route::get('/adminlogin', [UserController::class, 'adminlogin'])->name('adminlogin');
Route::post('/adminlogin', [UserController::class, 'adminlogin_action'])->name('adminprocessLogin');



// Route::get('/detail/{id}',[HomeController::class,'detail'])->name('details');

//         Route::get('/admin', [DashboardController::class, 'dashboard'])->name('home');
//         Route::get('/product', [ProductController::class, 'index'])->name('product');
//     });
// });

// auth
// Route::group(['middleware' => 'signined'], function () {
    Route::post('/add_cart', [HomeController::class, 'addCart'])->name('addCart');
    Route::get('/view_cart', [HomeController::class, 'viewCart'])->name('viewCart');
    Route::post('/update_cart', [HomeController::class, 'updateCart'])->name('updateCart');
    Route::get('/checkout', [HomeController::class, 'checkout'])->name('checkout');
    Route::get('/clear_cart', [HomeController::class, 'clearCart'])->name('clearCart');
    Route::post('/save_cart', [HomeController::class, 'saveCart'])->name('saveCart');
// });
Route::resource('profile', ProfileController::class);

// Route::group(['middleware' => 'signined', 'prefix' => 'admin', 'as' => 'admin.'], function () {
//     Route::group(['middleware' => 'foradmin'], function () {

//         Route::get('/admin', [DashboardController::class, 'dashboard'])->name('home');
//         Route::get('/product', [ProductController::class, 'index'])->name('product');
//     });
// });



