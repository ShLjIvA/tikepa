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

Route::get('/', function () {
    $articles = \Illuminate\Support\Facades\DB::table('articles')->get();
//    dd($articles);
    return view('pages.home');
})->name('home');

Route::get('/login', function (){
    return view('pages.login');
})->name('login');

Route::get('/card', function (){
    return view('pages.card');
})->name('card');

Route::post("/add-to-cart", [\App\Http\Controllers\CartController::class, "add"]);

