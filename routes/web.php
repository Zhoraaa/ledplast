<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BasketController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('home');
})->name('home');

Route::post('/post', [PostController::class, "postEditor"])->middleware('auth')->name('postNew');
Route::get('/forum', [PostController::class, "allPosts"])->name('forum');
Route::get('/post/{id}', [PostController::class, "seePost"])->name('seePost');
Route::post('/post/{id}/edit', [PostController::class, "postEditor"])->name('postEdit');
Route::post('/post/{id}/delete', [PostController::class, "postDelete"])->name('postDelete');
Route::post('/post/save', [PostController::class, "postSave"])->middleware('auth')->name('savePost');
Route::get('/post/reply-to/{idToReply}', [PostController::class, "postEditor"])->middleware('auth')->name('postReply');
Route::post('/post/reply-to/{idToReply}', [PostController::class, "postSave"])->middleware('auth')->name('postReply');

Route::get('/user', function () { return view('user.perArea'); })->middleware('auth')->name("user");
Route::get('/user/auth', function () { return view('user.authPage'); })->middleware('guest')->name("auth");
Route::get('/user/reg', function () { return view('user.regPage'); })->middleware('guest')->name("reg");
Route::post('/user/exit', [UserController::class, "logOut"])->middleware('auth')->name("logout");
Route::post('/user/new', [UserController::class, "signUp"])->name("signUp");
Route::post('/user/auth', [UserController::class, "signIn"])->name("signIn");
Route::post('/user/changeBalance', [UserController::class, "changeBalance"])->name("changeBalance");

Route::get('/shop', [ProductController::class, "allProducts"])->name('shop');
Route::post('/product', [ProductController::class, "productEditor"])->middleware("auth")->name("productNew");
Route::post('/product/save', [ProductController::class, "productSave"])->middleware("auth")->name("productSave");
Route::get('/product/{id}', [ProductController::class, "seeProduct"])->name('seeProduct');
Route::post('/product/{id}/delete', [ProductController::class, "productDelete"])->name('productDelete');
Route::post('/product/{id}/edit', [ProductController::class, "productEditor"])->name('productEdit');

Route::post('/product/{id}/addToCart', [BasketController::class, "addToCart"])->middleware('auth')->name('addToCart');
Route::get('/cart', [BasketController::class, "getBasket"])->middleware('auth')->name('cart');
Route::post('/cart/exclude', [BasketController::class, "basketExclude"])->middleware('auth')->name('basketExclude');
Route::post('/cart/pay', [BasketController::class, "payBasket"])->middleware('auth')->name('payBasket');
Route::post('/order/{id}/get', [BasketController::class, "getOrder"])->middleware('auth')->name('getOrder');

Route::get('/admin/usrRedaction', [AdminController::class, "usrRedaction"])->middleware('auth')->name('usrRedaction');
Route::post('/admin/doMod/{id}', [AdminController::class, "doMod"])->middleware('auth')->name('doMod');
Route::post('/admin/undoMod/{id}', [AdminController::class, "undoMod"])->middleware('auth')->name('undoMod');
Route::post('/admin/ban/{id}', [AdminController::class, "ban"])->middleware('auth')->name('ban');
Route::post('/admin/unban/{id}', [AdminController::class, "unban"])->middleware('auth')->name('unban');

Route::get('/delivery', function () { return view('delivery'); })->name('delivery');
Route::get('/about', function () { return view('about'); })->name('about');