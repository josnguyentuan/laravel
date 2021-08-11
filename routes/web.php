<?php

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
use \App\Http\Controllers\LoginController;
use \App\Http\Controllers\CategoryController;
use \App\Http\Controllers\PostController;



Route::prefix('admin')->group(function (){
    Route::get('/login', [LoginController::class, 'loginForm'])->name('login');
    Route::post('/login', [LoginController::class, 'login']);
    Route::get('/', [LoginController::class, 'logout'])->name('logout');
    Route::prefix('category')->group(function (){
        Route::get('/', [CategoryController::class, 'index'])->name('category.index');
        Route::group(['middleware' => 'auth'], function (){
            Route::get('/add', [CategoryController::class, 'create'])->name('category.add');
            Route::post('/add', [CategoryController::class, 'store']);
            Route::get('/edit/{id}', [CategoryController::class, 'edit'])->name('category.edit');
            Route::post('/edit/{id}', [CategoryController::class, 'update']);
            Route::get('/delete/{id}', [CategoryController::class, 'destroy'])->name('category.delete');
        });
    });
    Route::prefix('post')->group(function (){
        Route::get('/', [PostController::class, 'index'])->name('post.index');
        Route::group(['middleware'=> 'auth'], function (){
            Route::get('/add', [PostController::class, 'create'])->name('post.add')->middleware(['auth']);
            Route::post('/add', [PostController::class, 'store']);
            Route::get('/edit/{id}', [PostController::class, 'edit'])->name('post.edit')->middleware(['auth']);
            Route::post('/edit/{id}', [PostController::class, 'update'])->middleware('log_edit_post');
            Route::get('/delete/{id}', [PostController::class, 'destroy'])->name('post.delete')->middleware(['auth']);
        });
    });
});

