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

Route::get('/login', function (){
    return view('pages.login');
})->name('login');

Route::get('/card', function (){
    return view('pages.card');
})->name('card');

Route::get('/shop', function () {
    echo "Nema shopa jbg";
})->name('shop');

Route::get('/login', function () {
    var_dump(Session::get('user'));
    $user = new StdClass();
    $user->id = 1;
    $user->admin = 1;
    $user->name = 'Steva';
    Session::put('user', $user);
    echo "upisan session";
})->name('login');

Route::get('/logout', function () {
    Session::forget('user');
    echo "zaboravljen user";
})->name('logout');

Route::post("/add-to-cart", [\App\Http\Controllers\CartController::class, "add"]);

