<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\UserController;
use App\Models\Category;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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

    //Category
    Route::get('/dashboard/category/checkSlug', [CategoryController::class, 'checkSlug']);
    Route::resource('/dashboard/category', CategoryController::class);

    //Product
    Route::get('/dashboard/product/checkSlug', [ProductController::class, 'checkSlug']);
    Route::resource('/dashboard/product', ProductController::class);

    //Tag
    Route::get('/dashboard/tags/checkSlug', [TagController::class, 'checkSlug']);
    Route::resource('/dashboard/tags', TagController::class);

    //Profile
    Route::resource('/dashboard/profile', UserController::class);

   
});

Auth::routes();

Route::controller(HomeController::class)->group(function () {
    Route::get('/', 'index');
    Route::get('/shop', 'shop')->name('shop');
    Route::get('/shop/{product:slug}', 'detail');
    Route::get('/contact', 'contact');    
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
