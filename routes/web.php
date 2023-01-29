<?php

use Illuminate\Http\Request;
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

Route::get('/cart', [\App\Http\Controllers\CartController::class, 'index'])->name('cart');
Route::post("/cart", [\App\Http\Controllers\CartController::class, "add"])->name('add-to-cart');
Route::get("/cart/{id}", [\App\Http\Controllers\CartController::class, "remove"])->name('remove-from-cart');

Route::get('/forget', function (Request $request){
    if($request->session()->has('cartItems')){
        $request->session()->forget('cartItems');
    };
});

Route::get('/contact', [\App\Http\Controllers\ContactController::class, 'index'])->name('contact');
Route::post('/contact', [\App\Http\Controllers\ContactController::class, 'store'])->name('contact.store');


Route::get('/shop', [\App\Http\Controllers\ShopController::class, 'index'])->name('shop');

Route::get('/shop/{id}', [\App\Http\Controllers\ShopController::class, 'show'])->name('product');

Route::post('/shop', [\App\Http\Controllers\ShopController::class, 'search'])->name('search');


Route::middleware('isadmin')->group(function(){
    /* PAGES */
    Route::get('/admin', [\App\Http\Controllers\AdminController::class, 'articles'])->name('admin');

    Route::get('/admin/articles', [\App\Http\Controllers\AdminController::class, 'articles'])->name('articles');
    Route::post('/admin/articles', [\App\Http\Controllers\AdminController::class, 'addArticle'])->name('articles.add');
    Route::get('/admin/article/{id}', [\App\Http\Controllers\AdminController::class, 'article'])->name('article');
    Route::post('/admin/article/{id}', [\App\Http\Controllers\AdminController::class, 'updateArticle'])->name('articles.update');

    Route::get('/admin/brands', [\App\Http\Controllers\AdminController::class, 'brands'])->name('brands');
    Route::post('admin/brands/{id}', [\App\Http\Controllers\AdminController::class, 'updateBrand'])->name('brands.update');
    Route::post('admin/brands/', [\App\Http\Controllers\AdminController::class, 'addBrand'])->name('brands.add');
    Route::get('admin/brands/delete/{id}', [\App\Http\Controllers\AdminController::class, 'deleteBrand'])->name('brands.delete');

    Route::get('/admin/categories', [\App\Http\Controllers\AdminController::class, 'categories'])->name('categories');
    Route::post('/admin/categories/{id}', [\App\Http\Controllers\AdminController::class, 'updateCategory'])->name('categories.update');
    Route::post('/admin/categories', [\App\Http\Controllers\AdminController::class, 'addCategory'])->name('categories.add');
    Route::get('/admin/categories/delete/{id}' ,[\App\Http\Controllers\AdminController::class, 'deleteCategory'])->name('categories.delete');

    Route::get('/admin/genders', [\App\Http\Controllers\AdminController::class, 'genders'])->name('genders');
    Route::post('/admin/genders/{id}', [\App\Http\Controllers\AdminController::class, 'updateGender'])->name('genders.update');
    Route::post('/admin/genders', [\App\Http\Controllers\AdminController::class, 'addGender'])->name('genders.add');
    Route::get('/admin/genders/delete/{id}', [\App\Http\Controllers\AdminController::class, 'deleteGender'])->name('genders.delete');

    Route::get('/admin/links', [\App\Http\Controllers\AdminController::class, 'links'])->name('links');
    Route::post('/admin/links/{id}', [\App\Http\Controllers\AdminController::class, 'updateLink'])->name('links.update');
    Route::post('/admin/links', [\App\Http\Controllers\AdminController::class, 'addLink'])->name('links.add');
    Route::get('/admin/links/delete/{id}', [\App\Http\Controllers\AdminController::class, 'deleteLink'])->name('links.delete');

    Route::get('/admin/orders', [\App\Http\Controllers\AdminController::class, 'orders'])->name('orders');

    Route::get('/admin/users', [\App\Http\Controllers\AdminController::class, 'users'])->name('users');
});




