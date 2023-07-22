<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ClassifyController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\CartController;
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
    Route::group(['prefix' => 'home'], function () {
    Route::get('/home', [PagesController::class, 'index'])->name('home.index');
    Route::get('/about', [PagesController::class, 'about'])->name('home.about');
    Route::get('/contact', [PagesController::class, 'contact'])->name('home.contact');
    Route::get('/shop', [PagesController::class, 'shop'])->name('home.shop');
    Route::get('/shop/{id}', [PagesController::class, 'shop_classify'])->name('home.shop_classify');
    Route::get('/detail/{id}', [PagesController::class, 'detail'])->name('home.detail');
    });
    
    Route::get('/sign-up', [PagesController::class, 'sign_up'])->name('user.sign-up');
    // Cart 
    Route::group(['prefix' => 'cart'], function () {
        Route::get('add/{id}', [CartController::class, 'add'])->name('cart.add');
        Route::get('remove/{id}', [CartController::class, 'remove'])->name('cart.remove');
        Route::get('update/{id}', [CartController::class, 'update'])->name('cart.update');
        Route::get('clear', [CartController::class, 'clear'])->name('cart.clear');
        Route::get('/cart', [CartController::class, 'show'])->name('cart.cart');
    });
    
    Route::get('/checkout', [OrderController::class, 'checkout'])->name('order.checkout');
    


    Route::get('/profile', [UserController::class, 'profile'])->name('user.profile');
    
        

    Route::get('/', [AdminController::class, 'index']) ->name('dashboard');

    Route::resources([
        'classify' => ClassifyController::class,
        'author' => AuthorController::class,
        'product' => ProductController::class,
        'account' => AccountController::class,
    ]);
    // Route::get('/home', []

    


// function () {
//     return view('backend.pages.home');})->name('dashboard');
// Route::get('blank-page', function () {
//     return view('pages.blank-page');})->name('blank-page');



