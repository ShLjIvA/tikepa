<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Article;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/articles', [\App\Http\Controllers\ShopController::class, 'searchApi']);

Route::get('/prices', [\App\Http\Controllers\ShopController::class, 'pricesApi']);

Route::get('/articles/{id}', function($id) {
    return Article::find($id);
});


