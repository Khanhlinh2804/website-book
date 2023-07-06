<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ClassifyController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\Auth\LoginController;

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

    Auth::routes();
    // Route::get('/logout', [LoginController::class, 'logout']);
    // Route::get('/login', [LoginController::class, 'login']);
    Route::get('/home-adim', [HomeController::class, 'index'])->name('home');
    
    // Home 
    Route::get('/home', [PagesController::class, 'index'])->name('home.index');
    Route::get('/about', [PagesController::class, 'about'])->name('home.about');
    Route::get('/contact', [PagesController::class, 'contact'])->name('home.contact');
    
    Route::get('/sign-up', [PagesController::class, 'sign_up'])->name('user.sign-up');
    
        

    Route::get('/', [AdminController::class, 'index']) ->name('dashboard');

    Route::resources([
        'classify' => ClassifyController::class,
        'category' => CategoryController::class,
        'product' => ProductController::class,
        'account' => AccountController::class,
    ]);
    // Route::get('/home', []

    


// function () {
//     return view('backend.pages.home');})->name('dashboard');
// Route::get('blank-page', function () {
//     return view('pages.blank-page');})->name('blank-page');



