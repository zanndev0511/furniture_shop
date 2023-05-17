<?php

use App\Http\Controllers\Admin\MainController;
use App\Http\Controllers\CateController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\UploadController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DealsController;
use App\Http\Controllers\Admin\Users\LoginController;
use App\Http\Controllers\Customer\CustomerController;
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
//Tao duong link dang nhap
//index: function
Route::get('admin/users/login', [LoginController::class,'index'])->name('login');
Route::post('admin/users/login/store', [LoginController::class,'store']);

Route::middleware('auth')->group(function(){
    Route::prefix('admin')->group(function(){ //tao link con

        Route::get('/main',[MainController::class, 'index'])->name('admin');
    
        #Menu
        Route::prefix('menu')->group(function(){
            Route::get('add', [MenuController::class, 'create']);
            Route::post('add', [MenuController::class, 'store']);
            Route::get('list', [MenuController::class, 'index']);
            Route::get('edit/{menu}', [MenuController::class, 'show']);
            Route::post('edit/{menu}', [MenuController::class, 'update']);
            Route::DELETE('destroy', [MenuController::class, 'destroy']);
        });
        
        #Product
        Route::prefix('products')->group(function(){
            Route::get('add',[ProductController::class, 'create']);
            Route::post('add',[ProductController::class, 'store']);
            Route::get('list',[ProductController::class, 'index']);
            Route::DELETE('destroy',[ProductController::class, 'destroy']);
            Route::get('edit/{product}', [ProductController::class, 'show']);
            Route::post('edit/{product}', [ProductController::class, 'update']);
        });
        #Slider
        Route::prefix('sliders')->group(function(){
            Route::get('add',[SliderController::class, 'create']);
            Route::post('add',[SliderController::class, 'store']);
            Route::get('list',[SliderController::class, 'index']);
            Route::DELETE('destroy',[SliderController::class, 'destroy']);
            Route::get('edit/{slider}', [SliderController::class, 'show']);
            Route::post('edit/{slider}', [SliderController::class, 'update']);
        });

        #Category
        Route::prefix('categories')->group(function(){
            Route::get('add',[CategoryController::class, 'create']);
            Route::post('add',[CategoryController::class, 'store']);
            Route::get('list',[CategoryController::class, 'index']);
            Route::DELETE('destroy',[CategoryController::class, 'destroy']);
            Route::get('edit/{category}', [CategoryController::class, 'show']);
            Route::post('edit/{category}', [CategoryController::class, 'update']);
        });
        #Deals
        Route::prefix('deals')->group(function(){
            Route::get('add',[DealsController::class, 'create']);
            Route::post('add',[DealsController::class, 'store']);
            Route::get('list',[DealsController::class, 'index']);
            Route::DELETE('destroy',[DealsController::class, 'destroy']);
            Route::get('edit/{deal}', [DealsController::class, 'show']);
            Route::post('edit/{deal}', [DealsController::class, 'update']);
        });
        #Orders
        Route::prefix('orders')->group(function(){
            Route::get('list',[CheckoutController::class, 'index_orders']);
            Route::DELETE('destroy',[CheckoutController::class, 'destroy_orders']);
            Route::get('edit/{order}', [CheckoutController::class, 'show_orders']);
            Route::post('edit/{order}', [CheckoutController::class, 'update_orders']);
        });
        Route::prefix('payments')->group(function(){
            Route::get('list',[CheckoutController::class, 'index_payments']);
            Route::DELETE('destroy',[CheckoutController::class, 'destroy_payments']);
            Route::get('edit/{payment}', [CheckoutController::class, 'show_payments']);
            Route::post('edit/{payment}', [CheckoutController::class, 'update_payments']);
        });
        #contact
        Route::prefix('contacts')->group(function(){
            Route::get('list',[ContactController::class, 'list']);
            Route::DELETE('destroy',[ContactController::class, 'destroy']);
            Route::get('edit/{contact}', [ContactController::class, 'show']);
            Route::post('edit/{contact}', [ContactController::class, 'update']);
        });
        
        #Upload
        Route::post('upload/services',[UploadController::class,'store']);
   });
});

Route::post('search',[HomeController::class,'search']);
Route::get('/',[HomeController::class,'index'])->name('main');
Route::get('categories',[CateController::class,'index'])->name('category');
// Route::get('categories',[CateController::class,'store']);
// Route::get('categories/{id}-{slug}.html', [App\Http\Controllers\MenuController::class, 'index']);
Route::get('product/{id}-{slug}', [App\Http\Controllers\ProductDetailController::class, 'index']);
Route::post('add_cart', [App\Http\Controllers\CartController::class, 'add']);
Route::post('update_cart', [App\Http\Controllers\CartController::class, 'update']);
Route::get('show_cart', [App\Http\Controllers\CartController::class, 'show']);
Route::get('delete_cart/{rowId}', [App\Http\Controllers\CartController::class, 'destroy']);
#Contact
Route::get('contact', [ContactController::class, 'index']);
Route::post('contact/store', [ContactController::class, 'store']);
#Checkout
Route::get('check_out',[CheckoutController::class,'checkout'])->name('checkout');
Route::post('save_checkout',[CheckoutController::class,'save_checkout']);
Route::get('log_out',[CheckoutController::class, 'log_out']);
Route::get('payment',[CheckoutController::class, 'payment'])->name('payment');
Route::get('confirm',[CheckoutController::class, 'confirm'])->name('confirm');
Route::post('order',[CheckoutController::class, 'order']);
#Customer
Route::get('login',[CustomerController::class, 'login'])->name('login_customer');
Route::post('login/store',[CustomerController::class, 'login_store'])->name('login_store');
Route::get('register',[CustomerController::class,'register']);
Route::post('register',[CustomerController::class,'store']);