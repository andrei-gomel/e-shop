<?php

use App\Http\Controllers\Client\TestController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
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

Route::get('/test', TestController::class);

/**
 *  Отображение страницы с кнопкой для отправки письма для подтверждения email
 */
Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

/**
 * Обработчик события когда пользователь щелкает ссылку подтверждения электронной почты,
 * которая была отправлена ему по электронной почте
 */
Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();

    return redirect(route('client-cabinet'));
})->middleware(['auth', 'signed'])->name('verification.verify');

/**
 *  Маршрут, позволяющий пользователю запрашивать повторную отправку письма с подтверждением
 */
Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();

    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');

//Route::post('/admin/login', [\App\Http\Controllers\Admin\LoginController::class, 'login']);

//Route::get('/', [\App\Http\Controllers\Client\LoginController::class, 'login']);

Route::get('/', [\App\Http\Controllers\Client\MainController::class, 'index'])->name('shop-index');

Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'admin', 'verified']], function (){
    //  \Illuminate\Support\Facades\Gate::authorize('view-protected-part');
    Route::get('/clients', [\App\Http\Controllers\Admin\ClientController::class, 'index'])->name('admin-clients');
    Route::get('/client/{id}', [\App\Http\Controllers\Admin\ClientController::class, 'view'])->name('client-view');
    Route::get('/client/create', [\App\Http\Controllers\Admin\ClientController::class, 'create'])->name('client-create');
    Route::post('/client/save', [\App\Http\Controllers\Admin\ClientController::class, 'store'])->name('client-save');
    Route::put('/client/update/{id}', [\App\Http\Controllers\Admin\ClientController::class, 'update'])->name('client-update');
    Route::get('/client/edit/{id}', [\App\Http\Controllers\Admin\ClientController::class, 'edit'])->name('client-edit');
    Route::get('/client/destroy/{id}', [\App\Http\Controllers\Admin\ClientController::class, 'destroy'])->name('admin-client-destroy');
    Route::get('/product', [\App\Http\Controllers\Admin\ProductController::class, 'index'])->name('product-index');
    Route::get('/product/create', [\App\Http\Controllers\Admin\ProductController::class, 'create'])->name('product-create');
    Route::post('/product/save', [\App\Http\Controllers\Admin\ProductController::class, 'store'])->name('product-store');
    Route::get('/product/edit/{id}', [\App\Http\Controllers\Admin\ProductController::class, 'edit'])->name('product-edit');
    Route::put('/product/update/{id}', [\App\Http\Controllers\Admin\ProductController::class, 'update'])->name('product-update');
    Route::get('/product/destroy/{id}', [\App\Http\Controllers\Admin\ProductController::class, 'destroy'])->name('product-destroy');
    Route::post('/product/filterbyoption', [\App\Http\Controllers\Admin\ProductController::class, 'filterbyoption'])->name('product-filterbyoption');
    Route::get('/product/{id}', [\App\Http\Controllers\Admin\ProductController::class, 'show'])->name('product-show');
    Route::get('/orders', [\App\Http\Controllers\Admin\OrderController::class, 'index'])->name('orders-index');
    Route::post('/orders/filterbyoption', [\App\Http\Controllers\Admin\OrderController::class, 'filterByOption'])->name('filterbyoption');
    Route::get('/order/{id}', [\App\Http\Controllers\Admin\OrderController::class, 'view'])->name('order-view');
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

Route::group(['prefix' => 'manager', 'middleware' => ['auth', 'manager', 'verified']], function (){
    Route::get('/product', [\App\Http\Controllers\Manager\ProductController::class, 'index'])->name('manager-product-index');
    Route::get('/product/create', [\App\Http\Controllers\Manager\ProductController::class, 'create'])->name('manager-product-create');
    Route::post('/product/save', [\App\Http\Controllers\Manager\ProductController::class, 'store'])->name('manager-product-store');
    Route::get('/product/edit/{id}', [\App\Http\Controllers\Manager\ProductController::class, 'edit'])->name('manager-product-edit');
    Route::put('/product/update/{id}', [\App\Http\Controllers\Manager\ProductController::class, 'update'])->name('manager-product-update');
    Route::get('/product/destroy/{id}', [\App\Http\Controllers\Manager\ProductController::class, 'destroy'])->name('manager-product-destroy');
    Route::post('/product/filterbyoption', [\App\Http\Controllers\Manager\ProductController::class, 'filterbyoption'])->name('manager-product-filterbyoption');
    Route::get('/product/{id}', [\App\Http\Controllers\Manager\ProductController::class, 'show'])->name('manager-product-show');
});

Route::view('/client/cabinet', 'client.index')->middleware('auth', 'verified')->name('client-cabinet');
Route::get('/client/orders', [\App\Http\Controllers\Client\OrderController::class, 'index'])->middleware('auth')->name('client-orders');
Route::get('/client/orders/edit/{id}', [\App\Http\Controllers\Client\OrderController::class, 'edit'])->middleware(['auth', 'manager'])->name('client-orders-edit');
Route::get('/client/orders/{id}', [\App\Http\Controllers\Client\OrderController::class, 'view'])->middleware('auth')->name('client-orders-view');
Route::get('/client/order/delete/{id}', [\App\Http\Controllers\Client\OrderController::class, 'destroy'])->middleware(['auth', 'manager'])->name('client-order-delete');
Route::put('/client/order/update/{id}', [\App\Http\Controllers\Client\OrderController::class, 'update'])->middleware(['auth', 'manager'])->name('client-order-update');
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

/**
 *
 */
Route::get('/client/register', function (){
        if(\Illuminate\Support\Facades\Auth::check()){
            return redirect(\route('client-cabinet'));
        }
        else
        {
            $country = DB::table('country')->select('id', 'name')->orderBy('id')->get();
            return view('client.reg', compact('country'));
        }

    })->name('client_reg');

Route::post('/client/register', [\App\Http\Controllers\Client\RegisterController::class, 'store'])->name('client-register');

Route::get('/category/{category}', [\App\Http\Controllers\Client\MainController::class, 'viewCategory'])->name('category-view');
Route::get('/product/{id}', [\App\Http\Controllers\Client\ProductController::class, 'index'])->name('product');
Route::post('/addAjax/{id}', [\App\Http\Controllers\Client\CartController::class, 'addAjax']);
Route::get('/addtocart/{id}', [\App\Http\Controllers\Client\CartController::class, 'addToCart']);
Route::get('/cart', [\App\Http\Controllers\Client\CartController::class, 'showCart'])->name('showcart');
Route::post('/cart/checkout', [\App\Http\Controllers\Client\CartController::class, 'checkout'])->name('checkout');
Route::post('/order/save', [\App\Http\Controllers\Client\OrderController::class, 'store'])->name('order-save');

/*Route::get('/home', function () {
    return view('auth.verify-email');
});*/

/*Route::get('/', function () {
    return view('home');
});*/

//Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
