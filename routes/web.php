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

// Route::get('/', function () {
//     return view('admin.index');
// });

Route::get('/', 'MemberController@index')->name('beranda');
Route::get('/product', 'MemberController@product')->name('product');

Auth::routes();

Route::group(['prefix' => 'manajemen'], function () {
    Route::get('/home', 'HomeController@index')->name('home');

    // Category
    Route::resource('category', 'CategoryController')->except('create','show');

    // Product
    Route::resource('product', 'ProductController');
});
