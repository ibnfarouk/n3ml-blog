<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\HomeController;
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
    return view('welcome');
});



Route::group(['prefix' => 'admin'], function (){
    Auth::routes();
    Route::group(['as' => 'admin.', 'middleware' => ['auth', 'is-admin']], function (){
        Route::get('/home', [HomeController::class, 'index'])->name('home');
        Route::resource('categories', CategoryController::class);
    });

});
