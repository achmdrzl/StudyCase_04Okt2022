<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomepageController;
use App\Http\Controllers\KoleksiController;
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

Route::get('/', HomepageController::class. '@index')->name('homepage');

Route::get('/categories', HomepageController::class. '@category')->name('categories.index');
Route::get('/collection', HomepageController::class. '@koleksi')->name('collection.index');
Route::get('/categoryDetail/{id}', HomepageController::class. '@detail')->name('category.detail');
Route::resource('category', CategoryController::class);
Route::resource('koleksi', KoleksiController::class);
