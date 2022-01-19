<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SettingController;
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




Route::get('home', function () {
    return view('client.home');
});

Route::get('shop', function () {
    return view('client.shop');
});

Route::get('pengiriman', function () {
    return view('client.pengiriman');
});

Route::get('login', function () {
    return view('client.login');
});

Route::prefix('admin')->middleware(['auth'])->group(function () {
    Route::post('produk/filter',[ProdukController::class, 'filter']);
    Route::get('/kategori', function () {
        return view('section.base');
    });
   
    Route::resource('user', UserController::class);
    Route::resource('produk', ProdukController::class);
    Route::resource('produk', ProdukController::class );
    Route::resource('product', ProductController::class);
    Route::resource('user', UserController::class );
    Route::get('dashboard', [HomeController::class, 'showBeranda']);
    Route::get('dashboard/{status}', [HomeController::class, 'showBeranda']);
    
});


Route::get('setting', [SettingController::class, 'index']);
Route::post('setting', [SettingController::class, 'store']);


Route::get('login', [AuthController::class, 'showlogin'])->name('login');
Route::post('login', [AuthController::class, 'LoginProcess']);
Route::get('logout', [AuthController::class, 'Logout']);
Route::get('test-collection', [HomeController::class, 'testCollection']);
Route::get('test-ajax', [HomeController::class, 'testAjax']);
Route::get('yok-ajax', [HomeController::class, 'yokAjax']);
Route::get('single', [HomeController::class, 'single']);