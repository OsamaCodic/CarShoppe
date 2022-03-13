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
    return view('welcome');    
});

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


// All backend routes
    Route::prefix('admin')->group(function () {
        
        Route::resource('/users', UserController::class);
        Route::resource('/products', ProductController::class);
        
        Route::get('product/{id}/features', 'ProductController@product_features');
        Route::post('product_features', 'ProductController@store_features');

    });
// All backend routes
