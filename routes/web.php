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

Route::get("/", [\App\Http\Controllers\HomeController::class, 'index'])->name("home");

Route::get('/login', [\App\Http\Controllers\AuthController::class, 'index'])->name('login');
Route::post('/doLogin', [\App\Http\Controllers\AuthController::class, 'doLogin'])->name('doLogin');
Route::get('/logout', [\App\Http\Controllers\AuthController::class, 'doLogout'])->name('doLogout');


Route::get('/register', [\App\Http\Controllers\RegisterController::class, 'index'])->name('register');
Route::post('/register', [\App\Http\Controllers\RegisterController::class, 'store'])->name('doRegister');

Route::get('/admin', function (){
    return view('pages.cart');
})->name('admin-panel');

Route::get('/cart', function (){
    return view('pages.cart');
})->name('cart');

Route::get('/contact', [\App\Http\Controllers\ContactController::class, 'index'])->name('contact');


Route::get('/shop', [\App\Http\Controllers\ShopController::class, 'index'])->name('shop');


Route::get('/contact', function () {
    echo "Nema shopa jbg";
})->name('contact');

Route::middleware('isadmin')->group(function(){
    /* PAGES */
    Route::get('/admin', [\App\Http\Controllers\AdminController::class, 'articles'])->name('articles');
    Route::get('/admin/articles', [\App\Http\Controllers\AdminController::class, 'articles'])->name('articles');
    Route::get('/admin/brands', [\App\Http\Controllers\AdminController::class, 'brands'])->name('brands');
    Route::get('/admin/categories', [\App\Http\Controllers\AdminController::class, 'categories'])->name('categories');
    Route::get('/admin/genders', [\App\Http\Controllers\AdminController::class, 'genders'])->name('genders');
    Route::get('/admin/links', [\App\Http\Controllers\AdminController::class, 'links'])->name('links');
    Route::get('/admin/orders', [\App\Http\Controllers\AdminController::class, 'orders'])->name('orders');
    Route::get('/admin/users', [\App\Http\Controllers\AdminController::class, 'users'])->name('users');
});



Route::post("/add-to-cart", [\App\Http\Controllers\CartController::class, "add"]);

