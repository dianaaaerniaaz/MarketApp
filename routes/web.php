<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClothesController;
use App\Http\Controllers\Auth2\RegisterController;
use App\Http\Controllers\Auth2\LoginController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\Adm\UserController;
use App\Http\Controllers\Adm\CategoryController;
Route::get('/', function () {
    return redirect()->route('clothes.index');
});

Route::middleware('auth')->group(function (){
    Route::resource('clothes', ClothesController::class)->except('index', 'show');
    Route::resource('/comments',CommentController::class)->except('index','show');
    Route::post('clothes/{clothes}/cart',[ClothesController::class,'cart'])->name('clothes.cart');

    Route::post('clothes/{clothes}/uncart',[ClothesController::class,'uncart'])->name('clothes.uncart');
    Route::get('/cart',[ClothesController::class,'cartindex'])->name('cart.index');

    Route::prefix('adm')->as('adm.')->middleware('hasrole:admin')->group(function (){
        Route::get('/users',[UserController::class,'index'])->name('users.index');
        Route::get('/clothes',[UserController::class,'index'])->name('clothes.index');

        Route::get('/users/search',[UserController::class,'index'])->name('users.search');
        Route::get('/users/{user}/edit',[UserController::class,'edit'])->name('users.edit');
        Route::put('/users/{user}',[UserController::class,'update'])->name('users.update');
        Route::put('/users/{user}/ban',[UserController::class,'ban'])->name('users.ban');
        Route::put('/users/{user}/unban',[UserController::class,'unban'])->name('users.unban');
    });
    Route::prefix('adm')->as('adm.')->middleware('hasrole:admin,moderator')->group(function (){
        Route::get('/categories',[CategoryController::class,'index'])->name('categories.index');
        Route::get('/categories/create',[CategoryController::class,'create'])->name('categories.create');
        Route::post('/categories',[CategoryController::class,'store'])->name('categories.store');
        Route::get('/clothes',[\App\Http\Controllers\Adm\ClothesController::class,'index'])->name('clothes.index');
        //Route::get('/categories/{category}/edit',[UserController::class,'edit'])->name('categories.edit');
        //Route::put('/categories/{category}',[UserController::class,'update'])->name('categories.update');
        Route::delete(

            '/categories/{category}',[CategoryController::class,'destroy'])->name('categories.destroy');
    });
});
Route::resource('/comments',CommentController::class)->only('index','show',);
Route::resource('clothes', ClothesController::class)->only('index','show');
Route::get('/clothes/search',[ClothesController::class,'index'])->name('clothes.search');
Route::get('/clothes/category/{category}', [ClothesController::class, 'clothesByCategory'])->name('clothes.category');

Route::get('/register', [RegisterController::class, 'create'])->name('register.form');
Route::post('/register', [RegisterController::class, 'register'])->name('register');

Route::get('/login', [LoginController::class, 'loginPage'])->name('login.form');
Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
