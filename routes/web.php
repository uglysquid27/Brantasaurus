<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CarouselController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ChekcoutController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DashboardUserController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\OrderAdminController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\SizeController;
use App\Http\Controllers\UserController;
use App\Models\Category;

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

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index']);

    //Carousel
    Route::get('/dashboard/carousel/checkSlug', [CarouselController::class, 'checkSlug']);
    Route::resource('/dashboard/carousel', CarouselController::class);
    
    //Category
    Route::get('/dashboard/category/checkSlug', [CategoryController::class, 'checkSlug']);
    Route::resource('/dashboard/category', CategoryController::class);

    //Product
    Route::get('/dashboard/product/checkSlug', [ProductController::class, 'checkSlug']);
    Route::resource('/dashboard/product', ProductController::class);

    //Tag
    Route::get('/dashboard/tags/checkSlug', [TagController::class, 'checkSlug']);
    Route::resource('/dashboard/tags', TagController::class);

    //Size
    Route::get('/dashboard/size/checkSlug', [SizeController::class, 'checkSlug']);
    Route::resource('/dashboard/size', SizeController::class);

    //Profile
    Route::resource('/dashboard/profile', UserController::class);

    //order
    Route::get('checkout', [ChekcoutController::class, 'index']);
    Route::post('place-order', [ChekcoutController::class, 'placeOrder']);

    //OrderDashboard
    Route::resource('/dashboard/orders', OrderAdminController::class);
    Route::get('/dashboard/orders/view-orders/{id}', [OrderAdminController::class, 'view']);
    Route::get('/dashboard/orders/image-payment/{id}', [OrderAdminController::class, 'imagePay']);
    Route::put('update-order/{id}', [OrderAdminController::class, 'update']);
    Route::get('/dashboard/order-history', [OrderAdminController::class, 'orderHistory']);

    //UserList
    Route::resource('/dashboard/users', DashboardUserController::class);
    Route::get('/dashboard/users/view/{id}', [DashboardUserController::class, 'view']);
});

Auth::routes();

Route::controller(HomeController::class)->group(function () {
    Route::get('/', 'index');
    Route::get('/shop', 'shop')->name('shop');
    Route::get('/shop/{product:slug}', 'detail');
    Route::get('/contact', 'contact');    
    Route::get('/search', 'search');
});

Route::resource('/profile', UserController::class)->middleware('auth');

Route::get('/categories', function(){
    return view('category',[
        'categories' => Category::all()
    ]);
});

Route::controller(CartController::class)->group(function(){
    Route::post('/addcart/{id}', 'addcart');
    Route::get('/cart', 'showcart');
    Route::get('/updatecart/{id}/{quantity}', 'update');
    Route::get('/deletecart/{id}', 'destroy');    
});

Route::controller(ChekcoutController::class)->group(function(){
    Route::get('checkout', 'index')->middleware('auth');
    Route::post('place-order', 'placeOrder')->middleware('auth');
    Route::get('payment/{id}', 'payment')->name('payment')->middleware('auth');
    Route::put('update-payment/{id}', 'updatePayment')->middleware('auth');
});

Route::get('/my-orders/{id}/print', [OrderController::class, 'print'])->name('print')->middleware('auth');
Route::put('/receive-order/{id}', [OrderController::class, 'receive'])->middleware('auth');
Route::get('/my-orders/{id}', [OrderController::class, 'show'])->middleware('auth');
Route::resource('/my-orders', OrderController::class)->middleware('auth');

Route::resource('my-history', HistoryController::class)->middleware('auth');
