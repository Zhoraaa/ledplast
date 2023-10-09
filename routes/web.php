<?php

use App\Http\Controllers\ArticleController;
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
    return view('index');
});

// Route::post("/article",[ArticleController::class,"create_article"]); и это А
Route::get('/addUser', function () {
    return view('addUsrTool');
});

Route::post('/addUser', [UserController::class, 'sign_up'])->name('addUser');
Route::post('/login', [UserController::class, 'sign_in'])->name('login');
