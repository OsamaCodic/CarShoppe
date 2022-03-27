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

        // Start Products routes
            Route::resource('/products', ProductController::class);
            Route::resource('/products', ProductController::class);
            
            Route::get('product/{id}/features', 'ProductController@product_features');
            Route::post('product_features', 'ProductController@store_features');
            Route::post('products/delete_selected_rows', 'ProductController@delete_selected_rows');
        // End Products routes

        // Start Brands routes
            Route::resource('/brands', BrandController::class);
        // End Brands routes

        // Start Types routes
            Route::resource('/types', TypeController::class);
        // End Types routes

    });
// All backend routes
