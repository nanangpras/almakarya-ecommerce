<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Admin\AuthorController;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\BookController;
use App\Http\Controllers\Admin\BookImageController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PortofolioController;
use App\Http\Controllers\Admin\PublisherController;
use App\Http\Controllers\Admin\SettingAppController;
use App\Http\Controllers\Admin\TransactionController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Home\CartController;
use App\Http\Controllers\Home\HomepageController;
use App\Http\Controllers\Home\ProdukController;
use App\Http\Controllers\Home\CheckoutController;
use App\Http\Controllers\Home\Customer\CustomerController;
use App\Http\Controllers\Home\PaymentController;
use Guzzle\Http\Middleware;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


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

// Auth::routes();

// Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/', [HomepageController::class, 'index'])
        ->name('beranda');
Route::get('/banner-detail/{slug}', [HomepageController::class, 'bannerDetail'])
        ->name('banner-detail');

Route::get('/produk', [ProdukController::class, 'produk'])
        ->name('produk');
Route::get('/produk-detail/{slug}', [ProdukController::class, 'produkDetail'])
        ->name('produk-detail');
Route::get('/produk/search', [ProdukController::class, 'produk'])
        ->name('search');
Route::get('/produk/filter', [ProdukController::class, 'produk'])
        ->name('filter');
Route::get('/category-produk/{slug}', [ProdukController::class, 'categoryProduk'])
        ->name('category-produk');

// Route::post('/checkout/{id}', [CheckoutController::class, 'process'])
//         ->name('checkout-process');
        // ->middleware();
Route::get('/checkout/{code_transaction}', [CheckoutController::class, 'success'])
        ->name('checkout-success')
        ->middleware('auth');
Route::post('/checkout-process', [CheckoutController::class, 'process'])
        ->name('checkout-process')
        ->middleware('auth');
Route::get('/checkout', [CheckoutController::class, 'index'])
        ->name('checkout')
        ->middleware('auth');

Route::post('/cart', [CartController::class, 'addToCart'])
        ->name('addto-cart');
Route::get('/list-cart', [CartController::class, 'listCart'])
        ->name('list-cart');
Route::post('/update-cart', [CartController::class, 'updateCart'])
        ->name('update-cart');
Route::get('/delete-cart/{id}', [CartController::class, 'deleteCart'])
        ->name('delete-cart');

// Route::get('/cart', [CheckoutController::class, 'cart'])
//         ->name('cart');
// Route::get('/login', [HomepageController::class, 'login']);
Route::get('/signup', [HomepageController::class, 'signup'])
        ->name('signup');
Route::get('/province',[HomepageController::class, 'getProvince'])
        ->name('province');
Route::get('/city/{id}',[HomepageController::class, 'getCity'])
        ->name('city');
Route::get('/subdistrict/{id}',[HomepageController::class, 'getSubdistrict'])
        ->name('subdistrict');
Route::get('/origin={origin}&originType=subdistrict&destination={destination}&destinationType=subdistrict&weight={weight}&courier={courier}',[CheckoutController::class,'getOngkir']);


Route::get('/member/profil', [CustomerController::class, 'memberProfile'])
        ->name('member-profil')
        ->middleware('auth');
Route::get('/member/utama', [CustomerController::class, 'memberUtama'])
        ->name('member-utama')
        ->middleware('auth');
Route::get('/member/pesanan', [CustomerController::class, 'memberPesanan'])
        ->name('member-pesanan')
        ->middleware('auth');
Route::get('/member/pesanan-barusaja', [CustomerController::class, 'memberPesananBarusaja'])
        ->name('member-pesanan-barusaja')
        ->middleware('auth');
Route::get('/member/pesanan-resi', [CustomerController::class, 'memberPesananResi'])
        ->name('member-pesanan-resi')
        ->middleware('auth');
Route::get('/member/pesanan/{id}', [CustomerController::class, 'memberDetailPesanan'])
        ->name('detail-pesanan')
        ->middleware('auth');

// Payment
Route::post('/payment/callback', [PaymentController::class, 'notificationHandler']);
Route::get('/payment/finish', [PaymentController::class, 'finishRedirect']);
Route::get('/payment/unfinish', [PaymentController::class, 'unfinishRedirect']);
Route::get('/payment/error', [PaymentController::class, 'errorRedirect']);

Route::get('/rajaongkir', [HomepageController::class, 'rajaongkir']);


Route::prefix('admin')
        ->middleware(['auth', 'admin'])
        ->group(function(){
            Route::get('/',[DashboardController::class, 'index'])
                ->name('dashboard');
            Route::resource('user', UserController::class);
            Route::resource('book', BookController::class);
            Route::get('book/{id}/image', [BookController::class, 'image'])
                ->name('book.image');
            Route::resource('bookimage', BookImageController::class);
            Route::resource('author', AuthorController::class);
            Route::resource('publisher', PublisherController::class);
            Route::resource('category', CategoryController::class);
            Route::get('category/{id}/delete', [CategoryController::class, 'delete'])
                ->name('category.delete');
            Route::resource('banner', BannerController::class);
            Route::resource('portofolio', PortofolioController::class);
            Route::resource('settingapp', SettingAppController::class);
            Route::resource('transaction', TransactionController::class);
            Route::get('transaction/{id}/resi', [TransactionController::class, 'resi'])
                ->name('transaction.resi');
        });

