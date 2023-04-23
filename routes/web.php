<?php

use Illuminate\Support\Facades\Route;

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
Route::get('/', function () {
    return view('pages.home');
})->name('dashboard');
Route::get('blank-page', function () {
    return view('pages.blank-page');
})->name('blank-page');
Route::get('bootstrap-elements', function () {
    return view('pages.bootstrap-elements');
})->name('bootstrap-elements');
Route::get('bootstrap-grid', function () {
    return view('pages.bootstrap-grid');
})->name('bootstrap-grid');
Route::get('charts', function () {
    return view('pages.charts');
})->name('charts');
Route::get('forms', function () {
    return view('pages.forms');
})->name('forms');
Route::get('index-rtl', function () {
    return view('pages.index-rtl');
})->name('index-rtl');
Route::get('tables', function () {
    return view('pages.tables');
})->name('tables');
