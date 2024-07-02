<?php

use App\Http\Controllers\MainController;
use App\Http\Controllers\admin\MenuController;
use App\Http\Controllers\admin\ProductController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\admin\UploadController;
use App\Http\Controllers\admin\users\LoginController;
use App\Http\Controllers\ProductUserController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

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

Route::get('admin/users/login', [LoginController::class, 'index'])->name('login');
Route::post('admin/users/login/store', [LoginController::class, 'store']);

Route::middleware(['auth'])->group(function () {

    Route::prefix('admin')-> group(function(){
  //Menu
        Route:: prefix('menus') -> group(function(){
            Route::get('add', [MenuController::class, 'create']);
            Route::post('add', [MenuController::class, 'store']);
            Route::get('list', [MenuController::class, 'list']);
            Route::delete('destroy', [MenuController::class, 'destroy']);
            Route::get('edit/{menu}', [MenuController::class, 'show']);
            Route::post('edit/{menu}', [MenuController::class, 'update']);
        });
        Route::get('/', [MainController::class, 'index'])->name('admin');
        Route::get('main', [MainController::class, 'index']);
        //product
        Route::prefix('products')-> group(function(){
            Route::get('add', [ProductController::class, 'create']);
            Route::post('add', [ProductController::class, 'store']);
            Route::get('list', [ProductController::class, 'index']);
            Route::DELETE('destroy', [ProductController::class, 'destroy']);
            Route::get('edit/{product}', [ProductController::class, 'show']);
            Route::post('edit/{product}', [ProductController::class, 'update']);
        });

        //Slider
        Route::prefix('sliders')-> group(function(){
            Route::get('add', [SliderController::class, 'create']);
            Route::post('add', [SliderController::class, 'store']);
            Route::get('list', [SliderController::class, 'index']);
            Route::DELETE('destroy', [SliderController::class, 'destroy']);
            Route::get('edit/{product}', [SliderController::class, 'show']);
            Route::post('edit/{product}', [SliderController::class, 'update']);
        });

        //Upload
        Route::post('upload/services',[UploadController::class, 'store']);
    });

   
});

Route::get('/', [MainController::class, 'index']);
Route::post('/services/load-product', [MainController::class, 'loadProduct']);
Route::get('san-pham/{id}-{slug}.html',[ ProductUserController::class, 'index']);

Route::post('add-cart', [App\Http\Controllers\CartController::class, 'index']);
Route::get('carts', [App\Http\Controllers\CartController::class, 'show']);
Route::get('carts/check', [App\Http\Controllers\CartController::class, 'checkout']);
Route::post('update-cart', [App\Http\Controllers\CartController::class, 'update']);
Route::get('carts/delete/{id}', [App\Http\Controllers\CartController::class, 'remove']);
Route::post('carts/check', [App\Http\Controllers\CartController::class, 'addCart']);
Route::get('/order/confirmation', function() {
    return view('carts.confirmation', [
        'order' => Session::get('order')
    ]);
});

