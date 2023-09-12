<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ClassifyController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\DistrictController;
use App\Http\Controllers\BlogController;
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
    Route::get('/home-adim', [HomeController::class, 'index'])->name('home');
    
    // Home 
    Route::get('/', [PagesController::class, 'index'])->name('home.index');
    Route::group(['prefix' => 'home'], function () {
        Route::get('/', [PagesController::class, 'index'])->name('home.index');
        Route::get('/contact', [PagesController::class, 'contact'])->name('home.contact');
        Route::get('/shop', [PagesController::class, 'shop'])->name('home.shop');
        Route::get('/shop/{id}', [PagesController::class, 'shop_classify'])->name('home.shop_cate');
        Route::get('/shop{id}', [PagesController::class, 'shop_author'])->name('home.shop_author');
        Route::get('/detail/{id}', [PagesController::class, 'detail'])->name('home.detail');
        Route::get('/about', [BlogController::class, 'about'])->name('home.about');
        Route::get('/blog/detail/{id}', [BlogController::class, 'show'])->name('blog.show');
        // Route::get('/blogs/{id}', [BlogController::class, 'about'])->name('home.about');
    });
    Route::get('/sign-up', [PagesController::class, 'sign_up'])->name('user.sign-up');
    // Cart 
    Route::group(['prefix' => 'cart'], function () {
        Route::get('add/{id}', [CartController::class, 'add'])->name('cart.add');
        Route::get('remove/{id}', [CartController::class, 'remove'])->name('cart.remove');
        // Route::post('/update/{id}', [CartController::class, 'update'])->name('cart.update');
        Route::get('update/{id}', [CartController::class, 'update'])->name('cart.update');
        Route::get('clear', [CartController::class, 'clear'])->name('cart.clear');
        Route::get('/', [CartController::class, 'show'])->name('cart.cart');
    });
    Route::group(['prefix' => 'order' ], function() {
        Route::get('/get-districts/{id}', [DistrictController::class, 'getDistricts'])->name('getDistricts');
        Route::get('/checkout', [OrderController::class, 'checkout'])->name('order.checkout');
        Route::post('checkout', [OrderController::class, 'post_checkout']);
        Route::get('order-success', [OrderController::class, 'order_success'])->name('order.success');
        Route::get('history', [OrderController::class, 'history'])->name('order.history');
    });
    Route::group(['middleware'=>'checklogin', 'prefix'=>'user'], function () {
        Route::get('/profile', [UserController::class, 'profile'])->name('user.profile');    
        Route::get('/detail/{id}', [UserController::class, 'detail'])->name('user.detail');    
    
    });
        Route::get('/error', [AdminController::class, 'error'])->name('error');
        Route::get('/admin', [AdminController::class, 'admin'])->name('admin-login');
        Route::post('admin', [AdminController::class, 'post_admin']);
        Route::get('/errors', [AdminController::class, 'no_delete'])->name('no_delete');
        
        
        Route::group(['middleware'=>'checkrule', 'prefix' => 'admin', 'as' => 'admin.'], function() {
            Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');
            
            Route::get('/product/trashed', [ProductController::class, 'trashed'])->name('product.trashed');
            Route::get('/product/restore/{id}', [ProductController::class, 'restore'])->name('product.restore');
            Route::get('/product/deleteforce/{id}', [ProductController::class, 'deleteforce'])->name('product.deleteforce');
            
            Route::get('/blog/trashed', [BlogController::class, 'trashed'])->name('blog.trashed');
            Route::get('/blog/restore/{id}', [BlogController::class, 'restore'])->name('blog.restore');
            Route::get('/blog/deleteforce/{id}', [BlogController::class, 'deleteforce'])->name('blog.deleteforce');
            
            Route::get('/classify/trashed', [ClassifyController::class, 'trashed'])->name('classify.trashed');
            Route::get('/classify/restore/{id}', [ClassifyController::class, 'restore'])->name('classify.restore');
            Route::get('/classify/deleteforce/{id}', [ClassifyController::class, 'deleteforce'])->name('classify.deleteforce');
            
            Route::get('/author/trashed', [AuthorController::class, 'trashed'])->name('author.trashed');
            Route::get('/author/restore/{id}', [AuthorController::class, 'restore'])->name('author.restore');
            Route::get('/author/deleteforce/{id}', [AuthorController::class, 'deleteforce'])->name('author.deleteforce');
            
            Route::get('/account/trashed', [AccountController::class, 'trashed'])->name('account.trashed');
            Route::get('/account/restore/{id}', [AccountController::class, 'restore'])->name('account.restore');
            Route::get('/account/deleteforce/{id}', [AccountController::class, 'deleteforce'])->name('account.deleteforce');
            
            Route::get('/order/trashed', [OrderController::class, 'trashed'])->name('order.trashed');
            Route::get('/order/restore/{id}', [OrderController::class, 'restore'])->name('order.restore');
            Route::get('/order/deleteforce/{id}', [OrderController::class, 'deleteforce'])->name('order.deleteforce');
            
            Route::get('/banner/trashed', [BannerController::class, 'trashed'])->name('banner.trashed');
            Route::get('/banner/restore/{id}', [BannerController::class, 'restore'])->name('banner.restore');
            Route::get('/banner/deleteforce/{id}', [BannerController::class, 'deleteforce'])->name('banner.deleteforce');
            
            
            
            Route::resources([
                'classify' => ClassifyController::class,
                'author' => AuthorController::class,
                'product' => ProductController::class,
                'account' => AccountController::class,
                'role' => RoleController::class,
                'order' => OrderController::class,
                'banner' => BannerController::class,
                'blog'=> BlogController::class,
            ]);
        });
        
        Route::get('/logon', [AdminController::class, 'logon'])->name('logon');


