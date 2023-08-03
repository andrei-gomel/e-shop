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

/*Route::get('/admin/login', function (){
        return view('admin.login');
})->name('admin-login');*/

//Route::post('/admin/login', [\App\Http\Controllers\Admin\LoginController::class, 'login']);

//Route::get('/', [\App\Http\Controllers\Client\LoginController::class, 'login']);

Route::get('/', [\App\Http\Controllers\Client\MainController::class, 'index'])->name('shop-index');

Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'admin']], function (){
    //  \Illuminate\Support\Facades\Gate::authorize('view-protected-part');
    Route::get('/clients', [\App\Http\Controllers\Admin\ClientController::class, 'index'])->name('admin-clients');
    Route::get('/client/view/{id}', [\App\Http\Controllers\Admin\ClientController::class, 'view']);
    Route::get('/client/create', [\App\Http\Controllers\Admin\ClientController::class, 'create'])->name('client-create');
    Route::post('/client/save', [\App\Http\Controllers\Admin\ClientController::class, 'store'])->name('client-save');
    Route::put('/client/update/{id}', [\App\Http\Controllers\Admin\ClientController::class, 'update'])->name('client-update');
    Route::get('/client/edit/{id}', [\App\Http\Controllers\Admin\ClientController::class, 'edit'])->name('client-edit');
    Route::get('/client/destroy/{id}', [\App\Http\Controllers\Admin\ClientController::class, 'destroy'])->name('admin-client-destroy');
    Route::get('/product', [\App\Http\Controllers\Admin\ProductController::class, 'index'])->name('product-index');
    Route::get('/product/create', [\App\Http\Controllers\Admin\ProductController::class, 'create'])->name('product-create');
    Route::post('/product/save', [\App\Http\Controllers\Admin\ProductController::class, 'store'])->name('product-save');
    Route::get('/product/edit/{id}', [\App\Http\Controllers\Admin\ProductController::class, 'edit'])->name('product-edit');
    Route::put('/product/update/{id}', [\App\Http\Controllers\Admin\ProductController::class, 'update'])->name('product-update');
    Route::get('/product/destroy/{id}', [\App\Http\Controllers\Admin\ProductController::class, 'destroy'])->name('product-destroy');
    Route::get('/product/{id}', [\App\Http\Controllers\Admin\ProductController::class, 'show'])->name('product-show');
    Route::get('/orders', [\App\Http\Controllers\Admin\OrderController::class, 'index'])->name('orders-index');
    Route::post('/orders/filterbyoption', [\App\Http\Controllers\Admin\OrderController::class, 'filterByOption'])->name('filterbyoption');
    Route::get('/order/view/{id}', [\App\Http\Controllers\Admin\OrderController::class, 'view'])->name('order-view');
    Route::get('/order/edit/{id}', [\App\Http\Controllers\Admin\OrderController::class, 'edit'])->name('order-edit');
    Route::get('/order/destroy/{id}', [\App\Http\Controllers\Admin\OrderController::class, 'destroy'])->name('order-destroy');;
    Route::put('/order/update/{id}', [\App\Http\Controllers\Admin\OrderController::class, 'update'])->name('order-update');
    Route::get('/category', [\App\Http\Controllers\Admin\CategoryController::class, 'index'])->name('category-index');
    Route::get('/category/edit/{id}', [\App\Http\Controllers\Admin\CategoryController::class, 'edit'])->name('category-edit');
    Route::put('/category/update/{id}', [\App\Http\Controllers\Admin\CategoryController::class, 'update'])->name('category-update');
    Route::post('/category/save', [\App\Http\Controllers\Admin\CategoryController::class, 'store'])->name('category-store');
    Route::get('/category/create', [\App\Http\Controllers\Admin\CategoryController::class, 'create'])->name('category-create');
    Route::get('/category/{id}', [\App\Http\Controllers\Admin\CategoryController::class, 'show'])->name('category-show');

    /*Route::get('/', function (){
        \Illuminate\Support\Facades\Gate::authorize('view-protected-part');
        return view(('admin.index'));
    })->name('main-admin');*/

    Route::get('/', [\App\Http\Controllers\Admin\MainController::class, 'index'])->name('main-admin');

});

Route::view('/client/cabinet', 'client.index')->middleware('auth')->name('client-cabinet');

Route::get('/client/orders', [\App\Http\Controllers\Client\OrderController::class, 'index'])->middleware('auth')->name('client-orders');
Route::get('/client/orders/edit/{id}', [\App\Http\Controllers\Client\OrderController::class, 'edit'])->middleware('auth')->name('client-orders-edit');
Route::get('/client/orders/view/{id}', [\App\Http\Controllers\Client\OrderController::class, 'view'])->middleware('auth')->name('client-orders-view');
Route::get('/client/orders/delete/{id}', [\App\Http\Controllers\Client\OrderController::class, 'destroy'])->middleware('auth')->name('client-order-delete');
Route::get('/client/setting', [\App\Http\Controllers\Client\SettingController::class, 'index'])->middleware('auth')->name('client-setting');
Route::put('/client/update/{id}', [\App\Http\Controllers\Client\SettingController::class, 'update'])->middleware('auth')->name('client-update-setting');

Route::get('/client/login', function (){
        return view('client.login');
    })->name('client-login');

Route::post('/client/login', [\App\Http\Controllers\Client\LoginController::class, 'login']);

Route::get('/client/logout', function (){
        \Illuminate\Support\Facades\Auth::logout();
        return redirect('/');
    })->name('client-logout');

Route::get('/client/register', function (){
        if(\Illuminate\Support\Facades\Auth::check()){
            return redirect(\route('client-cabinet'));
        }
        return view('client.reg');
    })->name('client_reg');

Route::post('/client/register', [\App\Http\Controllers\Client\RegisterController::class, 'store'])->name('client-register');

Route::get('/category/{category}', [\App\Http\Controllers\Client\MainController::class, 'viewCategory'])->name('category-view');
Route::get('/product/{id}', [\App\Http\Controllers\Client\ProductController::class, 'index'])->name('product');
Route::post('/addAjax/{id}', [\App\Http\Controllers\Client\CartController::class, 'addAjax']);
Route::get('/addtocart/{id}', [\App\Http\Controllers\Client\CartController::class, 'addToCart']);
Route::get('/cart', [\App\Http\Controllers\Client\CartController::class, 'showCart'])->name('showcart');
Route::post('/cart/checkout', [\App\Http\Controllers\Client\CartController::class, 'checkout'])->name('checkout');
Route::post('/order/save', [\App\Http\Controllers\Client\OrderController::class, 'store'])->name('order-save');

/*Route::get('/', function () {
    return view('home');
});*/

//Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
