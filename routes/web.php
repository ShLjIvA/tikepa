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

Route::get('/shop', function () {
    echo "Nema shopa jbg";
})->name('shop');

//Route::get('/login', function () {
//    var_dump(Session::get('user'));
//    $user = new StdClass();
//    $user->id = 1;
//    $user->admin = 1;
//    $user->name = 'Steva';
//    Session::put('user', $user);
//    echo "upisan session";
//})->name('login');

//Route::get('/logout', function () {
//    Session::forget('user');
//    echo "zaboravljen user";
//})->name('logout');

Route::post("/add-to-cart", [\App\Http\Controllers\CartController::class, "add"]);

