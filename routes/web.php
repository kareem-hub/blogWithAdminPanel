<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\dashboard\UsersController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\IsAdminMiddleware;

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

// no auth
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', [HomeController::class, 'about'])->name('about');
Route::get('/post/{post}', [HomeController::class, 'showPost'])->name('home.showPost');

// only auth
Route::group(['middleware' => ['auth']], function () {
    Route::resource('categories', CategoryController::class)->middleware(IsAdminMiddleware::class);
    Route::resource('posts', PostController::class)->middleware(IsAdminMiddleware::class);
    Route::resource('users', UsersController::class)->middleware(IsAdminMiddleware::class);
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

require __DIR__ . '/auth.php';
