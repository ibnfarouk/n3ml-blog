<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\BloggerController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Website\Auth\LoginController;
use App\Http\Controllers\Website\HomeController as WebsiteHomeController;
use App\Http\Controllers\Website\PostController;
use Illuminate\Support\Facades\Auth;
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
Route::group(['as' => 'website.'], function (){
    Route::get('/', [WebsiteHomeController::class, 'home'])->name('home');
    Route::resource('posts', PostController::class)->except('index');

    Route::get('login', [LoginController::class, 'loginView'])->name('login')->middleware('guest');
    Route::post('login', [LoginController::class, 'login'])->name('submitLogin')->middleware('guest');
});




Route::group(['prefix' => 'admin'], function (){
    Auth::routes();
    Route::group(['as' => 'admin.', 'middleware' => ['auth', 'is-admin']], function (){
        Route::get('/home', [HomeController::class, 'index'])->name('home');
        Route::resource('categories', CategoryController::class);
        Route::resource('bloggers', BloggerController::class)->only('index', 'destroy');
        Route::resource('admins', AdminController::class);
    });

});
