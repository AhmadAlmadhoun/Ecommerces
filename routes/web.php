<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Front\CartController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Front\FrontController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\CategoryController;

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
    return view('site.index');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('admin')->name('admin.')->middleware(['auth', 'is_admin'])->group(function() {


    Route::get('/', [AdminController::class, 'index'])->name('index');

    Route::resource('categories', CategoryController::class);

    Route::resource('products', ProductController::class);

    // Route::resource('roles', RoleController::class);

    // Route::resource('users', UserController::class);

});

Route::get('/',[FrontController::class,'index'])->name('index');
Route::get('/category/{id}',[FrontController::class,'category'])->name('site.category');
Route::get('/product-details/{id}',[FrontController::class,'productdetails'])->name('site.product-details');







Route::middleware('auth')->group(function() {
    Route::post('add-to-cart', [CartController::class, 'add_to_cart'])->name('add_to_cart');
    Route::get('remove-cart/{id}', [CartController::class, 'remove_cart'])->name('remove_cart');

    Route::get('cart', [CartController::class, 'cart'])->name('cart');
    Route::post('update-cart', [CartController::class, 'update_cart'])->name('update_cart');

    Route::get('checkout', [CartController::class, 'checkout'])->name('checkout');
    Route::get('checkout/thanks', [CartController::class, 'checkout_thanks'])->name('checkout_thanks');

});
